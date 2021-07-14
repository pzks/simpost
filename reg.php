<!-- 
文件描述 ：注册
copyright (C) 2021 pengzekai
请尊重版权，本文件遵守何乐开源协议
 -->
<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="css/zui.min.css" rel="stylesheet">
<script src="js/sweetalert.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
 <script src="js/zui.min.js"></script>
</head>
<body>
<?php
//头部样式
include './header.php';
//----------------------
?>
<div class="container-fixed-xs">
<div class="card">
<h2><center>用户注册</center></h2>
<form method="post">
<div class="title">账号:</div>
<div class="input-control has-icon-left">
  <input type="text" id="inputAccountExample1" class="form-control" name="user" placeholder="请输入账号"/>
  <label for="inputAccountExample1" class="input-control-icon-left"><i class="icon icon-user "></i></label>
</div>
<div class="title">密码:</div>
<div class="input-control has-icon-left">
  <input id="inputPasswordExample1" type="password"  class="form-control" name="pass" placeholder="请输入密码">
  <label for="inputPasswordExample1" class="input-control-icon-left"><i class="icon icon-key"></i></label>
</div>
<div class="title">昵称:</div>
<div class="input-control has-icon-left">
  <input type="text" id="inputAccountExample1" class="form-control" name="name" placeholder="请输入账号"/>
  <label for="inputAccountExample1" class="input-control-icon-left"><i class="icon icon-user "></i></label>
</div>
<div class="title">QQ邮箱:</div>
<div class="input-control has-icon-left has-icon-right">
  <input id="inputEmailExample1" type="email" class="form-control" name="qq" placeholder="请输入Email">
  <label for="inputEmailExample1" class="input-control-icon-left"><i class="icon icon-envelope "></i></label>
  <label for="inputEmailExample1" class="input-control-icon-right"><i class="icon icon-check"></i></label>
  </br>
</div><center><input type="submit" name="submit" class="btn btn-primary" value="注册用户"/></div>
</div>
</div>
</div>
</form>
</div>
</body>
</html>
<?php
$user_number = "./data/user_number.txt";
if(file_exists($user_number)) {
} else {
	$user_number_first = "1";
	file_put_contents($user_number,$user_number_first);
}
?>
<?php
header("content-type:text/html;charset=utf-8");
//获取内容
$user=$_POST["user"];
$pass=$_POST["pass"];
$name=$_POST["name"];
$qq=$_POST["qq"];
if($_POST["submit"]) {
	if(file_exists("./data/".$user)) {
		echo '<script language="JavaScript">
swal({
  title: "账号已存在",
  text: "账号已存在,请更换或登录！",
  icon: "error",
  button: "确定",
});
</script>';
	} else if($user=="") {
		echo '<script language="JavaScript">
swal({
  title: "请输入账号",
  text: "只有您输入账号后才可以完成注册",
  icon: "error",
  button: "确定",
});
</script>';
	} else if($pass=="") {
		echo '<script language="JavaScript">
swal({
  title: "请输入密码",
  text: "只有您输入密码后才可以完成注册",
  icon: "error",
  button: "确定",
});
</script>';
	} else if($name=="") {
		echo '<script language="JavaScript">
swal({
  title: "请输入昵称",
  text: "只有您输入昵称后才可以完成注册",
  icon: "error",
  button: "确定",
});
</script>';
	} else if($qq=="") {
		echo '<script language="JavaScript">
swal({
  title: "请输入QQ",
  text: "只有您输入QQ号后才可以完成注册",
  icon: "error",
  button: "确定",
});
</script>';
	} else if(file_exists("./data/".$user)) {
		echo '<script language="JavaScript">
swal({
  title: "账号已存在",
  text: "账号已存在，请更换后重新注册",
  icon: "error",
  button: "确定",
});
</script>';
	} else {
		$userr="./data/".$user;
		include './config/p_config.php';
		mkdir($userr,0777,true);
		mkdir($pass_path,0777,true);
		//创建用户目录
		$mainkey=$pass_path."/mainkey.txt";
		file_put_contents($mainkey,$pass);
		$qqh=$userr."/qq.txt";
		file_put_contents($qqh,$qq);
		$name_file=$userr."/name.txt";
		file_put_contents($name_file,$name);
		$icon="http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=".$qq."&src_uin=www.qqjike.com&fid=blog&spec=640";
		$tx_file=$userr."/icon.txt";
		file_put_contents($tx_file,$icon);
		$glod=$userr."/glod.txt";
		file_put_contents($glod,$reg_glod);
		$sf=$userr."/sf.txt";
		file_put_contents($sf,$sf_user);
		$a2 = file_get_contents("./data/user_number.txt");
		$a1 = $a2 + 1;
		$user_number_add = "./data/user_number.txt";
		file_put_contents($user_number_add,$a1);

echo '<script language="JavaScript">
swal({
  title: "注册成功",
  text: "您的账号已经创建成功\n您可以在登录页登录和在首页发布帖子！",
  icon: "success",
  button: "确定",
})
.then((willDelete) => {
    location.href="./login.php";
  }
);
</script>';

	}
}
?>