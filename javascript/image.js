loaded.javascript.push('image.js');

      //return random number of time
function time(){return (new Date().getTime());}

var time_now=time(); //once set random value of time

//////////////////////////model display specific image functions
function imageShow(id, folder){
    if(id!=''){
        $('#image_image').attr('src', folder+id+'.jpg?'+time() );
        $('.image_modalimage').modal('open');   }   }

function qrImageShow(id){
    if(id!=''){
        $('#image_qrcode').attr('src', 'https://chart.googleapis.com/chart?cht=qr&chl='+id+'&chs=400x400&choe=UTF-8&chld=L|2');
        $('.image_modalqr').modal('open');  }   }

    // image areas set
function imageSetValue_search(uploadedbackgroundid, itemuploadfolder, idfield, imageIsAvailable='true'){
       if(imageIsAvailable=='true') {
$(uploadedbackgroundid).attr('src',itemuploadfolder+'smaller/'+idfield+'.jpg?'+time_now)
    .off('click').click(function(){
    imageShow(idfield, itemuploadfolder);});
                } else{
    $(uploadedbackgroundid).attr('src',' ').off('click');} 
 $(uploadedbackgroundid+'_qrcode').attr('src','https://chart.googleapis.com/chart?cht=qr&chl='+idfield+'&chs=400x400&choe=UTF-8&chld=L|2').click(function(){
        qrImageShow(idfield);}
                ); }

    // image areas reset   imageValueReset_searchItem('#image_itemsearch') 
function imageValueReset_searchItem(uploadedimageareaid){
 $(uploadedimageareaid+'_qrcode').off('click').attr('src','https://chart.googleapis.com/chart?cht=qr&chl=0-000-00000&chs=400x400&choe=UTF-8&chld=L|2');
    $(uploadedimageareaid).off('click').attr('src','html/image/item.png');  }

    // image areas reset   imageValueReset_searchitem('#             ') 
function imageValueReset_searchCustomer(uploadedimageareaid){
 $(uploadedimageareaid+'_qrcode').off('click').attr('src','https://chart.googleapis.com/chart?cht=qr&chl=00-0000&chs=400x400&choe=UTF-8&chld=L|2');
    $(uploadedimageareaid).off('click').attr('src','html/image/person.svg');    }

    //image set area apply (globalbackground, magnify, qrcode)
function imageSetValue(uploadedbackgroundid, itemuploadfolder, idfield, imageIsAvailable='true'){
       if(imageIsAvailable=='true') {
            $(uploadedbackgroundid).css({'background' : ' no-repeat url('+itemuploadfolder+idfield+'.jpg?'+time()+') local center/100% 100% '});
            $(uploadedbackgroundid+'_modalimage').off('click').click(function(){
                    imageShow(idfield, itemuploadfolder);}  );
                } else{
            $(uploadedbackgroundid).css({'background' : ' no-repeat url( ) local center/100% 100% '});       
            $(uploadedbackgroundid+'_modalimage').off('click'); 
                        } 
            $(uploadedbackgroundid+'_modalqr').click(function(){
                qrImageShow(idfield);}  ); }

    // image areas reset
function imageValueReset(imagefeedbackareaid, uploadedimageareaid,  imageformid){$(uploadedimageareaid+'_modalqr').off('click');
    imageValueReset_imageOnly(imagefeedbackareaid, uploadedimageareaid,  imageformid);}

function imageValueReset_imageOnly(imagefeedbackareaid, uploadedimageareaid,  imageformid){
    $(uploadedimageareaid).css({'background' : ' no-repeat url( ) local center/100% 100% '});
    $(imageformid).trigger("reset");
    $(uploadedimageareaid+'_modalimage').off('click');
    $(imagefeedbackareaid).empty();}

//////////////////////////database functions image
    //ajax sending all the form values incluad image and upload
    //files returning one true/false value from quary value if exist 
            //image upload query
