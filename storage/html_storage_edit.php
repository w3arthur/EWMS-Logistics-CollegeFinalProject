<section>         
        <h4 id="storage_top" class="center-align"> ניהול אחסון ומלאי <i class="material-icons ">line_style</i></h4>
</section>
   
                <?php row2cols_start(8); ?>
                <div><!-- row start//-->     
 
    <br />
    <br />
    <br />
    <br />
    <br />
 
 <section><div class="rtl"><form id="imageuploadform_storage">
        
                     <!-- Image upload Feedback //-->
            <div id="imagefeedback_storage"></div>
                     
            <?php imagearea('imageupload_storage', 'storage_ImageDelete()' ,'image_storage'); ?>  
            <!-- upload image//--> 
                      
</form></div></section>
    
            </div><?php row2cols_middle(8); ?>
             <div><!-- row middle//--> 
                  

<section class="storage"><form id="storageeditform">
    
        <!-- sending input for //-->
    
    <input type="hidden" id="itemid_storage" name="itemid_storage" value="" />
 
    <input type="hidden" id="firtstorage_storage" name="firtstorage_storage" value="" />
    
    <input type="hidden" id="updated_at_storage" name="updated_at_storage" value="" />
    
    
    
    <h5 class="rtl ">מק"ט:<br />
        <a href="#" onclick="$('#itemid_storage').val()!=''?(
                        $('.storagearea_modal').modal('close') 
                        ,itemSelectValuesSet_backToTop($('#itemid_storage').val()) 
                             
                             ):true;"><i class="material-icons circle blue darken-3 white-text">search</i></a>
        <span id="itemidfield_search"> חפש/י פריט</span></h5>
        <p  class="flow-text rtl" id="itemnamefield_search">
    
        </p>
    
    
    
    
    
    <div  class="row" style=""  > 
      <div class="col s12 m10">
          
          
          
          
          
      
        איתור הפריט
        
        <div class="row"  style="width:97%"><!-- row start//-->

        <div class="col s3 m3">        
            <button type="button" class="btn btnstorage center-align"  onclick="storageStorageUpdate()">
                
            עדכון
            
            </button>
        </div>
        <div class="col s9 m9">        

            <?php input_number('storage_storage', '', 'image_search', '^[0-9]{3}[-]{1}[a-zA-Z]{1}[-]{1}[0-9]{3}$', 'הקלד/י אחסון פריט (לפי דפוס 000-A-000)', '', 'center-align ltr');?>   
            
        </div>
           

        </div><!-- row end//-->
        

   
        
        
        
        
        מלאי עכשווי
       <div class="row" style="width:97%"><!-- row start//-->
        <div class="col s3 m3">        
            <button type="button"  class="btn btnstorage center-align" onclick="storageQuantityUpdate()">
                
            עדכון
            
            </button>
        </div>
        <div class="col s9 m9" >  
            <?php input_number('quantity_storage', '', 'shopping_cart', '^.{0,20}$', 'הקלד/י כמות פריטים עכשווית (בין 0 ל 9999999)', '', 'center-align rtl');?> 
            <div>הכמות המוגדרת העכשווית:  <span onclick="$('#quantity_storage').val($('#quantity_storage_now').text());stgMask_update();"> <strong id="quantity_storage_now"></strong> (שחזור) </span></div>
        </div>

        </div><!-- row end//-->
        
        
        
     
        
        
        
  
        להוסיף למלאי
       
       <div class="row" style="width:85%"><!-- row start//-->
        <div class="col s3 m3">        
            <button type="button"  class="btn btnstorage center-align" onclick="storageQuantityAdd()">   
            הוספה
            </button>
        </div>
        <div class="col s9 m9">  
            <div>
            <?php input_number('quantityadd_storage', '', 'add_shopping_cart', '^.{0,20}$', 'הקלד/י כמות פריטים להוספה (בין 0 ל 9999999)', '', 'center-align rtl');?>   
            </div>
        </div>
 
        </div><!-- row end//-->
        
        
        <br />
        
        
          
        עלות הפריט

          
        <div class="row" style="width:97%"><!-- row start//-->
        <div class="col s2 m3">  
                    </div>
        <div class="col s10 m9">
            <?php input_number('price_storage', '', 'attach_money', '^.{0,20}$', 'הקלד/י אחסון פריט (לפי דפוס 000-A-000)', '', 'center-align ltr');?> 
            
                המחיר המוגדר העכשווית:  <span onclick="$('#price_storage').val($('#price_storage_now').text());stgMask_update();"> <strong id="price_storage_now" class="nobr"></strong> (שחזור) </span>

        </div>
        </div>  

        
          
          
          
          
            
        קנה מידה
      
        <div class="row" style="width:90%"><!-- row start//-->
        <div class="col s2 m3">  
                    </div>
        <div class="col s10 m9">
        
<label for="emphasize_storage">קנה מידה</label>     
    <div class="input-field" >
        <i class="material-icons prefix " style="padding-right:0px">alarm_on</i>
<select style="" id="emphasize_storage" name="emphasize_storage" class =" right browser-default flow-text" dir="rtl"> 
<option value = "pcs" selected="selected"> </option>
<option value = "ea">יח'</option>
<option value = "set">סט</option>
<option value = "service">שרות</option>
<option value = "cm">סמ</option>
<option value = "cm2">סמ"ר</option>  
<option value = "kg">קג</option>
        </select>
       
            </div>
        </div> 
        </div>
      
        </div>   
        <div class="col s12 m2">     
                 
  
     </div></div>          
    
    
    
    
    
    
    
    
    
</form></section>  
    
            </div><?php row2cols_end(8); ?>
             <!-- row end//--> 

<div style="position: relative;right:30px">
            <br />
                 <!-- Storage feedback//-->
        <div id="feedback_storage" class="rtl"></div>
            <div id="before_storage" style="min-height:40px;"> 
                <!-- Storage button//-->
            <?php button('send_storage', 'עדכון אחסון ','onclick="sendStorage()"', 'checkphoto_librarys'); ?>


            <?php 
                $onclickValue_itemStorageEdit="$('#itemid_storage').val()!=''?($('.storagearea_modal').modal('close') ,itemEditValuesSet( $('#itemid_storage').val() ), scrollto('#item_bar')):true;";
                
                button('send_storage_edit', 'עריכת פריט ','onclick="'.$onclickValue_itemStorageEdit.'"
            style="position: relative;right:30px" ', 'library_books'); ?>
            </div>
    </div>



         
