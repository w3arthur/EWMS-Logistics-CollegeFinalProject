<section>         
        <h4 class="center-align"> עריכת לקוח <i class="material-icons ">line_style</i></h4>
</section>
   
                <?php row2cols_start(8); ?>
                <div><!-- row start//-->     

 <section><div class="rtl"><form id="imageuploadform_customeredit">
        
            <!-- Image upload Feedback //-->
            <div id="imagefeedback_customeredit"></div>
                     
            <?php imagearea('imageupload_customeredit', 'customerEdit_ImageDelete()' ,'image_editcustomer'); ?>  
            <!-- upload image//--> 
                      
</form></div></section>
                    
             </div><?php row2cols_middle(8); ?>
             <div><!-- row middle//-->        
                    
                    
                    
            <?php row2cols_start(2); ?>
            <div><!-- row start//-->        


                 
                 


<section><form id="customereditform">
    
    <input type="hidden" id="customerid_customeredit" name="customerid_customeredit" value="" />
    
    
    <h5 class="rtl">מספר לקוח:<br />
        <a href="#" onclick="customerSelectValuesSet($('#customerid_customeredit').val()); scrollto('#customersearch_top', -50);"><i class="material-icons circle blue darken-3 white-text">person_search</i></a>
        <span id="customeridfield_customeredit"> חיפוש לקוח</span></h5>
        <p  class="flow-text">
    
        </p>
    <div><div style="width:99%;padding-right:20px"  >  

        
        
        
        
             
<?php input_text('customername_customeredit', 'שם מלא',  
'perm_identity', '^.{3,255}$', 'יש להקליד שם לקוח (3-255 תווים)', '', 'center-align rtl');?>  
        
<?php input_number('date_customeredit', 'תחילת שירות (לא חובה)',  
'date_range', '^[0-3]{1}[0-9]{1}[.]{1}[0-1]{1}[0-9]{1}[.]{1}[0-3]{1}[0-9]{3}$', 'יש להקליד תאריך תחילת שירות (לפי דפוס 01.12.34)', '', 'center-align ltr');?>      

<?php input_number('telephone_customeredit', 'טלפון (לא חובה)',  
'phone', '^[0-9]{3}[-]{1}[0-9]{3}[-]{1}[0-9]{3,4}$', 'יש להקליד מספר טלפון (לפי דפוס 056-123-4567)', '', 'center-align ltr');?>      
  
      
<?php input_text('address_customeredit', 'כתובת (לא חובה)',  
'home', '^.{0,255}$', 'יש להקליד תאריך תחילת שירות (לפי דפוס 01/12/34/)', '', 'center-align rtl');?>      
  
    
<?php input_textarea('note_customeredit', 'הערות (לא חובה)', 'message','') ?>
            
                 

         <!-- Customer edit feedback//-->
        <div id="feedback_customeredit"></div>
        

        <div id="before_customeredit" style="min-height:40px;">   
            
                <!-- Customer edit button//-->
            <?php button('send_customeredit', 'עריכת לקוח ','onclick="sendCustomerEdit()"', 'checklibrary_books'); ?>
            
        </div>   
    
    </div></div>
    
</form></section>  
                
            </div><?php row2cols_middle(2); ?>
             <div><!-- row middle//-->      
            </div><?php row2cols_end(2); ?>
             <!-- row end//-->      
                 
                 
            </div><?php row2cols_end(8); ?>
             <!-- row end//--> 
                       