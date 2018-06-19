<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>学生登录主页面</title>
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/stu/css/stuLogin.css">
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
					<input type="text" class="stulogin_username_input" onKeyUp="value=value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')" placeholder="请输入您的学号" maxlength="15">
				</div>
				<div class="stulogin_psw">
					<span>密码:</span>
					<input type="password" class="stulogin_psw_input" placeholder="请输入您的密码" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" onkeyup="value=value.replace(/[^\w\/]/ig,'')" maxlength="15">
				</div>
			</div>
			<div class="stulogin_but">
				<button class="stulogin_in">登录</button>
				<button class="stulogin_back" onClick="stulogin_back();">返回</button>
			</div>
		</div>
	</div>


	<script>
		$(".stulogin_in").click(function(e)
		{	
			e.preventDefault();
			if(null==$(".stulogin_username_input").val()||""==$(".stulogin_username_input").val())
			{
				alert("学号为空")
				return;
			}
			else if(null==$(".stulogin_psw_input").val()||""==$(".stulogin_psw_input").val())
			{
				alert("密码为空")
				return;
			}
			var stulogin_username_input=$(".stulogin_username_input").val();
			var stulogin_psw_input=$(".stulogin_psw_input").val();
			// console.log(stulogin_username_input)
			// console.log(stulogin_psw_input)
			$.ajax({
				url: "<?php echo U('Home/Stu/userlogin');?>",
				data: {
						'username': $(".stulogin_username_input").val(),
						'pass':$(".stulogin_psw_input").val()
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{
						window.location.href="<?php echo U('Home/Stu/stuChoose');?>";
					}else if(0==data.status)
					{
						alert("密码错误");
					}
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})


		function stulogin_back(){
			window.location.href="/examination";
		}
	</script>
</body>
</html>