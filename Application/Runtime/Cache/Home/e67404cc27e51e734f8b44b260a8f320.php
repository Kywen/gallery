<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<FORM method="post" action="/chat/thinkphp_3.2.3_full/index.php/Home/Test/addzxun"  enctype="multipart/form-data">
    <div >
        <input type="test"  placeholder="标题"  name="title">
    </div>
    <div >
        <input type="text"  placeholder="内容" name="context">
    </div>
    <div>
        <input type="file"  name="image"/>
    </div>
    <button type="submit" >发布</button>
</form>
</body>
</html>