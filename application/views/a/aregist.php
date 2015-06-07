<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册会员</title>
</head>
<body>
	<h1>会员注册</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('acontroller/handle_reg') ?>
		<input type="email" name="reg_email" placeholder="邮箱" value="<?php echo set_value('reg_email');?>"><br>
		<input type="password" name="reg_pwd" placeholder="密码" value="<?php echo set_value('reg_pwd');?>"><br>
		<input type="password" name="conf_pwd" placeholder="确认密码" value="<?php echo set_value('conf_pwd');?>"><br>
		<lable><input type="radio" name="reg_sex" value="男" />男</lable>
        <label><input type="radio" name="reg_sex" value="女" /> 女</label><br>
        <input type="tel" name="reg_phone" placeholder="联系电话" value="<?php echo set_value('reg_phone');?>"><br>
        <input type="text" name="reg_addr" placeholder="地址" value="<?php echo set_value('reg_addr');?>"><br>
        <input type="submit" value="注册">
	</form>
</body>
</html> 