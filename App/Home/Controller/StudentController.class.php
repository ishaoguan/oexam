<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/21
 * Time: 11:45
 */
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index(){
        $this->display();
    }
    function mod(){
        $sid=I('get.id');
        $data=M('student')->where(array('sid'=>$sid))->find();
        if($data){
            $this->assign('data',$data);
        }else{
            $this->error('异常错误！');
        }
    }
    function testlist(){
        //
        $mypage=(empty($_GET['p']))?'1':$_GET['p'];
        $grademodel=M('grade');
        $teachernum=$grademodel->where(array('sid'=>session('sid')))->count();
        $Page=new\Think\Page($teachernum,1);
        $Page->setConfig('header', '<li >共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');

        $Page->setConfig('first', '首页');
        $Page->setConfig('last', '末页');
        $Page->lastSuffix = false;
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $this->link=$Page->show();
       // $teacherresult=$grademodel->where('member_type=1')->relation('organization')->page($mypage.',1')->select();

       // $grademodel=M('grade');
        //算总记录数
        $data=$grademodel->where(array('sid'=>session('sid')))->page($mypage.',1')->select();
        $records=count($data);
        for($i=0;$i<$records;$i++){
            $painfolist[$i]=M('painfo')->where(array('pid'=>$data[$i]['pid']))->find();
            $painfolist[$i]['score']=$data[$i]['score'];
            $painfolist[$i]['subtime']=$data[$i]['subtime'];
            $painfolist[$i]['gid']=$data[$i]['gid'];
        }
        $this->assign('painfolist',$painfolist);
      //  var_dump($painfolist);
        $this->display();
    }
    function delgrade(){
        $id=I('get.id');
        $r=M('grade')->where(array('gid'=>$id))->delete();
        $re=M('answer')->where(array('gid'=>$id))->delete();
        if($r&&$re){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }
    function info(){//获取试题
        $gid=I('get.id');
        $a=M('grade')->where(array('gid'=>$gid))->find();
        $pid=$a['pid'];
        //echo $pid;
        $data=M('paper')->where(array('pid'=>$pid))->find();
        if($data){
            $paper=M('painfo')->where(array('pid'=>$pid))->find();
            $b=M('type')->where(array('typeid'=> $paper['typeid']))->find();
            $paper['typename']=$b['typename'];
            $r=M('answer')->where(array('gid'=>$gid))->find();
           // var_dump($r);
            //获取填写的答案
            $ans['s']=explode(",",$r['sans']);
            $ans['d']=explode(",",$r['dans']);
            $ans['j']=explode(",",$r['jans']);
            //获取正确答案
            $d['s']=explode(",",$data['sids']);
            $d['d']=explode(",",$data['dids']);
            $d['j']=explode(",",$data['jids']);
            if($d['s'][0]!=null)
                for($i=0;$i<count($d['s']);$i++){
                    $res['s'][$i]=M('test')->where(array('id'=>$d['s'][$i]))->find();
                    $res['s'][$i]['mans']=$ans['s'][$i];
                }

            if($d['d'][0]!=null)
                for($i=0;$i<count($d['d']);$i++){
                    $res['d'][$i]=M('test')->where(array('id'=>$d['d'][$i]))->find();
                    $res['d'][$i]['mans']=$ans['d'][$i];
                }
            if($d['j'][0]!=null)
                for($i=0;$i<count($d['j']);$i++){
                    $res['j'][$i]=M('jtest')->where(array('id'=>$d['j'][$i]))->find();
                    $res['j'][$i]['mans']=$ans['j'][$i];
                }
            $this->assign('res',$res);
            $this->assign('paper',$paper);
            $this->display();
        }else{
            $this->error('空白试卷');
        }
    }
    function error(){//获取试题
        $gid=I('get.id');
        $c=M('grade')->where(array('gid'=>$gid))->find();
        //echo $gid;
        $pid=$c['pid'];
       // echo $pid;
        $data=M('paper')->where(array('pid'=>$pid))->find();
        if($data){
            $paper=M('painfo')->where(array('pid'=>$pid))->find();
            $z=M('type')->where(array('typeid'=> $paper['typeid']))->find();
            $paper['typename']=$z['typename'];
            $r=M('answer')->where(array('gid'=>$gid))->find();
            // var_dump($r);
            //获取填写的答案
            $ans['s']=explode(",",$r['sans']);
            $ans['d']=explode(",",$r['dans']);
            $ans['j']=explode(",",$r['jans']);
            //获取正确答案
            $d['s']=explode(",",$data['sids']);
            $d['d']=explode(",",$data['dids']);
            $d['j']=explode(",",$data['jids']);
            if($d['s'][0]!=null)
                for($i=0,$s=0;$i<count($d['s']);$s++,$i++){
                    $res['s'][$i]=M('test')->where(array('id'=>$d['s'][$i]))->find();
                    $res['s'][$i]['mans']=$ans['s'][$i];
                    if(trim($res['s'][$i]['mans'])!=trim($res['s'][$i]['ans'])){
                        $dat['s'][$s]=$res['s'][$i];
                    }
                }
            if($d['d'][0]!=null)
                for($i=0,$s=0;$i<count($d['d']);$i++,$s++){
                    $res['d'][$i]=M('test')->where(array('id'=>$d['d'][$i]))->find();
                    $res['d'][$i]['mans']=$ans['d'][$i];
                    if(trim($res['d'][$i]['mans'])!=trim($res['d'][$i]['ans'])){
                        $dat['d'][$s]=$res['d'][$i];
                    }
                }
            if($d['j'][0]!=null)
                for($i=0,$s=0;$i<count($d['j']);$i++,$s++){
                    $res['j'][$i]=M('jtest')->where(array('id'=>$d['j'][$i]))->find();
                    $res['j'][$i]['mans']=$ans['j'][$i];
                    if(trim($res['j'][$i]['mans'])!=trim($res['j'][$i]['ans'])){
                        $dat['j'][$s]=$res['j'][$i];
                    }
                }
            if(!(count($dat['j'])+count($dat['s'])+count($dat['d'])))
             $this->success('恭喜您得了满分，不需要再看错题啦！');
            else {
                $this->assign('res', $dat);
                $this->assign('paper', $paper);
                $this->display();
            }
        }else{
            $this->error('空白试卷');
        }
    }
}
