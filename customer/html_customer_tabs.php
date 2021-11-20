        <!-- item add / edit tabs -->
        <ul class="row tabs customertabs" id="customertabs" style="overflow: hidden; width:100%">
          <li class="tab col s6">
            <a href="#editcustomer" onclick="qrScanner_closeAll()" class="tab_sub indigo-text text-darken-4 flow-text">עריכת לקוח</a>
          </li>
          <li class="tab col s6">
            <a href="#addcustomer" onclick="qrScanner_closeAll()" class="active tab_sub indigo-text text-darken-4 flow-text">הוספת לקוח</a>
          </li>
        </ul>
        <div id="addcustomer" class="col s12">

            
 
             <?php require('customer/html_customer_add.php'); ?>   
            
    
            
            
        </div>
        <div id="editcustomer" class="col s12">
            
            <?php require('customer/html_customer_edit.php'); ?>   

        </div>