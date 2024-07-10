<?php 
session_start();
include("header.php");
include("nav.php");
include("inc/validate_login.php");

$sess_row_id  = $_SESSION["ROW_ID"];
$sess_e_cnic  = $_SESSION["E_CNIC"];


$id = "";

if($_REQUEST["id"]){
	$id = $_REQUEST["id"];
}




if(isset($_POST["btn_apply_job"])){
	$hidd_job_id = $_POST["hidd_job_id"];
	if(!empty($hidd_job_id) && !empty($sess_row_id)){
		
				$data3 = array(
					'sess_row_id' => $sess_row_id, 					
					'hidd_job_id' => $hidd_job_id 					
					);		 
					$json_enc_data3 = json_encode($data3);		
					$resp_insert = api_insert_data("applyJob1052",$json_enc_data3);	
					echo '<script type="text/javascript"> alert("Record Saved Successfully."); </script>';
					echo '<script type="text/javascript"> window.location="dashboard6.php?id='.$hidd_job_id.'"; </script>';
		
			
	} else echo '<script type="text/javascript"> alert("ERROR!\nPlease Fill All The Required Fields."); </script>';	
}


?>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

</script>

<script type="text/javascript" src="js/jquery.min.js"></script>


<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div style="">
		<h4><?php echo "Welcome ".$_SESSION["E_NAME"]; ?></h4>
					<div class="tabbable">
							<ul class="nav nav-tabs">
								
								<li class=""><a href="dashboard.php">View Profile</a></li>
								<li class=""><a href="dashboard2.php" >Edit Profile</a></li>
								<li class=""><a href="dashboard3.php">Application Status</a></li>
								<li class="active"><a href="dashboard4.php">Job Apply</a></li>
								
							</ul>
							<div class="tab-content">
								

								<div class="tab-pane active" id="three" STYLE="width:60%;">
								
									
<?php 
	
$already_applied = false;
$already_JOB_AP_ID = "";	  


$data = array(
	'sess_row_id' => $sess_row_id,
	'id' => $id
);		 
		 
$json_enc_data = json_encode($data);		
$get_active_jobs = api_getdata_json_post("viewProfile1051",$json_enc_data);				
$result = json_decode($get_active_jobs);

