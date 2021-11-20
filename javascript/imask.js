loaded.javascript.push('imask.js');

//////////////////////////matching functions
    //imask to check input value mask
function imask(elementid, maskvalue){ 
    var element = $(elementid)[0];
    var maskOptions = {mask: maskvalue};
    return IMask(element, maskOptions); }

function imaskDate(elementid){ 
    var element = $(elementid)[0];
    var maskOptions = {mask: Date,  
    min: new Date(1900, 0, 1),
    max: new Date(2900, 0, 1),
    lazy: false};
    return IMask(element, maskOptions);     }

function imaskNumber(elementid, maskvalue){ 
    var element = $(elementid)[0];
    var maskOptions = {mask: maskvalue, blocks: {num: {mask: Number,  thousandsSeparator: ',',min:0 ,max: 9999999}}};
    return IMask(element, maskOptions); }
           // https://imask.js.org/guide.html#getting-started
        //https://imask.js.org/

function imaskNumberLimit(elementid, maskvalue, maximumlimit){ 
    var element = $(elementid)[0];
    var maskOptions = {mask: maskvalue, blocks: {num: {mask: Number,  thousandsSeparator: ',',min:0 ,max: maximumlimit}}};
    return IMask(element, maskOptions);}


function onlyEnglishKeys(id){ //use only english+numbers keys inside input
        $(id).keypress(function(event){ //allow only english keys for storage
    var ew = event.which;
    if(ew == 32)
        return true;
    if(48 <= ew && ew <= 57)
        return true;
    if(65 <= ew && ew <= 90)
        return true;
    if(97 <= ew && ew <= 122)
        return true;
    return false;
        });}