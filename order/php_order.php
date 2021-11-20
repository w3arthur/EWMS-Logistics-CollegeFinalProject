<?php 

//dont forget to set as:
//global $userid;


if(postSet('manageorder_close')){  
    $id=postSet_number('manageorder_close');

 $ordertotal=results("SELECT `order`.orderid, `order`.order_updated_at, `order`.userid, `customer`.customerid , `customer`.fullname,COUNT(`orderitem`.`orderid`) itemcount , SUM( `orderitem`.`orderprice` * (`orderitem`.`orderquantity`+`orderitem`.`supplyquantity`) ) orderprice FROM `order` INNER JOIN `customer` ON `order`.`customerid`=`customer`.`customerid` LEFT JOIN `orderitem` ON `order`.`orderid` = `orderitem`.`orderid`
 WHERE `order`.`closed`=0 &&   `order`.`orderid` = $id;");
    
   $ordertotal= $ordertotal[0];
    $totalprice=$ordertotal['orderprice'];
    $totalloines=$ordertotal['itemcount'];
query("
UPDATE `order` SET `closed` = '1', `order_closed_at` = current_timestamp() , `orderpaidprice` = '$totalprice', `totallines` = '$totalloines' WHERE `order`.`orderid` = $id;
");    

    
postBoolean_number('manageorder_close', "
SELECT *
FROM `order`
WHERE `order`.`closed`=1 AND `order`.`orderid`=
"); }
    

    
    
    
            //load order data+items
if(postSet('ordermanage_orderload')){
    //first order data
    $response =
    jsonQueryArray( "SELECT  `user`.`userfullname`, `order`.*, `customer`.* FROM `order`
    INNER JOIN `user` ON `order`.`userid` = `user`.`userid`
    INNER JOIN `customer` ON `order`.`customerid`=`customer`.`customerid`
        WHERE `order`.`orderid`=".postSet('ordermanage_orderload').";")
    + jsonQueryArray_multi( "SELECT  * FROM `orderitem`
    INNER JOIN `item` ON `orderitem`.`itemid`=`item`.`itemid`
    INNER JOIN zrel_itempcs ON item.emphasize=zrel_itempcs.pcs
        WHERE `orderitem`.`orderid`=".$response['orderid'].";");
    

                }




    //manage closed order get all orders data
if(postSet('ordermanage_closed_getdata') == 'getallorders'){
 jsonQuery_multi("SELECT `order`.orderid, `order`.totallines, `order`.orderpaidprice, `order`.order_closed_at, `order`.userid, `customer`.customerid, `customer`.fullname FROM `order` INNER JOIN `customer` ON `order`.`customerid`=`customer`.`customerid` LEFT JOIN `orderitem` ON `order`.`orderid` = `orderitem`.`orderid`
 WHERE `order`.`internal`=0 AND `order`.`closed`=1
GROUP BY `order`.`order_closed_at` DESC ");     }



    //manage order get all orders data
if(postSet('ordermanage_open_getdata') == 'getallorders'){
 jsonQuery_multi("SELECT `order`.orderid, `order`.order_updated_at, `order`.userid, `customer`.customerid , `customer`.fullname,COUNT(`orderitem`.`orderid`) itemcount , SUM(`orderitem`.`orderprice` * (`orderitem`.`orderquantity`+`orderitem`.`supplyquantity`) ) orderprice FROM `order` INNER JOIN `customer` ON `order`.`customerid`=`customer`.`customerid` LEFT JOIN `orderitem` ON `order`.`orderid` = `orderitem`.`orderid`
 WHERE `order`.`internal`=0 AND `order`.`closed`=0
GROUP BY `order`.`order_updated_at` DESC, `order`.`orderid` ");
}





        //order open check for item exist
postBoolean_number('register_orderid', "SELECT * FROM `order` WHERE orderid =");

function order_loadData_item_forOrder(){
    jsonQuery("SELECT * FROM item
        INNER JOIN zrel_itempcs ON item.emphasize=zrel_itempcs.pcs
            WHERE itemid ='" . postSet('order_openorder_additem') ."'");}

function order_insertData_returningAI(){global $userid;
    $orderid=postSet('orderid_orderopen');
    if(!empty($orderid)){
        $orderid=intval(preg_replace('/[^0-9]+/', '', $orderid), 10);}
    
    if($orderid >= 120000000){falseResponseEcho();
        //not register orderid as AI bigger then 120000000
    }else{
        if(empty($orderid)){$orderid="NULL";}
        query("UPDATE `customer` SET `active` = '1' WHERE `customer`.`customerid` = '".postSet('customerid_order')."';");
        query("INSERT INTO `order` (
        `orderid`, `customerid`, `closed`
        , `userid`, `order_created_at`, `order_updated_at`
        , `order_closed_at`, `orderpaidprice`, `orderpaid`
        , `suppliedpaidprice`, `suppliedpaid`, `ordernote`, `totallines`, `internal`
        ) VALUES (
        $orderid
        , '".postSet('customerid_order')."'
        , '0'
        , $userid
        , current_timestamp()
        , current_timestamp()
        , NULL, '0', '0', '0', '0', NULL, NULL, 0);");
        $lastInsertedId = lastAI();
        if($lastInsertedId==0){falseResponseEcho();
        }else{//get all the data from last inserted order (the last ai)
          jsonQuery("SELECT * FROM `order` 
            INNER JOIN customer ON order.customerid=customer.customerid
            WHERE `order`.`userid` =$userid AND `order`.`orderid`=$lastInsertedId
            ;");
        }}}

function orderitem_insertData_forEachItem(){global $response;
    $response= array("value"=>false, "indate"=> true, "added"=>false, "available"=>true);
    
            //check if the item still available in item menegment return value:true
     if(booleanQuery("SELECT * FROM `item` WHERE `item`.`itemid`='".postSet('itemid_orderitem')."' AND `item`.`active`=1")){$response["value"]=true;}
    
    
     //quantity that requested value set
    $itemquantity=0;
    $itempurchasequantity=0;
    if(postSet('itemquantity_orderitem')){$itemquantity=postSet_number('itemquantity_orderitem');}
    if(postSet('itempurchasequantity_orderitem')){$itempurchasequantity=postSet_number('itempurchasequantity_orderitem');}
    
      //last indate for this order check before adding
    $this_lastupdate=postSet('thisorder_date_orderitem');

                        //AND בדוק גם את המשתמש
            //adding oreder item
    if(empty(postSet('ai_orderitem'))){ //first time adding this item
                //check if stored enoth value of item
        if(booleanQuery("SELECT * FROM `item` 
        WHERE `item`.`itemid`='".postSet('itemid_orderitem')."' AND 
        `item`.`quantity` >= $itemquantity ;")){
            
            $itemdata=results("select price from item where itemid='".postSet('itemid_orderitem')."'");
            
                //price that this item sold for, to register it in database
            $itemOriginalPrice =$itemdata[0]["price"];

            if(queryStmt("
               INSERT INTO `orderitem` (`ai`, `orderid`, `itemid`, `orderquantity`, `supplyquantity`, `oi_updated_at`, `close`, `received`, `oi_created_at`, `orderprice`
               ) VALUES (
               NULL
               , ?
               , ?
               , ?
               , ?
               , current_timestamp(), '0', '0', current_timestamp()
               , '$itemOriginalPrice'
                );", array(
                    postSet('orderid_orderitem')
                    ,postSet('itemid_orderitem')
                    ,$itemquantity
                    ,$itempurchasequantity
                    ) ) ){ 
                        //decrease order quantity add +1 to item counter
                        query("UPDATE `item` SET
                        `storage_updated_at`=current_timestamp(),
                        `quantity`=`quantity`- $itemquantity , `itemcounter` = `itemcounter`+1 WHERE `item`.`itemid` = '".postSet('itemid_orderitem')."';");                         
                        $response["added"]=true;//success boolean aprove
                    }
        }else{$response["available"]=false;} //item not available in storage

/*
    }else if(
        ($itemquantity+$itempurchasequantity)=='0'){
    delete...  מחק לפי ai 
                הוסף את הכמות שנמחקת למלאי  ומחק את הפריט מההזמנה
  */  
    }else{  //if no ai
        if(queryStmt("
            UPDATE `orderitem` SET 
            `orderquantity` = ?
            , `supplyquantity` = ?
            , `oi_updated_at` = current_timestamp()
            , `close` = '0'
            , `received` = '0' 
            WHERE `orderitem`.`ai` = ? 
            AND `orderitem`.`itemid`= ?
                ;", array(
                postSet('itemquantity_orderitem')
                ,postSet('itempurchasequantity_orderitem')
                ,postSet('ai_orderitem')
                ,postSet('itemid_orderitem')
                ) ) ){ trueResponseEcho();//success boolean aprove
                }else{falseResponseEcho();}}    }

function order_updateOrderMessage(){//final after insert
    query("
    UPDATE `order` SET `order_closed_at` = NULL, `ordernote` = '".postSet('description_orderopen')."' WHERE `order`.`orderid` = ".postSet_number('orderid_orderitem').";
    ");
postBoolean_number('orderid_orderitem', "SELECT * FROM `order` WHERE `order`.`orderid` ="); 
}  
    //return value:true that the order exists and created



/*
function order_deleteOrder(){
    $response= array("value"=>false);
    if(booleanQuery("SELECT * FROM `order` WHERE `order`.`orderid` =".postSet_number('orderid_data'))){
        $response["value"]=true;
        if(booleanQuery("SELECT * FROM `order` 
            WHERE `order`.`order_updated_at`='".postSet('orderdate_data')."' 
            AND `order`.`orderid` =".postSet_number('orderid_data')
        )){
            $response+= array("indate"=>true);
            query("DELETE FROM `order` 
                WHERE `order`.`order_updated_at`='".postSet('orderdate_data')."'
                AND `order`.`orderid` =".postSet_number('orderid_data') );
            if(booleanQuery("SELECT * FROM `order` WHERE `order`.`orderid`=".postSet_number('orderid_data')) ){$response+= array("delete"=>false);//success delete 
            }else{$response+= array("delete"=>true);}
        }else{$response+= array("indate"=>postSet('orderdate_data'));} 
    }
    echo json_encode($response);} //value:t/f indate:t/f delete:t/f

*/


        //item add for order load the all data
if(postSet('order_openorder_additem') ) {order_loadData_item_forOrder();}



         //Creating new order and get the ai
if( postSet('customerid_order')
    &&postSetEmpty('orderid_orderopen')
  ) {order_insertData_returningAI();}

    //Order add OrderItem
if( postSetEmpty('ai_orderitem') //ai will received if not sent one
    &&postSet('orderid_orderitem')
    &&postSet('itemid_orderitem')
    &&(postSet('itemquantity_orderitem')
   ||postSet('itempurchasequantity_orderitem')||true) // זמנית מחזיר אמת
    //&&postSet('thisorder_date_orderitem')
        ){orderitem_insertData_forEachItem();}
 
    //Order add after order message, final open order data
if(postSetEmpty('description_orderopen')
 &&postSet('orderid_orderitem')
    ){order_updateOrderMessage();}

    //order only open delete for order after load the all data
/*if(valueSetData('global_action', 'delete_openorder')
    &&valueSetData('global_orderaction', 'delete_openorder')
    &&postSet('orderid_data')
   &&postSet('orderdate_data')
     ) {order_deleteOrder();}    
*/

        //order load the all data
/*
if(valueSetData('global_action', 'addorder')
    &&postSet('orderid_data') ) {
        jsonQuery("
            SELECT * 
            FROM `order` 
            INNER JOIN customer ON order.customerid=customer.customerid
            WHERE `order`.`userid` = $userid AND `order`.`orderid`='".postSet('orderid_data')."'
        ");
    }
*/
