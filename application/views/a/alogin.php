<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员登录</title>
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
	<h1>会员登录</h1>
	<?php echo validation_errors(); ?>
    <?php echo form_open('acontroller/index') ?>
		<input type="email" name="login_email" placeholder="邮箱号" value="<?php echo set_value('login_email');?>"><br>
		<input type="password" name="login_pwd" placeholder="密码" value="<?php echo set_value('login_email');?>"><br>
		<input type="submit" value="登录"><br>
	</form>
	<a href="acontroller/handle_reg">注册</a>
    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>