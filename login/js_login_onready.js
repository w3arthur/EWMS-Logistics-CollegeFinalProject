loaded.onready.push('js_login_onready.js');

$(document).ready(function(){//start onready scripts

  phpFastTestingLog();;
     
 console.log('print loaded javascript files:');
 console.log(loaded);  
         
     //tabs login/register
var instance_login = M.Tabs.init(el0, {});

        //login on press enter
$('#username_login, #userpassword_login').keypress(function (e) {if (e.which == 13) {   login();
        return false;}  }   );  
    
    //imask for passport     
imask('#userpassport_register', '000000000')
 
    //login empty the feedback onclick right
onkeyup_matching('#username_login', '#login_feedback');
onkeyup_matching('#userpassword_login', '#login_feedback');           
        //register empty the feedback onclick right
onkeyup_matching('#username_register', '#register_feedback');
onkeyup_matching('#userpassport_register', '#register_feedback');      
onkeyup_matching('#userfullname_register', '#register_feedback');
onkeyup_matching('#userpassword_register', '#register_feedback'); 
$('#userpassword_register, #userpassword2_register').keyup(function(){
    if($('#userpassword_register').val()==$('#userpassword2_register').val()){
        $('#userpassword2_register_feedback, #register_feedback').empty();
    }
});      
       
    
  }); //end onready scripts