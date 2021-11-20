function js_user_anyuser_onreadyActivate(){

loaded.onready.push('js_user_anyuser_onready.js');

//////////////////////////any user settings onready

  /////////////////this user settings

onkeyup_matching('#username_thisuser_change', '#thisuserchange_data_feedback');

    //password chenge area
onkeyup_matching('#userpassword_thisuser_change', '#thisuserchange_passeword_feedback');    
$('#userpassword_thisuser_change, #userpassword2_thisuser_change').keyup(function(){
 if($('#userpassword_thisuser_change').val()==$('#userpassword2_thisuser_change').val()){
     $('#userpassword2_thisuser_change_feedback, #thisuserchange_passeword_feedback').empty();
    } 
});   


 }  //end function js_user_anyuser_onreadyActivate()

