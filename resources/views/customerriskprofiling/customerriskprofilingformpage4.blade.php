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
                <col style="width: 15%;">
                <col style="width: 15%;">
                <col style="width: 30%;">
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

            </thead>
            <tbody>
                <tr>
                    <td rowspan="3">14.</td>
                    <td rowspan="3" data-i18n="messages.mode_of_payment">Mode of Payment</td>
                    <td colspan="2" data-i18n="messages.epayment_ebanking">e-banking/electronic payment made by customer (e.g. e-payment, credit card, etc.)</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="payment_electronic_low_value" name="payment_electronic_low"
                            value="{{ old('payment_electronic_low', $form1->payment_electronic_low ?? 0) }}">
                        <x-mark-button
                            name="payment_electronic_low"
                            group="payment_group"
                            :value="1"
                            :current-value="old('payment_electronic_low', $form1->payment_electronic_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" data-i18n="messages.cash_trade_in_below_50k">Cash transaction OR Trade-In transaction (≤ RM50,000) (single or cumulatively < RM 50,000 per day)</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>
                        <input type="hidden" id="payment_cash_medium_value" name="payment_cash_medium"
                            value="{{ old('payment_cash_medium', $form1->payment_cash_medium ?? 0) }}">
                        <x-mark-button
                            name="payment_cash_medium"
                            group="payment_group"
                            :value="2"
                            :current-value="old('payment_cash_medium', $form1->payment_cash_medium ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" data-i18n="messages.cash_trade_in_above_50k">Cash transaction OR Trade-In transaction (≥ RM50,000) (single or cumulatively per day)</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="payment_cash_high_value" name="payment_cash_high"
                            value="{{ old('payment_cash_high', $form1->payment_cash_high ?? 0) }}">
                        <x-mark-button
                            name="payment_cash_high"
                            group="payment_group"
                            :value="3"
                            :current-value="old('payment_cash_high', $form1->payment_cash_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="3">15.</td>
                    <td rowspan="5" data-i18n="messages.pohkong_receive_fund_from_customer">Poh Kong receive fund from Customer</td>
                    <td rowspan="3" data-i18n="messages.fund_transfer_from">Fund transfer from</td>
                    <td data-i18n="messages.local_fund">Local fund</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>

                        <input type="hidden" id="transaction_fundFrom_local_low_value" name="transaction_fundFrom_local_low"
                            value="{{ old('transaction_fundFrom_local_low', $form1->transaction_fundFrom_local_low ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundFrom_local_low"
                            group="transaction_fundFrom_local_group"
                            :value="1"
                            :current-value="old('transaction_fundFrom_local_low', $form1->transaction_fundFrom_local_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.foreign_countries">Foreign Countries</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>
                        <input type="hidden" id="transaction_fundFrom_foreign_medium_value" name="transaction_fundFrom_foreign_medium"
                            value="{{ old('transaction_fundFrom_foreign_medium', $form1->transaction_fundFrom_foreign_medium ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundFrom_foreign_medium"
                            group="transaction_fundFrom_local_group"
                            :value="2"
                            :current-value="old('transaction_fundFrom_foreign_medium', $form1->transaction_fundFrom_foreign_medium ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.high_risk_countries">High risk countries</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="transaction_fundFrom_high_value" name="transaction_fundFrom_high"
                            value="{{ old('transaction_fundFrom_high', $form1->transaction_fundFrom_high ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundFrom_high"
                            group="transaction_fundFrom_local_group"
                            :value="3"
                            :current-value="old('transaction_fundFrom_high', $form1->transaction_fundFrom_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">16.</td>
                    <td rowspan="2" data-i18n="messages.fund_transfer_from">Fund transfer from</td>
                    <td data-i18n="messages.known_party">Known party</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="transaction_fundFrom_known_low_value" name="transaction_fundFrom_known_low"
                            value="{{ old('transaction_fundFrom_known_low', $form1->transaction_fundFrom_known_low ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundFrom_known_low"
                            group="transaction_fundFrom_known_group"
                            :value="1"
                            :current-value="old('transaction_fundFrom_known_low', $form1->transaction_fundFrom_known_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.unrelated_third_party">Unrelated third party</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>

                        <input type="hidden" id="transaction_fundFrom_unrelated_high_value" name="transaction_fundFrom_unrelated_high"
                            value="{{ old('transaction_fundFrom_unrelated_high', $form1->transaction_fundFrom_unrelated_high ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundFrom_unrelated_high"
                            group="transaction_fundFrom_known_group"
                            :value="3"
                            :current-value="old('transaction_fundFrom_unrelated_high', $form1->transaction_fundFrom_unrelated_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="3">17.</td>
                    <td rowspan="5" data-i18n="messages.pohkong_transfer_fund_to_customer">Poh Kong transfer fund to Customer</td>
                    <td rowspan="3" data-i18n="messages.fund_transfer_to">Fund transfer to</td>
                    <td data-i18n="messages.local_fund">Local fund</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="transaction_fundTrans_local_low_value" name="transaction_fundTrans_local_low"
                            value="{{ old('transaction_fundTrans_local_low', $form1->transaction_fundTrans_local_low ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundTrans_local_low"
                            group="transaction_fundTrans_local_group"
                            :value="1"
                            :current-value="old('transaction_fundTrans_local_low', $form1->transaction_fundTrans_local_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.foreign_countries">Foreign Countries</td>
                    <td class="text-center" data-i18n="messages.medium">Medium</td>
                    <td>
                        <input type="hidden" id="transaction_fundTrans_foreign_medium_value" name="transaction_fundTrans_foreign_medium"
                            value="{{ old('transaction_fundTrans_foreign_medium', $form1->transaction_fundTrans_foreign_medium ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundTrans_foreign_medium"
                            group="transaction_fundTrans_local_group"
                            :value="2"
                            :current-value="old('transaction_fundTrans_foreign_medium', $form1->transaction_fundTrans_foreign_medium ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.high_risk_countries">High risk countries</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="transaction_fundTrans_highrisk_high_value" name="transaction_fundTrans_highrisk_high"
                            value="{{ old('transaction_fundTrans_highrisk_high', $form1->transaction_fundTrans_highrisk_high ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundTrans_highrisk_high"
                            group="transaction_fundTrans_local_group"
                            :value="3"
                            :current-value="old('transaction_fundTrans_highrisk_high', $form1->transaction_fundTrans_highrisk_high ?? 0)" />
                    </td>
                </tr>


                <tr>
                    <td rowspan="2">18.</td>
                    <td rowspan="2" data-i18n="messages.fund_transfer_to">Fund transfer to</td>
                    <td data-i18n="messages.known_party">Known party</td>
                    <td class="text-center" data-i18n="messages.low">Low</td>
                    <td>
                        <input type="hidden" id="transaction_fundTrans_known_low_value" name="transaction_fundTrans_known_low"
                            value="{{ old('transaction_fundTrans_known_low', $form1->transaction_fundTrans_known_low ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundTrans_known_low"
                            group="transaction_fundTrans_known_group"
                            :value="1"
                            :current-value="old('transaction_fundTrans_known_low', $form1->transaction_fundTrans_known_low ?? 0)" />
                    </td>
                </tr>

                <tr>
                    <td data-i18n="messages.unrelated_third_party">Unrelated third party</td>
                    <td class="text-center" data-i18n="messages.high">High</td>
                    <td>
                        <input type="hidden" id="transaction_fundTrans_unrelated_high_value" name="transaction_fundTrans_unrelated_high"
                            value="{{ old('transaction_fundTrans_unrelated_high', $form1->transaction_fundTrans_unrelated_high ?? 0) }}">
                        <x-mark-button
                            name="transaction_fundTrans_unrelated_high"
                            group="transaction_fundTrans_known_group"
                            :value="3"
                            :current-value="old('transaction_fundTrans_unrelated_high', $form1->transaction_fundTrans_unrelated_high ?? 0)" />
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>
</body>

</html>