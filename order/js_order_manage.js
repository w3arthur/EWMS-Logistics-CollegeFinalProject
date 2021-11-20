loaded.order.push('js_order_manage.js');


function loadOrderData(orderid){
orderManageItemArray=[]; // empti the order manage item array
  databaseSendForm({ordermanage_orderload:orderid}
        ,'#_feedback'
        ,function(data){
                console.log('order data:'+data);
      //set orderid values:
$('#orderid_ordermanageitem_afternotes').val(data.orderid);  
$('#orderid_manageorder').text(data.orderid);
$('#clientid_manageorder').text(data.customerid);
$('#clientname_manageorder').text(data.fullname);
$('#username_manageorder').text(data.userfullname);   //יוצר ההזמנה  
$('#description_ordermanage').val(data.ordernote);
 $('#manageorder_after_feedback, #manageorder_after_feedback2').empty();    
    var orderid2=data.orderid;
    var orderdate=data.order_updated_at;
    $('#manageorder_aftersend3 ul ').empty().html('<li class="collection-item" style="padding:1px;"></li>');
    imageSetValue_search('#image_ordermanage', 'customer/upload/', data.customerid, data.image);
      
      
      
    if(data.closed==0){
       $('#manageorder_title').html('<strong class="green-text">הזמנה פתוחה</strong>')
       $('#close_manageorder').show();
        $('#manageorder_totalcost').empty();
        
       }else{$('#manageorder_title').html('<strong class="red-text">הזמנה סגורה</strong>')
$('#manageorder_totalcost').html('<strong>סה"כ שולם '+data.orderpaidprice+'&#8362;</strong>');
             $('#close_manageorder').hide();
            }

for(var i=0; i<data.length;i++) {//data.length
    var id=data[i].itemid;
    var ai=data[i].ai;
    var itemtype= 'itemmanage';
    var id_='#'+itemtype+id+'_';
    var orderquantity_id=id_+'quantity';
    var purchasequantity_id=id_+'purchasequantity';
    var pricing=0; 

    addItem_orderManageItem_reRun('itemmanage' ,id, orderid, orderdate, ai)
    $('#manageorder_aftersend3 ul ').prepend(
    //itemArea('itemmanage', id, orderid, orderdate, ai)
    );   
    data[i].quantity= number(data[i].quantity) +number(data[i].orderquantity); // total amount quantity with the actual quantity
    data[i].price=data[i].orderprice; //set first ordered price
    $(orderquantity_id).val(data[i].orderquantity);
    $(purchasequantity_id).val(data[i].supplyquantity);
   if(idInside_orderManageArray(id)){
    addItem_orderItem_eachFunction(id, id_, orderquantity_id, purchasequantity_id, data[i], '#manageorder_after_feedback, #manageorder_after_feedback2', function(id_, data, orderquantity_id, purchasequantity_id){//internal data [i] not required
    pricingValueLine_manageOrder(id_, data.pcsname, data.price, orderquantity_id, purchasequantity_id); 
    totalManageOrderPrice();    
    });
                 }
    maskManageOrder_set(id, data[i], orderquantity_id, purchasequantity_id); 
    
    
    $(':input', '#itemmanage'+id+'_form').prop('disabled', true);
            //disable manage order areas form
   }//end for
      
      
      
     $('.itemdecrease_itemmanage').hide(); // hide -1 option
      
      $(':input', '#manageorder_globaldata').prop('disabled', true);//disable manage order areas form
      
                    } 
    ,'הצליח', 'לא הצליח'); //function end     
}


function orderselect_closeLoad(){
 $('#orderselect_closed').empty();       
  databaseSendForm({ordermanage_closed_getdata:'getallorders'}
        ,'#manageorder_select_form_feedback'
        ,function(data){
      
                
             $('#orderselect_closed').append(`         
       <option val="" disabled="disabled" selected="selected">קיימות ${data.length} הזמנות סגורות</option>
        `);    
      
            for(var i=0;i< data.length;i++) {
      var order_date=dateFix(data[i].order_closed_at);
      var orderid= orderidFix(data[i].orderid);

    
         $('#orderselect_closed').append(`<option value = "${data[i].orderid}">${order_date} ${data[i].fullname} (${data[i].orderpaidprice}\u20AA ל ${data[i].totallines } שורות) ${orderid} לקוח [${data[i].customerid}]</option>`);  
       }
            } ,'' ,'' );     }   //function end
  

function orderselect_openLoad(){
 $('#orderselect_open').empty();
 $('#neworders_count').text('0');
  databaseSendForm({ordermanage_open_getdata:'getallorders'}
        ,'#manageorder_select_form_feedback'
        ,function(data){
    
        
        $('#orderselect_open').append(`         
       <option val="" disabled="disabled" selected="selected">קיימות ${data.length} הזמנות פתוחות</option>
        `);    
      
        $('#neworders_count').text(data.length);
      
            for(var i=0;i< data.length;i++) {
      var order_date=dateFix(data[i].order_updated_at);
      var orderid= orderidFix(data[i].orderid);

         $('#orderselect_open').append(`<option value = "${data[i].orderid}">${order_date} ${data[i].fullname} (${data[i].orderprice}\u20AA ל ${data[i].itemcount } שורות) ${orderid} לקוח [${data[i].customerid}]</option>`);  
       }
            } ,'' ,'' );     }   //function end
  





