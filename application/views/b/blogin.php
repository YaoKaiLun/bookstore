<?php include '/application/views/template/header.php'?>
	<title>管理员登录</title>
</head>
<body>
    <div class="container">
		<h1>管理员登录</h1>
<?php echo validation_errors(); ?>
        <form accept-charset="utf-8" method="post" action=
           <?php echo site_url('bcontroller/index')?> class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="admin_id">账号</label>
	            <div class="controls">
	                <input type="text"  id="admin_id" name="admin_id" placeholder="账号" 
	                    value="<?php echo set_value('admin_id');?>">
	            </div>
	        </div>
	        <div class="control-group">
                <label class="control-label" for="admin_pwd">密码</label>
	            <div class="controls">
	                <input type="text"  id="admin_pwd" name="admin_pwd" placeholder="密码" 
	                    value="<?php echo set_value('admin_pwd');?>">
	            </div>
	        </div>
	        <div class="control-group">
		        <div class="controls">
			        <input type="submit" value="登录" class="btn">
		        </div>
		    </div>
		</form>
	</div>
<?php include '/application/views/template/footer.php'?>
</body>
</html>
