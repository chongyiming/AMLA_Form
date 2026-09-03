<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad/dist/signature_pad.umd.min.js"></script>
    <style>
        .no-border-table,
        .no-border-table th,
        .no-border-table td {
            border: none !important;
        }
    </style>
</head>

<body>
    <div class="container" id="container" style="margin-top:30px">
        <p class="fs-6 text-end" data-i18n="messages.formNo2">Form No2</p>
        <span data-i18n="messages.comments_label"></span>
        <textarea class="form-control"
            name="conclusion_comment">{{ old('conclusion_comment', $form1->conclusion_comment ?? '') }}</textarea>
        <table class="align-middle mt-3 no-border-table">
            <colgroup>
                <col style="width: 40%;">
                <col style="width: 10%;">
                <col style="width: 40%;">
            </colgroup>
            <tbody>
                <tr>
                    <th data-i18n="messages.prepared_by"></th>
                    <th></th>
                    <th data-i18n="messages.reviewed_by"></th>

                </tr>
                <tr>
                    <td>
                        <canvas id="signature-pad"
                            style="border:1px solid #000; touch-action:none; width:100%;">
                        </canvas>

                        <input type="hidden"
                            name="prepared_signature"
                            id="prepared_signature"
                            value="{{ old('prepared_signature', $form1->prepared_signature ?? '') }}">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary" id="clear-btn" data-i18n="messages.clear"></button>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <canvas id="signature-pad1" style="border:1px solid #000; touch-action: none;width:100%"></canvas>
                        <input type="hidden" name="reviewed_signature" id="reviewed_signature" value="{{ old('reviewed_signature', $form1->reviewed_signature ?? '') }}">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary" id="clear-btn1" data-i18n="messages.clear"></button>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td height="1">
                        <div class="d-flex align-items-center gap-3" style="height: 100%;">
                            <span data-i18n="messages.name_label" class="text-nowrap"></span>
                            <x-searchable-dropdown
                                :options="$sales_name"
                                name="prepared_name"
                                field="USERNAME"
                                :form1="$form1"
                                border="show" />
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span data-i18n="messages.name_label" class="text-nowrap"></span>
                            <input type="text" name="reviewed_name" class="form-control" value="{{ old('reviewed_name', $form1->reviewed_name ?? '') }}">
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span data-i18n="messages.designation_label" class="text-nowrap"></span> <input type="text" name="prepared_designation" class="form-control" value="{{ old('prepared_designation', $form1->prepared_designation ?? '') }}">
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span data-i18n="messages.designation_label" class="text-nowrap"></span> <input type="text" name="reviewed_designation" class="form-control" value="{{ old('reviewed_designation', $form1->reviewed_designation ?? '') }}">
                        </div>

                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span data-i18n="messages.date_label" class="text-nowrap"></span> <input type="text" name="prepared_date" value="{{ old('prepared_date', $form1->prepared_date ?? date('Y-m-d')) }}" class="form-control">
                        </div>

                    </td>
                    <td></td>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <span data-i18n="messages.date_label" class="text-nowrap"></span> <input type="text" name="reviewed_date" value="{{ old('reviewed_date', $form1->reviewed_date ?? date('Y-m-d')) }}" class="form-control">
                        </div>

                    </td>
                </tr>

            </tbody>


        </table>


        <div class='footer'>Version 5: Dated 01/04/2026</div>


    </div>
</body>
<script>
    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);
    const canvas1 = document.getElementById('signature-pad1');
    const signaturePad1 = new SignaturePad(canvas1);

    document.getElementById('clear-btn').addEventListener('click', function() {
        signaturePad.clear();

        document.getElementById('prepared_signature').value = '';
    });

    document.getElementById('clear-btn1').addEventListener('click', function() {
        signaturePad1.clear();

        document.getElementById('reviewed_signature').value = '';
    });

    document.getElementById('customerriskprofilingform').addEventListener('submit', function() {

        if (!signaturePad.isEmpty()) {
            document.getElementById('prepared_signature').value =
                signaturePad.toDataURL('image/png');

        }

        if (!signaturePad1.isEmpty()) {
            document.getElementById('reviewed_signature').value =
                signaturePad1.toDataURL('image/png');

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


        img.src = "{{ asset('storage') }}/" + signature;

    }


    const savedSignature =
        document.getElementById('prepared_signature').value;

    const savedSignature1 =
        document.getElementById('reviewed_signature').value;


    loadSignature(canvas, savedSignature);
    loadSignature(canvas1, savedSignature1);
</script>

</html>