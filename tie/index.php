<!-- 
文件描述 ：帖子系统
copyright (C) 2021 pengzekai
请尊重版权，本文件遵守何乐开源协议
 -->
<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simpost - 更轻便的文章系统</title>
<!-- zui -->
<link href="../../css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://cdn.bootcss.com/pagedown/1.0/Markdown.Converter.js"></script>
<script src="https://cdn.bootcss.com/showdown/1.3.0/showdown.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="../../js/zui.min.js"></script>
<script src="../../js/sweetalert.min.js"></script>
</head>
<body>
<?php
//头部样式
include '../header.php';
//----------------------
?>
<div class="list">
<?php
$tid = $_GET["tid"];
$file = './'.$tid.'/all.txt';
$file2 = './'.$tid.'/lun.txt';
//判断是否存在
if (!is_file($file)) {
	echo '<div align="center"><h3>空空如也~<h3></div>
<center><img src="image/kong.png" width="200px" height="200px" class="img-rounded" alt="kong"><center>';
} else {
	//读取文件
	$message = file_get_contents($file);
	$message2 = file_get_contents($file2);
	//转化为数组
	$pieces = explode("<title>", $message);
	$pieces2 = explode("<pinglun>", $message2);
	$arrlength = count($pieces);
	$arrlength2 = count($pieces2);
	for ($x = 1; $x < $arrlength; $x++) {
		$data = $pieces[$x];
		//-------------------//
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
		//头像
		$icon = strstr(strstr($data, "<icon>"), "</icon>", true);
		$icon = str_replace("<icon>", "", $icon);
		//tid
		$code = strstr(strstr($data, "<code>"), "</code>", true);
		$code = str_replace("<code>", "", $code);
		//-------------------//
		//输出内容
		echo '
<div class="card">
<div id="section">
<img width="100px" height="100px" class="img-thumbnail" src='.$icon.'>
</div>
<div id="user">
<div style="text-align:right;" ><span class="label label-warning">帖子作者:'.$name.'</span></div>
<div style="text-align:right;" ><span class="label label-primary label-outline">文章ID:'.$code.'</span></div>
<div style="text-align:right;" ><span class="label label-primary">发帖时间:'.$time.'</span></div>
</div>
<style type="text/css">
#section {
    width:160px;
	height:130px;
    float:left;
}
#user {
	height:130px;
}
</style>

<h1><div>'.$title.' </div></h1>
<div>
<article style="display:none;">
'.$show.'
</article >
</div>
<div id="out">
</div>

<div>
';
	}

echo '
<div class="alert alert-inverse">
  <i class="icon-ok-sign"></i>
  <div class="content">发布帖子内容若为原创将受到国际CC4.0知识共享许可协议保护，主要为CC-BY-NC-SA的内容，禁止发布违规内容，一旦发现将进行封IP段处理！</div>
</div>
';
	for ($x = 1; $x < $arrlength2; $x++) {
		$data2 = $pieces2[$x];
		//-------------------//
		//评论
		$title2 = strstr($data2, '</pinglun>', true);
		$pingicon = strstr(strstr($data2, "<pingicon>"), "</pingicon>", true);
		$pingicon = str_replace("<pingicon>", "", $pingicon);
		$pingname = strstr(strstr($data2, "<pingname>"), "</pingname>", true);
		$pingname = str_replace("<pingname>", "", $pingname);
		$pingtime = strstr(strstr($data2, "<pingtime>"), "</pingtime>", true);
		$pingtime = str_replace("<pingtime>", "", $pingtime);
		//-------------------//
		echo '
<div class="card">
<div class="comment">
  <a class="avatar">
    <img src='.$pingicon.' width="45px" height="45px" class="img-thumbnail">
  </a>
  <div class="content">
    <div class="pull-right text-muted">'.$pingtime.'</div>
    <div><a href="###"><strong>'.$pingname.'</strong></a> <span class="text-muted">回复</span> <a href="###">'.$name.'</a></div>
    <div class="text">'.$title2.'</div>
    <div class="actions">
    </div>
  </div>
</div>
</div>
</div>';
	}
}
?>

<script type="text/javascript">
    var target = document.querySelector("article")
    var c = new Markdown.Converter()
    var html = c.makeHtml(document.querySelector("article").innerText)
    document.getElementById('out').innerHTML = html
</script>


<form method="post">
<textarea type="text" class="form-control" name="pinglunneirong">发表你的评论吧</textarea>
<input type="submit" class="btn btn-primary" name="submit" value="提交发布"/>
</form>
<?php
//获取内容
$edit1 = $_POST["pinglunneirong"];
$user1 = $_COOKIE['key'];
$tid = $_GET["tid"];
//===========================
if($_POST["submit"]) {
	if($user1=="") {
		echo '<script language="JavaScript">
swal({
  title: "登录后您才能发布帖子",
  text: "只有您登录后您才能发布帖子，请登录",
  icon: "error",
  button: "确定",
})
.then((willDelete) => {
    location.href="./login.php";
  }
);
</script>';
	} else {
		//获取文件内容
		$alltie1=file_get_contents("./".$tid."/lun.txt");
		$icon1=file_get_contents("../data/".$user1."/icon.txt");
		$name1=file_get_contents("../data/".$user1."/name.txt");
		//赋值
		$time1 = date("Y年m月d日-H:i");
		$al1="".$alltie1."<pinglun>".$edit1."</pinglun>\n <pingicon>".$icon1."</pingicon>\n <pingname>".$name1."</pingname>\n <pingtime>".$time1."</pingtime>\n\n";
		//写入文件
		file_put_contents("./".$tid."/lun.txt",$al1);
		echo '<script language="JavaScript">
swal({
  title: "评论发布成功",
  text: "您的评论已经发布成功\n您可以在帖子下看到评论的全部！",
  icon: "success",
  button: "确定",
})
</script>';
	}
}
?>
</div>
</div>
</body>
</html>