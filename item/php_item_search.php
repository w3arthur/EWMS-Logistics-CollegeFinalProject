<?php

function itemSearch_loadData(){
    query("UPDATE `item` SET `itemcounter` = `itemcounter`+1 WHERE `item`.`itemid` = '".postSet('itemsearch')."';"); //add +1 to item counter
        jsonQuery("
        SELECT * FROM item
        INNER JOIN zrel_category ON item.category=zrel_category.itemcategory
        INNER JOIN zrel_itemtype ON item.type=zrel_itemtype.itemtype
        INNER JOIN zrel_itempcs ON item.emphasize =zrel_itempcs.pcs
        WHERE itemid ='".postSet('itemsearch')."'");}

function itemSearch_autoComplete_byName(){global $response;
    $search = postSet('itemname_search');
    $searchid = $search;
    $searchname = str_replace(' ', "%') AND (itemname LIKE '%", $search ); 
    $query = "SELECT * FROM item
    INNER JOIN zrel_itempcs ON item.emphasize =zrel_itempcs.pcs
    WHERE (itemid LIKE '".$searchid."%') OR (itemname LIKE '%".$searchname."%') ORDER BY updated_at DESC, itemcounter DESC, itemname ASC LIMIT 7";
    $results = query($query);
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);

    $response= array("length"=>count($datas), "overcount"=>false);
     if(count($datas)>=7){$response["overcount"]= true;}
    
        foreach ($datas as $row){$response[] = array(
            "value"=>html($row['itemname'])
            ,"id"=>html($row['itemid'])
            ,"label"=>html($row['itemid'].' '.$row['itemname'])
            ,"name"=>html($row['itemname'])
            ,"image"=>html($row['image'])
            ,"storage"=>html($row['storage'])
            ,"quantity"=>html($row['quantity']) 
            ,"pcs"=>html($row['pcsname'])
            ,"price"=>html($row['price'])
            ,"go"=>true
            );}
    if(count($datas)<=0){$response[] = array("value"=>"","label"=>"אין תוצאות","image"=>false, "storage"=>"","go"=>false );$response["length"]+=1;}
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות...","image"=>false,"go"=>false );$response["length"]+=1;}  }



function itemSearch_autoComplete_byId(){global $response;
    $search = postSet('itemid_search');
    $query = "SELECT * FROM item WHERE itemid LIKE '".$search."%' 
    ORDER BY itemcounter DESC, itemid ASC LIMIT 7";
    $results = query($query);
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    $response= array("length"=>count($datas));
    
    foreach ($datas as $row){$response[] = array("value"=>html($row['itemid']),"label"=>html($row['itemid'].' '.$row['itemname']));}
    if(count($datas)<=0){$response[] = array("value"=>"","label"=>"אין תוצאות");$response["length"]+=1;}
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות..."); $response["length"]+=1;} }




function itemSearch_autoComplete_byStorage(){global $response;

    $search = postSet('itemstorage_search');
    
    if(strlen ( $search ) <= 4 ){
        
    $query = "SELECT * FROM item
    INNER JOIN zrel_itempcs ON item.emphasize =zrel_itempcs.pcs
    WHERE storage LIKE '".$search."%' ORDER BY updated_at DESC, itemcounter DESC, storage ASC,  itemname ASC LIMIT 7";
        
    }else{
        
     $query = "SELECT * FROM item
    INNER JOIN zrel_itempcs ON item.emphasize =zrel_itempcs.pcs
    WHERE storage LIKE '".$search."%' ORDER BY storage ASC";       
        
    }//end else

    $results = query($query);
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    $response= array("length"=>count($datas), "overcount"=>false);

if(strlen ( $search ) <= 4 ){   
    if(count($datas)>=7){$response["overcount"] = true;}}
    
        foreach ($datas as $row){
            $response[] = array("value"=>html($row['storage'])
            ,"id"=>html($row['itemid'])
            ,"label"=>html('l'.$row['storage'].'l '.$row['itemid'].'ו '.$row['itemname'])
            ,"name"=>html($row['itemname'])
            ,"image"=>html($row['image'])
            ,"storage"=>html($row['storage'])
            ,"quantity"=>html($row['quantity'])
            ,"pcs"=>html($row['pcsname'])
            ,"price"=>html($row['price'])
            ,"go"=>true
            );}
    
    if(count($datas)<1){$response[] = array("value"=>"","label"=>"אין תוצאות","image"=>false, "storage"=>"","go"=>false );$response["length"]+=1;}
    
    
if(strlen ( $search ) <= 4 ){
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות...","image"=>false,"go"=>false );$response["length"]+=1;}} }






    //item search load the all data
if(postSet('itemsearch') ) {itemSearch_loadData();}

        //search item by item name
if(postSetEmpty('itemname_search')){itemSearch_autoComplete_byName();}

        //search item by itemid
if(postSetEmpty('itemid_search')){itemSearch_autoComplete_byId();}

if(postSetEmpty('itemstorage_search')){itemSearch_autoComplete_byStorage();}


