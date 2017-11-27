<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/27
 * Time: 10:54
 */
namespace Admin\Controller;
use Think\Controller;
class DtestController extends Controller
{
    public function form()
    {
        $this->display();
    }
    public function get()
    {
        $ex=M("painfo")->where(array('aid'=>$_SESSION['aid']))->select();
        $data=array();
        for($i=0;$i<count($ex);$i++)
        {
            $data[$i]['pid']=$ex[$i]['pid'];
            $data[$i]['pname']=$ex[$i]['pname'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}