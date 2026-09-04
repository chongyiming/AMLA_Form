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

        .card {
            border: 2px solid #0000FF;
            border-radius: 5px;
            padding: 1.5px;
            background-color: #D9EDF2 !important;
        }

        .title {
            color: white;
            text-align: center;
            background-color: #2E74B5 !important;
            padding: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .description {
            padding-left: 10px;
            font-weight: bold;
        }

        .bullet_section {
            font-size: 10px;
            margin-bottom: 3px;
        }

        .normal_text {
            padding-left: 10px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="title">
            <span data-i18n="{{ $titleKey }}"></span>
        </div>

        <div>
            @foreach($sections as $section)

            @if(!empty($section['description']))
            <div class="description">
                <span data-i18n="{{ $section['description'] }}"></span>
            </div>
            @endif

            @if(!empty($section['text']))
            <div class="normal_text">
                <span data-i18n="{{ $section['text'] }}"></span>
            </div>
            @endif

            @if(!empty($section['bullets']))
            <ul class="bullet_section">
                @foreach($section['bullets'] as $bullet)
                <li>
                    <span data-i18n="{{ $bullet }}"></span>
                </li>
                @endforeach
            </ul>
            @endif

            @endforeach
        </div>
    </div>
</body>

</html>