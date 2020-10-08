<?php
$pdo = new PDO("sqlsrv:Server=172.16.10.61\QAPQC;Database=QAPQC01", "pqcapp", "TGQApqcQrex");
$statement = $pdo->prepare("SELECT LotIDKey, 
                            InspectionCount,
                            PlantName,
                            RecordCreatedDateTime,
                            Shift,ProductionLineName,
                            GloveCodeLong,
                            GloveSizeCodeLong,
                            AQL,GloveWeight,
                            Disposition,TotalHoles,TotalCritical,
                            TotalMajor,TotalMinor,
                            InspectionUserID,
                            VerifierID 
                            FROM 
                            View_all_SFG");
$statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_ASSOC);
             

	$results = array(
		"sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData"=>$data
	);

	echo json_encode($results);
	

?>
	