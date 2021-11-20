loaded.storage.push('js_storage_edit.js');

    //search item imask input, itemid 
var stg_itemPrice='';
var stg_itemQuantity='';
var stg_itemQuantityAdd='';
var storageMask='';
function stgMask_update(){ //keep from error message about value update
 if((typeof stg_itemPrice)=='object'){
    stg_itemPrice.updateValue();}
 if((typeof stg_itemQuantity)=='object'){
    stg_itemQuantity.updateValue();}
 if((typeof stg_itemQuantityAdd)=='object'){
    stg_itemQuantityAdd.updateValue();}
  if((typeof storageMask)=='object'){
    storageMask.updateValue();}
}


     //if storage set empty, show message that let restore it first values
function  restureFirstStorageValue(){
 $('#storage_storage').val($('#firtstorage_storage').val());
    $('#storage_storage_feedback').empty();}
     
       //storage edit database cheking if the item set  onkeyup
function  databaseCheckStorage(itemidstring, itemstoragestring){
    var storageFirstValue=$('#firtstorage_storage').val();
if($('#firtstorage_storage').val()==$('#storage_storage').val()){$('#storage_storage_feedback').empty();}
   else{
  databaseCheck('#itemaddform'
            ,{storage_itemid:itemidstring
              ,storage_itemstorage: itemstoragestring}
    ,'#storage_storage_feedback'
    ,'האיתור כבר מוגדר במלאי, לא ניתן להגדיר אותו'
        +'<div class="blue-text" onclick="restureFirstStorageValue()">שחזור לאיתור שהוגדר במקור <br />'+(storageFirstValue!=''?'l'+storageFirstValue+'l':'-ללא איתור-')+'</div>'
    ,'האיתור פנוי במלאי, ניתן להגדיר אותו'
        +'<div class="blue-text  text-darken-4" onclick="restureFirstStorageValue()">שחזור לאיתור שהוגדר במקור <br />'+(storageFirstValue!=''?'l'+storageFirstValue+'l':'-ללא איתור-')+'</div>'
  );}}
     


function stgMask(){
    if((typeof storageMask)=='object'){storageMask.destroy();}
    storageMask=imask('#storage_storage',  '000-a-000' );}
function stgMask_destroy(){if((typeof storageMask)=='object'){storageMask.destroy();}}
    
    


function imaskStorageValues(emphasize=''){  
    if((typeof stg_itemPrice)=='object'){stg_itemPrice.destroy();}
    stg_itemPrice=imaskNumber('#price_storage', '₪ num');
    if((typeof stg_itemQuantity)=='object'){stg_itemQuantity.destroy();}
    stg_itemQuantity=imaskNumber('#quantity_storage', emphasize+'num');
     if((typeof stg_itemQuantityAdd)=='object'){stg_itemQuantityAdd.destroy();}
    stg_itemQuantityAdd=imaskNumber('#quantityadd_storage', emphasize+'num');
         }

             //storage quantity update
function storageQuantityUpdate(){
    var itemid_data=$('#itemid_storage').val();
    if(itemid_data!=''){ 
        databaseSendForm({
                quantityupdate: itemid_data
                , quantity_storage: $('#quantity_storage').val()
                ,updated_at_storage: $('#updated_at_storage').val()}
        , '#quantity_storage_feedback', function(data){
            storageValuesSet(itemid_data);
        }
            ,'הכמות עודכנה' 
            ,'העדכון לא הצליח יתכן ופרטי הפריט עודכנו במקביל '
                +'<strong onclick="storageValuesSet($(\'#itemid_storage\').val())">רענון פריט</strong>');
                }}
  

            //storage quantity add
function storageQuantityAdd(){
    var itemid_data=$('#itemid_storage').val();
    if(itemid_data!=''&&$('#quantityadd_storage').val()){ 
        databaseSendForm({
            quantityadd: itemid_data
            , quantityadd_storage: $('#quantityadd_storage').val()
            ,updated_at_storage: $('#updated_at_storage').val()}
        , '#quantityadd_storage_feedback', function(data){
            storageValuesSet(itemid_data);
        }
            ,'הכמות עודכנה' 
            ,'העדכון לא הצליח יתכן ופרטי הפריט עודכנו במקביל '
                +'<strong onclick="storageValuesSet($(\'#itemid_storage\').val())">רענון פריט</strong>');
                }}

     

        //storage storage place update
