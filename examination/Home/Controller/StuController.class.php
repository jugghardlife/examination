<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class StuController extends Controller {
    public function stuLogin()
    {
    	$this->display();
    }

    public function userLogin()
    {
    	$user = M('stu');
        $map = array();
        $map['stuNum']=$_POST['username'];
        //$map['pass']=md5($_POST['pass']);
        $map['stuPsw']=$_POST['pass'];
        $res=$user->where($map)->find();
        if($res==null){
            $this->error("用户名密码错误");
        }else{
            session("username",$res['stuName']);
            $this->success("登录成功");
        }
    }

    public function stuChoose()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
    	$this->display();
    }

    public function fill()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $this->display();
    }

    public function see()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $this->display();
    }


    public function stuScore()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $User = M('Stu');
        //调用count方法查询要显示的数据总记录数
        $count = $User->count();
        $page = new \Think\Page($count,2);
        // 分页显示输出
        $show = $page->show();
        $this->assign('page',$show);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $User_list = $User->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('doc_list',$User_list);
        $this->display();
    }

    public function revPsw()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $this->display();
    }

     public function stuLogout(){
        session(null);
        $this->success('退出成功！跳转中...',U('Home/Stu/stuLogin'));
    }

}