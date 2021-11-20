<?php 
            //load areas and connection data for any loaded page from index.php/?___
    require('html/tags_form.php'); //html all function tags 
    require('html/tags_grid_bar.php'); //html all function tags 
    require('mysql.php'); //database php functions and connection
    pageHTTPSredirect(); //set https, not in localhose or number ip
    session_start();

// Project 2020, Password for eximinators
if(getSetEmpty('project2020')){ 
    sessionSet('userid', '42'); //admin
    $password2020=results("SELECT userpassword FROM `user` WHERE userid='".sessionSet('userid')."'");
    $password2020=$password2020[0]['userpassword'];
    sessionSet('password', $password2020);}

//site get /?___ refere redirect
if(getSetEmpty('login')): require('login/html_login.php'); //index.php?login
else: //index.php

 $userid='';
 $fullname=''; 
 $passport='';
 $permission=0;

//must connect set for index.php in index.php/?login
if(!sessionSet('userid')||!sessionSet('password')){header('Location: ?login');
}else{
    $userdata=results("SELECT * FROM `user` WHERE `user`.`userid`='".sessionSet('userid')."' AND `user`.`userpassword`='".sessionSet('password')."';");

    if(empty($userdata)&&!$userdata[0]){header('Location: ?login');
    }else{$userdata=$userdata[0];
        $userid=html($userdata['userid']);
        $username=html($userdata['username']);
        $passport=html($userdata['userpassport']);
        $fullname=html($userdata['userfullname']);
        $permission=html($userdata['permission']);  
        sessionSet('userid', $userid);  }  }

mysqli_close($conn); //close connection ?>


<!DOCTYPE html ><html lang="he"  translate="no"><head>
    
    <title>Ewms.co.il לוגיסטיקה</title>  
    
    <?php require('html/head.html'); ?>

</head><body>
    
          <?php require('html/navbar.php'); ?>
    
    <br/>
    
    <main class="container" >
        
        
      <!-- header navbar --> 
    <br/>
        
<div id="wellcomearea">

        <form>
            
    <p class="rtl"><span id="indexgreetings">ברוך/ה הבא/ה:</span><?php echo $fullname;?>        
    
    
        <?php if($permission>=1): ?>
                    <span class="switch">
                        <label>
                        <a id="logoff" class="off_logoff">התנתק/י</a>
                         <span class="height-fix">   
                            <input type="checkbox" onclick="logoutLink('#logoff')">
                            <span class="lever blue darken-3"></span>
                        </span> 
                        </label>
                    </span>
        <?php endif; //orders ?>  
    
        <?php if($permission==0): ?>
                <a href="?login">התנתק/י</a>
        <?php endif; //orders ?> 
   </p>
    
    </form>
    
  				<?php if($permission==0): ?>
    <section>
    <h5 class="blue-text rtl">נכון לעכשיו, לא ניתנו לך הרשאות עבודה</h5>
    <p class="blue-text rtl">יש לפנות להנהלה לצורך בקשת הרשאות עבודה ולאחר מכן לרען דף זה.</p>
        <br />
        <br />
        <br />


    </section>
				<?php endif; //not activated ?>  
    
                <?php if($permission>=3): ?>
    <p>
        ברשותך <strong id="neworders_count">0</strong> הזמנות פתוחות
    </p>
                <?php endif; //orders ?>  
           
</div>
   
<br /> 

                <?php if($permission>=1): ?>
            <?php bar('item_search_bar','חיפוש פריטים', 'list') ?>
                    <!-- item search//-->
            <?php require('item/html_item_search.php'); ?>
                <?php endif; //basic ?>  

                <?php if($permission>=3): ?>
<br />
<br />
            <?php bar('order_bar','ניהול הזמנות', 'clipboard-list') ?>
    
            <?php require('order/html_order_tabs.php'); ?>
                <?php endif; //basic ?>   
    

                <?php if($permission>=1): ?>  
<div id="customersearch_top"></div>
<br />
<!-- customer search//-->
            <?php bar('customer_search_bar',' חיפוש לקוחות', 'user') ?>  
            <?php require('customer/html_customer_search.php'); ?>
                <?php endif; //basic ?>     
    

             <?php if($permission>=2): ?>    
         <div id="customeredit_top"></div>
<br />  
<br />
            <!-- customer tabs//-->
        <?php bar('customer_bar','ניהול לקוחות', 'users-cog') ?>    
        <?php require('customer/html_customer_tabs.php'); ?>
            <?php endif; //customer and items ?>          


             <?php if($permission>=2): ?>  
<br />
<br />
        <!-- item tabs//-->
        <?php bar('item_bar','ניהול פריטים', 'sitemap') ?>
        <?php require('item/html_item_tabs.php'); ?>
            <?php endif; //customer and items ?>    
    
                <!-- end main//-->
        <br /></main><br />
   
                <!-- footer -->
            <?php require('html/footer.html'); ?> 
    
            <?php if($permission>=1): ?>
    <!-- modal user setting area popup areas//--> 
        <?php require('user/html_user_modal.php');  // permission set inside?>
            <?php endif; //usersettings, admin $permission>=5 set inside ?>  
    
            <?php if($permission>=4): ?>

                    <!-- storage //-->
        <?php require('storage/html_storage_modal.php'); ?>
    
            <?php endif; //storage and purchase ?>  


             <?php if($permission>=1): ?>  
    
    <!-- modal image enlarge photo and qr-image popup areas//-->
        <?php require('html/modal_image.html'); ?>  

    
    <!-- external javascript  run //-->
        <?php require('javascript/_globalfunctions.php'); //all javascript files ?>
    
             <?php endif; //basic ?>
    

</body></html> <!-- end document//-->

<?php endif;  //end all the get conditions for /?___ set ?>