<?php include '/application/views/template/header.php'?>
<title>待处理订单</title>
</head>
<body>
    <div class="container">
	    <?php include '/application/views/template/send_nav.php'?>
        <h3>待处理订单</h3>
        <table class="table">
            <tr>
            	<th>订单号</th>
            	<th>总数量</th>
            	<th>总价格</th>
            	<th>收件人</th>
            	<th>收件人地址</th>
            	<th>收件人电话</th>
            	<th>下单时间</th>
            	<th>订单项</th>
            	<th>确认订单</th>
            </tr>
<?php
if(!empty($query)){
 foreach ($query as $order) {
    	echo "<tr id=".$order->ORDER_ID."><td>".$order->ORDER_ID."</td><td>".$order->ORDER_NUM."</td><td>".
    	     $order->ORDER_PRICE."</td><td>".$order->ORDER_NAME."</td><td><input class='span3' disabled type='text'
    	     value=".$order->ORDER_ADDR."></td><td>".$order->ORDER_PHONE."</td><td>".$order->ORDERTIME.
	         "</td><td><input type='button' class='detailBut' value='详情'></td>
	         <td><input type='button' class='orderBut' value='确认发货'></td></tr>";
    }
}
?>
        </table>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel">Modal header</h3>
		  </div>
		  <div class="modal-body">
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
		  </div>
		</div>
    </div>
<?php include '/application/views/template/footer.php'?>
<?php echo "<script src=".base_url('lib/js/sendjs.js')."></script>";?>
</body>
</html>