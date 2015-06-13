$(function(){
    function  set_select(){
        $("td select").each(function(index){
            $(this).find("option[value=" + $(this).attr('name') + "]").attr("selected",true);
        });
    }
    set_select();
    $('.changeBook').click(function(){
        var isbn = $(this).parent().parent().attr('id');
        var bookPrice = $('#'+isbn+' .bookPrice').val();
        var bookNum = $('#'+isbn+' .bookNum').val();
        var bookIfDown = $('#'+isbn+' select').val();
        //alert(bookIfDown);
        $.ajax({
         url: "/bookstore/index.php/bcontroller/change_book",  
         type: "POST",
         dataType : "text",
         data:{isbn: isbn, bookprice: bookPrice, booknum: bookNum, bookifdown: bookIfDown},
         error: function(){  
             alert('Error loading XML document');  
         },  
         success: function(data){   
             if(data) alert(bookPrice + ' ' + bookNum + ' ' + bookIfDown + ' ' + " 修改成功");
             else alert("修改失败");
         }
        });   
    });
    $('.deleteBook').click(function(){
        var tr =  $(this).parent().parent();
        var isbn = tr.attr('id');
        var flag = confirm("确定删除" + isbn + "？");
        if(flag){
            $.ajax({
                url: "/bookstore/index.php/bcontroller/delete_book",
                type: "POST",
                dataType: "text",
                data: {isbn: isbn},
                error: function(){
                    alert('Error loading XML document');
                },
                success: function(data){
                    if(data==1)  
                        tr.remove();
                    else alert("删除失败");
                }
            });
        }
    });
  });