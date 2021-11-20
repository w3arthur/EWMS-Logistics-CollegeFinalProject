function js_onready_orderActivate(){

loaded.onready.push('js_onready_order.js');

//first example loads
orderselect_openLoad();
orderselect_closeLoad();      
         

// materialize tabs activate
    instance_order = M.Tabs.init(el_order, {});


//////////////////////////order open onready
        //add order imask input, orderid
imask('#orderid_orderopen', '00-0000-000'); 

$('#orderid_orderopen').keyup(function(){
    if(matching('#orderid_orderopen'))  {
        qrScannerOrderOpen_close();
        scrollto('#order_bar');
        databaseCheckOrderRegiseter($('#orderid_orderopen').val()); }else{$('#orderid_orderopen_feedback, #openorder_feedback').empty();}
});   
   
    
 }  //end function js_onready_orderActivate()
    