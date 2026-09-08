<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search Trx No</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-3 align-items-center" style="width: 400px;height:35px">
                        <label style="min-width: 100px;">Branch</label>
                        <x-searchable-dropdown
                            :options="$branch"
                            name="branch"
                            field="Branch_Code"
                            :form1=" $form1"
                            border="show" />
                    </div>

                    <div class="d-flex gap-3 mt-3 mb-3 align-items-center" style="width: 400px;">
                        <label style="min-width: 100px;">Sales Date</label>
                        <input type="date" class="form-control" name="sales_date" value="{{ old('sales_date', data_get($form, 'sales_date') ? \Carbon\Carbon::parse(data_get($form, 'sales_date'))->format('Y-m-d') : '') }}">
                        <button type="button" class="btn btn-outline-dark align-middle" onclick="searchTrx()">Search</button>

                    </div>


                    <x-searchable-table
                        :columns="[
                    [ 'field'=>'trx_no',
                    'label'=>'Trx No',
                    'placeholder'=>'Search Trx'
                    ],
                    [
                    'field'=>'total_amount',
                    'label'=>'Total Amount',
                    'placeholder'=>'Search Amount'
                    ],
                    [
                    'field'=>'customer_name',
                    'label'=>'Customer',
                    'placeholder'=>'Search Customer'
                    ],
                    [
                    'field'=>'salesperson',
                    'label'=>'Salesperson',
                    'placeholder'=>'Search Salesperson'
                    ],
                    [
                    'field'=>'cashier',
                    'label'=>'Cashier',
                    'placeholder'=>'Search Cashier'
                    ]
                    ]"></x-searchable-table>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" onclick="clearTrxModal()">Clear</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function closeTrxModal() {
        const modalEl = document.getElementById("exampleModal1");
        bootstrap.Modal.getOrCreateInstance(modalEl).hide();

    }

    function clearTrxModal() {
        const modalEl = document.getElementById("exampleModal1");

        // Branch (select2) -> reset value and refresh the select2 widget
        const branchEl = modalEl.querySelector('[name="branch"]');
        if (branchEl) {
            branchEl.value = "";
            if (window.jQuery) {
                jQuery(branchEl).val("").trigger("change");
            }
        }

        // Sales Date
        const salesDateEl = modalEl.querySelector('[name="sales_date"]');
        if (salesDateEl) salesDateEl.value = "";

        // Trx No (lives on the main form, outside the modal)
        document.querySelectorAll('[name="trx_no"]').forEach(function(input) {
            input.value = "";
        });

        // Clear the result table
        const tbody = document.getElementById("trxTableBody");
        if (tbody) tbody.innerHTML = "";
    }

    function selectTrx(value) {
        document.querySelectorAll('[name="trx_no"]').forEach(function(input) {
            input.value = value;
        });
        closeTrxModal();
    }

    async function searchTrx() {
        const modalEl = document.getElementById("exampleModal1");
        let branch = modalEl.querySelector('[name="branch"]')?.value ?? "";
        let salesDate = modalEl.querySelector('[name="sales_date"]')?.value ?? "";

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
</script>

</html>