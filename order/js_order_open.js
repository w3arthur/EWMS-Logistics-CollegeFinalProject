loaded.order.push('js_order_open.js');

// openOrder_setCustomer_button() function inside customer/js_customer_search.js


    //replace 5 to 00-0000-005
function orderidFix(id){
    var orderid= (id).toString().padStart(9, 0)
    return orderid.slice(0, 2)+'-'+orderid.slice(2, 6)+'-'+orderid.slice(6);    }



        //open order all data and forms rest and active and select set order id area
function orderopen_reset(){

       //hide customer search adding buttons
    if(matching('#customerid_search')){
    $('#searchcustomer_setfororder').show();
    }
    if(matching('#itemid_search')){itemSelectValuesSet();}
    
    $('#aftersend_openorder_buttons').hide();
        //empty items area
    $('#openorder_items').empty().html('<li class="collection-item" style="padding:1px;"></li>');
    orderOpenItemArray=[];
    $('#openorder_itemscount, #openorder_itemscount2').text(orderOpenItemArray.length);
    totalOpenOrderPrice();
    console.log('array OpenOrder (Reset):'+ orderOpenItemArray.toString()); 

        //reset forms
    $(':input','#addorderform').prop('disabled', false);
    $(':input','#openorder_globaldata').not('#delete_openorder').prop('disabled', false);
    $('#delete_openorder').prop('disabled',true);
    $('#addorderform, #openorder_globaldata').trigger('reset');
    $('#customerid_order').val('');
    $('#orderid_orderopen_feedback, #openorder_feedback').empty();
    $('#send_openorder').show();
    $('#openorder_addbutton').show();
    $('#orderopen_orderid_area,    #openorder_clientset').show();
    $('#clientid_openorder').text('חובה להגדיר');
    $('#orderid_openorder, #clientname_openorder').empty();
    $('#orderid_orderopen').val('').select().focus();
    scrollto('#openorder');
    
    $('#image_orderadd').attr('src','html/image/person.svg');
    $('#qrcode_customersearch').attr('src','https://chart.googleapis.com/chart?cht=qr&chl=&chs=400x400&choe=UTF-8&chld=L|2');
    //delete button reset

}



        //after order and items send look all the areas
        
function orderopen_aftersend_lock(){
    //hide customer search adding buttons
   // $('#global_orderaction').val('');
    $('#searchcustomer_replacefororder, #searchcustomer_setfororder').hide();
    if(matching('#itemid_search')){itemSelectValuesSet();}
    
    $('#aftersend_openorder_buttons').show();

    $(':input','#addorderform').prop('disabled', true);
    $('form.send')  
  .each(function(index){
       var id=( $('form.send').eq(index).attr('id'));
        $(':input', '#'+id).prop('disabled', true);
        
    });
    $('#orderid_orderopen_feedback, #openorder_feedback').html('<span style="font-size: 1.5em" class="blue-text">ההזמנה '+ $('#orderid_openorder').text() +' הוכנה</span>');
    $('#send_openorder').hide();
    $('#openorder_addbutton').hide();
    $('#orderopen_orderid_area,     #openorder_clientset').hide();
    
    $('.itemdecrease_item').hide(); // hide -1 option
    
    
    
    orderselect_openLoad();     //reload database orders
    orderselect_closeLoad();    //reload database orders
    
    scrollto('#openorder');
    //delete button reset

    
    
}


        //order open database cheking if the item set  onkeyup
function  databaseCheckOrderRegiseter(orderidstring, externalfunction=function(){}){
            if(replace('#orderid_orderopen')<120000000&&matching('#orderid_orderopen')||$('#orderid_orderopen').val()=='' ){

  databaseCheck('#addorderform'
    ,{register_orderid:orderidstring}
    ,'#orderid_orderopen_feedback, #openorder_feedback'
    ,'הההזמנה כבר רשומה, לא ניתן להוסיף אותה'
    ,'הההזמנה עוד לא רשומה, ניתן להוסיף אותה'
    ,externalfunction
  );

       }else{$('#orderid_orderopen_feedback, #openorder_feedback').html('<span class="red-text">הוקלד מספר הזמנה שגוי, הדפוס המותר הוא עד 11-999-9999 או להשאיר ריק</span>');}}






        //order items send
