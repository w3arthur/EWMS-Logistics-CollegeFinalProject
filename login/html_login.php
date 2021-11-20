
<?php
    //logout with tries set
$tries=20;  //set maximum tries to connect the session
if(sessionSet('tries')){$tries=$_SESSION['tries'];}
session_destroy();
session_start();
sessionSet('tries', $tries);
?>

<!DOCTYPE html >
<html lang="he" translate="no">
<head>

    <title>Ewms.co.il לוגיסטיקה</title>  
    
    <?php require('html/head.html'); ?> 
    
</head>
<body>
  <div style="background: no-repeat url('html/image/login.jpg') local  center/ auto 100% ;  background-position: center;min-height:800px">
    <br/>
 
    <main class="container right-align black " style="opacity: 0.8;" >
   <br />

            <div class="rtl white-text">
                ברוכים הבאים למערכת ewms.co.il<br />
                מערכת ניהול לוגיסטית פשוטה ונוחה.<br />
            </div>

                 <!-- item add / edit tabs -->
            
         <div class="white" style="min-height:600px">   
            
        <ul class="row tabs logintabs" id="itemtabs" style="overflow: hidden; width:100%">
          <li class="tab col s6">
            <a href="#register" class="indigo-text text-darken-4 flow-text">הרשמה למערכת</a>
          </li>
          <li class="tab col s6">
            <a href="#login" class="active indigo-text text-darken-4 flow-text">התחברות למערכת</a>
          </li>
        </ul>
        <div id="login" class="col s12 ">
<br />

            <div>
                <span class="indigo-text text-darken-4">
                התחבר/י לצורך שימוש במערכת
                </span>
                <?php row3cols_start(8,6); ?><div><!-- page row start//-->      
                
                    <form id="loginform">
                        <?php input_text('username_login', 'שם משתמש', 'perm_identity', '^.{3,50}$', 'יש להקליד שם משתמש (3-50 תווים)', '', 'center-align ltr');?> 
                
                        <?php input_password('userpassword_login', 'סיסמה', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה (3-255 תווים)', '', 'center-align ltr');?>                
               
                        <div id="login_feedback"></div>
                
                        <div style="min-height:40px;"><?php button('send_login', 'התחברות למערכת','onclick="login()" style="position: relative;"', 'library_add'); ?></div>
                        
                        <br /> <br /> 
                        <div style="min-height:40px;" class="center-align"><a href="?project2020" class="btn" style="width:100%">
                            
                            כניסה עבור בוחני פרויירט 2020
                            <i  class="material-icons prefix">thumb_up</i>
                            
                            </a></div>
                         
                
                    </form>
                </div><?php row3cols_end(8,6); ?><!-- page row end//--> 
                
            </div>
  
            
        </div>
        <div id="register" class="col s12" style="">
        <br />

            <div class="indigo-text text-darken-4">
                הרשם/י לצורך שימוש במערכת
            </div>  
            
                <?php row3cols_start(8,6); ?><div><!-- page row start//-->  
            
            <form id="registerform">
                        <?php input_text('username_register', 'שם משתמש', 'perm_identity', '^.{3,50}$', 'יש להקליד שם משתמש (3-50 תווים)', '', 'center-align ltr');?> 

                         <?php input_number('userpassport_register', 'תעודת זהות', 'contact_page', '^[0-9]{9}$', 'יש להקליד תעודת זהות (9 ספרות)', '', 'center-align rtl');?>           
                     <?php input_text('userfullname_register', 'שם מלא', 'contacts', '^.{3,50}$', 'יש להקליד שם מלא (3-50 תווים)', '', 'center-align rtl');?>         
            
            
                        <?php input_password('userpassword_register', 'סיסמה', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה (3-255 תווים)', '', 'center-align ltr');?>
            
                        <?php input_password('userpassword2_register', 'סיסמה בשנית', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה בשנית (3-255 תווים)', '', 'center-align ltr');?>        
                
                        <div id="register_feedback"></div>
            
            
                        <div style="min-height:40px;"><?php button('send_register', 'הרשמה למערכת','onclick="register()" style="position: relative;"', 'library_add'); ?></div>

                </form>
            
                </div><?php row3cols_end(8,6); ?><!-- page row end//--> 
   
        </div>
       
            </div>   

       <br />     

    </main>

    <br />
    

                <!-- footer -->
            <?php require('html/footer.html'); ?> 

      <br />

</div><!--height div//-->
    
      <?php //all required javascript onready functions

$randomValue_scriptLoad = time();
 
    //javascript tag with random number for reload
function javascript($path){global $randomValue_scriptLoad; echo '<script src="'.$path.'?'.$randomValue_scriptLoad.'"></script>';}

//for development proccesedure
   //  function javascript($path){echo '<script>';require($path);echo '</script>';}
    
javascript('login/js_login.js');
      // onready scripts and print loaded array
 javascript('login/js_login_onready.js');
 
 javascript('javascript/matching.js');
 
 javascript('javascript/imask.js');
      
 javascript('javascript/database.js');
      
      
      ?>
    
    
</body></html>