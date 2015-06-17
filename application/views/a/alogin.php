<?php include '/application/views/template/header.php'?>
	<title>会员登录</title>
</head>
<body>
    <div class="container">
	    <h1>会员登录</h1>
       <?php echo validation_errors(); ?>
       <form accept-charset="utf-8" method="post" action=
             <?php echo site_url('acontroller/index')?> class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="login_email">Email</label>
	            <div class="controls">
	                <input type="email" id="login_email" name="login_email" placeholder="邮箱号" 
	                value="<?php echo set_value('login_email');?>">
	            </div>
	        </div>
			<div class="control-group">
	            <label class="control-label" for="login_pwd">密码</label>
	            <div class="controls">
	                <input type="password" id="login_pwd" name="login_pwd" placeholder="密码" 
	                value="<?php echo set_value('login_email');?>">
	            </div>
	        </div> 
	        <div class="control-group">
		        <div class="controls">
			        <input type="submit" value="登录" class="btn">
			        <a href="./handle_reg">注册</a>
		        </div>
		    </div>       
	    </form>
	</div>
<?php include '/application/views/template/footer.php'?>
</body>
</html>