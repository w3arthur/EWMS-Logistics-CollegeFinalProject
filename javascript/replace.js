loaded.javascript.push('replace.js');

//////////////////////////replace function


//////////////////////////replace (leave only the numbers out of text) functions
function replace_text(id){ //Easy replacing all the keys, and leave only numbers
    if(($(id).text()).replace(/[^0-9]+/g, '')==''){return 0;}
    return  parseInt(($(id).text()).replace(/[^0-9]+/g, ''), 10);   };

//leave only the numbers out of value
function replace(id){ //Easy replacing all the keys, and leave only numbers
    if(($(id).val()).replace(/[^0-9]+/g, '')==''){return 0;}
    return  parseInt(($(id).val()).replace(/[^0-9]+/g, ''), 10);    };

    //replace string to numbers
function number(string){ //Easy replacing all the keys, and leave only numbers
    if(string.replace(/[^0-9]+/g, '')==''){return 0;}
    return  parseInt(string.replace(/[^0-9]+/g, ''), 10);   };

    //replace 2020-09-10 10:48:59 to 10/09/2020
function dateFix(datevalue){ 
    if(datevalue==null){return '';}
    else{var bits=(datevalue).split(/\D/);
        return bits_date=bits[2]+'/'+bits[1]+'/'+bits[0];}  }


    //replace line break html for textarea from database
function replace_textarea(string){(string).replace(/(?:\\[rn])+/g, "<br />")}
