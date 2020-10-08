<?php
    ini_set('memory_limit', '1024M');
    require_once 'database_connection.php';
    require_once 'session_staff.php';
    date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
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
                            <a href="page(staff).php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="formqrex.php"><i class="fa fa-edit fa-fw"></i> Form</a>
                        </li>
                        
                        <li>
                            <a href="tablefg_test.php"><i class="fa fa-table fa-fw"></i> All Finished Good Inspection Records (FG) Search</a>
                        </li>

                        <li>
                            <a href="tablesfg_test.php"><i class="fa fa-table fa-fw"></i> All Semi-Finished Good Inspection Records (SFG) Search</a>
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
                    <h1 class="page-header">QUALITY RECORD E SYSTEM (QREX)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<!----------------------------------------------------------------PRODUCT INFORMATION----------------------------------------------------------->            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Product Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method ="post">
                                        <div class="form-group">
                                            <?php 
                                                $query = $connect->prepare("SELECT * FROM DimPlant");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                         
                                            <label>Factory:</label>
                                            <select class="form-control fstdropdown-select" id="PlantKey" name="PlantKey" required>
                                                <option name="PlantKey" value=""> Factory</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option value="<?php echo $row['PlantKey'];?>"><?php echo $row['PlantName']; }?></option>
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Inspection Date:</label>
                                            <input class="form-control" type="datetime-local" name="RecordCreatedDateTime" id="RecordCreatedDateTime" max="<?php echo date('Y-m-d\TH:i:s'); ?>" value="<?php echo date('Y-m-d\TH:i:s'); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Batch No:</label>
                                            <input class="form-control" name="BatchNumber" id="BatchNumber" placeholder="Enter Batch No" required>
                                            <div id="checkk" ></div>
                                        </div>

                                        <div class="form-group">
                                            <label>Inspection Stage:</label></br>
                                                <div class="radio">
                                                    <label>
                                                    <input type="radio" id="radioBtn1" name="inspection_stage" value="1" onclick="EnableDisableTextBox()" checked>FINISHED GOOD
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                    <input type="radio" id="radioBtn2" name="inspection_stage" value="2" onclick="EnableDisableTextBox()" >FINISHED GOOD (DIRECT PRE-SHIPMENT)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                    <input type="radio" id="radioBtn3" name="inspection_stage" onclick="EnableDisableTextBox()" value="3">SEMI FINISHED GOOD
                                                    </label>
                                                </div>

                                            <!--javascript to disable/enable the input of Pallet No and SO Number-->
                                            <script type="text/javascript">
                                                function EnableDisableTextBox() {
                                                    var radioBtn3 = document.getElementById("radioBtn3");
                                                    var PalletNumber = document.getElementById("PalletNumber");
                                                    var SONumber = document.getElementById("SONumber");
                                                    PalletNumber.disabled = radioBtn3.checked ? true : false;
                                                    SONumber.disabled = radioBtn3.checked ? true : false;
                                                    if (!PalletNumber.disabled || !SONumber.disabled) {
                                                        PalletNumber.focus();
                                                        SONumber.focus();
                                                    }
                                                }
                                            </script>
                                        </div>
                                        
                                        <div class="form-group">
                                            <?php 
                                            $query = $connect->prepare("SELECT InspectionPlanName FROM M_InspectionPlan");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <label>Category:</label></br>
                                            <td><select class="form-control fstdropdown-select" id="InspectionPlanKey" name="InspectionPlanKey" required></td>
                                                    <option name="InspectionPlanKey" value=""> Category</option>
                                                    <?php foreach ($fetch as $row) { ?>
                                                    <option value="<?php echo $row['InspectionPlanKey'];?>"><?php echo $row['InspectionPlanName']; }?></option>
                                                </select>
                                            </td>
                                        </div>

                                        <div>
                                            <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveSize");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <th scope="col" class="info"><label>Size:</label></th>
                                                <td><select class="form-control fstdropdown-select" id="GloveSizeKey" name="GloveSizeKey" required>
                                                        <option name="GloveSizeKey" value=""> Size</option>
                                                        <?php foreach ($fetch as $row) { ?>
                                                        <option value="<?php echo $row['GloveSizeKey'];?>"><?php echo $row['GloveSizeCodeLong']; }?></option>
                                                    </select>
                                                </td>
                                        </div><br>
                                          
                                        <div class="form-group">
                                            <label>Pallet NO:</label>
                                            <input class="form-control" name="PalletNumber" id="PalletNumber" placeholder="Enter Pallet No" required>  
                                        </div>

                                        <div class="form-group">
                                            <label>Inspection Count: </label>
                                            <input class="form-control" type="number" min="0" name="InspectionCount" id="InspectionCount" placeholder="Enter Number" onkeyup="checkcount()"  required> 
                                        </div>

                                        <script>
                                            function checkcount() {
                                            var x, text;

                                            x = document.getElementById("InspectionCount").value;

                                            if (isNaN(x) || x < 0 || x > 101) {
                                                document.getElementById("InspectionCount").value = "";
                                                alert('limit count')
                                            } else {
                                                
                                            
                                            }

                                            }
                                            </script>
                                            
                                        <div class="form-group">
                                            <label>QUANTITY CTN/BAG</label>
                                            <input type="number" min="0" class="form-control" name="CartonQuantity" id="CartonQuantity" placeholder="Enter NO" required>
                                        </div>

                                        <div class="form-group">
                                            <label>CARTON NUMBER</label>
                                            <input class="form-control" name="CartonNum" id="CartonNum" placeholder="Enter Carton No" required>
                                        </div><br>

                                        <div class="form-group">
                                            <label>Status:</label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="RecordStatusFlag" id="optionsRadios1" value="1" checked>&nbsp;N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="RecordStatusFlag" id="optionsRadios2" value="2">&nbsp;Reinspect
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="RecordStatusFlag" id="optionsRadios3" value="3">&nbsp;Convert Inspection
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="RecordStatusFlag" id="optionsRadios4" value="4">&nbsp;Repack Inspection
                                            </label>
                                        </div><br>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Customer:</label></th>
                                        <?php 
                                            $query = $connect->prepare("SELECT CustomerName FROM M_Customer ORDER BY CustomerName ASC");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control fstdropdown-select" id="Customer" name="Customer">
                                            <option name="" value="">Select Customer</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
                                            </select>
                                        </td>
                                    </div>

                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Brand:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT BrandName FROM M_Brand ORDER BY BrandName ASC");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control fstdropdown-select" id="Brand" name="Brand">
                                            <option name="" value="">Select Brand</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
                                            </select>
                                        </td>
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>SO NO:</label>
                                        <input type="text" class="form-control" name="SONumber" id="SONumber" placeholder="Enter SO Number">
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>LOT NO:</label>
                                        <input type="text" class="form-control" name="LotNumber" placeholder="Enter Lot No">
                                    </div>

                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Product:</label></th>
                                        <?php 
                                            $query = $connect->prepare("SELECT GloveProductTypeName FROM M_GloveProductType ORDER BY GloveProductTypeName ASC");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control fstdropdown-select" id="GloveProductTypeKey" name="GloveProductTypeKey">
                                            <option name="GloveProductTypeKey" value="">Select Product</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeKey'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
                                            </select>
                                        </td>
                                    </div>
                                            
                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Product Code:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT GloveCodeLong FROM M_GloveCode ORDER BY GloveCodeLong ASC");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control fstdropdown-select" id="GloveCodeKey" name="GloveCodeKey" required>
                                            <option name="GloveCodeKey" value="">Product Code</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option name="GloveCodeKey" value="<?php echo $row['GloveCodeKey'];?>"><?php echo $row['GloveCodeLong']; }?></option> 
                                            </select>
                                        </td>
                                    </div>

                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Colour:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT GloveColourName FROM M_GloveColour ORDER BY GloveColourName ASC");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control fstdropdown-select" id="GloveColourKey" name="GloveColourKey" required>
                                            <option name="GloveColourKey" value=""> Colour</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option name="GloveColourKey" value="<?php echo $row['GloveColourKey'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </td>
                                    </div>
                                            
                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr class="info">
                                            <th class="text-center" colspan="2">Production:</th>
                                            <th class="text-center">Shift:</th>
                                        </tr>
                                       
                                        <tr>
                                            <td><select class="form-control fstdropdown-select" id="ProductionLineKey1" name="ProductionLineKey1" required>
                                            <?php 
                                                $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine ORDER BY ProductionLineName ASC");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <option class="form-control" name="ProductionLineKey1" value=""> Production Line</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="ProductionLineKey1" value="<?php echo $row['ProductionLineKey'];?>"><?php echo $row['ProductionLineName']; }?></option>
                                            </select></td>
                                            <td><input type="date" class="form-control" name="product_date1" max="<?php echo date('Y-m-d'); ?>" id="product_date1" required style="padding: 0 0 0 8px;"></td>
                                            <td><select class="form-control" id="shift1" name="shift1" required>
                                                <option name="shift1" value=""> N/A</option>
                                                <option name="shift1" value="1"> Shift 1</option>
                                                <option name="shift1" value="2"> Shift 2</option>
                                                <option name="shift1" value="3"> Shift 3</option>
                                            </select></td>
                                        </tr>

                                        
                                        <tr>  
                                        <td>
                                            <select class="form-control fstdropdown-select" id="ProductionLineKey2" name="ProductionLineKey2">
                                            <?php 
                                                $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <option class="form-control" name="ProductionLineKey2" value=""> Production Line</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="ProductionLineKey2" value="<?php echo $row['ProductionLineKey'];?>"><?php echo $row['ProductionLineName']; }?></option>
                                            </select></td>
                                            
                                            <td><input type="date" class="form-control" name="product_date2" max="<?php echo date('Y-m-d'); ?>" id="product_date2" style="padding: 0 0 0 8px;"></td>

                                            </select></td>
                                            <td>
                                            <select class="form-control" id="shift2" name="shift2">
                                                <option class="form-control" name="shift2" value=""> N/A</option>
                                                <option class="form-control" name="shift2" value="1"> Shift 1 </option>
                                                <option class="form-control" name="shift2" value="2"> Shift 2 </option>
                                                <option class="form-control" name="shift2" value="3"> Shift 3 </option>
                                            </select></td>
                                        <tr> 
                                        <td><select class="form-control fstdropdown-select" id="ProductionLineKey3" name="ProductionLineKey3">
                                            <?php 
                                                $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <option class="form-control" name="ProductionLineKey3" value="" > Production Line</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="ProductionLineKey" value="<?php echo $row['ProductionLineKey'];?>"><?php echo $row['ProductionLineName']; }?></option>
                                            </select></td>

                                            <td><input type="date" class="form-control" name="product_date3" max="<?php echo date('Y-m-d'); ?>" id="product_date3" style="padding: 0 0 0 8px;"></td>

                                            <td><select class="form-control" id="shift3" name="shift3" >
                                            <option class="form-control" name="shift3" value=""> N/A</option>
                                            <option class="form-control" name="shift3" value="1"> Shift 1</option>
                                            <option class="form-control" name="shift3" value="2"> Shift 2</option>
                                            <option class="form-control" name="shift3" value="3"> Shift 3 </option>
                                            </select>
                                        </td>
                                        
                                        </tr>   
                                    </table>

                                    
                                            
                                    <div class="form-group">
                                        <label>Pack Date:</label>
                                        <input class="form-control" type="date" name="PackingDate" id="PackingDate" placeholder="" required style="padding: 0 0 0 8px;">
                                    </div>

                                    <div class="form-group">
                                        <?php 
                                            $query = $connect->prepare("SELECT DISTINCT InspectionUserID FROM T_Record_Master");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <label>Checked By:</label>
                                        <input type="number" class="form-control" name="InspectionUserID" placeholder="Insert Badge ID" list="InspectionUserID" required>
                                        <datalist id="InspectionUserID">
                                        <?php foreach ($fetch as $row) { ?>
                                            <option name="InspectionUserID" value="<?php echo $row['InspectionUserID'];?>"><?php echo $row['InspectionUserID']; }?></option>
                                        </datalist>
                                    </div>
                                </div>
                           
                        
                    
                                  
