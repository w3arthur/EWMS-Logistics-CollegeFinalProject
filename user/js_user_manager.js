loaded.user.push('js_user_manager.js');

//////////////////////////manager user settings


/////////////////user manage
function manageuser_data(){
    matchingReturnToFeadbackBox('#username_usermanage');
    matchingReturnToFeadbackBox('#userpassport_usermanage');
    matchingReturnToFeadbackBox('#userfullname_usermanage');

    $('#usermanage_data_feedback').empty();
    
    if(matching('#username_usermanage')
       &&matching('#userpassport_usermanage')
       &&matching('#userfullname_usermanage')
    ){ 
        databaseCheckUserName_manageuser();
        databaseCheckPassport_manageuser();
        
            
      databaseSendForm_classified('#usermanage_data', '#usermanage_data_feedback', function(){
          $('#user_search').val('');
            }, 'מידע המשתמש עודכן במערכת <br /> שם המשתמש העכשווי <span class="black-text">'+$('#username_usermanage').val()+'</span> חשוב עבור התחברות עתידית למערכת <br /> '
            ,'לא הצליח לעדכן את מידע המשתמש');       

     }else{$('#usermanage_data_feedback').html('<br /><span class="red-text">אחד הנתונים הוזן בצורה שגויה</span>');}   }    






function  databaseCheckUserName_manageuser(){
  databaseCheck_classified('#usermanage_data'
    ,{check_username: $('#username_usermanage').val(), check_foruserid: $('#userid_usermanage').val()}
    ,'#username_usermanage_feedback'
    ,'שם המשתמש כבר רשום בערכת ע"י משתמש אחר'
    ,''
  );}



function  databaseCheckPassport_manageuser(){
  databaseCheck_classified('#usermanage_data'
    ,{check_passport: $('#userpassport_usermanage').val(), check_foruserid: $('#userid_usermanage').val()}
    ,'#userpassport_usermanage_feedback'
    ,'תעודת הזהות רשומה בערכת ע"י משתמש אחר'
    ,''
  );}




function manageuser_password(){
 matchingReturnToFeadbackBox('#userpassword_usermanage_change');
    
if(matching('#userpassword_usermanage_change')){
      databaseSendForm_classified(
          '#manageuser_passeword'
          ,'#manageuser_passeword_feedback'
          ,function(){

              $('#manageuser_passeword').trigger('reset');
              
            }, 'הסיסמה עודכנה במערכת <br /> הסיסמה העכשווית <span class="black-text">(לא מוצגת מטעמי אבטחה)</span> חשובה עבור התחברות עתידית למערכת'
            ,'לא הצליח לעדכן את הסיסמה'); 
  } }











  /////////////////////this user settings
function chengeuser_data(){
    matchingReturnToFeadbackBox('#username_thisuser_change');
    matchingReturnToFeadbackBox('#userpassport_thisuser_change');
    matchingReturnToFeadbackBox('#userfullname_thisuser_change');

    if(matching('#username_thisuser_change')
       &&matching('#userpassport_thisuser_change')
       &&matching('#userfullname_thisuser_change')
    ){ 
        databaseCheckUserName_thisuser();
        databaseCheckPassport_thisuser();
        

      databaseSendForm_classified('#thisuserchange_data', '#thisuserchange_data_feedback', function(){
            }, 'מידע המשתמש עודכן במערכת <br /> שם המשתמש העכשווי <span class="black-text">'+$('#username_thisuser_change').val()+'</span> חשוב עבור התחברות עתידית למערכת <br /> '
            ,'לא הצליח לעדכן את מידע המשתמש');       

     }else{$('#thisuserchange_data_feedback').html('<br /><span class="red-text">אחד הנתונים הוזן בצורה שגויה</span>');}   } 

    




function  databaseCheckUserName_thisuser(){
  databaseCheck_classified('#thisuserchange_data'
    ,{check_username: $('#username_thisuser_change').val(), check_foruserid: $('#thisuserid_data').val()}
    ,'#username_thisuser_change_feedback'
    ,'שם המשתמש כבר רשום בערכת ע"י משתמש אחר'
    ,''
  );}



function  databaseCheckPassport_thisuser(){
  databaseCheck_classified('#thisuserchange_data'
    ,{check_passport: $('#userpassport_thisuser_change').val(), check_foruserid: $('#thisuserid_data').val()}
    ,'#userpassport_thisuser_change_feedback'
    ,'תעודת הזהות רשומה בערכת ע"י משתמש אחר'
    ,''
  );}
   