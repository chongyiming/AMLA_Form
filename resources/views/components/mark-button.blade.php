<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button type="button"
        class="btn w-100 mark-btn {{ $currentValue == $value ? 'btn-success' : 'btn-outline-secondary' }}"
        data-name="{{ $name }}"
        data-group="{{ $group }}"
        value="{{ $value }}">
        {{ $currentValue == $value ? $value : 0 }}
    </button>
</body>


</html>