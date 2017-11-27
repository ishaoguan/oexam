<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/20
 * Time: 13:34
 */


namespace Home\Controller;
use Think\Controller;

header("Content-Type:text/html; charset=utf-8");
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    public function login(){
       // var_dump($_POST);
        $username=trim(I('post.username'));
        $password=md5(trim(I('post.password')));
        $re=I('post.re');
        $result=M('student')->where(array('sname'=>$username,'password'=>$password))->find();
        //var_dump($result);
        if(!empty($_COOKIE['password'])){
            cookie('password',null);
        }
        if(!$result) {
            $this->error('密码输入错误');
        }
        else
        {
            session('pic', $result['pic']);
            session('user', $result['sname']);
            if($re){
                cookie('user',$username,3600*24*7);//记住我
                cookie('password',trim(I('post.password')),3600*24*7);//记住我
            }else{
                cookie('user',$username,3600*24*7);
            }
            session('sid', $result['sid']);
            $url=U('Student/testlist');
            header("Location: $url");
        }
    }
    public function logout(){
        session(null);
        $url=U('Index/index');
        header("Location: $url");
    }
}
