<?php




require_once 'includes/DB_Functions.php';
    $db = new DB_Functions();
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($con, DB_DATABASE);

//mysqli_set_charset($con,"utf8");
mysqli_query($con,"set names 'utf8'");


$ID = $_POST["ID"];
$ID1 = $_POST["ID1"];
$ID2= $_POST["ID2"];
$ID3 = $_POST["ID3"];


$long= $_POST["long"];
$longnum = (int)$long;



$uid = $_POST["uid"];


if($ID!=="null"){
$addsql = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID' ";
$addres = mysqli_query($con,$addsql);
if (!$addres)
  {
    die('Error: ' . mysqli_error());
  }
}
//
if($ID1!=="null"){
  $addsql1 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID1' ";

$addres1 = mysqli_query($con,$addsql1);
if (!$addres1)
  {
    die('Error: ' . mysqli_error());
  }
}
//
if($ID2!=="null"){
  $addsql2 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID2' ";

$addres2 = mysqli_query($con,$addsql2);
if (!$addres2)
  {
    die('Error: ' . mysqli_error());
  }
}
  //
if($ID3!=="null"){
  $addsql3 = "UPDATE tag$uid  INNER JOIN test ON tag$uid.tag_id = test.Tag_Id  SET tag$uid.count = tag$uid.count + '1'  WHERE test.testitem ='$ID3' ";

$addres3 = mysqli_query($con,$addsql3);
if (!$addres3)
  {
    die('Error: ' . mysqli_error());
  }
}



   $addclick = "UPDATE user SET clickNum = clickNum + '$longnum' WHERE id = '$uid'";
$click = mysqli_query($con,$addclick);
if (!$addclick)
  {
    die('Error: ' . mysqli_error());
  }




?>