<?php
ini_set('memory_limit', '1024M');
    require_once 'database_connection.php';
    require_once 'session_staff.php';
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
                <a class="navbar-brand" href="page(worker).php">TOP GLOVE</a>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">QUALITY RECORD E SYSTEM (QREX-REINSPEC) </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

<!------------------------------------------------------- PRODUCT INFORMATION -------------------------------------------------->            
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Product Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                
                                        $query = $connect->prepare("SELECT T_Lot_Master.LotIDKey, T_Lot_Master.LotCreatedUserID, T_Lot_FG.PlantKey,T_Record_Master.RecordCreatedDateTime,T_Record_Master.InspectionUserID, T_Lot_FG.BatchNumber, T_Lot_FG.CartonQuantity, T_Lot_FG.SONumber, T_Lot_FG.LotNumber, T_Lot_FG.InspectionPlanKey, T_Lot_FG.Customer, T_Lot_FG.Brand, T_Lot_CartonNum.CartonNum,  T_Lot_Master.LotCreatedDate, M_GloveSize.GloveSizeKey, T_Lot_GloveProductType.GloveProductTypeKey, T_Lot_ProductionDateWLine.Shift, M_GloveCode.GloveCodeKey, M_GloveColour.GloveColourKey, T_Lot_PackingDate.PackingDate, DimProductionLine.ProductionLineKey, T_Lot_FG.PalletNumber, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Master.RecordID, T_Record_Master.InspectionCount, T_Record_Master.VerifierID, T_Record_Master.VerifiedDate, T_Record_UDResult.UDResultKey, T_Record_Instrument.InstrumentValue,T_Record_Instrument.InstrumentValue  
                                            FROM T_Lot_Master RIGHT JOIN T_Lot_FG ON T_Lot_Master.LotIDKey = T_Lot_FG.LotIDKey 
                                            FULL JOIN DimPlant ON T_Lot_FG.PlantKey = DimPlant.PlantKey 
                                            FULL JOIN T_Lot_CartonNum ON T_Lot_Master.LotIDKey = T_Lot_CartonNum.LotIDKey 
                                            FULL JOIN T_Lot_ProductionDateWLine ON T_Lot_Master.LotIDKey = T_Lot_ProductionDateWLine.LotIDKey 
                                            FULL JOIN DimProductionLine ON T_Lot_ProductionDateWLine.ProductionLineKey = DimProductionLine.ProductionLineKey 
                                            FULL JOIN T_Lot_GloveCode ON T_Lot_Master.LotIDKey = T_Lot_GloveCode.LotIDKey 
                                            FULL JOIN T_Lot_GloveProductType ON T_Lot_Master.LotIDKey = T_Lot_GloveProductType.LotIDKey 
                                            FULL JOIN M_GloveCode ON T_Lot_GloveCode.GloveCodeKey = M_GloveCode.GloveCodeKey 
                                            FULL JOIN T_Lot_GloveSize ON T_Lot_Master.LotIDKey = T_Lot_GloveSize.LotIDKey 
                                            FULL JOIN M_GloveSize ON T_Lot_GloveSize.GloveSizeKey = M_GloveSize.GloveSizeKey
                                            FULL JOIN T_Lot_GloveColour ON T_Lot_Master.LotIDKey = T_Lot_GloveColour.LotIDKey 
                                            FULL JOIN M_GloveColour ON T_Lot_GloveColour.GloveColourKey = M_GloveColour.GloveColourKey
                                            FULL JOIN T_Lot_PackingDate ON  T_Lot_Master.LotIDKey = T_Lot_PackingDate.LotIDKey
                                            FULL JOIN T_Record_Master ON T_Lot_Master.LotIDKey = T_Record_Master.LotIDKey 
                                            FULL JOIN T_Record_Test ON T_Record_Master.RecordID = T_Record_Test.RecordID 
                                            FULL JOIN T_Record_UDResult ON T_Record_Master.RecordID = T_Record_UDResult.RecordID
                                            FULL JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID WHERE T_Lot_Master.LotIDKey = '".$_GET['LotIDKey']."'");
                                            //$query = $connect->prepare("SELECT * FROM T_Lot_SFG");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($fetch as $get) {}
                                        ?>
<!------------------------------------------------------- LotIDKey ------------------------------------------------------------->
                                    <form role="form" method ="post">

                                            <input type="hidden" class="form-control" name="LotIDKey" id="LotIDKey" placeholder="Enter LotIDKey" value="<?php echo $get['LotIDKey']?>" readonly>  
<!------------------------------------------------------- Factory -------------------------------------------------------------->
                                        <div>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM DimPlant");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         
                                            <th scope="col" class="info"><label>Factory:</label>
                                            <td><select class="form-control" id="PlantKey" name="PlantKey" disabled="disabled"></td>
                                                <option class="form-control" name="PlantKey" value=""> Choose Factory</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option <?php if ($get['PlantKey'] == $row['PlantKey']) { echo "selected";} ?>   value="<?php echo $row['PlantKey'];?>"><?php echo $row['PlantName']; }?></option>
                                                </select>
                                            </td>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="PlantKey" id="PlantKey" value="<?php echo $get['PlantKey']?>" readonly>
                                        </div><br>
<!------------------------------------------------------- Date ----------------------------------------------------------------->
                                        <div class="form-group">
                                            <label>Inspection Date:</label><br>
                                            <?php $date = date("Y-m-d\TH:i:s", strtotime($get['RecordCreatedDateTime'])); ?>
                                            <input class="form-control" type="datetime-local" name="RecordCreatedDateTime" id="RecordCreatedDateTime" value="<?php echo $date;?>" >          
                                        </div>
<!------------------------------------------------------- Batch Number --------------------------------------------------------->
                                        <div class="form-group">
                                            <label>Batch No:</label>
                                            <input class="form-control" name="BatchNumber" id="BatchNumber" placeholder="Enter Batch No" value="<?php echo $get['BatchNumber'];?>" readonly>
                                        </div>
<!------------------------------------------------------- Category ------------------------------------------------------------->
                                        <div class="form-group">
                                            <?php 
                                                $query = $connect->prepare("SELECT * FROM M_InspectionPlan");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <label>Category:</label></br>
                                            <td><select class="form-control" id="InspectionPlanKey" name="InspectionPlanKey" disabled="disabled"></td>
                                                <option class="form-control" name="InspectionPlanKey" value=""> Category</option>
                                                    <?php foreach ($fetch as $row) { ?>
                                                <option <?php if ($get['InspectionPlanKey'] == $row['InspectionPlanKey']) { echo "selected";} ?> value="<?php echo $row['InspectionPlanKey'];?>"><?php echo $row['InspectionPlanName']; }?></option>
                                                </select>
                                            </td>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="InspectionPlanKey" id="InspectionPlanKey" value="<?php echo $get['InspectionPlanKey']?>" readonly>
                                        </div>

<!------------------------------------------------------- Size ----------------------------------------------------------------->
                                        <div>
                                            <?php 
                                                $query = $connect->prepare("SELECT * FROM M_GloveSize");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <th scope="col" class="info"><label>Size:</label></th>
                                                <td><select class="form-control" id="GloveSizeKey" name="GloveSizeKey" disabled="disabled">
                                                        <option class="form-control" name="GloveSizeKey" value="" > Size</option>
                                                        <?php foreach ($fetch as $row) { ?>
                                                        <option <?php if ($get['GloveSizeKey'] == $row['GloveSizeKey']) { echo "selected";} ?> value="<?php echo $row['GloveSizeKey'];?>"><?php echo $row['GloveSizeCodeLong']; }?></option>
                                                    </select>
                                                </td>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="GloveSizeKey" id="GloveSizeKey" value="<?php echo $get['GloveSizeKey']?>" readonly>
                                        </div><br>

<!------------------------------------------------------- Pallet No ------------------------------------------------------------>
                                        <div class="form-group">
                                            <label>Pallet NO:</label>
                                            <input class="form-control" name="PalletNumber" id="PalletNumber" placeholder="Enter Pallet No" value="<?php echo $get['PalletNumber'];?>" readonly>  
                                        </div><br>

<!------------------------------------------------------- Inspection Level ----------------------------------------------------->
                                        <div class="form-group">
                                            <label>Inspection Count: </label>
                                            <input type="number" class="form-control" name="InspectionCount" id="InspectionCount" placeholder="Enter No" value="<?php echo $get['InspectionCount'];?>"  onkeyup="checkcount()">
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

<!------------------------------------------------------- Quantity Bag --------------------------------------------------------->
                                        <div class="form-group">
                                            <label>QUANTITY CTN/BAG</label>
                                                <input type="number" class="form-control" name="CartonQuantity" id="CartonQuantity" placeholder="Enter text" value="<?php echo $get['CartonQuantity'];?>" readonly>
                                        </div>

<!------------------------------------------------------- Carton Number -------------------------------------------------------->
                                        <div class="form-group">
                                            <label>CARTON NUMBER</label> 
                                            <input class="form-control" name="CartonNum" id="CartonNum" placeholder="Enter Carton No" value="<?php echo $get['CartonNum'];?>" >
                                        </div><br>

                                        <?php 
                                            $query = $connect->prepare("SELECT RecordID,RecordStatusFlag FROM T_Record_Master");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>

                                    <?php 
                                        foreach ($fetch as $row) { if ($get['RecordID'] == $row['RecordID']) { ?>

                                        <div class="form-group">
                                            <label>Status:</label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($row['RecordStatusFlag'] == '1') { echo "checked";}?> type="radio" name="RecordStatusFlag" id="optionsRadios1" value="1">N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($row['RecordStatusFlag'] == '2') { echo "checked";}?> type="radio" name="RecordStatusFlag" id="optionsRadios2" value="2">Reinspect
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($row['RecordStatusFlag'] == '3') { echo "checked";}?> type="radio" name="RecordStatusFlag" id="optionsRadios3" value="3">Convert Inspection
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($row['RecordStatusFlag'] == '4') { echo "checked";}?> type="radio" name="RecordStatusFlag" id="optionsRadios4" value="4">Repack Inspection
                                            </label>
                                        </div><br>
                                        <?php } } ?>
                                </div>
<!------------------------------------------------------- Customer ------------------------------------------------------------->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <th scope="col" class="info"><label>Customer:</label></th>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_Customer");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="Customer" name="Customer" disabled="disabled">
                                            <option class="form-control" name="" value=""> </option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['Customer'] == $row['CustomerName']) { echo "selected";} ?> value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
                                            </select>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="Customer" id="Customer" value="<?php echo $get['Customer']?>" readonly>
                                    </div>

<!------------------------------------------------------- Brand ---------------------------------------------------------------->
                                    <th scope="col" class="info"><label>Brand:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_Brand");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="Brand" name="Brand" disabled="disabled">
                                            <option class="form-control" name="" value=""> </option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['Brand'] == $row['BrandName']) { echo "selected";} ?> value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
                                            </select>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="Brand" id="Brand" value="<?php echo $get['Brand']?>" readonly>
                                        <br>
                                    
<!------------------------------------------------------- SO No ---------------------------------------------------------------->
                                    <div class="form-group">
                                        <label>SO NO:</label>
                                        <input type="text" class="form-control" name="SONumber" id="SONumber" placeholder="Enter SO Number" value="<?php echo $get['SONumber'];?>" readonly>
                                    </div>

<!------------------------------------------------------- Lot No --------------------------------------------------------------->
                                    <div class="form-group">
                                        <label>LOT NO:</label>
                                        <input type="text" class="form-control" name="LotNumber" placeholder="Enter Lot No" value="<?php echo $get['LotNumber'];?>" readonly>
                                    </div>

<!------------------------------------------------------- Product ------------------------------------------------------------->
                                        <th scope="col" class="info"><label>Product:</label></th>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveProductType");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="GloveProductTypeKey" name="GloveProductTypeKey" disabled="disabled">
                                            <option class="form-control" name="GloveProductTypeKey" value=""> Product</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveProductTypeKey'] == $row['GloveProductTypeKey']) { echo "selected";} ?> name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeKey'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
                                            </select>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="GloveProductTypeKey" id="GloveProductTypeKey" value="<?php echo $get['GloveProductTypeKey']?>" readonly>
                                        <br>
                                        
<!------------------------------------------------------- Product Code --------------------------------------------------------->
                                        <th scope="col" class="info"</th><label>Product Code:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveCode");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="GloveCodeKey" name="GloveCodeKey" disabled="disabled">
                                            <option class="form-control" name="GloveCodeKey" value="">Product Code</option>
                                        <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveCodeKey'] == $row['GloveCodeKey']) { echo "selected";} ?> name="GloveCodeKey" value="<?php echo $row['GloveCodeKey'];?>"><?php echo $row['GloveCodeLong']; }?></option> 
                                            </select>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="GloveCodeKey" id="GloveCodeKey" value="<?php echo $get['GloveCodeKey']?>" readonly><br>
                                        
