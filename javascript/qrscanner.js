loaded.javascript.push('qrscanner.js');

//////////////////////////qr camera function

function qrScanner_closeAll(){
    qrScannerItemAdd_close();
    qrScannerCustomerAdd_close();
    qrScannerItemSearch_close();
    qrScannerCustomerSearch_close();
    qrScannerOrderOpen_close();
            }

        // order open qr camera activate and close button onclick
    function qrScannerOrderOpen_close(){
        var area="orderopen";        //!!!
        $('#qrfeedback_'+area+'_start').show();
        $('#qrfeedback_'+area).empty();
        $('#'+'qr_'+area).hide();
        if(typeof html5Qr=='object'){html5Qr.stop();}};


function qrScannerOrderOpen(){ 
    if($('#orderid_orderopen').prop('disabled')!=true ){
    scrollto('#order_bar');
    var area="orderopen";        //!!!
    qrCameraCodeScanner(
        '#qrfeedback_'+area
        , "qr_"+area
        , '#orderid_orderopen'        //!!! inputvalue
        , function(qrCodeMessage, inputvalue){//vvvv !!!! all the area  
            $(inputvalue).val(qrCodeMessage);
            
             if(matching(inputvalue)&&replace(inputvalue)<120000000 ){
           
            databaseCheckOrderRegiseter($(inputvalue).val()); 
            qrScannerOrderOpen_close();
            scrollto('#order_bar');
            }else{$(inputvalue+'_feedback').html('<span class="red-text rtl">נסרק קוד QR שגוי</span>')}
           }
        , 'qrScanner_closeAll();scrollto(\'#order_bar\');'
    );}}


        // customer search qr camera activate and close button onclick
    function qrScannerCustomerSearch_close(){
        var area="customersearch";        //!!!
        $('#qrfeedback_'+area+'_start').show();
        $('#qrfeedback_'+area).empty();
        $('#'+'qr_'+area).hide();
        if(typeof html5Qr=='object'){html5Qr.stop();}};

function qrScannerCustomerSearch(){ 
    scrollto('#customer_search_bar');
    var area="customersearch";        //!!!
    qrCameraCodeScanner(
        '#qrfeedback_'+area
        , "qr_"+area
        , '#customerid_search'        //!!! inputvalue
        , function(qrCodeMessage, inputvalue){//vvvv !!!! all the area
            $(inputvalue).val(qrCodeMessage);
            if(matching(inputvalue)){
            customerSelectValuesSet(qrCodeMessage);
            qrScannerCustomerSearch_close();
            scrollto('#customer_search_bar', -50);
            }else{customerSelectValues_reSet(); $(inputvalue+'_feedback').html('<span class="red-text rtl">נסרק קוד QR שגוי</span>')}
           }
        , 'qrScanner_closeAll()'
    );}




        // item search qr camera activate and close button onclick
    function qrScannerItemSearch_close(){
        var area="itemsearch";        //!!!
        $('#qrfeedback_'+area+'_start').show();
        $('#qrfeedback_'+area).empty();
        $('#'+'qr_'+area).hide();
        if(typeof html5Qr=='object'){html5Qr.stop();}};

function qrScannerItemSearch(){ 
    $('.carousel').hide();
    scrollto('#item_search_bar');
    var area="itemsearch";        //!!!
    qrCameraCodeScanner(
        '#qrfeedback_'+area
        , "qr_"+area
        , '#itemid_search'        //!!! inputvalue
        , function(qrCodeMessage, inputvalue){//vvvv !!!! all the area
            $(inputvalue).val(qrCodeMessage);
            if(matching(inputvalue)){
            itemSelectValuesSet();
            qrScannerItemSearch_close();
            scrollto('#item_search_bar');
            }else{itemSelectValues_reSet();$(inputvalue+'_feedback').html('<span class="red-text rtl">נסרק קוד QR שגוי</span>')}
           }
        , 'qrScanner_closeAll();scrollto(\'#item_search_bar\');'
    );}





        // Customer add qr camera activate and close button onclick
    function qrScannerCustomerAdd_close(){
        var area="customeradd";        //!!!
        $('#qrfeedback_'+area+'_start').show();
        $('#qrfeedback_'+area).empty();
        $('#'+'qr_'+area).hide();
        if(typeof html5Qr=='object'){html5Qr.stop();}};

