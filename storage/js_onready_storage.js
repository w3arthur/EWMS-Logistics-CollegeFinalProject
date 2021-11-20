function js_onready_storageActivate(){

loaded.onready.push('js_onready_storage.js');

//////////////////////////storage onready 


    //active modal area
  $('.storagearea_modal').modal({onOpenEnd: function() {
}, preventScrolling:true , endingTop: '5%'}); 


    //search item imask input
imaskStorageValues('');
//stgMask_update();


    stgMask();
    //storage english only keys
onlyEnglishKeys('#storage_storage');  

$('#storage_storage').keyup(function(){ //mobile 5th char only english fix
       if( ($(this).val()).length>=5 && !$(this).val().match(/^[0-9]{3}[-]{1}[A-Za-z]/)){
        storageMask.updateValue( $(this).val(($(this).val()).substr(0,3)) ); }});

            //numberic replace
    
        //clear feedback and global feedback onkeydown and matching
onkeyup_matching('#quantity_storage','#feedback_storage');
onkeyup_matching('#storage_storage','#feedback_storage');
$('#storage_storage').focus(function(){stgMask();}).keyup(//mobile keyboard set
function(){
    stgMask_destroy();
 stringlng=($('#storage_storage').val()).length;
if(stringlng>2&&stringlng<5){ $('#storage_storage').attr("inputmode","text"); 
}else{
 $('#storage_storage').attr("inputmode","numeric");
     }   
    var storageValue=($('#storage_storage').val()).toUpperCase();
    var storageFirstValue=$('#firtstorage_storage').val();
if(matching('#storage_storage')){
 if(storageFirstValue!=storageValue){
    databaseCheckStorage(
        $('#itemid_storage').val()
        , $('#storage_storage').val()
    )}else{$('#storage_storage_feedback').empty();}
}else if(storageValue==''){
   $('#storage_storage_feedback').html(
       '   פרטי האיתור נמחקו <br />'
       +'<div class="blue-text" onclick="restureFirstStorageValue()">שחזר/י לאיתור שהוגדר במקור <br />'+(storageFirstValue!=''?'l'+storageFirstValue+'l':'-ללא איתור-')+'</div>'
       +'');
}else{
   $('#storage_storage_feedback').html(
       '   פרטי האיתור שונו <br />'
       +'   פרטי האיתור שגויים <br />'
       +'<div class="blue-text" onclick="restureFirstStorageValue()">שחזר/י לאיתור שהוגדר במקור <br />'+(storageFirstValue!=''?'l'+storageFirstValue+'l':'-ללא איתור-')+'</div>'
       +'');}
stgMask();});

         //item storage sending image form on image change or set
        //same as item functions, from same php
$('#imageupload_storage').change(function(){
  onchange_sendImageFile('itemimageupload'
                         , $('#itemid_storage').val()
                         , '#imagefeedback_storage'
                         , '#image_storage'
                         , 'item/upload/');
});   
    
    
 }  //end function js_onready_storageActivate()
    