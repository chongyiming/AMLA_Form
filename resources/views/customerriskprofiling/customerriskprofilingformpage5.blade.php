<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .riskrating-radio {
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container" id="container" style="margin-top:30px">
        <p class="fs-6 text-end" data-i18n="messages.formNo2">Form No2</p>
        <table class="table table-bordered align-middle">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
                <tr>
                    <td data-i18n="messages.mark"></td>
                    <td><span data-i18n="messages.high"></span> = 3</td>
                    <td colspan="2"><span data-i18n="messages.medium"></span> = 2</td>
                    <td colspan="2"><span data-i18n="messages.low"></span> = 1</td>
                </tr>
                <tr>
                    <td data-i18n="messages.risk_rating"></td>
                    <td><span data-i18n="messages.high"></span> > 80%</td>
                    <td><span data-i18n="messages.medium_high"></span> 70–80%</td>
                    <td><span data-i18n="messages.medium"></span> 35–69%</td>
                    <td colspan="2"><span data-i18n="messages.low"></span>
                        < 35%</td>
                </tr>
            </tbody>

        </table>

        <table class="table table-bordered align-middle">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="2">
                        <span class="fw-bold" data-i18n="messages.total_mark"></span>
                        <span data-i18n="messages.individual_cash"></span>
                        <br>
                        <span data-i18n="messages.exclude_no4_15_18"></span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0 bg-transparent"
                                name="individual_minusCash"
                                value="{{ old('individual_minusCash', $form1->individual_minusCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 39 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0 bg-transparent"
                            name="individual_minusCash_percentage"
                            value="{{ old('individual_minusCash_percentage', $form1->individual_minusCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold" data-i18n="messages.total_mark"></span>
                        <span data-i18n="messages.non_individual_cash"></span>
                        <br>
                        <span data-i18n="messages.include_no4_exclude_15_18"></span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0 bg-transparent"
                                name="nonindividual_minusCash"
                                value="{{ old('nonindividual_minusCash', $form1->nonindividual_minusCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 42 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0 bg-transparent"
                            name="nonindividual_minusCash_percentage"
                            value="{{ old('nonindividual_minusCash_percentage', $form1->nonindividual_minusCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold" data-i18n="messages.total_mark"></span>
                        <span data-i18n="messages.individual_non_cash"></span>
                        <br>
                        <span data-i18n="messages.exclude_no4_include_15_16_or_17_18"></span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0 bg-transparent"
                                name="individual_minusnonCash"
                                value="{{ old('individual_minusnonCash', $form1->individual_minusnonCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 45 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0 bg-transparent"
                            name="individual_minusnonCash_percentage"
                            value="{{ old('individual_minusnonCash_percentage', $form1->individual_minusnonCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold" data-i18n="messages.total_mark"></span>
                        <span data-i18n="messages.non_individual_non_cash"></span>
                        <br>
                        <span data-i18n="messages.include_no4_either_15_16_or_17_18"></span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0 bg-transparent"
                                name="nonindividual_minusnonCash"
                                value="{{ old('nonindividual_minusnonCash', $form1->nonindividual_minusnonCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 48 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0 bg-transparent"
                            name="nonindividual_minusnonCash_percentage"
                            value="{{ old('nonindividual_minusnonCash_percentage', $form1->nonindividual_minusnonCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>
            </tbody>
        </table>
        <h2 class="fw-bold"><span data-i18n="messages.conclusion"></span>:</h2>

        <table class="table table-bordered align-middle">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
                <tr>
                    <th rowspan="4" class="bg-light" data-i18n="messages.risk_rating"></th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input riskrating-radio" type="radio" name="riskrating" id="riskrating_low" value="low" {{ old('riskrating', $form1->riskrating ?? '') == 'low' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                <span data-i18n="messages.low"></span>
                                <span>
                                    < 35%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2" data-i18n="messages.proceed_with_transaction">
                    </td>
                    <td rowspan="4" class="border-end-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating_transaction" id="riskrating_transaction_yes" value="yes" {{ str_starts_with(old('riskrating_transaction', $form1->riskrating_transaction ?? ''), 'yes_') ? 'checked' : '' }}>
                            <label class="form-check-label" for="riskrating_transaction_yes">
                                <span data-i18n="messages.yes"></span>
                            </label>
                        </div>
                    </td>
                    <td rowspan="4" class="border-start-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating_transaction" id="riskrating_transaction_no" value="no" {{ str_starts_with(old('riskrating_transaction', $form1->riskrating_transaction ?? ''), 'no_') ? 'checked' : '' }}>
                            <label class="form-check-label" for="riskrating_transaction_no">
                                <span data-i18n="messages.no"></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input riskrating-radio" type="radio" name="riskrating" id="riskrating_medium" value="medium" {{ old('riskrating', $form1->riskrating ?? '') == 'medium' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                <span data-i18n="messages.medium"></span>
                                <span>
                                    35 - 69%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2" data-i18n="messages.proceed_with_transaction">
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input riskrating-radio" type="radio" name="riskrating" id="riskrating_medium_high" value="medium_high" {{ old('riskrating', $form1->riskrating ?? '') == 'medium_high' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                <span data-i18n="messages.medium_high"></span>
                                <span>
                                    70 - 80%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2" data-i18n="messages.proceed_enhanced_cdd"></td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input riskrating-radio" type="radio" name="riskrating" id="riskrating_high" value="high" {{ old('riskrating', $form1->riskrating ?? '') == 'high' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                <span data-i18n="messages.high"></span>
                                <span>
                                    > 80%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2">
                        <span data-i18n="messages.terminate_transaction"></span> <br>
                        <span data-i18n="messages.proceed_suspicious_transaction_reporting"></span>
                    </td>

                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.suspicious_customer"></th>
                    <td colspan="5">
                        <div style="display:flex;column-gap:40px;flex-wrap:wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_cust_sus" id="is_cust_sus_no" value="no" {{ old('is_cust_sus', $form1->is_cust_sus ?? '') == 'no' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.no" for="is_cust_sus_no">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_cust_sus" id="is_cust_sus_yes" value="yes" {{ old('is_cust_sus', $form1->is_cust_sus ?? '') == 'yes' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.yes" for="is_cust_sus_yes">
                                </label>
                            </div>

                        </div>
                        <span class="fw-bold" data-i18n="messages.suspicious_reason"></span>
                        <textarea class="form-control border-0" name="cust_sus_reason">{{ old('cust_sus_reason', $form1->cust_sus_reason ?? '') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light" data-i18n="messages.customer_info_complete"></th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_cust_info_complete" id="is_cust_info_complete_yes" value="yes" {{ old('is_cust_info_complete', $form1->is_cust_info_complete ?? '') == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.yes" for="is_cust_info_complete_yes">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_cust_info_complete" id="is_cust_info_complete_no" value="no" {{ old('is_cust_info_complete', $form1->is_cust_info_complete ?? '') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.no" for="is_cust_info_complete_no">
                            </label>
                        </div>
                    </td>
                    <th class="bg-light" colspan="2"><span data-i18n="messages.internal_str_required"></span><span class="text-danger"> *</span></th>
                    <td colspan="2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_internal_str_required" id="is_internal_str_required_yes" value="yes" {{ old('is_internal_str_required', $form1->is_internal_str_required ?? '') == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.yes" for="is_internal_str_required_yes">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_internal_str_required" id="is_internal_str_required_no" value="no" {{ old('is_internal_str_required', $form1->is_internal_str_required ?? '') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.no" for="is_internal_str_required_no">
                            </label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>
</body>
<script>
    document.querySelectorAll('input[name="risk_rating"]').forEach(radio => {
        radio.addEventListener('change', function() {

            console.log(this.value);

            if (this.value == "low") {
                document.getElementById("riskrating_low").checked = true;
            } else if (this.value == "medium") {
                document.getElementById("riskrating_medium").checked = true;
            } else if (this.value == "medium-high") {
                document.getElementById("riskrating_medium_high").checked = true;
            } else if (this.value == "high") {
                document.getElementById("riskrating_high").checked = true;
            }

        });
    });
</script>

</html>