<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;

        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
        }

        .modal-label {
            width: 100px;
            align-items: center;
            display: flex;

        }

        .modal-input {
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            font-weight: 500;
            width: 150px;
            border: 1px solid #ddd;
            flex: 1;

        }

        .table-container {
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div id="trxModal" class="modal">
        <div class="modal-content">
            <h3 data-i18n="messages.searchTrxNo"></h3>
            <div style="display: flex;gap:10px;flex-direction:column">
                <div style="display: flex;flex-direction:row;gap:10px;width:400px">
                    <label class="modal-label" data-i18n="messages.branch">
                    </label>
                    <select id="branch_name" name="branch" class="modal-input" data-old-value="{{ old('branch', data_get($form1, 'branch_name')) }}">
                    </select>
                </div>

                <div style="display: flex;flex-direction:row;gap:10px;width:400px">
                    <label class="modal-label" data-i18n="messages.salesDate">
                    </label>
                    <input type="date" id="salesDate" name="sales_date" class="modal-input" value="{{ old('sales_date', data_get($form, 'sales_date') ? \Carbon\Carbon::parse(data_get($form, 'sales_date'))->format('Y-m-d') : '') }}">
                    <button type="button" class="btn btn-outline-dark" onclick="searchTrx()"
                        data-i18n="messages.search"></button>


                </div>
                <div class="table-container">
                    <x-searchable-table
                        :columns="[
                    [ 'field'=>'trx_no',
                    'label'=>'messages.trxno',
                    'placeholder'=>'messages.searchTrx'
                    ],
                    [
                    'field'=>'total_amount',
                    'label'=>'messages.totalAmount',
                    'placeholder'=>'messages.searchAmount'
                    ],
                    [
                    'field'=>'customer_name',
                    'label'=>'messages.customer',
                    'placeholder'=>'messages.searchCustomer'
                    ],
                    [
                    'field'=>'salesperson',
                    'label'=>'messages.salesperson',
                    'placeholder'=>'messages.searchSalesperson'
                    ],
                    [
                    'field'=>'cashier',
                    'label'=>'messages.cashier',
                    'placeholder'=>'messages.searchCashier'
                    ]
                    ]"></x-searchable-table>
                </div>

                <div style="display: flex; justify-content: space-between; margin-top: 30px;">


                    <button type="button" class="btn btn-outline-dark" onclick="clearTrxModal()"
                        data-i18n="messages.clear"></button>
                    <button type="button" class="btn btn-outline-dark" onclick="closeTrxModal()"
                        data-i18n="messages.close"></button>


                </div>
            </div>





        </div>
    </div>

    <script>
        async function openTrxModal() {
            await loadBranches();
            document.getElementById("trxModal").style.display = "flex";
        }

        function closeTrxModal() {
            document.getElementById("trxModal").style.display = "none";
        }


        function selectTrx(value) {
            document.querySelectorAll('[name="trx_no"]').forEach(function(input) {
                input.value = value;
            });
            closeTrxModal();
        }


        async function loadBranches() {

            const response = await fetch('/branches');
            const branches = await response.json();
            const select = document.getElementById('branch_name');

            select.innerHTML = '<option value="" data-i18n="messages.selectBranch"></option>';
            applyTranslations();
            branches.forEach(branch => {
                select.innerHTML += `
            <option value="${branch.Branch_Code}">
                ${branch.Branch_Code}
            </option>
        `;
            });

            const oldValue = select.dataset.oldValue;
            if (oldValue) {
                select.value = oldValue;
            }
        }

        async function searchTrx() {
            let branch = document.getElementById("branch_name").value;
            let salesDate = document.getElementById("salesDate").value;

            const response = await fetch(`/search-trx?branch=${branch}&sales_date=${salesDate}`);
            const sales = await response.json();

            let tbody = document.getElementById("trxTableBody");
            tbody.innerHTML = "";

            sales.forEach(trx => {
                let row = `
                <tr onclick="selectTrx('${trx.TrxNo}')" style="cursor: pointer;">
                <td>${trx.TrxNo}</td>
                <td>${trx.TotalAmount}</td>
                <td>${trx.Customer_name}</td>
                <td>${trx.Salesperson}</td>
                <td>${trx.CreateBy}</td>
            </tr>
        `;

                tbody.innerHTML += row;
            });
        }



        function clearTrxModal() {
            const modal = document.getElementById("trxModal");

            modal.querySelectorAll("input, select, textarea").forEach(element => {
                if (element.type === "checkbox" || element.type === "radio") {
                    element.checked = false;
                } else {
                    element.value = "";
                }
            });
            document.getElementById("trxTableBody").innerHTML = "";
            const trxnos = document.querySelectorAll('[name="trx_no"]');

            trxnos.forEach(input => {
                input.value = '';
            });
            closeTrxModal();
        }
    </script>
</body>

</html>