function orderOpenSend_each(){
    qrScanner_closeAll();
      var customerid_data=$('#clientid_openorder').text();
                //if(customerid_data==''){/*לערוך פידבק*/}
   
    if(customerid_data==''||customerid_data=='חובה להגדיר'){

    $('#orderid_orderopen_feedback, #openorder_feedback').html('<span class="red-text">לא הוגדר לקוח עבור ההזמנה</span>')    
        
       }
    
   else{
       
        //בדיקת לקוח קיים
        //בדיקת תקינות הזמנה שהוזנה ואז
        // להגדיר FEEDBACK
        
        
        if($('#orderid_orderopen').val()==''){
           
                createNewOrder(function(order){
                $('#orderid_openorder').text(order.orderid);
                    //with new ai order id
                sendeachitem_order(order);                   
        });
            
        }else{ // check if orderid_openorder <120000000
           databaseCheckOrderRegiseter($('#orderid_orderopen').val(), function(){
                createNewOrder(function(order){
                $('#orderid_openorder').text(order.orderid);
                sendeachitem_order(order);     
            });     
        });}
    }
    


}
    
    
function createNewOrder(externalfunction){
        databaseSendForm('#addorderform', '#', function(order){   
        console.log('database orderadd: '+order.orderid);
            externalfunction(order);
    }
    ,''
    ,'מספר ההזמנה כבר קיים');}  
    //לשנות פידבק



function sendeachitem_order(order){
    var orderid=order.orderid;
    
    var id='';
    $('form.send')  
  .each(function(index){
       var id=( $('form.send').eq(index).attr('id'));
        if(id=='openorder_globaldata'){//finalize the multi sending
           
            $('#orderid_orderitem_afternotes').val(orderid);
            
            
            databaseSendForm('#openorder_globaldata', '#orderid_orderopen_feedback, #openorder_feedback', 
                function(data){
                       orderopen_aftersend_lock();
                            //incload the text^ ההזמנה הוכנה
                    $('#orderid_orderopen_feedback').append('<br /><a href="#openorder" class="blue-text text-darken-4" onclick="orderopen_reset()"><i class="material-icons">arrow_circle_up</i> הכנת הזמנה נוספת </a>');       
                              
                               
                              },'','ההזמנה לא נוצרה');
        }else{
            
        var id_form='#'+id;
        var itemid='#'+id.replace('_form', '');
        $(itemid+'_orderid').val(orderid);
        
        var id_form_feedback='#'+id+'_feedback';
        var item_id=id.replace('item', '').replace('_form', '');
        //if
        var item_name=$(itemid+'_name').text();
        var item_quantity=$(itemid+'_quantity').val();
        if(replace(itemid+'_quantity')==0){item_quantity=0;}
        var item_purchasequantity=$(itemid+'_purchasequantity').val();
       if(replace(itemid+'_purchasequantity')==0){item_purchasequantity=0;}
      
        var text=` ${item_id}
                (למלאי ${item_quantity} ולרכש ${item_purchasequantity})
                <br /> ${item_name}`;
   
   $('#itemid_itemadd').val($('#itemidshown_itemadd').val());

     databaseSendForm(id_form, id_form_feedback, function(data){
         
       //   "added"=>false, "available"=>true
         
         if(data.indate===true){
             if(data.available===true){
                 if(data.added===true){
                    $(id_form_feedback).html('<span class="blue">הפריט נוסף להזמנה '+$('#orderid_openorder').text()+'<br />'+text+'</span>')
                    
                    }else{$(id_form_feedback).html('<span class="red-text">עקב תקלה הפריט לא נוסף להזמנה <br />'+text+'</span>');}
             }else{$(id_form_feedback).html('<span class="red-text">לא ניתן להוסיף את הפריט להזמנה מכיוון מכיוון שכמות הפריט במלאי הזמין קטנה מהכמות הנדרשת <br />'+text+'</span>');}
         }else{$(id_form_feedback).html('<span class="red-text">לא ניתן להוסיף את הפריט להזמנה מכיוון שהרכב ההזמנה עודכן ויש לסנכרן/ לבדוק את תכולתה העכשווי <br />'+text+'</span>');}
         
         
        }, '' , 'הפריט לא הוסף להזמנה כייוון שהוא עודכן/הוסר והוא לא זמין במלאי העכשיווי <br />'+text)
            
            ;}//end else
    });
       var id=''; 

}
