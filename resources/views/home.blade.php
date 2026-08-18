<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .a4_container {
            width: 750px;
            padding: 20px;
            margin: auto;
            box-sizing: border-box;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

            margin-top: 60px;
            text-align: center;

        }

        .form-choice-box {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="a4_container">
        <h1>{{ $branch->Branch_Code }} AMLA Form</h1>

        <h4>Choose the form:</h4>
        <div class="form-choice-box">

            <button type="button" class="btn btn-primary" onclick="window.location.href='/pdsp_customer_due_diligence_form'" data-i18n="messages.customerDueDiligenceFormV3"></button>
            <button type="button" class="btn btn-secondary" data-i18n="messages.customerRiskProfilingFormV5"></button>
            <button type="button" class="btn btn-success" data-i18n="messages.enhancedCustomerDueDiligenceFormV2"></button>
            <button type="button" class="btn btn-danger" data-i18n="messages.suspiciousTransactionIndividual"></button>
            <button type="button" class="btn btn-warning" data-i18n="messages.suspiciousTransactionNonIndividual"></button>
            <button type="button" class="btn btn-info" data-i18n="messages.suspiciousTransactionLegalArrangement"></button>
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