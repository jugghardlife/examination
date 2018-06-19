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
            $sessions = array('username'=>$res['adminName'], 'stuNum'=>$res['stuNum']);
            session("sessions",$sessions);
            json_encode("1");
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

                
                echo "<h3>".$filePath."文件上传成功！</h3><p>";  
                //上传成功则开始导入到mysql中  
                $result=$this->importExcel($filePath);  
                echo $result['message'];     
        }        
    }  


    public function importExcel($file){  
        if(!file_exists($file)){  
            return array("error"=>0,'message'=>'file not found!');  
        }        
        vendor("PHPExcel.Classes.PHPExcel.IOFactory");  
        //出现：Class 'Admin\Controller\PHPExcel_IOFactory' not found  
        //注意这儿加了一个"\"表示调用公共空间，也可以理解为顶层  
        //$objReader = \PHPExcel_IOFactory::createReader('Excel5');  
        //获取excel文件:获取Excel第1张表即（Sheet1）  
        $objPHPExcel= \PHPExcel_IOFactory::load($file);  
        $objPHPExcel->setActiveSheetIndex(0);  
        $sheet1=$objPHPExcel->getSheet(0);  
        //获取行数，并把数据读取出来$data数组  
        $rowCount=$sheet1->getHighestRow();//excel行数  
        $data=array();  
        for($i=2;$i<=$rowCount;$i++){  
            $item['stuR']=$sheet1->getCellByColumnAndRow(1,$i)->getValue();
            $item['stuNum']=$sheet1->getCellByColumnAndRow(2,$i)->getValue();  
            $item['stuPsw']=$sheet1->getCellByColumnAndRow(3,$i)->getValue();  
            $item['stuName']=$sheet1->getCellByColumnAndRow(4,$i)->getValue();  
            $item['stuClass']='';  
            $item['stuS1']=$sheet1->getCellByColumnAndRow(6,$i)->getValue();  
            $item['stuS2']=$sheet1->getCellByColumnAndRow(7,$i)->getValue();  
            $item['stuS3']=$sheet1->getCellByColumnAndRow(8,$i)->getValue();  
            $item['stuS4']=$sheet1->getCellByColumnAndRow(9,$i)->getValue();  
            $item['stuS5']=$sheet1->getCellByColumnAndRow(10,$i)->getValue();  
            $item['stuS6']=$sheet1->getCellByColumnAndRow(11,$i)->getValue(); 
            $item['stuVola']=''; 
            $item['stuVolb']=''; 
            $item['stuVolc']=''; 
            $item['stuVold']=''; 
            $item['stuTot']=$item['stuS1']+$item['stuS2']+$item['stuS3']+$item['stuS4']+$item['stuS5']+$item['stuS6'];  
            $item['stuAverage']=$item['stuTot']/6;  
            $item['consumption_total']=$sheet1->getCellByColumnAndRow(14,$i)->getValue();        
            $item['stuDate']=date("Y-m-d H:i:s");
            $data[]=$item;
        }        
        $success=0;  
        $error=0;  
        $sum=count($data);  
        foreach($data as $k=>$v){  
            if(M('Stu')->data($v)->add()){  
                $success++;  
            }else{  
                $error++;  
            }  
        }  
       
        echo "<h3>总{$sum}条，成功{$success}条，失败{$error}条</h3>";      
        return array("error"=>0,'message'=>'import is succussful!');  
    }  

    public function expUser(){
       // $p_name = $_POST['order_p_name'];
        $m = M ('Stu');
       // $datas['order_p_name'] = $p_name;
        $data = $m->order('stuR')->field('stuR,stuNum,stuName,stuClass,stuS1,stuS2,stuS3,stuS4,stuS5,stuS6,stuVola,stuVolb,stuVolc,stuVold,stuTot,stuAverage')->select();
        // foreach ($data as $k => $v)
        // {
        //     $data[$k]['order_time']=date('Y-m-d-H-i-s');
        // }
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename="test_excel";
        $headArr=array("排名","学号","姓名","班级","成绩1","成绩2","成绩3","成绩4","成绩5","成绩6","志愿A","志愿B","志愿C","志愿D","总成绩","平均分");
        $this->getExcel($filename,$headArr,$data);
    }

    private function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }
        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        vendor("PHPExcel.Classes.PHPExcel.IOFactory"); 
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

       

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
}