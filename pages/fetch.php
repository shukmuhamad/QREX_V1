<?php

include('database_connection.php');

$column = array( 'date', 'factory', 'Inspection_Stage', 'line', 'pallet_no', 'final', 'Product_Type', 'size', 'level', 'customer', 'so_no', 'product_code', 'colour', 'brand', 'product_detail', 'shift', 'QA_ID', 'carton_no', 'glove_weight', 'glove_weight_p_f', 'counting', 'counting_p_f', 'layering', 'smelly', 'gripness', 'donning', 'black_test', 'sticking', 'dispensing_test', 'white_test', 'pack_defect', 'length', 'width', 'cuff', 'palm', 'fingertip', 'bead_diamete', 'cuff_edge', 'weight','Overall_AQL','batch_id');

$query = "
SELECT * FROM sfg_fg
";

if(isset($_POST['filter_Inspection_Stage'], $_POST['filter_line'], $_POST['filter_factory'], $_POST['filter_date']) && $_POST['filter_Inspection_Stage'] != '' && $_POST['filter_line'] != '' && $_POST['filter_factory'] != '')
{
 $query .= '
 WHERE Inspection_Stage = "'.$_POST['filter_Inspection_Stage'].'" AND line = "'.$_POST['filter_line'].'" AND factory = "'.$_POST['filter_factory'].'"';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY batch_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['date'];
 $sub_array[] = $row['factory'];
 $sub_array[] = $row['Inspection_Stage'];
 $sub_array[] = $row['line'];
 $sub_array[] = $row['pallet_no'];
 $sub_array[] = $row['final'];
 $sub_array[] = $row['Product_Type'];
 $sub_array[] = $row['size'];
 $sub_array[] = $row['level'];
 $sub_array[] = $row['customer'];
 $sub_array[] = $row['so_no'];
 $sub_array[] = $row['product_code'];
 $sub_array[] = $row['colour'];
 $sub_array[] = $row['brand'];
 $sub_array[] = $row['product_detail'];
 $sub_array[] = $row['shift'];
 $sub_array[] = $row['QA_ID'];
 $sub_array[] = $row['carton_no'];
	
 $sub_array[] = $row['glove_weight'];$sub_array[] = $row['glove_weight_p_f'];
 
 $sub_array[] = $row['counting']; $sub_array[] = $row['counting_p_f'];

 $sub_array[] = $row['layering'];
 $sub_array[] = $row['smelly'];
 $sub_array[] = $row['gripness'];
 $sub_array[] = $row['donning'];
 $sub_array[] = $row['black_test'];
 $sub_array[] = $row['sticking'];
 $sub_array[] = $row['dispensing_test'];
 $sub_array[] = $row['white_test'];
 $sub_array[] = $row['pack_defect'];
 $sub_array[] = $row['length'];
 $sub_array[] = $row['width'];
 $sub_array[] = $row['cuff'];
 $sub_array[] = $row['palm'];
 $sub_array[] = $row['fingertip'];
 $sub_array[] = $row['bead_diamete'];
 $sub_array[] = $row['cuff_edge'];
 $sub_array[] = $row['weight'];
 $sub_array[] = $row['Overall_AQL'];
 $sub_array[] = $row['batch_id'];
	
 
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM sfg_fg";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>
