# **Simpost**

Simpost是由开发者pengzekai独自开发的一个开源的轻文章系统，可以进行处理一些简单的文章工作，V1.0历经六个月的开发[总天数26天]，已经拥有了许多基本功能，具体的可以看更新日志，其页面UI和布局设计为开发者自己手动编写，编写潦草，能力有限，还请各位使用者见谅！，使用本软件遵循木兰开源协议。

其主要的特点为不需要MySQL数据库的支持，只需要php支持就可以了，上传立即使用，十分方便。其数据存储形式采用TXT文本保存在本地空间，为保证其安全性，需要去confing目录修改p_config.php文件内容代码中`$pass_path = "./pass/".$user;`的`pass`为自己随意指定目录以保证用户密码安全性[后期会编写加密算法进行处理]

如需设置管理员可以到data目录，寻找指定用户，并修改sf.txt内容为a，tie目录的作用是存储帖子数据。

目前实现的功能有：登录，注册，发帖，用户评论，帖子ID控制，用户权限，金币设置，Markdown文章编辑器，移动端适配，前端markdown解释，用户注册统计，不完整的后台等功能。

### 使用到的项目

sweetalert弹窗：https://sweetalert.bootcss.com/
markdown编辑器：https://pandao.github.io/editor.md/
Strapdown.js解释器：https://github.com/arturadib/strapdown/
jquery前端：https://jquery.com/
openzui前端：http://www.openzui.com/

### 捐赠

如果你觉得对你有帮助的话可以考虑捐赠作者，谢谢！

### 图片集
![输入图片说明](https://images.gitee.com/uploads/images/2021/0715/182636_c1445e2b_4803184.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2021/0715/182703_2981fdba_4803184.png "屏幕截图.png")

![输入图片说明](https://images.gitee.com/uploads/images/2021/0715/182724_e56fc153_4803184.png "屏幕截图.png")

