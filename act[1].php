    <?php  	session_start();
    		require_once(dirname(__FILE__). '/inc/connect.php'); //connect to the database';
      // if(isset($_POST["setnalepolgn"])){ //process the login nalepo window
      //     $set_domain = preg_replace('#[^a-z]#i', '', 'CompName');
      //       if(isset($set_domain) && isset($set_domain) == TRUE) {  
      //           header("Location: shpwp/auth/login?d=CompName");   
      //       } else { ?>
                 <script type="text/javascript">
      //             window.location = "<?php echo 'shpwp/auth/login?d=CompName;'?>"
      //           </script>
             <?php //} 
      //   } 
        if(isset($_POST["getproduct"])){
            $category_query = "SELECT * FROM tbl_createnewproduct_comp";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query);
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                    $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"];
                    $productname = $rowW5EDVuG0MTCyXi["productname"];
                    echo "
                      <b><li><a href='#' class='category' cid='$newproduct_id'>$productname</a></li></b>
                    ";
                }
            }  
          }
         if(isset($_POST["receiveproduct"])){
            $category_query = "SELECT * FROM tbl_createnewproduct_comp";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query);
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                    $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"];
                    $productname = $rowW5EDVuG0MTCyXi["productname"];
                    echo "
                      <b><li><a href='#' class='receiveitems' cid='$newproduct_id'>$productname</a></li></b>
                    ";
                }
            }  
          }
          if(isset($_POST["locationitem"])){
            $category_query = "SELECT * FROM tbl_create_productlocation";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query);
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                    $accountsavings_id = $rowW5EDVuG0MTCyXi["accountsavings_id"];
                    $itemlocation = $rowW5EDVuG0MTCyXi["itemlocation"];
                    echo "
                      <b><li><a href='#' class='locationitm' cid='$itemlocation'>$itemlocation</a></li></b>
                    ";
                }
            }  
          }
        if(isset($_POST["locationitm"])){
          $locationitm_id = $_POST["locationitm_id"];
          $category_query = "SELECT * FROM tbl_createnewproduct_comp WHERE itemlocation = '$locationitm_id'";
          $run_query = $connection->query($category_query) or die($connect->error);
          $numofrows = $connection->num_rows($run_query); 
           echo '<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Item Location</th>
                          <th>Item Name</th>
                          <th>Unit price</th>
                          <th>Quantity</th> 
                        </tr>
                      </thead>
                         <tbody>';
          if($numofrows > 0){
                while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                  $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                  $productname = $rowW5EDVuG0MTCyXi["productname"];
                  $itemquantity = $rowW5EDVuG0MTCyXi["itemquantity"];
                   $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                  $itemlocation = $rowW5EDVuG0MTCyXi["itemlocation"];
                        ?>
                              <tr>
                  <td><?php echo $rowW5EDVuG0MTCyXi["itemlocation"];?></td>
                  <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
                  <td><?php echo $rowW5EDVuG0MTCyXi["unitprice"];?></td>
                  <td><?php echo $rowW5EDVuG0MTCyXi["itemquantity"];?></td>
                                  </tr>
                          <?php  }        
                     echo '</tbody>
                            </table>';
                } else {
        echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No Records found for selected item location.</div>";
                            }
            }
//------------------------------  
        if(isset($_POST["categoryitem"])){
            $category_query = "SELECT * FROM tbl_create_newaccount";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query);  
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                    $accountsavings_id = $rowW5EDVuG0MTCyXi["accountsavings_id"];
                    $productcategory = $rowW5EDVuG0MTCyXi["productcategory"];
                    echo "
                      <b><li><a href='#' class='categoryitm' cid='$productcategory'>$productcategory</a></li></b>
                    ";
                }
            }  
          }
//-----------------------------
        if(isset($_POST["categoryitm"])){
          $categoryitm_id = $_POST["categoryitm_id"];
          $category_query = "SELECT * FROM tbl_createnewproduct_comp WHERE productcategory = '$categoryitm_id'";
          $run_query = $connection->query($category_query) or die($connect->error);
          $numofrows = $connection->num_rows($run_query); 
            echo '<table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Category</th>
                                <th>Item</th>
                                <th>Unit price</th>
                                <th>Quantity</th> 
                              </tr>
                            </thead>
                               <tbody>';
                if($numofrows > 0){
                      while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                        $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                        $productname = $rowW5EDVuG0MTCyXi["productname"];
                        $itemquantity = $rowW5EDVuG0MTCyXi["itemquantity"];
                         $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                        $itemlocation = $rowW5EDVuG0MTCyXi["itemlocation"];
                    ?>
                                    <tr>
                        <td><?php echo $rowW5EDVuG0MTCyXi["productcategory"];?></td>
                        <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
                        <td><?php echo $rowW5EDVuG0MTCyXi["unitprice"];?></td>
                        <td><?php echo $rowW5EDVuG0MTCyXi["itemquantity"];?></td>
                                        </tr>
                                <?php  }        
                           echo '</tbody>
                                  </table>';
                      } else {
        echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No Records found for selected category.</div>";
                            }
                  }
//-----------------------------
    if(isset($_POST["itemdaterange"])){ ////////manage sold items= date range selection
      $fdate = $_POST["fdate"];
      $tdate = $_POST["tdate"];
        $category_query = "SELECT * FROM tbl_solditems WHERE dateofsell BETWEEN '$fdate' AND '$tdate'";
        $run_query = $connection->query($category_query) or die($connect->error);
        $numofrows = $connection->num_rows($run_query); 
      echo '<table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Item</th>
                          <th>Qty</th>
                          <th>Price Value</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                         <tbody>';
                      if($numofrows > 0){
                            while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                              $newproduct_id = $rowW5EDVuG0MTCyXi["sellitem_id"]; 
                          ?>
                            <tr>
                              <td><?php echo $rowW5EDVuG0MTCyXi["dateofsell"];?></td>
                              <td><?php echo $rowW5EDVuG0MTCyXi["Item"];?></td>
                              <td><?php echo $rowW5EDVuG0MTCyXi["itemqty_sell"];?></td>
                              <td><?php echo $rowW5EDVuG0MTCyXi["selling_price"];?></td>
                              <td><?php echo $rowW5EDVuG0MTCyXi["totalprice"];?></td>
                            </tr>
                                      <?php  }        
                                 echo '</tbody>
                                        </table>';
                            } else {
        echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No Records found for selected dates.</div>";
                            }
            }