function qrScannerCustomerAdd(){ 
    var area="customeradd";         //!!!
    qrCameraCodeScanner(
        '#qrfeedback_'+area
        , "qr_"+area
        , '#customeridshown_customeradd'      //!!! inputvalue
        , function(qrCodeMessage, inputvalue){//vvvv !!!! all the area
            $(inputvalue).val(qrCodeMessage);
            if(matching(inputvalue)){
            customerAdd_reset();
            databaseCheckCustomer($(inputvalue).val());
            qrScannerCustomerAdd_close();
            }else{$(inputvalue+'_feedback').html('<span class="red-text rtl">נסרק קוד QR שגוי</span>')}
           }
        , 'qrScanner_closeAll()'
    );}



        // item add qr camera activate and close button onclick
    function qrScannerItemAdd_close(){
        var area="itemadd";        //!!!
        $('#qrfeedback_'+area+'_start').show();
        $('#qrfeedback_'+area).empty();
        $('#'+'qr_'+area).hide();
        if(typeof html5Qr=='object'){html5Qr.stop();}};

function qrScannerItemAdd(){ 
    var area="itemadd";         //!!!
    qrCameraCodeScanner(
        '#qrfeedback_'+area
        , "qr_"+area
        , '#itemidshown_itemadd'      //!!! inputvalue
        , function(qrCodeMessage, inputvalue){//vvvv !!!! all the area
            $(inputvalue).val(qrCodeMessage);
            if(matching(inputvalue)){
            itemAdd_reset();
            databaseCheckItem($(inputvalue).val());
            qrScannerItemAdd_close();
            }else{$(inputvalue+'_feedback').html('<span class="red-text rtl">נסרק קוד QR שגוי</span>')}
           }
        , 'qrScanner_closeAll()'
    );}



//////////////////////////global important functions
        //qr code function, please input out of ready function

function qrCameraCodeScanner(feedbackid, camerafield, inputvalue, successfunction, closefunctionname){
            //first close all the opened functions before running
    qrScanner_closeAll();
    //on develope, camera timeout
    //clearTimeout(qrTimeout);
    //var qrTimeout=setTimeout(function(){qrScanner_closeAll(); }, 10000);
    $('#'+camerafield).show();
    $(feedbackid+'_start').hide();
    $(feedbackid).text('יש לאשר את המצלמה, נא להמתין 5שניות להרצת המצלמה ');
    Html5Qrcode.getCameras().then(devices => {
        if (typeof devices=='object' && devices.length){
      $(feedbackid).html('טוען מצלמה... יש לכוון את מצלמה על הקוד, <span class="blue-text pointer" onclick="'+closefunctionname+'">סגירת המצלמה</span>');  
            //global device number access 
        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
        var cameraId = devices[0].id;  //run the first apple cemera device 
        }else{    
            var cameraId = devices[devices.length-1].id;    //run the last device
                }   
        html5Qr = new Html5Qrcode(camerafield); 
        html5Qr.start(cameraId, {fps: 10, qrbox: 200}
        ,qrCodeMessage => {
            successfunction(qrCodeMessage, inputvalue);
            }).catch(err => {});}
        }).catch(err => { //fail function    
        $(feedbackid).html('<span class="red-text">אין גישה למצלמה בפלאפון</span> <span class="blue-text pointer" onclick="'+closefunctionname+'">סגירת המצלמה</span>');
                        });
       var  html5QrcodeScanner = new Html5QrcodeScanner(
            camerafield, { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(function onScanSuccess(qrCodeMessage) {
                successfunction(qrCodeMessage, inputvalue);
            }, function onScanFailure(error) {});} // end qr cam function
