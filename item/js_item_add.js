loaded.item.push('js_item_add.js');

        //item add database cheking if the item set  onkeyup
function  databaseCheckItem(itemidstring){
  databaseCheck('#itemaddform'
    ,{register_itemid:itemidstring}
    ,'#itemidshown_itemadd_feedback'
    ,'המקט כבר מופיע במלאי, לא ניתן להוסיף אותו'
    ,'המקט עוד לא מופיע במלאי, ניתן להוסיף אותו'
  );}

        //item add database sending the item button onclick
function  sendItemAdd(){
    matchingReturnToFeadbackBox('#itemidshown_itemadd');
    matchingReturnToFeadbackBox('#itemname_itemadd');
    if(matching('#itemidshown_itemadd')
        &&matching('#itemname_itemadd')
    ){$('#itemid_itemadd').val($('#itemidshown_itemadd').val());
    databaseCheckItem($('#itemid_itemadd').val());
     databaseSendForm('#itemaddform', '#feedback_itemadd', function(){
        $('#global_action').val('itemimageupload');
        $('#itemid_data').val($('#itemidshown_itemadd').val());
        //disable areas //data block after register
        $(':input', '#itemaddform').prop('disabled', true);
        $('#after_itemadd').show();
        $('#before_itemadd').hide();
        $('#itemidshown_itemadd').one('keyup', function(){itemAdd_reset()});
        }, 'הפריט נוסף למסד הנתונים', 'לא הצליח להוסיף את הפריט למלאי')}
        else{$('#feedback_itemadd').html('<span class="red-text">אחד השדות שהוזן שגוי</spae>')}}

    //item add database delete image button onclick
function itemAdd_ImageDelete(){
    itemImageDelete($('#itemidshown_itemadd').val(),'#imagefeedback_itemadd', '#image_additem', '#imageuploadform_itemadd');}

//////////////////////////item reset functions
        //item add rest all the areas and send another item
function itemAdd_sendAnotherItem(){
            scrollto('#item_bar');
            $('#itemidshown_itemadd').val('').select();
            itemAdd_fullyReset();}
function itemAdd_fullyReset(){ //full reset
    $('#itemid_itemaddform').trigger('reset');
    itemAdd_reset();}
function itemAdd_reset(){ 
    //rest values exept the itemidshown_itemadd
    //on tipe item id, on qrcode scan and for rest button
        //feedbacks reset
    $('#global_action').val('');
    $('#itemid_data').val(''); 
    imageValueReset('#imagefeedback_itemadd', '#image_additem',  '#imageuploadform_itemadd');
    $('#itemidshown_itemadd_feedback').empty();
    $('#itemname_itemadd_feedback').empty();
    $('#feedback_itemadd').empty();
        //values reset
    $(':input', '#itemaddform').prop('disabled', false);
    $('#itemaddform').trigger("reset");
    $('#after_itemadd').hide();
    $('#before_itemadd').show();
    qrScannerItemAdd_close();
    }
    
        //image delete by  global_action data
function itemImageDelete(idvalue ,imagefeedbackareaid, uploadedimageareaid, imageformid){
        $(imagefeedbackareaid).empty();
     databaseSendForm({imageitemdelete: idvalue}, imagefeedbackareaid, function(){
         imageValueReset_imageOnly(imagefeedbackareaid, uploadedimageareaid,  imageformid);
     }, 'התמונה נמחקה', 'מחיקה נכשלה');
    $('#global_action').val('imageupload');}  
//itemImageDelete used in item_edit.js
