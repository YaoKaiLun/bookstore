<?php include '/application/views/template/header.php'?>
	<title>添加图书</title>
</head>
<body>
<div class="container">
    <h3>添加图书</h3>
<?php echo validation_errors(); ?>
	<form accept-charset="utf-8" method="post" action=
           <?php echo site_url('bcontroller/add_book')?> class="form-horizontal">
        <div class="control-group">
                <label class="control-label" for="isbn">ISBN</label>
	            <div class="controls">
	                <input type="text" id="isbn" name="isbn" placeholder="isbn" value="<?php echo set_value('isbn');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="bookname">书名</label>
	            <div class="controls">
	                <input type="text" id="bookname" name="bookname" placeholder="书名" value="<?php echo set_value('bookname');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="isbn">booktypeid</label>
	            <div class="controls">
	                <select id="booktypeid" name='booktypeid'>
						<option value="1">言情</option>
						<option value="2">科幻</option>
						<option value="3">侦探</option>
						<option value="4">教科书</option>
					</select>
	            </div>
        </div>
		<div class="control-group">
                <label class="control-label" for="bookauthor">作者</label>
	            <div class="controls">
	                <input type="text" id="bookauthor" name="bookauthor" placeholder="作者" value="<?php echo set_value('bookauthor');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="bookprice">价格</label>
	            <div class="controls">
	                <input type="number" id="bookprice" name="bookprice" placeholder="价格" min="0" max="10000" step="0.1"
                        value="<?php echo set_value('bookprice');?>"><br>
	            </div>
        </div>
		<div class="control-group">
                <label class="control-label" for="publishhouse">出版社</label>
	            <div class="controls">
	                <input type="text" id="publishhouse" name="publishhouse" placeholder="出版社" value="<?php echo set_value('publishhouse');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="publishtime">出版时间</label>
	            <div class="controls">
	                <input type="date" id="publishtime" name="publishtime" placeholder="出版时间" value="<?php echo set_value('publishtime');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="bookpage">页数</label>
	            <div class="controls">
	                <input type="number" id="bookpage" name="bookpage" placeholder="页数" min="0" max="10000" step="1"
                        value="<?php echo set_value('bookpage');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="booknum">库存量</label>
	            <div class="controls">
	                <input type="number" id="booknum" name="booknum" placeholder="库存量" min="0" max="100000" step="1"
                        value="<?php echo set_value('booknum');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="bookkey">关键字</label>
	            <div class="controls">
	                <input type="text" id="bookkey" name="bookkey" placeholder="关键字" value="<?php echo set_value('bookkey');?>">
	            </div>
        </div>
        <div class="control-group">
                <label class="control-label" for="bookinfo">详细信息</label>
	            <div class="controls">
	                <textarea id="bookinfo" name="bookinfo" cols="30" rows="10" placeholder="详细信息" 
                        value="<?php echo set_value('bookinfo');?>"></textarea><br>
	            </div>
        </div>
        <div class="control-group">
	            <div class="controls">
	                <input type="submit" value="添加">
	            </div>
        </div>
	</form>
</div>
<?php include '/application/views/template/footer.php'?>
</body>
</html>