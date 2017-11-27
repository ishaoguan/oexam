<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=utf-8" />
    <title>oexam-修改密码</title>
    <link rel="stylesheet" href="/nut/Public/assets/css/xunlei.css">
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
</head>
<body>
<div class="wp_res">
    <div class="main_res png">
        <p style="font-size: x-large;font-family: 微软雅黑;text-align: center;position: relative;top: 80px;">修改密码</p>
        <form  method=post  action="<?php echo U(change);?>" style="position: relative;top:140px" enctype="multipart/form-data"  >
            <div class="form-group" >
                <label for="exampleInputPassword1" style="position: relative;width:90px; height:20px;left: 175px;display: table-cell; font-size: large; font-family: 微软雅黑 ">旧密码</label>
                <div style="display: table-cell" >
                    <input type="password" name="o_password" class="form-control"  style="position: relative;width:240px; height:40px;left: 160px;" id="exampleInputPassword1" placeholder="旧密码" required>
                </div>
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword2" style="position: relative;width:90px; height:20px;left: 175px;display: table-cell; font-size: large; font-family: 微软雅黑 ">新密码</label>
                <div style="display: table-cell" >
                    <input type="password" name="n1_password" class="form-control"  style="position: relative;width:240px; height:40px;left: 160px;" id="exampleInputPassword2" placeholder="新密码" required>
                </div>
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword3" style="position: relative;width:90px; height:20px;left: 150px;display: table-cell; font-size: large; font-family: 微软雅黑 ">确认新密码</label>
                <div style="display: table-cell" >
                    <input type="password" name="n2_password" class="form-control"  style="position: relative;width:240px; height:40px;left: 160px;" id="exampleInputPassword3" placeholder="确认密码" required>
                </div>
            </div>
            <div class="form-group">
                <div  style="position: relative;width:60px; height:20px;left: 180px;top: 40px; font-size: large; font-family: 微软雅黑 ">
                    <input type="submit" class="btn btn-info" value="提&nbsp;&nbsp;交"  style="display: table-cell;position: relative;width: 90px;font-family: 微软雅黑">
                    <input type="reset" class="btn btn-danger" value="重&nbsp;&nbsp;置" style="display: table-cell;position: relative;left: 230px;top:-30px;width: 90px;font-family: 微软雅黑">
                </div>
            </div>
        </form>
    </div>
    <div class="light png"></div>
</div>
</body>
</html>