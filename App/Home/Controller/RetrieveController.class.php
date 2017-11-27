<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 2016/9/20
 * Time: 22:07
 */

namespace Home\Controller;
use Think\Controller;
class RetrieveController extends Controller {
    public function index(){
        $pic=M('student')->where(array('sid'=>'17'))->find();
      //  var_dump($pic);
        $this->assign('pic',$pic);
        $this->display();
    }
}