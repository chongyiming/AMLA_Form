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


        <table class="table table-bordered align-middle table-sm mt-2">
            <thead class="bg-light">
                <tr>
                    <th>
                        Nature of STR
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label>Attempted but not complete <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$choices"
                                name="attempted_not_complete"
                                field="Choice"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-3">STR is reported due to <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$reported"
                                name="str_reported_due"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-3">Please state relevant source <span class="text-danger"> *</span></label>
                        <div style="height: 35px;" class="mb-3">
                            <x-searchable-dropdown
                                :options="$source"
                                name="state_relevant_source"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                    </td>
                </tr>

        </table>
        <table class="table table-bordered align-middle table-sm">
            <thead class="bg-light">
                <tr>
                    <th>
                        Basis of Suspicion
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label>Suspected Predicate Offence <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$offence"
                                name="suspect_predicate"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-3">Red flag indicator <span class="text-danger"> *</span></label>
                        <textarea class="form-control"
                            name="red_flag_indicator">{{ old('red_flag_indicator', $form1->red_flag_indicator ?? '') }}</textarea>
                        <label class="mt-3">Description of transaction pattern and entities connected to the suspicious activities. Max 20,000 characters. <span class="text-danger"> *</span></label>
                        <textarea class="form-control"
                            name="description_trans_pattern">{{ old('description_trans_pattern', $form1->description_trans_pattern ?? '') }}</textarea>
                        <label class="mt-3">Details and reasons to support basis of suspicion. Max 20,000 characters. <span class="text-danger"> *</span></label>
                        <textarea class="form-control"
                            name="details_reasons">{{ old('details_reasons', $form1->details_reasons ?? '') }}</textarea>
                        <label class="mt-3">Related to Politically Exposed Persons (PEPs) <span class="text-danger"> *</span></label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$choices"
                                name="related_pep"
                                field="Choice"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-3">Description of relationship with PEPs</label>
                        <input type="text" name="description_relationship_pep" class="form-control" value="{{ old('description_relationship_pep', $form1->description_relationship_pep ?? '') }}">
                        <label class="mt-3">Keywords related to the report</label>
                        <input type="text" name="keyword_report" class="form-control mb-3" value="{{ old('keyword_report', $form1->keyword_report ?? '') }}">
                    </td>
                </tr>

        </table>

        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>