<!----------------------------------------------------------------OTHER TESTING---------------------------------------------------------------->            

                        <div class="row">
                            <div class="col-lg-12">                   
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Other Testing
                                    </div>
                                    <div class="col-lg-6">
                            		 </br>
                                    <label>1. Testing Equipment</label></br>
                                    </br>
                                     
                                    <div class="form-group">
                                       
                                        <label>WEIGHING SCALE ID</label>
                                            <input class="form-control" type="text" name="InstrumentValue" id="InstrumentValue"><br>     
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>RULER ID</label>
                                            <input class="form-control" type="text" name="InstrumentValue2" id="InstrumentValue"><br>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>THICKNESS GAUGE ID</label>
                                            <input class="form-control" type="text" name="InstrumentValue3" id="InstrumentValue"><br>
                                    </div><br>

                                    <label>2. Glove Weight, Counting, Packaging Defect</label></br></br>
                                   
                                   <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  									<tr>
                                        <td width="20%" class="info">GLOVE WEIGHT:</td>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue" id="optionsRadios2" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue" id="optionsRadios3" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <td><input class="form-control decimal" name="SRText1" placeholder="Enter code" required></td>
 									</tr>
    								<tr>
                                        <td width="20%" class="info">COUNTING:</td>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue2" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue2" id="optionsRadios2" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue2" id="optionsRadios3" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <td><input class="form-control" name="SRText2" placeholder="Enter code" required></td>
  									</tr>
  									<tr>
                                        <td width="20%" class="info">PACKAGING DEFECT:</td>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue3" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue3" id="optionsRadios2" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue3" id="optionsRadios3" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <td><input class="form-control" name="SRTextPackaging" placeholder="Enter code" ></td>
                                    </tr>
  									</table>

                                
                                        
                                </div>
                                      
                            </div>
                                    

                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">


                                <label>3. Internal Physical Testing</label>
                                    
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                    <tr>
                                    <div class="form-group">
                                        <th scope="col" class="info">Layering:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue4" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue4" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input type="radio" name="TestValue4" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">Smelly:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue5" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue5" id="optionsRadios1" value="PASS">PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue5" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="col" class="info">Gripness:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue6" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue6" id="optionsRadios1" value="PASS">PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue6" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>    
                                        <th scope="col" class="info">Black Cloth:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue8" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue8" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue8" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>    
                                    </tr>
                                    
                                    <tr>
                                        <th class="info">Sticking:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue9" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue9" id="optionsRadios1" value="PASS">PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue9" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">Dispensing:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue10" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue10" id="optionsRadios1" value="PASS">PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue10" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="info">White Cloth:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue11" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue11" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue11" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">Dye Leak:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue17" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue17" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue17" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">Sealing:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue18" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue18" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue18" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">Burst Test:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue19" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue19" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue19" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info">Visual & Peel Ability:</th>
                                        <td><label class="checkbox-inline">
                                            <input type="radio" name="TestValue20" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue20" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="radio" name="TestValue20" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                    </tr>
                                </table>                                            
                                
                                    
                                    <table class="table table-bordered">
                                         <tr>
                                         <th style=" vertical-align: middle;" class="info" rowspan="2" width="30%">Donning & Tearing:</th>
                                         <th class="info text-center" width="30%">Result:</th>
                                         <th class="info text-center">Remark:</th>
                                        </tr>

                                        <tr>
                                           <td><label class="checkbox-inline">
                                                <input type="radio" name="TestValue7" id="optionsRadios1" value="N/A" checked>N/A
                                            </label><br>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="TestValue7" id="optionsRadios1" value="PASS">PASS
                                            </label><br>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="TestValue7" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                            <td><input class="form-control" name="SRText8" id="remark_donningtearing" placeholder="Enter text"></td>
                                        </tr>
                                    </table>
                                    
                                <label>4. Special Requirements</label>
                                <br><br>
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  									<tr class="info">
                                        <th >Test No:</th>
                                        <th >Test Name:</th>
                                        <th >Disposition:</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">Test 1:</th>
                                        <td><select class="form-control" id="TestValue12" name="TestValue12">
                                            <option class="form-control" name="TestValue12" value="N/A">N/A</option>
                                            <option class="form-control" name="TestValue12" value="OMT"> OMT</option>
                                            <option class="form-control" name="TestValue12" value="Foaming "> Foaming </option>
                                            <option  class="form-control" name="TestValue12" value="Rubbing"> Rubbing</option>
                                            <option class="form-control" name="TestValue12" value="IPA "> IPA </option>
                                            <option class="form-control" name="TestValue12" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText3" name="SRText3">
                                            <option class="form-control" name="SRText3" value="N/A"> N/A </option>
                                            <option class="form-control" name="SRText3" value="PASS"> PASS</option>
                                            <option class="form-control" name="SRText3" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                        <th scope="col" class="info">Test 2:</th>
                                        <td><select class="form-control" id="TestValue13" name="TestValue13" >
                                            <option class="form-control" name="TestValue13" value="N/A ">N/A</option>
                                            <option class="form-control" name="TestValue13" value="OMT"> OMT</option>
                                            <option class="form-control" name="TestValue13" value="Foaming "> Foaming </option>
                                            <option  class="form-control" name="TestValue13" value="Rubbing"> Rubbing</option>
                                            <option class="form-control" name="TestValue13" value="IPA "> IPA </option>
                                            <option class="form-control" name="TestValue13" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText4" name="SRText4">
                                            <option class="form-control" name="SRText4" value="N/A "> N/A </option>
                                            <option class="form-control" name="SRText4" value="PASS"> PASS</option>
                                            <option class="form-control" name="SRText4" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">Test 3:</th>
                                        <td><select class="form-control" id="TestValue14" name="TestValue14" >
                                            <option class="form-control" name="TestValue14" value="N/A ">N/A</option>
                                            <option class="form-control" name="TestValue14" value="OMT"> OMT</option>
                                            <option class="form-control" name="TestValue14" value="Foaming "> Foaming </option>
                                            <option  class="form-control" name="TestValue14" value="Rubbing"> Rubbing</option>
                                            <option class="form-control" name="TestValue14" value="IPA "> IPA </option>
                                            <option class="form-control" name="TestValue14" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText5" name="SRText5">
                                            <option class="form-control" name="SRText5" value="N/A "> N/A </option>
                                            <option class="form-control" name="SRText5" value="PASS"> PASS</option>
                                            <option class="form-control" name="SRText5" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">Test 4:</th>
                                        <td><select class="form-control" id="TestValue15" name="TestValue15" >
                                            <option class="form-control" name="TestValue15" value="N/A ">N/A</option>
                                            <option class="form-control" name="TestValue15" value="OMT"> OMT</option>
                                            <option class="form-control" name="TestValue15" value="Foaming "> Foaming </option>
                                            <option  class="form-control" name="TestValue15" value="Rubbing"> Rubbing</option>
                                            <option class="form-control" name="TestValue15" value="IPA "> IPA </option>
                                            <option class="form-control" name="TestValue15" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText6" name="SRText6">
                                            <option class="form-control" name="SRText6" value="N/A "> N/A </option>
                                            <option class="form-control" name="SRText6" value="PASS"> PASS</option>
                                            <option class="form-control" name="SRText6" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">Test 5:</th>
                                        <td><select class="form-control" id="TestValue16" name="TestValue16" >
                                            <option class="form-control" name="TestValue16" value="N/A ">N/A</option>
                                            <option class="form-control" name="TestValue16" value="OMT"> OMT</option>
                                            <option class="form-control" name="TestValue16" value="Foaming "> Foaming </option>
                                            <option  class="form-control" name="TestValue16" value="Rubbing"> Rubbing</option>
                                            <option class="form-control" name="TestValue16" value="IPA "> IPA </option>
                                            <option class="form-control" name="TestValue16" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText7" name="SRText7">
                                            <option class="form-control" name="SRText7" value="N/A "> N/A </option>
                                            <option class="form-control" name="SRText7" value="PASS"> PASS</option>
                                            <option class="form-control" name="SRText7" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div><br>
                
