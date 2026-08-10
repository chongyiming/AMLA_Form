<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .page_panel {
            position: fixed;
            top: 60px;
            right: 15px;

            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-end;
        }

        .trx-no {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
        }


        .panel-input {
            width: 180px;
            font-size: 14px;
            padding: 8px 10px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            color: #333;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }


        .panel-switch {
            right: 0;
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            font-weight: 500;

            cursor: pointer;
            width: 100px;
            transition:
                background-color 0.15s ease,
                color 0.15s ease,
                border-color 0.15s ease,
                box-shadow 0.15s ease,
                transform 0.1s ease;
        }
    </style>
</head>

<body>
    <div class="page_panel">
        <div class="trx-no">
            <label>
                <span data-i18n="messages.trxno"></span>
            </label>
            <input type="text" class="panel-input" name="trx_no" readonly onclick="openTrxModal()" value="{{ old('trx_no', data_get($form, 'trx_no')) }}">
        </div>
        <x-modal :form1="$form1" :form="$form"></x-modal>
        @if($state ==0)
        <button type="submit" class="panel-switch" style="border: 1px solid #59c45e;color:#59c45e" data-i18n="messages.create"></button>
        <button type="button" class="panel-switch" style="border: 1px solid #dc2626;color:#dc2626" onclick="clearForm()" data-i18n="messages.clear"></button>
        @elseif($state ==1)
        <!-- <form method="POST" action="/update">
            @csrf -->
        <button type="submit" class="panel-switch" formaction="/update/{{ $form1->form_id }}" style="border: 1px solid #007bff;color:#007bff" data-i18n="messages.update"></button>

        <!-- </form> -->
        <button type="button" class="panel-switch" style="border: 1px solid #dc2626;color:#dc2626" onclick="clearForm()" data-i18n="messages.clear"></button>
        <button type="submit" class="panel-switch" formaction="/submit/{{ $form1->form_id }}" style="border: 1px solid #59c45e;color:#59c45e" data-i18n="messages.submit"></button>
        @elseif($state ==2)
        <button id="panel-print" type="button" class="panel-switch" data-i18n="messages.print">Print</button>

        @endif



    </div>
</body>

</html>