<!------------------------------------------------------- Colour ------------------------------------------------------------->
                                        <th scope="col" class="info"</th><label>Colour:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveColour");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="GloveColourKey" name="GloveColourKey" disabled="disabled">
                                            <option class="form-control" name="GloveColourKey" value=""> Colour</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveColourKey'] == $row['GloveColourKey']) { echo "selected";} ?> name="GloveColourKey" value="<?php echo $row['GloveColourKey'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="GloveColourKey" id="GloveColourKey" value="<?php echo $get['GloveColourKey']?>" readonly>
                                        <br>

<!------------------------------------------------------- Production Line & Shift ---------------------------------------------->
                                        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                        
                                            <tr class="info">
                                                <th class="text-center" colspan="2">Production:</th>
                                                <th class="text-center">Shift:</th>
                                            </tr>
                                            <?php 
                                            $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <tr>
                                                <td><select class="form-control" id="ProductionLineKey1" name="ProductionLineKey1" >
                                                    <?php
                                                        foreach ($fetch as $row) { 
                                                            if ($row['ProductionKey'] == '1') {
                                                            $query = $connect->prepare("SELECT * FROM DimProductionLine");
                                                            $query->execute();
                                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                                     ?>
                                                    <option class="form-control" name="ProductionLineKey1" value=""> Production Line</option>
                                                    <?php foreach ($fetch as $data) { ?>
                                                    <option <?php if ($row['ProductionLineKey'] == $data['ProductionLineKey']) { echo "selected";} ?> name="ProductionLineKey1" value="<?php echo $data['ProductionLineKey'];?>"><?php echo $data['ProductionLineName']; }?></option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="ProductionLineKey1" id="ProductionLineKey1" value="<?php echo $row['ProductionLineKey']?>" readonly>
                                                </td>
                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date1" id="product_date1" value="<?php echo $ProductDate;?>" ></td>

                                                <td><select class="form-control" id="shift1" name="shift1" >
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift1" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift1" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift1" value="3"> Shift 3 </option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="shift1" id="shift1" value="<?php echo $row['Shift']?>" >
                                                </td>
                                                <?php } }?>
                                            </tr>

                                            <?php 
                                            $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <tr>
                                                <td><select class="form-control" id="ProductionLineKey2" name="ProductionLineKey2" >
                                                    <?php
                                                        foreach ($fetch as $row) { 
                                                            if ($row['ProductionKey'] == '2') {
                                                            $query = $connect->prepare("SELECT * FROM DimProductionLine");
                                                            $query->execute();
                                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                                     ?>
                                                    <option class="form-control" name="ProductionLineKey2" value=""> Production Line</option>
                                                    <?php foreach ($fetch as $data) { ?>
                                                    <option <?php if ($row['ProductionLineKey'] == $data['ProductionLineKey']) { echo "selected";} ?> name="ProductionLineKey2" value="<?php echo $data['ProductionLineKey'];?>"><?php echo $data['ProductionLineName']; }?></option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="ProductionLineKey2" id="ProductionLineKey2" value="<?php echo $row['ProductionLineKey']?>">
                                                </td>

                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date2" id="product_date2" value="<?php echo $ProductDate;?>" ></td>

                                                <td><select class="form-control" id="shift2" name="shift2" >
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift2" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift2" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift2" value="3"> Shift 3 </option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="shift2" id="shift2" value="<?php echo $row['Shift']?>" >
                                                </td>
                                                <?php } }?>
                                            </tr>

                                            <?php 
                                            $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <tr>
                                                <td><select class="form-control" id="ProductionLineKey3" name="ProductionLineKey3">
                                                    <?php
                                                        foreach ($fetch as $row) { 
                                                            if ($row['ProductionKey'] == '3') {
                                                            $query = $connect->prepare("SELECT * FROM DimProductionLine");
                                                            $query->execute();
                                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                                     ?>
                                                    <option class="form-control" name="ProductionLineKey3" value=""> Production Line</option>
                                                    <?php foreach ($fetch as $data) { ?>
                                                    <option <?php if ($row['ProductionLineKey'] == $data['ProductionLineKey']) { echo "selected";} ?> name="ProductionLineKey3" value="<?php echo $data['ProductionLineKey'];?>"><?php echo $data['ProductionLineName']; }?></option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="ProductionLineKey3" id="ProductionLineKey3" value="<?php echo $row['ProductionLineKey']?>">
                                                </td>

                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date3" id="product_date3" value="<?php echo $ProductDate;?>" ></td>

                                                <td><select class="form-control" id="shift3" name="shift3">
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift3" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift3" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift3" value="3"> Shift 3 </option>
                                                    </select>
                                                    <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                                    <input type="hidden" class="form-control" name="shift3" id="shift3" value="<?php echo $row['Shift']?>"> 
                                                </td>
                                                <?php } }?>
                                            </tr>
                                        </table>
                                            
<!------------------------------------------------------- Pack Date ------------------------------------------------------------>
                                    <div class="form-group">
                                        <label>Pack Date:</label>
                                        <?php $Packdate = date("Y-m-d", strtotime($get['PackingDate'])); ?>
                                        <input class="form-control" type="date" name="PackingDate" id="PackingDate" value="<?php echo $Packdate;?>" >
                                    </div>

<!------------------------------------------------------- Checked By ----------------------------------------------------------->
                                    <div class="form-group">
                                        <label>Checked By:</label>
                                        <input type="text" class="form-control" name="InspectionUserID" value="<?php echo $get['InspectionUserID'];?>" >
                                    </div>
                                </div>
                                 
<!------------------------------------------------------- OTHER TESTING -------------------------------------------------------->
                        <div class="row">
                            <div class="col-lg-12">                   
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Other Testing
                                    </div>
                                    <div class="col-lg-6">
                                    </br>

<!------------------------------------------------------- Testing Equipment ---------------------------------------------------->
                                    <label>1. Testing Equipment</label></br>
                                   
                                     
                                    <div class="form-group">
                                        
                                            <input type="hidden" class="form-control" type="text" name="RecordID" id="RecordID" placeholder="Enter Record ID" value="<?php echo $get['RecordID'];?>" readonly><br>

                                    <?php 
                                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Instrument.InstrumentKey, T_Record_Instrument.InstrumentValue
                                        FROM T_Record_Master RIGHT JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."'");
                                        $query->execute();
                                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <label>WEIGHING SCALE ID</label>

                                        <?php foreach ($fetch as $test) { 
                                            if ($test['InstrumentKey'] == '1') { ?>
                                            <input class="form-control" type="text" name="InstrumentValue" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" readonly><br>
                                        <?php } }?>        
                                    </div>

                                    <div class="form-group">
                                        
                                        <label>RULER ID</label>
                                        <?php foreach ($fetch as $test) { ?>
                                        <?php if ($test['InstrumentKey'] == '2') { ?>
                                            <input class="form-control" type="text" name="InstrumentValue2" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" readonly><br>
                                        <?php } } ?>            
                                    </div>


                                    <div class="form-group">
                                        <label>THICKNESS GAUGE ID</label>
                                        <?php foreach ($fetch as $test) { ?>
                                        <?php if ($test['InstrumentKey'] == '3') { ?>
                                        <input class="form-control" type="text" name="InstrumentValue3" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" readonly><br>
                                        <?php } }?>
                                    </div><br>
                                        
<!--------------------------------------------- Glove Weight, Counting, Packaging Defect --------------------------------------->
                                    <label>2. Glove Weight, Counting, Packaging Defect</label></br></br>
                                   
                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                    
                                    <?php
               
                                             $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                             FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                                             $query->execute();
                                             $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
 
                                         foreach ($fetch as $test) { ?>
                                         
                                    <?php   if ($test['TestKey'] == '12') { ?>
                                    <tr>  
                                         <td class="info">GLOVE WEIGHT:</td>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        
                                        <td><input class="form-control" name="SRText1" value="<?php echo $test['SRText']; ?>" ></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if ($test['TestKey'] == '14') { ?>
                                    <tr>
                                        <td class="info">COUNTING:</td>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue2" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue2" id="optionsRadios1" value="PASS"  >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue2" id="optionsRadios2" value="FAIL"  >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue2" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <td><input class="form-control" name="SRText2" value="<?php echo $test['SRText'];?>" ></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if ($test['TestKey'] == '8') {?>
                                    <tr>
                                        <td class="info">PACKAGING DEFECT:</td>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios1" value="PASS"  >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios2" value="FAIL"  >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue3" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <td><input class="form-control" name="SRTextPackaging" value="<?php echo $test['SRText'];?>" ></td>
                                    </tr>
                                <?php } } ?>
                                    </table>
                                        
                                </div>
                            </div>
                                    
<!------------------------------------------------------- Internal Physical Testing -------------------------------------------->
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <label>3. Internal Physical Testing</label>
                                    <?php
                                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, 
                                                                    T_Record_Test.TestValue, T_Record_Test.SRText
                                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                                    WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                                        $query->execute();
                                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                                    <tr>
                                        <div class="form-group">
                                        <th scope="col" class="info">Layering:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '2') {?> 
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue4" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                        </div>    
                                    </tr>

                                    <tr>          
                                        <th class="info">Smelly:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '5') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue5" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th scope="col" class="info">Gripness:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '6') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue6" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>

                                    <tr>  
                                        <th scope="col" class="info">Black Cloth:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '9') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue8" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th class="info">Sticking:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '7') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue9" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>    
                                        <th scope="col" class="info">Dispensing:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '4') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue10" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                         
                                    <tr>
                                        <th class="info">White Cloth:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '10') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue11" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>  
                                        <th class="info">Dye Leak:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '150') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue17" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Sealing:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '149') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios1" value="N/A"  >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                            <input type="hidden" class="form-control" name="TestValue18" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Burst Test:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '157') { ?>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios1" value="N/A"  >N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios1" value="PASS"  >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios2" value="FAIL" >FAIL
                                        </label>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue19" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Visual & Peel Ability:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '158') { ?>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios1" value="N/A"  >N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios2" value="FAIL" >FAIL
                                        </label>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue20" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                    </tr>
                                </table>

                                <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                                <tr>
                                    <th class="info" rowspan="2">Donning & Tearing:</th>
                                    <th>Result</th>
                                    <th>Remark</th>
                                </tr>
                                <tr>
                                    <div class="form-group"> 
                                    <?php foreach ($fetch as $test) { if ($test['TestKey'] == '3') { ?> 
                                    <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios1" value="N/A"  >N/A
                                        </label><br>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios1" value="PASS" >PASS
                                        </label><br>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios2" value="FAIL" >FAIL
                                        </label>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue7" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <td><input class="form-control" name="SRText8" id="remark_donningtearing" value="<?php echo $test['SRText'];?>" ></td>
                                    <?php } }?>
                                    </div>
                                </tr>
                            </table>                

<!------------------------------------------------------- Special Requirement -------------------------------------------------->
                                <label>4. Special Requirements</label>
                                <br><br>
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                    <tr class="info">
                                        <th >Test No:</th>
                                        <th >Test Name:</th>
                                        <th >Disposition:</th>
                                    </tr>

                                    <?php
                  
                                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                        FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                                        $query->execute();
                                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($fetch as $test) { ?> 
                                    <?php if ($test['TestKey'] == '144') {?> 
                                    <tr>
                                        <th scope="col" class="info">Test 1:</th>
                                        <td>
                                            <select class="form-control" id="TestValue12" name="TestValue12" disabled="disabled">
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="TestValue12" value="N/A">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue12" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue12" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?> class="form-control" name="TestValue12" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue12" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue12" value="Alcohol "> Alcohol </option>
                                            </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue12" value="<?php echo $test['TestValue']?>" readonly>
                                        
                                        </td>
                                        <td><select class="form-control" id="SRText3" name="SRText3" disabled="disabled">
                                            <option <?php if ($test['SRText'] == 'N/A') { echo "selected";}?> class="form-control" name="SRText3" value="N/A"> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText3" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText3" value="FAIL "> FAIL </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="SRText3" value="<?php echo $test['SRText']?>" readonly>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '145') {?> 
                                    <tr>
                                        <th scope="col" class="info">Test 2:</th>
                                        <td><select class="form-control" id="TestValue13" name="TestValue13" disabled="disabled">
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue13" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue13" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue13" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue13" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue13" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue13" value="Alcohol "> Alcohol </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue13" value="<?php echo $test['TestValue']?>" readonly>
                                        </td>
                                        <td><select class="form-control" id="SRText4" name="SRText4" disabled="disabled">
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText4" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText4" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText4" value="FAIL "> FAIL </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="SRText4" value="<?php echo $test['SRText']?>" readonly>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <?php if ($test['TestKey'] == '146') {?> 
                                    <tr>
                                        <th scope="col" class="info">Test 3:</th>
                                        <td><select class="form-control" id="TestValue14" name="TestValue14" disabled="disabled">
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue14" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue14" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue14" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue14" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue14" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue14" value="Alcohol "> Alcohol </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue14" value="<?php echo $test['TestValue']?>" readonly>
                                        </td>
                                        <td><select class="form-control" id="SRText5" name="SRText5" disabled="disabled">
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText5" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText5" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText5" value="FAIL "> FAIL </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="SRText5" value="<?php echo $test['SRText']?>" readonly>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '147') { ?> 
                                    <tr>
                                        <th scope="col" class="info">Test 4:</th>
                                        <td><select class="form-control" id="TestValue15" name="TestValue15" disabled="disabled">
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue15" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue15" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue15" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue15" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue15" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue15" value="Alcohol "> Alcohol </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue15" value="<?php echo $test['TestValue']?>" readonly>
                                        </td>
                                        <td><select class="form-control" id="SRText6" name="SRText6" disabled="disabled">
                                            <option <?php if ($test['SRText'] == 'N/A') { echo "selected";}?> class="form-control" name="SRText6" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText6" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText6" value="FAIL "> FAIL </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="SRText6" value="<?php echo $test['SRText']?>" readonly>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '148') { ?>                                     
                                    <tr>
                                        <th scope="col" class="info">Test 5:</th>
                                        <td><select class="form-control" id="TestValue16" name="TestValue16" disabled="disabled">
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue16" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue16" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue16" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue16" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue16" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue16" value="Alcohol "> Alcohol </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="TestValue16" value="<?php echo $test['TestValue']?>" readonly>
                                        </td>
                                        <td><select class="form-control" id="SRText7" name="SRText7" disabled="disabled">
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText7" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText7" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText7" value="FAIL "> FAIL </option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="SRText7" value="<?php echo $test['SRText']?>" readonly>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </table>
                            </div><br>
                
<!------------------------------------------------------- Physical Dimension Test ---------------------------------------------->                    
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

                                        <?php
                                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                        FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                                        $query->execute();
                                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($fetch as $test) { 
                                            if ($test['TestKey'] == '1') { ?>
    
      									<td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'SINGLE WALL') { echo "checked";}?> type="radio" name="method" id="optionsRadios1" value="SINGLE WALL" >SINGLE WALL
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'DOUBLE WALL') { echo "checked";}?> type="radio" name="method" id="optionsRadios1" value="DOUBLE WALL" >DOUBLE WALL
                                            </label>
                                        </td>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="method" value="<?php echo $test['TestValue']?>" readonly>
                                        <?php } }?>
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
                                <?php
//<!----------------------------------------------------TESTKEY 16--29---------------------------------------------------------->
                                    $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE T_Record_Test.TestKey BETWEEN 16 AND 127 AND T_Record_Master.RecordID = '".$get['RecordID']."'");
                                    $query->execute();
                                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);?>
                                       
                                <tr>
                                    <th scope="col" class="info">Length(mm):</th>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '17') { ?>
                                        <td><input class="form-control" name="length1" id="length1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '18') { ?>
                                        <td><input class="form-control" name="length2" id="length2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '19') { ?>
                                        <td><input class="form-control" name="length3" id="length3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '20') { ?>
                                        <td><input class="form-control" name="length4" id="length4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '21') { ?>
                                        <td><input class="form-control" name="length5" id="length5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '22') { ?>
                                        <td><input class="form-control" name="length6" id="length6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '23') { ?>
                                        <td><input class="form-control" name="length7" id="length7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '24') { ?>
                                        <td><input class="form-control" name="length8" id="length8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '25') { ?>
                                        <td><input class="form-control" name="length9" id="length9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '26') { ?>
                                        <td><input class="form-control" name="length10" id="length10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '27') { ?>
                                        <td><input class="form-control" name="length11" id="length11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '28') { ?>
                                        <td><input class="form-control" name="length12" id="length12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '29') { ?>
                                        <td><input class="form-control" name="length13" id="length13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { ?>
                                    <?php if ($test['TestKey'] == '16') { ?>
                                        <td><select class="form-control" id="result_length" name="length_p_f" >
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="length_p_f" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="length_p_f" value="PASS"> P</option>
                                            <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="length_p_f" value="FAIL"> F</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="length_p_f" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                    <?php } } ?>
                                </tr>  