<!-----------------------------------------------------------PHYSICAL DIMENSION TEST----------------------------------------------------------->                    
                <div class="row">
                    <div class="col-lg-12">                                              
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Physical Dimensions Test
                            </div>
                        </div> 
                        
                        <div class="col-lg-6">               
                                <table class="table table-bordered" id="dataTable" >
  										<tr>
    									<th scope="col" class="info">METHOD:</th>
    
      									<td><label class="checkbox-inline">
                                                <input type="radio" name="method" id="optionsRadios1" value="SINGLE WALL" checked>SINGLE WALL
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="method" id="optionsRadios1" value="DOUBLE WALL">DOUBLE WALL
                                            </label>
                                        </td>
 										</tr>
                                 </table>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr class="info">
                     
                                        <th>TESTS SAMPLE</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>PASS/FAIL</th>
                                        </tr>
                                        <tr>
                                        <th scope="col" class="info">Length(mm):</th>
                                        
                                        
                                        <td><input class="form-control decimal" name="length1" id="length" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length2" id="length2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length3" id="length3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length4" id="length4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length5" id="length5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length6" id="length6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length7" id="length7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length8" id="length8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length9" id="length9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length10" id="length10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length11" id="length11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length12" id="length12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="length13" id="length13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length" name="length_p_f">
                                            <option class="form-control" name="length_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="length_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="length_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>

                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Width(mm):</th>
                                        
                                        <td><input class="form-control decimal" name="width1" id="width1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width2" id="width2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width3" id="width3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width4" id="width4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width5" id="width5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width6" id="width6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width7" id="width7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width8" id="width8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width9" id="width9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width10" id="width10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width11" id="width11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width12" id="width12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="width13" id="width13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length2" name="width_p_f">
                                            <option class="form-control" name="width_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="width_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="width_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                        
                                         </tr>
                                         
                                         
                                         <tr>
                                        <th scope="col" class="info">Thickness of Cuff(mm):</th>
                                        
                                        <td><input class="form-control decimal" name="cuff1" id="cuff1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff2" id="cuff2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff3" id="cuff3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff4" id="cuff4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff5" id="cuff5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff6" id="cuff6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff7" id="cuff7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff8" id="cuff8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff9" id="cuff9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff10" id="cuff10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff11" id="cuff11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff12" id="cuff12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff13" id="cuff13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length3" name="cuff_p_f">
                                            <option class="form-control" name="cuff_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="cuff_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="cuff_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                        
                                        
                                         </tr>
                                         
                                         <tr>
                                        <th scope="col" class="info">Thickness of Palm(mm):</th>
                                        
                                        <td><input class="form-control decimal" name="palm1" id="palm1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm2" id="palm2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm3" id="palm3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm4" id="palm4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm5" id="palm5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm6" id="palm6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm7" id="palm7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm8" id="palm8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm9" id="palm9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm10" id="palm10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm11" id="palm11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm12" id="palm12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="palm13" id="palm13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length4" name="palm_p_f">
                                            <option class="form-control" name="palm_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="palm_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="palm_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                        
                                        </tr>
                                         
                                        <tr>
                                        <th scope="col" class="info">Thickness of Fingertip(mm):</th>
                                        
                                        <td><input class="form-control decimal" name="fingertip1" id="fingertip1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip2" id="fingertip2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip3" id="fingertip3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip4" id="fingertip4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip5" id="fingertip5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip6" id="fingertip6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip7" id="fingertip7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip8" id="fingertip8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip9" id="fingertip9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip10" id="fingertip10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip11" id="fingertip11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip12" id="fingertip12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="fingertip13" id="fingertip13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length5" name="fingertip_p_f">
                                            <option class="form-control" name="fingertip_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="fingertip_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="fingertip_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                              

                                        </tr>
                                         

                                        <tr>
                                        <th scope="col" class="info">*Thickness of Bead Diameter:</th>
                                        
                                        <td><input class="form-control decimal" name="bead_diameter1" id="bead_diameter1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter2" id="bead_diameter2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter3" id="bead_diameter3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter4" id="bead_diameter4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter5" id="bead_diameter5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter6" id="bead_diameter6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter7" id="bead_diameter7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter8" id="bead_diameter8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter9" id="bead_diameter9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter10" id="bead_diameter10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter11" id="bead_diameter11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter12" id="bead_diameter12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="bead_diameter13" id="bead_diameter13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length6" name="bead_diameter_p_f">
                                            <option class="form-control" name="bead_diameter_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="bead_diameter_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="bead_diameter_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                        
                                         </tr>
                                         
                                         <tr>
                                        <th scope="col" class="info">*Thickness of Cuff Edge:</th>
                                        
                                        <td><input class="form-control decimal" name="cuff_edge1" id="cuff_edge1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge2" id="cuff_edge2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge3" id="cuff_edge3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge4" id="cuff_edge4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge5" id="cuff_edge5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge6" id="cuff_edge6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge7" id="cuff_edge7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge8" id="cuff_edge8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge9" id="cuff_edge9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge10" id="cuff_edge10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge11" id="cuff_edge11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge12" id="cuff_edge12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="cuff_edge13" id="cuff_edge13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length7" name="cuff_edge_p_f">
                                            <option class="form-control" name="cuff_edge_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="cuff_edge_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="cuff_edge_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                    
                                        
                                        </tr>
                                         
                                         <tr>
                                        <th scope="col" class="info">*Glove Weight:</th>
                                        
                                        <td><input class="form-control decimal" name="g_weight1" id="g_weight1" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight2" id="g_weight2" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight3" id="g_weight3" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight4" id="g_weight4" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight5" id="g_weight5" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight6" id="g_weight6" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight7" id="g_weight7" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight8" id="g_weight8" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight9" id="g_weight9" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight10" id="g_weight10" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight11" id="g_weight11" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight12" id="g_weight12" placeholder="" ></td>
                                        <td><input class="form-control decimal" name="g_weight13" id="g_weight13" placeholder="" ></td>
                                        <td>
                                        <select class="form-control" id="result_length8" name="g_weight_p_f">
                                            <option class="form-control" name="g_weight_p_f" value="N/A"> N/A</option>
                                            <option class="form-control" name="g_weight_p_f" value="PASS"> P</option>
                                            <option class="form-control" name="g_weight_p_f" value="FAIL"> F</option>
                                         </select>
                                        </td>
                                    
                                        </tr>
                            </table>
                              	<td>* Upon Customer Request</td>
                              	
                            </div>
                        </div>
                    </div><br>

