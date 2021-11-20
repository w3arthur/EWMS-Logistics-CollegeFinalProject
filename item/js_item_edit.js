loaded.item.push('js_item_edit.js');


    //item edit database delete image  button onclick
function itemEdit_ImageDelete(){
    itemImageDelete($('#itemid_itemedit').val(), '#imagefeedback_itemedit', '#image_edititem', '#imageuploadform_itemedit');} 
    //itemImageDelete set in item_add.js



    //item edit database update edited item information button onclick
function sendItemEdit(){
    matchingReturnToFeadbackBox('#itemname_itemedit');
    if(matching('#itemname_itemedit')
    ){databaseSendForm('#itemeditform', '#feedback_itemedit', function(){
    itemEditValuesSet( $('#itemidfield_itemedit').text() );
    }, 'הפריט נערך במסד הנתונים', 'לא הצליח לערוך את הפריט')}
    else{$('#feedback_itemedit').html('<span class="red-text">אחד השדות שהוזן שגוי</spae>')}}

    //item edit database set values also after editing
function itemEditValuesSet(value){
    if(value!=''){
        instance_item.select('edititem');
        itemEdit_imageValueReset();
        databaseSendForm({edititem:value}, '#', function(data){
            $('#itemid_itemedit').val(data.itemid);
            $('#itemidfield_itemedit').text(data.itemid);
            $('#itemname_itemedit').val(data.itemname).select();
            $('#itemtype_itemedit').val(data.type);
            $('#itemcategory_itemedit').val(data.category);
            $('#descriptionitem_itemedit').val(
                (data.description).replace(/(?:\\[rn])+/g, "\n")
            ).select(); 
        imageSetValue('#image_edititem', 'item/upload/', data.itemid, data.image);
        },'', '');
          }}

//////////////////////////item reset functions
  
//item edit reset
function itemEdit_imageValueReset(){
        $('#global_action').val('');
        $('#itemid_data').val(''); 
        $('#feedback_itemedit').empty();
        $('#itemidfield_itemedit').empty();
        $('#itemeditform').trigger("reset");
        imageValueReset( '#imagefeedback_itemedit' ,'#image_edititem' ,'#imageuploadform_itemedit');}

