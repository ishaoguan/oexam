<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/26
 * Time: 16:13
 */
namespace Home\Controller;
use Think\Controller;
class ChangepasswordController extends Controller {
    public function index(){
        $this->display();
    }
    public function change(){
        $o_p=md5(I('post.o_password'));
        $n1_p=md5(I('post.n1_password'));
        $n2_p=md5(I('post.n2_password'));
        /*var_dump($_POST);
        exit();*/
        $data=M('student')->where(array('id'=>$_SESSION['sid']))->find();
       if(strcmp($o_p,$data['password']))
       {
           $this->error("旧密码输入错误");
           $url=U('Changepassword/index');
           header("Location: $url");
       }
       elseif(!strcmp($o_p,$n1_p))
       {
           $this->error("新旧密码输入相同");
           $url=U('Changepassword/index');
           header("Location: $url");
       }
       elseif(strcmp($n2_p,$n1_p))
       {
           $this->error("确认密码输入不一致");
           $url=U('Changepassword/index');
           header("Location: $url");
       }
       else
       {
           $re['password']=$n1_p;
           $result=M('student')->where(array('id'=>$_SESSION['id']))->save($re);
           $url=U('Index/index');
           header("Location: $url");
       }

    }
}