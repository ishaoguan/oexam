<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/bootstrap.css">
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/nut/Public/assets/myStyle/tips.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/peskin.css" />
    <script src="/nut/Public/assets/javascripts/jquery.min.js" type="text/javascript"></script>
    <script src="/nut/Public/assets/javascripts/jquery-ui.js" type="text/javascript"></script>
    <script src="/nut/Public/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>

    <style type="text/css">
        .dropdown-menu > li > a:hover{
            text-decoration-color: blue;
            text-decoration-color: blue;
            text-decoration-color: blue;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="navbar navbar-fixed-top " >
    <div class="container-fluid top-bar" style="background-color: #f8f8f8;" >
        <div class="pull-right" >
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img width="34" height="34" src="/nut/Public/Upload/<?php echo (session('pic')); ?>" /><?php echo (session('user')); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu" style="background-color: #dedede" >
                        <li><a href="<?php echo U('Userinfo/index');?>?id=<?php echo (session('sid')); ?>">
                            <i class="icon-user"></i>个人信息</a>
                        </li>
                        <li><a href="<?php echo U('Changepassword/index');?>">
                            <i class="icon-gear"></i>修改密码</a>
                        </li>
                        <li><a href="<?php echo U('Login/logout');?>">
                            <i class="icon-signout"></i>退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <img src="/nut/Public/assets/images/试题.jpg" width="45px" height="45px"  style="position: relative;margin-left:20px" alt="" />
    </div>
</div>

<div class="container-fluid" style="margin-top: 60px" >
    <div class="row-fluid">
        <div class="main">
            <div class="box itembox" style="margin-bottom:0px;">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo U('Student/testlist');?>">首页</a></li>
                        <li class="active">搜索结果</li>
                    </ol>
                </div>
            </div>
            <div class="box itembox">
                <h4 class="title" style="padding: 0 20px;">考 试</h4>
                <div class="alert alert-info">
                    <ul class="list-unstyled">
                        <li><b>1、</b>点击考试名称按钮进入答题界面，考试开始计时。</li>
                        <li><b>2、</b>在随机考试过程中，您可以通过顶部的考试时间来掌握自己的做题时间。</li>
                        <li><b>3、</b>提交试卷后，可以通过“查看答案和解析”功能进行总结学习。</li>
                        <li><b>4、</b>系统自动记录模拟考试的考试记录，学员考试结束后可以进入“答题记录”功能进行查看。</li>
                    </ul>
                </div>
                <blockquote>
                    <p>
                        试卷信息
                    </p>
                </blockquote>
                <div class="alert alert-info">
                    <ul class="list-unstyled">
                        <?php if(is_array($tips)): $i = 0; $__LIST__ = $tips;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><b>试卷名：</b><a href="<?php echo U('Test/paper');?>?id=<?php echo ($v["pid"]); ?>" onclick="return confirm('你确定参加考试吗？')" style="margin-left: 10px; text-decoration: underline"><?php echo ($v["pname"]); ?></a><b style="margin-left: 5%"> 发布人：</b><?php echo ($v["aname"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
</body>
</html>