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
            padding: 2px !important;
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
                        Relationship with Firm
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="mt-1">Type of Product Purchased/Rendered Throughout Relationship <span class="text-danger"> *</span> </label>
                        <div style="height: 35px;width:100%">
                            <x-searchable-dropdown
                                :options="$branch"
                                name="branch"
                                field="Branch_Code"
                                :form1=" $form1"
                                border="show" />
                        </div>
                        <label class="mt-1">Specify Others </label>
                        <input type="text" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        <label class="mt-1">Quantity <span class="text-danger"> *</span> </label>
                        <input type="text" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        <label class="mt-1">Amount (RM) <span class="text-danger"> *</span> </label>
                        <input type="text" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        <label class="mt-1">Date relationship established <span class="text-danger"> *</span></label>
                        <input type="date" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        <label class="mt-1">Total number of services/purchases throughout relationship</label>
                        <input type="text" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        <label class="mt-1">Total transaction amount throughout relationship (RM)</label>
                        <input type="text" name="reviewed_name" class="form-control mb-3" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">

                    </td>
                </tr>

        </table>

        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>

</html>