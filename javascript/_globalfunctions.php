<script>
    var loaded=[];  //set var to load the script files
loaded.onready=[];
loaded.javascript=[];
loaded.customer=[];
loaded.item=[];
loaded.order=[];
loaded.storage=[];
loaded.user=[];      
    
    
loaded.onready.push('*global functions***');

    //global onready all page functuins
         //php+mysql test ping
$(document).ready(function(){//////////////////////////page onready scripts

$('#indexgreetings, #sidenavgreetings').text(indexGreetings()+': ');    //good morning/afternon/night line
    
  phpFastTestingLog();
     
 console.log('print loaded javascript files:');
 console.log(loaded);   

//////////////////////////all global onready 

//calnvel ancher # and replace it with javascript scroll
   ancherCancelScrolling(); //set on javascript/scrollto.js

//onload clear all after # sign
    if(location.hash.replace('#','') != ''){location.hash = '';};  

//side navigation bar
    $('.sidenav').sidenav({edge: 'right', menuWidth: 150, outDuration:300, onCloseStart: function(){logoutLink('#logoff_nav'); $('#sidenav_form').trigger('reset');}});
    $('.sidenav li').click(() => {    $('.sidenav').sidenav('close');});
    $('li.dontclose').off('click');
    // https://mdbootstrap.com/docs/jquery/navigation/sidenav/
    // https://materializecss.com/sidenav.html
 
    
    //active modal area
$('.image_modalqr').modal({onOpenEnd: function() {
   if(!isMobileOrTablet()){  $('.modal button').focus();}
                    }, preventScrolling:true}); 

$('.image_modalimage').modal({onOpenEnd: function() {
    if(!isMobileOrTablet()){ $('.modal  button').focus();}                       
                }, preventScrolling:true});

$('.userarea_modal').modal({onOpenEnd: function() {
}, preventScrolling:true , endingTop: '5%'});

    //dissable send by pressing enter key
$('input').keydown(function(event){if(event.keyCode == 13) {event.preventDefault();return false;}});


//all required javascript onready functions activate
    js_onready_item_searchActivate();
    js_onready_customer_searchActivate();
    js_user_anyuser_onreadyActivate();
<?php if($permission>=2): ?>
    js_onready_customerActivate();
    js_onready_itemActivate();
<?php endif; ?>   
<?php if($permission>=3): ?>
    js_onready_orderActivate();
<?php endif; ?>   
<?php if($permission>=4): ?>
    js_onready_storageActivate();
<?php endif; ?>   
<?php if($permission>=5): ?> 
    js_user_manager_onreadyActivate();
<?php endif; ?> 
    
});//  
//end after loading onready scripts
//  
    
    
 // materialize tabs set variables   
        <?php if($permission>=2):  //manage users ?>   
var el_item = document.querySelector('.itemtabs'); //tabs item add/edit initiete
var instance_item = ''; //activate inside js_onready_item.js
var el_customer =document.querySelector('.customertabs'); //tabs customer add/edit initiete
var instance_customer = ''; //activate inside js_onready_customer.js
        <?php endif; //item and customer ?>
        <?php if($permission>=3): //order ?>
var el_order =document.querySelector('.ordertabs'); //tabs ordertabs add/edit initiete
var instance_order = ''; //activate inside js_onready_order.js
		<?php endif; //order ?>
		<?php if($permission>=5): //user ?>
var el_user = document.querySelector('.usertabs'); //tabs usertabs add/edit initiete
var instance_user = ''; //activate inside js_user.js*
		<?php endif; //user ?>
</script>



<?php //all required javascript onready functions

$randomValue_scriptLoad = time();
 
    //javascript tag with random number for reload
function javascript($path){global $randomValue_scriptLoad; echo '<script src="'.$path.'?'.$randomValue_scriptLoad.'"></script>';}

//for development proccesedure
   //  function javascript($path){echo '<script>';require($path);echo '</script>';}


    javascript('item/js_onready_item_search.js');
    javascript('customer/js_onready_customer_search.js');
    javascript('user/js_user_anyuser_onready.js');
if($permission>=2){
    javascript('customer/js_onready_customer.js');
    javascript('item/js_onready_item.js');}
if($permission>=3){
    javascript('order/js_onready_order.js');}
if($permission>=4){
    javascript('storage/js_onready_storage.js');}
if($permission>=5){
    javascript('user/js_user_manager_onready.js');} 
//end onready functions 




//////////////////////////all page functuins
//all required javascript functions
    javascript('javascript/global.js');
    javascript('javascript/database.js'); //all json database basic request functions
    javascript('javascript/image.js');
    javascript('javascript/imask.js');//all imask for input fields
    javascript('javascript/matching.js'); //all matching test for input fields
    javascript('javascript/replace.js');
    javascript('javascript/qrscanner.js');
        //all page areas set, reset, database, onready functions
    javascript('item/js_item_search.js');
    javascript('item/js_item_search_carousel.js');
    javascript('customer/js_customer_search.js');
    javascript('user/js_user_anyuser.js');

//require('javascript/tabs.php'); //set the tab permission inside

if($permission>=2){
    javascript('customer/js_customer_add.js');
    javascript('customer/js_customer_edit.js');}

if($permission>=2){
    javascript('item/js_item_add.js');
    javascript('item/js_item_edit.js');}

if($permission>=3){
    javascript('order/js_order_itemadd.js');
    javascript('order/js_order_itemarea.js');
    javascript('order/js_order_manage.js');
    javascript('order/js_order_open.js');}

if($permission>=4){
    javascript('storage/js_storage_edit.js');}

if($permission>=5){
    javascript('user/js_user_manager.js');} 

//php ends
