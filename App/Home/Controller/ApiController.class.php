<?php

namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller{
	function login(){
		$name=I('get.name');
		$pwd=I('get.password');
		$re=M('student')->where(array('sname'=>$name,'password'=>md5($pwd)))->find();
		if($re){
			echo 'success_'.$re['sid'];
		}else{
			echo 'false';
		}
	}
	function isName(){
		$name=I('get.name');
		$re=M('student')->where(array('sname'=>$name))->find();
		if($re){
			echo 'success';
		}else{
			echo 'false';
		}
	}
	function uploadImage(){
		$imgName=I('get.filename');
		$body=I('get.filebody');
		$filePath='./Public/Upload/user/'.$imgName;
		$newFile = fopen($filePath,"w"); //打开文件准备写入
		fwrite($newFile,$body); //写入二进制流到文件
		fclose($newFile); //关闭文件
		if(file_exists($filePath)){
			echo 'success';
		}else{
			echo 'false';
		}
	}
	function register(){
		$data['sname']=I('get.name');
		$data['password']=md5(I('get.password'));
		$data['name']=I('get.name');
		$data['pic']=I('get.picture');
		$re=M('student')->where(array('sname'=>$data['sname']))->find();
		if($re){
			echo '-1';
		}else{
				$r=M('student')->data($data)->add();
				if($r){
					echo '1';
				}else{
					echo '0';
				}
			}
	}
	function testlist(){
			$id=I('get.id');
			$grademodel=M('grade');
			$data=$grademodel->where(array('sid'=>$id))->select();
			$records=count($data);
			for($i=0;$i<$records;$i++){
					$painfolist[$i]=M('painfo')->where(array('pid'=>$data[$i]['pid']))->find();
					$painfolist[$i]['score']=$data[$i]['score'];
					$painfolist[$i]['subtime']=$data[$i]['subtime'];
					$painfolist[$i]['gid']=$data[$i]['gid'];
			}
			$this->assign('painfolist',$painfolist);
			exit(json_encode($painfolist));
	}

    function delgrade(){
        $id=I('get.id');
        $r=M('grade')->where(array('gid'=>$id))->delete();
        $re=M('answer')->where(array('gid'=>$id))->delete();
        if($r&&$re){
            echo '1';//删除成功
        }else{
            echo '0';//删除失败
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
            //$this->assign('res',$res);
            //var_dump($res);
            exit(json_encode($res));
            $this->assign('paper',$paper);
            //var_dump($paper);
            exit(json_encode($paper));
//            $this->display();
        }else{
            echo '0';
        }
    }
		public function paper()//输入试卷码，获取该试卷所有题目
    {
        $cod=I('get.code');
        $p=M('painfo')->where(array('code'=>$cod))->find();
        $code=M('painfo')->where(array('pid'=>$p['pid']))->find();
        if(false!==$code) {
            $num = M('paper')->where(array('pid' => $code['pid']))->find();
            //ssion('pid',$pid);
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
        //ar_dump($test_s);

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
        //ar_dump($test_j);
        $this->assign('test_j',$test_j);
        //$this->display();
//        var_dump($test_s);
//        var_dump($test_d);
//        var_dump($test_j);
				$a['pid']=$p['pid'];
        $a['s']=$test_s;
        $a['d']=$test_d;
        $a['j']=$test_j;
        exit(json_encode($a));
    }

function fen(){//获取分数
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
                exit(json_encode($dat));
                exit(json_encode($paper));
            }
        }else{
            echo '空白试卷';
        }
    }
 function userinfo(){//用户信息
        $sid=I('get.id');
        $uid=M('student')->where(array('sid'=>$sid))->find();
        $s=M('grade');
        $sums=$s->where("sid=$sid")->sum('score');
        $data=$s->where(array('sid'=>$sid))->select();
        $records=count($data);
        $avs=ceil($sums/$records);
        $uid['count']=$records;//count为答题次数
        $uid['score']=$avs;//score为平均成绩
        exit(json_encode($uid));//用户信息
    }
		public function tips(){//输入试卷码，获取试卷
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
		            exit(json_encode($p));
		        }
		        else{
		            echo "0";//没有找到相关试卷,请确认试卷码输入是否正确
		        }
		    }
				function ans(){
        $data = file_get_contents('php://input');
        $json = "{\"paper\":$data}";
        $da = json_decode($json, true);
        $ta=$da['paper']['s'];

        $nu=count($ta);
        $ns=0;
        $nd=0;$ad=0;
        $nj=0;$aj=0;
        for($m=0;$m<$nu;$m++){
            if($da['paper']['s'][$m]['tyid']=="s"){
                $ds['s'][$m]=$da['paper']['s'][$m]['ans'];
                $ns++;
            }elseif ($da['paper']['s'][$m]['tyid']=="d"){
                $dd['d'][$ad]=$da['paper']['s'][$m]['ans'];
                $ad++;
                $nd++;
            }elseif ($da['paper']['s'][$m]['tyid']=="y"){
                $dj['j'][$aj]=$da['paper']['s'][$m]['ans'];
                $aj++;
                $nj++;
            }
        }
        $score=0;
        //计算成绩
        $ans=array();
        $s=0;
        if($ns!=0){
            for($ns;$ns>0;$ns--)
            {
                $ans['s'][$s]=$ds['s'][$s];
                $rs=M('test')->where(array('id'=>$ta[$s]['id']))->find();
                if(false!==$rs){
                    if(trim($rs['ans'])==trim($ans['s'][$s]))
                        $score++;
                    $s++;
                }else{
                    $this->error('异常错误');
                }
            }
        }
        $i=$s;
        $d=0;
        if($nd!=0){
            for ($nd;$nd>0;$nd--)
            {
                $ans['d']=$dd['d'];
                $rd=M('test')->where(array('id'=>$ta[$i]['id']))->find();
                if(false!==$rd){
                    if(trim($rd['ans'])==trim($ans['d'][$d]))
                        $score++;
                    $d++;
                    $i++;
                }else{
                    $this->error('异常错误');
                }
            }
        }
        $j=0;
        if($nj!=0){
            for ($nj;$nj>0;$nj--)
            {
                $ans['j']=$dj['j'];
                $rj=M('jtest')->where(array('id'=>$ta[$i]['id']))->find();
                if(false!==$rj){
                    if(trim($rj['ans'])== trim($ans['j'][$j]))
                        $score++;
                    $j++;
                    $i++;
                }
                else{
                    $this->error('异常错误');
                }
            }
        }
        $date['sid']=$da['paper']['id'];
        $date['pid']=$da['paper']['s'][0]['typeid'];
        $date['score']=$score/$nu*100;
        $date['subtime']=date('Y-m-d H:i:s');

        $re=M('grade')->data($date)->add();
        if($re){
            $a['sans']=implode(',',$ans['s']);
            $a['dans']=implode(',',$ans['d']);
            $a['jans']=implode(',',$ans['j']);
            $a['gid']=$re;
            $res=M('answer')->data($a)->add();
            if($res){
							$result['result']="1";
							exit(json_encode($result));
            }else{
							$result['result']="0";
							exit(json_encode($result));
            }
        }else{
					$result['result']="-1";
					exit(json_encode($result));
        }
    }

}
