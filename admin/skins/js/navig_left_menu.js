  
      
    $(document).ready(function(){
       //  name="<? echo $do; ?>";
  //alert(doit);
   //alert(action);     
        $("li:even").removeClass("active");
        
       el = $("li  a[href='?do="+doit+"&action="+action+"']");
       el.css("color","red")
        el.parent().addClass("active");
       
        
        
        $('li').click (function () {
     
          //  $("li:even").removeClass("active");
          //$("li a[href='?do="+doit+"&action="+action+"']").html("active");
             //$(this).addClass("active");

        })
        })
    