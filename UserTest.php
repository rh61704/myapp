<?php


$con = mysql_connect("localhost","root","");
mysql_query("set names UTF8",$con);
mysql_select_db("clothes", $con);


$choice = $_GET['ID'];

    
 

session_start();

if(isset($_SESSION['views'])) {
$_SESSION['views']=$_SESSION['views']+1; 
}else{ 
$_SESSION['views']=1; }
    

 if($_SESSION['views']<10){

	$addsql = "UPDATE Tag  INNER JOIN Relation ON Tag.Tag_Id = Relation.Tag_Id  SET Tag.TagScore = Tag.TagScore + '1'  WHERE Relation.ID ='$choice'";
	$addres = mysql_query($addsql);
	if (!$addres)
  	{
  	  die('Error: ' . mysql_error());
 	 }
	header("Location: TestPage.php");
	}else{
		header("Location: mainpage.php");
		unset($_SESSION['views']); 
	}




?>