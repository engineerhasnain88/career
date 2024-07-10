<?php 
session_start();
include("header.php");
include("nav.php");

				
?>
<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div style="">
		<h4><?php echo "Job Details ";  ?></h4>
					<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#one" data-toggle="tab">Available Jobs </a></li>
								 <li><a href="login.php" >Login</a></li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="one">
				
							<table border="1"  cellpadding="1" cellspacing="1"  STYLE="border-collapse:collapse; width: 100%; font-size: 14px;font-family: Arial, Helvetica, sans-serif;">
	
										<tr>
											<th style="text-align:left; padding-left:3px;">Advertisement#</th>
											<th style="text-align:left; padding-left:3px;">Job Title</th>
											<th style="text-align:left; padding-left:3px;">Station</th>
											<th style="text-align:center; padding-left:3px;">Positions</th>
											<th style="text-align:left; padding-left:3px;">Last Date</th>
											<th style="text-align:left; padding-left:3px;"></th>
											<th style="text-align:left; padding-left:3px;"></th>
											
										</tr>		
									<?php 
									
									
									 $get_active_jobs = api_get_data_json("activeJobs1010");
									 
									 $row_count = 0;
									
									 if(!empty($get_active_jobs) && $get_active_jobs != "403" && $get_active_jobs != "404"){
										 $row_count =  count($get_active_jobs->ADD_SUB_DES_STA_ID); 
									 }
									 	 
									if($row_count > 0 ){
									 for($i=0; $i < $row_count; $i++){
										 $ADD_SUB_DES_STA_ID = $get_active_jobs->ADD_SUB_DES_STA_ID[$i];
										 $ADD_SUB_DES_ID = $get_active_jobs->ADD_SUB_DES_ID[$i];
										 $ADD_ID = $get_active_jobs->ADD_ID[$i];
										 $FULL_DESG = $get_active_jobs->FULL_DESG[$i];
										 $ADD_EXP_DATE = $get_active_jobs->ADD_EXP_DATE[$i];
										 $STATION_ID = $get_active_jobs->STATION_ID[$i];
										 $STATION_NAME = $get_active_jobs->STATION_NAME[$i];
										 $TOTAL_POSITIONS = $get_active_jobs->TOTAL_POSITIONS[$i];
										 
										 
										 ?>										
											<tr>
												<td>
												    <?php if($ADD_ID == '1042'){?> <a href="img/jobs_20220209.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else if($ADD_ID == '1082'){?> <a href="img/jobs_20220308.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else if($ADD_ID == '1102'){?> <a href="img/jobs_20220802.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else{ ?><a href="jobs_details.php?id=<?php echo $ADD_ID; ?>" style="border-bottom: 1px solid #00f; color: #00f;"><b>CSDRC<?php echo sprintf("%04d",$ADD_ID); ?></b></a><?php } ?>
												</td> 
												<td><?php echo $FULL_DESG; ?></td> 
												<td><?php echo $STATION_NAME; ?></td> 
												<td style="text-align:center;"><?php echo $TOTAL_POSITIONS; ?></td>
												<td><?php echo $ADD_EXP_DATE; ?></td>
												<td><?php if($ADD_ID == '1042'){?> <a href="img/jobs_20220209.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else if($ADD_ID == '1082'){?> <a href="img/jobs_20220308.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else if($ADD_ID == '1102'){?> <a href="img/jobs_20220802.pdf" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a>
												<?php }else{ ?><a href="jobs_details.php?id=<?php echo $ADD_ID; ?>&st_id=<?php echo $ADD_SUB_DES_ID; ?>" style="border-bottom: 1px solid #00f; color: #00f;"> <b>View Job Details</b></a><?php } ?></td>
												<td><a href="dashboard4.php" style="border-bottom: 1px solid #00f; color: #00f;"><b>Apply Now</b></a></td>
												
											</tr>	
											<?php 	
										 

									 }
									
									}else echo "<tr><td colspan='7' style='text-align:center;'>No Job Available...</td></tr>";
									

									?>
							</table>		
									

								</div>
								
								
								
								<div class="tab-pane" id="two">
								<div class="span6" >
									<p style="border:1px solid #F00;">
										<strong >All Results</strong>
									</p>

									
								</div>
								
								</div>
								
							</div>					
					</div>		
		</div>
		
	
	</div>
	</div>
<?php 

include("footer.php"); 

?>