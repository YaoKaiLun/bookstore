<?php include '/application/views/template/header.php'?>
<title>我的购物车</title>
</head>
<body>
    <div class="container">
<?php include '/application/views/template/navigation.php'?>
    <table class="table">
    	<tr>
    		<th>NUM</th>
    		<th>ISBN</th>
    		<th>书名</th>
    		<th>单价</th>
    		<th>数量</th>
    		<th>总价</th>
    		<th>删除</th>
    	</tr>
<?php
$i=1; 
foreach($this->cart->contents() as $items)
{
	echo "<tr><td>".$i."</td><td>".$items['id']."</td><td>".$items['name']."</td><td>".$items['price']."</td><td>".
	     $items['qty']."</td><td>".$items['subtotal']."</td><td><form accept-charset='utf-8' method='post' action=".
         site_url('acontroller/delete_cart')."><input type='hidden' name='cart_rowid' value=".$items['rowid'].
         "><input type='submit' value='删除''></form></td></tr>";
    $i++;
}
?>
		<tr>
		  <td>总价</td>
		  <td>$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
		  <td colspan="4"></td>
		  <td><input type="button" value="生成订单"></td>
		</tr>
    </table>
    </div>
<?php include '/application/views/template/footer.php'?>