<?php

namespace App\Http\Controllers;

use App\Models\AmlaAttachment;
use App\Http\Controllers\PdfController;
use App\Jobs\GeneratePdfJob;
use App\Jobs\SendEmailJob;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\AmlaForm1;
use App\Models\AmlaForm;
use App\Models\AmlaForm2;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Output\BufferedOutput;

class PageController extends Controller
{
    //



    public function show()
    {

        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();

        return view('home', ['branch' => $branch]);
    }
    public function createForm()
    {
        // dd(session('form_data'));
        // dd(request()->all());
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
        $countries = collect([
            (object) ['Country_Name' => 'Malaysia'],
            (object) ['Country_Name' => 'Singapore'],
            (object) ['Country_Name' => 'Indonesia'],
            (object) ['Country_Name' => 'Thailand'],
            (object) ['Country_Name' => 'Brunei'],
        ]);
        $purpose_of_trx = collect([
            (object) ['Purpose_Name' => 'Purchase of Goods'],
            (object) ['Purpose_Name' => 'Payment for Services'],
            (object) ['Purpose_Name' => 'Business Investment'],
            (object) ['Purpose_Name' => 'Loan Repayment'],
            (object) ['Purpose_Name' => 'Salary Payment'],
            (object) ['Purpose_Name' => 'Property Purchase'],
            (object) ['Purpose_Name' => 'Property Rental'],
            (object) ['Purpose_Name' => 'Transfer to Family'],
            (object) ['Purpose_Name' => 'Personal Expenses'],
            (object) ['Purpose_Name' => 'Savings'],
            (object) ['Purpose_Name' => 'Donation'],
            (object) ['Purpose_Name' => 'Other'],
        ]);
        $occupation_type = collect([
            (object) ['Occupation_Name' => 'Business Owner'],
            (object) ['Occupation_Name' => 'Company Director'],
            (object) ['Occupation_Name' => 'Manager'],
            (object) ['Occupation_Name' => 'Executive'],
            (object) ['Occupation_Name' => 'Engineer'],
            (object) ['Occupation_Name' => 'Accountant'],
            (object) ['Occupation_Name' => 'Doctor'],
            (object) ['Occupation_Name' => 'Lawyer'],
            (object) ['Occupation_Name' => 'Teacher'],
            (object) ['Occupation_Name' => 'Government Employee'],
            (object) ['Occupation_Name' => 'Private Sector Employee'],
            (object) ['Occupation_Name' => 'Self-Employed'],
            (object) ['Occupation_Name' => 'Professional'],
            (object) ['Occupation_Name' => 'Student'],
            (object) ['Occupation_Name' => 'Retired'],
            (object) ['Occupation_Name' => 'Homemaker'],
            (object) ['Occupation_Name' => 'Unemployed'],
            (object) ['Occupation_Name' => 'Freelancer'],
            (object) ['Occupation_Name' => 'Consultant'],
            (object) ['Occupation_Name' => 'Other'],
        ]);
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();
        return view('customerduediligence.customerduediligenceform', [
            'state' => 0,
            'form1' => null,
            'form' => null,
            'preparer' => $preparer,
            'countries' => $countries,
            'purposeOfTrx' => $purpose_of_trx,
            'occupationType' => $occupation_type,
            'branch' => $branch
        ]);
    }

