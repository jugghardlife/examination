<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
 //    public function index(){
	// // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
 //    	echo "Admin";
 //    }
    public function adminLogin()
    {
    	$this->display();
    }

    public function adminLoginU()
    {
        $admin = M('admin');
        $map = array();
        $map['adminName']=$_POST['username'];
        //$map['pass']=md5($_POST['pass']);
        $map['adminPsw']=$_POST['pass'];
        $res=$admin->where($map)->find();
        if($res==null){
            $this->error("用户名密码错误");
        }else{
            session("username",$res['adminName']);
            $this->success("登录成功");
        }
    }

    public function adminChoose()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
    	$this->display();
    }

    public function adminScore()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
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

    public function adminAmpsw()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
    	$this->display();
    }

    public function classInt()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $this->display();
    }

    public function pswStuA()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $this->display();
    }

    public function changeClass()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $this->display();
    }

    public function impAllStu()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $this->display();
    }


    public function adminLogout(){
        session(null);
        $this->success('退出成功！跳转中...',U('Admin/Index/stuLogin'));
    }

    public function adminUploadAll(){  
        $upload=new \Think\Upload();                                //实例化上传类  
        $upload->maxSize   =     3145728;                           //设置附件上传大小  
        $upload->exts      =     array('xlsx','xls');               //设置附件上传类型  
        $upload->rootPath  =      './Uploads/';                     //设置附件上传根目录(没有则需手动新建)  
        $upload->savePath  =      '';                               //设置附件上传（子）目录  
                                                                    //上传文件  
         $info   =   $upload->upload();  
        if(!$info){                                                 //上传错误提示错误信息  
            $this->error($upload->getError()); 
            file_put_contents("1.php", "error");
            die(); 
             
        }else{                                                      //上传成功获取上传文件信息  
            foreach($info as $file){  
                //echo $file['savepath'].$file['savename'];  
                //这里的路径为网站根目录下Uploads/2016-02-19/56c7056f732ff.xlsx  
                $filePath="Uploads/".$file['savepath'].$file['savename'];  
                //等价于             
                //$filePath = __ROOT__."Uploads/" .$file['savepath'].$file['savename'];  
            }         

                file_put_contents("1.php", $filePath);
                die();
                echo "<h3>".$filePath."文件上传成功！</h3><p>";  
                //上传成功则开始导入到mysql中  
                $result=$this->importExcel($filePath);  
                echo $result['message'];     
        }        
    }  
}