$(function(){
    $('.getBookBtn').click(function(){
        var r=confirm("确定收货？");
        if(r==true)
        {
            var hear = $(this);
            var tr = $(this).parent().parent();
            var order_id = tr.attr('id');
            $.ajax({
                url: "/bookstore/index.php/acontroller/get_order",  
                type: "POST",
                dataType : "json",
                data:{order_id: order_id},
                error: function(){  
                 alert('Error loading XML document');  
                },  
                success: function(data){   
                  if(data==1){
                       alert(" 已确认收货");
                       hear.attr("disabled",true);
                       hear.val("已确认收货");
                 } 
                 else alert("确认收货失败");
                }
            });
        }   
    });
    $('.detailBtn').click(function(){
     var order_id = $(this).parent().parent().attr('id');
        $.ajax({
         url: "/bookstore/index.php/bcontroller/show_detail_order",  
         type: "POST",
         dataType : "json",
         data:{order_id: order_id},
         error: function(){  
             alert('Error loading XML document');  
         },   
         success: function(data){
             var text = "<table class='table'><tr><th>ISBN</th><th>书名</th><th>数量</th></tr>";   
             $(data).each(function(){ 
                  text = text + "<tr><td>" + this.ISBN + "</td><td>" + this.BOOK_NAME + "</td><td>" + 
                  this.ORDER_ITEM_NUM + "</td></tr>"; 
             });
             text = text + "</table>";
             //$(".modal-body").append(text);
             $(".modal-body").html(text);
             $('#myModal').modal('show');
         }
        });
    });
  });