//--------------------------
    if(isset($_POST["itemsellsreport"])){   ////////manage sells report= date range selection
      $fdate = $_POST["fdate"];
      $tdate = $_POST["tdate"];
      $category_query = "SELECT * FROM tbl_createnewproduct_comp WHERE date_created BETWEEN '$fdate' AND '$tdate'";
        $run_query = $connection->query($category_query) or die($connect->error);
        $numofrows = $connection->num_rows($run_query); 
        echo '<table id="datatable-buttons" style="font-size: 11px;" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Cost Value</th>
                <th>Price Value</th>
                <th>Total Cost</th>
                <th>Total Sells</th>
                <th>Gross Profit</th>
                                    </tr>
                                  </thead>
                                     <tbody>';
                      if($numofrows > 0){
                            while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                              $ID = $rowW5EDVuG0MTCyXi["ID"];
                              $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                              $itmqty = $rowW5EDVuG0MTCyXi["itemquantity"];
                              $costval = $rowW5EDVuG0MTCyXi["unitpurchasecost"];
                              $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                              $totalcost = $itmqty * $costval;
                              $totalsells = $itmqty * $unitprice;
                              $grosprofit =  $totalsells - $totalcost; ?> 
                        <tr>
                          <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["itemquantity"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["unitpurchasecost"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["unitprice"];?></td>
                          <td><?php echo $totalcost;?></td>
                          <td><?php echo $totalsells;?></td>
                          <td><?php echo $grosprofit;?></td>
                                              </tr>
                                      <?php  }        
                                 echo '</tbody>
                                        </table>';
                            } else {
        echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No Records found for specified dates.</div>";
                            }
            }
//-----------------------------
    if(isset($_POST["receiveitemdaterange"])){   ////////manage received items= date range selection
      $refmdate = $_POST["refmdate"];
      $retdate = $_POST["retdate"];
      $category_query = "SELECT * FROM tbl_receiveditems WHERE receivedate BETWEEN '$refmdate' AND '$retdate'";
        $run_query = $connection->query($category_query) or die($connect->error);
        $numofrows = $connection->num_rows($run_query); 
          echo '<table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Supplier</th>
                        <th>Qty</th>
                        <th>Price Value</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                     <tbody>';
                      if($numofrows > 0){
                            while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                              $ID = $rowW5EDVuG0MTCyXi["ID"];
                              $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; ?> 
                        <tr>
                          <td><?php echo $rowW5EDVuG0MTCyXi["receivedate"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["receiveitem"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["supplier"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["receiveqty"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["unitcost"];?></td>
                          <td><?php echo $rowW5EDVuG0MTCyXi["linetotal"];?></td>
                                              </tr>
                                      <?php  }        
                                 echo '</tbody>
                                        </table>';
                            } else {
        echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>No Records found for specified dates.</div>";
                            }
            }
//-----------------------------
          if(isset($_POST["selected_Category"])){ //process sell stock items
            $cat_id = $_POST["cat_id"];
            $category_query = "SELECT * FROM tbl_createnewproduct_comp WHERE newproduct_id = '$cat_id'";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query); 
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
                  $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                    $productname = $rowW5EDVuG0MTCyXi["productname"];
                    $itemquantity = $rowW5EDVuG0MTCyXi["itemquantity"];
                     $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                    $itemlocation = $rowW5EDVuG0MTCyXi["itemlocation"];
                    $itemdecr = $rowW5EDVuG0MTCyXi["productdescrpt"];   
                  $protax = $rowW5EDVuG0MTCyXi["protax"];
                }
                    echo '<div class="well" style="background-color: #2A3F54;"> 
                     <h2>Item Stock Information</h2> 
                        <span class="section"></span>
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Selected:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="item" name="item" readonly="readonly" value="'.$productname.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>    
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Location:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="itmlocation" id="itmlocation" class="form-control" required="required" readonly="readonly">
                                        <option value="'.$itemlocation.'">'.$itemlocation.'</option>';
                  echo '</select>
                                </div>
                              </div> 
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Unit Price:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="unitprice" name="unitprice" readonly="readonly" value="'.$unitprice.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div> 

                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Store Qty:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="quantityinstore" name="quantityinstore" readonly="readonly" value="'.$itemquantity.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div> 
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Applied VAT:<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="appliedVAT" name="appliedVAT" readonly="readonly" value="'.$protax.'" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
      <input type="hidden" name="newproduct_id" id="newproduct_id" value="'.$newproduct_id.'" />                       
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Descr:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea class="form-control" id="itemcoments" name="itemcoments" required="required" readonly="readonly" rows="3" placeholder="Item Comments">'.$itemdecr.'</textarea>
                                </div>
                              </div>
                    </div>';
            }  
          }
//------------------------
          if(isset($_POST["receive_item"])){ //process receive stock items
            $cat_id = $_POST["cat_id"];
            $category_query = "SELECT * FROM tbl_createnewproduct_comp WHERE newproduct_id = '$cat_id'";
            $run_query = $connection->query($category_query) or die($connect->error);
            $numofrows = $connection->num_rows($run_query); 
            if($numofrows > 0){
                  while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()) {
                    $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                    $productname = $rowW5EDVuG0MTCyXi["productname"];
                    $itemquantity = $rowW5EDVuG0MTCyXi["itemquantity"];
                     $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                    $itemlocation = $rowW5EDVuG0MTCyXi["itemlocation"];
                    $itemdecr = $rowW5EDVuG0MTCyXi["productdescrpt"]; 
                }
                  $random = "1";
              echo '<div class="well" style="background-color: #2A3F54;">
                      <h2>Item Stock Information</h2> 
                        <span class="section"></span>
                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item to Receive:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="receiveitem" name="receiveitem" readonly="readonly" value="'.$productname.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>    
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Location:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="itlocation" id="itlocation" readonly="readonly" class="form-control" required="required" >
                                        <option value="'.$itemlocation.'">'.$itemlocation.'</option>';
                              echo '</select>
                                </div>
                              </div> 
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Unit Cost:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="unitcost" name="unitcost" value="'.$unitprice.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div> 
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Store Qty:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="quantityinstore" name="quantityinstore" readonly="readonly" value="'.$itemquantity.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div> 
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Descr:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea class="form-control" id="itemdesc" name="itemdesc" required="required" rows="3" placeholder="Item Comments">'.$itemdecr.'</textarea>
                                </div>
                              </div>
                <span class="section"></span>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Receive Qty:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="receiveqty" name="receiveqty" value="'.$random.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
    <input type="hidden" id="itemID" class="form-control" readonly="" value="'.$newproduct_id.'" name="itemID" />                         
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Line Total (Kshs)</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                        <span id="ttl" style="color:#ffffff;"></span>
                                      <span class="input-group-btn">
                                        <button id="calculinetotal" type="button" class="btn btn-primary">Calculate Receive Total</button>
                                      </span>
                                    </div>
                                  </div>
                              </div>
                    </div>';
                
            }  
          }
//--------------------------------
        if(isset($_POST["settotal"])){    //calculate total for receive stock
            $untcost = $_POST["untcost"];
            $recivqty = $_POST["recivqty"];
            $itmID = $_POST["itmID"];
            $linetotal = $untcost * $recivqty;
            echo $linetotal;
        }
        if(isset($_POST["selltotal"])){    //calculate total for sell stock
            $sellpri = $_POST["sellpri"];
            $sellqty = $_POST["sellqty"];
            $selltotal = $sellpri * $sellqty;
            echo $selltotal;
        }
