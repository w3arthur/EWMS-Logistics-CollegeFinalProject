
<h5>הוספת הזמנה</h5>
 <section>
<!--  QRCODE SCANNER //-->
            <!--   feedbacks //-->
     <div id="qrfeedback_orderopen_start" class="rtl"> <span class="blue-text pointer" onclick="qrScannerOrderOpen()" >סריקת QR קוד </span></div>
    <div id="qrfeedback_orderopen" class="rtl"></div>
            <!--   qrcode area //-->

     <?php row3cols_start(8,6); ?><div><!-- page row start//--> 
    <div id="qrdisplay_orderopen" class="rtl" style="margin-right: -50px;"><div style="width: 240px;" id="qr_orderopen"></div></div>
     </div><?php row3cols_end(8,6); ?><!-- page row end//--> 
</section>

          
            <div class="itemcard card">
              <div class="card-image">
<div class="row">
    
    
        <div class="col s4 right-align rtl">
            <img id="image_orderadd" src="html/image/person.svg"  class="z-depth-2" alt="" 
               style="z-index:0;border-radius:1%;        
                    width:100%;height:200px; 
                    min-width: 150px;max-width:400px;"  
                 
                 onclick="$('.'+'image_orderadd'+'_modalimage').modal('open')"
                 
                 />
            
              <span id="customersearch_qrcodeimage2" style="border-radius:10%; width:50px; left: 24px;bottom:40px"  class=" btn-floating left" onclick="$('.'+'image_customersearch'+'_modalqr').modal('open')">
                  
                  
                  <img id="image_orderadd_qrcode" src="https://chart.googleapis.com/chart?cht=qr&chl=&chs=400x400&choe=UTF-8&chld=L|2" alt=""  class=" z-depth-2" />

                  </span>
            
        </div>
                 
        <div class="col s8"> <div style="width:99%;padding-right:20px"  >
                
  
       <form id="addorderform">
            <div style="padding-right:25px">
            
        <div id="openorder_beforesend">
             <?php input_text_qr('orderid_orderopen', 'מספר הזמנה', 'qr_code_scanner', '^[0-9]{2}[-]{1}[0-9]{4}[-]{1}[0-9]{3}$', 'יש להקליד מספר פריט (לפי דפוס עד 11-999-9999)', 'qrScannerOrderOpen()', '', 'center-align');?>

            
            <div id="orderopen_orderid_area">
                הזן/י את מספר ההזמנה או השאר/י ריק<br />
            <a href="#openorder" onclick="$('#orderid_orderopen').val('');$('#orderid_orderopen_feedback').empty();qrScanner_closeAll();">איפוס שדה מספר הזמנה</a>
            </div>
            <input type="hidden" id="customerid_order" name="customerid_order" value="" />
            
        </div>
                
                

            </div>
   
        </form>
            
            
     <section id="openorder_aftersend">
            
            
            
           <h5 id="customersearch_order_id" class="right-align" style="margin:0px;padding-right:0px" dir="rtl"> 
        <span class="nobr" id="openorder_additem_top">מספר הזמנה:</span> 
        <span class="nobr" id="orderid_openorder">  </span>          
        <br />
        <span class="nobr">מספר לקוח:</span>   
        <span class="nobr"><a href="#" onclick="customerSelectValuesSet($('#customerid_order').val() );
            scrollto('#customersearch_top', -50);"><i class="material-icons circle blue darken-3 white-text">person_search</i></a>
            <strong id="clientid_openorder">חובה להגדיר</strong></span>   
        </h5>
    <div class="rtl">
        <div id="openorder_clientset"><a href="#" onclick="customerSelectValuesSet($('#customerid_order').val() );
            scrollto('#customersearch_top', -50);">הגדרת לקוח (או שינוי)</a></div>
        <span class="nobr">שם לקוח:</span> 
        <span id="clientname_openorder"></span>
        <br />
        <span class="nobr">יוצר/ת ההזמנה:</span>
        <span id="username_openorder"><?php echo $fullname; ?></span>
    </div>  
            
            
            </section>         

                <br />
      
        </div>
    
 
           
    
    
    </div>
</div>
                  

                

              </div>
              <div  id="openorder_aftersend2" class="card-content" style="padding:0px" >
                  
                <h4 class="card-title rtl" style="margin:0px;padding-right:20px">
                  צור/י הזמנה
                  </h4>
                  <div class="row"> 
                      <div class="col s12 ">
                    <div id="openorder_button_feedback" class="blue-grey lighten-3" style="display:none;">
