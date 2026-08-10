<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #fafafa;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        .icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 10px;
        }

        h2 {
            margin: 10px 0;
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        @media (max-width: 696px) {
            .card {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon">✔</div>
        <h2>Created Successful</h2>
        <p>Information has been submitted successfully.</p>
    </div>
    <x-menu-sidebar></x-menu-sidebar>

</body>

</html>