//-------------------------------------
        //---------------------------------------------------------------------------
        if(isset($_POST["yesitmlocgroup"])) { //process deleting of item locations
          $specificitmloc = $_POST["specificitmloc"];
          $deletesql = "DELETE FROM tbl_create_productlocation WHERE ID = '$specificitmloc'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Item Location Deleted Successfully.&nbsp<a href='manage-productlocations' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }
        if(isset($_POST["dltlocationid"])){   //////view.dltgrp.dlt.item locations
          $dltlocid = $_POST["dltlocid"];
          echo "<div class='alert alert-primary'> 
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Item Location ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltitmlocgroup' yesitmlocgroup=".$dltlocid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-productlocations' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //---------------------------------------------------------------------------
        //---------------------------------------------------------------------------
        if(isset($_POST["yesitmtaxgroup"])) { //process deleting of item tax ratio
          $specificitmtax = $_POST["specificitmtax"];
          $deletesql = "DELETE FROM tbl_create_producttax WHERE ID = '$specificitmtax'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Item Tax Ratio Deleted Successfully.&nbsp<a href='manage-producttaxes' type='button' class='btn btn-sm btn-primary'>Continue >></button></div>";
        }
        if(isset($_POST["deletetax"])){   //////view.dltgrp.dlt.item tax
          $dlttaxid = $_POST["dlttaxid"];
          echo "<div class='alert alert-primary'> 
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Item Tax Ratio ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltitmtaxgroup' yesitmtaxgroup=".$dlttaxid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-producttaxes' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //--------------------------------------------------------------------------------
        if(isset($_POST["yesdltcompanyuserid"])) { //process deleting of company users
          $specificyesdltcompanyuserid = $_POST["specificyesdltcompanyuserid"];
          $deletesql = "DELETE FROM tbl_insti_createusers WHERE user_id = '$specificyesdltcompanyuserid'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>User Deleted Successfully.&nbsp<a href='manage-users' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }
        if(isset($_POST["companyuserid"])){   //////view.dltgrp.dlt.dlt company users
          $companyuseridid = $_POST["companyuseridid"];
          echo "<div class='alert alert-primary'> 
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to Delete this User ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltcompanyuserid' yesspecificdltcompanyuserid=".$companyuseridid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-users' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //---------------------------------------------------------------------------
         //---------------------------------------------------------------------------
        if(isset($_POST["yesspecificgroup"])) { //process deleting of module permision grps
          $dltitemnow = $_POST["specificgrp"];
          $deletesql = "DELETE FROM tbl_usergroups WHERE group_id = '$dltitemnow'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Module Group deleted successfully.&nbsp<a href='manage-groups' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }
        if(isset($_POST["deletegrpid"])){   //////view.dltgrp.dlt.module permision grps
          $dltgrp_pid = $_POST["dltgrp_pid"];
          echo "<div class='alert alert-primary'> 
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Group ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificgroup' yesspecificgroup=".$dltgrp_pid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-groups' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //---------------------------------------------------------------------------
        //---------------------------------------------------------------------------
        if(isset($_POST["yesspecificaccount"])) { //process deleting of newaccounts (dlt item category)
          $specificaccnt = $_POST["specificaccnt"];
          $deletesql = "DELETE FROM tbl_create_newaccount WHERE ID = '$specificaccnt'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Category Deleted Successfully.&nbsp<a href='manage-productcategories' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }  
        if(isset($_POST["dltaccountid"])){   //////view.dltgrp.dlt.newaccounts (dlt item category)
          $dltntid = $_POST["dltntid"];
          echo "<div class='alert alert-primary'> 
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Category ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificaccount' yesspecificaccount=".$dltntid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-productcategories' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //-----------------------------------------------------------------------------------
         if(isset($_POST["yesspecificemploy"])) { //process deleting of employees (dlt new customer)
          $yesspcemploy = $_POST["yesspcemploy"];
          $deletesql = "DELETE FROM tbl_insti_createusers WHERE user_id = '$yesspcemploy'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'></a>Customer Deleted Successfully.&nbsp<br/><a href='manage-borrowers' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }
        if(isset($_POST["dltusersid"])){   //view.dltuser.dlt.user employees
            $dltuseruser_pid = $_POST["dltuseruser_pid"];
          echo "<div class='alert alert-primary'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Customer ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificemployee' yesspecificemploy=".$dltuseruser_pid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-borrowers' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //------------------------------------------------------------------------------------
       //-----------------------------------------------------------------------------------
         if(isset($_POST["yesspecificsupplier"])) { //process deleting of suppliers (dlt new supplier)
          $yesspcemploy = $_POST["yesspcsupplier"];
          $deletesql = "DELETE FROM tbl_suppliers WHERE ID = '$yesspcemploy'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'></a>Supplier Deleted Successfully.&nbsp<br/><a href='manage-suppliers' type='button' class='btn btn-sm btn-primary'>Continue >></a></div>";
        }
        if(isset($_POST["dltsupplierid"])){   //view.dltuser.dlt.user employees
            $dltuseruser_pid = $_POST["dltsupplier_pid"];
          echo "<div class='alert alert-primary'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to delete this Supplier ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificsupplier' yesspecificsupplier=".$dltuseruser_pid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-suppliers' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------
         if(isset($_POST["yesspecificborower"])) { //process deleting of borrowers/customers (dlt sold items)
          $yesspcborower = $_POST["yesspcborower"];
          $deletesql = "DELETE FROM tbl_solditems WHERE sellitem_id = '$yesspcborower'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'></a>Item Deleted successfully.&nbsp<br/><a href='sell-products' type='button' class='btn btn-sm btn-primary'>Make Another Sell >></a></div>";
        }
        if(isset($_POST["dltborowerid"])){   //view.dltuser.dlt.borrowers/customers
            $dltborowerid_pid = $_POST["dltborowerid_pid"];
          echo "<div class='alert alert-primary'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to Delete this Item ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificborower' yesspecificborower=".$dltborowerid_pid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-sold-products' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //------------------------------------------------------------------------------------

        //------------------------------------------------------------------------------------
        //-----------------------------------------------------------------------------------
         if(isset($_POST["yesspecificreceiver"])) { //process deleting of borrowers/customers (dlt received items)
          $yesspcborower = $_POST["yesspcborower"];
          $deletesql = "DELETE FROM tbl_receiveditems WHERE receiveitem_id = '$yesspcborower'";
          $deletequery = $connection->query($deletesql) or die($connection->error);
          echo  "<div class='alert alert-success'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'></a>Item Processed & Deleted successfully.&nbsp<br/><a href='receive-products' type='button' class='btn btn-sm btn-primary'>Receive Another Item >></a></div>";
        }
        if(isset($_POST["dltreceiverid"])){   //view.dltuser.dlt.borrowers/customers
            $dltreceiverid_pid = $_POST["dltreceiverid_pid"];
          echo "<div class='alert alert-primary'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'></a><b>Are you sure you want to Delete this Item ?<br/><br/><button type='button' class='btn btn-sm btn-danger yesdltspecificreceiver' yesspecificreceiver=".$dltreceiverid_pid."><b>YES</b></button>&nbsp|&nbsp<a href='manage-received-products' class='btn btn-sm btn-danger'><b>NO</b></a></b></div>";
        }
        //------------------------------------------------------------------------------------
        //////////////////////////////////////////stt.view.promnggrp.pro.mng.suppliers
        if(isset($_POST["get_viewsupplierid"])) {   
        $setviewsupplierid = $_POST["setviewsupplierid"];
        $chrosqlusers = $connection->query("SELECT * FROM tbl_suppliers WHERE guarantor_id = '$setviewsupplierid'") or die($connection->error);
            $existcount_resultsetusers = $connection->num_rows($chrosqlusers);
                if($existcount_resultsetusers > 0) {
                  while($rowW = $connection->fetch_array($chrosqlusers)) {
                        $gid = $rowW["ID"];
                        $guarantor_id = $rowW["guarantor_id"];
                    $guarantorname = $rowW["guarantorname"]; 
                    $guarantoremail = $rowW["guarantoremail"]; 
                        $phonenumber = $rowW["phonenumber"]; 
                        $guridnumber = $rowW["guridnumber"];
                        $guarantorkra = $rowW["guarantorkra"];
                    $guarantoroccupation = $rowW["guarantoroccupation"];  
                    $guarantoraddr = $rowW["guarantoraddr"]; 
                    $guarantorlocation = $rowW["guarantorlocation"]; 
                        $guarntrrelationship = $rowW["guarntrrelationship"];
                        $guarantorremarks = $rowW["guarantorremarks"];  
                    } 
                } else {
                    }
              echo ' <form class="form-horizontal form-label-left" method="POST" novalidate>
                  <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Supplier Full Name:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="guarantorname" name="guarantorname" required="required" placeholder="FullName" value="'.$guarantorname.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Email:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="guarantoremail" name="guarantoremail" required="required" placeholder="Email" value="'.$guarantoremail.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">  
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">Phone Number:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" id="phonenumber" name="phonenumber" required="required" placeholder="Supplier phone number" value="'.$phonenumber.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">  
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">ID Number:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" id="guridnumber" name="guridnumber" required="required" placeholder="Supplier ID Number" value="'.$guridnumber.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">  
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">KRA PIN:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="guarantorkra" name="guarantorkra" required="required" placeholder="Supplier KRA PIN" value="'.$guarantorkra.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">  
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">Occupation:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="guarantoroccupation" name="guarantoroccupation" required="required" placeholder="Supplier Occupation" value="'.$guarantoroccupation.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Address:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="guarantoraddr" name="guarantoraddr" required="required" placeholder="Supplier address" value="'.$guarantoraddr.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Business Location:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="guarantorlocation" name="guarantorlocation" required="required" placeholder="Supplier location" value="'.$guarantorlocation.'" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
  <input type="hidden" id="ID" class="form-control" readonly="readonly" value="'.$setviewsupplierid.'" name="ID" />
                   <div class="item form-group">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Comments:<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" id="guarantorremarks" name="guarantorremarks" required="required" rows="3" placeholder="">'.$guarantorremarks.'</textarea>
                      </div>
                    </div><br/>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                          <button id="updateguarantorprocrt" type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save"></span>&nbspUpdate Supplier</button>
                        </div>
                      </div>
                  </form> ';

          }

        //////////////////////////////////////////stt.view.promnggrp.pro.mng.borrowers
        if(isset($_POST["get_viewborrowerid"])) {   
        $setviewborrowerid = $_POST["setviewborrowerid"];
        $chrosqlusers = $connection->query("SELECT * FROM tbl_insti_createusers WHERE user_id = '$setviewborrowerid'") or die($connection->error);
            $existcount_resultsetusers = $connection->num_rows($chrosqlusers);
                if($existcount_resultsetusers > 0) {
                  while($rowW = $connection->fetch_array($chrosqlusers)) {
                        $gid = $rowW["ID"];
                        $user_id = $rowW["user_id"];
                    $paymentstatus = $rowW["paymentstatus"]; 
                    $feestatus = $rowW["feestatus"]; 
                        $firstname = $rowW["firstname"]; 
                        $lastname = $rowW["lastname"];
                        $phone = $rowW["phone"];
                    $idnumber = $rowW["IDnumber"];  
                    $borroweraddr = $rowW["borroweraddr"]; 
                    $borrowecommt = $rowW["borrowecommt"]; 
                        $email = $rowW["email"];
                        $user_groupname = $rowW["user_groupname"];  
                        $date_created = $rowW["date_created"];   
                    $membershipnousr = $rowW["membershipnousr"];
                    } 
                } else {
                    } 
                    echo '<form class="form-horizontal form-label-left" method="POST" novalidate>
                            <div id="dailyaccess_msg"></div>
          <div class="well" style="background-color:#2A3F54;color: #ffffff;">              
                   <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">Select Module Permission Group:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="usergroup" name="usergroup" class="form-control" required="required">
                          <option value="'.$user_groupname.'">'.$user_groupname.'</option>'; 
              $select_prepare_data = $connection->query("SELECT * FROM tbl_usergroups ORDER BY date_created DESC");
                $numofrows = $connection->num_rows($select_prepare_data);
                    if($numofrows > 0) {  
                        while($row = $connection->fetch_array($select_prepare_data)) { 
                           $gcode = $row["group_id"];  ?>
                        <option class="usergroupp" uid="<?php echo $row["group_id"];?>" value="<?php echo $row["group_name"];?>"><?php echo $row["group_name"];?></option>
                        <?php } 
                    } else {
                              echo "<option>..........No User Groups Created Yet........</option>";
                        } 
            echo'</select>
                    </div>
                  </div>
              <div class="item form-group">
                  <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">Registration Fee (Kshs):<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="registrationfee" name="registrationfee" required="required" placeholder="" value="500" readonly="readonly" class="form-control col-md-7 col-xs-12">
                  </div>
              </div>
              <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">Payment Status:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="paymentstatus" name="paymentstatus" class="form-control" required="required">
                          <option value="'.$paymentstatus.'">'.$paymentstatus.'</option>
                          <option value="Paid">Paid</option>
                          <option value="Not-Paid">Not Paid</option>
                          <option value="Pay-after-15days">Pay after 15 Days</option>
                          <option value="Pay-after-30days">Pay after 30 Days</option>
                        </select>
                    </div>
              </div>
              <div class="item form-group">
                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="number">Fee Status:<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="feestatus" name="feestatus" class="form-control" required="required">
                          <option value="'.$feestatus.'">'.$feestatus.'</option>
                          <option value="Refundable">Refundable</option>
                          <option value="Non-Refundable">Non-Refundable</option>
                        </select>
                    </div>
                </div>
              </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="firstname" name="firstname" required="required" placeholder="Firstname" value="'.$firstname.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="lastname" name="lastname" required="required" placeholder="Lastname" value="'.$lastname.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="email" name="email" required="required" placeholder="Email" value="'.$email.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Primary Phone Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="phonenumber" name="phonenumber" required="required" placeholder="Phonenumber" value="'.$phone.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">ID Number:<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="IDnumber" name="IDnumber" required="required" placeholder="borrower ID number" value="'.$idnumber.'" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address:<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="borroweraddr" name="borroweraddr" required="required" placeholder="Borower address" value="'.$borroweraddr.'" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Comment:<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" id="borrowecommt" name="borrowecommt" required="required" rows="3" placeholder="Borrower Comments">'.$borrowecommt.'</textarea>
                      </div>
                    </div> 
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Create New Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="password" id="password" name="password" required="required" placeholder="Password" value="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
      <input type="hidden" id="user_id" name="user_id" required="required" value="'.$user_id.'" readonly="" class="form-control col-md-7 col-xs-12">
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="updateborrowerprocrt" type="button" class="btn btn-block btn-success">Update Customer</button>
                            </div>
                          </div>
                        </form> ';    ////end.view.promnggrp.pro.mng.users
                  }




      /////////////////////////////////////////////////////stt.view.promnggrp.pro.mng.users
    	if(isset($_POST["get_Emngusersid"])) {   
    		$Emnguser_id = $_POST["Emnguser_id"];
    		$chrosqlusers = $connection->query("SELECT * FROM tbl_insti_createusers WHERE user_id = '$Emnguser_id'") or die($connection->error);
            $existcount_resultsetusers = $connection->num_rows($chrosqlusers);
                if($existcount_resultsetusers > 0) {
                	while($rowW = $connection->fetch_array($chrosqlusers)) {
                        $gid = $rowW["ID"];
                        $user_id = $rowW["user_id"];  
                        $usercategory = $rowW["usercategory"];
                        $firstname = $rowW["firstname"]; 
                        $lastname = $rowW["lastname"];
                        $phone = $rowW["phone"];
                        $email = $rowW["email"];
                        $idno = $rowW["IDnumber"];
                        $location = $rowW["borroweraddr"];
                        $user_groupname = $rowW["user_groupname"]; 
                        $date_created = $rowW["date_created"];
                    } 
                } else {
                    }	
                    echo '<form class="form-horizontal form-label-left" novalidate>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select Module Permission Group:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="usergroup" name="usergroup" class="form-control" required="required">
                                  <option value="'.$user_groupname.'">'.$user_groupname.'</option>'; 
                      $select_prepare_data = $connection->query("SELECT * FROM tbl_usergroups ORDER BY date_created DESC");
                        $numofrows = $connection->num_rows($select_prepare_data);
                            if($numofrows > 0) {  
                                while($row = $connection->fetch_array($select_prepare_data)) { 
                                   $gcode = $row["group_id"];  ?>
                                <option value="<?php echo $row["group_name"];?>"><?php echo $row["group_name"];?></option>
                                <?php } 
                            } else {
                                      echo "<option>....No Permission Groups Created Yet....</option>";
                                } 
                    echo'</select>
                            </div>
                          </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select Category:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="usercategory" name="usercategory" class="form-control" required="required">
                                      <option value="'.$usercategory.'">'.$usercategory.'</option>
                                      <option value="super-Administrator">Super Administrator</option>
                                      <option value="Agent-Administrator">Agent Administrator</option>
                                      <option value="Employee">Employee</option>';
                        echo'</select>
                                </div>
                              </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="firstname" name="firstname" required="required" placeholder="Firstname" value="'.$firstname.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="lastname" name="lastname" required="required" placeholder="Lastname" value="'.$lastname.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="email" name="email" required="required" placeholder="Email" value="'.$email.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="phonenumber" name="phonenumber" required="required" placeholder="Phonenumber" value="'.$phone.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">ID Number<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="IDnumber" name="IDnumber" required="required" placeholder="ID Number" value="'.$idno.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Location/Address<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="borroweraddr" name="borroweraddr" required="required" placeholder="Employee location and Address" value="'.$location.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
              <div class="well" style="background-color:#2A3F54;color: #ffffff;">          
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Create New Password<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password" name="password" required="required" placeholder="Password" value="" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
              </div>
              <input type="hidden" id="user_id" name="user_id" required="required" placeholder="Employee location and Address" value="'.$Emnguser_id.'" class="form-control col-md-7 col-xs-12">
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="updatecreatedemployee" type="button" class="btn btn-success btn-block">Update Employee</button>
                            </div>
                          </div>
                        </form>';    ////end.view.promnggrp.pro.mng.users
                  }

      if(isset($_POST["get_mngusercontacts"])) {   //stt.view.prousercontacts.pro.user.contacts.viewprofile
        $mngusercontacts_userid = $_POST["mngusercontacts_userid"];
        $insti_id = $_SESSION["insti_id"]; 
        $membership_no = $_SESSION["membership_no"]; 
        $chrosqlusers = $connection->query("SELECT * FROM tbl_insti_createusers WHERE user_id = '$mngusercontacts_userid' AND insti_id = '$insti_id'") or die($connection->error);
            $existcount_resultsetusers = $connection->num_rows($chrosqlusers);
                if($existcount_resultsetusers > 0) {
                  while($rowW = $connection->fetch_array($chrosqlusers)) {
                        $gid = $rowW["ID"];
                        $user_id = $rowW["user_id"];
                        $membership_no = $rowW["membership_no"]; 
                        $firstname = $rowW["firstname"]; 
                        $lastname = $rowW["lastname"];
                        $phone = $rowW["phone"];
                        $email = $rowW["email"];
                        $user_groupname = $rowW["user_groupname"]; 
                        $date_created = $rowW["date_created"];
                    } 
                } else {
                      } 
                echo '<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>'.$firstname.'&nbsp'.$lastname.'&nbspProfile Report <small>Activity report</small></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                  <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                                    <div class="profile_img">
                                      <div id="crop-avatar">
                                        <!-- Current avatar --> 
                                        <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                                      </div>
                                    </div>
                                    <h3><?php echo $Institution_name;?></h3>
                                    <ul class="list-unstyled user_data">
                                      <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                      </li>

                                      <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                      </li>

                                      <li class="m-top-xs">
                                        <i class="fa fa-external-link user-profile-icon"></i>
                                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                      </li>
                                    </ul>
                                <!--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>-->
                                    <br />
                                  </div>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="profile_title">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h2>Contact Info</h2>
                                        <form class="form-horizontal form-label-left" novalidate>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email:<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="text" id="email" name="email" required="required" placeholder="email" value="'.$email.'" readonly="" class="form-control col-md-7 col-xs-12">
                                            </div>
                                          </div>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Website:<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="text" id="website" name="website" required="required" placeholder="webite" value="" readonly="" class="form-control col-md-7 col-xs-12">
                                            </div>
                                          </div>
                                        </form>
                                  </div>
                                </div>
                            <!--put content here -->
                                <br/><br/> 
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">About Me</a>
                                    </li>
                                        <!--<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">About Me</a>
                                        </li>-->
                                  </ul>
                                  <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                      <!-- start aboutme activity -->
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                      <!-- end about me activity -->
                                    </div>
                                        <!--<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        </div>-->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';    //end.view.prousercontacts.pro.user.contacts.viewprofile
                }


      if(isset($_POST["updtcat"])){   ////stt.view.promnggrp.pro.mng.procate
            $categorynameC = $_POST["categorynameC"];  
            $cat_availablE = $_POST["cat_availablE"];
            $tags_12 = $_POST["tags_12"];
            $cate_iD = $_POST["cate_iD"];
          $insti_id = $_SESSION["insti_id"]; 
          $membership_no = $_SESSION["membership_no"]; 
        $chrosqlgrp = $connection->query("UPDATE tbl_productcategory_comp SET pro_category_name ='$categorynameC', availability='$cat_availablE',keyword='$tags_12' WHERE prod_category_id = '$cate_iD' AND insti_id='$insti_id'") or die($connection->error);
        echo "<div class='alert alert-success'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product Category has been updated successfully.</b></div>";
      }
          

    //update product variety
    //update product variety
      if(isset($_POST["get_viewprodtvarit_id"])){   ////stt.view.promnggrp.pro.mng.proprodtcs
            $vwprodtvarit_id = $_POST["vwprodtvarit_id"];
            $insti_id = $_SESSION["insti_id"]; 
            $membership_no = $_SESSION["membership_no"]; 
        $chrosqlgrp = $connection->query("SELECT * FROM tbl_createproductvariety_comp WHERE newproduct_id = '$vwprodtvarit_id'") or die($connection->error);
            $existcount_resultsetgrp = $connection->num_rows($chrosqlgrp);
                if($existcount_resultsetgrp > 0) {
                  while($rowW = $connection->fetch_array($chrosqlgrp)) {
                        $ID = $rowW["ID"];
                      $newproduct_id = $rowW["newproduct_id"];
                        $varproductname = $rowW["varproductname"];
                        $productname = $rowW["productname"]; 
                        $productdescrpt = $rowW["productdescrpt"];
                        $productprice = $rowW["productprice"];      
                         $proquality = $rowW["proquality"];
                        $proavailability = $rowW["proavailability"];
                        $productstorage = $rowW["productstorage"];
                        $date_created = $rowW["date_created"]; 
                        $tags_1=$rowW["tags_1"];
                      $prodavatar = $rowW["prodavatar"]; 
                      } 
                    } else {
                        }
          echo '<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="manage-product-varieties" method="POST" novalidate>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select Product Name:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="varproductname" name="varproductname" class="form-control" required="required">
                                  <option value="'.$varproductname.'">'.$varproductname.'</option>';
                                      $select_prepare_data = $connection->query("SELECT * FROM tbl_createnewproduct_comp WHERE insti_id = '$insti_id' AND membershipno = '$membership_no' ORDER BY date_created DESC");
                                      $numofrows = $connection->num_rows($select_prepare_data);
                                      if($numofrows > 0) {  
                                          while($row = $connection->fetch_array($select_prepare_data)) { 
                                             $newproduct_id = $row["newproduct_id"];  ?>
                                          <option class="newproductvarit" productid="<?php echo $row["newproduct_id"];?>" value="<?php echo $row["productname"];?>"><?php echo $row["productname"];?></option>
                                          <?php } 
                                      } else {
                                              echo "<option>..........No Products Created Yet........</option>";
                                          }
                              echo '</select>
                                 <p style="color: red;"><i><b>Note:</b> select above the product the New product-variety belongs to.(important)</i></p>
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Variety Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="varietyname" name="varietyname" required="required" placeholder="Variety Name" value="'.$productname.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Variety Description:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" id="varietydescrpt" name="varietydescrpt" required="required" rows="3" placeholder="Product variety Description"></textarea>
                            </div>
                          </div> 
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Variety Quality:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="varietyquality" id="varietyquality" class="form-control" required="required">
                                    <option value="'.$proquality.'">'.$proquality.'</option>
                                    <option value="Best">Best</option>
                                    <option value="Good">Good</option>
                                    <option value="Average">Average</option>
                                    <option value="poor">Poor</option>
                                    <option value="None">None</option>
                                </select>
                            </div>
                          </div><br/>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Variety price<span class="required">* Kshs</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="varietyprice" name="varietyprice" required="required" placeholder="Variety Price" value="'.$productprice.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Variety Availability:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="varietyavailability" id="varietyavailability" class="form-control" required="required">
                                        <option value="">'.$proavailability.'</option>
                                        <option value="Available">Available</option>
                                        <option value="Not-available">Not Available</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                          </div><br/>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Variety Storage<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="varietystorage" name="varietystorage" required="required" placeholder="How to store the product variety" value="'.$productstorage.'" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keywords:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="tags_1" name="tags_1" type="text" value="'.$tags_1.'" required="required" placeholder="Write product keywords,separate with comma" value="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                           <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Update Variety Image</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">  
             <img src="product/'.$prodavatar.'" class="img-circle profile_img" style="width:50px;height:50px;" alt="profilepic">';
              if($prodavatar == NULL) {
                  echo '<span id="useravatar"><img src="product/userdefault.png" style="width:50px;height:50px;" class="img-circle profile_img" alt=""></span>';
                         }                  
                    echo '<input class="form-control" type="file" value="'.$prodavatar.'" name="varietyavatar" id="varietyavatar" required>
                              </div>
                          </div>
    <input type="hidden" id="varietynewproduct_id" name="varietynewproduct_id" required="required" placeholder="institution membership no" value="'.$newproduct_id.'" readonly="" class="form-control col-md-7 col-xs-12">
    <input type="hidden" id="membershipno" name="membershipno" required="required" placeholder="institution membership no" value="'.$membership_no.'" readonly="" class="form-control col-md-7 col-xs-12">
    <input type="hidden" id="insti_id" name="insti_id" required="required" value="'.$insti_id.'" readonly="" class="form-control col-md-7 col-xs-12">
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <input type="submit" class="btn btn-success btn-sm btn-block" value="Update Product Variety">
                            </div>
                          </div>
                        </form>  ';       ////end.view.promnggrp.pro.mng.update product variety
                    }


    //updateproducts
    //updateproducts
      if(isset($_POST["get_productpid"])){   ////stt.view.promnggrp.pro.mng.proprodtcs
            $mngpdctid = $_POST["mngpdctid"];
        $chrosqlgrp = $connection->query("SELECT * FROM tbl_createnewproduct_comp WHERE newproduct_id = '$mngpdctid'") or die($connection->error);
            $existcount_resultsetgrp = $connection->num_rows($chrosqlgrp);
                if($existcount_resultsetgrp > 0) {
                  while($rowW = $connection->fetch_array($chrosqlgrp)) {
                        $ID = $rowW["ID"];
                        $newproduct_id = $rowW["newproduct_id"];
                        $productcategory = $rowW["productcategory"];
                    $productsubcategory = $rowW["productsubcategory"];
                        $productname = $rowW["productname"]; 
                    $itemquantity = $rowW["itemquantity"];
                        $productdescrpt = $rowW["productdescrpt"];
                        $unitpurchasecost = $rowW["unitpurchasecost"];      
                         $unitprice = $rowW["unitprice"];
                        $productserialcode = $rowW["productserialcode"];
                        $protax = $rowW["protax"];
                        $itemlocation = $rowW["itemlocation"]; 
                        $tags_1=$rowW["tags_1"];
                      } 
                    } else {
                        }
          echo '<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="manage-products" method="POST" novalidate>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Category<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="productcategory" name="productcategory" class="form-control" required="required">
                            <option value="'.$productcategory.'">'.$productcategory.'</option>';
                                 $select_prepare_data = $connection->query("SELECT * FROM  tbl_create_newaccount ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["productcategory"];?>"><?php echo $row["productcategory"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>....No Item Category Created Yet......</option>";
                                  } 
                          echo '</select>
                          <p style="color: red;"><i><b>Note:</b> select above the Product category the New product belongs to.(important)</i></p>
                      </div>
                    </div>
              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item sub-Category<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="productsubcategory" name="productsubcategory" class="form-control" required="required">
                    <option value="'.$productsubcategory.'">'.$productsubcategory.'</option>';
                        $select_prepare_data = $connection->query("SELECT * FROM tbl_create_newaccount ORDER BY date_created DESC");
                        $numofrows = $connection->num_rows($select_prepare_data);
                        if($numofrows > 0) {  
                            while($row = $connection->fetch_array($select_prepare_data)) { 
                               $accountsavings_id = $row["accountsavings_id"];  ?>
                            <option value="<?php echo $row["productcategory"];?>"><?php echo $row["productcategory"];?></option>
                            <?php } 
                        } else {
                                echo "<option>...No Item Sub-Category Created Yet..</option>";
                            } 
                   echo '</select>
                  <p style="color: red;"><i><b>Note:</b> select above the item category the New product belongs to.(important)</i></p>
              </div>
            </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="productname" name="productname" required="required" placeholder="Product Name" value="'.$productname.'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Quantity:<span class="required">*</span>
                        </label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="itemquantity" name="itemquantity" required="required" placeholder="Product Quantity" value="'.$itemquantity.'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit purchase cost:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="unitpurchasecost" name="unitpurchasecost" required="required" placeholder="Unit purchase cost" value="'.$unitpurchasecost.'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit price:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="unitprice" name="unitprice" required="required" placeholder="Product Quantity" value="'.$unitprice.'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Serial Code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="productserialcode" name="productserialcode" required="required" placeholder="Product Serialcode" value="'.$productserialcode.'" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Description:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" id="productdescrpt" name="productdescrpt" required="required" rows="3" placeholder="Product Description">'.$productdescrpt.'</textarea>
                        </div>
                      </div> 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Tax Ratio %<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="protax" id="protax" class="form-control" required="required">
                                 <option value="'.$protax.'">'.$protax.'</option>';
                              $select_prepare_data = $connection->query("SELECT * FROM tbl_create_producttax ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["taxpercentage"];?>"><?php echo $row["taxpercentage"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>...No Item Tax created yet....</option>";
                                  }
                            echo '</select> 
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Location<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="itemlocat" id="itemlocat" class="form-control" required="required">
                                <option value="'.$itemlocation.'">'.$itemlocation.'</option>';
                              $select_prepare_data = $connection->query("SELECT * FROM tbl_create_productlocation ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["itemlocation"];?>"><?php echo $row["itemlocation"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>...No Item Locations yet....</option>";
                                  }
                            echo '</select>
                        </div>
                      </div><br/>
                      <div class="ln_solid"></div>
 <input type="hidden" id="itemid" class="form-control" readonly="readonly" value="'.$newproduct_id.'" name="itemid" /> 
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="updateprocrtcompprodt" type="button" class="btn btn-success btn-md btn-block"><i class="fa fa-edit"></i>&nbspUpdate New Item</button>

                        </div>
                      </div>
                    </form> ';       ////end.view.promnggrp.pro.mng.updateproducts
                    }

    //updatecategories
    //updatecategories
      if(isset($_POST["get_mnggrpidcategories"])){   ////stt.view.promnggrp.pro.mng.procate
            $mnggr_pidcategory = $_POST["mnggr_pidcategory"];
            $insti_id = $_SESSION["insti_id"]; 
            $membership_no = $_SESSION["membership_no"]; 
        $chrosqlgrp = $connection->query("SELECT * FROM tbl_productcategory_comp WHERE prod_category_id = '$mnggr_pidcategory'") or die($connection->error);
            $existcount_resultsetgrp = $connection->num_rows($chrosqlgrp);
                if($existcount_resultsetgrp > 0) {
                  while($rowW = $connection->fetch_array($chrosqlgrp)) {
                        $gcateid = $rowW["ID"];
                        $catecode = $rowW["prod_category_id"];
                        $catename = $rowW["pro_category_name"];
                        $cateavailability = $rowW["availability"];
                        $gdatecreated = $rowW["date_created"];  
                        $keyword = $rowW["keyword"];
                      } 
                    } else {
                        }
                echo '<form id="form-data" class="form-horizontal form-label-left" method="POST" novalidate>
                          
                            <span class="section">Product Category</span>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Category Name:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="categoryname" name="categoryname" value="'.$catename.'" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
    <input type="hidden" id="cate_id" class="form-control" readonly="" value="'.$catecode.'" name="cate_id" />                        
      <input type="hidden" id="insti_id" class="form-control" readonly="" value="'.$insti_id.'" name="insti_id" />
      <input type="hidden" id="membership_no" class="form-control" readonly="" value="'.$membership_no.'" name="membership_no" />  
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Category Status:<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="cat_available" id="cat_available" class="form-control" required="required">
                                        <option value="'.$cateavailability.'">'.$cateavailability.'</option>
                                        <option value="Active">Active</option>
                                        <option value="Not-active">Not Active</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                              </div><br/>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Keyword Tags</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="tags_1" name="tags_1" type="text" class="tags form-control" value="'.$keyword.'" />
                              <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                            </div>
                          </div><br/>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                      <button id="updtcategory" type="button" class="btn btn-success btn-block">Update Category</button>
                                </div>
                              </div>
                        </form>';       ////end.view.promnggrp.pro.mng.grpscategories
        }

    	if(isset($_POST["get_mnggrpid"])){   ////stt.view.promnggrp.pro.mng.grps
    		    $mnggr_pid = $_POST["mnggr_pid"];
    		    $insti_id = $_SESSION["insti_id"]; 
            $membership_no = $_SESSION["membership_no"]; 
    		$chrosqlgrp = $connection->query("SELECT * FROM tbl_usergroups WHERE group_id = '$mnggr_pid'") or die($connection->error);
            $existcount_resultsetgrp = $connection->num_rows($chrosqlgrp);
                if($existcount_resultsetgrp > 0) {
                	while($rowW = $connection->fetch_array($chrosqlgrp)) {
                        $gid = $rowW["ID"];
                        $gcode = $rowW["group_id"];
                        $gname = $rowW["group_name"]; 
                        $gdatecreated = $rowW["date_created"]; 
                        $bookstore = $rowW["bookstore"];
                        $group_user = $rowW["group_user"];
                        $grp_group = $rowW["grp_group"];
                        $group_category = $rowW["group_category"]; 
                        $group_company = $rowW["group_company"];
                        $group_profile = $rowW["group_profile"];
                        $group_report = $rowW["group_report"];
                      } 
                    } else {
                        }
                echo '<form id="demo-form" method="POST" novalidate>
                      <label for="fullname">Group Name :</label>
                        <input type="text" id="groupname" class="form-control" name="groupname" value="'.$gname.'" required="" />
                        <input type="hidden" id="insti_id" class="form-control" name="insti_id" value="'.$insti_id.'" required="" />
                        <input type="hidden" id="membership_no" class="form-control" name="membership_no" value="'.$membership_no.'" required="" /><br/>
                        <div class="table-responsive"><!--table-->
                          <h4><b>Group Permissions</b></h4>
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th>
                                  <!-- <input type="checkbox" id="check-all" class="flat"> -->
                                  <div class="column-title">Modules</div> 
                                </th>
                                <th class="column-title">View</th> 
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>
                              <tbody>
                                <tr class="even pointer">
                                    <td>Books Store</td>';
                                    if($bookstore == "bookstore") {
    	                                echo '<td><input type="checkbox" id="bookstore" name="bookstore" checked="" value="bookstore" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="bookstore" name="bookstore" value="bookstore" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr class="even pointer">
                                    <td>Users</td>';
                                    if($group_user == "user") {
    	                                echo '<td><input type="checkbox" id="user" name="user" checked="" value="user" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="user" name="user" value="user" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr>
                                    <td>Groups</td>';
                                    if($grp_group == "group") {
    	                                echo '<td><input type="checkbox" id="group" name="group" checked="" value="group" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="group" name="group" value="group" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr>
                                    <td>Category</td>';
                                    if($group_category == "category") {
    	                                echo '<td><input type="checkbox" id="category" name="category" checked="" value="category" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="category" name="category" value="category" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr>
                                    <td>Company</td>';
                                    if($group_company == "company") {
    	                                echo '<td><input type="checkbox" id="company" name="company" checked="" value="company" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="company" name="company" value="company" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr>
                                    <td>Profile</td>';
                                    if($group_profile == "profile") {
    	                                echo '<td><input type="checkbox" id="profile" name="profile" checked="" value="profile" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="profile" name="profile" value="profile" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                                <tr>
                                    <td>Reports</td>';
                                    if($group_report == "report") {
    	                                echo '<td><input type="checkbox" id="report" name="report" checked="" value="report" class="flat"></td>';
                                    } else {
                                    	echo '<td><input type="checkbox" id="report" name="report" value="report" class="flat"></td>';
                                    }
                                echo '
                                </tr>
                              </tbody>
                            </table>
                          </div><!--End table-->
                        <br/>
                       <button type="button" name="DAezmar" id="DAezmar" class="btn btn-md btn-success">Update User Group</button>
                    </form>';       ////end.view.promnggrp.pro.mng.grps
    		}

    		// if(isset($_POST["category"])){
    		// 		$category_query = "SELECT * FROM tbl_usergroups";
    		// 		$run_query = $connection->query($category_query) or die($connect->error);
    		// 		$numofrows = $run_query->num_rows;
    		// 		echo '<table id="datatable-responsive" style="font-size: 12px;" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    		//                       <thead>
    		//                         <tr>
    		//                           <th>#</th>
    		//                           <th>Group Code</th>
    		//                           <th>Group Name</th>
    		//                           <th>Date Created</th>
    		//                           <th>Group Email</th>
    		//                           <th>Group Email</th>
    		//                         </tr>
    		//                       </thead>
    		//                       <tbody>';
    		// 			    while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
    		// 			    	$gid = $rowW5EDVuG0MTCyXi["ID"];
    		// 			    	$gcode = $rowW5EDVuG0MTCyXi["group_id"];
    		// 			      	$gname = $rowW5EDVuG0MTCyXi["group_name"];
    		// 			    	$gdatecreated = $rowW5EDVuG0MTCyXi["date_created"];
    		// 			    	$gemail = "sam@gmail.com";
    		// 			    	$gemail = "sam@gmail.com";
    		// 			    	echo "<tr>
    		//                           <td>$gid</td>
    		//                           <td>$gcode</td>
    		//                           <td>$gname</td>
    		//                           <td>$gdatecreated</td>
    		//                           <td>$gemail</td>
    		//                           <td>$gemail</td>
    		//                         </tr>";
    		// 				}
    		// 		echo '</tbody>
      //                      </table>';
    		// 	}
    	// if(isset($_POST["brand"])) {
    	// 	$brand_query = "SELECT * FROM brands";
    	// 	$run_query = $connect->query($brand_query) or die($connect->error);
    	// 	$numofrows = $run_query->num_rows;
    	// 	echo "<div class='nav nav-pills nav-stacked'>
    	// 			<li><a href='#' class='btn btn-sm btn-success'><h4>Brands</h4></a></li>";
    	// 	if($numofrows > 0){
    	// 		    while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){
    	// 		    	$bid = $rowW5EDVuG0MTCyXi["brand_id"];
    	// 		    	$brand_name = $rowW5EDVuG0MTCyXi["brand_title"];
    	// 		    	echo "
    	// 		    		<li><a href='#' class='selectbrand' bid='$bid'>$brand_name</a></li>
    	// 		    	";

    	// 			}
    	// 	}

    	// }

    	// if(isset($_POST["getproduct"])){
    	// 	$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0,9";
    	// 	$runproduct_query = $connect->query($product_query) or die($connect->error);
    	// 	$productofrows = $runproduct_query->num_rows;  
    	// 		if($productofrows > 0){
    	// 			while($rowfetchproducts = $runproduct_query->fetch_array()){
    	// 				$pro_id = $rowfetchproducts['product_id'];
    	// 				$pro_cat = $rowfetchproducts['product_cat'];
    	// 				$pro_brand = $rowfetchproducts['product_brand'];
    	// 				$pro_title = $rowfetchproducts['product_title'];
    	// 				$pro_price = $rowfetchproducts['product_price'];
    	// 				$pro_image = $rowfetchproducts['product_image'];
    	// 				echo "
    	// 					<div class='col-md-4'>
    	// 							<div class='panel panel-info'>
    	// 								<div class='panel-heading'>$pro_title</div>
    	// 								<div class='panel-body'>
    	// 									<img src='images/$pro_image' class='img-responsive' style='width:200px;height:170px;'/>
    	// 								</div>
    	// 								<div class='panel-heading'>Kshs&nbsp$pro_price.00
    	// 									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-success btn-xs'>AddToCart</button>
    	// 								</div>
    	// 							</div>
    	// 						</div>
    	// 				";
    	// 			}
    	// 		}
    	// }





    	// if(isset($_POST["get_selected_Category"]) || isset($_POST["selectbrand"]) || isset($_POST["search"])){
    	// 	if(isset($_POST["get_selected_Category"])){ // select category at this point
    	// 		$id = $_POST["cat_id"];
    	// 		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
    	// 	}else if(isset($_POST["selectbrand"])){ // select brand at this point
    	// 		$id = $_POST["brand_id"];
    	// 		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
    	// 	}else{ //perform a search at this point
    	// 		$searchkeyword = $_POST["keywordd"];
    	// 		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$searchkeyword%'";
    	// 	}
    	// 	$runcat_query = $connect->query($sql) or die($connect->error);
    	// 	    while($rowfetchproducts = $runcat_query->fetch_array()){
    	// 				$pro_id = $rowfetchproducts['product_id'];
    	// 				$pro_cat = $rowfetchproducts['product_cat'];
    	// 				$pro_brand = $rowfetchproducts['product_brand'];
    	// 				$pro_title = $rowfetchproducts['product_title'];
    	// 				$pro_price = $rowfetchproducts['product_price'];
    	// 				$pro_image = $rowfetchproducts['product_image'];
    	// 				echo "
    	// 					<div class='col-md-4'>
    	// 							<div class='panel panel-info'>
    	// 								<div class='panel-heading'>$pro_title</div>
    	// 								<div class='panel-body'>
    	// 									<img src='images/$pro_image' class='img-responsive' style='width:200px;height:170px;'/>
    	// 								</div>
    	// 								<div class='panel-heading'>Kshs&nbsp$pro_price.00
    	// 									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-success btn-xs'>AddToCart</button>
    	// 								</div>
    	// 							</div>
    	// 						</div>
    	// 				";
    	// 			}
    	// 	}


    	// 			//process items and add them to cart 
    	// 	if(isset($_POST["addToProduct"])){
    	// 		$p_id = $_POST["proid"];
    	// 		$user_id = $_SESSION["uid"];
    	// 		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id' ";
    	// 		$runquery = $connect->query($sql);
    	// 		$countrows = $runquery->num_rows;
    	// 		if($countrows > 0){
    	// 			echo "<div class='alert alert-danger'>
    	// 			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is already into the cart.</b>
    	// 			</div>";
    	// 		}else{
    	// 			$sql = "SELECT * FROM products WHERE product_id = '$p_id'";
    	// 			$runquery = $connect->query($sql);
    	// 			$rowfetch = $runquery->fetch_array();
    	// 			$id 		= $rowfetch["product_id"];
    	// 			$pro_name 	= $rowfetch["product_title"];
    	// 			$pro_image 	= $rowfetch["product_image"];
    	// 			$pro_price 	= $rowfetch["product_price"];
    	// 			$insertinto ="INSERT INTO cart (id,p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount) VALUES (NULL,'$p_id','0','$user_id','$pro_name','$pro_image','1','$pro_price','$pro_price')";
    	// 			$run_query = $connect->query($insertinto) or die($connect->error);
    	// 			if($run_query){
    	// 				echo "
    	// 					<div class='alert alert-success'>
    	// 					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product added successfully.";
    	// 			}
    	// 		}
    	// 	}



    	// 	if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
    	// 		$uid = $_SESSION["uid"];
    	// 		$sql = "SELECT * FROM cart WHERE user_id =  '$uid'";
    	// 		$run_query = $connect->query($sql) or die($connect->error);
    	// 		$countrows = $run_query->num_rows;
    	// 				if($countrows > 0){
    	// 					$no = 1;
    	// 					while($fetchrow = $run_query->fetch_array()){
    	// 						$id 		=  $fetchrow["id"];
    	// 						$pro_id 	=  $fetchrow["p_id"];
    	// 						$pro_name	=  $fetchrow["product_title"];
    	// 						$pro_image 	=  $fetchrow["product_image"];
    	// 						$pro_price 	=  $fetchrow["price"];
    	// 						//fetch this to be displayed at the main cart page
    	// 						$qty =	$fetchrow["qty"];
    	// 						$total = $fetchrow["total_amount"];
    	// 						if(isset($_POST["get_cart_product"])){
    	// 							echo "
    	// 							<div class='row' >
    	// 								<div class='col-md-3' >$no</div>
    	// 								<div class='col-md-3' ><img src='images/$pro_image' style='width:60px; height:60px;' /></div>
    	// 								<div class='col-md-3' >$pro_name</div>
    	// 								<div class='col-md-3' >Ks.$pro_price.00</div>
    	// 							</div>
    	// 							";
    	// 							$no = $no + 1;
    	// 						}else{
    	// 							echo "
    	// 								<div class='row'>
     //                         				 <div class='col-md-2'>
     //                            				<div class='btn-group'>
     //                                			<div class='btn-group'>
    	// 	                                    <a href='#'' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>
    	// 	                                    <a href='#'' class='btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span></a>
    	// 	                                </div>
    	// 	                            </div>
    	// 	                          </div>
    	// 	                          <div class='col-md-2'><img src='images/$pro_image' style='height:70px;width:80px;'/></div>
    	// 	                          <div class='col-md-2'>$pro_name</div>
    	// 	                          <div class='col-md-2'><input type='text' class='form-control' value='$qty'></div>
    	// 	                          <div class='col-md-2'><input type='text' class='form-control' value='$pro_price' disabled></div>
    	// 	                          <div class='col-md-2'><input type='text' class='form-control' value='$total' disabled></div>
    	// 	                      </div>";
    	// 						}
    							
    	// 					}
    	// 				}
    	// 	}


    ?>