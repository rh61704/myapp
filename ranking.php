ㄋ<?php



require_once 'DbOperation.php';
require_once 'DbConnect.php';
 
$db = new DbOperation();
$dbcon =new DbConnect();


$con= $dbcon->connect();

mysqli_set_charset($con,"utf8");



$response = array();
$response['item'] = array();




$sql1 = "SELECT ClickNum,TagNum,ID,product_name,Picture from Item ORDER BY ID";
$res1 = mysqli_query($con,$sql1);


if (!$res1)
  {
    die('Error: ' . mysqli_error());
  }

//將資料庫和算出來的rate存在一個陣列
while($data = mysqli_fetch_assoc($res1)){

$temp = array();
$ID = $data['ID'] ;

$sql = "SELECT TagScore from  Tag INNER JOIN Relation ON Tag.Tag_Id = Relation.Tag_Id  WHERE ID = '$ID' ";
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


$total = $tagscore/$data["ClickNum"] ; 

$Rate = $total/$data["TagNum"] ;

$temp["Rate"] = $Rate ;
$temp["ID"]  = $data["ID"] ;
$temp["Name"] = $data["product_name"] ;
$temp["Picture"] = $data["Picture"] ;


 array_push($response['item'],$temp);

}

//排序
function my_sort($a,$b)
{
if ($a['Rate']==$b['Rate']) return 0;
return ($a>$b)?-1:1;
}

usort($response['item'],"my_sort");

//解析成json
$jsonen = json_encode($response);

echo $jsonen;



?>