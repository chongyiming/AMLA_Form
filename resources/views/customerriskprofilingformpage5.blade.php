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
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
            </colgroup>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td><span data-i18n="messages.high"></span> = 3</td>
                    <td colspan="2"><span data-i18n="messages.medium"></span> = 2</td>
                    <td colspan="2"><span data-i18n="messages.low"></span> = 1</td>
                </tr>
                <tr>
                    <td>Risk Rating</td>
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
                        <span class="fw-bold">Total Mark </span>
                        <span>(Individual - Cash)</span>
                        <br>
                        <span>(Exclude No. 4 & 15-18)</span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0"
                                name="individual_minusCash"
                                value="{{ old('individual_minusCash', $form1->individual_minusCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 39 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0"
                            name="individual_minusCash_percentage"
                            value="{{ old('individual_minusCash_percentage', $form1->individual_minusCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold">Total Mark </span>
                        <span>(Non-Individual - Cash)</span>
                        <br>
                        <span>(Include No. 4 & Exclude No. 15-18)</span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0"
                                name="nonindividual_minusCash"
                                value="{{ old('nonindividual_minusCash', $form1->nonindividual_minusCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 42 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0"
                            name="nonindividual_minusCash_percentage"
                            value="{{ old('nonindividual_minusCash_percentage', $form1->nonindividual_minusCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold">Total Mark </span>
                        <span>(Individual - Non Cash)</span>
                        <br>
                        <span>(Exclude No. 4 & Include either No. 15-16 or 17-18)</span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0"
                                name="individual_minusnonCash"
                                value="{{ old('individual_minusnonCash', $form1->individual_minusnonCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 45 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0"
                            name="individual_minusnonCash_percentage"
                            value="{{ old('individual_minusnonCash_percentage', $form1->individual_minusnonCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>

                <tr>
                    <td colspan="2">
                        <span class="fw-bold">Total Mark </span>
                        <span>(Non-Individual - Non Cash)</span>
                        <br>
                        <span>(Include No. 4 & Either No. 15-16 or 17-18)</span>
                    </td>

                    <td class="border-end-0">
                        <div class="d-flex align-items-center">
                            <span>(</span>
                            <input type="text"
                                class="form-control border-0"
                                name="nonindividual_minusnonCash"
                                value="{{ old('nonindividual_minusnonCash', $form1->nonindividual_minusnonCash ?? '') }}" readonly>
                            <span>)</span>
                        </div>
                    </td>

                    <td class="border-start-0">/ 48 × 100%</td>

                    <td class="border-end-0">
                        <input type="text"
                            class="form-control border-0"
                            name="nonindividual_minusnonCash_percentage"
                            value="{{ old('nonindividual_minusnonCash_percentage', $form1->nonindividual_minusnonCash_percentage ?? '') }}" readonly>
                    </td>

                    <td class="border-start-0">%</td>
                </tr>
            </tbody>
        </table>
        <h2 class="fw-bold">Conclusion</h2>

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
                    <th rowspan="4" class="bg-light">Risk Rating</th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating" id="riskrating_low" value="low" {{ old('riskrating', $form1->riskrating ?? '') == 'low' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="riskrating_low">
                                <span data-i18n="messages.low"></span>
                                <span>
                                    < 35%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2">Proceed with the transaction
                    </td>
                    <td rowspan="4" class="border-end-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating_transaction" id="riskrating_transaction_yes" value="yes" {{ old('riskrating_transaction', $form1->riskrating_transaction ?? '') == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" for="riskrating_transaction_yes">
                                <span data-i18n="messages.yes"></span>
                            </label>
                        </div>
                    </td>
                    <td rowspan="4" class="border-start-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating_transaction" id="riskrating_transaction_no" value="no" {{ old('riskrating_transaction', $form1->riskrating_transaction ?? '') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="riskrating_transaction_no">
                                <span data-i18n="messages.no"></span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating" id="riskrating_medium" value="medium" {{ old('riskrating', $form1->riskrating ?? '') == 'medium' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="riskrating_medium">
                                <span data-i18n="messages.medium"></span>
                                <span>
                                    35 - 69%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2">Proceed with the transaction
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating" id="riskrating_medium_high" value="medium_high" {{ old('riskrating', $form1->riskrating ?? '') == 'medium_high' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="riskrating_medium_high">
                                <span data-i18n="messages.medium_high"></span>
                                <span>
                                    70 - 80%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2">Proceed to Enhanced CDD
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="riskrating" id="riskrating_high" value="high" {{ old('riskrating', $form1->riskrating ?? '') == 'high' ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="riskrating_high">
                                <span data-i18n="messages.high"></span>
                                <span>
                                    > 80%</span>
                            </label>
                        </div>
                    </td>
                    <td colspan="2">Terminate the transaction <br>Proceed to Suspicious Transaction Reporting


                    </td>

                </tr>
                <tr>
                    <th class="bg-light">Suspicious Customer?</th>
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
                        <span class="fw-bold">Suspicious Reason:</span>
                        <textarea class="form-control border-0" name="cust_sus_reason">{{ old('cust_sus_reason', $form1->cust_sus_reason ?? '') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light">Customer Info Complete?</th>
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
                    <th class="bg-light" colspan="2">Internal STR Required?<span class="text-danger"> *</span></th>
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