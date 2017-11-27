<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/24
 * Time: 16:08
 */
namespace Home\Controller;
use Think\Controller;
class UserinfoController extends Controller {
    public function index(){
        $user=M('student')->where(array('sid'=>$_GET['id']))->find();
      //dump($user);
        if($user){
           // $user['gender']==0?$user['man']="checked":$user['lady']="checked";
            $this->assign('user',$user);
            $this->display();
        }else{
            $this->error('未知错误');
            $url=U('Student/index');
            header("Location: $url");
        }
    }
    public function update(){
//        dump($_POST);
//        dump($_FILES);
        $data['gender']=I('post.gender');
        $data['birthdate']=I('post.birthdate');
        $data['degree']=I('post.degree');
        $data['intro']=I('post.intro');
        if(!empty($_FILES['pic']['name'])){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/Upload/'; // 设置附件上传根目录
            //// 上传单个文件
            $info = $upload->uploadOne($_FILES['pic']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }
            $data['pic']=$info['savepath'].$info['savename'];
          //  echo $data['pic'];
        }
        //var_dump($data);
        //echo $_SESSION['id'];
       // echo $data['pic'];
        $re=M('student')->where(array('sid'=>session('sid')))->find();
        $pic=$re['pic'];
        //echo $pic."<br>";
        $result=M('student')->where(array('sid'=>session('sid')))->save($data);
        //var_dump($result);
        if(false!==$result){
           // $this->success('资料修改成功');
            if((!empty($pic))&&($data['pic'])) {
                $filepath = "./Public/Upload/".$pic;
                unlink($filepath);
            }
            $a=M('student')->where(array('sid'=>session('sid')))->find();
            $npic=$a['pic'];
           /* echo $npic;
            exit();*/
            session('pic',$npic);
            $url=U('Student/testlist');
            header("Location: $url");
        }
        else{
            $this->error('资料修改失败');
        }
    }

}