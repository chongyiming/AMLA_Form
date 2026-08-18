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

    <!-- <form action="/page2" method="POST">
        @csrf -->

    <div class="container" id="container" style="margin-top:30px">
        <p class="fs-6 text-end" data-i18n="messages.formNo1">Form No1</p>
        <!-- <ul class="dropdown">
                <li><a href="locale/en">English</a></li>
                <li><a href="locale/zh">中文</a></li>
            </ul> -->
        <x-form
            title='messages.for_legal_person'
            section="2"
            :rows="[
        [
            'label' => 'messages.company_business_name',
            'input' => 'business_name',
            'type' => 'text',

        ],
        [
            'label' => 'messages.business_registration_no',
            'input' => 'brn',
            'type' => 'text',

        ],
        [
        'label' => 'messages.business_type',
        'input' => 'business_type',
        'type' => 'radio',
        'options' => [
            'sole_proprietorship' => 'messages.sole_proprietorship',
            'partnership' => 'messages.partnership',
            'limited_liability_partnership' => 'messages.limited_liability_partnership',
            'public_company' => 'messages.public_company',
            'trust' => 'messages.trust',
            'club_society_charity' => 'messages.club_society_charity',
            'other' => 'messages.other',
        ],
        'other_input' => [
        'input' => 'other_text',
        'placeholder' => 'messages.please_specify',
    ]
        
    ],
        [
            'label' => 'messages.country_of_incorporation_registration',
            'input' => 'country_incorp',
            'type' => 'select',
            'source' => 'countries',
            'field' => 'Country_Name',
            

        ],
        [
            'label' => 'messages.address_of_registered_office',
            'input' => 'registered_address',
            'type' => 'textarea',

        ],
        [
            'label' => 'messages.town',
            'input' => 'registered_town',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.state',
            'input' => 'registered_state',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.postcode',
            'input' => 'registered_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'registered_country',
                    'type' => 'text'
                ]
            ]
        ],

    [
            'label' => 'messages.address_of_principal_place_of_business',
            'input' => 'principal_address',
            'type' => 'textarea',
            'onclick' => 'copyAddress(this)',
            'copy_checkbox' => [
                'label' => 'messages.pleaseTickIfSameAsAbove',
                'fields' => [
                    [
                        'source' => 'registered_address',
                        'target' => 'principal_address',
                    ],
                    [
                        'source' => 'registered_town',
                        'target' => 'principal_town',
                    ],
                    [
                        'source' => 'registered_state',
                        'target' => 'principal_state',
                    ],
                    [
                        'source' => 'registered_postcode',
                        'target' => 'principal_postcode',
                    ],
                    [
                        'source' => 'registered_country',
                        'target' => 'principal_country',
                    ],
                ],
            ],
        ],

        [
            'label' => 'messages.town',
            'input' => 'principal_town',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.state',
            'input' => 'principal_state',
            'type' => 'text',
            'align' => 'end',
        ],

        [
            'label' => 'messages.postcode',
            'input' => 'principal_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'principal_country',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.principal_business',
            'input' => 'principle_business',
            'type' => 'text',

        ],
        [
            'label' => 'messages.contact_no',
            'input' => 'contact_no_2',
            'type' => 'text',

        ],
        [
            'label' => 'messages.purpose_of_transaction',
            'input' => 'transaction_purpose_2',
            'type' => 'select',
            'source' => 'purposeOfTrx',
            'field' => 'Purpose_Name',
        ],
        [
            'label' => 'messages.name_of_directors_partners',
            'input' => 'director_name',
            'type' => 'text',

        ],
        [
            'label' => 'messages.name_of_shareholders_beneficial_owners',
            'input' => 'shareholder',
            'type' => 'grid',
            'columns' => [
                [
                    'label' => 'messages.name',
                    'input' => 'shareholder_name',
                    'type' => 'text',
                    'row' => '2'
                ],
                [
                    'label' => 'messages.types_of_shares',
                    'input' => 'share_type',
                    'type' => 'text',
                                        'row' => '2'
                ],
                [
                    'label' => 'messages.percentage',
                    'input' => 'share_percent',
                    'type' => 'text',
                                        'row' => '2'


                ],
            ],
        ],
        [
            'label' => 'messages.name_of_beneficial_owners_through_other_means',
            'input' => 'nominee',
            'type' => 'grid',
            'columns' => [
                [
                    'label' => 'messages.name',
                    'input' => 'nominee_name',
                    'type' => 'text',
                    'row' => '2',
                    'space' => '40'
                ],
                [
                    'label' => 'messages.type_of_ownership_control_relationship',
                    'input' => 'nominee_type',
                    'type' => 'text',
                    'row' => '2',
                    'space' => '60'



                ],
                
            ],
        ],
        [
            'label' => 'messages.name_of_senior_management',
            'input' => 'senior_name',
            'type' => 'text',
            'childrens' => [
                [
                    'input' => 'senior_type',
                    'type' => 'text'
                ]
            ]

        ],

]" :form1="$form1" :countries="$countries" :purposeOfTrx="$purposeOfTrx" />
        <div class='footer'>Version 4: Dated 25/05/2026</div>


    </div>
    <script>
    </script>
    <!-- </form> -->

</body>

</html>