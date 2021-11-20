<?php       session_start();
    

            require('mysql.php');   //system functions and database connection

            $response=array('value'=>null);
                    //page ends with echo json_encode($response);
                    //dont forget each site function to set global $response; exept function that using one of the functions in this page that includes this global
                    //dont forget each require site function to set global functions
                    //dont forget to set new $response=array(); if you use more then value:true/false

            require('login/php_login.php');

if(sessionSet('userid')&&sessionSet('password')){
    $userdata=results("SELECT * FROM `user` WHERE `user`.`userid`='".sessionSet('userid')."' AND `user`.`userpassword`='".sessionSet('password')."';");
     if(!empty($userdata)&&$userdata[0]){
        $userdata=$userdata[0];
        $userid=$userdata['userid'];
        $permission=0;
        $permission=$userdata['permission'];
            //dont forget to set as:
            //global $userid;   //global $permission;
        
        if($permission==0){$response=array('value'=>'logout');}  
        if($permission>=1){     
            require('item/php_item_search.php'); 
            require('customer/php_customer_search.php');
            require('user/php_user_anyuser.php');}
        if($permission>=2){         
            require('item/php_item.php');
            require('customer/php_customer.php');}
        if($permission>=3){ 
            require('order/php_order.php');}
        if($permission>=4){ 
            require('storage/php_storage.php');}  
        if($permission>=5){             
            require('user/php_user_manager.php');}      
    }   }

//connection open and basic function share


        //ajax php and mysql ok ping and alert
if(postSetEmpty('ajaxtest')){
    echo 'php: ok, ';
    if(booleanQuery("SELECT `ok` FROM `z_test` WHERE `ok`='ok';")){echo 'mysql: ok, ';}
    echo 'ajax: '; trueResponseEcho();
}

//json basic functions

    //load all the values from the query {value:false} 
    //or {value:true, *query select data*}

//future develope for delete globe $response 
// userSet()
// passwordSet()
// responseSet()


function jsonQueryArray($query){global $response;
    $results = query($query);
    if($results){
        $datas = mysqli_fetch_all($results, MYSQLI_ASSOC);
        mysqli_free_result($results);//Free the results from memory
        if(!empty($datas)&& count($datas)==1){
            $response = array("value"=>true)+$datas[0];
        }else{$response = array("value"=>false);} }  
    return $response;
}

function jsonQuery($query){global $response;
        $response = jsonQueryArray($query); }


function jsonQueryArray_multi($query){global $response;
    $results = query($query);
    if($results){
        $datas = mysqli_fetch_all($results, MYSQLI_ASSOC);
        mysqli_free_result($results);//Free the results from memory
        if(!empty($datas)&& count($datas)>=1){
            $response = array("value"=>true)+array("length"=>count($datas))+$datas;
        }else{$response = array("value"=>false);}  }   
    return $response;
}

function jsonQuery_multi($query){global $response;
        $response = jsonQueryArray_multi($query);}


    //false boolean response print as json value:false
            //on develope, remove the word Echo
            //set responseSet('value',false)
function falseResponseEcho(){global $response;$response = array("value"=>false);}

    //false boolean response print as json value:false
            //on develope, remove the word Echo
            //set responseSet('value',true)
function trueResponseEcho(){global $response;$response = array("value"=>true);}


   // returning true or false for jsonvar.value
    //for select
function booleanQuery($query_equation){
        $results = query($query_equation);
        if($results){
            $datas = mysqli_fetch_all($results, MYSQLI_ASSOC);
            mysqli_free_result($results);//Free the results from memory
            if(!empty($datas)){return true;}
            return false; }}

    // returning value:true or value:false for jsonvar.value
    //for update/delete
function booleanQueryResponse($query_equation){
    if(booleanQuery($query_equation)){trueResponseEcho();
        }else{falseResponseEcho();} }


//short condition for query : if(isset($_POST(...))){return query(...)}
    // returning value:true or value:false for jsonvar.value
    //for select
function postBoolean($post_value, $query_equation){
    if(postSet($post_value) ){
        $query_value= postSet($post_value);
        if(!empty($query_value)){
            if(booleanQuery($query_equation . " '$query_value' ")){
                trueResponseEcho();
            }else{falseResponseEcho();}}}}
function postBoolean_number($post_value, $query_equation){
    if(postSet($post_value) ){
        $query_value= postSet_number($post_value);
        if(empty($query_value)){$query_value=0;}
            if(booleanQuery($query_equation . " $query_value ")){
                trueResponseEcho();
            }else{falseResponseEcho();}}}

//print json $response

//close connection
    //print json $response array {value:___, ...}
echo json_encode($response);mysqli_close($conn);exit;