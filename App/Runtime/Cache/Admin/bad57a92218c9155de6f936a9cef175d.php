<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>oexam-添加题库</title>
    
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


<div style="width: 100%;padding: 4% 15%" >
    <h2 style="min-width: 130px; color: #03c2f9; margin-bottom: 0px;padding-bottom: 0px;">添加题库</h2>
    <h4 style="min-width: 150px"><p class="bg-info" style="margin-top:0px ;padding:10px" ><a href="<?php echo U('Teacher/index');?>" style="color: white">首页&nbsp;</a>/&nbsp;添加题库</p></h4>
</div>
<div style="width: 100%;padding: 0 25%"><p style="min-width:130px; font-size: 18px;font-family: 微软雅黑">请填写题库信息</p></div>

    <form  method="post" action="<?php echo U('Type/add');?>" style="width: 100%;padding: 0 25%" enctype="multipart/form-data"  >
        <div  class="form-group" style="padding:0 25% " >
            <label for="tiku" class=" control-label" style="min-width: 56px;vertical-align:middle;display:table-cell;" >题库名：</label>
            <div  style="display: table-cell" >
                <input type="text" class="form-control"  name="tiku" style="width: auto"  id="tiku" required>
            </div>
        </div>
        <div class="form-group" style="padding:0 15% 0 24% " >
            <label for="exampleInputText5" style="min-width: 70px;vertical-align:middle;display:table-cell;" class=" control-label">上传文件：</label>
            <div  style="display: table-cell;" >
                <input type="file"  name="file" style="width: 165px;" class="form-control" id="exampleInputText5">
            </div>
        </div>
        <div class="form-group" style="padding:20px 0 " >
            <div  style="width: inherit;padding: 0 15%">
                <a  href="/nut/Public/download/question.xlsx" style="" type="submit" class="btn btn-danger">下载模板</a>
                <input type="submit" class="btn btn-info" style="width:80px; position: relative;left: 38%;" value="添    加">
            </div>
        </div>
    </form>
</body>
</html>


</body>
</html>