
            <form  id="thisuserchange_data">
                
            <input type="hidden" id="thisuserid_data" name="thisuserid_data" value="<?php echo $userid; ?>" />
                
            <?php input_text('username_thisuser_change', 'שם משתמש', 'perm_identity', '^.{3,50}$', 'יש להקליד שם משתמש (3-50 תווים)', '', 'center-align ltr', 'value="'.$username.'"');?> 
                
            <div class="rtl">במקור הוגדר
            <?php echo $username; ?>
                </div>  

            <?php input_number('userpassport_thisuser_change', 'תעודת זהות', 'contact_page', '^[0-9]{9}$', 'יש להקליד תעודת זהות (9 ספרות)', '', 'center-align ltr', 'value="'.$passport.'"');?>
                <div class="rtl">במקור הוגדרה
            <?php echo $passport; ?>
                
                </div>    
             <?php input_text('userfullname_thisuser_change', 'שם מלא', 'contacts', '^.{3,50}$', 'יש להקליד שם מלא (3-50 תווים)', '', 'center-align rtl', 'value="'.$fullname.'"');?>   
            <div class="rtl">במקור הוגדר
            <?php echo $fullname; ?>
                </div>  
                
                
            <div id="thisuserchange_data_feedback" class="rtl"></div>    
                
            <div style="min-height:40px;"><?php button('send_thisuser_change', 'שינוי נתוני המשתמש שלך','onclick="chengeuser_data()" style="position: relative;"', 'assignment_turned_in'); ?></div>
                

        </form>
    
        <form id="thisuserchange_passeword">   

            <input type="hidden" id="thisuserid_password"  name="thisuserid_password" value="<?php echo $userid; ?>" />
            <?php input_password('userpassword_thisuser_change', 'סיסמה', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה (3-255 תווים)', '', 'center-align ltr');?>
            
            <?php input_password('userpassword2_thisuser_change', 'סיסמה בשנית', 'vpn_key', '^.{3,255}$', 'יש להקליד סיסמה בשנית (3-255 תווים)', '', 'center-align ltr');?> 
            
            
        <div id="thisuserchange_passeword_feedback" class="rtl"></div>
            
        <div class="rtl">שינוי סיסמה תנתק בצורה גורפת את שאר המכשירים שמחוברים כרגע עם המשתמש הנ"ל</div>
            
            <div style="min-height:40px;"><?php button('sendpassword_thisuser_change', 'שינוי הסיסמה שלך','onclick="chengeuser_password()" style="position: relative;"', 'book'); ?></div>

                </form>
