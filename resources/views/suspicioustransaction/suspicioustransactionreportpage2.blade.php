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

        #cust_phone_country {
            width: 0 !important;
            padding-right: 0 !important;

        }

        .iti__country-selector {
            width: 200px !important;
        }

        .iti__country-container {
            height: 30px;
        }
    </style>


</head>

<body>
    <div class="container" id="container">
        <p class="fs-6 text-end">Form_STR-DPMS-I</p>


        <table class="table table-bordered align-middle table-sm mt-1">
            <thead class="bg-light">
                <tr>
                    <th data-i18n="messages.str_customer_info_header">
                        Customer Information
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label data-i18n="messages.str_title">Title</label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$title"
                                name="cust_title"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_name">Name</span> <span class="text-danger"> *</span></label>
                        <input type="text" name="cust_name" class="form-control" value="{{ old('cust_name', $form1->cust_name ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_other_name_alias">Other Name/Alias</label>
                        <input type="text" name="cust_name_alias" class="form-control" value="{{ old('cust_name_alias', $form1->cust_name_alias ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_gender">Gender</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$genders"
                                name="cust_gender"
                                field="Gender"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_nationality">Nationality</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="cust_nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1"><span data-i18n="messages.str_id_no_nric">Identification No (NRIC)</span> <span class="text-danger"> *</span></label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_nric_example">
                                e.g. 780101141234
                            </div>
                        </div>
                        <input type="text" name="cust_nric" class="form-control" value="{{ old('cust_nric', $form1->cust_nric ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_id_no_passport">Identification No (Passport)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_passport_optional">
                                Non-mandatory field if customer is Malaysian. Mandatory if they are foreigner
                            </div>
                        </div>
                        <input type="text" name="cust_passport" class="form-control" value="{{ old('cust_passport', $form1->cust_passport ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_other_id">Other ID</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_other_id">
                                Other ID known besides IC No. or Passport No. </div>
                        </div>
                        <input type="text" name="cust_other_id" class="form-control" value="{{ old('cust_other_id', $form1->cust_other_id ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_date_of_birth">Date of Birth</span> <span class="text-danger"> *</span> </label>
                        <input type="date" name="cust_dob" class="form-control" value="{{ old('cust_dob', $form1->cust_dob ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_residential_address">Residential Address</span> <span class="text-danger"> *</span> </label>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text" data-i18n="messages.str_address">Address</span>
                            <input type="text" class="form-control" name="cust_res_address" value="{{ old('cust_res_address', $form1->cust_res_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_town">Town</span>
                                <input type="text" class="form-control" name="cust_res_town" value="{{ old('cust_res_town', $form1->cust_res_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_postcode">Postcode</span>
                                <input type="text" class="form-control" name="cust_res_postcode" value="{{ old('cust_res_postcode', $form1->cust_res_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="cust_res_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="cust_res_nationality"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_correspondence_address">Correspondence Address</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_correspondence_address">
                                Only fill in if the correspondence address is not same as residential address</div>
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text" data-i18n="messages.str_address">Address</span>
                            <input type="text" class="form-control" name="cust_corr_address" value="{{ old('cust_corr_address', $form1->cust_corr_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_town">Town</span>
                                <input type="text" class="form-control" name="cust_corr_town" value="{{ old('cust_corr_town', $form1->cust_corr_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_postcode">Postcode</span>
                                <input type="text" class="form-control" name="cust_corr_postcode" value="{{ old('cust_corr_postcode', $form1->cust_corr_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="cust_corr_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="cust_corr_country"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <label class="mt-1" data-i18n="messages.str_email_address">Email Address</label>
                        <input type="text" name="cust_email" class="form-control" value="{{ old('cust_email', $form1->cust_email ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_contact_no">Contact No</span> <span class="text-danger"> *</span> </label>
                        <div class="d-flex gap-5">

                            <input type="hidden" id="cust_phone_country_value" name="cust_phone_country" value="{{ old('cust_phone_country', $form1->cust_phone_country ?? '') }}">
                            <input type="text" id="cust_phone_country" class="form-control" autocomplete="off" style="height: 30px" tabindex="-1">


                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text" data-i18n="messages.str_phone_no">Phone No</span>
                                <input type="text" class="form-control" name="cust_phone" value="{{ old('cust_phone', $form1->cust_phone ?? '') }}">
                            </div>
                        </div>
                    </td>
                </tr>

        </table>


        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>
<script>
    (function() {
        const input = document.querySelector("#cust_phone_country");
        const dialCodeInput = document.querySelector("#cust_phone_country_value");
        const iti = window.intlTelInput(input, {
            separateDialCode: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/js/utils.js"),
        });

        function syncDialCode() {
            const country = iti.getSelectedCountry();
            if (country && country.dialCode) {
                dialCodeInput.value = country.name + ' (' + country.dialCode + ')';
            }
        }

        if (dialCodeInput.value) {
            const saved = dialCodeInput.value.match(/^(.+?)\s*\((\d+)\)$/);
            if (saved) {
                const country = window.intlTelInput.getAllCountries().find(function(c) {
                    return c.name === saved[1] && c.dialCode === saved[2];
                });
                if (country) {
                    iti.setSelectedCountry(country.iso2);
                } else {
                    iti.setNumber('+' + saved[2]);
                }
            }
            input.value = '';
            syncDialCode();
        }

        input.addEventListener('countrychange', syncDialCode);


    })();
</script>

</html>