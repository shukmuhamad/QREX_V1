<!DOCTYPE html>

<?php
    require_once 'database_connection.php';
    require_once 'session_staff.php';
    date_default_timezone_set('Asia/Manila');
?>
<html lang="en">

<?php include 'header.php'?>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="page(staff).php">TOP GLOVE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown"><?php echo $session_name;?>
                    
                    
                    <!-- /.dropdown-alerts -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="page(general).php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a href="tablefg_test(general).php"><i class="fa fa-table fa-fw"></i> FG Table Filter</a>
                        </li>

                        <li>
                            <a href="tablesfg_test(general).php"><i class="fa fa-table fa-fw"></i> SFG Table Filter</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-13">
                    <h4 class="page-header">QUALITY RECORD E SYSTEM (QREX)</h4>
                </div>
                <!-- /.col-lg-13 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">
                       
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                        <!--<h> List result inspection record </h>-->
                        <!--<iframe height="450px" width="100%" src="table" name="iframe_h"> -->
                        <form method="POST" action="">
        <div class="form-inline">
                 
            <?php
            $smt = $connect->prepare('select * From DimPlant');
            $smt->execute();
            $data = $smt->fetchAll();
            ?>
            <td class="text-center" width="32%">
            <select class="form-control" name="keyword1" id="keyword1" required>
            <option class="form-control" name="keyword1" value="nul"> Factory</option>
            <?php foreach ($data as $row): ?>
                <option class="form-control" name="keyword1" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; ?></option>
            <?php endforeach ?>
            </select>

        <button class="btn btn-success" name="search">Search</button>

        

        </div>
        </form>
        <br/><br/>
                            <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                            <thead>
                            <tr class="info">
                                <th>Action</th>
                                <th>Batch Number</th>
                                <th>Inspection Count</th>
                                <th>Factory</th>
                                <th>Inspection Date</th>
                                <th>Shift</th>
                                <th>Production Line</th>
                                <th>Production Code</th>
                                <th>Glove Size</th>
                                <th>AQL</th>
                                <th>Gloves Weight</th>
                                <th>Disposition</th>
                                <th>Total Holes</th>
                                <th>Total Defects (Critical)</th>
                                <th>Total Defects (Major Visual)</th>
                                <th>Total Defects (Minor Visual)</th>
                                <th>Check By(Badge ID)</th>
                                <th>Verify By(Badge ID)</th>
                                <th>Lot ID</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
        <?php
        
        if (isset($_POST['search'])) {
            $keyword1=$_POST['keyword1'];
           // $keyword2=$_POST['keyword2'];
            
          
            $query=$connect->prepare("SELECT LotIDKey, 
            BatchNumber,
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
            VerifierID FROM View_all_SFG WHERE PlantName = '$keyword1'");
            $query->execute();
            while ($row=$query->fetch()) {?>
<tr>

            <td><center><a class = "btn btn-success" href = "formqrex_viewSFG(general).php?LotIDKey=<?php echo $row['LotIDKey']?>" target="_blank"><i class = "glyphicon glyphicon-show"></i> VIEW</a></center></td>
            <td class="text-center"><?php echo $row['BatchNumber']?></td>
            <td class="text-center"><?php echo $row['InspectionCount']?></td>
            <td class="text-center"><?php echo $row['PlantName']?></td>
            <td class="text-center"><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']))?></td>    
            <td class="text-center"><?php echo $row['Shift']?></td>
            <td class="text-center"><?php echo $row['ProductionLineName']?></td>
            <td class="text-center"><?php echo $row['GloveCodeLong']?></td>
            <td class="text-center"><?php echo $row['GloveSizeCodeLong']?></td>
            <td class="text-center"><?php echo $row['AQL']?></td>
            <td class="text-center"><?php echo $row['GloveWeight']?></td>
            <td class="text-center"><?php echo $row['Disposition']?></td>
            <td class="text-center"><?php echo $row['TotalHoles']?></td>
            <td class="text-center"><?php echo $row['TotalCritical']?></td>
            <td class="text-center"><?php echo $row['TotalMajor']?></td>
            <td class="text-center"><?php echo $row['TotalMinor']?></td>
            <td class="text-center"><?php echo $row['InspectionUserID']?></td>
            <td class="text-center"><?php echo $row['VerifierID']?></td>
            <td class="text-center"><?php echo $row['LotIDKey']?></td>
            </tr> <?php
        }
        ?>
    </tbody>
                </table>
                <?php
}
$connect=null
?>

            <!-- /.table-responsive -->
        </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->

                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
				
    </div>
    </div>

   


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../vendor/datatables/datatables-demo.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/js/buttons.colVis.min.js"></script>
	<script type="text/javascript" language="javascript" src="../../../../examples/resources/demo.js"></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="jquery.dataTables.yadcf.js"></script>


    <script>
	$(document).ready(function(){

	  var table= $('#tableID').dataTable(
             { "dom": 'Bfrtip',
         buttons: [
                        {extend :'excel', text:'Export to Excel'
                            ,exportOptions: {
                                format: {
                                    header: function ( data, row, column, node ) {
                                        var newdata = data;

                                        newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                                        newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                                        newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                                        return newdata;
                                    }
                                }

                            }

                    }
                       ,{extend :'pdf'  , text:'Export to PDF', orientation: 'landscape',  pageSize: 'LEGAL'
                            ,exportOptions: {
                                format: {
                                    header: function ( data, row, column, node ) {
                                        var newdata = data;

                                        newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                                        newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                                        newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                                        return newdata;
                                    }
                                }

                            }
                        }
                        ,{extend :'print'  , text:'Print Table', orientation: 'landscape',  pageSize: 'LEGAL'
                            ,exportOptions: {
                                format: {
                                    header: function ( data, row, column, node ) {
                                        var newdata = data;

                                        newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                                        newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                                        newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                                        return newdata;
                                    }
                                }

                            }
                        }
                    ]
			 }
		).yadcf([

		    {column_number : 1, filter_default_label: "Select"},
			{column_number : 2, filter_default_label: "Select"},
            {column_number : 3, filter_default_label: "Select"},
            {column_number : 4, filter_default_label: "Select"},
			{column_number : 5, filter_default_label: "Select"},
            {column_number : 6, filter_default_label: "Select"},
            {column_number : 7, filter_default_label: "Select"},
            {column_number : 8, filter_default_label: "Select"},
			{column_number : 9, filter_default_label: "Select"},
			{column_number : 10, filter_default_label: "Select"},
            {column_number : 11, filter_default_label: "Select"},
            {column_number : 12, filter_default_label: "Select"},
            {column_number : 13, filter_default_label: "Select"},
			{column_number : 14, filter_default_label: "Select"},
            {column_number : 15, filter_default_label: "Select"},
            {column_number : 16, filter_default_label: "Select"},
            {column_number : 17, filter_default_label: "Select"},
            {column_number : 18, filter_default_label: "Select"},
            {column_number : 18, filter_default_label: "Select"}
		]);


	});
	</script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
          </br>
          </br>
          </br>
            <label>Copyright © 2020 by QA PQC SQUAD</label>
          </div>
      </footer>

</html>
