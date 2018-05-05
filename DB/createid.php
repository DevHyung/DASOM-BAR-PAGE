<?php
require_once("./dbconfig.php");
 
// GET
$tableno = isset($_POST['tableno']) ? $_POST['tableno'] : '';
$tableid = isset($_POST['tableid']) ? $_POST['tableid'] : '';

$sql = "INSERT INTO `sool_server` (`tableNo`, `tableId`) VALUES ('$tableno','$tableid') ON DUPLICATE KEY UPDATE `tableId`='$tableid'";
$query = mysqli_query($db,$sql);
if (!$query) {
    die('Could not query:' .mysqli_error($db) );
}
mysqli_close($db);
// 리다이렉트
echo '<script>alert("'.$tableno.'번 테이블 등록완료 :: '.$tableid.'");location.href = "../server.php"</script>';
?>