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
    </style>
</head>

<body>

    <!-- <form action="/page4" method="POST">
        @csrf -->
    <div class="container" id="container">
        <p class="fs-6 text-end" data-i18n="messages.formNo1">Form No1</p>
        <!-- <ul class="dropdown">
                <li><a href="locale/en">English</a></li>
                <li><a href="locale/zh">中文</a></li>
            </ul> -->
        <h2 data-i18n="messages.person_transacting_on_behalf" style="text-align: center;margin-top:10px"></h2>
        <x-form :rows="[
        [
            'label' => 'messages.full_name',
            'input' => 'transacting_name',
            'type' => 'text',

        ],
        [
            'label' => 'messages.nric_passport_no',
            'input' => 'transacting_nric_passport',
            'type' => 'text',

        ],
        [
            'label' => 'messages.date_of_birth',
            'input' => 'transacting_dob',
            'type' => 'text',
                        'placeholder'=>'yyyy-mm-dd'


        ],
        [
            'label' => 'messages.address',
            'input' => 'transacting_address',
            'type' => 'textarea',

        ],
        [
            'label' => 'messages.town',
            'input' => 'transacting_town',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.state',
            'input' => 'transacting_state',
            'type' => 'text',
            'align' => 'end'
        ],
        [
            'label' => 'messages.postcode',
            'input' => 'transacting_postcode',
            'type' => 'text',
            'align' => 'end',
            'childrens' => [
                [
                    'label' => 'messages.country',
                    'input' => 'transacting_country',
                    'type' => 'text'
                ]
            ]
        ],
        [
            'label' => 'messages.nationality',
            'input' => 'transacting_nationality',
            'type' => 'select',
            'source' => 'countries',
            'field' => 'Country_Name',
        ],
        [
            'label' => 'messages.occupation_type',
            'input' => 'transacting_occupation',
            'type' => 'select',
            'source' => 'occupationType',
            'field' => 'Occupation_Name',
            'childrens' => [
                [
                    'input' => 'transacting_occupation_status',
                    'type' => 'text',
                    'placeholder'=>'messages.occupation'

                ]
            ]
        ],
        [
            'label' => 'messages.name_of_employer',
            'input' => 'transacting_employer',
            'type' => 'text',
        ],
        [
            'label' => 'messages.contact_number',
            'input' => 'transacting_contact',
            'type' => 'text',
        ],
]" :form1="$form1" :countries="$countries" :purposeOfTrx="$purposeOfTrx" :occupationType="$occupationType" />

        <x-form-statement
            title='messages.verification_for_office_use'
            :columns="[
        [
            'title' => 'messages.individual',
            'sections' => [
                [
                    'description' => 'messages.verify_individual_legal_person_legal_arrangement_identity',
                    'items' => [
                        'messages.identity_card_malaysian_government',
                        'messages.employee_identity_card_ministries_statutory_bodies',
                        'messages.foreign_passport_un_identity_card',
                        'messages.documents_issued_by_malaysian_government',
                        'messages.biometric_identification',
                        'messages.organisation_reliable_electronic_data',
                    ],
                ],
            ],
        ],
        [
            'title' => 'messages.legal_persons_legal_arrangement',
            'sections' => [
                [
                    'description' => 'messages.verify_legal_person_identity_information_documents',
                    'items' => [
                        'messages.constitution_certificate_incorporation_partnership',
                        'messages.reliable_references_verify_customer_identity',
                    ],
                ],
                [
                    'description' => 'messages.verify_directors_shareholders_partners_documents',
                    'items' => [
                        'messages.companies_commission_forms',
                        'messages.other_equivalent_documents_legal_person',
                         'messages.authorisation_represent_person',
                         'messages.letter_of_authority_directors_resolution',
                    ],
                ],
                
            ],
        ],
    ]" />
        <div class='footer'>Version 4: Dated 25/05/2026</div>


    </div>
    <script>

    </script>
    <!-- </form> -->
</body>

</html>