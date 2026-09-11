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
                        Customer Information
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="mt-1">Business/Company Name <span class="text-danger"> *</span></label>
                        <input type="text" name="cust_name" class="form-control" value="{{ old('cust_name', $form1->cust_name ?? '') }}">
                        <label class="mt-1">Other Name/Previous Name</label>
                        <input type="text" name="other_name" class="form-control" value="{{ old('other_name', $form1->other_name ?? '') }}">
                        <label class="mt-1">Country of Incorporation <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$nationalityWithCode"
                                name="cust_nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Business Registration Number <span class="text-danger"> *</span></label>
                        <input type="text" name="cust_reg_number" class="form-control" value="{{ old('cust_reg_number', $form1->cust_reg_number ?? '') }}">
                        <label class="mt-1">Other Registration Number </label>
                        <input type="text" name="cust_other_reg" class="form-control" value="{{ old('cust_other_reg', $form1->cust_other_reg ?? '') }}">
                        <label class="mt-1">Date of Incorporation <span class="text-danger"> *</span> </label>
                        <input type="date" name="cust_dob" class="form-control" value="{{ old('cust_dob', $form1->cust_dob ?? '') }}">
                        <label class="mt-1">Business Address <span class="text-danger"> *</span> </label>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text">Address</span>
                            <input type="text" class="form-control" name="cust_address" value="{{ old('cust_address', $form1->cust_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Town</span>
                                <input type="text" class="form-control" name="cust_town" value="{{ old('cust_town', $form1->cust_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Postcode</span>
                                <input type="text" class="form-control" name="cust_postcode" value="{{ old('cust_postcode', $form1->cust_postcode ?? '') }}">
                            </div>
                        </div>
                        <div class="d-flex gap-5">
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$states"
                                    name="cust_state"
                                    field="State_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                            <div style="height: 30px;width:100%">
                                <x-searchable-dropdown
                                    :options="$nationalityWithCode"
                                    name="cust_country"
                                    field="Country_Name"
                                    :form1="$form1"
                                    border="show" />
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Correspondence Address</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Only fill in if the correspondence address is not same as residential address</div>
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text">Address</span>
                            <input type="text" class="form-control" name="cust_corr_address" value="{{ old('cust_corr_address', $form1->cust_corr_address ?? '') }}">
                        </div>
                        <div class="d-flex gap-5">
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Town</span>
                                <input type="text" class="form-control" name="cust_corr_town" value="{{ old('cust_corr_town', $form1->cust_corr_town ?? '') }}">
                            </div>
                            <div class="input-group input-group-sm mb-1">
                                <span class="input-group-text">Postcode</span>
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
                        <label class="mt-1">Email Address</label>
                        <input type="text" name="cust_email" class="form-control" value="{{ old('cust_email', $form1->cust_email ?? '') }}">
                        <label class="mt-1">Contact No (Office) <span class="text-danger"> *</span> </label>
                        <input type="text" name="cust_contact" class="form-control" value="{{ old('cust_contact', $form1->cust_contact ?? '') }}">
                        <label class="mt-1">Customer AML Risk Rating </label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$riskRating"
                                name="cust_aml_rating"
                                field="Risk_Rating"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Nature of Business <span class="text-danger"> *</span></label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please fill in the sector in "OTHERS" if not in the list given. e.g. OTHERS: [Forestry]</div>
                        </div>
                        <div style="height: 35px;width:100%" class="mb-2">
                            <x-searchable-dropdown
                                :options="$sector"
                                name="cust_emp_sector"
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