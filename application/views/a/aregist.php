<?php include '/application/views/template/header.php'?>
	<title>注册会员</title>
</head>
<body>
    <div class="container">
	    <h1>会员注册</h1>
        <?php echo validation_errors(); ?>
        <form accept-charset="utf-8" method="post" action=
              <?php echo site_url('acontroller/handle_reg')?> class="form-horizontal">
        <!-- <?php echo form_open('acontroller/handle_reg') ?> -->
            <div class="control-group">
	            <label class="control-label" for="reg_email">Email</label>
	            <div class="controls">
	                <input type="email" id="reg_email" name="reg_email" placeholder="邮箱" 
	                value="<?php echo set_value('reg_email');?>">
	            </div>
	        </div>
	        <div class="control-group">
	            <label class="control-label" for="reg_pwd">密码</label>
	            <div class="controls">
	                <input type="password" id="reg_pwd" name="reg_pwd" placeholder="密码" 
	                    value="<?php echo set_value('reg_pwd');?>">
	            </div>
	        </div> 
	        <div class="control-group">
	            <label class="control-label" for="conf_pwd">确认密码</label>
	            <div class="controls">
	                <input type="password" id="conf_pwd" name="conf_pwd" placeholder="确认密码" 
	                    value="<?php echo set_value('conf_pwd');?>">
	            </div>
	        </div>
	        <div class="control-group">
	            <label class="control-label" for="reg_name">姓名</label>
	            <div class="controls">
	                <input type="tel" id="reg_name" name="reg_name" placeholder="姓名" 
		                value="<?php echo set_value('reg_name');?>">
	            </div>
	        </div> 
	        <div class="control-group"> 
	            <div class="controls">
		            <label class="radio"><input type="radio" name="reg_sex" value="男" />男</label>
		        </div>
	        </div>
	        <div class="control-group"> 
	            <div class="controls">
		            <label class="radio"><input type="radio" name="reg_sex" value="女" />女</label>
		        </div>
	        </div>
		    <div class="control-group">
	            <label class="control-label" for="reg_phone">联系电话</label>
	            <div class="controls">
	                <input type="tel" id="reg_phone" name="reg_phone" placeholder="联系电话" 
		                value="<?php echo set_value('reg_phone');?>">
	            </div>
	        </div>
	        <div class="control-group">
	            <label class="control-label" for="reg_addr">地址</label>
	            <div class="controls">
	               <input type="text" id="reg_addr" name="reg_addr" placeholder="地址" 
		               value="<?php echo set_value('reg_addr');?>">
	            </div>
	        </div>
	        <div class="control-group">
		        <div class="controls">
			        <input type="submit" value="注册" class="btn">
		        </div>
		    </div>
		</form>
	</div>	
<script>
	var form=document.getElementsByTagName("form");
	form.className="form-horizontal";  
</script>
<?php include '/application/views/template/footer.php'?>
</body>
</html>