<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .page_panel {
            position: fixed;
            top: 10px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-end;
            z-index: 2;
        }

        .locale-switcher {
            display: flex;
            background: #f2f2f2;
            border-radius: 6px;
            width: 200px;
        }

        .locale-switch {
            border: none;
            background: transparent;
            padding: 3px 7px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.15s ease, color 0.15s ease;
            width: 100px;
        }



        .locale-switch:hover {
            background-color: #e6e6e6;
        }

        .locale-switch.active {
            background-color: #4A90D9;
            color: #fff;
        }


        .header-dropdown {
            position: relative;
            display: none;
        }

        .header-panel-switch {
            border: 1px solid #2563eb;
            color: #2563eb;
            background-color: white;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .header-dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            margin-top: 10px;

            background: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            padding: 10px;
            border-radius: 10px;
            flex-direction: column;
            gap: 10px;
        }

        .header-dropdown-menu.show {
            display: flex;
        }

        .header-dropdown-menu button {
            flex: 1;
            padding: 8px 12px;
            cursor: pointer;
            text-align: center;
            border-radius: 10px;

        }


        .trx-no {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            margin-top: 10px;
        }


        .panel-input {
            font-size: 14px;
            padding: 8px 10px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            color: #333;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            width: 200px
        }


        .sidepanel_button_container {
            display: flex;
            flex-direction: column;
            gap: 10px
        }


        @media (max-width: 1415px) {

            .header-dropdown {
                display: inline-block;
            }

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
        <div style="display:flex;flex-direction:row;gap:10px">
            <div class="locale-switcher">
                <button type="button" class="locale-switch" data-lang="en">English</button>
                <button type="button" class="locale-switch" data-lang="zh">中文</button>

            </div>
            <div class="header-dropdown">

                <button type="button" class="btn btn-outline-dark" data-i18n="messages.actions" id="actions"></button>

                <div class=" header-dropdown-menu">
                    <div style="display:flex;flex-direction:column">
                        <label>
                            <span data-i18n="messages.trxno"></span>
                        </label>
                        <input type="text" class="panel-input" name="trx_no" readonly onclick="openTrxModal()" value="{{ old('trx_no', $form->trx_no ?? '') }}">
                    </div>
                    <div style="display: flex;justify-content: space-between;gap:10px">

                        @if($state == 0)

                        <button type="submit" class="btn btn-outline-success" data-i18n="messages.create">Success</button>
                        <button type="button" class="btn btn-outline-danger" onclick="clearForm()" data-i18n="messages.clear"></button>

                        @elseif($state ==1)

                        <button type="submit" class="btn btn-outline-primary" data-i18n="messages.update" formaction="/update/{{ $form1->form_id }}"></button>
                        <button type="button" class="btn btn-outline-danger" onclick="clearForm()" data-i18n="messages.clear"></button>
                        <button type="submit" class="btn btn-outline-success" formaction="/submit/{{ $form1->form_id }}" data-i18n="messages.submit"></button>

                        @elseif($state ==2)
                        <button type="button" class="btn btn-outline-dark" id="dropdown-print" data-i18n="messages.print"></button>

                        @endif

                    </div>

                </div>
            </div>

        </div>

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