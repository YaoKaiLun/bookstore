$(function(){
    $('.admin_ban').click(function(){
        var r=confirm("确定禁止?");
        if(r==true)
        {
            var hear = $(this);
            var tr = $(this).parent().parent();
            var admin_id = tr.attr('id');
            $.ajax({
                url: "/bookstore/index.php/bcontroller/ban_admin",  
                type: "POST",
                dataType : "text",
                data:{admin_id: admin_id},
                error: function(){  
                 alert('Error loading XML document');  
                },  
                success: function(data){   
                  if(data!=0){
                       hear.val("生效");
                       hear.removeClass("admin_ban").addClass("admin_ok");
                   } 
                   else alert("禁止失败");
                }
            });
        }   
    });
    $('.admin_ok').click(function(){
        var r=confirm("确认生效?");
        if(r==true)
        {
            var hear = $(this);
            var tr = $(this).parent().parent();
            var admin_id = tr.attr('id');
            $.ajax({
                url: "/bookstore/index.php/bcontroller/ok_admin",  
                type: "POST",
                dataType : "text",
                data:{admin_id: admin_id},
                error: function(){  
                 alert('Error loading XML document');  
                },  
                success: function(data){   
                  if(data!=0){
                       hear.val("禁止");
                       hear.removeClass("admin_ok").addClass("admin_ban");       
                   } 
                   else alert("生效失败");
                }
            });
        }   
    });
    $('.admin_del').click(function(){
        var r=confirm("确认删除");
        if(r==true)
        {
            var hear = $(this);
            var tr = $(this).parent().parent();
            var admin_id = tr.attr('id');
            $.ajax({
             url: "/bookstore/index.php/bcontroller/del_admin",  
             type: "POST",
             dataType : "text",
             data:{admin_id: admin_id},
             error: function(){  
                 alert('Error loading XML document');  
             },   
             success: function(data){
                 if(data!=0)  tr.remove(); 
                 else alert("删除失败");
             }
            });
         }
    });
  });