function orderManage_close(){
  
    databaseSendForm({manageorder_close: $('#orderid_manageorder').text()}
    ,'#manageorder_feedback'
    , function(){

orderselect_openLoad();
orderselect_closeLoad();   
loadOrderData($('#orderid_manageorder').text()); 
scrollto('#manageorder');        
    }
    , '', 'לא הצליח לעדכן את ההזמנה'
      );   }




var orderManageItemArray=[];
console.log('array ManageOrder (Set):'+ orderManageItemArray.toString()); 

function idInside_orderManageArray(id){
    return orderManageItemArray.indexOf(id)>=0;}
/*
function delete_orderManageItemArray(id){     //delete id value from array
    orderManageItemArray = orderManageItemArray.filter(v => v !== id); 
    console.log('array ManageOrder (after delete '+id+'):'+ orderManageItemArray.toString());   }
*/
function addItem_orderManageItem_array(id){
    if(idInside_orderManageArray(id)){
        return true;
    } else{
        orderManageItemArray.push(id);
        console.log('array ManageOrder (Push '+id+'):'+ orderManageItemArray.toString()); 
        $('#manageorder_itemscount, #manageorder_itemscount2').text(orderManageItemArray.length);
            }}




function addItem_orderManageItem_reRun(itemtype ,id, orderid, orderdate, ai){
   // var orderid=$('#orderid_data').val();
   // var orderdate=$('#orderdate_data').val(); //? ^ ???
    if( addItem_orderManageItem_array(id) ){
         //if item iside array
        $('#openorder_after_feedback2').html(' <span class="red">הפריט '+id+' כבר נמצא בהזמנה</span><a href="#" onclick="$(\'#manageorder_after_feedback2\').empty()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></a>');  
    } else{
    $('#manageorder_aftersend3 ul ').prepend(
    itemArea(itemtype, id, orderid, orderdate, ai)
    );
            }  } //END addItem_orderItem(...






    //quantity pricing
function totalManageOrderPrice(){
                    var totalprice=0;
    orderManageItemArray.forEach(function(item, index) {totalprice+=replace_text('#itemmanage'+item+'_pricingforquantity');})   
        $('#manageorder_totalpurchaseprice_area').text('₪'+totalprice);
        }

function pricingValueLine_manageOrder(id_, pcsname, price, orderquantity_id, purchasequantity_id){
    $(id_+'pricingforquantityfor').html( 'עבור <strong>'+
(replace(orderquantity_id)+replace(purchasequantity_id))+ pcsname + '</strong> '
        );
        $(id_+'pricingforquantity').text(' ₪'+    ((replace(orderquantity_id)+replace(purchasequantity_id))*price));} 



   //quantity arrays
var maskManageOrder_orderquantity=[];  //mask global array
var maskManageOrder_purchasequantity=[];  //mask global array

function maskManageOrder_set(id, data, orderquantity_id, purchasequantity_id){
    //destroy and resture mask
    if((typeof maskManageOrder_orderquantity[id])=='object')
    {maskManageOrder_orderquantity[id].destroy();}
    if((typeof maskManageOrder_purchasequantity[id])=='object'){maskManageOrder_purchasequantity[id].destroy();}
    
    var pcsEmpesize=data.pcsname+' '+'num';
    var receivedQuantity=data.quantity;
    if(typeof data!='object'){
       pcsEmpesize= maskManageOrder_purchasequantity[id].mask
        receivedQuantity=$('#itemmanage'+id+'_awailablequantity').text();
    }
    
    maskManageOrder_orderquantity[id]=imaskNumberLimit(orderquantity_id, pcsEmpesize, receivedQuantity);
    
    maskManageOrder_purchasequantity[id]=imaskNumber(purchasequantity_id, pcsEmpesize);
   
        }




function removeitem_orderItem_itemmanage(id){
    var itemtype='itemmanage';
    var  orderquantity_id='#'+itemtype+id+'_quantity';
    var purchasequantity_id='#'+itemtype+id+'_purchasequantity';
    
    $(orderquantity_id).val(0).trigger('keyup');
    $(purchasequantity_id).val(0).trigger('keyup');
    maskManageOrder_set(id, '', orderquantity_id, purchasequantity_id);
    
    $('#manageorder_after_feedback, #manageorder_after_feedback2').empty(); //clear last feedback
    
    var itemid='#itemmanage'+id;
    $('#manageorder_after_feedback').empty();

    //$(itemid+'_form_feedback').remove();
   // $(itemid+'_li').remove();
    $('#manageorder_itemscount, #manageorder_itemscount2').text(orderManageItemArray.length); 
    
    totalManageOrderPrice();
 
}
