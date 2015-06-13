<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加图书</title>
</head>
<body>
	<?php echo validation_errors(); ?>
    <?php echo form_open('bcontroller/add_book') ?>
		<input type="text" name="isbn" placeholder="isbn" value="<?php echo set_value('isbn');?>"><br>
		<input type="text" name="bookname" placeholder="书名" value="<?php echo set_value('bookname');?>"><br>
		<select name='booktypeid'>
			<option value="1">言情</option>
			<option value="2">科幻</option>
			<option value="3">侦探</option>
			<option value="4">教科书</option>
		</select><br>
		<input type="text" name="bookauthor" placeholder="作者" value="<?php echo set_value('bookauthor');?>"><br>
        <input type="number" name="bookprice" placeholder="价格" min="0" max="10000" step="0.1"
           value="<?php echo set_value('bookprice');?>"><br>
        <input type="text" name="publishhouse" placeholder="出版社" value="<?php echo set_value('publishhouse');?>"><br>
        <input type="date" name="publishtime" placeholder="出版时间" value="<?php echo set_value('publishtime');?>"><br>
        <input type="number" name="bookpage" placeholder="页数" min="0" max="10000" step="1"
           value="<?php echo set_value('bookpage');?>"><br>
        <input type="number" name="booknum" placeholder="库存量" min="0" max="100000" step="1"
           value="<?php echo set_value('booknum');?>"><br>
        <input type="text" name="bookkey" placeholder="关键字" value="<?php echo set_value('bookkey');?>"><br>
        <textarea name="bookinfo" cols="30" rows="10" placeholder="详细信息" 
         value="<?php echo set_value('bookinfo');?>"></textarea><br>
        <input type="submit" value="添加">
	</form>

</body>
</html>