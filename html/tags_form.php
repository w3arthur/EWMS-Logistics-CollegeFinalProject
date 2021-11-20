<?php   //HTML TAGS under <form> to repeat

// item type <select>
function itemtype_options($id, $add_classes){echo '
    <label for="'.$id.'">סוג הפריט</label>
    <div class="input-field">
       <select id="'.$id.'" name="'.$id.'" class ="browser-default flow-text rtl"> 
<option value = "global" selected="selected">כללי</option>
<option value = "datelimit">בעל תוקף</option>
<option value = "nufunction">לא תקין</option>
<option value = "registration">רישום על המשאיל</option>
<option value = "returnable">ניתן להחזיר</option>
<option value = "waranty">בעל אחריות</option>  
        </select>
        <i  class="material-icons prefix '.$add_classes.'">alarm_add</i>
    </div>
';}//end echo  

// item category <select>
function itemcategory_options($id, $add_classes){echo '
     <label for="'.$id.'">קטגוריית הפריט</label>
    <div class="input-field">
       <select id="'.$id.'" name="'.$id.'" class ="browser-default flow-text rtl"> 
<option value = "global" selected="selected">כללי</option>
<option value = "electricity">מוצרי חשמל</option>
<option value = "meatproduct">מוצרי בשר</option>
<option value = "musicinstrument">כלי נגינה</option>
        </select>      
        <i class="material-icons prefix '.$add_classes.'">add_shopping_cart</i>
    </div>        
';}//end echo  

// <button>
function button($id, $buttonname, $attribute, $materializeicon, $type='button'){echo '
     <button type="'.$type.'" class="btn waves-effect waves-light valign-wrapper right" '.$attribute.' id="'.$id.'" >'.$buttonname.'<i class="material-icons" >'.$materializeicon.'</i></button>  
';}//end echo  
    //<button> with feature to activate form onclick Enter
function button_send($id, $buttonname, $attribute, $materializeicon){ button($id, $buttonname, $attribute, $materializeicon, 'submit');}//end echo  


// <input>

function input_order_item($inputid, $inputname, $lablevalue, $materializeicon, $pattern,  $pattern_message, $add_classes, $add_internalclass){
input_text_extended($inputid, $inputid, $inputname, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="text" inputmode="numeric"', $add_classes, $add_internalclass , '','');}


    // type="number" making problems with imask that not numeric!
function input_number($inputid, $lablevalue, $materializeicon, $pattern,  $pattern_message, $add_classes, $add_internalclass, $additionValues=''){
input_text_extended($inputid, $inputid, $inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="text" inputmode="numeric" lang="en" '.$additionValues.'', $add_classes, $add_internalclass , '','');}
    // type="text"
function input_text($inputid, $lablevalue, $materializeicon, $pattern,  $pattern_message, $add_classes, $add_internalclass, $additionValues=''){
input_text_extended($inputid, $inputid, $inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="text" '.$additionValues.'', $add_classes, $add_internalclass , '','');}
    // type="password"
function input_password($inputid, $lablevalue, $materializeicon, $pattern,  $pattern_message, $add_classes, $add_internalclass){
input_text_extended($inputid, $inputid, $inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="password"', $add_classes, $add_internalclass , '','');}
/*
function input_password_nomessage($inputid, $lablevalue, $materializeicon, $pattern,  $pattern_message, $add_classes, $add_internalclass){
input_text_extended($inputid, $inputid, $inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="text" style="-webkit-text-security:disc;"', $add_classes, $add_internalclass , '','');}
*/
    // type="text" with qrcode reader link


function input_text_qr($inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, $qrfunction, $add_classes, $add_internalclass){
input_text_extended($inputid, $inputid, $inputid, $lablevalue, $materializeicon, $pattern, $pattern_message, 'type="text" inputmode="numeric"', 'blue-text pointer '.$add_classes, $add_internalclass, 'onclick="'.$qrfunction.'"', '');}

//<input> field
function input_text_extended($inputid, $inputforid, $inputname, $lablevalue, $materializeicon, $pattern, $pattern_message, $inputtypearea, $add_classes, $add_internalclass, $add_function, $ancerfunction){echo '
<div class="input-field">
    <input '.$inputtypearea.' id="'.$inputid.'" name="'.$inputname.'" title="'.$pattern_message.'"  class="validate flow-text '.$add_internalclass.'" pattern="'.$pattern.'" autocomplete="off" placeholder="'.$lablevalue.'"  />
    <label '.(!empty($inputforid)?'for="'.$inputforid.'"':'').'>'.$lablevalue.'</label>
    '.(($ancerfunction!='')?('<a '.$ancerfunction.'>'):('')).'<i  style="z-index:1" class="material-icons prefix '.$add_classes.'" '.$add_function.'>'.$materializeicon.'</i>'.(($ancerfunction!='')?('</a>'):('')).'
</div>                     
<div id="'.$inputid.'_feedback" class="red-text rtl"></div>

';}//end echo  





        //<textarea> field
function input_textarea($inputid, $lablevalue, $materializeicon, $add_classes){ echo '
<div class="input-field">
    <textarea id="'.$inputid.'" name="'.$inputid.'"  class="materialize-textarea flow-text right-align rtl" cols="20" rows="20" placeholder="'.$lablevalue.'"></textarea>
    <label for="'.$inputid.'">'.$lablevalue.'</label>
    <i class="material-icons prefix '.$add_classes.'">'.$materializeicon.'</i>
</div>  
';}//end echo  

        //<input> type="file" for image upload
function imagearea($imageinputid, $onclickdeletefunction, $uploadbackground){echo '
    <!-- image upload form input//-->
    <div style="width:100%; min-width:50px; max-width:400px;">
        <div style=" border-radius:1%;position:relative; bottom:10px; min-width:150px; min-height:222px; width:100%; height:auto;" class="file-field input-field" id="'.$uploadbackground.'" >  
            <div class="transparent btn-large waves-effect" style="min-height:222px; width:100%; ">
                <div style="position: relative;top:20px;">
                    <br /><br /><br />
                    <div>
                    <i class="camera_icon material-icons " style="font-size: 4em;opacity: 0.9;border-radius:10%;">camera_alt</i>
                    </div>
                   <lable for="'.$imageinputid.'" class="black-text transparent" style="opacity: 0.9; font-weight: 500;position: relative;bottom:30px;">עדכון תמונה</lable> 
                </div> 
                <input id="'.$imageinputid.'" name="'.$imageinputid.'" type="file" onchange="uploadPhotos()" accept="image/*" capture="user" style=""  />
            <div class="file-path-wrapper"> <div class="file-path-wrapper"><input id="'.$imageinputid.'_file" name="'.$imageinputid.'_file" class="file-path validate" type="text" style="display: none;" /></div></div>
        </div><div style="width:80%;" class="center-align" >
            <div id="'.$uploadbackground.'_modalimage" class="btn camera_subicon  valign-wrapper   z-depth-1 right" >
                <i class="material-icons small " >search</i> </div>
            <div  onclick="'.$onclickdeletefunction.'" class="btn  camera_subicon valign-wrapper  z-depth-1 right"
                style="position: relative;bottom:0px;right:10px;">
                <i class="material-icons small" >delete</i></div></div></div>     
        </div><br />
    <div style="width:60%;" class="right"><div class="blue-text pointer rtl" id="'.$uploadbackground.'_modalqr">הצגQRcode</div></div>
';}//end echo  


