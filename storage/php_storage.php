<?php

function checkStorage_postSet_andUpToDate($id){
    if(!postSet($id)){return false;}
    $id=postSet($id);
    $sotrage_updated_at=results("select storage_updated_at from item where itemid='".$id."'");

    if ($sotrage_updated_at[0]['storage_updated_at']!=postSet('updated_at_storage')){
       falseResponseEcho(); 
       return false;}
    return true;   
    //this value set with storage set/update
   
}

function storage_loadData(){
    query("UPDATE `item` SET `itemcounter` = `itemcounter`+1 WHERE `item`.`itemid` = '".postSet('storageedit')."';");
    jsonQuery("SELECT * FROM item INNER JOIN zrel_itempcs ON item.emphasize=zrel_itempcs.pcs WHERE itemid ='" . postSet('storageedit') ."'");
}
        //check if the storage free
function storage_updateData_storage_approveIfFreeForUser(){
    postBoolean('storage_itemstorage', "SELECT * FROM item WHERE itemid !='".postSet('storage_itemid')."' AND storage=");}

function storage_updateData_storage(){
    $storage=strtoupper ( postSet('storage_storage') );
    if(!preg_match('/^[0-9]{3}[-]{1}[a-zA-Z]{1}[-]{1}[0-9]{3}$/', $storage)){$storage='';}
    if(queryStmt("UPDATE `item` SET `active`='1', 
        `storage_updated_at` = current_timestamp()
        , `storage` = ?
        , `itemcounter` = `itemcounter`+1 
        WHERE `item`.`itemid` = ?
         ;"
        , array(
            (empty($storage)?null:$storage)
            ,postSet('storageupdate')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}

function storage_updateData_quantity(){
    $quantity=postSet_number('quantity_storage');
    if(queryStmt("UPDATE `item` SET `active`='1', 
        `storage_updated_at` = current_timestamp()
        , `quantity` = ?
        , `itemcounter` = `itemcounter`+1 
        WHERE `item`.`itemid` = ?
         ;"
        , array(
            (empty($quantity)?'0':$quantity)
            ,postSet('quantityupdate')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}

function storage_updateData_quantityAdd(){
    $quantity=postSet_number('quantityadd_storage');
    if(queryStmt("UPDATE `item` SET `active`='1', 
        `storage_updated_at` = current_timestamp()
        , `quantity` = `quantity` + ?
        , `itemcounter` = `itemcounter`+1 
        WHERE `item`.`itemid` = ?
         ;"
        , array(
           (empty($quantity)?'0':$quantity)
            ,postSet('quantityadd')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}


function storage_updateData_all(){
    $quantity=postSet_number('quantity_storage');
    $quantityAdd=postSet_number('quantityadd_storage');
    $storage=strtoupper ( postSet('storage_storage') );
    if(!preg_match('/^[0-9]{3}[-]{1}[a-zA-Z]{1}[-]{1}[0-9]{3}$/', $storage)){$storage='';}
    $price=postSet_number('price_storage');
    if(queryStmt("UPDATE `item` SET `active`='1',
    `storage_updated_at` = current_timestamp()
    , `quantity` = ? + ?
    , `storage` = ?
    , `price` = ?
    , `emphasize` = ?
    , `itemcounter` = `itemcounter`+1 
    WHERE `item`.`itemid` = ?
         ;"
        , array(
           (empty($quantity)?'0':$quantity)
            ,(empty($quantityAdd)?'0':$quantityAdd)
            ,(empty($storage)?null:$storage)
            ,(empty($price)?'0':$price)
            ,postSet('emphasize_storage')
            ,postSet('itemid_storage')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}





        //storage load the all data
if(postSet('storageedit') ) {storage_loadData();}

        //storage storage set
if(checkStorage_postSet_andUpToDate('storageupdate')
    &&postSetEmpty('storage_storage')
        ){storage_updateData_storage();}

        //storage quantity set
if(checkStorage_postSet_andUpToDate('quantityupdate')
    &&postSetEmpty('quantity_storage')
        ){storage_updateData_quantity();}

        //storage quantity add
if(checkStorage_postSet_andUpToDate('quantityadd')
    &&postSetEmpty('quantityadd_storage')
        ){storage_updateData_quantityAdd();}

        //storage update all item storage infurmation
if(checkStorage_postSet_andUpToDate('itemid_storage')
   &&postSetEmpty('storage_storage')
   &&postSetEmpty('quantity_storage')
   &&postSetEmpty('quantityadd_storage')
   &&postSetEmpty('price_storage')
   &&postSetEmpty('emphasize_storage') 
        ){storage_updateData_all();}






        //storage edit check for storage exists
if(postSet('storage_itemid')
  &&postSet('storage_itemstorage') ){storage_updateData_storage_approveIfFreeForUser();}