<!----------------------------------------------------TESTKEY 30-43---------------------------------------------------------->                                <tr>
                                    <th scope="col" class="info">Width(mm):</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '31') { ?>
                                    <td><input class="form-control" name="width1" id="width1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '32') { ?>
                                    <td><input class="form-control" name="width2" id="width2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '33') { ?>
                                        <td><input class="form-control" name="width3" id="width3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '34') { ?>
                                    <td><input class="form-control" name="width4" id="width4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '35') { ?>
                                    <td><input class="form-control" name="width5" id="width5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '36') { ?>
                                    <td><input class="form-control" name="width6" id="width6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '37') { ?>
                                    <td><input class="form-control" name="width7" id="width7" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '38') { ?>
                                    <td><input class="form-control" name="width8" id="width8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '39') { ?>
                                    <td><input class="form-control" name="width9" id="width9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '40') { ?>
                                    <td><input class="form-control" name="width10" id="width10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '41') { ?>
                                    <td><input class="form-control" name="width11" id="width11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '42') { ?>
                                    <td><input class="form-control" name="width12" id="width12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '43') { ?>
                                    <td><input class="form-control" name="width13" id="width13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '30') { ?>
                                    <td><select class="form-control" id="result_length2" name="width_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="width_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="width_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="width_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="width_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>

<!----------------------------------------------------TESTKEY 44-57---------------------------------------------------------->
                                <tr>
                                    <th scope="col" class="info">Thickness of Cuff(mm):</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '45') { ?>
                                    <td><input class="form-control" name="cuff1" id="cuff1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '46') { ?>
                                    <td><input class="form-control" name="cuff2" id="cuff2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '47') { ?>
                                    <td><input class="form-control" name="cuff3" id="cuff3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '48') { ?>
                                    <td><input class="form-control" name="cuff4" id="cuff4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '49') { ?>
                                    <td><input class="form-control" name="cuff5" id="cuff5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '50') { ?>
                                    <td><input class="form-control" name="cuff6" id="cuff6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '51') { ?>
                                    <td><input class="form-control" name="cuff7" id="cuff7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '52') { ?>
                                    <td><input class="form-control" name="cuff8" id="cuff8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '53') { ?>
                                    <td><input class="form-control" name="cuff9" id="cuff9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '54') { ?>
                                    <td><input class="form-control" name="cuff10" id="cuff10" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '55') { ?>
                                    <td><input class="form-control" name="cuff11" id="cuff11" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '56') { ?>
                                    <td><input class="form-control" name="cuff12" id="cuff12" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '57') { ?>
                                    <td><input class="form-control" name="cuff13" id="cuff13" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '44') { ?>
                                    <td><select class="form-control" id="result_length3" name="cuff_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="cuff_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                   
                                </tr>
<!----------------------------------------------------TESTKEY 58-71---------------------------------------------------------->                                
                                <tr>
                                    <th scope="col" class="info">Thickness of Palm(mm):</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '59') { ?>
                                    <td><input class="form-control" name="palm1" id="palm1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '60') { ?>
                                    <td><input class="form-control" name="palm2" id="palm2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '61') { ?>
                                    <td><input class="form-control" name="palm3" id="palm3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '62') { ?>
                                    <td><input class="form-control" name="palm4" id="palm4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '63') { ?>
                                    <td><input class="form-control" name="palm5" id="palm5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '64') { ?>
                                    <td><input class="form-control" name="palm6" id="palm6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '65') { ?>
                                    <td><input class="form-control" name="palm7" id="palm7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '66') { ?>
                                    <td><input class="form-control" name="palm8" id="palm8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '67') { ?>
                                    <td><input class="form-control" name="palm9" id="palm9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '68') { ?>
                                    <td><input class="form-control" name="palm10" id="palm10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '69') { ?>
                                    <td><input class="form-control" name="palm11" id="palm11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '70') { ?>
                                    <td><input class="form-control" name="palm12" id="palm12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '71') { ?>
                                    <td><input class="form-control" name="palm13" id="palm13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '58') { ?>
                                    <td><select class="form-control" id="result_length4" name="palm_p_f" >
                                        <option <?php if ($test['TestValue'] == '') { echo "selected";} ?> class="form-control" name="palm_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="palm_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="palm_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="palm_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                   
                                </tr>
<!----------------------------------------------------TESTKEY 72-85---------------------------------------------------------->

                                <tr>
                                    <th scope="col" class="info">Thickness of Fingertip(mm):</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '73') { ?>
                                    <td><input class="form-control" name="fingertip1" id="fingertip1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '74') { ?>
                                    <td><input class="form-control" name="fingertip2" id="fingertip2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '75') { ?>
                                    <td><input class="form-control" name="fingertip3" id="fingertip3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '76') { ?>
                                    <td><input class="form-control" name="fingertip4" id="fingertip4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '77') { ?>
                                    <td><input class="form-control" name="fingertip5" id="fingertip5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '78') { ?>
                                    <td><input class="form-control" name="fingertip6" id="fingertip6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '79') { ?>
                                    <td><input class="form-control" name="fingertip7" id="fingertip7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '80') { ?>
                                    <td><input class="form-control" name="fingertip8" id="fingertip8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '81') { ?>
                                    <td><input class="form-control" name="fingertip9" id="fingertip9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '82') { ?>
                                    <td><input class="form-control" name="fingertip10" id="fingertip10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '83') { ?>
                                    <td><input class="form-control" name="fingertip11" id="fingertip11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '84') { ?>
                                    <td><input class="form-control" name="fingertip12" id="fingertip12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '85') { ?>
                                    <td><input class="form-control" name="fingertip13" id="fingertip13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '72') { ?>
                                    <td><select class="form-control" id="result_length5" name="fingertip_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="fingertip_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="fingertip_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="fingertip_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="fingertip_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>
<!----------------------------------------------------TESTKEY 86-99---------------------------------------------------------->                                
                                <tr>
                                    <th scope="col" class="info">*Thickness of Bead Diameter:</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '87') { ?>
                                    <td><input class="form-control" name="bead_diameter1" id="bead_diameter1" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '88') { ?>
                                    <td><input class="form-control" name="bead_diameter2" id="bead_diameter2" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '89') { ?>
                                    <td><input class="form-control" name="bead_diameter3" id="bead_diameter3" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '90') { ?>
                                    <td><input class="form-control" name="bead_diameter4" id="bead_diameter4" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '91') { ?>
                                    <td><input class="form-control" name="bead_diameter5" id="bead_diameter5" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '92') { ?>
                                    <td><input class="form-control" name="bead_diameter6" id="bead_diameter6" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '93') { ?>
                                    <td><input class="form-control" name="bead_diameter7" id="bead_diameter7" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '94') { ?>
                                    <td><input class="form-control" name="bead_diameter8" id="bead_diameter8" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '95') { ?>
                                    <td><input class="form-control" name="bead_diameter9" id="bead_diameter9" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '96') { ?>
                                    <td><input class="form-control" name="bead_diameter10" id="bead_diameter10" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '97') { ?>
                                    <td><input class="form-control" name="bead_diameter11" id="bead_diameter11" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '98') { ?>
                                    <td><input class="form-control" name="bead_diameter12" id="bead_diameter12" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '99') { ?>
                                    <td><input class="form-control" name="bead_diameter13" id="bead_diameter13" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '86') { ?>
                                    <td><select class="form-control" id="result_length6" name="bead_diameter_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="bead_diameter_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>

<!----------------------------------------------------TESTKEY 100-113---------------------------------------------------------->
                                <tr>
                                    <th scope="col" class="info">*Thickness of Cuff Edge:</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '101') { ?>
                                    <td><input class="form-control" name="cuff_edge1" id="cuff_edge1" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '102') { ?>
                                    <td><input class="form-control" name="cuff_edge2" id="cuff_edge2" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '103') { ?>
                                    <td><input class="form-control" name="cuff_edge3" id="cuff_edge3" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '104') { ?>
                                    <td><input class="form-control" name="cuff_edge4" id="cuff_edge4" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '105') { ?>
                                    <td><input class="form-control" name="cuff_edge5" id="cuff_edge5" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '106') { ?>
                                    <td><input class="form-control" name="cuff_edge6" id="cuff_edge6" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '107') { ?>
                                    <td><input class="form-control" name="cuff_edge7" id="cuff_edge7" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '108') { ?>
                                    <td><input class="form-control" name="cuff_edge8" id="cuff_edge8" value="<?php echo $test['TestValue'];?>"  ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '109') { ?>
                                    <td><input class="form-control" name="cuff_edge9" id="cuff_edge9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '110') { ?>
                                    <td><input class="form-control" name="cuff_edge10" id="cuff_edge10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '111') { ?>
                                    <td><input class="form-control" name="cuff_edge11" id="cuff_edge11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '112') { ?>
                                    <td><input class="form-control" name="cuff_edge12" id="cuff_edge12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '113') { ?>
                                    <td><input class="form-control" name="cuff_edge13" id="cuff_edge13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '100') { ?>
                                    <td><select class="form-control" id="result_length7" name="cuff_edge_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="cuff_edge_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>

<!----------------------------------------------------TESTKEY 86-99---------------------------------------------------------->
                                <tr>
                                    <th scope="col" class="info">*Glove Weight:</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '115') { ?>
                                    <td><input class="form-control" name="g_weight1" id="g_weight1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '116') { ?>
                                    <td><input class="form-control" name="g_weight2" id="g_weight2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '117') { ?>
                                    <td><input class="form-control" name="g_weight3" id="g_weight3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '118') { ?>
                                    <td><input class="form-control" name="g_weight4" id="g_weight4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '119') { ?>
                                    <td><input class="form-control" name="g_weight5" id="g_weight5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '120') { ?>
                                    <td><input class="form-control" name="g_weight6" id="g_weight6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '121') { ?>
                                    <td><input class="form-control" name="g_weight7" id="g_weight7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '122') { ?>
                                    <td><input class="form-control" name="g_weight8" id="g_weight8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '123') { ?>
                                    <td><input class="form-control" name="g_weight9" id="g_weight9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '124') { ?>
                                    <td><input class="form-control" name="g_weight10" id="g_weight10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '125') { ?>
                                    <td><input class="form-control" name="g_weight11" id="g_weight11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '126') { ?>
                                    <td><input class="form-control" name="g_weight12" id="g_weight12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '127') { ?>
                                    <td><input class="form-control" name="g_weight13" id="g_weight13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '114') { ?>
                                    <td><select class="form-control" id="result_length8" name="g_weight_p_f">
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="FAIL"> F</option>
                                        </select>
                                        <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="g_weight_p_f" value="<?php echo $test['TestValue']?>" >
                                    </td>
                                    <?php } } ?>
                                    </tr>
                            </table>

                                <td>* Upon Customer Request</td>
                                
                            </div>
                        </div>
                    </div><br>
               
