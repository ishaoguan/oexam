<?php if (!defined('THINK_PATH')) exit();?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mots-生成试卷</title>


    
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

    <link href="/nut/Public/assets/css/login1.css" rel="stylesheet"/>

    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/main.css">
    <script src="/nut/Public/assets/js/jquery-1.9.1.js"></script>
    <link href="/nut/Public/assets/css/msgbox.css" rel="stylesheet"/>

    <script src="/nut/Public/assets/js/msgbox.js"></script>



</head>
<body>
<div class="mainarea">
    <div class="wrap-login">
        <div class="centerpart">
            <div class="tips"><span></span></div>
            <div class="content">
                <div class="l">
                    <div class="innercon">
                        <h1 style="text-align: center">手动生成试卷</h1>

                    </div>
                    <img title="点击图片生成试卷" data-toggle="modal" data-target="#man"  src="/nut/Public/assets/images/me.jpg" width="300px" height="300px" style="position: relative;left:100px" />

                </div>
                <div class="r">
                    <div class="innercon">
                        <h1 style="text-align: center">自动生成试卷</h1>

                    </div>
                        <img title="点击图片生成试卷" data-toggle="modal" data-target="#auto" src="/nut/Public/assets/images/auto.jpg" width="300px" height="300px" style="position: relative;left:100px" />
                    <div class="customerservice">
                        <a href="<?php echo U('Teacher/index');?>"><span class="ftsty-3" style="position: relative;left:170px" >返回首页</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--自动生成试卷模态框-->
