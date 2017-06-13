<?php



require_once 'includes/DB_Functions.php';
    $db = new DB_Functions();
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysqli_select_db($con, DB_DATABASE);

//mysqli_set_charset($con,"utf8");
mysqli_query($con,"set names 'utf8'");


$response = array();
//$response['item'] = array();




$sql1 = "SELECT * from item ORDER BY id";
$res1 = mysqli_query($con,$sql1);


if (!$res1)
  {
    die('Error: ' . mysqli_error($con));
  }

//將資料庫和算出來的rate存在一個陣列
while($data = mysqli_fetch_assoc($res1)){

$temp = array();
$ID = $data['id'];

$uid = $_POST["userId"];
$sql = "SELECT count from tag$uid INNER JOIN relation ON tag$uid.tag_name = relation.tag_name  WHERE itemid = '$ID' ";
$res = mysqli_query($con,$sql);
if (!$res)
  {
    die('Error: ' . mysqli_error());
  }
$num=mysqli_num_rows($res);

$row= array();
for($i=0 ; $i<$num ; $i++){

$r=mysqli_fetch_assoc($res);
    $row[$i]=$r['count'];
}

$tagscore = array_sum($row);

$sql2 = "SELECT clickNum from user";
$res2 = mysqli_query($con,$sql2);
$clickNum = mysqli_fetch_assoc($res2);

$total = $tagscore/$clickNum['clickNum'] ; 

$Rate = $total/$data["tagnum"] ;

$temp["Rate"] = $Rate ;
$temp["ID"]  = $data["id"] ;
$temp["Name"] = $data["name"] ;
$temp["Picture"] = $data["img0"] ;

 //array_push($response['item'],$temp);
array_push($response,$temp);
}

//排序
function my_sort($a,$b)
{
if ($a['Rate']==$b['Rate']) return 0;
return ($a>$b)?-1:1;
}

//usort($response['item'],"my_sort");
usort($response,"my_sort");

$str="";
for($i=0; $i<12; $i++){
	$name=$response[$i]["Name"];
	$pic=$response[$i]["Picture"];
	if($i!=11)
		$str=$str.$name.",".$pic.",";
	else
		$str=$str.$name.",".$pic;
} 


//解析成json
echo $str
//$jsonen = json_encode($str,JSON_UNESCAPED_UNICODE);

//echo $jsonen;
//123131234444


?>