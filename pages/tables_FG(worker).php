<!DOCTYPE html>

<?php
    require_once 'database_connection.php';
    require_once 'session_worker.php';
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
                <a class="navbar-brand" href="page(worker).php"><b>TOP GLOVE-(QREX)</b></a>
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
                        <li><a href="userprofile1.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="page(worker).php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>

                        <li>
                            <a href="formqrex(worker).php"><i class="fa fa-edit fa-fw"></i> Form</a>
                        </li>

                        <li>
                            <a href="tables_FG(worker).php"><i class="fa fa-table fa-fw"></i> All Finished Good Inspection Records (FG)</a>
                        </li>

                        <li>
                            <a href="tables_SFG(worker).php"><i class="fa fa-table fa-fw"></i> All Semi-Finished Good Inspection Records (SFG)</a>
                        </li>

                        <li>
                            <a href="tablefg_test(worker).php"><i class="fa fa-table fa-fw"></i> FG Table Filter</a>
                        </li>

                        <li>
                            <a href="tablesfg_test(worker).php"><i class="fa fa-table fa-fw"></i> SFG Table Filter</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">
                            Inspection Record Result (Finished Good)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                        <!--<h> List result inspection record </h>-->
                        <!--<iframe height="450px" width="100%" src="table" name="iframe_h"> -->

                            <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                            <thead>
                                <tr class="info">
                                <th>Action</th>
                                <th>Lot ID</th>
                                <th>Inspection Count</th>
                                <th>Factory</th>
                                <th>Inspection Date</th>
                                <th>Production Date</th>
                                <th>SO Number</th>
                                <th>Shift</th>
                                <th>Production Line</th>
                                <th>Production Code</th>
                                <th>Glove Size</th>
                                <th>Pallet No</th>
                                <th>AQL</th>
                                <th>Gloves Weight</th>
                                <th>Disposition</th>
                                <th>Total Holes</th>
                                <th>Total Defects (Critical)</th>
                                <th>Total Defects (Major Visual)</th>
                                <th>Total Defects (Minor Visual)</th>
                                <th>Check By(Badge ID)</th>
                                <th>Verify By(Badge ID)</th>
                                </tr>
                            </thead>
                     <tbody>
                    </tbody>
                </table>
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

    <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
          </br>
          </br>
          </br>
            <label>Copyright © 2020 by QA PQC SQUAD</label>
          </div>
        </div>
      </footer>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
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
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="jquery.dataTables.yadcf.js"></script>


	<script>
	$(document).ready(function(){

	  var table= $('#tableID').dataTable(
			 { dom: 'Bfrtip',
             "bProcessing": true,
			"pagingType": "numbers",
			"sAjaxSource": "ajaxlistFG.php",
			"aoColumns": [
                {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var lotid = full.LotIDKey;
                     return '<a class = "btn btn-success" href = "formqrex_viewFG(worker).php?LotIDKey='+lotid+'" target="_blank"><i class = "glyphicon glyphicon-show"></i> VIEW</a>';
                 }
             },
				{ mData: 'LotIDKey' } ,
				{ mData: 'InspectionCount' },
                { mData: 'PlantName' } ,
				{
                    "data": "RecordCreatedDateTime",
                    "render": function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    return (date.getDate()  + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear());
                }},
                {
                    "data": "ProductionDate",
                    "render": function (data) {
                    var date = new Date(data);
                    var month = date.getMonth() + 1;
                    return (date.getDate()  + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear());
                }},
				{ mData: 'SONumber' },
				{ mData: 'Shift' },
				{ mData: 'ProductionLineName' },
				{ mData: 'GloveCodeLong' } ,
				{ mData: 'GloveSizeCodeLong' },
				{ mData: 'PalletNumber' },
				{ mData: 'AQL' },
				{ mData: 'GloveWeight' },
				{ mData: 'Disposition' },
				{ mData: 'TotalHoles' },
				{ mData: 'TotalCritical' },
				{ mData: 'TotalMajor' },
				{ mData: 'TotalMinor' },
				{ mData: 'InspectionUserID' },
				{ mData: 'VerifierID' }
			],
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


      
} );
    
	</script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>


</html>