<!----------------------------------------------------------INSPECTION RECORD----------------------------------------------->
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
                                <?php

                                    $query = $connect->prepare("SELECT T_Record_Instrument.InstrumentKey, T_Record_Instrument.InstrumentValue, T_Record_SampleSize.SampleSizeValue, T_Record_SampleSize.SampleSizeCategory
                                    FROM T_Record_Master RIGHT JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID
                                    FULL JOIN T_Record_SampleSize ON T_Record_Master.RecordID = T_Record_SampleSize.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."'");
                                    $query->execute();
                                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);   
                                ?>

                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <?php foreach ($fetch as $test) {
                                              if ($test['InstrumentKey'] == '4') { ?>
                                        <th scope="col" class="info">MACHINE ID APT/WTT:</th>
                                        <td><input class="form-control" name="machine_id" value="<?php echo $test['InstrumentValue'];?>"></td>
                                        <?php } }?>

                                        <?php
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                          T_Record_Test.SRText
                          FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                          WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);  
                        ?>
                        <th scope="col" class="info">SAMPLE SIZE APT/VT:</th>
                        <?php foreach ($fetch as $test) { 
                            if ($test['TestKey'] == '142') { ?> 
                        <td><input class="form-control" name="sample_size" value="<?php echo $test['TestValue'];?>" ></td>
                        <?php } }?>

                        <th scope="col" class="info">SAMPLE SIZE WTT:</th>
                        <?php foreach ($fetch as $test) { 
                                if ($test['TestKey'] == '143') { ?> 
                        <td><input class="form-control" name="sample_size_apt" value="<?php echo $test['TestValue']?>" ></td>
                        <?php } }?>
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
                                        <th></th>
                                        <th>MINOR VISUAL</th>
                                        <th>MAJOR VISUAL</th>
                                        <th>CRITICAL</th>
                                        <th>HOLES LEVEL 1</th>
                                        <th>HOLES LEVEL 2</th>
                                        <th>HOLES LEVEL 3</th>
                                        </tr>
                                        
                                        <?php 
                                            $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                            FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);?>
                                            
                                            
                                            
                                              
                                        <tr>
                                        <th scope="col" class="info">**AQL:</th>
                                        <td><select class="form-control" id="AQL_minor" name="AQL_minor" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '128') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_minor" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_minor" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_minor" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_minor" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_minor" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_minor" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_minor" value="6.5"> 6.5</option>
                                            </select>

                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_minor" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>

                                        <td><select class="form-control" id="AQL_major" name="AQL_major" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '130') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_major" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_major" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_major" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_major" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_major" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_major" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_major" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_major" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_major" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_major" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_major" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_major" value="6.5"> 6.5</option>
                                            </select>

                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_major" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                        <?php } }?>
                                         
                                        <td><select class="form-control" id="AQL_critical" name="AQL_critical" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '132') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_critical" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_critical" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_critical" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_critical" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes1" name="AQL_holes1" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '134') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_holes1" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.25">0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.40">0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="6.5"> 6.5</option> 
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_holes1" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes2" name="AQL_holes2" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '136') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_holes2" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.25">0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.40">0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_holes2" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes3" name="AQL_holes3" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '138') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_holes3" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.25">0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.40">0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_holes3" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Acceptance:</th>
                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '129') { ?>
                                        <td><input  class="form-control" name="Acceptance_minor" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '131') { ?>
                                        <td><input class="form-control" name="Acceptance_major" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '133') { ?>
                                        <td><input class="form-control" name="Acceptance_critical" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '135') { ?>
                                        <td><input class="form-control" name="Acceptance_holes1" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '137') { ?>
                                        <td><input class="form-control" name="Acceptance_holes2" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '139') { ?>
                                        <td><input class="form-control" name="Acceptance_holes3" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info"></th>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#minorModal">MINOR VISUAL</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#majorModal">MAJOR VISUAL</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#criticalModal">CRITICAL</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#holes1Modal">SELECT HOLES 1</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#holes2Modal">SELECT HOLES 2</a></center></td>
                                        <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#holes3Modal">SELECT HOLES 3</a></center></td>
                                        </tr>
                                         
                                        <tr>
                                        <th scope="col" class="info">Total defect</th>
                                        <td><input class="input form-control form-control-lg" name="total_minor" readonly id="total_minor" placeholder="" ></td>
                            			<td><input class="input form-control form-control-lg" name="total_major" readonly id="total_major" placeholder="" ></td>
                           				<td><input class="input form-control form-control-lg" name="total_critical" readonly id="total_critical" placeholder="" ></td>
                            			<td><input class="input form-control form-control-lg" name="total_holes1" readonly id="total_holes1" placeholder="" ></td>
                            			<td><input class="input form-control form-control-lg" name="total_holes2" readonly id="total_holes2" placeholder="" ></td>
                            			<td><input class="input form-control form-control-lg" name="total_holes3" readonly id="total_holes3" placeholder="" ></td>
                                        </tr>
                                  </table>

                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        
                                        <th scope="col" class="info">Total Barrier Holes:</th>
                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '163') { ?>
                                        <td><input class="form-control digit" name="total_holes" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } }?> 
                                        
                                        
                                        <th scope="col" class="info">AQL:</th>
                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '140') { ?>
                                        <td><select class="form-control" id="P/f" name="overall_AQL">
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="overall_AQL" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.25">0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.40">0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="overall_AQL" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="overall_AQL" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="overall_AQL" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="overall_AQL" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="overall_AQL" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="overall_AQL" value="6.5"> 6.5</option>
                                            </select>
                                            
                                        </td>
                                        <?php } }?> 
                                         <?php 
                                            $query = $connect->prepare("SELECT * FROM M_UDResult");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>

                                          <th scope="col" class="info">UD Disposition:</th>
                                          <td>
                                          <select class="form-control" id="UDResultKey" name="UDResultKey">
                                          <?php foreach ($fetch as $row) { ?>
                                          <option <?php if ($get['UDResultKey'] == $row['UDResultKey']) { echo "selected";} ?> value="<?php echo $row['UDResultKey']; ?>"> <?php echo $row['UDResultCode']; ?> </option> 
                                          <?php }?>     
                                          </select>
                                         
                                          </td>
                                        </tr>
                                 </table><br>

                                 <td><b>*Product Packaging Inspection (Surgical)</b></td>
                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr class="info">
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
                                        <?php 
                                            $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, 
                                                                        T_Record_Test.TestValue, T_Record_Test.SRText
                                                                        FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                                        WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="AQL_regulatorypackaging" name="AQL_regulatorypackaging" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '155') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="N/L">N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_regulatorypackaging" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>

                                         <td><select class="form-control" id="AQL_criticalpackaging" name="AQL_criticalpackaging" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '153') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_criticalpackaging" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>

                                        <td><select class="form-control" id="AQL_visualpackaging" name="AQL_visualpackaging" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '151') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/L') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="N/L"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.065">0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.10">0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="6.5"> 6.5</option>
                                            </select>
                                            <!-- TO SEND DATA TO DATABASE AS THE DROPDOWN CANNOT BE READONLY AND THE DATA IS IGNORED WHEN DISABLED-->
                                        <input type="hidden" class="form-control" name="AQL_visualpackaging" value="<?php echo $test['TestValue']?>" >
                                        </td>
                                         <?php } } ?>
                                         
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
                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '156') { ?>
                                        <td><input class="form-control" name="Acceptance_regulatorypackaging" value="<?php echo $test['TestValue'];?>"  ></td>
                                        <?php } }?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '154') { ?>
                                        <td><input class="form-control" name="Acceptance_criticalpackaging" value="<?php echo $test['TestValue'];?>"  ></td>
                                        <?php } }?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '152') { ?>
                                        <td><input class="form-control" name="Acceptance_visualpackaging" value="<?php echo $test['TestValue'];?>"  ></td>
                                        <?php } }?>
                                        <td><input class="form-control" name="Acceptance_holes1" placeholder="" disabled></td>
                                        <td><input class="form-control" name="Acceptance_holes2" placeholder="" disabled></td>
                                        <td><input class="form-control" name="Acceptance_holes3" placeholder="" disabled></td>
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
                        <?php 
                            $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Defect.DefectKey, T_Record_Defect.DefectValue
                                                    FROM T_Record_Defect LEFT JOIN T_Record_Master ON T_Record_Defect.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                            $query->execute();
                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
          
          <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">DB:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="DB" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SD:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="SD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SP:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="SP" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">STNs:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="STNs" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SLDs:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="SLDs" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">Ls:</th>
                                        <td><input class="form-control input-sm text-right amount digit" name="Ls" placeholder="0"></td>
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
                                        <td><input class="form-control input-sm text-right amount2 digit" name="CA" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">CL:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="CL" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">CLD:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="CLD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">CS:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="CS" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">DF:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="DF" placeholder="0"></td>
                                            
                                        <th scope="col" class="info">DT:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="DT" placeholder="0"></td>
                                     
                                        <th scope="col" class="info">EFI:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="EFI" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">FM:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="FM" placeholder="0"></td>
                                     </tr>
                            
                                    <tr>
                                        <th scope="col" class="info">FNO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="FNO" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="FO" placeholder="0"></td>
                                           
                                        <th scope="col" class="info">GNO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="GNO" placeholder="0"></td>
                                    
                                        <th scope="col" class="info">IB:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="IB" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">ICT:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="ICT" placeholder="0"></td>
                                          
                                        <th scope="col" class="info">L:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="L_Major" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">LS:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="LS" placeholder="0"></td>

                                        <th scope="col" class="info">PMI:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="PMI" placeholder="0"></td>
                                    
                                    </tr>

                                    <tr>

                                        <th scope="col" class="info">PMO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="PMO" placeholder="0"></td>
                                  
                                        <th scope="col" class="info">PLM:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="PLM" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">RM:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="RM" placeholder="0"></td>

                                        <th scope="col" class="info">RC:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="RC" placeholder="0"></td>
                                    
                                    </tr>

                                    <tr>

                                        <th scope="col" class="info">SAG:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SAG" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SG:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SG" placeholder="0"></td>
                                         
                                        <th scope="col" class="info">SHN:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SHN" placeholder="0"></td>

                                        <th scope="col" class="info">SI:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SI" placeholder="0"></td>
                      
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">SKV:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SKV" placeholder="0"></td>

                                        <th scope="col" class="info">SLD:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SLD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SO" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">STK:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="STK" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">STN:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="STN" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TA:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="TA" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TS:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="TS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">UNF:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="UNF" placeholder="0"></td>
                                    </tr>


                                    <tr>
                                        <th scope="col" class="info">WL:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="WL" placeholder="0"></td>

                                        <th scope="col" class="info">WSI:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="WSI" placeholder="0"></td>

                                        <th scope="col" class="info">WSO:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="WSO" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">GF:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="GF" placeholder="0"></td>
                                    </tr>       
                                </table>

                                 <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                
                                        <tr>
                                        <th scope="col" class="info">BP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="BP" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">DP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="DP" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">DSP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="DSP" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">DTP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="DTP" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">IA:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="IA" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">IFS:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="IFS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">IP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="IP_MAJOR" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">OP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="OP" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">RP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="RP" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">SH:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SH" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SMP:</th>
                                        <td><input class="form-control input-sm text-right amount2 digit" name="SMP" placeholder="0"></td>
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
                                        <td><input class="form-control input-sm text-right amount3 digit" name="BPC" placeholder="0"></td>

                                        <th scope="col" class="info">CR:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="CR" placeholder="0"></td>

                                        <th scope="col" class="info">DC:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="DC" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">DD:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="DD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">DIS:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="DIS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FMT:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="FMT" placeholder="0"></td>

                                    </tr>
                                        <th scope="col" class="info">L:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="L" placeholder="0"></td>
                                    
                                        <th scope="col" class="info">GL:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="GL" placeholder="0"></td>
 
                                        <th scope="col" class="info">MP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="MP" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">NB:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="NB" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">NF:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="NF" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TW:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="TW" placeholder="0"></td>
                                    </tr>   

                                    <tr>
                                        <th scope="col" class="info">WE:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="WE" placeholder="0"></td>
                           
                                        <th scope="col" class="info">WG:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="WG" placeholder="0"></td>

                                        <th scope="col" class="info">PGM:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="PGM" placeholder="0"></td> 
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">SDG:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="SDG" placeholder="0"></td>

                                        <th scope="col" class="info">URD:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="URD" placeholder="0"></td>

                                        <th scope="col" class="info">MS:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="MS_critical" placeholder="0"></td>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">PFK:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="PFK" placeholder="0"></td>

                                    </tr>
                                </table>

                                <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">ICP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="ICP" placeholder="0"></td>
                                     
                                        <th scope="col" class="info">NP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="NP" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WP:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="WP" placeholder="0"></td>
                                        </tr> 

                                        <tr>
                                        <th scope="col" class="info">GSH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="GSH" placeholder="0"></td>
                                     
                                </table>

                                <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">TH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="TH" placeholder="0"></td>

                                        <th scope="col" class="info">TR:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="TR" placeholder="0"></td>

                                        <th scope="col" class="info">TAH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="TAH" placeholder="0"></td>
                                    </tr> 
                                    <tr>
                                        <th scope="col" class="info">MF:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="MF" placeholder="0"></td>

                                        <th scope="col" class="info">CH:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="CH" placeholder="0"></td>

                                        <th scope="col" class="info">FK:</th>
                                        <td><input class="form-control input-sm text-right amount3 digit" name="FK" placeholder="0"></td>
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
                                            <td><input class="form-control input-sm text-right amount4 digit" name="BF" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="P" placeholder="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="CF" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="SF" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="TAHs" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="FKS" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="THs" placeholder="0"></td>
                                        
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="FT" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="TRS" placeholder="0"></td>
                                        
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="GB" placeholder="0"></td>
                                        </tr>
                                
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="CHs" placeholder="0"></td>

                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="L_HOLES1" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="LH" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount4 digit" name="MH" placeholder="0"></td>
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
                                            <td><input class="form-control input-sm text-right amount5 digit" name="BF_2" placeholder="0"></td>
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="P_2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="CF_2" placeholder="0"></td>
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="SF_2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="TAHs_2" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="FKS_2" placeholder="0"></td>
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="THs_2" placeholder="0"></td>
                                            
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="FT_2" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>      
                                            <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="TRS_2" placeholder="0"></td>
                                           
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="GB_2" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="CHs_2" placeholder="0"></td>
                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="L_HOLES2" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="LH_2" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount5 digit" name="MH_2" placeholder="0"></td>
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
                                            <td><input class="form-control input-sm text-right amount6 digit" name="BF_3" placeholder="0"></td>
                                            <th scope="col" class="info">P:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="P_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">CF:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="CF_3" placeholder="0"></td>
                                            <th scope="col" class="info">SF:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="SF_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">TAHs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="TAHs_3" placeholder="0"></td>
                                            <th scope="col" class="info">FKS:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="FKS_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">THs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="THs_3" placeholder="0"></td>
                                            <th scope="col" class="info">FT:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="FT_3" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">TRS:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="TRS_3" placeholder="0"></td>
                                            <th scope="col" class="info">GB:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="GB_3" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="CHs_3" placeholder="0"></td>
                                            <th scope="col" class="info">L:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="L_HOLES3" placeholder="0"></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="LH_3" placeholder="0"></td>

                                            <th scope="col" class="info">MH:</th>
                                            <td><input class="form-control input-sm text-right amount6 digit" name="MH_3" placeholder="0"></td>
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
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WLN" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WMD:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WMD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WED:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WED" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPC:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPC" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MM:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MM" placeholder="0"></td>

                                        <th scope="col" class="info">IP:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="IP" placeholder="0"></td>
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
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WQ" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MB:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MB" placeholder="0"></td>

                                        <th scope="col" class="info">MLN:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MLN" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WGS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WGT:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WGA:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGA" placeholder="0"></td>

                                        <th scope="col" class="info">OS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="OS" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WTS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WTS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">PTS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="PTS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WPO:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPO" placeholder="0"></td>

                                        <th scope="col" class="info">DMG:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="DMG" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">MSG:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSG" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FC:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="FC" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">POS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="POS" placeholder="0"></td>

                                        <th scope="col" class="info">BC:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="BC" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPD:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MSI:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSI" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TRP:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="TRP" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
            </div>
        </div>
    </div> 

    <div class="modal fade" id="criticalPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Visual Packaging</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <tr>
                                        <th scope="col" class="info">WT:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">CT:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="CT" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">POP:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="POP" placeholder="0"></td>

                                        <th scope="col" class="info">FG:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="FG" placeholder="0"></td>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">PIS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="PIS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">MSA:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSA" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">WIS:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WIS" placeholder="0"></td>

                                        <th scope="col" class="info">DT:</th>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="DT_PACKING" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
            </div>
        </div>
    </div> 
                                  
                <div class="col-lg-6">
                    <div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                     <div class="form-group">  
                                     Verify By: <input class="form-control" name="verify_by"  value="<?php echo $get['VerifierID'];?>" readonly>
                                     </div>
                                       
                                     <div class="form-group">   
                                     <?php $VerifyDate = date("Y-m-d\TH:i:s", strtotime($get['VerifiedDate'])); ?>
                                     Date: <br> <input class="form-control" type="datetime-local" name="date_verify" value="<?php echo $VerifyDate;?>"  readonly>
                                     </div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div>
                        
                        <!-- /.panel-heading -->
                        
                                    
                                   <center><button type="submit" name="submit" class="btn btn-primary">SAVE</button></center></br>
                                           
                                        <!--<a href="production_detail.php" class="btn btn-primary"> Next</a>-->

                                
                                       </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            
    <?php 
        if (isset($_POST['submit']))
        {
            $LotIDKey               = $_GET['LotIDKey'];
            $PlantKey               = $_POST['PlantKey'];
            $DateConversion         = new DateTime($_POST['RecordCreatedDateTime']);
            $RecordCreatedDateTime  = date_format($DateConversion, 'Y-m-d H:i:s');
            $DateConversion2        = new DateTime($_POST['date_verify']);
            $date_verify            = date_format($DateConversion2, 'Y-m-d H:i:s');
            $verify_by              = $_POST['verify_by'];
            $BatchNumber            = $_POST['BatchNumber'];
            $InspectionPlanKey      = $_POST['InspectionPlanKey'];
            $GloveSizeKey           = $_POST['GloveSizeKey'];
            $InspectionCount        = $_POST['InspectionCount'];
            $CartonQuantity         = $_POST['CartonQuantity'];
            $CartonNum              = $_POST['CartonNum'];
            $Customer               = $_POST['Customer'];
            $Brand                  = $_POST['Brand'];
            $LotNumber              = $_POST['LotNumber'];
            $GloveProductTypeKey    = $_POST['GloveProductTypeKey'];
            $GloveCodeKey           = $_POST['GloveCodeKey'];
            $GloveColourKey         = $_POST['GloveColourKey'];
            $ProductionLineKey1     = $_POST['ProductionLineKey1'];
            $ProductDate1           = $_POST['product_date1'];
            $Shift1                 = $_POST['shift1'];
            $PackingDate            = $_POST['PackingDate'];
            $InspectionUserID       = $_POST['InspectionUserID'];
            $RecordStatusFlag       = $_POST['RecordStatusFlag'];

            $method             = $_REQUEST['method'];    
            $RecordID           = $get['RecordID'];
            $InstrumentValue    = $_REQUEST['InstrumentValue'];
            $InstrumentValue2   = $_REQUEST['InstrumentValue2'];
            $InstrumentValue3   = $_REQUEST['InstrumentValue3'];
            $TestValue          = $_REQUEST['TestValue'];
            $TestValue2         = $_REQUEST['TestValue2'];
            $TestValue3         = $_REQUEST['TestValue3'];
            $TestValue4         = $_REQUEST['TestValue4'];
            $TestValue5         = $_REQUEST['TestValue5'];
            $TestValue6         = $_REQUEST['TestValue6'];
            $TestValue7         = $_REQUEST['TestValue7'];
            $TestValue8         = $_REQUEST['TestValue8'];
            $TestValue9         = $_REQUEST['TestValue9'];
            $TestValue10        = $_REQUEST['TestValue10'];
            $TestValue11        = $_REQUEST['TestValue11'];
            $TestValue12        = $_REQUEST['TestValue12'];
            $TestValue13        = $_REQUEST['TestValue13'];
            $TestValue14        = $_REQUEST['TestValue14'];
            $TestValue15        = $_REQUEST['TestValue15'];
            $TestValue16        = $_REQUEST['TestValue16'];
            $TestValue17        = $_REQUEST['TestValue17'];
            $TestValue18        = $_REQUEST['TestValue18'];
            $TestValue19        = $_REQUEST['TestValue19'];
            $TestValue20        = $_REQUEST['TestValue20'];

            $length1            = $_REQUEST['length1'];
            $length2            = $_REQUEST['length2'];
            $length3            = $_REQUEST['length3'];
            $length4            = $_REQUEST['length4'];
            $length5            = $_REQUEST['length5'];
            $length6            = $_REQUEST['length6'];
            $length7            = $_REQUEST['length7'];
            $length8            = $_REQUEST['length8'];
            $length9            = $_REQUEST['length9'];
            $length10           = $_REQUEST['length10'];
            $length11           = $_REQUEST['length11'];
            $length12           = $_REQUEST['length12'];
            $length13           = $_REQUEST['length13'];
            $length_p_f         = $_REQUEST['length_p_f'];

            $width1             = $_REQUEST['width1'];
            $width2             = $_REQUEST['width2'];
            $width3             = $_REQUEST['width3'];
            $width4             = $_REQUEST['width4'];
            $width5             = $_REQUEST['width5'];
            $width6             = $_REQUEST['width6'];
            $width7             = $_REQUEST['width7'];
            $width8             = $_REQUEST['width8'];
            $width9             = $_REQUEST['width9'];
            $width10            = $_REQUEST['width10'];
            $width11            = $_REQUEST['width11'];
            $width12            = $_REQUEST['width12'];
            $width13            = $_REQUEST['width13'];
            $width_p_f          = $_REQUEST['width_p_f'];

            $cuff1              = $_REQUEST['cuff1'];
            $cuff2              = $_REQUEST['cuff2'];
            $cuff3              = $_REQUEST['cuff3'];
            $cuff4              = $_REQUEST['cuff4'];
            $cuff5              = $_REQUEST['cuff5'];
            $cuff6              = $_REQUEST['cuff6'];
            $cuff7              = $_REQUEST['cuff7'];
            $cuff8              = $_REQUEST['cuff8'];
            $cuff9              = $_REQUEST['cuff9'];
            $cuff10             = $_REQUEST['cuff10'];
            $cuff11             = $_REQUEST['cuff11'];
            $cuff12             = $_REQUEST['cuff12'];
            $cuff13             = $_REQUEST['cuff13'];
            $cuff_p_f           = $_REQUEST['cuff_p_f'];

            $palm1              = $_REQUEST['palm1'];
            $palm2              = $_REQUEST['palm2'];
            $palm3              = $_REQUEST['palm3'];
            $palm4              = $_REQUEST['palm4'];
            $palm5              = $_REQUEST['palm5'];
            $palm6              = $_REQUEST['palm6'];
            $palm7              = $_REQUEST['palm7'];
            $palm8              = $_REQUEST['palm8'];
            $palm9              = $_REQUEST['palm9'];
            $palm10             = $_REQUEST['palm10'];
            $palm11             = $_REQUEST['palm11'];
            $palm12             = $_REQUEST['palm12'];
            $palm13             = $_REQUEST['palm13'];
            $palm_p_f           = $_REQUEST['palm_p_f'];

            $fingertip1         = $_REQUEST['fingertip1'];
            $fingertip2         = $_REQUEST['fingertip2'];
            $fingertip3         = $_REQUEST['fingertip3'];
            $fingertip4         = $_REQUEST['fingertip4'];
            $fingertip5         = $_REQUEST['fingertip5'];
            $fingertip6         = $_REQUEST['fingertip6'];
            $fingertip7         = $_REQUEST['fingertip7'];
            $fingertip8         = $_REQUEST['fingertip8'];
            $fingertip9         = $_REQUEST['fingertip9'];
            $fingertip10        = $_REQUEST['fingertip10'];
            $fingertip11        = $_REQUEST['fingertip11'];
            $fingertip12        = $_REQUEST['fingertip12'];
            $fingertip13        = $_REQUEST['fingertip13'];
            $fingertip_p_f      = $_REQUEST['fingertip_p_f'];

            $bead_diameter1     = $_REQUEST['bead_diameter1'];
            $bead_diameter2     = $_REQUEST['bead_diameter2'];
            $bead_diameter3     = $_REQUEST['bead_diameter3'];
            $bead_diameter4     = $_REQUEST['bead_diameter4'];
            $bead_diameter5     = $_REQUEST['bead_diameter5'];
            $bead_diameter6     = $_REQUEST['bead_diameter6'];
            $bead_diameter7     = $_REQUEST['bead_diameter7'];
            $bead_diameter8     = $_REQUEST['bead_diameter8'];
            $bead_diameter9     = $_REQUEST['bead_diameter9'];
            $bead_diameter10    = $_REQUEST['bead_diameter10'];
            $bead_diameter11    = $_REQUEST['bead_diameter11'];
            $bead_diameter12    = $_REQUEST['bead_diameter12'];
            $bead_diameter13    = $_REQUEST['bead_diameter13'];
            $bead_diameter_p_f  = $_REQUEST['bead_diameter_p_f'];

            $cuff_edge1         = $_REQUEST['cuff_edge1'];
            $cuff_edge2         = $_REQUEST['cuff_edge2'];
            $cuff_edge3         = $_REQUEST['cuff_edge3'];
            $cuff_edge4         = $_REQUEST['cuff_edge4'];
            $cuff_edge5         = $_REQUEST['cuff_edge5'];
            $cuff_edge6         = $_REQUEST['cuff_edge6'];
            $cuff_edge7         = $_REQUEST['cuff_edge7'];
            $cuff_edge8         = $_REQUEST['cuff_edge8'];
            $cuff_edge9         = $_REQUEST['cuff_edge9'];
            $cuff_edge10        = $_REQUEST['cuff_edge10'];
            $cuff_edge11        = $_REQUEST['cuff_edge11'];
            $cuff_edge12        = $_REQUEST['cuff_edge12'];
            $cuff_edge13        = $_REQUEST['cuff_edge13'];
            $cuff_edge_p_f      = $_REQUEST['cuff_edge_p_f'];

            $g_weight1          = $_REQUEST['g_weight1'];
            $g_weight2          = $_REQUEST['g_weight2'];
            $g_weight3          = $_REQUEST['g_weight3'];
            $g_weight4          = $_REQUEST['g_weight4'];
            $g_weight5          = $_REQUEST['g_weight5'];
            $g_weight6          = $_REQUEST['g_weight6'];
            $g_weight7          = $_REQUEST['g_weight7'];
            $g_weight8          = $_REQUEST['g_weight8'];
            $g_weight9          = $_REQUEST['g_weight9'];
            $g_weight10         = $_REQUEST['g_weight10'];
            $g_weight11         = $_REQUEST['g_weight11'];
            $g_weight12         = $_REQUEST['g_weight12'];
            $g_weight13         = $_REQUEST['g_weight13'];
            $g_weight_p_f       = $_REQUEST['g_weight_p_f'];

            $SRText1            = $_REQUEST['SRText1'];
            $SRText2            = $_REQUEST['SRText2'];
            $SRText3            = $_REQUEST['SRText3'];
            $SRText4            = $_REQUEST['SRText4'];
            $SRText5            = $_REQUEST['SRText5'];
            $SRText6            = $_REQUEST['SRText6'];
            $SRText7            = $_REQUEST['SRText7'];
            $SRText8            = $_REQUEST['SRText8'];
            $SRTextPackaging    = $_REQUEST['SRTextPackaging'];

            $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
            $Acceptance_major   = $_REQUEST['Acceptance_major'];
            $Acceptance_critical= $_REQUEST['Acceptance_critical'];
            $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
            $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];
            $Acceptance_holes3  = $_REQUEST['Acceptance_holes3'];

            $machine_id         = $_REQUEST['machine_id'];
            $sample_size        = $_REQUEST['sample_size'];
            $test_method        = $_REQUEST['sample_size_apt'];
            $AQL_minor          = $_REQUEST['AQL_minor'];
            $AQL_major          = $_REQUEST['AQL_major'];
            $AQL_critical       = $_REQUEST['AQL_critical'];
            $AQL_holes1         = $_REQUEST['AQL_holes1'];
            $AQL_holes2         = $_REQUEST['AQL_holes2'];
            $AQL_holes3         = $_REQUEST['AQL_holes3'];

            $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
            $Acceptance_major   = $_REQUEST['Acceptance_major'];
            $Acceptance_critical= $_REQUEST['Acceptance_critical'];
            $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
            $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];
            $Acceptance_holes3  = $_REQUEST['Acceptance_holes3'];

            $AQL_regulatoryPackaging        = $_REQUEST['AQL_regulatorypackaging'];
            $Acceptance_RegulatoryPackaging = $_REQUEST['Acceptance_regulatorypackaging'];
            $AQL_VisualPackaging            = $_REQUEST['AQL_visualpackaging'];
            $Acceptance_VisualPackaging     = $_REQUEST['Acceptance_visualpackaging'];
            $AQL_CriticalPackaging          = $_REQUEST['AQL_criticalpackaging'];
            $Acceptance_CriticalPackaging   = $_REQUEST['Acceptance_criticalpackaging'];

            $Result_RegulatoryPackaging   = $_REQUEST['Result_Regulatory'];
            $Result_CriticalPackaging   = $_REQUEST['Result_Critical'];
            $Result_VisualPackaging   = $_REQUEST['Result_Visual'];
            $Final_Disposition   = $_REQUEST['final_disposition'];
            $Total_holes    = $_REQUEST['total_holes'];
        //------------MINOR-------------------//
            $DB     = $_REQUEST['DB'];
            $SD     = $_REQUEST['SD'];
            $SP     = $_REQUEST['SP'];
        //-------------MAJOR------------------//
            $CA     = $_REQUEST['CA'];
            $CL     = $_REQUEST['CL'];
            $CLD    = $_REQUEST['CLD'];
            $CS     = $_REQUEST['CS'];
            $DF     = $_REQUEST['DF'];
            $DT     = $_REQUEST['DT'];
            $EFI    = $_REQUEST['EFI'];
            $FM     = $_REQUEST['FM'];
            $FNO    = $_REQUEST['FNO'];
            $FO     = $_REQUEST['FO'];
            $GNO    = $_REQUEST['GNO'];
            $IB     = $_REQUEST['IB'];
            $ICT    = $_REQUEST['ICT'];
            $L_Major      = $_REQUEST['L_Major'];
            $PMI    = $_REQUEST['PMI'];
            $PMO    = $_REQUEST['PMO'];
            $PLM    = $_REQUEST['PLM'];
            $RC     = $_REQUEST['RC'];
            $RM     = $_REQUEST['RM'];
            $SAG    = $_REQUEST['SAG'];
            $SG    = $_REQUEST['SG'];
            $SHN    = $_REQUEST['SHN'];
            $SI     = $_REQUEST['SI'];
            $SKV     = $_REQUEST['SKV'];
            $SLD     = $_REQUEST['SLD'];
            $SO     = $_REQUEST['SO'];
            $STK    = $_REQUEST['STK'];
            $STN    = $_REQUEST['STN'];
            $TA     = $_REQUEST['TA'];
            $TS     = $_REQUEST['TS'];
            $UNF    = $_REQUEST['UNF'];
            $WL     = $_REQUEST['WL'];
            $WSI    = $_REQUEST['WSI'];
            $WSO    = $_REQUEST['WSO'];
            $LS     = $_REQUEST['LS'];
        //-------------------------------//
            $BP     = $_REQUEST['BP'];
            $DP     = $_REQUEST['DP'];
            $DSP    = $_REQUEST['DSP'];
            $DTP    = $_REQUEST['DTP'];
            $IA     = $_REQUEST['IA'];
            $IFS    = $_REQUEST['IFS'];
            $IP_MAJOR  = $_REQUEST['IP_MAJOR'];
            $OP     = $_REQUEST['OP'];
            $RP     = $_REQUEST['RP'];
            $SH     = $_REQUEST['SH'];
            $SMP    = $_REQUEST['SMP'];
        //-------------CRITICAL------------------// 
            $BPC    = $_REQUEST['BPC'];
            $CR     = $_REQUEST['CR'];
            $DC     = $_REQUEST['DC'];
            $DD     = $_REQUEST['DD'];
            $DIS    = $_REQUEST['DIS'];
            $FMT    = $_REQUEST['FMT'];
            $L       = $_REQUEST['L'];
            $GL     = $_REQUEST['GL'];
            $MP     = $_REQUEST['MP'];
            $NB     = $_REQUEST['NB'];
            $NF     = $_REQUEST['NF'];
            $TW     = $_REQUEST['TW'];
            $WE     = $_REQUEST['WE'];
            $WG     = $_REQUEST['WG'];
            $PGM     = $_REQUEST['PGM'];
            $SDG     = $_REQUEST['SDG'];
            $URD     = $_REQUEST['URD'];
        //-------------------------------//    
            $CH     = $_REQUEST['CH'];
            $FK     = $_REQUEST['FK'];
            $TAH    = $_REQUEST['TAH'];
            $TR    = $_REQUEST['TR'];
            $TH     = $_REQUEST['TH'];
            $MF     = $_REQUEST['MF'];
        //-------------------------------//
            $ICP    = $_REQUEST['ICP'];
            $NP     = $_REQUEST['NP'];
            $WP     = $_REQUEST['WP'];
        //------------HOLES1-------------------//
            $BF     = $_REQUEST['BF'];
            $P      = $_REQUEST['P'];
            $CF     = $_REQUEST['CF'];
            $SF     = $_REQUEST['SF'];
            $TAHs   = $_REQUEST['TAHs'];
            $FKS    = $_REQUEST['FKS'];
            $THs    = $_REQUEST['THs'];
            $FT     = $_REQUEST['FT'];
            $TRS    = $_REQUEST['TRS'];
            $GB     = $_REQUEST['GB'];
            $CHs    = $_REQUEST['CHs'];
            $L_HOLES1    = $_REQUEST['L_HOLES1'];
        //--------------HOLES2-----------------//
            $BF_2   = $_REQUEST['BF_2'];
            $P_2    = $_REQUEST['P_2'];
            $CF_2   = $_REQUEST['CF_2'];
            $SF_2   = $_REQUEST['SF_2'];
            $TAHs_2 = $_REQUEST['TAHs_2'];
            $FKS_2  = $_REQUEST['FKS_2'];
            $THs_2  = $_REQUEST['THs_2'];
            $FT_2   = $_REQUEST['FT_2'];
            $TRS_2  = $_REQUEST['TRS_2'];
            $GB_2   = $_REQUEST['GB_2'];
            $CHs_2  = $_REQUEST['CHs_2'];
            $L_HOLES2    = $_REQUEST['L_HOLES2'];
        //---------------HOLES3----------------//
            $BF_3   = $_REQUEST['BF_3'];
            $P_3    = $_REQUEST['P_3'];
            $CF_3   = $_REQUEST['CF_3'];
            $SF_3   = $_REQUEST['SF_3'];
            $TAHs_3 = $_REQUEST['TAHs_3'];
            $FKS_3  = $_REQUEST['FKS_3'];
            $THs_3  = $_REQUEST['THs_3'];
            $FT_3   = $_REQUEST['FT_3'];
            $TRS_3  = $_REQUEST['TRS_3'];
            $GB_3   = $_REQUEST['GB_3'];
            $CHs_3  = $_REQUEST['CHs_3'];
            $L_HOLES3    = $_REQUEST['L_HOLES3'];
        //-------------REGULATOR------------------//
            $WLN    = $_REQUEST['WLN'];
            $WPC    = $_REQUEST['WPC'];
            $WMD    = $_REQUEST['WMD'];
            $MM     = $_REQUEST['MM'];
            $WED    = $_REQUEST['WED'];
            $IP     = $_REQUEST['IP'];
        //-------------CRITICAL PACKAGING------------------//
            $WQ     = $_REQUEST['WQ'];
            $WGS    = $_REQUEST['WGS'];
            $WTS    = $_REQUEST['WTS'];
            $MSG    = $_REQUEST['MSG'];
            $WPD    = $_REQUEST['WPD'];
            $MS     = $_REQUEST['MS'];
            $WGT    = $_REQUEST['WGT'];
            $PTS    = $_REQUEST['PTS'];
            $FC     = $_REQUEST['FC'];
            $MSI    = $_REQUEST['MSI'];
            $MB     = $_REQUEST['MB'];
            $WGA    = $_REQUEST['WGA'];
            $WPO    = $_REQUEST['WPO'];
            $POS    = $_REQUEST['POS'];
            $TRP    = $_REQUEST['TRP'];
            $MLN    = $_REQUEST['MLN'];
            $OS     = $_REQUEST['OS'];
            $DMG    = $_REQUEST['DMG'];
            $BC     = $_REQUEST['BC'];
        //--------------VISUAL PACKAGING-----------------//
            $WT     = $_REQUEST['WT'];
            $PIS    = $_REQUEST['PIS'];
            $CT     = $_REQUEST['CT'];
            $MSA    = $_REQUEST['MSA'];
            $POP    = $_REQUEST['POP'];
            $WIS    = $_REQUEST['WIS'];
            $FG     = $_REQUEST['FG'];
            $DT_PACKING     = $_REQUEST['DT_PACKING'];

            //--------------new add defect-----------------//

            $STNs     = $_REQUEST['STNs'];
            $SLDs     = $_REQUEST['SLDs'];
            $Ls     = $_REQUEST['Ls'];
            $GF    = $_REQUEST['GF'];
            $MS_critical     = $_REQUEST['MS_critical'];
            $PFK    = $_REQUEST['PFK'];
            $GSH     = $_REQUEST['GSH'];
            $LH     = $_REQUEST['LH'];
            $MH    = $_REQUEST['MH'];
            $LH_2     = $_REQUEST['LH_2'];
            $MH_2    = $_REQUEST['MH_2'];
            $LH_3     = $_REQUEST['LH_3'];
            $MH_3    = $_REQUEST['MH_3'];

            $overall_AQL    = $_REQUEST['overall_AQL'];
            $UDResultKey    = $_REQUEST['UDResultKey'];

