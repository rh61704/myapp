<?php




require_once 'includes/DB_Functions.php';
    $db = new DB_Functions();
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($con, DB_DATABASE);

//mysqli_set_charset($con,"utf8");
mysqli_query($con,"set names 'utf8'");



$ID4 = $_POST["ID4"];
$ID5 = $_POST["ID5"];
$ID6 = $_POST["ID6"];
$ID7 = $_POST["ID7"];


$long2= $_POST["long2"];
$longnum2 = (int)$long2;



$uid = $_POST["uid"];




if($ID4!=="null"){
  $addsql4 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID4' ";

$addres4 = mysqli_query($con,$addsql4);
if (!$addres4)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID5!=="null"){
  $addsql5 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID5' ";

$addres5 = mysqli_query($con,$addsql5);
if (!$addres5)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID6!=="null"){
  $addsql6 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID6' ";

$addres6 = mysqli_query($con,$addsql6);
if (!$addres6)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID7!=="null"){
  $addsql7 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID7' ";

$addres7 = mysqli_query($con,$addsql7);
if (!$addres7)
  {
    die('Error: ' . mysqli_error());
  }
}



   $addclick = "UPDATE user SET clickNum = clickNum + '$longnum2' WHERE id = '$uid'";
$click = mysqli_query($con,$addclick);
if (!$addclick)
  {
    die('Error: ' . mysqli_error());
  }




?>