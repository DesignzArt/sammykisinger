<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar_institution.php');?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bookstore Billing Center.</h3>
              </div>
            </div>
            <div class="clearfix"></div>
          <div>
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <h4>INSTITUTION NAME:&nbsp<?php echo $Institution_name;?></h4>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              <?php  //cofirm if the member is trully registered
              $chrosql = $connection->query("SELECT daily_libaccess_id,full_names,membership_cate,email,phonenumber,membership_no,till_no,libentry_date,libexit_date,libaccess_fee,mpesa_code,ip_address,libraryaccessdate,IDpupil FROM tbl_dailylibaccess_eenduu WHERE membership_no = '$membership_no'") or die($connection->error);
                  $existcount_resultset = $connection->num_rows($chrosql);
                    if($existcount_resultset > 0) { //their is an active user record
                      while($row = $connection->fetch_array($chrosql)) {
                          $membership_no        = $row["membership_no"];
                          $libentry_date        = $row["libentry_date"];
                          $libexit_date        = $row["libexit_date"];
                          $daily_libaccess_id        = $row["daily_libaccess_id"]; 
                        }
                              // $current-date = strtotime("2016-06-30"); 
                              // $old-date = strtotime("2016-06-25");                           
                              // $difference = $current-date - $old_date
                              // echo 'Hours -'. floor($difference/(60*60));
                              // echo 'days -'. floor($difference/(60*60*24)); 
                      $libexit_dateEX = strtotime("$libexit_date");  // libexit_date   
                      $entryd = strtotime("+1hour");
                      $gettimenow = date("d-m-Y h:i:sa",$entryd);
                      $currentdate = strtotime("$gettimenow");  //library old date
                      $hoursleftt = $libexit_dateEX - $currentdate;
                      $hoursleft = floor($hoursleftt/(60*60)); 
                       } else {
                    } ?>
            <?php  //fetch institution information/data
           $category_query = "SELECT * FROM tbl_institutions WHERE insti_id = '$insti_id' AND membership_no = '$membership_no'";
              $run_query = $connection->query($category_query) or die($connection->error);
              $numofrows = $run_query->num_rows;
                while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){ 
                  $ID = $rowW5EDVuG0MTCyXi["ID"];
                  $Institution_name = $rowW5EDVuG0MTCyXi["Institution_name"];
                  $institution_type_PSU = $rowW5EDVuG0MTCyXi["institution_type_PSU"];
                  $email_insti = $rowW5EDVuG0MTCyXi["email_insti"]; 
                  $phonenumber = $rowW5EDVuG0MTCyXi["phonenumber"];
                  $cate3_national = $rowW5EDVuG0MTCyXi["cate3_national"];
                  $membership_date = $rowW5EDVuG0MTCyXi["membership_date"]; }
                      if($institution_type_PSU == "SECONDARY") {
                          if($cate3_national == "Subcounty") {
                            $setcategoryfee = "400";
                          }elseif($cate3_national == "County") {
                            $setcategoryfee = "500";
                          }elseif($cate3_national == "Extra-County") {
                            $setcategoryfee = "600";
                          }else {
                            $setcategoryfee = "0";
                          } 
                      }elseif($institution_type_PSU == "ECDE/PRIMARY") {
                            $setcategoryfee = "300";
                      }elseif($institution_type_PSU == "COLLEGE/UNIVERSITY") {
                            $setcategoryfee = "1000";
                      }else {
                            $setcategoryfee = "0";
                      }
                        $sevendays = "7";
                        $fifteendays = "15";
                        $thirtydays = "30";
                        $discountvalue = "5%";
                              $discountvalueforuse = "5";
                              $totalvalue7days = $setcategoryfee * $sevendays;
                              $totalvalue15days = $setcategoryfee * $fifteendays;
                              $totalvalue30days = $setcategoryfee * $thirtydays;
                            $calculateddiscountvalue7days = $discountvalueforuse / 100 *  $totalvalue7days; //7days cycle
                            $calculateddiscountvalue15days = $discountvalueforuse / 100 * $totalvalue15days; //15days cycle
                            $calculateddiscountvalue30days = $discountvalueforuse / 100 * $totalvalue30days; //30days cycle 
                          $calculatecyclevalue7days = $totalvalue7days - $calculateddiscountvalue7days;
                          $calculatecyclevalue15days = $totalvalue15days - $calculateddiscountvalue15days;
                          $calculatecyclevalue30days = $totalvalue30days - $calculateddiscountvalue30days;
                       ?>
                  <script type="text/javascript">
                      function setbillingcycle(c1,c2) {
                            var c1 = document.getElementById(c1);
                            var c2 = document.getElementById(c2);
                            c2.innerHTML = "";
                      if(c1.value == "24hrs") {  //for 24hrs cycle
                          c2.value = "<?php echo $setcategoryfee;?>"; 
                        }  
                      if(c1.value == "7days") {  //for 7days cycle
                          c2.value = "<?php echo $calculatecyclevalue7days;?>"; 
                        } 
                      if(c1.value == "15days") {  //for 15days cycle
                          c2.value = "<?php echo $calculatecyclevalue15days;?>"; 
                        } 
                      if(c1.value == "30days") {  //for 30days cycle
                          c2.value = "<?php echo $calculatecyclevalue30days;?>"; 
                        } 
                    }
                  </script>
                   <!--stt principal info-->
                      <form class="form-horizontal form-label-left" novalidate>
                        <span class="section">Head of the Institution Info</span>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Name of Principal:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="headname" name="headname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="headphoneNO" name="headphoneNO" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email Address:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="heademail" name="heademail" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                      </form> 
                    <!--end principal info-->
                    <!--stt institution information-->
                      <form class="form-horizontal form-label-left" novalidate>
                          <span class="section">Institution Profile Info</span>
                            <div id="dailyaccess_msg"></div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Institution Name:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="fullname" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="2" name="fullname" value="<?php echo $Institution_name;?>" readonly="" type="text">
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3" for="first-name">Selected Books Category <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6">
                                <input type="text" id="membershipcate" name="membershipcate" value="<?php echo $institution_type_PSU;?>-Books Category" readonly="" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Institution Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="email" name="email" value="<?php echo $email_insti;?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Institution Phone Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="phonenumber" name="phonenumber" required="required" value="<?php echo $phonenumber;?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Institution Category level<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="phonenumber" name="phonenumber" required="required" value="<?php echo $cate3_national;?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Membership No<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="membershipno" name="membershipno" required="required" value="<?php echo $membership_no;?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Membership Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="membershipdate" name="membershipdate" required="required" value="<?php echo $membership_date;?>" readonly="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                      </form>
                    <!--end institution general information-->
                  <!--stt institution billing info-->
                      <form class="form-horizontal form-label-left" novalidate>
                          <span class="section">Institution Billing Info</span>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number"><span class="required"><b>Daily Library Access Fee:</b></span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <p style="color:red;">Your Daily Fee is <b>Kshs&nbsp<?php echo $setcategoryfee;?></b> for the selected membership group category for <b>24Hrs</b>.</p>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Membership Group Category:<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="tillnumber" name="tillnumber" readonly="" value="INSTITUTION-<?php echo $institution_type_PSU;?>" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Select your Billing Cycle <span class="required">*</span>
                              </label> 
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="getcycleamount" name="getcycleamount" class="form-control" onchange="setbillingcycle(this.id,'paycyclebill')" required="">
                                    <option>...............Select Billing Cycle...................</option>
                                    <option value="7days">7 Days</option>
                                    <option value="15days">15 Days</option>
                                    <option value="30days">30 Days</option>
                                  </select>
                              </div>
                            </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Discount (%):<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="discount" name="discount" readonly="" value="<?php echo $discountvalue;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Amount to Pay (Kshs):<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="paycyclebill" name="paycyclebill" readonly="" value="" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">PayBill Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="tillnumber" name="tillnumber" readonly="" value="254254" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Account Number:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="number" id="accountnumber" name="accountnumber" readonly="" value="<?php echo $phonenumber;?>" class="form-control col-md-7 col-xs-12">
                              <p style="color: red;">Note:Account Number is the institution phone number used during membership.</p>
                            </div>
                          </div>
          <input type="hidden" id="postmemberID" name="postmemberID" value="'.$IDpupil.'" readonly="">
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Enter Mpesa code here<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="membermpesacode" name="membermpesacode" required="required" value="" placeholder="Enter received mpesa transaction code" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="checkbox">
                                <label>
                                  <input type="checkbox" required="required" value="" id="" name="">I HEREBY APPLY for membership of the EE-Nduu Library and undertake to observe the library rules and regulations.Check and print your membership card under Menu,Profile
                                </label>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="senddailyaccessfee" type="submit" class="btn btn-success">Go to Bookstore</button>
                            </div>
                          </div>
                      </form> 
                      <!--end institution billing info-->
                      


                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="well" style="margin: 10px 10px 0px 0px;">
                        <div class="x_title">
                          <h2>Library Status</h2>
                          <div class="clearfix"></div>
                        </div>
                      <?php  $chrosql = $connection->query("SELECT daily_libaccess_id,full_names,membership_cate,email,phonenumber,membership_no,till_no,libentry_date,libexit_date,libaccess_fee,mpesa_code,ip_address,libraryaccessdate,IDpupil FROM tbl_dailylibaccess_eenduu WHERE membership_no = '$membership_no'") or die($connection->error);
                          $existcount_resultset = $connection->num_rows($chrosql);
                            if($existcount_resultset > 0) {
                              while($row = $connection->fetch_array($chrosql)) {
                                  $membership_no        = $row["membership_no"];
                                  $libentry_date        = $row["libentry_date"];
                                  $libexit_date        = $row["libexit_date"];
                                  $daily_libaccess_id        = $row["daily_libaccess_id"]; }
                                  // $current-date = strtotime("2016-06-30"); 
                                  // $old-date = strtotime("2016-06-25");                           
                                  // $difference = $current-date - $old_date
                                  // echo 'Hours -'. floor($difference/(60*60));
                                  // echo 'days -'. floor($difference/(60*60*24)); 
                              $libexit_dateEX = strtotime("$libexit_date");  // libexit_date   
                              $entryd = strtotime("+1hour");
                              $gettimenow = date("d-m-Y h:i:sa",$entryd);
                              $currentdate = strtotime("$gettimenow");  //library old date
                              $hoursleftt = $libexit_dateEX - $currentdate;
                              $hoursleft = floor($hoursleftt/(60*60));
                                    if($hoursleft <= 0) {
                                      $hoursleft = 0;
                                    }else {
                                      $hoursleft = $hoursleft;
                                    }
                              if($hoursleft <= 0) {
                                echo '<div class="media-body" style="padding: 10px 10px;line-height: 1.7;">
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
                                </button>
                                <strong><span style="color:#ffffff"><center>'.$FNpupil.',&nbspYour Previous session is expired.Book another session.</center></span></strong>
                                </div>
                                  <p><b>Lib Entry date :</b>'.$libentry_date.'</p>
                                  <p><b>Lib Exit date:</b>&nbsp'.$libexit_date.'</p>
                                  <p><b>Current date is:</b>&nbsp'.$gettimenow.'</p>
                                  <p><b>Lib Access Duration is:</b>&nbsp24hrs</p>
                                  <p><b>Hours left are:</b> &nbsp'.$hoursleft.'hrs</p>
                            </div>';
                              }else {
                                  echo '<div class="media-body" style="padding: 10px 10px;line-height: 1.7;">
                                  <p><b>Lib Entry date :</b>'.$libentry_date.'</p>
                                  <p><b>Lib Exit date:</b>&nbsp'.$libexit_date.'</p>
                                  <p><b>Library Session ID :</b> &nbsp'.$daily_libaccess_id.'</p>
                                  <p><b>Lib Access Duration is:</b>&nbsp24hrs</p>
                                  <p><b>Hours left to exit Library :</b> &nbsp'.$hoursleft.'hrs</p>
                            </div>';
                              }
                        } else {
                echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>
                    </button>
                    <strong><center>No Library Record or Library Status Found.Please,Create your Session.</center></strong>
                      </div>';
                              } ?>
                  </div>
                  <div class="well" style="margin: 10px 10px 0px 0px;">
                        <div class="x_title">
                          <h2>How to Pay</h2>
                          <div class="clearfix"></div>
                        </div>
                  </div>

                   <div class="well" style="margin: 10px 10px 0px 0px;">
                        <div class="x_title">
                          <h2>Company Profile</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="media-body" style="padding: 10px 10px;line-height: 1.7;">
                              <p><b>Institution Name:</b> <?php echo  $Institution_name;?></p>
                              <p><b>Membership fee:</b>Kshs&nbsp<?php echo $membership_amt;?></p>
                              <p><b>Category Selected:</b> &nbsp<?php echo $institution_type_PSU;?>&nbsp Books</p>
                              <p><b>Email:</b> &nbsp<?php echo $email_insti;?></p>
                              <p><b>Membership No :</b> &nbsp<?php echo $membership_no;?></p>
                              <p><b>Library Access fee:</b>Kshs<?php echo $dailylaccess;?></p>
                        </div>
                  </div>

                  <div class="well" style="margin: 10px 10px 0px 0px;background-color: #2a3f54;">
                        <div class="x_title">
                          <h2>Library Status</h2>
                          <div class="clearfix"></div>
                        </div>
                      <div class="media-body" style="padding: 10px 10px;line-height: 1.7;">
                            <p><b>All Registered Users:</b> <?php echo "20";?></p>
                            <p><b>All Academic Staff:</b> <?php echo "12";?></p>
                            <p><b>All Surbodinate Staff:</b> <?php echo "8";?></p>
                            <p><b>Active Bookstore Users:</b> <?php echo "15";?></p>
                        </div>  
                  </div>


                  </div>
                </div>
              </div>
                  <!-- 
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Change your Book Category</h2>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item One Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Three Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Top Profiles <small>Sessions</small></h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                          </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                      </ul>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item One Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Three Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <div class="x_panel">
                                    <div class="x_title">
                                      <h2>Top Profiles <small>Sessions</small></h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                          <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                          </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                      </ul>
                                      <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item One Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Two Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                      <article class="media event">
                                        <a class="pull-left date">
                                          <p class="month">April</p>
                                          <p class="day">23</p>
                                        </a>
                                        <div class="media-body">
                                          <a class="title" href="#">Item Three Title</a>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                      </article>
                                    </div>
                                  </div>
                                </div>
                              </div> -->

          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Ee-Nduu Library Services.Designed and Developed by <a href="http://www.sharpwebsolutions.co.ke">Sharp Web Solutions</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
      <!--upload user profile-->
        <!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel2">Hi,&nbsp<?php echo $FNpupil;?></h4>
                </div>
                <div class="modal-body">
                  <h4>Upload profile pic</h4><br/>
                  <p><form id="avatar_form" enctype="multipart/form-data" method="POST" action="dashboarduser">
                      <input class="form-control" type="file" name="avatar" id="avatar" required><br/>
                      <input type="submit" class="btn btn-sm btn-success" value="Upload Profile Pic">
                  </form>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </div> -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
     <!-- jQuery -->
    <script src="process_logic.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>