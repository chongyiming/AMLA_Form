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

            #clear-btn {
                display: none;
            }

        }
    </style>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>

    <form method="POST" action="{{ $state == 0 ? '/createSuspiciousTransactionReportNonIndividual' : '/submitSuspiciousTransactionReportNonIndividual' }}">
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
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage1')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage2')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage3')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage4')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage5')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage6')
                @include('suspicioustransactionnonindividual.suspicioustransactionreportnonindividualpage7')

            </div>

            <x-to-top></x-to-top>
            @if (isset($row))
            <x-attachment-button :row="$row"></x-attachment-button>
            @endif
            <x-sidepanel :form1="$form1" :form="$form" :state="$state" form_type="Form_No_4b" :branch="$branch"></x-sidepanel>
        </div>
    </form>
    @if (isset($row) && $row->isNotEmpty())
    <x-attachment-modal :row="$row->first()" title="Suspicious Transaction Report - Non Individual"></x-attachment-modal>
    @endif
    <script>
        let translations = {};



        document.addEventListener('DOMContentLoaded', () => {
            const savedLocale = localStorage.getItem('locale') || 'en';
            loadLocale(savedLocale);
            setupLocaleSwitchButtons();
        });

        const state = @json($state);

        if (state == 2) {
            const fieldsToDisable = [
                'input[type="text"]',
                'input[type="button"]',
                'input[type="date"]',
                'input[type="number"]',

                'textarea',
                'button[id="clear-btn1"]',
                'button[id="clear-btn"]'

            ];

            fieldsToDisable.forEach(selector => {
                document.querySelectorAll(selector).forEach(el => {
                    el.disabled = true;
                    el.style.background = 'transparent';
                });
            });

            const readonlySelects = [
                '[name="attempted_not_complete"]',
                '[name="str_reported_due"]',
                '[name="state_relevant_source"]',
                '[name="suspect_predicate"]',
                '[name="related_pep"]',
                '[name="cust_nationality"]',
                '[name="cust_state"]',
                '[name="cust_country"]',
                '[name="cust_corr_state"]',
                '[name="cust_corr_country"]',
                '[name="cust_aml_rating"]',
                '[name="cust_emp_sector"]',
                '[name="settlor_role"]',
                '[name="settlor_title"]',
                '[name="settlor_gender"]',
                '[name="settlor_nationality"]',
                '[name="settlor_state"]',
                '[name="settlor_country"]',
                '[name="settlor_corr_state"]',
                '[name="settlor_corr_country"]',
                '[name="settlor_aml_rating"]',
                '[name="settlor_occupation"]',
                '[name="settlor_emp_sector"]',
                '[name="settlor_income_range"]',
                '[name="settlor_marital_status"]',
                '[name="settlor_spouse_nationality"]',
                '[name="bank_acc_type"]',
                '[name="sus_trans_producttype"]',
                '[name="sus_trans_currency"]',
                '[name="sus_title"]',
                '[name="sus_gender"]',
                '[name="sus_nationality"]',
                '[name="sus_state"]',
                '[name="sus_country"]',
                '[name="sus_corr_state"]',
                '[name="sus_corr_country"]',
                '[name="sus_phone_country"]',
                '[name="sus_occu"]',
                '[name="sus_relationship"]',
                '[name="firm_producttype"]',

            ];



            function makeSelect2Readonly(selector) {
                $(selector).each(function() {
                    const $el = $(this);
                    const $container = $el.next('.select2-container');
                    $container.addClass('select2-readonly');
                });
            }

            $(document).ready(function() {
                readonlySelects.forEach(makeSelect2Readonly);
            });


        }
    </script>
</body>

</html>