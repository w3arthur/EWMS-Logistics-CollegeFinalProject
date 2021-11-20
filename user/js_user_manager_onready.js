function js_user_manager_onreadyActivate(){


loaded.onready.push('js_user_manager_onready.js');

   
/////////////////////this user settings
 //imask for passport   
  imask('#userpassport_thisuser_change', '000000000');
        //user empty the feedback onclick right
onkeyup_matching('#userpassport_thisuser_change', '#thisuserchange_data_feedback');      
//onkeyup_matching('#username_thisuser_change' set inside js_user_anyuser_onready.js
onkeyup_matching('#userfullname_thisuser_change', '#thisuserchange_data_feedback');
    
    
onkeyup_matchingReturnFunctionElseKeepCheck('#userpassport_thisuser_change'
    ,'userpassport_thisuser_change_class'
    ,function(){databaseCheckPassport_thisuser();});  
     onkeyup_matchingReturnFunctionElseKeepCheck('#username_thisuser_change'
    ,'username_thisuser_change_class'
    ,function(){databaseCheckUserName_thisuser();});     
    
    //password chenge area
//onkeyup_matching('#userpassword_thisuser_change' set inside js_user_anyuser_onready.js
// *.keyup( for password1==password2 set inside js_user_anyuser_onready.js
    



//////////////////////////manager user settings onready 

// materialize tabs activate
    instance_user = M.Tabs.init(el_user, {});
    
/////////////////user manage
      var userpassport_manageMask= imask('#userpassport_usermanage', '000000000');
        //user empty the feedback onclick right
 
         //user empty the feedback onclick right
    onkeyup_matching('#username_usermanage', '#usermanage_data_feedback');
    onkeyup_matching('#userpassport_usermanage', '#usermanage_data_feedback');      
    onkeyup_matching('#userfullname_usermanage', '#usermanage_data_feedback');  
    
    onkeyup_matchingReturnFunctionElseKeepCheck('#userpassport_usermanage'
    ,'userpassport_usermanage_class'
    ,function(){databaseCheckPassport_manageuser();}); 
    
    onkeyup_matchingReturnFunctionElseKeepCheck('#username_usermanage'
    ,'username_usermanage_class'
    ,function(){databaseCheckUserName_manageuser();}); 

          //auto complete functions
    //customer search auto complete, customer id
databaseAutocompleteSet_classified('#user_search', 0
    , function(request){return {user_search: request.term
    , thisuserid_searchexclude: $('#thisuserid_searchexclude').val() }}
    , function(){}
    , function(data, response){ response( data );}
    , function(ui){
    $('#userid_usermanage').val(ui.item.userid);
    $('#userid_usermanage_password').val(ui.item.userid);
    $('#username_usermanage').val(ui.item.username);
    $('#username_manageoriginally').text(ui.item.username);
   $('#userpassport_usermanage').val(ui.item.userpassport);
    userpassport_manageMask.updateValue();
    $('#userpassport_manageoriginally').text(ui.item.userpassport);
    $('#userfullname_usermanage').val(ui.item.userfullname);
    $('#userfullname_manageoriginally').text(ui.item.userfullname);
     $('#permission_usermanage').val(ui.item.permission);
    $('#permission_manageoriginally').text(ui.item.permissionname);
          }   );   
 
 }  //end function js_user_manager_onreadyActivate()
