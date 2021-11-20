 <!-- user settings and manage modal//-->   
<div class="modal userarea_modal" style="display: block;margin: auto; width:100%; min-height:90%;">
<div class="modal-content white " >
    
    <?php bar('','הגדרות משתמש', 'list') ?>  

 			<?php if($permission>=5): ?> 
     <?php require('html_user_manager_tabs.php'); ?> 
 			<?php elseif($permission>=1&&$permission<=4): //not manager ?> 
    
                        <?php row3cols_start(8,6); ?><div>
                        <!-- page row start//-->  
    <?php require('html_anyuser_settings.php'); ?> 
                         </div><?php row3cols_end(8,6); ?>
                        <!-- page row end//-->           
            
    
		    <?php endif;  ?>  
  

    </div>
<div class="modal-footer "><div class="center"><button  type="button" class="modal-close btn orange">סגירה</button></div>
</div></div>