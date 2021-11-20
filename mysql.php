<?php       require('connect.php');
        //do not forget to close the connection mysqli_close($conn);

//check connection and returning error
    //if(!$conn){echo 'error:' . mysqli_connect_error();}

//fixing encoding error on other servers acceptence like "latin1" instead
    mysqli_set_charset($conn, "utf8");

function pageHTTPSredirect(){//set https, not in localhose or number ip
    if($_SERVER['HTTP_HOST']!='localhost'){
        if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
        $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $location);
        exit;}  };}

        //return mysqli_query
function query($query){global $conn;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){return false;};
    return  mysqli_query($conn, $query);}//returning "true" and array for working with results or acception of sent data approval  

    //return quert results as 3d array ($datas=results($query); $datas[0]["value"];)
function results($query){
$results=query($query);
if($results){
$datas = mysqli_fetch_all($results, MYSQLI_ASSOC);
mysqli_free_result($results); 
    return $datas;}}

        //do updata/delete/insert for query statement
function queryStmt($query, $params, $types=''){global $conn;
    if($types==''){$types = $types ?: str_repeat("s", count($params));}
    $variables=$params;
    $stmt = mysqli_stmt_init($conn);               
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, $types, ...$variables);
        if(!mysqli_stmt_execute($stmt)){return false;}
        if(mysqli_stmt_get_result($stmt)){return mysqli_stmt_fetch($stmt);} //to fix if there is results for select*
        return true;}
    return false;}//returning "true" and array for working with results or acception of sent data approval  

function html($string){
    return htmlspecialchars( $string , ENT_NOQUOTES, "UTF-8") ;}//Securety1://correct echo/prited value for html

function db($string){global $conn;
    return mysqli_real_escape_string($conn, $string);}
            //set correct data to mysql query

function lastAI(){global $conn; //return the last inserted increment number
                 return ($conn -> insert_id);}


function postSet($value){
if(!empty($_POST[$value] )&&postSetEmpty($value) ){
return db($_POST[$value] );}
return false;
}   //all works with post data
// query("...=postSet('value')") 
// postSet('value')=='value2'
// if(postSet('value')){functionName()}

    //set the hashing code for this value
function postSet_hash($value){return password_hash(postSet($value), PASSWORD_DEFAULT);}

function postSetEmpty($value){return isset($_POST[$value]);} //new planning
// set  postSet($value)==str instead valueSetData($value, $dataset) // new planning
    
function postSet_number($value){
  return intval(preg_replace('/[^0-9]+/', '', postSet($value)), 10);  
}//fixing  1,123,123nis to regular number 1123123
//new working method instead valueSet($value)

function getSetEmpty($value){return isset($_GET[$value]);}//can be enpty

function sessionSet($value,$setValue=''){global $conn;
    if($setValue!=''){
    return $_SESSION[$value]=$setValue; }
    if(isset($_SESSION[$value])){ return db($_SESSION[$value]);}
     return false;}











//global variables for image resizer
        $imageresizerHeight = 600;
        $imageresizerSmallerHeight = 260;

// image upload
function imageUpload($imageinputid, $uoloadfolder, $filenamebegin, $quaryimageupload){if(is_array($_FILES)){global $response;
            //update database
        query($quaryimageupload);
        $file = $_FILES[$imageinputid]['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = $filenamebegin; //time(); the best set
        $folderPath = $uoloadfolder;
        $ext = pathinfo($_FILES[$imageinputid]['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        $exif = exif_read_data($_FILES[$imageinputid]['tmp_name']);
        switch ($imageType) {
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                $targetLayer2=imageResize_smaller($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. "."."jpg");
                imagejpeg($targetLayer2,$folderPath. "smaller/" . $fileNewName. "."."jpg");
                correctImageOrientation($file, $folderPath. $fileNewName. "."."jpg" ); //if javascript failed to do so on android only
                correctImageOrientation($file, $folderPath. "smaller/" . $fileNewName. "."."jpg" ); //if javascript failed to do so on android only
                        //remember to delete the smaller version to
                // $imagejpeg($targetLayer2,$folderPath.$fileNewName. "_smaller."."jpg");
                //correctImageOrientation($file, $folderPath .$fileNewName. "_smaller."."jpg" );
                $response = array("value"=>true);
                break;
            default:
                $response = array("value"=>false);
                exit;break; }
            //  echo json_encode($response);
            } else{falseResponseEcho();}}
//image resizer function
function imageResize($imageResourceId,$width,$height) {
   global $imageresizerHeight;
   $imageresizerWidth=$width*($imageresizerHeight/$height);
    if($imageresizerWidth>(2*$imageresizerHeight)){ $imageresizerWidth=$imageresizerHeight;
    $imageresizerHeight=$height*($imageresizerWidth/$width);
        } //too wight giant image
    $targetLayer=imagecreatetruecolor($imageresizerWidth, $imageresizerHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0,0,0,0, $imageresizerWidth, $imageresizerHeight, $width, $height);
    return $targetLayer;
        }  

function imageResize_smaller($imageResourceId,$width,$height) {
    global $imageresizerSmallerHeight;
    $imageresizerHeight=$imageresizerSmallerHeight;
    $imageresizerWidth=$width*($imageresizerHeight/$height);
    if($imageresizerWidth>(2*$imageresizerHeight)){ $imageresizerWidth=$imageresizerHeight;
    $imageresizerHeight=$height*($imageresizerWidth/$width);
        } //too wight giant image
    $targetLayer=imagecreatetruecolor($imageresizerWidth, $imageresizerHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0,0,0,0, $imageresizerWidth, $imageresizerHeight, $width, $height);
    return $targetLayer;
        }  

//image auto flip function
function correctImageOrientation($file, $filename) {
  //global $file;
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($file);
    if($exif && isset($exif['Orientation'])) { $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename); $deg = 0;
        switch ($orientation) { case 3:$deg = 180;break; case 6:$deg = 270;break; case 8:$deg = 90;break;default: $deg = 0;  }
        if ($deg) {$img = imagerotate($img, $deg, 0);} imagejpeg($img, $filename, 95); 
      }}
      
  }}