function storageStorageUpdate(){
    var itemid_data=$('#itemid_storage').val();
    if($('#firtstorage_storage').val().toUpperCase()==$('#storage_storage').val().toUpperCase() ){
        $('#storage_storage_feedback').text('^זהו האיתור העכשווי')
    }
    else if(!(matching('#storage_storage')||$('#storage_storage').val()=='')){$('#feedback_storage').html('<strong class="red-text rtl"> הוזן איתור שגוי למערכת, חובה להזין איתור בדפוס like: <span class="nobr rtl">012-A-012</span><br />או להשאיר ריק</strong>')}
    else if(itemid_data!=''&&(matching('#storage_storage')||$('#storage_storage').val()=='')){ 
          databaseSendForm({
            storageupdate: itemid_data
            , storage_storage: $('#storage_storage').val()
            , updated_at_storage: $('#updated_at_storage').val()}
        , '#storage_storage_feedback', function(data){
             storageValuesSet(itemid_data);
          },'האיתור עודכן'
            ,'העדכון לא הצליח יתכן ופרטי הפריט עודכנו במקביל '
                +'<strong onclick="storageValuesSet($(\'#itemid_storage\').val())">רענון פריט</strong>'
            );}}
   

        //storage storage place update
function sendStorage(){
    var itemid_data=$('#itemid_storage').val();
    if(!(matching('#storage_storage')||$('#storage_storage').val()=='')){$('#feedback_storage').html('<strong class="red-text rtl"> הוזן איתור שגוי למערכת, חובה להזין איתור בדפוס like: <span class="nobr rtl">012-A-012</span><br />או להשאיר ריק</strong> ')}
    else if(itemid_data!=''){ 
          databaseSendForm('#storageeditform', '#feedback_storage', function(data){
             storageValuesSet(itemid_data);
          },'פרטי האחסון עודכנו'
            ,'העדכון לא הצליח יתכן ופרטי הפריט עודכנו במקביל '
                +'<strong onclick="storageValuesSet($(\'#itemid_storage\').val())">רענן/י פריט</strong>'
            );}}
   


   // storage_imageValueReset(); 
    function storage_valueReset(){
    $('#storageeditform').trigger('reset');
    $('#itemidfield_search').text('חפש/י פריט');
     $('#imagefeedback_storage, #storage_storage_feedback ,#quantity_storage_feedback, #quantityadd_storage_feedback, #price_storage_feedback, #feedback_storage, #price_storage_now, #quantity_storage_now, #price_storage_now').empty();
    imageValueReset( '#imagefeedback_storage' ,'#image_storage' ,'#imageuploadform_storage');
    }
     
        //item select set values from database onkeyup
function storageValuesSet(value){
    storage_valueReset();
    if(value!=''){
       databaseSendForm({storageedit:value}, '#', function(data){    
            $('#itemid_storage').val(data.itemid);
           $('#itemidfield_search').text(data.itemid);
            //$('#itemidfield_search').text(data.itemid);
            //$('#itemnamefield_search').text(data.itemname);
            $('#firtstorage_storage').val(data.storage);
            $('#storage_storage').val(data.storage);
            $('#quantity_storage').val(data.quantity);
            $('#price_storage').val('₪'+data.price);
            $('#emphasize_storage').val(data.emphasize);  
            $('#updated_at_storage').val(data.storage_updated_at);

            imaskStorageValues(data.pcsname+' ');
                
           $('#quantity_storage_now').text($('#quantity_storage').val())
           $('#price_storage_now').text($('#price_storage').val())
             imageSetValue('#image_storage', 'item/upload/', data.itemid, data.image); 
            },'','');
                }}

function storage_ImageDelete(){
    itemImageDelete($('#itemid_storage').val(), '#imagefeedback_storage', '#image_storage', '#imageuploadform_storage');
}

