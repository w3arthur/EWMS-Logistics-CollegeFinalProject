<section>         
        <h4 class="center-align"> עריכת פריט <i class="material-icons ">line_style</i></h4>
</section>
   
                <?php row2cols_start(4); ?>
                <div><!-- row start//-->     

<section><form id="itemeditform">
    
    <input type="hidden" id="itemid_itemedit" name="itemid_itemedit" />
    
    
    <h5 class="rtl">מק"ט:<br />
        <a href="#" onclick="
           $('#itemid_itemedit').val()!=''
                             ?itemSelectValuesSet_backToTop($('#itemid_itemedit').val())
                             :itemSelectValuesSet_backToTop('empty');
            "><i class="material-icons circle blue darken-3 white-text">search</i></a>
        <span id="itemidfield_itemedit"> חיפוש פריט</span></h5>
        <p  class="flow-text">
    
        </p>
    <div><div style="width:99%;padding-right:20px"  >  

            <?php input_text('itemname_itemedit', 'שם פריט', 'touch_app', '^.{3,255}$', 'יש להקליד שם פריט (3-255 תווים)', '', 'center-align rtl');?>     

            <?php itemtype_options('itemtype_itemedit','');?> 

            <?php itemcategory_options('itemcategory_itemedit','');?>                    

            <?php input_textarea('descriptionitem_itemedit', 'תיאור פריט (לא חובה)', 'message', '') ?>              
                 

         <!-- Item edit feedback//-->
        <div id="feedback_itemedit"></div>
        

        <div id="before_itemedit" >   
            
                                   
  
        

        
  
            <!-- Item edit button//-->
            <?php button('send_itemedit', 'עריכת פריט ','onclick="sendItemEdit()"', 'checklibrary_books'); ?>  
     
     <?php if($permission>=4): ?>       
            <?php 
            $onclickValue="$('#itemid_itemedit').val()!=''?($('.storagearea_modal').modal('open'),storageValuesSet($('#itemid_itemedit').val())):true;";
            
            button('go_to_storage_edit1', 'עריכת אחסון ','onclick="'.$onclickValue.'" style="position: relative;right:30px;" ', 'photo_library'); ?>
            
            
     <?php endif;  ?>       
            
        </div>   
    
    </div></div>
    
</form></section>   
    
            </div><?php row2cols_middle(4); ?>
             <div><!-- row middle//--> 
                   
 
 <section><div class="ltr"><form id="imageuploadform_itemedit">
        
                     <!-- Image upload Feedback //-->
            <div id="imagefeedback_itemedit"></div>
                     
            <?php imagearea('imageupload_itemedit', 'itemEdit_ImageDelete()' ,'image_edititem'); ?>  
            <!-- upload image//--> 
                      
</form></div></section>
                 
            </div><?php row2cols_end(4); ?>
             <!-- row end//--> 
                       