<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta  charset=utf-8" />
    <title>mots-修改个人信息</title>
    <link rel="stylesheet" href="/nut/Public/assets/css/xunlei.css">
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
</head>
<body>
<div class="wp_res">
    <div class="main_res png">
        <p style="font-size: x-large;font-family: 微软雅黑;text-align: center;position: relative;top: 30px;">修改个人信息</p>
        <form  method=post  action="<?php echo U('Userinfo/update');?>" style="position: relative;top:60px" enctype="multipart/form-data"  >
            <div class="form-group" >
                <label for="exampleInputStudentName1" style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">姓名</label>
                <div style="display: table-cell" >
                    <input type="text" name="sname" class="form-control"  style="position: relative;width:240px; height:40px;left: 160px;" id="exampleInputStudentName1" value="<?php echo ($user['sname']); ?>" disabled >
                </div>
            </div>
            <div class="form-group" >
                <label   style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">性别</label>
                <div  style="position: relative;width:60px; height:7px;left: 180px;top: 5px; display: table-cell">
                    <label class="radio-inline" style="display: table-cell" id="gender">
                        <input type="radio" id="man" name="gender" value=0  <?php echo ($user['gender']==1?"":"checked"); ?>>男
                    </label>
                    <label class="radio-inline" style="display: table-cell;position:relative;left: 30px;">
                        <input type="radio" id="lady" name="gender" value=1  <?php echo ($user['gender']==1?"checked":""); ?>>女
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputBirthdate1"  style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">生日</label>
                <div style="display: table-cell" >
                    <input type="date" name="birthdate" class="form-control" value="<?php echo ($user['birthdate']); ?>"  style="position: relative;width:240px; height:35px;left: 160px;" id="exampleInputBirthdate1" required>
                </div>
            </div>
            <div class="form-group">
                <label style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">学历</label>
                <div style="display: table-cell">
                    <select  class="form-control" style="position: relative;width:240px; height:35px;left: 160px;" name="degree">
                        <option value="">请选择</option>
                        <option value=0 <?php echo ($user['degree']==0?"selected":""); ?> >小学</option>
                        <option value=1 <?php echo ($user['degree']==1?"selected":""); ?> >初中</option>
                        <option value=2 <?php echo ($user['degree']==2?"selected":""); ?> >高中</option>
                        <option value=3 <?php echo ($user['degree']==3?"selected":""); ?> >大学</option>
                        <option value=4 <?php echo ($user['degree']==4?"selected":""); ?> >研究生</option>
                        <option value=5 <?php echo ($user['degree']==5?"selected":""); ?> >博士生</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputTextarea1" style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">简介</label>
                <div style="display: table-cell">
                    <textarea class="form-control"  style="position: relative;width:240px; height:105px;left: 160px;" id="exampleInputTextarea1" name="intro"><?php echo ($user['intro']); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile" style="position: relative;width:60px; height:20px;left: 160px;display: table-cell; font-size: large; font-family: 微软雅黑 ">头像</label>
                <div style="display: table-cell">
                    <input type="file" name="pic"  style="position: relative;width:240px; height:40px;left: 160px;" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <div  style="position: relative;width:60px; height:20px;left: 160px; font-size: large; font-family: 微软雅黑 ">
                    <input type="submit" class="btn btn-info" value="提交"  style="display: table-cell;position: relative">
                    <input type="reset" class="btn btn-danger" value="重置" style="display: table-cell;position: relative;left: 260px;top:-30px">
                </div>
            </div>
        </form>
    </div>
    <div class="light png"></div>
</div>
</body>
</html>