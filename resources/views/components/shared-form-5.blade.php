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
        <p class="fs-6 text-end">{{$formNo}}</p>


        <table class="table table-bordered align-middle table-sm mt-1">
            <thead class="bg-light">
                <tr>
                    <th data-i18n="{{ $headerKey }}"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label><span data-i18n="messages.str_role">Role</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="settlor_role"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label data-i18n="messages.str_title">Title</label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$title"
                                name="settlor_title"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_name">Name</span> <span class="text-danger"> *</span></label>
                        <input type="text" name="settlor_name" class="form-control" value="{{ old('settlor_name', $form1->settlor_name ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_other_name_alias">Other Name/Alias</label>
                        <input type="text" name="settlor_alias" class="form-control" value="{{ old('settlor_alias', $form1->settlor_alias ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_gender">Gender</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$genders"
                                name="settlor_gender"
                                field="Gender"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_nationality">Nationality</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="settlor_nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1"><span data-i18n="messages.str_id_no_nric">Identification No (NRIC)</span> <span class="text-danger"> *</span></label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_nric_example">
                                e.g. 780101141234</div>
                        </div>
                        <input type="text" name="settlor_id" class="form-control" value="{{ old('settlor_id', $form1->settlor_id ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_id_no_passport">Identification No (Passport) </label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_passport_optional">
                                Non-mandatory field if customer is Malaysian. Mandatory if they are foreigner</div>
                        </div>
                        <input type="date" name="settlor_passport" class="form-control" value="{{ old('settlor_passport', $form1->settlor_passport ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_other_id">Other ID </label>
                        <input type="date" name="settlor_other_id" class="form-control" value="{{ old('settlor_other_id', $form1->settlor_other_id ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_date_of_birth">Date of Birth</span> <span class="text-danger"> *</span> </label>
                        <input type="date" name="settlor_dob" class="form-control" value="{{ old('settlor_dob', $form1->settlor_dob ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_residential_address">Residential Address</span> <span class="text-danger"> *</span> </label>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text" data-i18n="messages.str_address">Address</span>
                            <input type="text" class="form-control" name="settlor_address" value="{{ old('settlor_address', $form1->settlor_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_town">Town</span>
                                <input type="text" class="form-control" name="settlor_town" value="{{ old('settlor_town', $form1->settlor_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_postcode">Postcode</span>
                                <input type="text" class="form-control" name="settlor_postcode" value="{{ old('settlor_postcode', $form1->settlor_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="settlor_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="settlor_country"
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
                            <input type="text" class="form-control" name="settlor_corr_address" value="{{ old('settlor_corr_address', $form1->settlor_corr_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_town">Town</span>
                                <input type="text" class="form-control" name="settlor_corr_town" value="{{ old('settlor_corr_town', $form1->settlor_corr_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text" data-i18n="messages.str_postcode">Postcode</span>
                                <input type="text" class="form-control" name="settlor_corr_postcode" value="{{ old('settlor_corr_postcode', $form1->settlor_corr_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="settlor_corr_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="settlor_corr_country"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <label class="mt-1" data-i18n="messages.str_email_address">Email Address</label>
                        <input type="text" name="settlor_email" class="form-control mb-2" value="{{ old('settlor_email', $form1->settlor_email ?? '') }}">

                    </td>
                </tr>

        </table>


        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>