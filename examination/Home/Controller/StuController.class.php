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
        // $str = var_export($res,TRUE);
        // file_put_contents("1.php",$str);
        // die(); 
        if($res==null){
            $this->error("用户名密码错误");
        }else{
            // session("username",$res['stuName']);
             $sessions = array('username'=>$res['stuName'], 'stuNum'=>$res['stuNum']);
            session("sessions",$sessions);
            //  $str = var_export($sessions,TRUE);
            // file_put_contents("1.php",$str);
            // die(); 
            // json_encode("1");
            $this->success("登录成功");
        }
    }

    public function stuChoose()
    {
        if(!($_SESSION['sessions']['stuNum'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
    	$this->display();
    }

    public function fill()
    {
        if(!($_SESSION['sessions']['stuNum'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $stu = M('stu');
        $map['stuNum']= $_SESSION['sessions']['stuNum'];
        $res=$stu->where($map)->find();
        // $str = var_export($res,TRUE);
        // file_put_contents("1.php",$str);
        // die(); 
        $this->assign('stu',$res);
        $this->display();
    }

    public function stu_fill()
    {
        $stu = M('stu');
        $where["stuNum"] = I("stuNum");
        $data["stuVola"] = I("stuVola");
        $data["stuVolb"] = I("stuVolb");
        $data["stuVolc"] = I("stuVolc");
        $data["stuVold"] = I("stuVold");
        $stu->where($where)->save($data); 
        if($stu)
        {
            $this->success('提交成功');
        }
    }

    public function see()
    {
        if(!($_SESSION['sessions']['stuNum'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $stu = M('stu');
        $map['stuNum']= $_SESSION['sessions']['stuNum'];
        $res=$stu->where($map)->find();
        $this->assign('stu',$res);
        // $str = var_export($res,TRUE);
        // file_put_contents("1.php",$str);
        // die(); 
        $this->display();
    }


    public function stuScore()
    {
        if(!($_SESSION['sessions']['stuNum'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $User = M('Stu');
        //调用count方法查询要显示的数据总记录数
        $count = $User->count();
        $page = new \Think\Page($count,10);
        // 分页显示输出
        $show = $page->show();
        $this->assign('page',$show);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $User_list = $User->order('stuR')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('doc_list',$User_list);
        // dump($User_list);
        $this->display();
    }

    public function revPsw()
    {
        if(!($_SESSION['sessions']['stuNum'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Stu/stuLogin', 0);
        }
        $this->display();
    }

    public function modPsw()
    {
        //$test =I();
        $stu = M('stu');
        $map = array();
        $map['stuNum']=$_POST['stuNum'];
        //$map['pass']=md5($_POST['pass']);
        $map['stuPsw']=$_POST['oldPsw'];
        $res=$stu->where($map)->find();
        if(!$res)
        {
            $this->error('密码错误');
        }
        $res['stuPsw']=$_POST['newPsw'];

        $flag=$stu->where($map)->save($res);
        if($flag){
            session(null);
            $this->success('退出成功！跳转中...',U('Home/Stu/stuLogin'));
        }
    }

     public function stuLogout(){
        session(null);
        $this->success('退出成功！跳转中...',U('Home/Stu/stuLogin'));
    }

}