<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;

        }

        .panel_header {
            position: sticky;
            top: 0;

            display: flex;
            justify-content: flex-end;
            padding: 30px;
            background-color: white;
            z-index: 1;


        }

        .side_panel {
            position: fixed;
            top: 10px;
            left: 15px;
            display: flex;
            gap: 10px;
            z-index: 10;
            background-color: white;

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
    <div class="panel_header">
        <div class="side_panel">
            <div style="width:50px">
                <button type="button" class="btn btn-outline-primary" id="menuBtn"> <x-heroicon-o-bars-3 style="width: 16px; height: 16px;" />
                </button>

            </div>
            <div style="width:70px">
                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/'">Home
                </button>
            </div>

        </div>

        <div class="sidebar" id="sidebar">
            <button type="button" class="btn btn-primary" onclick="window.location.href='/pdsp_customer_due_diligence_form'">Customer Due Diligence Form 客户尽职调查表表格_V3</button>
            <button type="button" class="btn btn-secondary">Customer Risk Profiling Form 顾客风险分析表格_V5</button>
            <button type="button" class="btn btn-success">Enhanced Customer Due Diligence Form 增强客户尽职调查表格_V2</button>
            <button type="button" class="btn btn-danger">Suspicious Transaction Report - Individual 可疑交易报告 - 个人</button>
            <button type="button" class="btn btn-warning">Suspicious Transaction Report - Non Individual 可疑交易报告 - 非个人</button>
            <button type="button" class="btn btn-info">Suspicious Transaction Report - Legal Arrangement 可疑交易报告 - 法律安排</button>
        </div>
    </div>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');

        function toggleSidebar() {
            sidebar.classList.toggle('show');
        }

        menuBtn.addEventListener('click', toggleSidebar);
    </script>
</body>

</html>