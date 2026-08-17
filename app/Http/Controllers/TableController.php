<?php

namespace App\Http\Controllers;

use App\Models\AmlaAttachment;
use App\Models\AmlaForm;
use App\Models\AmlaForm1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TableController extends Controller
{
    //
    public function new()
    {
        $data_header['status'] = "New";
        $submittedHeaderForm = AmlaForm::create($data_header);
        // $submittedHeaderForm = AmlaForm::create();

        $form_id = $submittedHeaderForm->form_id;
        $data['form_id'] = $form_id;
        $data['isMyKadReader'] = 0;
        AmlaForm1::create(
            $data
        );
        return redirect("/customerduediligenceform/{$form_id}");
    }

    public function delete($form_id)
    {
        AmlaForm::where('form_id', $form_id)->update(['status' => 'Deleted']);

        return redirect()->back();
    }

    public function edit($form_id)
    {
        // dd($form_id);
        return redirect("/createdForm/{$form_id}/1");
    }

    public function index()
    {
        $forms = DB::table('istr_AMLAForm1 as t1')
            ->join('istr_AMLAForms as t2', 't1.form_id', '=', 't2.form_id')
            ->select('t1.*', 't2.*')
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->simplePaginate(5);
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->distinct()
            ->first();
        return view('pdsp_customer_due_diligence_form', ['forms' => $forms, 'branch' => $branch]);
    }

    public function attachments_modal($form_id)
    {
        $forms = DB::table('istr_AMLAForm1 as t1')
            ->join('istr_AMLAForms as t2', 't1.form_id', '=', 't2.form_id')
            ->select('t1.*', 't2.*')
            ->where('t1.form_id', '=', $form_id)
            ->get();
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->distinct()
            ->first();
        $attachments = AmlaAttachment::where('form_id', $form_id)
            ->whereNull('deletedAt')
            ->get();
        return view('attachment-modal-body', ['forms' => $forms, 'branch' => $branch, 'attachments' => $attachments]);
    }

    public function attachments($form_id)
    {
        $attachments = AmlaAttachment::where('form_id', $form_id)
            ->whereNull('deletedAt')
            ->where('file_name', 'not like', '%GoldCert%')
            ->where('file_name', 'not like', '%Receipt%')
            ->get();
        $certReceipts = AmlaAttachment::where('form_id', $form_id)
            ->where(function ($query) {
                $query->where('file_name', 'like', '%GoldCert%')
                    ->orWhere('file_name', 'like', '%Receipt%');
            })
            ->get();
        $form_status = DB::table('istr_AMLAForms')
            ->select('status')
            ->where('form_id', '=', $form_id)
            ->get();
        return response()->json([
            'attachments' => $attachments,
            'form_status' => $form_status,
            'certReceipts' => $certReceipts
        ]);
    }

    public function deleteImage($id)
    {
        $attachment = AmlaAttachment::findOrFail($id);
        $attachment['deletedAt'] = now();
        $attachment->save();
        return response()->json([
            'success' => true
        ]);
    }

    public function generateExe(Request $request)
    {
        $trxno = $request->trxno;
        $exe = base_path('Debug\\produceCert&Receipt.exe');
        $command = escapeshellarg($exe) . ' ' . escapeshellarg($trxno);
        exec($command, $output, $returnCode);
        return response()->json([
            'command' => $command,
            'success' => $returnCode === 0,
            'output' => $output
        ]);
    }

    public function showCertReceiptImage(Request $request)
    {
        $path = $request->query('path');

        return response()->file($path);
    }

    public function uploadCertReceiptImages(Request $request)
    {

        $form_id = $request->form_id;
        $paths = [];

        foreach ($request->pngPaths as $sourcePath) {

            $filename = basename($sourcePath); // e.g. "20260817141353_..._GoldCert_CS_01.png"
            $destination = 'photos/' . $filename;

            Storage::disk('public')->put($destination, file_get_contents($sourcePath));

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => 1,
                'file_name' => $destination,
                'createdAt' => now(),
            ]);

            $paths[] = $destination;
        }

        return response()->json([
            'success' => true,
            'message' => 'Cert & Receipt uploaded successfully.',
            'paths' => $paths,
        ]);
    }
}
