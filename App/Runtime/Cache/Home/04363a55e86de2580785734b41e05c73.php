<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>学生注册</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">


  <link href="/nut/Public/assets/css/amazeui.min.css" rel="stylesheet" type="text/css" />
  <link href="/nut/Public/assets/css/app.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header>
  <div>
    <a href="<?php echo U('Index/index');?>" class="log-header">dddd</a>
  </div>
  <div class="log-re">
    <a href="<?php echo U('Login/index');?>"><button type="button" class="am-btn am-btn-default am-radius log-button" >登录</button></a>
  </div>
</header>

<div class="log">
  <div class="am-g">
  <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
    <h1 class="log-title am-animation-slide-top">学生注册</h1>
    <br>
    <form class="am-form" id="log-form" method=post  action="<?php echo U('add');?>" enctype="multipart/form-data">
      <div class="am-input-group am-radius am-animation-slide-left">
        <input type="text"  class="am-radius" name="sname" data-validation-message="请输入正确账号" placeholder="账号" required/>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>
      <div class="am-input-group am-animation-slide-left">
        <input type="password" class="am-form-field am-radius log-input" name="password" placeholder="密码" minlength="3" required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>
      <div class="am-input-group am-animation-slide-left">
        <input type="text" class="am-form-field am-radius log-input" name="studentid" placeholder="学号" minlength="11" required>
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>
      <div class="am-input-group am-animation-slide-left">
        <input type="text" class="am-form-field am-radius log-input" name="intro" placeholder="简介">
        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
      </div>
      <br>
      <div class="am-form-group am-form-file am-animation-slide-left">
          <button type="button" class="am-btn am-btn-default am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 选择要上传的头像</button>
        <input type="file"  name="pic" id="doc-ipt-file-2" required>
      </div>
      <br>
      <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay">注 册</button>
    </form>
  </div>
  </div>
</div>



<!--[if (gte IE 9)|!(IE)]><!-->
<script type="text/javascript" src="/nut/Public/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/nut/Public/assets/js/amazeui.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/nut/Public/assets/js/app.js"></script>
</body>
</html>