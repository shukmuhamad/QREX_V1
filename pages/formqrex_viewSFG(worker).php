  <!-- Print Result  -->
<?php
      require_once 'session_staff.php';
  require_once 'header.php';
  require_once 'database_connection.php';
  
?>

   
    
     
<!DOCTYPE html>
<html lang = "en">
<body>
<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
  <div  class = "container-fluid">
    <div class = "navbar-header">
      <a class = "navbar-brand" >QUALITY RECORD E SYSTEM (QREX) - SFG</a>
                
</nav>  
    
      <div class = "container-fluid">       
    
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                            Customer Information
              </div>
              <div class="panel-body"> 
                <div class="row">
                  <div class="col-lg-6">
                    <?php
                      
                      $query = $connect->prepare("SELECT T_Lot_Master.LotIDKey, T_Record_Master.RecordStatusFlag, T_Record_Master.RecordCreatedDateTime,T_Record_Master.InspectionUserID, T_Lot_Master.LotCreatedUserID, T_Lot_SFG.PlantKey, T_Lot_SFG.BatchNumber, T_Lot_SFG.CartonQuantity, T_Lot_SFG.LotNumber, T_Lot_SFG.InspectionPlanKey, T_Lot_SFG.Customer, T_Lot_SFG.Brand, T_Lot_CartonNum.CartonNum, T_Lot_GloveProductType.GloveProductTypeKey,  T_Lot_Master.LotCreatedDate, M_GloveSize.GloveSizeKey, T_Lot_ProductionDateWLine.Shift, M_GloveCode.GloveCodeKey, M_GloveColour.GloveColourKey, T_Lot_PackingDate.PackingDate, DimProductionLine.ProductionLineKey, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Master.RecordID, T_Record_Master.InspectionCount, T_Record_Master.VerifierID, T_Record_Master.VerifiedDate, T_Record_Instrument.InstrumentValue,T_Record_Instrument.InstrumentValue  
                      FROM T_Lot_Master RIGHT JOIN T_Lot_SFG ON T_Lot_Master.LotIDKey = T_Lot_SFG.LotIDKey 
                      FULL JOIN DimPlant ON T_Lot_SFG.PlantKey = DimPlant.PlantKey 
                      FULL JOIN T_Lot_CartonNum ON T_Lot_Master.LotIDKey = T_Lot_CartonNum.LotIDKey 
                      FULL JOIN T_Lot_GloveProductType ON T_Lot_Master.LotIDKey = T_Lot_GloveProductType.LotIDKey 
                      FULL JOIN T_Lot_ProductionDateWLine ON T_Lot_Master.LotIDKey = T_Lot_ProductionDateWLine.LotIDKey 
                      FULL JOIN DimProductionLine ON T_Lot_ProductionDateWLine.ProductionLineKey = DimProductionLine.ProductionLineKey 
                      FULL JOIN T_Lot_GloveCode ON T_Lot_Master.LotIDKey = T_Lot_GloveCode.LotIDKey 
                      FULL JOIN M_GloveCode ON T_Lot_GloveCode.GloveCodeKey = M_GloveCode.GloveCodeKey 
                      FULL JOIN T_Lot_GloveSize ON T_Lot_Master.LotIDKey = T_Lot_GloveSize.LotIDKey 
                      FULL JOIN M_GloveSize ON T_Lot_GloveSize.GloveSizeKey = M_GloveSize.GloveSizeKey
                      FULL JOIN T_Lot_GloveColour ON T_Lot_Master.LotIDKey = T_Lot_GloveColour.LotIDKey
                      FULL JOIN M_GloveColour ON T_Lot_GloveColour.GloveColourKey = M_GloveColour.GloveColourKey
                      FULL JOIN T_Lot_PackingDate ON  T_Lot_Master.LotIDKey = T_Lot_PackingDate.LotIDKey
                      FULL JOIN T_Record_Master ON T_Lot_Master.LotIDKey = T_Record_Master.LotIDKey 
                      FULL JOIN T_Record_Test ON T_Record_Master.RecordID = T_Record_Test.RecordID 
                      FULL JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID WHERE T_Lot_Master.LotIDKey = '".$_GET['LotIDKey']."'");
                                            //$query = $connect->prepare("SELECT * FROM T_Lot_SFG");
                      $query->execute();
                      $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                      foreach ($fetch as $get) {}
                    ?>            
                  
                    <form role="form" method ="post">
                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM DimPlant");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);  
                        ?>
                        Factory: <?php foreach ($fetch as $row) { if ($get['PlantKey'] == $row['PlantKey']) { ?> 
                        <label> <?php  echo $row['PlantName']; }} ?> </label>
                      </div>
                                        
                      <div class="form-group">
                        <?php $date = date("d/m/Y h:i:s A", strtotime($get['RecordCreatedDateTime'])); ?>
                        Date:   
                        <label><?php echo $date;?></label>
                      </div>
                      
                      <div class="form-group">
                        Batch No:  
                        <label><?php echo $get['BatchNumber'];?></label>
                      </div>
                                         
                      <div class="form-group">
                        Inspection Stage: 
                        <label> <?php echo 'SEMI FINISHED GOOD'?></label></br> 
                      </div>
                                        
                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM M_InspectionPlan");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        Category: <?php foreach ($fetch as $row) { if ($get['InspectionPlanKey'] == $row['InspectionPlanKey']) { ?> 
                        <label><?php echo $row['InspectionPlanName']; } } ?></label></br>
                      </div>   
                                        
                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM M_GloveSize");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        Size: <?php foreach ($fetch as $row) { if ($get['GloveSizeKey'] == $row['GloveSizeKey']) { ?> 
                        <label> <?php echo $row['GloveSizeCodeLong']; } }?> </label></br> 
                      </div>
                                        
                      <div class="form-group">
                        Inspection Count:
                        <label> <?php echo $get['InspectionCount'];?></label></br> 
                      </div>
                    
                      <div class="form-group">
                        Quantity Carton / Bag: 
                        <label><?php echo $get['CartonQuantity'];?></label></br> 
                      </div>
                    
                      <div class="form-group">
                        Carton Number: 
                        <label><?php echo $get['CartonNum'];?></label></br> 
                      </div>

                      <div class="form-group">
                        Status: 
                        <label>
                        <?php if ($get['RecordStatusFlag'] == '1') echo "N/A";
                              if ($get['RecordStatusFlag'] == '2') echo "Reinspect";
                              if ($get['RecordStatusFlag'] == '3') echo "Convert Inspection";
                              if ($get['RecordStatusFlag'] == '4') echo "Repack Inspection";?>
                        </label></br> 
                      </div>
                      </div> 

                      <div class="col-lg-6">

                      <div class="form-group">
                        Customer: 
                        <label><?php echo $get['Customer'];?></label><br>
                      </div>
                      
                      <div class="form-group">
                        Brand: 
                        <label><?php echo $get['Brand'];?></label>
                      </div>
                      
                      <div class="form-group">
                        LOT NO: 
                        <label><?php echo $get['LotNumber'];?></label>
                      </div>
                    
                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM M_GloveProductType");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        Product :  <?php foreach ($fetch as $row) { if ($get['GloveProductTypeKey'] == $row['GloveProductTypeKey']) { ?>
                        <label><?php echo $row['GloveProductTypeName']; } }?></label>
                      </div>
                    
                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM M_GloveCode");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        Product Code: <?php foreach ($fetch as $row) { if ($get['GloveCodeKey'] == $row['GloveCodeKey']) { ?>
                        <label><?php echo $row['GloveCodeLong']; } }?></label>
                      </div>

                      <div class="form-group">
                        <?php 
                          $query = $connect->prepare("SELECT * FROM M_GloveColour");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        Colour: <?php foreach ($fetch as $row) { if ($get['GloveColourKey'] == $row['GloveColourKey']) { ?> 
                        <label><?php echo $row['GloveColourName']; } }?></label>
                      </div>
                                                              
                      <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                        
                        <tr class="info">
                          <th class="text-center" colspan="2">Production:</th>
                          <th class="text-center">Shift:</th>
                        </tr>
                        <?php 
                          $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                          foreach ($fetch as $row) {
                        ?>
                        <tr>
                          <?php 
                            $query = $connect->prepare("SELECT * FROM DimProductionLine WHERE ProductionLineKey = '".$row['ProductionLineKey']."'");
                            $query->execute();
                            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($fetch as $data) {
                          ?>

                        <?php 
                            if ($row['Shift'] == NULL) { ?>
                            <input type="hidden" name="ProductionLineKey1" value="<?php echo $row['ProductionLineKey'] ?>">
                            <input type="hidden" name="production_date1" value="<?php echo $row['ProductionDate'] ?>">
                            <input type="hidden" name="shift1" value="<?php echo $row['Shift'] ?>">
                          
                            <?php } else { ?>

                          <td style="text-align:center"><?php echo $data['ProductionLineName'];}?></td>
                          <?php $ProductDate = date("d/m/Y", strtotime($row['ProductionDate'])); ?>
                          <td style="text-align:center"><?php echo $ProductDate;?></td>
                          <td style="text-align:center"><?php echo $row['Shift'];}}?></td>
                        </tr>
                      </table>
					    
                      <div class="form-group">
                        <?php $Packdate = date("d/m/Y", strtotime($get['PackingDate'])); ?>
                        Pack Date: 
                        <label> <?php echo $Packdate?></label>
                      </div>
                    
                      <div class="form-group">
                        Checked By: 
                        <label><?php echo $get['InspectionUserID'];?></label>
                      </div>
                    </div>
                  </div>
                </div>
                                  
                <div class="row">
                  <div class="col-lg-12">                   
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        Internal Physical Test
                      </div>
                      
