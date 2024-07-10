<?php 


session_start();
include("header.php");
include("nav.php");

echo $_SESSION["E_CNIC"];




include("inc/validate_login.php");

$sess_row_id  = $_SESSION["ROW_ID"];
$sess_e_cnic  = $_SESSION["E_CNIC"];

$vis_id = "";
$vis_id_btns = "";

if(isset($_REQUEST["vis_id"])){
	if(!empty($_REQUEST["vis_id"])){	
		$vis_id = $_REQUEST["vis_id"];	
	}
}else{
	$vis_id = "1";
}




$next_btn = "";
$prev_btn = "";

if($vis_id < 9){
	$vis_idn = $vis_id + 1;
	$next_btn = "<a href='?vis_id=$vis_idn' class='btn btn-success'>Next Step</a>";
}

if($vis_id > 1){
	$vis_idp = $vis_id - 1;
	$prev_btn = "<a href='?vis_id=$vis_idp' class='btn btn-info'>Prev Step</a>";
}

$vis_id_btns = "
<br /><br />
<div id='gybShowDivButton'>
$prev_btn
$next_btn
</div>
";
 
	
?>

<script type="text/javascript" src="js/jquery.min.js"></script>

<script>
/* 	 var loadFile = function(event) {
		var output = document.getElementById('output_image');
		output.src = URL.createObjectURL(event.target.files[0]);
	  }; */
</script>
		
					
<script>
	function updateProfile(){
		
		
		var txt_name = document.getElementById("txt_name").value;
		var txt_fname = document.getElementById("txt_fname").value;
		var txt_gender = document.getElementById("txt_gender").value;
		var txt_DOB = document.getElementById("txt_DOB").value;
		var txt_religion = document.getElementById("txt_religion").value;
		var txt_sect = document.getElementById("txt_sect").value;
		var txt_caste = document.getElementById("txt_caste").value;
		var txt_martial = document.getElementById("txt_martial").value;
		var txt_civ_ex = document.getElementById("txt_civ_ex").value;
		
	
		var string = 'act=update_profile&txt_name='+txt_name+'&txt_fname='+txt_fname+'&txt_gender='+txt_gender+'&txt_DOB='+txt_DOB+'&txt_religion='+txt_religion+'&txt_sect='+txt_sect+'&txt_caste='+txt_caste+'&txt_martial='+txt_martial+'&txt_civ_ex='+txt_civ_ex+'';
					//alert(string);
				$.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					}else{
						alert("Error Occur...");
					}
				 }
				});  
	}	
	
	
	
	function updateAddress(){
		
		var E_EMAIL = document.getElementById("E_EMAIL").value;
		var E_MOBILE = document.getElementById("E_MOBILE").value;
		var E_PHONE_NO = document.getElementById("E_PHONE_NO").value;
		var E_DOM_DIST_ID = document.getElementById("E_DOM_DIST_ID").value;
		var E_PERM_ADDRESS = document.getElementById("E_PERM_ADDRESS").value;
		var E_PERM_DIST_ID = document.getElementById("E_PERM_DIST_ID").value;
		var E_PERM_TEHS_ID = document.getElementById("E_PERM_TEHS_ID").value;
		var E_PRES_ADDRESS = document.getElementById("E_PRES_ADDRESS").value;
		var E_PRES_DIST_ID = document.getElementById("E_PRES_DIST_ID").value;
		var E_PRES_TEHS_ID = document.getElementById("E_PRES_TEHS_ID").value;
		
		
		
		var string = 'act=update_address&E_EMAIL='+E_EMAIL+'&E_MOBILE='+E_MOBILE+'&E_PHONE_NO='+E_PHONE_NO+'&E_DOM_DIST_ID='+E_DOM_DIST_ID+'&E_PERM_ADDRESS='+E_PERM_ADDRESS+'&E_PERM_DIST_ID='+E_PERM_DIST_ID+'&E_PERM_TEHS_ID='+E_PERM_TEHS_ID+'&E_PRES_ADDRESS='+E_PRES_ADDRESS+'&E_PRES_DIST_ID='+E_PRES_DIST_ID+'&E_PRES_TEHS_ID='+E_PRES_TEHS_ID+'';
					//alert(string);
				$.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					}else{
						alert("Error Occur...");
					}
				 }
				});  
	}
	

function updateEducation(){

		var EDU_LEVEL_ID = document.getElementById("EDU_LEVEL_ID").value;
		var EDU_FIELD_ID = document.getElementById("EDU_FIELD_ID").value;
		var PASS_YEAR = document.getElementById("PASS_YEAR").value;
		var INSTITUTE = document.getElementById("INSTITUTE").value;
		var GPA_GRADE = document.getElementById("GPA_GRADE").value;
		
		if(EDU_LEVEL_ID == "" || EDU_FIELD_ID == "" || INSTITUTE == "" || GPA_GRADE == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=update_education&EDU_LEVEL_ID='+EDU_LEVEL_ID+'&EDU_FIELD_ID='+EDU_FIELD_ID+'&PASS_YEAR='+PASS_YEAR+'&INSTITUTE='+INSTITUTE+'&GPA_GRADE='+GPA_GRADE+'';
					//alert(string);
				$.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				}); 
		}
	}
	
function deleteEducation(id){
	
	if(id != ""){		
			var string = 'act=deleteEducat&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			}); 
}else{
	alert("Please Fill the Required Fields!");
}
}	
	

function addProfQual(){

		var PQ_COURCE_TITLE = document.getElementById("PQ_COURCE_TITLE").value;
		var PQ_COURCE_FIELD = document.getElementById("PQ_COURCE_FIELD").value;
		var PQ_INSTITUTE = document.getElementById("PQ_INSTITUTE").value;
		var PQ_DURATION_FROM = document.getElementById("PQ_DURATION_FROM").value;
		var PQ_DURATION_TO = document.getElementById("PQ_DURATION_TO").value;
		var PQ_RESULT = document.getElementById("PQ_RESULT").value;
		
		if(PQ_COURCE_TITLE == "" || PQ_COURCE_FIELD == "" || PQ_INSTITUTE == "" || PQ_DURATION_FROM == "" || PQ_DURATION_TO == "" || PQ_RESULT == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_profqual&PQ_COURCE_TITLE='+PQ_COURCE_TITLE+'&PQ_COURCE_FIELD='+PQ_COURCE_FIELD+
		 '&PQ_INSTITUTE='+PQ_INSTITUTE+'&PQ_DURATION_FROM='+PQ_DURATION_FROM+'&PQ_DURATION_TO='+PQ_DURATION_TO+'&PQ_RESULT='+PQ_RESULT+'';
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		}
	}
	
