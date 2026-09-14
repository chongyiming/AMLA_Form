<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>
    <div class="container" id="container">
        <p class="fs-6 text-end">Form No. 1</p>


        <table class="table table-bordered align-middle">
            <thead style="background-color:#2E74B5;color:white">
                <tr>
                    <th>2) <span data-i18n="messages.for_legal_person"></span></th>
                </tr>
        </table>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 35%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 20%;">

            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light" data-i18n="messages.company_business_name"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="business_name" value="{{ old('business_name', $form1->business_name ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.business_registration_no"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="brn" value="{{ old('brn', $form1->brn ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.business_type"></th>
                    <td colspan="4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_sole_proprietorship" value="sole_proprietorship" {{ old('business_type', $form1->business_type ?? '') == 'sole_proprietorship' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.sole_proprietorship" for="business_type_sole_proprietorship">Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_partnership" value="partnership" {{ old('business_type', $form1->business_type ?? '') == 'partnership' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.partnership" for="business_type_partnership">No
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_limited_liability_partnership" value="limited_liability_partnership" {{ old('business_type', $form1->business_type ?? '') == 'limited_liability_partnership' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.limited_liability_partnership" for="business_type_limited_liability_partnership">Limited Liability Partnership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_public_company" value="public_company" {{ old('business_type', $form1->business_type ?? '') == 'public_company' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.public_company" for="business_type_public_company">Public Company</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_trust" value="trust" {{ old('business_type', $form1->business_type ?? '') == 'trust' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.trust" for="business_type_trust">Trust</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_club_society_charity" value="club_society_charity" {{ old('business_type', $form1->business_type ?? '') == 'club_society_charity' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.club_society_charity" for="business_type_club_society_charity">Club / Society / Charity</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="business_type" id="business_type_other" value="other" {{ old('business_type', $form1->business_type ?? '') == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.other" for="business_type_other">Other</label>
                        </div>
                        <input type="text" class="form-control {{ old('business_type', $form1->business_type ?? '') == 'other' ? '' : 'd-none' }}" name="other_text" id="business_type_other_text" value="{{ old('other_text', $form1->other_text ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.country_of_incorporation_registration"></th>
                    <td colspan="4">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="country_incorp"
                                field="Country_Name"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.address_of_registered_office"></th>
                    <td colspan="4"> <textarea class="form-control border-0" name="registered_address">{{ old('registered_address', $form1->registered_address ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="registered_town" value="{{ old('registered_town', $form1->registered_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="registered_state" value="{{ old('registered_state', $form1->registered_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="registered_postcode" value="{{ old('registered_postcode', $form1->registered_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="registered_country" value="{{ old('registered_country', $form1->registered_country ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light">
                        <span data-i18n="messages.address_of_principal_place_of_business"></span>
                        <label class="d-flex gap-3 align-items-center">
                            <span>(Please tick if same as above)</span>
                            <input class="form-check-input" type="checkbox" id="sameAsResidential2">
                        </label>

                    </th>
                    <td colspan="4"> <textarea class="form-control border-0" name="principal_address">{{ old('principal_address', $form1->principal_address ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="principal_town" value="{{ old('principal_town', $form1->principal_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="4"><input type="text" class="form-control border-0" name="principal_state" value="{{ old('principal_state', $form1->principal_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="principal_postcode" value="{{ old('principal_postcode', $form1->principal_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="principal_country" value="{{ old('principal_country', $form1->principal_country ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.principal_business"></th>
                    <td colspan="4">
                        <input type="text" class="form-control border-0" name="principle_business" value="{{ old('principle_business', $form1->principle_business ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.contact_no"></th>
                    <td colspan="4">
                        <input type="text" class="form-control border-0" name="contact_no_2" value="{{ old('contact_no_2', $form1->contact_no_2 ?? '') }}">
                    </td>
                </tr>

                <tr>
                    <th class="bg-light" data-i18n="messages.purpose_of_transaction"></th>
                    <td colspan="4">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$natureOfBusiness"
                                name="transaction_purpose_2"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_directors_partners"></th>
                    <td colspan="4">
                        <input type="text" class="form-control border-0" name="director_name" value="{{ old('director_name', $form1->director_name ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_shareholders_beneficial_owners" rowspan="3"></th>
                    <th class="bg-light text-center" data-i18n="messages.name" colspan="2"></th>
                    <th class="bg-light text-center" data-i18n="messages.types_of_shares"></th>
                    <th class="bg-light text-center" data-i18n="messages.percentage"></th>



                </tr>
                <tr>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="shareholder_name" value="{{ old('shareholder_name', $form1->shareholder_name ?? '') }}"></td>
                    <td> <input type="text" class="form-control border-0" name="share_type" value="{{ old('share_type', $form1->share_type ?? '') }}"></td>
                    <td> <input type="number" class="form-control border-0" name="share_percent" value="{{ old('share_percent', $form1->share_percent ?? '') }}"></td>

                </tr>
                <tr>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="shareholder_name2" value="{{ old('shareholder_name2', $form1->shareholder_name2 ?? '') }}"></td>
                    <td> <input type="text" class="form-control border-0" name="share_type2" value="{{ old('share_type2', $form1->share_type2 ?? '') }}"></td>
                    <td> <input type="number" class="form-control border-0" name="share_percent2" value="{{ old('share_percent2', $form1->share_percent2 ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_beneficial_owners_through_other_means" rowspan="3"></th>
                    <th class="bg-light text-center" data-i18n="messages.name" colspan="2"></th>
                    <th class="bg-light text-center" data-i18n="messages.type_of_ownership_control_relationship" colspan="2"></th>



                </tr>
                <tr>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="nominee_name" value="{{ old('nominee_name', $form1->nominee_name ?? '') }}"></td>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="nominee_type" value="{{ old('nominee_type', $form1->nominee_type ?? '') }}"></td>

                </tr>
                <tr>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="nominee_name2" value="{{ old('nominee_name2', $form1->nominee_name2 ?? '') }}"></td>
                    <td colspan="2"> <input type="text" class="form-control border-0" name="nominee_type2" value="{{ old('nominee_type2', $form1->nominee_type2 ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_senior_management"></th>
                    <td colspan="2">
                        <input type="text" class="form-control border-0" name="senior_name" value="{{ old('senior_name', $form1->senior_name ?? '') }}">
                    </td>
                    <td colspan="2">
                        <input type="text" class="form-control border-0" name="senior_type" value="{{ old('senior_type', $form1->senior_type ?? '') }}">

                    </td>
                </tr>

        </table>
        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>
    <script>
        (function() {
            const checkbox = document.getElementById('sameAsResidential2');
            const fields = ['address', 'town', 'state', 'postcode', 'country'];

            function copyResidentialToMailing() {
                fields.forEach(function(field) {
                    const residential = document.querySelector('[name="registered_' + field + '"]');
                    const mailing = document.querySelector('[name="principal_' + field + '"]');
                    if (residential && mailing) {
                        mailing.value = residential.value;
                    }
                });
            }

            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    copyResidentialToMailing();
                }
            });

            const otherText = document.getElementById('business_type_other_text');
            document.querySelectorAll('[name="business_type"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const isOther = document.getElementById('business_type_other').checked;
                    otherText.classList.toggle('d-none', !isOther);
                    if (!isOther) {
                        otherText.value = '';
                    }
                });
            });
        })();
    </script>
</body>


</html>