<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>学生登录主页面</title>
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/stu/css/stulogin.css">
	<script src="/examination/Public/public/js/jq.js"></script>
</head>
<body>
	<div class="stulogin_box">
		<div class="stulogin_header">
			<h3>学 生 登 录 </h3>
		</div>
		<div class="stulogin_content">
			<div class="stulogin_input">
				<div class="stulogin_username">
					<span>账户:</span>
					<input ntype="text" class="stulogin_username_input" onKeyUp="value=value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" placeholder="请输入您的学号" maxlength="15">
				</div>
				<div class="stulogin_psw">
					<span>密码:</span>
					<input type="password" class="stulogin_psw_input" placeholder="请输入您的密码" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" onkeyup="value=value.replace(/[^\w\/]/ig,'')" maxlength="15">
				</div>
			</div>
			<div class="stulogin_but">
				<button class="stulogin_in">登录</button>
				<button class="stulogin_back" onClick="javascript :history.back(-1);">返回</button>
			</div>
		</div>
	</div>


	<script>
		$(".stulogin_in").click(function()
		{	
			if(null==$(".stulogin_username_input").val()||""==$(".stulogin_username_input").val())
			{
				console.log("学号为空")
				return;
			}
			else if(null==$(".stulogin_psw_input").val()||""==$(".stulogin_psw_input").val())
			{
				console.log("密码为空")
				return;
			}
			$.ajax({
				url: "<?php echo U('Index/userlogin');?>",
				data: {
						'username': $(".stulogin_username_input").val(),
						'psw':$(".stulogin_psw_input").val()
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})
	</script>
</body>
</html>