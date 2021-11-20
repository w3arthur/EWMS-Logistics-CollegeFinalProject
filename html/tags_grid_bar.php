<?php 

//bar
function bar($barId, $barTitle, $icon='user'){echo'
 <nav '. (!empty($barId)?( 'id="'. $barId).'"':'') .' class="valign-wrapper logo" style="max-height:50px;z-index:2;">
         <h5 style="width:100%;margin-top:50px" class="center-align"><a href="#'.$barId.'" class=""> <i class="fa fa-'.$icon.'"></i> '.$barTitle.'</a></h5>
    </nav> 
 
';}
// <div id="'.$barId.'_start"></div>

//function bar_end($barId, $barTitle=''){echo'<div id="'.$barId.'_end"></div>';}





//HTML TAGS to repeat
        //Materialize Grid area, Centralize one middle col
//  [ | x | ]
function row3cols_start($middlewidth_small, $middlewidth_large){
    $side_small= (12-$middlewidth_small)/2;
    $side_large= (12-$middlewidth_large)/2;
    echo '
        <div class="row">
        <div class="col s'.$side_small.' l'.$side_large.' "></div> 
        <div class="col s'.$middlewidth_small.' l'.$middlewidth_large.' white"> <!-- middle col start//-->       
            ';}
function row3cols_end($middlewidth_small, $middlewidth_large){
    $side_small= (12-$middlewidth_small)/2;
    $side_large= (12-$middlewidth_large)/2;
    echo '
        </div> <!--End middle col//-->
        <div class="col s'.$side_small.' l'.$side_large.' "></div>
        </div><!--End row//-->        
            ';}


// [ x | y ] large 
//[  x  ] [  y  ] small
function row2colslarge_start(){echo '
       <div class="row"><!-- row start//-->
        <div class="col s12 m6"> 
';}

function row2colslarge_middle(){echo '
        </div>
        <div class="col s12 m6">
';}

function row2colslarge_end(){echo '
        </div> 
        </div><!-- row end//-->
';}

// [ x | y ]  
function row2cols_start($rightside){
            $leftside=12-$rightside;
    echo '
       <div class="row"><!-- row start//-->
        <div class="col s'.$leftside.'"> 
';}

function row2cols_middle($rightside){echo '
        </div>
        <div class="col s'.$rightside.' ">
';}

function row2cols_end($rightside){echo '
        </div> 
        </div><!-- row end//-->
';}


