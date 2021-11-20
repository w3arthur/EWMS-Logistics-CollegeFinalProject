function js_onready_item_searchActivate(){

loaded.onready.push('js_onready_item_search.js');


//////////////////////////item select onready   
    //search item imask input, itemid 
itemidMask_search=imask('#itemid_search', '0-000-00000');  

    //item search events
$('#itemid_search').on('keyup dblclick',function(){
  if(matching('#itemid_search')){
      itemSelectValuesSet();
  }});

var storageMask_search='';
stgMask_search();  

onlyEnglishKeys('#storage_search'); //function set in storage

$('#storage_search').keyup(function(){ //mobile 5th char only english fix
       if( ($(this).val()).length>=5 && !$(this).val().match(/^[0-9]{3}[-]{1}[A-Za-z]/)){
        storageMask.updateValue($(this).val(($(this).val()).substr(0,3)) ); }});


$('#storage_search').focus(function(){stgMask_search();}).keyup( //mobile keyboard set
function(){
stgMask_search_destroy();
stringlng=($('#storage_search').val()).length;
if(stringlng>2&&stringlng<5){ $('#storage_search').attr("inputmode","text"); 
}else{$('#storage_search').attr("inputmode","numeric");}
stgMask_search();     
});


        //auto complete functions
   //item search auto complete, item name
databaseAutocompleteSet('#itemname_search', 0
    , function(request){return {itemname_search: request.term}}
    , function(){$('.carousel').show();}
    , function(data, response){
            caroselActivate(data);
            scrollto('#item_search_bar');
            setTimeout( function(){response( data )} ,50);}
    , function(ui){
        $('#itemid_search').val(ui.item.id); 
        if(matching('#itemid_search')){ itemSelectValuesSet_backToTop(ui.item.id);}   }   );
    //item search auto complete, item storage
databaseAutocompleteSet('#storage_search', 0
    , function(request){return {itemstorage_search: request.term}}
    , function(){$('.carousel').show();}
    , function(data, response){
            caroselActivate(data);
            setTimeout( function(){response( data )} ,50);}
    , function(ui){
        $('#itemid_search').val(ui.item.id); 
        if(matching('#itemid_search')){ itemSelectValuesSet(ui.item.id);}   }   );
    //item search auto complete, item id
databaseAutocompleteSet('#itemid_search', 0
    , function(request){return {itemid_search: request.term}}
    , function(){}
    , function(data, response){ response( data );}
    , function(ui){
        $('#itemid_search').val(ui.item.value);
        if(matching('#itemid_search')){ itemSelectValuesSet(ui.item.value);}   }   );

    
 }  //end function js_onready_item_searchActivate()
    