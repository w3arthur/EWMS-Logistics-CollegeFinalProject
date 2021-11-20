<?php
//dont forget to set as:
//global $userid;


        //this user settings

function updateUserData_userName(){global $userid;
       if(queryStmt("UPDATE `user` 
    SET `username` = ?
    , `user_updated_at` = current_timestamp() 
    , `username_updated_at` = current_timestamp() 
    WHERE `user`.`userid` = ?
    AND DATEDIFF(current_timestamp(),`username_updated_at`)>=7 AND `user`.`username` != ? ;"
        , array(
            postSet('username_user_change')
            ,$userid
            ,postSet('username_user_change')
               ))){
        postBoolean('username_user_change',"SELECT * FROM `user` WHERE `user`.`username`=");
        }else{falseResponseEcho();}    
}


function updateThisUserPassword(){global $userid;
                                  
    $hashedPassword = postSet_hash('userpassword_thisuser_change');
    if(queryStmt("UPDATE `user` 
    SET `userpassword` = ?
    , `user_updated_at` = current_timestamp() 
    WHERE `user`.`userid` = ?;"
        , array(
            $hashedPassword
            ,$userid
               ))){

        sessionSet('password', $hashedPassword);
        
        trueResponseEcho();
        }else{falseResponseEcho();} 
}


//this user settings

if(postSet('thisuserid_data')==$userid
   &&postSet('username_user_change')
  ){updateUserData_userName();}

if(postSet('thisuserid_password')==$userid
   &&postSet('userpassword_thisuser_change')
   &&postSet('userpassword2_thisuser_change')    ==postSet('userpassword_thisuser_change')
  ){updateThisUserPassword();}
