<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>学生填报志愿</title>
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/stu/css/fill.css">
	<script src="/examination/Public/public/js/jq.js"></script>
	<!-- <script src="/examination/Public/stu/js/stuLogout.js"></script> -->
</head>
<body>
	<input type="hidden" value="<?php echo ($_SESSION['sessions']['stuNum']); ?>" class="stuNum">
	<div class="content_top">
		<div></div>
		<div class="content_top_content">
			<div class="username"><span>学生：</span><p><?php echo ($_SESSION['sessions']['username']); ?></p></div>
			<div class="user_exit" onclick="stuLogout()"><span><?php echo '<?'; ?>
xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1528439492800" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1051" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="12"><defs><style type="text/css"></style></defs><path d="M511.5 548.3c-10.3 0-18.6-8.3-18.6-18.6V82.6c0-10.3 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6v447.1c0 10.3-8.3 18.6-18.6 18.6z" fill="#fd0000" p-id="1052"></path><path d="M511.5 959c-247 0-447.9-200.1-447.9-446 0-149.8 74.9-288.7 200.3-371.7 8.6-5.7 20.1-3.3 25.8 5.3 5.7 8.6 3.3 20.1-5.3 25.8-115 76.1-183.6 203.4-183.6 340.7 0 225.4 184.2 408.8 410.6 408.8S922.1 738.4 922.1 513c0-136.1-67.8-262.9-181.3-339.1-8.5-5.7-10.8-17.3-5.1-25.9 5.7-8.5 17.3-10.8 25.9-5.1 123.8 83.2 197.8 221.5 197.8 370-0.1 246-201 446.1-447.9 446.1z" fill="#fd0000" p-id="1053"></path></svg></span><button >注销</button></div>
		</div>
	</div>
	<div class="fill_box">
		<div class="fill_header">
			<h3>学生填报志愿</h3>
		</div>
		<div class="fill_content">
			<div class="fill_content_top">
				<div class="fill_name">姓名：<span><?php echo ($stu["stuName"]); ?></span></div>
				<div class="fill_stunum">学号：<span><?php echo ($stu["stuNum"]); ?></span></div>
				<div class="fill_class">原班级：
					<?php if($stu['stuOldClass'] == 1): ?><span>17化工类1</span>
			            <?php elseif($stu['stuOldClass'] == 2): ?><span>17化工类2</span>
			            <?php elseif($stu['stuOldClass'] == 3): ?><span>17化工类3</span>
			            <?php elseif($stu['stuOldClass'] == 4): ?><span>17化工类4</span>
			            <?php elseif($stu['stuOldClass'] == 5): ?><span>17化工类5</span>
			            <?php else: ?> <span>待定</span><?php endif; ?>
		        </div>
			</div> 
			<div class="fill_content_middel">
				<div class="fill_first">
					<input type="hidden" value="<?php echo ($stu["stuVol1"]); ?>" class="fill_hidden_val1">
					<div class="fill_vol_text">志愿A</div>
					<?php if($stu['stuVol1'] == 0): ?><div class="fill_vol_select">
						<select class="fill_first_val">
						  <option value ="1">应用化工技术（国际化）</option>
						  <option value ="2">应用化工技术</option>
						  <option value="3">工业分析技术</option>
						  <option value="4">化工装备技术</option>
						</select>			
					</div>
					<?php else: ?>
						<div class="filled_first fllled_css">
							<?php if($stu['stuVol1'] == 1): ?><span>应用化工技术（国际化）</span>
			           				<?php elseif($stu['stuVol1'] == 2): ?><span>应用化工技术</span>
			           				<?php elseif($stu['stuVol1'] == 3): ?><span>工业分析技术</span>
			            				<?php else: ?> <span>化工装备技术</span><?php endif; ?>
						</div><?php endif; ?>
				</div>
				<div class="fill_second">
					<input type="hidden" value="<?php echo ($stu["stuVol2"]); ?>" class="fill_hidden_val2">
					<div class="fill_vol_text">志愿B</div>
					<?php if($stu['stuVol2'] == 0): ?><div class="fill_vol_select">
						<select class="fill_second_val">
						  <option value ="1">应用化工技术（国际化）</option>
						  <option value ="2">应用化工技术</option>
						  <option value="3">工业分析技术</option>
						  <option value="4">化工装备技术</option>
						</select>			
					</div>
					<?php else: ?>
						<div class="filled_second fllled_css">
							<?php if($stu['stuVol2'] == 1): ?><span>应用化工技术（国际化）</span>
			           				<?php elseif($stu['stuVol2'] == 2): ?><span>应用化工技术</span>
			           				<?php elseif($stu['stuVol2'] == 3): ?><span>工业分析技术</span>
			            				<?php else: ?> <span>化工装备技术</span><?php endif; ?>
						</div><?php endif; ?>

				</div>
				<div class="fill_third">
					<input type="hidden" value="<?php echo ($stu["stuVol3"]); ?>" class="fill_hidden_val3">
					<div class="fill_vol_text">志愿C</div>
					<?php if($stu['stuVol3'] == 0): ?><div class="fill_vol_select">
						<select class="fill_third_val">
						  <option value ="1">应用化工技术（国际化）</option>
						  <option value ="2">应用化工技术</option>
						  <option value="3">工业分析技术</option>
						  <option value="4">化工装备技术</option>
						</select>			
					</div>
					<?php else: ?>
						<div class="filled_third fllled_css">
							<?php if($stu['stuVol3'] == 1): ?><span>应用化工技术（国际化）</span>
			           				<?php elseif($stu['stuVol3'] == 2): ?><span>应用化工技术</span>
			           				<?php elseif($stu['stuVol3'] == 3): ?><span>工业分析技术</span>
			            				<?php else: ?> <span>化工装备技术</span><?php endif; ?>
						</div><?php endif; ?>
				</div>
				<div class="fill_fourth">
					<input type="hidden" value="<?php echo ($stu["stuVol4"]); ?>" class="fill_hidden_val4">
					<div class="fill_vol_text">志愿D</div>
					<?php if($stu['stuVol4'] == 0): ?><div class="fill_vol_select">
						<select class="fill_fourth_val">
						  <option value ="1">应用化工技术（国际化）</option>
						  <option value ="2">应用化工技术</option>
						  <option value="3">工业分析技术</option>
						  <option value="4">化工装备技术</option>
						</select>			
					</div>
					<?php else: ?>
						<div class="filled_fourth fllled_css">
							<?php if($stu['stuVol4'] == 1): ?><span>应用化工技术（国际化）</span>
			           				<?php elseif($stu['stuVol4'] == 2): ?><span>应用化工技术</span>
			           				<?php elseif($stu['stuVol4'] == 3): ?><span>工业分析技术</span>
			            				<?php else: ?> <span>化工装备技术</span><?php endif; ?>
						</div><?php endif; ?>
				</div>
			</div>
			<div class="fill_content_bottom">
				<!-- <div><button>修改</button></div> -->
				<div class="fill_submit"><button style="height:50px;">提 交</button></div>
				<div class="fill_cancel" onClick="javascript :history.back(-1);"><button style="height:50px;">取 消</button></div>
			</div>
		</div>
	</div>
	<script>
		function stuLogout()
		{
			$.ajax({
				url: "<?php echo U('Home/Stu/stuLogout');?>",
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{
						window.location.href="<?php echo U('Home/Stu/stuLogin');?>";
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		}
	</script>
	<script>
	if($(".fill_hidden_val1").val()==0 && $(".fill_hidden_val2").val()==0 && $(".fill_hidden_val3").val()==0 && $(".fill_hidden_val4").val()==0){
		$(".fill_submit").find("button").click(function(){
			// if($(".fill_class").find("span").html()!="未填报"){
			// 	alert("已分班");
			// 	return;
			// }
			var arr=[$(".fill_first_val").val(),$(".fill_second_val").val(),$(".fill_third_val").val(),$(".fill_fourth_val").val()];
			console.log(arr)
			for(var i =0;i<arr.length;i++){
				for(var j=i+1;j<arr.length;j++){
					if(arr[i]==arr[j]){
						alert("志愿不能相同");
						return;	
					}
				}
			}
			$.ajax({
				url: "<?php echo U('Home/Stu/stu_fill');?>",
				data: {
						'stuNum': $(".stuNum").val(),
						'stuVol1': $(".fill_first_val").val(),
						'stuVol2': $(".fill_second_val").val(),
						'stuVol3': $(".fill_third_val").val(),
						'stuVol4': $(".fill_fourth_val").val(),
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{
						alert("提交成功");
						window.location.href="<?php echo U('Home/Stu/stuChoose');?>";
						return;
					}else if(0==data.status)
					{
						alert("提交失败");
						return;
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})
	}else {
		$(".fill_submit").find("button").css("background-color","#9E9696");
		$(".fill_submit").find("button").click(function(){
			alert("已经填报志愿")	
		})
	}
	</script>
</body>
</html>