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
            font-family: "Times New Roman", Times, serif;

        }

        .trxTable th {
            padding: 5px;
            border: 1px solid #ddd;
            background-color: #f8f8f8;
            font-size: 14px;
        }

        .trxTable td {
            padding: 5px;
            border: 1px solid #ddd;
            font-size: 12px;

        }

        .trxTable .search {
            width: 100%;
            border: none;
            outline: none;
            font-size: 11px;
            background: transparent;
        }

        .column-switch-wrap {
            width: 100%;
            gap: 5px;
            display: flex;
            flex-direction: column;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

                    @if($column['field'] === 'uuid' && $row->status === 'Submitted')

                    <div class="position-relative d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->form_id }}">
                        <img src="{{ asset('/folder.png') }}"
                            style="width: 40px; height: 40px; cursor: pointer;">

                        <span class="position-absolute top-0 start-100 translate-middle badge bg-success">
                            {{$row->image_count}}
                        </span>
                    </div>

                    @elseif($column['field'] === 'uuid' && $row->status === 'New' && $row->image_count !== '0')
                    <div class="position-relative d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->form_id }}">
                        <img src="{{ asset('/folder.png') }}"
                            style="width: 40px; height: 40px; cursor: pointer;">

                        <span class=" position-absolute top-0 start-100 translate-middle badge bg-primary">
                            {{$row->image_count}}
                        </span>
                    </div>

                    @elseif($column['field'] === 'uuid' && $row->status === 'New' && $row->image_count === '0')
                    <span class="btn btn-danger pe-none" style="padding:0px;padding-left:3px;padding-right:3px;margin-right:10px">!</span>
                    <div class="position-relative d-inline" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $row->form_id }}">
                        <img src="{{ asset('/folder.png') }}"
                            style="width: 40px; height: 40px; cursor: pointer;">

                        <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                            {{$row->image_count}}
                        </span>
                    </div>
                    @else

                    {{ data_get($row, $column['field']) }}
                    @endif

                    @else

                    <div class="column-switch-wrap">
                        @if($row->status === 'New')
                        <form action="/{{ $row->form_id }}/edit" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" data-i18n="messages.edit" style="width: 100%;"></button>

                        </form>
                        <form action="/{{ $row->form_id }}/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this attachment?\n\n您确定要删除此附件吗?');">
                            @csrf

                            <button type="submit" class="btn btn-outline-danger" data-i18n="messages.delete" style="width: 100%;"></button>

                        </form>
                        @else
                        <form action="/submittedForm/{{ $row->form_id }}/2" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" data-i18n="messages.view" style="width: 100%;"></button>

                        </form>
                        <form action="/{{ $row->form_id }}/delete" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" data-i18n="messages.delete" style="width: 100%;" disabled></button>

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
    @foreach($rows ?? [] as $row)
    <x-attachment-modal :row="$row"></x-attachment-modal>
    @endforeach



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