$row_count = 0;									 									 
if(!empty($result && $result != "404")){
$row_count =  count($result->ADD_SUB_DES_STA_ID); 
}


	if(!empty($id) && $row_count > 0){

		$i = 0;
		$ADD_SUB_DES_STA_ID = $result->ADD_SUB_DES_STA_ID[$i]; 
		$ADD_ID = $result->ADD_ID[$i]; 
		$ADD_PUB_DATE = $result->ADD_PUB_DATE[$i]; 
		$ADD_EXP_DATE = $result->ADD_EXP_DATE[$i]; 
		$FULL_DESG = $result->FULL_DESG[$i]; 
		$STATION_NAME = $result->STATION_NAME[$i]; 
		$TOTAL_POSITIONS = $result->TOTAL_POSITIONS[$i]; 
		$already_JOB_AP_ID = $result->ALREADY_APPLIED[$i]; 
		
		if(!EMPTY($already_JOB_AP_ID)){
			$already_applied = true;
		}
	
	
	
	?>	
			 
<div   id="print" style="">
<div   id="print" style="width:95%; margin:auto;">

		<div style="width:20%; float:left;"><img src="img/csd_logo.png" width="80" /></div>
		<div style="width:80%; float:right;"><h3 align="center" style="margin-bottom:1px; margin-left:-30%;"><b><u>APPLICATION FORM</u></b></h3></div>
				

<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	<tr>
		<td colspan="1" style="text-align:left; padding-left:10px; font-size:16px;">
			<?php if($already_applied) echo "<spam style='color:#F00;'>Application#: <U><B>".$already_JOB_AP_ID.'</B></U></spam><BR />'; ?>
		
			Application for the post of <u><b><?php echo $FULL_DESG.' ('.$TOTAL_POSITIONS.' x '.$STATION_NAME.')'; ?></b></u> <br />
			Advertisement no <u><b>CSDRC<?php echo sprintf("%04d",$ADD_ID); ?></b></u> 
			dated <u><b><?php echo $ADD_PUB_DATE; ?> </b></u>
			 & closing <u><b><?php echo $ADD_EXP_DATE; ?> </b></u>
			
			
		</td>
	</tr>
	
</table>

	



<?PHP 

$data = array(
	'sess_row_id' => $sess_row_id
);		 
$json_enc_data = json_encode($data);		
$get_active_jobs = api_getdata_json_post("viewProfile1016",$json_enc_data);				
$result = json_decode($get_active_jobs);
$row_count = count($result->E_CNIC);				
if($row_count == 1 ){
	 
	
$ROW_ID =  $result->ROW_ID[0];
$E_CNIC = $result->E_CNIC[0];
$CIV_EX = $result->CIV_EX[0];
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
$GENDER_NAME = $result->GENDER_NAME[0];
$RLG_NAME = $result->RLG_NAME[0];
$SECT_NAME = $result->SECT_NAME[0];
$MRS_NAME = $result->MRS_NAME[0];
$DOM_DIST_NAME = $result->DOM_DIST_NAME[0];
$PERM_DIST_NAME = $result->PERM_DIST_NAME[0];
$PRES_DIST_NAME = $result->PRES_DIST_NAME[0];
$PERM_TEHSIL_NAME = $result->PERM_TEHSIL_NAME[0];
$PRES_TEHSIL_NAME = $result->PRES_TEHSIL_NAME[0];

	

?>
			
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">

			<tr>
				<th colspan="5" style="text-align:left; font-size:20px;">Personnel Details</th>
			</tr>
			
			
			
			<tr>
				<th align="left" width="25%">CNIC</th>
				<th align="left" width="60%" colspan="2"><?php echo $E_CNIC; ?> [<?php echo $CIV_EX; ?>]</th>
				<td rowspan="5" width="15%" style="text-align:right;"><img src="images_profile/<?PHP ECHO $E_IMAGE; ?>"   width="100"/></td>
			</tr>
			
			<tr>
				<th align="left">Name</th>
				<th align="left" colspan="2"><?php echo $E_NAME; ?></th>
				
			</tr>  
			
			<tr>
				<th align="left">Father Name</th>
				<td colspan="2"><?php echo $E_FNAME; ?></td>
			</tr>
			
			<tr>
				<th align="left">Gender</th>
				<td colspan="2"><?php echo $GENDER_NAME; ?></td>
			</tr>
			
<?php  


$age = "";
if(!empty($ADD_EXP_DATE) && !empty($E_DOB)){
$datetime1 = new DateTime($ADD_EXP_DATE);
$datetime2 = new DateTime($E_DOB);
$interval = $datetime1->diff($datetime2);

$age = $interval->format("<b>Age:</b> %Yy %Mm and %Dd on $ADD_EXP_DATE");
}


?>			
			
			<tr>
				<th align="left">Date of Birth</th>
				<td colspan="2"><?php echo $E_DOB; ?> (<?php echo $age; ?>)</td>
			</tr>
		</table>	
		
		<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif; margin-top:-1px;">
	
			<tr>
				<th align="left" width="20%">Religion</th>
				<td colspan="" width="30%"><?php echo $RLG_NAME; ?></td>
				<th align="left" width="20%">Sect</th>
				<td colspan="" width="30%"><?php echo $SECT_NAME; ?></td>
			</tr>
			
			
			<tr>
				<th align="left">Caste</th>
				<td colspan="" ><?php echo $E_CAST_ID; ?></td>
				<th align="left">Marital Status</th>
				<td colspan="" ><?php echo $MRS_NAME; ?></td>
			</tr>
			
			

			<tr>
				<th align="left">Email</th>
				<td colspan=""><?php echo $E_EMAIL; ?></td>
				<th align="left">Mobile</th>
				<td colspan=""><?php echo $E_MOBILE; ?></td>
			</tr>
			
			<tr>
				<th align="left">Phone</th>
				<td colspan=""><?php echo $E_PHONE_NO; ?></td>
				<th align="left">Domicile Distt</th>
				<td colspan="" ><?php echo $DOM_DIST_NAME; ?></td>
			</tr>
			
			
			
			<tr>
				<th align="left">Permanent Address</th>
				<td colspan="4" ><?php echo $E_PERM_ADDRESS; ?></td>
			</tr>
			
			<tr>
				<th align="left">District</th>
				<td colspan="" ><?php echo $PERM_DIST_NAME; ?></td>
				<th align="left">Tehsil</th>
				<td colspan="" ><?php echo $PERM_TEHSIL_NAME; ?></td>
			</tr>
			
			
			<tr>
				<th align="left">Postal Address</th>
				<td colspan="4" ><?php echo $E_PRES_ADDRESS; ?></td>
			</tr>
			
			<tr>
				<th align="left">District</th>
				<td colspan="" ><?php echo $PRES_DIST_NAME; ?></td>
				<th align="left">Tehsil</th>
				<td colspan="" ><?php echo $PRES_TEHSIL_NAME; ?></td>
			</tr>
			

			
</table>

<br />									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="6" style="text-align:left; font-size:20px;">Academic Background</th>
			</tr>
			
			<tr>
											<th style="text-align:left; padding-left:3px;">Level</th>
											<th style="text-align:left; padding-left:3px;">Degree Held</th>
											
											<th style="text-align:left; padding-left:3px;">Field</th>
											<th style="text-align:left; padding-left:3px;">Year</th>
											<th style="text-align:left; padding-left:3px;">Institute</th>
											<th style="text-align:left; padding-left:3px;">Div/GPA/%</th>
											
										</tr>
										
										
										<?php
										
$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1017",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2 && $result2 != "404")){
$row_count2 =  count($result2->ROW_ID); 
}

if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
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
				<td><?php echo $TOTAL_YEARS; ?> Years</td>
					<td><?php echo $LEVEL_DETAILS; ?></td>
					
					<td><?php echo $FIELD_NAME; ?></td>
					<td><?php echo $PASS_YEAR; ?></td>
					<td><?php echo $INSTITUTE; ?></td>
					<td><?php echo $GPA_GRADE; ?></td>
				</tr>	
					
					
				<?php 	
										
									 }
									}else echo "<tr><td colspan='6' style='text-align:center;'>Nill</td></tr>";									 
										
							
				
				?>
			
			
			
			
