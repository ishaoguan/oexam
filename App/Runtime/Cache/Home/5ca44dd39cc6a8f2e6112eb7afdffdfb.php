<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Expires" CONTENT="0">
    <meta http-equiv="Cache-Control" CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Pragma" CONTENT="no-cache">

    <title>普通话测试系统</title>

    <link href="/nut/Public/assets/css/index2012.css" rel="stylesheet" type="text/css" />
<script src="/nut/Public/assets/javascript/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>



<script src="/nut/Public/assets/javascript/common.js" type="text/javascript" language="javascript"></script>
<script src="/nut/Public/assets/javascript/user.common.js" type="text/javascript" language="javascript"></script>
<script src="/nut/Public/assets/javascript/float.0.1.js" type="text/javascript" language="javascript"></script>
<link href="/nut/Public/assets/myStyle/search.css" rel="stylesheet" type="text/css" />
<!--<link href="/nut/Public/assets/css/stu2012.css" rel="stylesheet" type="text/css" />-->

<link rel="stylesheet" href="/nut/Public/assets/css/notice.min.css">
    <script src="/nut/Public/assets/javascripts/jquery.min.js" type="text/javascript"></script>
<script src="/nut/Public/assets/javascripts/jquery-ui.js" type="text/javascript"></script>
<script src="/nut/Public/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
<script src="/nut/Public/assets/javascripts/modernizr.custom.js" type="text/javascript"></script>
<script src="/nut/Public/assets/javascripts/main.js" type="text/javascript"></script>

<link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/theme.css" media="all" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/nut/Public/assets/css/default.css" />
<link rel="stylesheet" type="text/css" href="/nut/Public/assets/css/component.css" />
<link rel="stylesheet" href="/nut/Public/assets/stylesheets/main.css" />
<link rel="stylesheet" href="/nut/Public/assets/css/MoneAdmin.css" />
<link rel="stylesheet" href="/nut/Public/assets/css/font-awesome.css" />
    <style>
        body{
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 14px;margin:0 auto;padding:0;
            word-wrap:break-word;
            color: black;
        }
    </style>
    <style>

        .pages a,.pages span {
            display:inline-block;
            padding:2px 5px;
            margin:0 1px;
            border:1px solid #f0f0f0;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
        }
        .pages a,.pages li {
            display:inline-block;
            list-style: none;
            text-decoration:none; color:#58A0D3;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#50A8E6;
        }
        .pages span.current{
            background:#50A8E6;
            color:#FFF;
            font-weight:700;
            border-color:#50A8E6;
        }
    </style>
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


<div id="st_pigai" >
    <a name="top"></a>

    <div id="searchRegId" >
        <form class="search_form fl" method="get" action="<?php echo U('Test/tips');?>" >
            <div class="sf_left"> </div>
            <div class="sf_middle">
                <input type="text"name="code" class="sf_txt sf_new" placeholder="请输入试卷码" >
            </div>
            <div class="sf_right" >
                <button class="sf_bt"  id="sf_bt" >搜 索</button>
            </div>
            <div style="clear:both;"></div>
        </form>

        <div style="clear:both;"></div>

    </div>
    <div id="pigaiV4" >
        <div   class="tbMenu2010 liauto">
            <ul>
                <li class="select  showST">
                    <span><a href="#">试题</a></span>
                </li>
            </ul>
        </div>

        <div class="ydTable"  >
            <ul class="reItemM"  style="margin-bottom: 0">
                <li style="width:80px;" class="ft">试卷码</li>
                <li style="width:400px;">试卷题目</li>
                <li style="width:100px;">结束时间</li>
                <li style="width:100px;">提交时间</li>
                <li >考试时长</li>
                <li >成绩</li>
                <li >操作</li>
                <div style="clear:both"></div>
            </ul>
            <div class="line" style="background-color:#d9d9d9;height:1px;"></div>
            <?php if(is_array($painfolist)): $i = 0; $__LIST__ = $painfolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="reItemS"  style="margin-bottom: 0">


                    <li style="width:80px;" class="ft"><?php echo ($vo['code']); ?></li>
                    <li style="width:400px;text-align:left">
                        <a href="<?php echo U('Student/info');?>?id=<?php echo ($vo['gid']); ?>" ><?php echo ($vo["pname"]); ?></a></li>
                    <li style="width:100px;"><?php echo ($vo["endtime"]); ?></li>
                    <li style="width:100px;"><?php echo ($vo["subtime"]); ?></li>
                    <li><?php echo ($vo["totaltime"]); ?></li>
                    <li><?php echo ($vo["score"]); ?></li>
                    <li><a href="<?php echo U('Student/delgrade');?>?id=<?php echo ($vo['gid']); ?>" onclick="return confirm('你确定要删除吗？')">删除</a>|<a href="<?php echo U('Student/error');?>?id=<?php echo ($vo['gid']); ?>" >查看错题</a></li>

                    <div style="clear:both"></div>

                </ul><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="pages">
                <?php echo ($link); ?>
            </div>
            <div class="line spv4line"  ></div>
            <div class="line" style="background-color:#d9d9d9;height:1px;"></div>
        </div>
    </div>

    <!-- end write -->


</div>




</body>

</html>