<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="minimal-ui=yes,width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>学生密码重置</title>
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/admin/css/revPsw.css">
	<script src="/examination/Public/public/js/jq.js"></script>
</head>
<body>
	<div class="content_top">
		<div></div>
		<div class="content_top_content">
			<div class="username"><span>管理员：</span><p><?php echo (session('username')); ?></p></div>
			<div class="user_exit" onclick="adminLogout()"><span><?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1528439492800" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1051" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="12"><defs><style type="text/css"></style></defs><path d="M511.5 548.3c-10.3 0-18.6-8.3-18.6-18.6V82.6c0-10.3 8.3-18.6 18.6-18.6s18.6 8.3 18.6 18.6v447.1c0 10.3-8.3 18.6-18.6 18.6z" fill="#fd0000" p-id="1052"></path><path d="M511.5 959c-247 0-447.9-200.1-447.9-446 0-149.8 74.9-288.7 200.3-371.7 8.6-5.7 20.1-3.3 25.8 5.3 5.7 8.6 3.3 20.1-5.3 25.8-115 76.1-183.6 203.4-183.6 340.7 0 225.4 184.2 408.8 410.6 408.8S922.1 738.4 922.1 513c0-136.1-67.8-262.9-181.3-339.1-8.5-5.7-10.8-17.3-5.1-25.9 5.7-8.5 17.3-10.8 25.9-5.1 123.8 83.2 197.8 221.5 197.8 370-0.1 246-201 446.1-447.9 446.1z" fill="#fd0000" p-id="1053"></path></svg></span><button >注销</button></div>
		</div>
	</div>
	<div class="revPsw_box">
		<div class="stuScore_header">
			<h3>学生密码重置</h3>
		</div>
		<div class="revPsw_content">
			<div class="revPsw_ind revPsw_ind_1">
				<span>学号:</span>
				<input type="text"  placeholder="请输入需要重置的学号" onKeyUp="value=value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'')"  maxlength="15">
			</div>
			<div class="revPsw_ind revPsw_ind_2">
				<span>学生姓名:</span>
				<input type="text" readonly="readonly">
			</div>
		</div>
		<div class="stulogin_but">
			<button class="stulogin_in">重置</button>
			<button class="stulogin_back" onClick="javascript :history.back(-1);">取消</button>
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
		$(".revPsw_ind_1").find("input").blur(function(){
			var flag=1;
			if(null==$(this).val()||""==$(this).val())
			{
				flag=0;
				return ;
			}

			if(flag){
				var stuNum=$(this).val();
				$.ajax({
					url: "<?php echo U('Admin/Index/pswStuInfo');?>",
					data: {
							'stuNum': stuNum
						  },
					dataType : 'json', 
					type: 'post',
					success: function (data) {
						if(data)
						{
							$(".revPsw_ind_2").find("input").val(data.stuName)
						}
						else {
							alert("没有此学号")
						}
					},
					error: function (XmlHttpRequest) {
						alert(XmlHttpRequest.status);
					}
				})
			}
			

		})
		$(".stulogin_in").click(function(){
			if(null==$(".revPsw_ind_1").find("input").val()||""==$(".revPsw_ind_1").find("input").val())
			{
				alert("学号不能为空")
				return ;
			}
			var stuNum=$(".revPsw_ind_1").find("input").val();
			$.ajax({
				url: "<?php echo U('Admin/Index/pswStuR');?>",
				data: {
						'stuNum': stuNum
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					if(data){
						alert("重置成功");
					}else{
						alert("已经重置")
					}
					return ;
				},
				error: function (XmlHttpRequest) {
					alert(XmlHttpRequest.status);
				}
			})
		})
	</script>
</body>
</html>