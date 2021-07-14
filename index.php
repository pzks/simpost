<!-- 
文件描述 ：首页文件
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
<link href="css/zui.min.css" rel="stylesheet">
<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
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
<hr>
<div class="list">
<?php
$file = './tie/all.txt';

//判断是否存在
if (!is_file($file)) {
/*
//////////////////////
is_file函数的用法
//////////////////////
<?php
$file = "test.txt";
if(is_file($file))
  {
  echo ("$file is a regular file");
  }
else
  {
  echo ("$file is not a regular file");
  }
?>
*/

echo '<div align="center"><h3>空空如也~<h3></div>
<center><img src="image/kong.png" width="200px" height="200px" class="img-rounded" alt="kong"><center>';

} else {
//读取文件
$message = file_get_contents($file);
//转化为数组
$pieces = explode("<title>", $message);
$arrlength = count($pieces);
for ($x = 1; $x < $arrlength; $x++) {
$data = $pieces[$x];
//-------------------//
//截取标题
$title = strstr($data, '</title>', true);
//截取内容
$show = strstr(strstr($data, "<show>"), "</show>", true);
$show = str_replace("<show>", "", $show);
//截取昵称
$name = strstr(strstr($data, "<name>"), "</name>", true);
$name = str_replace("<name>", "", $name);
//截取时间
$time = strstr(strstr($data, "<time>"), "</time>", true);
$time = str_replace("<time>", "", $time);
//截取头像
$icon = strstr(strstr($data, "<icon>"), "</icon>", true);
$icon = str_replace("<icon>", "", $icon);
//截取tid
$code = strstr(strstr($data, "<code>"), "</code>", true);
$code = str_replace("<code>", "", $code);
//topic
$topic1 = strstr(strstr($data, "<topic1>"), "</topic1>", true);
$topic1 = str_replace("<topic1>", "", $topic1);
//topic
$topic2 = strstr(strstr($data, "<topic2>"), "</topic2>", true);
$topic2 = str_replace("<topic2>", "", $topic2);
//topic
$topic3 = strstr(strstr($data, "<topic3>"), "</topic3>", true);
$topic3 = str_replace("<topic3>", "", $topic3);
//-------------------//

//输出内容
echo '
<div class="card">
    <div class="item">
      <div class="item-heading">
        <h4><img width="50px" height="50px" class="img-thumbnail" src='.$icon.'><span class="label label-success">'.$topic1.'</span> <a href="./tie/index.php?tid='.$code.'">'.$title.'</a></h4>
      </div>
      <div class="item-footer">
        <br><a href="#" class="text-muted"><i class="icon-comments"></i> 文章ID:</a> &nbsp; <span class="text-muted">'.$code.'</span>
		<br><a href="#" class="text-muted"><i class="icon-comments"></i> 帖子作者:</a> &nbsp; <span class="text-muted">'.$name.'</span>
		<br><a href="#" class="text-muted"><i class="icon-comments"></i> 发帖时间:</a> &nbsp; <span class="text-muted">'.$time.'</span>
      </div>
    </div>
	</div>
';

}
}
?>
</div>
</div>
</body>
</html>