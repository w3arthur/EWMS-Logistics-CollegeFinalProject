loaded.javascript.push('matching.js');

    //matching functions for <input> forms using <input> pattern and title as attribute
function matching(id){
    if(!$(id).val().match( new RegExp($(id).attr('pattern')) )){return false;} return true;}

    //matching functions for input forms onblur
function onblur_matchingReturnToFeadbackBox(id, globaclfeedbackid){
    $(id).blur(function(){matchingReturnToFeadbackBox(id, globaclfeedbackid)});
    onkeyup_matching(id, globaclfeedbackid);}


    //matching functions for input forms onkeyup //also empty the global feedback if right
function onkeyup_matching(id, globaclfeedbackid){
        $(id).keyup(function(){
            if(matching(id)){$(id+'_feedback').empty();}
            $(globaclfeedbackid).empty();});}

    //value checking with feedback, if value correct empty the feedback box
function matchingReturnToFeadbackBox(id, globaclfeedbackid){
        if(matching(id)){$(id+'_feedback').empty();}
        else{$(id+'_feedback').text($(id).attr('title'));}}
        //also turn the input to green

    //matching on key up, 
    //if return seccess message for itemid dont check it again 
function onkeyup_matchingReturnFunctionElseKeepCheck(id, addingclassname, externalfunction){
    $(id).keyup(function(){
        if(!$(id).hasClass(addingclassname)){onblur_matchingReturnToFeadbackBox(id);$(id).addClass(addingclassname);}
        if(matching(id)){ // #itemidshown_itemadd 11 character long
            externalfunction();
            $(id).off('blur');
            $(id).removeClass(addingclassname);}});} 
