<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .trxTable {
            border-collapse: collapse;
            width: 100%;
        }

        .trxTable th {
            padding: 5px;
            border: 1px solid #ddd;
            background-color: #f8f8f8;
        }

        .trxTable td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .trxTable .search {
            width: 90%;
            border: none;
            outline: none;
            font-size: 11px;
            background: transparent;
        }

        .column-switch-wrap {
            width: 100%;
            gap: 10px;
            display: flex;
            flex-direction: column;
            gap: 5px
        }

        .column-switch {
            border-radius: 6px;
            background-color: white;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            height: 30px;


        }
    </style>
</head>

<body>
    <table border="1" class="trxTable">
        <thead>
            <tr>
                @foreach($columns as $column)
                <th data-i18n="{{ $column['label'] }}"></th>
                @endforeach
            </tr>
            <tr>
                @foreach($columns as $column)
                <th>
                    <input
                        type="text"
                        class="search"
                        onkeyup="filterTable()"
                        data-i18n="{{ $column['placeholder'] }}"
                        data-i18n-target="placeholder">
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody id="trxTableBody">
            @foreach($rows ?? [] as $row)
            <tr>
                @foreach($columns as $column)
                <td>
                    @if(isset($column['field']))

                    @if($column['field'] === 'uuid')
                    <x-heroicon-o-bars-3 style="width: 16px; height: 16px;cursor:pointer" onclick="openAttachmentsModal('{{ $row->form_id }}')" />



                    <!-- <button type="button" class="btn btn-outline-primary" data-i18n="messages.actions" onclick="window.location.href='/{{ $row->form_id }}/edit'">Primary</button> -->

                    @else
                    {{ data_get($row, $column['field']) }}
                    @endif

                    @else

                    <div class="column-switch-wrap">
                        @if($row->status === 'New')
                        <form action="/{{ $row->form_id }}/edit" method="GET">
                            @csrf
                            <!-- <button type="submit" class="column-switch" style="width:100%;border: 1px solid #17a2b8; color:#17a2b8;">Edit</button> -->

                            <x-button
                                type="submit"
                                style="width:100%;border: 1px solid #17a2b8; color:#17a2b8;font-size:12px"
                                data-i18n="messages.edit"></x-button>
                        </form>
                        <form action="/{{ $row->form_id }}/delete" method="POST">
                            @csrf
                            <!-- <button type="submit" class="column-switch" style="width:100%;border:1px solid #dc3545; color:#dc3545;">Delete</button> -->
                            <x-button
                                type="submit"
                                style="width:100%;border:1px solid #dc3545;color:#dc3545;font-size:12px"
                                data-i18n="messages.delete"></x-button>
                        </form>
                        @else
                        <form action="/submittedForm/{{ $row->form_id }}/2" method="GET">
                            @csrf
                            <!-- <button type="submit" class="column-switch" style="width:100%;border: 1px solid #17a2b8; color:#17a2b8;">Edit</button> -->
                            <x-button
                                type="submit"
                                style="width:100%;border: 1px solid #17a2b8; color:#17a2b8;font-size:12px"
                                data-i18n="messages.view"></x-button>
                        </form>
                        <form action="/{{ $row->form_id }}/delete" method="POST">
                            @csrf
                            <!-- <button type="submit" class="column-switch" style="width:100%;border:1px solid #dc3545; color:#dc3545;">Delete</button> -->
                            <x-button
                                type="submit"
                                style="width:100%;border:1px solid #dc3545;color:#dc3545;font-size:12px"
                                data-i18n="messages.delete"
                                disabled></x-button>
                        </form>
                        @endif
                    </div>
                    @endif

                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <x-attachments></x-attachments>



</body>
<script>
    function filterTable() {
        const table = document.querySelector(".trxTable");
        const filters = table.querySelectorAll("thead tr:nth-child(2) input");
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let show = true;

            filters.forEach((input, index) => {
                const filter = input.value.toLowerCase().trim();
                const cell = row.cells[index].textContent.toLowerCase();

                if (filter && !cell.includes(filter)) {
                    show = false;
                }
            });

            row.style.display = show ? "" : "none";
        });
    }
</script>

</html>