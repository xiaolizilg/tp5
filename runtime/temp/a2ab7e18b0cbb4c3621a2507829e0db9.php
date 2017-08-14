<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\www\tp5\public/../application/admin\view\login\login.html";i:1502697783;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="成都紫平方信息科技">
    <meta name="description" content="成都紫平方信息科技">
    <link href="__admin_style__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css" rel="stylesheet">
    <link href="__admin_style__/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            
            <div class="col-sm-12 ">
                <form method="post" action="<?php echo url('login/login'); ?>">
                    <?php echo token(); ?>
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到H+后台主题UI框架</p>
                    <input type="text" class="form-control uname"  name ="user_name" placeholder="用户名" />
                    <input type="password" class="form-control pword m-b"  name ="password" placeholder="密码" />
                    <a href="">忘记密码了？</a>
                    <button class="btn btn-success btn-block" type="submit">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2015 All Rights Reserved. H+
            </div>
        </div>
    </div>
</body>

</html>