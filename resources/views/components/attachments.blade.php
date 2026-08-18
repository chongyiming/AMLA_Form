<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .attachment-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 10;

        }

        .attachment-modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-height: 90%;
            overflow: auto;

        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/strap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        if (typeof jQuery === 'undefined') {
            document.write('<script src="https://code.jquery.com/jquery-3.7.1.min.js"><\/script>');
        }
    </script>
</head>

<body>
    <div id="attachmentModal" class="attachment-modal">
        <div class="attachment-modal-content" id="attachmentModalBody">

        </div>

    </div>

    <script>
        async function openAttachmentsModal(formId) {
            const res = await fetch(`/${formId}/attachments_modal`);
            const html = await res.text();
            document.getElementById('attachmentModalBody').innerHTML = html;
            document.getElementById('attachmentModal').style.display = "flex";


            applyTranslations();

            const response1 = await fetch(`/attachments/${formId}`);
            const data1 = await response1.json();
            const tbody = document.querySelector('#attachmentImages tbody');

            tbody.innerHTML = '';
            data1.attachments.forEach((attachment, index) => {
                const row = `
            <tr>
            <td>${attachment.id}</td>
            <td>
            <div style="display:flex;flex-direction:column">
            ${attachment.file_name.replace('photos/', '')}
            <img
                src="/storage/${attachment.file_name}"
                style="width:200px;height:200px;">
            </div>
                </td>
            <td>${attachment.createdAt}</td>
            <td>
    ${data1.form_status[0].status !== 'Submitted'
        ? `<button type="button" class="btn btn-danger" onclick="deleteAttachment(${attachment.id})">Delete</button>`
        : ''
    }
</td>
        </tr>
    `;

                tbody.insertAdjacentHTML('beforeend', row);
            });

            if (data1.certReceipts.length > 0) {
                document.getElementById('certReceiptSection').style.display = 'none'
            }

            const images = data1.certReceipts.map(item => {
                const path = item.file_name;

                return `
<div class="border border-secondary" style="width: 220px;padding:10px">
        <img 
            src="/storage/${path}" 
            style="width: 200px;"
        >

    <div class="text-break">
        ${path.replace('photos/', '')}
    </div>
</div>
`;
            });

            document.getElementById('certImage').innerHTML = images.join('');

        }

        function closeAttachmentsModal() {
            document.getElementById('attachmentModal').style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedLocale = localStorage.getItem('locale') || 'en';
            loadLocale(savedLocale);
        });

        async function loadLocale(lang) {
            const res = await fetch(`/lang/${lang}.json`);
            translations = await res.json();
            applyTranslations();
            localStorage.setItem('locale', lang);
            fetch(`/locale/${lang}`);
        }

        function applyTranslations() {
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.dataset.i18n;
                const text = translations[key] ?? key;
                const targetAttr = el.dataset.i18nTarget;
                const isHtml = el.hasAttribute('data-i18n-html');
                if (targetAttr) {
                    el.setAttribute(targetAttr, text);
                } else if (isHtml) {
                    el.innerHTML = text;
                } else {
                    el.textContent = text;
                }
            });
        }

        function preview_images() {
            document.getElementById("image_preview").innerHTML = ""
            document.getElementById("imageErrors").innerHTML = ""
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div><img class='img-responsive' style='width:200px;height:200px' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
                console.log(event.target.files[i])

            }
        }
        document.addEventListener('submit', async function(e) {
            if (e.target.id !== 'uploadImagesForm') return;

            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const errorDiv = document.getElementById('imageErrors');

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });
            errorDiv.innerHTML = ''

            if (!response.ok) {
                errorDiv.innerHTML = 'Only image files are allowed.';
                return;
            }
            document.getElementById("image_preview").innerHTML = ""
            document.getElementById('images').value = '';

            const formId = form.querySelector('[name="form_id"]').value;
            const response1 = await fetch(`/attachments/${formId}`);
            const data1 = await response1.json();

            const tbody = document.querySelector('#attachmentImages tbody');

            tbody.innerHTML = '';
            data1.attachments.forEach((attachment, index) => {
                const row = `
            <tr>
            <td>${attachment.id}</td>
            <td>
            <div style="display:flex;flex-direction:column">
            ${attachment.file_name.replace('photos/', '')}
            <img
                src="/storage/${attachment.file_name}"
                style="width:200px;height:200px;">
            </div>
                </td>
            <td>${attachment.createdAt}</td>
            <td>
                         <button type="button" class="btn btn-danger" onclick="deleteAttachment(${attachment.id})">Delete</button>

            </td>
        </tr>
    `;

                tbody.insertAdjacentHTML('beforeend', row);
            });



        });

        async function deleteAttachment(id) {
            const res = await fetch(`/deleteImage/${id}`, {
                method: 'POST'
            });

            const formId = document.querySelector('[name="form_id"]').value;
            const response1 = await fetch(`/attachments/${formId}`);
            const data1 = await response1.json();

            const tbody = document.querySelector('#attachmentImages tbody');

            tbody.innerHTML = '';
            console.log(data1)
            data1.attachments.forEach((attachment, index) => {
                const row = `
            <tr>
            <td>${attachment.id}</td>
            <td>
            <div style="display:flex;flex-direction:column">
            ${attachment.file_name.replace('photos/', '')}
            <img
                src="/storage/${attachment.file_name}"
                style="width:200px;height:200px;">
            </div>
                </td>
            <td>${attachment.createdAt}</td>
            <td>
                         <button type="button" class="btn btn-danger" onclick="deleteAttachment(${attachment.id})">Delete</button>

            </td>
        </tr>
    `;

                tbody.insertAdjacentHTML('beforeend', row);
            });

        }

        async function generate(trx_no, form_id) {
            document.getElementById('certReceiptSection').style.display = 'none'

            const response = await fetch('/generate-exe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    trxno: trx_no
                })
            });

            const data = await response.json();
            console.log(data)
            const rawJson = data.output.join('\n');
            const paths = JSON.parse(rawJson);

            const allFiles = [
                ...paths.GoldCert,
                ...paths.Receipt
            ];
            if (allFiles.length == 0) {
                document.getElementById('certReceiptSection').style.display = 'flex'
            }

            const pngPaths = allFiles.filter(path => path.endsWith('.png'));
            await saveCertReceiptToAttachments(pngPaths, form_id)

            const response1 = await fetch(`/attachments/${form_id}`);
            const data1 = await response1.json();
            if (data1.certReceipts.length > 0) {
                document.getElementById('certReceiptSection').style.display = 'none'
            }

            const images = data1.certReceipts.map(item => {
                const path = item.file_name;

                return `
            <div class="border border-secondary" style="width: 220px;padding:10px">
                    <img 
                        src="/storage/${path}" 
                        style="width: 200px;"
                    >

                <div class="text-break">
                    ${path.replace('photos/', '')}
                </div>
            </div>
            `;
            });

            document.getElementById('certImage').innerHTML = images.join('');

        }


        async function saveCertReceiptToAttachments(pngPaths, form_id) {
            const response = await fetch('/uploadCertReceiptImages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    pngPaths: pngPaths,
                    form_id: form_id
                })
            });

            const data = await response.json();
        }
    </script>
</body>

</html>