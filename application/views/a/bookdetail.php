<?php include '/application/views/template/header.php'?>
  <title>商品详情</title>
</head>
<body>
  <div class="container">
<?php include '/application/views/template/navigation.php'?>
      <div class="hero-unit">
          <h2><?php echo $detail->BOOK_NAME?></h2>  
          <p>作者 <?php echo $detail->BOOK_AUTHOR?></p>
	      <p>定价 ￥<?php echo $detail->BOOK_PRICE?></p>
<?php
$booknum = $detail->BOOK_NUM;
$down = $detail->BOOK_IF_DOWN;
if($booknum!=0 && $down==1)  $booknum = "已下架";
if($booknum==0 || $down==1)  $addcart="disabled";
else $addcart = "";
?>
          <p>库存量 <?php echo $booknum?></p>
	      <form class='form-inline' accept-charset='utf-8' method='post' action=
             <?php echo site_url('acontroller/add_cart')?> >
			      <input type='hidden' name='cart_isbn' value=<?php echo $detail->ISBN ?> >
			      <input type='hidden' name='cart_name' value=<?php echo $detail->BOOK_NAME ?> >
			      <input type='hidden' name='cart_price' value=<?php echo $detail->BOOK_PRICE ?> >
            <input type='number' id='cartNum' name='cart_num' class='input-small' min='1' max='1000' step='1'>
            <input type='submit' id='addCart' value='加入购物车' <?php echo $addcart?> >
         </form>
      </div>
      <div class="accordion">
          <div class="accordion-group">
              <div class="accordion-heading">书本详情</div>
             <div class="accordion-body collapse in">
                 <div class="accordion-inner">
	                 <?php
		                  echo "<p>ISBN ".$detail->ISBN."</p>";
					      echo "<p>出版社 ".$detail->PUBLISH_HOUSE."</p>";
					      echo "<p>出版时间  ".$detail->PUBLISH_TIME."</p>";
					      echo "<p>页数 ".$detail->BOOK_PAGE."</p>";
                     ?>  
                 </div>
             </div>
          </div>
          <div class="accordion-group">
              <div class="accordion-heading">内容简介</div>
             <div class="accordion-body collapse in">
                 <div class="accordion-inner">
                      <?php echo "<p>出版社 ".$detail->BOOK_INFO."</p>";?>
                 </div>
             </div>
          </div>
      </div>
<?php include '/application/views/template/footer.php'?>
<script>
$(function(){
    $("#addCart").click(function(){
        if($("#cartNum").val()==="")
        {
            alert("数量不能为0");
            event.preventDefault();
            return false;
        } 
    });
});
</script>
</body>
</html>