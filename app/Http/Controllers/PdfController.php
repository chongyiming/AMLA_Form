<?php

namespace App\Http\Controllers;

use App\Models\AmlaForm;
use App\Models\AmlaForm2;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessTimedOutException;

class PdfController extends Controller
{
    //
    public function generatePdf($form_id, $state)
    {

        ini_set('max_execution_time', 1);



        $row = DB::table('istr_AMLAForm2 as t1')
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
                    AND a.file_name NOT LIKE '%prepared_signature%'
                    AND a.file_name NOT LIKE '%reviewed_signature%'
                ) AS image_count
            ")
            )
            ->where('t1.form_id', $form_id)
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->get();

        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();

        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();

        $form = AmlaForm::where('form_id', $form_id)->first();

        $form1 = AmlaForm2::where('form_id', $form_id)->first();


        $html = view(
            'customerriskprofiling.customerriskprofilingform',
            [
                'form_id' => $form_id,
                'state' => $state,
                'form' => $form,
                'form1' => $form1,
                'sales_name' => $preparer,
                'row' => $row,
                'branch' => $branch,
            ]
        )->render();

        $path = storage_path('app/public/risk-profile-' . $form_id . '.pdf');

        Browsershot::html($html)
            ->timeout(1)
            ->save($path);



        return $path;
    }
}
