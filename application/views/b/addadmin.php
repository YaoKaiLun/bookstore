<?php include '/application/views/template/header.php'?>
	<title>注册会员</title>
</head>
<body>
    <div class="container">
<?php include '/application/views/template/sys_nav.php'?>
        <?php echo validation_errors(); ?>
        <form accept-charset="utf-8" method="post" action=
              <?php echo site_url('bcontroller/add_admin')?> class="form-horizontal">
            <div class="control-group">
	            <label class="control-label" for="reg_name">姓名</label>
	            <div class="controls">
	                <input type="text" id="reg_name" name="reg_name" placeholder="姓名" 
	                value="<?php echo set_value('reg_name');?>">
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
                <label class="control-label" for="admin_type_id">管理员类型</label>
	            <div class="controls">
	                <select id="admin_type_id" name='admin_type_id'>
						<option value="2">仓库管理员</option>
						<option value="3">客服</option>
						<option value="4">配送管理员</option>
					</select>
	            </div>
        </div>
	        <div class="control-group">
		        <div class="controls">
			        <input id="add_admin" type="submit" value="添加" class="btn">
		        </div>
		    </div>
		</form>
	</div>	
<script>
$(function(){
    $("#add_admin").click(function(){
    	var r = confirm("确认添加");
        if(r==false)
        {
            event.preventDefault();
            return false;
        } 
    });
});
</script>
<?php include '/application/views/template/footer.php'?>
</body>
</html>