<span class="red-text text">עוד לא הוגדר לקוח להזמנה להזמנה</span> <a href="#customersearch_top" onclick="$('#customerid_order').val()!=''?(
    customerSelectValuesSet($('#customerid_order').val() ) ,scrollto('#customersearch_top', -50)
    ):true;">הגדר/י לקוח</a><a href="#" onclick="$('#openorder_button_feedback').hide()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></a> 
                          </div>
                  <div class="right"  id="openorder_addbutton">
                        <a class="btn " href="#" onclick="itemSelectValuesSet_backToTop('empty');">
                      <span>
                      הוספת פריט נוסף
                      </span>
                     <span class="btn-floating btn-large  waves-effect waves-light valign-wrapper"><i class="material-icons" >exposure_plus_1</i></span> 
                      </a>
                      
                  </div>

                  </div>
                  </div> 
                  
                  <div id="openorder_aftersend3" class="">
                      <br />
                      
                
                      <div class="rtl">
                          <span> יש </span><strong id="openorder_itemscount">0</strong><span> שורות ברשימה (אישור ההזמנה בתחתית הדף) </span><br/>
                      </div>
                      
                      
                      <div id="openorder_after_feedback" class="blue-grey lighten-3"></div>
                      
                      
                      <div id="openorder_after_feedback2" class="blue-grey lighten-3"></div>

                           
        <ul class="collection ltr" id="openorder_items" style="margin:5px">      
            <li class="collection-item" style="padding:1px;"></li>
        </ul> 
  
                  <br />

                      
                 <br />
                  <div id="openorder_aftersend4" class="white" style="padding:0px 50px 0px 50px ">
                      <form id="openorder_globaldata" class="send"><section>
                      <div class="rtl">
                    <p>
                        <strong>סה"כ המחיר הצפוי לאחר שליחת ההזמנה מלאי+רכש: </strong><strong id="openorder_totalpurchaseprice_area" style="text-decoration: underline;">0</strong> <spam>עבור</spam> <strong id="openorder_itemscount2">0</strong> <spam>שורות</spam><br/>
                        <span>(יש לבצע שליחה/אישור כדי לקבל את המחיר והאישור על ביצוע ההזמנה)</span>
                    </p>     
                       
                          
                      </div>     
                         <br /> 
                          <?php input_textarea('description_orderopen', 'הערות להזמנה (לא חובה)', 'message','') ?>
    
                        <br />  
                        <input type="hidden" id="orderid_orderitem_afternotes" name="orderid_orderitem" value=""/> 
  

                    <span class="switch">
                        <label>
                        מחיקת ההזמנה
                         <span class="height-fix">   
                            <input type="checkbox" onclick="$('#delete_openorder').prop( 'disabled', !$('#delete_openorder').prop('disabled') );" />
                            <span class="lever red darken-3"></span>
                        </span> 
                        </label>
                    </span>

                    <button id="delete_openorder" type="button" disabled="disabled" onclick="orderopen_reset()" class="btn red darken-3">מחיקת ההזמנה</button >
                          
                          
                          
                          </section></form>
                   </div>
                      
                </div>
                  <br />
              </div>
                
                
                
                 <div  id="openorder_feedback"></div>
              <div class="card-action">
         
               
           

   
           
            <a href="#" id="send_openorder"  class="btn" onclick="orderOpenSend_each()">הכנת הזמנה
                  <i class="material-icons white-text">assignment_turned_incheck</i></a>
                        
                    
                  <span id="aftersend_openorder_buttons" style="display: none;">
                      
            <a href="#" class="btn" onclick="$('#orderid_openorder').text() ?(
instance_order.select('manageorder')
,scrollto('#ordermanage_top')
 ,loadOrderData($('#orderid_openorder').text()) 
            ):true">ניהול ההזמנה
                      <i class="material-icons white-text">assignment</i></a> 
                      
           <a href="#openorder"   class="btn" onclick="orderopen_reset()">הכנת הזמנה נוספת
                      <i class="material-icons white-text">arrow_circle_up</i></a>           
                      
                      
                      
                  </span>
                  
                  
                   
              </div>
            </div>
