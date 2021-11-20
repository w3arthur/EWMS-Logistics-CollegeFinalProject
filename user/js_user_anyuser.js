loaded.user.push('js_user_anyuser.js');

//////////////////////////any user settings

/////////////////////this user settings

function chengeuser_password(){
 matchingReturnToFeadbackBox('#userpassword_thisuser_change');
    
  if($('#userpassword_thisuser_change').val()!=$('#userpassword2_thisuser_change').val()){
     $('#userpassword2_thisuser_change_feedback').text('הסיסמאות לא תואמות');      
  } else if(matching('#userpassword_thisuser_change')    ){
      databaseSendForm_classified(
          '#thisuserchange_passeword'
          ,'#thisuserchange_passeword_feedback'
          ,function(){
             $('#thisuserchange_passeword').trigger('reset');
            }, 'הסיסמה עודכנה במערכת <br /> הסיסמה העכשווית <span class="black-text">(לא מוצגת מטעמי אבטחה)</span> חשובה עבור התחברות עתידית למערכת'
            ,'לא הצליח לעדכן את הסיסמה'); 
      
  } }



function chengeuser_data_username(){
    matchingReturnToFeadbackBox('#username_user_change');
    if($('#originallyset_username').text() == $('#username_user_change').val() ){$('#username_user_change_feedback').text('הוזן אותו שם המשתמש שהוגדר במקור');}
    else if(matching('#username_user_change')
    ){ 
      databaseSendForm_classified('#thisuserchange_data_username', '#thisuserchange_data_feedback', function(){
          $('#send_thisuser_change').prop('disabled', true);
            }, 'מידע המשתמש עודכן במערכת <br /> שם המשתמש העכשווי <span class="black-text" id="new_username">'+$('#username_user_change').val()+'</span> חשוב עבור התחברות עתידית למערכת <br /> '
            ,'לא הצליח לעדכן את שם המשתמש, יתכן ושם המשתמש שונה במהלך השבוע האחרון.');       

     }else{$('#thisuserchange_data_feedback').html('<br /><span class="red-text">אחד הנתונים הוזן בצורה שגויה</span>');}   } 





