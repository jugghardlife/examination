<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>查询个人信息页面</title>
	<link rel="stylesheet" href="/examination/Public/stu/css/see.css">
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<script src="/examination/Public/public/js/jq.js"></script>
</head>
<body class="see_body">
	<div class="content_top">
		<div></div>
		<div class="content_top_content">
			<div class="username"><span>学生：</span><p><?php echo ($_SESSION['sessions']['username']); ?></p></div>
			<div class="user_exit" onclick="stuLogout()"><span><?php echo '<?'; ?>
xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1528439492800" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1051" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="12"><defs><style type="text/css"></style></defs><path d="M511.5 548.3c-10.3 0-18.6-8.3-18.6-18.6V82.6c0-10.3 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6v447.1c0 10.3-8.3 18.6-18.6 18.6z" fill="#fd0000" p-id="1052"></path><path d="M511.5 959c-247 0-447.9-200.1-447.9-446 0-149.8 74.9-288.7 200.3-371.7 8.6-5.7 20.1-3.3 25.8 5.3 5.7 8.6 3.3 20.1-5.3 25.8-115 76.1-183.6 203.4-183.6 340.7 0 225.4 184.2 408.8 410.6 408.8S922.1 738.4 922.1 513c0-136.1-67.8-262.9-181.3-339.1-8.5-5.7-10.8-17.3-5.1-25.9 5.7-8.5 17.3-10.8 25.9-5.1 123.8 83.2 197.8 221.5 197.8 370-0.1 246-201 446.1-447.9 446.1z" fill="#fd0000" p-id="1053"></path></svg></span><button >注销</button></div>
		</div>
	</div>
	<div class="see_box">
		<div class="see_header">
			<h3>学生个人信息</h3>
		</div>
		<div class="see_content">
			<div class="see_content_top">
				<div>姓名:<span><?php echo ($stu["stuName"]); ?></span></div>
				<div>学号:<span><?php echo ($stu["stuNum"]); ?></span></div>
				<div style="overflow: hidden;width: 200px;">新班级:
					<!-- <span>待定</span> -->
					<?php if($stu['stuClass'] == 1): ?><span>17化工1(国际化)</span>
			            <?php elseif($stu['stuClass'] == 2): ?><span>17化工2</span>
			            <?php elseif($stu['stuClass'] == 3): ?><span>17工分1</span>
			            <?php elseif($stu['stuClass'] == 4): ?><span>17装备1</span>
			            <?php else: ?> <span>待定</span><?php endif; ?>
				</div>
				<div class="see_content_top_last">排名:<span><?php echo ($stu["stuR"]); ?></span></div>
			</div> 
			<div class="see_content_bottom">
				<div class="see_content_bottom_big">
					<div class="see_content_bottom_small">
						<div>
							实用英语	
						</div>
						<div>
							<?php echo ($stu["stuS1"]); ?>
						</div>
					</div>
					<div class="see_content_bottom_small">
						<div>
							高等数学	
						</div>
						<div class="see_last">
							<?php echo ($stu["stuS2"]); ?>
						</div>
					</div>
				</div>
				<div class="see_content_bottom_big">
					<div class="see_content_bottom_small">
						<div>
							无机化学	
						</div>
						<div>
							<?php echo ($stu["stuS3"]); ?>
						</div>
					</div>
					<div class="see_content_bottom_small">
						<div>
							有机化学	
						</div>
						<div class="see_last">
							<?php echo ($stu["stuS4"]); ?>
						</div>
					</div>
				</div>
				<div class="see_content_bottom_big">
					<div class="see_content_bottom_small">
						<div>
							物理化学	
						</div>
						<div>
							<?php echo ($stu["stuS5"]); ?>
						</div>
					</div>
					<div class="see_content_bottom_small">
						<div>
							化学分析检验技术	
						</div>
						<div class="see_last">
							<?php echo ($stu["stuS6"]); ?>
						</div>
					</div>
				</div>
				<div class="see_content_bottom_big">
					<div class="see_content_bottom_small">
						<div>志愿A</div>
						<!-- <div>应用化工技术（国际化）</div> -->
						<?php if($stu['stuVol1'] == 1): ?><div class="see_last">应用化工技术（国际化）</div>
				            <?php elseif($stu['stuVol1'] == 2): ?><div class="see_last">应用化工技术</div>
				            <?php elseif($stu['stuVol1'] == 3): ?><div class="see_last">工业分析技术</div>
				            <?php elseif($stu['stuVol1'] == 4): ?><div class="see_last">化工装备技术</div>
				            <?php else: ?> <div>未填报</div><?php endif; ?>
					</div>
					<div class="see_content_bottom_small">
						<div>志愿B</div>
						<!-- <div class="see_last">应用化工技术</div> -->
						<?php if($stu['stuVol2'] == 1): ?><div class="see_last">应用化工技术（国际化）</div>
				            <?php elseif($stu['stuVol2'] == 2): ?><div class="see_last">应用化工技术</div>
				            <?php elseif($stu['stuVol2'] == 3): ?><div class="see_last">工业分析技术</div>
				            <?php elseif($stu['stuVol2'] == 4): ?><div class="see_last">化工装备技术</div>
				            <?php else: ?> <div class="see_last">未填报</div><?php endif; ?>
					</div>
				</div>
				<div class="see_content_bottom_big">
					<div class="see_content_bottom_small">
						<div>志愿C</div>
						<!-- <div>工业分析技术</div> -->
						<?php if($stu['stuVol3'] == 1): ?><div class="see_last">应用化工技术（国际化）</div>
				            <?php elseif($stu['stuVol3'] == 2): ?><div class="see_last">应用化工技术</div>
				            <?php elseif($stu['stuVol3'] == 3): ?><div class="see_last">工业分析技术</div>
				            <?php elseif($stu['stuVol3'] == 4): ?><div class="see_last">化工装备技术</div>
				            <?php else: ?> <div>未填报</div><?php endif; ?>
					</div>
					<div class="see_content_bottom_small">
						<div>志愿D</div>
						<!-- <div class="see_last">化工装备技术</div> -->
						<?php if($stu['stuVol4'] == 1): ?><div class="see_last">应用化工技术（国际化）</div>
				            <?php elseif($stu['stuVol4'] == 2): ?><div class="see_last">应用化工技术</div>
				            <?php elseif($stu['stuVol4'] == 3): ?><div class="see_last">工业分析技术</div>
				            <?php elseif($stu['stuVol4'] == 4): ?><div class="see_last">化工装备技术</div>
				            <?php else: ?> <div class="see_last">未填报</div><?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="stulogin_but">
			<button class="stulogin_back" onClick="javascript :history.back(-1);">返回</button>
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
</body>
</html>