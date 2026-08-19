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

        /* .page_header {
            position: sticky;
            top: 0;

            display: flex;
            justify-content: flex-end;
            padding: 15px;
            gap: 10px;
            background-color: white;
            z-index: 1;


        } */










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
                box-shadow: none;
            }

        }
    </style>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">

</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>

    <form method="POST" action="{{ $state == 0 ? '/create' : '/submit' }}">
        @csrf


        <div class="a4_container" id="a4_container">
            @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style='color:red'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <br>
            <div id="print-area" style="width:100%;padding:0">
                @include('page1')
                @include('page2')
                @include('page3')
                @include('page4')

            </div>
            <a href="#" class="to-top">
                <img src="{{ asset('up-arrows.png') }}" style="width: 30px;height: 30px;">
            </a>
            <!-- <button class="submit-button" type="submit" data-i18n="messages.submit"></button> -->


        </div>
        <x-sidepanel :form1="$form1" :form="$form" :state="$state"></x-sidepanel>



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



        const state = @json($state);

        if (state == 2) {
            const fieldsToDisable = [
                '[name="trx_no"]',
                '[name="branch_name"]',
                '[name="preparer_name"]',
                '[name="doc_no"]',
                '[name="date"]',
                '[name="full_name"]',
                '[name="nric_passport"]',
                '[name="dob"]',

                '[name="residential_add"]',
                '[name="residential_town"]',
                '[name="residential_state"]',
                '[name="residential_postcode"]',

                '[name="mailing_add"]',
                '[name="mailing_town"]',
                '[name="mailing_state"]',
                '[name="mailing_postcode"]',



                '[name="rank_reference"]',
                '[name="employer"]',

                '[name="nature_of_business_select"]',
                '[name="nature_of_business_text"]',

                '[name="contact_number"]',

                '[name="transaction_purpose"]',
                '[name="business_name"]',
                '[name="brn"]',
                '[name="business_type"]',
                '[name="other_text"]',


                '[name="registered_address"]',
                '[name="registered_town"]',
                '[name="registered_state"]',
                '[name="registered_postcode"]',

                '[name="principal_address"]',
                '[name="principal_town"]',
                '[name="principal_state"]',
                '[name="principal_postcode"]',

                '[name="principle_business"]',

                '[name="contact_no_2"]',

                '[name="director_name"]',




                '[name="senior_name"]',
                '[name="senior_type"]',
                '[name="arrangement_name"]',
                '[name="arrangement_registration"]',
                '[name="arrangement_type"]',
                '[name="arrangement_other_text"]',


                '[name="arrangement_address"]',
                '[name="arrangement_town"]',
                '[name="arrangement_state"]',
                '[name="arrangement_postcode"]',

                '[name="principal_address_arrangement"]',
                '[name="principal_town_arrangement"]',
                '[name="principal_state_arrangement"]',
                '[name="principal_postcode_arrangement"]',


                '[name="principle_activity"]',

                '[name="contact_no_3"]',




                '[name="trust_text"]',
                '[name="transacting_name"]',
                '[name="transacting_nric_passport"]',
                '[name="transacting_dob"]',

                '[name="transacting_address"]',
                '[name="transacting_town"]',
                '[name="transacting_state"]',
                '[name="transacting_postcode"]',


                '[name="transacting_employer"]',
                '[name="transacting_contact"]',
                'input[type="checkbox"]'
            ];

            fieldsToDisable.forEach(selector => {
                document.querySelectorAll(selector).forEach(el => {
                    el.disabled = true;
                    el.style.border = 'none';
                    el.style.background = 'transparent';
                });
            });

            const remainBorder = [
                '[name="occupation_type"]',
                '[name="transacting_occupation_status"]',
                '[name="residential_country"]',
                '[name="mailing_country"]',
                '[name="registered_country"]',
                '[name="principal_country"]',
                '[name="arrangement_country"]',
                '[name="principal_country_arrangement"]',
                '[name="transacting_country"]',
                '[name^="shareholder["][name$="[shareholder_name]"]',
                '[name^="shareholder["][name$="[share_type]"]',
                '[name^="shareholder["][name$="[share_percent]"]',
                '[name^="nominee["][name$="[nominee_name]"]',
                '[name^="nominee["][name$="[nominee_type]"]',

                '[name="settlor[name]"]',
                '[name="settlor[id]"]',
                '[name="settlor[address]"]',

                '[name="trustee[name]"]',
                '[name="trustee[id]"]',
                '[name="trustee[address]"]',

                '[name="protector[name]"]',
                '[name="protector[id]"]',
                '[name="protector[address]"]',

                '[name="beneficiary_class_of_beneficiary[name]"]',
                '[name="beneficiary_class_of_beneficiary[id]"]',
                '[name="beneficiary_class_of_beneficiary[address]"]',

                '[name="other_bo_information[name]"]',
                '[name="other_bo_information[id]"]',
                '[name="other_bo_information[address]"]',



            ]

            remainBorder.forEach(selector => {
                document.querySelectorAll(selector).forEach(el => {
                    el.disabled = true;
                    el.style.background = 'transparent';
                });
            });


            const dropdownBorder = [
                '[name="nationality"]',
                '[name="occupation_status"]',
                '[name="country_incorp"]',
                '[name="transaction_purpose_2"]',
                '[name="country_registration"]',
                '[name="transaction_purpose_3"]',
                '[name="transacting_nationality"]',

                '[name="transacting_occupation"]',

            ]


            dropdownBorder.forEach(selector => {
                $(selector).each(function() {
                    $(this).prop('disabled', true).trigger('change');
                });
            });


            // const removeDropdownBorder = [
            //     '[name="preparer_name"]',
            // ];

            // removeDropdownBorder.forEach(selector => {
            //     document.querySelectorAll(selector).forEach(el => {
            //         el.disabled = true;

            //         // remove border on the select2 rendered container
            //         const container = el.nextElementSibling; // .select2-container
            //         if (container) {
            //             container.querySelector('.select2-selection--single')
            //                 .style.border = 'none';
            //         }
            //     });
            // });
        }
    </script>
</body>

</html>