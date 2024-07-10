<?php 
session_start();
include("header.php");
include("nav.php");
include("inc/validate_login.php");

$sess_row_id  = $_SESSION["ROW_ID"];
$sess_e_cnic  = $_SESSION["E_CNIC"];


$id = "";
$st_id = "";

if($_REQUEST["id"]){
	$id = $_REQUEST["id"];
}

if($_REQUEST["st_id"]){
	$st_id = $_REQUEST["st_id"];
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
								

								<div class="tab-pane active" id="three" STYLE="width:50%;">
								
									
<?php 
	

$data = array(
		'sess_row_id' => $sess_row_id,
		'id' => $id,
		'st_id' => $st_id
		);		 
		$json_enc_data = json_encode($data);		
		$get_active_jobs = api_getdata_json_post("viewAdv1050",$json_enc_data);	

echo $get_active_jobs; 
?>	  
 
	
	<br />
	<br />
	<br />
	<a href="dashboard4.php"  title="Go Back" class="btn btn-info" style="padding:5px;">Go Back</a>
	<a  href="#" onclick="printContent('print')" class="btn btn-info" style="padding:5px;">Print </a>
										
									
									
									
									
									
								

								
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

