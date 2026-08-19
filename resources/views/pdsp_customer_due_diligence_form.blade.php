<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table {
            width: 100%;
            margin-top: 20px;
        }

        .header {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 10px;
            padding-right: 10px
        }
    </style>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">

</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>
    <div class="header">
        <h1>{{ $branch->Branch_Code }} Customer Due Diligence Form</h1>
        <button type="button" class="btn btn-outline-success" onclick="window.location.href = '/createForm'"
            data-i18n="messages.createForm"></button>


    </div>
    <div style="margin-top:10px;padding-left:10px;padding-right:10px">

        <div class="simple-pagination">
            {{ $forms->onEachSide(5)->links() }}
        </div>
        <x-searchable-table
            :columns="[
                [ 'field'=>'form_id',
                'label'=>'messages.no',
                'placeholder'=>'messages.no'
                ],
                [
                'field'=>'doc_no',
                'label'=>'messages.docNo',
                'placeholder'=>'messages.docNo'
                ],
                [
                'field'=>'trx_no',
                'label'=>'messages.trxno',
                'placeholder'=>'messages.trxno'
                ],
                [
                'field'=>'full_name',
                'label'=>'messages.customerName',
                'placeholder'=>'messages.customerName'
                ],
                [
                'field'=>'preparer_name',
                'label'=>'messages.preparerName',
                'placeholder'=>'messages.preparerName'
                ],
                [
                'field'=>'created_date',
                'label'=>'messages.createdDate',
                'placeholder'=>'messages.createdDate'
                ],
                [
                'field'=>'status',
                'label'=>'messages.status',
                'placeholder'=>'messages.status'
                ],
                [
                'field'=>'reviewed_date',
                'label'=>'messages.review',
                'placeholder'=>'messages.review'
                ],
                [
                'field'=>'uuid',
                'label'=>'messages.attachment',
                'placeholder'=>'messages.attachment'
                ],
                [
                'label'=>'messages.action',
                'placeholder'=>'messages.action'
                ]
                ]"
            :rows="$forms"></x-searchable-table>

    </div>



</body>

<script>
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
</script>

</html>