<!-----------------------------------------------------------1.INSTRUMENT--------------------------------------------------------------------------->
                      <div class="col-lg-6"></br>

                      <label>1. Instruments</label></br></br>
                      <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Instrument.InstrumentKey, 
                                 T_Record_Instrument.InstrumentValue
                                 FROM T_Record_Master RIGHT JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID 
                                 WHERE T_Record_Master.RecordID = '".$get['RecordID']."'");
                                 $query->execute();
                                 $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                      ?>  
                        
                        <div class="form-group">
                          Weighing Scale ID:
                          <?php foreach ($fetch as $test) { if ($test['InstrumentKey'] == '1') { ?> 
                          <label><?php echo $test['InstrumentValue'];}}?></label>
                        </div>
                                        
                        <div class="form-group">
                          Ruler ID:
                          <?php foreach ($fetch as $test) { if ($test['InstrumentKey'] == '2') { ?> 
                          <label> <?php echo $test['InstrumentValue'];}}?> </label> 
                        </div>
                                        
                        <div class="form-group">
                          Thickness Gauge ID: 
                          <?php foreach ($fetch as $test) { if ($test['InstrumentKey'] == '3') { ?> 
                          <label>  <?php echo $test['InstrumentValue'];}}?></label>
                        </div>
                        <br>                    
