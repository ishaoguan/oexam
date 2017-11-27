<?php if (!defined('THINK_PATH')) exit();?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>oexam-试卷详情</title>

    



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

    <link rel="stylesheet" media="all" href="/nut/Public/assets/stylesheets/style1.css" type="text/css" />
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
<body >

<div id="wrap">
    
    <div class="container-fluid">
        <!-- Main window -->
        <div class="main_container" id="users_page">

            <div class="row-fluid">
                <h2 class="heading">
                    <?php echo ($data['name']); ?>
                </h2>
            </div> <!-- /row-fluid -->

            <!--此处往下为代码改写部分-->
            <div class="row-fluid">
                <div class="widget widget-padding span12">
                    <div class="widget-header">
                        <i class="icon-group"></i>
                        <h5><?php if($_SESSION['aname']== null): ?><a href="<?php echo U('Teacher/index');?>">首页</a>
                            <?php else: ?> <a href="<?php echo U('Admin/index');?>">首页</a><?php endif; ?></h5><h5>/<?php echo ($data['name']); ?></h5>
                        <div class="widget-buttons">

                            <a href="#" data-title="Collapse" data-collapsed="false" class="collapse"><i class="icon-chevron-up"></i></a>
                        </div>
                    </div>

                    <!--题目-->
                    <div class="widget-body table-responsive " style="width: 100%">
                        <form action="<?php echo U('Type/del');?>"   method="post">
                            <div class="main box" style="width: inherit;">
                                <div class="col-xs-3" >
                                    <dl class="clear affix-top" style="width:inherit;" data-spy="affix" data-offset-top="200">
                                        <ul class="nav nav-tabs" style="background-color: #D1EEEE;font-family: 微软雅黑;width:inherit;margin-bottom: 5px" >
                                            <li role="presentation" class="active" style="width:33.333%"><a href="#s" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">单选题</a></li>
                                            <li role="presentation" style="width:33.333%"><a href="#d" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">多选题</a></li>
                                            <li role="presentation" style="width:33.333%"><a href="#j" style="width:100%;padding-left: 50%" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">判断题</a></li>
                                        </ul>
                                        <div class="tab-content" style="margin-top:5px;width:inherit; height:225px; overflow:auto;" >
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
                                                    <th style="min-width: 70px">操作</th>
                                                </tr>
                                                <?php if(is_array($data['s'])): $i = 0; $__LIST__ = $data['s'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sp): $mod = ($i % 2 );++$i;?><tr>
                                                        <td>
                                                            <label><input  class="task-input" type="checkbox"  name="Check[S][]" value="<?php echo ($sp["id"]); ?>"></label>
                                                        </td>
                                                        <td><?php echo ($i); ?></td>
                                                        <td><?php echo ($sp["content"]); ?></td>
                                                        <td><?php echo ($sp["op1"]); ?></td>
                                                        <td><?php echo ($sp["op2"]); ?></td>
                                                        <td><?php echo ($sp["op3"]); ?></td>
                                                        <td><?php echo ($sp["op4"]); ?></td>
                                                        <td><?php echo ($sp["ans"]); ?></td>
                                                        <td><?php echo ($sp["explain"]); ?></td>
                                                        <td><a href="#" style="font-family: 微软雅黑" data-toggle="modal" class="exs"  id="<?php echo ($sp['id']); ?>" data-target="#edits"><i class="icon-edit"></i>修改</a></td>

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
                                                        <th style="min-width: 70px">操作</th>
                                                    </tr>
                                                    <?php if(is_array($data['d'])): $i = 0; $__LIST__ = $data['d'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dp): $mod = ($i % 2 );++$i;?><tr>
                                                            <td>
                                                                <label><input  class="task-input" type="checkbox"  name="Check[D][]" value="<?php echo ($dp["id"]); ?>"></label>
                                                            </td>
                                                            <td><?php echo ($i); ?></td>
                                                            <td><?php echo ($dp["content"]); ?></td>
                                                            <td><?php echo ($dp["op1"]); ?></td>
                                                            <td><?php echo ($dp["op2"]); ?></td>
                                                            <td><?php echo ($dp["op3"]); ?></td>
                                                            <td><?php echo ($dp["op4"]); ?></td>
                                                            <td><?php echo ($dp["ans"]); ?></td>
                                                            <td><?php echo ($dp["explain"]); ?></td>
                                                            <td><a href="#" style="font-family: 微软雅黑" data-toggle="modal" class="exd" rel="d" id="<?php echo ($dp["id"]); ?>" data-target="#editd"><i class="icon-edit"></i>修改</a></td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div role="tabpanel" class="tab-pane tableindex" id="j">
                                                <table class="table  table-responsive">
                                                    <tbody><tr>
                                                        <th style="min-width: 78px">
                                                            <label style="padding-top: 4px" ><input class="task-input" style="margin-bottom: 0.4em;margin-top: 0px;" type="checkbox"  id="CheckJ" onchange="achecked('J')" ><span style="font-family: 微软雅黑;font-size: 16px">全选</span></label>
                                                        </th>
                                                        <th style="min-width: 70px">题号</th>
                                                        <th style="min-width: 70px">内容</th>
                                                        <th style="min-width: 70px;padding-left: 0px">答案</th>
                                                        <th style="min-width: 70px">解析</th>
                                                        <th style="min-width: 70px">操作</th>
                                                    </tr>
                                                    <?php if(is_array($data['j'])): $i = 0; $__LIST__ = $data['j'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jp): $mod = ($i % 2 );++$i;?><tr>
                                                            <td>
                                                                <label><input  class="task-input" type="checkbox"  name="Check[J][]" value="<?php echo ($jp["id"]); ?>"></label>
                                                            </td>
                                                            <td><?php echo ($i); ?></td>
                                                            <td><?php echo ($jp["content"]); ?></td>
                                                            <td><?php echo ($jp["ans"]); ?></td>
                                                            <td><?php echo ($jp["explain"]); ?></td>
                                                            <td><a href="#" style="font-family: 微软雅黑"  data-toggle="modal" class="exj" rel="<?php echo ($jp["id"]); ?>" data-target="#editj"><i class="icon-edit"></i>修改</a></td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-danger"    style="border-radius: 8px; width: 20%;margin: 2% 40%;padding: 1% 0%" value="批 量 删 除">
                        </form>
                    </div> <!-- /widget-body -->


                </div> <!-- /widget -->
            </div> <!-- /row-fluid -->

        </div>
        <!-- /Main window -->

    </div><!--/.fluid-container-->
