<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function login(){
        // var_dump($_POST);
        $username=trim(I('post.username'));
        $password=trim(I('post.pwd'));
        $re=I('post.re');
        //echo $re;
       // echo $password;
        $result=M('admin')->where(array('name'=>$username,'pw'=>md5($password)))->find();
        //var_dump($result);
        if(!empty($_COOKIE['password'])){
            cookie('password',null);
        }
        if(!$result) {
            $this->error('密码输入错误');
        }
        else
        {
            session('aid',$result['aid']);
            if($re){
                //session('user', $result['user']);
                cookie('admin',$username,3600*24*7);//记住我
                cookie('pwd',trim(I('post.pwd')),3600*24*7);//记住我
            }else{
                cookie('admin',$username,3600*24*7);
            }
            if($result['flag']==0){
                $url=U('Teacher/index');
                session('pict', $result['pic']);
                session('tname', $result['name']);
            }
            else{
                $url=U('Admin/index');
                session('pica', $result['pic']);
                session('aname', $result['name']);
            }
            header("Location: $url");
//            var_dump($result);
//            echo $_SESSION['user'];
//            echo $_SESSION['pic'];
        }
    }
    public function logout(){
        session(null);
        $url=U('Home/Index/index');
        header("Location: $url");
    }
}