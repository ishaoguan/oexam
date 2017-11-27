<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/10/8
 * Time: 21:14
 */
namespace Admin\Controller;
use Think\Controller;
class StudentController extends Controller
{
    public function index()
    {

        $this->display();
    }
    public function studentlist()
    {
        $student=M('student')->select();
       // var_dump($student);
        for($i=0;$i<count($student);$i++)
        {
            switch($student[$i]['degree'])
            {
                case 0:$student[$i]['degree']='小学';break;
                case 1:$student[$i]['degree']='初中';break;
                case 2:$student[$i]['degree']='高中';break;
                case 3:$student[$i]['degree']='大学';break;
                case 4:$student[$i]['degree']='研究生';break;
                case 5;$student[$i]['degree']='博士';break;
            }

        }
        $this->assign('student',$student);
        $this->display();
    }
    public function resetpassword(){
        $data['password']=md5("123456");
        $result=M('student')->where(array('sid'=>$_GET['id']))->save($data);
        /// echo $result;
        if(false!==$result)
            $this->success('密码重置成功');
        else
            $this->error('密码重置失败');
    }
    public function del(){
        //  var_dump($_GET);
        $result=M('student')->where(array('sid'=>$_GET['id']))->delete();
        /// echo $result;
        if($result)
            $this->success('删除成功');
        else
            $this->error('删除失败');
    }
    function mod(){
        $sid=I('get.id');
        $user=M('student')->where(array('sid'=>$sid))->find();
        if($user){
            $this->assign('user',$user);
            $this->display();
        }else{
            $this->error('数据异常');
        }

    }
}