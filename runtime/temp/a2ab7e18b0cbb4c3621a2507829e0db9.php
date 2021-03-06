<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\www\tp5\public/../application/admin\view\login\login.html";i:1502785127;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>后台主题框架</title>
    <meta name="keywords" content="成都紫平方信息科技">
    <meta name="description" content="成都紫平方信息科技">
    <link href="__admin_style__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__admin_style__/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__admin_style__/css/animate.min.css" rel="stylesheet">
    <link href="__admin_style__/css/style.min.css" rel="stylesheet">
    <link href="__admin_style__/css/login.min.css" rel="stylesheet">
    <!-- 验证 -->
     <link rel="stylesheet" href="__admin_style__/dist/css/bootstrapValidator.css"/>
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
                <form method="post" action="<?php echo url('login/login'); ?>" id="myform">
                    <?php echo token(); ?>
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到H+后台主题UI框架</p>
                    <div class="form-group">
                         <input type="text" class="form-control uname"  name ="user_name" placeholder="用户名" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control pword m-b"  name ="password" placeholder="密码" />
                    </div>
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


    <script src="__admin_style__/js/jquery.min.js?v=2.1.4"></script>
    <script src="__admin_style__/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="__admin_style__/dist/js/bootstrapValidator.js"></script>
    <script src="__admin_style__/js/plugins/layer/layer.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myform')
                .bootstrapValidator({
                    message: '登录数据验证',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        user_name: {
                            message: '账号',
                            validators: {
                                notEmpty: {
                                    message: '请输入账号'
                                },
                                stringLength: {
                                    min: 5,
                                    max: 24,
                                    message: '账号的长度在5-24个字符'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: '账号格式不正确'
                                }
                            }
                        },
                       
                        password: {
                            validators: {
                                notEmpty: {
                                    message: '请输入密码'
                                }
                                ,
                                stringLength: {
                                    min: 6,
                                    max: 18,
                                    message: '密码的长度在6-18个字符'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: '密码格式不正确'
                                }
                            }
                        }
                    }
                })
                .on('success.form.bv', function(e) {
                    // Prevent form submission
                    e.preventDefault();

                    // Get the form instance
                    var $form = $(e.target);

                    // Get the BootstrapValidator instance
                    var bv = $form.data('bootstrapValidator');

                    // 使用ajax提交
                    $.post($form.attr('action'), $form.serialize(), function(rs) {
                       if (rs.status == 0) {
                           window.location.href = "<?php echo url('index/index'); ?>";
                       }

                       layer.msg(rs.msg);
                        
                    }, 'json');
                });
        });
        </script>


</body>


</html>