<?php

namespace App\Http\Controllers;

use App\Models\AmlaForm;
use App\Models\AmlaForm1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
