function js_onready_customer_searchActivate(){

loaded.onready.push('js_onready_customer_search.js');

//////////////////////////customer select onready
        //search customer imask input, customerid 
customerMask_search=imask('#customerid_search', '00-0000');  
    
        //customer search events
$('#customerid_search').keyup(function(){
  if(matching('#customerid_search')){
     // $('#customerid_search').val($('#customerid_search').val());  
      customerSelectValuesSet($('#customerid_search').val() );
  }});

        //auto complete functions
    //customer search auto complete, customer id
databaseAutocompleteSet('#customerid_search', 0
    , function(request){return {customerid_search: request.term}}
    , function(){}
    , function(data, response){ response( data );}
    , function(ui){
        $('#customerid_search').val(ui.item.value);
        if(matching('#customerid_search')){
            customerSelectValuesSet(ui.item.value);
            scrollto('#customer_search_bar', -50);  }   }   );
    //customer search auto complete, customer name
databaseAutocompleteSet('#customername_search', 0
    , function(request){return {customername_search: request.term}}
    , function(){}
    , function(data, response){ response( data );}
    , function(ui){
        $('#customerid_search').val(ui.item.id);
        if(matching('#customerid_search')){
            customerSelectValuesSet(ui.item.id);
            scrollto('#customer_search_bar', -50);  }   }   );


 }  //end function js_onready_customer_searchActivate()
 
 
