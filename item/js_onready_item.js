function js_onready_itemActivate(){

loaded.onready.push('js_onready_item.js');

// materialize tabs activate
    instance_item = M.Tabs.init(el_item, {});


//////////////////////////item add onready    

    //add item  imask input, itemidshown_itemadd
imask('#itemidshown_itemadd', '0-000-00000');

     //item add blur feedback item id, item name, sending  item 
onblur_matchingReturnToFeadbackBox('#itemidshown_itemadd', '#feedback_itemadd'); 
    
onblur_matchingReturnToFeadbackBox('#itemname_itemadd', '#feedback_itemadd'); 
    
    //item add fixing feedback on keyup if there another feedback before
    //when #itemidshown_itemadd on keyup matching, checking and send to databse
onkeyup_matchingReturnFunctionElseKeepCheck('#itemidshown_itemadd'
    ,'itemid_matched_register_class'
    ,function(){databaseCheckItem($('#itemidshown_itemadd').val());}); 
    
 
    //item add sending image form on image change or set
$('#imageupload_itemadd').change(function(){ 

    onchange_sendImageFile('itemimageupload'
                    , $('#itemidshown_itemadd').val()
                    ,'#imagefeedback_itemadd'
                    , '#image_additem'
                    , 'item/upload/');
    });  
    
//////////////////////////item edit onready     
    //item edit blur feedback item name
onblur_matchingReturnToFeadbackBox('#itemname_itemedit', '#feedback_itemedit'); 

        //item edit sending image form on image change or set
$('#imageupload_itemedit').change(function(){
  onchange_sendImageFile( 'itemimageupload'
                         ,$('#itemid_itemedit').val()
                         ,'#imagefeedback_itemedit', '#image_edititem', 'item/upload/');
});
  

 }  //end function js_onready_itemActivate()
    
