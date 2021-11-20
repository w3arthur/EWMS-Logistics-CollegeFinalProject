<?php 

        //item add check for item exist
postBoolean('register_itemid', "SELECT * FROM item WHERE itemid =");


function itemEdit_loadData(){
    jsonQuery("SELECT * FROM item WHERE itemid ='" . postSet('edititem') ."'");}

function itemEdit_updateData(){
    if(queryStmt("UPDATE `item` 
        SET `itemname` = ?
        , `type` = ?
        , `category` = ?
        , `description` = ?
        , `updated_at` = current_timestamp() 
         WHERE `item`.`itemid` = ?
         ;"
        , array(
            postSet('itemname_itemedit')
            ,postSet('itemtype_itemedit')
            ,postSet('itemcategory_itemedit')
            ,postSet('descriptionitem_itemedit')   
            ,postSet('itemid_itemedit')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}


function item_imageUpload(){
     //important to check addition checkings
    imageUpload('image', 'item/upload/', postSet('itemimageupload'), 
    "UPDATE `item` 
    SET `image` = 'true'
    WHERE `item`.`itemid` = '".postSet('itemimageupload')."'
    ");}

function item_imageDelete(){
    $idValue=postSet('imageitemdelete');
      if(file_exists('item/upload/'.$idValue.'.jpg')){unlink('item/upload/'.$idValue.'.jpg');}
     if(file_exists('item/upload/smaller/'.$idValue.'.jpg')){unlink('item/upload/smaller/'.$idValue.'.jpg');} 
    if(query("UPDATE `item` SET `image` = 'false'
    WHERE `item`.`itemid` ='".$idValue."';")){trueResponseEcho();}
    else{falseResponseEcho();}
}

function itemAdd_insertData(){
    if(queryStmt("
INSERT INTO `item` (`itemid`, `created_at`, `itemname`, `type`, `category`, `description`, `image`, `updated_at`, `quantity`, `storage`, `price`, `emphasize`, `maxquantity`, `active`, `itemcounter`, `storage_updated_at`
) VALUES (
?
, current_timestamp()
, ?
, ?
, ?
, ?
, 'false', NULL, '0', NULL, '0', 'pcs', NULL, '0', '0', NULL)
        ;", array(
        postSet('itemid_itemadd')
        ,postSet('itemname_itemadd')
        ,postSet('itemtype_itemadd')
        ,postSet('itemcategory_itemadd')
        ,postSet('description_itemadd')
        ) ) ){postBoolean('itemid_itemadd', "SELECT * FROM item WHERE itemid ="); //success boolean aprove
        }else{falseResponseEcho();}}





        //item edit load the all data
if(postSet('edititem') ) {itemEdit_loadData();}

    //Edit item set
if( postSet('itemid_itemedit')
    &&postSet('itemname_itemedit')
    &&postSetEmpty('itemtype_itemedit')
    &&postSetEmpty('itemcategory_itemedit')
    &&postSetEmpty('descriptionitem_itemedit')
        ){itemEdit_updateData();}

    //Add/Edit item image
if(postSet('itemimageupload') ) {item_imageUpload();}

        //ADD/ EDIT Delete item image
if(postSet('imageitemdelete') ) {item_imageDelete();}

    //Add item
if( postSet('itemid_itemadd')
    &&postSet('itemname_itemadd')
    &&postSetEmpty('itemtype_itemadd')
    &&postSetEmpty('itemcategory_itemadd')
    &&postSetEmpty('description_itemadd')
        ){itemAdd_insertData();}

