<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .side_panel {
            position: fixed;
            top: 10px;
            left: 15px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }


        .sidebar {
            position: fixed;
            top: 0;
            left: -500px;
            width: 300px;
            height: 100vh;
            background: white;
            border-right: 1px solid #ddd;
            transition: left .3s ease;
            padding-top: 70px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, .1);
            padding-left: 20px;
            padding-right: 20px;
            gap: 30px;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar a {
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            border-radius: 10px;
        }

        .sidebar a:hover {
            background: #f5f5f5;
        }

        .overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .3);
            display: none;
            z-index: 999;
        }

        .overlay.show {
            display: block;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="side_panel">
        <div style="width:50px">
            <button type="button" class="btn btn-outline-primary" id="menuBtn"> <x-heroicon-o-bars-3 style="width: 16px; height: 16px;" />
            </button>

        </div>
        <div style="width:70px">
            <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/'" data-i18n="messages.home">
            </button>
        </div>

    </div>

    <div class="sidebar" id="sidebar">
        <button type="button" class="btn btn-primary" onclick="window.location.href='/pdsp_customer_due_diligence_form'" data-i18n="messages.customerDueDiligenceFormV3"></button>

        <button type="button" class="btn btn-secondary" data-i18n="messages.customerRiskProfilingFormV5"></button>

        <button type="button" class="btn btn-success" data-i18n="messages.enhancedCustomerDueDiligenceFormV2"></button>

        <button type="button" class="btn btn-danger" data-i18n="messages.suspiciousTransactionIndividual"></button>

        <button type="button" class="btn btn-warning" data-i18n="messages.suspiciousTransactionNonIndividual"></button>

        <button type="button" class="btn btn-info" data-i18n="messages.suspiciousTransactionLegalArrangement"></button>
    </div>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');

        function toggleSidebar() {
            sidebar.classList.toggle('show');
        }

        menuBtn.addEventListener('click', toggleSidebar);

        function returnHome() {

        }
    </script>
</body>

</html>