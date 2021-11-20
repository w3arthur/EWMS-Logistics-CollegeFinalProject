<?php

//customer add check for customer exist
postBoolean('register_customerid', "SELECT * FROM customer WHERE customerid =");

function customerEdit_loadData(){
    jsonQuery("SELECT *
    , (DATE_FORMAT( date,'%d/%m/%Y')) dateformat 
    FROM customer WHERE customerid ='" . postSet('editcustomer') ."'");
}

function customerEdit_updateData(){
    if(queryStmt("UPDATE `customer`
        SET `fullname` = ?
        , `date` = (STR_TO_DATE( ?,'%d.%m.%Y'))
        , `address` = ?
        , `notes` = ?
        , `telephone` = ? 
        WHERE `customer`.`customerid` = ?
         ;"
        , array(
            postSet('customername_customeredit')
            ,postSet('date_customeredit')
            ,postSet('address_customeredit')
            ,postSet('note_customeredit')   
            ,postSet('telephone_customeredit')
            ,postSet('customerid_customeredit')
               ))){
        trueResponseEcho();
        }else{falseResponseEcho();}}

function customerAdd_insertData(){
    if(queryStmt("
INSERT INTO `customer` (`customerid`, `fullname`, `date`, `address`, `notes`, `image`, `telephone`, `active`
) VALUES (
?
, ?
,  (STR_TO_DATE( ?,'%d.%m.%Y'))
, ?
, ?
, 'false'
, ?
, '0')
        ;", array(
            postSet('customerid_customeradd')
            ,postSet('customername_customeradd')
            ,postSet('date_customeradd')
            ,postSet('address_customeradd')
            ,postSet('note_customeradd')
            ,postSet('telephone_customeradd')
        ) ) ){postBoolean('customerid_customeradd', "SELECT * FROM customer WHERE customerid ="); //success boolean aprove
        }else{falseResponseEcho();}}

function customer_imageUpload(){
        imageUpload('image', 'customer/upload/', postSet('customerimageupload'), 
            "UPDATE `customer` SET `image` = 'true' WHERE `customer`.`customerid` = '".postSet('customerimageupload')."'
            ");}

function customer_imageDelete(){
   $idValue = postSet('customerimagedelete'); if(file_exists('customer/upload/'.$idValue.'.jpg')){unlink('customer/upload/'.$idValue.'.jpg');}
    if(file_exists('customer/upload/smaller/'.$idValue.'.jpg')){unlink('customer/upload/smaller/'.$idValue.'.jpg');} 
            if(query("UPDATE `customer` SET `image` = 'false' WHERE `customer`.`customerid` ='".$idValue."';")){trueResponseEcho();}
    else{falseResponseEcho();}
}


        //customer edit load the all data
if(postSet('editcustomer') ) {customerEdit_loadData();}

    //Edit customer set
if( postSet('customerid_customeredit')
    &&postSet('customername_customeredit')
    &&postSetEmpty('date_customeredit')
    &&postSetEmpty('telephone_customeredit')
    &&postSetEmpty('address_customeredit')
    &&postSetEmpty('note_customeredit')
        ){customerEdit_updateData();}

    //Add customer
if( postSet('customerid_customeradd')
    &&postSet('customername_customeradd')
    &&postSetEmpty('date_customeradd')
    &&postSetEmpty('address_customeradd')
    &&postSetEmpty('note_customeradd')
    &&postSetEmpty('telephone_customeradd')
        ){customerAdd_insertData();}
 
    //customer Add/Edit image
if(postSet('customerimageupload') ) {customer_imageUpload();}

        //ADD/ EDIT Delete customer image
if(postSet('customerimagedelete') ) { customer_imageDelete();}


