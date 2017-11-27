<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mots-查看试卷列表</title>
    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/bootstrap.min.css" type="text/css">
    



<link  href="/nut/Public/assets/stylesheets/bootstrap1.css"  media="all"  rel="stylesheet" />
<link  href="/nut/Public/assets/stylesheets/theme1.css" rel="stylesheet"  />
<link  href="/nut/Public/assets/stylesheets/font-awesome.min.css"  rel="stylesheet" />
<link  href="/nut/Public/assets/stylesheets/font-awesome.css"  rel="stylesheet" />
<link href="/nut/Public/assets/stylesheets/alertify.css"  rel="stylesheet" />

<script src="/nut/Public/assets/javascripts/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/nut/Public/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/nut/Public/assets/js/bootstrap.js"></script>
<script type="text/javascript" src='/nut/Public/assets/js/morris.min.js'></script>
<script type="text/javascript" src="/nut/Public/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/nut/Public/assets/js/realm.js"></script>



    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/style1.css" type="text/css" />

</head>
<body>
<div id="wrap">
    
    <div class="container-fluid">

        <!-- Main window -->
        <div class="main_container" id="users_page">

            <div class="row-fluid">

                <h2 class="heading">
                    试卷列表
                </h2>
            </div> <!-- /row-fluid -->

            <!--此处往下为代码改写部分-->
            <div class="row-fluid">
                <div class="widget widget-padding span12">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h5><a href="<?php echo U('Teacher/index');?>">首页</a></h5><h5>/试卷列表</h5>
                        <div class="widget-buttons">
                            <!--<a href="#" data-title="Add User" data-toggle="modal" data-target="#example_modal"><i class="icon-plus"></i></a>-->
                            <a href="#" data-title="Collapse" data-collapsed="false" class="collapse"><i class="icon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="widget-body table-responsive ">
                        <table id="users" class="table table-condensed table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>试卷码</th>
                                <th>试卷名</th>
                                <th>试题数</th>
                                <th>答题人数</th>
                                <th>所属题库</th>
                                <th>考试时间(分钟)</th>
                                <th>创建时间</th>
                                <th>结束时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($val['code']); ?></td>

                                    <td><a href="<?php echo U('Painfo/paper');?>?pid=<?php echo ($val['pid']); ?>"><?php echo ($val['pname']); ?></a></td>
                                    <td><?php echo ($val['testnum']); ?></td>
                                    <td><a href="<?php echo U('Painfo/slist');?>?id=<?php echo ($val['pid']); ?>"><?php echo ($val['count']); ?></a></td>
                                    <td>
                                        <?php echo ($val['typename']?$val['typename']:'未知题库'); ?>
                                    </td>
                                    <td><?php echo ($val['totaltime']); ?></td>
                                    <td><?php echo ($val['examtime']); ?></td>
                                    <td><?php echo ($val['endtime']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="<?php echo U('Painfo/delTest');?>?id=<?php echo ($val['pid']); ?>" onclick="return confirm('你确定要删除吗？')"><i class="icon-trash"></i>删除<?php echo ($val['pname']); ?></a></li>
                                                <li><a href="#" data-toggle="modal" class="p" id="<?php echo ($val['pid']); ?>" data-target="#pedit"  ><i class=" icon-edit"></i>修改<?php echo ($val['pname']); ?></a></li>
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
</div>
    </div><!--/.fluid-container-->

<!--修改试题名模态框-->

<div class="modal fade bs-example-modal-sm" id="pedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="margin-top: 8%;height: 200px">

    <div class="modal-sm"  style="margin-top:-30px; z-index: 1050; width: auto;padding: 10px;margin-right: auto;margin-left: auto;right: auto;left: 50%;padding-top: 10px;padding-bottom: 30px;">
        <div  style="border-radius: 5px;">
            <div style="  height: 180px; padding-bottom:0px; border-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span
                            style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                <form action="<?php echo U('Painfo/updateEditePname');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="pid" name="pid" >
                    <div style="margin-bottom:10px;margin-top: 20px">
                        <label for="pname"  style="display: table-cell;" ><p style="position: relative;top:40px;left: 150px;font-family: 微软雅黑">试卷名称</p></label>
                        <div  style="display: table-cell"  >
                            <input type="text" style="margin-top: 90px;width: 180px; height: 30px; font-size: 10px;position: relative;left: 176px;font-family: 微软雅黑" name="pname" class="form-control" id="pname" placeholder="请输入试卷名称" required>
                        </div>
                        <div  style="display: table-cell">
                            <span id="flagpname" style="position: relative;left: 200px;top:45px;" ></span>
                        </div>
                    </div>
                    <script  type="text/javascript">
                        $("#pname").mouseout(function () {
                            $("#flagpname").removeAttr("class");
                            var pname=$("#pname").val().trim();
                            if(pname!="")
                                $.ajax({
                                    url: "<?php echo U('Painfo/checkR');?>",
                                    data: { pname: pname},
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
                        });
                    </script>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:10px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="修改">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".p").click(function () {
        var pid=$(this).attr('id');
        $(".pid").attr('value',pid);
        $("#flagpname").removeAttr("class");
        $.ajax({
            url: "<?php echo U('Painfo/check');?>",
            data: { pid: pid},
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.flag) {
                    $("#pname").attr('placeholder',data.pname);
                }
            }
        });
    });
</script>

</body>
</html>