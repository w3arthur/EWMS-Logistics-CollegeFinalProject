loaded.order.push('js_order_itemarea.js');


function addItem_orderItem_eachFunction(id, id_,orderquantity_id, purchasequantity_id, data, feedbackareaid, totalPriceFunction){
        $(id_+'name').text(data.itemname);
            
        $(id_+'awailablequantity').text(data.quantity);

                        //disable if quantity is 0
        if(data.quantity==0){$(id_+'quantity').val('0').prop( "disabled", true );
        }else{
         $(id_+'quantity').prop( "disabled", false );}

                //quantity events
        $(`${orderquantity_id}, ${purchasequantity_id}`).off('keyup focus click  blur')
            .one('click', function(){$(this).select();})
            .on('blur',function(){$(this).one('click', function(){$(this).select();});})//on(e) click select all area
            .on('keyup', function()
                {$(feedbackareaid).empty();}) //empty feedback area
            .on('keyup',function(){ // calculator on chenge the number

            totalPriceFunction(id_, data, orderquantity_id, purchasequantity_id);   
            });
    
            //run it onece before the event
        totalPriceFunction(id_, data, orderquantity_id, purchasequantity_id);

} //end


function itemArea(itemtype, id, orderid, orderdate, orderai=''){
    
    var itemid=itemtype+id; 
    return `
          <li class="collection-item" id="${itemid}_li" ><form class="send" id="${itemid}_form"  action="ajax.php" method="POST">
          <div class="row orderitems">
              <div class="col s1 itemdecrease_${itemtype}" >
              <span class="pointer" onclick="removeitem_orderItem_${itemtype}('${id}')">
              <i class="material-icons circle red darken-3 white-text">exposure_neg_1</i></span>
              </div>
              
              
              <div class="col s11">
              <div class="title">
                    ${id}
                    <span  class="pointer" onclick="itemSelectValuesSet_backToTop('${id}')"><i class="material-icons circle blue darken-3 white-text">search</i></span>
                <p class="grey-text" id="${itemid}_name" class="rtl"></p>
                </div>


              </div>  
            </div> 
            <div class="row orderitems">
            <div class="col quantityarea s6">

<div class="input-field">
    <input type="text"  autocomplete="off" value="" inputmode="numeric" id="${itemid}_purchasequantity" name="itempurchasequantity_orderitem" title="הקלד/י כמות רכש"  class="validate flow-text center-align rtl" pattern="^.{0,255}$"  />
    <label for="${itemid}_purchasequantity">רכש</label>
    <i style="z-index:1" class="material-icons prefix orderitemicon" >time_to_leave</i>
</div>                     
         
            
<div> 
<span class="nobr">כמות לרכש</span>
</div> 
                
                
                </div> 
            <div class="col quantityarea s6">          

<div class="input-field">
    <input type="text" autocomplete="off" value="" inputmode="numeric" id="${itemid}_quantity" name="itemquantity_orderitem" title="הקלד/י כמות מהמלאי"  class="validate flow-text center-align rtl" pattern="^.{0,255}$"  />
    <label for="${itemid}_quantity">מהמלאי</label>
    <i style="z-index:1" class="material-icons prefix orderitemicon" >done_all</i>
</div>                     


            
<div class="ltr"> 
<span class="nobr">/ </span> <span id="${itemid}_awailablequantity"> </span>
</div>             
         
            </div>   
 
             <div class="col s12 ">
                 עלות כוללת: 
<strong id="${itemid}_pricingforquantity">
    0
                 </strong>
<span id="${itemid}_pricingforquantityfor"> </span>
                </div>
                
            </div>
              

        <input type="hidden" id="${itemid}_orderid" name="orderid_orderitem" value="${orderid}"/> 

        <input type="hidden" name="itemid_orderitem" value="${id}"/>
    
              
        <input type="hidden" name="thisorder_date_orderitem" value="${orderdate}" />

        <input type="hidden" name="ai_orderitem" value="${orderai}" />

        </form></li>

<li id="${itemid}_form_feedback" class="collection-item" style="padding:1px;background-color: #b0bec5;"></li>     
`;}




     function removedItemMessage(itemtype, id, itemid){
         var randomvalue=time();
         return`
<li class="collection-item" id="deleted${randomvalue}">
  
<div class="rtl red-text text-darken-3">
<span  class="pointer" onclick="$('#deleted${randomvalue}').remove()"><i class="material-icons circle red darken-3 white-text">keyboard_arrow_up</i></span>

פריט ${id} הוסר מההזמנה (

<span id="deleted${randomvalue}_orderquantity">${$(itemid+'_quantity').val()}</span>
מהמלאי ו
<span id="deleted${randomvalue}_purchasequantity">${$(itemid+'_purchasequantity').val()}</span>
מהרכש
)
<br />
<span class="name">${$(itemid+'_name').text()}</span>
<span  class="pointer" onclick="restureitem_orderItem_${itemtype}('${id}', '#deleted${randomvalue}')"><i class="material-icons circle blue darken-3 white-text">redo</i></span>
</div></li>
        `;}