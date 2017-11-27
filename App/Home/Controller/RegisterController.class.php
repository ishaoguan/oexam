<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/19
 * Time: 18:48
 */

namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html; charset=utf-8");
class RegisterController extends Controller
{
    public function index()
    {
        $this->display();
    }
    public function index_a()
    {
        $this->display();
    }
    public function add()
    {
        //  header("Content-Type:text/html; charset=utf-8");
        $data['sname'] = trim(I('post.sname'));
        $data['password'] = md5(trim(I('post.password')));
        $data['gender'] = I('post.gender');
        $data['birthdate'] = I('post.birthdate');
        $data['degree'] = I('post.degree');
        $data['intro'] = I('post.intro');
        $data['studentid'] = I('post.studentid');
        //echo $name;
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
        $result=M('student')->where(array('sname'=>$data['sname']))->find();
        if($result)
        $this->error('用户名重复！', U("Register/index"));
        else{
            M('student')->add($data);
            //var_dump($data);
            $url=U('Login/index');
            header("Location: $url");
            exit(0);
        }
    }
    public function add_t()
    {
        //  header("Content-Type:text/html; charset=utf-8");
        $data['name'] = trim(I('post.tname'));
        $data['pw'] = md5(trim(I('post.password')));
        $data['realname']=I('post.rname');
        $data['telephone']=I('post.tele');
        $data['email']=I('post.email');
        //echo $name;
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
        $result=M('admin')->where(array('name'=>$data['name']))->find();
        if($result)
            $this->error('用户名重复！', U("Register/index_t"));
        else{
            M('admin')->add($data);
            //var_dump($data);
            $url=U('Index/index');
            header("Location: $url");
            exit(0);
        }
    }
}
