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
            height: 1080px;
            padding-bottom: 10px;
            margin: auto;
            box-sizing: border-box;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;

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
            padding: 2px !important;
        }

        textarea {
            resize: none !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad/dist/signature_pad.umd.min.js"></script>


</head>

<body>
    <div class="container" id="container">
        <p class="fs-6 text-end" data-i18n="messages.formNo3">Form No. 3</p>

        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('pk-logo.jpeg'))) }}"
            style="width: 150px; margin: 0 auto;">
        <div class='fs-4 text-center'>Enhanced Customer Due Diligence Form
        </div>
        <div class='fs-4 text-center'>增强客户尽职调查表格</div>
        <x-card
            title-key="{{ 'messages.edd_card_title'}}"
            :sections="[
        [
            'description' => 'messages.edd_description_1',
            'bullets' => [
                'messages.edd_bullet_1a',
                'messages.edd_bullet_1b',
            ],
        ],
        [
            'description' => 'messages.edd_description_2',
            'bullets' => [
                'messages.edd_bullet_2a',
                'messages.edd_bullet_2b',
                'messages.edd_bullet_2c',
                'messages.edd_bullet_2d',
            ],
        ],[
            'description' => 'messages.edd_note_label',
            'text' => 'messages.edd_note_text',

        ],
    ]" />
        <table class="table table-bordered align-middle table-sm mt-2">
            <colgroup>
                <col style="width: 50%;">
                <col style="width: 50%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.individual_name_label">Individual name of higher risk customer/PEP</span></th>
                    <td><input type="text" class="form-control border-0" name="individual_name" value="{{ old('individual_name', $form1->individual_name ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.customer_pep_role_label">Customer/PEP's role in Legal Person/Legal Arrangement, where relevant</span></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="cust_pep" value="{{ old('cust_pep', $form1->cust_pep ?? '') }}"></td>
                </tr>
        </table>
        <table class="table table-bordered align-middle">
            <thead style="background-color:#2E74B5;color:white">
                <tr>
                    <th data-i18n="messages.higher_risk_customer_header">For higher ML/TF/PF risk customers</th>
                </tr>
        </table>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 50%;">
                <col style="width: 50%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.source_of_fund_label">Source of Fund/Source of Wealth</span></th>
                    <td><input type="text" class="form-control border-0" name="source_fund" value="{{ old('source_fund', $form1->source_fund ?? '') }}"></td>



                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.additional_info_label">Additional Information on Customer and Beneficial Owner</span></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="add_info" value="{{ old('add_info', $form1->add_info ?? '') }}"></td>
                </tr>
        </table>
        <table class="table table-bordered align-middle">
            <thead style="background-color:#2E74B5;color:white">
                <tr>
                    <th data-i18n="messages.edd_approval_header">For customer subject to EDD - To be approved by Senior Management of the Firm</th>
                </tr>
        </table>
        <table class="table table-bordered align-middle table-sm">
            <colgroup>
                <col style="width: 40%;">
                <col style="width: 20%;">
                <col style="width: 40%;">
            </colgroup>
            <tbody>
                <tr>
                    <th class="bg-light" rowspan="2"><span data-i18n="messages.approval_label">Approval</span></th>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="approval" id="approval_approved" value="approved" {{ old('approval', $form1->approval ?? '') == 'approved' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.approved" for="approval_approved">Approved
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="approval" id="approval_not_approved" value="not_approved" {{ old('approval', $form1->approval ?? '') == 'not_approved' ? 'checked' : '' }}>
                            <label class="form-check-label" data-i18n="messages.not_approved" for="approval_not_approved">Not Approved
                            </label>
                        </div>
                    </td>
                    <td><canvas id="signature-pad" style="border:1px solid #000; touch-action: none;width:100%;height:100px"></canvas>
                        <input type="hidden" name="approval_signature" id="approval_signature" value="{{ old('approval_signature', $form1->approval_signature ?? '') }}">
                        <div class="d-grid gap-2 d-md-flex justify-content-between align-items-center">
                            <label class="fw-bold" data-i18n="messages.signature_label">Signature</label>
                            <button type="button" class="btn btn-secondary" id="clear-btn" data-i18n="messages.clear"></button>
                        </div>
                    </td>



                </tr>
                <tr>
                    <td colspan="2"> <label class="fw-bold" data-i18n="messages.justification_label">Justification</label>
                        <textarea class="form-control border-0" name="justification">{{ old('justification', $form1->justification ?? '') }}</textarea>
                    </td>
                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.senior_management_name_label">Name of Senior Management
                        </span></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="senior_management" value="{{ old('senior_management', $form1->senior_management ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.positiondesignation_label">Position/Designation

                        </span></th>
                    <td colspan="2"><input type="text" class="form-control border-0" name="position" value="{{ old('position', $form1->position ?? '') }}"></td>
                </tr>
                <tr>
                    <th class="bg-light"><span data-i18n="messages.date">Date

                        </span></th>
                    <td colspan="2"><input type="date" class="form-control border-0" name="date" value="{{ old('date', isset($form1->date) ? \Carbon\Carbon::parse($form1->date)->format('Y-m-d') : '') }}"></td>
                </tr>
        </table>
        <div class='footer'>Version 3: Dated 09/12/2025</div>


    </div>

</body>
<script>
    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);

    document.getElementById('clear-btn').addEventListener('click', function() {
        signaturePad.clear();

        document.getElementById('approval_signature').value = '';
    });

    document.getElementById('enhancedcustomerduediligenceform').addEventListener('submit', function() {

        if (!signaturePad.isEmpty()) {
            document.getElementById('approval_signature').value =
                signaturePad.toDataURL('image/png');

        }

    });

    function loadSignature(canvas, signature) {

        if (!signature) {
            return;
        }

        const img = new Image();

        img.onload = function() {
            const ctx = canvas.getContext('2d');

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.drawImage(
                img,
                0,
                0,
                canvas.width,
                canvas.height
            );
        };

        // After a validation error the value comes back from old() as a base64
        // data URL, otherwise it is a file path saved under storage.
        img.src = signature.startsWith('data:image') ?
            signature :
            "{{ asset('storage') }}/" + signature;

    }


    const savedSignature =
        document.getElementById('approval_signature').value;



    loadSignature(canvas, savedSignature);
</script>

</html>