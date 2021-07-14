<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIMPLEPOST - 个人中心 | 更轻便的文章系统</title>
<!-- zui -->
<link href="./css/zui.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="./js/zui.min.js"></script>
<script src="./js/sweetalert.min.js"></script>
</head>
<body>

<?php
//头部样式
include './header.php';
//----------------------
?>

<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$icon=file_get_contents("./data/".$user."/icon.txt");
echo '<center><img width="130px" height="130px" class="img-thumbnail" src='.$icon.'></center>';
?>
<div class="card">
<div class="title">昵称:<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$nc=file_get_contents("./data/".$user."/name.txt");
echo $nc;?>
</div>

<div class="title">QQ:<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$qq=file_get_contents("./data/".$user."/qq.txt");
echo $qq;?></div>

<div class="title">金币:<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$glod=file_get_contents("./data/".$user."/glod.txt");
echo $glod;?></div>

<div class="title">权限:<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$sf=file_get_contents("./data/".$user."/sf.txt");
if($sf=="u")
{
	echo '普通用户';
} else {
	echo '';
}
if($sf=="a")
{
	echo '管理员<a href="./admin/">>>>进入管理后台<<<</a>';
} else {
	echo '';
}
?></div>

<div class="card">
<div class="title">我的帖子:</div>
<?php
$user=$_COOKIE['key'];
header("content-type:text/html;charset=utf-8");
$file = "./data/".$user."/mytie.txt";
if (!is_file($file)) {
echo '<div align="center"><h3>空空如也~<h3></div>
<center><img src="image/kong.png" width="200px" height="200px" class="img-rounded" alt="kong"><center>';
} else {
$message = file_get_contents($file);
//转化为数组
$pieces = explode("<title>", $message);
$arrlength = count($pieces);
for ($x = 1; $x < $arrlength; $x++) {
$data = $pieces[$x];
//标题
$title = strstr($data, '</title>', true);
//内容
$show = strstr(strstr($data, "<show>"), "</show>", true);
$show = str_replace("<show>", "", $show);
//昵称
$name = strstr(strstr($data, "<name>"), "</name>", true);
$name = str_replace("<name>", "", $name);
//时间
$time = strstr(strstr($data, "<time>"), "</time>", true);
$time = str_replace("<time>", "", $time);

//输出内容

echo '
<div class="card">
<header>
<h2><div>标题:'.$title.' </div></h2>
<article class="article">
</header>
<div>'.$show.' </div>
<div style="text-align:right;" ><span class="label label-warning">帖子作者:'.$name.'</span></div>
<div style="text-align:right;" ><span class="label label-primary">发帖时间:'.$time.'</span></div>
</article>
</div>';

}
}
?>
</div>
</div>
</body>
</html>

<?php
header("content-type:text/html;charset=utf-8");
$user=$_COOKIE['key'];
if($user==""){
echo '<script language="JavaScript">
swal({
  title: "请登录后查看",
  text: "只有您登录后才有权限查看本页面内容，点击下面按钮跳转登录",
  icon: "error",
  button: "登录",
})
.then((willDelete) => {
    location.href="./login.php";
  }
);
</script>';
}
?>
