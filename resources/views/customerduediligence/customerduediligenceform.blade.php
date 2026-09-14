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

        html {
            scroll-behavior: smooth;
        }


        .a4_container {
            width: 750px;
            margin: auto;
            font-family: "Times New Roman", Times, serif;

        }




        @media print {

            @page {
                size: A4;
            }

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
                max-width: 100% !important;
                box-shadow: none !important;
            }

        }
    </style>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>

    <form method="POST" action="{{ $state == 0 ? '/create' : '/submitCustomerDueDiligenceForm' }}">
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
                @include('customerduediligence.customerduediligenceformpage1')
                @include('customerduediligence.customerduediligenceformpage2')
                @include('customerduediligence.customerduediligenceformpage3')
                @include('customerduediligence.customerduediligenceformpage4')

            </div>

            <x-to-top></x-to-top>

            @if (isset($row))
            <x-attachment-button :row="$row"></x-attachment-button>
            @endif
            <x-sidepanel :form1="$form1" :form="$form" :state="$state" form_type="Form_No_1" :branch="$branch"></x-sidepanel>





        </div>




    </form>
    @if (isset($row) && $row->isNotEmpty())
    <x-attachment-modal :row="$row->first()" title="Customer Due Diligence Form"></x-attachment-modal>
    @endif
    <script>
        let translations = {};

        document.addEventListener('DOMContentLoaded', () => {
            const savedLocale = localStorage.getItem('locale') || 'en';
            loadLocale(savedLocale);
            setupLocaleSwitchButtons();
        });


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



        const state = @json($state);

        if (state == 2) {
            const fieldsToDisable = [
                'input[type="text"]',
                'input[type="button"]',
                'input[type="date"]',

                'textarea',
                'button[id="clear-btn1"]',
                'button[id="clear-btn"]'

            ];

            fieldsToDisable.forEach(selector => {
                document.querySelectorAll(selector).forEach(el => {
                    el.disabled = true;
                    el.style.border = 'none';
                    el.style.background = 'transparent';
                });
            });

            const dropdownBorder = [
                '[name="preparer_name"]',
                '[name="nationality"]',
                '[name="occupation_status"]',
                '[name="nature_of_business_select"]',
                '[name="transaction_purpose"]',
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

            document.querySelectorAll('input[type="radio"]').forEach(el => {
                el.disabled = true;
            });
            document.querySelectorAll('input[type="checkbox"]').forEach(el => {
                el.disabled = true;
            });



        }
    </script>
</body>

</html>