function js_onready_customerActivate(){

loaded.onready.push('js_onready_customer.js');


// materialize tabs activate
    instance_customer = M.Tabs.init(el_customer, {});


//////////////////////////customer add onready       
    //add customer  imask input, customeridshown_customeradd
imask('#customeridshown_customeradd', '00-0000');
imaskDate('#date_customeradd');   
imask('#telephone_customeradd', '000-000-0000');

     
    //customer add fixing feedback on keyup if there another feedback before
    //when #customeridshown_customeradd on keyup matching, checking and send to databse
onkeyup_matchingReturnFunctionElseKeepCheck('#customeridshown_customeradd'
    ,'customerid_matched_register_class'
    ,function(){databaseCheckCustomer($('#customeridshown_customeradd').val());});


     //customer add blur feedback customer id, customer name, sending  customer
onblur_matchingReturnToFeadbackBox('#customeridshown_customeradd', '#feedback_customeradd'); 
onblur_matchingReturnToFeadbackBox('#customername_customeradd', '#feedback_customeradd'); 


    //customer add sending image form on image change or set
$('#imageupload_customeradd').change(function(){
    onchange_sendImageFile( 'customerimageupload'
                            , $('#customeridshown_customeradd').val()
                            , '#imagefeedback_customeradd'
                            , '#image_addcustomer'
                            , 'customer/upload/');
    });
        
 

//////////////////////////customer edit onready    
imaskDate('#date_customeredit');
imask('#telephone_customeredit', '000-000-0000');
     
    //item edit blur feedback item name
onblur_matchingReturnToFeadbackBox('#customername_customeredit', '#feedback_customeredit'); 
  
    //customer edit sending image form on image change or set
$('#imageupload_customeredit').change(function(){
  onchange_sendImageFile('customerimageupload'
                        , $('#customerid_customeredit').val()
                        , '#imagefeedback_customeredit'
                         , '#image_editcustomer'
                         , 'customer/upload/');
});  
  
    
    
 }  //end function js_onready_customerActivate()
    