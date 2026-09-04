<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container" id="container" style="margin-top:30px">
        <p class="fs-6 text-end" data-i18n="messages.formNo2">Form No2</p>
        <table class="table table-bordered align-middle">
            <colgroup>
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
            </colgroup>
            <thead class="bg-light">
                <tr>
                    <th colspan="1">No.</th>
                    <th colspan="3" class="text-center" data-i18n="messages.parameters_determined_for_risk_profiling">Parameters Determined for Risk Profiling</th>
                    <th colspan="1" class="text-center" data-i18n="messages.risk_rating">Risk Rating</th>
                    <th colspan="1" class="text-center" data-i18n="messages.mark">Mark</th>
                </tr>
                <tr>
                    <th colspan="6">(b) <span data-i18n="messages.geographical_risks_section">Geographical Risks</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">10.</td>
                    <td colspan="2" rowspan="3" data-i18n="messages.country_of_origin_location_business">Country of origin of the customer / location of business</td>
                    <td data-i18n="messages.low_risk_countries">Low risk countries</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="originCountry_lowrisk_low_value" name="originCountry_lowrisk_low"
                            value="{{ old('originCountry_lowrisk_low', $form1->originCountry_lowrisk_low ?? 0) }}">
                        <x-mark-button
                            name="originCountry_lowrisk_low"
                            group="originCountry_group"
                            :value="1"
                            :current-value="old('originCountry_lowrisk_low', $form1->originCountry_lowrisk_low ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td data-i18n="messages.tax_haven_countries">Tax haven countries</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>

                        <input type="hidden" id="originCountry_taxhaven_medium_value" name="originCountry_taxhaven_medium"
                            value="{{ old('originCountry_taxhaven_medium', $form1->originCountry_taxhaven_medium ?? 0) }}">
                        <x-mark-button
                            name="originCountry_taxhaven_medium"
                            group="originCountry_group"
                            :value="2"
                            :current-value="old('originCountry_taxhaven_medium', $form1->originCountry_taxhaven_medium ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td data-i18n="messages.fatf_countermeasures_countries">Countries subject to a FATF call to apply countermeasures.</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="originCountry_FATF_high_value" name="originCountry_FATF_high"
                            value="{{ old('originCountry_FATF_high', $form1->originCountry_FATF_high ?? 0) }}">
                        <x-mark-button
                            name="originCountry_FATF_high"
                            group="originCountry_group"
                            :value="3"
                            :current-value="old('originCountry_FATF_high', $form1->originCountry_FATF_high ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td rowspan="3">11.</td>
                    <td colspan="2" rowspan="3" data-i18n="messages.country_of_residence">Country of Residence</td>
                    <td data-i18n="messages.low_risk_countries">Low risk countries</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>

                        <input type="hidden" id="countryResidence_lowrisk_low_value" name="countryResidence_lowrisk_low"
                            value="{{ old('countryResidence_lowrisk_low', $form1->countryResidence_lowrisk_low ?? 0) }}">
                        <x-mark-button
                            name="countryResidence_lowrisk_low"
                            group="countryResidence_group"
                            :value="1"
                            :current-value="old('countryResidence_lowrisk_low', $form1->countryResidence_lowrisk_low ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td data-i18n="messages.tax_haven_countries">Tax haven countries</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>

                        <input type="hidden" id="countryResidence_taxhaven_medium_value" name="countryResidence_taxhaven_medium"
                            value="{{ old('countryResidence_taxhaven_medium', $form1->countryResidence_taxhaven_medium ?? 0) }}">
                        <x-mark-button
                            name="countryResidence_taxhaven_medium"
                            group="countryResidence_group"
                            :value="2"
                            :current-value="old('countryResidence_taxhaven_medium', $form1->countryResidence_taxhaven_medium ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td data-i18n="messages.fatf_countermeasures_countries">Countries subject to a FATF call to apply countermeasures.</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="countryResidence_FATF_high_value" name="countryResidence_FATF_high"
                            value="{{ old('countryResidence_FATF_high', $form1->countryResidence_FATF_high ?? 0) }}">
                        <x-mark-button
                            name="countryResidence_FATF_high"
                            group="countryResidence_group"
                            :value="3"
                            :current-value="old('countryResidence_FATF_high', $form1->countryResidence_FATF_high ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <th colspan="6" class="bg-light">(c) <span data-i18n="messages.product_services_risk_section">Product/Services Risk</span></th>
                </tr>

                <tr>
                    <td rowspan="3">12.</td>
                    <td colspan="3" data-i18n="messages.non_gold_products">Non Gold (e.g. silver, platinum)</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="product_nongold_low_value" name="product_nongold_low"
                            value="{{ old('product_nongold_low', $form1->product_nongold_low ?? 0) }}">
                        <x-mark-button
                            name="product_nongold_low"
                            group="product_group"
                            :value="1"
                            :current-value="old('product_nongold_low', $form1->product_nongold_low ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" data-i18n="messages.diamond_gem">Diamond & Gem</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>
                        <input type="hidden" id="product_diamondgem_medium_value" name="product_diamondgem_medium"
                            value="{{ old('product_diamondgem_medium', $form1->product_diamondgem_medium ?? 0) }}">
                        <x-mark-button
                            name="product_diamondgem_medium"
                            group="product_group"
                            :value="2"
                            :current-value="old('product_diamondgem_medium', $form1->product_diamondgem_medium ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" data-i18n="messages.gold">Gold</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="product_gold_high_value" name="product_gold_high"
                            value="{{ old('product_gold_high', $form1->product_gold_high ?? 0) }}">
                        <x-mark-button
                            name="product_gold_high"
                            group="product_group"
                            :value="3"
                            :current-value="old('product_gold_high', $form1->product_gold_high ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <th colspan="6" class="bg-light">(d) <span data-i18n="messages.transaction_delivery_channel_risks_section">Transaction or Delivery Channel Risks</span></th>
                </tr>

                <tr>
                    <td rowspan="3">13.</td>
                    <td rowspan="3" data-i18n="messages.delivery_channel">Delivery Channel</td>
                    <td colspan="2" data-i18n="messages.face_to_face">Face-to-Face</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="delivery_face2face_low_value" name="delivery_face2face_low"
                            value="{{ old('delivery_face2face_low', $form1->delivery_face2face_low ?? 0) }}">
                        <x-mark-button
                            name="delivery_face2face_low"
                            group="delivery_group"
                            :value="1"
                            :current-value="old('delivery_face2face_low', $form1->delivery_face2face_low ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" data-i18n="messages.on_behalf_intermediaries_agents">On behalf/Through intermediaries and/or agents</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>
                        <input type="hidden" id="delivery_behalf_medium_value" name="delivery_behalf_medium"
                            value="{{ old('delivery_behalf_medium', $form1->delivery_behalf_medium ?? 0) }}">
                        <x-mark-button
                            name="delivery_behalf_medium"
                            group="delivery_group"
                            :value="2"
                            :current-value="old('delivery_behalf_medium', $form1->delivery_behalf_medium ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" data-i18n="messages.non_face_to_face">Non Face-to-Face</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>

                        <input type="hidden" id="delivery_non_face2face_high_value" name="delivery_non_face2face_high"
                            value="{{ old('delivery_non_face2face_high', $form1->delivery_non_face2face_high ?? 0) }}">
                        <x-mark-button
                            name="delivery_non_face2face_high"
                            group="delivery_group"
                            :value="3"
                            :current-value="old('delivery_non_face2face_high', $form1->delivery_non_face2face_high ?? 0)" />
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>
</body>

</html>