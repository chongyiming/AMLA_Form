<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .panel-switch {
            right: 0;
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            border: 1px solid #ddd;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            justify-content: center;
            flex: 1;
            width: 100%;
            text-align: center;
            align-items: center;
            transition: 0.2s;
            height: 100%;
        }

        .panel-switch:hover {
            background-color: #f0f0f0;
            transform: translateY(-1px);
        }

        .panel-switch:active {
            background-color: #e0e0e0;
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <button
        type="{{ $type ?? '' }}"
        class="panel-switch"
        style="{{ $style ?? '' }}"
        @if(isset($dataI18n)) data-i18n="{{ $dataI18n }}" @endif
        @if(isset($onclick)) onclick="{{ $onclick }}" @endif
        @if(isset($formaction)) formaction="{{ $formaction }}" @endif
        @if(isset($id)) id="{{ $id }}" @endif
        @if(isset($disabled) && $disabled) disabled @endif>
        {{ $slot }}
    </button>
</body>

</html>