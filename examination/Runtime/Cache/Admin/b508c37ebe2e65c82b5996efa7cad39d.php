<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息</title>
	<link rel="stylesheet" href="/examination/Public/public/css/public.css">
	<link rel="stylesheet" href="/examination/Public/admin/css/changeClassPerson.css">
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
	<div class="classP_box">
		<div class="classP_header">
			<h3>修改班级人数</h3>
		</div>
		<div class="classP_content">
			<div class="classP_list_box">
				<div class="classP_list">
					<span>化工1(国际化)</span>
					<input type="hidden" value="1" id="class1">
					<div><input type="text" name="" placeholder="<?php echo ($res["0"]["person"]); ?>" class="class_p1_val"></div>
				</div>
				<div class="classP_list">
					<span>化工2</span>
					<input type="hidden" value="2" id="class2">
					<div><input type="text" name="" placeholder="<?php echo ($res["1"]["person"]); ?>" class="class_p2_val"></div>
				</div>
				<div class="classP_list">
					<span>工分1</span>
					<input type="hidden" value="3" id="class3">
					<div><input type="text" name="" placeholder="<?php echo ($res["2"]["person"]); ?>" class="class_p3_val"></div>
				</div>
				<div class="classP_list">
					<span>装备1</span>
					<input type="hidden" value="4" id="class4">
					<div><input type="text" name="" placeholder="<?php echo ($res["3"]["person"]); ?>" class="class_p4_val"></div>
				</div>
			</div>
			<div class="stulogin_but">
				<button class="stulogin_in">提交</button>
				<button class="stulogin_back" onclick="javascript :history.back(-1);">取消</button>
			</div>
		</div>
	</div>


	<script>
		$(".stulogin_in").click(function(){
			if((!$(".class_p1_val").val()) || (!$(".class_p2_val").val()) || (!$(".class_p3_val").val()) || (!$(".class_p4_val").val()))
			{
				alert("班级人数不能为空")
				return ;
			}
			$.ajax({
				url: "<?php echo U('Admin/Index/changeClassP');?>",
				data: {
						"class1":$("#class1").val(),
						"class_p1_val":$(".class_p1_val").val(),
						"class2":$("#class2").val(),
						"class_p2_val":$(".class_p2_val").val(),
						"class3":$("#class3").val(),
						"class_p3_val":$(".class_p3_val").val(),
						"class4":$("#class4").val(),
						"class_p4_val":$(".class_p4_val").val(),
					  },
				dataType : 'json', 
				type: 'post',
				success: function (data) {
					console.log(data)
					if(1==data.status)
					{	
						alert("修改成功");
						window.location.href="<?php echo U('Admin/index/changeClass');?>";
					}else if(0==data.status)
					{
						alert("修改失败");
					}
				}
			})
		})
	</script>

</body>
</html>