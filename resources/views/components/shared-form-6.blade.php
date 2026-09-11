<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;

        }

        .container {
            width: 750px;
            height: 1080px;
            padding-bottom: 10px;
            margin: auto;
            box-sizing: border-box;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;

        }







        .footer {
            margin-top: auto;
            font-size: 10px;
        }

        h1 {
            font-weight: 100;
            text-align: center;
        }



        .table th,
        .table td {
            padding: 2px 10px !important;

        }

        textarea {
            resize: none !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad/dist/signature_pad.umd.min.js"></script>


</head>

<body>
    <div class="container" id="container">
        <p class="fs-6 text-end">Form_STR-DPMS-I</p>


        <table class="table table-bordered align-middle table-sm mt-1">
            <thead class="bg-light">
                <tr>
                <tr>
                    <th data-i18n="{{ $headerKey }}"></th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>

                        <label class="mt-1"><span data-i18n="messages.str_contact_no">Contact No</span> <span class="text-danger"> *</span></label>
                        <input type="text" name="settlor_contact" class="form-control" value="{{ old('settlor_contact', $form1->settlor_contact ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_customer_aml_risk_rating">Customer AML Risk Rating</label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$riskRating"
                                name="settlor_aml_rating"
                                field="Risk_Rating"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1"><span data-i18n="messages.str_occupation">Occupation</span> <span class="text-danger"> *</span></label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_occupation_others">
                                Please fill in the occupation in "OTHERS" if not in the list given. e.g. OTHERS: [Doctor]</div>
                        </div>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="settlor_occupation"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_occupation_description">Occupation Description</label>
                        <input type="text" name="settlor_occupation_desc" class="form-control" value="{{ old('settlor_occupation_desc', $form1->settlor_occupation_desc ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_employer_name">Employer Name</label>
                        <input type="text" name="settlor_employer" class="form-control" value="{{ old('settlor_employer', $form1->settlor_employer ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_employment_sector">Employment Sector</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_sector_others">
                                Please fill in the sector in "OTHERS" if not in the list given. e.g. OTHERS: [Forestry]</div>
                        </div>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$sector"
                                name="settlor_emp_sector"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_annual_income_range">Annual Income Range (RM) </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$annualIncome"
                                name="settlor_income_range"
                                field="Range"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_marital_status">Marital Status </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$marital"
                                name="settlor_marital_status"
                                field="Status"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_spouse_name">Spouse Name</label>
                        <input type="text" name="settlor_spouse_name" class="form-control" value="{{ old('settlor_spouse_name', $form1->settlor_spouse_name ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_spouse_nationality">Spouse Nationality </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="settlor_spouse_nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_spouse_id_nric">Spouse ID No (NRIC)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_nric_example">
                                e.g. 780101141234</div>
                        </div>
                        <input type="text" name="settlor_spouse_nric" class="form-control" value="{{ old('settlor_spouse_nric', $form1->settlor_spouse_nric ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_spouse_id_passport">Spouse ID No (Passport)</label>
                        <input type="text" name="settlor_spouse_passport" class="form-control" value="{{ old('settlor_spouse_passport', $form1->settlor_spouse_passport ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_spouse_other_id">Spouse Other ID</label>
                        <input type="text" name="settlor_spouse_other_id" class="form-control" value="{{ old('settlor_spouse_other_id', $form1->settlor_spouse_other_id ?? '') }}">
                        @if (($headerKey ?? null) === 'messages.str_signatory_director_bo_header')
                        <label class="mt-1" data-i18n="messages.str_spouse_dob">Spouse Date of Birth</label>
                        <input type="date" name="settlor_spouse_dob" class="form-control mb-3" value="{{ old('settlor_spouse_dob', $form1->settlor_spouse_dob ?? '') }}">
                        @elseif (($headerKey ?? null) === 'messages.str_settlor_protector_beneficiary_header')
                        <label class="mt-1" data-i18n="messages.str_spouse_dob">Spouse Date of Birth</label>
                        <input type="date" name="settlor_spouse_dob" class="form-control" value="{{ old('settlor_spouse_dob', $form1->settlor_spouse_dob ?? '') }}">
                        <label class="mt-1">Relationship with Settlor</label>
                        <input type="date" name="settlor_spouse_relationship" class="form-control" value="{{ old('settlor_spouse_relationship', $form1->settlor_spouse_relationship ?? '') }}">
                        @endif

                    </td>
                </tr>

        </table>


        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>