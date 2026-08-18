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
            z-index: 2;
        }

        .trx-no {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
        }


        .panel-input {
            width: 200px;
            font-size: 14px;
            padding: 8px 10px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            color: #333;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }


        .sidepanel_button_container {
            display: flex;
            flex-direction: column;
            gap: 10px
        }


        @media (max-width: 1415px) {

            .trx-no {
                display: none;
            }

            .sidepanel_button_container {
                display: none
            }

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
        <div class="sidepanel_button_container">
            @if($state ==0)

            <button type="submit" class="btn btn-outline-success" data-i18n="messages.create" style="width:100px"></button>

            <button type="button" class="btn btn-outline-danger" onclick="clearForm()"
                data-i18n="messages.clear" style="width:100px"></button>


            @elseif($state ==1)

            <button type="submit" class="btn btn-outline-primary" formaction="/update/{{ $form1->form_id }}"
                data-i18n="messages.update" style="width:100px"></button>

            <button type="button" class="btn btn-outline-danger" onclick="clearForm()"
                data-i18n="messages.clear" style="width:100px"></button>

            <button type="submit" class="btn btn-outline-success" formaction="/submit/{{ $form1->form_id }}"
                data-i18n="messages.submit" style="width:100px">Success</button>


            @elseif($state ==2)

            <button type="button" class="btn btn-outline-success" id="panel-print" data-i18n="messages.print" style="width:100px">Success</button>

            @endif



        </div>


    </div>
</body>

</html>