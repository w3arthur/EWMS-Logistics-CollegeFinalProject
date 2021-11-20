<section>
    <h5>חיפוש לקוח</h5>

<!--  QRCODE SCANNER //-->
            <!--   feedbacks //-->
     <div id="qrfeedback_customersearch_start" class="rtl"> <span class="blue-text pointer" onclick="qrScannerCustomerSearch()" >סריקת QR קוד </span></div>
    <div id="qrfeedback_customersearch" class="rtl"></div>
            <!--   qrcode area //-->

     <?php row3cols_start(8,6); ?><div><!-- page row start//--> 
    <div id="qrdisplay_customersearch" class="rtl" style="margin-right: -50px;"><div style="width: 240px;" id="qr_customersearch"></div></div>
     </div><?php row3cols_end(8,6); ?><!-- page row end//--> 


            <div class="card">
              <div class="card-image">
<div class="row" style="">
    
    
        <div class="col s4 right-align rtl">   
            <img id="image_customersearch" src="html/image/person.svg" alt=""  class=" z-depth-2"  style="z-index:0;border-radius:1%;        
                    width:100%;height:200px; 
                    min-width: 150px;max-width:400px;"
                 onclick="$('.'+'image_customersearch'+'_modalimage').modal('open')" />
        </div>
        <div class="col s8"> <div style="width:99%;padding-right:20px"  >
                
  
       <form id="searchcustomerform">
            <div style="padding-right:25px">
                <input type="hidden" name="customer_search" />
            
            
               <?php input_text('customername_search', 'שם לקוח', 'person_search', '^[0-9]{2}[-]{1}[0-9]{4}', 'יש להקליד את שם הלקוח (3-255 תווים)', '', 'rtl center-align');?>     

           
               <?php input_text_qr('customerid_search', 'מספר הלקוח', 'qr_code_scanner', '^[0-9]{2}[-]{1}[0-9]{4}$', 'יש להקליד מספר פריט (לפי דפוס 12-1234)', 'qrScannerCustomerSearch()', '', 'center-align');?>
                
                <br />
                
                <h5 id="customersearch_id" class="" style="margin:0px;padding-right:20px;font-weight:400;font-size:1.5em;" dir="rtl"></h5>
            </div>
        </form>


                <br />
      
        </div></div>
</div>
                  
               <span id="customersearch_qrcodeimage" style="border-radius:10%; width:50px; left: 24px;bottom:0px"  class="halfway-fab btn-floating " onclick="$('.'+'image_customersearch'+'_modalqr').modal('open')">
                  
                  
                  <img id="image_customersearch_qrcode" src="https://chart.googleapis.com/chart?cht=qr&chl=00-000&chs=400x400&choe=UTF-8&chld=L|2" alt="" style="max-width:400px;display: block;margin: auto;" class=" z-depth-2" />
                   

                  </span>
                  
 

              </div>
              <div  class="card-content  container" style="padding:0px" >
                <h4 id="customersearch_name" class="card-title" style="margin:0px;padding-right:20px;font-weight:500;" dir="rtl"></h4>
                  
                  
                <div style="font-weight:400;font-size:1.2em;" class="flow-text rtl">      
                  
                  <p dir="rtl">
                  כתובת:
                <span dir="rtl" id="customersearch_address"></span>
                  </p>  
                <p dir="rtl" id="customersearch_notes"></p>
                <p dir="rtl">
                    <span class="nobr">
                    תאריך:
                    <strong id="customersearch_date"></strong></span>
                    <span class="nobr">
                        טלפון:
                    <strong id="customersearch_telephone"></strong>
                        </span>
                  </p>
             
                
                
                
            </div></div>
                
                
                
                
              <div class="card-action">
                  
                 <span id="customersearch_editcustomer_openorder_closed" style="display:none;">נא לעבור למצב פתיחת הזמנה לצורך הוספת הלקוח להזמנה</span>
                  
      
         <?php if($permission>=2): ?>          
            <span id="customersearch_editcustomer" style="display:none;">
                <a href="#" onclick="$('#customersearch_id').text()!=''?
       (customerEditValuesSet($('#customersearch_id').text()),
        scrollto('#editcustomer')):true;


" class="btn">
                    עריכת לקוח
                <i class="material-icons">library_books</i>
                </a>
            </span>      
       <?php endif; //customer ?>           
        
                  
    <?php if($permission>=3): ?>               
        <span id="searchcustomer_replacefororder" class="switch" style="display:none;">
        <label>
        החלפת לקוח לקוח להזמנה
            <input type="checkbox" onclick="
    $('#searchcustomer_replacefororder_button').hasClass('disabled')
    ? $('#searchcustomer_replacefororder_button').removeClass('disabled')
    : $('#searchcustomer_replacefororder_button').addClass('disabled')                                      
                                            " />
            <span class="lever teal"></span>
        </label>
        <a id="searchcustomer_replacefororder_button" href="#openorder" onclick="openOrder_setCustomer_button()" class="btn disabled">הגדרת לקוח במקום הקיים
            <i class="material-icons circle " style="min-width:30px" >person_add</i>
            </a >
            </span>  

             <span id="searchcustomer_setfororder" style="display:none;">
                <a href="#openorder" onclick="openOrder_setCustomer_button()" class="btn">
                    הגדרה להזמנה
                 <i class="material-icons circle blue darken-3 white-text" style="min-width:30px" >person_add</i>
                 </a>
            </span>   
      <?php endif; //order ?>            
            

                  
              </div>
            </div>
</section>
   