<?php include '/application/views/template/header.php'?>
	<title>库存管理</title>
</head>
<body>
	<h1>删除和修改商品(<a href='/bookstore/index.php/bcontroller/add_book_view'>添加</a>)</h1>
	  <table>
    	<tr>
    	 <th>ISBN</th>
    		<th>书名</th>
    		<th>作者</th>
    		<th>价格</th>
    		<th>库存量</th>
            <th>下架</th>
            <th>删除</th>
            <th>提交</th>
    	</tr>
<?php 
foreach ($books->result() as $book)
{
    $booknum = $book->BOOK_NUM;
/*    if($book->BOOK_IF_DOWN==1) 
        $booknum = "已下架";*/
    echo "<tr id=".$book->ISBN."><td>".$book->ISBN."</td><td>".
         $book->BOOK_NAME."</td><td>".
         $book->BOOK_AUTHOR."</td><td>".
         "<input type='text' value=".$book->BOOK_PRICE." class='bookPrice'></td><td>".
         "<input type='text' value=".$booknum." class='bookNum'></td><td>".
         "<select name =".$book->BOOK_IF_DOWN."><option value='1'>下架</option><option value='0'>上架</option></select>"."</td><td>".
         "<input type='button' value='删除' class='deleteBook'>"."</td><td>".
         "<input type='button' value='提交' class='changeBook'>"."</td></tr>";
}
?>
    </table>
       <?php echo $this->pagination->create_links(); ?>
       <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
       <?php echo "<script src=".base_url('lib/js/bjs.js')."></script>";?>
<?php include '/application/views/template/footer.php'?>