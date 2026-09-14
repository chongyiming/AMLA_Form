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
                    <th>3) <span data-i18n="messages.for_legal_arrangement"></span></th>
                </tr>
        </table>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 40%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light" data-i18n="messages.name"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="arrangement_name" value="{{ old('arrangement_name', $form1->arrangement_name ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.business_registration_no"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="arrangement_registration" value="{{ old('arrangement_registration', $form1->arrangement_registration ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.business_type"></th>
                    <td colspan="3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="arrangement_type" id="arrangement_type_legal_trust" value="trust" {{ old('arrangement_type', $form1->arrangement_type ?? '') == 'trust' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.trust" for="arrangement_type_legal_trust">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="arrangement_type" id="arrangement_type_legal_club_society_charity" value="club_society_charity" {{ old('arrangement_type', $form1->arrangement_type ?? '') == 'club_society_charity' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.club_society_charity" for="arrangement_type_legal_club_society_charity">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="arrangement_type" id="arrangement_type_legal_other" value="other" {{ old('arrangement_type', $form1->arrangement_type ?? '') == 'other' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.other" for="arrangement_type_legal_other"></label>
                        </div>
                        <input type="text" class="form-control {{ old('arrangement_type', $form1->arrangement_type ?? '') == 'other' ? '' : 'd-none' }}" name="arrangement_other_text" id="arrangement_type_other_text" value="{{ old('arrangement_other_text', $form1->arrangement_other_text ?? '') }}">

                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.country_of_registration"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="country_registration"
                                field="Country_Name"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.address_of_registered_office"></th>
                    <td colspan="3"> <textarea class="form-control border-0" name="arrangement_address">{{ old('arrangement_address', $form1->arrangement_address ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="arrangement_town" value="{{ old('arrangement_town', $form1->arrangement_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="arrangement_state" value="{{ old('arrangement_state', $form1->arrangement_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="arrangement_postcode" value="{{ old('arrangement_postcode', $form1->arrangement_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td><input type="text" class="form-control border-0" name="arrangement_country" value="{{ old('arrangement_country', $form1->arrangement_country ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light">
                        <span data-i18n="messages.legal_arrangement_principal_place_of_activity_address"></span>
                        <label class="d-flex gap-3 align-items-center">
                            <span>(Please tick if same as above)</span>
                            <input class="form-check-input" type="checkbox" id="sameAsResidential3">
                        </label>

                    </th>
                    <td colspan="3"> <textarea class="form-control border-0" name="principal_address_arrangement">{{ old('principal_address_arrangement', $form1->principal_address_arrangement ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="principal_town_arrangement" value="{{ old('principal_town_arrangement', $form1->principal_town_arrangement ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="principal_state_arrangement" value="{{ old('principal_state_arrangement', $form1->principal_state_arrangement ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="principal_postcode_arrangement" value="{{ old('principal_postcode_arrangement', $form1->principal_postcode_arrangement ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td><input type="text" class="form-control border-0" name="principal_country_arrangement" value="{{ old('principal_country_arrangement', $form1->principal_country_arrangement ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.principal_activity"></th>
                    <td colspan="3">
                        <input type="text" class="form-control border-0" name="principle_activity" value="{{ old('principle_activity', $form1->principle_activity ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.contact_no"></th>
                    <td colspan="3">
                        <input type="text" class="form-control border-0" name="contact_no_3" value="{{ old('contact_no_3', $form1->contact_no_3 ?? '') }}">
                    </td>
                </tr>

                <tr>
                    <th class="bg-light" data-i18n="messages.purpose_of_transaction"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$natureOfBusiness"
                                name="transaction_purpose_3"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="bg-light" data-i18n="messages.name_of_directors_partners"></th>
                </tr>
                <tr>
                    <th colspan="2" class="bg-light text-center" data-i18n="messages.name"></th>
                    <th class="bg-light text-center" data-i18n="messages.id"></th>
                    <th class="bg-light text-center" data-i18n="messages.address"></th>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.settlor"></th>
                    <td><input type="text" class="form-control border-0" name="settlor_name" value="{{ old('settlor_name', $form1->settlor_name ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="settlor_id" value="{{ old('settlor_id', $form1->settlor_id ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="settlor_address" value="{{ old('settlor_address', $form1->settlor_address ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.trustee"></th>
                    <td><input type="text" class="form-control border-0" name="trustee_name" value="{{ old('trustee_name', $form1->trustee_name ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="trustee_id" value="{{ old('trustee_id', $form1->trustee_id ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="trustee_address" value="{{ old('trustee_address', $form1->trustee_address ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.protector"></th>
                    <td><input type="text" class="form-control border-0" name="protector_name" value="{{ old('protector_name', $form1->protector_name ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="protector_id" value="{{ old('protector_id', $form1->protector_id ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="protector_address" value="{{ old('protector_address', $form1->protector_address ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.beneficiary_class_of_beneficiary"></th>
                    <td><input type="text" class="form-control border-0" name="beneficiary_name" value="{{ old('beneficiary_name', $form1->beneficiary_name ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="beneficiary_id" value="{{ old('beneficiary_id', $form1->beneficiary_id ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="beneficiary_address" value="{{ old('beneficiary_address', $form1->beneficiary_address ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.other_bo_information"></th>
                    <td><input type="text" class="form-control border-0" name="bo_name" value="{{ old('bo_name', $form1->bo_name ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="bo_id" value="{{ old('bo_id', $form1->bo_id ?? '') }}"></td>
                    <td><input type="text" class="form-control border-0" name="bo_address" value="{{ old('bo_address', $form1->bo_address ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light"></th>
                    <td colspan="3"><label data-i18n="messages.relationship_with_trust"></label><textarea class="form-control border-0" name="trust_text">{{ old('trust_text', $form1->trust_text ?? '') }}</textarea></td>
                </tr>


        </table>
        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>
    <script>
        (function() {
            const checkbox = document.getElementById('sameAsResidential3');
            const fields = ['address', 'town', 'state', 'postcode', 'country'];

            function copyArrangementToPrincipal() {
                fields.forEach(function(field) {
                    const arrangement = document.querySelector('[name="arrangement_' + field + '"]');
                    const principal = document.querySelector('[name="principal_' + field + '_arrangement"]');
                    if (arrangement && principal) {
                        principal.value = arrangement.value;
                    }
                });
            }

            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    copyArrangementToPrincipal();
                }
            });

            // Only show the "other" text box when arrangement type "Other" is selected
            const otherText = document.getElementById('arrangement_type_other_text');
            document.querySelectorAll('[name="arrangement_type"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    const isOther = document.getElementById('arrangement_type_legal_other').checked;
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