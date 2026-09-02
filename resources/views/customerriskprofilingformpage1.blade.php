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

        .container {
            width: 750px;
            max-width: 750px;
            height: 1090px;
            padding-bottom: 10px;
            margin: auto;
            box-sizing: border-box;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;

        }

        .header_Text {
            font-size: 15px;
            text-align: center;
            margin-top: 5px;
        }

        .header_Text2 {
            font-size: 15px;
            text-align: center;
            font-weight: 300;
        }





        .footer {
            margin-top: auto;
            font-size: 10px;
        }

        h1 {
            font-weight: 100;
            text-align: center;
        }

        .table th,
        .table td {
            padding: 4px !important;
        }

        textarea {
            resize: none !important;
        }
    </style>

</head>

<body>

    <div class="container" id="container">
        <p class="fs-6 text-end" data-i18n="messages.formNo2">Form No2</p>

        <img src="{{ asset('/pk-logo.jpeg') }}" style="width: 150px;margin: 0 auto">
        <div class='header_Text'>Customer Risk Profiling Form
        </div>
        <div class='header_Text2'>顾客风险分析表格</div>

        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 30%;">
                <col style="width: 20%;">
                <col style="width: 15%;">
                <col style="width: 15%;">

            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.branch_name"></span></th>
                    <td><input type="text" class="form-control border-0" name="branch_name" value="{{ $branch -> Branch_Code}}"></td>

                    <th class="bg-light"><span data-i18n="messages.formNo"></span></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="doc_no" value="{{ old('doc_no', $form->doc_no ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light" rowspan="2"><span data-i18n="messages.customerInfo"></span><span class="text-danger">*</span></th>
                    <td><span data-i18n="messages.name"></span><input type="text" class="form-control border-0" name="cust_name" value="{{ old('cust_name', $form1->cust_name ?? '') }}"></td>
                    <th class="bg-light" rowspan="2"><span data-i18n="messages.date"></span></th>
                    <td rowspan="2" colspan="2" height="1">
                        <div style="display:flex; height:100%;">
                            <input type="text" class="form-control border-0" style="flex:1;" placeholder="yyyy-mm-dd" name="date" value="{{ old('date', $form1->date ?? '') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><span data-i18n="messages.nric_passport"></span><input type="text" class="form-control border-0" name="nric_passport" value="{{ old('nric_passport', $form1->nric_passport ?? '') }}"></td>

                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.contactNumber"></span><span class="text-danger">*</span></th>
                    <td><input type="text" class="form-control border-0" name="contact" value="{{ old('contact', $form1->contact ?? '') }}"></td>
                    <th class="bg-light"><span data-i18n="messages.totalMark"></span></th>
                    <td class="border-end-0"><input type="text" class="form-control border-0" name="total_mark" value="{{ old('total_mark', $form1->total_mark ?? '') }}" readonly></td>
                    <td class="border-start-0">%</td>
                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.salesPersonName"></span><span class="text-danger">*</span></th>
                    <td height="1">
                        <x-searchable-dropdown
                            :options="$sales_name"
                            name="sales_name"
                            field="USERNAME"
                            :form1="$form1"
                            border="none" />
                    </td>
                    <th class="bg-light"><span data-i18n="messages.riskRating"></span></th>
                    <td colspan="2">
                        <div style="display:flex;column-gap:40px;flex-wrap:wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="risk_rating" id="risk_rating_low" value="low" {{ old('risk_rating', $form1->risk_rating ?? '') == 'low' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.l" for="risk_rating_low">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="risk_rating" id="risk_rating_medium" value="medium" {{ old('risk_rating', $form1->risk_rating ?? '') == 'medium' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.m" for="risk_rating_medium">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="risk_rating" id="risk_rating_medium_high" value="medium-high" {{ old('risk_rating', $form1->risk_rating ?? '') == 'medium-high' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.m_h" for="risk_rating_medium_high">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="risk_rating" id="risk_rating_high" value="high" {{ old('risk_rating', $form1->risk_rating ?? '') == 'high' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.h" for="risk_rating_high">
                                </label>
                            </div>
                        </div>
                    </td>

                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.typeOfCustomer"></th>
                    <td colspan="4">
                        <div style="display:flex;column-gap:40px;flex-wrap:wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cust_type" id="new" value="new" {{ old('cust_type', $form1->cust_type ?? '') == 'new' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.newCustomer" for="new">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cust_type" id="repeating" value="repeating" {{ old('cust_type', $form1->cust_type ?? '') == 'repeating' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.repeatingCustomer" for="repeating">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cust_type" id="occasional" value="occasional" {{ old('cust_type', $form1->cust_type ?? '') == 'occasional' ? 'checked' : '' }}>
                                <label class="form-check-label" data-i18n="messages.occasionalOneOff" for="occasional">
                                </label>
                            </div>
                        </div>


                    </td>

                </tr>


        </table>
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
                    <th colspan="3" class="text-center">Parameters Determined for Risk Profiling</th>
                    <th colspan="1" class="text-center">Risk Rating</th>
                    <th colspan="1" class="text-center">Mark</th>
                </tr>
                <tr>
                    <th colspan="6"> (a) Customer Risks 顾客风险</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="4">1.</td>
                    <td rowspan="4">Type</td>
                    <td colspan="2">Individual</td>
                    <td class="text-center">Low</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0" name="individual" value="{{ old('individual', $form1->individual ?? '') }}"> -->
                        <!-- <button type="button"
                            class="btn w-100 risk-btn {{ old('individual', $form1->individual ?? '0') == 1 ? 'btn-success' : 'btn-outline-secondary' }}"
                            value="1">
                            {{ old('individual', $form1->individual ?? '0') == 1 ? '1' : '0' }}
                        </button> -->
                        <input type="hidden" id="type_value" name="individual"
                            value="{{ old('individual', $form1->individual ?? 0) }}">
                        <x-mark-button
                            name="type"
                            group="type_group"
                            :value="1"
                            :current-value="old('individual', $form1->individual ?? 0)" />

                    </td>
                </tr>
                <tr>
                    <td colspan="2">Legal Person</td>
                    <td rowspan="2" class="text-center">Medium</td>
                    <td rowspan="2" height="1">
                        <!-- <div style="display:flex; height:100%;">
                            <input type="text" class="form-control border-0" style="flex:1;" name="legal_clubs" value="{{ old('legal_clubs', $form1->legal_clubs ?? '') }}">
                        </div> -->

                        <input type="hidden" id="legal_clubs_value" name="legal_clubs"
                            value="{{ old('legal_clubs', $form1->legal_clubs ?? 0) }}">
                        <x-mark-button
                            name="legal_clubs"
                            group="type_group"
                            :value="2"
                            :current-value="old('legal_clubs', $form1->legal_clubs ?? 0)" />


                    </td>
                </tr>
                <tr>
                    <td colspan="2">Clubs, Societies and Charities</td>
                </tr>
                <tr>
                    <td colspan="2">Legal Arrangement</td>
                    <td class="text-center">High</td>
                    <td>
                        <!-- <input type="text" class="form-control border-0" name="legal_arrangement" value="{{ old('legal_arrangement', $form1->legal_arrangement ?? '') }}"> -->
                        <input type="hidden" id="legal_arrangement_value" name="legal_arrangement"
                            value="{{ old('legal_arrangement', $form1->legal_arrangement ?? 0) }}">
                        <x-mark-button
                            name="legal_arrangement"
                            group="type_group"
                            :value="3"
                            :current-value="old('legal_arrangement', $form1->legal_arrangement ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td rowspan="3">2.</td>
                    <td rowspan="3">Social Status</td>
                    <td colspan="2">Non-PEP</td>
                    <td class="text-center">Low</td>
                    <td>
                        <input type="hidden" id="non_pep_value" name="non_pep"
                            value="{{ old('non_pep', $form1->non_pep ?? 0) }}">
                        <x-mark-button
                            name="non_pep"
                            group="social_status_group"
                            :value="1"
                            :current-value="old('non_pep', $form1->non_pep ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Local PEP</td>
                    <td class="text-center">Medium</td>
                    <td>
                        <input type="hidden" id="local_pep_value" name="local_pep"
                            value="{{ old('local_pep', $form1->local_pep ?? 0) }}">
                        <x-mark-button
                            name="local_pep"
                            group="social_status_group"
                            :value="2"
                            :current-value="old('local_pep', $form1->local_pep ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Foreign PEP</td>
                    <td class="text-center">High</td>
                    <td>
                        <input type="hidden" id="foreign_pep_value" name="foreign_pep"
                            value="{{ old('foreign_pep', $form1->foreign_pep ?? 0) }}">
                        <x-mark-button
                            name="foreign_pep"
                            group="social_status_group"
                            :value="3"
                            :current-value="old('foreign_pep', $form1->foreign_pep ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td rowspan="3">3.</td>
                    <td colspan="2" rowspan="2">Customer/director/partner and shareholder/beneficial owner classified as High Net Worth individual.</td>
                    <td class="text-center">No</td>
                    <td class="text-center">Low</td>
                    <td>
                        <input type="hidden" id="high_net_worth_no_low_value" name="high_net_worth_no_low"
                            value="{{ old('high_net_worth_no_low', $form1->high_net_worth_no_low ?? 0) }}">
                        <x-mark-button
                            name="high_net_worth_no_low"
                            group="high_net_worth_no_group"
                            :value="1"
                            :current-value="old('high_net_worth_no_low', $form1->high_net_worth_no_low ?? 0)" />
                    </td>
                </tr>
                <tr>
                    <td class="text-center">Yes</td>
                    <td class="text-center">High</td>
                    <td>
                        <input type="hidden" id="high_net_worth_yes_high_value" name="high_net_worth_yes_high"
                            value="{{ old('high_net_worth_yes_high', $form1->high_net_worth_yes_high ?? 0) }}">
                        <x-mark-button
                            name="high_net_worth_yes_high"
                            group="high_net_worth_no_group"
                            :value="3"
                            :current-value="old('high_net_worth_yes_high', $form1->high_net_worth_yes_high ?? 0)" />
                    </td>

                </tr>
                <tr>
                    <td colspan="6"> <textarea class="form-control border-0" name="high_net_worth_comments" placeholder="Comments">{{ old('high_net_worth_comments', $form1->high_net_worth_comments ?? '') }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>

</body>
<script>

</script>

</html>