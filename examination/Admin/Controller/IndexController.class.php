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
            session("username",$res["adminName"]);
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
        $page = new \Think\Page($count,10);
        // 分页显示输出
        $show = $page->show();
        $this->assign('page',$show);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $User_list = $User->order('stuR')->limit($page->firstRow.','.$page->listRows)->select();
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

    public function pswStuInfo()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $Stu = M('Stu');
        $map["stuNum"]=I("stuNum");
        $res=$Stu->where($map)->find();
        $this->ajaxReturn($res, 'JSON');
    }

    public function pswStuR()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $Stu = M('Stu');
        $map["stuNum"]=I("stuNum");
        $data["stuPsw"]="123";
        $res=$Stu->where($map)->save($data);
        $this->ajaxReturn($res, 'JSON');
    }

    public function modPsw()
    {
        $admin = M('admin');
        $map = array();
        $map['adminName']=$_POST['stuNum'];
        //$map['pass']=md5($_POST['pass']);
        $map['adminPsw']=$_POST['oldPsw'];
        $res=$admin->where($map)->find();
        if(!$res)
        {
            $this->error('密码错误');
        }
        $res['adminPsw']=$_POST['newPsw'];

        $flag=$admin->where($map)->save($res);
        if($flag){
            session(null);
            $this->success('退出成功！跳转中...');
        }
    }

    public function changeClass()
    {
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }

        $Stu = M('Stu');
        $map["stuClass"]=1;
        $res=$Stu->order('stuR')->where($map)->select();

        // $str = var_export($res,TRUE);
        // file_put_contents("1.php",$str);
        // die(); 
        $c=count($res);
        $this->assign('doc_list',$res);
        $this->assign('c',$c);
        $this->display();
    }

    public function clasaInfo(){
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }

        $Stu = M('Stu');
        $map["stuClass"]=I("change_select_val");

        $res=$Stu->order('stuR')->where($map)->select();

        // $str = var_export($res,TRUE);
        // file_put_contents("1.php",$str);
        // die();
        $this->ajaxReturn($res, 'JSON');
    }

    public function see_btn(){
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $Stu = M('Stu');
        $map["stuNum"]=I("see_btn_val");
        $res=$Stu->where($map)->find();
        $this->ajaxReturn($res, 'JSON');
        // $str = var_export($map,TRUE);
        // file_put_contents("1.php",$str);
        // die();
    }

    public function del_btn(){
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $Stu = M('Stu');
        $map["stuNum"]=I("del_num");
        $res=$Stu->where($map)->delete();
        $this->ajaxReturn($res, 'JSON');
    }

    public function change_btn(){
        if(!($_SESSION['username'])){
            // redirect('Stu/stuLogin', 0, '页面跳转中...');
            $this->redirect('Index/adminLogin', 0);
        }
        $Stu = M('Stu');
        $map["stuNum"]=I("stuNum");
        $data["stuClass"]=I("changeClassNum");

        $res=$Stu->where($map)->save($data);
        if($res){
            $this->success('修改成功');
        }

    }


    public function expClass()
    {   
        $m = M ('Stu');
        $map["stuClass"]=$_GET['stuClass']; 
        $data = $m->order('stuR')->where($map)->field('stuR,stuNum,stuName,stuClass,stuS1,stuS2,stuS3,stuS4,stuS5,stuS6,stuVol1,stuVol2,stuVol3,stuVol4,stuTot,stuAverage')->select();

        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
        $filename="test_excel";
        $headArr=array("排名","学号","姓名","班级","成绩1","成绩2","成绩3","成绩4","成绩5","成绩6","志愿A","志愿B","志愿C","志愿D","总成绩","平均分");
        $this->getExcel($filename,$headArr,$data);
        // $str = var_export($data,TRUE);
        // file_put_contents("1.php",$str);
        // die();
    }

    public function addStudentA(){
        $this->display();
    }

    public function addStuA(){


        $stu = M ('Stu');
        $map["stuClass"]=I("stuClass");
        $data["stuName"]=I("stuName");
        $data["stuClass"]=I("stuClass");
        $data["stuNum"]=I("stuNum");
        $data["stuS1"]=I("stuS1");
        $data["stuS2"]=I("stuS2");
        $data["stuS3"]=I("stuS3");
        $data["stuS4"]=I("stuS4");
        $data["stuS5"]=I("stuS5");
        $data["stuS6"]=I("stuS6");
        $data["stuVol1"]=I("stuVola");
        $data["stuVol2"]=I("stuVolb");
        $data["stuVol3"]=I("stuVolc");
        $data["stuVol4"]=I("stuVold");
        $data["stuTot"]=I("stuS6")+I("stuS1");+I("stuS2");+I("stuS3");+I("stuS4");+I("stuS5");;
        $data["stuAverage"]=$data["stuTot"]/6;
        $data["stuDate"]=date("Y-m-d H:i:s");
        $num=$stu->select();
        $stuNum=count($num);
        $data["stuR"]=$stuNum+1;
        $res=$stu->add($data);
        if($res)
        {
           $this->success('添加成功');
        }
        // $str = var_export($data,TRUE);
        // file_put_contents("1.php",$str);
        // die();
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
        $stu = M ('Stu'); 
        $flag=count($stu->select());
        if($flag!=0)
        {
            $this->ajaxReturn("4", 'JSON');
            return ;
        }
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

                
                echo "文件上传成功！";  
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
            $item['stuR']="";
            $item['stuNum']=$sheet1->getCellByColumnAndRow(2,$i)->getValue();  
            $item['stuPsw']=$sheet1->getCellByColumnAndRow(3,$i)->getValue();  
            $item['stuName']=$sheet1->getCellByColumnAndRow(4,$i)->getValue();  
            $item['stuClass']=0;  
            $item['stuS1']=$sheet1->getCellByColumnAndRow(6,$i)->getValue();  
            $item['stuS2']=$sheet1->getCellByColumnAndRow(7,$i)->getValue();  
            $item['stuS3']=$sheet1->getCellByColumnAndRow(8,$i)->getValue();  
            $item['stuS4']=$sheet1->getCellByColumnAndRow(9,$i)->getValue();  
            $item['stuS5']=$sheet1->getCellByColumnAndRow(10,$i)->getValue();  
            $item['stuS6']=$sheet1->getCellByColumnAndRow(11,$i)->getValue(); 

            if($sheet1->getCellByColumnAndRow(12,$i)->getValue()){
                $item['stuVol1']=$sheet1->getCellByColumnAndRow(12,$i)->getValue();
            }else{
                $item['stuVol1']=0;
            }

            if($item['stuVol2']=$sheet1->getCellByColumnAndRow(13,$i)->getValue()){
                $item['stuVol2']=$sheet1->getCellByColumnAndRow(13,$i)->getValue();
            }else{
                $item['stuVol2']=0;
            }

            if($sheet1->getCellByColumnAndRow(14,$i)->getValue()){
                $item['stuVol3']=$sheet1->getCellByColumnAndRow(14,$i)->getValue(); 
            }else{
                $item['stuVol3']=0;
            }

            if($sheet1->getCellByColumnAndRow(15,$i)->getValue()){
                $item['stuVol4']=$sheet1->getCellByColumnAndRow(15,$i)->getValue(); 
            }else{
                $item['stuVol4']=0;
            }
            // $item['stuVol1']=$sheet1->getCellByColumnAndRow(12,$i)->getValue(); 
            // $item['stuVol2']=$sheet1->getCellByColumnAndRow(13,$i)->getValue(); 
            // $item['stuVol3']=$sheet1->getCellByColumnAndRow(14,$i)->getValue(); 
            // $item['stuVol4']=$sheet1->getCellByColumnAndRow(15,$i)->getValue(); 
            $item['stuTot']=$item['stuS1']+$item['stuS2']+$item['stuS3']+$item['stuS4']+$item['stuS5']+$item['stuS6'];  
            $item['stuAverage']=$item['stuTot']/6;  
            // $item['consumption_total']=$sheet1->getCellByColumnAndRow(14,$i)->getValue();        
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

        $Stu = M ('Stu');
        $data = $Stu->order('stuAverage DESC')->select();  
        foreach ($data as $key => $value) 
        {
           $data[$key]["stuR"]=($key+1);
        }

        foreach($data as $k=>$v){  
            $Stu->data($v)->save();
        } 
       
        echo "总{$sum}条，成功{$success}条，失败{$error}条";      
        return array("error"=>0);  
    }  

    public function expUser(){
       // $p_name = $_POST['order_p_name'];
        $m = M ('Stu');
       // $datas['order_p_name'] = $p_name;
        $data = $m->order('stuR')->field('stuR,stuNum,stuName,stuClass,stuS1,stuS2,stuS3,stuS4,stuS5,stuS6,stuVol1,stuVol2,stuVol3,stuVol4,stuTot,stuAverage')->select();
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

    // public function divide()
    // {
    //     $Stu = M ('Stu');
    //     //进行分班
    //     for($i=1;$i<5;$i++)
    //     {
    //         //得到志愿
    //         $data1 = $Stu->where("stuVol".$i."=1 AND stuClass=0")->order('stuAverage DESC')->select();
    //         $data2 = $Stu->where("stuVol".$i."=2 AND stuClass=0")->order('stuAverage DESC')->select();
    //         $data3 = $Stu->where("stuVol".$i."=3 AND stuClass=0")->order('stuAverage DESC')->select();
    //         $data5 = $Stu->where("stuVol".$i."=4 AND stuClass=0")->order('stuAverage DESC')->select();
    //         //得到志愿的人数
    //         $data1Len=count($data1);
    //         $data2Len=count($data2);
    //         $data3Len=count($data3);
    //         $data5Len=count($data5);
    //         //查找班级的人数
    //         $ClassN1 = count($Stu->where("stuClass=1")->order('stuAverage DESC')->select());
    //         $ClassN2 = count($Stu->where("stuClass=2")->order('stuAverage DESC')->select());
    //         $ClassN3 = count($Stu->where("stuClass=3")->order('stuAverage DESC')->select());
    //         $ClassN5 = count($Stu->where("stuClass=5")->order('stuAverage DESC')->select());

    //         if(24>$ClassN1)//看班级是否分满
    //         {
    //             if((24-$ClassN1)<$data1Len){//填报志愿人数超过班级的人数
    //                 $newData1=array();
    //                 $item1=array();
    //                 for($i=0;$i<(24-$ClassN1);$i++)
    //                 {
    //                     $item1[]=$data1[$i];
    //                     $item1[$i]["stuClass"]=1;
    //                 }
    //                 // array_splice($data1,0,(24-$ClassN1));
    //                 $newData1=$item1;
                    
    //                 foreach($newData1 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else//填报志愿人数没超过班级的人数
    //             {
    //                 foreach ($data1 as $key => $value) 
    //                 {
    //                    $data1[$key]["stuClass"]=1;
    //                 }

    //                 foreach($data1 as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }

    //         if(30>$ClassN2)
    //         {
    //             if((30-$ClassN2)<$data2Len){
    //                 $newData2=array();
    //                 $item2=array();
    //                 for($i=0;$i<(30-$ClassN2);$i++)
    //                 {
    //                     $item2[]=$data2[$i];
    //                     $item2[$i]["stuClass"]=2;
    //                 }
    //                 // array_splice($data2,0,(24-$ClassN1));
    //                 $newData2=$item2;
                    
    //                 foreach($newData2 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($data2 as $key => $value) 
    //                 {
    //                    $data2[$key]["stuClass"]=2;
    //                 }

    //                 foreach($data2 as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }

    //         if(60>$ClassN3)
    //         {
    //             if((60-$ClassN3)<$data3Len){
    //                 $newData3=array();
    //                 $item3=array();
    //                 for($i=0;$i<(60-$ClassN3);$i++)
    //                 {
    //                     $item3[]=$data3[$i];
    //                     $item3[$i]["stuClass"]=3;
    //                 }
    //                 // array_splice($data3,0,(60-$ClassN3));
    //                 $newData3=$item3;
                    
    //                 foreach($newData3 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($data3 as $key => $value) 
    //                 {
    //                    $data3[$key]["stuClass"]=3;
    //                 }

    //                 foreach($data3 as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }
    //         if(30>$ClassN5)
    //         {
    //             if((30-$ClassN5)<$data1Len){
    //                 $newData5=array();
    //                 $item5=array();
    //                 for($i=0;$i<(30-$ClassN5);$i++)
    //                 {
    //                     $item5[]=$data5[$i];
    //                     $item5[$i]["stuClass"]=5;
    //                 }
    //                 // array_splice($data4,0,(30-$ClassN4));
    //                 $newData5=$item5;
    //                 foreach($newData5 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($data5 as $key => $value) 
    //                 {
    //                    $data5[$key]["stuClass"]=5;
    //                 }

    //                 foreach($data5 as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }
    //         $Class0 = count($Stu->where("stuClass=0")->order('stuAverage DESC')->select());
    //         $Class1 = count($Stu->where("stuClass=1")->order('stuAverage DESC')->select());
    //         $Class2 = count($Stu->where("stuClass=2")->order('stuAverage DESC')->select());
    //         $Class3 = count($Stu->where("stuClass=3")->order('stuAverage DESC')->select());
    //         $Class5 = count($Stu->where("stuClass=5")->order('stuAverage DESC')->select());
    //     }


    //     //处理剩下学生
    //     $Class1 = count($Stu->where("stuClass=1")->order('stuAverage DESC')->select());
    //     $Class2 = count($Stu->where("stuClass=2")->order('stuAverage DESC')->select());
    //     $Class3 = count($Stu->where("stuClass=3")->order('stuAverage DESC')->select());
    //     $Class5 = count($Stu->where("stuClass=5")->order('stuAverage DESC')->select());
    //     $stuFall=$Stu->where("stuClass=0")->order('stuAverage DESC')->select();

    //     $stuFallLen=count($stuFall);
    //     if($stuFallLen!=0)
    //     {
    //         if(24>$Class1)
    //         {
    //             if((24-$Class1)<$stuFallLen){
    //                 $FallnewData1=array();
    //                 $Fallitem1=array();
    //                 for($i=0;$i<(24-$Class1);$i++)
    //                 {
    //                     $Fallitem1[]=$stuFall[$i];
    //                     $Fallitem1[$i]["stuClass"]=1;
    //                 }
    //                 array_splice($stuFall,0,(24-$Class1));
    //                 $FallnewData1=$Fallitem1;
                    
    //                 foreach($FallnewData1 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($stuFall as $key => $value) 
    //                 {
    //                    $stuFall[$key]["stuClass"]=1;
    //                 }

    //                 foreach($stuFall as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }

    //         if(30>$Class2)
    //         {
    //             if((30-$Class2)<$stuFallLen){
    //                 $FallnewData2=array();
    //                 $Fallitem2=array();
    //                 for($i=0;$i<(30-$Class2);$i++)
    //                 {
    //                     $Fallitem2[]=$stuFall[$i];
    //                     $Fallitem2[$i]["stuClass"]=2;
    //                 }
    //                 array_splice($stuFall,0,(30-$Class2));
    //                 $FallnewData2=$Fallitem2;
                    
    //                 foreach($FallnewData2 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($stuFall as $key => $value) 
    //                 {
    //                    $stuFall[$key]["stuClass"]=2;
    //                 }

    //                 foreach($stuFall as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }

    //         if(60>$Class3)
    //         {
    //             if((60-$Class3)<$stuFallLen){
    //                 $FallnewData3=array();
    //                 $Fallitem3=array();
    //                 for($i=0;$i<(60-$Class3);$i++)
    //                 {
    //                     $Fallitem3[]=$stuFall[$i];
    //                     $Fallitem3[$i]["stuClass"]=3;
    //                 }
    //                 array_splice($stuFall,0,(60-$Class3));
    //                 $FallnewData3=$Fallitem3;
                    
    //                 foreach($FallnewData3 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($stuFall as $key => $value) 
    //                 {
    //                    $stuFall[$key]["stuClass"]=3;
    //                 }

    //                 foreach($stuFall as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         }

    //         if(30>$Class5)
    //         {
    //             if((30-$Class5)<$stuFallLen){
    //                 $FallnewData5=array();
    //                 $Fallitem5=array();
    //                 for($i=0;$i<(30-$Class5);$i++)
    //                 {
    //                     $Fallitem5[]=$stuFall[$i];
    //                     $Fallitem5[$i]["stuClass"]=5;
    //                     // dump( $Fallitem5[$i]);
    //                 }
    //                 array_splice($stuFall,0,(30-$Class5));
    //                 $FallnewData5=$Fallitem5;
                    
    //                 foreach($FallnewData5 as $k=>$v){  
                        
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //             else
    //             {
    //                 foreach ($stuFall as $key => $value) 
    //                 {
    //                    $stuFall[$key]["stuClass"]=5;
    //                 }

    //                 foreach($stuFall as $k=>$v){  
    //                     $Stu->data($v)->save();
    //                 } 
    //             }
    //         } 
    //     }

    //     $divis4Len = count($Stu->where("stuClass=4")->order('stuAverage DESC')->select());

    //     if(30>$divis4Len){
    //         $divisClass3=$Stu->where("stuClass=3")->order('stuAverage DESC')->select();
    //         $divisClass4=array();

    //         $divisItem4=array();
    //         for($i=0;$i<60;$i=$i+2,$j++)
    //         {   
    //             $divisClass3[$i]["stuClass"]=4;
    //             $divisItem4[]=$divisClass3[$i];
    //         }
    //         foreach($divisItem4 as $k=>$v){  
    //             $Stu->data($v)->save();
    //         } 
    //     }

    //     $flag1 = count($Stu->where("stuClass=1")->order('stuAverage DESC')->select());
    //     $flag2 = count($Stu->where("stuClass=2")->order('stuAverage DESC')->select());
    //     $flag3 = count($Stu->where("stuClass=3")->order('stuAverage DESC')->select());
    //     $flag4 = count($Stu->where("stuClass=4")->order('stuAverage DESC')->select());
    //     $flag5 = count($Stu->where("stuClass=5")->order('stuAverage DESC')->select());

    //     if($flag1+$flag2+$flag3+$flag4+$flag5){
    //         $this->success('分班成功');
    //     }
    // }

    public function divide()
    {
        $Stu = M ('Stu');
        $classPer=M("class");
        $class0 = $Stu->where("stuClass=0")->order('stuAverage DESC')->select();
        $classTotal=$classPer->select();
        // dump($classTotal);
        echo $classTotal["0"]["person"];
        echo $classTotal["1"]["person"];
        echo $classTotal["2"]["person"];
        echo $classTotal["3"]["person"];
        echo "<br/>";
        if(!$class0){
            return ;
        }
        $class0Len=count($Stu->where("stuClass=0")->order('stuAverage DESC')->select());
        
        for($i=1;$i<($class0Len+1);$i++)
        {
            
            for($j=1;$j<5;$j++)
            {
                $temp=$Stu->where("stuR=".$i." AND stuClass=0")->field("stuVol".$j)->select();
                $stuVol = $temp[0]["stuVol".$j];
                if(1==$stuVol){
                    $tempData["stuClass"]=1;
                    $tempLen=count($Stu->where("stuClass=1")->select());
                    $condition=$Stu->where("stuR=".$i." AND stuClass=0")->field("stuS1,stuR")->select();
                    if($condition[0]["stuS1"]>=75 && $condition[0]["stuR"]<=60){
                        if($tempLen<24){
                            $Stu->where("stuR=".$i." AND stuClass=0")->save($tempData);
                        }
                    }
                }else if(2==$stuVol){
                    echo "2";
                }else if(3==$stuVol){
                    echo "3";
                }else if(4==$stuVol){
                    echo "4";
                }
            }   
            echo "<br/>";
        }
    }

    public function delete_data()
    {
        $Stu = M ('Stu');
        $res0=$Stu->where('stuClass=0')->delete();
        $res1=$Stu->where('stuClass=1')->delete();
        $res2=$Stu->where('stuClass=2')->delete();
        $res3=$Stu->where('stuClass=3')->delete();
        $res4=$Stu->where('stuClass=4')->delete();
        $res5=$Stu->where('stuClass=5')->delete();
        if ($res0+$res1+$res2+$res3+$res4+$res5) {
            echo "suecess";
        }else{
            echo "error";
        }
    }

    public function changeClassIndex(){
        $classPer=M("class");
        $res=$classPer->select();
        dump($res);
        $this->assign('res',$res);
        $this->display();
    }

    public function changeClassP(){

    }
}