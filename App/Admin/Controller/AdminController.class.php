<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/12/12
 * Time: 8:27
 */
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller
{
    public function index()
    {
        $data=M('admin')->where(array('flag'=>0))->select();
        if($data)
        {
            $this->assign('list',$data);
            $this->display();
        }else{
            $this->error('异常错误');
        }

    }
    function typelist(){
        $id=I('get.id');
        session('aid', $id);
       // echo session('aname');
        session('tname',I('get.name'));
        $data=M('type')->where(array('aid'=>$id))->select();
        if($data){
            for($i=0;$i<count($data);$i++) {
                $data[$i]['count'] = M('test')->where(array('typeid' => $data[$i]['typeid']))->count() + M('jtest')->where(array('typeid' =>  $data[$i]['typeid']))->count();
            }
            $this->assign('typelist',$data);
            $this->display();
        }else{
            $this->error('该老师还没有上传题库',U('Admin/index'));
        }
    }
    function resetpwd(){
        $id=I('get.id');
        $data['pw']=md5("123456");
        $r=M('admin')->where(array('aid'=>$id))->save($data);
        if(false!==$r){
            $this->success('密码重置成为123456，请妥善保管！');
        }else{
            $this->error('密码重置失败！');
        }
    }
    function del(){
        $id=I('get.id');
        $r=M('admin')->where(array('aid'=>$id))->delete();
        if($r){
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

}
