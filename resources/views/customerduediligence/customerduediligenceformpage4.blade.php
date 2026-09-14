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
        <h4 data-i18n="messages.person_transacting_on_behalf"></h4>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 40%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light" data-i18n="messages.full_name"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_name" value="{{ old('transacting_name', $form1->transacting_name ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.nric_passport_no"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_nric_passport" value="{{ old('transacting_nric_passport', $form1->transacting_nric_passport ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.date_of_birth"></th>
                    <td colspan="3"><input type="date" class="form-control border-0" name="transacting_dob" value="{{ old('transacting_dob', $form1->transacting_dob ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.address"></th>
                    <td colspan="3"> <textarea class="form-control border-0" name="transacting_address">{{ old('transacting_address', $form1->transacting_address ?? '') }}</textarea></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.town"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_town" value="{{ old('transacting_town', $form1->transacting_town ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.state"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_state" value="{{ old('transacting_state', $form1->transacting_state ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light text-end" data-i18n="messages.postcode"></th>
                    <td><input type="text" class="form-control border-0" name="transacting_postcode" value="{{ old('transacting_postcode', $form1->transacting_postcode ?? '') }}"></td>
                    <th class="bg-light text-center" data-i18n="messages.country"></th>
                    <td><input type="text" class="form-control border-0" name="transacting_country" value="{{ old('transacting_country', $form1->transacting_country ?? '') }}"></td>

                </tr>

                <tr>
                    <th class="bg-light" data-i18n="messages.nationality"></th>
                    <td colspan="3">
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$nationality"
                                name="transacting_nationality"
                                field="Country_Name"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.occupation_type"></th>
                    <td>
                        <div style="height: 25px;">
                            <x-searchable-dropdown
                                :options="$occupation"
                                name="transacting_occupation"
                                field="Dropdown_List"
                                :form1="$form1"
                                border="none" />
                        </div>
                    </td>
                    <td colspan="2">
                        <input type="text" class="form-control border-0" name="transacting_occupation_status" value="{{ old('transacting_occupation_status', $form1->transacting_occupation_status ?? '') }}">
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.name_of_employer"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_employer" value="{{ old('transacting_employer', $form1->transacting_employer ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.contact_number"></th>
                    <td colspan="3"><input type="text" class="form-control border-0" name="transacting_contact" value="{{ old('transacting_contact', $form1->transacting_contact ?? '') }}"></td>
                </tr>

        </table>
        <x-form-statement></x-form-statement>
        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>


</html>