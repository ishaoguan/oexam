<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mots-后台管理</title>
    
<link rel="stylesheet" type="text/css" href="/nut/Public/assets/css/default.css"  rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/nut/Public/assets/css/component.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.css"   media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/style.css"  media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/font-awesome.css"  media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/main.css"  media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/theme.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/MoneAdmin.css"   media="all" rel="stylesheet" type="text/css"/>

<script src="/nut/Public/assets/js/modernizr.custom.js"></script>
<script src="/nut/Public/assets/javascripts/jquery.min.js" type="text/javascript"></script>
<script src="/nut/Public/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="navbar navbar-fixed-top "  >
    <div class="container-fluid top-bar" style="background-color: #f8f8f8;" >
        <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#"  >
                    <img width="34" height="34" src="/nut/Public/Upload/<?php echo (session('pict')); ?>" /><?php echo (session('tname')); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Index/logout');?>">
                            <i class="icon-signout"></i> 退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <img src="/nut/Public/assets/images/试题.jpg" width="45px" height="45px" style="position: relative;margin-left:20px" alt="" />
    </div>
</div>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"  style="margin-top: 46px" id="cbp-spmenu-s1">
    <h3>Menu</h3>
    <a href="<?php echo U('Type/form');?>"   >添加试题类别</a>
    <a href="<?php echo U('Type/typelist');?>" target="_blank">查看试题类别</a>
</nav>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right"  style="margin-top: 46px"  id="cbp-spmenu-s2">
    <h3>Menu</h3>
    <a href="<?php echo U('Test/index');?>" target="_blank">添加试卷</a>
    <a href="<?php echo U('Painfo/painfolist');?>" target="_blank">查看试卷列表</a>
</nav>


<div class="container" >
    <header class="clearfix" style="position: relative; left: 32px;">
        <h1 style="position: relative;left:30%;color:#47a3da ;font-family: 微软雅黑">欢迎<?php echo (session('admin')); ?>管理者来到MOTS在线考试系统</h1>
    </header>
    <div class="main" style="margin-top: 50px">
        <section style="margin-left: 50px">
            <button id="showLeft" style="font-family: 微软雅黑;font-size: 20px">题库管理</button>
            <button id="showRight" style="font-family: 微软雅黑;font-size: 20px">试卷管理</button>
        </section>
    </div>
</div>
<div style="position: relative;left: 60%;top: -250px;">
    <a href="<?php echo U('Test/index');?>"><img src="/nut/Public/assets/images/试题1.png" width="240px" height="240px" alt=""></a>
    <br>
    <a href="<?php echo U('Test/index');?>" style="position: relative;left:60px;top:20px; color: #47a3da; font-family: 微软雅黑;font-size: 30px">生成试卷</a>
</div>
<script src="/nut/Public/assets/js/classie.js"></script>
<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            menuRight = document.getElementById( 'cbp-spmenu-s2' ),
            menuTop = document.getElementById( 'cbp-spmenu-s3' ),
            menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
            showLeft = document.getElementById( 'showLeft' ),
            showRight = document.getElementById( 'showRight' ),
            showTop = document.getElementById( 'showTop' ),
            showBottom = document.getElementById( 'showBottom' ),
            body = document.body;

    showLeft.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeft' );
    };
    showRight.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
        disableOther( 'showRight' );
    };
    showTop.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuTop, 'cbp-spmenu-open' );
        disableOther( 'showTop' );
    };
    showBottom.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuBottom, 'cbp-spmenu-open' );
        disableOther( 'showBottom' );
    };
    function disableOther( button ) {
        if( button !== 'showLeft' ) {
            classie.toggle( showLeft, 'disabled' );
        }
        if( button !== 'showRight' ) {
            classie.toggle( showRight, 'disabled' );
        }
        if( button !== 'showTop' ) {
            classie.toggle( showTop, 'disabled' );
        }
        if( button !== 'showBottom' ) {
            classie.toggle( showBottom, 'disabled' );
        }
    }
</script>
</body>
</html>