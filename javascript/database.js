loaded.javascript.push('database.js');

//////////////////////////database functions

const ajaxFile='ajax.php';  //global ajax file for database sending functions

function phpFastTestingLog(){$.post( ajaxFile,{ajaxtest:' '},function(data) { console.log('php, mysql, ajax test:');console.log(data);});}

function windowExit(){window.location.href = '..';}

             //ajax sending all the form values returning one true/false value from quary value if exist
                //true feedback query
    function  databaseSendForm(formData, feedbackid, externalfunction, truemessage, falsemessage, falsefunction=function(){}){
            
        var formValue='';
       if(typeof formData === 'string'){
           formValue= $(formData).serializeArray(); 
       }else if(typeof formData === 'object'){formValue= formData;}
        
        if(formValue!=''){
        console.log('database_form_post:');
        console.log(formValue);
     databaseLoadData_general(formValue, feedbackid, externalfunction, 'blue', truemessage, 'red', falsemessage, falsefunction);  }}


    function  databaseSendForm_classified(formid, feedbackid, externalfunction, truemessage, falsemessage, falsefunction=function(){}){
            console.log('database_form_post:');console.log('(classified data)');
     databaseLoadData_general($(formid).serializeArray(), feedbackid, externalfunction, 'blue', truemessage, 'red', falsemessage, falsefunction);  }


                //ajax returning one true/false value from quary value if exist  
                            //same as databaseSendForm but replacing the order, true returning as red color, and the first function belong to true,
                            // if the order/item/customer/user returning true it means that he exists
                    //false feedback query
    function  databaseCheck(formid, cheking_object_value, feedbackid, truemessage, falsemessage, externalfunction = function(){}){
            console.log('database_check_post:');console.log(cheking_object_value);
      databaseLoadData_general(cheking_object_value, feedbackid, function(){}, 'red', truemessage, 'blue', falsemessage, externalfunction);  }


    function  databaseCheck_classified(formid, cheking_object_value, feedbackid, truemessage, falsemessage, externalfunction = function(){}){
        console.log('database_check_post:');console.log('(classified data)');
      databaseLoadData_general(cheking_object_value, feedbackid, function(){}, 'red', truemessage, 'blue', falsemessage, externalfunction);  }


              //ajax returning one true/false value from quary value  and returning all it values + if value:true exist 
                    //true feedback query



    //global database function
function  databaseLoadData_general(cheking_object_value, feedbackid, externalfunction = function(){}, trueColor, truemessage, falseColor, falsemessage, falsefunction=function(){}){
    if(feedbackid!=''&&feedbackid!='#'){$(feedbackid).empty();}
    $.post(
        ajaxFile
        ,cheking_object_value
        ,function(data) {
        var ojson='';
        if(data){
            try { ojson=JSON.parse(data);
            } catch (e) { console.log('database_got error:'); console.log(data);}
           ojson=JSON.parse(data);  } 
        if(typeof ojson=='object'){
            console.log('database_got:');
            console.log(ojson);  
            if(ojson.value&&ojson.value===true){
               externalfunction(ojson); 
               if(feedbackid!=''&&feedbackid!='#'&&truemessage!=''){
                 $(feedbackid).html('<span class="'+trueColor+'-text">'+truemessage)+'</spae>';}
            }else if(ojson.value===false){     
                falsefunction();
                if((feedbackid!=''&&feedbackid!='#')&&falsemessage!=''){$(feedbackid).html('<span class="'+falseColor+'-text">'+falsemessage+'</spae>');}  
            }else if(ojson.value=='logout'){windowExit()}
            
        }
        }).fail(function() {$(feedbackid).html('<span class="red-text">קיימת שגיאה בחיבור מול מסד הנתונים</span>');});}


    //autocomplete
function databaseAutocompleteSet_classified(id, minimumLength, datavalue, beforefunction, successfunction, selectfunction){
    databaseAutocompleteSet(id, minimumLength, datavalue, beforefunction, successfunction, selectfunction, true)
}


function databaseAutocompleteSet(id, minimumLength, datavalue, beforefunction, successfunction, selectfunction,classified=false){               
    $( id )
    .on('dblclick',function(){ if (this.value != ''){ $(this).autocomplete("search");}})
    .autocomplete({source: function( request, response ) {
        console.log('database_autocomplete_post:');
        if(classified==true){console.log('(classified data)');}
        else{console.log(datavalue(request) );}
        
        beforefunction();    
        $.ajax({url: ajaxFile
        ,type: 'post' ,dataType: "json"
        ,data: datavalue(request)
        ,success: function( data ) {
            console.log('database_autocomplete_post got:');
            if(typeof data==='object'&&data.value&&data.value=='logout'){windowExit();}
            if(classified==true){console.log('(classified data)');}
            else{console.log(data);}
            
            successfunction(data, response);
        }});}
        ,select: function (event, ui) {
            selectfunction(ui);
            return false;   } 
        ,minLength: minimumLength   });   }


    //image upload
function  databaseImageUpload(cheking_data_value, feedbackid, externalfunction = function(){}, truemessage, falsemessage){
    if(feedbackid!=''&&feedbackid!='#'){$(feedbackid).empty();}
    console.log('database_post:');
    console.log(cheking_data_value);
    $.ajax({type: 'POST', url: ajaxFile 
    , data: cheking_data_value
    , cache: false, contentType: false, processData: false
    ,success: function(data) {
        if(data){var ojson=JSON.parse(data);}  
        if(typeof ojson=='object'){
            console.log('database_got:');
            console.log(ojson);
            if(typeof ojson==='object'&&ojson.value&&ojson.value=='logout'){windowExit()}
            if(ojson.value&&ojson.value===true){
               externalfunction(ojson);
               if(feedbackid!=''&&feedbackid!='#'&&truemessage!=''){
                 $(feedbackid).html('<span class="blue-text">'+truemessage+'</span>');}
            }else if(ojson.value===false){     
                falsefunction();
                if(feedbackid!=''&&feedbackid!='#'&&falsemessage!=''){$(feedbackid).html('<span class="blue-text">'+falsemessage+'</span>');}  } 
        }else{console.log('database_got: '+data);}
        }    }  );  }