</table>
									
								
<br />								
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="5" style="text-align:left; font-size:20px;">Professional Courses</th>
			</tr>
			
			<tr>
											
											<th style="text-align:left; padding-left:3px;">Cource/Diploma</th>
											<th style="text-align:left; padding-left:3px;">Field</th>
											<th style="text-align:left; padding-left:3px;">Institute</th>
											<th style="text-align:left; padding-left:3px;">Duration</th>
											<th style="text-align:left; padding-left:3px;">Result</th>
											
										</tr>
										
								<?php			

$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1018",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
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
										</tr>	
											
											
										<?php 	
										}
										}else{
												echo "<tr><td colspan='6' style='text-align:center;'>Nill</td></tr>";
											}
										
										?>
</table>
									
								
<br />									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="1" style="text-align:left; font-size:20px;">Awards / Achievements</th>
			</tr>
			
			<?php								

$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1019",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];

$EID= $result2->EID[$ii];	
$AWARD_DETAILS= $result2->AWARD_DETAILS[$ii];	
																					
	?>										
		<tr>
			<td><?php echo $AWARD_DETAILS; ?></td> 
		</tr>	
		<?php 	
		}
		}else{
				echo "<tr><td colspan='6' style='text-align:center;'>Nill</td></tr>";
			}
		?>
										
</table>
									
<br />									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="5" style="text-align:left; font-size:20px;">Employment History(Relevant experience only)</th>
			</tr>
			
			<tr>
											
											<th style="text-align:left; padding-left:3px;">Organization</th>
											<th style="text-align:left; padding-left:3px;">Position</th>
											<th style="text-align:left; padding-left:3px;">Durations</th>
											<th style="text-align:left; padding-left:3px;">Last Pay</th>
											<th style="text-align:left; padding-left:3px;">Leave Reason</th>
											
										</tr>
										
								<?php											
							
$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1020",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
	
	
$detail_exp = "";
$grand_total_exp = 0;	
	
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];

