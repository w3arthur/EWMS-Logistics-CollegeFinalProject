
<form id="manageorder_select_form">


    
    
    <label for="orderselect_open" class="green-text">הזמנות פתוחות</label>
    <div class="input-field" style="margin:0px">
       <select id="orderselect_open" onchange="loadOrderData($(this).val())" class ="browser-default flow-text" dir="rtl">   

        </select>
        
    </div>
  
    
    
        
   
    <label for="orderselect_closed" class="red-text">הזמנות סגורות</label>
    <div class="input-field" style="margin:0px">
       <select id="orderselect_closed" onchange="loadOrderData($(this).val())" class ="browser-default flow-text" dir="rtl">   

        </select>
        
    </div>
    

    
    </form>





















<h5 id="ordermanage_top">ניהול הזמנה</h5>

          
            <div class="itemcard card">
              <div class="card-image">
<div class="row">
    
    
        <div class="col s4 right-align rtl">
            <img id="image_ordermanage" src="html/image/person.svg"  class="z-depth-2" alt="" 
               style="z-index:0;border-radius:1%;        
                    width:100%;height:200px; 
                    min-width: 150px;max-width:400px;"  
                 
                 onclick="$('.'+'image_ordermanage'+'_modalimage').modal('open')"
                 
                 />
            
              <span id="customerordermanage_qrcodeimage2" style="border-radius:10%; width:50px; left: 24px;bottom:40px"  class=" btn-floating left" onclick="$('.'+'image_customersearch'+'_modalqr').modal('open')">
                  
                  
                  <img id="image_ordermanage_qrcode" src="https://chart.googleapis.com/chart?cht=qr&chl=&chs=400x400&choe=UTF-8&chld=L|2" alt=""  class=" z-depth-2" />

                  </span>
            
        </div>
                 
        <div class="col s8"> <div style="width:99%;padding-right:20px"  >
                
  
       <form id="manageorderform">
            <div style="padding-right:25px">
               <!-- <input type="hidden" name="order_manage" /> //-->
            
        <div id="manageorder_beforesend">

            

             <!-- <input type="text" id="customerid_ordermanage" name="customerid_order" />//-->
            
        </div>
                
                

            </div>
   
        </form>
            
            
     <section id="manageorder_aftersend">
      
         
         
         
         
            
            
           <h5 id="customersearch_manageorder_id" class="right-align" style="margin:0px;padding-right:0px" dir="rtl"> 
        <span class="nobr" id="manageorder_additem_top">מספר הזמנה:</span> 
        <span class="nobr" id="orderid_manageorder">  </span>          
        <br />
        <span class="nobr">מספר לקוח:</span>   
        <span class="nobr"><a href="#" onclick="$('#clientid_manageorder').text()!=''?(
            customerSelectValuesSet($('#clientid_manageorder').text() )
            ,scrollto('#customersearch_top', -50)
            ):true;">
            <i class="material-icons circle blue darken-3 white-text">person</i>
            </a>
            <strong id="clientid_manageorder"></strong></span>   
        </h5>
    <div class="rtl">

        <span class="nobr">שם לקוח:</span> 
        <span id="clientname_manageorder"></span>
        <br />
        <span class="nobr">יוצר/ת ההזמנה:</span>
        <span id="username_manageorder"></span>
    </div>  
            
            
            </section>         

                <br />
      
        </div>

    </div>

 
                  </div>
                  
              </div>
                
                
                
                
                
                
                
           
              <div  id="manageorder_aftersend2" class="card-content" style="padding:0px" >
                  
                <h4 id="manageorder_title" class="card-title rtl" style="margin:0px;padding-right:20px">
                  
                  </h4>
                  <div class="row"> 
                      <div class="col s12 ">
                          
                           <div id="manageorder_button_feedback" class="blue-grey lighten-3"></div>
                  <div class="right"  id="manageorder_addbutton">
                     <!--
                        <a class="btn " disabled="disabled" href="#" onclick="itemSelectValuesSet_backToTop('empty')">
                      <span>
                      הוספת פריט נוסף
                      </span>
                     <span class="btn-floating btn-large  waves-effect waves-light valign-wrapper"><i class="material-icons" >exposure_plus_1</i></span> 
                      </a>
                      //-->
                  </div>

                  </div>
                  </div> 
                  
                  <div id="manageorder_aftersend3" >
                      <br />
                      
                
                      <div class="rtl">
                          <span> יש </span><strong id="manageorder_itemscount">0</strong><span> שורות ברשימה (אישור ההזמנה בתחתית הדף) </span><br/>
                      </div>
                      
                      
                      <div id="manageorder_after_feedback" class="blue-grey lighten-3"></div>
                      
                      
                      <div id="manageorder_after_feedback2" class="blue-grey lighten-3"></div>

                           
        <ul class="collection ltr" id="manageorder_items" style="margin:5px">      
            <li class="collection-item" style="padding:1px;"></li>
        </ul> 
  
                  <br />

                      
                 <br />
                  <div id="manageorder_aftersend4" class="white" style="padding:0px 50px 0px 50px ">
                      <form id="manageorder_globaldata" class="sendmanage"  action="ajax.php" method="POST"><section>
                      <div class="rtl">
                          
                    <p id="manageorder_totalcost" class="green-text">
                        
                    </p>
                    <p id="manageorder_stillopen_calculator">
                        <strong>סה"כ מחיר העסקה מלאי+רכש: </strong><strong id="manageorder_totalpurchaseprice_area" style="text-decoration: underline;">0</strong> <spam>עבור</spam> <strong id="manageorder_itemscount2">0</strong> <spam>שורות</spam><br/>
                    </p>     
                       
                          
                      </div>     
                         <br /> 
                          <?php input_textarea('description_ordermanage', 'הערות להזמנה (לא חובה)', 'message','') ?>
    
                        <br />  
                        <input type="hidden" id="orderid_ordermanageitem_afternotes" name="orderid_orderitem" value=""/> 
  

                   
                          </section></form>
                   </div>
                      
                </div>
                  <br />
              </div>
                
    
                
                
                 <div  id="manageorder_feedback"></div>
              <div class="card-action">
         
               
           

   
           
                        <a href="#" id="close_manageorder"  class="btn" style="display:none" onclick="orderManage_close()">סגירת ההזמנה
                            <i class="material-icons white-text">done_outline</i></a>
                        
                    

                  
                  
                   
              </div>
            </div>



<br />
<br />

