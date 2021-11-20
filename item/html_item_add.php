<section>         
    <h4 class="center-align"> רישום פריט <i class="material-icons ">line_style</i></h4>
    <p class="center-align ">
        יש להקליד את נתוני הפריט כדי להוסיף אותו למלאי
    </p>
</section>
   

 <section style="margin-right: -50px;"><!--  QRCODE SCANNER //-->
            <!--   feedbacks //-->
     <div id="qrfeedback_itemadd_start" class="rtl"> <span class="blue-text pointer" onclick="qrScannerItemAdd()" >סריקת QR קוד </span></div>
    <div id="qrfeedback_itemadd" class="rtl"></div>
            <!--   qrcode area //-->
    
    <div id="qrdisplay_itemadd" class="rtl"><div style="width: 240px;" id="qr_itemadd"></div></div>
     
</section>
  

<section>
    <!-- sending input for //-->
    
    
    <form id="itemid_itemaddform">
        

    
    <?php input_text_qr('itemidshown_itemadd', 'מספר קטלוגי', 'qr_code_scanner', '^[0-9]{1}[-]{1}[0-9]{3}[-]{1}[0-9]{5}$', 'יש להקליד מספר פריט (לפי דפוס 1-123-12345)', 'qrScannerItemAdd()', 'right', 'center-align ltr');?>                   

    </form>
    
<form id="itemaddform">

    <input type="hidden" id="itemid_itemadd" name="itemid_itemadd" value="" />
        
    <?php input_text('itemname_itemadd', 'שם פריט',  
'touch_app', '^.{3,255}$', 'יש להקליד שם פריט (3-255 תווים)', 'right', 'center-align rtl');?>      

    <?php itemtype_options('itemtype_itemadd','right', '');?> 

    <?php itemcategory_options('itemcategory_itemadd','right', '');?>                    

    <?php input_textarea('description_itemadd', 'תיאור פריט (לא חובה)', 'message','right') ?>

         <!-- Item register feedback//-->
    <div id="feedback_itemadd"></div>

</form></section>   
       

 <section><!-- Buttones //-->

        <div id="before_itemadd" style="min-height:40px;">   
            
            <?php button('send_itemadd', 'שליחת פריט ','onclick="sendItemAdd()"', 'checklibrary_add_check'); ?>

        </div>   

                       <!--After Register-->  
        <div id="after_itemadd" class="rtl" style="display:none;">
             
        

     <div class="row"><div class="col s6">
         
     <?php if($permission>=4): ?>    
        <?php
        $onclickValue="$('#itemid_itemadd').val()!=''?($('.storagearea_modal').modal('open'),storageValuesSet($('#itemid_itemadd').val())):true;";

         button('go_to_storage_edit2', 'עריכת אחסון ','onclick="'.$onclickValue.'" style="position: relative;left:40px;" ', 'photo_library'); ?>
    <?php endif; //purchase and storage ?>
         
    </div>
    <div class="col s6">        
             <?php button('rest_itemadd', 'הוספת פריט נוסף ','onclick="itemAdd_sendAnotherItem()" style="position: relative;left:60px;"', 'library_add'); ?>   
      </div>      
            </div> 
         
            
            <div>לעדכון תמונה יש לגרור תמונה או לצלם</div>
            
                    <!-- Image upload Feedback //-->
            <div id="imagefeedback_itemadd"></div>
                 <form id="imageuploadform_itemadd">
            <div style="max-width:250px">
            <?php imagearea('imageupload_itemadd', 'itemAdd_ImageDelete()' ,'image_additem'); ?>  
            <!-- upload image//-->                       
            </div>         
                     
                     
             </form>
        </div>
</section>
