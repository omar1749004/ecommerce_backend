<?php
define("Mb" , 1048576);  //=const

function filtter($requst)
{
  return   htmlspecialchars(strip_tags($_POST[$requst]));

}
function getAllData($table, $where = null, $values = null,$json =true)
{
    global $connect;
    $data = array();
    if($where==null)
    {
        $stmt = $connect->prepare("SELECT  * FROM $table ");
    }
    else{
        $stmt = $connect->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json ==true)
    {
        if ($count > 0){
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
    }
    else{
        if ($count > 0){
            return array("status" => "success", "data" =>$data);
            //$data;
        } else {
            return array("status" => "failure");
            //json_encode(array("status" => "failure"));
        }
    }
    
}
function getData($table, $where = null, $values = null,$json =true)
{
    global $connect;
    $data = array();
    $stmt = $connect->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json ==true)
    {
        if ($count > 0){
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
    }
    else{
        return $count;
    }
    
}
function updateData($table, $data, $where, $json = true)
{
    global $connect;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
     
    $stmt = $connect->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}
function insertData($table, $data, $json = true)
{
    global $connect;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;  //key
    $ins = implode(',', $ins);  //key
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $connect->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
  }
    return $count;
}
function deleteData($table, $where, $json = true)
{
    global $connect;
    $stmt = $connect->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}
function imageUpload( $dir  ,$imageRequst)
{
  global $msgErrore;
  if(isset($_FILES[$imageRequst])){
    $imageName =rand(100,10000) . $_FILES[$imageRequst]["name"];
  $imageTemp =$_FILES[$imageRequst]["tmp_name"];  //المسار الموقت 
  $imageSize =$_FILES[$imageRequst]["size"];
  
  $allowEx   = array("jpg" ,"png" ,"gif" ,"mp3" );
  $strtoarr  = explode("." , $imageName);
  $ex        = end($strtoarr);
  $ex        = strtolower(end($strtoarr)); 
if(!empty($imageRequst) && !in_array($ex,$allowEx))
{
    $msgErrore[] ="Ext";
}
if($imageSize > 2 * Mb)
{
   $msgErrore[] ="Size";
}
if(empty($msgErrore)){
  
  move_uploaded_file($imageTemp, $dir ."/". $imageName);
  return $imageName;
}
else{
  echo "<pre>";
  print_r($msgErrore);
  echo "<pre>";
  return "fail";
}
  }else{
    return "empty" ;
  }
  
}
function deleteFile ($dir,$imageNmae)
{
  if(file_exists($dir ."/". $imageNmae))
  {
    unlink($dir ."/". $imageNmae);
  }
}
function sendEmail($to,$title,$body,)
{
   
    $header = "From: support@omar.com" . "\n" ."CC: omar@gmail.com";   //ثابت
   mail($to,$title,$body,$header);
   echo "success"; 
}


function sendGCM($title, $message, $topic, $pageid, $pagename)
{


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default"

        ),
        'data' => array(
            "pageid" => $pageid,
            "pagename" => $pagename
        )

    );


    $fields = json_encode($fields);
    $headers = array(
        'Authorization: key=' . "AAAACU_s8ZM:APA91bFXNVIsU56HmOpJhhawBD2Td-I0XGu9h82LixlxPXAiAzzsfY7VuM5Jlp5g33HPyReU3tE48mPd_EoYJXWXiHB0WX9sLkU8KB807KlIqQ9gtGS6jmFrPTXDNCCAcu2S-5hhr2vU",
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    return $result;
    curl_close($ch);
}
function insertNotify($title ,$body, $userid,$topic,$pageid,$pageName){
 global $connect ;
 $stmt = $connect->prepare("INSERT INTO `notification`(`notification_title`, `notification_body`, `notification_userid`) VALUES (?, ?, ?)");
 $stmt->execute(array($title ,$body, $userid));
 sendGCM($title , $body ,$topic ,$pageid ,$pageName);
 $count = $stmt->rowCount();
 return $count;
}

// function checkAuthenticate()
// {
//     if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

//         if ($_SERVER['PHP_AUTH_USER'] != "omar" ||  $_SERVER['PHP_AUTH_PW'] != "omar194004"){
//             header('WWW-Authenticate: Basic realm="My Realm"');
//             header('HTTP/1.0 401 Unauthorized');
//             echo 'Page Not Found';
//             exit;
//         }
//     } else {
//         exit;
//     }
//   }
?>