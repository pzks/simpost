<!-- 
文件描述 ：发布系统
copyright (C) 2021 pengzekai
请尊重版权，本文件遵守何乐开源协议
 -->
<!DOCTYPE html>
<html lang="CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Simpost - 发布</title>
<!-- zui -->
<link href="css/zui.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="./little/markdown/css/editormd.min.css">

<!--
<script type="text/javascript" charset="utf8" src="./little/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" charset="utf8" src="./little/kindeditor/kindeditor/lang/zh-CN.js"></script>
<script type="text/javascript" charset="utf8" src="./little/kindeditor/kindeditor/config.js"></script>
<link rel="stylesheet" href="./little/kindeditor/themes/default/default.css" />
-->

<script src="js/sweetalert.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="js/zui.min.js"></script>
</head>
<body>

<?php
//头部样式
include './header.php';
//----------------------
?>

<div class="panel">
  <div class="panel-heading">
    温馨提示[TIPS]:
  </div>
  <div class="panel-body">
    发布帖子内容若为原创将受到国际CC4.0知识共享许可协议保护，主要为CC-BY-NC-SA的内容，禁止发布违规内容，一旦发现将进行封IP段处理！
  </div>
</div>

<form method="post">
<input class="form-control" style="width:200px;" type="text" placeholder="请输入标题" name="title"/>
<hr>
<!-- KindEditor富文本编辑器的调用 
<div>
    <center><textarea name="show">在这里发挥你的创作吧~~~~</textarea><center>
    <script>
        //简单模式初始化
        var editor;
		//初始化
        KindEditor.ready(function(K) {
		//使用绑定textarea的name为指定时才调用文本编辑器
            editor = K.create('textarea[name="show"]', {
                resizeType : 1,
                allowPreviewEmoticons : false,
                allowImageUpload : false,
                items : [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            });
        });
    </script>
</div>
KindEditor富文本编辑器的调用END -->

	<div id="md-content" style="z-index: 1 !important;">
	    <textarea name="show" ></textarea>
	</div>

    <!-- 这里必须先引入jquery -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.2/dist/jquery.min.js"></script>
	<!-- 引入js -->
	<script src="./little/markdown/editormd.min.js"></script>
	<script type="text/javascript">
       //初始化Markdown编辑器
	    var contentEditor;
	    $(function() {
	      contentEditor = editormd("md-content", {
	        width   : "100%",//宽度
	        height  : 500,//高度
	        syncScrolling : "single",//单滚动条
			  path    : "./little/markdown/lib/"//依赖的包路径
	      });
	    });
	</script>

<hr>
<div class="row">
  <div class="col-xs-4">
    <textarea class="form-control" rows="1" type="text" placeholder="#话题#" name="topic1"></textarea> 
  </div>
  <div class="col-xs-4">
    <textarea class="form-control" rows="1" type="text" placeholder="#话题#" name="topic2"></textarea> 
  </div>
  <div class="col-xs-4">
    <textarea class="form-control" rows="1" type="text" placeholder="#话题#" name="topic3"></textarea> 
  </div>
</div>
<input type="submit" class="btn btn-primary" name="submit" value="提交发布"/>
</div>
</form>
</body>

</html>

<?php
//获取内容
$title = $_POST["title"];
$edit = $_POST["show"];
$user = $_COOKIE['key'];
$topic1 = $_POST["topic1"];
$topic2 = $_POST["topic2"];
$topic3 = $_POST["topic3"];
//===========================
if($_POST["submit"])
{
if($user==""){
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
}
else if($edit==null){
echo '<script language="JavaScript">
swal({
  title: "文章内容未输入",
  text: "只有您输入文章内容后才可以发布本文章",
  icon: "error",
  button: "确定",
});
</script>';
}
else if($topic1==null){
echo '<script language="JavaScript">
swal({
  title: "话题未输入",
  text: "只有您输入话题后才可以发布本文章",
  icon: "error",
  button: "确定",
});
</script>';
}
else if($title==null){
echo '<script language="JavaScript">
swal({
  title: "话题未输入",
  text: "只有您输入话题后才可以发布本文章",
  icon: "error",
  button: "确定",
});
</script>';
}
else{
//获取文件内容
$id=md5(uniqid());
$alltie=file_get_contents("./tie/all.txt");
$icon=file_get_contents("./data/".$user."/icon.txt");
$center=file_get_contents("./data/".$user."/mytie.txt");
$name=file_get_contents("./data/".$user."/name.txt");
//$tie=file_get_contents("./tie/".$id."/tie.txt");
//赋值
$time = date("Y年m月d日-H:i");
$all="<title>".$title."</title>\n <show>".$edit."</show>\n <icon>".$icon."</icon>\n <name>".$name."</name>\n <time>".$time."</time>\n <code>".$id."</code> <topic1>".$topic1."</topic1> <topic2>".$topic1."</topic2> <topic3>".$topic1."</topic3>\n\n".$alltie;
$mytie="<title>".$title."</title>\n<show>".$edit."</show>\n <icon>".$icon."</icon>\n <name>".$name."</name>\n <time>".$time."</time>\n <code>".$id."</code> <topic1>".$topic1."</topic1> <topic2>".$topic1."</topic2> <topic3>".$topic1."</topic3>\n\n".$center;
$tie="<title>".$title."</title>\n <show>".$edit."</show>\n <icon>".$icon."</icon>\n <name>".$name."</name>\n <time>".$time."</time>\n <code>".$id."</code> <topic1>".$topic1."</topic1> <topic2>".$topic1."</topic2> <topic3>".$topic1."</topic3>\n\n".$tie;
$markdown = $edit;
//写入文件
file_put_contents("./tie/all.txt",$all);
mkdir("./tie/".$id,0777,true);
file_put_contents("./tie/".$id."/all.txt",$tie);
file_put_contents("./data/".$user."/mytie.txt",$mytie);
file_put_contents("./tie/".$id."/markdown.md",$markdown);
//copy("./tie/tie.php","./tie/".$id."/index.php");
copy("./tie/lun.txt","./tie/".$id."/lun.txt");
echo '<script language="JavaScript">
swal({
  title: "文章发布成功",
  text: "您的文章已经发布成功\n您可以在首页看到这篇文章的全部！",
  icon: "success",
  button: "确定",
})
.then((willDelete) => {
    location.href="./index.php";
  }
);
</script>';
}
}
?>