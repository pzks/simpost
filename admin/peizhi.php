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

<?php
$sa = file_get_contents("../config/p_config.php");
echo '<textarea rows="15" cols="40" name="p_config_read" >'.$sa.'</textarea>';

?>

<body>
</html>

<?php
include './foot.php';
?>

<?php
include './panduan.php';
?>