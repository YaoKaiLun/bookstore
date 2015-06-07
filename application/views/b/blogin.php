<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<h1>管理员登录</h1>
	<?php echo validation_errors(); ?>
    <?php echo form_open('bcontroller/index') ?>
		<input type="text" name="admin_name" placeholder="账号" value="<?php echo set_value('admin_name');?>"><br>
		<input type="password" name="admin_pwd" placeholder="密码" value="<?php echo set_value('admin_pwd');?>"><br>
		<input type="submit" value="登录"><br>
	</form>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
