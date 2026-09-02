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

        .form_title {
            color: white;
            background-color: #2E74B5;
            padding: 5px;
            font-size: 13px;
            font-weight: bold;
        }

        .form_content {
            margin-top: 10px;
            border: 1px solid #CCCCCC;
            display: flex;
            flex-direction: column;
        }

        .form_row {
            display: flex;
            border-bottom: 1px solid #CCCCCC;

        }

        .text-end {
            justify-content: flex-end;

        }

        .form_row:last-child {
            border-bottom: none;
        }


        .form_row_label {
            width: 200px;
            padding: 5px;
            border-right: 1px solid #CCCCCC;
            background-color: #F1F1F1;
            font-weight: bold;
            font-size: 13px;
            display: flex;
            align-items: center;
        }

        .form_row input {
            flex: 1;
            border: none;
            padding: 5px;
            outline: none;
            font-size: 13px;
            width: 100%;
        }

        .form_row textarea {
            flex: 1;
            border: none;
            padding: 5px;
            outline: none;
            font-size: 13px;
            resize: none;


        }


        .children_label {
            width: 100px !important;
            border-left: 1px solid #CCCCCC;
            justify-content: center;
            border-right: none !important;
        }

        .column_label {
            width: 100% !important;
            border-right: none !important;
            box-sizing: border-box !important;
            justify-content: center;
            border-left: 1px solid #CCCCCC;

        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        @if(isset($title) && isset($section))
        <div class="form_title">
            <span data-i18n="{{ $section }}"></span> ) <span data-i18n="{{ $title }}"></span>
        </div>
        @elseif(isset($title))
        <div class="form_title">
            <span data-i18n="{{ $title }}"></span>
        </div>
        @endif
        <div class="form_content">
            @foreach($rows as $row)
            @if(isset($row['input']))
            <div class="form_row">
                @if(isset($row['copy_checkbox']))
                <div style="display: flex; flex-direction: column;">
                    <label class="text-{{ ($row['align'] ?? 'left') === 'end' ? 'end' : 'left' }} form_row_label">
                        <!-- {{ $row['label'] }} -->
                        <span data-i18n="{{ $row['label'] }}"></span>

                    </label>

                    <label style="flex:1" class="form_row_label">
                        <div style="flex-direction: row;display:flex;gap:10px">

                            <!-- ({{ $row['copy_checkbox']['label'] }}) -->
                            <span data-i18n="{{$row['copy_checkbox']['label'] }}"></span>

                            <input
                                type="checkbox"
                                onclick="{{ $row['onclick'] }}"
                                data-fields='@json($row["copy_checkbox"]["fields"])'
                                {{ old($row['input'], data_get($form1, $row['input'])) ? 'checked' : '' }}
                                style="width:14px; height:14px;align-self:center">
                        </div>



                    </label>
                </div>
                @else
                @if(!isset($row['columns']))
                <label class="{{ ($row['align'] ?? '') === 'end' ? 'text-end' : '' }} form_row_label">
                    <span>
                        <span data-i18n="{{ $row['label'] }}"></span>
                        @if(!empty($row['mandatory']))
                        <span class="text-danger">*</span>
                        @endif
                    </span>
                </label>
                @else
                <label class="{{ ($row['align'] ?? '') === 'end' ? 'text-end' : '' }} form_row_label" style='border-right: none'>
                    <!-- {{ $row['label'] }} -->
                    <span data-i18n="{{$row['label'] }}"></span>

                </label>
                @endif
                @endif
                @if(($row['direction'] ?? '') === 'column')
                <div style="flex:1">
                    @if(($row['type'] ?? 'text') === 'textarea')
                    <textarea name="{{ $row['input'] ?? '' }}" placeholder="{{ $row['placeholder'] ?? '' }}">{{ old($row['input'], $form1->$row['input'] ?? '') }}</textarea>
                    @else
                    <input style="border-bottom: 1px solid #CCCCCC;box-sizing:border-box;"
                        type="{{ $row['type'] ?? 'text' }}"
                        name="{{ $row['input'] ?? '' }}"
                        placeholder="{{ $row['placeholder'] ?? '' }}"
                        value="{{ old($row['input'], $form1->{$row['input']} ?? '') }}">


                    @if(!empty($row['childrens']))
                    @foreach($row['childrens'] as $child)
                    <input
                        type=" {{ $child['type'] ?? 'text' }}"
                        name="{{ $child['input'] ?? '' }}"
                        placeholder="{{ $child['placeholder'] ?? '' }}"
                        value="{{  old($child['input'], $form1->{$child['input']} ?? '') }}"
                        style="box-sizing:border-box;">
                    @endforeach
                    @endif
                    @endif
                </div>
                @else

                @if(($row['type'] ?? 'text') === 'textarea')
                <textarea name="{{ $row['input'] ?? '' }}" placeholder="{{ $row['placeholder'] ?? '' }}">{{ old($row['input'], $form1->{$row['input']} ?? '') }}</textarea>
                @elseif(($row['type'] ?? 'text') === 'radio')
                @if (isset($row['direction']))

                @if ($row['direction']==='row')
                <div style="padding:5px;display:flex;gap:40px">
                    @if (isset($row['other_input']))
                    @php
                    $otherInputName = $row['other_input']['input'];
                    @endphp
                    @endif
                    @foreach($row['options'] as $value => $label)
                    <div>
                        <label style="cursor:pointer;">
                            <input
                                type="radio"
                                name="{{ $row['input'] }}"
                                value="{{ $value }}"
                                {{ old($row['input'], data_get($form1, $row['input'])) == $value ? 'checked' : '' }}
                                style="width:14px; height:14px; vertical-align:middle; margin:0;"
                                @if (!empty($otherInputName))
                                data-other-input="{{ $otherInputName }}"
                                onchange="showOther(this, '{{ $otherInputName }}')"
                                @endif>

                            <!-- <span style="vertical-align:middle;">{{ $label }}</span> -->
                            <span style="vertical-align:middle;" data-i18n="{{$label}}"></span>

                        </label>
                        @if($value === 'other' && isset($row['other_input']))
                        <input
                            type="text"
                            name="{{ $row['other_input']['input'] }}"
                            value="{{ old($row['other_input']['input'], data_get($form1, $row['other_input']['input'])) ?? '' }}"
                            style="display:none;border:1px solid #CCCCCC;"
                            data-i18n="{{ $row['other_input']['placeholder'] }}"
                            data-i18n-target="placeholder">
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
                @else
                <div style="padding:5px">
                    @if (isset($row['other_input']))
                    @php
                    $otherInputName = $row['other_input']['input'];
                    @endphp
                    @endif
                    @foreach($row['options'] as $value => $label)
                    <div>
                        <label style="cursor:pointer;">
                            <input
                                type="radio"
                                name="{{ $row['input'] }}"
                                value="{{ $value }}"
                                {{ old($row['input'], data_get($form1, $row['input'])) == $value ? 'checked' : '' }}
                                style="width:14px; height:14px; vertical-align:middle; margin:0;"
                                @if (!empty($otherInputName))
                                data-other-input="{{ $otherInputName }}"
                                onchange="showOther(this, '{{ $otherInputName }}')"
                                @endif>

                            <!-- <span style="vertical-align:middle;">{{ $label }}</span> -->
                            <span style="vertical-align:middle;" data-i18n="{{$label}}"></span>

                        </label>
                        @if($value === 'other' && isset($row['other_input']))
                        <input
                            type="text"
                            name="{{ $row['other_input']['input'] }}"
                            value="{{ old($row['other_input']['input'], data_get($form1, $row['other_input']['input'])) ?? '' }}"
                            style="display:none;border:1px solid #CCCCCC;"
                            data-i18n="{{ $row['other_input']['placeholder'] }}"
                            data-i18n-target="placeholder">
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
                @elseif(($row['type'] ?? 'text') === 'select')
                <div style="flex:1;border:none;font-size: 13px;padding:5px;outline:none; display:flex; align-items:center;">
                    <x-searchable-dropdown
                        :options="${$row['source']}"
                        :name="$row['input']"
                        :field="$row['field']"
                        :form1="$form1"
                        border="none" />
                </div>

                @elseif(($row['type'] ?? 'text') === 'grid')
                @foreach($row['columns'] as $column)
                <div style="flex: {{ $column['space'] ?? 1 }};">
                    <label class="form_row_label column_label">
                        <!-- {{ $column['label'] }} -->
                        <span data-i18n="{{$column['label'] }}"></span>

                    </label>
                    @for($i = 0; $i < ($column['row'] ?? 1); $i++)
                        <input
                        type="{{ $column['type'] }}"
                        name="{{ $row['input'] }}[{{ $i }}][{{ $column['input'] }}]"
                        value="{{ old($row['input'] . '.' . $i . '.' . $column['input'], data_get($form1, $row['input'] . '.' . $i . '.' . $column['input'])) }}"
                        style="
                box-sizing:border-box;
                border-top:1px solid #CCCCCC;
                border-left:1px solid #CCCCCC;
            ">
                        @endfor
                </div>
                @endforeach
                @elseif(($row['type'] ?? 'text') === 'question_group')
                <div style="flex:1;border:none;font-size: 13px;padding:5px;outline:none; display:flex; align-items:center;flex-direction:column;">
                    @foreach($row['questions'] as $question)
                    <div>
                        <label data-i18n="{{ $question['label'] }}"></label>
                        <input
                            type="text"
                            name="{{ $question['input'] }}"
                            placeholder="{{ $question['placeholder'] ?? '' }}">
                    </div>
                    @endforeach
                </div>
                @else
                <input
                    type="{{ $row['type'] ?? 'text' }}"
                    name="{{ $row['input'] ?? '' }}"
                    placeholder="{{ $row['placeholder'] ?? '' }}"
                    value="{{ old($row['input'], $form1->{$row['input']} ?? '') }}">

                @endif

                @endif
                @if(($row['direction'] ?? '') !== 'column')
                @foreach(($row['childrens'] ?? []) as $children)
                @if(!empty($children['label']))
                @if(isset($children['align']))
                @if($children['align']==='left')
                <label class="form_row_label children_label" style="justify-content: flex-start;">

                    <span data-i18n="{{$children['label'] }}"></span>
                </label>

                @else
                <label class="form_row_label children_label" style="justify-content: flex-end;">
                    <span data-i18n="{{$children['label'] }}"></span>
                </label>
                @endif
                @else
                <label class="form_row_label children_label">

                    <span data-i18n="{{$children['label'] }}"></span>
                </label>

                @endif
                @endif
                @if(($children['type'] ?? 'text') === 'textarea')
                <textarea name="{{ $children['input'] ?? '' }}" placeholder="{{ $children['placeholder'] ?? '' }}">{{ old($children['input'] ?? '', data_get($form1, $children['input'] ?? '')) }}</textarea>
                @elseif(($children['type'] ?? 'text') === 'radio')
                <div style="flex: 1;
                    border: none;
                    padding: 5px;
                    outline: none;
                    font-size: 13px;
                    width: 100%;border-left: 1px solid #CCCCCC;padding:5px;display:flex;gap:14px">
                    @foreach($children['options'] as $value => $label)
                    <label style="cursor:pointer;">
                        <input
                            type="radio"
                            name="{{ $row['input'] }}"
                            value="{{ $value }}"
                            {{ old($row['input'], data_get($form1, $row['input'])) == $value ? 'checked' : '' }}
                            style="width:14px; height:14px; vertical-align:middle; margin:0;">

                        <span style="vertical-align:middle;" data-i18n="{{$label}}"></span>

                    </label>

                    @endforeach
                </div>
                @else
                <input
                    type="{{ $children['type'] ?? 'text' }}"
                    name="{{ $children['input'] ?? '' }}"
                    value="{{ old($children['input'] ?? '', data_get($form1, $children['input'] ?? '')) }}"
                    style="border-left: 1px solid #CCCCCC;"
                    data-i18n="{{ $children['placeholder']??'' }}"
                    data-i18n-target="placeholder">

                @endif
                @endforeach
                @endif
            </div>
            @else
            <x-form-table :field="$row" :form1="$form1" />
            @endif
            @endforeach
        </div>
    </div>
</body>

</html>