<!-----------------------------------------------------------2. TEST RESULT--------------------------------------------------------------------------->                                       
                        <label>2. Test Result</label></br></br>
                        <?php
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, T_Record_Test.SRText
                                                  FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                  WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="form-group"> 
                          Glove Weight:
                          <?php foreach ($fetch as $test) {
                                if ($test['TestKey'] == '12' && $test['SRText'] == TRUE) { ?> 
                          <label><?php echo $test['TestValue']?>, <?php echo $test['SRText'];}?></label>
                          <?php if ($test['TestKey'] == '12' && $test['SRText'] == FALSE) { ?> 
                          <label><?php echo $test['TestValue'];}?></label>
                          <?php } ?>
                        </div>   
                   
                        <div class="form-group">  
                          Counting:
                          <?php foreach ($fetch as $test) {
                                if ($test['TestKey'] == '14' && $test['SRText'] == TRUE) { ?>
                          <label><?php echo $test['TestValue']?>, <?php echo $test['SRText'];}?></label>
                          <?php if ($test['TestKey'] == '14' && $test['SRText'] == FALSE) { ?> 
                          <label><?php echo $test['TestValue'];}?></label>
                          <?php } ?>
                        </div>  
                    
                        <div class="form-group">  
                          Packaging Defect:  
                          <?php foreach ($fetch as $test) {
                                if ($test['TestKey'] == '8' && $test['SRText'] == TRUE) { ?>
                          <label><?php echo $test['TestValue']?>, <?php echo $test['SRText'];}?></label>
                          <?php if ($test['TestKey'] == '8' && $test['SRText'] == FALSE) { ?> 
                          <label><?php echo $test['TestValue'];}?></label>
                          <?php } ?>
                        </div>  
                      </div><br>
                                
<!-----------------------------------------------------------3. INTERNAL PHYSICAL TESTING ------------------------------------------------------------>                   <!-- /.col-lg-6 (nested) -->
                      <div class="col-lg-4">
                        <label>3. Internal Physical Testing</label>
                        <?php
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                      T_Record_Test.SRText
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
                            <td><?php echo $test['TestValue'];} }?></td>
                                        
                            <th class="info">Smelly:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '5') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                          </tr>
                                        
                          <tr>
                            <th scope="col" class="info">Gripness:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '6') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                            
                            <th scope="col" class="info">Black Cloth:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '9') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>          
  
                          </tr>
                                        
                          <tr>
                            <th class="info">Sticking:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '7') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                            
                            <th scope="col" class="info">Dispensing:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '4') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>

                          </tr>
                                         
                          <tr>
                            <th class="info">White Cloth:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '10') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>

                            <th class="info">Dye Leak:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '150') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>

                          </tr>
                          <tr>
                            <th class="info">Sealing:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '149') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                          
                            <th class="info">Burst Test:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '157') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                          </tr>
                          <tr>
                            <th class="info">Visual & Peel Ability:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '158') { ?>
                            <td><?php echo $test['TestValue'];} }?></td>
                          </tr>
                        </table><br>

                        <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                        <tr>
                          <th class="info" rowspan="2">Donning & Tearing:</th>
                          <th>Result</th>
                          <th>Remark</th>
                        </tr>
                        <tr>
                        <div class="form-group"> 
                          <?php foreach ($fetch as $test) { 
                                if ($test['TestKey'] == '3') { ?> 
                          <td><?php echo $test['TestValue']?></td>
                          <td><?php echo $test['SRText'];}?></td>
                        <?php } ?>
                        </div>
                        </tr>
                      </table>

