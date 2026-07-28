<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('istr_amla_form1', function (Blueprint $table) {
            $table->id('form_id');

            $table->text('branch_name')->nullable();
            $table->date('date')->nullable();
            $table->text('preparer_name')->nullable();

            $table->text('full_name')->nullable();
            $table->text('nric_passport')->nullable();
            $table->date('dob')->nullable();

            $table->text('residential_add')->nullable();
            $table->text('residential_town')->nullable();
            $table->text('residential_state')->nullable();
            $table->text('residential_postcode')->nullable();
            $table->text('residential_country')->nullable();

            $table->text('mailing_add')->nullable();
            $table->text('mailing_town')->nullable();
            $table->text('mailing_state')->nullable();
            $table->text('mailing_postcode')->nullable();
            $table->text('mailing_country')->nullable();

            $table->text('nationality')->nullable();

            $table->text('occupation_type')->nullable();
            $table->text('occupation_status')->nullable();
            $table->text('rank_reference')->nullable();
            $table->text('employer')->nullable();

            $table->text('contact_number')->nullable();
            $table->text('transaction_purpose')->nullable();

            $table->text('business_name')->nullable();
            $table->text('brn')->nullable();
            $table->text('business_type')->nullable();
            $table->text('other_text')->nullable();

            $table->text('country_incorp')->nullable();

            $table->text('registered_address')->nullable();
            $table->text('registered_town')->nullable();
            $table->text('registered_state')->nullable();
            $table->text('registered_postcode')->nullable();
            $table->text('registered_country')->nullable();

            $table->text('principal_address')->nullable();
            $table->text('principal_town')->nullable();
            $table->text('principal_state')->nullable();
            $table->text('principal_postcode')->nullable();
            $table->text('principal_country')->nullable();

            $table->text('principle_business')->nullable();

            $table->text('contact_no_2')->nullable();
            $table->text('transaction_purpose_2')->nullable();

            $table->text('director_name')->nullable();

            $table->text('shareholder_name')->nullable();
            $table->text('share_type')->nullable();
            $table->decimal('share_percent', 18, 2)->nullable();

            $table->text('shareholder_name2')->nullable();
            $table->text('share_type2')->nullable();
            $table->decimal('share_percent2', 18, 2)->nullable();

            $table->text('nominee_name')->nullable();
            $table->text('nominee_type')->nullable();

            $table->text('nominee_name2')->nullable();
            $table->text('nominee_type2')->nullable();

            $table->text('senior_name')->nullable();
            $table->text('senior_type')->nullable();


            // Arrangement
            $table->text('arrangement_name')->nullable();
            $table->text('arrangement_registration')->nullable();
            $table->text('arrangement_type')->nullable();
            $table->text('arrangement_other_text')->nullable();

            $table->text('country_registration')->nullable();

            $table->text('arrangement_address')->nullable();
            $table->text('arrangement_town')->nullable();
            $table->text('arrangement_state')->nullable();
            $table->text('arrangement_postcode')->nullable();
            $table->text('arrangement_country')->nullable();

            $table->text('principal_address_arrangement')->nullable();
            $table->text('principal_town_arrangement')->nullable();
            $table->text('principal_state_arrangement')->nullable();
            $table->text('principal_postcode_arrangement')->nullable();
            $table->text('principal_country_arrangement')->nullable();

            $table->text('principle_activity')->nullable();

            $table->text('contact_no_3')->nullable();
            $table->text('transaction_purpose_3')->nullable();


            // Trust
            $table->text('settlor_name')->nullable();
            $table->text('settlor_id')->nullable();
            $table->text('settlor_address')->nullable();

            $table->text('trustee_name')->nullable();
            $table->text('trustee_id')->nullable();
            $table->text('trustee_address')->nullable();

            $table->text('protector_name')->nullable();
            $table->text('protector_id')->nullable();
            $table->text('protector_address')->nullable();

            $table->text('beneficiary_name')->nullable();
            $table->text('beneficiary_id')->nullable();
            $table->text('beneficiary_address')->nullable();

            $table->text('bo_name')->nullable();
            $table->text('bo_id')->nullable();
            $table->text('bo_address')->nullable();

            $table->text('trust_text')->nullable();


            // Transacting person
            $table->text('transacting_name')->nullable();
            $table->text('transacting_nric_passport')->nullable();
            $table->date('transacting_dob')->nullable();

            $table->text('transacting_address')->nullable();
            $table->text('transacting_town')->nullable();
            $table->text('transacting_state')->nullable();
            $table->text('transacting_postcode')->nullable();
            $table->text('transacting_country')->nullable();

            $table->text('transacting_nationality')->nullable();
            $table->text('transacting_occupation')->nullable();
            $table->text('transacting_occupation_status')->nullable();
            $table->text('transacting_employer')->nullable();
            $table->text('transacting_contact')->nullable();

            $table->integer('isMyKadReader')->default(0);


            $table->text('nature_of_business_select')->nullable();
            $table->text('nature_of_business_text')->nullable();

            $table->text('transacting_nature_of_business_select')->nullable();
            $table->text('transacting_nature_of_business_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istr_amla_form1');
    }
};
