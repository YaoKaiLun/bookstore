<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>库存管理</title>
</head>
<body>
	<h1>添加、删除、修改商品</h1>
	  <table>
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
</body>
</html>