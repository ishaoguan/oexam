<?php
namespace Admin\Controller;
use Think\Controller;
class TeacherController extends Controller
{
    public function index()
    {
            $this->display();
    }
    function typelist(){
        $id=I('get.id');
        session('tname',I('get.name'));
        $data=M('type')->where(array('aid'=>$id))->select();
        if($data){
            $this->assign('typelist',$data);
            $this->display();
        }else{
            $this->error('该老师还没有上传题库');
        }
    }

}