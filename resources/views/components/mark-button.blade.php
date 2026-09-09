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
    </style>
</head>

<body>

    <button type="button"
        class="btn w-100 mark-btn {{ $currentValue == $value ? 'btn-primary' : 'btn-outline-secondary' }}"
        data-name="{{ $name }}"
        data-group="{{ $group }}"
        value="{{ $value }}">
        {{ $currentValue == $value ? $value : 0 }}
    </button>
</body>


</html>