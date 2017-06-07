<?php
 
//creating response 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    
    //including the db operation file
    require_once 'DbOperation.php';
    require_once 'DbConnect.php';
 
    $db = new DbOperation();
    $dbcon =new DbConnect();


    $con= $dbcon->connect();
    
   mysqli_set_charset($con,"utf8");

 


 $ID = $_POST["ID"];



$addsql = "UPDATE Tag  INNER JOIN Relation ON Tag.Tag_Id = Relation.Tag_Id  SET Tag.TagScore = Tag.TagScore + '1'  WHERE Relation.ID ='$ID' ";
$addres = mysqli_query($con,$addsql);
if (!$addres)
  {
    die('Error: ' . mysqli_error());
  }


   $addclick = "UPDATE Item SET ClickNum = ClickNum + '1' ";
$click = mysqli_query($con,$addclick);
if (!$addclick)
  {
    die('Error: ' . mysqli_error());
  }




}

/*$sql = "SELECT TagScore from  Tag INNER JOIN Relation ON Tag.Tag_Id = Relation.Tag_Id  WHERE ID = '$ID' ";
$res = mysqli_query($con,$sql);
if (!$res)
  {
    die('Error: ' . mysqli_error());
  }
$num=mysqli_num_rows($res);

$row= array();
for($i=0 ; $i<$num ; $i++){

$r=mysqli_fetch_assoc($res);
    $row[$i]=$r['TagScore'];


}

$tagscore = array_sum($row);

/*$sql1 = "UPDATE Item SET TagScore = '$tagscore' WHERE ID = '$ID'";

$res1 = mysqli_query($con,$sql1);
if (!$res1)
  {
    die('Error: ' . mysqli_error());
  }*/
 





/*
$sql1 = "SELECT ClickNum from Item where ID = '$ID' ";

$res1 = mysqli_query($con,$sql1);

$ClickNum=mysqli_fetch_row($res1); 


 if (!$res1)
  {
    die('Error: ' . mysqli_error());
  }

$sql2= "SELECT TagNum from Item where ID = '$ID' ";

$res2 = mysqli_query($con,$sql2);

$TagNum=mysqli_fetch_row($res2); 

if (!$res2)
  {
    die('Error: ' . mysqli_error());
  }
  

$sql3 = "SELECT TagScore from Item where ID = '$ID'";

$res3 = mysqli_query($con,$sql3);

$TagScore=mysqli_fetch_row($res3); 

if (!$res3)
  {
    die('Error: ' . mysqli_error());
  }*/
 



/*$total = $tagscore/$ClickNum[0] ; 

$Rate = $total/$TagNum[0] ;

$addrate = "UPDATE Item SET Rate = '$Rate' WHERE ID = '$ID'";

mysqli_query($con,$addrate);

}*/
   
?>