<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<FORM method="post" action="/chat/thinkphp_3.2.3_full/index.php/Home/Chat/insert" enctype="multipart/form-data">
    <div >
        <input type="text"  placeholder="昵称"  name="username">
    </div>
    <div >
        <input type="password"  placeholder="请输入密码"  name="password">
    </div>
    <div >
        <input type="password"  placeholder="请再次输入密码"  name="password1">
    </div>
    <div >
        <input type="file"  name="image"/>
    </div>
    <br>
    <button type="submit">注 册</button>

    <p class="text-muted text-center"><small>已经有账户了？</small><a href="login.html">点此登录</a>
    </p>
</form>
</body>
</html>