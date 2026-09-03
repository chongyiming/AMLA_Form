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

        .table {
            width: 100%;
            margin-top: 20px;
        }

        .header {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px
        }
    </style>
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('/form.png') }}">

</head>

<body>
    <x-menu-sidebar></x-menu-sidebar>
    <div class="header">
        <h1>{{ $branch->Branch_Code }} Customer Risk Profiling Form</h1>
        <button type="button" class="btn btn-outline-success" onclick="window.location.href = '/createRiskProfilingForm'">Create Form</button>


    </div>
    <div style="margin-top:10px;padding-left:20px;padding-right:20px;padding-bottom: 50px;">

        <div class="simple-pagination">
            {{ $forms->onEachSide(5)->links() }}
        </div>
        <x-searchable-table
            :columns="[
                [ 
                'label'=>'No',
                'placeholder'=>'No'
                ],
                [
                'field'=>'doc_no',
                'label'=>'Doc No',
                'placeholder'=>'Doc No'
                ],
                [
                'field'=>'trx_no',
                'label'=>'Trx No',
                'placeholder'=>'Trx No'
                ],
                [
                'field'=>'cust_name',
                'label'=>'Customer Name',
                'placeholder'=>'Customer Name'
                ],
                [
                'field'=>'prepared_name',
                'label'=>'Preparer Name',
                'placeholder'=>'Preparer Name'
                ],
                [
                'field'=>'created_date',
                'label'=>'Created Date',
                'placeholder'=>'Created Date'
                ],
                [
                'field'=>'status',
                'label'=>'Status',
                'placeholder'=>'Status'
                ],
                [
                'field'=>'reviewed_date',
                'label'=>'Review',
                'placeholder'=>'Review'
                ],
                [
                'field'=>'uuid',
                'label'=>'Attachment',
                'placeholder'=>'Attachment'
                ],
                [
                'label'=>'Action',
                'placeholder'=>'Action'
                ]
                ]"
            :rows="$forms"></x-searchable-table>

    </div>



</body>


</html>