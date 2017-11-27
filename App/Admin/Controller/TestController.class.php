<?php
namespace Admin\Controller;
use Think\Controller;
class TestController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function manpaper()//获取手动生成试卷参数
    {
        $paper=array();
        $aid=session('aid');
        $paper['typeid']=I('post.typeid_m');
        $typename=M('type')->where(array('typeid'=> $paper['typeid']))->find()['typename'];
        $paper['pname']=I('post.pname_m');
        $paper['totaltime']=I('post.totaltime_m');
        $paper['examtime']=I('post.examtime_m');
        $paper['endtime']=I('post.endtime_m');
        $paper['code']=randCode(5);
        $paper['aid']=$aid;
        $pid=M('painfo')->data($paper)->add();
        if(0==$pid)
            $this->error('异常错误！');
        else
            session('pid',$pid);
        $data['s']=M('test')->where(array('aid'=>$aid,'typeid'=>$paper['typeid'],'tyid'=>'s'))->select();
        $data['d']=M('test')->where(array('aid'=>$aid,'typeid'=>$paper['typeid'],'tyid'=>'d'))->select();
        $data['j']=M('jtest')->where(array('aid'=>$aid,'typeid'=>$paper['typeid']))->select();
        $this->assign('paper',$paper);
        $this->assign('typename',$typename);
        $this->assign('data',$data);
        $this->display();
    }
    public function man()
    {
        $data['typeid']=$_REQUEST['typeid_m'];
        $data['pname']=$_REQUEST['pname_m'];
        $data['totaltime']=$_REQUEST['totaltime_m'];
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function num()//自动生成试卷各个类型题目的最大数
    {
        $data=array();
        $typeid=I('post.typeid');
       // echo $typeid."ska";
        $data['snum'] = M('test')->where(array('aid' => $_SESSION['aid'], 'typeid' => $typeid,'tyid'=>'s'))->count();
        $data['dnum'] = M('test')->where(array('aid' => $_SESSION['aid'], 'typeid' => $typeid,'tyid'=>'d'))->count();
        $data['jnum'] = M('jtest')->where(array('aid' => $_SESSION['aid'], 'typeid' => $typeid))->count();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function get()
    {
        $ex=M("type")->where(array('aid'=>session('aid')))->select();
        $data=array();
        for($i=0;$i<count($ex);$i++)
        {
            $data[$i]['typeid']=$ex[$i]['typeid'];
            $data[$i]['typename']=$ex[$i]['typename'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function check()
    {
        //flag=1->重名
        $typeid=$_REQUEST['typeid'];
        $pname=$_REQUEST['pname'];
        $ex=M("painfo")->where(array('aid'=>$_SESSION['aid'],'typeid'=>$typeid,'pname'=>$pname))->find();
        $data=array();
        if($ex)
            $data['flag']=1;
        else
            $data['flag']=0;
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public function autose()//随机生成试卷
    {

        $aid=session('aid');
        $typeid=trim(I('post.typeid'));
        $pname=trim(I('post.pname'));
        $snum=trim(I('post.snum'));
        $dnum=trim(I('post.dnum'));
        $jnum=trim(I('post.jnum'));
        $totaltime=trim(I('post.totaltime'));


        /*ps  当只生成一道题时，返回值不一样*/
        //随机生成单选题
        if(preg_match_all("/^[0-9]*$/",$snum)&&$snum!=0) {
            $data = M('test')->where(array('aid' =>$aid, 'typeid' => $typeid,'tyid'=>'s'))->select();

            $s = array();
            for ($i = 0; $i < count($data); $i++)
                $s[] = $data[$i]['id'];


            if($snum==1)
                $sk[0] = array_rand($s, $snum);
            else
                $sk = array_rand($s, $snum);
            $sids = array();
            for ($i = 0; $i < $snum; $i++) {
                $sre[$i] = M('test')->where(array('id' => $s[$sk[$i]]))->find();
                $sids[$i] = $sre[$i]['id'];
            }
            $sstr = implode($sids, ',');
        }
        //随机生成多选题
        if(preg_match_all("/^[0-9]*$/",$dnum)&&$dnum!=0) {
            $data = M('test')->where(array('aid' => $aid, 'typeid' => $typeid,'tyid'=>'d'))->select();
            $d = array();
            for ($i = 0; $i < count($data); $i++)
                $d[] = $data[$i]['id'];
            if($dnum==1)
                $dk[0] = array_rand($d, $dnum);
            else
                $dk = array_rand($d, $dnum);
            $dids = array();
            for ($i = 0; $i < $dnum; $i++) {
                $dre[$i] = M('test')->where(array('id' => $d[$dk[$i]]))->find();
                $dids[$i] = $dre[$i]['id'];
            }
            $dstr = implode($dids, ',');

        }
        //随机生成判断题
        if(preg_match_all("/^[0-9]*$/",$jnum)&&$jnum!=0) {
            $data = M('jtest')->where(array('aid' => $aid, 'typeid' => $typeid))->select();
            $j = array();
            for ($i = 0; $i < count($data); $i++)
                $j[] = $data[$i]['id'];
            if($jnum==1)
                $jk[0] = array_rand($j, $jnum);
            else
                $jk = array_rand($j, $jnum);
            $jids = array();
            for ($i = 0; $i < $jnum; $i++) {
                $jre[$i] = M('jtest')->where(array('id' => $j[$jk[$i]]))->find();
                $jids[$i] = $jre[$i]['id'];
            }
            $jstr = implode($jids, ',');
        }

        //$length  要生成的随机字符串长度 默认5
        //* @param string    $type    随机码类型：0，数字+小写字母；1，数字；2，小写字母；3，大写字母；-1，数字+大小写字母  默认为-1
        $str=randCode(5);
        $data=array();
        $data['pname']=$pname;
        $data['totaltime']=$totaltime;
        $data['typeid']=$typeid;
        $data['code']=$str;
        $data['examtime']=I('post.examtime');
        $data['endtime']=I('post.endtime');
        $data['aid']=$aid;
        // var_dump($data);
        $re=M('painfo')->data($data)->add();

        $pa=array();
        $pa['aid']=$aid;
        $pa['pid']=$re;
        $pa['sids']=$sstr;
        $pa['dids']=$dstr;
        $pa['jids']=$jstr;
        $r=M('paper')->data($pa)->add();
            if((false!==$re)&&(false!==$r))
            {
                $url=U('Painfo/painfolist');
                header("Location: $url");
            }
            else
                $this->error('试卷生成失败！');

    }
    public function sub()
    {
        $data=array();
        $id=I('post.id');
        $ans=I('post.ans');
        $num=count($data);
        for($i=0;$i<$num;$i++)
        {
            if($data[$i]['id']==$id){
                $data[$i]['ans']=$ans;
                break;
            }
            else{

                $data[$num]['id']=$id;
                $data[$num]['ans']=$ans;
                break;
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

    }

    public function getsids()
    {

        $code=M('painfo')->where(array('pid'=>15))->find();
        $num=M('paper')->where(array('aid'=>$_SESSION['aid'],'code'=>$code['code']))->find();

        $arr = explode(',',$num['sids']);
        echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
    public function getlist()
    {

        $code=M('painfo')->where(array('pid'=>15))->find();
        $num=M('paper')->where(array('aid'=>$_SESSION['aid'],'code'=>$code['code']))->find();
        //var_dump($num);

        $arr = explode(',',$num['sids']);
        //var_dump($arr);
        //var_dump($data);
        $test=array();
        for($i=0;$i<count($arr);$i++)
            $test[$i]=M('s_test')->where(array('s_id'=>$arr[$i]))->find();
        //var_dump($test);
        echo json_encode($test, JSON_UNESCAPED_UNICODE);
    }

    function addman(){
        //添加手动选题试卷
       $data['sids']= implode(",",$_POST['Check']['S']);
        $data['dids']= implode(",",$_POST['Check']['D']);
        $data['jids']= implode(",",$_POST['Check']['J']);
        $data['aid']=session('aid');
        $data['pid']=session('pid');
        $r=M('paper')->data($data)->add();
        if($r)
        {
            $url=U('Painfo/painfolist');
            header("Location:$url ");
        }
        else
            $this->error('试卷生成失败！');

    }



}
