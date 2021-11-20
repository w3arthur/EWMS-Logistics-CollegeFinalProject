<?php
//dont forget to set as:
//global $userid;




        //this user settings
function updateThisUserData(){global $userid;
       if(queryStmt("UPDATE `user` 
    SET `active`='1', `username` = ?
    , `userpassport` = ?
    , `userfullname` = ?
    , `user_updated_at` = current_timestamp() 
    WHERE `user`.`userid` = ?;"
        , array(
            postSet('username_thisuser_change')
            ,postSet('userpassport_thisuser_change')
            ,postSet('userfullname_thisuser_change') 
            ,$userid
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}    
}






//check if password is registered before
if(postSet('check_foruserid')){
postBoolean('check_passport', "SELECT * FROM `user` WHERE `userid`!=".postSet('check_foruserid')." AND`userpassport` ="); 

postBoolean('check_username', "SELECT * FROM `user` WHERE `userid`!=".postSet('check_foruserid')." AND`username` =");    
    
}


        //manage users
function userSearch_autoComplete(){global $response, $userid;
    $search = postSet('user_search');
    //falseResponseEcho();
                                 
    $search_loop = str_replace(' ', "%') AND (userfullname LIKE '%", $search ); 
    $query = "SELECT userid, username, userfullname, userpassport, user.permission permission ,permissionname FROM user INNER JOIN zrel_permission ON user.permission  = zrel_permission.permission WHERE ((userpassport LIKE '".$search."%') OR (username LIKE '".$search."%') OR (userfullname LIKE '%".$search_loop."%')) AND userid!=$userid ORDER BY userid DESC LIMIT 7";
    $results = query($query);                           
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    $response= array("length"=>count($datas));
                                   
                                   
                                   
    foreach ($datas as $row){$response[] = array("value"=>html('('.$row['permissionname'].')  '.$row['userpassport'].'  '.$row['username'].'  '.$row['userfullname'])
        , "userid"=>html($row['userid'])
        , "permission"=>html($row['permission'])
        , "permissionname"=>html($row['permissionname'])            
        , "userpassport"=>html($row['userpassport'])
        , "username"=>html($row['username'])
        , "userfullname"=>html($row['userfullname'])
        ,"label"=>html('('.$row['permissionname'].') '.$row['userpassport'].' ו '.$row['username'].' ו '.$row['userfullname'])   );}
    if(count($datas)<1){$response[] = array("value"=>"","label"=>"אין תוצאות" );}
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות...");}

}





function updateUserData(){global $response;
                
       if(queryStmt("UPDATE `user` 
    SET `username` = ?
    , `userpassport` = ?
    , `userfullname` = ?
    , `permission` = ?
    , `user_updated_at` = current_timestamp() 
    , `active` = 1
    WHERE `user`.`userid` = ?;"
        , array(
            postSet('username_usermanage')
            ,postSet('userpassport_usermanage')
            ,postSet('userfullname_usermanage') 
            ,postSet('permission_usermanage')
            ,postSet('userid_usermanage')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}    
}


function updateUserPassword(){global $userid;
    if(queryStmt("UPDATE `user` 
    SET `userpassword` = ?
    , `user_updated_at` = current_timestamp() 
    WHERE `user`.`userid` = ?;"
        , array(
            postSet_hash('userpassword_usermanage_change')
            , postSet('userid_usermanage_password')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();} }





        //search user by username or other data

//this user settings
if(postSet('thisuserid_data')==$userid
   &&postSet('username_thisuser_change')
   &&postSet('userpassport_thisuser_change')
  &&postSet('userfullname_thisuser_change') 
  ){updateThisUserData();}




//manage users
        //autocomplete manage users
if(//postSet('thisuserid_searchexclude')==$userid&&
   postSetEmpty('user_search'))
{userSearch_autoComplete();}


if(postSet('thisuserid_managedata') ==$userid
   &&postSet('userid_usermanage')   
   &&postSet('username_usermanage')
   &&postSet('userpassport_usermanage')
   &&postSet('userfullname_usermanage') 
   &&postSetEmpty('permission_usermanage') 
  ){updateUserData();}


if(postSet('thisuserid_managepassword')==$userid
   &&postSet('userid_usermanage_password')
   &&postSet('userpassword_usermanage_change')
  ){updateUserPassword();}


