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
        return redirect("/customerduediligence.customerduediligenceform/{$form_id}");
    }

    public function delete($form_id)
    {
        AmlaForm::where('form_id', $form_id)->update(['status' => 'Deleted']);

        return redirect()->back();
    }

    public function editCustomerDueDiligenceForm($form_id)
    {
        return redirect("/createdForm/{$form_id}/1");
    }

    public function editCustomerRiskProfilingForm($form_id)
    {
        return redirect("/createdCustomerRiskProfilingForm/{$form_id}/1");
    }

    public function home_customer_due_diligence_form()
    {
        $forms = DB::table('istr_AMLAForm1 as t1')
            ->join('istr_AMLAForms as t2', 't1.form_id', '=', 't2.form_id')
            ->select(
                't1.*',
                't2.*',
                DB::raw("
            (
                SELECT COUNT(*)
                FROM istr_AMLA_Attachment as a
                WHERE a.form_id = t1.form_id
                AND a.deletedAt IS NULL
            ) AS image_count
        ")
            )
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->where('t2.form_type', 'Form_No_1')
            ->orderBy('t1.form_id', 'desc')
            ->paginate(10);
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();
        return view('customerduediligence.home_customer_due_diligence_form', ['forms' => $forms, 'branch' => $branch]);
    }

    public function home_customer_risk_profiling_form()
    {
        $forms = DB::table('istr_AMLAForm2 as t1')
            ->join('istr_AMLAForms as t2', 't1.form_id', '=', 't2.form_id')
            ->select(
                't1.*',
                't2.*',
                DB::raw("
            (
                SELECT COUNT(*)
                FROM istr_AMLA_Attachment as a
                WHERE a.form_id = t1.form_id
                AND a.deletedAt IS NULL
            ) AS image_count
        ")
            )
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->where('t2.form_type', 'Form_No_2')
            ->orderBy('t1.form_id', 'desc')
            ->paginate(10);
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();
        return view('home_customer_risk_profiling_form', ['forms' => $forms, 'branch' => $branch]);
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
        set_time_limit(310);
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

    public function uploadCertReceiptImages(Request $request)
    {

        $form_id = $request->form_id;
        $form_type = $request->form_type;

        $paths = [];

        foreach ($request->pngPaths as $sourcePath) {

            $filename = basename($sourcePath);
            $destination = 'photos/' . $filename;

            Storage::disk('public')->put($destination, file_get_contents($sourcePath));

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => $form_type,
                'file_name' => $filename,
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
