<?php include '/application/views/template/header.php'?>
	<title>查看会员信息</title>
</head>
<body>
<div class="container">
<?php include '/application/views/template/sys_nav.php'?>
	  <table class="table">
    	<tr>
    		<th>ID</th>
    		<th>姓名</th>
            <th>性别</th>
    		<th>邮箱</th>
    		<th>地址</th>
            <th>联系电话</th>
            <th>注册时间</th>
    	</tr>
<?php 
foreach ($result as $member)
{
    echo "<tr><td>".$member->MEMBER_ID."</td><td>".
         $member->MEMBER_NAME."</td><td>".
         $member->MEMBER_SEX."</td><td>".
         $member->MEMBER_POST."</td><td>".
         $member->MEMBER_ADDR."</td><td>".
         $member->MEMBER_PHONE."</td><td>".
         $member->MEMBER_REG_TIME."</td></tr>";
}
?>
       </table>
<?php echo $this->pagination->create_links(); ?>
    </div>
<?php include '/application/views/template/footer.php'?>
</body>
</html>