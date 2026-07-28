<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .statement {
            margin-top: 20px;

        }

        .statement_title {
            color: white;
            background-color: #2E74B5;
            padding: 14px;
            font-size: 14px;
            font-weight: bold;
        }

        .statement_content {
            margin-top: 30px;
            border: 1px solid #CCCCCC;
            display: grid;
            grid-template-columns: 50% 50%;
        }

        .statement_column {

            border-right: 1px solid #CCCCCC;
        }

        .statement_column_label {
            padding: 5px;
            background-color: #F1F1F1;
            font-weight: bold;
            font-size: 14px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #CCCCCC;

        }

        .white_bullet {
            list-style-type: circle;
            margin-left: 14px;
        }
    </style>
</head>


<body>
    <div class="statement">
        @if(isset($title) && isset($section))
        <div class="statement_title">
            <span data-i18n="{{ $section }}"></span> ) <span data-i18n="{{ $title }}"></span>
        </div>
        @elseif(isset($title))
        <div class="statement_title">
            <span data-i18n="{{ $title }}"></span>
        </div>
        @endif
        <div class="statement_content">
            @foreach($columns as $column)
            <div class="statement_column">
                <div class="statement_column_label">
                    <span data-i18n="{{ $column['title'] }}"></span>

                    <!-- {{ $column['title'] }} -->
                </div>
                <div style='padding:5px'>
                    @foreach($column['sections'] as $section)
                    <ul>
                        <li>
                            <!-- {!! $section['description'] !!} -->
                            <span data-i18n="{{ $section['description'] }}" data-i18n-html></span>
                        </li>
                    </ul>

                    @if(!empty($section['items']))
                    <ul class="white_bullet">
                        @foreach($section['items'] as $item)
                        <li>
                            <!-- {{ $item }} -->
                            <span data-i18n="{{ $item }}"></span>

                        </li>
                        @endforeach
                    </ul>
                    @endif

                    @endforeach
                </div>


            </div>
            @endforeach
        </div>
    </div>
</body>

</html>