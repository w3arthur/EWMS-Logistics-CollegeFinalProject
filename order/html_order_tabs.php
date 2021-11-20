        <!-- order add / edit tabs -->
        <ul class="row tabs ordertabs" id="ordertabs" style="overflow: hidden; width:100%">
          <li class="tab col s6">
            <a href="#manageorder" id="manageorder_link" onclick="qrScanner_closeAll();
setTimeout(function(){customerSelectButtonsShow_conditions();itemSelectButtonsShow_conditions();},100)

"  class="active tab_sub indigo-text text-darken-4 flow-text">ניהול הזמנות</a>
          </li>
          <li class="tab col s6">
            <a href="#openorder" id="openorder_link" onclick="qrScanner_closeAll();
                                         
setTimeout(function(){customerSelectButtonsShow_conditions();itemSelectButtonsShow_conditions();},100)
 " class="tab_sub indigo-text text-darken-4 flow-text">יצירת הזמנה</a>
          </li>
        </ul>
<div class="row">
        <div id="openorder" class="col s12">
              
           
  <?php require('html_order_open.php'); ?> 
            
            
            
<br /> 
 <br />   
        </div>
        <div id="manageorder" class="col s12">
          

    <?php require('html_order_manage.php'); ?>            

        </div>
    
</div>  