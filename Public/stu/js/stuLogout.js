function stuLogout()
{
	$.ajax({
		url: "{:U('Home/Stu/stuLogout')}",
		type: 'post',
		success: function (data) {
			console.log(data)
			if(1==data.status)
			{
				window.location.href="{:U('Home/Stu/stuLogin')}";
			}else if(0==data.status)
			{
				alert("密码错误");
			}
		},
		error: function (XmlHttpRequest) {
			alert(XmlHttpRequest.status);
		}
	})
}