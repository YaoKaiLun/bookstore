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
    		<th>单价(￥)</th>
    		<th>数量</th>
    		<th>总价(￥)</th>
    		<th>删除</th>
    	</tr>
<?php
$i=1; 
foreach($this->cart->contents() as $items)
{
	echo "<tr><td>".$i."</td><td>".$items['id']."</td><td>".$items['name']."</td><td>".number_format($items['price'],2).
       "</td><td>".$items['qty']."</td><td>".number_format($items['subtotal'],2)."</td><td><form accept-charset='utf-8'
        method='post' action=".site_url('acontroller/delete_cart')."><input type='hidden' name='cart_rowid' 
        value=".$items['rowid']. "><input type='submit' value='&times;'></form></td></tr>";
    $i++;
}
?>
		<tr>
      <td>总数：<?php echo number_format($this->cart->total_items()); ?>本</td>
		  <td>总价：$<?php echo number_format($this->cart->total(),2); ?></td>
		  <td colspan="4"></td>
		  <td><a href="#myModal" role="button" class="btn" data-toggle="modal">生成订单</a></td>
		</tr>
    </table>

    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form accept-charset="utf-8" method="post" action=
                <?php echo site_url('acontroller/create_order')?> class="form-horizontal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">填写订单</h3>
            </div>
            <div class="modal-body">

<?php
$items = $this->cart->contents();
/* echo "<pre>";
print_r($items);*/
$json_items = base64_encode(json_encode($items));
?>
            
               <input name="member_post" value=<?php echo get_cookie('username');?> type="hidden">
               <input name="items" value=<?php echo $json_items;?> type="hidden">
               <input name="total_num" value=<?php echo number_format($this->cart->total_items()); ?> 
                   type="hidden">
               <input name="total_price" value=<?php echo number_format($this->cart->total(),2,'.',''); ?> 
                   type="hidden">

<?php
foreach($this->cart->contents() as $items)
{
    echo "<p>".$items['name']."   ".$items['qty']."本</p>";
}
echo "<p>总数：".number_format($this->cart->total_items())."本<br>".
      "总价：".number_format($this->cart->total(),2)."</p>";
?>

                <div class="control-group">
                    <label class="control-label" for="get_name">收件人姓名</label>
                    <div class="controls">
                        <input type="text" id="get_name" name="get_name" placeholder="收件人姓名" 
                             value=<?php echo $person_name;?>>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label" for="get_name">收件人地址</label>
                    <div class="controls">
                        <input type="text" id="get_addr" name="get_addr" placeholder="收件人地址" 
                             value=<?php echo $person_addr;?>>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="get_phone">收件人联系电话</label>
                    <div class="controls">
                        <input type="text" id="get_phone" name="get_phone" placeholder="收件人联系电话" 
                             value=<?php echo $person_phone;?>>
                    </div>
                </div>
           </div>
           <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                <input type="submit" class="btn" value="确认">
                <!-- <button type="submit" class="btn" form="order_form" data-dismiss="modal" aria-hidden="true">
                     确认</button> -->
           </div>
      </form>
    </div>  

  </div>
<?php include '/application/views/template/footer.php'?>
</body>
</html>