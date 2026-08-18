<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>

    <!-- <form action="/page3" method="POST">
        @csrf -->
    <div class="container" id="container">
        <p class="fs-6 text-end" data-i18n="messages.formNo1">Form No1</p>
        <!-- <ul class=" dropdown">
            <li><a href="locale/en">English</a></li>
            <li><a href="locale/zh">中文</a></li>
            </ul> -->
        <x-form
            title='messages.for_legal_arrangement'
            section="3"
            :rows="[
        [
            'label' => 'messages.name',
            'input' => 'arrangement_name',
            'type' => 'text',

        ],
        [
            'label' => 'messages.business_registration_no',
            'input' => 'arrangement_registration',
            'type' => 'text',

        ],
        [
        'label' => 'messages.business_type',
        'input' => 'arrangement_type',
        'type' => 'radio',
        'options' => [
            'trust' => 'messages.trust',
            'club_society_charity' => 'messages.club_society_charity',
            'other' => 'messages.other',
        ],
        'other_input' => [
        'input' => 'arrangement_other_text',
        'placeholder' => 'messages.please_specify',
    ]
        
    ],
        [
            'label' => 'messages.country_of_registration',
            'input' => 'country_registration',
            'type' => 'select',
            'source' => 'countries',
            'field' => 'Country_Name',

        ],
        [
            'label' => 'messages.address_of_registered_office',
            'input' => 'arrangement_address',
            'type' => 'textarea',

        ],
        [
            'label' => 'messages.town',
            'input' => 'arrangement_town',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.state',
            'input' => 'arrangement_state',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.postcode',
            'input' => 'arrangement_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'arrangement_country',
                    'type' => 'text'
                ]
            ]
        ],

    [
            'label' => 'messages.legal_arrangement_principal_place_of_activity_address',
            'input' => 'principal_address_arrangement',
            'type' => 'textarea',
            'onclick' => 'copyAddress(this)',
            'copy_checkbox' => [
                'label' => 'messages.pleaseTickIfSameAsAbove',
                'fields' => [
                    [
                        'source' => 'arrangement_address',
                        'target' => 'principal_address_arrangement',
                    ],
                    [
                        'source' => 'arrangement_town',
                        'target' => 'principal_town_arrangement',
                    ],
                    [
                        'source' => 'arrangement_state',
                        'target' => 'principal_state_arrangement',
                    ],
                    [
                        'source' => 'arrangement_postcode',
                        'target' => 'principal_postcode_arrangement',
                    ],
                    [
                        'source' => 'arrangement_country',
                        'target' => 'principal_country_arrangement',
                    ],
                ],
            ],
        ],

        [
            'label' => 'messages.town',
            'input' => 'principal_town_arrangement',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.state',
            'input' => 'principal_state_arrangement',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.postcode',
            'input' => 'principal_postcode_arrangement',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'principal_country_arrangement',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.principal_activity',
            'input' => 'principle_activity',
            'type' => 'text',

        ],
        [
            'label' => 'messages.contact_no',
            'input' => 'contact_no_3',
            'type' => 'text',

        ],
        [
            'label' => 'messages.purpose_of_transaction',
            'input' => 'transaction_purpose_3',
            'type' => 'select',
            'source' => 'purposeOfTrx',
            'field' => 'Purpose_Name',

        ],
        [
            'label' => 'messages.name_of_directors_partners',
            'type' => 'table',

            'columns' => [
                [
                    'label' => 'messages.name',
                    'input' => 'name',
                    'type' => 'text',
                ],
                [
                    'label' => 'messages.id',
                    'input' => 'id',
                    'type' => 'text',
                ],
                [
                    'label' => 'messages.address',
                    'input' => 'address',
                    'type' => 'text',
                ],
            ],

            'rows' => [
                [
                    'label' => 'messages.settlor',
                    'input' => 'settlor',
                ],
                [
                    'label' => 'messages.trustee',
                    'input' => 'trustee',
                ],
                [
                    'label' => 'messages.protector',
                    'input' => 'protector',
                ],
                [
                    'label' => 'messages.beneficiary_class_of_beneficiary',
                    'input' => 'beneficiary_class_of_beneficiary',
                ],
                [
                    'label' => 'messages.other_bo_information',
                    'input' => 'other_bo_information',
                ],
            ],
            'extra_fields' => [
                    [
                        'label' => 'messages.relationship_with_trust',
                        'input' => 'trust_text',
                        'type' => 'textarea',                    ],
                ],

        ]

]" :form1="$form1" :countries="$countries" :purposeOfTrx="$purposeOfTrx" />
        <div class='footer'>Version 4: Dated 25/05/2026</div>


    </div>
    <script>

    </script>
    <!-- </form> -->
</body>

</html>