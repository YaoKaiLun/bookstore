<?php include '/application/views/template/header.php'?>
  <title>图书展示</title>
</head>
<body>
    <div class="container">
<?php include '/application/views/template/navigation.php'?>
            <table class="table">
            <tr>
            	<th>订单号</th>
            	<th>总数量</th>
            	<th>总价格</th>
            	<th>下单时间</th>
            	<th>订单项</th>
            	<th>确认订单</th>
            </tr>
<?php
if(!empty($order)){
 foreach ($order as $item) {
 	    $get = "确认收货";
 	    $disabled = "";
 	    if($item->ORDER_IF_GET==1)
 	    	{
 	    		$get = "已确认收货"; 
 	    		$disabled = "disabled";
 	    	} 
    	echo "<tr id=".$item->ORDER_ID."><td>".$item->ORDER_ID."</td><td>".$item->ORDER_NUM."</td><td>".
    	    $item->ORDER_PRICE."</td><td>".$item->ORDERTIME."</td><td><input type='button' class='detailBtn' value='详情'></td><td><input type='button' class='getBookBtn' value=".$get." ".$disabled."></td></tr>";
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
<?php echo "<script src=".base_url('lib/js/myorder.js')."></script>";?>
</body>
</html>