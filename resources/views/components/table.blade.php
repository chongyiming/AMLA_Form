<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table_title {
            background-color: #F1F1F1;
            font-weight: bold;
            font-size: 14px;
            flex: 1;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #CCCCCC;
            border-right: 1px solid #CCCCCC;
            display: flex;
            align-items: center;
        }

        .table_label {
            text-align: left;
        }

        .people-grid {
            display: grid;
            grid-template-columns: 20% 30% 20% 30%;
        }

        .people-grid input {
            outline: none;
            border: none;
            border-right: 1px solid #CCCCCC;
            border-bottom: 1px solid #CCCCCC;
            font-size: 14px;

        }


        .people-grid textarea {
            outline: none;
            border: none;
            border-right: 1px solid #CCCCCC;
            border-bottom: 1px solid #CCCCCC;
            font-size: 14px;

        }

        .full-width {
            grid-column: 2 / 5;
            min-height: 80px;
            resize: none;
        }
    </style>
</head>

<body>
    <label class='table_title'>
        <span data-i18n="{{$field['label']}}"></span>

    </label>
    <div class="people-grid">
        <label class="table_title">&nbsp;</label>
        @foreach ($field['columns'] as $column)
        <label class="table_title">
            <span data-i18n="{{$column['label'] }}"></span>
        </label>
        @endforeach

        @foreach ($field['rows'] as $row)
        <label class="table_title table_label">
            <span data-i18n="{{$row['label'] }}"></span>
        </label>

        @foreach ($field['columns'] as $column)
        @if (($column['type'] ?? 'text') === 'textarea')
        <textarea
            name="{{ $row['input'] }}[{{ $column['input'] }}]">{{ old(
        $row['input'].'.'.$column['input'],
        session('form_data.'.$row['input'].'.'.$column['input'])
    ) }}</textarea>
        @else
        <input
            type="{{ $column['type'] ?? 'text' }}"
            name="{{ $row['input'] }}[{{ $column['input'] }}]"
            value="{{ old(
        $row['input'].'.'.$column['input'],
        session('form_data.'.$row['input'].'.'.$column['input'])
    ) }}">
        @endif
        @endforeach
        @endforeach
        @foreach ($field['extra_fields'] ?? [] as $extra)
        <label class="table_title table_label">
            <span data-i18n="{{$extra['label'] }}"></span>

        </label>
        <textarea
            class="full-width"
            name="{{ $extra['input'] }}">{{ session('form_data.'.$extra['input']) ?? old($extra['input']) }}</textarea>
        @endforeach
    </div>



</body>

</html>