<!-----------------------------------------------------------4. SPECIAL REQUIREMENT ------------------------------------------------------------------>
                                    
                        <label>4. Special Requirements</label>
                        <?php
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                      T_Record_Test.SRText
                                                      FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                      WHERE T_Record_Master.RecordID = '".$get['RecordID']."' ");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                      
                        ?>                
                        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                          <tr>
                            <div class="form-group">
                            <th scope="col" class="info">Test No:</th>
                            <th class="info">Test Name:</th>
                            <th scope="col" class="info">Disposition:</th>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 1:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '144') { ?>
                            <td><?php echo $test['TestValue'];?></td>
                            <td><?php echo $test['SRText'];} }?></td>
                          </tr>
                      
                          <tr>
                            <th scope="col" class="info">Test 2:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '145') { ?>
                            <td><?php echo $test['TestValue'];?></td>
                            <td><?php echo $test['SRText'];} }?></td>
                          </tr>
                      
                          <tr>
                            <th scope="col" class="info">Test 3:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '146') { ?>
                            <td><?php echo $test['TestValue'];?></td>
                            <td><?php echo $test['SRText'];} }?></td>
                          </tr>
                      
                          <tr>
                            <th scope="col" class="info">Test 4:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '147') { ?>
                            <td><?php echo $test['TestValue'];?></td>
                            <td><?php echo $test['SRText'];} }?></td>
                          </tr>
                      
                          <tr>
                            <th scope="col" class="info">Test 5:</th>
                            <?php foreach ($fetch as $test) { if ($test['TestKey'] == '148') { ?>
                            <td><?php echo $test['TestValue'];?></td>
                            <td><?php echo $test['SRText'];} }?></td>
                          </tr>
                        </table>
                      </div>

<!-----------------------------------------------------------PHYSICAL DIMENSION TEST --------------------------------------------------------------->                      <div class="row">
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

                                                          <?php foreach ($fetch as $test) { if ($test['TestKey'] == '1') { ?>
                        <td><?php echo $test['TestValue'];} }?></td>
                    </tr>
                                 </table>
                        </div>
                           <div class="col-lg-12">

                             <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                              <tr class="info">
                                <th class="text-center">TEST</th>
                              <th class="text-center">1</th>
                              <th class="text-center">2</th>
                              <th class="text-center">3</th>
                              <th class="text-center">4</th>
                              <th class="text-center">5</th>
                              <th class="text-center">6</th>
                              <th class="text-center">7</th>
                              <th class="text-center">8</th>
                              <th class="text-center">9</th>
                              <th class="text-center">10</th>
                              <th class="text-center">11</th>
                              <th class="text-center">12</th>
                              <th class="text-center">13</th>
                              <th class="text-center">PASS/FAIL</th>
                        </tr>

                              <?php 
                                $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                            T_Record_Test.SRText
                                                            FROM T_Record_Test LEFT JOIN T_Record_Master 
                                                            ON T_Record_Test.RecordID = T_Record_Master.RecordID WHERE T_Record_Test.TestKey 
                                                            BETWEEN 16 AND 127 AND T_Record_Master.RecordID = '".$get['RecordID']."'");
                                $query->execute();
                                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                              ?>

                              <tr>
                                <th scope="col" class="info">Length(mm):</th>
                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '17') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '18') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '19') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '20') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '21') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '22') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '23') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '24') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '25') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '26') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '27') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '28') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '29') { ?>
                                <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>

                                <?php foreach ($fetch as $test) { 
                                      if ($test['TestKey'] == '16') { ?>
                               <td class="text-center"><?php echo $test['TestValue'];?></td>
                                <?php } } ?>
                             </tr>
                    
                          <tr>
                            <th scope="col" class="info">Width(mm):</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '31') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '32') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '33') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '34') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '35') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '36') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '37') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '38') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '39') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '40') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '41') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '42') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '43') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '30') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                        
                          <tr>
                            <th scope="col" class="info">Thickness of Cuff(mm):</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '45') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '46') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '47') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '48') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '49') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '50') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '51') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '52') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '53') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '54') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '55') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                              <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '56') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '57') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '44') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                    
                          <tr>
                            <th scope="col" class="info">Thickness of Palm(mm):</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '59') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '60') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '61') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '62') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '63') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '64') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '65') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '66') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '67') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '68') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '69') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '70') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '71') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '58') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                       
                          <tr>
                            <th scope="col" class="info">Thickness of Fingertip(mm):</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '73') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '74') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '75') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '76') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '77') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '78') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '79') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '80') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '81') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '82') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '83') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '84') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '85') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '72') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                        
                          <tr>
                            <th scope="col" class="info">Thickness of Bead Diameter:</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '87') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '88') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '89') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '90') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '91') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '92') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '93') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '94') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '95') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '96') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '97') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '98') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '99') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '86') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                        
                          <tr>
                            <th scope="col" class="info">Thickness of Cuff Edge:</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '101') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '102') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '103') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '104') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '105') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '106') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '107') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '108') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '109') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '110') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '111') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '112') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '113') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '100') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>
                                    
                          <tr>
                            <th scope="col" class="info">Weight:</th>
                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '115') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '116') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '117') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '118') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '119') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '120') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '121') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '122') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '123') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '124') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '125') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '126') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '127') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>

                            <?php foreach ($fetch as $test) { 
                                  if ($test['TestKey'] == '114') { ?>
                            <td class="text-center"><?php echo $test['TestValue'];?></td>
                            <?php } } ?>
                          </tr>

                        </table>
                             
                      </div>
                    </div>
                  </div>
                </div><br><br>
