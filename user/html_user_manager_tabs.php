        <!-- user tabs -->
        <ul class="row tabs usertabs" id="usertabs" style="overflow: hidden;width:100%">
          <li class="tab col s6">
            <a href="#usermanage" onclick="qrScanner_closeAll()" class="active tab_sub  indigo-text text-darken-4 flow-text">ניהול משתמשים</a>
          </li>
          <li class="tab col s6">
            <a href="#usersettings" onclick="qrScanner_closeAll()" class="tab_sub indigo-text text-darken-4 flow-text">הגדרות אישיות</a>
          </li>
        </ul>
        <div id="usersettings" class="col s12">

            
                        <?php row3cols_start(8,6); ?><div>
                        <!-- page row start//-->  
            
             <?php require('html_user_manager_settings.php'); ?>   
            
                         </div><?php row3cols_end(8,6); ?>
                        <!-- page row end//-->           
            
            
        </div>
        <div id="usermanage" class="col s12">
            
                        <?php row3cols_start(8,6); ?><div>
                        <!-- page row start//-->  
                        
            <?php require('html_user_manage.php'); ?>   
            
                         </div><?php row3cols_end(8,6); ?>
                        <!-- page row end//-->           
            
        </div>
     