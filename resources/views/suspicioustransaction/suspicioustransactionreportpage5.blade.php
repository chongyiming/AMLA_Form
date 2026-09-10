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
                    <th>
                        Key Suspicious Transactions Details
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Identification No (NRIC)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                e.g. 780101141234. Field is only required if RIs filled 'Name of Person Conducting Transaction'
                            </div>
                        </div>
                        <input type="text" name="sus_nric" class="form-control" value="{{ old('sus_nric', $form1->sus_nric ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Identification No (Passport)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Field is only required if RIs filled 'Name of Person Conducting Transaction
                            </div>
                        </div>
                        <input type="text" name="sus_passport" class="form-control" value="{{ old('sus_passport', $form1->sus_passport ?? '') }}">
                        <label class="mt-1">Other ID</label>
                        <input type="text" name="sus_other_id" class="form-control" value="{{ old('sus_other_id', $form1->sus_other_id ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Date of Birth</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please click the dropdown menu below for date selection
                            </div>
                        </div>
                        <input type="date" name="sus_dob" class="form-control" value="{{ old('sus_dob', $form1->sus_dob ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Address</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Field is only required if RIs filled 'Name of Person Conducting Transaction
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text">Address</span>
                            <input type="text" name="sus_address" class="form-control" value="{{ old('sus_address', $form1->sus_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Town</span>
                                <input type="text" name="sus_town" class="form-control" value="{{ old('sus_town', $form1->sus_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Postcode</span>
                                <input type="text" name="sus_postcode" class="form-control" value="{{ old('sus_postcode', $form1->sus_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="sus_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="sus_country"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Correspondence Address</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Only fill in if the correspondence address is not same as residential address </div>
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text">Address</span>
                            <input type="text" name="sus_corr_address" class="form-control" value="{{ old('sus_corr_address', $form1->sus_corr_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Town</span>
                                <input type="text" name="sus_corr_town" class="form-control" value="{{ old('sus_corr_town', $form1->sus_corr_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Postcode</span>
                                <input type="text" name="sus_corr_postcode" class="form-control" value="{{ old('sus_corr_postcode', $form1->sus_corr_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="sus_corr_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="sus_corr_country"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <label class="mt-1">Email Address</label>
                        <input type="text" name="sus_email" class="form-control" value="{{ old('sus_email', $form1->sus_email ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Contact No</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Field is only required if RIs filled 'Name of Person Conducting Transaction</div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$branch"
                                    name="sus_phone_country"
                                    field="Branch_Code"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div class="input-group input-group-sm mb-2">
                                <span class="input-group-text">Phone No</span>
                                <input type="text" name="sus_phone" class="form-control" value="{{ old('sus_phone', $form1->sus_phone ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Occupation</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please fill in the occupation in "OTHERS" if not in the list given. e.g. OTHERS: [Doctor]</div>
                        </div>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="sus_occu"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Relationship with Customer/Accountholder</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please fill in the relationship in "OTHERS" if not in the list given. e.g. OTHERS: [Parents]</div>
                        </div>
                        <div style="height: 35px;width:100%" class="mb-3">
                            <x-searchable-dropdown
                                :options="$relationship"
                                name="sus_relationship"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                    </td>
                </tr>

        </table>

        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>