<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        if (typeof jQuery === 'undefined') {
            document.write('<script src="https://code.jquery.com/jquery-3.7.1.min.js"><\/script>');
        }
    </script>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;

        }
    </style>
</head>

<body>
    <div class="modal fade" id="exampleModal-{{ $row->form_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span>{{ $row->branch_name }}</span>
                        Customer Due Diligence Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <x-table :columns="[
                            ['field'=>'form_id','label'=>'No'],
                            ['field'=>'doc_no','label'=>'Doc No'],
                            ['field'=>'trx_no','label'=>'Trx No'],
                            ['field'=>'full_name','label'=>'Customer Name'],
                            ['field'=>'preparer_name','label'=>'Preparer Name'],
                            ['field'=>'created_date','label'=>'Created Date'],
                            ['field'=>'status','label'=>'Status'],
                        ]" :rows="$row"></x-table>
                    <h4 style="margin-top:30px">Document (Receipt + Gold Cert)</h4>
                    <div id="certReceiptSection-{{ $row->form_id }}" style="display:flex;gap:10px;align-items:center">
                        No Document found.
                        <button type="button" class="btn btn-success" onclick="generate('{{ $row->form_id }}','{{ $row->trx_no }}','{{ $row->form_type }}')">Generate生成</button>
                        <div id="certErrors-{{ $row->form_id }}" style="color:red;"></div>

                    </div>
                    <div class="spinner-grow d-none" role="status" id="certSpinner-{{ $row->form_id }}">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    <div id="certImage-{{ $row->form_id }}" style="margin-top:10px;display:flex;flex-direction:row;gap:10px;flex-wrap:wrap"></div>

                    <h4 style="margin-top:30px">Upload Attachment</h4>
                    <form id="uploadImagesForm-{{ $row->form_id }}" enctype="multipart/form-data">
                        @csrf
                        <div style="display: flex; gap: 10px;">
                            <input type="file"
                                class="form-control"
                                id="images-{{ $row->form_id }}"
                                name="images[]"
                                multiple
                                accept="image/*"
                                onchange="preview_images('{{ $row->form_id }}')">

                            <button type="button"
                                class="btn btn-primary"
                                onclick="uploadImages('{{ $row->form_id }}','{{ $row->form_type }}')"
                                style="white-space: nowrap;"
                                id="uploadImagesButton-{{ $row->form_id }}">
                                Upload Images
                            </button>
                            <div class="spinner-grow d-none" role="status" id="imageSpinner-{{ $row->form_id }}">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div id="imageErrors-{{ $row->form_id }}" style="color:red;"></div>
                    </form>

                    <div id="image_preview-{{ $row->form_id }}" style="display:flex;flex-direction:row;flex-wrap:wrap;margin-top:30px;gap:10px"></div>

                    <h4 style="margin-top:30px">Existing Attachments</h4>
                    <table class="table" id="attachmentImages-{{ $row->form_id }}">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                                <th>Uploaded At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        fetchAttachments('{{ $row->form_id }}', '{{ $row->status }}')


        function preview_images(formId) {
            const previewDiv = document.getElementById('image_preview-' + formId);
            const errorDiv = document.getElementById('imageErrors-' + formId);
            const input = document.getElementById('images-' + formId);
            const files = input.files;

            previewDiv.innerHTML = "";
            errorDiv.innerHTML = "";

            for (let i = 0; i < files.length; i++) {
                const wrapper = document.createElement('div');
                wrapper.className = 'preview-item';
                wrapper.style.cssText = 'position:relative; display:inline-block; margin:5px;';

                const img = document.createElement('img');
                img.className = 'img-responsive';
                img.style.cssText = 'width:200px;height:200px;object-fit:cover;';
                img.src = URL.createObjectURL(files[i]);

                const closeBtn = document.createElement('button');
                closeBtn.type = 'button';
                closeBtn.innerHTML = 'X';
                closeBtn.className = 'btn btn-danger btn-sm';
                closeBtn.style.cssText = `
                    position:absolute;
                    top:-8px;
                    right:-8px;
                    border-radius:50%;
                    border:none;
                `;
                const indexToRemove = i;
                closeBtn.addEventListener('click', function() {
                    removeImage(formId, indexToRemove);
                });

                wrapper.appendChild(img);
                wrapper.appendChild(closeBtn);
                previewDiv.appendChild(wrapper);
            }
        }


        function removeImage(formId, indexToRemove) {
            const input = document.getElementById('images-' + formId);
            const dt = new DataTransfer();
            const files = input.files;

            for (let i = 0; i < files.length; i++) {
                if (i !== indexToRemove) {
                    dt.items.add(files[i]);
                }
            }

            input.files = dt.files;
            preview_images(formId);
        }

        async function uploadImages(formId, form_type) {
            document.getElementById("uploadImagesButton-" + formId).style.display = 'none'
            document.getElementById("imageSpinner-" + formId).classList.remove('d-none');
            const form = document.getElementById('uploadImagesForm-' + formId);
            const errorDiv = document.getElementById('imageErrors-' + formId);
            const formData = new FormData(form);

            errorDiv.innerHTML = '';

            const response = await fetch('/uploadImages/' + formId + '/' + form_type, {
                method: 'POST',
                body: formData,
            });
            console.log(response.json())
            if (!response.ok) {
                errorDiv.innerHTML = 'Only image files are allowed.';
                document.getElementById("imageSpinner-" + formId).classList.add('d-none');
                document.getElementById("uploadImagesButton-" + formId).style.display = 'flex'
                return;
            }

            document.getElementById('image_preview-' + formId).innerHTML = '';
            document.getElementById('images-' + formId).value = '';
            document.getElementById("imageSpinner-" + formId).classList.add('d-none');
            document.getElementById("uploadImagesButton-" + formId).style.display = 'flex'

            fetchAttachments(formId, '{{ $row->status }}');
        }

        async function fetchAttachments(formId, status) {
            const response = await fetch(`/attachments/${formId}`);
            const data = await response.json();

            const table = document.getElementById('attachmentImages-' + formId);
            const tbody = table.querySelector('tbody');
            tbody.innerHTML = '';

            const isSubmitted = data.form_status?.[0]?.status === 'Submitted';

            data.attachments.forEach((attachment) => {
                const fileName = 'photos/' + attachment.file_name;
                const deleteBtn = isSubmitted ?
                    '' :
                    `<button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure you want to delete this attachment?\\n\\n您确定要删除此附件吗?')) deleteAttachment(${attachment.id}, '${formId}')">Delete</button>`;

                const row = `
            <tr>
                <td style="overflow-wrap:anywhere">${attachment.id}</td>
                <td style="overflow-wrap:anywhere">
                    <div style="display:flex;flex-direction:column">
                        
    ${attachment.file_name}
                        <img src="/storage/${fileName}" style="width:200px;height:200px;">
                    </div>
                </td>
                <td style="overflow-wrap:anywhere">${attachment.createdAt}</td>
                <td style="overflow-wrap:anywhere">${deleteBtn}</td>
            </tr>
        `;

                tbody.insertAdjacentHTML('beforeend', row);
            });
            if (data.certReceipts.length > 0) {
                document.getElementById('certReceiptSection-' + formId).style.display = 'none';
            }
            const images = data.certReceipts.map(item => {
                const path = 'photos/' + item.file_name;

                return `
        <div class="border border-secondary" style="width: 220px; padding: 10px">
            <img src="/storage/${path}" style="width: 200px;">
            <div class="text-break">${item.file_name}</div>
        </div>
    `;
            });
            document.getElementById('certImage-' + formId).innerHTML = images.join('');
        }


        async function deleteAttachment(attachmentId, formId) {
            const res = await fetch(`/deleteImage/${attachmentId}`, {
                method: 'POST'
            });

            fetchAttachments(formId, '{{ $row->status }}')
        }

        async function generate(formId, trx_no, form_type) {
            document.getElementById('certSpinner-' + formId).classList.remove('d-none');
            document.getElementById('certReceiptSection-' + formId).style.display = 'none';

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
            const rawJson = data.output.join('\n');
            const paths = JSON.parse(rawJson);

            const allFiles = [
                ...paths.GoldCert,
                ...paths.Receipt
            ];
            if (allFiles.length == 0) {
                document.getElementById('certReceiptSection-' + formId).style.display = 'flex';

            }

            const pngPaths = allFiles.filter(path => path.endsWith('.png'));
            await saveCertReceiptToAttachments(pngPaths, formId, form_type)

            await fetchAttachments(formId, '{{ $row->status }}')

            document.getElementById('certSpinner-' + formId).classList.add('d-none');
        }


        async function saveCertReceiptToAttachments(pngPaths, form_id, form_type) {
            const response = await fetch('/uploadCertReceiptImages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    pngPaths: pngPaths,
                    form_id: form_id,
                    form_type: form_type
                })
            });

            const data = await response.json();
        }
    </script>
</body>

</html>