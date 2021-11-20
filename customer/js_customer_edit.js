loaded.customer.push('js_customer_edit.js');

    //item edit database delete image  button onclick
function customerEdit_ImageDelete(){
    customerImageDelete($('#customerid_customeredit').val(),'#imagefeedback_customeredit', '#image_editcustomer', '#imageuploadform_customeredit');}
//customerImageDelete set in customer_add.js


    //item edit database update edited item information button onclick
function sendCustomerEdit(){
    matchingReturnToFeadbackBox('#customername_customeredit');
    if(matching('#customername_customeredit')
    ){databaseSendForm('#customereditform', '#feedback_customeredit', function(){
    customerEditValuesSet($('#customeridfield_customeredit').text());
    }, 'נתוני הלקוח נערכו במערכת', 'לא הצליח לערוך את נתוני הלקוח')}
    else{$('#feedback_customeredit').html('<span class="red-text">אחד השדות שהוזן שגוי</spae>')}}

    //item edit database set values also after editing
function customerEditValuesSet(value){
    if(value!=''){
        instance_customer.select('editcustomer');
        customerEdit_valueReset();
        
        databaseSendForm({editcustomer:value}, '#', function(data){
              $('#customerid_customeredit').val(data.customerid);
            $('#customeridfield_customeredit').text(data.customerid);
            $('#customername_customeredit').val(data.fullname).select();
                
           $('#date_customeredit').val(data.dateformat).select();   
             
                $('#telephone_customeredit').val(data.telephone).select();   
                 $('#address_customeredit').val(data.address).select();    
                $('#note_customeredit').val(
                    (data.notes).replace(/(?:\\[rn])+/g, "\n")
                ).select();    
            imageSetValue('#image_editcustomer', 'customer/upload/', data.customerid, data.image); 

            }, '', '')
                }}
    


//////////////////////////customer reset functions
  
//customer edit reset
function customerEdit_valueReset(){
        $('#global_action').val('');
        $('#customerid_data').val(''); 
        $('#feedback_customeredit').empty();
        $('#customeridfield_customeredit').empty();
        $('#customereditform').trigger("reset");
        imageValueReset( '#imagefeedback_customeredit' ,'#image_editcustomer' ,'#imageuploadform_customeredit');}

