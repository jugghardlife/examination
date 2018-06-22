<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息</title>
	<link rel="stylesheet" href="/examination/Public/admin/css/stuScore.css">
	<link rel="stylesheet" href="/examination/Public/admin/css/adminScore.css">
	<link rel="stylesheet" href="/examination/Public/admin/css/changeClass.css">
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/stu/css/see.css">
	<script src="/examination/Public/public/js/jq.js"></script>
</head>
<body class="stuScore_body">
	<div class="stuScore_bgc"></div>
	<div class="stuScore_del_bgc">
		<div class="stuScore_del_img">
			<img src="/examination/Public/public/images/取消.svg" alt="">
		</div>
		<div class="stuScore_del_btn">
			<div class="stuScore_del_sub">
				<button>删除</button>
			</div>
			<div class="stuScore_del_can">
				<button>取消</button>
			</div>
		</div>
	</div>
	<div class="content_top">
		<div></div>
		<div class="content_top_content">
			<div class="username"><span>管理員：</span><p><?php echo (session('username')); ?></p></div>
			<div class="user_exit" onclick="adminLogout()"><span><?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1528439492800" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1051" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="12"><defs><style type="text/css"></style></defs><path d="M511.5 548.3c-10.3 0-18.6-8.3-18.6-18.6V82.6c0-10.3 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6v447.1c0 10.3-8.3 18.6-18.6 18.6z" fill="#fd0000" p-id="1052"></path><path d="M511.5 959c-247 0-447.9-200.1-447.9-446 0-149.8 74.9-288.7 200.3-371.7 8.6-5.7 20.1-3.3 25.8 5.3 5.7 8.6 3.3 20.1-5.3 25.8-115 76.1-183.6 203.4-183.6 340.7 0 225.4 184.2 408.8 410.6 408.8S922.1 738.4 922.1 513c0-136.1-67.8-262.9-181.3-339.1-8.5-5.7-10.8-17.3-5.1-25.9 5.7-8.5 17.3-10.8 25.9-5.1 123.8 83.2 197.8 221.5 197.8 370-0.1 246-201 446.1-447.9 446.1z" fill="#fd0000" p-id="1053"></path></svg></span><button >注销</button></div>
		</div>
	</div>
	<div class="stuScore_box">
		<div class="stuScore_header">
			<h3>班级信息</h3>
		</div>
		
		<div class="stuScore_content">
			<div class="change_select">
				<div></div>
				<div class="change_select_info">
					<span>班级信息</span>
					<select class="change_select_val">
					  <option value ="1">化工1（国际化）</option>
					  <option value ="2">化工2</option>
					  <option value="3">工分1</option>
					  <option value="4">工分2</option>
					  <option value="5">装备1</option>
					</select>
				</div>
				<div class="class_num">
					<span>人数:</span>
					<p><?php echo ($c); ?></p>
				</div>
			</div>
			<div class="top_back">
				<div></div>
				<div class="stuScore_adminsScore">
					<a href="<?php echo U('Admin/index/expClass?stuClass=1');?>" class="expClass">导出班級数据</a>
					<a href="<?php echo U('Index/addStudentA');?>">新增</a>
					<a onClick="javascript :history.back(-1);">返回</a>
				</div>
			</div>
			<div class="stuScore_content_top">
				<div>班級排名</div>
				<div>排名</div>
				<div>学号</div>
				<div>姓名</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>总分</div>
				<div>平均分</div>
				<div class="change_ope">
					操作
				</div>
			</div>
			<div class="stuScore_content_list">
				<?php if(is_array($doc_list)): $k = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="stuScore_content_details" id="<?php echo ($vo["stuNum"]); ?>">
						<div><?php echo ($k); ?></div>
						<div><?php echo ($vo["stuR"]); ?></div>
						<div><?php echo ($vo["stuNum"]); ?></div>
						<div><?php echo ($vo["stuName"]); ?></div>
						<div><?php echo ($vo["stuS1"]); ?></div>
						<div><?php echo ($vo["stuS2"]); ?></div>
						<div><?php echo ($vo["stuS3"]); ?></div>
						<div><?php echo ($vo["stuS4"]); ?></div>
						<div><?php echo ($vo["stuS5"]); ?></div>
						<div><?php echo ($vo["stuS6"]); ?></div>
						<div><?php echo ($vo["stuTot"]); ?></div>
						<div><?php echo ($vo["stuAverage"]); ?></div>
						<div class="stuScore_content_top_last">
							<div class="see_btn" title="<?php echo ($vo["stuNum"]); ?>" onclick="see_btn(this)">
								<input type="hidden" value="<?php echo ($vo["stuNum"]); ?>">
								<a >修改</a>
							</div>
							<div class="del_btn" title="<?php echo ($vo["stuNum"]); ?>" onclick="del_btn(this)">
								<input type="hidden" value="<?php echo ($vo["stuNum"]); ?>">
								<a >删除</a>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- <div class="stuScore_content_details">
				<div>1</div>
				<div>1</div>
				<div>2018061101</div>
				<div>周立峰</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>100</div>
				<div>100</div>
				<div class="stuScore_content_top_last">
					<div class="see_btn"><a href="">修改</a></div>
					<div class="del_btn"><a href="">删除</a></div>
				</div>
			</div>
			<div class="stuScore_content_details">
				<div>1</div>
				<div>1</div>
				<div>2018061101</div>
				<div>周立峰</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>100</div>
				<div>100</div>
				<div class="stuScore_content_top_last">
					<div class="see_btn"><a href="">修改</a></div>
					<div class="del_btn"><a href="">删除</a></div>
				</div>
			</div>
			<div class="stuScore_content_details">
				<div>1</div>
				<div>1</div>
				<div>2018061101</div>
				<div>周立峰</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>100</div>
				<div>100</div>
				<div class="stuScore_content_top_last">
					<div class="see_btn"><a href="">修改</a></div>
					<div class="del_btn"><a href="">删除</a></div>
				</div>
			</div>
			<div class="stuScore_content_details">
				<div>1</div>
				<div>1</div>
				<div>2018061101</div>
				<div>周立峰</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>100</div>
				<div>100</div>
				<div class="stuScore_content_top_last">
					<div class="see_btn"><a href="">修改</a></div>
					<div class="del_btn"><a href="">删除</a></div>
				</div>
			</div>
			<div class="stuScore_content_details">
				<div>1</div>
				<div>1</div>
				<div>2018061101</div>
				<div>周立峰</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div>100</div>
				<div>100</div>
				<div class="stuScore_content_top_last">
					<div class="see_btn"><a href="">修改</a></div>
					<div class="del_btn"><a href="">删除</a></div>
				</div>
			</div> -->
			<!-- <tfoot>
				<tr>
				   <td textalign="center" cl nowrap="true" colspan="9" height="20">
				      <div class="pages"><?php echo ($page); ?></div>
				   </td>
				</tr>
			</tfoot> -->
		</div>
	</div>


	<!-- <script>
		var del_num;
		$(".del_btn").click(function(e){
			e.preventDefault();
			del_num=$(this).find("input").val();
		})
	</script> -->
	<script>
		function adminLogout()
		{
			$.ajax({
				url: "<?php echo U('Admin/index/adminLogout');?>",
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{
						window.location.href="<?php echo U('Admin/Index/adminLogin');?>";
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		}
	</script>
	<script>
		$(".change_select_val").change(function(){
			var change_select_val=$(this).val();
			$.ajax({
				url: "<?php echo U('Admin/Index/clasaInfo');?>",
				data: {
						'change_select_val': change_select_val
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					var str="";
					$.each(data,function(i,data){
		                str+="<div class='stuScore_content_details' id="+"'"+data["stuNum"]+"'"+">"+
			                	"<div>"+(i+1)+"</div>"+
			                	"<div>"+data["stuR"]+"</div>"+
			                	"<div>"+data["stuNum"]+"</div>"+
			                	"<div>"+data["stuName"]+"</div>"+
			                	"<div>"+data["stuS1"]+"</div>"+
			                	"<div>"+data["stuS2"]+"</div>"+
			                	"<div>"+data["stuS3"]+"</div>"+
			                	"<div>"+data["stuS4"]+"</div>"+
			                	"<div>"+data["stuS5"]+"</div>"+
			                	"<div>"+data["stuS6"]+"</div>"+
			                	"<div>"+data["stuTot"]+"</div>"+
			                	"<div>"+data["stuAverage"]+"</div>"+
			                	"<div class='stuScore_content_top_last'>"+
			                	"<div class='see_btn' title="+"'"+data["stuNum"]+"'"+"onclick='see_btn(this)'><a>修改</a></div>"+
			                	"<div class='del_btn' title="+"'"+data["stuNum"]+"'"+"onclick='del_btn(this)'><a>删除</a></div>"+
			                	"</div>"+
		                	"</div>";
		            })
		             $(".stuScore_content_list").html(str);
		             $(".class_num").find("p").html(data.length);
		             if(1==change_select_val){
		             	$(".expClass").attr("href","<?php echo U('Admin/index/expClass?stuClass=1');?>")
		             }
		             else if(2==change_select_val)
		             {
		             	$(".expClass").attr("href","<?php echo U('Admin/index/expClass?stuClass=2');?>")
		             }
		             else if(3==change_select_val)
		             {
		             	$(".expClass").attr("href","<?php echo U('Admin/index/expClass?stuClass=3');?>")
		             }
		             else if(4==change_select_val)
		             {
		             	$(".expClass").attr("href","<?php echo U('Admin/index/expClass?stuClass=4');?>")
		             }
		             else if(5==change_select_val)
		             {
		             	$(".expClass").attr("href","<?php echo U('Admin/index/expClass?stuClass=5');?>")
		             }
		             
					return;
					// if(1==data.status)
					// {
					// 	alert("提交成功");
					// 	window.location.href="<?php echo U('Home/Stu/stuChoose');?>";
					// 	return;
					// }else if(0==data.status)
					// {
					// 	alert("提交失败");
					// 	return;
					// }
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})
	</script>
	<script>
		function see_btn(obj){
			var see_btn_val=obj.title;
			// console.log(see_btn_val);
			$.ajax({
				url: "<?php echo U('Admin/Index/see_btn');?>",
				data: {
						'see_btn_val': see_btn_val
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					var arr=[data.stuVol1,data.stuVol2,data.stuVol3,data.stuVol4];
					console.log(arr)
					var strarr=new Array();
					for(var i=0;i<arr.length;i++){
						if(0==arr[i])
						{
							strarr[i]="待定";
							
						}
						else if(1==arr[i])
						{
							strarr[i]="化工1（国际化）";
							
						}
						else if(2==arr[i])
						{
							strarr[i]="化工2";
							
						}
						else if(3==arr[i])
						{
							strarr[i]="工分1";
							
						}
						else if(4==arr[i])
						{
							strarr[i]="工分2";
							
						}
						else if(5==arr[i])
						{
							strarr[i]="装备1";
							
						}
					}
					console.log(strarr)
					var str="";
		            str+="<div class='see_content'>"+
		            		"<div class='stuScore_bgc_top'>"+
		            			"<div></div>"+
			            		"<div>"+
			            			data.stuName+"的详情"+
			            		"</div>"+
		            			"<div class='see_cancel' ></div>"+
		            		"</div>"+
			            	"<div class='see_content_top'>"+
			            		"<div>姓名:<span>"+data.stuName+"</span></div>"+
			            		"<div>学号:<span>"+data.stuNum+"</span></div>"+
			            		"<div class='change_class'><span>班级:</span>"+
			            			"<select>"+
			            				"<option value ='1' class='class1'>应用化工技术（国际化）</option>"+
			            				"<option value ='2' class='class2'>化工2</option>"+
			            				"<option value ='3' class='class3'>工分1</option>"+
			            				"<option value ='4' class='class4'>工分2</option>"+
			            				"<option value ='5' class='class5'>装备1</option>"+
			            			"</select>"+
			            		"</div>"+
			            		"<div class='see_content_top_last'>排名:<span>"+data.stuR+"</span></div>"
			            	+"</div>"+
			            "<div class='see_content_bottom'>"+
		            		"<div class='see_content_bottom_big'>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div>"+data.stuS1+"</div>"+
		            			"</div>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div class='see_last'>"+data.stuS2+"</div>"+
		            			"</div>"+
		            		"</div>"+
		            		"<div class='see_content_bottom_big'>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div>"+data.stuS3+"</div>"+
		            			"</div>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div class='see_last'>"+data.stuS4+"</div>"+
		            			"</div>"+
		            		"</div>"+
		            		"<div class='see_content_bottom_big'>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div>"+data.stuS5+"</div>"+
		            			"</div>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>科目成绩</div>"+
		            				"<div class='see_last'>"+data.stuS6+"</div>"+
		            			"</div>"+
		            		"</div>"+
		            		"<div class='see_content_bottom_big'>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>志愿A</div>"+
		            				"<div>"+data.stuS1+"</div>"+
		            			"</div>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>志愿B</div>"+
		            				"<div class='see_last'>"+data.stuS2+"</div>"+
		            			"</div>"+
		            		"</div>"+
		            		"<div class='see_content_bottom_big'>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>志愿C</div>"+
		            				"<div>"+data.stuS1+"</div>"+
		            			"</div>"+
		            			"<div class='see_content_bottom_small'>"+
		            				"<div>志愿D</div>"+
		            				"<div class='see_last'>"+data.stuS2+"</div>"+
		            			"</div>"+
		            		"</div>"+
			            "</div>"+
		            	"<div class='change_class_btn'>"+
		            		"<button class='class_btn_left' onclick='change_sub_btn(this)'>提交"+
		            			"<input type='hidden' value='"+data.stuNum+"'>"+
		            		"</button>"+
		            		"<button class='class_btn_right' onclick='onclick_cancel()'>取消</button>"+
		            	"</div>"
			         // if(1==data.stuClass){
			         // 	console.log($(".class1"))
			         // }
			         // else if(2==data.stuClass){
			         // 	console.log($(".class2"))
			         // }
			         // else if(3==data.stuClass){
			         // 	console.log($(".class3"))
			         // }
			         // else if(4==data.stuClass){
			         // 	console.log($(".class4"))
			         // }
			         // else if(5==data.stuClass){
			         // 	console.log($(".class5"))
			         // }
		             $(".stuScore_bgc").html(str);
		             $(".stuScore_bgc").show();
					return;
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		}
	</script>
	<script>
		function onclick_cancel(){
			$(".stuScore_bgc").hide();
		}
	</script>

	<script>
		function change_sub_btn(obj){
			var stuNum=obj.childNodes[1].value

			var changeClassNum=obj.parentNode.parentNode.childNodes[1].childNodes[2].childNodes[1].value
			$.ajax({
				url: "<?php echo U('Admin/Index/change_btn');?>",
				data: {
						'changeClassNum': changeClassNum,
						'stuNum':stuNum
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{
						alert("修改成功");
						$("#"+stuNum).hide();
						$(".stuScore_bgc").hide();
						return;
					}
					else
					{
						alert("修改失败");
						return;
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		}
	</script>

	<script>
		var del_num;
		function del_btn(obj){
			del_num=obj.title; 
			$(".stuScore_del_bgc").show(); 
		}
		$(".stuScore_del_sub").click(function(e){
			e.preventDefault();
			console.log(del_num)
			$.ajax({
				url: "<?php echo U('Admin/Index/del_btn');?>",
				data: {
						'del_num': del_num
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data)
					{
						alert("删除成功");
						$("#"+del_num).hide();
						$(".stuScore_del_bgc").hide();
						del_num="";
						return;
					}
					else
					{
						alert("删除失败");
						return;
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})
		$(".stuScore_del_can").click(function(){
			$(".stuScore_del_bgc").hide(); 
		})
	</script>
</body>
</html>