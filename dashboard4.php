<?php 
session_start();
include("header.php");
include("nav.php");
include("inc/validate_login.php");

$sess_row_id  = $_SESSION["ROW_ID"];
$sess_e_cnic  = $_SESSION["E_CNIC"];

?>

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
								

								<div class="tab-pane active" id="three" STYLE="width:70%;">
								
									<p>
										<strong>Current Available Jobs</strong>
									</p>
									
									
									<?php 
									

									
		$data = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data = json_encode($data);		
		$get_active_jobs = api_getdata_json_post("viewProfile1046",$json_enc_data);				
		$result = json_decode($get_active_jobs);

		$row_count = 0;									 									 
		if(!empty($result && $result != "404")){
		$row_count =  count($result->IS_FINALIZE); 
		}

		if($row_count > 0 ){
			if($result->IS_FINALIZE[0] == "1" ){

									
									?>
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
										<tr>
											<th style="text-align:left; padding-left:3px;">Advertisement#</th>
											<th style="text-align:left; padding-left:3px;">Job Title</th>
											<th style="text-align:left; padding-left:3px;">Station</th>
											<th style="text-align:left; padding-left:3px;">Positions</th>
											<th style="text-align:left; padding-left:3px;">Closing Date</th>
											<th style="text-align:left; padding-left:3px;"></th>
											<th style="text-align:left; padding-left:3px;"></th>
											
										</tr>
										
										
										<!--  -->
										
										<?php		

																	

		$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1047",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ADD_ID); 
		}

		if($row_count2 > 0 ){
		for($i=0; $i < $row_count2; $i++){

											$ADD_ID= $result2->ADD_ID[$i];		
											$FULL_DESG= $result2->FULL_DESG[$i];	
											$ADD_EXP_DATE= $result2->ADD_EXP_DATE[$i];	
											$STATION_NAME= $result2->STATION_NAME[$i];	
											$TOTAL_POSITIONS= $result2->TOTAL_POSITIONS[$i];	
											$ADD_SUB_DES_STA_ID= $result2->ADD_SUB_DES_STA_ID[$i];	
											$ADD_SUB_DES_ID= $result2->ADD_SUB_DES_ID[$i];	
											$EDU_YEARS= $result2->EDU_YEARS[$i];	
											$CANDI_MAX_EDU= $result2->CANDI_MAX_EDU[$i];	
											
											
											
										
											$alreadyApply = false;
											
													$data3 = array(
											'sess_row_id' => $sess_row_id, 
											'add_sub_des_sta_id' => $ADD_SUB_DES_STA_ID
											);		 
											$json_enc_data3 = json_encode($data3);		
											$get_active_jobs3 = api_getdata_json_post("viewProfile1048",$json_enc_data3);				
											$result3 = json_decode($get_active_jobs3);
											$row_count3 = 0;									 									 
											if(!empty($result3 && $result3 != "404")){
											$row_count3 =  count($result3->JOB_AP_ID); 
											}

											if($row_count3 > 0 ){
												$alreadyApply = true;
											}
											
											
										/* 	$query_check2 = "SELECT (SYSDATE - E_DOB)/365.242199 AS DATE_DIFF  FROM RC_LOGIN_APPLICANT WHERE ROW_ID='$sess_row_id'";
											$prof_pro3442 = fun_select_rec($query_check2);
											$total_age = (int)$prof_pro3442["DATE_DIFF"][0]; */
										
											$total_age = 0;
											
											$data3 = array(
											'sess_row_id' => $sess_row_id
											);		 
											$json_enc_data3 = json_encode($data3);		
											$get_active_jobs3 = api_getdata_json_post("viewProfile1049",$json_enc_data3);				
											$result3 = json_decode($get_active_jobs3);
											$row_count3 = 0;									 									 
											if(!empty($result3 && $result3 != "404")){
											$row_count3 =  count($result3->DATE_DIFF_AGE); 
											}

											if($row_count3 > 0 ){
												$total_age =  $result3->DATE_DIFF_AGE[0];
											}
											
										

										
											
										?>										
										<tr>
											<td><a href="dashboard5.php?id=<?php echo $ADD_ID; ?>">CSDRC<?php echo sprintf("%04d",$ADD_ID); ?></a></td> 
											<td><?php echo $FULL_DESG; ?></td> 
											<td><?php echo $STATION_NAME; ?></td> 
											<td style="text-align:center;"><?php echo $TOTAL_POSITIONS; ?></td>
											<td><?php echo $ADD_EXP_DATE; ?></td>
											<td><a href="dashboard5.php?id=<?php echo $ADD_ID; ?>&st_id=<?php echo $ADD_SUB_DES_ID; ?>">View Job Details</a></td>
											<td><?php  if($total_age < 18){  echo "<font style='color:#F00;'>Age < 18, Not Eligible</font>"; }else if($CANDI_MAX_EDU < $EDU_YEARS){ echo "<font style='color:#F00;'>Less Education, Not Eligible</font>"; }else{ ?><a href="dashboard6.php?id=<?php echo $ADD_SUB_DES_STA_ID; ?>"><?php if($alreadyApply){ echo "<b style='color:#00F;'>Print Form</b>"; }else{ echo "Apply Now"; } ?></a><?php } ?></td>
											
										</tr>	
										<?php 	
										}
									}else echo "<tr><td colspan='7' style='text-align:center;'>No Job Available...</td></tr>";
										?>
										
									</table>
								<?php 	
										}else echo "<font style='color:#F00;'>Please finalized your profile before apply any job!</font>";
										}else echo "<font style='color:#F00;'>Please finalized your profile before apply any job!</font>";
		
										?>

								
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

