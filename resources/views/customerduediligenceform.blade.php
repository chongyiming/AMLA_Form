<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html {
            scroll-behavior: smooth;
        }


        .a4_container {
            width: 750px;
            margin: auto;

        }

        .page_container {
            display: block;

        }



        .to-top {
            background: white;
            position: fixed;
            bottom: 16px;
            right: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: all .4s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            padding: 14px;
        }

        .to-top.active {
            bottom: 32px;
            pointer-events: auto;
            opacity: 1;

        }

        .page_header {
            position: sticky;
            top: 0;

            display: flex;
            justify-content: flex-end;
            padding: 10px;
            gap: 10px;
            background-color: white;

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
            padding: 6px 14px;
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

        .submit-button {
            margin-top: 30px;
            padding: 12px 28px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #2563eb;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease, box-shadow 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
        }

        .submit-button:hover {
            background-color: #1d4ed8;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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
            /* width: 90px; */
            flex: 1;
            padding: 8px 12px;
            cursor: pointer;
            text-align: center;
            border-radius: 10px;

        }





        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 600px;
        }

        .modal-label {
            width: 100px;
            align-items: center;
            display: flex;

        }

        .modal-switch {
            right: 0;
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #ddd;
            cursor: pointer;
            width: 100px;
            transition:
                background-color 0.15s ease,
                color 0.15s ease,
                border-color 0.15s ease,
                box-shadow 0.15s ease,
                transform 0.1s ease;
        }

        .modal-input {
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            font-weight: 500;
            width: 150px;
            border: 1px solid #ddd;
            flex: 1;

        }






        @media (max-width: 1415px) {
            .header-dropdown {
                display: inline-block;
            }

            .trx-no {
                display: none;
            }


            .panel-switch {
                display: none;
            }

            .small-width-trx-no {
                display: flex;
                flex-direction: column;
                gap: 5px
            }
        }

        @media print {

            body * {
                visibility: hidden;
            }

            #print-area,
            #print-area * {
                visibility: visible;
            }


            #print-area {
                position: absolute;
                left: 0;
                top: 0;
            }

            #container {
                padding-left: 0;
                padding-right: 0;
                padding-bottom: 0;

                margin-top: 0;
                box-shadow: none
            }

        }
    </style>

</head>

<body>
    <form method="POST" action="{{ $state == 0 ? '/create' : '/submit' }}">
        @csrf

        <div class="page_header">
            <div class="locale-switcher">
                <button type="button" class="locale-switch" data-lang="en">English</button>
                <button type="button" class="locale-switch" data-lang="zh">中文</button>

            </div>
            <div class="header-dropdown">
                <button type="button" class="header-panel-switch">
                    Actions
                </button>
                <div class="header-dropdown-menu">
                    <div class="small-width-trx-no">
                        <label>
                            <span data-i18n="messages.trxno"></span>
                        </label>
                        <input type="text" class="panel-input" name="trx_no" readonly onclick="openTrxModal()" value="{{ old('trx_no') }}">
                    </div>
                    <div style="display: flex;justify-content: space-between;gap:10px">

                        @if($state == 0)
                        <button type="submit" style="border: 1px solid #59c45e;color:#59c45e;background-color:white" data-i18n="messages.create"></button>
                        <button type="button" style="border: 1px solid #dc2626;color:#dc2626;background-color:white" onclick="clearForm()" data-i18n="messages.clear"></button>
                        @elseif($state ==1)
                        <button type="button" style="border: 1px solid #007bff;color:#007bff;background-color:white" data-i18n="messages.update"></button>
                        <button type="button" style="border: 1px solid #dc2626;color:#dc2626;background-color:white" onclick="clearForm()" data-i18n="messages.clear"></button>
                        <button type="submit" style="border: 1px solid #59c45e;color:#59c45e;background-color:white" data-i18n="messages.submit"></button>
                        @elseif($state ==2)
                        <button id="dropdown-print" type="button" style="background-color:white" data-i18n="messages.print"></button>
                        @endif

                    </div>

                </div>
            </div>
            <x-menu-sidebar></x-menu-sidebar>


        </div>

        <div class="page_container">
            <div class="a4_container">
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style='color:red'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div id="print-area">
                    @include('page1')
                    @include('page2')
                    @include('page3')
                    @include('page4')
                </div>
                <a href="#" class="to-top">
                    <img src="images/up-arrows.png" style="width: 30px;height: 30px;">
                </a>
                <!-- <button class="submit-button" type="submit" data-i18n="messages.submit"></button> -->


            </div>
            <x-sidepanel :form1="$form1" :form="$form" :state="$state"></x-sidepanel>

        </div>


    </form>
    <script>
        let translations = {};


        function setupLocaleSwitchButtons() {
            document.querySelectorAll('.locale-switch').forEach(btn => {
                btn.addEventListener('click', () => loadLocale(btn.dataset.lang));
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedLocale = localStorage.getItem('locale') || 'en';
            loadLocale(savedLocale);
            setupLocaleSwitchButtons();
        });

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




        const toTop = document.querySelector(".to-top");
        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 100) {
                toTop.classList.add("active");

            } else {
                toTop.classList.remove("active")
            }
        })

        // function showOther(radio, inputName) {
        //     let other = document.getElementsByName(inputName)[0];

        //     if (radio.value === 'other') {
        //         other.style.display = 'block';
        //     } else {
        //         other.style.display = 'none';
        //         other.value = '';
        //     }
        // }

        function showOther(radio, inputName) {
            let other = document.getElementsByName(inputName)[0];
            if (radio.value === 'other') {
                other.style.display = 'block';
            } else {
                other.style.display = 'none';
                other.value = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="radio"][data-other-input]').forEach(function(radio) {
                if (radio.checked) {
                    showOther(radio, radio.dataset.otherInput);
                }
            });
        });

        function copyAddress(checkbox) {
            let fields = JSON.parse(checkbox.dataset.fields);
            fields.forEach(function(field) {
                let source = document.getElementsByName(field.source)[0];
                let target = document.getElementsByName(field.target)[0];
                if (checkbox.checked) {
                    target.value = source.value;
                } else {
                    target.value = '';
                }
            });
        }


        function setActiveButton(lang) {
            document.querySelectorAll('.locale-switch').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.lang === lang);
            });
        }

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
        }

        const dropdownBtn = document.querySelector('.header-panel-switch');
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



        const state = @json($state);

        if (state == 2) {
            document.querySelectorAll('input, textarea, select, button').forEach(element => {
                element.disabled = true;
            });

            document.querySelectorAll('input, textarea, select').forEach(element => {
                element.style.border = 'none';
                element.style.background = 'transparent';
            });
        }
    </script>
</body>

</html>