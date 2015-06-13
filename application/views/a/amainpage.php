<?php include '/application/views/template/header.php'?>
  <title>图书展示</title>
</head>
<body>
    <div class="container">
<?php 
    if(get_cookie('username',true)) echo get_cookie('username',true);
    else echo "请先登录！"
?>
      <h1>商品展示区</h1>
      <table class="table">
      	<tr>
             <th>书名</th>
             <th>作者</th>
             <th>价格</th>
             <th>库存量</th>
      	</tr>
<?php 
foreach ($books->result() as $book)
{
    $booknum = $book->BOOK_NUM;
    if($book->BOOK_IF_DOWN==1) 
        $booknum = "已下架";
    echo '<tr><td>'.$book->BOOK_NAME.'</td><td>'.$book->BOOK_AUTHOR.'</td><td>'.
          $book->BOOK_PRICE.'</td><td>'.$booknum.'</td><tr>';
}
?>
      </table>
<?php echo $this->pagination->create_links(); ?>
    </div>
<?php include '/application/views/template/footer.php'?>
