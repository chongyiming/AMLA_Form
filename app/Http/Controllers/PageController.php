<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmlaForm1;
use App\Models\AmlaForm;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //


    public function createForm()
    {
        // dd(session('form_data'));
        // dd(session()->all());
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
        return view('customerduediligenceform', [
            'state' => 0,
            'form1' => null,
            'form' => null,
            'preparer' => $preparer
        ]);
    }

    public function submittedForm($form_id, $state)
    {
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
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


        return view('customerduediligenceform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'preparer' => $preparer
        ]);
    }




    public function createdForm($form_id, $state)

    {
        $preparer = DB::table('SER_USERPROFILE')
            ->select('USERNAME')
            ->where('USERISACTIVE', '1')
            ->get();
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


        return view('customerduediligenceform', [
            'form_id' => $form_id,
            'state' => $state,
            'form' => $form,
            'form1' => $form1,
            'preparer' => $preparer
        ]);
    }

    // public function customerduediligenceform($form_id)
    // {
    //     // dd($form_id);
    //     // dd(session()->all());
    //     return view('customerduediligenceform');
    // }

    public function update(Request $request, $form_id)
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

    public function submit(Request $request, $form_id)
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
        $data_header['status'] = "Submitted";
        $form = AmlaForm::findOrFail($form_id);
        $form->update($data_header);
        $form1 = AmlaForm1::findOrFail($form_id);
        $form1->update($data);
        // return redirect("/success");
        return redirect("/submittedForm/{$form_id}/2");
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // dd(App::getLocale());
        // Step A: Validate

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
        $submittedHeaderForm = AmlaForm::create($data_header);
        $form_id = $submittedHeaderForm->form_id;
        $data['form_id'] = $form_id;
        AmlaForm1::create(
            $data
        );

        return redirect("/createdForm/{$form_id}/1");
    }
}
