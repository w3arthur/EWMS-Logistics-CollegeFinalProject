        <!-- item add / edit tabs -->
        <ul class="row tabs itemtabs" id="itemtabs" style="overflow: hidden;width:100%">
          <li class="tab col s6">
            <a href="#edititem" onclick="qrScanner_closeAll()" class="tab_sub  indigo-text text-darken-4 flow-text">עריכת פריט</a>
          </li>
          <li class="tab col s6">
            <a href="#additem" onclick="qrScanner_closeAll()" class="active tab_sub indigo-text text-darken-4 flow-text">הוספת פריט</a>
          </li>
        </ul>
        <div id="additem" class="col s12">

            
                        <?php row3cols_start(8,6); ?><div>
                        <!-- page row start//-->  
            
             <?php require('html_item_add.php'); ?>   
            
                         </div><?php row3cols_end(8,6); ?>
                        <!-- page row end//-->           
            
            
        </div>
        <div id="edititem" class="col s12">
            
            <?php require('html_item_edit.php'); ?>   

        </div>
     