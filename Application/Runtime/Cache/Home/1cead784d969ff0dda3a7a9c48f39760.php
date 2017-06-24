<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>编辑</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/gallery/Public/css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css">
    <link href="/gallery/Public/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/gallery/Public/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/gallery/Public/js/jquery-2.2.3.min.js"></script>
    <script src="/gallery/Public/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="/gallery/Public/js/html2canvas.min.js"></script>
</head>
<body>
    <div data-role="page">
        <div data-role="header" data-position="fixed">
            <h1>编辑</h1>
            <a href="main.html" class="a_btn">返回</a>
            <a class="a_btn" id="saveBtn">截屏</a>
        </div>
        <div role="main" class = 'main' style="background-color: #000000">
                <canvas id="canvasa" class="canvass animated fadeIn" style="z-index: 3;position: absolute; ">
                    您的浏览器尚不支持canvas。
                </canvas>
            <canvas id="canvasb" class="canvass" style="display: none; z-index: 15;position: absolute">
                您的浏览器尚不支持canvas。
            </canvas>
        </div>
        <div data-role="footer" data-position="fixed">
               <span>效果：</span>
                <a href="javascript:greyEffect()" class="button animated bounce">单色</a>
                <a href="javascript:blackEffect()" class="button">黑白</a>
                <a href="javascript:reverseEffect()" class="button animated bounce">负片</a>
                <a href="javascript:blurEffect()" class="button">模糊</a>
                <a href="javascript:mosaicEffect()" class="button animated bounce">马赛克</a>
        </div>
    </div>


    <script>
    /**
     * 获取指定的URL参数值
     * URL:editPic.html?imgSrc=img/3.large.jpg&imgWidth=360&imgHeight=540
     * 参数：paramName URL参数
     * 调用方法:getParam("imgSrc")
     * 返回值:img/3.large.jpg
     */
    function getParam(paramName) {
        paramValue = "", isFound = !1;
        if (this.location.search.indexOf("?") == 0 && this.location.search.indexOf("=") > 1) {
            arrSource = unescape(this.location.search).substring(1, this.location.search.length).split("&"), i = 0;
            while (i < arrSource.length && !isFound) arrSource[i].indexOf("=") > 0 && arrSource[i].split("=")[0].toLowerCase() == paramName.toLowerCase() && (paramValue = arrSource[i].split("=")[1], isFound = !0), i++
        }
        return paramValue == "" && (paramValue = null), paramValue
    }
        var imgSrc = '/gallery/Public/'+ getParam('imgSrc');
        var imgWidth = getParam('imgWidth')+ 'px';
        var imgHeight = getParam('imgHeight')+ 'px';
        var paddingLeft = getParam('paddingLeft')+ 'px';
        var paddingTop = getParam('paddingTop') + 'px';
        var winWidth = $(window).width(),
            winHeight = $(window).height();

        $('.main').css('width',winWidth).css('height',winHeight)
        $('.canvass').css('height',imgHeight).css('width',imgWidth).css('background','black')

        var canvasa = document.getElementById('canvasa');
        var contexta = canvasa.getContext('2d');

        var canvasb = document.getElementById('canvasb');
        var contextb = canvasb.getContext('2d')

        var image = new Image();

        window.onload = function(){
            image.src = imgSrc;
            image.onload = function () {
                contexta.drawImage(image , 5 , 5,290,140)
            }
        }

        $('.button').tap(function (e) {
            $('#canvasb').css('display','block')
        })

    function greyEffect(){
        var imageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var pixelData = imageData.data

        for( var i = 0 ; i < canvasb.width * canvasb.height ; i++){
            var r = pixelData[4*i+0]
            var g = pixelData[4*i+1]
            var b = pixelData[4*i+2]
            //公式
            var grey = r*0.3 + g*0.59 +b*0.11
            pixelData[4*i+0] = grey
            pixelData[4*i+1] = grey
            pixelData[4*i+2] = grey
        }
        contextb.putImageData(imageData , 0 , 0 , 0 , 0 , canvasb.width , canvasb.height )
    }


    function blackEffect(){
        var imageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var pixelData = imageData.data

        for( var i = 0 ; i < canvasb.width * canvasb.height ; i++){
            var r = pixelData[4*i+0]
            var g = pixelData[4*i+1]
            var b = pixelData[4*i+2]
            //公式
            var grey = r*0.3 + g*0.59 +b*0.11
            if(grey > 255/2){
                v = 255
            }else{
                v = 0
            }
            pixelData[4*i+0] = v
            pixelData[4*i+1] = v
            pixelData[4*i+2] = v
        }
        contextb.putImageData(imageData , 0 , 0 , 0 , 0 , canvasb.width , canvasb.height )

    }

    function reverseEffect(){
        var imageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var pixelData = imageData.data

        for( var i = 0 ; i < canvasb.width * canvasb.height ; i++){
            var r = pixelData[4*i+0]
            var g = pixelData[4*i+1]
            var b = pixelData[4*i+2]

            pixelData[4*i+0] = 255 - r
            pixelData[4*i+1] = 255 - g
            pixelData[4*i+2] = 255 - b
        }
        contextb.putImageData(imageData , 0 , 0 , 0 , 0 , canvasb.width , canvasb.height )

    }

    function blurEffect(){
        var tmpImageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var tmpPixelData = tmpImageData.data

        var imageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var pixelData = imageData.data

        var blurR = 3
        var totalNum  = (2*blurR + 1)*(2*blurR + 1)
        for( var i = blurR ; i < canvasb.height - blurR; i ++ ){
            for( var j = blurR ; j < canvasb.width - blurR; j ++){

                var totalr = 0, totalg = 0, totalb = 0;
                for( var dx = -blurR ; dx <= blurR ; dx++){
                    for( var dy = -blurR ;dy <= blurR ;dy ++){
                        var x = i + dx
                        var y = j + dy

                        var p = x*canvasb.width + y
                        totalr += tmpPixelData[p*4+0]
                        totalg += tmpPixelData[p*4+1]
                        totalb += tmpPixelData[p*4+2]
                    }
                }

                var p = i * canvasb.width + j
                pixelData[p*4+0] = totalr / totalNum
                pixelData[p*4+1] = totalg / totalNum
                pixelData[p*4+2] = totalb / totalNum
            }
        }
        contextb.putImageData(imageData , 0 , 0 , 0 , 0 , canvasb.width , canvasb.height )
    }

    function mosaicEffect(){
        var tmpImageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var tmpPixelData = tmpImageData.data

        var imageData = contexta.getImageData( 0 , 0 , canvasa.width , canvasa.height)
        var pixelData = imageData.data

        var size = 16
        var totalNum = size*size
        for(var i = 0 ; i < canvasb.height ; i += size)
            for(var j = 0 ; j < canvasb.width ; j += size){

                var totalr = 0 , totalg = 0, totalb = 0
                for( var dx = 0 ; dx < size ; dx++)
                    for( var dy = 0 ; dy < size ; dy ++){

                        var x = i + dx
                        var y = j + dy

                        var p = x*canvasb.width + y
                        totalr += tmpPixelData[p*4+0]
                        totalg += tmpPixelData[p*4+1]
                        totalb += tmpPixelData[p*4+2]
                    }

                var p = i*canvasb.width + j
                var resr = totalr / totalNum
                var resg = totalg / totalNum
                var resb = totalb / totalNum

                for(var dx = 0 ; dx < size ; dx++)
                    for( var dy = 0 ; dy < size ; dy ++){

                        var x = i + dx
                        var y = j + dy

                        var p = x*canvasb.width + y
                        pixelData[p*4+0] = resr
                        pixelData[p*4+1] = resg
                        pixelData[p*4+2] = resb
                    }
            }
        contextb.putImageData(imageData , 0 , 0 , 0 , 0 , canvasb.width,canvasa.height)
    }

    ////save画布
    //function convertCanvasToImage(canvas) {
    //
    //    var image = new Image();
    //
    //    image.src = canvas.toDataURL(imgSrc);
    //
    //    return image;
    //
    //}


    /**
     * 在本地进行文件保存
     * @param  {String} data     要保存到本地的图片数据
     * @param  {String} filename 文件名
     */
    //var saveFile = function(data, filename){
    //    var save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
    //    save_link.href = data;
    //    save_link.download = filename;
    //
    //    var event = document.createEvent('MouseEvents');
    //    event.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
    //    save_link.dispatchEvent(event);
    //};

    //保存图片
    //$('#saveBtn').tap(function(e){
    //    var img = convertCanvasToImage(canvasb);
    //    alert('lalala');
    ////    alert( convertCanvasToImage(canvasb).src);
    ////        self.location=document.referrer;
    //    // 下载后的问题名
    //    var filename = imgSrc;
    //    // download
    //    saveFile(img,filename);

    //})
        $('#saveBtn').tap(function(e){
            html2canvas(canvasb, {
                onrendered: function(canvas) {
                    document.body.appendChild(canvas);
                    alert('截屏成功！~');
                }
            });
    //        html2canvas(canvasb).then(function(canvas) {
    //            canvas.id = 'screenshotCanvas';
    //            document.body.appendChild(canvas);
    //        });
        })

    </script>

</body>
</html>