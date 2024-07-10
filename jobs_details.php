<?php 
session_start();
include("header.php");
include("nav.php");



$id = "";
$st_id = "";

if($_REQUEST["id"]){
	$id = $_REQUEST["id"];
}

if($_REQUEST["st_id"]){
	$st_id = $_REQUEST["st_id"];
}
				
?>
<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div style="">
		<h4><?php echo "Jobs Details "; ?></h4>
					<div class="tabbable">
							
							<div class="tab-content">
								<div class="tab-pane active" id="one" style="width:60%;">




<?php 
	

$data = array(
		'id' => $id,
		'st_id' => $st_id
		);		 
		$json_enc_data = json_encode($data);		
		$get_active_jobs = api_getdata_json_post("viewAdvertisment1080",$json_enc_data);	

echo $get_active_jobs; 
?>	


	
	<br />
	<br />
	<br />
	<a href="#" ONCLICK="window.history.back();" title="Go Back" class="btn btn-info" style="padding:5px;">Go Back</a>
						
									
									

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