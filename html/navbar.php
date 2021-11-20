
<header class="navigation">

    <nav class="nav-wrapper transparent ">
        <div class="row">
   
        <div class="col s9 m10 l10"> <!-- middle col start//-->    
      <div class="container">
     
                <div class="right _logo_ valign-wrapper" style="height:75px;">
                    <a href="#" class="brand-logo" >

                    <img src="html/image/navlogo.png" alt="ewmsLogistics" style="width:auto;height:55px;"/>
                    
                    </a>
                </div>

        <ul class="right hide-on-med-and-down" style="margin-right:35px;">
            
                <?php if($permission>=1): ?>
            <li><a href="#" onclick="$('.userarea_modal').modal('open');" class="tooltipped btn-floating btn-small indigo darken-4" data-position="bottom" data-tooltip="ניהול והגדרות"><i class="material-icons">settings</i></a></li>
                <?php endif; //basic  ?>
            
                <?php if($permission>=4): ?> 
        <!--
            <li><a href="#">רכש</a></li>    
        //-->
            <li><a href="#item_search_bar">איתורים ואחסנה</a></li>
                <?php endif; //purchase and storage  ?>
            
                <?php if($permission>=2): ?> 
            <li><a href="#customer_search_bar"><i class="material-icons right">groups</i>לקוחות</a></li>
                <?php endif; //item and customer  ?>
            
                <?php if($permission>=3): ?> 
            <li><a href="#order_bar"><i class="material-icons right">shopping_cart</i> הזמנות</a></li>
                <?php endif; //order ?>
        </ul>
      </div>
            
                </div> <!--End middle col//-->
        <div class="col s1 m1 l1">
                <?php if($permission>=1): ?>
            <a href="#" class="sidenav-trigger" data-target="mobile-menu"><i class="material-icons">menu</i></a> 
                <?php endif; //basic ?>
        </div>
        <div class="col s2 m1 l1"></div> 
            
            
        </div><!--End row//-->  
    </nav>

     
     
                <?php if($permission>=1): ?>
    <!-- sidenav-->
      <!-- a onclick="$(this).hide()" //-->
    <ul dir="rtl" style="width: 250px" class=" sidenav collection fixed" id="mobile-menu">

            <li class="center-align">
               <img src="html/image/sidenavlogo.png" alt="" style="width:100%;height:auto;"/>
            </li>    
        
            <li>
               <span id="sidenavgreetings" style="margin-right: 20px;"></span><span class="nobr"><?php echo $fullname;?></span>
            </li>
        
        
            <li>
                <i class="_side_icon_fix material-icons circle blue right">line_style</i>
                <a href="#itemsearch_top">פריטים והתראות</a> 
            </li>

        
                <?php if($permission>=3): ?> 
            <li>
                <i class="_side_icon_fix material-icons circle blue right">shopping_cart</i>
                <a href="#order_bar">הזמנות</a>
            </li>
                <?php endif; //order ?>

                <?php if($permission>=2): ?> 
            <li>
                <i class="_side_icon_fix material-icons circle blue right">groups</i>
                <a href="#customer_search_bar">לקוחות</a>
            </li>
                <?php endif; //item and customer ?>
        
                <?php if($permission>=4): ?> 
            <li>
                <i class="_side_icon_fix material-icons circle blue right">search</i>
                <a href="#item_search_bar">איתורים ואחסנה</a>
            </li> 
        <!--
            <li>
                <i class="_side_icon_fix material-icons circle blue right">call_made</i>
                <a href="#">רכש</a>
            </li>
        //-->
                <?php endif; //purchase and storage  ?>
        
        
                <?php if($permission>=1): ?>
            <li>
                <i class="_side_icon_fix material-icons circle blue right">settings</i>
                <a href="#" onclick="$('.userarea_modal').modal('open');" >
                    <?php if($permission>=5): ?>ניהול ו<?php endif; //manage  ?>הגדרות</a>
            </li>
                <?php endif; //basic  ?>
        
            <li class="dontclose">  
                <form id="sidenav_form">
                    <span class="switch">
                        <label>
                        <a id="logoff_nav" class="off_logoff">התנתק/י</a>
                         <span class="height-fix">   
                            <input type="checkbox" onclick="logoutLink('#logoff_nav')">
                            <span class="lever blue darken-3"></span>
                        </span> 
                        </label>
                    </span>
                
                </form>
            </li>
            <li>
                <br />
                <br />
                <br />
            </li>
    </ul>
                <?php endif; //basic ?>
  </header>