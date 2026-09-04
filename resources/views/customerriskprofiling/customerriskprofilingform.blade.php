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

    <form method="POST" action="{{ $state == 0 ? '/createCustomerRiskProfilingForm' : '/submitCustomerRiskProfilingForm' }}" id="customerriskprofilingform">
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
                @include('customerriskprofiling.customerriskprofilingformpage1')
                @include('customerriskprofiling.customerriskprofilingformpage2')
                @include('customerriskprofiling.customerriskprofilingformpage3')
                @include('customerriskprofiling.customerriskprofilingformpage4')
                @include('customerriskprofiling.customerriskprofilingformpage5')
                @include('customerriskprofiling.customerriskprofilingformpage6')



            </div>

            <x-to-top></x-to-top>
            @if (isset($row))
            @if ($row->first()->status === "Submitted")
            <div class="position-fixed bottom-0 end-0 border rounded-circle p-4"
                style="margin-right:20px;margin-bottom:20px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);cursor:pointer"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal-{{ $row->first()->form_id }}">
                <div class="position-relative d-inline">
                    <img src="{{ asset('/folder.png') }}"
                        style="width: 25px; height: 25px; cursor: pointer;">

                    <span class="position-absolute top-0 start-100 translate-middle badge bg-success">
                        {{$row->first()->image_count}}
                    </span>
                </div>
            </div>
            @elseif ($row->first()->status === "New")
            <div class="position-fixed bottom-0 end-0 border rounded-circle p-4"
                style="margin-right:20px;margin-bottom:20px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);cursor:pointer"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal-{{ $row->first()->form_id }}">

                <div class="position-relative d-inline">
                    <img src="{{ asset('/folder.png') }}"
                        style="width: 25px; height: 25px; cursor: pointer;">

                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                        {{ $row->first()->image_count }}
                    </span>
                </div>
            </div>
            @endif
            @endif
            <x-sidepanel :form1="$form1" :form="$form" :state="$state" form_type="Form_No_2"></x-sidepanel>
        </div>
    </form>
    @if (isset($row) && $row->isNotEmpty())
    <x-attachment-modal :row="$row->first()"></x-attachment-modal>
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
                '[name="sales_name"]',
                '[name="prepared_name"]',




            ]


            dropdownBorder.forEach(selector => {
                $(selector).each(function() {
                    $(this).prop('disabled', true).trigger('change');
                });
            });

            document.querySelectorAll('input[type="radio"]').forEach(el => {
                el.disabled = true;
            });
            document.querySelectorAll('button.mark-btn').forEach(el => {
                el.disabled = true;
                el.style.border = 'none';
                el.style.backgroundColor = 'transparent';
                el.style.color = 'black';
            });

            document.querySelectorAll('canvas').forEach(el => {
                el.style.pointerEvents = 'none';
                el.style.border = 'none';

            });
        }

        document.addEventListener('click', function(e) {
            if (!e.target.classList.contains('mark-btn')) return;

            const button = e.target;
            const name = button.dataset.name;
            const group = button.dataset.group;
            const hiddenInput = document.getElementById(name + '_value');
            const wasActive = hiddenInput.value === button.value;
            if (group) {
                document.querySelectorAll(`.mark-btn[data-group="${group}"]`)
                    .forEach(btn => {
                        const input = document.getElementById(btn.dataset.name + '_value');
                        btn.textContent = "0";
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-outline-secondary');
                        if (input) input.value = "0";
                    });
            }

            if (!wasActive) {
                button.textContent = button.value;
                button.classList.remove('btn-outline-secondary');
                button.classList.add('btn-primary');
                hiddenInput.value = button.value;
            }
            calculateTotal();
        });



        function calculateTotal() {
            const SUM_FIELD_IDS = [
                'type_value',
                'legal_clubs_value',
                'legal_arrangement_value',
                'non_pep_value',
                'local_pep_value',
                'foreign_pep_value',
                'high_net_worth_no_low_value',
                'high_net_worth_yes_high_value',
                'businessSize_small_low_value',
                'businessSize_large_high_value',
                'businessType_lowrisk_low_value',
                'businessType_highrisk_high_value',
                'CDD_clear_low_value',
                'CDD_vague_high_value',
                'beneficial_no_low_value',
                'beneficial_yes_high_value',
                'trade_no_low_value',
                'trade_yes_high_value',
                'remark_no_low_value',
                'remark_yes_high_value',
                'originCountry_lowrisk_low_value',
                'originCountry_taxhaven_medium_value',
                'originCountry_FATF_high_value',
                'countryResidence_lowrisk_low_value',
                'countryResidence_taxhaven_medium_value',
                'countryResidence_FATF_high_value',
                'product_nongold_low_value',
                'product_diamondgem_medium_value',
                'product_gold_high_value',
                'delivery_face2face_low_value',
                'delivery_behalf_medium_value',
                'delivery_non_face2face_high_value',
                'payment_electronic_low_value',
                'payment_cash_medium_value',
                'payment_cash_high_value',
                'transaction_fundFrom_local_low_value',
                'transaction_fundFrom_foreign_medium_value',
                'transaction_fundFrom_high_value',
                'transaction_fundFrom_known_low_value',
                'transaction_fundFrom_unrelated_high_value',
                'transaction_fundTrans_local_low_value',
                'transaction_fundTrans_foreign_medium_value',
                'transaction_fundTrans_highrisk_high_value',
                'transaction_fundTrans_known_low_value',
                'transaction_fundTrans_unrelated_high_value',
            ];
            const total = SUM_FIELD_IDS.reduce((sum, id) => {
                const el = document.getElementById(id);
                return sum + (el ? parseFloat(el.value) || 0 : 0);
            }, 0);

            console.log(total)
            document.getElementsByName('individual_minusCash')[0].value = '';
            document.getElementsByName('nonindividual_minusCash')[0].value = '';
            document.getElementsByName('individual_minusnonCash')[0].value = '';
            document.getElementsByName('nonindividual_minusnonCash')[0].value = '';

            document.getElementsByName('individual_minusCash_percentage')[0].value = '';
            document.getElementsByName('nonindividual_minusCash_percentage')[0].value = '';
            document.getElementsByName('individual_minusnonCash_percentage')[0].value = '';
            document.getElementsByName('nonindividual_minusnonCash_percentage')[0].value = '';
            document.getElementsByName('total_mark')[0].value = '';
            if (total > 0 && total <= 39) {
                document.getElementsByName('individual_minusCash')[0].value = total;
                document.getElementsByName('individual_minusCash_percentage')[0].value = (total / 39 * 100).toFixed(2);
                document.getElementsByName('total_mark')[0].value = (total / 39 * 100).toFixed(2);;
            } else if (total > 39 && total <= 42) {
                document.getElementsByName('nonindividual_minusCash')[0].value = total;
                document.getElementsByName('nonindividual_minusCash_percentage')[0].value = (total / 42 * 100).toFixed(2);
                document.getElementsByName('total_mark')[0].value = (total / 42 * 100).toFixed(2);

            } else if (total > 42 && total <= 45) {
                document.getElementsByName('individual_minusnonCash')[0].value = total;
                document.getElementsByName('individual_minusnonCash_percentage')[0].value = (total / 45 * 100).toFixed(2);
                document.getElementsByName('total_mark')[0].value = (total / 45 * 100).toFixed(2);


            } else if (total > 45 && total <= 48) {
                document.getElementsByName('nonindividual_minusnonCash')[0].value = total;
                document.getElementsByName('nonindividual_minusnonCash_percentage')[0].value = (total / 48 * 100).toFixed(2);
                document.getElementsByName('total_mark')[0].value = (total / 48 * 100).toFixed(2);


            }

        }
        $(function() {
            const $sales = $('select[name="sales_name"]');
            const $prepare = $('select[name="prepared_name"]');

            $sales.on('select2:select', function(e) {
                const selectedId = e.params.data.id;
                const selectedText = e.params.data.text;
                $prepare.val(selectedId).trigger('change');
            });

        });
    </script>
</body>

</html>