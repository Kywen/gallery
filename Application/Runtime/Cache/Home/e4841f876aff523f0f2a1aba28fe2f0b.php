<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>好友列表</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style type="text/css">
    td{

    }
</style>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="300" height="550" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#3399FF">
    <div align="center">
    <form name="form1" method="post" action="/chat/thinkphp_3.2.3_full/index.php/Home/Chat/friend">
    <tr>
        <td align="center" > <img src="<?php echo ($data["c_img"]); ?>" width="80" height="100">&nbsp;<?php echo ($data["c_user"]); ?></td>
    </tr>
    <tr>
        <td height="450" bgcolor="#FFFFFF"><div align="">好友列表：</div></td>
    </tr>
    </form>
    </div>
</table>
</body>
</html>