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
                <col style="width: 30%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
            </colgroup>
            <thead class="bg-light">
                <tr>
                    <th colspan="1">No.</th>
                    <th colspan="3" class="text-center">Parameters Determined for Risk Profiling</th>
                    <th colspan="1" class="text-center">Risk Rating</th>
                    <th colspan="1" class="text-center">Mark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">4.</td>
                    <td rowspan="2">Size and structure of customer's business</td>
                    <td colspan="2">Small and simple structure</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="businessSize_small_low"
                            value="{{ old('businessSize_small_low', $form1->businessSize_small_low ?? '') }}"> -->
                        <input type="hidden" id="businessSize_small_low_value" name="businessSize_small_low"
                            value="{{ old('businessSize_small_low', $form1->businessSize_small_low ?? 0) }}">
                        <x-mark-button
                            name="businessSize_small_low"
                            group="business_size_group"
                            :value="1"
                            :current-value="old('businessSize_small_low', $form1->businessSize_small_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Large and complex structure</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="businessSize_large_high"
                            value="{{ old('businessSize_large_high', $form1->businessSize_large_high ?? '') }}"> -->
                        <input type="hidden" id="businessSize_large_high_value" name="businessSize_large_high"
                            value="{{ old('businessSize_large_high', $form1->businessSize_large_high ?? 0) }}">
                        <x-mark-button
                            name="businessSize_large_high"
                            group="business_size_group"
                            :value="3"
                            :current-value="old('businessSize_large_high', $form1->businessSize_large_high ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="5">
                        <textarea class="form-control border-0"
                            name="businessSize_comments"
                            placeholder="Comments">{{ old('businessSize_comments', $form1->businessSize_comments ?? '') }}</textarea>
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">5.</td>
                    <td rowspan="2">Type of occupation/business</td>
                    <td colspan="2">Lower Risk</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="businessType_lowrisk_low"
                            value="{{ old('businessType_lowrisk_low', $form1->businessType_lowrisk_low ?? '') }}"> -->
                        <input type="hidden" id="businessType_lowrisk_low_value" name="businessType_lowrisk_low"
                            value="{{ old('businessType_lowrisk_low', $form1->businessType_lowrisk_low ?? 0) }}">
                        <x-mark-button
                            name="businessType_lowrisk_low"
                            group="business_type_group"
                            :value="1"
                            :current-value="old('businessType_lowrisk_low', $form1->businessType_lowrisk_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Higher risk i.e. cash intensive</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="businessType_highrisk_high"
                            value="{{ old('businessType_highrisk_high', $form1->businessType_highrisk_high ?? '') }}"> -->
                        <input type="hidden" id="businessType_highrisk_high_value" name="businessType_highrisk_high"
                            value="{{ old('businessType_highrisk_high', $form1->businessType_highrisk_high ?? 0) }}">
                        <x-mark-button
                            name="businessType_highrisk_high"
                            group="business_type_group"
                            :value="3"
                            :current-value="old('businessType_highrisk_high', $form1->businessType_highrisk_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">6.</td>
                    <td rowspan="2">Information provided by customer during CDD</td>
                    <td colspan="2">Clear and complete</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="CDD_clear_low"
                            value="{{ old('CDD_clear_low', $form1->CDD_clear_low ?? '') }}"> -->
                        <input type="hidden" id="CDD_clear_low_value" name="CDD_clear_low"
                            value="{{ old('CDD_clear_low', $form1->CDD_clear_low ?? 0) }}">
                        <x-mark-button
                            name="CDD_clear_low"
                            group="cdd_group"
                            :value="1"
                            :current-value="old('CDD_clear_low', $form1->CDD_clear_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Vague or incomplete</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="CDD_vague_high"
                            value="{{ old('CDD_vague_high', $form1->CDD_vague_high ?? '') }}"> -->
                        <input type="hidden" id="CDD_vague_high_value" name="CDD_vague_high"
                            value="{{ old('CDD_vague_high', $form1->CDD_vague_high ?? 0) }}">
                        <x-mark-button
                            name="CDD_vague_high"
                            group="cdd_group"
                            :value="3"
                            :current-value="old('CDD_vague_high', $form1->CDD_vague_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">7.</td>
                    <td colspan="2" rowspan="2">
                        Customers’ beneficial owners or senior management appear in unilateral
                        sanctions lists or adverse news;
                    </td>
                    <td class="text-center">No</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="beneficial_no_low"
                            value="{{ old('beneficial_no_low', $form1->beneficial_no_low ?? '') }}"> -->
                        <input type="hidden" id="beneficial_no_low_value" name="beneficial_no_low"
                            value="{{ old('beneficial_no_low', $form1->beneficial_no_low ?? 0) }}">
                        <x-mark-button
                            name="beneficial_no_low"
                            group="beneficial_no_group"
                            :value="1"
                            :current-value="old('beneficial_no_low', $form1->beneficial_no_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td class="text-center">Yes</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="beneficial_yes_high"
                            value="{{ old('beneficial_yes_high', $form1->beneficial_yes_high ?? '') }}"> -->
                        <input type="hidden" id="beneficial_yes_high_value" name="beneficial_yes_high"
                            value="{{ old('beneficial_yes_high', $form1->beneficial_yes_high ?? 0) }}">
                        <x-mark-button
                            name="beneficial_yes_high"
                            group="beneficial_no_group"
                            :value="3"
                            :current-value="old('beneficial_yes_high', $form1->beneficial_yes_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">8.</td>
                    <td colspan="2" rowspan="2">
                        Customers engage in complex trade deals.
                    </td>
                    <td class="text-center">No</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="trade_no_low"
                            value="{{ old('trade_no_low', $form1->trade_no_low ?? '') }}"> -->
                        <input type="hidden" id="trade_no_low_value" name="trade_no_low"
                            value="{{ old('trade_no_low', $form1->trade_no_low ?? 0) }}">
                        <x-mark-button
                            name="trade_no_low"
                            group="trade_no_group"
                            :value="1"
                            :current-value="old('trade_no_low', $form1->trade_no_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td class="text-center">Yes</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="trade_yes_high"
                            value="{{ old('trade_yes_high', $form1->trade_yes_high ?? '') }}"> -->
                        <input type="hidden" id="trade_yes_high_value" name="trade_yes_high"
                            value="{{ old('trade_yes_high', $form1->trade_yes_high ?? 0) }}">
                        <x-mark-button
                            name="trade_yes_high"
                            group="trade_no_group"
                            :value="3"
                            :current-value="old('trade_yes_high', $form1->trade_yes_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="3">9.</td>
                    <td colspan="2" rowspan="2">
                        Adverse remark on the customer/company' background from research via
                        public or commercial database such as Google/CTOS.
                    </td>
                    <td class="text-center">No</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="remark_no_low"
                            value="{{ old('remark_no_low', $form1->remark_no_low ?? '') }}"> -->
                        <input type="hidden" id="remark_no_low_value" name="remark_no_low"
                            value="{{ old('remark_no_low', $form1->remark_no_low ?? 0) }}">
                        <x-mark-button
                            name="remark_no_low"
                            group="remark_no_group"
                            :value="1"
                            :current-value="old('remark_no_low', $form1->remark_no_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td class="text-center">Yes</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0"
                            name="remark_yes_high"
                            value="{{ old('remark_yes_high', $form1->remark_yes_high ?? '') }}"> -->
                        <input type="hidden" id="remark_yes_high_value" name="remark_yes_high"
                            value="{{ old('remark_yes_high', $form1->remark_yes_high ?? 0) }}">
                        <x-mark-button
                            name="remark_yes_high"
                            group="remark_no_group"
                            :value="3"
                            :current-value="old('remark_yes_high', $form1->remark_yes_high ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="5">
                        <textarea class="form-control border-0"
                            name="yes_state"
                            placeholder="Yes. Please state:">{{ old('yes_state', $form1->yes_state ?? '') }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>
</body>

</html>