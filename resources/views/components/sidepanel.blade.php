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
            flex: 1;
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

                        @if ($formType == "Form_No_1")
                        <button type="submit"
                            class="btn btn-outline-primary"
                            data-i18n="messages.update"
                            formaction="/updateCustomerDueDiligenceForm/{{ $form1->form_id }}">
                        </button>
                        @elseif ($formType == "Form_No_2")
                        <button type="submit"
                            class="btn btn-outline-primary"
                            data-i18n="messages.update"
                            formaction="/updateCustomerRiskProfilingForm/{{ $form1->form_id }}">
                        </button>
                        @endif
                        <button type="button" class="btn btn-outline-danger" onclick="clearForm()" data-i18n="messages.clear"></button>
                        @if ($formType == "Form_No_1")
                        <button type="submit" class="btn btn-outline-success" formaction="/submitCustomerDueDiligenceForm/{{ $form1->form_id }}" data-i18n="messages.submit"></button>
                        @elseif ($formType == "Form_No_2")
                        <button type="submit" class="btn btn-outline-success" formaction="/submitCustomerRiskProfilingForm/{{ $form1->form_id }}" data-i18n="messages.submit"></button>
                        @endif
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

            @if ($formType == "Form_No_1")
            <button type="submit"
                class="btn btn-outline-primary"
                data-i18n="messages.update"
                formaction="/updateCustomerDueDiligenceForm/{{ $form1->form_id }}">
            </button>
            @elseif ($formType == "Form_No_2")
            <button type="submit"
                class="btn btn-outline-primary"
                data-i18n="messages.update"
                formaction="/updateCustomerRiskProfilingForm/{{ $form1->form_id }}">
            </button>
            @endif

            <button type="button" class="btn btn-outline-danger" onclick="clearForm()"
                data-i18n="messages.clear" style="width:100px"></button>

            @if ($formType == "Form_No_1")
            <button type="submit" class="btn btn-outline-success" formaction="/submitCustomerDueDiligenceForm/{{ $form1->form_id }}" data-i18n="messages.submit"></button>
            @elseif ($formType == "Form_No_2")
            <button type="submit" class="btn btn-outline-success" formaction="/submitCustomerRiskProfilingForm/{{ $form1->form_id }}" data-i18n="messages.submit"></button>
            @endif


            @elseif($state ==2)

            <button type="button" class="btn btn-outline-success" id="panel-print" data-i18n="messages.print" style="width:100px">Success</button>

            @endif



        </div>


    </div>
</body>
<script>
    const dropdownBtn = document.getElementById('actions');
    const dropdownMenu = document.querySelector('.header-dropdown-menu');

    dropdownBtn.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.header-dropdown')) {
            dropdownMenu.classList.remove('show');
        }
    });


    document.getElementById('dropdown-print')
        .addEventListener('click', function() {
            print()
        });

    document.getElementById('panel-print')
        .addEventListener('click', function() {
            print()
        });


    function clearForm() {
        // const form = document.querySelector('form');
        const form = document.getElementById("print-area");

        form.querySelectorAll('input, textarea, select').forEach(function(field) {
            if (field.type === 'checkbox' || field.type === 'radio') {
                field.checked = false;
            } else {
                field.value = '';
            }
        });

        form.querySelectorAll('canvas').forEach(function(canvas) {
            const ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });
        form.querySelectorAll('.mark-btn').forEach(function(button) {
            button.textContent = "0";

            button.classList.remove('btn-success');
            button.classList.add('btn-outline-secondary');

            const input = document.getElementById(button.dataset.name + '_value');
            if (input) {
                input.value = "0";
            }
        });
    }



    function setupLocaleSwitchButtons() {
        document.querySelectorAll('.locale-switch').forEach(btn => {
            btn.addEventListener('click', () => loadLocale(btn.dataset.lang));
        });
    }

    async function loadLocale(lang) {
        const res = await fetch(`/lang/${lang}.json`);
        translations = await res.json();
        applyTranslations();
        localStorage.setItem('locale', lang);
        setActiveButton(lang);
        fetch(`/locale/${lang}`);
    }

    function applyTranslations() {


        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.dataset.i18n;
            const text = translations[key] ?? key;
            const targetAttr = el.dataset.i18nTarget;
            const isHtml = el.hasAttribute('data-i18n-html');
            if (targetAttr) {
                el.setAttribute(targetAttr, text);
            } else if (isHtml) {
                el.innerHTML = text;
            } else {
                el.textContent = text;
            }
        });
    }






    function setActiveButton(lang) {
        document.querySelectorAll('.locale-switch').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.lang === lang);
        });
    }
</script>

</html>