</div>

<!--修改单选题模态框-->

<div class="modal fade bs-example-modal-sm" id="edits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      style="display: none">

    <div class="modal-sm" style="width: inherit;margin-right: auto;margin-left: auto;right: auto;left: 50%;">
        <div  style="border-radius: 5px;">
            <div style="   padding-bottom:0px; padding-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <div style="width:100%;height: 50px">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;margin-right: 5px">
                    <span style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                    </button>
                </div>
                <form action="<?php echo U('Type/updateEditeTimuS');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="timuids" name="timuids" >
                    <div style="width: auto;height: auto;">
                        <label for="stmcontent"  style="display: table-cell;" ><p style="font-family: 微软雅黑; margin: 0 32px;">内 容</p></label>
                        <div  style="display: table-cell;width: inherit"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="stmcontent" class="form-control" id="stmcontent"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="sop1"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项A</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="sop1" class="form-control" id="sop1"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="sop2"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项B</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="sop2" class="form-control" id="sop2"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="sop3"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项C</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="sop3" class="form-control" id="sop3"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="sop4"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项D</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="sop4" class="form-control" id="sop4"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto ;margin-bottom: 5px">
                        <label   style="display: table-cell;" ><p style="margin: 0 32px;;font-family: 微软雅黑">答 案</p></label>
                        <div  style="display: table-cell"  >
                            <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="A" id="sa" class="form-control"   >A
                            <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="B" id="sb"  class="form-control"   >B
                            <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="C" id="sc"  class="form-control"   >C
                            <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="D" id="sd"  class="form-control"   >D
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="stmexplain"  style="display: table-cell;" ><p style="margin: 0 32px;;font-family: 微软雅黑">解 析</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="stmexplain" class="form-control" id="stmexplain"  ></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:10px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="修 改">
                </form>
            </div>
        </div>
    </div>
