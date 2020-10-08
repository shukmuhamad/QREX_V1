<?php
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
                            <a href="tablefg_test.php"><i class="fa fa-table fa-fw"></i> FG Table Filter</a>
                        </li>

                        <li>
                            <a href="tablesfg_test.php"><i class="fa fa-table fa-fw"></i> SFG Table Filter</a>
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
                                
                                        $query = $connect->prepare("SELECT T_Lot_Master.LotIDKey, T_Record_Master.InspectionUserID, T_Record_Master.RecordStatusFlag, T_Lot_FG.PlantKey, T_Lot_FG.BatchNumber, T_Lot_FG.CartonQuantity, T_Lot_FG.SONumber, T_Lot_FG.LotNumber, T_Lot_FG.InspectionPlanKey, T_Lot_FG.Customer, T_Lot_FG.Brand, T_Lot_CartonNum.CartonNum,
                                          T_Lot_Master.LotCreatedDate, M_GloveSize.GloveSizeKey, T_Lot_GloveProductType.GloveProductTypeKey, T_Lot_ProductionDateWLine.Shift, M_GloveCode.GloveCodeKey,
                                         M_GloveColour.GloveColourKey, T_Lot_PackingDate.PackingDate, DimProductionLine.ProductionLineKey, T_Lot_FG.PalletNumber, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                         T_Record_Master.RecordID, T_Record_Master.InspectionCount, T_Record_Master.VerifierID, T_Record_Master.VerifiedDate,T_Record_Master.RecordCreatedDateTime, T_Record_UDResult.UDResultKey, T_Record_Instrument.InstrumentValue,
                                         T_Record_Instrument.InstrumentValue

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
                                        

<!------------------------------------------------------- Factory -------------------------------------------------------------->
                                        <div>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM DimPlant");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                         
                                            <th scope="col" class="info"></th><label>Factory:</label>
                                            <td><select class="form-control "     id="PlantKey" name="PlantKey"  ></td>
                                                <option class="form-control" name="PlantKey" value=""> Choose Factory</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option <?php if ($get['PlantKey'] == $row['PlantKey']) { echo "selected";} ?>   value="<?php echo $row['PlantKey'];?>"><?php echo $row['PlantName']; }?></option>
                                                </select>
                                            </td>
                                        </div><br>
<!------------------------------------------------------- Date ----------------------------------------------------------------->
                                        <div class="form-group">
                                            <label>Inspection Date: </label><br>
                                            <?php $date = date("Y-m-d\TH:i:s", strtotime($get['RecordCreatedDateTime'])); ?>
                                            <input class="form-control" type="datetime-local" name="RecordCreatedDateTime" id="RecordCreatedDateTime" value="<?php echo $date;?>" >          
                                        </div>
<!------------------------------------------------------- Batch Number --------------------------------------------------------->
                                        <div class="form-group">
                                            <label>Batch No:</label>
                                            <input class="form-control" name="BatchNumber" id="BatchNumber" placeholder="Enter Batch No" value="<?php echo $get['BatchNumber'];?>" >
                                        </div>
<!------------------------------------------------------- Category ------------------------------------------------------------->
                                        <div class="form-group">
                                            <?php 
                                                $query = $connect->prepare("SELECT * FROM M_InspectionPlan");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <label>Category:</label></br>
                                            <td><select class="form-control" id="InspectionPlanKey" name="InspectionPlanKey"></td>
                                                <option class="form-control" name="InspectionPlanKey" value=""> Category</option>
                                                    <?php foreach ($fetch as $row) { ?>
                                                <option <?php if ($get['InspectionPlanKey'] == $row['InspectionPlanKey']) { echo "selected";} ?> value="<?php echo $row['InspectionPlanKey'];?>"><?php echo $row['InspectionPlanName']; }?></option>
                                                </select>
                                            </td>
                                        </div>

<!------------------------------------------------------- Size ----------------------------------------------------------------->
                                        <div>
                                            <?php 
                                                $query = $connect->prepare("SELECT * FROM M_GloveSize");
                                                $query->execute();
                                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <th scope="col" class="info"></th><label>Size:</label></th>
                                                <td><select class="form-control "     id="GloveSizeKey" name="GloveSizeKey">
                                                        <option class="form-control" name="GloveSizeKey" value="" > Size</option>
                                                        <?php foreach ($fetch as $row) { ?>
                                                        <option <?php if ($get['GloveSizeKey'] == $row['GloveSizeKey']) { echo "selected";} ?> value="<?php echo $row['GloveSizeKey'];?>"><?php echo $row['GloveSizeCodeLong']; }?></option>
                                                    </select>
                                                </td>
                                        </div><br>

<!------------------------------------------------------- Pallet No ------------------------------------------------------------>
                                        <div class="form-group">
                                            <label>Pallet NO:</label>
                                            <input class="form-control" name="PalletNumber" id="PalletNumber" placeholder="Enter Pallet No" value="<?php echo $get['PalletNumber'];?>">  
                                        </div>

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
                                                <input type="number" class="form-control" name="CartonQuantity" id="CartonQuantity" placeholder="Enter No" value="<?php echo $get['CartonQuantity'];?>">
                                        </div>

