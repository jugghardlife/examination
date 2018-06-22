<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生成绩排行</title>
	<link rel="stylesheet" href="/examination/Public/admin/css/stuScore.css">
	<link rel="stylesheet" href="/examination/Public/admin/css/adminScore.css">
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<script src="/examination/Public/public/js/jq.js"></script>
</head>
<body class="stuScore_body">
	<div class="content_top">
		<div></div>
		<div class="content_top_content">
			<div class="username"><span>管理员：</span><p><?php echo (session('username')); ?></p></div>
			<div class="user_exit" onclick="adminLogout()"><span><?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1528439492800" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1051" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="12"><defs><style type="text/css"></style></defs><path d="M511.5 548.3c-10.3 0-18.6-8.3-18.6-18.6V82.6c0-10.3 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6v447.1c0 10.3-8.3 18.6-18.6 18.6z" fill="#fd0000" p-id="1052"></path><path d="M511.5 959c-247 0-447.9-200.1-447.9-446 0-149.8 74.9-288.7 200.3-371.7 8.6-5.7 20.1-3.3 25.8 5.3 5.7 8.6 3.3 20.1-5.3 25.8-115 76.1-183.6 203.4-183.6 340.7 0 225.4 184.2 408.8 410.6 408.8S922.1 738.4 922.1 513c0-136.1-67.8-262.9-181.3-339.1-8.5-5.7-10.8-17.3-5.1-25.9 5.7-8.5 17.3-10.8 25.9-5.1 123.8 83.2 197.8 221.5 197.8 370-0.1 246-201 446.1-447.9 446.1z" fill="#fd0000" p-id="1053"></path></svg></span><button >注销</button></div>
		</div>
	</div>
	<div class="stuScore_box">
		<div class="stuScore_header">
			<h3>学生成绩排行</h3>
		</div>
		
		<div class="stuScore_content">
			<!-- <div class="exp_data">
				<div></div>
				
			</div> -->
			<div class="top_back">
				<div></div>
				<div class="stuScore_adminsScore">
					<a class="export_data" href="<?php echo U('Admin/index/expUser');?>">导出学生数据</a>
					<a onClick="javascript :history.back(-1);">返回</a>
				</div>
			</div>
			<div class="stuScore_content_top">
				<div>序号</div>
				<div>排名</div>
				<div style="width: 300px;overflow: hidden;">学号</div>
				<div>姓名</div>
				<div>成绩1</div>
				<div>成绩2</div>
				<div>成绩3</div>
				<div>成绩4</div>
				<div>成绩5</div>
				<div>成绩6</div>
				<div style="width:680px;overflow: hidden;">志愿A</div>
				<div style="width:680px;overflow: hidden;">志愿B</div>
				<div style="width:680px;overflow: hidden;">志愿C</div>
				<div style="width:680px;overflow: hidden;">志愿D</div>
				<div>总分</div>
				<div class="stuScore_content_top_last">平均分</div>
			</div>
			<?php if(is_array($doc_list)): $i = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="stuScore_content_details">
					<div><?php echo ($vo["stuR"]); ?></div>
					<div><?php echo ($vo["stuR"]); ?></div>
					<div style="width: 300px;overflow: hidden;"><?php echo ($vo["stuNum"]); ?></div>
					<div><?php echo ($vo["stuName"]); ?></div>
					<div><?php echo ($vo["stuS1"]); ?></div>
					<div><?php echo ($vo["stuS2"]); ?></div>
					<div><?php echo ($vo["stuS3"]); ?></div>
					<div><?php echo ($vo["stuS4"]); ?></div>
					<div><?php echo ($vo["stuS5"]); ?></div>
					<div><?php echo ($vo["stuS6"]); ?></div>
					<!-- <div style="width:680px;overflow: hidden;">应用化工技术（国际化）</div> -->
					<?php if($vo['stuVol1'] == 1): ?><div style="width:680px;overflow: hidden;">应用化工技术（国际化）</div>
			            <?php elseif($vo['stuVol1'] == 2): ?><div style="width:680px;overflow: hidden;">应用化工技术</div>
			            <?php elseif($vo['stuVol1'] == 3): ?><div style="width:680px;overflow: hidden;">工业分析技术</div>
			            <?php elseif($vo['stuVol1'] == 4): ?><div style="width:680px;overflow: hidden;">化工装备技术</div>
			            <?php else: ?> <div style="width:680px;overflow: hidden;">未填报</div><?php endif; ?>
					<?php if($vo['stuVol2'] == 1): ?><div style="width:680px;overflow: hidden;">应用化工技术（国际化）</div>
			            <?php elseif($vo['stuVol2'] == 2): ?><div style="width:680px;overflow: hidden;">应用化工技术</div>
			            <?php elseif($vo['stuVol2'] == 3): ?><div style="width:680px;overflow: hidden;">工业分析技术</div>
			            <?php elseif($vo['stuVol2'] == 4): ?><div style="width:680px;overflow: hidden;">化工装备技术</div>
			            <?php else: ?> <div style="width:680px;overflow: hidden;">未填报</div><?php endif; ?>
					<?php if($vo['stuVol3'] == 1): ?><div style="width:680px;overflow: hidden;">应用化工技术（国际化）</div>
			            <?php elseif($vo['stuVol3'] == 2): ?><div style="width:680px;overflow: hidden;">应用化工技术</div>
			            <?php elseif($vo['stuVol3'] == 3): ?><div style="width:680px;overflow: hidden;">工业分析技术</div>
			            <?php elseif($vo['stuVol3'] == 4): ?><div style="width:680px;overflow: hidden;">化工装备技术</div>
			            <?php else: ?> <div style="width:680px;overflow: hidden;">未填报</div><?php endif; ?>
					<?php if($vo['stuVol4'] == 1): ?><div style="width:680px;overflow: hidden;">应用化工技术（国际化）</div>
			            <?php elseif($vo['stuVol4'] == 2): ?><div style="width:680px;overflow: hidden;">应用化工技术</div>
			            <?php elseif($vo['stuVol4'] == 3): ?><div style="width:680px;overflow: hidden;">工业分析技术</div>
			            <?php elseif($vo['stuVol4'] == 4): ?><div style="width:680px;overflow: hidden;">化工装备技术</div>
			            <?php else: ?> <div style="width:680px;overflow: hidden;">未填报</div><?php endif; ?>
					<div><?php echo ($vo["stuTot"]); ?></div>
					<!-- <div><?php echo ($vo["stuAverage"]); ?></div> -->
					<div class="stuScore_content_top_last"><?php echo ($vo["stuAverage"]); ?></div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
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
				<div>志愿A</div>
				<div>志愿B</div>
				<div>志愿C</div>
				<div>志愿D</div>
				<div>100</div>
				<div class="stuScore_content_top_last">100</div>
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
				<div>志愿A</div>
				<div>志愿B</div>
				<div>志愿C</div>
				<div>志愿D</div>
				<div>100</div>
				<div class="stuScore_content_top_last">100</div>
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
				<div>志愿A</div>
				<div>志愿B</div>
				<div>志愿C</div>
				<div>志愿D</div>
				<div>100</div>
				<div class="stuScore_content_top_last">100</div>
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
				<div>志愿A</div>
				<div>志愿B</div>
				<div>志愿C</div>
				<div>志愿D</div>
				<div>100</div>
				<div class="stuScore_content_top_last">100</div>
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
				<div>志愿A</div>
				<div>志愿B</div>
				<div>志愿C</div>
				<div>志愿D</div>
				<div>100</div>
				<div class="stuScore_content_top_last">100</div>
			</div> -->
			<tfoot>
				<!--分页显示？-->
				<tr>
				   <td textalign="center" cl nowrap="true" colspan="9" height="20">
				      <div class="pages"><?php echo ($page); ?></div>
				   </td>
				</tr>
			</tfoot>
		</div>
	</div>
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
</body>
</html>