<div class="modal fade bs-example-modal-sm" id="auto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="margin-top: 8%">

    <div class="modal-sm"  style="z-index: 1050; width: auto;padding: 10px;margin-right: auto;margin-left: auto;right: auto;left: 50%;width: 600px;padding-top: 30px;padding-bottom: 30px;">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header"
                 style="padding-bottom:0px; border-bottom:0px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span class=""
                          style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                <form action="<?php echo U('Test/autose');?>" method="post" enctype="multipart/form-data" >
                    <div style="margin-top:70px;margin-bottom:10px">
                        <label   style="display: table-cell;position: relative;left: 150px;font-family: 微软雅黑" >试卷类别</label>
                        <div  style="display: table-cell" >
                            <select  style="text-align: center; border-radius: 4px;width: 180px; height: 30px; font-size: 15px;position: relative;left: 176px;font-family: 微软雅黑" name="typeid" id="typeid">

                            </select>
                        </div>
                    </div>
                    <script  type="text/javascript">
                        $("#typeid").ready(function () {

                            $.ajax({
                                url: "<?php echo U('Test/get');?>",
                                cache: false,
                                dataType: 'json',
                                success:function (data) {
                                    var arr=eval(data);
                                    var str="";
                                    for(var i=0;i<arr.length;i++)
                                    {
                                        if(i==0){
                                                $.ajax({
                                                    url: "<?php echo U('Test/num');?>",
                                                    data: {typeid: arr[i]['typeid']},
                                                    type: 'post',
                                                    cache: false,
                                                    dataType: 'json',
                                                    success: function (a) {
                                                        $('#snum').attr('placeholder','请输入单选题数量(小于'+a.snum+')');
                                                        $('#dnum').attr('placeholder','请输入单选题数量(小于'+a.dnum+')');
                                                        $('#jnum').attr('placeholder','请输入单选题数量(小于'+a.jnum+')');
                                                    }
                                                });
                                        }
                                        var s='<option value="'+arr[i]['typeid']+'" >'+arr[i]['typename']+'</option>';
                                        str+=s;
                                    }
                                    $('#typeid').append(str);
                                }
                            });
                        })
                    </script>
                    <div style="margin-bottom:10px;">
                        <label for="pname"  style="display: table-cell;" ><p style="position: relative;left: 150px;font-family: 微软雅黑">试卷名称</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="pname" class="form-control" id="pname" placeholder="请输入试卷名称" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagpname" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script  type="text/javascript">
                        $("#typeid").click(function () {
                            $("#flagpname").removeAttr("class");
                            var typeid=$("#typeid").val();

                            var pname=$("#pname").val();

                            $.ajax({
                                url: "<?php echo U('Test/num');?>",
                                data: {typeid: typeid},
                                type: 'post',
                                cache: false,
                                dataType: 'json',
                                success: function (data) {

                                    $('#snum').attr('placeholder','请输入单选题数量(小于'+data.snum+')');
                                    $('#dnum').attr('placeholder','请输入单选题数量(小于'+data.dnum+')');
                                    $('#jnum').attr('placeholder','请输入单选题数量(小于'+data.jnum+')');
                                }
                            });

                            if(pname=="")
                                $('#flagpname').addClass('glyphicon glyphicon-remove');
                            else {
                                $.ajax({
                                    url: "<?php echo U('Test/check');?>",
                                    data: {typeid: typeid, pname: pname},
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data.flag) {
                                            $('#flagpname').addClass('glyphicon glyphicon-remove');
                                        }
                                        else {
                                            $('#flagpname').addClass('glyphicon glyphicon-ok');
                                        }
                                    }
                                });
                            }
                        });
                        $("#pname").blur(function () {
                            $("#flagpname").removeAttr("class");
                            var typeid=$("#typeid").val();
                            var pname=$("#pname").val();
                            if(pname=="")
                                $('#flagpname').addClass('glyphicon glyphicon-remove');
                            else {
                                $.ajax({
                                    url: "<?php echo U('Test/check');?>",
                                    data: {typeid: typeid, pname: pname},
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data.flag) {
                                            $('#flagpname').addClass('glyphicon glyphicon-remove');
                                        }
                                        else {
                                            $('#flagpname').addClass('glyphicon glyphicon-ok');
                                        }
                                    }
                                });
                            }

                        })
                    </script>
                    <div style="margin-bottom:10px">
                        <label for="snum"  style="display: table-cell" ><p style="position: relative;left: 150px;font-family: 微软雅黑">单选题数</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;;position: relative;left: 176px;font-family: 微软雅黑" name="snum" class="form-control" id="snum" placeholder="请输入单选题数量" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagsnum" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        $('#snum').blur(function(){
                            var snum=$("#snum").val();
                            $("#flagsnum").removeAttr("class");
                            if(snum.match(/^[0-9]*$/)&&snum!="")
                            {
                                $('#flagsnum').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagsnum').addClass('glyphicon glyphicon-remove');
                            }
                        })
                    </script>

                    <div style="margin-bottom:10px">
                        <label  for="dnum"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">多选题数</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;;position: relative;left: 176px;font-family: 微软雅黑" name="dnum" class="form-control" id="dnum" placeholder="请输入多选题数量" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagdnum" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        $('#dnum').blur(function(){
                            var dnum=$("#dnum").val();
                            $("#flagdnum").removeAttr("class");
                            if(dnum.match(/^[0-9]*$/)&&dnum!="")
                            {
                                $('#flagdnum').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagdnum').addClass('glyphicon glyphicon-remove');
                            }
                        })
                    </script>


                    <div style="margin-bottom:10px">
                        <label  for="jnum"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">判断题数</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;;position: relative;left: 176px;font-family: 微软雅黑" name="jnum" class="form-control" id="jnum" placeholder="请输入判断题数量" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagjnum" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        $('#jnum').blur(function(){
