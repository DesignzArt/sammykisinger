/**************************************
 * receive DOM elements and process logic via an external php file
***************************************/
 $(document).ready(function(){
 			// $("#getpicupandtodb").click(function() {
 			// 	$.ajax({
				// 		url : "action",
				// 		method: "POST",
				// 		data : {category:1},
				// 		success : function(data) {
				// 					$("#get_category").html(data);
				// 				}
				// 	})
 			// });
										// $("#DAezkc").click(function(){ //process forget password for client
										// 	var forgotemail = $("#updateforgotemail").val();
										// 	var forpassword = $("#updateforgotpassword").val();
										// 		$.ajax({
										// 					url 	: "jqueryprocesslogic.php",
										// 					method	: "POST",
										// 					data	: {forgotpassword:1,userforemail:forgotemail,userforpass:forpassword},
										// 					success : function(data){	
										// 								$("#forgotpasswormsg").html(data);
										// 						     }
										// 				})
										// 	})
			// cat();
			// function cat(){ 
			// 		$.ajax({
			// 			url : "act",
			// 			method: "POST",
			// 			data : {category:1},
			// 			success : function(data){
			// 						$("#shwusergrps").html(data);
			// 					}
			// 		})
			// 	}

			// $("#procrteuser").click(function(event) {  //view.prous.pro.crte.user
			// 	event.preventDefault();
			// 		var usergroup = $("#usergroup").val();
			// 		var firstname = $("#firstname").val();
			// 		var lastname = $("#lastname").val();
			// 		var email = $("#email").val();
			// 		var phonenumber = $("#phonenumber").val();
			// 		var membershipno = $("#membershipno").val();
			// 		var password = $("#password").val();
			// 		var conpassword = $("#conpassword").val();
			// 		$.ajax({
			// 			url		: "login",
			// 			method	: "POST",
			// 			data	: {userlogin:1,userEmail:email,userPassword:pass},
			// 			success	: function(data){
			// 						window.location.href = "profile";
			// 					}
			// 		})
			// }) 
			         //window.location = "<?php echo '../auth/login?d=GWORKS-INVESTMENT-LIMITED;'?>"
	itemcategory();		
	itemlocation();				
	receiveproduct();
	product();
	function product(){ //sell items       
			$.ajax({
				url : "act",
				method: "POST",
				data : {getproduct:1},
				success : function(data){
							$("#get_product").html(data);   
						}
			})
		}
	function receiveproduct(){ //receive items
			$.ajax({
				url : "act",
				method: "POST",
				data : {receiveproduct:1},
				success : function(data){
							$("#receive_product").html(data);   
						}
			})
		}

	function itemlocation(){ //display report inventory item location 
			$.ajax({
				url : "act",
				method: "POST",
				data : {locationitem:1},
				success : function(data){
							$("#itemlocation").html(data);   
						}
			})
		}
	function itemcategory(){  //display report inventory item category
			$.ajax({
				url : "act",
				method: "POST",
				data : {categoryitem:1},
				success : function(data){
							$("#itemcategory").html(data);   
						}
			})
		}
	$("body").delegate(".category","click",function(event){  //display item information     
					event.preventDefault();
					var cid = $(this).attr('cid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {selected_Category:1,cat_id:cid}, 
							success : function(data){
									$("#selected_Category").html(data);
								}
					})

			})
	$("body").delegate(".receiveitems","click",function(event){  //display item information     
					event.preventDefault();
					var cid = $(this).attr('cid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {receive_item:1,cat_id:cid}, 
							success : function(data){
									$("#received_item").html(data);
								}
					})

			})
	$("body").delegate(".locationitm","click",function(event){
					event.preventDefault();
					var cid = $(this).attr('cid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {locationitm:1,locationitm_id:cid}, 
							success : function(data){
									$("#locationitm").html(data);
									$("#hidedtbl").hide("fast");
								}
					})

			})
	$("body").delegate(".categoryitm","click",function(event){
					event.preventDefault();
					var cid = $(this).attr('cid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {categoryitm:1,categoryitm_id:cid}, 
							success : function(data){
									$("#categoryitm").html(data);
									$("#hidedtbl").hide("fast");
								}
					})

			})
	// $("body").delegate(".printinvoice","click",function(event){ //process customer invoice
	// 				event.preventDefault();
	// 				var cid = $(this).attr('invoiceid');
	// 				$.ajax({
	// 						url 	: "act",
	// 						method	: "POST",
	// 						data 	: {printinvoice:1,printinvoice_id:cid}, 
	// 						success : function(data){
	// 								$("#get_custinvoice").html(data);
	// 							}
	// 				})

	// 		})
	$("body").delegate(".printreceipt","click",function(event){ //process customer receipt
					event.preventDefault();
					var cid = $(this).attr('receiptid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {printreceipt:1,printreceipt_id:cid}, 
							success : function(data){
									$("#get_custreceipt").html(data);
								}
					})

			})
	$("body").delegate("#calculinetotal","click",function(event) {  //calculate total for receive stock
			event.preventDefault();
			var unitcost = $("#unitcost").val();
			var receiveqty = $("#receiveqty").val();
			var itemID = $("#itemID").val();
			$.ajax({
				url		: "act",
				method	: "POST",
				data	: {settotal:1,untcost:unitcost,recivqty:receiveqty,itmID:itemID},
				success	: function(data){
							$("#ttl").html(data);
					}
			});
	});
	$("body").delegate("#totalsellstock","click",function(event) {  //calculate total for sell stock
			event.preventDefault();
			var sellprice = $("#sellprice").val();
			var itmqtysell = $("#itmqtysell").val();
			$.ajax({
				url		: "act",
				method	: "POST",
				data	: {selltotal:1,sellpri:sellprice,sellqty:itmqtysell},
				success	: function(data){
							$("#sell2").html(data);                            
					}
			});
	});
	$("body").delegate("#prodatesolditems","click",function(event) {//manage sold items= date range selection
			event.preventDefault();
			var fromdate = $("#fromdate").val();
			var todate = $("#todate").val();
			$.ajax({
				url		: "act",
				method	: "POST",
				data	: {itemdaterange:1,fdate:fromdate,tdate:todate},
				success	: function(data){
							$("#solditemdateselection").html(data);
					}
			});
	});
	$("body").delegate("#prosellsreportselec","click",function(event) {//manage sells report= date range selection
			event.preventDefault();
			var fromdate = $("#fromdate").val();
			var todate = $("#todate").val();
			$.ajax({
				url		: "act",
				method	: "POST",
				data	: {itemsellsreport:1,fdate:fromdate,tdate:todate},
				success	: function(data){
							$("#sellsreportselection").html(data);
					}
			});
	});             
	$("#procrtmembergrps").click(function(){ //view.procrtemembergroups.pro.crte.sell items 
			$.ajax({
						url 	: "prousgrp.php",
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
									window.scrollTo(0,0);
								 $("#procrtprodcate1").html(data);   
							    }
				});
	});
	$("#procrtreceiveprdtcs").click(function(){ //view.procrtemembergroups.pro.crte.receive items 
			$.ajax({
						url 	: "proreceiveitems.php",
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
									window.scrollTo(0,0);
								 $("#procrtreceiveprdtcs12").html(data);
							    }
				});
	});
	$("body").delegate("#prodatereceiveditems","click",function(event) {//manage received items= date range selection
			event.preventDefault();
			var refromdate = $("#refromdate").val();
			var retodate = $("#retodate").val();
			$.ajax({
				url		: "act",
				method	: "POST",
				data	: {receiveitemdaterange:1,refmdate:refromdate,retdate:retodate},
				success	: function(data){
							$("#receiveitemdateselection").html(data);
					}
			});
	});
    //-----------------------------------------------------------------------------------
    //LOANS
    //view.procustomerloan.pro.crt.process customer loan
	$("#procustomerloan").click(function(){                      
			$.ajax({
					url 	: "procrtnewcustomerloan.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procrtnewcustomerloan").html(data);
						    }
				});
	});
	//view.progrouploan.pro.crt.process group loan
	$("#progrouploan").click(function(){                       
			$.ajax({
					url 	: "procrtnewgrouploan.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procrtnewgrouploan").html(data);
						    }
				});
	});
	//view.progrouploan.pro.crt.process customer loan payment
	$("#procustoloanpayment").click(function() {                       
			$.ajax({
					url 	: "procustomerloanpayment.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procustomerloanpayment").html(data);
						    }
				});
	});												
	//-------------------------------------------------------------------------------------
	//view.dltgrp.dlt.item tax ratio-------------------------------(dlt company users)
	$("body").delegate(".companyuser","click",function(event){   
		event.preventDefault();
		var companyuserid = $(this).attr('companyuserid');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {companyuserid:1,companyuseridid:companyuserid}, 
				success : function(data) {
						$("#get_dltcompuser").html(data);
					}
		});
	});  
	$("body").delegate(".yesdltcompanyuserid","click",function(event) {  
			event.preventDefault();
			var yesdltcompanyuserid1 = $(this).attr('yesspecificdltcompanyuserid');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesdltcompanyuserid:1,specificyesdltcompanyuserid:yesdltcompanyuserid1}, 
				success : function(data) {
						$("#getyesdltcompanyuserid").html(data);
					}
		});
	});
	//-------------------------------------------------------------------------------------
	//view.dltgrp.dlt.item tax ratio-------------------------------(dlt item tax ratio)
	$("body").delegate(".deletetax","click",function(event){   
		event.preventDefault();
		var deletetax = $(this).attr('dlttaxid');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {deletetax:1,dlttaxid:deletetax}, 
				success : function(data) {
						$("#get_dltitemtax").html(data);
					}
		});
	});  
	$("body").delegate(".yesdltitmtaxgroup","click",function(event) {  
			event.preventDefault();
			var yesitmtaxgroup1 = $(this).attr('yesitmtaxgroup');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesitmtaxgroup:1,specificitmtax:yesitmtaxgroup1}, 
				success : function(data) {
						$("#getyesitmtax").html(data);
					}
		});
	});
	//-------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------
	//view.dltgrp.dlt.item locations-------------------------------(dlt item locations)
	$("body").delegate(".deletelocation","click",function(event){   
		event.preventDefault();
		var dltlocationid = $(this).attr('dltlocationid');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {dltlocationid:1,dltlocid:dltlocationid}, 
				success : function(data) {
						$("#get_dltitemloc").html(data);
					}
		});
	});  
	$("body").delegate(".yesdltitmlocgroup","click",function(event) {  
			event.preventDefault();
			var yesitmlocgroup1 = $(this).attr('yesitmlocgroup');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesitmlocgroup:1,specificitmloc:yesitmlocgroup1}, 
				success : function(data) {
						$("#yesitmlocgroup").html(data);
					}
		});
	});
	//-------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------
	//view.dltgrp.dlt.permission grps-------------------------------(dlt permission grps)
	$("body").delegate(".deletegroups","click",function(event){   
		event.preventDefault();
		var deletegrpid = $(this).attr('deletegrpid');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {deletegrpid:1,dltgrp_pid:deletegrpid}, 
				success : function(data) {
						$("#get_deletegrp").html(data);
					}
		});
	});  
	$("body").delegate(".yesdltspecificgroup","click",function(event) {  
			event.preventDefault();
			var yesspecificgroup1 = $(this).attr('yesspecificgroup');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificgroup:1,specificgrp:yesspecificgroup1}, 
				success : function(data) {
						$("#getyesficgroup").html(data);
					}
		});
	});
	//-------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------
	//view.dltgrp.dlt.accounts -------------------------------------(dlt item category)
	$("body").delegate(".deletecategory","click",function(event){  
		event.preventDefault();
		var dltaccountid = $(this).attr('deletecategoryid');       
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {dltaccountid:1,dltntid:dltaccountid}, 
				success : function(data) {
						$("#get_deletecategory").html(data);
					}
		});
	});  
	$("body").delegate(".yesdltspecificaccount","click",function(event) {  
			event.preventDefault();
			var yesspecificaccount1 = $(this).attr('yesspecificaccount');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificaccount:1,specificaccnt:yesspecificaccount1}, 
				success : function(data) {
						$("#getyesficaccnt").html(data);
					}
		});
	});
	//------------------------------------------------------------------------------------
	//view.dltuser.dlt.users/employees------------------------------(dlt new customers)
	$("body").delegate(".deleteusers","click",function(event){  
			event.preventDefault();
			var dltusersid = $(this).attr('dltusersid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {dltusersid:1,dltuseruser_pid:dltusersid}, 
					success : function(data) {
							$("#get_deleteuser").html(data);
						}
			});
	});
	$("body").delegate(".yesdltspecificemployee","click",function(event) {  
			event.preventDefault();
			var yesspecificemploy1 = $(this).attr('yesspecificemploy');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificemploy:1,yesspcemploy:yesspecificemploy1}, 
				success : function(data) {
						$("#yesspecificemploy2").html(data);
					}
		});
	});
	//------------------------------------------------------------------------------------
	//view.dltuser.dlt.users/employees------------------------------(dlt new supplier)
	$("body").delegate(".deletesupplier","click",function(event){  
			event.preventDefault();
			var dltusersid = $(this).attr('dltsupplierid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {dltsupplierid:1,dltsupplier_pid:dltusersid}, 
					success : function(data) {
							$("#get_deletesupplier").html(data);
						}
			});
	});
	$("body").delegate(".yesdltspecificsupplier","click",function(event) {  
			event.preventDefault();
			var yesspecificemploy1 = $(this).attr('yesspecificsupplier');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificsupplier:1,yesspcsupplier:yesspecificemploy1}, 
				success : function(data) {
						$("#yesspecificsupplier").html(data);
					}
		});                
	});
	//------------------------------------------------------------------------------------
	//view.dltuser.dlt.borrowers/customers (dlt sold items)
	$("body").delegate(".deleteborrower","click",function(event){  
			event.preventDefault();
			var dltborowerid = $(this).attr('dltborowerid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {dltborowerid:1,dltborowerid_pid:dltborowerid}, 
					success : function(data) {
							$("#get_dltborowerid").html(data);
						}
			});
	});
	$("body").delegate(".yesdltspecificborower","click",function(event) {  
			event.preventDefault();
			var yesspecificborower1 = $(this).attr('yesspecificborower');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificborower:1,yesspcborower:yesspecificborower1}, 
				success : function(data) {
						$("#yesspecificborower2").html(data);
					}
		});
	});
	//------------------------------------------------------------------------------------

	//------------------------------------------------------------------------------------
	//view.dltuser.dlt.borrowers/customers (dlt received items)
	$("body").delegate(".deletereceiver","click",function(event){  
			event.preventDefault();
			var dltborowerid = $(this).attr('dltreceiverid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {dltreceiverid:1,dltreceiverid_pid:dltborowerid}, 
					success : function(data) {
							$("#get_dltreceiverid").html(data);
						}
			});
	});
	$("body").delegate(".yesdltspecificreceiver","click",function(event) {  
			event.preventDefault();
			var yesspecificborower1 = $(this).attr('yesspecificreceiver');
		$.ajax({
				url 	: "act",
				method	: "POST",
				data 	: {yesspecificreceiver:1,yesspcborower:yesspecificborower1}, 
				success : function(data) {
						$("#yesspecificborower2").html(data);
					}
		});
	});
	//------------------------------------------------------------------------------------


	//view.prousercontacts.pro.user.contacts.viewprofile
	$("body").delegate(".viewusercontacts","click",function(event){
			event.preventDefault();
			var mngusercontacts = $(this).attr('mngusercontacts');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {get_mngusercontacts:1,mngusercontacts_userid:mngusercontacts}, 
					success : function(data){
							$("#get_mngusercontacts").html(data);
						}
			});
	});           
	//view.procrtguarantor.pro.crt.guarantors     
	$("#guarantorprocrt").click(function(){                   
			$.ajax({
					url 	: "procrtguarantor.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procrtguarantor").html(data);
						    }
				});
	});
	//view.procrtuser.pro.crt.borrower 
	$("#borrowerprocrt").click(function(){     
			$.ajax({
					url 	: "procrtborrower.php",  
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procrtuser").html(data);
						    }
				});
	});
	//view.promngborrowers.pro.mng.suppliers
	$("body").delegate(".viewdatasuppliers","click",function(event) {  
			event.preventDefault();
			var viewsupplierid = $(this).attr('viewsupplierid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {get_viewsupplierid:1,setviewsupplierid:viewsupplierid}, 
					success : function(data) {
							$("#get_viewsupplierid").html(data);
						}
			});
	});
	//view.promngborrowers.pro.update.suppliers
	$("body").delegate("#updateguarantorprocrt","click",function(event) {  
			event.preventDefault();
			$.ajax({
					url 	: "proupdatesupplier.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#updatesupplierpro").html(data);  
						    }
				});
	});
	//view.promngborrowers.pro.mng.borrowers
	$("body").delegate(".viewdataborrowers","click",function(event) {  
			event.preventDefault();
			var viewborrowerid = $(this).attr('viewborrowerid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {get_viewborrowerid:1,setviewborrowerid:viewborrowerid}, 
					success : function(data) {
							$("#get_usersidset").html(data);
						}
			});
	});
	//view.promngborrowers.pro.update.borrowers
	$("body").delegate("#updateborrowerprocrt","click",function(event) {  
			event.preventDefault();
			$.ajax({
					url 	: "proupdateborrower.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#updateborrowerpro").html(data);  
						    }
				});
	});
	//view.promngborrowers.pro.update.users/employees
	$("body").delegate("#updatecreatedemployee","click",function(event) {  
			event.preventDefault();
			$.ajax({
					url 	: "proupdateemployee.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#updateemployepro").html(data);  
						    }
				});
	});
															//view.promngusrs.pro.mng.users
	$("body").delegate(".viewdatausers","click",function(event){  
			event.preventDefault();
			var Emngusersid = $(this).attr('Emngusersid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {get_Emngusersid:1,Emnguser_id:Emngusersid}, 
					success : function(data) {
							$("#get_usersidset").html(data);
						}
			});
	});
	//view.procrtuser.pro.crt.user
	$("#procrteuser").click(function(){  
			$.ajax({
					url 	: "procrtuser.php",
					method	: "POST",
					data 	: $("form").serialize(),
					success : function(data) {
								window.scrollTo(0,0);
							  $("#procrtuser").html(data);
						    }
				});
	});
	//view.prodailylibaccess.pro.company-profile-infor
	$("#senddailyaccessfee").click(function() { 
		$.ajax({
				url 	: "prodailylibaccess.php",
				method	: "POST",
				data 	: $("form").serialize(),
				success : function(data) {
							window.scrollTo(0,0);
						 $("#dailyaccess_msg").html(data);
					    }
		});
	});
	//view.promnggrp.pro.mng.grps
	$("body").delegate(".viewdata","click",function(event){  
			event.preventDefault();
			var mnggrpid = $(this).attr('mnggrpid');
			$.ajax({
					url 	: "act",
					method	: "POST",
					data 	: {get_mnggrpid:1,mnggr_pid:mnggrpid}, 
					success : function(data){
							$("#get_mnggr").html(data);
						}
			});
	});
					//view.procrtegrp.pro.crte.permission groups  procrtmembergrps
				// $("body").delegate("#DAezmarketodd","click",function(event){  
				// 	event.preventDefault();
				// 	$.ajax({
				// 				url 	: "prousgrp.php", 
				// 				method	: "POST",
				// 				data 	: $("form").serialize(),
				// 				success : function(data){
				// 							window.scrollTo(0,0);
				// 						 $("#prousgrp").html(data);
				// 					    }
				// 		});
				// });
	$("#procateprodu").click(function(){ //view.procrteprodaccount.pro.crte.productcategory 
			$.ajax({
						url 	: "procrtprodcate.php",  
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
								 $("#procrtprodcate1").html(data);     
							    }
				}); 
	});
	$("#locationprocateprodu").click(function(){ //view.procrtedepositaccount.pro.crte.productlocation  
			$.ajax({
						url 	: "procrtdepositaccount.php",
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
									window.scrollTo(0,0);
								 $("#procrtprodcate2").html(data);
							    }
				});
	});
	$("#taxprocateprodu").click(function(){ //view.procrtedepositaccount.pro.crte.producttax 
			$.ajax({
						url 	: "procrtwithdrawalaccount.php",
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
									window.scrollTo(0,0);
								 $("#procrtprodcate3").html(data);
							    }
				});
	});
	$("body").delegate(".viewdatacategories","click",function(event){  //view.promnggrp.pro.mng.accounts
				event.preventDefault();
				var mnggrpidcategory = $(this).attr('mnggrpidcategories');
				$.ajax({
						url 	: "act",
						method	: "POST",
						data 	: {get_mnggrpidcategories:1,mnggr_pidcategory:mnggrpidcategory}, 
						success : function(data){
								$("#get_mnggr").html(data);
							}
				});
		});
	$("#updtcategory").click(function(event){ //process update for company accounts
					event.preventDefault();
					var categoryname = $("#categoryname").val();
					var cat_available = $("#cat_available").val();
					var tags_1 = $("#tags_1").val();
					var cate_id = $("#cate_id").val();
						$.ajax({
									url 	: "act",
									method	: "POST",
			   data	: {updtcat:1,categorynameC:categoryname,cat_availablE:cat_available,tags_12:tags_1,cate_iD:cate_id},
									success : function(data){	
												$("#shwupdtcatemsg").html(data);
										    }
								})
					})
				
				$("body").delegate(".viewprodtvarit","click",function(event){  //view.promnggrp.pro.mng.productvariety
							event.preventDefault();
							var viewprodtvarit_id = $(this).attr('viewprodtvarit_id');
							$.ajax({
									url 	: "act",
									method	: "POST",
									data 	: {get_viewprodtvarit_id:1,vwprodtvarit_id:viewprodtvarit_id}, 
									success : function(data){
											$("#get_viewprodtvarit_id").html(data);
										}
							});
				});
		$("body").delegate(".viewproduct","click",function(event){  //view.promnggrp.pro.mng.products
					event.preventDefault();
					var mngproductpid = $(this).attr('viewprodctid');
					$.ajax({
							url 	: "act",
							method	: "POST",
							data 	: {get_productpid:1,mngpdctid:mngproductpid}, 
							success : function(data){
									$("#get_viewproduct").html(data);
								}
					});
		});
		//view.promngborrowers.pro.update.products
		$("body").delegate("#updateprocrtcompprodt","click",function(event) {  
				event.preventDefault();
				$.ajax({
						url 	: "proupdateproduct1.php",
						method	: "POST",
						data 	: $("form").serialize(),
						success : function(data) {
									window.scrollTo(0,0);
								  $("#updateproduct2").html(data);  
							    }
					});
		});   
		
				$("#procrtcompprodt").click(function(){  //view.procrteprod.pro.crte.prod
						$.ajax({
									url 	: "procrtcompprodt.php",  
									method	: "POST",
									data 	: $("form").serialize(),
									success : function(data) {
												window.scrollTo(0,0);
											 $("#showprocrtcompprodt").html(data);
										    }
							});
				});
				$("#procrtcompprodvariety").click(function(){  //view.procrteprodvariety.pro.crte.prodvariety
						$.ajax({
									url 	: "procrtcompprodtvarit.php",  
									method	: "POST",
									data 	: $("form").serialize(),
									success : function(data) {
												window.scrollTo(0,0);
											 $("#showprocrtcompprodvariety").html(data);
										    }
							});
				});

		

										// $("#signinDAezkcWpvmhy").click(function(e){ //process user signin form dentails here
										// 		e.preventDefault();
										// 		var phonenumber  = $("#phonenumber").val();
										// 		var userpassword = $("#userpasswordd").val();
										// 			$.ajax({
										// 						url 	: "formsigninprocess.php",
										// 						method	: "POST",
										// 						data	: {processusersign:1,phoneNumber:phonenumber,userPassWordd:userpassword},
										// 						success : function(data){	
										// 									$("#displaypasswormsg").html(data);
										// 							     }
										// 			})
										// });
										// $("#reg_user_now").click(function(e){ //process user signin form dentails here
										// 		e.preventDefault();
										// 		window.location = "register";
										// 		// location.reload();
										// });
										// $(".btnupdateinfo").click(function(){ //process update infor for each client with a profile
										// 	var nameee 	= $("#updatename").val();
										// 	var mobileee 	= $("#updatenumber").val();
										// 	var emailee 	= $("#updateemail").val();
										// 	var passwordee = $("#updatepassword").val();
										// var useremailee 	= $("#getuseremail").val();
										// var useridee 		= $("#getuserid").val();
										// 		$.ajax({
										// 					url 	: "jqueryprocesslogic.php",
										// 					method	: "POST",
										// 					data	: {clientupdateinfo:1,userName:nameee,UserMobile:mobileee,Useremail:emailee,UserPassword:passwordee,getuserid:useridee,getuseremail:useremailee},
										// 					success : function(data){	
										// 								$("#get_inforupdatensuceess").html(data);
										// 						     }
										// 			})
										// })
										// $("#paymentpaystatus").click(function(){ //process admin payment status
										// 	var getpaymentstatus 	= $("#paymentstatus1").val();
										// 	var getourderidstatus 	= $("#getordersatatus").val();
										// 		$.ajax({
										// 					url 	: "jqueryprocesslogic.php",
										// 					method	: "POST",
										// 					data	: {receivepayment:1,getthepayment:getpaymentstatus,orderid:getourderidstatus},
										// 					success : function(data){	
										// 								$("#updatepaymentmsg").html(data);
										// 						     }
										// 		})
										// })
										// $("#orderpaystatus").click(function(){ //process admin order status
										// 	var getorderstatus 		= $("#order-status2").val();
										// 	var getpaymentdstatus 	= $("#getordersatatus").val();
										// 		$.ajax({
										// 					url 	: "jqueryprocesslogic.php",
										// 					method	: "POST",
										// 					data	: {receiveorder:1,gettheorder:getorderstatus,orderid:getpaymentdstatus},
										// 					success : function(data){	
										// 								$("#updateordermsg").html(data);
										// 						     }
										// 		})
										// })
});