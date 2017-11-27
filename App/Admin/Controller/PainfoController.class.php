<?php
namespace Admin\Controller;
use Think\Controller;

class PainfoController extends Controller
{

    public function form()
    {
        $this->display();
    }
     function gets()
    {
        $ex=M("type")->select();
        $data=array();
        for($i=0;$i<count($ex);$i++)
        {
            $data[$i]['typeid']=$ex[$i]['typeid'];
            $data[$i]['typename']=$ex[$i]['typename'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    function painfolist(){//获取该老师全部试卷
        $list=M('painfo')->where(array('aid'=>session('aid')))->select();
        for($i=0;$i<count($list);$i++){
            $list[$i]['count']=M('grade')->where(array('pid'=>$list[$i]['pid']))->count();//ͳ获取参加考试的人数
            $paper=M('paper')->where(array('pid'=>$list[$i]['pid']))->find();
            $data['sids']=explode(",",$paper['sids']);
            $data['dids']=explode(",",$paper['dids']);
            $data['jids']=explode(",",$paper['jids']);
            //计算总题目数
            $s=$data['sids'][0]?count($data['sids']):0;
            $d=$data['dids'][0]?count($data['dids']):0;
            $j=$data['jids'][0]?count($data['jids']):0;
            $list[$i]['testnum']=$s+$d+$j;
            $list[$i]['typename']=M('type')->where(array('typeid'=>$list[$i]['typeid']))->find()['typename'];//获取题库名
        }

        $this->assign('list',$list);
        $this->display();
    }
    function paper(){//获取试题
        $pid=I('get.pid');
        $data=M('paper')->where(array('pid'=>$pid))->find();
        if($data){
            $paper=M('painfo')->where(array('pid'=>$pid))->find();
            $paper['typename']=M('type')->where(array('typeid'=> $paper['typeid']))->find()['typename'];
            $d['s']=explode(",",$data['sids']);
            $d['d']=explode(",",$data['dids']);
            $d['j']=explode(",",$data['jids']);
            if($d['s'][0]!=null)
            for($i=0;$i<count($d['s']);$i++){
                $res['s'][$i]=M('test')->where(array('id'=>$d['s'][$i]))->find();
            }
            if($d['d'][0]!=null)
            for($i=0;$i<count($d['d']);$i++){
                $res['d'][$i]=M('test')->where(array('id'=>$d['d'][$i]))->find();
            }
            if($d['j'][0]!=null)
            for($i=0;$i<count($d['j']);$i++){
                $res['j'][$i]=M('jtest')->where(array('id'=>$d['j'][$i]))->find();
            }
            $this->assign('res',$res);
            $this->assign('paper',$paper);

            $this->display();
        }else{
            $this->error('空白试卷');
        }
    }
    function slist(){//显示考试人员列表
        $pid=I('get.id');
        $stu=array();
        $data=M('grade')->where(array('pid'=>$pid))->select();

        if($data){
            for($i=0;$i<count($data);$i++)
            {

                $stu[$i]=M('student')->where(array('sid'=>$data[$i]['sid']))->find();
                $stu[$i]['gid']=$data[$i]['gid'];
                $stu[$i]['grade']=$data[$i]['score'];
                $stu[$i]['subtime']=$data[$i]['subtime'];
            }

            $this->assign('slist',$stu);
            $this->display();
        }else{
            $this->error('没有学生参加考试');
        }
    }
    function delGrade(){
        $gid=I('get.id');
        $re=M('grade')->where(array('gid'=>$gid))->delete();
        $res=M('answer')->where(array('gid'=>$gid))->delete();
        if($re&&$res){
            $this->success('删除成功');
        }else
            $this->error('删除失败');
    }
    function delTest(){
        $pid=I('get.id');
        $data=M('painfo')->where(array('pid'=>$pid))->find();
        if(false!==$data){
            if((false!==M('painfo')->where(array('pid'=>$pid))->delete())&&(false!==M('paper')->where(array('pid'=>$pid))->delete()))
                $this->success('删除成功！');
            else
                $this->error('删除失败！');
        }else
            $this->error('异常错误！');
    }
    function updateEditePname(){
        $pid=I('post.pid');
        $data['pname']=trim(I('post.pname'));
        $data['aid']=session('aid');
        if(M('painfo')->where(array('pname'=>$data['pname'],'aid'=>$data['aid']))->find())
            $this->error('试卷名冲突，请重新修改！');
        else{
           if( M('painfo')->where(array('pid'=>$pid))->save($data))
                $this->success('修改成功！');
            else
                $this->error('修改失败！');
        }
    }
    //查试卷名
    public function check(){
        //flag=1->重名
        $pid=I('post.pid');
        $ex=M("painfo")->where(array('aid'=>session('aid'),'pid'=>$pid))->find();
        if($ex)
            $ex['flag']=1;
        else{
            $ex['flag']=0;
        }
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
    //查试卷名是否重名
    public function checkR()
    {
        //flag=1->重名
        $pname=I('post.pname');
        $ex=M("painfo")->where(array('aid'=>session('aid'),'pname'=>$pname))->find();
        if($ex)
            $ex['flag']=1;
        else{
            $ex['flag']=0;
        }
        echo json_encode($ex, JSON_UNESCAPED_UNICODE);
    }
}