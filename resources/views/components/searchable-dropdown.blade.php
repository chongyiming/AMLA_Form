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
            function initSelect2(root, force) {
                $(root).find(".js-example-basic-single").each(function() {
                    var $el = $(this);
                    var $modal = $el.closest('.modal');

                    // select2 measures width 0 when built inside a hidden modal,
                    // so skip those on the initial pass and (re)build on show.
                    if ($el.data('select2')) {
                        if (!force) return;
                        $el.select2('destroy');
                    } else if ($modal.length && !force) {
                        return;
                    }

                    $el.select2({
                        width: '100%',
                        placeholder: $el.data('placeholder') || '',
                        dropdownParent: $modal.length ? $modal : $(document.body)
                    });
                });

                $(root).find(".no-border").next(".select2-container")
                    .find(".select2-selection--single")
                    .css("border", "none");
            }

            initSelect2(document, false);

            $(document).on('shown.bs.modal', '.modal', function() {
                initSelect2(this, true);
            });
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

    <select class="js-example-basic-single {{ $border === 'none' ? 'no-border' : '' }}" name="{{ $name }}"
        data-placeholder="{{ '' }}">
        @php
        $selectedValue = old($name, $form1->$name ?? '');
        $optionList = is_iterable($options)
        ? $options
        : collect([$options])->filter(fn ($o) => is_object($o) || is_array($o));
        @endphp

        <option value=""></option>

        @foreach ($optionList as $option)
        @php $optionValue = data_get($option, $field); @endphp
        <option value="{{ $optionValue }}"
            {{ $selectedValue !== '' && $selectedValue == $optionValue ? 'selected' : '' }}>
            {{ $optionValue }}
        </option>
        @endforeach
    </select>
</body>

</html>