function deleteProfQual(id){
	
	if(id != ""){		
			 var string = 'act=delete_proqual&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}	
	


function addAwards(){

		var AW_AWARD_DETAILS = document.getElementById("AW_AWARD_DETAILS").value;
		
		
		if(AW_AWARD_DETAILS == "" ){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_award&AW_AWARD_DETAILS='+AW_AWARD_DETAILS+'';
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		}
	}
	
function deleteAward(id){
	
	if(id != ""){		
			 var string = 'act=delete_award&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}	
		

function addHobby(){

		var HB_HOBBY_DETAILS = document.getElementById("HB_HOBBY_DETAILS").value;
		
		
		if(HB_HOBBY_DETAILS == "" ){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_hobby&HB_HOBBY_DETAILS='+HB_HOBBY_DETAILS+'';
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		}
	}
	
function deleteHobby(id){
	
	if(id != ""){		
			 var string = 'act=delete_hobby&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}	
	

function addEmpHist(){

		var EH_ORGANIZATION_NAME = document.getElementById("EH_ORGANIZATION_NAME").value;
		var EH_POSITION_NAME = document.getElementById("EH_POSITION_NAME").value;
		var EH_FROM_DATE = document.getElementById("EH_FROM_DATE").value;
		var EH_DATE_TO = document.getElementById("EH_DATE_TO").value;
		var EH_LAST_PAY = document.getElementById("EH_LAST_PAY").value;
		var EH_LEAVE_REASON = document.getElementById("EH_LEAVE_REASON").value;
		
		if(EH_ORGANIZATION_NAME == "" || EH_POSITION_NAME == "" || EH_FROM_DATE == "" || EH_DATE_TO == ""  || EH_LEAVE_REASON == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_emphist&EH_ORGANIZATION_NAME='+EH_ORGANIZATION_NAME+'&EH_POSITION_NAME='+EH_POSITION_NAME+
		 '&EH_FROM_DATE='+EH_FROM_DATE+'&EH_DATE_TO='+EH_DATE_TO+'&EH_LAST_PAY='+EH_LAST_PAY+'&EH_LEAVE_REASON='+EH_LEAVE_REASON+'';
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		}
	}

										
function addMilitarySvc(){

		var MIL_ARMY_NO_RANK = document.getElementById("MIL_ARMY_NO_RANK").value;
		var AMIL_RMY_PAF_NAVY = document.getElementById("AMIL_RMY_PAF_NAVY").value;
		var MIL_CORPS_REGT = document.getElementById("MIL_CORPS_REGT").value;
		var MIL_ENROLL_DATE = document.getElementById("MIL_ENROLL_DATE").value;
		var MIL_DISCHARGE_DATE = document.getElementById("MIL_DISCHARGE_DATE").value;
		var MIL_DISCHARGE_REASON = document.getElementById("MIL_DISCHARGE_REASON").value;
		var MIL_MEDICAL_CAT = document.getElementById("MIL_MEDICAL_CAT").value;
		
		if(MIL_ARMY_NO_RANK == "" || AMIL_RMY_PAF_NAVY == "" || MIL_CORPS_REGT == "" || MIL_ENROLL_DATE == "" || MIL_DISCHARGE_DATE == "" || MIL_DISCHARGE_REASON == "" || MIL_MEDICAL_CAT == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_military_svc&MIL_ARMY_NO_RANK='+MIL_ARMY_NO_RANK+'&AMIL_RMY_PAF_NAVY='+AMIL_RMY_PAF_NAVY+
		 '&MIL_CORPS_REGT='+MIL_CORPS_REGT+'&MIL_ENROLL_DATE='+MIL_ENROLL_DATE+'&MIL_DISCHARGE_DATE='+MIL_DISCHARGE_DATE+'&MIL_DISCHARGE_REASON='+MIL_DISCHARGE_REASON+'&MIL_MEDICAL_CAT='+MIL_MEDICAL_CAT+'';
					
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		}
	}
	
function deleteEmpHist(id){
	
	if(id != ""){		
			 var string = 'act=delete_emphist&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}		
function deleteMilitary(id){
	
	if(id != ""){		
			 var string = 'act=delete_miltary_svc&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				window.location.reload();
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}	
function addFD()
{
	 var FD_ENAME=document.getElementById("FD_ENAME").value;
	 var FD_GENDER=document.getElementById("FD_GENDER").value;
	 var FD_DOB=document.getElementById("FD_DOB").value;
	 var FD_RELATION=document.getElementById("FD_RELATION").value;
	 var FD_PROFESSION=document.getElementById("FD_PROFESSION").value;
	 var FD_NEXT_OF_KIN=document.getElementById("FD_NEXT_OF_KIN").checked;
	 
	 var NEXT_OF_KIN = "0";
	 if(FD_NEXT_OF_KIN){
		NEXT_OF_KIN = "1";
	 }
	 
	 if(FD_ENAME == "" || FD_GENDER == "" || FD_DOB == "" || FD_RELATION == "" || FD_PROFESSION == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_FM_DE&FD_ENAME='+FD_ENAME+'&FD_GENDER='+FD_GENDER+
		 '&FD_DOB='+FD_DOB+'&FD_RELATION='+FD_RELATION+'&FD_PROFESSION='+FD_PROFESSION+'&NEXT_OF_KIN='+NEXT_OF_KIN;
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		} 
}


function deleteFD(id){
	
	if(id != ""){		
			 var string = 'act=delete_FD&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				if(data == 1){
													alert("Successfully Delete.");
													window.location.reload();
													}else{
														alert("Error Occur...");
													}
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}																	
								

									function fun_me_have_disease(val){
										if(val != ""){		
										var string = 'act=me_have_disease&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
					
										window.location.reload();
									 }
									});  
										
									}
									}
									
									function fun_me_have_diability(val){
										
										if(val != ""){		
										var string = 'act=me_have_diable&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									}); 
									}
									}
									
									function fun_me_have_terminated(val){
									
										if(val != ""){		
										var string = 'act=me_have_termin&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									});  
										
									}
									}
									function fun_me_have_punish_c(val){
									
										if(val != ""){		
										var string = 'act=me_have_punish&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									});  
										
									}
									}
									function fun_me_have_punish_paf(val){
									
										if(val != ""){		
										var string = 'act=me_have_pun_paf&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									});  
										
									}
									}
									function fun_me_have_deserted(val){
									
										if(val != ""){		
										var string = 'act=me_have_desert&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									});  
										
									}
									}
									function fun_me_have_willing_p(val){
									
										if(val != ""){		
										var string = 'act=me_have_wlg_p&val='+val;
										$.ajax({  url: "edit_exe.php",
										data: string,
										type: "POST",
										success:function(data){
											
										window.location.reload();
									 }
									});  
										
									}
									}
									
									
			   						
function addRF()
{
	 var RF_ENAME=document.getElementById("RF_ENAME").value;
	 var RF_R_ADDRESS=document.getElementById("RF_R_ADDRESS").value;
	 var RF_R_PHONE=document.getElementById("RF_R_PHONE").value;
	 var RF_R_E_MAIL=document.getElementById("RF_R_E_MAIL").value;

	 if(RF_ENAME == "" || RF_R_ADDRESS == "" || RF_R_PHONE == "" || RF_R_E_MAIL == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_RF&RF_ENAME='+RF_ENAME+'&RF_R_ADDRESS='+RF_R_ADDRESS+
		 '&RF_R_PHONE='+RF_R_PHONE+'&RF_R_E_MAIL='+RF_R_E_MAIL;
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		} 
}


function deleteRF(id){
	
	if(id != ""){		
			 var string = 'act=delete_RF&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				if(data == 1){
													alert("Successfully Delete.");
													window.location.reload();
													}else{
														alert("Error Occur...");
													}
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}																	
				
			   						
function addCDuty()
{
	
	 var DS_STATION_NAME=document.getElementById("DS_STATION_NAME").value;
	 var DS_REASON=document.getElementById("DS_REASON").value;
	 

	 if(DS_STATION_NAME == "" || DS_REASON == "" ){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_DStat&DS_STATION_NAME='+DS_STATION_NAME+'&DS_REASON='+DS_REASON;
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		} 
}


function deleteCDuty(id){
	
	if(id != ""){		
			 var string = 'act=delete_DStat&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				if(data == 1){
					alert("Successfully Delete.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}																	
				
	
			   						
function addBRel()
{
	
	 var BR_ENAME=document.getElementById("BR_ENAME").value;
	 var BR_DESG_NAME=document.getElementById("BR_DESG_NAME").value;
	 var BR_RELATION=document.getElementById("BR_RELATION").value;
	 var BR_DEPARTMENT=document.getElementById("BR_DEPARTMENT").value;
	 var BR_B_LOCATION=document.getElementById("BR_B_LOCATION").value;

	 if(BR_ENAME == "" || BR_DESG_NAME == "" || BR_RELATION == "" || BR_DEPARTMENT == "" || BR_B_LOCATION == ""){
			alert("Please fill all the required Fields!");
		}else{
		
		 var string = 'act=add_BRel&BR_ENAME='+BR_ENAME+'&BR_DESG_NAME='+BR_DESG_NAME+
		 '&BR_RELATION='+BR_RELATION+'&BR_DEPARTMENT='+BR_DEPARTMENT+'&BR_B_LOCATION='+BR_B_LOCATION;
					//alert(string);
				 $.ajax({  url: "edit_exe.php",
				data: string,
				type: "POST",
				success:function(data){
					if(data == 1){
					alert("Successfully Saved.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
				 }
				});  
		} 
}


function deleteBRel(id){
	
	if(id != ""){		
			 var string = 'act=delete_BRel&id='+id;
			$.ajax({  url: "edit_exe.php",
			data: string,
			type: "POST",
			success:function(data){
				
				if(data == 1){
					alert("Successfully Delete.");
					window.location.reload();
					}else{
						alert("Error Occur...");
					}
			 }
			});  
}else{
	alert("Please Fill the Required Fields!");
}
}																	
				
									

function showBtnsNext(idsVal,gybId){
	//EDU_LEVEL_ID,EDU_FIELD_ID,PASS_YEAR,INSTITUTE,GPA_GRADE 
	//var val = document.getElementById(EDU_LEVEL_ID).value;
//inputtx.value.length
	var hideDiv = false;	
	var res = idsVal.split(",");
	for (i = 0; i < res.length; i++) { 		  
		  if(document.getElementById(res[i]).value.length > 0){
			  hideDiv = true;
		  }	  
		}
	
	if(hideDiv){
		document.getElementById(gybId).style.display = 'none';
	}else{
		document.getElementById(gybId).style.display = 'inline';
	}
	
	
}										
							
								
								</SCRIPT>
						

<style>
.span6{
	width:90%;
	margin:auto;
}
</style>

<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div style="">
		<h4><?php echo "Welcome ".$_SESSION["E_NAME"]; ?></h4>
					<div class="tabbable">
							<ul class="nav nav-tabs">
								
								<li class=""><a href="dashboard.php">View Profile</a></li>
								<li class="active"><a href="dashboard2.php" >Edit Profile</a></li>
								<li><a href="dashboard3.php">Application Status</a></li>
								<li class=""><a href="dashboard4.php">Job Apply</a></li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="one">
	

										<?php

										
$data = array(
	'sess_row_id' => $sess_row_id
);		 
$json_enc_data = json_encode($data);		
$get_active_jobs = api_getdata_json_post("viewProfile1026",$json_enc_data);				
$result = json_decode($get_active_jobs);
$row_count = count($result->E_CNIC);				
if($row_count == 1 ){
	 
$ROW_ID =  $result->ROW_ID[0];
$E_CNIC = $result->E_CNIC[0];
$E_NAME = $result->E_NAME[0];
$E_MOBILE = $result->E_MOBILE[0];
$E_EMAIL = $result->E_EMAIL[0];
$E_IMAGE = $result->E_IMAGE[0];
$STATUS = $result->STATUS[0];
$ENTRY_DATE = $result->ENTRY_DATE[0];
$E_FNAME = $result->E_FNAME[0];
$E_RELIGION_ID = $result->E_RELIGION_ID[0];
$E_SECT_ID = $result->E_SECT_ID[0];
$E_CAST_ID = $result->E_CAST_ID[0];
$E_DOM_DIST_ID = $result->E_DOM_DIST_ID[0];
$E_DOM_TEHSIL_ID = $result->E_DOM_TEHSIL_ID[0];
$E_GENDER_ID = $result->E_GENDER_ID[0];
$E_DOB = $result->E_DOB[0];
$E_MERITAL_STATUS_ID = $result->E_MERITAL_STATUS_ID[0];
$E_PERM_ADDRESS = $result->E_PERM_ADDRESS[0];
$E_PERM_DIST_ID = $result->E_PERM_DIST_ID[0];
$E_PERM_TEHS_ID = $result->E_PERM_TEHS_ID[0];
$E_PRES_ADDRESS = $result->E_PRES_ADDRESS[0];
$E_PRES_DIST_ID = $result->E_PRES_DIST_ID[0];
$E_PRES_TEHS_ID = $result->E_PRES_TEHS_ID[0];
$E_PHONE_NO = $result->E_PHONE_NO[0];
$HAVE_DISEASE = $result->HAVE_DISEASE[0];
$HAVE_DISABILITY = $result->HAVE_DISABILITY[0];
$HAVE_TERMINATED = $result->HAVE_TERMINATED[0];
$HAVE_PUNISHED_C = $result->HAVE_PUNISHED_C[0];
$HAVE_PUNISHED_PAF = $result->HAVE_PUNISHED_PAF[0];
$HAVE_DESERTED = $result->HAVE_DESERTED[0];
$WILLING_ANYWHERE_P = $result->WILLING_ANYWHERE_P[0];
$IS_FINALIZE = $result->IS_FINALIZE[0];
$CIV_EX = $result->CIV_EX[0];
				
					if($IS_FINALIZE == "1"){
						echo "You have successfully finalize info & can't edit....";
					}else{					
	
											
											?>


	

<?php if(empty($vis_id) || $vis_id == "1"){ ?>								

										

											<div class="span6" style="width:90%;" >
									<p style="border:1px solid #F00;">
										<strong style="padding-left:10px;"> Profile/Personal Details</strong>
									</p>
							
									<table border="0">								
												<tr>
													<th align="left">CNIC</th> 
													<th align="left">:</th> 
													<td><div style=" border-radius:3px; border:1px solid #cccccc; height:20px; width:248px; padding:5px;"><?php echo $E_CNIC; ?></div></td>
												</tr>
												
												<tr>
													<th align="left">NAME
													
													</th>
													<th align="left">:</th>
													<td ><input type="text" name="txt_name" id="txt_name" style="width:260px;" value="<?php echo $E_NAME; ?>" /></td>
													
												</tr>  
												
												<tr>
													<th align="left">Father Name</th>
													<th align="left">:</th>
													<td ><input type="text" name="txt_fname" id="txt_fname" style="width:260px;" value="<?php echo $E_FNAME; ?>" /></td>
												</tr>
												
												<tr>
													<th align="left">Gender</th>
													<th align="left">:</th>
													<td >
													
														<select style="width:260px; color:#333;" name="txt_gender" id="txt_gender" >
														<option value="">Choose Gender...</option>
														<?php
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1027",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->GENDER_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$gen_id= $result2->GENDER_ID[$ii];	
														$gen_name=$result2->GENDER_NAME[$ii];	
														 ?>
														
														<option value="<?php echo $gen_id; ?>" <?php if($gen_id==$E_GENDER_ID) echo "Selected"; ?>><?php echo $gen_name; ?></option>
														<?php
														}
															}														
														?>	
															
														</select>
													</td>
												</tr>
												
												<tr>
													<th align="left">Date of Birth</th>
													<th align="left">:</th>
													<td ><input type="date" name="txt_DOB" id="txt_DOB" style="width:245px;" value="<?php echo $E_DOB; ?>" /></td>
												</tr>
												
												<tr>
													<th align="left">Religion</th>
													<th align="left">:</th>
													<td >
													
													
													
													<select style="width:260px; color:#333;" name="txt_religion" id="txt_religion">
													
													<option value="">Choose Religion...</option>
														<?php
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1028",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->RLG_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$RLG_ID= $result2->RLG_ID[$ii];	
														$RLG_NAME=$result2->RLG_NAME[$ii];	
														
														 ?>
														
														<option value="<?php echo $RLG_ID; ?>" <?php if($RLG_ID==$E_RELIGION_ID) echo "Selected"; ?>><?php echo $RLG_NAME; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												<tr>
													<th align="left">Sect</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;"  name="txt_sect" id="txt_sect">
													<option value="">Choose Sect...</option>
														<?php
														
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1029",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->SECT_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$SECT_ID= $result2->SECT_ID[$ii];	
														$SECT_NAME=$result2->SECT_NAME[$ii];	
														
														 ?>
														
														<option value="<?php echo $SECT_ID; ?>" <?php if($SECT_ID==$E_SECT_ID) echo "Selected"; ?>><?php echo $SECT_NAME; ?></option>
														<?php
														}	
															}
														?>	
														</select></td>
												</tr>
												
												<tr>
													<th align="left">Caste</th>
													<th align="left">:</th>
													<td >
													<input type="text" name="txt_caste" id="txt_caste" style="width:260px;" value="<?php echo $E_CAST_ID; ?>" />
													</td>
												</tr>
												
												<tr>
													<th align="left">Marital Status</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;" name="txt_martial" id="txt_martial">
													<option value="">Choose status...</option>
														<?php
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1030",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->MRS_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$MRS_ID= $result2->MRS_ID[$ii];
														$MRS_NAME= $result2->MRS_NAME[$ii];
														
														 ?>
														
														<option value="<?php echo $MRS_ID; ?>" <?php if($MRS_ID==$E_MERITAL_STATUS_ID) echo "Selected"; ?>><?php echo $MRS_NAME; ?></option>
														<?php
														}	
															}
														?>	
													
													</select></td>
												</tr>
												
												<tr>
													<th align="left">Civilian / Ex-Svcman</th>
													<th align="left">:</th>
													<td >
															<select style="width:260px; color:#333;" name="txt_civ_ex" id="txt_civ_ex">
																<option value="">Choose...</option>
																	<option value="CIV" <?php if($CIV_EX=="CIV") echo "Selected"; ?>>Civilian</option>
																	<option value="EX" <?php if($CIV_EX=="EX") echo "Selected"; ?>>Ex-Svcman (Army, Navey, PAF...)</option>
															</select>
													</td>
												</tr>
												
												
												<tr>
													<td colspan="2" align="left"></td>
													<th colspan="1" align="left"><input type="button" name="btn_save" style="width:260px;" value="Save Result" onclick="updateProfile();" /></th>
													
												</tr>
												<?php 
											/* 	$filename = $E_IMAGE;
												$filemtime = filemtime($filename);
 */
												//echo "<img src='".$filename."?".$filemtime."'>";
												?>
												<!--
												<tr style="border:1px solid #000;">
													<td  align="left" style=" padding-top:20px;">
														<img src="images_profile/<?PHP ECHO $E_IMAGE.'?timestamp=1357571065'; ?>" class="img-round"  width="100"/>
														<img id="output_image" style="width:100px;"/>
													</td> 
													<td colspan="2" align="left">

														<form method="POST" enctype="multipart/form-data" >
														
															<input type="file" name="f_prof_image" id="prof_image"  accept="image/*" onchange="loadFile(event)" style=""  required />
															<input type="submit" name="btn_save_img" value="Save Image" style="width:90px; padding:0px; height:25px; " />
														
														</form>
													</td>
													
												</tr>
												-->
												
												
												
												
												
										
										
									</table>
									
									<?php echo $vis_id_btns; ?>
									
									
								</div>
								
								
								
								
<?php }else if( $vis_id == "2"){ ?>									
								
								<div class="span6"  style="width:90%;">
									<p style="border:1px solid #F00;">
										<strong style="padding-left:10px;"> Address Details</strong>
									</p>
									<table>
									
												
												<tr>
													<th align="left">Email</th>
													<th align="left">:</th>
													<td><input type="email" name="E_EMAIL" id="E_EMAIL" style="width:245px;" value="<?php echo $E_EMAIL; ?>" /></td>
												</tr>
												
												<tr>
													<th align="left">Mobile</th>
													<th align="left">:</th>
													<td><input type="text" name="E_MOBILE" id="E_MOBILE" style="width:260px;" value="<?php echo $E_MOBILE; ?>" /></td>
													
												</tr>
												
												<tr>
													<th align="left">Phone</th>
													<th align="left">:</th>
													<td><input type="text" name="E_PHONE_NO" id="E_PHONE_NO" style="width:260px;" value="<?php echo $E_PHONE_NO; ?>" /></td>
													
												</tr>
												
												
												<tr>
													<th align="left">Domicile District</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;" name="E_DOM_DIST_ID" id="E_DOM_DIST_ID">
													<option value="">Choose Distt...</option>
													<?php
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1031",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->DISTRICT_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$DIS_ID= $result2->DISTRICT_ID[$ii];
														$DIS_TITLE= $result2->DISTRICT_NAME[$ii];
														
														
														 ?>
														
														<option value="<?php echo $DIS_ID; ?>" <?php if($DIS_ID==$E_DOM_DIST_ID) echo "Selected"; ?>><?php echo $DIS_TITLE; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												
												
												
												<tr>
													<th align="left">Permanent Address</th>
													<th align="left">:</th>
													<td ><textarea style="width:260px; height:80px;" name="E_PERM_ADDRESS" id="E_PERM_ADDRESS"><?php echo $E_PERM_ADDRESS; ?></textarea></td>
												</tr>
												
												<tr>
													<th align="left">District</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;"  name="E_PERM_DIST_ID" id="E_PERM_DIST_ID">
													<option value="">Choose District...</option>
													<?php
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1032",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->DISTRICT_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$DIS_ID= $result2->DISTRICT_ID[$ii];
														$DIS_TITLE= $result2->DISTRICT_NAME[$ii];
																												
														 ?>
														
														<option value="<?php echo $DIS_ID; ?>" <?php if($DIS_ID==$E_PERM_DIST_ID) echo "Selected"; ?>><?php echo $DIS_TITLE; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												<tr>
													<th align="left">Tehsil</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;" name="E_PERM_TEHS_ID" id="E_PERM_TEHS_ID">
													<option value="">Choose Tehsil...</option>
													<?php
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1033",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->TEHSIL_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$TEHSIL_ID= $result2->TEHSIL_ID[$ii];
														$TEHSIL_NAME= $result2->TEHSIL_NAME[$ii];
														
														 ?>
														
														<option value="<?php echo $TEHSIL_ID; ?>" <?php if($TEHSIL_ID==$E_PERM_TEHS_ID) echo "Selected"; ?>><?php echo $TEHSIL_NAME; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												<tr>
													<th align="left">Present/Postal Address</th>
													<th align="left">:</th>
													<td ><textarea style="width:260px; height:80px;" name="E_PRES_ADDRESS" id="E_PRES_ADDRESS"><?php echo $E_PRES_ADDRESS; ?></textarea></td>
												</tr>
												
												<tr>
													<th align="left">District</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;" name="E_PRES_DIST_ID" id="E_PRES_DIST_ID">
													<option value="">Choose District...</option>
													<?php
													$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1032",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->DISTRICT_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$DIS_ID= $result2->DISTRICT_ID[$ii];
														$DIS_TITLE= $result2->DISTRICT_NAME[$ii];
													
														
														 ?>
														
														<option value="<?php echo $DIS_ID; ?>" <?php if($DIS_ID==$E_PRES_DIST_ID) echo "Selected"; ?>><?php echo $DIS_TITLE; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												<tr>
													<th align="left">Tehsil</th>
													<th align="left">:</th>
													<td ><select style="width:260px; color:#333;" name="E_PRES_TEHS_ID" id="E_PRES_TEHS_ID">
													<option value="">Choose Tehsil...</option>
													<?php
														
														$data2 = array(
															'sess_row_id' => $sess_row_id
															);		 
															$json_enc_data2 = json_encode($data2);		
															$get_active_jobs2 = api_getdata_json_post("viewProfile1033",$json_enc_data2);				
															$result2 = json_decode($get_active_jobs2);

															$row_count2 = 0;									 									 
															if(!empty($result2 && $result2 != "404")){
															$row_count2 =  count($result2->TEHSIL_ID); 
															}

															if($row_count2 > 0 ){
															for($ii=0; $ii < $row_count2; $ii++){
															
														$TEHSIL_ID= $result2->TEHSIL_ID[$ii];
														$TEHSIL_NAME= $result2->TEHSIL_NAME[$ii];
														 ?>
														
														<option value="<?php echo $TEHSIL_ID; ?>" <?php if($TEHSIL_ID==$E_PRES_TEHS_ID) echo "Selected"; ?>><?php echo $TEHSIL_NAME; ?></option>
														<?php
														}	
															}
														?>	
													</select></td>
												</tr>
												
												<tr>
													<th align="left"></th>
													<th align="left"></th>
													<td align="left"><input type="button" name="btn_save_p_info" id="btn_save_p_info" style="width:260px;" value="Save Result" OnClick="updateAddress();" /></td>
												</tr>
												
												
									</table>
									
									<?php echo $vis_id_btns; ?>
									
								</div>
								
<?php }else if( $vis_id == "3"){ ?>								
								
								
								
								<div class="span6"  style="width:90%;">
									<p style="border:1px solid #F00;">
										<strong style="padding-left:10px;"> Academic Background</strong>
									</p>
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											<th>Level</th>
											<th>Degree Held</th>
											
											<th>Field</th>
											<th>Year</th>
											<th>Institute/Board</th>
											<th>Division/CGPA/Percentage</th>
											<td></td>
										</tr>
										
										
										<?php

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1034",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
$ROW_ID= $result2->ROW_ID[$ii];	
$EID= $result2->EID[$ii];	
$PASS_YEAR= $result2->PASS_YEAR[$ii];	
$GPA_GRADE= $result2->GPA_GRADE[$ii];	
$INSTITUTE= $result2->INSTITUTE[$ii];	
$ATTACHMENT= $result2->ATTACHMENT[$ii];	
$TOTAL_YEARS= $result2->TOTAL_YEARS[$ii];	
$LEVEL_DETAILS= $result2->LEVEL_DETAILS[$ii];	
$FIELD_NAME= $result2->FIELD_NAME[$ii];	
											
											?>
										<tr>
										<td><?php echo $TOTAL_YEARS; ?> Year</td>
											<td><?php echo $LEVEL_DETAILS; ?></td>
											
											<td><?php echo $FIELD_NAME; ?></td>
											<td><?php echo $PASS_YEAR; ?></td>
											<td><?php echo $INSTITUTE; ?></td>
											<td><?php echo $GPA_GRADE; ?></td>
											
											<td><a href="#" onclick="deleteEducation(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td>
										</tr>	
											
											
										<?php 	
										}
															}
										
										?>
										
										
										<tr>
										
										
										
										
											<td colspan="2">
													<select style="width:150px;" name="EDU_LEVEL_ID" id="EDU_LEVEL_ID" onchange="showBtnsNext('EDU_LEVEL_ID,EDU_FIELD_ID,PASS_YEAR,INSTITUTE,GPA_GRADE','gybShowDivButton');" >
														<option value="">Degree Held...</option>
															<?php
																
																		$data2 = array(
																		'sess_row_id' => $sess_row_id
																		);		 
																		$json_enc_data2 = json_encode($data2);		
																		$get_active_jobs2 = api_getdata_json_post("viewProfile1035",$json_enc_data2);				
																		$result2 = json_decode($get_active_jobs2);

																		$row_count2 = 0;									 									 
																		if(!empty($result2 && $result2 != "404")){
																		$row_count2 =  count($result2->LEVEL_ID); 
																		}

																		if($row_count2 > 0 ){
																		for($ii=0; $ii < $row_count2; $ii++){
																		
																$LEVEL_ID= $result2->LEVEL_ID[$ii];	
																$DEGREE_FULL= $result2->DEGREE_FULL[$ii];	
																
																
																 ?>
																
																<option value="<?php echo $LEVEL_ID; ?>" ><?php echo $DEGREE_FULL; ?></option>
																<?php
																}	
																		}
																?>	
													</select>
											</td>
											<td>
												<select style="width:90px; " name="EDU_FIELD_ID" id="EDU_FIELD_ID" onchange="showBtnsNext('EDU_LEVEL_ID,EDU_FIELD_ID,PASS_YEAR,INSTITUTE,GPA_GRADE','gybShowDivButton');" >
														<option value="">Field...</option>
																<?php
																	
																		$data2 = array(
																		'sess_row_id' => $sess_row_id
																		);		 
																		$json_enc_data2 = json_encode($data2);		
																		$get_active_jobs2 = api_getdata_json_post("viewProfile1036",$json_enc_data2);				
																		$result2 = json_decode($get_active_jobs2);

																		$row_count2 = 0;									 									 
																		if(!empty($result2 && $result2 != "404")){
																		$row_count2 =  count($result2->FIELD_ID); 
																		}

																		if($row_count2 > 0 ){
																		for($ii=0; $ii < $row_count2; $ii++){
																		
																$FIELD_ID= $result2->FIELD_ID[$ii];	
																$FIELD_NAME= $result2->FIELD_NAME[$ii];
																
																	
																	 ?>
																	
																	<option value="<?php echo $FIELD_ID; ?>"><?php echo $FIELD_NAME; ?></option>
																	<?php
																	}	
																		}
																	?>	
												
												</select>
												
											</td>
											<td>
											
											
											<select style="width:90px; " name="PASS_YEAR" id="PASS_YEAR"  onchange="showBtnsNext('EDU_LEVEL_ID,EDU_FIELD_ID,PASS_YEAR,INSTITUTE,GPA_GRADE','gybShowDivButton');">
														<option value="">Year...</option>
																<?php
																	
																	for($y=date("Y"); $y >= (date("Y")-50);$y--)
																	{
																	
																	 ?>
																	
																	<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
																	<?php
																	}	
																	?>	
												
											</select>
											
											</td>
											
											
											<td>
													<input type="text" style="width:250px;" name="INSTITUTE" id="INSTITUTE" placeholder="Institute" onblur="showBtnsNext('EDU_LEVEL_ID,EDU_FIELD_ID,PASS_YEAR,INSTITUTE,GPA_GRADE','gybShowDivButton');" />
												
											</td>
											<td><input type="text" style="width:80px;" name="GPA_GRADE" id="GPA_GRADE" placeholder="Grade" /></td>
											
											<td ><a href="#" onclick="updateEducation();" class="btn btn-info"><strong style=" font-size:18px;"> Save </strong></a></td>
										</tr>
									</table>
									
									
									
									<?php echo $vis_id_btns; ?>
									
								</div>
								
<?php }else if( $vis_id == "4"){ ?>															
								
								<div class="span6" >
									<p style="border:1px solid #F00;">
										<strong style="padding-left:10px;"> Professional Certification/Course/Diploma</strong>
									</p>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											
											<th>Course/Diploma</th>
											<th>Field</th>
											<th>Institute</th>
											<th>Duration</th>
											<th>Result</th>
											<td></td>
										</tr>
										
								<?php										
	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1037",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];	
			$EID= $result2->EID[$ii];	
			$COURCE_TITLE= $result2->COURCE_TITLE[$ii];	
			$COURCE_FIELD= $result2->COURCE_FIELD[$ii];	
			$INSTITUTE= $result2->INSTITUTE[$ii];	
			$DURATION_FROM= $result2->DURATION_FROM[$ii];	
			$DURATION_TO= $result2->DURATION_TO[$ii];	
			$RESULT= $result2->RESULT[$ii];	
			$ATTACHMENT= $result2->ATTACHMENT[$ii];	
			$FULL_DURATION= $result2->FULL_DURATION[$ii];	
										
										
									?>										
										<tr>
											<td><?php echo $COURCE_TITLE; ?></td> 
											<td><?php echo $COURCE_FIELD; ?></td> 
											<td><?php echo $INSTITUTE; ?></td> 
											<td><?php echo $FULL_DURATION; ?></td> 
											<td><?php echo $RESULT; ?></td> 
											<td><a href="#" onclick="deleteProfQual(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td> 
										</tr>	
											
											
										<?php 	
										}
								}
										
										?>
										
										
										<tr>
											<td><input type="text" style="width:130px;" name="PQ_COURCE_TITLE" id="PQ_COURCE_TITLE" onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" placeholder="Cource Title..." /></td>
											<td><input type="text" style="width:80px;"  name="PQ_COURCE_FIELD" id="PQ_COURCE_FIELD" onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" placeholder="Field..." /></td>
											<td><input type="text" style="width:80px;"  name="PQ_INSTITUTE" id="PQ_INSTITUTE" onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" placeholder="Institute..." /></td>
											<td>
												<input type="date" style="width:120px;" name="PQ_DURATION_FROM" id="PQ_DURATION_FROM"  onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" />
												<input type="date" style="width:120px;" name="PQ_DURATION_TO" id="PQ_DURATION_TO" onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" />
											</td>
											<td><input type="text" style="width:80px;"  name="PQ_RESULT" id="PQ_RESULT" onblur="showBtnsNext('PQ_COURCE_TITLE,PQ_COURCE_FIELD,PQ_INSTITUTE,PQ_DURATION_FROM,PQ_DURATION_TO,PQ_RESULT','gybShowDivButton');" placeholder="Result..." /></td>
											
											<td><a href="#" onclick="addProfQual();" class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
									</table>
									<?php echo $vis_id_btns; ?>
								</div>

								
<?php }else if( $vis_id == "5"){ ?>								
								<div class="span6" style="padding-top:20px;" >
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"> Awards / Achievements</strong>
									</p>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											
											<th>Details</th>
											<td></td>
										</tr>
										
								<?php										

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1038",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];	
			$EID= $result2->EID[$ii];	
			$AWARD_DETAILS= $result2->AWARD_DETAILS[$ii];	
										
																					
									?>										
										<tr>
											<td><?php echo $AWARD_DETAILS; ?></td> 
											<td style="text-align:center;"><a href="#" onclick="deleteAward(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td> 
										</tr>	
										<?php 	
										}
		}
										?>
										<tr>
											<td><input type="text" style="" name="AW_AWARD_DETAILS" id="AW_AWARD_DETAILS" onblur="showBtnsNext('AW_AWARD_DETAILS','gybShowDivButton');" placeholder="Award Details..." maxlength="200" /></td>
											<td style="text-align:center;"><a href="#" onclick="addAwards();" class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
									</table>
									<?php echo $vis_id_btns; ?>
								</div>
								
<?php }else if( $vis_id == "6"){ ?>								
								
								<div class="span6" style="padding-top:20px;" >
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"> Interests / Hobbies</strong>
									</p>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											
											<th>Details</th>
											<td></td>
										</tr>
										
								<?php										

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1039",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];
			$EID= $result2->EID[$ii];
			$HOBBY_DETAILS= $result2->HOBBY_DETAILS[$ii];
												
																					
									?>										
										<tr>
											<td><?php echo $HOBBY_DETAILS; ?></td> 
											<td style="text-align:center;"><a href="#" onclick="deleteHobby(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td> 
										</tr>	
										<?php 	
										}
		}
										
										?>
										<tr>
											<td><input type="text" style="" name="HB_HOBBY_DETAILS" id="HB_HOBBY_DETAILS" onblur="showBtnsNext('HB_HOBBY_DETAILS','gybShowDivButton');"  placeholder="Hobby Details..." maxlength="200" /></td>
											<td style="text-align:center;"><a href="#" onclick="addHobby();" class="btn btn-info"><strong style="font-size:18px;">Save</strong></a></td>
										</tr>
									</table>
									
									<?php echo $vis_id_btns; ?>
									
								</div>
								
