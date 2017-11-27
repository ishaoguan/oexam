<?php if (!defined('THINK_PATH')) exit();?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>模拟考试</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/nut/Public/assets/ans/peskin.css" />

    <script src="/nut/Public/assets/ans/jquery.min.js"></script>
    <script src="/nut/Public/assets/ans/jquery-1.9.1.js"></script>
    <script src="/nut/Public/assets/ans/jquery.json.js"></script>
    <script src="/nut/Public/assets/ans/jquery-ui.min.js"></script>
    <script src="/nut/Public/assets/ans/bootstrap.min.js"></script>
    <script src="/nut/Public/assets/ans/bootstrap-datetimepicker.js"></script>

    <script src="/nut/Public/assets/ans/all.fine-uploader.min.js"></script>

    <script src="/nut/Public/assets/ans/ckeditor.js"></script><style>.cke{visibility:hidden;}</style>
    <script src="/nut/Public/assets/ans/plugin.js"></script>
</head><body data-spy="scroll" data-target="#myScrollspy">
<div class="container-fluid" id="questioncontent">
    <div class="row-fluid">
        <div class="main box">
            <div class="col-xs-3" id="questionbar">
                <dl class="clear affix-top" style="width:270px;" data-spy="affix" data-offset-top="235" id="questionindex">
                    <dd>
                        <h2><a class="btn btn-danger col-xs-12" style="font-size:1.2em;"><span id="timer_h">00</span>：<span id="timer_m">00</span>：<span id="timer_s">00</span></a></h2>
                    </dd>
                    <dt class="float_l"><h4>&nbsp;</h4></dt>
                    <ul class="nav nav-tabs" role="tablist" style="background-color: #D1EEEE">
                        <li role="presentation" class="active"><a href="#qt_1" aria-controls="home" role="tab" data-toggle="tab">一</a></li>
                        <li role="presentation"><a href="#qt_2" aria-controls="home" role="tab" data-toggle="tab">二</a></li>
                        <li role="presentation"><a href="#qt_3" aria-controls="home" role="tab" data-toggle="tab">三</a></li>
                    </ul>

                    <div class="tab-content" style="margin-top:5px;" >
                        <div role="tabpanel" class="tab-pane tableindex active" id="qt_1">
                           <?php if(is_array($test_s)): $i = 0; $__LIST__ = $test_s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><a id="sign_<?php echo ($vs['id']); ?>" href="javascript:;" onclick="javascript:gotoquestion(<?php echo ($vs['id']); ?>)" class="btn btn-default"> <?php echo ($i); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane tableindex" id="qt_2">
                            <?php if(is_array($test_d)): $i = 0; $__LIST__ = $test_d;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vd): $mod = ($i % 2 );++$i;?><a id="sign_<?php echo ($vd['id']); ?>" href="javascript:;" onclick="javascript:gotoquestion(<?php echo ($vd['id']); ?>)" class="btn btn-default"> <?php echo ($i); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane tableindex" id="qt_3">
                            <?php if(is_array($test_j)): $i = 0; $__LIST__ = $test_j;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vj): $mod = ($i % 2 );++$i;?><a id="sign_<?php echo ($vj['id']); ?>" href="javascript:;" onclick="javascript:gotoquestion(<?php echo ($vj['id']); ?>)" class="btn btn-default"> <?php echo ($i); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </dl>
            </div>
            <form id="form1"  name="form1"  method="post" action="<?php echo U('Test/ans');?>" enctype="multipart/form-data" class="col-xs-9 split pull-right" style="padding:0px;">
                <div class="box itembox">
                    <h2 class="text-center"><?php echo ($pname); ?></h2>
                </div>
                    <div class="box itembox questionpanel" id="questype_1" >
                        <blockquote class="questype">一、单选题</blockquote>
                    </div>
                <?php if(is_array($test_s)): $k = 0; $__LIST__ = $test_s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div class="box itembox paperexamcontent" id="questions_<?php echo ($v['id']); ?>" rel="1" >
                        <h4 class="title">
                            第<?php echo ($k); ?>题
                            </h4><a name="question_<?php echo ($v['id']); ?>">
                    </a><div class="choice"><a name="question_<?php echo ($v['id']); ?>">
                    </a><?php echo ($v['content']); ?></div>
                        <div class="choice">
                            <p>A:<?php echo ($v['op1']); ?></p><p>B:<?php echo ($v['op2']); ?></p>
                            <p>C:<?php echo ($v['op3']); ?></p><p>D:<?php echo ($v['op4']); ?></p>
                        </div>
                        <div class="selector">
                            <label class="radio-inline"><input type="radio" name="question[s][<?php echo ($v['id']); ?>]" rel="<?php echo ($v['id']); ?>" value="A" autocomplete="off">A </label>
                            <label class="radio-inline"><input type="radio" name="question[s][<?php echo ($v['id']); ?>]" rel="<?php echo ($v['id']); ?>" value="B" autocomplete="off">B </label>
                            <label class="radio-inline"><input type="radio" name="question[s][<?php echo ($v['id']); ?>]" rel="<?php echo ($v['id']); ?>" value="C" autocomplete="off">C </label>
                            <label class="radio-inline"><input type="radio" name="question[s][<?php echo ($v['id']); ?>]" rel="<?php echo ($v['id']); ?>" value="D" autocomplete="off">D </label>
                        </div>
                        <div class="toolbar">
                            <?php if($k == 1 ): ?><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($v['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a>
                                <?php elseif($k == count($test_s)): ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($v['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a>
                            <?php else: ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($v['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($v['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="box itembox questionpanel" id="questype_2" >
            <blockquote class="questype">二、多选题</blockquote>
        </div>
                <?php if(is_array($test_d)): $kd = 0; $__LIST__ = $test_d;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vd): $mod = ($kd % 2 );++$kd;?><div class="box itembox paperexamcontent" id="questions_<?php echo ($vd['id']); ?>" rel="2" >
            <h4 class="title">
                第<?php echo ($kd); ?>题
                <a name="question_<?php echo ($vd['id']); ?>">
            </a></h4><a name="question_<?php echo ($vd['id']); ?>">
        </a><div class="choice"><a name="question_<?php echo ($vd['id']); ?>">
        </a><?php echo ($vd['content']); ?></div>
            <div class="choice">
                <p>A:<?php echo ($vd['op1']); ?></p><p>B:<?php echo ($vd['op2']); ?></p>
                <p>C:<?php echo ($vd['op3']); ?></p><p>D:<?php echo ($vd['op4']); ?></p>
            </div>
            <div class="selector">
                <label class="checkbox-inline"><input type="checkbox" name="question[d][<?php echo ($vd['id']); ?>][0]" rel="<?php echo ($vd['id']); ?>" value="A" autocomplete="off">A </label>
                <label class="checkbox-inline"><input type="checkbox" name="question[d][<?php echo ($vd['id']); ?>][1]" rel="<?php echo ($vd['id']); ?>" value="B" autocomplete="off">B </label>
                <label class="checkbox-inline"><input type="checkbox" name="question[d][<?php echo ($vd['id']); ?>][2]" rel="<?php echo ($vd['id']); ?>" value="C" autocomplete="off">C </label>
                <label class="checkbox-inline"><input type="checkbox" name="question[d][<?php echo ($vd['id']); ?>][3]" rel="<?php echo ($vd['id']); ?>" value="D" autocomplete="off">D </label>
            </div>
            <div class="toolbar">
                <?php if($kd == 1 ): ?><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($vd['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a>
                    <?php elseif($kd == count($test_d)): ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($vd['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a>
                    <?php else: ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($vd['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($vd['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a><?php endif; ?>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="box itembox questionpanel" id="questype_3" >
                    <blockquote class="questype">三、判断题</blockquote>
                </div>
                <?php if(is_array($test_j)): $kj = 0; $__LIST__ = $test_j;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vj): $mod = ($kj % 2 );++$kj;?><div class="box itembox paperexamcontent" id="questions_<?php echo ($vj['id']); ?>" rel="3" >
                        <h4 class="title">
                            第<?php echo ($kj); ?>题
                        </h4><a name="question_<?php echo ($vj['id']); ?>">
                    </a><div class="choice"><a name="question_<?php echo ($vj['id']); ?>">
                    </a><?php echo ($vj['content']); ?></div>

                        <div class="selector">
                            <label class="radio-inline"><input type="radio" name="question[j][<?php echo ($vj['id']); ?>]" rel="<?php echo ($vj['id']); ?>" value="T" autocomplete="off">T </label>
                            <label class="radio-inline"><input type="radio" name="question[j][<?php echo ($vj['id']); ?>]" rel="<?php echo ($vj['id']); ?>" value="F" autocomplete="off">F </label>
                        </div>
                        <div class="toolbar">
                            <?php if($kj == 1 ): ?><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($vj['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a>
                                <?php elseif($kj == count($test_j)): ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($vj['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a>
                                <?php else: ?><a class="btn btn-default" onclick="javascript:gotoindexquestion(<?php echo ($vj['pre']); ?>);"><span class="glyphicon glyphicon-chevron-left"></span>上一题</a><a class="pull-right btn btn-primary" onclick="javascript:gotoindexquestion(<?php echo ($vj['next']); ?>);">下一题<span class="glyphicon glyphicon-chevron-right"></span></a><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <h3 class="text-center">
                    <a class="btn btn-primary" style="font-size:1em;width:270px;" href="#submodal" role="button" data-toggle="modal">交 卷</a>
                </h3>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="submodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" autocomplete="off"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">交卷</h4>
            </div>
            <div class="modal-body">
                <p>共有试题 <span class="allquestionnumber"></span> 题，已做 <span class="yesdonumber"></span> 题。您确认要交卷吗？</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:submitPaper();" class="btn btn-primary" autocomplete="off">确定交卷</button>
                <button aria-hidden="true" class="btn" type="button" data-dismiss="modal" autocomplete="off">再检查一下</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function gotoquestion(questid)
    {
        $(".questionpanel").hide();
        $(".paperexamcontent").hide();
        $("#questions_"+questid).show();
        $("#questype_"+$("#questions_"+questid).attr('rel')).show();
    }
    function gotoindexquestion(questid)
    {
        $(".questionpanel").hide();
        $(".paperexamcontent").hide();
        $("#questions_"+questid).show();
        $("#questype_"+$("#questions_"+questid).attr('rel')).show();
    }
    $(document).ready(function(){

        var url=window.location.href;

        $.getUrlParam = function (name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null)
                return unescape(r[2]);
            return null;
        };
        var p=$.getUrlParam('id');
       //alert(p);
        $.get('http://localhost/nut/Home/Test/times',{id:p },function(data){
            var setting = {
                hbox:$("#timer_h"),
                mbox:$("#timer_m"),
                sbox:$("#timer_s"),
                finish:function(){
                    submitPaper();
                }
            };
            setting.lefttime =data;
            countdown(setting);
        });
        (function(){
            $(".questionpanel").hide();
            $(".questionpanel:first").show();
            $(".paperexamcontent").hide();
            $(".paperexamcontent:first").show();
        })();

        //setInterval(saveanswer,1000);
      //  initData = $.parseJSON(storage.getItem('questions'));
       // alert(initData);
//        if(initData){
//            for(var p in initData){
//                if(p!='set')
//                    formData[p]=initData[p];
//            }
//
//
//            var radios = $('#form1 :input[type=radio]');
//            $.each(radios,function(){
//                var _= this, v = initData[_.name]?initData[_.name].value:null;
//                var _this = $(this);
//                if(v!=''&&v==_.value){
//                    _.checked = true;
//                    batmark(_this.attr('rel'),initData[_this.attr('name')].value);
//                }else{
//                    _.checked=false;
//                }
//            });
//
//            var checkboxs=$('#form1 :input[type=checkbox]');
//            $.each(checkboxs,function(){
//
//                var _=this,v=initData[_.name]?initData[_.name].value:null;
//                var _this = $(this);
//                if(v!=''&&v==_.value){
//                    _.checked=true;
//                   // batmark(_this.attr('rel'),initData[_this.attr('name')].value);
//                }else{
//                    _.checked=false;
//                }
//            });
//        }

        $('#form1 :input[type=radio]').change(function(){
            var _=this;
            var _this=$(this);
            var p=[];
            p.push(_.name);
            if(_.checked){
                p.push(_.value);
                set.apply(formData,p);
            }else{
                p.push('');
                p.push(null);
                set.apply(formData,p);
            }
            markQuestion(_this.attr('rel'));
        });

        $('#form1 :input[type=checkbox]').change(function(){
            var _= this;
            var _this = $(this);
            var p=[];
            p.push(_.name);
            if(_.checked){
                p.push(_.value);
                set.apply(formData,p);
            }else{
                p.push('');
                p.push(null);
                set.apply(formData,p);
            }
            markQuestion(_this.attr('rel'));
        });
        $('.allquestionnumber').html($('.paperexamcontent').length);
        $('.yesdonumber').html($('#questionindex .btn-primary').length);
    });
</script>




</body></html>