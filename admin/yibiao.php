<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Simpost - 后台管理</title>
<!-- zui -->
<link href="../css/zui.min.css" rel="stylesheet">
<script src="../../js/zui.min.js"></script>
<script src="../../js/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="../little/markdown/css/editormd.min.css">
</head>
<body>

<?php
//头部样式
include './header.php';
//----------------------
?>

<div class="panel">
  <div class="panel-body">

<?php
$user_number = file_get_contents("../data/user_number.txt");
echo '本站用户注册总数：'.$user_number.'';
?>
  </div>
</div>

<body>
</html>

<?php
include './foot.php';
?>

<?php
include './panduan.php';
?>