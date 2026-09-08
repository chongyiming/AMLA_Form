<?php

namespace App\Console\Commands;

use App\Models\AmlaForm;
use App\Models\AmlaForm2;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Spatie\Browsershot\Browsershot;

#[Signature('app:generate-pdf {form_id} {state} {pdfPath}')]
#[Description('Command description')]
class GeneratePdf extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        set_time_limit(5);

        $form_id = $this->argument('form_id');
        $state = $this->argument('state');
        $pdfPath = $this->argument('pdfPath');

        $this->info("Generating PDF for form: {$form_id}");

        $row = DB::table('istr_AMLAForm2 as t1')
            ->join(
                'istr_AMLAForms as t2',
                't1.form_id',
                '=',
                't2.form_id'
            )
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
            // ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->get();

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
                'errors' => new MessageBag(),
            ]
        )->render();

        $dir = dirname($pdfPath);

        try {
            $tmpPath = $dir . DIRECTORY_SEPARATOR . '.' . uniqid('generating_') . '.pdf';

            Browsershot::html($html)
                ->timeout(5)
                ->save($tmpPath);

            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
            rename($tmpPath, $pdfPath);
        } catch (\Throwable $e) {
            if (isset($tmpPath) && file_exists($tmpPath)) {
                @unlink($tmpPath);
            }
            Log::error('GeneratePdf failed for form ' . $form_id . ': ' . $e->getMessage());
            $this->error('GeneratePdf failed: ' . $e->getMessage());

            return self::FAILURE;
        }

        $this->info("PDF generated: {$pdfPath}");

        return self::SUCCESS;
    }
}
