 <form>
        <input type="hidden" id="thisuserid_searchexclude"  value="<?php echo $userid; ?>" />
        <?php input_text('user_search', 'חיפוש משתמש', 'search', '^.{3,}$', 'יש להקליד תעודת-זהות / שם-מלא / כינוי  ', '', 'center-align rtl');?> 
</form>

 <form id="usermanage_data">
    <input type="hidden" name="thisuserid_managedata" value="<?php echo $userid; ?>" />
     
    <input type="hidden" id="userid_usermanage" name="userid_usermanage"  />    
     
         
            <?php input_text('username_usermanage', 'שם משתמש', 'perm_identity', '^.{3,50}$', 'יש להקליד שם משתמש (3-50 תווים)', '', 'center-align ltr');?> 
                
            <div class="rtl">במקור הוגדר
                <span id="username_manageoriginally"></span>
                </div>  

            <?php input_number('userpassport_usermanage', 'תעודת זהות', 'contact_page', '^[0-9]{9}$', 'יש להקליד תעודת זהות (9 ספרות)', '', 'center-align ltr');?>
                <div class="rtl">במקור הוגדרה
                <span id="userpassport_manageoriginally"></span>
                </div>    
             <?php input_text('userfullname_usermanage', 'שם מלא', 'contacts', '^.{3,50}$', 'יש להקליד שם מלא (3-50 תווים)', '', 'center-align rtl');?>   
            <div class="rtl">במקור הוגדר
                <span id="userfullname_manageoriginally"></span>
                </div> 
     
            <label for="permission_usermanage">הרשאות משתמש</label>     
    <div class="input-field" >
        <i class="material-icons prefix " style="padding-right:0px">assignment</i>
<select style="" id="permission_usermanage" name="permission_usermanage" class ="right browser-default flow-text" dir="rtl"> 
<option value = "" selected="selected" disabled="disabled"> </option>
<option value = "0">*חסום*</option>
<option value = "1">צפיה בלבד</option>
<option value = "2">פריטים ולקוחות</option>
<option value = "3">הזמנות</option>
<option value = "4">מלאי ורכש</option>  
<option value = "5" class="blue-text">מנהל ראשי!</option>
        </select>
       
            </div>
     <div class="rtl">במקור הוגדר    
         <span id="permission_manageoriginally"></span>
                </div> 
     
            <div id="usermanage_data_feedback" class="rtl"></div>    
                
            <div style="min-height:40px;"><?php button('send_usermanage_data', 'הגדרת נתוני המשתמש','onclick="manageuser_data()" style="position: relative;"', 'assignment_turned_in'); ?></div>
              
                
</form>


 <form id="manageuser_passeword">
  
    <input type="hidden" name="thisuserid_managepassword" value="<?php echo $userid; ?>" />
     
    <input type="hidden" id="userid_usermanage_password" name="userid_usermanage_password"  />   
     

        <?php input_text('userpassword_usermanage_change', 'הזנת סיסמה חדשה', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה (3-255 תווים)', '', 'center-align ltr');?>
  
    <div id="manageuser_passeword_feedback" class="rtl"></div>
     
    <div class="rtl">שינוי סיסמה תנתק בצורה גורפת המכשירים שמחוברים כרגע עם המשתמש הנ"ל</div>
        <div style="min-height:40px;"><?php button('sendpassword_manageuser_change', 'שינוי סיסמת המשתמש','onclick="manageuser_password()" style="position: relative;"', 'book'); ?></div>
                

     
     
</form>