    public function createRiskProfilingForm()
    {
        $branch = DB::table('Company_Setup_Workstation')
            ->select('Branch_Code')
            ->where('Branch_Code', 'LIKE', 'P%')
            ->where('Branch_Code', '!=', 'PEOS')
            ->distinct()
            ->first();

        $sales_name = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
        $countries = collect([
            (object) ['Country_Name' => 'Malaysia'],
            (object) ['Country_Name' => 'Singapore'],
            (object) ['Country_Name' => 'Indonesia'],
            (object) ['Country_Name' => 'Thailand'],
            (object) ['Country_Name' => 'Brunei'],
        ]);
        $purpose_of_trx = collect([
            (object) ['Purpose_Name' => 'Purchase of Goods'],
            (object) ['Purpose_Name' => 'Payment for Services'],
            (object) ['Purpose_Name' => 'Business Investment'],
            (object) ['Purpose_Name' => 'Loan Repayment'],
            (object) ['Purpose_Name' => 'Salary Payment'],
            (object) ['Purpose_Name' => 'Property Purchase'],
            (object) ['Purpose_Name' => 'Property Rental'],
            (object) ['Purpose_Name' => 'Transfer to Family'],
            (object) ['Purpose_Name' => 'Personal Expenses'],
            (object) ['Purpose_Name' => 'Savings'],
            (object) ['Purpose_Name' => 'Donation'],
            (object) ['Purpose_Name' => 'Other'],
        ]);
        $occupation_type = collect([
            (object) ['Occupation_Name' => 'Business Owner'],
            (object) ['Occupation_Name' => 'Company Director'],
            (object) ['Occupation_Name' => 'Manager'],
            (object) ['Occupation_Name' => 'Executive'],
            (object) ['Occupation_Name' => 'Engineer'],
            (object) ['Occupation_Name' => 'Accountant'],
            (object) ['Occupation_Name' => 'Doctor'],
            (object) ['Occupation_Name' => 'Lawyer'],
            (object) ['Occupation_Name' => 'Teacher'],
            (object) ['Occupation_Name' => 'Government Employee'],
            (object) ['Occupation_Name' => 'Private Sector Employee'],
            (object) ['Occupation_Name' => 'Self-Employed'],
            (object) ['Occupation_Name' => 'Professional'],
            (object) ['Occupation_Name' => 'Student'],
            (object) ['Occupation_Name' => 'Retired'],
            (object) ['Occupation_Name' => 'Homemaker'],
            (object) ['Occupation_Name' => 'Unemployed'],
            (object) ['Occupation_Name' => 'Freelancer'],
            (object) ['Occupation_Name' => 'Consultant'],
            (object) ['Occupation_Name' => 'Other'],
        ]);
        return view('customerriskprofiling.customerriskprofilingform', [
            'state' => 0,
            'form1' => null,
            'form' => null,
            'sales_name' => $sales_name,
            'branch' => $branch

        ]);
    }
    public function submittedCustomerDueDiligenceForm($form_id, $state)
    {
        $row = DB::table('istr_AMLAForm1 as t1')
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
            ->where('t1.form_id', $form_id)
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->get();
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
        $countries = collect([
            (object) ['Country_Name' => 'Malaysia'],
            (object) ['Country_Name' => 'Singapore'],
            (object) ['Country_Name' => 'Indonesia'],
            (object) ['Country_Name' => 'Thailand'],
            (object) ['Country_Name' => 'Brunei'],
        ]);
        $purpose_of_trx = collect([
            (object) ['Purpose_Name' => 'Purchase of Goods'],
            (object) ['Purpose_Name' => 'Payment for Services'],
            (object) ['Purpose_Name' => 'Business Investment'],
            (object) ['Purpose_Name' => 'Loan Repayment'],
            (object) ['Purpose_Name' => 'Salary Payment'],
            (object) ['Purpose_Name' => 'Property Purchase'],
            (object) ['Purpose_Name' => 'Property Rental'],
            (object) ['Purpose_Name' => 'Transfer to Family'],
            (object) ['Purpose_Name' => 'Personal Expenses'],
            (object) ['Purpose_Name' => 'Savings'],
            (object) ['Purpose_Name' => 'Donation'],
            (object) ['Purpose_Name' => 'Other'],
        ]);
        $occupation_type = collect([
            (object) ['Occupation_Name' => 'Business Owner'],
            (object) ['Occupation_Name' => 'Company Director'],
            (object) ['Occupation_Name' => 'Manager'],
            (object) ['Occupation_Name' => 'Executive'],
            (object) ['Occupation_Name' => 'Engineer'],
            (object) ['Occupation_Name' => 'Accountant'],
            (object) ['Occupation_Name' => 'Doctor'],
            (object) ['Occupation_Name' => 'Lawyer'],
            (object) ['Occupation_Name' => 'Teacher'],
            (object) ['Occupation_Name' => 'Government Employee'],
            (object) ['Occupation_Name' => 'Private Sector Employee'],
            (object) ['Occupation_Name' => 'Self-Employed'],
            (object) ['Occupation_Name' => 'Professional'],
            (object) ['Occupation_Name' => 'Student'],
            (object) ['Occupation_Name' => 'Retired'],
            (object) ['Occupation_Name' => 'Homemaker'],
            (object) ['Occupation_Name' => 'Unemployed'],
            (object) ['Occupation_Name' => 'Freelancer'],
            (object) ['Occupation_Name' => 'Consultant'],
            (object) ['Occupation_Name' => 'Other'],
        ]);
        $form = AmlaForm::where('form_id', $form_id)->first();

        $form1 = AmlaForm1::where('form_id', $form_id)->first();
        $form1['shareholder'] = [
            [
                "shareholder_name" => $form1['shareholder_name'],
                "share_type" => $form1['share_type'],
                "share_percent" => $form1['share_percent'],
            ],
            [
                "shareholder_name" => $form1['shareholder_name2'],
                "share_type" => $form1['share_type2'],
                "share_percent" => $form1['share_percent2'],
            ],
        ];


        $form1['nominee'] = [
            [
                "nominee_name" => $form1['nominee_name'],
                "nominee_type" => $form1['nominee_type'],
            ],
            [
                "nominee_name" => $form1['nominee_name2'],
                "nominee_type" => $form1['nominee_type2'],
            ],
        ];


        $form1['settlor'] = [
            "name" => $form1['settlor_name'],
            "id" => $form1['settlor_id'],
            "address" => $form1['settlor_address'],
        ];

        $form1['trustee'] = [
            "name" => $form1['trustee_name'],
            "id" => $form1['trustee_id'],
            "address" => $form1['trustee_address'],
        ];

        $form1['protector'] = [
            "name" => $form1['protector_name'],
            "id" => $form1['protector_id'],
            "address" => $form1['protector_address'],
        ];

        $form1['beneficiary_class_of_beneficiary'] = [
            "name" => $form1['beneficiary_name'],
            "id" => $form1['beneficiary_id'],
            "address" => $form1['beneficiary_address'],
        ];

        $form1['other_bo_information'] = [
            "name" => $form1['bo_name'],
            "id" => $form1['bo_id'],
            "address" => $form1['bo_address'],
        ];


        return view('customerduediligence.customerduediligenceform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'preparer' => $preparer,
            'countries' => $countries,
            'purposeOfTrx' => $purpose_of_trx,
            'occupationType' => $occupation_type,
            'row' => $row

        ]);
    }


    public function submittedCustomerRiskProfilingForm($form_id, $state)
    {
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



        return view('customerriskprofiling.customerriskprofilingform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'sales_name' => $preparer,
            'row' => $row,
            'branch' => $branch

        ]);
    }



    public function createdForm($form_id, $state)

    {

        $row = DB::table('istr_AMLAForm1 as t1')
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
            ->where('t1.form_id', $form_id)
            ->whereRaw("(t2.status != 'Deleted' OR t2.status IS NULL)")
            ->get();
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
        $countries = collect([
            (object) ['Country_Name' => 'Malaysia'],
            (object) ['Country_Name' => 'Singapore'],
            (object) ['Country_Name' => 'Indonesia'],
            (object) ['Country_Name' => 'Thailand'],
            (object) ['Country_Name' => 'Brunei'],
        ]);
        $purpose_of_trx = collect([
            (object) ['Purpose_Name' => 'Purchase of Goods'],
            (object) ['Purpose_Name' => 'Payment for Services'],
            (object) ['Purpose_Name' => 'Business Investment'],
            (object) ['Purpose_Name' => 'Loan Repayment'],
            (object) ['Purpose_Name' => 'Salary Payment'],
            (object) ['Purpose_Name' => 'Property Purchase'],
            (object) ['Purpose_Name' => 'Property Rental'],
            (object) ['Purpose_Name' => 'Transfer to Family'],
            (object) ['Purpose_Name' => 'Personal Expenses'],
            (object) ['Purpose_Name' => 'Savings'],
            (object) ['Purpose_Name' => 'Donation'],
            (object) ['Purpose_Name' => 'Other'],
        ]);
        $occupation_type = collect([
            (object) ['Occupation_Name' => 'Business Owner'],
            (object) ['Occupation_Name' => 'Company Director'],
            (object) ['Occupation_Name' => 'Manager'],
            (object) ['Occupation_Name' => 'Executive'],
            (object) ['Occupation_Name' => 'Engineer'],
            (object) ['Occupation_Name' => 'Accountant'],
            (object) ['Occupation_Name' => 'Doctor'],
            (object) ['Occupation_Name' => 'Lawyer'],
            (object) ['Occupation_Name' => 'Teacher'],
            (object) ['Occupation_Name' => 'Government Employee'],
            (object) ['Occupation_Name' => 'Private Sector Employee'],
            (object) ['Occupation_Name' => 'Self-Employed'],
            (object) ['Occupation_Name' => 'Professional'],
            (object) ['Occupation_Name' => 'Student'],
            (object) ['Occupation_Name' => 'Retired'],
            (object) ['Occupation_Name' => 'Homemaker'],
            (object) ['Occupation_Name' => 'Unemployed'],
            (object) ['Occupation_Name' => 'Freelancer'],
            (object) ['Occupation_Name' => 'Consultant'],
            (object) ['Occupation_Name' => 'Other'],
        ]);
        $form = AmlaForm::where('form_id', $form_id)->first();

        $form1 = AmlaForm1::where('form_id', $form_id)->first();
        $form1['shareholder'] = [
            [
                "shareholder_name" => $form1['shareholder_name'],
                "share_type" => $form1['share_type'],
                "share_percent" => $form1['share_percent'],
            ],
            [
                "shareholder_name" => $form1['shareholder_name2'],
                "share_type" => $form1['share_type2'],
                "share_percent" => $form1['share_percent2'],
            ],
        ];


        $form1['nominee'] = [
            [
                "nominee_name" => $form1['nominee_name'],
                "nominee_type" => $form1['nominee_type'],
            ],
            [
                "nominee_name" => $form1['nominee_name2'],
                "nominee_type" => $form1['nominee_type2'],
            ],
        ];


        $form1['settlor'] = [
            "name" => $form1['settlor_name'],
            "id" => $form1['settlor_id'],
            "address" => $form1['settlor_address'],
        ];

        $form1['trustee'] = [
            "name" => $form1['trustee_name'],
            "id" => $form1['trustee_id'],
            "address" => $form1['trustee_address'],
        ];

        $form1['protector'] = [
            "name" => $form1['protector_name'],
            "id" => $form1['protector_id'],
            "address" => $form1['protector_address'],
        ];

        $form1['beneficiary_class_of_beneficiary'] = [
            "name" => $form1['beneficiary_name'],
            "id" => $form1['beneficiary_id'],
            "address" => $form1['beneficiary_address'],
        ];

        $form1['other_bo_information'] = [
            "name" => $form1['bo_name'],
            "id" => $form1['bo_id'],
            "address" => $form1['bo_address'],
        ];


        return view('customerduediligence.customerduediligenceform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'preparer' => $preparer,
            'countries' => $countries,
            'purposeOfTrx' => $purpose_of_trx,
            'occupationType' => $occupation_type,
            'row' => $row

        ]);
    }



    public function createdCustomerRiskProfilingForm($form_id, $state)

    {

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

        return view('customerriskprofiling.customerriskprofilingform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'sales_name' => $preparer,
            'row' => $row,
            'branch' => $branch,
        ]);
    }




    public function updateCustomerDueDiligenceForm(Request $request, $form_id)
    {
        // dd($request->all(), $form_id);
        $data = $request->validate([
            'branch_name' => 'nullable|string',
            'date' => 'nullable|date',
            'preparer_name' => 'nullable|string',

            'full_name' => 'nullable|string',
            'nric_passport' => 'nullable|string',
            'dob' => 'nullable|date',

            'residential_add' => 'nullable|string',
            'residential_town' => 'nullable|string',
            'residential_state' => 'nullable|string',
            'residential_postcode' => 'nullable|string',
            'residential_country' => 'nullable|string',

            'mailing_add' => 'nullable|string',
            'mailing_town' => 'nullable|string',
            'mailing_state' => 'nullable|string',
            'mailing_postcode' => 'nullable|string',
            'mailing_country' => 'nullable|string',

            'nationality' => 'nullable|string',

            'occupation_status' => 'nullable|string',
            'occupation_type' => 'nullable|string',

            'rank_reference' => 'nullable|string',
            'employer' => 'nullable|string',

            'nature_of_business_select' => 'nullable|string',
            'nature_of_business_text' => 'nullable|string',

            'contact_number' => 'nullable|string',

            'transaction_purpose' => 'nullable|string',
            'business_name' => 'nullable|string',
            'brn' => 'nullable|string',
            'business_type' => 'nullable|string',
            'other_text' => 'nullable|string',

            'country_incorp' => 'nullable|string',

            'registered_address' => 'nullable|string',
            'registered_town' => 'nullable|string',
            'registered_state' => 'nullable|string',
            'registered_postcode' => 'nullable|string',
            'registered_country' => 'nullable|string',

            'principal_address' => 'nullable|string',
            'principal_town' => 'nullable|string',
            'principal_state' => 'nullable|string',
            'principal_postcode' => 'nullable|string',
            'principal_country' => 'nullable|string',

            'principle_business' => 'nullable|string',

            'contact_no_2' => 'nullable|string',
            'transaction_purpose_2' => 'nullable|string',

            'director_name' => 'nullable|string',

            'shareholder.*.shareholder_name' => 'nullable|string',
            'shareholder.*.share_type' => 'nullable|string',
            'shareholder.*.share_percent' => 'nullable|numeric',

            'nominee' => 'nullable|array',
            'nominee.*.nominee_name' => 'nullable|string',
            'nominee.*.nominee_type' => 'nullable|string',

            'senior_name' => 'nullable|string',
            'senior_type' => 'nullable|string',
            'arrangement_name' => 'nullable|string',
            'arrangement_registration' => 'nullable|string',
            'arrangement_type' => 'nullable|string',
            'arrangement_other_text' => 'nullable|string',

            'country_registration' => 'nullable|string',

            'arrangement_address' => 'nullable|string',
            'arrangement_town' => 'nullable|string',
            'arrangement_state' => 'nullable|string',
            'arrangement_postcode' => 'nullable|string',
            'arrangement_country' => 'nullable|string',

            'principal_address_arrangement' => 'nullable|string',
            'principal_town_arrangement' => 'nullable|string',
            'principal_state_arrangement' => 'nullable|string',
            'principal_postcode_arrangement' => 'nullable|string',
            'principal_country_arrangement' => 'nullable|string',

            'principle_activity' => 'nullable|string',

            'contact_no_3' => 'nullable|string',
            'transaction_purpose_3' => 'nullable|string',

            'settlor.name' => 'nullable|string',
            'settlor.id' => 'nullable|string',
            'settlor.address' => 'nullable|string',

            'trustee.name' => 'nullable|string',
            'trustee.id' => 'nullable|string',
            'trustee.address' => 'nullable|string',

            'protector.name' => 'nullable|string',
            'protector.id' => 'nullable|string',
            'protector.address' => 'nullable|string',

            'beneficiary_class_of_beneficiary.name' => 'nullable|string',
            'beneficiary_class_of_beneficiary.id' => 'nullable|string',
            'beneficiary_class_of_beneficiary.address' => 'nullable|string',

            'other_bo_information.name' => 'nullable|string',
            'other_bo_information.id' => 'nullable|string',
            'other_bo_information.address' => 'nullable|string',


            'trust_text' => 'nullable|string',
            'transacting_name' => 'nullable|string',
            'transacting_nric_passport' => 'nullable|string',
            'transacting_dob' => 'nullable|date',

            'transacting_address' => 'nullable|string',
            'transacting_town' => 'nullable|string',
            'transacting_state' => 'nullable|string',
            'transacting_postcode' => 'nullable|string',
            'transacting_country' => 'nullable|string',

            'transacting_nationality' => 'nullable|string',

            'transacting_occupation' => 'nullable|string',
            'transacting_employer' => 'nullable|string',
            'transacting_contact' => 'nullable|string',
            'transacting_occupation_status' => 'nullable|string',
        ]);

        $data_header = $request->validate([
            'trx_no' => 'nullable|string',
            'sales_date' => 'nullable|date',
            'branch_name' => 'nullable|string',
            'doc_no' => 'nullable|string'
        ]);

        $shareholders = $data['shareholder'] ?? [];

        $data['shareholder_name'] = $shareholders[0]['shareholder_name'] ?? null;
        $data['share_type'] = $shareholders[0]['share_type'] ?? null;
        $data['share_percent'] = $shareholders[0]['share_percent'] ?? null;

        $data['shareholder_name2'] = $shareholders[1]['shareholder_name'] ?? null;
        $data['share_type2'] = $shareholders[1]['share_type'] ?? null;
        $data['share_percent2'] = $shareholders[1]['share_percent'] ?? null;


        $nominees = $data['nominee'] ?? [];

        $data['nominee_name'] = $nominees[0]['nominee_name'] ?? null;
        $data['nominee_type'] = $nominees[0]['nominee_type'] ?? null;

        $data['nominee_name2'] = $nominees[1]['nominee_name'] ?? null;
        $data['nominee_type2'] = $nominees[1]['nominee_type'] ?? null;


        $settlor = $data['settlor'] ?? [];

        $data['settlor_name'] = $settlor['name'] ?? null;
        $data['settlor_id'] = $settlor['id'] ?? null;
        $data['settlor_address'] = $settlor['address'] ?? null;

        $trustee = $data['trustee'] ?? [];

        $data['trustee_name'] = $trustee['name'] ?? null;
        $data['trustee_id'] = $trustee['id'] ?? null;
        $data['trustee_address'] = $trustee['address'] ?? null;


        $protector = $data['protector'] ?? [];

        $data['protector_name'] = $protector['name'] ?? null;
        $data['protector_id'] = $protector['id'] ?? null;
        $data['protector_address'] = $protector['address'] ?? null;


        $beneficiary = $data['beneficiary_class_of_beneficiary'] ?? [];

        $data['beneficiary_name'] = $beneficiary['name'] ?? null;
        $data['beneficiary_id'] = $beneficiary['id'] ?? null;
        $data['beneficiary_address'] = $beneficiary['address'] ?? null;

        $otherBO = $data['other_bo_information'] ?? [];

        $data['bo_name'] = $otherBO['name'] ?? null;
        $data['bo_id'] = $otherBO['id'] ?? null;
        $data['bo_address'] = $otherBO['address'] ?? null;
        $data['isMyKadReader'] = 0;
        $data_header['status'] = "New";
        $data_header['updated_date'] = now();
        $data['form_id'] = $form_id;
        // $submittedHeaderForm = AmlaForm::create($data_header);
        $form = AmlaForm::findOrFail($form_id);
        $form->update($data_header);
        $form1 = AmlaForm1::findOrFail($form_id);
        $form1->update($data);
        return redirect()->back();
        // AmlaForm1::create(
        //     $data
        // );

        // return redirect("/createdForm/{$form_id}/1");
    }

    public function updateCustomerRiskProfilingForm(Request $request, $form_id)
    {
        $data = $request->validate([
            'branch_name' => 'nullable|string',
            'cust_name' => 'required|string',
            'date' => 'nullable|date_format:Y-m-d',
            'contact' => 'required|string',
            'sales_name' => 'required|string',

            'total_mark' => 'nullable|numeric',
            'risk_rating' => 'nullable|string',
            'cust_type' => 'nullable|string',

            'individual' => 'nullable|numeric',
            'legal_clubs' => 'nullable|numeric',
            'legal_arrangement' => 'nullable|numeric',

            'non_pep' => 'nullable|numeric',
            'local_pep' => 'nullable|numeric',
            'foreign_pep' => 'nullable|numeric',

            'high_net_worth_no_low' => 'nullable|numeric',
            'high_net_worth_yes_high' => 'nullable|numeric',
            'high_net_worth_comments' => 'nullable|string',

            'nric_passport' => 'required|string',

            'businessSize_small_low' => 'nullable|numeric',
            'businessSize_large_high' => 'nullable|numeric',
            'businessSize_comments' => 'nullable|string',
            'businessType_lowrisk_low' => 'nullable|numeric',
            'businessType_highrisk_high' => 'nullable|numeric',
            'CDD_clear_low' => 'nullable|numeric',
            'CDD_vague_high' => 'nullable|numeric',
            'beneficial_no_low' => 'nullable|numeric',
            'beneficial_yes_high' => 'nullable|numeric',
            'trade_no_low' => 'nullable|numeric',
            'trade_yes_high' => 'nullable|numeric',
            'remark_no_low' => 'nullable|numeric',
            'remark_yes_high' => 'nullable|numeric',
            'yes_state' => 'nullable|string',
            'originCountry_lowrisk_low' => 'nullable|numeric',
            'originCountry_taxhaven_medium' => 'nullable|numeric',
            'originCountry_FATF_high' => 'nullable|numeric',
            'countryResidence_lowrisk_low' => 'nullable|numeric',
            'countryResidence_taxhaven_medium' => 'nullable|numeric',
            'countryResidence_FATF_high' => 'nullable|numeric',
            'product_nongold_low' => 'nullable|numeric',
            'product_diamondgem_medium' => 'nullable|numeric',
            'product_gold_high' => 'nullable|numeric',
            'delivery_face2face_low' => 'nullable|numeric',
            'delivery_behalf_medium' => 'nullable|numeric',
            'delivery_non_face2face_high' => 'nullable|numeric',
            'payment_electronic_low' => 'nullable|numeric',
            'payment_cash_medium' => 'nullable|numeric',
            'payment_cash_high' => 'nullable|numeric',
            'transaction_fundFrom_local_low' => 'nullable|numeric',
            'transaction_fundFrom_foreign_medium' => 'nullable|numeric',
            'transaction_fundFrom_high' => 'nullable|numeric',
            'transaction_fundFrom_known_low' => 'nullable|numeric',
            'transaction_fundFrom_unrelated_high' => 'nullable|numeric',
            'transaction_fundTrans_local_low' => 'nullable|numeric',
            'transaction_fundTrans_foreign_medium' => 'nullable|numeric',
            'transaction_fundTrans_highrisk_high' => 'nullable|numeric',
            'transaction_fundTrans_known_low' => 'nullable|numeric',
            'transaction_fundTrans_unrelated_high' => 'nullable|numeric',
            'individual_minusCash' => 'nullable|numeric',
            'individual_minusCash_percentage' => 'nullable|numeric',
            'nonindividual_minusCash' => 'nullable|numeric',
            'nonindividual_minusCash_percentage' => 'nullable|numeric',
            'individual_minusnonCash' => 'nullable|numeric',
            'individual_minusnonCash_percentage' => 'nullable|numeric',
            'nonindividual_minusnonCash' => 'nullable|numeric',
            'nonindividual_minusnonCash_percentage' => 'nullable|numeric',
            'riskrating' => 'nullable|string',
            'riskrating_transaction' => 'nullable|string',
            'is_cust_sus' => 'nullable|string',
            'cust_sus_reason' => 'nullable|string',
            'is_cust_info_complete' => 'nullable|string',
            'is_internal_str_required' => 'nullable|string',
            'conclusion_comment' => 'nullable|string',
            'prepared_name' => 'nullable|string',
            'prepared_designation' => 'nullable|string',
            'prepared_date' => 'nullable|date_format:Y-m-d',
            'reviewed_name' => 'nullable|string',
            'reviewed_designation' => 'nullable|string',
            'reviewed_date' => 'nullable|date_format:Y-m-d',
            'prepared_signature' => 'nullable|string',
            'reviewed_signature' => 'nullable|string',
        ]);

        $data_header = $request->validate([
            'trx_no' => 'nullable|string',
            'sales_date' => 'nullable|date',
            'branch_name' => 'nullable|string',
            'doc_no' => 'nullable|string'
        ]);

        $data_header['status'] = "New";
        $data_header['updated_date'] = now();

        $data['form_id'] = $form_id;
        $form = AmlaForm::findOrFail($form_id);
        $form->update($data_header);
        $form2 = AmlaForm2::findOrFail($form_id);


        if ($request->prepared_signature_cleared == '1') {
            $data['prepared_signature'] = null;
        }

        if ($request->reviewed_signature_cleared == '1') {
            $data['reviewed_signature'] = null;
        }
        if (
            !empty($data['prepared_signature']) &&
            str_starts_with($data['prepared_signature'], 'data:image')
        ) {

            $image = $data['prepared_signature'];

            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'uploads/prepared_signature_' . time() . '.png';

            Storage::disk('public')->put(
                $fileName,
                base64_decode($image)
            );

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => 'Form_No_2',
                'file_name' => $fileName,
                'createdAt' => now(),
            ]);

            $data['prepared_signature'] = $fileName;
        }


        if (
            !empty($data['reviewed_signature']) &&
            str_starts_with($data['reviewed_signature'], 'data:image')
        ) {

            $image = $data['reviewed_signature'];

            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'uploads/reviewed_signature_' . time() . '.png';

            Storage::disk('public')->put(
                $fileName,
                base64_decode($image)
            );

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => 'Form_No_2',
                'file_name' => $fileName,
                'createdAt' => now(),
            ]);

            $data['reviewed_signature'] = $fileName;
        }

        if (!empty($data['riskrating_transaction']) and !empty($data['riskrating'])) {
            $data['riskrating_transaction'] = $data['riskrating_transaction'] . '_' . $data['riskrating'];
        }

        $form2->update($data);
        if ($data['is_internal_str_required'] === "yes") {

            $mail = DB::table('MAS_MAIL_LIST')
                ->select(
                    'Branch_ID',
                    'Host',
                    'Subject',
                    'Body',
                    'SenderEmail',
                    'SenderName',
                    'Recipient',
                    'Port',
                    'Username',
                    'Password',
                    'SMTPSecure'
                )
                ->where('Purpose', 'Form_No_2-edit.php')
                ->first();

            if ($mail) {

                $pdfPath = storage_path(
                    'app/public/generated-pdf/' . $mail->Branch_ID . '_' . 'CRP' . '_' . $form_id . '_' . now()->format('YmdHis') . '.pdf'
                );

                $php = PHP_BINARY;
                $artisan = base_path('artisan');

                $command = 'start /B "" '
                    . escapeshellarg($php) . ' '
                    . escapeshellarg($artisan) . ' app:generate-pdf '
                    . escapeshellarg($form_id) . ' '
                    . escapeshellarg(1) . ' '
                    . escapeshellarg($pdfPath)
                    . ' > NUL 2>&1';

                pclose(popen($command, 'r'));

                $maxWait = 5; // seconds
                $start = time();


                while (!file_exists($pdfPath) && (time() - $start) < $maxWait) {
                    usleep(500000); // 0.5 second
                }

                $decryptedPassword = openssl_decrypt(
                    $mail->Password,
                    'AES-256-CBC',
                    'amlaformGTWik7jsDMA3SmXOcLBXCpT2',
                    0,
                    'amlaformvaUno9Oj'
                );
                $mailer = Mail::build([
                    'transport'  => 'smtp',
                    'host'       => $mail->Host,
                    'port'       => $mail->Port,
                    'encryption' => $mail->SMTPSecure,
                    'username'   => $mail->Username,
                    'password'   => $decryptedPassword,
                ]);

                $recipients = json_decode($mail->Recipient, true);

                foreach ($recipients as $recipient) {

                    $email = new SendMail(
                        $mail->SenderEmail,
                        $mail->SenderName,
                        $mail->Subject,
                        $mail->Body
                    );

                    $email->attach(
                        $pdfPath,
                        [
                            'mime' => 'application/pdf',
                        ]
                    );

                    $mailer->to(trim($recipient))->send($email);
                }
            }
        }
        return redirect()->back();
    }

    public function submitCustomerDueDiligenceForm(Request $request, $form_id)
    {
        $data_header['status'] = "Submitted";
        $form = AmlaForm::findOrFail($form_id);
        $form->update($data_header);
        return redirect("/submittedCustomerDueDiligenceForm/{$form_id}/2");
    }

    public function submitCustomerRiskProfilingForm(Request $request, $form_id)
    {
        $data_header['status'] = "Submitted";
        $form = AmlaForm::findOrFail($form_id);
        $form->update($data_header);
        if ($request->is_internal_str_required === "yes") {

            $mail = DB::table('MAS_MAIL_LIST')
                ->select(
                    'Branch_ID',
                    'Host',
                    'Subject',
                    'Body',
                    'SenderEmail',
                    'SenderName',
                    'Recipient',
                    'Port',
                    'Username',
                    'Password',
                    'SMTPSecure'
                )
                ->where('Purpose', 'Form_No_2-edit.php')
                ->first();

            if ($mail) {

                $pdfPath = storage_path(
                    'app/public/generated-pdf/' . $mail->Branch_ID . '_' . 'CRP' . '_' . $form_id . '_' . now()->format('YmdHis') . '.pdf'
                );

                $php = PHP_BINARY;
                $artisan = base_path('artisan');

                $command = 'start /B "" '
                    . escapeshellarg($php) . ' '
                    . escapeshellarg($artisan) . ' app:generate-pdf '
                    . escapeshellarg($form_id) . ' '
                    . escapeshellarg(2) . ' '
                    . escapeshellarg($pdfPath)
                    . ' > NUL 2>&1';

                pclose(popen($command, 'r'));

                $maxWait = 5; // seconds
                $start = time();


                while (!file_exists($pdfPath) && (time() - $start) < $maxWait) {
                    usleep(500000); // 0.5 second
                }

                $decryptedPassword = openssl_decrypt(
                    $mail->Password,
                    'AES-256-CBC',
                    'amlaformGTWik7jsDMA3SmXOcLBXCpT2',
                    0,
                    'amlaformvaUno9Oj'
                );
                $mailer = Mail::build([
                    'transport'  => 'smtp',
                    'host'       => $mail->Host,
                    'port'       => $mail->Port,
                    'encryption' => $mail->SMTPSecure,
                    'username'   => $mail->Username,
                    'password'   => $decryptedPassword,
                ]);

                $recipients = json_decode($mail->Recipient, true);

                foreach ($recipients as $recipient) {

                    $email = new SendMail(
                        $mail->SenderEmail,
                        $mail->SenderName,
                        $mail->Subject,
                        $mail->Body
                    );

                    $email->attach(
                        $pdfPath,
                        [
                            'mime' => 'application/pdf',
                        ]
                    );

                    $mailer->to(trim($recipient))->send($email);
                }
            }
        }
        return redirect("/submittedCustomerRiskProfilingForm/{$form_id}/2");
    }
    public function create(Request $request)
    {

        $data = $request->validate([
            'branch_name' => 'nullable|string',
            'date' => 'nullable|date',
            'preparer_name' => 'nullable|string',

            'full_name' => 'nullable|string',
            'nric_passport' => 'nullable|string',
            'dob' => 'nullable|date',

            'residential_add' => 'nullable|string',
            'residential_town' => 'nullable|string',
            'residential_state' => 'nullable|string',
            'residential_postcode' => 'nullable|string',
            'residential_country' => 'nullable|string',

            'mailing_add' => 'nullable|string',
            'mailing_town' => 'nullable|string',
            'mailing_state' => 'nullable|string',
            'mailing_postcode' => 'nullable|string',
            'mailing_country' => 'nullable|string',

            'nationality' => 'nullable|string',

            'occupation_status' => 'nullable|string',
            'occupation_type' => 'nullable|string',

            'rank_reference' => 'nullable|string',
            'employer' => 'nullable|string',

            'nature_of_business_select' => 'nullable|string',
            'nature_of_business_text' => 'nullable|string',

            'contact_number' => 'nullable|string',

            'transaction_purpose' => 'nullable|string',
            'business_name' => 'nullable|string',
            'brn' => 'nullable|string',
            'business_type' => 'nullable|string',
            'other_text' => 'nullable|string',

            'country_incorp' => 'nullable|string',

            'registered_address' => 'nullable|string',
            'registered_town' => 'nullable|string',
            'registered_state' => 'nullable|string',
            'registered_postcode' => 'nullable|string',
            'registered_country' => 'nullable|string',

            'principal_address' => 'nullable|string',
            'principal_town' => 'nullable|string',
            'principal_state' => 'nullable|string',
            'principal_postcode' => 'nullable|string',
            'principal_country' => 'nullable|string',

            'principle_business' => 'nullable|string',

            'contact_no_2' => 'nullable|string',
            'transaction_purpose_2' => 'nullable|string',

            'director_name' => 'nullable|string',

            'shareholder.*.shareholder_name' => 'nullable|string',
            'shareholder.*.share_type' => 'nullable|string',
            'shareholder.*.share_percent' => 'nullable|numeric',

            'nominee' => 'nullable|array',
            'nominee.*.nominee_name' => 'nullable|string',
            'nominee.*.nominee_type' => 'nullable|string',

            'senior_name' => 'nullable|string',
            'senior_type' => 'nullable|string',
            'arrangement_name' => 'nullable|string',
            'arrangement_registration' => 'nullable|string',
            'arrangement_type' => 'nullable|string',
            'arrangement_other_text' => 'nullable|string',

            'country_registration' => 'nullable|string',

            'arrangement_address' => 'nullable|string',
            'arrangement_town' => 'nullable|string',
            'arrangement_state' => 'nullable|string',
            'arrangement_postcode' => 'nullable|string',
            'arrangement_country' => 'nullable|string',

            'principal_address_arrangement' => 'nullable|string',
            'principal_town_arrangement' => 'nullable|string',
            'principal_state_arrangement' => 'nullable|string',
            'principal_postcode_arrangement' => 'nullable|string',
            'principal_country_arrangement' => 'nullable|string',

            'principle_activity' => 'nullable|string',

            'contact_no_3' => 'nullable|string',
            'transaction_purpose_3' => 'nullable|string',

            'settlor.name' => 'nullable|string',
            'settlor.id' => 'nullable|string',
            'settlor.address' => 'nullable|string',

            'trustee.name' => 'nullable|string',
            'trustee.id' => 'nullable|string',
            'trustee.address' => 'nullable|string',

            'protector.name' => 'nullable|string',
            'protector.id' => 'nullable|string',
            'protector.address' => 'nullable|string',

            'beneficiary_class_of_beneficiary.name' => 'nullable|string',
            'beneficiary_class_of_beneficiary.id' => 'nullable|string',
            'beneficiary_class_of_beneficiary.address' => 'nullable|string',

            'other_bo_information.name' => 'nullable|string',
            'other_bo_information.id' => 'nullable|string',
            'other_bo_information.address' => 'nullable|string',


            'trust_text' => 'nullable|string',
            'transacting_name' => 'nullable|string',
            'transacting_nric_passport' => 'nullable|string',
            'transacting_dob' => 'nullable|date',

            'transacting_address' => 'nullable|string',
            'transacting_town' => 'nullable|string',
            'transacting_state' => 'nullable|string',
            'transacting_postcode' => 'nullable|string',
            'transacting_country' => 'nullable|string',

            'transacting_nationality' => 'nullable|string',

            'transacting_occupation' => 'nullable|string',
            'transacting_employer' => 'nullable|string',
            'transacting_contact' => 'nullable|string',
            'transacting_occupation_status' => 'nullable|string',
        ]);

        $data_header = $request->validate([
            'trx_no' => 'nullable|string',
            'sales_date' => 'nullable|date',
            'branch_name' => 'nullable|string',
            'doc_no' => 'nullable|string'
        ]);

        $shareholders = $data['shareholder'] ?? [];

        $data['shareholder_name'] = $shareholders[0]['shareholder_name'] ?? null;
        $data['share_type'] = $shareholders[0]['share_type'] ?? null;
        $data['share_percent'] = $shareholders[0]['share_percent'] ?? null;

        $data['shareholder_name2'] = $shareholders[1]['shareholder_name'] ?? null;
        $data['share_type2'] = $shareholders[1]['share_type'] ?? null;
        $data['share_percent2'] = $shareholders[1]['share_percent'] ?? null;


        $nominees = $data['nominee'] ?? [];

        $data['nominee_name'] = $nominees[0]['nominee_name'] ?? null;
        $data['nominee_type'] = $nominees[0]['nominee_type'] ?? null;

        $data['nominee_name2'] = $nominees[1]['nominee_name'] ?? null;
        $data['nominee_type2'] = $nominees[1]['nominee_type'] ?? null;


        $settlor = $data['settlor'] ?? [];

        $data['settlor_name'] = $settlor['name'] ?? null;
        $data['settlor_id'] = $settlor['id'] ?? null;
        $data['settlor_address'] = $settlor['address'] ?? null;

        $trustee = $data['trustee'] ?? [];

        $data['trustee_name'] = $trustee['name'] ?? null;
        $data['trustee_id'] = $trustee['id'] ?? null;
        $data['trustee_address'] = $trustee['address'] ?? null;


        $protector = $data['protector'] ?? [];

        $data['protector_name'] = $protector['name'] ?? null;
        $data['protector_id'] = $protector['id'] ?? null;
        $data['protector_address'] = $protector['address'] ?? null;


        $beneficiary = $data['beneficiary_class_of_beneficiary'] ?? [];

        $data['beneficiary_name'] = $beneficiary['name'] ?? null;
        $data['beneficiary_id'] = $beneficiary['id'] ?? null;
        $data['beneficiary_address'] = $beneficiary['address'] ?? null;

        $otherBO = $data['other_bo_information'] ?? [];

        $data['bo_name'] = $otherBO['name'] ?? null;
        $data['bo_id'] = $otherBO['id'] ?? null;
        $data['bo_address'] = $otherBO['address'] ?? null;
        $data['isMyKadReader'] = 0;
        $data_header['status'] = "New";
        $data_header['form_type'] = "Form_No_1";
        $data_header['created_date'] = now();
        $submittedHeaderForm = AmlaForm::create($data_header);
        $form_id = $submittedHeaderForm->form_id;
        $data['form_id'] = $form_id;
        AmlaForm1::create(
            $data
        );

        return redirect("/createdForm/{$form_id}/1");
    }

    public function createCustomerRiskProfilingForm(Request $request)
    {

        $data = $request->validate([
            'branch_name' => 'nullable|string',
            'cust_name' => 'required|string',
            'date' => 'nullable|date_format:Y-m-d',
            'contact' => 'required|string',
            'sales_name' => 'required|string',

            'total_mark' => 'nullable|numeric',
            'risk_rating' => 'nullable|string',
            'cust_type' => 'nullable|string',

            'individual' => 'nullable|numeric',
            'legal_clubs' => 'nullable|numeric',
            'legal_arrangement' => 'nullable|numeric',

            'non_pep' => 'nullable|numeric',
            'local_pep' => 'nullable|numeric',
            'foreign_pep' => 'nullable|numeric',

            'high_net_worth_no_low' => 'nullable|numeric',
            'high_net_worth_yes_high' => 'nullable|numeric',
            'high_net_worth_comments' => 'nullable|string',

            'nric_passport' => 'required|string',

            'businessSize_small_low' => 'nullable|numeric',
            'businessSize_large_high' => 'nullable|numeric',
            'businessSize_comments' => 'nullable|string',
            'businessType_lowrisk_low' => 'nullable|numeric',
            'businessType_highrisk_high' => 'nullable|numeric',
            'CDD_clear_low' => 'nullable|numeric',
            'CDD_vague_high' => 'nullable|numeric',
            'beneficial_no_low' => 'nullable|numeric',
            'beneficial_yes_high' => 'nullable|numeric',
            'trade_no_low' => 'nullable|numeric',
            'trade_yes_high' => 'nullable|numeric',
            'remark_no_low' => 'nullable|numeric',
            'remark_yes_high' => 'nullable|numeric',
            'yes_state' => 'nullable|string',
            'originCountry_lowrisk_low' => 'nullable|numeric',
            'originCountry_taxhaven_medium' => 'nullable|numeric',
            'originCountry_FATF_high' => 'nullable|numeric',
            'countryResidence_lowrisk_low' => 'nullable|numeric',
            'countryResidence_taxhaven_medium' => 'nullable|numeric',
            'countryResidence_FATF_high' => 'nullable|numeric',
            'product_nongold_low' => 'nullable|numeric',
            'product_diamondgem_medium' => 'nullable|numeric',
            'product_gold_high' => 'nullable|numeric',
            'delivery_face2face_low' => 'nullable|numeric',
            'delivery_behalf_medium' => 'nullable|numeric',
            'delivery_non_face2face_high' => 'nullable|numeric',
            'payment_electronic_low' => 'nullable|numeric',
            'payment_cash_medium' => 'nullable|numeric',
            'payment_cash_high' => 'nullable|numeric',
            'transaction_fundFrom_local_low' => 'nullable|numeric',
            'transaction_fundFrom_foreign_medium' => 'nullable|numeric',
            'transaction_fundFrom_high' => 'nullable|numeric',
            'transaction_fundFrom_known_low' => 'nullable|numeric',
            'transaction_fundFrom_unrelated_high' => 'nullable|numeric',
            'transaction_fundTrans_local_low' => 'nullable|numeric',
            'transaction_fundTrans_foreign_medium' => 'nullable|numeric',
            'transaction_fundTrans_highrisk_high' => 'nullable|numeric',
            'transaction_fundTrans_known_low' => 'nullable|numeric',
            'transaction_fundTrans_unrelated_high' => 'nullable|numeric',
            'individual_minusCash' => 'nullable|numeric',
            'individual_minusCash_percentage' => 'nullable|numeric',
            'nonindividual_minusCash' => 'nullable|numeric',
            'nonindividual_minusCash_percentage' => 'nullable|numeric',
            'individual_minusnonCash' => 'nullable|numeric',
            'individual_minusnonCash_percentage' => 'nullable|numeric',
            'nonindividual_minusnonCash' => 'nullable|numeric',
            'nonindividual_minusnonCash_percentage' => 'nullable|numeric',
            'riskrating' => 'nullable|string',
            'riskrating_transaction' => 'nullable|string',
            'is_cust_sus' => 'nullable|string',
            'cust_sus_reason' => 'nullable|string',
            'is_cust_info_complete' => 'nullable|string',
            'is_internal_str_required' => 'nullable|string',
            'conclusion_comment' => 'nullable|string',
            'prepared_name' => 'nullable|string',
            'prepared_designation' => 'nullable|string',
            'prepared_date' => 'nullable|date_format:Y-m-d',
            'reviewed_name' => 'nullable|string',
            'reviewed_designation' => 'nullable|string',
            'reviewed_date' => 'nullable|date_format:Y-m-d',
            'prepared_signature' => 'nullable|string',
            'reviewed_signature' => 'nullable|string',
        ]);

        $data_header = $request->validate([
            'trx_no' => 'nullable|string',
            'sales_date' => 'nullable|date',
            'branch_name' => 'nullable|string',
            'doc_no' => 'nullable|string'
        ]);

        $data_header['status'] = "New";
        $data_header['form_type'] = "Form_No_2";
        $data_header['created_date'] = now();
        $submittedHeaderForm = AmlaForm::create($data_header);
        $form_id = $submittedHeaderForm->form_id;
        $data['form_id'] = $form_id;

        if ($request->prepared_signature_cleared == '1') {
            $data['prepared_signature'] = null;
        }

        if ($request->reviewed_signature_cleared == '1') {
            $data['reviewed_signature'] = null;
        }
        if (
            !empty($data['prepared_signature']) &&
            str_starts_with($data['prepared_signature'], 'data:image')
        ) {

            $image = $data['prepared_signature'];

            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'uploads/prepared_signature_' . time() . '.png';

            Storage::disk('public')->put(
                $fileName,
                base64_decode($image)
            );

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => 'Form_No_2',
                'file_name' => $fileName,
                'createdAt' => now(),
            ]);

            $data['prepared_signature'] = $fileName;
        }


        if (
            !empty($data['reviewed_signature']) &&
            str_starts_with($data['reviewed_signature'], 'data:image')
        ) {

            $image = $data['reviewed_signature'];

            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'uploads/reviewed_signature_' . time() . '.png';

            Storage::disk('public')->put(
                $fileName,
                base64_decode($image)
            );

            AmlaAttachment::create([
                'form_id' => $form_id,
                'form_type' => 'Form_No_2',
                'file_name' => $fileName,
                'createdAt' => now(),
            ]);

            $data['reviewed_signature'] = $fileName;
        }

        if (!empty($data['riskrating_transaction']) and !empty($data['riskrating'])) {
            $data['riskrating_transaction'] = $data['riskrating_transaction'] . '_' . $data['riskrating'];
        }


        AmlaForm2::create($data);
        if ($data['is_internal_str_required'] === "yes") {

            $mail = DB::table('MAS_MAIL_LIST')
                ->select(
                    'Branch_ID',
                    'Host',
                    'Subject',
                    'Body',
                    'SenderEmail',
                    'SenderName',
                    'Recipient',
                    'Port',
                    'Username',
                    'Password',
                    'SMTPSecure'
                )
                ->where('Purpose', 'Form_No_2.php')
                ->first();

            if ($mail) {

                $pdfPath = storage_path(
                    'app/public/generated-pdf/' . $mail->Branch_ID . '_' . 'CRP' . '_' . $form_id . '_' . now()->format('YmdHis') . '.pdf'
                );

                $php = PHP_BINARY;
                $artisan = base_path('artisan');

                $command = 'start /B "" '
                    . escapeshellarg($php) . ' '
                    . escapeshellarg($artisan) . ' app:generate-pdf '
                    . escapeshellarg($form_id) . ' '
                    . escapeshellarg(1) . ' '
                    . escapeshellarg($pdfPath)
                    . ' > NUL 2>&1';

                pclose(popen($command, 'r'));

                $maxWait = 5; // seconds
                $start = time();


                while (!file_exists($pdfPath) && (time() - $start) < $maxWait) {
                    usleep(500000); // 0.5 second
                }

                $decryptedPassword = openssl_decrypt(
                    $mail->Password,
                    'AES-256-CBC',
                    'amlaformGTWik7jsDMA3SmXOcLBXCpT2',
                    0,
                    'amlaformvaUno9Oj'
                );
                $mailer = Mail::build([
                    'transport'  => 'smtp',
                    'host'       => $mail->Host,
                    'port'       => $mail->Port,
                    'encryption' => $mail->SMTPSecure,
                    'username'   => $mail->Username,
                    'password'   => $decryptedPassword,
                ]);

                $recipients = json_decode($mail->Recipient, true);

                foreach ($recipients as $recipient) {

                    $email = new SendMail(
                        $mail->SenderEmail,
                        $mail->SenderName,
                        $mail->Subject,
                        $mail->Body
                    );

                    $email->attach(
                        $pdfPath,
                        [
                            'mime' => 'application/pdf',
                        ]
                    );

                    $mailer->to(trim($recipient))->send($email);
                }
            }
        }

        return redirect("/createdCustomerRiskProfilingForm/{$form_id}/1");
    }

    public function uploadImages(Request $request, $form_id, $form_type)
    {
        $validator = Validator::make($request->all(), [
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                // $filename = time() . '_' . $image->getClientOriginalName();
                $filename = $image->getClientOriginalName();

                $path = $image->storeAs('photos',  $filename, 'public');
                $path = str_replace('photos/', '', $path);

                AmlaAttachment::create([
                    'form_id' => $form_id,
                    'form_type' => $form_type,
                    'file_name' => $path,
                    'createdAt' => now(),
                ]);

                $paths[] = $path;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Images uploaded successfully.',
            'paths' => $paths,
        ]);
    }
}
