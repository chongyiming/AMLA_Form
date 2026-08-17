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

        /* .sidebar_button {
            display: flex;
            justify-content: center;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 5px;
            text-decoration: none;
            align-items: center;
            border: 1px solid #17a2b8;
            color: #17a2b8;
            background-color: white;
            cursor: pointer;
        }

        .sidebar_button:hover {
            background: #f5f5f5;
        } */

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
</head>

<body>
    <div class="side_panel">
        <!-- <button type="button" class="sidebar_button" id="menuBtn">
            <x-heroicon-o-bars-3 style="width: 24px; height: 24px;" />
        </button> -->
        <div style="width:50px">
            <x-button type="button" id="menuBtn" style="border: 1px solid #17a2b8;color: #17a2b8;">
                <x-heroicon-o-bars-3 style="width: 16px; height: 16px;" />
            </x-button>
        </div>

        <!-- <a href="/" class="sidebar_button">Home</a> -->
        <div style="width:70px">
            <x-button type="button" style="border: 1px solid #17a2b8;color: #17a2b8;" onclick="window.location.href='/'" data-i18n="messages.home">
            </x-button>
        </div>

    </div>

    <div class="sidebar" id="sidebar">

        <div>
            <x-button style="border: 1px solid #007bff;background-color:#007bff;color: white;" onclick="window.location.href='/pdsp_customer_due_diligence_form'" data-i18n="messages.customerDueDiligenceFormV3">
            </x-button>
        </div>

        <div>
            <x-button style="border: 1px solid #6c757d; background-color:#6c757d;color: white;" data-i18n="messages.customerRiskProfilingFormV5">
            </x-button>
        </div>


        <div>
            <x-button style="border: 1px solid #28a745;background-color:#28a745;color: white;" data-i18n="messages.enhancedCustomerDueDiligenceFormV2">
            </x-button>
        </div>

        <div>
            <x-button style="border: 1px solid #dc3545; background-color:#dc3545;color: white;" data-i18n="messages.suspiciousTransactionIndividual">
            </x-button>
        </div>

        <div>
            <x-button style="border: 1px solid #ffc107; background-color:#ffc107;color: white;" data-i18n="messages.suspiciousTransactionNonIndividual">
            </x-button>
        </div>

        <div>
            <x-button style="border: 1px solid #17a2b8; background-color:#17a2b8;color: white;" data-i18n="messages.suspiciousTransactionLegalArrangement">
            </x-button>
        </div>
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