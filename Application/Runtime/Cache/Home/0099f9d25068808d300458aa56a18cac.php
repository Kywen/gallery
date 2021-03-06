<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>瓜壳相册</title>
    <link rel="stylesheet" href="/gallery/Public/css/idangerous.swiper.css">
    <link rel="stylesheet" type="text/css" href="/gallery/Public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/gallery/Public/css/animate.css">
    <style>
        img{
            width: 100%;height:30%;
        }
        body{
            background-repeat: no-repeat;
            height: 100%;
            background-color: #C5C1AA;
        }
    </style>
</head>

<body onmousewheel="return false;">
    <div class="swiper-container ">
        <div class="swiper-wrapper ">
            <div class="swiper-slide row-sx-12 col-sx-12  animated fadeIn"><img src="/gallery/Public/img/first.jpg"></div>
            <div class="swiper-slide row-sx-12 col-sx-12"><img src="/gallery/Public/img/second.jpg"></div>
            <div class="swiper-slide row-sx-12 col-sx-12"><img src="/gallery/Public/img/third.jpg"></div>
            <a class="swiper-slide row-sx-12 col-sx-12" href="cover.html">
                <img src="/gallery/Public/img/fourth.jpg" id="img4">
            </a>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination"></div>
    </div>

    <script src="/gallery/Public/js/jquery-2.2.3.min.js"></script>
    <script src="/gallery/Public/js/idangerous.swiper.min.js"></script>
    <script>
        var winWidth = $(window).width,
                winHeight = $(window).height;
        $('.swiper-container').width = winWidth;
        $('.swiper-container').height = winHeight;
        var mySwiper = new Swiper ('.swiper-container', {
            direction: 'vertical',
            loop: false,
            // 如果需要分页器
            pagination: '.swiper-pagination'
        })
    </script>
</body>
</html>