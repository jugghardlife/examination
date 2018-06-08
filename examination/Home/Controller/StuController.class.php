<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class StuController extends Controller {
    public function stulogin()
    {
    	$this->display();
    }

    public function userlogin()
    {
    	$userinfo=I();
    	//file_put_contents('1.php',$userinfo);
    	// dump($userinfp);
    	$this->ajaxReturn($userinfo);
    }

    public function stuchoose()
    {
    	$this->display();
    }

    public function fill()
    {
        $this->display();
    }

    public function see()
    {
        $this->display();
    }
}