</div>



<!--修改多选题模态框-->

<div class="modal fade bs-example-modal-sm" id="editd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="height: auto ;display: none">

    <div class="modal-sm" style="width: inherit;margin-right: auto;margin-left: auto;right: auto;left: 50%;">
        <div  style="border-radius: 5px;">
            <div style="   padding-bottom:0px; padding-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <div style="width:100%;height: 50px ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:50px;">
                    <span
                            style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                    </div>
                <form action="<?php echo U('Type/updateEditeTimuD');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="timuidd" name="timuidd" >
                    <div style="width: auto;height: auto;">
                        <label for="dtmcontent"  style="display: table-cell;" ><p style="font-family: 微软雅黑; margin: 0 32px;">内 容</p></label>
                        <div  style="display: table-cell;width: inherit"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="dtmcontent" class="form-control" id="dtmcontent"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="dop1"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项A</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="dop1" class="form-control" id="dop1"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="dop2"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项B</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="dop2" class="form-control" id="dop2"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="dop3"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项C</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="dop3" class="form-control" id="dop3"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="dop4"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">选项D</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="5" style="border-radius: 5px;width: 400px; height: 50px; font-size: 10px;font-family: 微软雅黑" name="dop4" class="form-control" id="dop4"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto;margin-bottom: 5px">
                        <label   style="display: table-cell;" ><p style="margin: 0 32px;;font-family: 微软雅黑">答 案</p></label>
                        <div  style="display: table-cell"  >
                            <input type="checkbox" style=" font-size: 10px;font-family: 微软雅黑" name="ans[]" value="A" id="da" class="form-control"   >A
                            <input type="checkbox" style=" font-size: 10px;font-family: 微软雅黑" name="ans[]" value="B"  id="db" class="form-control"   >B
                            <input type="checkbox" style=" font-size: 10px;font-family: 微软雅黑" name="ans[]" value="C" id="dc"  class="form-control"   >C
                            <input type="checkbox" style=" font-size: 10px;font-family: 微软雅黑" name="ans[]" value="D"  id="dd" class="form-control"   >D                        </div>
                    </div>
                    <div style="width: auto;height: auto">
                        <label for="dtmexplain"  style="display: table-cell;" ><p style="margin: 0 32px;;font-family: 微软雅黑">解 析</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="dtmexplain" class="form-control" id="dtmexplain"  ></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:10px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="修 改">
                </form>
            </div>
        </div>
    </div>
</div>





<!--修改判断题模态框-->

