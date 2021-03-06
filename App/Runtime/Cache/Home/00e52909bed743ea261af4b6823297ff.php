<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->

<head>


    <title>oexam-在线考试系统</title>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/nut/Public/assets/i/favicon.png">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/nut/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="/nut/Public/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileImage" content="/nut/Public/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/nut/Public/assets/css/amazeui.min.css" rel="stylesheet" type="text/css" />
    <link href="/nut/Public/assets/css/app.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <nav class="am-g am-g-fixed blog-fixed blog-nav">
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse " id="blog-collapse">
      <ul class="am-nav am-nav-pills am-topbar-nav index_header_ul">
        <li class="am-dropdown" data-am-dropdown>
          <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
            登录 <span class="am-icon-caret-down"></span>
          </a>
          <ul class="am-dropdown-content">
            <li><a href="<?php echo U('Login/index');?>">学生登录</a></li>
            <li><a href="<?php echo U('Admin/Index/index');?>">教师登录</a></li>
          </ul>
        </li>
        <li class="am-dropdown" data-am-dropdown>
          <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
            注册 <span class="am-icon-caret-down"></span>
          </a>
          <ul class="am-dropdown-content">
            <li><a href="<?php echo U('Register/index');?>">学生注册</a></li>
            <li><a href="<?php echo U('Register/index_t');?>">教师注册</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
      <div class="am-u-sm-8 am-u-sm-centered index_logo am-animation-slide-top">
          <img  width="200" src="/nut/Public/assets/img/试题.jpg" alt="Logo"/>
          <h2 class="am-hide-sm-only">普通话测试系统</h2>
      </div>
  </header>
  <!-- banner start -->
  <div class="am-g am-g-fixed blog-fixed am-u-sm-centered">
      <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
      <ul class="am-slides">
        <li>
              <img src="/nut/Public/assets/i/b1.jpg">
              <div class="blog-slider-desc am-slider-desc ">
                  <div class="blog-text-center blog-slider-con">
                      <h1 class="blog-h-margin"><a href="">普通话</a></h1>
                      <p>普通话，情感的纽带，沟通的桥梁。
                      </p>
                      <span class="blog-bor">2015/10/9</span>
                      <br><br><br><br><br><br><br>
                  </div>
              </div>
        </li>
        <li>
              <img src="/nut/Public/assets/i/b2.jpg">
              <div class="am-slider-desc blog-slider-desc">
                  <div class="blog-text-center blog-slider-con">
                      <h1 class="blog-h-margin"><a href="">普通话</a></h1>
                      <p>沟通——从普通话开始。
                      </p>
                      <span>2015/10/9</span>
                  </div>
              </div>
        </li>
        <li>
              <img src="/nut/Public/assets/i/b3.jpg">
              <div class="am-slider-desc blog-slider-desc">
                  <div class="blog-text-center blog-slider-con">
                      <h1 class="blog-h-margin"><a href="">普通话</a></h1>
                      <p>普通话是我们的校园语言。
                      </p>
                      <span>2015/10/9</span>
                  </div>
              </div>
        </li>
        <li>
              <img src="/nut/Public/assets/i/b2.jpg">
              <div class="am-slider-desc blog-slider-desc">
                  <div class="blog-text-center blog-slider-con">
                      <span><a href="" class="blog-color">Article &nbsp;</a></span>
                      <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                      <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                      </p>
                      <span>2015/10/9</span>
                  </div>
              </div>
        </li>
      </ul>
      </div>
  </div>
  <!-- banner end -->
  <script type="text/javascript" src="/nut/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/nut/Public/assets/js/amazeui.min.js"></script>
</body>
</html>