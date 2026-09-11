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
                    <th data-i18n="messages.str_banking_account_header">
                        Banking Account Information
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="mt-1" data-i18n="messages.str_bank_name">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $form1->bank_name ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_bank_account_no">Bank Account No</label>
                        <input type="text" name="bank_acc_no" class="form-control" value="{{ old('bank_acc_no', $form1->bank_acc_no ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_bank_account_type">Bank Account Type </label>
                        <div style="height: 35px;">
                            <x-searchable-dropdown
                                :options="$bankAccount"
                                name="bank_acc_type"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_home_branch">Home Branch</label>
                        <input type="text" name="bank_home_branch" class="form-control mb-2" value="{{ old('bank_home_branch', $form1->bank_home_branch ?? '') }}">

                    </td>
                </tr>

        </table>
        <table class="table table-bordered align-middle table-sm">
            <thead class="bg-light">
                <tr>
                    <th data-i18n="messages.str_key_suspicious_header">
                        Key Suspicious Transactions Details
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="mt-1"><span data-i18n="messages.str_product_type">Type of Product Purchased/Rendered</span> <span class="text-danger"> *</span></label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$productType"
                                name="sus_trans_producttype"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_transaction_date">Transaction Date</span> <span class="text-danger"> *</span></label>
                        <div class="d-flex gap-5">
                            <input type="date" name="sus_trans_datefrom" class="form-control" value="{{ old('sus_trans_datefrom', $form1->sus_trans_datefrom ?? '') }}">
                            <input type="date" name="sus_trans_dateto" class="form-control" value="{{ old('sus_trans_dateto', $form1->sus_trans_dateto ?? '') }}">

                        </div>
                        <label class="mt-1"><span data-i18n="messages.str_transaction_amount_myr">Transaction Amount (RM)</span> <span class="text-danger"> *</span></label>
                        <input type="number" step="0.01" min="0" name="sus_trans_amt_myr" class="form-control" value="{{ old('sus_trans_amt_myr', $form1->sus_trans_amt_myr ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_transaction_currency">Transaction Currency </label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$currency"
                                name="sus_trans_currency"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_transaction_amount_fc">Transaction Amount (FC)</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_amount_fc">
                                Only required if transaction was done not using MYR
                            </div>
                        </div>
                        <input type="number" step="0.01" min="0" name="sus_trans_amt_fc" class="form-control" value="{{ old('sus_trans_amt_fc', $form1->sus_trans_amt_fc ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_title">Title</label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$title"
                                name="sus_title"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_name_person_conducting">Name of Person Conducting Transaction</label>
                        <input type="text" name="sus_name" class="form-control" value="{{ old('sus_name', $form1->sus_name ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_other_name_alias">Other Name/Alias</label>
                        <input type="text" name="sus_name_other" class="form-control" value="{{ old('sus_name_other', $form1->sus_name_other ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_gender">Gender</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_only_if_name_filled">
                                Field is only required if RIs filled 'Name of Person Conducting Transaction
                            </div>
                        </div>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$genders"
                                name="sus_gender"
                                field="Gender"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1" data-i18n="messages.str_nationality">Nationality</label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;" data-i18n="messages.str_hint_only_if_name_filled">
                                Field is only required if RIs filled 'Name of Person Conducting Transaction
                            </div>
                        </div>
                        <div style="height: 35px;width:100%;" class="mb-2">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="sus_nationality"
                                field="Country_Name"
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