<?php

        //register user check for user name exist
postBoolean('register_username', "SELECT * FROM user WHERE username =");


function login(){global $response;
    $response= array("value"=>true, "password"=> false, "triesout"=>false);
    $userdata=results("SELECT * FROM `user` WHERE `user`.`username`='".postSet('username_login')."'");
    if($userdata&&$userdata[0]){
        sessionSet('tries',20); // reset tries
        $userdata=$userdata[0];
     if(password_verify ( postSet('userpassword_login') , $userdata['userpassword'] )){ //compare secced
            $response["password"]=true;
        sessionSet('userid', $userdata['userid']);
        sessionSet('password', $userdata['userpassword']);  
            }   }    }

function register(){
    $hashedPassword = postSet_hash('userpassword_register');
    
 queryStmt("
INSERT INTO `user` (`userid`, `username`, `userpassword`, `userpassport`, `userfullname`, `active`, `tries`, `user_registered_at`, `user_updated_at`, `permission`, `usernote`, `user_lastconnected_at`, `logoutvalue`, `username_updated_at`) VALUES (NULL, ?, ?, ?, ?, '0', '10', current_timestamp(), current_timestamp(), '0', NULL, NULL, NULL, current_timestamp());", 
         array(     postSet('username_register')
                    ,$hashedPassword
                    ,postSet('userpassport_register')
                    ,postSet('userfullname_register')
                    ));
   
$lastInsertedId = lastAI();
        if($lastInsertedId!=0){
           sessionSet('userid',$lastInsertedId); 
           sessionSet('password',$hashedPassword); 
        }
    
    
postBoolean('username_register', "SELECT * FROM `user` WHERE `user`.`username`="); 
    
    
        }



        //login
if(postSet('username_login')
 &&postSet('userpassword_login')
 &&sessionSet('tries')) {  
    $_SESSION['tries']=$_SESSION['tries']-1; 
    if($_SESSION['tries'] > 0){
        login();
    } else{
        $response= array("value"=>true, "password"=> false, "triesout"=>true);
         }   }

        //register
if(postSet('username_register')
 &&postSet('userpassport_register')
 &&postSet('userfullname_register')   
  &&postSet('userpassword_register')
   &&postSet('userpassword2_register')
   &&(postSet('userpassword_register')==postSet('userpassword2_register'))
  ){    register();}

