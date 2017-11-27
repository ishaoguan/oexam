<?php if (!defined('THINK_PATH')) exit();?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mots-管理教师</title>

    



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
    <div class="navbar navbar-fixed-top "  >
    <div class="container-fluid top-bar" style="background-color: #f8f8f8;" >
        <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#"  >
                    <img width="40" height="34" src="/nut/Public/Upload/<?php echo (session('pica')); ?>" /><?php echo (session('aname')); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Index/logout');?>">
                            <i class="icon-signout"></i> 退出登录</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <img src="/nut/Public/assets/images/logo1.gif" width="160px" height="45px" style="position: relative" alt="" />
    </div>
</div>
    <div class="container-fluid">
        
        <!-- Main window -->
        <div class="main_container" id="users_page">

            <div class="row-fluid">

                <h2 class="heading">
                    教师列表
                </h2>
            </div> <!-- /row-fluid -->

            <!--此处往下为代码改写部分-->
            <div class="row-fluid">
                <div class="widget widget-padding span12">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h5>教师信息列表</h5>
                        <div class="widget-buttons">
                            <!--<a href="#" data-title="Add User" data-toggle="modal" data-target="#example_modal"><i class="icon-plus"></i></a>-->
                            <a href="#" data-title="Collapse" data-collapsed="false" class="collapse"><i class="icon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="widget-body table-responsive ">
                        <table id="users" class="table table-condensed table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>真实姓名</th>
                                <th>联系方式</th>
                                <th>邮箱</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                    <td><a href="<?php echo U('Admin/typelist');?>?id=<?php echo ($val['aid']); ?>&name=<?php echo ($val['name']); ?>"><?php echo ($val['name']); ?></a></td>
                                    <td><?php echo ($val['realname']); ?></td>
                                    <td> <?php echo ($val['telephone']); ?></td>
                                    <td>
                                        <?php echo ($val['email']); ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                                操作
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="<?php echo U('Admin/resetpwd');?>?id=<?php echo ($val['aid']); ?>"><i class="icon-exchange"></i> 重置密码</a></li>
                                                <li><a href="<?php echo U('Admin/del');?>?id=<?php echo ($val['aid']); ?>" onclick="return confirm('你确定要删除吗？')"><i class="icon-trash"></i> 删除</a></li>
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

</body>
</html>