<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div></div>
    <h1>
        <span>{{ $branch->Branch_Code }}</span>
        Customer Due Diligence Form
    </h1>

    <x-searchable-table
        :columns="[
        ['field'=>'form_id','label'=>'messages.no','placeholder'=>'messages.no'],
        ['field'=>'doc_no','label'=>'messages.docNo','placeholder'=>'messages.docNo'],
        ['field'=>'trx_no','label'=>'messages.trxno','placeholder'=>'messages.trxno'],
        ['field'=>'full_name','label'=>'messages.customerName','placeholder'=>'messages.customerName'],
        ['field'=>'preparer_name','label'=>'messages.preparerName','placeholder'=>'messages.preparerName'],
        ['field'=>'created_date','label'=>'messages.createdDate','placeholder'=>'messages.createdDate'],
        ['field'=>'status','label'=>'messages.status','placeholder'=>'messages.status'],
    ]"
        :rows="$forms"></x-searchable-table>
    <h4 style="margin-top:30px">Document (Receipt + Gold Cert)</h4>
    <div id="certReceiptSection">
        No Document found.
        <button type="button" class="btn btn-success" onclick="generate('{{$forms->first()->trx_no }}','{{$forms->first()->form_id }}')">Generate生成</button>
    </div>
    <div id="certImage" style="margin-top:10px;display:flex;flex-direction:row;gap:10px"></div>

    <h4 style="margin-top:30px">Upload Attachment</h4>

    <form
        id="uploadImagesForm"
        action="/uploadImages/{{ $forms->first()->form_id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        <input
            type="hidden"
            name="form_id"
            value="{{ $forms->first()->form_id }}">
        <div style="display: flex;gap:20px">
            <input
                type="file"
                class="form-control"
                id="images"
                name="images[]"
                multiple
                accept="image/*"
                onchange="preview_images()">
            <input
                type="submit"
                class="btn btn-primary"
                value="Upload Images">
        </div>
        <div id="imageErrors" style="color:red;"></div>

    </form>


    <div id="image_preview" style="display:flex;flex-direction:row;flex-wrap:wrap;margin-top:30px"></div>

    <h4 style="margin-top:30px">Existing Attachments</h4>

    <x-table :forms="$forms"></x-table>
    <button type="button" class="btn btn-secondary" onclick="closeAttachmentsModal()" style="margin-top:30px">Close</button>

</body>
<script>

</script>

</html>