//                            2016-10-10 12:13:10
                            var jnum=$("#jnum").val();
                            $("#flagjnum").removeAttr("class");
                            if(jnum.match(/^[0-9]*$/)&&jnum!="")
                            {
                                $('#flagjnum').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagjnum').addClass('glyphicon glyphicon-remove');
                            }
                        })
                    </script>
                    <div style="margin-bottom:10px">
                        <label for="totaltime"  style="display: table-cell" ><p style="position: relative;left: 150px;font-family: 微软雅黑">考试时长</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;;position: relative;left: 176px;font-family: 微软雅黑" name="totaltime" class="form-control" id="totaltime" placeholder="请输入考试时长（分钟）" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagtotaltime" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        $('#totaltime').blur(function(){
//                            2016-10-10 12:13:10
                            var totaltime=$("#totaltime").val();
                            $("#flagtotaltime").removeAttr("class");
                            if(totaltime.match(/^[0-9]*$/)&&totaltime!="")
                            {
                                $('#flagtotaltime').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagtotaltime').addClass('glyphicon glyphicon-remove');
                            }
                        })
                    </script>

                    <div style="margin-bottom:10px">
                    <label  for="examtime"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">开始时间</p></label>
                    <div  style="display: table-cell"  >
                        <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="examtime" class="form-control" id="examtime" placeholder="时间格式:Y-m-d H:i:s" required>
                    </div>
                    <div  style="display: table-cell">
                        <span id="flagexamtime" style="position: relative;left: 200px;" ></span>
                    </div>
                </div>
                    <div style="margin-bottom:10px">
                        <label  for="endtime"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">结束时间</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="endtime" class="form-control" id="endtime" placeholder="时间格式:Y-m-d H:i:s" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagendtime" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        function check(time){
                            //time==0 now   1 end
//                            2016-10-10 12:13:10
                            if(0==time){
                            var examtime=$("#examtime").val();
                         //   alert(examtime);
                            $("#flagexamtime").removeAttr("class");
                            if(examtime.match(/^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/))
                            {
                                $('#flagexamtime').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagexamtime').addClass('glyphicon glyphicon-remove');
//                                        .removeClass('glyphicon glyphicon-ok');
                            }
                            }else{
                                var endtime=$("#endtime").val();
                                //   alert(examtime);
                                $("#flagendtime").removeAttr("class");
                                if(endtime.match(/^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/))
                                {
                                    $('#flagendtime').addClass('glyphicon glyphicon-ok');
                                }
                                else {
                                    $('#flagendtime').addClass('glyphicon glyphicon-remove');
//                                        .removeClass('glyphicon glyphicon-ok');
                                }
                            }
                        }
                        function getTime(time){
                            //time==0 now   1 end
                            var date = new Date();
                            var seperator1 = "-";
                            var seperator2 = ":";
                            var month = date.getMonth() + 1;
                            var strDate = date.getDate();
                            if (month >= 1 && month <= 9) {
                                month = "0" + month;
                            }
                            if(1==time)
                                ++strDate;
                            if (strDate >= 0 && strDate <= 9) {
                                strDate = "0" + strDate;
                            }
                            var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
                                    + " " + date.getHours() + seperator2 + date.getMinutes()
                                    + seperator2 + date.getSeconds();
                          //  alert(currentdate);
                            return currentdate;
                        }
                        $('#examtime').ready(function(){
                            $('#examtime').attr('value',getTime(0));
                            $('#examtime').blur(check(0));
                        });
                        $('#endtime').ready(function(){
                            $('#endtime').attr('value',getTime(1));
                            $('#endtime').blur(check(1));
                        });
                    </script>

                   <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:30px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="生成试卷">
                </form>
            </div>
        </div>
    </div>
</div>

<!--手动生成试卷模态框-->

