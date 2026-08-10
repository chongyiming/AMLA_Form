<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                width: '100%'
            });
        });
    </script>

    <style>
        .select2-container .select2-selection--single {
            height: 34.4px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 34.4px;
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            height: 34.4px;
        }
    </style>
</head>

<body>
    <select class="js-example-basic-single" name="{{ $name }}">
        @php
        $selectedValue = old($name, $form1->$name ?? '');
        @endphp
        @foreach ($preparer as $user)
        <option value="{{ $user->USERNAME }}"
            {{ $selectedValue == $user->USERNAME ? 'selected' : '' }}>
            {{ $user->USERNAME }}
        </option>
        @endforeach
    </select>
</body>

</html>