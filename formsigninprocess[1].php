<?php session_start(); ?>
<?php require_once(dirname(__FILE__). '/../inc/connect.php'); //connect to the database, include 'inc/config/connect.php';
      require_once(dirname(__FILE__). '/../inc/errorfunctions.php'); ?>
<?php  /////////////////////////////////////////////get and route session for institutions,users,admin
     if(isset($_SESSION["insti_user_id"])) { ?>
        <script type="text/javascript">
          window.location = "<?php echo '../view/gworks-kenya-limited';?>"; 
        </script> <?php
          exit();
      }
    if(isset($_SESSION["insti_insti_id"])) { ?>
        <script type="text/javascript">
          window.location = "<?php echo '../view/gworks-kenya-limited';?>";
        </script> <?php
          exit();
        }
   ///////////////////////get and route sessions for institutions,users,admin,institution-users
  ?>
<?php $geterrro = ""; 
    if(isset($_POST["processusersign"])) { //start
      $getthisemail = validatedatainputHHJRJG45656($_POST["phoneNumber"]); //membership number
      $getpassword  = validatedatainputHHJRJG45656($_POST["userPassWordd"]);//password - start from uppercase letters and it contains lower and upppercasem + takes care of the all string
      $numervalidation = "/^[0-9]+$/"; // num validation
        if(empty($getthisemail) || empty($getpassword)) {
              echo " <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all the fields</b>
                </div> ";
                exit();
              } else {
                }
        //institution-user login proccessing done here 
              // $_SESSION['userid'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
              // $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);          
                    $chrosqlrow = $connection->query("SELECT usrpassword,user_id,insti_id FROM tbl_insti_createusers WHERE membershipnousr = '$getthisemail' LIMIT 3") or die($connection->error);
                        $rowfetch = $connection->fetch_array($chrosqlrow);
                            $pass = $rowfetch['usrpassword']; 
                            $user_id = $rowfetch['user_id'];
                            $insti_id = $rowfetch['insti_id'];
                    $chrosql = $connection->query("SELECT * FROM tbl_insti_createusers WHERE membershipnousr = '$getthisemail' AND usrpassword = '$pass'") or die($connection->error);
                    $existcount_resultset = $connection->num_rows($chrosql); 
              //$resultsetzero = preg_replace('#[^0-9]#']); 
                          if($existcount_resultset > 0) {
                            while($instiuser = $connection->fetch_array($chrosql)){
                                    $ID             = $instiuser["ID"];
                                    $user_id        = $instiuser["user_id"]; 
                                $registrationfee        = $instiuser["registrationfee"];  
                                $paymentstatus        = $instiuser["paymentstatus"];  
                                $feestatus        = $instiuser["feestatus"]; 
                            $usercategory = $instiuser["usercategory"];
                            $loan_agent_officerID = $instiuser["loan_agent_officerID"];
                                    $insti_id       = $instiuser["insti_id"];
                                  $membershipnousr  = $instiuser["membershipnousr"];
                                    $firstname      = $instiuser["firstname"];
                                    $lastname       = $instiuser["lastname"];
                                    $phone          = $instiuser["phone"];
                            $IDnumber = $instiuser["IDnumber"];
                            $borroweraddr = $instiuser["borroweraddr"];
                                  $usrpassword      = $instiuser["usrpassword"];
                                    $email          = $instiuser["email"];
                                    $user_groupname = $instiuser["user_groupname"];
                                    $emailconfirm_insti_createuse   = $instiuser["emailconfirm_insti_createuse"];
                                    $date_created           = $instiuser["date_created"];
                              }
                            if(password_verify($getpassword, $pass)) { //verify the hashed password here
                                if($getthisemail == $membershipnousr && $pass == $usrpassword) {
                                        $_SESSION["ID"]             = $ID;
                                      $_SESSION["insti_user_id"]    = $user_id; 
                                      $_SESSION["registrationfee"] = $registrationfee;
                                      $_SESSION["paymentstatus"] = $paymentstatus;
                                      $_SESSION["feestatus"] = $feestatus;
                                      $_SESSION["usercategory"]    = $usercategory; 
                                      $_SESSION["loan_agent_officerID"]    = $loan_agent_officerID; 
                                      $_SESSION["insti_insti_id"]   = $insti_id;
                                        $_SESSION["insti_membership_no"] =  $membershipnousr;     
                                        $_SESSION["insti_firstname"]     =  $firstname;
                                        $_SESSION["insti_lastname"]      =  $lastname;
                                        $_SESSION["insti_phone"]         =  $phone; 
                                      $_SESSION["IDnumber"]         =  $IDnumber; 
                                      $_SESSION["borroweraddr"]     =  $borroweraddr; 
                                        $_SESSION["insti_email"]         =  $email;
                                        $_SESSION["insti_groupname"]     =  $user_groupname;     
                                        $_SESSION["insti_emailconfirm"]  =  $emailconfirm_insti_createuse;
                                        $_SESSION["insti_date"] = $date_created;  //get the sessions
                                        $_SESSION["logtime"]    = time();  ?>
                                   <script type="text/javascript">
                                       window.location = "../view/gworks-kenya-limited?usrd=<?php echo $user_id;?>&instid=<?php echo $insti_id;?>&instimbsno=<?php echo $membershipnousr;?>&usr=<?php echo $firstname.'nbsp'.$lastname;?>";
                                   </script> 
                                <?php  
                                    } else {
                                  echo "<div class='alert alert-danger'>
                                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>INVALID CREDENTIALS</div>";
                                    }
                                  } else {
                                  echo "<div class='alert alert-danger'>
                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>INVALID CREDENTIALS</div>";
                                  }
                                } else{
                                  echo "<div class='alert alert-danger'>
                                          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>INVALID CREDENTIALS</div>";            
                                    } 
          //institution login proccessing done here 
                    // $chrosqlrowinst = $connection->query("SELECT password FROM tbl_institutions WHERE membership_no = '$getthisemail'") or die($connection->error);
                    // $rowfetchinst = $connection->fetch_array($chrosqlrowinst);
                    //     $passinst = $rowfetchinst['password']; //confirm if password is correct
                    // $chrosqlinsti = $connection->query("SELECT * FROM tbl_institutions WHERE membership_no = '$getthisemail' AND password = '$passinst'") or die($connection->error);
                    // $existcount_insti = $connection->num_rows($chrosqlinsti);
                    //    if($existcount_insti > 0) {
                    //        while($row10 = $connection->fetch_array($chrosqlinsti)){
                    //              $ID  = $row10["ID"];
                    //            $insti_id = $row10["insti_id"];
                    //            $membership_no = $row10["membership_no"];
                    //              $Institution_name  = $row10["Institution_name"];
                    //              $insitution_county = $row10["insitution_county"];
                    //              $insti_type1_primary  = $row10["insti_type1_primary"];
                    //              $insti_type2_day = $row10["insti_type2_day"];
                    //              $cate1_public = $row10["cate1_public"];
                    //              $cate2_regular = $row10["cate2_regular"];
                    //              $cate3_national  = $row10["cate3_national"];
                    //              $address_insti = $row10["address_insti"];
                    //              $email_insti = $row10["email_insti"];
                    //              $phonenumber = $row10["phonenumber"];
                    //           $password  = $row10["password"];
                    //           $institution_type_PSU = $row10["institution_type_PSU"];
                    //              $dailylaccess = $row10["dailylaccess"];
                    //              $dailyluse = $row10["dailyluse"];
                    //              $membership_amt  = $row10["membership_amt"];
                    //              // $mpesa_code = $row10["mpesa_code"];
                    //              $ip_address = $row10["ip_address"];
                    //              $membership_date = $row10["membership_date"];
                    //         }
                    //    if(password_verify($getpassword, $passinst)) {
                    //        if($getthisemail == $membership_no && $passinst == $password) {
                    //                $_SESSION["ID"] = $ID;
                    //                $_SESSION["insti_id"] = $insti_id; 
                    //              $_SESSION["membership_no"] = $membership_no; 
                    //                $_SESSION["Institution_name"] = $Institution_name;
                    //                $_SESSION["insitution_county"] = $insitution_county;     
                    //                $_SESSION["insti_type1_primary"] = $insti_type1_primary;
                    //                $_SESSION["insti_type2_day"] = $insti_type2_day; 
                    //                $_SESSION["cate1_public"] = $cate1_public; 
                    //                $_SESSION["cate2_regular"] = $cate2_regular; 
                    //                $_SESSION["cate3_national"] = $cate3_national;
                    //                $_SESSION["address_insti"] = $address_insti;     
                    //                $_SESSION["email_insti"] = $email_insti;
                    //                $_SESSION["phonenumber"] = $phonenumber; 
                    //              $_SESSION["institution_type_PSU"] = $institution_type_PSU;
                    //                $_SESSION["dailylaccess"] = $dailylaccess; 
                    //                $_SESSION["dailyluse"] = $dailyluse;
                    //                $_SESSION["membership_amt"] = $membership_amt;     
                    //                // $_SESSION["mpesa_code"] = $mpesa_code;
                    //                $_SESSION["ip_address"] = $ip_address; 
                    //                $_SESSION["membership_date"] = $membership_date; //get the sessions
                    //                $_SESSION["logtime"]    = time(); ?>
                                   <script type="text/javascript">
                    //                window.location = "../view/institutions?tkn=<?php echo $membership_no;?>&D=<?php echo $ID;?>&ind=<?php echo $insti_id;?>&tp=<?php echo $institution_type_PSU;?>";
                    //               </script> 
                                 <?php 
                    //       } else {
                    //           echo "<div class='alert alert-danger'>
                    //                   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>INVALID CREDENTIALS</b></div>";
                    //         }
                    //       } else {
                    //           echo "<div class='alert alert-danger'>
                    //                   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>INVALID CREDENTIALS</b></div>";
                    //         }
                    //       } else {
                    //           echo "<div class='alert alert-danger'>
                    //                   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>INVALID CREDENTIALS</b></div>";
                    //         } 
    } //end if ?> 