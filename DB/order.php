<?php
require_once("./dbconfig.php");
// GET
//현금 계좌이체 토스
$option = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : '';
$menuStr = isset($_POST['menuStr']) ? $_POST['menuStr'] : '';
$sumPrice = isset($_POST['sumPrice']) ? $_POST['sumPrice'] : '';
$tableno = isset($_POST['tableno']) ? $_POST['tableno'] : '';
$now = date('Y-m-d H:i:s');

$sql = "SELECT * FROM sool_server WHERE tableNo='$tableno'";
$query = mysqli_query($db,$sql);
$row=mysqli_fetch_array($query);
if ( isset($row['tableId'])){
	$tableid =$row['tableId'];

	$sql = "INSERT INTO `sool_order` (`time`,`tableNo`,`tableId`,`orderStr`,`sumPrice`,`payType`,`isEnd`) VALUES ('$now','$tableno','$tableid','$menuStr','$sumPrice','$option','no');";
	$query = mysqli_query($db,$sql);
	if (!$query) {
	    die('Could not query:' .mysqli_error($db) );
	}
	echo '<script>alert("주문 접수 완료 !! 입금페이지로 이동");location.href = "../info.php"</script>';
	
}
else{
	echo '<script>alert("테이블 번호 확인해주세요");location.href = "../index.php"</script>';
}
mysqli_close($db);
/*
$sql = "INSERT INTO `sool_order` (`time`,`tableNo`,`tableId`,`orderStr`,`sumPrice`,`payType`,`isEnd`) VALUES ('$tableno','$tableid','no');";
$query = mysqli_query($db,$sql);
if (!$query) {
    die('Could not query:' .mysqli_error($db) );
}
mysqli_close($db);
// 리다이렉트

echo '<script>alert("'.$tableno.'번 테이블 등록완료 :: '.$tableid.'");location.href = "../server.php"</script>';
*/
?>