<?php }else if( $vis_id == "7"){ ?>							
							
								<div class="span6" style="padding-top:20px;" >
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"> Employment History</strong>
									</p>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											
											<th>Organization</th>
											<th>Position</th>
											<th>Period</th>
											<th>Pay</th>
											<th>Reason of Leaving</th>
											<td></td>
										</tr>
										
								<?php										

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1040",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
$ROW_ID= $result2->ROW_ID[$ii];	
$EID= $result2->EID[$ii];	
$ORGANIZATION_NAME= $result2->ORGANIZATION_NAME[$ii];	
$POSITION_NAME= $result2->POSITION_NAME[$ii];	
$FROM_DATE= $result2->FROM_DATE[$ii];	
$DATE_TO= $result2->DATE_TO[$ii];	
$LAST_PAY= $result2->LAST_PAY[$ii];	
$LEAVE_REASON= $result2->LEAVE_REASON[$ii];	
$FULL_DATES= $result2->FULL_DATES[$ii];	
$ATTACHMENT= $result2->ATTACHMENT[$ii];	
										
										
									?>										
										<tr>
											<td><?php echo $ORGANIZATION_NAME; ?></td> 
											<td><?php echo $POSITION_NAME; ?></td> 
											<td><?php echo $FULL_DATES; ?></td> 
											<td><?php echo $LAST_PAY; ?></td> 
											<td><?php echo $LEAVE_REASON; ?></td> 
											<td><a href="#" onclick="deleteEmpHist(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td> 
										</tr>	
											
											
										<?php 	
										}
		}
										?>
										
										<tr>
											<td><input type="text" style="width:130px;" name="EH_ORGANIZATION_NAME" id="EH_ORGANIZATION_NAME" onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');" placeholder="Org Name..." /></td>
											<td><input type="text" style="width:80px;"  name="EH_POSITION_NAME" id="EH_POSITION_NAME" onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');" placeholder="Position..." /></td>
											<td> 
												<input type="date" style="width:120px;" name="EH_FROM_DATE" id="EH_FROM_DATE"  onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');"/>
												<input type="date" style="width:120px;" name="EH_DATE_TO" id="EH_DATE_TO" onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');" />
											</td>
											<td><input type="text" style="width:80px;"  name="EH_LAST_PAY" id="EH_LAST_PAY" onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');" placeholder="Last Pay..." /></td>
											<td><input type="text" style="width:80px;"  name="EH_LEAVE_REASON" id="EH_LEAVE_REASON" onblur="showBtnsNext('EH_ORGANIZATION_NAME,EH_POSITION_NAME,EH_FROM_DATE,EH_DATE_TO,EH_LAST_PAY,EH_LEAVE_REASON','gybShowDivButton');" placeholder="Leave Reason..." /></td>
											<td><a href="#" onclick="addEmpHist();" class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
									</table>
									<?php echo $vis_id_btns; ?>
								</div>
								
								
