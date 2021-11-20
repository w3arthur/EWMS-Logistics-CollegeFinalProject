loaded.customer.push('js_customer_add.js');

        //customer add database cheking if the item set  onkeyup
function  databaseCheckCustomer(customeridstring){
  databaseCheck('#customeraddform'
    ,{register_customerid:customeridstring}
    ,'#customeridshown_customeradd_feedback'
    ,'הלקוח כבר מופיע במאגר, לא ניתן להוסיף אותו'
    ,'הלקוח עוד לא מופיע במאגר, ניתן להוסיף אותו'
  );}

        //item add database sending the item button onclick
function  sendCustomerAdd(){
    matchingReturnToFeadbackBox('#customeridshown_customeradd');
    matchingReturnToFeadbackBox('#customername_customeradd');

    if(matching('#customeridshown_customeradd')
        &&matching('#customername_customeradd')
    ){$('#customerid_customeradd').val($('#customeridshown_customeradd').val());
    databaseCheckCustomer($('#customerid_customeradd').val());
    databaseSendForm('#customeraddform', '#feedback_customeradd', function(){
        $('#global_action').val('customerimageupload');
        $('#customerid_data').val($('#customeridshown_customeradd').val());
        //disable areas //data block after register
        $(':input', '#customeraddform').prop('disabled', true);
        $('#after_customeradd').show();
        $('#after_customeradd2').show();
        $('#before_customeradd').hide();
        
        $('#customeridshown_customeradd').one('keyup', function(){customerAdd_reset()});
        }, 'הלקוח נוסף למערכת', 'לא הצליח להוסיף את הלקוח למערכת')}
        else{$('#feedback_itemadd').html('<span class="red-text">אחד השדות שהוזן שגוי</spae>')}}

        //item add database delete image button onclick
function customerAdd_ImageDelete(){
    customerImageDelete($('#customeridshown_customeradd').val(), '#imagefeedback_customeradd', '#image_addcustomer', '#imageuploadform_customeradd');}



//////////////////////////item reset functions
        //item add rest all the areas and send another item
function customerAdd_sendAnotherCustomer(){
            $('#customeridshown_customeradd').val('').select();
            customerAdd_fullyReset();}
function customerAdd_fullyReset(){ //full reset
    $('#customerid_customeraddform').trigger('reset');
    customerAdd_reset();}
function customerAdd_reset(){ 
    //rest values exept the itemidshown_itemadd
    //on tipe item id, on qrcode scan and for rest button
        //feedbacks reset
    $('#global_action').val('');
    $('#customerid_data').val(''); 
    imageValueReset('#imagefeedback_customeradd', '#image_addcustomer',  '#imageuploadform_customeradd');
    $('#customeridshown_customeradd_feedback').empty();
    $('#customername_customeradd_feedback').empty();
    
                    //להוסיף עוד פידבקים שימחקו
    
    $('#feedback_customeradd').empty();
        //values reset
    $(':input', '#customeraddform').prop('disabled', false);
    $('#customeraddform').trigger("reset");
    $('#after_customeradd').hide();
    $('#after_customeradd2').hide();
    $('#before_customeradd').show();
    qrScannerItemAdd_close();
    }
   

        //image delete by global_action data
function customerImageDelete(idvalue ,imagefeedbackareaid, uploadedimageareaid, imageformid){
        $(imagefeedbackareaid).empty();
     databaseSendForm(
         {customerimagedelete:idvalue}
        , imagefeedbackareaid, function(){
         imageValueReset_imageOnly(imagefeedbackareaid, uploadedimageareaid,  imageformid);
     }, 'התמונה נמחקה', 'מחיקה נכשלה');
    $('#global_action').val('customerimageupload');}  
//customerImageDelete used in customer_edit.js

