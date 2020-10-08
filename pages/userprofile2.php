<?php
	require_once 'session_general.php';
	require_once 'database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QREX</title>
    <link rel="shortcut icon" href="../picture/QREX.png">

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
                <a class="navbar-brand" href="page(general).php">TOP GLOVE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <?php echo $session_name;?>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="userprofile2.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                            <a href="tables_FG(general).php"><i class="fa fa-table fa-fw"></i> All Finished Good Inspection Records</a>
                        </li>
                        <li>
                            <a href="tables_SFG(general).php"><i class="fa fa-table fa-fw"></i> All Semi-Finished Good Inspection Records (SFG)</a>
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">QA PQC Inspection Module</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Update Profile
                        </div>
                         <div class="panel-body">
                         <div class="row">
                         <div class="col-lg-6">
                            </br>
                            
                               
                                
                            <form role="form" method ="post">
                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                		<tr >
                      					<th class="info">ID</th>
                      					<td><input class="form-control" name="id_staff" id="id_staff"  placeholder="<?php echo $session_PositionKey;?>" disabled></td>
                    					</tr>
                                        <tr >
                      					<th class="info">NAME</th>
                      					<td><input class="form-control" name="name" id="name" placeholder="<?php echo $session_name;?>" required></td>
                    					</tr>
                                        <tr >
                      					<th class="info">BADGE ID</th>
                      					<td><input class="form-control" name="badge_id" id="badge_id" placeholder="<?php echo $session_BadgeID;?>" required></td>
                    					</tr>
                                        <tr >
                      					<th class="info">PASSWORD</th>
                      					<td><input class="form-control" name="password" id="password" placeholder="<?php echo $session_PositionFullText;?>" required></td>
                    					</tr>

  										
                  			       </table>
                                 
                            

                              <center><button name="update" class="btn btn-success">UPDATE</button> </center><br> 
                               
                                        <!--<a href="production_detail.php" class="btn btn-primary"> Next</a>-->
                                                                         
                                       </form>
                                       
                     </div>
		</div>
        </div>
      </div>
    </div>    

<?php                                     
	require_once 'database_connection.php';
	if(ISSET($_POST['update'])){
		$id_staff = $_POST['id_general'];
		$badge_id = $_POST['badge_id'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$conn->query("UPDATE `general` SET `id_general` = '$id_general', `password` = '$password', `name` = '$name' WHERE `badge_id` = '$_REQUEST[badge_id]'") or die(mysqli_error());
		
		echo"<script>alert('You have successfully Updated Training!');
		 			window.location='userprofile2.php';
						</script>";
		
	}
?>

 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                    
                                   
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


</body>


</html>
