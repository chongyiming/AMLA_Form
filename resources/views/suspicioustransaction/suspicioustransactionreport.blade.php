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

    <form method="POST" action="{{ $state == 0 ? '/createSuspiciousTransactionReport' : '/submitEnhancedCustomerDueDiligenceForm' }}" id="enhancedcustomerduediligenceform">
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
                @include('suspicioustransaction.suspicioustransactionreportpage1')
                @include('suspicioustransaction.suspicioustransactionreportpage2')
                @include('suspicioustransaction.suspicioustransactionreportpage3')
                @include('suspicioustransaction.suspicioustransactionreportpage4')
                @include('suspicioustransaction.suspicioustransactionreportpage5')
                @include('suspicioustransaction.suspicioustransactionreportpage6')

            </div>

            <x-to-top></x-to-top>
            @if (isset($row))
            <x-attachment-button :row="$row"></x-attachment-button>
            @endif
            <x-sidepanel :form1="$form1" :form="$form" :state="$state" form_type="Form_No_4a" :branch="$branch"></x-sidepanel>
        </div>
    </form>
    @if (isset($row) && $row->isNotEmpty())
    <x-attachment-modal :row="$row->first()" title="Enhanced Customer Due Diligence Form"></x-attachment-modal>
    @endif
    <script>
        let translations = {};



        document.addEventListener('DOMContentLoaded', () => {
            const savedLocale = localStorage.getItem('locale') || 'en';
            loadLocale(savedLocale);
            setupLocaleSwitchButtons();
        });
    </script>
</body>

</html>