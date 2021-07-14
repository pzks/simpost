<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登录</title>
    <link rel="stylesheet" href="./css/zui.min.css">
    <link rel="stylesheet" media="screen" href="css/style.css">
</head>
 
<body>
    <div id="particles-js"></div>
    <div class="panel" id="main-content">
        <div class="panel-heading" style="text-align: center; font-size: 18px;font-weight: bold;">
            管理平台
        </div>
        <div class="panel-body">
            <div class="input-group with-padding">
                <span class="input-group-addon">用户</span>
                <input type="text" class="form-control" placeholder="请输入用户">
            </div>
            <div class="input-group with-padding">
                <span class="input-group-addon">密码</span>
                <input type="password" class="form-control" placeholder="请输入密码">
            </div>
            <div class="input-group with-padding">
                <span class="input-group-addon">验证码</span>
                <input type="text" class="form-control" placeholder="请输入验证码">
                <span class="input-group-addon fix-border fix-padding"></span>
                <img src="./image/1.png" class="form-control">
            </div>
            <div class="with-padding">
                <button class="btn btn-block" style="background-color: #6097EE;color: white;font-size: 18px;font-weight: bold;" type="button">登录</button>
            </div>
        </div>
    </div>
    <!-- scripts -->
    <script src="./js/particles.js"></script>
    <script src="js/app.js"></script>
 
    <!-- stats.js -->
    <script src="js/lib/stats.js"></script>
    <script>
        var count_particles, stats, update;
        stats = new Stats;
        stats.setMode(0);
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.body.appendChild(stats.domElement);
        count_particles = document.querySelector('.js-count-particles');
        update = function() {
            stats.begin();
            stats.end();
            requestAnimationFrame(update);
        };
        requestAnimationFrame(update);
    </script>
</body>
<script src="./lib/jquery/jquery.js"></script>
<script src="./js/zui.min.js"></script>
</html>