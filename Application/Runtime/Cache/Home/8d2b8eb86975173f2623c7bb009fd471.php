<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>cover</title>
    <link rel="stylesheet" href="/gallery/Public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/gallery/Public/css/bootstrap.min.css">
    <style>
        .a1{
            position: absolute;
            bottom: 27%;
            left: 30%;
            width: 50%;
            height: 10%;
        }
        .a2{
            position: absolute;
            bottom: 15%;
            left: 30%;
            width: 50%;
            height: 10%;
        }
        img{
            width: 70%;
        }
    </style>
</head>
<body onmousewheel="return false;">
    <div class="content animated fadeInDown">
        <div class="c1 row-sx-12 col-sx-12">
            <img src="/gallery/Public/img/cover.jpg" style="width: 100%;height: auto">
        </div>
        <div>
            <a class="a1 animated bounceIn" href="../Mainpage/main.html"><img src="/gallery/Public/img/icon-1.png"></a>
            <a class="a2 animated bounceIn" href="../Mainpage/gamePT.html"><img src="/gallery/Public/img/icon-2.png"></a>
        </div>
    </div>

    <script type="text/javascript" src="/gallery/Public/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/gallery/Public/js/bootstrap.min.js"></script>
</body>
</html>