<div class="modal fade bs-example-modal-sm" id="man" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="margin-top: 8%">

    <div class="modal-sm"  style="z-index: 1050; width: auto;padding: 10px;margin-right: auto;margin-left: auto;right: auto;left: 50%;width: 600px;padding-top: 30px;padding-bottom: 30px;">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header"
                 style="padding-bottom:0px; border-bottom:0px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span class=""
                          style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                <form action="<?php echo U('Test/manpaper');?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" value="">
                    <div style="margin-top:70px;margin-bottom:10px">
                        <label   style="display: table-cell;position: relative;left: 150px;font-family: 微软雅黑" >试卷类别</label>
                        <div  style="display: table-cell" >
                            <select  style="text-align: center; border-radius: 4px;width: 180px; height: 30px; font-size: 15px;position: relative;left: 176px;font-family: 微软雅黑" name="typeid_m" id="typeid_m">

                            </select>
                        </div>
                    </div>
                    <script  type="text/javascript">
                        $("#typeid_m").ready(function () {
                            $.ajax({
                                url: "<?php echo U('Test/get');?>",
                                cache: false,
                                dataType: 'json',
                                success:function (data) {
                                    var arr=eval(data);
                                    var str="";
                                    for(var i=0;i<arr.length;i++)
                                    {
                                        var s='<option value="'+arr[i]['typeid']+'" >'+arr[i]['typename']+'</option>';
                                        str+=s;
                                    }
                                    $('#typeid_m').append(str);
                                }
                            });
                        })
                    </script>
                    <div style="margin-bottom:10px;">
                        <label for="pname_m"  style="display: table-cell;" ><p style="position: relative;left: 150px;font-family: 微软雅黑">试卷名称</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="pname_m" class="form-control" id="pname_m" placeholder="请输入试卷名称" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagpname_m" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script  type="text/javascript">
                        $("#typeid_m").click(function () {
                            $("#flagpname_m").removeAttr("class");
                            var typeid_m=$("#typeid_m").val();

                            var pname_m=$("#pname_m").val();

                            if(pname_m=="")
                                $('#flagpname').addClass('glyphicon glyphicon-remove');
                            else {
                                $.ajax({
                                    url: "<?php echo U('Test/check');?>",
                                    data: {typeid: typeid_m, pname: pname_m},
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data.flag) {
                                            $('#flagpname').addClass('glyphicon glyphicon-remove');
                                        }
                                        else {
                                            $('#flagpname').addClass('glyphicon glyphicon-ok');
                                        }
                                    }
                                });
                            }
                        })
                        $("#pname_m").blur(function () {
                            $("#flagpname_m").removeAttr("class");
                            var typeid_m=$("#typeid_m").val();
                            var pname_m=$("#pname_m").val();
                            if(pname_m=="")
                                $('#flagpname_m').addClass('glyphicon glyphicon-remove');
                            else {
                                $.ajax({
                                    url: "<?php echo U('Test/check');?>",
                                    data: {typeid: typeid_m, pname: pname_m},
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        if (data.flag) {
                                            $('#flagpname_m').addClass('glyphicon glyphicon-remove');
                                        }
                                        else {
                                            $('#flagpname_m').addClass('glyphicon glyphicon-ok');
                                        }
                                    }
                                });
                            }

                        })
                    </script>
                    <div style="margin-bottom:10px">
                        <label for="totaltime_m"  style="display: table-cell" ><p style="position: relative;left: 150px;font-family: 微软雅黑">考试时长</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;;position: relative;left: 176px;font-family: 微软雅黑" name="totaltime_m" class="form-control" id="totaltime_m" placeholder="请输入考试时长（分钟）" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagtotaltime_m" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        $('#totaltime_m').blur(function(){
//                            2016-10-10 12:13:10
                            var totaltime_m=$("#totaltime_m").val();
//                           / alert(totaltime_m);
                            $("#flagtotaltime_m").removeAttr("class");
                            if(totaltime_m.match(/^[0-9]*$/)&&totaltime_m!="")
                            {
                                $('#flagtotaltime_m').addClass('glyphicon glyphicon-ok');
                            }
                            else {
                                $('#flagtotaltime_m').addClass('glyphicon glyphicon-remove');
                            }
                        })
                    </script>

                    <div style="margin-bottom:10px">
                        <label  for="examtime_m"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">开始时间</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="examtime_m" class="form-control" id="examtime_m" placeholder="时间格式:Y-m-d H:i:s" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagexamtime_m" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <div style="margin-bottom:10px">
                        <label  for="endtime_m"  style="display: table-cell"  ><p style="position: relative;left: 150px;font-family: 微软雅黑">结束时间</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="endtime_m" class="form-control" id="endtime_m" placeholder="时间格式:Y-m-d H:i:s" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagendtime_m" style="position: relative;left: 200px;" ></span>
                        </div>
                    </div>
                    <script>
                        function check_m(time){
                            //time==0 now   1 end
//                            2016-10-10 12:13:10
                            if(0==time){
                                var examtime=$("#examtime_m").val();

                                $("#flagexamtime_m").removeAttr("class");
                                if(examtime.match(/^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/))
                                {
                                    $('#flagexamtime_m').addClass('glyphicon glyphicon-ok');
                                }
                                else {
                                    $('#flagexamtime_m').addClass('glyphicon glyphicon-remove');

                                }
                            }else{
                                var endtime=$("#endtime_m").val();
                                //   alert(examtime);
                                $("#flagendtime_m").removeAttr("class");
                                if(endtime.match(/^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/))
                                {
                                    $('#flagendtime_m').addClass('glyphicon glyphicon-ok');
                                }
                                else {
                                    $('#flagendtime_m').addClass('glyphicon glyphicon-remove');

                                }
                            }
                        }

                        $('#examtime_m').ready(function(){
                            $('#examtime_m').attr('value',getTime(0));
                            $('#examtime_m').blur(check_m(0));
                        });
                        $('#endtime_m').ready(function(){
                            $('#endtime_m').attr('value',getTime(1));
                            $('#endtime_m').blur(check_m(1));
                        });
                    </script>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:30px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="开始选题目">
                </form>
            </div>
        </div>
    </div>
</div>

















</body>
</html>