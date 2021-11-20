



 <section>
  <h5 id="item_search_underbar">חיפוש פריט</h5>   
     
<!--  QRCODE SCANNER //-->
            <!--   feedbacks //-->
     <div id="qrfeedback_itemsearch_start" class="rtl"> <span class="blue-text pointer" onclick="qrScannerItemSearch()" >סריקת QR קוד </span></div>
    <div id="qrfeedback_itemsearch" class="rtl"></div>
            <!--   qrcode area //-->

     <?php row3cols_start(8,6); ?><div><!-- page row start//--> 
    <div id="qrdisplay_itemsearch" class="rtl" style="margin-right: -50px;"><div style="width: 240px;" id="qr_itemsearch"></div></div>
     </div><?php row3cols_end(8,6); ?><!-- page row end//--> 



  <div  class="carousel" style="display:none;max-height:200px">
    <a class="carousel-item"><img alt="" src="html/image/logo-small.jpg"></a>
  </div>
         

            
            <div class="card">
              <div class="card-image">
<div class="row" style="">
        <div class="col s8"  id="itemsearch_top">
                
  
       <form id="searchitemform">
            <div style="padding-right:25px">
                <input type="hidden" name="item_search" />
            
            
               <?php input_text('itemname_search', 'שם פריט', 'search', '^.{3,255}$', 'יש להקליד שם פריט (3-255 תווים)', '', 'rtl center-align');?>   
                
                <div class="invalid_input">
               <?php input_number('storage_search', 'איתור', 'image_search', '^[0-9]{3}[-]{1}[a-zA-Z]{1}[-]{1}[0-9]{3}$', 'יש להקליד אחסון פריט (לפי דפוס 000-A-000)', '', 'center-align ltr');?>  
                </div>
                
               <?php input_text_qr('itemid_search', 'מספר קטלוגי', 'qr_code_scanner', '^[0-9]{1}[-]{1}[0-9]{3}[-]{1}[0-9]{5}$', 'יש להקליד מספר פריט (לפי דפוס 1-123-12345)', 'qrScannerItemSearch()', '', 'center-align');?>
                
                
  
                

            </div>
        </form>


                <br />
      
        </div>
        <div class="col s4 right-align">   
            <img id="image_itemsearch" src="html/image/item.png" alt=""  class=" z-depth-2" style="z-index:0;border-radius:1%;        
                    width:100%;height:200px; 
                    min-width: 150px;max-width:400px;"
                 
                 
                 onclick="$('.'+'image_itemsearch'+'_modalimage').modal('open')" />
            
        </div>
</div>
                  
               <span id="itemsearch_qrcodeimage" style="border-radius:10%; width:50px;bottom:0px;"  class="halfway-fab btn-floating " onclick="$('.'+'image_itemsearch'+'_modalqr').modal('open')">
                  
                  
                  <img id="image_itemsearch_qrcode" src="https://chart.googleapis.com/chart?cht=qr&chl=0-000-00000&chs=400x400&choe=UTF-8&chld=L|2" alt="" style="max-width:400px;display: block;margin: auto;" class=" z-depth-2" />
                   

                  </span>
                  
 

              </div>
              <div  class="card-content  container" style="padding:0px;" >
                <h4 id="itemsearch_name" class="card-title" style="margin:0px;padding-right:20px;font-weight:500;" dir="rtl"></h4>
                  
               <div dir="rtl" style="font-weight:400;font-size:1.2em;" class="flow-text">
                   <span class="nobr">
                מקט:
                <strong id="itemsearch_id"></strong></span>
                  
                   <span class="nobr">
                איתור:
                       l <strong id="itemsearch_storage"></strong> l</span><br />
                   <span class="nobr">
                כמות:
                <strong id="itemsearch_quantity"></strong></span>
                   <span class="nobr">
                מחיר:
                <strong id="itemsearch_price"></strong></span><br />
                            
                <p dir="rtl" id="itemsearch_description"></p>
                <p dir="rtl">
                    סוג:
                    <strong id="itemsearch_type"></strong>
                    קטגוריה:
                    <strong id="itemsearch_category"></strong>
                  </p>
            
                  
                  </div></div> 
              <div class="card-action" id="itemsearch_buttones" style="display:none;">
                  
        <?php if($permission>=4): ?>
                <a href="#" class="btn" onclick="$('#itemsearch_id').text()!=''?($('.storagearea_modal').modal('open'),storageValuesSet($('#itemsearch_id').text())):true;">נתוני אחסון ומלאי<i class="material-icons">photo_library</i></a>
        <?php endif; //purchase ?>

        <?php if($permission>=2): ?>
                <a href="#" onclick="$('#itemsearch_id').text()!=''?(itemEditValuesSet( $('#itemsearch_id').text() ), scrollto('#item_bar')):true;" class="btn">עריכת פריט<i class="material-icons">library_books</i></a>
        <?php endif; //item ?>

        <?php if($permission>=3): ?>       
                <a href="" id="order_additem_btn" class="btn" onclick="$('#itemsearch_id').text()!=''?(
                        addItem_orderItem($('#itemsearch_id').text() )
                        ,scrollto('#openorder_additem_top')
                ):true;">
הוספת פריט להזמנה  <span class=""><i class="material-icons circle blue darken-3 white-text" style="min-width:30px">exposure_plus_1</i></span></a>   
        <?php endif; //order  ?> 
                  
                  
                  
              </div>
            </div>
    </section>