$EID= $result2->EID[$ii];	
$ORGANIZATION_NAME= $result2->ORGANIZATION_NAME[$ii];	
$POSITION_NAME= $result2->POSITION_NAME[$ii];	
$FROM_DATE= $result2->FROM_DATE[$ii];	
$DATE_TO= $result2->DATE_TO[$ii];	
$LAST_PAY= $result2->LAST_PAY[$ii];	
$LEAVE_REASON= $result2->LEAVE_REASON[$ii];	
$FULL_DATES= $result2->FULL_DATES[$ii];	
$ATTACHMENT= $result2->ATTACHMENT[$ii];	
$TOTAL_EXP= $result2->TOTAL_EXP[$ii];	
											
											$grand_total_exp += $TOTAL_EXP;
											$detail_exp .= $TOTAL_EXP.'d + ';
										
									?>										
										<tr>
											<td><?php echo $ORGANIZATION_NAME; ?></td> 
											<td><?php echo $POSITION_NAME; ?></td> 
											<td><?php echo $FULL_DATES; ?></td> 
											<td style="text-align:right;"><?php echo number_format ($LAST_PAY,2); ?></td> 
											<td><?php echo $LEAVE_REASON; ?></td> 
										</tr>	
											
											
										<?php 	
										}
										
										$detail_exp = trim($detail_exp,' + ');
										
										
										
											
											$yearInt = (int)($grand_total_exp/365);
											$remainDays = (int) (($grand_total_exp - ($yearInt*365))/30);
											
											
										
										
										?>
										
									<tr><td colspan='6' style='text-align:center;'>Total Exp: <b><?php echo $yearInt.' Year and '.$remainDays.' Months'; ?></b> <?php echo "(".$detail_exp." = ".$grand_total_exp." Days)" ?></td></tr>
										
										<?php
										}else{
												echo "<tr><td colspan='6' style='text-align:center;'>Nill</td></tr>";
											}
										?>
										
</table>


							
<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="1" style="text-align:left; font-size:20px;">Interest / Hobbies</th>
			</tr>
			<?php										
	
$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1021",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
$EID= $result2->EID[$ii];	
$HOBBY_DETAILS= $result2->HOBBY_DETAILS[$ii];	
																					
									?>										
										<tr>
											<td><?php echo $HOBBY_DETAILS; ?></td> 
										</tr>	
										<?php 	
										}
										}else{
												echo "<tr><td colspan='6' style='text-align:center;'>Nill</td></tr>";
											}
										?>
			
										
</table>








<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="2" style="text-align:left; font-size:20px;">Medical Ailment/History Disability</th>
			</tr>
								<tr>
									<td>Do you have any infection disease such as AIDS,HIV,Hepatitis,TB?</td>
									<td style="width:200px; text-align:center;">
									<?php if($HAVE_DISEASE == "1"){ echo "YES"; }else{ echo "NO"; } ?>
									</td>	
								</tr>
								<tr>
									<td>Do you have any disability?</td>
									<td style="text-align:center;"><?php if($HAVE_DISABILITY == "1"){ echo "YES"; }else{ echo "NO"; } ?> </td>
								</tr>										
</table>




<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="2" style="text-align:left; font-size:20px;">Discipline</th>
			</tr>
									<tr>
										<td>Have you ever been terminated from any service?</td>
										<td style="width:200px; text-align:center;"><?php if($HAVE_TERMINATED == "1"){ echo "YES"; }else{ echo "NO"; } ?></td>
									</tr>
									
									<tr>
										<td>Have you ever been punished by the Court of Law?</td>
										<td style="text-align:center;"><?php if($HAVE_PUNISHED_C == "1"){ echo "YES"; }else{ echo "NO"; } ?></td>
									</tr>
									
									<tr>
										<td>Have you ever been punished by the Pakistan Armed Forces Act?</td>
										<td style="text-align:center;"><?php if($HAVE_PUNISHED_PAF == "1"){ echo "YES"; }else{ echo "NO"; } ?></td>
									</tr>
									
									<tr>
										<td>Have you ever deserted from Pakistan Armed Forces?</td>
										<td style="text-align:center;"><?php if($HAVE_DESERTED == "1"){ echo "YES"; }else{ echo "NO"; } ?></td>
									</tr>										
</table>




<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="2" style="text-align:left; font-size:20px;">Choice of duty stations</th>
			</tr>
			<tr>
									        <th>Station Name</th>
											<th colspan="1">Reason</th>
											
									</tr>
									<?php
									
			 