//---------------------------------------------------------PRODUCT INFORMATION---------------------------------------------------------//
$connect->beginTransaction();
{
            $query2 = $connect->prepare("INSERT INTO T_Lot_Master (LotIDKey, LotCreatedDate, LotCreatedUserID) VALUES ((Select Coalesce(Max(LotIDKey), 0) + 1 FROM T_Lot_Master), '', '')");
            $query2->execute();

            $query = $connect->prepare("SELECT LotIDKey FROM T_Lot_Master");
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($fetch as $test){ $LotIDKey = $test['LotIDKey'];}

            $sql="INSERT INTO T_Record_Master(RecordID, RecordModuleKey, LotIDKey, InspectionCount, RecordCreatedDateTime, LastSavedDateTime, InspectionUserID, VerifiedDate, VerifierID, RecordStatusFlag) VALUES ((Select Coalesce(Max(RecordID), 0) + 1 FROM T_Record_Master),'','$LotIDKey','$InspectionCount','$RecordCreatedDateTime','','$InspectionUserID','$date_verify','$verify_by','$RecordStatusFlag')";
            $query= $connect->exec($sql);

            $query = $connect->prepare("SELECT RecordID FROM T_Record_Master");
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($fetch as $test){ $RecordID = $test['RecordID'];}    

            $query3 = $connect->prepare("INSERT INTO T_Lot_InspectionPlan (LotIDKey, InspectionPlanKey) VALUES ('$LotIDKey', '$InspectionPlanKey')");
            $query3->execute();

            $query4 = $connect->prepare("INSERT INTO T_Lot_GloveSize (LotIDKey, GloveSizeKey) VALUES ('$LotIDKey', '$GloveSizeKey')");
            $query4->execute();

            $query6 = $connect->prepare("INSERT INTO T_Lot_CartonNum (LotIDKey, CartonNum) VALUES ('$LotIDKey', '$CartonNum')");
            $query6->execute();

            $query7 = $connect->prepare("INSERT INTO T_Lot_GloveCode (LotIDKey, GloveCodeKey) VALUES ('$LotIDKey', '$GloveCodeKey')");
            $query7->execute();

            $query11 = $connect->prepare("INSERT INTO T_Lot_GloveProductType (LotIDKey, GloveProductTypeKey) VALUES ('$LotIDKey', '$GloveProductTypeKey')");
            $query11->execute();

            $query8 = $connect->prepare("INSERT INTO T_Lot_GloveColour (LotIDKey, GloveColourKey) VALUES ('$LotIDKey', '$GloveColourKey')");
            $query8->execute();

            if ($_POST['shift2'] == "") {

                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
                $query9->execute();
    
                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '2')");
                $query9->execute();
    
                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '3')");
                $query9->execute();
    
                }else if($_POST['shift3'] == "") {
                    
                    $ProductDate2           = $_POST['product_date2'];
                    $ProductionLineKey2     = $_POST['ProductionLineKey2'];
                    $Shift2                 = $_POST['shift2'];
                    
    
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
                    $query9->execute();
        
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate2', '$ProductionLineKey2', '$Shift2', '2')");
                    $query9->execute();
    
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '3')");
                    $query9->execute();
    
                }else{
    
                    $ProductionLineKey2     = $_POST['ProductionLineKey2'];
                    $ProductionLineKey3     = $_POST['ProductionLineKey3'];
                    $ProductDate2           = $_POST['product_date2'];
                    $ProductDate3           = $_POST['product_date3'];
                    $Shift2                 = $_POST['shift2'];
                    $Shift3                 = $_POST['shift3'];
    
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
                    $query9->execute();
        
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate2', '$ProductionLineKey2', '$Shift2', '2')");
                    $query9->execute();
        
                    $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate3', '$ProductionLineKey3', '$Shift3', '3')");
                    $query9->execute();
                }

            $query10 = $connect->prepare("INSERT INTO T_Lot_PackingDate (LotIDKey,PackingDate, Shift) VALUES ('$LotIDKey', '$PackingDate', '')");
            $query10->execute();

            $PalletNumber       = $_POST['PalletNumber'];
            $SONumber           = $_POST['SONumber'];

            $query1 = $connect->prepare("INSERT INTO T_Lot_FG (LotIDKey, PalletID, PlantKey, BatchNumber, SONumber, Customer, Brand, LotNumber, InspectionPlanKey, PalletNumber, CartonQuantity) VALUES ('$LotIDKey', '', '$PlantKey', '$BatchNumber', '$SONumber', '$Customer', '$Brand', '$LotNumber', '$InspectionPlanKey', '$PalletNumber', '$CartonQuantity')");
            $query1->execute();
            

