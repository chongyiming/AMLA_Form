<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 750px;
            height: 1070px;
            padding-bottom: 10px;
            margin: auto;
            box-sizing: border-box;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin-top: 10px;
        }

        h4 {
            text-align: end;
        }

        .header_Text {
            font-size: 15px;
            text-align: center;
            margin-top: 5px;
        }

        .header_Text2 {
            font-size: 15px;
            text-align: center;
            font-weight: 300;
        }

        .box {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-top: 10px;


        }

        .row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 10px;
        }

        .row label {
            width: 100px;
        }

        .row input {
            width: 50%;
            font-size: 10px;
            padding: 3px 5px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
            box-sizing: border-box;
            color: #333;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }



        .footer {
            margin-top: auto;
            font-size: 10px;
        }

        h1 {
            font-weight: 100;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- <form action="/page1" method="POST">
        @csrf -->
    <div class="container" id="container">

        <h4 data-i18n="messages.formNo1" style="margin-bottom: 0;"></h4>
        <!-- <div data-i18n="messages.formNo1" style="margin-bottom: 0;"></div> -->
        <img src="{{ asset('/image.png') }}" style="width: 150px;margin: 0 auto">
        <div class='header_Text'>@lang('messages.customerDueDiligenceForm')</div>
        <div class='header_Text2'>@lang('messages.customerDueDiligenceForm2')</div>
        <x-card
            title-key="messages.customerDueDiligence"
            description-key="messages.identificationAndVerificationOfACustomerAsRequiredUnder"
            :bullet-keys="[
                'messages.section_16_amla',
                'messages.paragraph_14_aml_cft',
            ]" />
        <div class="box">
            <div class="row">
                <label data-i18n="messages.branch"></label>

                <input type="text" name="branch_name" value="{{ old('branch_name', $form1->branch_name ?? '') }}">

            </div>

            <div class="row">
                <label data-i18n="messages.formNo"></label>
                <input type="text" name="doc_no" value="{{ old('doc_no', $form->doc_no ?? '') }}">

            </div>

            <div class="row">
                <label data-i18n="messages.preparer"></label>
                <!-- <input type="text" name="preparer_name" value="{{  old('preparer_name', $form1->preparer_name ?? '') }}"> -->
                <div style="width:53%;display:flex;padding-left:0">
                    <x-searchable-dropdown
                        :options="$preparer"
                        name="preparer_name"
                        field="USERNAME"
                        :form1="$form1"
                        border="show" />
                </div>
            </div>

            <div class="row">
                <label data-i18n="messages.date"></label>
                <input type="text" name="date" value="{{  old('date', $form1->date ?? '') }}" placeholder='yyyy-mm-dd'>

            </div>
        </div>
        <x-form
            title="messages.individual"
            section="1"
            :rows="[
        [
            'label' => 'messages.full_name',
            'input' => 'full_name',
            'type' => 'text',
        ],
        [
            'label' => 'messages.nric_passport_no',
            'input' => 'nric_passport',
            'type' => 'text',

        ],
        [
            'label' => 'messages.date_of_birth',
            'input' => 'dob',
            'type' => 'text',
            'placeholder'=>'yyyy-mm-dd'

        ],
        [
            'label' => 'messages.residential_address',
            'input' => 'residential_add',
            'type' => 'textarea',

        ],
        [
            'label' => 'messages.town',
            'input' => 'residential_town',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.state',
            'input' => 'residential_state',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.postcode',
            'input' => 'residential_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'residential_country',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.mailing_address',
            'input' => 'mailing_add',
            'type' => 'textarea',
            'onclick' => 'copyAddress(this)',
            'copy_checkbox' => [
                'label' => 'messages.pleaseTickIfSameAsAbove',
                'fields' => [
                    [
                        'source' => 'residential_add',
                        'target' => 'mailing_add',
                    ],
                    [
                        'source' => 'residential_town',
                        'target' => 'mailing_town',
                    ],
                    [
                        'source' => 'residential_state',
                        'target' => 'mailing_state',
                    ],
                    [
                        'source' => 'residential_postcode',
                        'target' => 'mailing_postcode',
                    ],
                    [
                        'source' => 'residential_country',
                        'target' => 'mailing_country',
                    ],
                ],
            ],
        ],

        [
            'label' => 'messages.town',
            'input' => 'mailing_town',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.state',
            'input' => 'mailing_state',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.postcode',
            'input' => 'mailing_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'mailing_country',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.nationality',
            'input' => 'nationality',
            'type' => 'select',
            'source' => 'countries',
            'field' => 'Country_Name',
        ],
        [
            'label' => 'messages.rank_reference',
            'input' => 'rank_reference',
            'type' => 'text',
        ],
        [
            'label' => 'messages.occupation_type',
            'input' => 'occupation_status',
            'type' => 'select',
            'source' => 'occupationType',
            'field' => 'Occupation_Name',
            'childrens' => [
                [
                    'input' => 'occupation_type',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.name_of_employer',
            'input' => 'employer',
            'type' => 'text',
        ],
        [
            'label' => 'messages.nature_of_business',
            'input' => 'nature_of_business_select',
            'type' => 'text',
            'direction' => 'column',
            'childrens' => [
                [
                    'input' => 'nature_of_business_text',
                    'type' => 'text',
                ]
            ]
        ],
        [
            'label' => 'messages.contact_number',
            'input' => 'contact_number',
            'type' => 'text',
        ],
        [
            'label' => 'messages.purpose_of_transaction',
            'input' => 'transaction_purpose',
            'type' => 'text',
        ],

]"
            :form1="$form1" :countries="$countries" :occupationType="$occupationType" />

        <div class='footer'>Version 4: Dated 25/05/2026</div>


    </div>
    <script>

    </script>
    <!-- </form> -->
</body>

</html>