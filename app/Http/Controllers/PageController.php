<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmlaForm1;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    //
    public function show()
    {
        // dd(session('form_data'));
        // dd(session()->all());
        return view('home');
    }

    public function store(Request $request)
    {
        // dd(session()->all());
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
        AmlaForm1::create($data);
        return redirect('/success');
    }
}