//-------------------------------------------------- OTHER TESTING & PHYSICAL DIMENSION TEST --------------------------------------------//
            $sql="INSERT INTO T_Record_Instrument(RecordID, InstrumentKey, InstrumentValue) VALUES 
            ('$RecordID','1','$InstrumentValue'),
            ('$RecordID','2','$InstrumentValue2'),
            ('$RecordID','3','$InstrumentValue3'),
            ('$RecordID','4','$machine_id')";
            $query= $connect->exec($sql);


            $sql="INSERT INTO T_Record_Test(RecordID, TestKey, TestValue, SRText) VALUES 
            ('$RecordID','1','$method','$SRText1'),
            ('$RecordID','12','$TestValue','$SRText1'),
            ('$RecordID','14','$TestValue2','$SRText2'),
            ('$RecordID','8','$TestValue3','$SRTextPackaging'),
            ('$RecordID','2','$TestValue4',''),
            ('$RecordID','6','$TestValue6',''),
            ('$RecordID','9','$TestValue8',''),
            ('$RecordID','4','$TestValue10',''),
            ('$RecordID','5','$TestValue5',''),
            ('$RecordID','3','$TestValue7','$SRText8'),
            ('$RecordID','7','$TestValue9',''),
            ('$RecordID','10','$TestValue11',''),
            ('$RecordID','150','$TestValue17',''),
            ('$RecordID','149','$TestValue18',''),
            ('$RecordID','158','$TestValue20',''),
            ('$RecordID','157','$TestValue19',''),
            ('$RecordID','144','$TestValue12','$SRText3'),
            ('$RecordID','145','$TestValue13','$SRText4'),
            ('$RecordID','146','$TestValue14','$SRText5'),
            ('$RecordID','147','$TestValue15','$SRText6'),
            ('$RecordID','148','$TestValue16','$SRText7'),
            ('$RecordID','16','$length_p_f',''),
            ('$RecordID','17','$length1',''),
            ('$RecordID','18','$length2',''),
            ('$RecordID','19','$length3',''),
            ('$RecordID','20','$length4',''),
            ('$RecordID','21','$length5',''),
            ('$RecordID','22','$length6',''),
            ('$RecordID','23','$length7',''),
            ('$RecordID','24','$length8',''),
            ('$RecordID','25','$length9',''),
            ('$RecordID','26','$length10',''),
            ('$RecordID','27','$length11',''),
            ('$RecordID','28','$length12',''),
            ('$RecordID','29','$length13',''),
            ('$RecordID','30','$width_p_f',''),
            ('$RecordID','31','$width1',''),
            ('$RecordID','32','$width2',''),
            ('$RecordID','33','$width3',''),
            ('$RecordID','34','$width4',''),
            ('$RecordID','35','$width5',''),
            ('$RecordID','36','$width6',''),
            ('$RecordID','37','$width7',''),
            ('$RecordID','38','$width8',''),
            ('$RecordID','39','$width9',''),
            ('$RecordID','40','$width10',''),
            ('$RecordID','41','$width11',''),
            ('$RecordID','42','$width12',''),
            ('$RecordID','43','$width13',''),
            ('$RecordID','44','$cuff_p_f',''),
            ('$RecordID','45','$cuff1',''),
            ('$RecordID','46','$cuff2',''),
            ('$RecordID','47','$cuff3',''),
            ('$RecordID','48','$cuff4',''),
            ('$RecordID','49','$cuff5',''),
            ('$RecordID','50','$cuff6',''),
            ('$RecordID','51','$cuff7',''),
            ('$RecordID','52','$cuff8',''),
            ('$RecordID','53','$cuff9',''),
            ('$RecordID','54','$cuff10',''),
            ('$RecordID','55','$cuff11',''),
            ('$RecordID','56','$cuff12',''),
            ('$RecordID','57','$cuff13',''),
            ('$RecordID','58','$palm_p_f',''),
            ('$RecordID','59','$palm1',''),
            ('$RecordID','60','$palm2',''),
            ('$RecordID','61','$palm3',''),
            ('$RecordID','62','$palm4',''),
            ('$RecordID','63','$palm5',''),
            ('$RecordID','64','$palm6',''),
            ('$RecordID','65','$palm7',''),
            ('$RecordID','66','$palm8',''),
            ('$RecordID','67','$palm9',''),
            ('$RecordID','68','$palm10',''),
            ('$RecordID','69','$palm11',''),
            ('$RecordID','70','$palm12',''),
            ('$RecordID','71','$palm13',''),
            ('$RecordID','72','$fingertip_p_f',''),
            ('$RecordID','73','$fingertip1',''),
            ('$RecordID','74','$fingertip2',''),
            ('$RecordID','75','$fingertip3',''),
            ('$RecordID','76','$fingertip4',''),
            ('$RecordID','77','$fingertip5',''),
            ('$RecordID','78','$fingertip6',''),
            ('$RecordID','79','$fingertip7',''),
            ('$RecordID','80','$fingertip8',''),
            ('$RecordID','81','$fingertip9',''),
            ('$RecordID','82','$fingertip10',''),
            ('$RecordID','83','$fingertip11',''),
            ('$RecordID','84','$fingertip12',''),
            ('$RecordID','85','$fingertip13',''),
            ('$RecordID','86','$bead_diameter_p_f',''),
            ('$RecordID','87','$bead_diameter1',''),
            ('$RecordID','88','$bead_diameter2',''),
            ('$RecordID','89','$bead_diameter3',''),
            ('$RecordID','90','$bead_diameter4',''),
            ('$RecordID','91','$bead_diameter5',''),
            ('$RecordID','92','$bead_diameter6',''),
            ('$RecordID','93','$bead_diameter7',''),
            ('$RecordID','94','$bead_diameter8',''),
            ('$RecordID','95','$bead_diameter9',''),
            ('$RecordID','96','$bead_diameter10',''),
            ('$RecordID','97','$bead_diameter11',''),
            ('$RecordID','98','$bead_diameter12',''),
            ('$RecordID','99','$bead_diameter13',''),
            ('$RecordID','100','$cuff_edge_p_f',''),
            ('$RecordID','101','$cuff_edge1',''),
            ('$RecordID','102','$cuff_edge2',''),
            ('$RecordID','103','$cuff_edge3',''),
            ('$RecordID','104','$cuff_edge4',''),
            ('$RecordID','105','$cuff_edge5',''),
            ('$RecordID','106','$cuff_edge6',''),
            ('$RecordID','107','$cuff_edge7',''),
            ('$RecordID','108','$cuff_edge8',''),
            ('$RecordID','109','$cuff_edge9',''),
            ('$RecordID','110','$cuff_edge10',''),
            ('$RecordID','111','$cuff_edge11',''),
            ('$RecordID','112','$cuff_edge12',''),
            ('$RecordID','113','$cuff_edge13',''),
            ('$RecordID','114','$g_weight_p_f',''),
            ('$RecordID','115','$g_weight1',''),
            ('$RecordID','116','$g_weight2',''),
            ('$RecordID','117','$g_weight3',''),
            ('$RecordID','118','$g_weight4',''),
            ('$RecordID','119','$g_weight5',''),
            ('$RecordID','120','$g_weight6',''),
            ('$RecordID','121','$g_weight7',''),
            ('$RecordID','122','$g_weight8',''),
            ('$RecordID','123','$g_weight9',''),
            ('$RecordID','124','$g_weight10',''),
            ('$RecordID','125','$g_weight11',''),
            ('$RecordID','126','$g_weight12',''),
            ('$RecordID','127','$g_weight13',''),
            ('$RecordID','142','$sample_size',''),
            ('$RecordID','143','$test_method',''),
            ('$RecordID','128','$AQL_minor',''),
            ('$RecordID','130','$AQL_major',''),
            ('$RecordID','132','$AQL_critical',''),
            ('$RecordID','134','$AQL_holes1',''),
            ('$RecordID','136','$AQL_holes2',''),
            ('$RecordID','138','$AQL_holes3',''),
            ('$RecordID','129','$Acceptance_minor',''),
            ('$RecordID','131','$Acceptance_major',''),
            ('$RecordID','133','$Acceptance_critical',''),
            ('$RecordID','135','$Acceptance_holes1',''),
            ('$RecordID','137','$Acceptance_holes2',''),
            ('$RecordID','139','$Acceptance_holes3',''),
            ('$RecordID','155','$AQL_regulatoryPackaging',''),
            ('$RecordID','156',' $Acceptance_RegulatoryPackaging',''),
            ('$RecordID','161','$Result_RegulatoryPackaging',''),
            ('$RecordID','153','$AQL_CriticalPackaging',''),
            ('$RecordID','154','$Acceptance_CriticalPackaging',''),
            ('$RecordID','160','$Result_CriticalPackaging',''),
            ('$RecordID','151','$AQL_VisualPackaging',''),
            ('$RecordID','152','$Acceptance_VisualPackaging',''),
            ('$RecordID','159','$Result_VisualPackaging',''),
            ('$RecordID','140','$overall_AQL',''),
            ('$RecordID','163','$Total_holes',''),
            ('$RecordID','162','$Final_Disposition','')";
            $query= $connect->exec($sql);

            //-----------------------------------------------Defect Minor Visual-----------------------------------------------------------//
            $sql="INSERT INTO T_Record_Defect(RecordID, DefectKey, DefectValue) VALUES
            ('$RecordID','1','$DB'),
            ('$RecordID','2','$SD'),
            ('$RecordID','3','$SP'),
            ('$RecordID','4','$CA'),
            ('$RecordID','5','$CL'),
            ('$RecordID','6','$CLD'),
            ('$RecordID','7','$CS'),
            ('$RecordID','8','$DF'),
            ('$RecordID','9','$DT'),
            ('$RecordID','10','$EFI'),
            ('$RecordID','11','$FM'),
            ('$RecordID','12','$FNO'),
            ('$RecordID','13','$FO'),
            ('$RecordID','14','$GNO'),
            ('$RecordID','15','$IB'),
            ('$RecordID','16','$ICT'),
            ('$RecordID','17','$L_Major'),
            ('$RecordID','18','$LS'),
            ('$RecordID','20','$PMI'),
            ('$RecordID','21','$PMO'),
            ('$RecordID','19','$PLM'),
            ('$RecordID','23','$RM'),
            ('$RecordID','22','$RC'),
            ('$RecordID','24','$SAG'),
            ('$RecordID','25','$SG'),
            ('$RecordID','26','$SHN'),
            ('$RecordID','27','$SI'),
            ('$RecordID','28','$SKV'),
            ('$RecordID','29','$SLD'),
            ('$RecordID','30','$SO'),
            ('$RecordID','31','$STK'),
            ('$RecordID','32','$STN'),
            ('$RecordID','33','$TA'),
            ('$RecordID','34','$TS'),
            ('$RecordID','35','$UNF'),
            ('$RecordID','36','$WL'),
            ('$RecordID','37','$WSI'),
            ('$RecordID','38','$WSO'),
            ('$RecordID','40','$BP'),
            ('$RecordID','41','$DP'),
            ('$RecordID','42','$DSP'),
            ('$RecordID','43','$DTP'),
            ('$RecordID','44','$IA'),
            ('$RecordID','45','$IFS'),
            ('$RecordID','46','$IP_MAJOR'),
            ('$RecordID','47','$OP'),
            ('$RecordID','48','$RP'),
            ('$RecordID','49','$SH'),
            ('$RecordID','50','$SMP'),
            ('$RecordID','51','$BPC'),
            ('$RecordID','52','$CR'),
            ('$RecordID','53','$DC'),
            ('$RecordID','54','$DD'),
            ('$RecordID','55','$DIS'),
            ('$RecordID','56','$FMT'),
            ('$RecordID','57','$GL'),
            ('$RecordID','58','$L'),
            ('$RecordID','59','$MP'),
            ('$RecordID','60','$NB'),
            ('$RecordID','61','$NF'),
            ('$RecordID','62','$PGM'),
            ('$RecordID','63','$SDG'),
            ('$RecordID','64','$TW'),
            ('$RecordID','65','$URD'),
            ('$RecordID','66','$WE'),
            ('$RecordID','67','$WG'),
            ('$RecordID','74','$ICP'),
            ('$RecordID','75','$NP'),
            ('$RecordID','76','$WP'),
            ('$RecordID','68','$CH'),
            ('$RecordID','69','$FK'),
            ('$RecordID','70','$MF'),
            ('$RecordID','71','$TAH'),
            ('$RecordID','72','$TH'),
            ('$RecordID','73','$TR'),
            ('$RecordID','77','$BF'),
            ('$RecordID','78','$CF'),
            ('$RecordID','79','$CHs'),
            ('$RecordID','80','$FKS'),
            ('$RecordID','81','$FT'),
            ('$RecordID','82','$GB'),
            ('$RecordID','83','$P'),
            ('$RecordID','84','$SF'),
            ('$RecordID','85','$TAHs'),
            ('$RecordID','86','$THs'),
            ('$RecordID','87','$TRS'),
            ('$RecordID','143','$L_HOLES1'),
            ('$RecordID','88','$BF_2'),
            ('$RecordID','89','$CF_2'),
            ('$RecordID','90','$CHs_2'),
            ('$RecordID','91','$FKS_2'),
            ('$RecordID','92','$FT_2'),
            ('$RecordID','93','$GB_2'),
            ('$RecordID','94','$P_2'),
            ('$RecordID','95','$SF_2'),
            ('$RecordID','96','$TAHs_2'),
            ('$RecordID','97','$THs_2'),
            ('$RecordID','98','$TRS_2'),
            ('$RecordID','144','$L_HOLES2'),
            ('$RecordID','99','$BF_3'),
            ('$RecordID','100','$CF_3'),
            ('$RecordID','101','$CHs_3'),
            ('$RecordID','102','$FKS_3'),
            ('$RecordID','103','$FT_3'),
            ('$RecordID','104','$GB_3'),
            ('$RecordID','105','$P_3'),
            ('$RecordID','106','$SF_3'),
            ('$RecordID','107','$TAHs_3'),
            ('$RecordID','108','$THs_3'),
            ('$RecordID','109','$TRS_3'),
            ('$RecordID','145','$L_HOLES3'),
            ('$RecordID','113','$WLN'),
            ('$RecordID','114','$WMD'),
            ('$RecordID','112','$WED'),
            ('$RecordID','115','$WPC'),
            ('$RecordID','111','$MM'),
            ('$RecordID','110','$IP'),
            ('$RecordID','133','$WQ'),
            ('$RecordID','122','$MS'),
            ('$RecordID','119','$MB'),
            ('$RecordID','120','$MLN'),
            ('$RecordID','129','$WGS'),
            ('$RecordID','130','$WGT'),
            ('$RecordID','128','$WGA'),
            ('$RecordID','124','$OS'),
            ('$RecordID','134','$WTS'),
            ('$RecordID','126','$PTS'),
            ('$RecordID','132','$WPO'),
            ('$RecordID','117','$DMG'),
            ('$RecordID','121','$MSG'),
            ('$RecordID','118','$FC'),
            ('$RecordID','125','$POS'),
            ('$RecordID','116','$BC'),
            ('$RecordID','131','$WPD'),
            ('$RecordID','123','$MSI'),
            ('$RecordID','127','$TRP'),
            ('$RecordID','142','$WT'),
            ('$RecordID','135','$CT'),
            ('$RecordID','140','$POP'),
            ('$RecordID','137','$FG'),
            ('$RecordID','139','$PIS'),
            ('$RecordID','138','$MSA'),
            ('$RecordID','141','$WIS'),
            ('$RecordID','136','$DT_PACKING'),
            ('$RecordID','158','$STNs'),
            ('$RecordID','160','$SLDs'),
            ('$RecordID','161','$Ls'),
            ('$RecordID','146','$GF'),
            ('$RecordID','147','$MS_critical'),
            ('$RecordID','148','$GSH'),
            ('$RecordID','149','$PFK'),
            ('$RecordID','150','$LH'),
            ('$RecordID','151','$LH_2'),
            ('$RecordID','152','$LH_3'),
            ('$RecordID','155','$MH'),
            ('$RecordID','156','$MH_2'),
            ('$RecordID','157','$MH_3')";
            $query= $connect->exec($sql);

            $sql="INSERT INTO T_Record_UDResult(RecordID, UDResultKey) VALUES ('$RecordID','$UDResultKey')";
            $query= $connect->exec($sql);

            echo"<script>alert('Data is saved!!');</script>";  
            echo"<script>location.replace('page(worker).php');</script>"; 
                
                