<!-------------------------------------------------------------INSPECTION RECORD--------------------------------------------------------------->
        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                                 
                      <div class="row">
                <div class="col-lg-12"> 
                     
                            <div class="panel panel-primary">
                        <div class="panel-heading">
                            Inspection Record
                        </div>
                        </div>
                      
                                <div class="col-lg-12">
                                
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                          
                                        
                                        <th scope="col" class="info">MACHINE ID:</th>
                                        <td><input class="form-control" name="machine_id" placeholder="MACHINE ID" ></td>
                                        
                                        <div class="form-group">
                                            <th scope="col" class="info">SAMPLE SIZE VT:</th>
                                            <td><input class="form-control is-valid" name="sample_size" id="sample_size" placeholder="0" type="number" min='0' max='500'></td>
                                        </div>
                                        
                                        <th scope="col" class="info">SAMPLE SIZE APT/WTT:</th>
                                        <td><input class="form-control digit" name="sample_size_apt" id="sample_size_apt" placeholder="0" ></td>
                                        </tr>
                                 </table>
                                
                        <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <br>
                              
       
                                <br>
                                <br>
                                <br>
                                
          <div class="modal-title">
          
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
                              <li style="float: left;"><a class="btn btn-default" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">Show</a></li>
                                  
                                   <iframe height="560px" width="93%" name="iframe_i" href="pdf/QEIM-PQC- Physical Properties TGNAS.pdf" target="iframe_i"></iframe>
                                 </dv>
                                 </div>
                                
                                 

                             <td><b>**Inspection Plan & Level </b><a class = "btn btn-default" 
                             data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td> 
                             <td><b>*Glove Inspection</b></td> 
                               
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr class="info">
                                    <br>
                                        <th></th>
                                        <th>MINOR VISUAL</th>
                                        <th>MAJOR VISUAL</th>
                                        <th>CRITICAL</th>
                                        <th>HOLES LEVEL 1</th>
                                        <th>HOLES LEVEL 2</th>
                                        <th>HOLES LEVEL 3</th>
                                        </tr>
                                        
                                        <tr>
                                        
                                        <th scope="col" class="info">**AQL:</th>
                                        <td><select class="form-control" id="AQL_minor" name="AQL_minor">
                                            <option class="form-control" name="AQL_minor" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_minor" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_minor" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_minor" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_minor" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_minor" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_minor" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_minor" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_minor" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_minor" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_minor" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_minor" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_major" name="AQL_major">
                                            <option class="form-control" name="AQL_major" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_major" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_major" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_major" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_major" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_major" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_major" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_major" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_major" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_major" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_major" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_major" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_critical" name="AQL_critical">
                                            <option class="form-control" name="AQL_critical" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_critical" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_critical" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_critical" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_critical" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_critical" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_critical" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_critical" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_critical" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_critical" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_critical" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_critical" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_holes1" name="AQL_holes1">
                                            <option class="form-control" name="AQL_holes1" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_holes1" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_holes1" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_holes1" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_holes1" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_holes1" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_holes1" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes1" value="6.5"> 6.5</option> 
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_holes2" name="AQL_holes2">
                                            <option class="form-control" name="AQL_holes2" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_holes2" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_holes2" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_holes2" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_holes2" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_holes2" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_holes2" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_holes3" name="AQL_holes3">
                                        <option class="form-control" name="AQL_holes3" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_holes3" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_holes3" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_holes3" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_holes3" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_holes3" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_holes3" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                                         </select></td>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Acceptance:</th>
                                        <td><input class="form-control digit" name="Acceptance_minor" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_major" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_critical" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_holes1" placeholder="0"></td>
                                        <td><input class="form-control digit" name="Acceptance_holes2" placeholder="0"></td>
                                        <td><input class="form-control digit" name="Acceptance_holes3" placeholder="0"></td>
                                        </tr>
                                        
                                     <tr>
                                        <th scope="col" class="info"></th>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#minorModal">MINOR VISUAL</button></td>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#majorModal">MAJOR VISUAL</button></td>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#criticalModal">CRITICAL</button></td>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes1Modal">SELECT HOLES 1</button></td>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes2Modal">SELECT HOLES 2</button></td>
                                        <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes3Modal">SELECT HOLES 3</button></td>
                                        </tr>
                                         
                                        
                                        <!-- CALCULATE TOTAL DEFECT VALUE HERE -->
                                        <tr id="countit">
                                            <th scope="col" class="info">Total Defect</th>
                                            <td><input class="input form-control form-control-lg" name="total_minor" readonly id="total_minor" value="0" ></td>
                                            <td><input class="input form-control form-control-lg" name="total_major" readonly id="total_major" value="0" ></td>
                                            <td><input class="input form-control form-control-lg" name="total_critical" readonly id="total_critical" value="0" ></td>
                                            <td><input class="input form-control form-control-lg amount9" name="total_holes1" readonly id="total_holes1" value="0"></td>
                                            <td><input class="input form-control form-control-lg amount9" name="total_holes2" readonly id="total_holes2" value="0"></td>
                                            <td><input class="input form-control form-control-lg amount9" name="total_holes3" readonly id="total_holes3" value="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">Grand Total Defect</th>
                                            <td colspan="6">
                                                <input class="input form-control form-control-lg" name="total_defect" readonly id="total_defect" placeholder="">
                                            </td>
                                        </tr>
                                  </table>

                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        
                                        <th scope="col" class="info">Total Barrier Holes:</th>
                                        <td><input class="form-control result digit" name="total_holes" id="total_holes_t" placeholder="" ></td>

                                        <th scope="col" class="info">Overall AQL:</th>
                                        <td><select class="form-control" id="P/f" name="overall_AQL">
                                            <option class="form-control" name="overall_AQL" value="N/A"> N/A</option>
                                            <option class="form-control" name="overall_AQL" value="0.065"> 0.065</option>
                                            <option class="form-control" name="overall_AQL" value="0.10"> 0.10</option>
                                            <option class="form-control" name="overall_AQL" value="0.15"> 0.15</option>
                                            <option class="form-control" name="overall_AQL" value="0.25"> 0.25</option>
                                            <option class="form-control" name="overall_AQL" value="0.40"> 0.40</option>
                                            <option class="form-control" name="overall_AQL" value="0.65"> 0.65</option>
                                            <option class="form-control" name="overall_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="overall_AQL" value="1.5"> 1.5</option>
                                            <option class="form-control" name="overall_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="overall_AQL" value="4.0"> 4.0</option>
                                            <option class="form-control" name="overall_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                        
                                         <?php
                                            $sql="SELECT * FROM M_UDResult";
                                            $query= $connect->exec($sql); 
                                         ?>

                                          <th scope="col" class="info">UD Disposition:</th>
                                          <td>
                                          <select class="form-control" id="UDResultKey" name="UDResultKey" >
                                          <?php    
                                          foreach ($connect -> query($sql) as $row){?>
                                          <option value="<?php echo $row['UDResultKey']; ?>"> <?php echo $row['UDResultCode']; ?> </option> 
                                          <?php }?>     
                                          </select>
                                          </td>
                                        </tr>
                                 </table>

                                <td><b>*Product Packaging Inspection (Surgical)</b></td>
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr class="info">
                                    <br>
                                        <th></th>
                                        <th>REGULATORY PACKAGING</th>
                                        <th>CRITICAL PACKAGING</th>
                                        <th>VISUAL PACKAGING</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </tr>
                                        
                                        <tr>
                                        
                                        <th scope="col" class="info">**AQL:</th>
                                        <td><select class="form-control" id="AQL_regulatorypackaging" name="AQL_regulatorypackaging">
                                            <option class="form-control" name="AQL_regulatorypackaging" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_regulatorypackaging" value="6.5"> 6.5</option>
                                            </select>
                                        </td>

                                        <td><select class="form-control" id="AQL_criticalpackaging" name="AQL_criticalpackaging">
                                            <option class="form-control" name="AQL_majorpackaging" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_majorpackaging" value="6.5"> 6.5</option>
                                            </select>
                                        </td>
                                         
                                        <td><select class="form-control" id="AQL_visualpackaging" name="AQL_visualpackaging">
                                            <option class="form-control" name="AQL_criticalpackaging" value="N/A"> N/A</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.065"> 0.065</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.10"> 0.10</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.15"> 0.15</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.25"> 0.25</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.40"> 0.40</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="0.65"> 0.65</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_criticalpackaging" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        
                                         
                                        <td><select class="form-control" id="AQL_holes1" name="AQL_holes1" disabled>
                                            <option class="form-control" name="AQL_holes1" value="0.65"> </option>
                                            <option class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes1" value="6.5"> 6.5</option> 
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_holes2" name="AQL_holes2" disabled>
                                            <option class="form-control" name="AQL_holes2" value="0.65"> </option>
                                            <option class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                                        <td><select class="form-control" id="AQL_holes3" name="AQL_holes3" disabled>
                                            <option class="form-control" name="AQL_holes3" value="0.65"> </option>
                                            <option class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                                            <option class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                                            <option class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                                            <option class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                                            <option class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                                         </select></td>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Acceptance:</th>
                                        <td><input class="form-control digit" name="Acceptance_regulatorypackaging" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_majorpackaging" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_criticalpackaging" placeholder="0" ></td>
                                        <td><input class="form-control digit" name="Acceptance_holes1" placeholder="" disabled></td>
                                        <td><input class="form-control digit" name="Acceptance_holes2" placeholder="" disabled></td>
                                        <td><input class="form-control digit" name="Acceptance_holes3" placeholder="" disabled></td>
                                        </tr>
                                        
                                     <tr>
                                        <th scope="col" class="info"></th>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#regulatoryPackagingModal">REGULATORY PACKAGING</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#visualPackagingModal">CRITICAL PACKAGING</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#criticalPackagingModal">VISUAL PACKAGING</a></center></td>
                                        <td><input class="form-control" disabled></td>
                                        <td><input class="form-control" disabled></td>
                                        <td><input class="form-control" disabled></td>
                                        </tr>
                                         
                                          <tr>
                                        <th scope="col" class="info">Result</th>
                                        <td><select class="form-control" id="Result_Regulatory" name="Result_Regulatory">
                                            <option class="form-control" name="Result_Regulatory" value="N/A"> N/A</option>
                                            <option class="form-control" name="Result_Regulatory" value="PASS"> PASS</option>
                                            <option class="form-control" name="Result_Regulatory" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="Result_Critical" name="Result_Critical">
                                            <option class="form-control" name="Result_Critical" value="N/A"> N/A</option>
                                            <option class="form-control" name="Result_Critical" value="PASS"> PASS</option>
                                            <option class="form-control" name="Result_Critical" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="Result_Visual" name="Result_Visual">
                                            <option class="form-control" name="Result_Visual" value="N/A"> N/A</option>
                                            <option class="form-control" name="Result_Visual" value="PASS"> PASS</option>
                                            <option class="form-control" name="Result_Visual" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                         
                                        <td><input class="form-control" name="total_holes1" placeholder="" disabled></td>
                                        <td><input class="form-control" name="total_holes2" placeholder="" disabled></td>
                                        <td><input class="form-control" name="total_holes3" placeholder="" disabled></td>
                                        </tr>
                                  </table>
                                  
                                  
                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">FINAL DISPOSITION:</th>
                                        <td><label class="checkbox-inline">
                                                <input type="radio" name="final_disposition" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="final_disposition" id="optionsRadios1" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        </tr>
                                 </table>
                                
                                 </div>
                              
                              
    <div class="modal fade" id="minorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Minor Visual</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">DB:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="DB" placeholder="0" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" ></td>
                                        
                                        <th scope="col" class="info">SD:</th>
                                        <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SP:</th>
                                        <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SP" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">STNs:</th>
                                        <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STNs" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SLDs:</th>
                                        <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SLDs" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">Ls:</th>
                                        <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="Ls" placeholder="0"></td>
                                        </tr>
                                 </table>
            </div>
        </div>
    </div> 
                                   
 <div class="modal fade" id="majorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Major Visual</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
            
                <tr>
                    <th scope="col" class="info">CA:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CA" placeholder="0"></td>
                    
                    <th scope="col" class="info">CL:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CL" placeholder="0"></td>
                    
                    <th scope="col" class="info">CLD:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CLD" placeholder="0"></td>
                    
                    <th scope="col" class="info">CS:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CS" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">DF:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DF" placeholder="0"></td>
                        
                    <th scope="col" class="info">DT:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DT" placeholder="0"></td>
                    
                    <th scope="col" class="info">EFI:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="EFI" placeholder="0"></td>
                    
                    <th scope="col" class="info">FM:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FM" placeholder="0"></td>
                    </tr>
        
                <tr>
                    <th scope="col" class="info">FNO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FNO" placeholder="0"></td>
                    
                    <th scope="col" class="info">FO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FO" placeholder="0"></td>
                        
                    <th scope="col" class="info">GNO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GNO" placeholder="0"></td>
                
                    <th scope="col" class="info">IB:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IB" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">ICT:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="ICT" placeholder="0"></td>
                        
                    <th scope="col" class="info">L:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_Major" placeholder="0"></td>
                    
                    <th scope="col" class="info">LS:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LS" placeholder="0"></td>

                    <th scope="col" class="info">PMI:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PMI" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">PMO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PMO" placeholder="0"></td>
                
                    <th scope="col" class="info">PLM:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PLM" placeholder="0"></td>
                    
                    <th scope="col" class="info">RM:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RM" placeholder="0"></td>

                    <th scope="col" class="info">RC:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RC" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">SAG:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SAG" placeholder="0"></td>
                    
                    <th scope="col" class="info">SG:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SG" placeholder="0"></td>
                        
                    <th scope="col" class="info">SHN:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SHN" placeholder="0"></td>

                    <th scope="col" class="info">SI:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SI" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">SKV:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SKV" placeholder="0"></td>

                    <th scope="col" class="info">SLD:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SLD" placeholder="0"></td>
                    
                    <th scope="col" class="info">SO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SO" placeholder="0"></td>
                    
                    <th scope="col" class="info">STK:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STK" placeholder="0"></td>
                </tr>

                <tr>
                    <th scope="col" class="info">STN:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STN" placeholder="0"></td>
                    
                    <th scope="col" class="info">TA:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TA" placeholder="0"></td>
                    
                    <th scope="col" class="info">TS:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TS" placeholder="0"></td>
                    
                    <th scope="col" class="info">UNF:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="UNF" placeholder="0"></td>
                </tr>


                <tr>
                    <th scope="col" class="info">WL:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WL" placeholder="0"></td>

                    <th scope="col" class="info">WSI:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WSI" placeholder="0"></td>

                    <th scope="col" class="info">WSO:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WSO" placeholder="0"></td>
                    
                    <th scope="col" class="info">GF:</th>
                    <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GF" placeholder="0"></td>
                </tr>       
            </table>

            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
        
                <tr>
                <th scope="col" class="info">BP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BP" placeholder="0"></td>
                
                <th scope="col" class="info">DP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DP" placeholder="0"></td>
                
                <th scope="col" class="info">DSP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DSP" placeholder="0"></td>
                
                <th scope="col" class="info">DTP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DTP" placeholder="0"></td>
                </tr>

                <tr>
                <th scope="col" class="info">IA:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IA" placeholder="0"></td>
                
                <th scope="col" class="info">IFS:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IFS" placeholder="0"></td>
                
                <th scope="col" class="info">IP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IP_MAJOR" placeholder="0"></td>
                
                <th scope="col" class="info">OP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="OP" placeholder="0"></td>
                </tr>

                <tr>
                <th scope="col" class="info">RP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RP" placeholder="0"></td>
                
                <th scope="col" class="info">SH:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SH" placeholder="0"></td>
                
                <th scope="col" class="info">SMP:</th>
                <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SMP" placeholder="0"></td>
                </tr>
            </table>
                                 
          </div>
                                  </div>
                                  </div>
                                  </div>
                                   
    <div class="modal fade" id="criticalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Critical</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                    <tr>
                                        <th scope="col" class="info">BPC:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BPC" placeholder="0"></td>

                                        <th scope="col" class="info">CR:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CR" placeholder="0"></td>

                                        <th scope="col" class="info">DC:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DC" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">DD:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">DIS:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DIS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FMT:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FMT" placeholder="0"></td>

                                    </tr>
                                        <th scope="col" class="info">L:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L" placeholder="0"></td>
                                    
                                        <th scope="col" class="info">GL:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GL" placeholder="0"></td>
 
                                        <th scope="col" class="info">MP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MP" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">NB:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NB" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">NF:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NF" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TW:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TW" placeholder="0"></td>
                                    </tr>   

                                    <tr>
                                        <th scope="col" class="info">WE:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WE" placeholder="0"></td>
                           
                                        <th scope="col" class="info">WG:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WG" placeholder="0"></td>

                                        <th scope="col" class="info">PGM:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PGM" placeholder="0"></td> 
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">SDG:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SDG" placeholder="0"></td>

                                        <th scope="col" class="info">URD:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="URD" placeholder="0"></td>

                                        <th scope="col" class="info">MS:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MS_critical" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">PFK:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PFK" placeholder="0"></td>

                                    </tr>
                                </table>

                                <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">ICP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="ICP" placeholder="0"></td>
                                     
                                        <th scope="col" class="info">NP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NP" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WP" placeholder="0"></td>
                                        </tr> 

                                        <tr>
                                        <th scope="col" class="info">GSH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GSH" placeholder="0"></td>
                                        </tr> 
                                </table>

                                <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">TH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TH" placeholder="0"></td>

                                        <th scope="col" class="info">TR:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TR" placeholder="0"></td>

                                        <th scope="col" class="info">TAH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAH" placeholder="0"></td>
                                    </tr> 
                                    <tr>
                                        <th scope="col" class="info">MF:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MF" placeholder="0"></td>

                                        <th scope="col" class="info">CH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CH" placeholder="0"></td>

                                        <th scope="col" class="info">FK:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FK" placeholder="0"></td>
                                    </tr>
                                </table>
                            
                </div>
            </div>
         </div>
       </div>
                                   
                                   
    <div class="modal fade" id="holes1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 1</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                            <th scope="col" class="info">BF:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BF" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="P" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CF" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SF" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAHs" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKS" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="THs" placeholder="0"></td>
                                        
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FT" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TRS" placeholder="0"></td>
                                        
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GB" placeholder="0"></td>
                                        </tr>
                                
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CHs" placeholder="0"></td>

                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_HOLES1" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LH" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MH" placeholder="0"></td>
                                        </tr>
                                 </table>
                                   
                                    </div>
                                  </div>
                                  </div>
                                  </div>
                                   
    <div class="modal fade" id="holes2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 2</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                               <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                            <th scope="col" class="info">BF:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BF_2" placeholder="0"></td>
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="P_2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CF_2" placeholder="0"></td>
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SF_2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAHs_2" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKS_2" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="THs_2" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FT_2" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>      
                                            <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TRS_2" placeholder="0"></td>
                                           
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GB_2" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CHs_2" placeholder="0"></td>
                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_HOLES2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LH_2" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MH_2" placeholder="0"></td>
                                        </tr>
    

                                        
                                 </table>
                                   </div>
                                  </div>
                                  </div>
                                  </div>
                                   
    <div class="modal fade" id="holes3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 3</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                 <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                            <th scope="col" class="info">BF:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BF_3" placeholder="0"></td>
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="P_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CF_3" placeholder="0"></td>
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SF_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAHs_3" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKS_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="THs_3" placeholder="0"></td>
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FT_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TRS_3" placeholder="0"></td>
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GB_3" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CHs_3" placeholder="0"></td>
                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_HOLES3" placeholder="0"></td>
                                        </tr> 

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LH_3" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MH_3" placeholder="0"></td>
                                        </tr>      
                                 </table>
                                    </div>
              
                                  </div>
                                  </div>
                                  </div>


    <div class="modal fade" id="regulatoryPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Regulatory Packaging</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">WLN:</th>
                                        <td><input class="form-control" name="WLN" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WMD:</th>
                                        <td><input class="form-control" name="WMD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WED:</th>
                                        <td><input class="form-control" name="WED" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPC:</th>
                                        <td><input class="form-control" name="WPC" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MM:</th>
                                        <td><input class="form-control" name="MM" placeholder="0"></td>

                                        <th scope="col" class="info">IP:</th>
                                        <td><input class="form-control" name="IP" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
            </div>
        </div>
    </div> 

    <div class="modal fade" id="visualPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Critical Packaging</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">WQ:</th>
                                        <td><input class="form-control" name="WQ" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MS:</th>
                                        <td><input class="form-control" name="MS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MB:</th>
                                        <td><input class="form-control" name="MB" placeholder="0"></td>

                                        <th scope="col" class="info">MLN:</th>
                                        <td><input class="form-control" name="MLN" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WGS:</th>
                                        <td><input class="form-control" name="WGS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WGT:</th>
                                        <td><input class="form-control" name="WGT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WGA:</th>
                                        <td><input class="form-control" name="WGA" placeholder="0"></td>

                                        <th scope="col" class="info">OS:</th>
                                        <td><input class="form-control" name="OS" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WTS:</th>
                                        <td><input class="form-control" name="WTS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">PTS:</th>
                                        <td><input class="form-control" name="PTS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WPO:</th>
                                        <td><input class="form-control" name="WPO" placeholder="0"></td>

                                        <th scope="col" class="info">DMG:</th>
                                        <td><input class="form-control" name="DMG" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">MSG:</th>
                                        <td><input class="form-control" name="MSG" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FC:</th>
                                        <td><input class="form-control" name="FC" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">POS:</th>
                                        <td><input class="form-control" name="POS" placeholder="0"></td>

                                        <th scope="col" class="info">BC:</th>
                                        <td><input class="form-control" name="BC" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPD:</th>
                                        <td><input class="form-control" name="WPD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MSI:</th>
                                        <td><input class="form-control" name="MSI" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TRP:</th>
                                        <td><input class="form-control" name="TRP" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
            </div>
        </div>
    </div> 

    <div class="modal fade" id="criticalPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Visual Packaging</h2>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">WT:</th>
                                        <td><input class="form-control decimal" name="WT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">CT:</th>
                                        <td><input class="form-control decimal" name="CT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">POP:</th>
                                        <td><input class="form-control decimal" name="POP" placeholder="0"></td>

                                        <th scope="col" class="info">FG:</th>
                                        <td><input class="form-control decimal" name="FG" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">PIS:</th>
                                        <td><input class="form-control decimal" name="PIS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MSA:</th>
                                        <td><input class="form-control decimal" name="MSA" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WIS:</th>
                                        <td><input class="form-control decimal" name="WIS" placeholder="0"></td>

                                        <th scope="col" class="info">DT:</th>
                                        <td><input class="form-control decimal" name="DT_PACKING" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
            </div>
        </div>
    </div> 

                <div class="col-lg-6">
                        <div>

                        <div class="panel-body">
                                <div class="table-responsive">
                                <?php 
                                    $query = $connect->prepare("SELECT DISTINCT VerifierID FROM T_Record_Master");
                                    $query->execute();
                                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                 <div class="form-group">
                                 Verified by: <input class="form-control" type="number" name="verify_by" placeholder="Enter Badge ID" list="verify_by"><br>     
                                    <datalist id="verify_by">
                                        <?php foreach ($fetch as $row) { ?>
                                            <option name="verify_by" value="<?php echo $row['VerifierID'];?>"><?php echo $row['VerifierID']; }?></option>
                                        </datalist>   
                                   </div>

                                   <div class="form-group">
                                   Date:<input class="form-control" type="datetime" name="date_verify"  value="<?php echo date('d/m/Y h:i A'); ?>"><br>     
                                   </div>

                                   </div>
                        </div>
                </div>
        </div>
            
                                                              
   
                        
                        <!-- /.panel-heading -->
                        
                                    
                                   <center><button type="submit" name="submit" class="btn btn-primary">SAVE</button></center></br>
                                           
                                        <!--<a href="production_detail.php" class="btn btn-primary"> Next</a>-->

                                
                                </form>
                            

             
        </div>
    </div>

    <!-- Modal: Display when total defect more than sample size, resets all fields-->
    <div class="modal fade" id="errorModal" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger">
                <strong> Total defect value more than sample size. Please enter again. </strong>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    </div>
                            
    
    <?php include 'transaction.php'?>
    
 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                

                                </div></div></div>
                                <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
            <label>Copyright © 2020 by QA PQC SQUAD V2.2</label>
          </div>
        </div>
      </footer>
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
            
            
        
        <!-- /#page-wrapper -->
    
    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <!-- Script to check Existence of Batch Number -->
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#BatchNumber").keyup(function(){
        var BatchNumber = $(this).val().trim();
        if (BatchNumber != ''){

            $("#checkk").show();

            $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {BatchNumber:BatchNumber},
            success: function(html){
                var html = html.trim();

                if (html == "Already exist"){
                    $("#checkk").html("<span style='color:red;'>Already exist</span>");
                    //$("#BatchNumber").val("");
                } else if (html == "Available"){
                    $("#checkk").html("<span style='color:green;'>Available</span>");
                }
            }
            });
        } else {
            $("#checkk").hide();
        }
        });
        });
    </script>

</body>

<script type="text/javascript">
    function minmax(value, min, max) 
    {
        if(parseInt(value) < min || isNaN(parseInt(value))) 
            return min; 
        else if(parseInt(value) > max)  
            return "";
        else return value;
    }
</script>

<script>
    $(".digit").on("keypress keyup blur",function (event) {    
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
    }
    });
</script>

<script src="function.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>


</html>