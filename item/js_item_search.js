loaded.item.push('js_item_search.js');

var itemidMask_search=''

        //adddition scripts in autocomplete.js

function stgMask_search(){
if((typeof storageMask_search)=='object'){storageMask_search.destroy();}
storageMask_search=imask('#storage_search',  '000-a-000' );}
function stgMask_search_destroy(){if((typeof storageMask_search)=='object'){storageMask_search.destroy();}}
    

function itemSelectButtonsShow_conditions(){  if($('#openorder_link').hasClass('active')&&$('#orderid_orderopen').prop('disabled')!=true){$('#order_additem_btn').show();
             }else{$('#order_additem_btn').hide();}}


function itemSelectValues_reSet(data=''){
     //$('.carousel').hide();
    $('#qrfeedback_itemsearch_start').show();
    $('#itemid_search_feedback').empty();
    
    if(typeof data=='object'){
        storage_itemid_search_setValues(data);
    }else{var data=[];data.itemname='';data.storage='';
    storage_itemid_search_setValues(data);}
    
    $('#itemsearch_name').empty();
    $('#itemsearch_id').empty();
    $('#itemsearch_storage').empty();
    $('#itemsearch_quantity').empty();
    $('#itemsearch_price').empty();
    $('#itemsearch_type').empty(); 
    $('#itemsearch_category').empty();  
    $('#itemsearch_description').empty(); 
    
    imageValueReset_searchItem('#image_itemsearch');
    $('#itemsearch_buttones').hide();
            }

function storage_itemid_search_setValues(data){
        if($('#itemname_search').val()==$('#itemsearch_name').text()||$('#itemname_search').val()==''){
            $('#itemname_search').val(data.itemname).removeClass('invalid_active');
       }else{$('#itemname_search').addClass('invalid_active');}
        
           if($('#storage_search').val()==''||matching('#storage_search')){$('#storage_search').val(data.storage);
                        }else{
            $('#storage_search').val($('#storage_search').val().substring(0, 5)); }     }


        //item select set values from database onkeyup
function itemSelectValuesSet(id='', scrolltoTopFunction=function(){}){
    var itemid_data=$('#itemid_search').val();
    if(id!=''){$('#itemid_search').val(id);}
    if(id=='empty'){$('#itemid_search').val('');$('.carousel').hide();qrScanner_closeAll();itemSelectValues_reSet();scrolltoTopFunction();}
    itemid_data=$('#itemid_search').val();
    if(matching('#itemid_search')){
        //itemAdd_imageValueReset();
        databaseSendForm({itemsearch: itemid_data}, '#itemid_search_feedback', function(data){

            itemSelectValues_reSet(data);

            $('#itemsearch_name').text(data.itemname);
            $('#itemsearch_id').text(data.itemid);
            $('#itemsearch_storage').text(data.storage);
            storageMask_search.updateValue();
            itemidMask_search.updateValue();
            
            $('#itemsearch_quantity').text(data.quantity+' '+data.pcsname );
            $('#itemsearch_price').html('&#8362; '+data.price);
            $('#itemsearch_type').text(data.itemtypename); 
            $('#itemsearch_category').text(data.categoryname);  
            $('#itemsearch_description').html(replace_textarea(data.description) );  

            imageSetValue_search('#image_itemsearch', 'item/upload/', data.itemid, data.image);
    
            $('#itemsearch_buttones').show();
         
            itemSelectButtonsShow_conditions();   

            
            scrolltoTopFunction();

            qrScanner_closeAll();
        },'','לא הצליח למצוא את הפריט',function(){itemSelectValues_reSet();});}}


function itemSelectValuesSet_backToTop(id=''){
    itemSelectValuesSet(id ,function(){scrollto('#itemsearch_top', -50);});}