<!------------------------------------------------------- Carton Number -------------------------------------------------------->
                                        <div class="form-group">
                                            <label>CARTON NUMBER</label> 
                                            <input class="form-control" name="CartonNum" id="CartonNum" placeholder="Enter Carton No" value="<?php echo $get['CartonNum'];?>">
                                        </div><br>

                                        <?php 
                                            $query = $connect->prepare("SELECT RecordStatusFlag,RecordID FROM T_Record_Master");
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
                                        <td><select class="form-control "     id="Customer" name="Customer">
                                            <option class="form-control" name="" value=""> </option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['Customer'] == $row['CustomerName']) { echo "selected";} ?> value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
                                            </select>
                                        </td>
                                    </div>

<!------------------------------------------------------- Brand ---------------------------------------------------------------->
                                    <th scope="col" class="info"><label>Brand:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_Brand");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control "     id="Brand" name="Brand">
                                            <option class="form-control" name="" value=""> </option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['Brand'] == $row['BrandName']) { echo "selected";} ?> value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
                                            </select>
                                        </td> <br>
                                    
<!------------------------------------------------------- SO No ---------------------------------------------------------------->
                                    <div class="form-group">
                                        <label>SO NO:</label>
                                        <input type="text" class="form-control" name="SONumber" id="SONumber" placeholder="Enter SO Number" value="<?php echo $get['SONumber'];?>">
                                    </div>

<!------------------------------------------------------- Lot No --------------------------------------------------------------->
                                    <div class="form-group">
                                        <label>LOT NO:</label>
                                        <input type="text" class="form-control" name="LotNumber" placeholder="Enter Lot No" value="<?php echo $get['LotNumber'];?>">
                                    </div>

<!------------------------------------------------------- Product ------------------------------------------------------------->
                                        <th scope="col" class="info"><label>Product:</label></th>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveProductType");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control "     id="GloveProductTypeKey" name="GloveProductTypeKey">
                                            <option class="form-control" name="GloveProductTypeKey" value=""> Product</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveProductTypeKey'] == $row['GloveProductTypeKey']) { echo "selected";} ?> name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeKey'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
                                            </select>
                                        </td><br>
                                        
<!------------------------------------------------------- Product Code --------------------------------------------------------->
                                        <th scope="col" class="info"</th><label>Product Code:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveCode");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control "     id="GloveCodeKey" name="GloveCodeKey" >
                                            <option class="form-control" name="GloveCodeKey" value="">Product Code</option>
                                        <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveCodeKey'] == $row['GloveCodeKey']) { echo "selected";} ?> name="GloveCodeKey" value="<?php echo $row['GloveCodeKey'];?>"><?php echo $row['GloveCodeLong']; }?></option> 
                                            </select>
                                        </td><br>
                                        
