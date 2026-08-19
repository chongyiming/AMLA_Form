<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            padding: 5px;
            border: 1px solid #ddd;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <table border="1" id="attachmentImages" style='width:100%'>
        <thead>
            <tr>

                @foreach($columns as $column)
                <th data-i18n="{{ $column['label'] }}">
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($columns as $column)
                <td style="overflow-wrap:anywhere">
                    {{ $rows->{$column['field']} ?? '' }}
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</body>

</html>