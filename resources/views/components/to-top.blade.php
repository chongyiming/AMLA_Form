<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="#" class="position-fixed bottom-0 end-0 border rounded-circle p-4 d-none" style="margin-right:20px;margin-bottom:120px;box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);cursor:pointer" id="to-top">
        <img src=" {{ asset('up-arrows.png') }}" style="width: 25px;height: 25px;">
    </a>
</body>
<script>
    const toTop = document.getElementById("to-top");
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 100) {
            toTop.classList.remove("d-none");

        } else {
            toTop.classList.add("d-none")
        }
    })
</script>

</html>