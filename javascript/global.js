
loaded.javascript.push('global.js');


function indexGreetings(){var curHr = (new Date()).getHours();
if (curHr < 6) { return 'לילה טוב'
}else if (curHr < 12) { return 'בוקר טוב'
} else if (curHr < 17) { return 'צהריים טובים'
} else if (curHr < 24) { return 'ערב טוב'
}   return 'לילה טוב'     }
    
    //logout from the user activate link;
function logoutLink(id){
    if(  $(id).hasClass('off_logoff')) { 
    $(id).attr( 'href', '\?login').removeClass('off_logoff');
    }else {$(id).removeAttr('href').addClass('off_logoff');}    }

//cancel <a href="# " and still scrool
        //fix tabs issue that not require scroll
function ancherCancelScrolling(){
$('a[href=""]').off('click').on('click',  function (e) {e.preventDefault();});
$('a[href="#"]').off('click').on('click',  function (e) {e.preventDefault();});
    
$('a[href*="#"]').not('.tab_sub').off('click').on('click',  function (e) {           e.preventDefault();
    if(this.hash!=''&&this.hash!='!'){scrollto(this.hash);
          } }); }

            //scroll to id
function scrollto(id, place=0){
    $('html, body').animate({
    scrollTop: ($(id).offset().top+place)
    },200);}
      
// function pushpin(id){//on develope pushpin
// $(id).pushpin({top: $(id+'_start').offset().top,bottom: $(id+'_end').offset().top   });   } 

function isMobileOrTablet() {
 if (navigator.userAgent.match(/Android/i)
  || navigator.userAgent.match(/webOS/i)
  || navigator.userAgent.match(/iPhone/i)
  || navigator.userAgent.match(/iPad/i)
  || navigator.userAgent.match(/iPod/i)
  || navigator.userAgent.match(/BlackBerry/i)
  || navigator.userAgent.match(/Windows Phone/i)
    ) {return true;}else {return false;}  }

function isApple_MobileOrTablet() {
 if (navigator.userAgent.match(/webOS/i)
  || navigator.userAgent.match(/iPhone/i)
  || navigator.userAgent.match(/iPad/i)
  || navigator.userAgent.match(/iPod/i)
    ) {return true;}else {return false;}  }
       