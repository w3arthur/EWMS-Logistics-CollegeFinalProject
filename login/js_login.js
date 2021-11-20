    var loaded=[];
loaded.database=[]; 
loaded.login=[];
loaded.onready=[];
loaded.javascript=[];

loaded.login.push('js_login.js');
    

     //tabs login/register
var el0 = document.querySelector('.logintabs');
var instance =''; //js_login_onready.js

function login(){
    matchingReturnToFeadbackBox('#username_login');
    matchingReturnToFeadbackBox('#userpassword_login');
   if(matching('#username_login')&&matching('#userpassword_login')){
         
        databaseSendForm('#loginform'
        , '#login_feedback'
        , function(data){      
        if(data.password===true){ windowExit();} 
        else if(data.password===false){
            if(data.triesout===true){
                $('#login_feedback').html('<span class="red-text">עקב חריגה מכמות נסיונות ההתחברות המירבית, המערכת ננעלה<br /> אנא נסה/י מאוחר יותר או פנה/י להנהלה</span>');
            }else{$('#login_feedback').html('<span class="red-text">הוזנו שם משתמש/סיסמה שגויים</span>');}  }
  }, '', 'לא הצליח להתחבר למערכת');
 }else{$('#login_feedback').html('<br /><span class="red-text">אחד הנתונים הוזן בצורה שגויה</span>');}   }
    
  
function register(){
    matchingReturnToFeadbackBox('#username_register');
    matchingReturnToFeadbackBox('#userpassport_register');
    matchingReturnToFeadbackBox('#userfullname_register');
    matchingReturnToFeadbackBox('#userpassword_register');
    if($('#userpassword_register').val()!=$('#userpassword2_register').val()){
        $('#userpassword2_register_feedback').text('הסיסמאות לא תואמות');   }
    if(matching('#username_register')
       &&matching('#userpassport_register')
       &&matching('#userfullname_register')
       &&matching('#userpassword_register')
       &&($('#userpassword_register').val()==$('#userpassword2_register').val())
    ){  databaseCheck_classified('#registerform'
        ,{register_username:$('#username_register').val()}
        ,'#username_register_feedback, #register_feedback'
        , $('#username_register').val() +' המשתמש כבר רשום במערכת' 
        ,''
        ,function(){
              databaseSendForm_classified('#registerform', '#register_feedback', function(){
                  
                  setTimeout( windowExit(), 3000);
                  
                    }, 'ביצוע הרשמת המשתמש הושלם<br /> בקש/י מהמנהל אישור עבודה במערכת', 'לא הצליח לרשום את המשתמש');   }    
        );
     }else{$('#register_feedback').html('<br /><span class="red-text">אחד הנתונים הוזן בצורה שגויה</span>');}   }    