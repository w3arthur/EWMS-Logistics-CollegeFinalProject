loaded.order.push('js_order_itamadd.js');

    //array
var orderOpenItemArray=[];
console.log('array OpenOrder (Set):'+ orderOpenItemArray.toString()); 

function idInside_orderOpenArray(id){
    return orderOpenItemArray.indexOf(id)>=0;}

function delete_orderOpenItemArray(id){     //delete id value from array
    orderOpenItemArray = orderOpenItemArray.filter(v => v !== id); 
    console.log('array OpenOrder (after delete '+id+'):'+ orderOpenItemArray.toString());   }












function addItem_orderOpenItem_array(id){
    if(idInside_orderOpenArray(id)){
        return true;
    } else{
        orderOpenItemArray.push(id);
        console.log('array OpenOrder (Push '+id+'):'+ orderOpenItemArray.toString()); 
        $('#openorder_itemscount, #openorder_itemscount2').text(orderOpenItemArray.length);
            }}









    //quantity arrays
var maskOpenOrder_orderquantity=[];  //mask global array
var maskOpenOrder_purchasequantity=[];  //mask global array

function maskOpenOrder_set(id, data, orderquantity_id, purchasequantity_id){
    //destroy and resture mask
    if((typeof maskOpenOrder_orderquantity[id])=='object')
    {maskOpenOrder_orderquantity[id].destroy();}
    if((typeof maskOpenOrder_purchasequantity[id])=='object'){maskOpenOrder_purchasequantity[id].destroy();}
    maskOpenOrder_orderquantity[id]=imaskNumberLimit(orderquantity_id, data.pcsname+' '+'num', data.quantity);
    maskOpenOrder_purchasequantity[id]=imaskNumber(purchasequantity_id, data.pcsname+' '+'num');
   
        }






    //quantity pricing
function totalOpenOrderPrice(){
                    var totalprice=0;
    orderOpenItemArray.forEach(function(item, index) {totalprice+=replace_text('#item'+item+'_pricingforquantity');})   
        $('#openorder_totalpurchaseprice_area').text('₪'+totalprice);
        }

function pricingValueLine_openOrder(id_, pcsname, price, orderquantity_id, purchasequantity_id){
    $(id_+'pricingforquantityfor').html( 'עבור <strong>'+
(replace(orderquantity_id)+replace(purchasequantity_id))+ pcsname + '</strong> '
        );
        $(id_+'pricingforquantity').text(' ₪'+    ((replace(orderquantity_id)+replace(purchasequantity_id))*price));} 



function addItem_orderItem(id){

    $('#openorder_after_feedback, #openorder_after_feedback2').empty(); //clear last feedback
    addItem_orderOpenItem_reRun(id);
    addItem_orderItem_functions(id) ;
    
    
}







function addItem_orderOpenItem_reRun(id, orderidSet=''){
    
    var orderid=$('#orderid_data').val();
    var orderdate=$('#orderdate_data').val(); //?
    
    if( addItem_orderOpenItem_array(id) ){
          $('#openorder_after_feedback2').html(' <span class="red">הפריט '+id+' כבר נמצא בהזמנה</span><span onclick="$(\'#openorder_after_feedback2\').empty()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></span>');  
    } else{
        
    $('#openorder_aftersend3 ul ').prepend(
    itemArea('item', id, orderid, orderdate)
    );
        
            }  } //END addItem_orderItem(...
                //the areas filled with next function:

function addItem_orderItem_functions(id){
    var itemtype= 'item';
    var id_='#'+itemtype+id+'_';
    
    var orderquantity_id=id_+'quantity';
    var purchasequantity_id=id_+'purchasequantity';
    var pricing=0;     

    if(idInside_orderOpenArray(id)){//array is inside the order list
        

databaseSendForm({order_openorder_additem: id}, '#openorder_after_feedback'
    , function(data){

addItem_orderItem_eachFunction(id, id_, orderquantity_id, purchasequantity_id, data, '#openorder_after_feedback, #openorder_after_feedback2', function(id_, data, orderquantity_id, purchasequantity_id){
     pricingValueLine_openOrder(id_, data.pcsname, data.price, orderquantity_id, purchasequantity_id);          
        totalOpenOrderPrice(); 
            } );
maskOpenOrder_set(id, data, orderquantity_id, purchasequantity_id); 
    
    }, '', ' לא הצליח להוסיף את הפריט '+id+' להזמנה יתכן והוא לא מאושר לשימוש או לא קיים <a href="#" onclick="$(\'#openorder_after_feedback\').empty()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></a>'
     , function(){removeitem_orderItem_item(id);});
//end else
    }}///end
        //id examples:
                //id = item0-123-12345
            // id_li
    //_form"
        // id_name
        // id_purchasequantity
        // id_quantity
        // id_awailablequantity  //כמות במלאי
        // id_pricingforquantity // סה"כ עלות
        // id_pricingforquantityfor // עבור סך פריטים עם המילה עבור
        // id_feedback    



function  restureitem_orderItem_item(id, removeddata){
    var itemid='#item'+id;
    if(idInside_orderOpenArray(id)){$('#openorder_after_feedback2').html(' <span class="red darken-3">הפריט '+id+' כבר נמצא בהזמנה לכן אי אפשר לשחזר אותו</span><a href="#" onclick="$(\'#openorder_after_feedback2\').empty()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></a>');
    }else{ 
    addItem_orderOpenItem_reRun(id);
    addItem_orderItem_functions(id) ;$(itemid+'_quantity').val(replace_text(removeddata+'_orderquantity'));
 $(itemid+'_purchasequantity').val(replace_text(removeddata+'_purchasequantity'));
    }
    $(removeddata).remove();
    totalOpenOrderPrice();
}



function removeitem_orderItem_item(id){
    $('#openorder_after_feedback, #openorder_after_feedback2').empty(); //clear last feedback
    var itemid='#item'+id;
    delete_orderOpenItemArray(id);
    $('#openorder_after_feedback').empty();
    var randomvalue=time();
    
    $('#openorder_aftersend3 ul').append(removedItemMessage('item', id, itemid) );
    
    $(itemid+'_form_feedback').remove();
    $(itemid+'_li').remove();
    $('#openorder_itemscount, #openorder_itemscount2').text(orderOpenItemArray.length); 
    totalOpenOrderPrice();
 
}
