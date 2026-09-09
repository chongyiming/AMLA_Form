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
                        <label>Customer AML Risk Rating </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$branch"
                                name="branch"
                                field="Branch_Code"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Occupation</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please fill in the occupation in "OTHERS" if not in the list given. e.g. OTHERS: [Doctor]</div>
                        </div>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="cust_occu"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Occupation Description</label>
                        <input type="text" name="cust_occu_desc" class="form-control" value="{{ old('cust_occu_desc', $form1->cust_occu_desc ?? '') }}">
                        <label class="mt-1">Employer Name</label>
                        <input type="text" name="cust_emp_name" class="form-control" value="{{ old('cust_emp_name', $form1->cust_emp_name ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Employment Sector</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please fill in the sector in "OTHERS" if not in the list given. e.g. OTHERS: [Forestry]
                            </div>
                        </div>

                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$sector"
                                name="cust_emp_sec"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Annual Income Range (RM) </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$branch"
                                name="branch"
                                field="Branch_Code"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Marital Status </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$marital"
                                name="cust_marital"
                                field="Status"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Spouse Name</label>
                        <input type="text" name="cust_spouse_name" class="form-control" value="{{ old('cust_spouse_name', $form1->cust_spouse_name ?? '') }}">
                        <label class="mt-1">Spouse Nationality </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$branch"
                                name="branch"
                                field="Branch_Code"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1">Spouse ID No (NRIC)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                e.g. 780101141234
                            </div>
                        </div>
                        <input type="text" name="cust_spouse_nric" class="form-control" value="{{ old('cust_spouse_nric', $form1->cust_spouse_nric ?? '') }}">
                        <label class="mt-1">Spouse ID No (Passport)</label>
                        <input type="text" name="cust_spouse_passport" class="form-control" value="{{ old('cust_spouse_passport', $form1->cust_spouse_passport ?? '') }}">
                        <label class="mt-1">Spouse Other ID</label>
                        <input type="text" name="cust_spouse_other_id" class="form-control" value="{{ old('cust_spouse_other_id', $form1->cust_spouse_other_id ?? '') }}">
                        <label class="mt-1">Spouse Date of Birth</label>
                        <input type="date" name="cust_spouse_dob" class="form-control mb-3" value="{{ old('cust_spouse_dob', $form1->cust_spouse_dob ?? '') }}">

                    </td>
                </tr>

        </table>


        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>