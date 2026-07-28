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


        .page_container {
            width: 794px;
            margin: auto;
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
            display: flex;
            align-items: center;
            justify-content: flex-end;
            min-width: 794px;
            margin-bottom: 10px;
        }

        .locale-switcher {
            display: flex;
            background: #f2f2f2;
            border-radius: 6px;
        }

        .locale-switch {
            border: none;
            background: transparent;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.15s ease, color 0.15s ease;
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
    </style>
</head>

<body>
    <form method="POST" action="/create">
        @csrf

        <div class="page_header">
            <div class="locale-switcher">
                <button type="button" class="locale-switch" data-lang="en">English</button>
                <button type="button" class="locale-switch" data-lang="zh">中文</button>
            </div>
        </div>
        <div class="page_container">
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='color:red'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @include('page1')
            <br>
            <br>
            @include('page2')
            <br>
            <br>
            @include('page3')
            <br>
            <br>
            @include('page4')
            <a href="#" class="to-top">
                <img src="images/up-arrows.png" style="width: 30px;height: 30px;">
            </a>
            <button class="submit-button" type="submit">Submit</button>
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

        function showOther(radio, inputName) {
            let other = document.getElementsByName(inputName)[0];

            if (radio.value === 'other') {
                other.style.display = 'block';
            } else {
                other.style.display = 'none';
                other.value = '';
            }
        }

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
    </script>
</body>

</html>