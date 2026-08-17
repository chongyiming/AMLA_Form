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
        }

        /* .header-switch {
            padding: 7px 16px;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            width: 150px;
            height: 20px;
            border: 1px solid #59c45e;
            color: #59c45e;
            text-align: center;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        .simple-pagination nav {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .simple-pagination nav a,
        .simple-pagination nav span {

            border: 1px solid #d1d5db;
            border-radius: 6px;
            text-align: center;
            padding: 10px;
            width: 80px;
            text-decoration: none;

        }
    </style>
</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>
    <div class="header">
        <h1>{{ $branch->Branch_Code }} Customer Due Diligence Form</h1>
        <div style="width:200px">
            <x-button
                type="button"
                onclick="window.location.href = '/createForm'"
                data-i18n="messages.createForm"
                style="border: 1px solid #59c45e;color: #59c45e;"></x-button>
        </div>

    </div>
    <div>


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
        <div class="simple-pagination">
            {{ $forms->onEachSide(5)->links() }}
        </div>
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