<!----------------------------------------------------------- INSPECTION RECORD --------------------------------------------------------------------->                  
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      Inspection Record
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                    <?php

                      $query = $connect->prepare("SELECT T_Record_Instrument.InstrumentKey, T_Record_Instrument.InstrumentValue, 
                                                  T_Record_SampleSize.SampleSizeValue, T_Record_SampleSize.SampleSizeCategory
                                                  FROM T_Record_Master RIGHT JOIN T_Record_Instrument ON T_Record_Master.RecordID = T_Record_Instrument.RecordID
                                                  FULL JOIN T_Record_SampleSize ON T_Record_Master.RecordID = T_Record_SampleSize.RecordID WHERE T_Record_Master.RecordID = '".$get['RecordID']."'");
                      $query->execute();
                      $fetch = $query->fetchAll(PDO::FETCH_ASSOC);   
                    ?>
                      <tr>
                        <th scope="col" class="info">MACHINE ID APT/WTT:</th>
                        <?php foreach ($fetch as $test) {
                              if ($test['InstrumentKey'] == '4') { ?>
                        <td><input class="form-control" id="machine_id"  value="<?php echo $test['InstrumentValue'];?>" disabled></td>
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
                                                      <td><input class="form-control" name="sample_size" value="<?php echo $test['TestValue'];?>" disabled></td>
                                                      <?php } }?>

                        <th scope="col" class="info">SAMPLE SIZE WTT:</th>
                                                            <?php foreach ($fetch as $test) { 
                                                                  if ($test['TestKey'] == '143') { ?> 
                                                            <td><input class="form-control" name="test_method" value="<?php echo $test['TestValue']?>" disabled></td>
                                                            <?php } }?>
                      </tr>
                  
                        </table>

                        <td><b>**Inspection Plan & Level </b><a class = "btn btn-default" 
                              data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td> 
                              <td><b>*Glove Inspection</b></td> 
                                    
                        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                        <tr class="info">
                        <th></th>
                              <th colspan="2" width="13%">MINOR VISUAL</th>
                              <th colspan="4" width="30%">MAJOR VISUAL</th>
                              <th colspan="3" width="18%">CRITICAL</th>
                              <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 1</th>
                        <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 2</th>
                        <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 3</th>
                              </tr>
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                      T_Record_Test.SRText
                                                      FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                      WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                                                                  <tr>
                                                            <th scope="col" class="info">AQL:</th>
                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '128') { ?> 
                        <td colspan="2"><input class="form-control" id="AQL_minor" name="AQL_minor" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '130') { ?> 
                        <td colspan="4"><input class="form-control" id="AQL_major" name="AQL_major" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '132') { ?> 
                        <td colspan="3"><input class="form-control" id="AQL_critical" name="AQL_critical" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '134') { ?> 
                        <td colspan="2"><input class="form-control" id="AQL_holes1" name="AQL_holes1" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '136') { ?> 
                        <td colspan="2"><input class="form-control" id="AQL_holes2" name="AQL_holes2" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '138') { ?> 
                        <td colspan="2"><input class="form-control" id="AQL_holes3" name="AQL_holes3" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>
                        </tr>
                                          
                        <tr>
                        <th scope="col" class="info">Acceptance:</th>
                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '129') { ?> 
                        <td colspan="2"><input class="form-control" id="Acceptance_minor" name="Acceptance_minor" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '131') { ?> 
                        <td colspan="4"><input class="form-control" id="Acceptance_major" name="Acceptance_major" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '133') { ?> 
                        <td colspan="3"><input class="form-control" id="Acceptance_critical" name="Acceptance_critical" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '135') { ?> 
                        <td colspan="2"><input class="form-control" id="Acceptance_holes1" name="Acceptance_holes1" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '137') { ?> 
                        <td colspan="2"><input class="form-control" id="Acceptance_holes2" name="Acceptance_holes2" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['TestKey'] == '139') { ?> 
                        <td colspan="2"><input class="form-control" id="Acceptance_holes3" name="Acceptance_holes3" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>
                        </tr>
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Defect.DefectKey, T_Record_Defect.DefectValue
                                                      FROM T_Record_Defect LEFT JOIN T_Record_Master ON T_Record_Defect.RecordID = T_Record_Master.RecordID 
                                                      WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                        ?>                  
                        <tr>
                        <th rowspan="12" scope="col" class="info"> Defect</th>

                        <!------------ MINOR VIS L1 ------------------------------------>
                        
                        <td>DB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '1') {
                              echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
                        <td>SD:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '2') { 
                              echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ MAJOR VIS L1 ------------------------------------>

                        <td>CA:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '4') {
                              echo $test['DefectValue']?></td>
                        <?php } }?></font>
 
                        <td>CL:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '5') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>CLD:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '6') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>CS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '7') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                       

                        <!------------ CRITICAL L1 ------------------------------------->
                        
                        <td>BPC:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '51') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>CR:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '52') {
                                echo $test['DefectValue']?></td>
                        <?php } }?>

                        <td>DC:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '53') {
                                echo $test['DefectValue']?></td>
                        <?php } }?>
                        
                        <!------------ DEF HOLES 1 L1 ------------------------------------->              
                        <td>BF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '77') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>P:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '83') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 2 L1 ----------------------------------->                
                        <td>BF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '88') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>P:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '94') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ DEF HOLES 3 L1 ----------------------------------->                
                        <td>BF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '99') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>P:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '105') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                      </tr>

                      <tr>
                        
                        <!------------ MINOR VIS L2 ----------------------------------->
                        <td>SP: 
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '3') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                       
                        <td>STNs: 
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '158') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                       
                        <!------------ MAJOR VIS L2 ---------------------------------->
                        
                        <td>DF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '8') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                                  
                        <td>DT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '9') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>EFI:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '10') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <td>FM:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '11') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ CRITICAL L2 ---------------------------------->
                        <td>DD:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '54') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DIS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '55') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FMT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '56') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 1 L2 ---------------------------------->
                        
                        <td>CF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '78') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '84') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
                        <!------------ DEF HOLES 2 L2 ---------------------------------->
                        <td>CF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '89') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '95') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                             
                        <!------------ DEF HOLES 3 L2 ---------------------------------->
                        <td>CF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '100') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                       
                        <td>SF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '106') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                      </tr>
                      
                      <tr>
                        
                        <!------------ MINOR VIS L3 -------------------------------------->
                        <td>SLDs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '160') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>Ls:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '161') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
                        <!------------ MAJOR VIS L3 -------------------------------------->

                        <td>FNO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '12') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '13') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GNO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '14') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>IB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '15') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ CRITICAL L3 --------------------------------------->

                        <td>L:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '58') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GL:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '57') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '59') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>


                        <!------------ DEF HOLES 1 L3 ------------------------------------->

                        <td>TAHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '85') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                      
                        <td>FKS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '80') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 2 L3 ------------------------------------>
                        
                        <td>TAHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '96') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FKS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '91') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 3 L3 ------------------------------------->
                        <td>TAHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '107') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FKS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '102') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                      </tr>
                                     
                      <tr>
                        
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L4 ---------------------------------------->
                        
                        <td>ICT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '16') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>L:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '17') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>LS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '18') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>PMI:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '20') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                       
                        
                        <!------------ CRITICAL L4 ------------------------------------------>
                        
                        <td>NB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '60') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>NF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '61') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TW:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '64') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 1 L4 ---------------------------------------->
                        <td>THs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '86') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '81') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ DEF HOLES 2 L4 ----------------------------------------->
                        
                        <td>THs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '97') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                                                
                        <td>FT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '92') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
     
                        <!------------ DEF HOLES 3 L4 ----------------->
                        <td>THs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '108') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        

                        <td>FT:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '103') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        </tr>
                                     
                      <tr>
                        
                        <td></td>
                        <td></td>

                        
                        <!------------ MAJOR VIS L5 ---------------------------------------->

                        <td>PMO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '21') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>PLM:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '19') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                                                
                        <td>RM:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '23') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>RC:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '22') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ CRITICAL L5 ---------------------------------------->

                        <td>WE:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '66') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WG:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '67') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>PGM:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '62') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ DEF HOLES 1 L5 ---------------------------------------->
                        <td>TRS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '87') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '82') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
	            
                        <!------------ DEF HOLES 2 L5 ---------------------------------------->
                        <td>TRS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '98') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '93') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

						            
                        <!------------ DEF HOLES 3 L5 ---------------------------------------->
                        <td>TRS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '109') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GB:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '104') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
				</tr>
             
                      <tr>

                      <td></td>

                      <td></td>
                        
                        
                        <!------------ MAJOR VIS L6 ---------------------------------------->
                        <td>SAG:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '24') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SG:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '25') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SHN:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '26') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SI:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '27') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
                        <!------------ CRITICAL L6 ---------------------------------------->

                        <td>SDG:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '63') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>URD:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '65') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        

                        <td></td>

                        
                        
                        <!------------ DEF HOLES 1 L6 ---------------------------------------->
                        <td>CHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '79') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <td>L:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '143') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        
                        <!------------ DEF HOLES 2 L6 ---------------------------------------->
                        <td>CHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '90') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>L:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '144') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLES 3 L6 ---------------------------------------->
                        <td>CHs:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '101') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>L:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '145') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                      </tr>
                                     
                      <tr>
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L7 ---------------------------------------->
                       
                        <td>SKV:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '28') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SLD:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '29') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '30') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>STK:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '31') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>


                        <!------------ CRITICAL L7 ---------------------------------------->
                        <td>ICP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '74') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        

                        <td>NP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '75') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '76') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ DEF HOLE 1 L7 ---------------------------------------->

                        <td>LH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '150') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '155') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        
                        <!------------ DEF HOLE 2 L7 ---------------------------------------->

                        <td>LH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '151') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '156') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ DEF HOLE 3 L7 ---------------------------------------->

                        <td>LH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '152') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '156') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                                               
                      </tr>
                      
                      <tr>
                       
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L8 ---------------------------------------->
                        
                        <td>STN:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '32') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TA:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '33') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '34') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>UNF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '35') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ CRITICAL L8 ---------------------------------------->
                        <td>TH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '72') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TR:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '73') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TAH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '71') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                                      
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                                   

                      </tr>  

                      <tr>
                       
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L9 ---------------------------------------->
                        <td>WL:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '36') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WSI:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '37') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>                 

                        <td>WSO:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '38') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>GF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '146') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ CRITICAL L9 ---------------------------------------->

                        <td>MF:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '70') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>CH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '68') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FK:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '69') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        
                        <td></td>

                        <td></td>
                                   
                        <td></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!------------ MINOR VIS L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L10 ---------------------------------------->
                        
                        <td>BP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '40') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '41') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DSP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '42') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DTP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '43') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ CRITICAL L10 ---------------------------------------->

                        <td>MS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '147') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        

                        <td>PFK:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '149') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td></td>
                     
                        <!------------ HOLES1 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES2 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES3 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
 
                        
                      </tr> 

                      <tr>
                        <!------------ MINOR VIS L11 ---------------------------------------->
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L11 ---------------------------------------->
                        
                        <td>IA:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '44') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>IFS:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '45') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>IP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '46') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>OP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '47') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ CRITICAL L11 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES1 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES2 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES3 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                      </tr> 


                      <tr>
                        <td></td>
                        <td></td>
                        
                        <!------------ MAJOR VIS L12 ---------------------------------------->
                        
                        <td>RP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '48') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SH:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '49') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>SMP:
                        <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '50') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td></td>

                        <!------------ CRITICAL L12 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES1 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES2 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES3 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                      </tr> 

                    
                      <tr>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_NumberOfDefectByDefectType WHERE  RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">Total defect</th>

                        <?php foreach ($fetch as $test) { 
                              if ($test['DefectTypeName'] == 'Minor Visual') { ?>
                        <td colspan="2"><input class="form-control" name="total_minor" value="<?php echo $test['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_TotalMajor WHERE  RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $row) { if ($get['RecordID'] == $row['RecordID']) { ?> 
                        <td colspan="4"><input class="form-control" name="total_major" value="<?php echo $row['TotalMajor']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_TotalCritical WHERE  RecordID = '".$test['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $row) { if ($get['RecordID'] == $row['RecordID']) { ?> 
                        <td colspan="3"><input class="form-control" name="total_critical" value="<?php echo $row['TotalCritical']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_NumberOfDefectByDefectType WHERE  RecordID = '".$test['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $test) {
                              if ($test['DefectTypeName'] == 'Holes') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes1" value="<?php echo $test['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['DefectTypeName'] == 'Holes2') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes2" value="<?php echo $test['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $test) { 
                              if ($test['DefectTypeName'] == 'Holes3') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes3" value="<?php echo $test['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>
                      </tr>
                    </table>
                    
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                      ?>
                      <tr>
                        <th scope="col" class="info">Total Barrier Holes:</th>
                        <?php foreach ($fetch as $test) {
                              if ($test['TestKey'] == '163') { ?>
                        <td><input class="form-control" name="total_holes" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>
                                        
                        <th scope="col" class="info">Overall AQL:</th>
                        <?php foreach ($fetch as $test) {
                              if ($test['TestKey'] == '140') { ?>
                        <td><input class="form-control" name="overall_AQL" value="<?php echo $test['TestValue']?>" disabled></td>
                        <?php } }?>
                        
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_UDResult.UDResultKey, M_UDResult.UDResultCode
                                                    FROM T_Record_UDResult LEFT JOIN T_Record_Master ON T_Record_UDResult.RecordID = T_Record_Master.RecordID 
                                                    FULL JOIN M_UDResult ON T_Record_UDResult.UDResultKey = M_UDResult.UDResultKey
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">UD Disposition:</th>
                        <?php foreach ($fetch as $test) { ?>
                        <td><input class="form-control" name="UD_disposition" value="<?php echo $test['UDResultCode'];}?>" disabled></td> 
                      </tr>
                    </table>

                    <td><b>*Product Packaging Inspection (Surgical)</b></td>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr class="info"><br>
                        <th></th>
                        <th colspan="3">REGULATORY PACKAGING</th>
                        <th colspan="4">CRITICAL PACKAGING</th>
                        <th colspan="3">VISUAL PACKAGING</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                              
                      <tr>
                        <th scope="col" class="info">**AQL:</th>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        
                        <?php foreach ($fetch as $test) { //AQL_Regulatory
                              if ($test['TestKey'] == '155') { ?>
                        <td colspan="3"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>
                        
                        <?php foreach ($fetch as $test) { //AQL_Critical
                              if ($test['TestKey'] == '153') { ?>
                        <td colspan="4"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $test) { //AQL_Visual
                              if ($test['TestKey'] == '151') { ?>
                        <td colspan="3"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>
                                       
                        <td>
                          <select class="form-control" id="AQL_holes1" name="AQL_holes1" disabled>
                            <option class="form-control" name="AQL_holes1" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes1" value="6.5"> 6.5</option> 
                          </select>
                        </td>
                                         
                        <td>
                          <select class="form-control" id="AQL_holes2" name="AQL_holes2" disabled>
                            <option class="form-control" name="AQL_holes2" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                          </select>
                        </td>
                                         
                        <td>
                          <select class="form-control" id="AQL_holes3" name="AQL_holes3" disabled>
                            <option class="form-control" name="AQL_holes3" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <th scope="col" class="info">Acceptance:</th>

                        <?php foreach ($fetch as $test) { //Acceptance_Regulatory
                              if ($test['TestKey'] == '156') { ?>
                        <td colspan="3"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $test) { //Acceptance_Critical
                              if ($test['TestKey'] == '154') { ?>
                        <td colspan="4"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $test) { //Acceptance_Visual
                              if ($test['TestKey'] == '152') { ?>
                        <td colspan="3"><?php echo $test['TestValue'];}?></td>
                        <?php } ?>

                        

                        <td><input class="form-control" name="Acceptance_holes1" placeholder="" disabled></td>
                        <td><input class="form-control" name="Acceptance_holes2" placeholder="" disabled></td>
                        <td><input class="form-control" name="Acceptance_holes3" placeholder="" disabled></td>
                      </tr>
                      <tr>
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Defect.DefectKey, T_Record_Defect.DefectValue
                                                    FROM T_Record_Defect LEFT JOIN T_Record_Master ON T_Record_Defect.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info" rowspan="5"> Defect</th>

                        <!-------------- REGULATOR PACKAGING L1 -------------------------->
                        <td>WLN:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '113') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WMD:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '114') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WED:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '112') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!----------------------------CRITICAL PACKAGING L1------------------>
                        <td>WQ:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '133') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '122') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MB:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '119') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MLN:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '120') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L1 ------------------------------------->
                        <td>WT:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '142') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>CT:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '135') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>POP:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '140') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr> 

                      <tr>
                        
                        <!-------------- REGULATOR PACKAGING L2 -------------------------->
                        <td>WPC:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '115') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MM:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '111') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>IP:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '110') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!----------------------------CRITICAL PACKAGING L2------------------>
                        <td>WGS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '129') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WGT:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '130') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WGA:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '128') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>OS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '124') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L2 ------------------------------------->
                        <td>FG:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '137') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>PIS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '139') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MSA:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '138') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        
                        <!-------------- REGULATOR PACKAGING L3 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        

                        <!----------------------------CRITICAL PACKAGING L3------------------>
                        <td>WTS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '134') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>PTS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '126') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>WPO:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '132') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DMG:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '117') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L3 ------------------------------------->
                        
                        <td>WIS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '141') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>DT:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '136') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L4 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L4 ------------------>
                        <td>MSG:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '121') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>FC:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '118') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>POS:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '125') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>BC:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '116') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L4 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L5 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L5 ------------------>
                        <td>WPD:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '131') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>MSI:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '123') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td>TRP:
                          <b><font color="red"><?php foreach ($fetch as $test) { if ($test['DefectKey'] == '127') {
                                echo $test['DefectValue']?></td>
                        <?php } }?></font>

                        <td></td>
                        

                        <!------------ VISUAL PACKAGING L5 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
               
                      <tr>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">Result</th>
                        <?php foreach ($fetch as $test) { //Result_Regulatory
                              if ($test['TestKey'] == '161') { ?>
                        <td colspan="3"><input class="form-control" name="Result_Regulatory" value="<?php echo $test['TestValue'];?>" disabled></td>
                        <?php } } ?>

                        <?php foreach ($fetch as $test) { //Result_Critical
                              if ($test['TestKey'] == '160') { ?>
                        <td colspan="4"><input class="form-control" name="Result_Critical" value="<?php echo $test['TestValue'];?>" disabled></td>
                        <?php } } ?>
                        
                        <?php foreach ($fetch as $test) { //Result_Visual
                              if ($test['TestKey'] == '159') { ?>
                        <td colspan="3"><input class="form-control" name="Result_Visual" value="<?php echo $test['TestValue'];?>" disabled></td>
                        <?php } } ?>

                        <td><input class="form-control" name="total_holes1" placeholder="" disabled></td>
                        <td><input class="form-control" name="total_holes2" placeholder="" disabled></td>
                        <td><input class="form-control" name="total_holes3" placeholder="" disabled></td>
                      </tr>
                    </table>
                                                
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr>        
                        <th scope="col" class="info">Final Disposition:</th>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$get['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($fetch as $test) {
                              if ($test['TestKey'] == '162') { ?>
                        <td><input class="form-control" name="final_disposition" value="<?php echo $test['TestValue'];?>" disabled></td>
                        <?php } } ?>
                      </tr>
                    </table>
                    
                    <div class="form-group">
                        verify by:<label><?php echo $get['VerifierID'];?></label>
                      </div>

                      <div class="form-group">
                        <?php $date2 = date("d/m/Y h:i:s A", strtotime($get['VerifiedDate'])); ?>
                        Date:<label><?php echo $date2;?></label>
                      </div>                                         
                      <center><a class = "btn btn-primary" href = "tables_FG.php" > Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                               
                        <a class = "btn btn-warning" target="_blank" href = "reinspection_SFG(worker).php?LotIDKey=<?php echo $_GET['LotIDKey']?>" > Reinspec</a>&nbsp;&nbsp;                        
                        <a target="" href="#" role="button" class="btn btn-primary" title="Print" onClick="window.print()"><i class = "glyphicon glyphicon-print"></i>&nbsp;Print</a></center><br><br>                                      
                                       </form>
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
  </div>
    
  <br />
  <br />
  
  <div style = "text-align:center; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
    <label>Copyright © 2020 by QA PQC SQUAD</label>
  </div>
</body>

</html>