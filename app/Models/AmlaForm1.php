<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmlaForm1 extends Model
{
    //
    protected $table = 'istr_amla_form1';
    public $timestamps = false;
    protected $fillable = [
        'form_id',
        'branch_name',
        'date',
        'preparer_name',

        'full_name',
        'nric_passport',
        'dob',

        'residential_add',
        'residential_town',
        'residential_state',
        'residential_postcode',
        'residential_country',

        'mailing_add',
        'mailing_town',
        'mailing_state',
        'mailing_postcode',
        'mailing_country',

        'nationality',

        'occupation_type',
        'occupation_status',
        'rank_reference',
        'employer',

        'contact_number',
        'transaction_purpose',

        'business_name',
        'brn',
        'business_type',
        'other_text',

        'country_incorp',

        'registered_address',
        'registered_town',
        'registered_state',
        'registered_postcode',
        'registered_country',

        'principal_address',
        'principal_town',
        'principal_state',
        'principal_postcode',
        'principal_country',

        'principle_business',

        'contact_no_2',
        'transaction_purpose_2',

        'director_name',

        'shareholder_name',
        'share_type',
        'share_percent',

        'shareholder_name2',
        'share_type2',
        'share_percent2',

        'nominee_name',
        'nominee_type',
        'nominee_name2',
        'nominee_type2',

        'senior_name',
        'senior_type',

        'arrangement_name',
        'arrangement_registration',
        'arrangement_type',
        'arrangement_other_text',

        'country_registration',

        'arrangement_address',
        'arrangement_town',
        'arrangement_state',
        'arrangement_postcode',
        'arrangement_country',

        'principal_address_arrangement',
        'principal_town_arrangement',
        'principal_state_arrangement',
        'principal_postcode_arrangement',
        'principal_country_arrangement',

        'principle_activity',

        'contact_no_3',
        'transaction_purpose_3',

        'settlor_name',
        'settlor_id',
        'settlor_address',

        'trustee_name',
        'trustee_id',
        'trustee_address',

        'protector_name',
        'protector_id',
        'protector_address',

        'beneficiary_name',
        'beneficiary_id',
        'beneficiary_address',

        'bo_name',
        'bo_id',
        'bo_address',

        'trust_text',

        'transacting_name',
        'transacting_nric_passport',
        'transacting_dob',

        'transacting_address',
        'transacting_town',
        'transacting_state',
        'transacting_postcode',
        'transacting_country',

        'transacting_nationality',
        'transacting_occupation',
        'transacting_occupation_status',
        'transacting_employer',
        'transacting_contact',

        'isMyKadReader',

        'nature_of_business_select',
        'nature_of_business_text',

        'transacting_nature_of_business_select',
        'transacting_nature_of_business_text',
    ];
}