$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1022",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
$STATION_NAME= $result2->STATION_NAME[$ii];	
$REASON= $result2->REASON[$ii];	
											
											
									?>
									
										<tr>
											
											<td><?php echo $STATION_NAME; ?></td> 
											<td colspan="1"><?php echo $REASON; ?></td> 
											
										</tr>	
										<?php
										}	
										}else{
												echo "<tr><td colspan='3' style='text-align:center;'>Nill</td></tr>";
											}
										
										?>
									<tr>
										<td colspan="1">Are you willing for employment anywhere in Pakistan?</td>
										<td style="width:200px; text-align:center;"><?php if($WILLING_ANYWHERE_P == "1"){ echo "YES"; }else{ echo "NO"; } ?></td>
									</tr>
													
</table>




<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="4" style="text-align:left; font-size:20px;">References</th>
			</tr>
			<tr>
									

									<td colspan="4">Provide a list of two Academic/Professional references:</td></tr>
									
				
									<tr>
									        <th>Name</th>
											<th>Address</th>
											<th>Phone</th>
											<th>E-mail</th>
											
											</tr>
											
									<?php 
					
$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1023",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
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
			
			</tr>	
			<?php
			}
			}else{
					echo "<tr><td colspan='4' style='text-align:center;'>Nill</td></tr>";
				}
			
			?>
													
</table>




<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="5" style="text-align:left; font-size:20px;">Relatives In CSD</th>
			</tr>
			<tr>
									        <th>Name</th>
											<th>Designation</th>
											<th>Relationship</th>
											<th>Department</th>
											<th>Location</th>
											
											</tr>
											</tr>
										
										
									<?php 
	
$data2 = array(
'sess_row_id' => $sess_row_id
);		 
$json_enc_data2 = json_encode($data2);		
$get_active_jobs2 = api_getdata_json_post("viewProfile1024",$json_enc_data2);				
$result2 = json_decode($get_active_jobs2);

$row_count2 = 0;									 									 
if(!empty($result2) && $result2 != "404"){
$row_count2 =  count($result2->ROW_ID); 
}


if($row_count2 > 0 ){
for($ii=0; $ii < $row_count2; $ii++){
$ROW_ID2= $result2->ROW_ID[$ii];	
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
										
										</tr>	
										<?php
										}
										}else{
												echo "<tr><td colspan='5' style='text-align:center;'>Nill</td></tr>";
											}
										
										?>
																				
</table>



<br>									
<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
			<tr>
				<th colspan="5" style="text-align:left; font-size:20px;">Acknowledgement</th>
			</tr>
			<tr>
									<td>By signing below and submitting this Application Form,I <b><?php echo $E_NAME; ?></b> <?PHP if($E_GENDER_ID == "2"){ echo "D/O"; }else if($E_GENDER_ID == "1"){ echo "S/O"; }else{ echo "S/D/O"; } ?> <b><?php echo $E_FNAME; ?></b> do hereby declare that the information provided above, is accurate to the best of my knowledge and I fully
										 Understand that my false statement or material omission / suppression of any fact shall regret my application and 
										 shall render me liable to disciplinary and / of dismissal from service, at my stage.
										 </td></tr>
																				
</table>

<p style="font-size:12px;font-family:comic sans, comic sans ms, cursive, verdana, arial, sans-serif;line-height:1;" align="right">This is computer generated form and no signature is required.</p>
								
								
</div>
</div>

<br />

<?php }else echo "Error"; ?>	
	
	<?php if(!$already_applied){ ?>
		<form method="post" name="frm_job_appl">
			<input type="hidden" name="hidd_job_id" value="<?php echo $id; ?>" />
			<input type="submit" name="btn_apply_job" class="btn btn-danger" style="padding:5px; width:120px;" value="Apply Now" />
		
		</form>
	<?php }else{ ?>	
		<a  href="#" onclick="printContent('print')" style="color:#F00; font-size:20px;"> <b>Print</b> </a> 	
	<?php } ?>									
	<a href="dashboard4.php"  title="Go Back" class="btn btn-info" style="padding:5px;">Go Back</a>								
					
	
	<?php } else { echo "Info Not Found!"; } ?>
	
					
									
									
									
								

								
								</div>

							</div>					
					</div>		
		</div>
		
	</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>


<?php 

include("footer.php"); 

?>

