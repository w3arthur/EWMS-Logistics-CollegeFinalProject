loaded.item.push('js_item_search_carousel.js');                    

function caroselActivate(data){ //for item search area
            qrScanner_closeAll();
            $('#qrfeedback_itemsearch_start').hide()
            $('.carousel').empty();
            if(data.length==1&&data[0].value===""){
                $('.carousel').append('<a href="#" class="carousel-item active">אין תוצאות</a>');   
            }else{
                for(var i=0;i< data.length;i++) {
                    if(data[i].go==false){break;}
  var onclickValueSet=`
$('#itemid_search').val('${data[i].id}');
itemSelectValuesSet_backToTop('${data[i].id}');
`; 
              
$('.carousel').append(`<div class="carousel-item active"><a href="#"  onclick="${onclickValueSet}">
<span>${
    
    ' l<span class="nobr">'
    +(data[i].storage==null?'':data[i].storage)     
    +'</span>l <span class="nobr">' 
    +data[i].id
    +'</span> '}<br / >
<div class="rtl" style=" text-overflow: ellipsis;white-space: nowrap;
  overflow: hidden;">${data[i].name}</div>

 ${data[i].pcs}${data[i].quantity} ${data[i].price}&#8362;<br / >

</span></a>
<img src="${((data[i].image==="true") ? 'item/upload/smaller/'+data[i].id+'.jpg?'+time_now : "html/image/item_noimage.png")}" ondblclick="${onclickValueSet}" onclick="${isMobileOrTablet()===true?onclickValueSet:''}" title="${data[i].label}" />
</div>
`);   }
             
ancherCancelScrolling();    //reset ancher fix for added links
            }//end else
$('#item_search_underbar').hide();       
if ($('.carousel').hasClass('initialized')){slider.removeClass('initialized'); $('.carousel').destroy();}
$('.carousel').carousel({numVisible:5}); 
                    } //end caroselActivate

