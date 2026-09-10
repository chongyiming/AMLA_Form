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
                    <th data-i18n="messages.str_relationship_firm_header">
                        Relationship with Firm
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="mt-1"><span data-i18n="messages.str_product_type_throughout">Type of Product Purchased/Rendered Throughout Relationship</span> <span class="text-danger"> *</span> </label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$productType"
                                name="firm_producttype"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="show" />
                        </div>
                        <label class="mt-1" data-i18n="messages.str_specify_others">Specify Others </label>
                        <input type="text" name="firm_other" class="form-control" value="{{ old('firm_other', $form1->firm_other ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_quantity">Quantity</span> <span class="text-danger"> *</span> </label>
                        <input type="number" name="firm_quantity" class="form-control" value="{{ old('firm_quantity', $form1->firm_quantity ?? '') }}">
                        <label class="mt-1"><span data-i18n="messages.str_amount_myr">Amount (RM)</span> <span class="text-danger"> *</span> </label>
                        <input type="number" step="0.01" min="0" name="firm_amt" class="form-control" value="{{ old('firm_amt', $form1->firm_amt ?? '') }}">
                        <div class="d-flex gap-3 align-items-center">
                            <label class="mt-1"><span data-i18n="messages.str_date_relationship_established">Date relationship established</span> <span class="text-danger"> *</span></label>
                            <div class="form-text fst-italic" style="font-size: 0.75rem;">
                                Please select the dropdown menu below for date selection
                            </div>
                        </div>
                        <input type="date" name="firm_date" class="form-control" value="{{ old('firm_date', $form1->firm_date ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_total_services_purchases">Total number of services/purchases throughout relationship</label>
                        <input type="number" name="firm_serv" class="form-control" value="{{ old('firm_serv', $form1->firm_serv ?? '') }}">
                        <label class="mt-1" data-i18n="messages.str_total_transaction_amount">Total transaction amount throughout relationship (RM)</label>
                        <input type="number" step="0.01" min="0" name="firm_trans_amt" class="form-control mb-3" value="{{ old('firm_trans_amt', $form1->firm_trans_amt ?? '') }}">

                    </td>
                </tr>

        </table>

        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>