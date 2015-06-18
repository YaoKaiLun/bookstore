<?php include '/application/views/template/header.php'?>
	<title>管理管理员</title>
</head>
<body>
<div class="container">
<?php include '/application/views/template/sys_nav.php'?>
	  <table class="table">
    	<tr>
    		<th>账号</th>
            <th>密码</th>
    		<th>姓名</th>
    		<th>类型</th>
            <th>创建时间</th>
            <th>禁止</th>
            <th>删除</th>
    	</tr>
<?php 
foreach ($result as $admin)
{
	if($admin->ADMIN_MARK==0)
	{
		$class = "admin_ban";
		$value = "禁止";
	}
	else
	{
		$class = "admin_ok";
		$value = "生效";
	}
    echo "<tr id=".$admin->ADMIN_ID."><td>".$admin->ADMIN_ID."</td><td>".
         $admin->ADMIN_PWD."</td><td>".
         $admin->ADMIN_NAME."</td><td>".
         $admin->ADMIN_TYPE_ID."</td><td>".
         $admin->ADMIN_REG_TIME."</td><td>
         <input type='button' class=".$class." value=".$value."></td>
         <td><input type='button' class='admin_del' value='删除'></td></tr>";
}
?>
       </table>
<?php echo $this->pagination->create_links(); ?>
    </div>
<?php include '/application/views/template/footer.php'?>
<?php echo "<script src=".base_url('lib/js/adminjs.js')."></script>";?>
</body>
</html>