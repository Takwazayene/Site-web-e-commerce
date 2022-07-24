<?Php
include '../Config.php';
@$todo=$_POST['todo'];
if(isset($todo) and $todo=="submit-rating"){
$rating=$_POST['rating'];
$uid=$_POST['uid'];
$gid=$_POST['gid'];
$msg="";
$status="OK";
$dbo = Config::getConnexion();
if(!isset($rating)){$msg=$msg."Pleae give your score ";
$status="NOT OK";
}

if ($status=="OK")
{
$sql=$dbo->prepare("insert into rating (rating,garage_id,user_id) values(:rating,:gid,:uid)");
$sql->bindParam(':rating',$rating);
$sql->bindParam(':gid',$gid);
$sql->bindParam(':uid',$uid);

if($sql->execute()){
$rating_id=$dbo->lastInsertId(); 
echo " Thanks ..  id = $rating_id ";
}
else{
echo " Not able to add data please contact Admin ";
}

}else {
echo $msg;
}	
}// end of todo checking
?>