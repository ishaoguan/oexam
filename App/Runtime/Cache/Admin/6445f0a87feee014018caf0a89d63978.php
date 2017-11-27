<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oexam-查看题库列表</title>

    <link rel="stylesheet" href="/exam/Public/assets/stylesheets/bootstrap.min.css" type="text/css">

    



<link  href="/exam/Public/assets/stylesheets/bootstrap1.css"  media="all"  rel="stylesheet" />
<link  href="/exam/Public/assets/stylesheets/theme1.css" rel="stylesheet"  />
<link  href="/exam/Public/assets/stylesheets/font-awesome.min.css"  rel="stylesheet" />
<link  href="/exam/Public/assets/stylesheets/font-awesome.css"  rel="stylesheet" />
<link href="/exam/Public/assets/stylesheets/alertify.css"  rel="stylesheet" />

<script src="/exam/Public/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/exam/Public/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/exam/Public/assets/js/bootstrap.js"></script>
<script type="text/javascript" src='/exam/Public/assets/js/morris.min.js'></script>
<script type="text/javascript" src="/exam/Public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/exam/Public/assets/js/realm.js"></script>



    <link rel="stylesheet" href="/exam/Public/assets/stylesheets/style1.css" type="text/css" />
</head>
<body>
<div id="wrap">
    
    <div class="container-fluid">

        <!-- Main window -->
        <div class="main_container" id="users_page">

            <div class="row-fluid">

                <h2 class="heading">
                    题库列表
                </h2>
            </div> <!-- /row-fluid -->

            <!--此处往下为代码改写部分-->
            <div class="row-fluid">
                <div class="widget widget-padding span12">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h5><?php if($_SESSION['aname']== null): ?><a href="<?php echo U('Teacher/index');?>">首页</a>
                            <?php else: ?> <a href="<?php echo U('Admin/index');?>">首页</a><?php endif; ?></h5></h5><h5>/<?php echo (session('tname')); ?></h5> <h5>/题库列表</h5>
                        <div class="widget-buttons">
                            <a href="#" data-title="Collapse" data-collapsed="false" class="collapse"><i class="icon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="widget-body table-responsive " style="padding-bottom: 45px">
                        <table id="users" class="table table-condensed table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>题库名</th>
                                <th>题目总数</th>
                                <th>最后一次修改时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($val['typeid']); ?></td>
                                    <td><a href="<?php echo U('Type/total');?>?id=<?php echo ($val['typeid']); ?>&name=<?php echo ($val['typename']); ?>"><?php echo ($val['typename']); ?></a></td>
                                    <td><?php echo ($val['count']); ?></td>
                                    <td><?php echo ($val['changetime']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-right" >
                                                <li><a href="<?php echo U('Type/delTiku');?>?id=<?php echo ($val['typeid']); ?>" onclick="return confirm('你确定要删除吗？')"><i class="icon-trash"></i>删除<?php echo ($val['typename']); ?></a></li>
                                                <li><a href="#" data-toggle="modal" class="tp" id="<?php echo ($val['typeid']); ?>" data-target="#tpedit"  ><i class=" icon-edit"></i>修改<?php echo ($val['typename']); ?></a></li>
                                                <li ><a href="#" data-toggle="modal" class="app" rel="<?php echo ($val['typeid']); ?>" data-target="#append"  ><i class=" icon-edit"></i>追加试题</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div> <!-- /widget-body -->
                </div> <!-- /widget -->
            </div> <!-- /row-fluid -->

        </div>
        <!-- /Main window -->

    </div><!--/.fluid-container-->
</div>

<!--修改题库名模态框-->

<div class="modal fade bs-example-modal-sm" id="tpedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="margin-top: 8%;height: 200px">

    <div class="modal-sm"  style="margin-top:-30px; z-index: 1050; width: auto;padding: 10px;margin-right: auto;margin-left: auto;right: auto;left: 50%;padding-top: 10px;padding-bottom: 30px;">
        <div  style="border-radius: 5px;">
            <div style="  height: 180px; padding-bottom:0px; border-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span
                          style="height:50px;padding:10px 40px 10px 0px;background-image: url('/exam/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                <form action="<?php echo U('Type/updateEditeTiku');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="tikuid" name="tikuid" >
                    <div style="margin-bottom:10px;margin-top: 20px">
                        <label for="tpname"  style="display: table-cell;" ><p style="position: relative;top:40px;left: 150px;font-family: 微软雅黑">题库名称</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="margin-top: 90px;width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="tpname" class="form-control" id="tpname" placeholder="请输入试卷名称" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagtpname" style="position: relative;left: 200px;top:45px;" ></span>
                        </div>
                    </div>
                    <script  type="text/javascript">
//                        $("#tpname").ready(function () {
//                            //alert(11);
//                            $("#flagtpname").removeAttr("class");
//                            var tpid=$(".tikuid").val();
//                            //alert(typeid);
//                            var tpname=$("#tpname").val();
//                            //alert(typeid);
//                            if(tpname=="")
//                                $('#flagtpname').addClass('glyphicon glyphicon-remove');
//                            else {
//                                $.ajax({
//                                    url: "<?php echo U('Type/check');?>",
//                                    data: { tpid: tpid},
//                                    type: 'post',
//                                    cache: false,
//                                    dataType: 'json',
//                                    success: function (data) {
//                                        if (data.flag) {
//                                            $("#tpname").attr('placeholder',data.typename);
//                                            $('#flagtpname').addClass('glyphicon glyphicon-remove');
//                                        }
//                                        else {
//                                            $('#flagtpname').addClass('glyphicon glyphicon-ok');
//                                        }
//                                    }
//                                });
//                            }
//                        });
                        $("#tpname").mouseout(function () {
                            $("#flagtpname").removeAttr("class");
                            var tpname=$("#tpname").val().trim();
                           // alert(tpname);
                            if(tpname!="")
                                $.ajax({
                                    url: "<?php echo U('Type/checkR');?>",
                                    data: { tpname: tpname},
                                    type: 'post',
                                    cache: false,
                                    dataType: 'json',
                                    success: function (data) {

                                        if (data.flag) {
                                            $('#flagtpname').addClass('glyphicon glyphicon-remove');
                                        }
                                        else {
                                            $('#flagtpname').addClass('glyphicon glyphicon-ok');
                                        }
                                    }
                                });
                        })
                    </script>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:10px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="修改">
                </form>
            </div>
        </div>
    </div>
</div>


<!--修改题库名模态框-->

<div class="modal fade bs-example-modal-sm" id="append" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 20%; height:180px;display: none">

    <div class="modal-sm" style="width: inherit;margin-right: auto;margin-left: auto;right: auto;left: 50%;">
        <div  style="border-radius: 5px;">
            <div style="  padding-bottom:0px; border-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <div style="width:100%;height: 50px ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span
                            style="height:50px;padding:10px 40px 10px 10px;background-image: url('/exam/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                    </div>
                <form action="<?php echo U('Type/append');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="appid" name="appid" >
                    <div style="width: auto;height: auto;">
                        <label style="display: table-cell;" ><p style="font-family: 微软雅黑; margin: 0 32px 0 90px;">追加题库</p></label>
                        <div  style="display: table-cell"  >
                            <input type="file" style="height: 40px; border-radius: 5px; font-size: 10px;font-family: 微软雅黑" name="file" class="form-control" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:30px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="提 交">
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".tp").click(function () {
        var typeid=$(this).attr('id');
        $(".tikuid").attr('value',typeid);
        $("#flagtpname").removeAttr("class");
        $.ajax({
            url: "<?php echo U('Type/check');?>",
            data: { typeid: typeid},
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.flag) {
                    $("#tpname").attr('placeholder',data.typename);
                }
            }
        });
    });
    $(".app").click(function () {
        var typeid=$(this).attr('rel');
        $(".appid").attr('value',typeid);
    });
</script>
</body>
</html>