<div class="modal fade bs-example-modal-sm" id="editj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="height: auto ;display: none" >

    <div class="modal-sm"  style="width: inherit;margin-right: auto;margin-left: auto;right: auto;left: 50%;">
        <div  style="border-radius: 5px;">
            <div style="  padding-bottom:0px; padding-bottom:20px;padding-left:0px;padding-right:0px;background-color: #ffffff">
                <div style="width:100%;height: 50px ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:inherit;">
                    <span
                            style="height:50px;padding:10px 40px 10px 0px;background-image: url('/nut/Public/assets/images/close.jpg') ;background-size:100%;background-repeat: no-repeat"></span>
                </button>
                </div>
                <form action="<?php echo U('Type/updateEditeTimuJ');?>"  method="post" enctype="multipart/form-data" >
                    <input type="hidden" class="timuidj" name="timuidj" >
                    <div style="width: auto;height: auto;">
                        <label for="jtmcontent"  style="display: table-cell;" ><p style="font-family: 微软雅黑; margin: 0 30px;">内容</p></label>
                        <div  style="display: table-cell;width: inherit"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="jtmcontent" class="form-control" id="jtmcontent"  required></textarea>
                        </div>
                    </div>
                    <div style="width: auto;height: auto;margin-bottom: 5px">
                    <label   style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">答案</p></label>
                    <div  style="display: table-cell"  >
                        <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="T" id="jt" class="form-control"   >T
                        <input type="radio" style=" font-size: 10px;font-family: 微软雅黑" name="ans" value="F" id="jf" class="form-control"   >F
                    </div>

                 </div>
                    <div style="width: auto;height: auto">
                        <label for="jtmexplain"  style="display: table-cell;" ><p style="margin: 0 30px;;font-family: 微软雅黑">解析</p></label>
                        <div  style="display: table-cell"  >
                            <textarea  cols="30" rows="10" style="border-radius: 5px;width: 400px; height: 100px; font-size: 10px;font-family: 微软雅黑" name="jtmexplain" class="form-control" id="jtmexplain"  ></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-info" style="position:relative;left:230px;margin-top:10px; width:130px;font-family: 微软雅黑;background-color:#0090ff;font-size:10px" value="修 改">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*获取题目信息并填到模态框里面去*/
    $('.exj').click(function () {
        var id=$(this).attr('rel');
        //alert(id);
        $('.timuidj').attr('value',id);
        $.ajax({
            url: "<?php echo U('Type/getj');?>",
            data: { id: id},
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                jtmcontent.innerHTML=data.content;
              //  alert(data.ans.trim());
                if(data.ans.trim()=="T")
                     $('#jt').attr("checked",true);
                else if(data.ans.trim()=="F")
                    $('#jf').attr("checked",true);
                jtmexplain.innerHTML=data.explain;
            }
        });
    });
    $('.exd').click(function () {
        var id=$(this).attr('id');
        $('.timuidd').attr('value',id);
        $.ajax({
            url: "<?php echo U('Type/get');?>",
            data: { id: id},
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                dtmcontent.innerHTML=data.content;
                dop1.innerHTML=data.op1;
                dop2.innerHTML=data.op2;
                dop3.innerHTML=data.op3;
                dop4.innerHTML=data.op4;
                for( var i in data.ans)
                if(data.ans[i]=='A')
                    $('#da').attr("checked",true);
                else if(data.ans[i]=='B')
                    $('#db').attr("checked",true);
                else if(data.ans[i]=='C')
                    $('#dc').attr("checked",true);
                else if(data.ans[i]=='D')
                    $('#dd').attr("checked",true);
                dtmexplain.innerHTML=data.explain;
            }
        });
    });
    $('.exs').click(function () {
        var id=$(this).attr('id');
        //alert(id);
        $('.timuids').attr('value',id);
        $.ajax({
            url: "<?php echo U('Type/get');?>",
            data: { id: id},
            type: 'post',
            cache: false,
            dataType: 'json',
            success: function (data) {
                stmcontent.innerHTML=data.content;
                sop1.innerHTML=data.op1;
                sop2.innerHTML=data.op2;
                sop3.innerHTML=data.op3;
                sop4.innerHTML=data.op4;
                if(data.ans.trim()=='A')
                    $('#sa').attr("checked",true);
                else if(data.ans.trim()=='B')
                    $('#sb').attr("checked",true);
                else if(data.ans.trim()=='C')
                    $('#sc').attr("checked",true);
                else if(data.ans.trim()=='D')
                    $('#sd').attr("checked",true);
                stmexplain.innerHTML=data.explain;
            }
        });
    });
</script>
</body>
</html>