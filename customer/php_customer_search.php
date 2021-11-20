<?php

function customerSearch_loadData(){
    jsonQuery("SELECT * FROM customer
        WHERE customerid ='".postSet('customersearch')."'");}

function customerSearch_autoComplete_byName(){global $response;
    $search = postSet('customername_search');
    //falseResponseEcho();
    $search_loop = str_replace(' ', "%') AND (fullname LIKE '%", $search ); 

    $query = "SELECT * FROM customer WHERE (customerid LIKE '".$search."%') OR (fullname LIKE '%".$search_loop."%') ORDER BY fullname ASC LIMIT 7";
    $results = query($query);
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    $response= array("length"=>count($datas));                             
    foreach ($datas as $row){$response[] = array("value"=>html($row['fullname']), "id"=>html($row['customerid']),"label"=>html($row['customerid'].' '.$row['fullname']));}
    if(count($datas)<1){$response[] = array("value"=>"","label"=>"אין תוצאות","image"=>false,"go"=>false );}
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות...","go"=>false );}    }


function customerSearch_autoComplete_byId(){global $response;
    $search = postSet('customerid_search');
    $query = "SELECT * FROM customer WHERE customerid LIKE '".$search."%' ORDER BY customerid ASC LIMIT 7";
    
    $results = query($query);
    $datas=mysqli_fetch_all($results, MYSQLI_ASSOC);
    mysqli_free_result($results);
    $response= array("length"=>count($datas));
    
    foreach ($datas as $row){$response[] = array("value"=>html($row['customerid']),"label"=>html($row['customerid'].' '.$row['fullname']));}
    if(count($datas)<=0){$response[] = array("value"=>"","label"=>"אין תוצאות");$response["length"]+=1;}
    if(count($datas)>=7){$response[] = array("value"=>"","label"=>"...יותר מ7 תוצאות...");$response["length"]+=1;}  }




    //customer search load the all data
if(postSet('customersearch') ) {customerSearch_loadData();}

        //search customer by customerid
if(postSetEmpty('customerid_search')){customerSearch_autoComplete_byId();}

        //search customer by customer name
if(postSetEmpty('customername_search'))
{customerSearch_autoComplete_byName();}


