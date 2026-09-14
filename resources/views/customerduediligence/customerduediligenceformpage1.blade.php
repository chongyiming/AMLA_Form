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

        #non-border-table,
        #non-border-table th,
        #non-border-table td,
        #non-border-table tr {
            border: none !important;
        }

        .table th,
        .table td {
            padding: 2px !important;


        }

        .table .form-control,
        .table .form-select {
            padding-top: 4px !important;
            padding-bottom: 4px !important;
            font-size: 0.85rem;
            line-height: 1.2;
        }




        textarea {
            resize: none !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad/dist/signature_pad.umd.min.js"></script>


</head>

<body>
    <div class="container" id="container">
        <p class="fs-6 text-end">Form No. 1</p>

        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('pk-logo.jpeg'))) }}"
            style="width: 150px; margin: 0 auto;">
        <div class='fs-4 text-center'>Customer Due Diligence Form
        </div>
        <div class='fs-4 text-center'>客户尽职调查表格</div>
        <x-card
            title-key="messages.customerDueDiligence"
            :sections="[
        [
            'description' => 'messages.identificationAndVerificationOfACustomerAsRequiredUnder',
            'bullets' => [
                'messages.section_16_amla',
                'messages.paragraph_14_aml_cft',
            ],
        ],
    ]" />
        <table class="table align-middle table-sm mt-1" id="non-border-table">
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 30%;">
                <col style="width:10%;">
                <col style="width: 15%;">
                <col style="width: 30%;">
            </colgroup>
            <tbody>
                <tr>
                    <td><label data-i18n="messages.branch"></label></th>
                    <td><input type="text" class="form-control" name="branch_name" value="{{ old('branch_name', $form1->branch_name ?? '') }}"></td>
                    <td></td>
                    <td><label data-i18n="messages.formNo"></label></td>
                    <td><input type="text" class="form-control" name="doc_no" value="{{ old('doc_no', $form->doc_no ?? '') }}"></td>
                </tr>
                <tr>
                    <td><label data-i18n="messages.preparer"></label></th>
                    <td height="1"><x-searchable-dropdown
                            :options="$preparer"
                            name="preparer_name"
                            field="USERNAME"
                            :form1="$form1"
                            border="show" /></td>
                    <td></td>
                    <td><label data-i18n="messages.date"></label></td>
                    <td><input type="date" class="form-control" name="date" value="{{ old('date', $form1->date ?? '') }}"></td>
                </tr>

        </table>
        <table class="table table-bordered align-middle">
            <thead style="background-color:#2E74B5;color:white">
                <tr>
                    <th>1) <span data-i18n="messages.individual"></span></th>
                </tr>
        </table>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 40%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light" data-i18n="messages.full_name"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="full_name" value="{{ old('full_name', $form1->full_name ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.nric_passport_no"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="nric_passport" value="{{ old('nric_passport', $form1->nric_passport ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.date_of_birth"></th>
                    <td colspan="3"><input type="date" class="form-control border-0" name="dob" value="{{ old('dob', $form1->dob ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.residential_address"></th>
                    <td colspan="3"> <textarea class="form-control border-0" name="residential_add">{{ old('residential_add', $form1->residential_add ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="residential_town" value="{{ old('residential_town', $form1->residential_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="residential_state" value="{{ old('residential_state', $form1->residential_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="residential_postcode" value="{{ old('residential_postcode', $form1->residential_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td><input type="text" class="form-control border-0" name="residential_country" value="{{ old('residential_country', $form1->residential_country ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light">
                        <span data-i18n="messages.mailing_address"></span>
                        <label class="d-flex gap-3 align-items-center">
                            <span>(Please tick if same as above)</span>
                            <input class="form-check-input" type="checkbox" id="sameAsResidential1">
                        </label>

                    </th>
                    <td colspan="3"> <textarea class="form-control border-0" name="mailing_add">{{ old('mailing_add', $form1->mailing_add ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="mailing_town" value="{{ old('mailing_town', $form1->mailing_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="mailing_state" value="{{ old('mailing_state', $form1->mailing_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="mailing_postcode" value="{{ old('mailing_postcode', $form1->mailing_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td><input type="text" class="form-control border-0" name="mailing_country" value="{{ old('mailing_country', $form1->mailing_country ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.nationality"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.rank_reference"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="rank_reference" value="{{ old('rank_reference', $form1->rank_reference ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.occupation_type"></th>
                    <td>
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="occupation_status"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                    <td colspan="2">
                        <input type="text" class="form-control border-0" name="occupation_type" value="{{ old('occupation_type', $form1->occupation_type ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_employer"></th>
                    <td colspan="3">
                        <input type="text" class="form-control border-0" name="employer" value="{{ old('employer', $form1->employer ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.nature_of_business" rowspan="2"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$natureOfBusiness"
                                name="nature_of_business_select"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="text" class="form-control border-0" name="nature_of_business_text" value="{{ old('nature_of_business_text', $form1->nature_of_business_text ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.contact_number"></th>
                    <td colspan="3">
                        <input type="text" class="form-control border-0" name="contact_number" value="{{ old('contact_number', $form1->contact_number ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.purpose_of_transaction"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$purposeOfTrx"
                                name="transaction_purpose"
                                field="Purpose_Name"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>


        </table>
        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

    <script>
        (function() {
            const checkbox = document.getElementById('sameAsResidential1');
            const fields = ['add', 'town', 'state', 'postcode', 'country'];

            function copyResidentialToMailing() {
                fields.forEach(function(field) {
                    const residential = document.querySelector('[name="residential_' + field + '"]');
                    const mailing = document.querySelector('[name="mailing_' + field + '"]');
                    if (residential && mailing) {
                        mailing.value = residential.value;
                    }
                });
            }

            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    copyResidentialToMailing();
                }
            });


        })();
    </script>

</body>


</html>