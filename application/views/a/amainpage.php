<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图书展示</title>
</head>
<body>
	<?php foreach ($books as $book_item): ?>
    <?php echo $book_item['ISBN'] ?>
    <?php echo $book_item['BOOK_NAME'] ?>
<?php endforeach ?>
</body>
</html>