<?php }else if( $vis_id == "8"){ ?>		

<div class="span6" style="padding-top:20px;" >
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"> Military Service Record (For Ex Serviceman Only)</strong>
									</p>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
										<tr>
											
											<th>Army No, Rank</th>
											<th>Army/PAF/Navy</th>
											<th>Corps/Regt</th>
											<th>Date of Enrol</th>
											<th>Date of Discharge</th>
											<th>Reason of Discharge</th>
											<th>Medical Cat</th>
											<td></td>
										</tr>
										
								<?php										

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1041",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
$MIL_ROW_ID= $result2->ROW_ID[$ii];	
$MIL_EID= $result2->EID[$ii];	
$MIL_ARMY_NO_RANK= $result2->ARMY_NO_RANK[$ii];	
$AMIL_RMY_PAF_NAVY= $result2->ARMY_PAF_NAVY[$ii];	
$MIL_CORPS_REGT= $result2->CORPS_REGT[$ii];	
$MIL_ENROLL_DATE= $result2->ENROLL_DATE[$ii];	
$MIL_DISCHARGE_DATE= $result2->DISCHARGE_DATE[$ii];	
$MIL_DISCHARGE_REASON= $result2->DISCHARGE_REASON[$ii];	
$MIL_MEDICAL_CAT= $result2->MEDICAL_CAT[$ii];
												
											
										
										
									?>										
										<tr>
											<td><?php echo $MIL_ARMY_NO_RANK; ?></td> 
											<td><?php echo $AMIL_RMY_PAF_NAVY; ?></td> 
											<td><?php echo $MIL_CORPS_REGT; ?></td> 
											<td><?php echo $MIL_ENROLL_DATE; ?></td> 
											<td><?php echo $MIL_DISCHARGE_DATE; ?></td> 
											
											<td><?php echo $MIL_DISCHARGE_REASON; ?></td> 
											<td><?php echo $MIL_MEDICAL_CAT; ?></td> 
											
											<td><a href="#" onclick="deleteMilitary(<?php echo $MIL_ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td> 
										</tr>	
											
											
										<?php 	
										}
		}
										// MIL_ARMY_NO_RANK AMIL_RMY_PAF_NAVY  MIL_CORPS_REGT  MIL_ENROLL_DATE  MIL_DISCHARGE_DATE  MIL_DISCHARGE_REASON  MIL_MEDICAL_CAT  addMilitarySvc
										?>
										
									
										<tr>
											<td><input type="text" style="width:130px;" name="MIL_ARMY_NO_RANK" id="MIL_ARMY_NO_RANK" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="text" style="width:130px;" name="AMIL_RMY_PAF_NAVY" id="AMIL_RMY_PAF_NAVY" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="text" style="width:130px;" name="MIL_CORPS_REGT" id="MIL_CORPS_REGT" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="date" style="width:130px;" name="MIL_ENROLL_DATE" id="MIL_ENROLL_DATE" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="date" style="width:130px;" name="MIL_DISCHARGE_DATE" id="MIL_DISCHARGE_DATE" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="text" style="width:130px;" name="MIL_DISCHARGE_REASON" id="MIL_DISCHARGE_REASON" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											<td><input type="text" style="width:130px;" name="MIL_MEDICAL_CAT" id="MIL_MEDICAL_CAT" onblur="showBtnsNext('MIL_ARMY_NO_RANK,AMIL_RMY_PAF_NAVY,MIL_CORPS_REGT,MIL_ENROLL_DATE,MIL_DISCHARGE_DATE,MIL_DISCHARGE_REASON','gybShowDivButton');" placeholder="Enter Details..." /></td>
											
											<td><a href="#" onclick="addMilitarySvc();" class="btn btn-info"><strong style="color:#0F0; font-size:18px;">Save</strong></a></td>
										</tr>
										
										
										</table>
	<?php echo $vis_id_btns; ?>
