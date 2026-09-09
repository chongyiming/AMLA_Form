<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if ($row->first()->status === "Submitted")
    <div class="position-fixed bottom-0 end-0 border rounded-circle p-3 bg-white"
        style="margin-right:20px;margin-bottom:20px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);cursor:pointer"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal-{{ $row->first()->form_id }}">
        <div class="position-relative d-inline">
            <img src="{{ asset('/folder.png') }}"
                style="width: 25px; height: 25px; cursor: pointer;">

            <span class="position-absolute top-0 start-100 translate-middle badge bg-success">
                {{$row->first()->image_count}}
            </span>
        </div>
    </div>
    @elseif ($row->first()->status === "New")
    <div class="position-fixed bottom-0 end-0 border rounded-circle p-3 bg-white"
        style="margin-right:20px;margin-bottom:20px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);cursor:pointer"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal-{{ $row->first()->form_id }}">

        <div class="position-relative d-inline">
            <img src="{{ asset('/folder.png') }}"
                style="width: 25px; height: 25px; cursor: pointer;">

            <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                {{ $row->first()->image_count }}
            </span>
        </div>
    </div>
    @endif
</body>

</html>