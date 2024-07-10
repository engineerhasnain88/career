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
								<li class="active"><a href="dashboard3.php">Application Status</a></li>
								<li class=""><a href="dashboard4.php">Job Apply</a></li>
								
							</ul>
							<div class="tab-content">
								

								<div class="tab-pane active" id="three" STYLE="width:70%;">
								
									<p>
										<strong>Application Status</strong>
									</p>
									
									
									<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
										<tr>
											<th style="text-align:left; padding-left:3px;">Application#</th>
											<th style="text-align:left; padding-left:3px;">Job Title</th>
											<th style="text-align:left; padding-left:3px;">Station</th>
											<th style="text-align:left; padding-left:3px;">Apply Date</th>
											<th style="text-align:left; padding-left:3px;">Closing Date</th>
											<th style="text-align:left; padding-left:3px;">Status</th>
											<th style="text-align:left; padding-left:3px;">Add Status</th>
											<th style="text-align:left; padding-left:3px;">Remarks</th>
											<th style="text-align:left; padding-left:3px;">Print</th>
										</tr>
										
										
										<!--  -->
										
										<?php										
			
		$data2 = array(
		'sess_row_id' => $sess_row_id
		);		 
		$json_enc_data2 = json_encode($data2);		
		$get_active_jobs2 = api_getdata_json_post("viewProfile1045",$json_enc_data2);				
		$result2 = json_decode($get_active_jobs2);

		$row_count2 = 0;									 									 
		if(!empty($result2 && $result2 != "404")){
		$row_count2 =  count($result2->ADD_STATUS); 
		}

		if($row_count2 > 0 ){
		for($ii=0; $ii < $row_count2; $ii++){
											$ADD_STATUS= $result2->ADD_STATUS[$ii];	
											$JOB_AP_ID= $result2->JOB_AP_ID[$ii];	
											$ADD_SUB_DES_STA_ID= $result2->ADD_SUB_DES_STA_ID[$ii];	
											$EID= $result2->EID[$ii];	
											$STATUS= $result2->STATUS[$ii];	
											$STAGE= $result2->STAGE[$ii];	
											$ENTRY_DATE= $result2->ENTRY_DATE[$ii];	
											$FULL_DESG= $result2->FULL_DESG[$ii];	
											$ADD_EXP_DATE= $result2->ADD_EXP_DATE[$ii];	
											$STATION_NAME= $result2->STATION_NAME[$ii];	
											$STATUS_DETAILS= $result2->STATUS_DETAILS[$ii];	
											$COLOR= $result2->COLOR[$ii];	
											$PRINT_STATUS= $result2->PRINT_STATUS[$ii];	
											$COMMENT_TO_APPLICANT= $result2->COMMENT_TO_APPLICANT[$ii];	
											
											$STATUS_ADD_FULL = "";
											
											if($ADD_STATUS == "10"){
												$STATUS_ADD_FULL = "IN PROCESS";
											}else{
												$STATUS_ADD_FULL = "CLOSED";
											}
											
											if($STATUS_DETAILS != "50"){
												$STATUS_DETAILS = "In-Process";
												$COLOR = "092FB2";
											}
										
										?>										
										<tr>
											<td><?php echo $JOB_AP_ID; ?></td> 
											<td><?php echo $FULL_DESG; ?></td> 
											<td><?php echo $STATION_NAME; ?></td> 
											<td><?php echo $ENTRY_DATE; ?></td>
											<td><?php echo $ADD_EXP_DATE; ?></td>
											<td style="color:#<?php echo $COLOR; ?>; font-weight:bold;"><?php echo $STATUS_DETAILS; ?></td> 
											
											<td><?php echo $STATUS_ADD_FULL; ?></td> 
											<td><?php echo $COMMENT_TO_APPLICANT; ?></td> 
											<td><?php if($PRINT_STATUS == "1"){ ?><a href="dashboard6.php?id=<?php echo $ADD_SUB_DES_STA_ID; ?>">Print Form</a><?php } ?></td> 
										</tr>	
										<?php 	
										}
		}
										
										?>
										
									</table>
								

								
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

