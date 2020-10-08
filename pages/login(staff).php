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
<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "topnav-right">
			<div class = "navbar-header">
				<a class = "navbar-brand" >QUALITY RECORD E SYSTEM (QREX)</a>
			</div>
		</div>
	</nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In (QA STAFF)</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Badge Id" name="BadgeID" type="BadgeID" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="Password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button name = "submit" class = "form-control btn btn-primary btn-block"><i class = "glyphicon glyphicon-log-in"> Submit</i></button>
                            </fieldset>
                        </form>
                        
                        <?php
        session_start();
        $error = '';
        require_once 'database_connection.php';
            if (isset($_POST['submit'])) {
                    if (empty($_POST['BadgeID']) || empty($_POST['Password'])) {
                    $error = "Username or Password is invalid";
                    } else {
        
                        $BadgeID = $_POST['BadgeID'];
                        $Password = $_POST['Password'];
                       
                            
                                $query = "SELECT * from M_UserInfo where Password=? AND BadgeID=?";
                                $stmt = $connect->prepare($query);
                    
                                $stmt->bindParam(1, $Password);
                                $stmt->bindParam(2, $BadgeID);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $test){ $PositionKey = $test['PositionKey'];}
                        
                                $row = $stmt->rowCount();

                                if ($row == 1) {

                                    if($PositionKey == 1){

                                        foreach ($result as $test){ $Name = $test['Name'];}
                                        foreach ($result as $test){ $BadgeID = $test['BadgeID'];}
                                        foreach ($result as $test){ $PositionKey = $test['PositionKey'];}
                                        foreach ($result as $test){ $PositionFullText = $test['PositionFullText'];}
                                        foreach ($result as $test){ $Password = $test['Password'];}
                                        $_SESSION['Name'] = $Name; 
                                        $_SESSION['BadgeID'] = $BadgeID; 
                                        $_SESSION['PositionKey'] = $PositionKey; 
                                        $_SESSION['PositionFullText'] = $PositionFullText; 
                                        $_SESSION['Password'] = $Password; 
                                        
                                        header("location: page(staff).php");
                                
                                    }
                                    else if($PositionKey == 0){
                                        echo "<center><labe style = 'color:red;'>Badge ID Worker detected, Please insert Badge Id and password staff</label></center>";
                        
                                    }
                                    else{
                                        echo "<center><labe style = 'color:red;'>Badge ID General detected, Please insert Badge Id and password staff</label></center>";
                        
                                    }
                                    
                                }else{
                                    echo "<center><labe style = 'color:red;'>Wrong badge ID or Password!</label></center>";
                                }
                            
                        

                        $connect = null; 
                    }
                }
    
?>
                    </div>
                </div>
            </div>
        </div>
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
