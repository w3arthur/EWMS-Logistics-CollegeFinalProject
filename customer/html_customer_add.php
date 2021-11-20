<section>         
    <h4 class="center-align"> רישום לקוח <i class="material-icons ">line_style</i></h4>
    <p class="center-align ">
        יש להקליד את נתוני הלקוח כדי להוסיף אותו למאגר
    </p>
</section>
   



 <section><!--  QRCODE SCANNER //-->
            <!--   feedbacks //-->
     <div id="qrfeedback_customeradd_start" class="rtl"> <span class="blue-text pointer" onclick="qrScannerCustomerAdd()" >סריקת QR קוד </span></div>
    <div id="qrfeedback_customeradd" class="rtl" ></div>
            <!--   qrcode area //-->
     <?php row3cols_start(8,6); ?><div><!-- page row start//--> 
    <div id="qrdisplay_customeradd" class="rtl" style="margin-right: -50px;"><div style="width: 240px;" id="qr_customeradd"></div></div>
     </div><?php row3cols_end(8,6); ?><!-- page row end//--> 
</section>
    
                 <?php row2cols_start(8); ?>
                <div><!-- row start//-->     
    
    
        <section><div id="after_customeradd" class="rtl" style="display:none;"><form id="imageuploadform_customeradd">
             

                    <!-- Image upload Feedback //-->
            <div id="imagefeedback_customeradd"></div>
                

            <?php imagearea('imageupload_customeradd', 'customerAdd_ImageDelete()' ,'image_addcustomer'); ?>  
            <!-- upload image//-->                       
                     
                     
                     
             </form>
        </div></section>  
    
    
             </div><?php row2cols_middle(8); ?>
             <div><!-- row middle//-->        
                    
                    
                    
            <?php row2cols_start(2); ?>
            <div><!-- row start//-->        

    
    
    
    
<section>
    <!-- sending input for //-->
    
    
    <form id="customerid_customeraddform">
 <div style="width:99%;padding-right:20px"  > 
    <?php input_text_qr('customeridshown_customeradd', 'מספר לקוח', 'qr_code_scanner', '^[0-9]{2}[-]{1}[0-9]{4}$', 'יש להקליד מספר לקוח (לפי דפוס 12-1234)', 'qrScannerCustomerAdd()', '', 'center-align ltr');?>                   
        </div>
    </form>
    
<form id="customeraddform"> <div style="width:99%;padding-right:20px"  > 
          
    <input type="hidden" id="customerid_customeradd" name="customerid_customeradd" value="" />
        
    <?php input_text('customername_customeradd', 'שם מלא',  
'perm_identity', '^.{3,255}$', 'יש להקליד שם לקוח (3-255 תווים)', '', 'center-align rtl');?>      
    <?php input_number('date_customeradd', 'תאריך תחילת שירות (לא חובה)',  
'date_range', '^[0-3]{1}[0-9]{1}[.]{1}[0-1]{1}[0-9]{1}[.]{1}[0-3]{1}[0-9]{3}$', 'יש להקליד תאריך תחילת שירות (לפי דפוס 01/12/34)', '', 'center-align ltr');?>      

<?php input_number('telephone_customeradd', 'טלפון (לא חובה)',  
'phone', '^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3,4}$', 'יש להקליד מספר טלפון (לפי דפוס 056-123-4567)', '', 'center-align rtl');?>      
  
      
<?php input_text('address_customeradd', 'כתובת (לא חובה)',  
'home', '^.{0,255}$', 'יש להקליד תאריך תחילת שירות (לפי דפוס 01/12/34/)', '', 'center-align rtl');?>      
  
    
<?php input_textarea('note_customeradd', 'הערות (לא חובה)', 'message','') ?>

         <!-- Customer register feedback//-->
    <div id="feedback_customeradd"></div>

</div></form></section>   
       

 <section><!-- Buttones //-->

        <div id="before_customeradd" style="min-height:40px;">   
            
            <?php button('send_customeradd', 'הוספת לקוח ','onclick="sendCustomerAdd()"', 'checklibrary_add_check'); ?>

        </div>   

                       <!--After Register-->  
        <div id="after_customeradd2" class="rtl" style="display:none;">
             
            <div style="min-height:40px;"><?php button('rest_customeradd', 'הוספת לקוח נוסף ','onclick="customerAdd_sendAnotherCustomer()" style="position: relative;left:10px"', 'library_add'); ?></div>


        </div>
</section>
                
                
            </div><?php row2cols_middle(2); ?>
             <div><!-- row middle//-->      
            </div><?php row2cols_end(2); ?>
             <!-- row end//-->      
                 
                 
            </div><?php row2cols_end(8); ?>
             <!-- row end//--> 