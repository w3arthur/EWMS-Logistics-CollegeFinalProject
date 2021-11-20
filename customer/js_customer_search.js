loaded.customer.push('js_customer_search.js');

customerMask_search='';

function openOrder_setCustomer_button(){
    if(matching('#customerid_search')){
        $('#searchcustomer_setfororder ,#searchcustomer_replacefororder').hide();
            //hide customer search add customer to order buttens 
        imageSetValue_search('#image_orderadd', 'customer/upload/', $('#customerid_search').val(), $('#image_customersearch').attr('src')==' '?'false':'true'); //set open order customer image
        
    $('#customerid_order').val($('#customersearch_id').text()); $('#clientid_openorder').text($('#customersearch_id').text()); //set customer id for order
        
    $('#clientname_openorder').text($('#customersearch_name').text()); //customer private+family name

        $('#orderid_orderopen_feedback, #openorder_feedback').empty();
        $('#openorder_button_feedback').hide();
        //hide previus feedbacks
    }   }



function customerSelectButtonsShow_conditions(){
    //decide which button will show
    //activate on tab change for order
    if($('#customersearch_id').text()!=''){
            $('#customersearch_editcustomer ,#customersearch_editcustomer_openorder_closed ,#searchcustomer_setfororder ,#searchcustomer_replacefororder').hide();
            $('#customersearch_editcustomer').show();
            if($('#openorder_link').hasClass('active')&&$('#orderid_orderopen').prop('disabled')!=true){
                if($('#customerid_order').val()==''){
                    $('#searchcustomer_setfororder').show();
                }else{
                if($('#customerid_order').val()!=$('#customerid_search').val()){ $('#searchcustomer_replacefororder').show();}}
            }else{
                 $('#searchcustomer_setfororder, #searchcustomer_replacefororder').hide();
                }
           
            if($('#manageorder_link').hasClass('active')){
                $('#customersearch_editcustomer_openorder_closed').show();
            } else{
                
            }   }   }


function customerSelectValues_reSet(data=''){    
    if(typeof data=='object'){
        customerid_search_setValues(data);
     }else{var data=[];data.itemname='';data.storage='';
    customerid_search_setValues(data);}   
    $('#customersearch_id').empty();
    $('#customersearch_name').empty();
    $('#customersearch_date').empty(); 
    $('#customersearch_telephone').empty();  
    $('#customersearch_address').empty(); 
    $('#customersearch_notes').empty();  
    
    imageValueReset_searchCustomer('#image_customersearch');

}


function customerid_search_setValues(data=''){
    if($('#customername_search').val()==$('#customersearch_name').text()||$('#customername_search').val()==''){
        $('#customername_search').val(data.fullname).removeClass('invalid_active');
       }else{$('#customername_search').addClass('invalid_active');} 
}

function customerSelectValuesSet(id){
    if(id==''||id=='חובה להגדיר'||id=='Must be set'||id=='empty'){$('#customerid_search').val('');customerSelectValues_reSet();id='';}
    
    if(id!=''){
        $('#customerid_search').val(id);
        $('#customerid_search_feedback').empty();
        
        databaseSendForm({customersearch: id}, '#customerid_search_feedback', function(data){
            customerSelectValues_reSet(data);
            
            $('#customersearch_id').text(data.customerid);
            $('#customersearch_name').text(data.fullname);
            $('#customersearch_date').text( dateFix(data.date) ); 
            $('#customersearch_telephone').text(data.telephone);  
            $('#customersearch_address').text(data.address); 
            $('#customersearch_notes').html(replace_textarea(data.notes) );  
            customerMask_search.updateValue();
            
            imageSetValue_search('#image_customersearch', 'customer/upload/', data.customerid, data.image);

           customerSelectButtonsShow_conditions();

            qrScanner_closeAll();   
                }, '', 'לא הצליח למצוא את הלקוח', function(){customerSelectValues_reSet();});
                    }}