//-------------------------------------------------------------------------------------------------------------------------------
}         
$connect->commit();              
                                            }
                                            $connect = null; 
            ?>

                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                

                                </div>
                                <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
            <label>Copyright © 2020 by QA PQC SQUAD </label>
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
            
            
        </div>
        <!-- /#page-wrapper -->

    
    

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


<script>
 $(".digit").on("keypress keyup blur",function (event) { 
 $(this).val($(this).val().replace(/[^\d].+/, ""));
 if ((event.which < 48 || event.which > 57)) {
 event.preventDefault();
 }
 });
</script>

    <SCRIPT language=Javascript>

function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

</SCRIPT>
<script type="text/javascript">
$(function(){

    $().mask('#,###.##',{reverse : true});
    var total_minor=function(){
        var sum=0;
        $('.amount').each(function(){
                var num =$(this).val().replace(',','');

                if(num !=0){
                    sum+=parseInt(num);
                }
        });
        $('#total_minor').val(sum);
    }
    $('.amount').keyup(function(){
        total_minor();
    });


    $().mask('#,###.##',{reverse : true});
    var total_major=function(){
    var sum=0;
    $('.amount2').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
    });
    $('#total_major').val(sum);
    }
    $('.amount2').keyup(function(){
    total_major();
    });


    $().mask('#,###.##',{reverse : true});
    var total_critical=function(){
    var sum=0;
    $('.amount3').each(function(){
            var num =$(this).val().replace(',','');
            if(num !=0){
                sum+=parseInt(num);
            }
    });
    $('#total_critical').val(sum);
    }
    $('.amount3').keyup(function(){
    total_critical();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes1=function(){
    var sum=0;
    $('.amount4').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes1').val(sum);
    }
    $('.amount4').keyup(function(){
    total_holes1();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes2=function(){
    var sum=0;
    $('.amount5').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes2').val(sum);
    }
    $('.amount5').keyup(function(){
    total_holes2();
    });


    $().mask('#,###.##',{reverse : true});
    var total_holes3=function(){
    var sum=0;
    $('.amount6').each(function(){
        var num =$(this).val().replace(',','');
        if(num !=0){
            sum+=parseInt(num);
        }
    });
    $('#total_holes3').val(sum);
    }
    $('.amount6').keyup(function(){
    total_holes3();
    });
});
</script>

</body>


</html>