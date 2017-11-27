<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/23
 * Time: 17:16
 */
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
    public function tips(){
        $code=I('get.code');
        $p=M('painfo')->where(array('code'=>$code))->select();
        if($p){
            for($i=0;$i<count($p);$i++)
            {
                $a=M('admin')->where(array('aid'=>$p[$i]['aid']))->find();
                    if(false!==$a){
                        $p[$i]['aname']=$a['name'];
                    }
                    else
                        $this->error('异常错误！');
            }
            $this->assign('tips',$p);
            $this->display();
        }
        else{
            $this->error('没有找到相关试卷,请确认试卷码输入是否正确.');
        }
    }
    public function paper()//获取改试卷所有题目
    {
        $pid=I('get.id');
        $code=M('painfo')->where(array('pid'=>$pid))->find();
        if(false!==$code) {
            $num = M('paper')->where(array('pid' => $code['pid']))->find();
            session('pid',$pid);
        }
       // var_dump($num);
        $this->assign('pname',$code['pname']);
        $arr = explode(',',$num['sids']);
       // dump($arr) ;

        $test_s=array();
        $num_s=count($arr);
//        echo $num_s;
        for($i=0;$i<$num_s;$i++) {
            $test_s[$i]=M('test')->where(array('tyid'=>'s','id'=>$arr[$i]))->find();
        }
       // var_dump($test_s);exit();
        for($i=0;$i<$num_s;$i++) {
            if($i==0)
                $test_s[$i]['next']=$test_s[$i+1]['id'];
            elseif($i==$num_s-1)
                $test_s[$i]['pre']=$test_s[$i-1]['id'];
            else{
                $test_s[$i]['next']=$test_s[$i+1]['id'];
                $test_s[$i]['pre']=$test_s[$i-1]['id'];
            }
        }
        //var_dump($test_s);

        $this->assign('test_s',$test_s);


        $test_d=array();
        $arr = explode(',',$num['dids']);

        $num_d=count($arr);
        for($i=0;$i<$num_d;$i++) {
            $test_d[$i]=M('test')->where(array('tyid'=>'d','id'=>$arr[$i]))->find();
        }
        for($i=0;$i<$num_d;$i++) {
            if($i==0)
                $test_d[$i]['next']=$test_d[$i+1]['id'];
            elseif($i==$num_d-1)
                $test_d[$i]['pre']=$test_d[$i-1]['id'];
            else{
                $test_d[$i]['next']=$test_d[$i+1]['id'];
                $test_d[$i]['pre']=$test_d[$i-1]['id'];
            }
        }
        // var_dump($test_d);
        $this->assign('test_d',$test_d);

        $test_j=array();
        $arr = explode(',',$num['jids']);
        $num_j=count($arr);
        for($i=0;$i<$num_j;$i++) {
            $test_j[$i]=M('jtest')->where(array('id'=>$arr[$i]))->find();
        }
        for($i=0;$i<$num_j;$i++) {
            if($i==0)
                $test_j[$i]['next']=$test_j[$i+1]['id'];
            elseif($i==$num_j-1)
                $test_j[$i]['pre']=$test_j[$i-1]['id'];
            else{
                $test_j[$i]['next']=$test_j[$i+1]['id'];
                $test_j[$i]['pre']=$test_j[$i-1]['id'];
            }
        }
        //var_dump($test_j);
        $this->assign('test_j',$test_j);
        $this->display();

    }
    public function times()
    {
        $pid=I('get.id');
       // echo $pid;
        $code=M('painfo')->where(array('pid'=>$pid))->find();
       // var_dump($code);
        if(false!==$code)
        {
            $time= intval($code['totaltime']);
            echo json_encode($time, JSON_UNESCAPED_UNICODE);
        }
        else{
            $this->error('异常错误');
        }

    }
    function ans(){
      //  $pid=session('pid');
        //获取学生做的答案
       /* var_dump($_POST);
        exit();*/
        $datas=$_POST['question']['s'];
        $nums=count($datas);
        $score=0;
        //计算成绩
        $ans=array();
        $s=0;
        if($nums!=0){
            foreach ($datas as $ks=>$vs)
            {
                $rs=M('test')->where(array('id'=>$ks))->find();
                if(false!==$rs){
                    $ans['s'][$s]=trim($vs);
                    if(trim($rs['ans'])==$ans['s'][$s])
                        $score++;
                    $s++;
                }else{
                    $this->error('异常错误');
                }
            }
        }

        $datad=$_POST['question']['d'];
        $numd=count($datad);
        $d=0;
        if($numd!=0){
            foreach ($datad as $kd=>$vd)
            {
                $rd=M('test')->where(array('id'=>$kd))->find();
                if(false!==$rd){
                    $ans['d'][$d]=trim(implode('',$vd));
                    if(trim($rd['ans'])==$ans['d'][$d])
                        $score++;
                    $d++;
                }else{
                    $this->error('异常错误');
                }
            }
        }

        $dataj=$_POST['question']['j'];
        $numj=count($dataj);
        $j=0;
        if($numj!=0){
            foreach ($dataj as $kj=>$vj)
            {
                $rj=M('jtest')->where(array('id'=>$kj))->find();
                if(false!==$rj){
                    $ans['j'][$j]=trim($vj);
                    if(trim($rj['ans'])== $ans['j'][$j])
                        $score++;
                    $j++;
                }
                else{
                    $this->error('异常错误');
                }
            }
        }

        $data['pid']=session('pid');
        //echo $data['pid'];
        $data['sid']=session('sid');
       /* echo $data['sid'];
        exit();*/
        $data['score']=$score/$nums*100;
        $data['subtime']=date('Y-m-d H:i:s');
        $re=M('grade')->data($data)->add();
        if($re){
            $a['sans']=implode(',',$ans['s']);
            $a['dans']=implode(',',$ans['d']);
            $a['jans']=implode(',',$ans['j']);
            $a['gid']=$re;
            $res=M('answer')->data($a)->add();
            if($res){
                $this->success('试卷提交成功，请去成绩单查看！',U('Student/testlist'));
            }else{
                $this->error('计算成绩时出错');
            }
        }else{
            $this->error('异常错误');
        }
    }
}
