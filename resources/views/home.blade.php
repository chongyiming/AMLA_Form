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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">

</head>

<body>
    <div class="a4_container">
        <h1>{{ $branch->Branch_Code }} AMLA Form</h1>

        <h4>Choose the form:</h4>
        <div class="form-choice-box">

            <button type="button" class="btn btn-primary" onclick="window.location.href='/pdsp_customer_due_diligence_form'">Customer Due Diligence Form 客户尽职调查表表格_V3</button>
            <button type="button" class="btn btn-secondary">Customer Risk Profiling Form 顾客风险分析表格_V5</button>
            <button type="button" class="btn btn-success">Enhanced Customer Due Diligence Form 增强客户尽职调查表格_V2</button>
            <button type="button" class="btn btn-danger">Suspicious Transaction Report - Individual 可疑交易报告 - 个人</button>
            <button type="button" class="btn btn-warning">Suspicious Transaction Report - Non Individual 可疑交易报告 - 非个人</button>
            <button type="button" class="btn btn-info">Suspicious Transaction Report - Legal Arrangement 可疑交易报告 - 法律安排</button>
        </div>

    </div>



</body>


</html>