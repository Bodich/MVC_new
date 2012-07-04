 
$(document).ready(function() {
    def = "Введіть запит для пошуку";
    $("#i").val(def);
    var input = document.getElementById('i');
    input.onblur = function() {
        input.value = def;
        setTimeout( 'location="http://povarec.net/MVC/index.php?type=preView&cat_num=1";', 500 );
    }
    input.onclick = function() {
        input.value = '';
    }
    input.oninput = function() { 
        con= input.value;
        if (con.length > 60) {
            input.value = ""
        }
        document.getElementById('result').innerHTML = 'Шукаємо : '+input.value ; 
        
        $.ajax({
            url: 'libs/search_controller.php',
   
            type: "POST",
            data: 'data='+input.value,
            success: function(response) {
                $('#my_content').html(response);
            } 
        }) 
    } 


 
 
 



}) 
  
 
 

 
 
	 
	
    