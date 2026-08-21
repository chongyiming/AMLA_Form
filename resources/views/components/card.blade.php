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
            margin-top: 10px;
            border-radius: 5px;
            padding: 1.5px;
            background-color: #D9EDF2;

        }

        .title {
            color: white;
            text-align: center;
            background-color: #2E74B5;
            padding: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .description {
            padding-top: 10px;
            padding-left: 10px;
            font-weight: bold;

        }

        .bullet_section {
            font-size: 10px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="title">
            <span data-i18n="{{ $titleKey }}"></span>
        </div>
        <div>
            <div class="description">
                <span data-i18n="{{ $descriptionKey }}"></span>
            </div>
            <ul class="bullet_section">
                @foreach($bulletKeys as $bulletKey)
                <li><span data-i18n="{{ $bulletKey }}"></span></li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>