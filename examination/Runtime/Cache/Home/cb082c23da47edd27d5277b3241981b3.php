<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>学生报考系统登录主页面</title>
	<link rel="stylesheet" href="/examination/Public/stu/css/index.css">
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
</head>
<body class="index_body">
	<div class="box">
		<div class="header">
			<h3>学 生 报 考 登 录 系 统</h3>
		</div>
		<div class="content">
			<div class="admin_login">
				<a href="">
					管理员登录
				</a>
			</div>
			<div class="stu_login">
				<a href="<?php echo U('Index/stulogin');?>">
					学生登录
				</a>
			</div>
		</div>
		
	</div>
</body>
</html>