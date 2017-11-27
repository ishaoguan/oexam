<?php if (!defined('THINK_PATH')) exit();?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mots-手动添加试卷</title>

    



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



    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/peskin.css" />

    <link rel="stylesheet" href="/nut/Public/assets/stylesheets/style1.css" type="text/css" />
    <script>
        function achecked(type) {
          //  alert(type);
            var all_check = document.getElementById("Check"+type);
            var check=document.getElementsByName("Check["+type+"][]");
            //alert(all_check);
            if (all_check.checked) {
                for(j=0;j<check.length;j++){
                    check[j].checked=1;
                }
            } else {
                for(j=0;j<check.length;j++){
                    check[j].checked=0;
                }
            }
        }
    </script>

</head>
<body>

<div id="wrap">
    
    <div class="container-fluid">
        <!-- Main window -->
        <div class="main_container" id="users_page">

            <div class="row-fluid">
                <h2 class="heading">
                    手动生成试卷
                </h2>
            </div> <!-- /row-fluid -->

            <!--此处往下为代码改写部分-->
            <div class="row-fluid">
                <div class="widget widget-padding span12">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h5><a href="<?php echo U('Teacher/index');?>">首页</a></h5><h5>/生成试卷</h5>
                        <div class="widget-buttons">
                            <!--<a href="#" data-title="Add User" data-toggle="modal" data-target="#example_modal"><i class="icon-plus"></i></a>-->
                            <a href="#" data-title="Collapse" data-collapsed="false" class="collapse"><i class="icon-chevron-up"></i></a>
                        </div>
                    </div>

                    <!--题目-->
                    <div class="widget-body table-responsive " style="width: 100%">
                        <form action="<?php echo U('Test/addman');?>"   method="post">
                        <div style="width: inherit">
                            <h4 style="padding: 0 10px; font-family: 微软雅黑;display: inline">试卷类型：<span style="color: red"><?php echo ($typename); ?></span></h4>
                            <h4 style="padding: 0 10px; font-family: 微软雅黑;display: inline">试卷名：<span style="color: red"><?php echo ($paper['pname']); ?></span></h4>
                            <h4 style="padding: 0 10px;font-family: 微软雅黑;display: inline">考试时长：<span style="color: red"><?php echo ($paper['totaltime']); ?>分钟</span></h4>
                            <h4 style="padding: 0 10px;font-family: 微软雅黑;display: inline">开始时间：<span style="color: red"><?php echo ($paper['examtime']); ?></span></h4>
                            <h4 style="padding: 0 10px;font-family: 微软雅黑;display: inline">结束时间：<span style="color: red"><?php echo ($paper['endtime']); ?></span></h4>
                        </div>
                        <div class="main box" style="width: inherit">
                            <div class="col-xs-3" >
                                <dl class="clear affix-top" style="width:inherit;" data-spy="affix" data-offset-top="200">
                                    <ul class="nav nav-tabs" style="background-color: #D1EEEE;font-family: 微软雅黑;width:inherit;margin-bottom: 5px" >
                                        <li role="presentation" class="active" style="width:33.333%"><a href="#s" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">单选题</a></li>
                                        <li role="presentation" style="width:33.333%"><a href="#d" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">多选题</a></li>
                                        <li role="presentation" style="width:33.333%"><a href="#j" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">判断题</a></li>
                                    </ul>
                                    <div class="tab-content"  style="margin-top:5px;width:inherit; height:225px; overflow:auto;" >
                                        <div role="tabpanel" class="tab-pane tableindex active" id="s"><table class="table  table-responsive">
                                            <tbody>
                                            <tr>
                                                <th style="min-width: 78px">
                                                        <label style="padding-top: 4px" ><input class="task-input" style="margin-bottom: 0.4em;margin-top: 0px;" type="checkbox" id="CheckS" onclick="achecked('S')" ><span style="font-family: 微软雅黑;font-size: 16px">全选</span></label>
                                                </th>
                                                <th style="min-width: 70px">题号</th>
                                                <th style="min-width: 70px">内容</th>
                                                <th style="min-width: 70px">选项A</th>
                                                <th style="min-width: 70px">选项B</th>
                                                <th style="min-width: 70px">选项C</th>
                                                <th style="min-width: 70px">选项D</th>
                                                <th style="min-width: 70px;padding-left: 0px">答案</th>
                                                <th style="min-width: 70px">解析</th>

                                            </tr>
                                            <?php if(is_array($data['s'])): $i = 0; $__LIST__ = $data['s'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sp): $mod = ($i % 2 );++$i;?><tr>
                                                    <td>
                                                        <label><input  class="task-input" type="checkbox"  name="Check[S][]" value="<?php echo ($sp["id"]); ?>"><span></span></label>
                                                    </td>
                                                    <td><?php echo ($i); ?></td>
                                                <td><?php echo ($sp["content"]); ?></td>
                                                <td><?php echo ($sp["op1"]); ?></td>
                                                <td><?php echo ($sp["op2"]); ?></td>
                                                <td><?php echo ($sp["op3"]); ?></td>
                                                <td><?php echo ($sp["op4"]); ?></td>
                                                <td><?php echo ($sp["ans"]); ?></td>
                                                <td><?php echo ($sp["explain"]); ?></td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table></div>
                                        <div role="tabpanel" class="tab-pane tableindex" id="d">
                                            <table class="table  table-responsive">
                                                <tbody><tr>
                                                    <th style="min-width: 78px">
                                                        <label style="padding-top: 4px" ><input class="task-input" style="margin-bottom: 0.4em;margin-top: 0px;" type="checkbox"  id="CheckD" onchange="achecked('D')" ><span style="font-family: 微软雅黑;font-size: 16px">全选</span></label>
                                                    </th>
                                                    <th style="min-width: 70px">题号</th>
                                                    <th style="min-width: 70px">内容</th>
                                                    <th style="min-width: 70px">选项A</th>
                                                    <th style="min-width: 70px">选项B</th>
                                                    <th style="min-width: 70px">选项C</th>
                                                    <th style="min-width: 70px">选项D</th>
                                                    <th style="min-width: 70px;padding-left: 0px">答案</th>
                                                    <th style="min-width: 70px">解析</th>

                                                </tr>
                                                <?php if(is_array($data['d'])): $i = 0; $__LIST__ = $data['d'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dp): $mod = ($i % 2 );++$i;?><tr>
                                                        <td >
                                                            <label><input  class="task-input" type="checkbox"  name="Check[D][]" value="<?php echo ($dp["id"]); ?>"><span></span></label>
                                                        </td>
                                                        <td><?php echo ($i); ?></td>
                                                        <td><?php echo ($dp["content"]); ?></td>
                                                        <td><?php echo ($dp["op1"]); ?></td>
                                                        <td><?php echo ($dp["op2"]); ?></td>
                                                        <td><?php echo ($dp["op3"]); ?></td>
                                                        <td><?php echo ($dp["op4"]); ?></td>
                                                        <td><?php echo ($dp["ans"]); ?></td>
                                                        <td><?php echo ($dp["explain"]); ?></td>
                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane tableindex" id="j">
                                            <table class="table  table-responsive">
                                                <tbody><tr>
                                                    <th  style="min-width: 78px">
                                                        <label style="padding-top: 4px" ><input class="task-input" style="margin-bottom: 0.4em;margin-top: 0px;" type="checkbox"  id="CheckJ" onchange="achecked('J')" ><span style="font-family: 微软雅黑;font-size: 16px">全选</span></label>
                                                    </th>
                                                    <th style="min-width: 70px">题号</th>
                                                    <th style="min-width: 70px">内容</th>
                                                    <th style="min-width: 70px;padding-left: 0px">答案</th>
                                                    <th style="min-width: 70px">解析</th>

                                                </tr>
                                                <?php if(is_array($data['j'])): $i = 0; $__LIST__ = $data['j'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jp): $mod = ($i % 2 );++$i;?><tr>
                                                        <td>
                                                            <label><input  class="task-input" type="checkbox"  name="Check[J][]" value="<?php echo ($jp["id"]); ?>"><span></span></label>
                                                        </td>
                                                        <td><?php echo ($i); ?></td>
                                                        <td><?php echo ($jp["content"]); ?></td>
                                                        <td><?php echo ($jp["ans"]); ?></td>
                                                        <td><?php echo ($jp["explain"]); ?></td>
                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary"    style="border-radius: 8px; width: 20%;margin: 2% 40%;padding: 1% 0%" value="生 成 试 卷">
                    </form>
                    </div> <!-- /widget-body -->


                </div> <!-- /widget -->
            </div> <!-- /row-fluid -->

        </div>
        <!-- /Main window -->

    </div><!--/.fluid-container-->
</div>
</body>
</html>