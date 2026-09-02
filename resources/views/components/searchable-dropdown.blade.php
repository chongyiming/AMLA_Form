<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script>
        if (typeof jQuery === 'undefined') {
            document.write('<script src="https://code.jquery.com/jquery-3.7.1.min.js"><\/script>');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                width: '100%',
                height: '100%',

            });

            $(".no-border").next(".select2-container")
                .find(".select2-selection--single")
                .css("border", "none");
        });
    </script>

    <style>
        body {
            font-family: "Times New Roman", Times, serif;

        }

        .select2-container--disabled .select2-selection {
            background-color: white !important;
            border: none !important;
        }

        .select2-container--disabled .select2-selection--single .select2-selection__arrow {
            display: none;

        }

        .select2-container {
            width: 100% !important;
            height: 100%;
        }

        .select2-container .select2-selection--single {
            height: 100%;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            z-index: -1;
            display: flex;
            align-items: center;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: normal;
            display: flex;
            align-items: center;
        }

        .select2-container .select2-selection--single .select2-selection__arrow {
            height: 100%;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <select class="js-example-basic-single {{ $border === 'none' ? 'no-border' : '' }}" name="{{ $name }}">
        @php
        $selectedValue = old($name, $form1->$name ?? '');
        @endphp

        @foreach ($options as $option)
        <option value="{{ $option->$field }}"
            {{ $selectedValue == $option->$field ? 'selected' : '' }}>
            {{ $option->$field }}
        </option>
        @endforeach
    </select>
</body>

</html>