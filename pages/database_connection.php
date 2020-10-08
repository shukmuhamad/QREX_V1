<?php

try
{
	$connect = new PDO("sqlsrv:Server=172.16.10.61\QAPQC;Database=QAPQC01", "pqcapp", "TGQApqcQrex");
	$connect->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	die( print_r( $e->getMessage()));
}



?>
