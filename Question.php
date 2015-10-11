<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="SSEstylesheet.css">
</head>

<body>
<Center>
    <h1>Simple StackExchange</h1>
</Center>

<br>

<p>
<ul>
    The question topic goes here
</ul>
</p>


<Center>
    <script>
        var w = window.innerWidth;
        var h = window.innerHeight;
    </script>

    <canvas id="myCanvas" width="h+10" height="10" style="border:px solid #d3d3d3;">
        Your browser does not support the HTML5 canvas tag.</canvas>

    <script>

        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        var w = window.innerWidth;
        var h = window.innerHeight;
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(h+10, 0);
        ctx.stroke();

    </script>

    <br>




</Center>

<ul>
    the question goes here
</ul>

</body>
</html>
