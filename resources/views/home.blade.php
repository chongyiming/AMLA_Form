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
            gap: 20px
        }

        .form-choice {
            height: 50px;
        }
    </style>

</head>

<body>
    <div class="a4_container">
        <h1>{{ $branch->Branch_Code }} AMLA Form</h1>

        <h4>Choose the form:</h4>
        <div class="form-choice-box">
            <div class="form-choice">
                <x-button style="border: 1px solid #007bff;background-color:#007bff;color: white;" onclick="window.location.href='/pdsp_customer_due_diligence_form'" data-i18n="messages.customerDueDiligenceFormV3">
                </x-button>
            </div>

            <div class="form-choice">
                <x-button style="border: 1px solid #6c757d; background-color:#6c757d;color: white;" data-i18n="messages.customerRiskProfilingFormV5">
                </x-button>
            </div>

            <div class="form-choice">
                <x-button style="border: 1px solid #28a745;background-color:#28a745;color: white;" data-i18n="messages.enhancedCustomerDueDiligenceFormV2">
                </x-button>
            </div>

            <div class="form-choice">
                <x-button style="border: 1px solid #dc3545; background-color:#dc3545;color: white;" data-i18n="messages.suspiciousTransactionIndividual">
                </x-button>
            </div>

            <div class="form-choice">
                <x-button style="border: 1px solid #ffc107; background-color:#ffc107;color: white;" data-i18n="messages.suspiciousTransactionNonIndividual">
                </x-button>
            </div>

            <div class="form-choice">
                <x-button style="border: 1px solid #17a2b8; background-color:#17a2b8;color: white;" data-i18n="messages.suspiciousTransactionLegalArrangement">
                </x-button>
            </div>

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