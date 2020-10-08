<?php
session_start(); 

$conn = new PDO("sqlsrv:Server=172.16.10.61\QAPQC;Database=QAPQC01", "pqcapp", "TGQApqcQrex");
$session_name = $_SESSION['Name'];
$session_BadgeID=$_SESSION['BadgeID'];
$session_PositionKey=$_SESSION['PositionKey'];
$session_PositionFullText=$_SESSION['PositionFullText'];
$session_Password=$_SESSION['Password'];


$query = "SELECT * from M_UserInfo WHERE BadgeID=? AND Password=?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $session_name);
$stmt->bindParam(1, $session_BadgeID);
$stmt->bindParam(1, $session_PositionKey);
$stmt->bindParam(1, $session_PositionFullText);
$stmt->bindParam(1, $session_Password);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session = $row['Password'];


if (!isset($session_BadgeID)) {

    $conn=null;
    header('Location: login(staff).php');
  
}
?>
