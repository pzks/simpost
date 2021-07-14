<!-- 
文件描述 ：登录模块
copyright (C) 2021 pengzekai
请尊重版权，本文件遵守何乐开源协议
 -->
<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIMPLEPOST - 更轻便的文章系统</title>
<!-- zui -->
<link href="css/zui.min.css" rel="stylesheet">
<link href="css/drag.css" rel="stylesheet" type="text/css"/>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/drag.js" type="text/javascript"></script>
<!-- ZUI Javascript组件 -->
<script src="js/zui.min.js"></script>
<script src="js/sweetalert.min.js"></script>
</head>
<body>
<?php
//头部样式
include './header.php';
//----------------------
?>
<div class="container-fixed-xs">
<div class="card">
<h2><center>用户登录</center></h2>
<h3><center>Loing In And Post</center></h3>
<form method="post">
<div class="card">
<div class="title">账号</div>
<div class="input-control has-icon-left">
  <input type="text" id="inputAccountExample1" class="form-control" name="user" placeholder="请输入账号"/>
  <label for="inputAccountExample1" class="input-control-icon-left"><i class="icon icon-user "></i></label>
</div>
</div>
<div class="card">
<div class="title">密码</div>
<div class="input-control has-icon-left">
  <input id="inputPasswordExample1" type="password"  class="form-control" name="pass" placeholder="请输入密码">
  <label for="inputPasswordExample1" class="input-control-icon-left"><i class="icon icon-key"></i></label>
</div>
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
        <h4 class="modal-title">用户隐私授权协议</h4>
      </div>
      <div class="modal-body">
        <p>

		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">保存</button>
    </div>
    </div>
  </div>
</div>
<p></p>
<center><input type="submit" name="submit" class="btn btn-primary" value="登录"/>&nbsp;&nbsp;<a class="btn btn-primary" href="./reg.php">注册</a>
<div align="right"><p><button type="button" class="btn btn-link" data-moveable="true" data-toggle="modal" data-target="#myModal">《用户隐私授权协议》</button></p><div>
</div>
</div>
</div>
</div>
</form>
</div>
</body>
</html>
<?php
//获取内容
$user=$_POST["user"];
$pass=$_POST["pass"];
if($_POST["submit"])
{
if($user=="")
{
echo '<script language="JavaScript">;alert("请输入账号！");</script>;';
//账号为空
}
else if($pass=="")
{
echo '<script language="JavaScript">;alert("请输入密码！");</script>';
//密码为空
}
else if(file_exists("./data/".$user))
{
include './config/p_config.php';
$password=file_get_contents($pass_path."/mainkey.txt");
if($password==$pass)
{
//$tx="./data/".$user."/icon.txt";
//$qqh="./data/".$user."/qq.txt";
//$icon="http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=".$qq."&src_uin=www.qqjike.com&fid=blog&spec=640";
//$qq=file_get_contents($qqh);
//file_put_contents($tx,$icon);
$time=1*60*60*24*365;
setcookie("key",$user,time()+$time);
echo '<script language="JavaScript">;alert("登录成功！");location.href="./index.php";</script>';
}
else{
echo '<script language="JavaScript">;alert("密码错误！");</script>';
}
}
else{
echo '<script language="JavaScript">;alert("用户不存在！");</script>';
}
}
?>