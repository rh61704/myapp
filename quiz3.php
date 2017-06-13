<?php




require_once 'includes/DB_Functions.php';
    $db = new DB_Functions();
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($con, DB_DATABASE);

//mysqli_set_charset($con,"utf8");
mysqli_query($con,"set names 'utf8'");



$ID8 = $_POST["ID8"];
$ID9 = $_POST["ID9"];
$ID10 = $_POST["ID10"];
$ID11 = $_POST["ID11"];


$long3= $_POST["long3"];
$longnum3 = (int)$long3;

$uid = $_POST["uid"];




if($ID8!=="null"){
  $addsql8 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID8' ";

$addres8 = mysqli_query($con,$addsql8);
if (!$addres8)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID9!=="null"){
  $addsql9 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID9' ";

$addres9 = mysqli_query($con,$addsql9);
if (!$addres9)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID10!=="null"){
  $addsql10 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID10' ";

$addres10 = mysqli_query($con,$addsql10);
if (!$addres10)
  {
    die('Error: ' . mysqli_error());
  }
}

if($ID11!=="null"){
  $addsql11 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID11' ";

$addres11 = mysqli_query($con,$addsql11);
if (!$addres11)
  {
    die('Error: ' . mysqli_error());
  }
}

   $addclick = "UPDATE user SET clickNum = clickNum + '$longnum3' WHERE id = '$uid'";
$click = mysqli_query($con,$addclick);
if (!$addclick)
  {
    die('Error: ' . mysqli_error());
  }




?>