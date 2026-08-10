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
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;

        }
    </style>

</head>

<body>
    <div class="a4_container">
        <h1>{{ $branch->Branch_Code }} AMLA Form</h1>

        <h4>Choose the form:</h4>
        <div class="form-choice-box">
            <a href="{{ route('pdsp_customer_due_diligence_form') }}" class="form-choice" style="border: 1px solid #007bff;background-color:#007bff;color: white;">
                Customer Due Diligence Form 客户尽职调查表表格_V3
            </a>
            <a href="" class="form-choice" style="border: 1px solid #6c757d; background-color:#6c757d;color: white;">
                Customer Risk Profiling Form 顾客风险分析表格_V5
            </a>
            <a href="" class="form-choice" style="border: 1px solid #28a745;background-color:#28a745;color: white;">
                Enhanced Customer Due Diligence Form 增强客户尽职调查表格_V2
            </a>
            <a href="" class="form-choice" style="border: 1px solid #dc3545; background-color:#dc3545;color: white;">
                Suspicious Transaction Report - Individual 可疑交易报告 - 个人
            </a>
            <a href="" class="form-choice" style="border: 1px solid #ffc107; background-color:#ffc107;color: white;">
                Suspicious Transaction Report - Non Individual 可疑交易报告 - 非个人
            </a>
            <a href="" class="form-choice" style="border: 1px solid #17a2b8; background-color:#17a2b8;color: white;">
                Suspicious Transaction Report - Legal Arrangement 可疑交易报告 - 法律安排
            </a>
        </div>

    </div>




</body>

</html>