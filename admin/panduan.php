<?php
$user=$_COOKIE['key'];
$sf=file_get_contents("../data/".$user."/sf.txt");
if($sf=="u")
{
echo '
<script language="JavaScript">
swal({
  title: "没有权限查看本页面内容",
  text: "只有您是管理员后才有权限查看本页面内容，点击下面按钮跳转进入主页面",
  icon: "error",
  button: "主页面",
})
.then((willDelete) => {
    location.href="../index.php";
  }
);
</script>';
} else {
	echo '';
}
if($sf=="a")
{

/*echo '<script language="JavaScript">
swal({
  title: "欢迎回来！",
  text: "已经通过身份校验，确认身份为管理员，欢迎回到本页面",
  icon: "success",
  button: "确定",
})*/

</script>';
} else {
	echo '';
}
?>