function onchange_sendImageFile(postvalue, postnameid,uploadfeedback, uploadedbackgroundid, itemuploadfolder){
        //active event resize if image ischange
           //active event submit if area of image ischange
    $(document).off('imageResized');   
    $(document).on('imageResized',function(event) {
        var data = new FormData();  //$("form[id*='global_data']")[0]
        //data.append(cheking_object_value);
        if (event.blob && event.url) {
            $(uploadfeedback).text('מעלה תמונה');
             data.append('image', event.blob);
             data.append(postvalue, postnameid); //$('#itemid_itemedit').val()

   databaseImageUpload(data
    , uploadfeedback 
    , function(){
            setTimeout(function(){
        time_now=time(); //carousel time set for item reload from cache
        imageSetValue (uploadedbackgroundid, itemuploadfolder, postnameid);
            }, 100);    } 
    , 'התמונה עודכנה' ,'התמונה לא עודכנה');         
            }});}

      //image resize function
        //first run event onchange="uploadPhotos()" then $(document).on("imageResized", function (event) {
function uploadPhotos(){ //url            
    var file = event.target.files[0];// Read in file 0
    if(file.type.match(/image.*/)) {// Ensure it's an image
        //external function that set the mobile orientation
     EXIF.getData(file, function () {var orientation=this.exifdata.Orientation;   //first set screen orientation for flip the image
           //if mobile not apple dont se orientation                  
      if(!isApple_MobileOrTablet()){orientation=1;}
        var reader = new FileReader();// Load the image
        reader.onload = function (readerEvent) {
            var image = new Image();
            image.onload = function (imageEvent) {
                var canvas = document.createElement('canvas');
                var width = image.width;
                var height = image.height;
                // Resize the image
                var max_size = 600;
                // max_width  TODO : pull max size from a site config
                var ctx=canvas.getContext('2d');
                    //resize math
                if (width > height) {if (width > max_size) {height *= max_size / width;width = max_size;}
                }else{if (height > max_size) {width *= max_size / height;height = max_size;}}
                canvas.width = width;
                canvas.height = height;
                    //image flip variables
                var width  = canvas.width;  
                var height = canvas.height; 
                    // set proper canvas dimensions before transform & export
                //replace betwin height, width for 5-8 possitions
                if (4 < orientation && orientation < 9) { canvas.width = height; canvas.height = width;
                } else {canvas.width = width; canvas.height = height;    }
                    // transform context before drawing image
                switch (orientation) {  //actually flip the image for apple devices 2-8 possition
                  case 2: ctx.transform(-1, 0, 0, 1, width, 0); break;
                  case 3: ctx.transform(-1, 0, 0, -1, width, height); break;
                  case 4: ctx.transform(1, 0, 0, -1, 0, height); break;
                  case 5: ctx.transform(0, 1, 1, 0, 0, 0); break;
                  case 6: ctx.transform(0, 1, -1, 0, height, 0); break;
                  case 7: ctx.transform(0, -1, -1, 0, height, width); break;
                  case 8: ctx.transform(0, -1, 1, 0, 0, width); break;
                  default: break;   }
                    // draw the image 
                ctx.drawImage(image,0,0, width, height);
                var dataUrl = canvas.toDataURL('image/jpeg');
                var resizedImage = dataURLToBlob(dataUrl);
                $.event.trigger({type: "imageResized", blob: resizedImage, url: dataUrl});}
            image.src = readerEvent.target.result;}
        reader.readAsDataURL(file);
                        });}};

  //Utility function to convert a canvas to a BLOB
function dataURLToBlob(dataURL) {
    var BASE64_MARKER = ';base64,';
    if (dataURL.indexOf(BASE64_MARKER) == -1) {
        var parts = dataURL.split(',');
        var contentType = parts[0].split(':')[1];
        var raw = parts[1];
        return new Blob([raw], {type: contentType});}
    var parts = dataURL.split(BASE64_MARKER);
    var contentType = parts[0].split(':')[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;
    var uInt8Array = new Uint8Array(rawLength);
    for (var i = 0; i < rawLength; ++i) {uInt8Array[i] = raw.charCodeAt(i);}
    return new Blob([uInt8Array], {type: contentType});}
    // End Utility function to convert a canvas to a BLOB   