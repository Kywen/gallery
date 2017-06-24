<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/gallery/Public/css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css">
    <link href="/gallery/Public/css/animate.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/gallery/Public/css/style.css">
</head>
<body>
    <div data-role="page">
        <div data-role="header" data-position="fixed">
            <h1>相册</h1>
            <a href="../Welcome/cover.html" class="a_btn" id ='backBtn' >返回</a>
            <a href="editPic.html" class="a_btn" id="edit_btn" style="display: none ">编辑</a>
        </div>
        <div role="main" class="main">
            <div class="large animated fadeInDown" id="large_container" style="display: none">
                <img id="large_img">
                <p class="tips" style="display: none"></p>
            </div>
            <ul class="img-container clearfix" id="container">
                <?php if(is_array($imgs)): $i = 0; $__LIST__ = $imgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id=<?php echo ($vo["id"]); ?> class="animated bounceIn">
                        <a href="#" title=<?php echo ($vo["title"]); ?>><img src="http://139.199.198.151:8000/img/gallery/photo/img/<?php echo ($vo["path"]); ?>" alt=<?php echo ($vo["title"]); ?>></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>                
            </ul>
        </div>
    </div>

    <script src="/gallery/Public/js/jquery-2.2.3.min.js"></script>
    <script src="/gallery/Public/js/jquery.mobile-1.4.5.min.js"></script>

    <script>
        var winWidth = $(window).width(),
                winHeight = $(window).height();
        var picWidth = (winWidth - 90) / 3;
        $('img').width(picWidth);
        $('img').height(picWidth);
        var cid;
        var wImage = $('#large_img');
        var domImage = wImage[0];
        var tips = $('.tips');
        var doTips = tips[0];
        var getVal = -1;
        var imgWidth;
        var imgHeight;
        var paddingLeft;
        var paddingTop;

        var loadImg = function (id, callback) {
            $('.a_btn').show();
            $('#backBtn').hide();

    //        $('#container').css({height:winHeight,'overflow':'hidden'})
            $('#large_container').css({
                width: winWidth,
                height: winHeight
                //top:$(window).scrollTop()
            });
            var imgsrc = 'http://139.199.198.151:8000/img/gallery/photo/img/' + id + '.large.jpg';
            getVal = imgsrc;
            getVal2 = 'img/' + id + '.large.jpg';
            var ImageObj = new Image();
            ImageObj.src = imgsrc;
            ImageObj.onload = function () {
                $('#large_container').show();
                var w = this.width;
                var h = this.height;
                var realw = parseInt((winWidth - (winHeight+42.375) * w / h) / 2);
                var realh = parseInt((winHeight+42.375 - winWidth * h / w) / 2);
                wImage.css('width', 'auto').css('height', 'auto');
                wImage.css('padding-left', '0px').css('padding-top', '0px');
                if (h / w > 1.7) {
                    wImage.attr('src', imgsrc).css('height', winHeight+42.375).css('padding-left', realw + 'px');
                } else {
                    wImage.attr('src', imgsrc).css('width', winWidth).css('padding-top', realh + 'px');
                }
                imgWidth = wImage.width();
                imgHeight = wImage.height();
                paddingLeft = realw
                paddingTop = realh
                callback && callback();
            }
        }
        $('#container').delegate('li', 'tap', function () {
            var _id = cid = $(this).attr('data-id');
            loadImg(_id);
        });

        $('#large_container').tap(function (e) {
    //        $('#container').css({height:'auto','overflow':'auto'})
            $('#large_container').hide();
            $('#edit_btn').hide();
            $('#backBtn').show();
            e.stopPropagation();
            return false;
            getVal = -1;
        });
        $('#backBtn').tap(function (e) {
            $('#large_container').hide();
            $('#edit_btn').hide();
            e.stopPropagation();
            return false;
            getVal = -1;
        });
        $('#large_container').mousedown(function (e) {
            e.preventDefault();
        });
        $('#large_container').swipeleft(function () {
            cid++;
            if (cid > 17) {
                cid = 17;
                tips.text('到顶啦');
                tips.show(1000);
                setTimeout(function () {
                    tips.addClass('rotateOutDownLeft');
                }, 3000);
                doTips.addEventListener('webkitAnimationEnd', function () {
                    tips.removeClass('rotateOutDownLeft');
                    tips.hide();
                    doTips.removeEventListener('webkitAnimationEnd');
                }, false);
            } else {
                loadImg(cid, function () {
                    domImage.addEventListener('webkitAnimationEnd', function () {
                        wImage.removeClass('animated bounceInRight');
                        domImage.removeEventListener('webkitAnimationEnd');
                    }, false);
                    wImage.addClass('animated bounceInRight');
                });
            }
        }).swiperight(function () {
            cid--;
            if (cid < 1) {
                cid = 1;
                tips.text('这是第一张啊,前面没有啦');
                tips.show(1000);
                setTimeout(function () {
                    tips.addClass('rotateOutDownLeft');
                }, 3000);
                doTips.addEventListener('webkitAnimationEnd', function () {
                    tips.removeClass('rotateOutDownLeft');
                    tips.hide();
                    doTips.removeEventListener('webkitAnimationEnd');
                }, false);
            } else {
                loadImg(cid, function () {
                    domImage.addEventListener('webkitAnimationEnd', function () {
                        wImage.removeClass('animated bounceInLeft');
                        domImage.removeEventListener('webkitAnimationEnd');
                    }, false);
                    wImage.addClass('animated bounceInLeft');
                });
            }
        });

        $('#edit_btn').tap(function () {
            var url = 'editPic.html?imgSrc='+getVal2 + '&imgWidth=' + imgWidth + '&imgHeight=' + imgHeight
                    +'&paddingLeft='+paddingLeft + '&paddingTop=' + paddingTop;
           window.location.href = url;
        });

    </script>
</body>
</html>