</div>
					
<?php }else if( $vis_id == "9"){ ?>							
					
								
								<div class="span7" style="padding-top:20px;" >
								
								
									
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"><u> MEDICAL ALIMENT/ HISTORY/ DISABILITY</u></strong>
									</p>
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									<tr>
									<td>a.Do you have any infection disease such as AIDS,HIV,Hepatitis,TB?
									<input type="radio" name="ME_HAVE_DISEASE" value="1" onchange="fun_me_have_disease(1)" style="width:40px;height:20px;" <?php if($HAVE_DISEASE == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_DISEASE" value="2" onchange="fun_me_have_disease(2)"  style="width:40px; height:20px;" <?php if($HAVE_DISEASE == "2")echo "checked"; ?> />NO
									</td></tr>
									<tr><td>b.Do you have any disability?
									<input type="radio" name="ME_HAVE_DISABILITTY" value="1" onchange="fun_me_have_diability(1)" style="width:40px;height:20px;" <?php if($HAVE_DISABILITY == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_DISABILITTY" value="2" onchange="fun_me_have_diability(2)"  style="width:40px; height:20px;" <?php if($HAVE_DISABILITY == "2")echo "checked"; ?> />NO
									</td></tr>
									
									</table>
									
									
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"><u> DISCIPLINE</u></strong>
									</p>
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									<tr>
									<td>a.Have you ever been terminated from any service? 
									<input type="radio" name="ME_HAVE_TERMINATED" value="1" onchange="fun_me_have_terminated(1)" style="width:40px;height:20px;" <?php if($HAVE_TERMINATED == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_TERMINATED" value="2" onchange="fun_me_have_terminated(2)"  style="width:40px; height:20px;" <?php if($HAVE_TERMINATED == "2")echo "checked"; ?> />NO
									</td></tr>
									<tr><td>b.Have you ever been punished by the Court of Law?
									<input type="radio" name="ME_HAVE_PUNISHED_C" value="1" onchange="fun_me_have_punish_c(1)" style="width:40px;height:20px;" <?php if($HAVE_PUNISHED_C == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_PUNISHED_C" value="2" onchange="fun_me_have_punish_c(2)"  style="width:40px; height:20px;" <?php if($HAVE_PUNISHED_C == "2")echo "checked"; ?> />NO
									</td></tr>
									<tr><td>c.Have you ever been punished by the Pakistan Armed Forces Act?
									<input type="radio" name="ME_HAVE_PUNISHED_PAF" value="1" onchange="fun_me_have_punish_paf(1)" style="width:40px;height:20px;" <?php if($HAVE_PUNISHED_PAF == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_PUNISHED_PAF" value="2" onchange="fun_me_have_punish_paf(2)"  style="width:40px; height:20px;" <?php if($HAVE_PUNISHED_PAF == "2")echo "checked"; ?> />NO
									</td></tr>
									<tr><td>d.Have you ever deserted from Pakistan Armed Forces?
									<input type="radio" name="ME_HAVE_DESERTED" value="1" onchange="fun_me_have_deserted(1)" style="width:40px;height:20px;" <?php if($HAVE_DESERTED == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_HAVE_DESERTED" value="2" onchange="fun_me_have_deserted(2)"  style="width:40px; height:20px;" <?php if($HAVE_DESERTED == "2")echo "checked"; ?> />NO
									</td></tr>
									
									</table>
									
											
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"><u> CHOICE OF DUTY STATIONS</u></strong>
									</p>
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									<tr>
									        <th>Station Name</th>
											<th>Reason</th>
											<th>Edit</th>
									</tr>
									<?php

	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1042",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];	
			$STATION_NAME= $result2->STATION_NAME[$ii];	
			$REASON= $result2->REASON[$ii];	
								
									?>
									
										<tr>
											
											<td><?php echo $STATION_NAME; ?></td> 
											<td><?php echo $REASON; ?></td> 
											<td style="text-align:center;"><a href="#" onclick="deleteCDuty(<?php echo $ROW_ID; ?>);" ><strong style="color:#F00;">X</strong></a></td>
										
										</tr>	
										<?php
										}	
		}										
										?>
										
										
										
										<tr> 
											<td><input type="text" style="width:104px;" name="DS_STATION_NAME" id="DS_STATION_NAME" placeholder="Name..." /></td>
											<td><input type="text" style="width:104px;" name="DS_REASON" id="DS_REASON" placeholder="Reason..." /></td>
											<td style="text-align:center;"><a href="#" onclick="addCDuty();" class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
										
									<tr><td colspan="3">Are you willing for employment anywhere in Pakistan?
									<input type="radio" name="ME_WILLING_ANYWHERE_P" value="1" onchange="fun_me_have_willing_p(1)" style="width:40px;height:20px;" <?php if($WILLING_ANYWHERE_P == "1")echo "checked"; ?> />YES
									<input type="radio" name="ME_WILLING_ANYWHERE_P" value="2" onchange="fun_me_have_willing_p(2)"  style="width:40px; height:20px;" <?php if($WILLING_ANYWHERE_P == "2")echo "checked"; ?> />NO
									</td></tr>
									</table>
									
									
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"><u> REFERENCES</u></strong>
									</p>
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									<tr>
									

									<td colspan="5">Provide a list of two Academic/Professional references:</td></tr>
									
				
									<tr>
									        <th>Name</th>
											<th>Address</th>
											<th>Phone</th>
											<th>E-mail</th>
											<th>Edit</th>
											</tr>
											<tr>
									<?php
	$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1043",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];
			$ENAME= $result2->ENAME[$ii];
			$R_ADDRESS= $result2->R_ADDRESS[$ii];
			$R_PHONE= $result2->R_PHONE[$ii];
			$R_E_MAIL= $result2->R_E_MAIL[$ii];
						
									?>
									
									<tr>
											
											<td><?php echo $ENAME; ?></td> 
											<td><?php echo $R_ADDRESS; ?></td> 
											<td><?php echo $R_PHONE; ?></td> 
											<td><?php echo $R_E_MAIL; ?></td>  
										
										<td style="text-align:center;"><a href="#" onclick="deleteRF(<?php echo $ROW_ID; ?>);"><strong style="color:#F00;">X</strong></a></td>
										
										</tr>	
										<?php
										}	
		}										
										?>
										<tr> 
											<td><input type="text" style="width:104px;" name="RF_ENAME" id="RF_ENAME" placeholder="Name..." /></td>
											<td><input type="text" style="width:104px;" name="RF_R_ADDRESS" id="RF_R_ADDRESS" placeholder="Address..." /></td>
											<td><input type="text" style="width:104px;" name="RF_R_PHONE" id="RF_R_PHONE" placeholder="Phone..." /></td>
											
											<td><input type="text" style="width:80px;"  name="RF_R_E_MAIL" id="RF_R_E_MAIL" placeholder="E-Mail..." /></td>
											
										
											
											<td style="text-align:center;"><a href="#" onclick="addRF();"  class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
									</table>
									
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									
									
									<tr><td colspan="6" width="60">Do you have relative(s) in CSD:-</td>
									<tr>
									        <th>Name</th>
											<th>Designation</th>
											<th>Relationship</th>
											<th>Department</th>
											<th>Location</th>
											<th>Edit</th>
											</tr>
											</tr>
										
										
									<?php
		$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1044",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ROW_ID); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
		
			$ROW_ID= $result2->ROW_ID[$ii];
			$ENAME= $result2->ENAME[$ii];
			$DESG_NAME= $result2->DESG_NAME[$ii];
			$RELATION= $result2->RELATION[$ii];
			$DEPARTMENT= $result2->DEPARTMENT[$ii];
			$B_LOCATION= $result2->B_LOCATION[$ii];
											
									?>
									
										<tr>
											
											<td><?php echo $ENAME; ?></td> 
											<td><?php echo $DESG_NAME; ?></td> 
											<td><?php echo $RELATION; ?></td> 
											<td><?php echo $DEPARTMENT; ?></td>  
											<td><?php echo $B_LOCATION; ?></td>  
										
										<td style="text-align:center;"><a href="#" onclick="deleteBRel(<?php echo $ROW_ID; ?>);" ><strong style="color:#F00;">X</strong></a></td>
										
										</tr>	
										<?php
										}	
		}										
										?>
										
										<tr> 
											<td><input type="text" style="width:104px;" name="BR_ENAME" id="BR_ENAME" placeholder="Name..." /></td>
											<td><input type="text" style="width:104px;" name="BR_DESG_NAME" id="BR_DESG_NAME" placeholder="Designation..." /></td>
											<td><input type="text" style="width:104px;" name="BR_RELATION" id="BR_RELATION" placeholder="Relation..." /></td>
											
											<td><input type="text" style="width:80px;"  name="BR_DEPARTMENT" id="BR_DEPARTMENT" placeholder="Department..." /></td>
											<td><input type="text" style="width:80px;"  name="BR_B_LOCATION" id="BR_B_LOCATION" placeholder="Location..." /></td>
											
											<td style="text-align:center;"><a href="#" onclick="addBRel();"  class="btn btn-info"><strong style=" font-size:18px;">Save</strong></a></td>
										</tr>
										
										
	<tr>
												

												
									</table>
									
									<p style="border:1px solid #F00; margin-bottom:2px;">
										<strong style="padding-left:10px;"><u> ACKNOWLEDGEMENT</u></strong>
									</p>
									<table   border="1"  cellpadding="2" cellspacing="2" STYLE="width: 100%; font-size: 14px;">
									<tr>
									<td>By signing below and submitting this Application Form,I <b><?php echo $E_NAME; ?></b> S/O,D/O <b><?php echo $E_FNAME; ?></b> do hereby declare that the information provided above, is accurate to the best of my knowledge and I fully
										 Understand that my false statement or material omission / suppression of any fact shall regret my application and 
										 shall render me ilable to disciplinary and / of dismissal from service, at my stage.
										 </td></tr>
									</table>
									
									
									<?php echo $vis_id_btns; ?>
									
									<a href='dashboard.php' class='btn btn-warning' >View info</a>
									
									
								</div>


								
<?php } ?>								
								
			<?php	
					}
										}else{ echo "<tr><th>Record Not found</th></tr>"; } ?>						
								
								
			</div>
								
							
							</div>					
					</div>		
		</div>
		
	
	</div>
	</div>



<?php 

include("footer.php"); 

?>