<!------------------------------------------------------- Colour ------------------------------------------------------------->
                                        <th scope="col" class="info"</th><label>Colour:</label>
                                        <?php 
                                            $query = $connect->prepare("SELECT * FROM M_GloveColour");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control "     id="GloveColourKey" name="GloveColourKey" >
                                            <option class="form-control" name="GloveColourKey" value=""> Colour</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option <?php if ($get['GloveColourKey'] == $row['GloveColourKey']) { echo "selected";} ?> name="GloveColourKey" value="<?php echo $row['GloveColourKey'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </td><br>

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
                                                <td><select class="form-control" id="ProductionLineKey1" name="ProductionLineKey1">
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
                                                    </select></td>

                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date1" id="product_date1" value="<?php echo $ProductDate;?>"></td>

                                                <td><select class="form-control" id="shift1" name="shift1">
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift1" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift1" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift1" value="3"> Shift 3 </option>
                                                    </select>
                                                </td>
                                                <?php } }?>
                                            </tr>

                                            <?php 
                                            $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <tr>
                                                <td><select class="form-control" id="ProductionLineKey2" name="ProductionLineKey2">
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
                                                    </select></td>

                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date2" id="product_date2" value="<?php echo $ProductDate;?>"></td>

                                                <td><select class="form-control" id="shift2" name="shift2">
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift2" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift2" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift2" value="3"> Shift 3 </option>
                                                    </select>
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
                                                    </select></td>

                                                <?php $ProductDate = date("Y-m-d", strtotime($row['ProductionDate'])); ?>
                                                <td><input class="form-control" type="date" name="product_date3" id="product_date3" value="<?php echo $ProductDate;?>"></td>

                                                <td><select class="form-control" id="shift3" name="shift3">
                                                    <option <?php if ($row['Shift'] == '1') { echo "selected";} ?> class="form-control" name="shift3" value="1"> Shift 1</option>
                                                    <option <?php if ($row['Shift'] == '2') { echo "selected";} ?> class="form-control" name="shift3" value="2"> Shift 2</option>
                                                    <option <?php if ($row['Shift'] == '3') { echo "selected";} ?> class="form-control" name="shift3" value="3"> Shift 3 </option>
                                                    </select>
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
                                        <input type="text" class="form-control" name="InspectionUserID" value="<?php echo $get['InspectionUserID'];?>">
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
                                    </br>
                                     
                                    <div class="form-group">
                                        
                                    <?php 
                                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Instrument.InstrumentKey, T_Record_Instrument.InstrumentValue
                                        FROM T_Record_Master RIGHT JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."'");
                                        $query->execute();
                                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                        <label>WEIGHING SCALE ID</label>

                                        <?php foreach ($fetch as $test) { 
                                            if ($test['InstrumentKey'] == '1') { ?>
                                            <input class="form-control" type="text" name="InstrumentValue" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" ><br>
                                        <?php } }?>        
                                    </div>

                                    <div class="form-group">
                                        
                                        <label>RULER ID</label>
                                        <?php foreach ($fetch as $test) { ?>
                                        <?php if ($test['InstrumentKey'] == '2') { ?>
                                            <input class="form-control" type="text" name="InstrumentValue2" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" ><br>
                                        <?php } } ?>            
                                    </div>


                                    <div class="form-group">
                                        <label>THICKNESS GAUGE ID</label>
                                        <?php foreach ($fetch as $test) { ?>
                                        <?php if ($test['InstrumentKey'] == '3') { ?>
                                        <input class="form-control" type="text" name="InstrumentValue3" id="InstrumentValue" value="<?php echo $test['InstrumentValue'];?>" ><br>
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
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue2" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue2" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
                                        </td>
                                        <td><input class="form-control" name="SRText2" value="<?php echo $test['SRText'];?>" ></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if ($test['TestKey'] == '8') { ?>
                                    <tr>
                                        <td class="info">PACKAGING DEFECT:</td>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios1" value="N/A" >N/A
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue3" id="optionsRadios2" value="FAIL" >FAIL
                                            </label>
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
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue4" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                        </div>    
                                    </tr>

                                    <tr>          
                                        <th class="info">Smelly:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '5') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue5" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th scope="col" class="info">Gripness:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '6') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue6" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>

                                    <tr>  
                                        <th scope="col" class="info">Black Cloth:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '9') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue8" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th class="info">Sticking:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '7') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue9" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>    
                                        <th scope="col" class="info">Dispensing:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '4') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue10" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                         
                                    <tr>
                                        <th class="info">White Cloth:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '10') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue11" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>  
                                        <th class="info">Dye Leak:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '150') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue17" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Sealing:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '149') { ?>
                                        <td><label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue18" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Burst Test:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '157') { ?>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue19" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
                                        </td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th class="info">Visual & Peel Ability:</th>
                                        <?php foreach ($fetch as $test) { if ($test['TestKey'] == '158') { ?>
                                        <td><label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios1" value="N/A" checked>N/A
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios1" value="PASS" >PASS
                                        </label>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue20" id="optionsRadios2" value="FAIL">FAIL
                                        </label>
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
                                            <input <?php if ($test['TestValue'] == 'N/A') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios1" value="N/A" checked>N/A
                                        </label><br>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios1" value="PASS">PASS
                                        </label><br>
                                        <label class="checkbox-inline">
                                            <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="TestValue7" id="optionsRadios2" value="FAIL">FAIL
                                        </label></td>
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
                                            <select class="form-control" id="TestValue12" name="TestValue12" >
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="TestValue12" value="N/A">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue12" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue12" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?> class="form-control" name="TestValue12" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue12" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue12" value="Alcohol "> Alcohol </option>
                                            </select>
                                        
                                        </td>
                                        <td><select class="form-control" id="SRText3" name="SRText3" >
                                            <option <?php if ($test['SRText'] == 'N/A') { echo "selected";}?> class="form-control" name="SRText3" value="N/A"> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText3" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText3" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '145') {?> 
                                    <tr>
                                        <th scope="col" class="info">Test 2:</th>
                                        <td><select class="form-control" id="TestValue13" name="TestValue13">
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue13" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue13" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue13" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue13" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue13" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue13" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText4" name="SRText4">
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText4" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText4" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText4" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <?php if ($test['TestKey'] == '146') {?> 
                                    <tr>
                                        <th scope="col" class="info">Test 3:</th>
                                        <td><select class="form-control" id="TestValue14" name="TestValue14" >
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue14" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue14" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue14" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue14" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue14" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue14" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText5" name="SRText5" >
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText5" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText5" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText5" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '147') { ?> 
                                    <tr>
                                        <th scope="col" class="info">Test 4:</th>
                                        <td><select class="form-control" id="TestValue15" name="TestValue15" >
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue15" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue15" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue15" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue15" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue15" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue15" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText6" name="SRText6" >
                                            <option <?php if ($test['SRText'] == 'N/A') { echo "selected";}?> class="form-control" name="SRText6" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText6" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText6" value="FAIL "> FAIL </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <?php if ($test['TestKey'] == '148') { ?>                                     
                                    <tr>
                                        <th scope="col" class="info">Test 5:</th>
                                        <td><select class="form-control" id="TestValue16" name="TestValue16" >
                                            <option <?php if ($test['TestValue'] == 'N/A ') { echo "selected";}?> class="form-control" name="TestValue16" value="N/A ">N/A</option>
                                            <option <?php if ($test['TestValue'] == 'OMT') { echo "selected";}?> class="form-control" name="TestValue16" value="OMT"> OMT</option>
                                            <option <?php if ($test['TestValue'] == 'Foaming ') { echo "selected";}?> class="form-control" name="TestValue16" value="Foaming "> Foaming </option>
                                            <option <?php if ($test['TestValue'] == 'Rubbing') { echo "selected";}?>  class="form-control" name="TestValue16" value="Rubbing"> Rubbing</option>
                                            <option <?php if ($test['TestValue'] == 'IPA ') { echo "selected";}?> class="form-control" name="TestValue16" value="IPA "> IPA </option>
                                            <option <?php if ($test['TestValue'] == 'Alcohol ') { echo "selected";}?> class="form-control" name="TestValue16" value="Alcohol "> Alcohol </option>
                                            </select>
                                        </td>
                                        <td><select class="form-control" id="SRText7" name="SRText7" >
                                            <option <?php if ($test['SRText'] == 'N/A ') { echo "selected";}?> class="form-control" name="SRText7" value="N/A "> N/A </option>
                                            <option <?php if ($test['SRText'] == 'PASS') { echo "selected";}?> class="form-control" name="SRText7" value="PASS"> PASS</option>
                                            <option <?php if ($test['SRText'] == 'FAIL ') { echo "selected";}?> class="form-control" name="SRText7" value="FAIL "> FAIL </option>
                                            </select>
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
                                        <td><input class="form-control" name="length4" id="length4" value="<?php echo $test['TestValue'];?>"  ></td>
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
                                    <td><input class="form-control" name="width7" id="width7" value="<?php echo $test['TestValue'];?>" ></td>
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
                                    <td><input class="form-control" name="cuff10" id="cuff10" value="<?php echo $test['TestValue'];?>"></td>
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
                                    <td><select class="form-control" id="result_length3" name="cuff_p_f">
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="cuff_p_f" value="FAIL"> F</option>
                                        </select>
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>
<!----------------------------------------------------TESTKEY 58-71---------------------------------------------------------->                                
                                <tr>
                                    <th scope="col" class="info">Thickness of Palm(mm):</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '59') { ?>
                                    <td><input class="form-control" name="palm1" id="palm1" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '60') { ?>
                                    <td><input class="form-control" name="palm2" id="palm2" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '61') { ?>
                                    <td><input class="form-control" name="palm3" id="palm3" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '62') { ?>
                                    <td><input class="form-control" name="palm4" id="palm4" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '63') { ?>
                                    <td><input class="form-control" name="palm5" id="palm5" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '64') { ?>
                                    <td><input class="form-control" name="palm6" id="palm6" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '65') { ?>
                                    <td><input class="form-control" name="palm7" id="palm7" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '66') { ?>
                                    <td><input class="form-control" name="palm8" id="palm8" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '67') { ?>
                                    <td><input class="form-control" name="palm9" id="palm9" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '68') { ?>
                                    <td><input class="form-control" name="palm10" id="palm10" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '69') { ?>
                                    <td><input class="form-control" name="palm11" id="palm11" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '70') { ?>
                                    <td><input class="form-control" name="palm12" id="palm12" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '71') { ?>
                                    <td><input class="form-control" name="palm13" id="palm13" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '58') { ?>
                                    <td><select class="form-control" id="result_length4" name="palm_p_f">
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="palm_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="palm_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="palm_p_f" value="FAIL"> F</option>
                                        </select>
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
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>
<!----------------------------------------------------TESTKEY 86-99---------------------------------------------------------->                                
                                <tr>
                                    <th scope="col" class="info">*Thickness of Bead Diameter:</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '87') { ?>
                                    <td><input class="form-control" name="bead_diameter1" id="bead_diameter1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '88') { ?>
                                    <td><input class="form-control" name="bead_diameter2" id="bead_diameter2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '89') { ?>
                                    <td><input class="form-control" name="bead_diameter3" id="bead_diameter3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '90') { ?>
                                    <td><input class="form-control" name="bead_diameter4" id="bead_diameter4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '91') { ?>
                                    <td><input class="form-control" name="bead_diameter5" id="bead_diameter5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '92') { ?>
                                    <td><input class="form-control" name="bead_diameter6" id="bead_diameter6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '93') { ?>
                                    <td><input class="form-control" name="bead_diameter7" id="bead_diameter7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '94') { ?>
                                    <td><input class="form-control" name="bead_diameter8" id="bead_diameter8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '95') { ?>
                                    <td><input class="form-control" name="bead_diameter9" id="bead_diameter9" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '96') { ?>
                                    <td><input class="form-control" name="bead_diameter10" id="bead_diameter10" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '97') { ?>
                                    <td><input class="form-control" name="bead_diameter11" id="bead_diameter11" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '98') { ?>
                                    <td><input class="form-control" name="bead_diameter12" id="bead_diameter12" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '99') { ?>
                                    <td><input class="form-control" name="bead_diameter13" id="bead_diameter13" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '86') { ?>
                                    <td><select class="form-control" id="result_length6" name="bead_diameter_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="bead_diameter_p_f" value="FAIL"> F</option>
                                        </select>
                                    </td>
                                    <?php } } ?>

                                    
                                </tr>

<!----------------------------------------------------TESTKEY 100-113---------------------------------------------------------->
                                <tr>
                                    <th scope="col" class="info">*Thickness of Cuff Edge:</th>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '101') { ?>
                                    <td><input class="form-control" name="cuff_edge1" id="cuff_edge1" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '102') { ?>
                                    <td><input class="form-control" name="cuff_edge2" id="cuff_edge2" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '103') { ?>
                                    <td><input class="form-control" name="cuff_edge3" id="cuff_edge3" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '104') { ?>
                                    <td><input class="form-control" name="cuff_edge4" id="cuff_edge4" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '105') { ?>
                                    <td><input class="form-control" name="cuff_edge5" id="cuff_edge5" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '106') { ?>
                                    <td><input class="form-control" name="cuff_edge6" id="cuff_edge6" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '107') { ?>
                                    <td><input class="form-control" name="cuff_edge7" id="cuff_edge7" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '108') { ?>
                                    <td><input class="form-control" name="cuff_edge8" id="cuff_edge8" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '109') { ?>
                                    <td><input class="form-control" name="cuff_edge9" id="cuff_edge9" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '110') { ?>
                                    <td><input class="form-control" name="cuff_edge10" id="cuff_edge10" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '111') { ?>
                                    <td><input class="form-control" name="cuff_edge11" id="cuff_edge11" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '112') { ?>
                                    <td><input class="form-control" name="cuff_edge12" id="cuff_edge12" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '113') { ?>
                                    <td><input class="form-control" name="cuff_edge13" id="cuff_edge13" value="<?php echo $test['TestValue'];?>"></td>
                                    <?php } } ?>

                                    <?php foreach ($fetch as $test) { 
                                        if ($test['TestKey'] == '100') { ?>
                                    <td><select class="form-control" id="result_length7" name="cuff_edge_p_f">
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="cuff_edge_p_f" value="FAIL"> F</option>
                                        </select>
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
                                    <td><select class="form-control" id="result_length8" name="g_weight_p_f" >
                                        <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="N/A">N/A</option>
                                        <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="PASS"> P</option>
                                        <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";} ?> class="form-control" name="g_weight_p_f" value="FAIL"> F</option>
                                        </select>
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
                                        <th scope="col" class="info">MACHINE ID:</th>
                                        <td><input class="form-control" name="machine_id" value="<?php echo $test['InstrumentValue'];?>" ></td>
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
                                    <br>
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
                                        <td><select class="form-control" id="AQL_minor" name="AQL_minor">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '128') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_minor" value="N/A"> N/A</option>
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
                                         </select></td>
                                        <?php } }?>

                                        <td><select class="form-control" id="AQL_major" name="AQL_major">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '130') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_major" value="N/A"> N/A</option>
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
                                         </select></td>
                                         <?php } }?>
                                         
                                        <td><select class="form-control" id="AQL_critical" name="AQL_critical" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '132') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_critical" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_critical" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_critical" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_critical" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_critical" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes1" name="AQL_holes1" >
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '134') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_holes1" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes1" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes1" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes2" name="AQL_holes2">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '136') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_holes2" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes2" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>
                                         
                                        <td><select class="form-control" id="AQL_holes3" name="AQL_holes3">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '138') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_holes3" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_holes3" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Acceptance:</th>
                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '129') { ?>
                                        <td><input  class="form-control decimal" name="Acceptance_minor" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '131') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_major" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '133') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_critical" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '135') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_holes1" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '137') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_holes2" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } } ?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '139') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_holes3" value="<?php echo $test['TestValue'];?>" ></td>
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
                                        <td><input class="form-control" name="total_holes" value="<?php echo $test['TestValue'];?>" ></td>
                                    <?php } }?> 
                                        
                                        
                                        <th scope="col" class="info">Overall AQL:</th>
                                        <td><select class="form-control" id="P/f" name="overall_AQL">
                                            <option class="form-control" value="N/A"> N/A</option>
                                            <option class="form-control" value="0.065"> 0.065</option>
                                            <option class="form-control" value="0.10"> 0.10</option>
                                            <option class="form-control" value="0.15"> 0.15</option>
                                            <option class="form-control" value="0.25"> 0.25</option>
                                            <option class="form-control" value="0.40"> 0.40</option>
                                            <option class="form-control" value="0.65"> 0.65</option>
                                            <option class="form-control" value="1.0"> 1.0</option>
                                            <option class="form-control" value="1.5"> 1.5</option>
                                            <option class="form-control" value="2.5"> 2.5</option>
                                            <option class="form-control" value="4.0"> 4.0</option>
                                            <option class="form-control" value="6.5"> 6.5</option>
                                         </select></td>
                                        
                                         <?php 
                                            $query = $connect->prepare("SELECT * FROM M_UDResult");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>

                                          <th scope="col" class="info">UD Disposition:</th>
                                          <td>
                                          <select class="form-control" id="UDResultKey" name="UDResultKey" >
                                          <?php foreach ($fetch as $row) { ?>
                                          <option <?php if ($get['UDResultKey'] == $row['UDResultKey']) { echo "selected";} ?> value="<?php echo $row['UDResultKey']; ?>"> <?php echo $row['UDResultCode']; ?> </option> 
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
                                        <?php 
                                            $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, 
                                                                        T_Record_Test.TestValue, T_Record_Test.SRText
                                                                        FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                                        WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <td><select class="form-control" id="AQL_regulatorypackaging" name="AQL_regulatorypackaging">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '155') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_regulatorypackaging" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>

                                         <td><select class="form-control" id="AQL_criticalpackaging" name="AQL_criticalpackaging">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '153') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_criticalpackaging" value="6.5"> 6.5</option>
                                         </select></td>
                                         <?php } } ?>

                                        <td><select class="form-control" id="AQL_visualpackaging" name="AQL_visualpackaging">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '151') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="N/A"> N/A</option>
                                            <option <?php if ($test['TestValue'] == '0.065') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.065"> 0.065</option>
                                            <option <?php if ($test['TestValue'] == '0.10') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.10"> 0.10</option>
                                            <option <?php if ($test['TestValue'] == '0.15') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.15"> 0.15</option>
                                            <option <?php if ($test['TestValue'] == '0.25') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.25"> 0.25</option>
                                            <option <?php if ($test['TestValue'] == '0.40') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.40"> 0.40</option>
                                            <option <?php if ($test['TestValue'] == '0.65') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="0.65"> 0.65</option>
                                            <option <?php if ($test['TestValue'] == '1.0') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="1.0"> 1.0</option>
                                            <option <?php if ($test['TestValue'] == '1.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="1.5"> 1.5</option>
                                            <option <?php if ($test['TestValue'] == '2.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="2.5"> 2.5</option>
                                            <option <?php if ($test['TestValue'] == '4.0') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="4.0"> 4.0</option>
                                            <option <?php if ($test['TestValue'] == '6.5') { echo "selected";}?> class="form-control" name="AQL_visualpackaging" value="6.5"> 6.5</option>
                                         </select></td>
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
                                        <td><input class="form-control decimal" name="Acceptance_regulatorypackaging" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } }?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '154') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_criticalpackaging" value="<?php echo $test['TestValue'];?>" ></td>
                                        <?php } }?>

                                        <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '152') { ?>
                                        <td><input class="form-control decimal" name="Acceptance_visualpackaging" value="<?php echo $test['TestValue'];?>" ></td>
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
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '161') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="Result_Regulatory" value="N/A"> N/A</option> 
                                            <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";}?> class="form-control" name="Result_Regulatory" value="PASS"> PASS</option>
                                            <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";}?> class="form-control" name="Result_Regulatory" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                        <?php } } ?>

                                        <td><select class="form-control" id="Result_Critical" name="Result_Critical">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '160') { ?>
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="Result_Critical" value="N/A"> N/A</option> 
                                            <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";}?> class="form-control" name="Result_Critical" value="PASS"> PASS</option>
                                            <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";}?> class="form-control" name="Result_Critical" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                        <?php } } ?>

                                        <td><select class="form-control" id="Result_Visual" name="Result_Visual">
                                            <?php foreach ($fetch as $test) { 
                                                    if ($test['TestKey'] == '159') { ?> 
                                            <option <?php if ($test['TestValue'] == 'N/A') { echo "selected";}?> class="form-control" name="Result_Visual" value="N/A"> N/A</option>         
                                            <option <?php if ($test['TestValue'] == 'PASS') { echo "selected";}?> class="form-control" name="Result_Visual" value="PASS"> PASS</option>
                                            <option <?php if ($test['TestValue'] == 'FAIL') { echo "selected";}?> class="form-control" name="Result_Visual" value="FAIL"> FAIL</option>
                                            </select>
                                        </td>
                                        <?php } } ?>

                                        
                                        <td><input class="form-control" name="total_holes1" placeholder="" disabled></td>
                                        <td><input class="form-control" name="total_holes2" placeholder="" disabled></td>
                                        <td><input class="form-control" name="total_holes3" placeholder="" disabled></td>
                                        </tr>
                                  </table>
                                  
                                  
                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                        <?php 
                                            $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, 
                                                                        T_Record_Test.TestValue, T_Record_Test.SRText
                                                                        FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                                         WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                                            $query->execute();
                                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <tr>
                                        <th scope="col" class="info">FINAL DISPOSITION:</th>
                                        <td><label class="checkbox-inline">
                                            <?php foreach ($fetch as $test) {
                                                  if ($test['TestKey'] == '1') { ?>
                                                <input <?php if ($test['TestValue'] == 'PASS') { echo "checked";}?> type="radio" name="final_disposition" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input <?php if ($test['TestValue'] == 'FAIL') { echo "checked";}?> type="radio" name="final_disposition" id="optionsRadios1" value="FAIL">FAIL
                                            </label>
                                        </td>
                                    <?php } }?>
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
                                        <?php foreach ($fetch as $test) { 
                                                if ($test['DefectKey'] == '1') { ?> 
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="DB" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
 
                                        <th scope="col" class="info">SD:</th>
                                        <?php foreach ($fetch as $test) {
                                            if ($test['DefectKey'] == '2') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="SD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '3') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="SP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">STNs:</th>
                                        <?php foreach ($fetch as $test) { 
                                                if ($test['DefectKey'] == '158') { ?> 
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="STNs" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
 
                                        <th scope="col" class="info">SLDs:</th>
                                        <?php foreach ($fetch as $test) {
                                            if ($test['DefectKey'] == '160') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="SLDs" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">Ls:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '161') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount" name="Ls" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>



                                        <tr>
                                        
                                        
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '4') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="CA" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">CL:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '5') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="CL" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">CLD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '6') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="CLD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">CS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '7') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="CS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">DF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '8') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="DF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">DT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '9') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="DT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                     
                                        <th scope="col" class="info">EFI:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '10') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="EFI" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FM:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '11') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="FM" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>
                            
                                    
                                    <tr>
                                        <th scope="col" class="info">FNO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '12') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="FNO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">FO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '13') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="FO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                           
                                        <th scope="col" class="info">GNO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '14') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="GNO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    
                                        <th scope="col" class="info">IB:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '15') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="IB" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>   
                                        <th scope="col" class="info">ICT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '16') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="ICT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">L:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '17') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="L_Major" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                           
                                        <th scope="col" class="info">LS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '18') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="LS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">PMI:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '20') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="PMI" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    
                                    </tr>

                                    <tr>     
                                        
                                        <th scope="col" class="info">PMO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '21') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="PMO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">PLM:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '19') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="PLM" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">RM:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '23') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="RM" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">RC:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '22') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="RC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                    </tr> 

                                    <tr>    
                                        <th scope="col" class="info">SAG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '24') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SAG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '25') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SHN:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '26') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SHN" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SI:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '27') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SI" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">SKV:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '28') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SKV" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SLD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '29') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SLD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">SO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '30') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">STK:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '31') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="STK" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr> 

                                    <tr>
                                        <th scope="col" class="info">STN:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '32') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="STN" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">TA:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '33') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="TA" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                            
                                        <th scope="col" class="info">TS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '34') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="TS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">UNF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '35') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="UNF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>

                                    <th scope="col" class="info">WL:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '36') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="WL" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">WSI:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '37') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="WSI" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WSO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '38') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="WSO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">GF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '146') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="GF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr> 
                                    
                                </table>

                                 <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                
                                    <tr>
                                        <th scope="col" class="info">BP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '40') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="BP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">DP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '41') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="DP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">DSP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '42') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="DSP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">DTP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '43') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="DTP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">IA:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '44') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="IA" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">IFS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '45') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="IFS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">IP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '46') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="IP_MAJOR" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">OP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '47') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="OP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                     </tr>

                                    <tr>
                                        <th scope="col" class="info">RP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '48') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="RP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        <th scope="col" class="info">SH:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '49') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SH" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">SMP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '50') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount2" name="SMP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '51') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="BPC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">CR:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '52') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="CR" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">DC:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '53') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="DC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">DD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '54') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="DD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">DIS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '55') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="DIS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">FMT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '56') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="FMT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th scope="col" class="info">L:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '58') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="L" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">GL:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '57') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="GL" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        

                                        <th scope="col" class="info">MP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '59') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="MP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">NB:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '60') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="NB" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">NF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '61') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="NF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">TW:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '64') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="TW" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr> 
                                        <th scope="col" class="info">WE:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '66') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="WE" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '67') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="WG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">PGM:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '62') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="PGM" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr> 

                                    <tr> 
                                        <th scope="col" class="info">SDG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '63') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="SDG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">URD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '65') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="URD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?> 
                                        
                                        <th scope="col" class="info">MS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '147') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="MS_critical" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>   
                                    </tr>  

                                    <tr> 
                                        <th scope="col" class="info">PFK:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '149') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="PFK" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        
                                        
                                    </tr>  
                                </table>
                                        
                                <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">ICP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '74') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="ICP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                     
                                        <th scope="col" class="info">NP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '75') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="NP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '76') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="WP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr> 

                                    <tr>
                                        <th scope="col" class="info">GSH:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '74') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="GSH" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                     
                                    </tr> 
                                 </table>

                                 <table class="table table-bordered" id="dataTable">
                                    <tr>
                                        <th scope="col" class="info">TH:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '72') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="TH" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">TR:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '73') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="TR" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">TAH:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '71') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="TAH" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="info">MF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '70') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="MF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">CH:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '68') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="CH" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FK:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '69') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount3" name="FK" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '77') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="BF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">P:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '83') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="P" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">CF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '78') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="CF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">SF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '84') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="SF" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>
                                        
                                        <tr>
                                         <th scope="col" class="info">TAHs:</th>
                                         <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '85') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="TAHs" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FKS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '80') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="FKS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                       
                                        </tr>
                                       
                                        <tr>
                                         <th scope="col" class="info">THs:</th>
                                         <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '86') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="THs" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">FT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '81') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="FT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        </tr>
                                       
                                        <tr>
                                            <th scope="col" class="info">TRS:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '87') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="TRS" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
                                            
                                            <th scope="col" class="info">GB:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '82') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="GB" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
                                        </tr>
                                
                                        <tr>
                                            <th scope="col" class="info">CHs:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '79') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="CHs" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>

                                            <th scope="col" class="info">L:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '143') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="L_HOLES1" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
                                        </tr>

                                        <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '150') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="LH" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>

                                            <th scope="col" class="info">MH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '155') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount4" name="MH" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '88') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="BF_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">P:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '94') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="P_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">CF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '89') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="CF_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">SF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '95') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="SF_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">TAHs:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '96') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="TAHs_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">FKS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '91') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="FKS_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>
                                       
                                    <tr>
                                        <th scope="col" class="info">THs:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '97') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="THs_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '92') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="FT_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">TRS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '98') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="TRS_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">GB:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '93') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="GB_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>
                                        
                                    <tr>
                                        <th scope="col" class="info">CHs:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '90') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="CHs_2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">L:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '144') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="L_HOLES2" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '151') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="LH_2" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>

                                            <th scope="col" class="info">MH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '156') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount5" name="MH_2" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '99') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="BF_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">P:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '105') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="P_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">CF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '100') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="CF_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">SF:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '106') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="SF_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">TAHs:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '107') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="TAHs_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FKS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '102') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="FKS_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">THs:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '108') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="THs_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '103') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="FT_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">TRS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '109') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="TRS_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">GB:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '104') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="GB_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                        <th scope="col" class="info">CHs:</th>
                                          <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '101') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="CHs_3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">L:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '145') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="L_HOLES3" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                    </tr>

                                    <tr>
                                            <th scope="col" class="info">LH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '152') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="LH_3" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>

                                            <th scope="col" class="info">MH:</th>
                                            <?php foreach ($fetch as $test) {
                                                    if ($test['DefectKey'] == '157') { ?>
                                            <td><input onkeypress="return isNumberKey(event)" class="form-control input-sm text-right amount6" name="MH_3" value="<?php echo $test['DefectValue']?>"></td>
                                            <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '113') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WLN" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WMD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '114') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WMD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WED:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '112') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WED" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPC:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '115') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">MM:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '111') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MM" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">IP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '110') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="IP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '113') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WQ" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">MS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '112') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">MB:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '119') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MB" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">MLN:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '120') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MLN" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WGS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '129') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WGT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '130') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WGA:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '128') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WGA" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">OS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '124') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="OS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WTS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '134') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WTS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">PTS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '126') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="PTS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WPO:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '132') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPO" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">DMG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '117') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="DMG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">MSG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '121') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">FC:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '118') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="FC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">POS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '125') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="POS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">BC:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '116') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="BC" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">WPD:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '131') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WPD" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">MSI:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '123') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSI" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">TRP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '127') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="TRP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
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
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '142') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">CT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '135') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="CT" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">POP:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '140') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="POP" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">FG:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '137') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="FG" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        </tr>

                                        <tr>
                                        <th scope="col" class="info">PIS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '139') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="PIS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">MSA:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '138') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="MSA" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
                                        
                                        <th scope="col" class="info">WIS:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '141') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="WIS" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>

                                        <th scope="col" class="info">DT:</th>
                                        <?php foreach ($fetch as $test) {
                                                if ($test['DefectKey'] == '136') { ?>
                                        <td><input onkeypress="return isNumberKey(event)" class="form-control" name="DT_PACKING" value="<?php echo $test['DefectValue']?>"></td>
                                        <?php } }?>
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
                                 Verify by: <input class="form-control" type="number" name="verify_by" value="<?php echo $get['VerifierID'];?>"><br>     
                                </div>

                                  <div class="form-group">
                                  <?php $date2 = date("Y-m-d\TH:i:s", strtotime($get['VerifiedDate'])); ?>
                                  Date:<input class="form-control" type="datetime-local" name="VerifiedDate" id="VerifiedDate" value="<?php echo $date2;?>"><br>
                                  </div>

                                </div>
                        </div>
                    </div>                
                </div>
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

                            
    <?php include 'transactioneditfg.php'?>

                                    
                               
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


</body>
<script>
$('.decimal').keypress(function(evt){
    return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
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

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

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



</html>