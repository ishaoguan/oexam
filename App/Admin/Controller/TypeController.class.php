<?php
namespace Admin\Controller;
use Think\Controller;

class TypeController extends Controller{

    function form(){
        $this->display();
    }
    protected function _import($fileName,$controller) {
        $upload = new \Think\Upload();//  实例化上传类
        $upload->maxSize   =     10485760 ;// 设置附件上传大小10MB
        $upload->exts      =     array('xlsx');// 设置附件上传类型
        $upload->rootPath  =     'Public/Upload/Tiku/'; // 设置附件上传根目录
        $upload->saveName  =     time().'_'.mt_rand();
        // 开启子目录保存 并调用自定义函数get_user_id生成子目录
        $upload->autoSub = false;

        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES['file']);
        if(!$info) {// 上传错误提示错误信息
            $upload->getError();
        }else{// 上传成功 获取上传文件信息
            $path = 'Public/Upload/Tiku/'.$info['savename'];
            return $path;
        }
    }
    //导题库
    function add(){
        $tpname = I('post.tiku');
        $aid=session('aid');
        if (!(M('type')->where(array('typename' => $tpname, 'aid' =>$aid ))->find())) {
            $data = array();
            $data['type']['typename'] = $tpname;
            $data['type']['aid'] = $aid;
            $data['type']['changetime']=date('Y-m-d H:i:s');
            M('type')->add($data['type']);
            $re = M('type')->where(array('typename' => $tpname, 'aid' => $aid))->find();
            $tpid = $re['typeid'];
            $questions = readExcel($this->_import());
            foreach ($questions as $key => $value) {
                if ($key == "单选题") {

                    for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                        $data['s'][$j]['tyid'] = 's';
                        $data['s'][$j]['content'] = $value[$i][0];
                        $data['s'][$j]['ans'] = $value[$i][1];
                        $data['s'][$j]['op1'] = $value[$i][2];
                        $data['s'][$j]['op2'] = $value[$i][3];
                        $data['s'][$j]['op3'] = $value[$i][4];
                        $data['s'][$j]['op4'] = $value[$i][5];
                        $data['s'][$j]['explain'] = $value[$i][6];
                        $data['s'][$j]['aid'] = $aid;
                        $data['s'][$j]['typeid'] = $tpid;
                    }
                } elseif ($key == "多选题") {
                    for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                        $data['d'][$j]['tyid'] = 'd';
                        $data['d'][$j]['content'] = $value[$i][0];
                        $data['d'][$j]['ans'] = $value[$i][1];
                        $data['d'][$j]['op1'] = $value[$i][2];
                        $data['d'][$j]['op2'] = $value[$i][3];
                        $data['d'][$j]['op3'] = $value[$i][4];
                        $data['d'][$j]['op4'] = $value[$i][5];
                        $data['d'][$j]['explain'] = $value[$i][6];
                        $data['d'][$j]['aid'] = $aid;
                        $data['d'][$j]['typeid'] = $tpid;
                    }
                } elseif ($key == "判断题") {

                    for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                        $data['j'][$j]['content'] = $value[$i][0];
                        $data['j'][$j]['ans'] = $value[$i][1];
                        $data['j'][$j]['explain'] = $value[$i][2];
                        $data['j'][$j]['aid'] = $aid;
                        $data['j'][$j]['typeid'] = $tpid;
                    }
                }
            }
            M('test')->addAll($data['s']);
            M('test')->addAll($data['d']);
            M('jtest')->addAll($data['j']);
            $num=M('test')->where(array('aid'=>$aid,'typeid'=>$tpid))->count()+M('jtest')->where(array('aid'=>$aid,'typeid'=>$tpid))->count();
            $count=count($data['d'])+count($data['s'])+count($data['j']);
            if($num==$count){
                $url=U('typelist');
                header("Location:$url");
            }
            else
                $this->error('上传异常错误');
        }else{
            $this->error('题库名重复，请修改！');
        }
    }

    //追加题库
    function append(){
        $tid = I('post.appid');
        $aid=session('aid');
            $data['changetime']=date('Y-m-d H:i:s');
           if(false!==M('type')->where(array('typeid'=>$tid))->data($data)->save()) {
               $questions = readExcel($this->_import());
               foreach ($questions as $key => $value) {
                   if ($key == "单选题") {
                       for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                           $data['s'][$j]['tyid'] = 's';
                           $data['s'][$j]['content'] = $value[$i][0];
                           $data['s'][$j]['ans'] = $value[$i][1];
                           $data['s'][$j]['op1'] = $value[$i][2];
                           $data['s'][$j]['op2'] = $value[$i][3];
                           $data['s'][$j]['op3'] = $value[$i][4];
                           $data['s'][$j]['op4'] = $value[$i][5];
                           $data['s'][$j]['explain'] = $value[$i][6];
                           $data['s'][$j]['aid'] = $aid;
                           $data['s'][$j]['typeid'] = $tid;
                       }
                   } elseif ($key == "多选题") {
                       for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                           $data['d'][$j]['tyid'] = 'd';
                           $data['d'][$j]['content'] = $value[$i][0];
                           $data['d'][$j]['ans'] = $value[$i][1];
                           $data['d'][$j]['op1'] = $value[$i][2];
                           $data['d'][$j]['op2'] = $value[$i][3];
                           $data['d'][$j]['op3'] = $value[$i][4];
                           $data['d'][$j]['op4'] = $value[$i][5];
                           $data['d'][$j]['explain'] = $value[$i][6];
                           $data['d'][$j]['aid'] = $aid;
                           $data['d'][$j]['typeid'] = $tid;
                       }
                   } elseif ($key == "判断题") {

                       for ($i = 1, $j = 0; $i < count($value); $j++, $i++) {
                           $data['j'][$j]['content'] = $value[$i][0];
                           $data['j'][$j]['ans'] = $value[$i][1];
                           $data['j'][$j]['explain'] = $value[$i][2];
                           $data['j'][$j]['aid'] = $aid;
                           $data['j'][$j]['typeid'] = $tid;
                       }
                   }
               }
               if ((false!==M('test')->addAll($data['s']))&&(false!==M('test')->addAll($data['d']))&&(false!==M('jtest')->addAll($data['j']))) {
                   $this->success('题库上传成功!', U('typelist'));
               } else
                   $this->error('上传异常错误');
           }
    }

    function typelist(){//查询该老师的所有题库、
        //echo session('aid');
        $list=M('type')->where(array('aid'=>session('aid')))->select();
        for($i=0;$i<count($list);$i++) {
            $list[$i]['count'] = M('test')->where(array('typeid' => $list[$i]['typeid']))->count() + M('jtest')->where(array('typeid' =>  $list[$i]['typeid']))->count();
        }
        $this->assign('list',$list);
        $this->display();
    }
    function total(){//查询该题库全部试题
        $typeid=I('get.id');
        $data['name']=I('get.name');
        $data['s']=M('test')->where(array('aid'=>session('aid'),'typeid'=>$typeid,'tyid'=>'s'))->select();
        $data['d']=M('test')->where(array('aid'=>session('aid'),'typeid'=>$typeid,'tyid'=>'d'))->select();
        $data['j']=M('jtest')->where(array('aid'=>session('aid'),'typeid'=>$typeid))->select();
        if( $data['s']+ $data['j']+ $data['d'])
        {
            $this->assign('data',$data);
            $this->display();
        }
        else
            $this->error('该题库没有试题！');
    }
    function del(){//删除题库的试题
        if(empty($_POST)){
            $this->error('没有选择要删除的题目！');
        }
        $s=$_POST['Check']['S'];
        $d=$_POST['Check']['D'];
        $j=$_POST['Check']['J'];
        $num=0;
        if(count($s))
        for($i=0;$i<count($s);$i++){//删除单选题
            if(M('test')->where(array('id'=>$s[$i]))->delete())
                $num++;
            else
                $this->error('异常删除！');
        }
        if(count($d))
        for($i=0;$i<count($d);$i++){//删除多选题
            if(M('test')->where(array('id'=>$d[$i]))->delete())
                $num++;
            else $this->error('异常删除！');
        }
        if(count($j))
        for($i=0;$i<count($j);$i++){//删除判断题
            if(M('jtest')->where(array('id'=>$j[$i]))->delete())
                $num++;
            else
            $this->error('异常删除！');
        }
        $url=U('typelist');
          header("Location:$url");
    }
    //删除题库并清空该题库的所有试题
    function delTiku(){
        //先删除试题，再删除试卷，最后删除题库
        $id=I('get.id');
        $s=M('test')->where(array('typeid'=>$id))->count();
        $j=M('jtest')->where(array('typeid'=>$id))->count();
        $count=$s+$j;
        //判断题库是否有试题
        if($count){
            //有试题
            $painfo=M('painfo')->where(array('typeid'=>$id))->select();
            for($i=0;$i<count($painfo);$i++)
                $paper[$i]['code']=$painfo[$i]['code'];
            //判断是否有试卷
            if($paper){
                //题库生成了试卷
                if(false!==M('painfo')->where(array('typeid'=>$id))->delete()){
                    //删除试卷信息
                    $num=count($paper);
                    $aid=session('aid');
                    for($i=0,$t=0;$i<$num;$i++){
                        if(false!==M('paper')->where(array('code'=>$paper[$i]['code'],'aid'=>$aid))->delete())
                            $t++;
                    }
                    if($t!=$num)
                        $this->error('异常错误!1');
                    if($s){
                        if(!(false!==M('test')->where(array('typeid'=>$id))->delete())){
                            $this->error('异常错误!2');
                        }
                    }
                    if($j) {
                        if (!(false !== M('jtest')->where(array('typeid' => $id))->delete())) {
                            $this->error('异常错误!3');
                        }
                    }
                    if(false!==M('type')->where(array('typeid'=>$id))->delete())
                        $this->success('题库删除成功!');
                    else
                        $this->error('异常错误!4');
                }
            }else{
                //题库没有生成试卷
                if($s){
                    if(!(false!==M('test')->where(array('typeid'=>$id))->delete())){
                        $this->error('异常错误!5');
                    }
                }
                if($j) {
                    if (!(false !== M('jtest')->where(array('typeid' => $id))->delete())) {
                        $this->error('异常错误!6');
                    }
                }
                if(false!==M('type')->where(array('typeid'=>$id))->delete())
                   $this->success('题库删除成功!');
                else
                $this->error('异常错误!7');
            }
        }else{
            //没有试题
            if(false!==M('type')->where(array('typeid'=>$id))->delete())
                 $this->success('题库删除成功！');
            else
                $this->error('异常错误!0');
        }

    }

    public function check()//查题库名
    {
        //flag=1->重名
        $typeid=I('post.typeid');
        $ex=M("type")->where(array('aid'=>session('aid'),'typeid'=>$typeid))->find();
        if($ex)
            $ex['flag']=1;
        else{
            $ex['flag']=0;
        }
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
    function getj(){//通过id查判断题内容
        $id=I('post.id');
        $ex=M('jtest')->where(array('id'=>$id))->find();
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
    function get(){
        $id=I('post.id');
        $ex=M('test')->where(array('id'=>$id))->find();
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
    //查题库名是否重名
    public function checkR()
    {
        //flag=1->重名
        $tpname=I('post.tpname');
        $ex=M("type")->where(array('aid'=>session('aid'),'typename'=>$tpname))->select();
        if($ex)
            $ex['flag']=1;
        else{
            $ex['flag']=0;
        }
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
    function updateEditeTiku(){//修改题库名
       $data['typename']=trim(I('post.tpname'));
        $typeid=trim(I('post.tikuid'));
        $data['changetime']=date('Y:m:d H:i:s');
        $data['aid']=session('aid');
        if(M('type')->where(array('typename'=>$data['typename'],'aid'=>$data['aid']))->find())
            $this->error('题库名冲突，请重新修改！');
        else{
            M('type')->where(array('typeid'=>$typeid))->save($data);
            $this->success('修改成功！','typelist');
        }
    }
    //修改单选题信息
    function updateEditeTimuS(){
      //  header("Content-type:text/html;charset=utf-8");
        $id=intval(I('post.timuids'));
        $data['content']=I('post.stmcontent');
        $data['op1']=I('post.sop1');
        $data['op2']=I('post.sop2');
        $data['op3']=I('post.sop3');
        $data['op4']=I('post.sop4');
        $data['ans']=I('post.ans');
        $data['explain']=I('post.stmexplain');
        if(false!==M('test')->where(array('id'=>$id))->data($data)->save()) {
            $re=M('test')->where(array('id'=>$id))->find();
            $time['changetime']=date('Y-m-d H:i:s');
            $t=M('type')->where(array('typeid'=>$re['typeid']))->data($time)->save();
            if(!$t){
                $this->error('试题修改成功，但时间刷新失败！');
            }
            $this->success("试题修改成功");
        }
        else
            $this->error('试题修改失败！');
    }
    //修改多选题信息
    function updateEditeTimuD(){

        $data['content']=I('post.dtmcontent');
        $data['op1']=I('post.dop1');
        $data['op2']=I('post.dop2');
        $data['op3']=I('post.dop3');
        $data['op4']=I('post.dop4');
        $data['explain']=I('post.dtmexplain');
        $data['ans']=implode('',I('post.ans'));
        if(false!==M('test')->where(array('id'=>intval(I('post.timuidd'))))->data($data)->save())
            $this->success("试题修改成功");
        else
            $this->error('试题修改失败！');
    }
    //修改判断题信息
    function updateEditeTimuJ(){

        $data['content']=I('post.jtmcontent');
        $data['ans']=I('post.ans');
        $data['explain']=I('post.jtmexplain');
        if(false!==M('jtest')->where(array('id'=>intval(I('post.timuidj'))))->data($data)->save())
            $this->success("试题修改成功");
        else
            $this->error('试题修改失败！');
    }
    //删除题库及该题库所有的试题

}