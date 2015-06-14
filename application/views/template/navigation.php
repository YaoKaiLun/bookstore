<ul class="nav nav-tabs">
  <li>
    <a href=
<?php if(get_cookie('username',true)) echo '#';
      else echo site_url('acontroller/index');
?>
    >
<?php if(get_cookie('username',true)) echo get_cookie('username',true);
      else echo "请先登录";
?>
    </a>
  </li>
  <li><a href=<?php echo site_url('acontroller/show_books'); ?>>商品展示页</a></li>
  <li><a href=<?php echo site_url('acontroller/show_cart'); ?>>查看购物车</a></li>
<?php 
    if(get_cookie('username',true)) 
    	echo "<li><a href=".site_url('acontroller/delete_cookie').">注销</a></li>";
?> 
</ul>