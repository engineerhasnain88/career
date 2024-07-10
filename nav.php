<?php 
session_start();

$sess_e_cnic  = $_SESSION["E_CNIC"];
$sess_e_image  = $_SESSION["E_IMAGE"];
$sess_row_id  = $_SESSION["ROW_ID"];




function api_get_data_json($did){
	if(!empty($did)){		
 		 //$url = "http://124.109.53.218/hr/career_api.php?did=$did";
 		 $url = "https://rms.csd.gov.pk/hr/career_api.php?did=$did";
		 $client = curl_init($url);
		 curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		 $response = curl_exec($client);
		 $result = json_decode($response);
		 return $result; 	  
		 		 
	}
}

function api_get_data_simple($did){
	if(!empty($did)){		
 		 //$url = "http://124.109.53.218/hr/career_api.php?did=$did";
 		 $url = "https://rms.csd.gov.pk/hr/career_api.php?did=$did";
		 $client = curl_init($url);
		 curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		 $response = curl_exec($client);
		 return $response; 	  
		 		 
	}
}


function api_getdata_json_post($did,$json_post_data){
	if(!empty($did)){

		$payload = $json_post_data;
		//$ch = curl_init("http://124.109.53.218/hr/career_api.php?did=$did");
		$ch = curl_init("https://rms.csd.gov.pk/hr/career_api.php?did=$did");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payload))
		);

		$result = curl_exec($ch);
		return $result;
				
	}
}



function api_insert_data($did,$json_post_data){
	if(!empty($did)){

		$payload = $json_post_data;
		//$ch = curl_init("http://124.109.53.218/hr/career_api.php?did=$did");
		$ch = curl_init("https://rms.csd.gov.pk/hr/career_api.php?did=$did");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($payload))
		);

		$result = curl_exec($ch);
		return $result;
		
	}
}



	/* 	include("inc/dsn1.php");

		$BASE_PAGE_NAME2	= basename($_SERVER['PHP_SELF']);
		$USER_IP = $_SERVER["REMOTE_ADDR"];

		
		$SECURITY_INS ="INSERT INTO RC_LOGIN_HISTORY_PAGEACCESS(CLIENT_IP ,PAGE_NAME ,HIT_DATE ,USER_ID) 
		VALUES('$USER_IP' ,'$BASE_PAGE_NAME2' ,SYSDATE ,'$sess_row_id')";
		$RS_SECURITY		= oci_parse($conn, $SECURITY_INS); 
		if(oci_execute($RS_SECURITY)){ 
		oci_commit();	
		}
 */

	$BASE_PAGE_NAME2	= basename($_SERVER['PHP_SELF']);
	$USER_IP = $_SERVER["REMOTE_ADDR"];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'BASE_PAGE_NAME' => $BASE_PAGE_NAME2,	
	'USER_IP' => $USER_IP	
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1081",$json_enc_data3);	
 
// 	if($resp_insert != "1"){
		
// 		//echo "<div style='background-color:#F00; width:700px; margin:auto; padding:40px; text-align:center;'><h2>Down for system maintenance...<br /> Please try again later....</h2></div>"; 
// 		echo "<img  src='img/mintenanceimg.png' style='margin-top:-60px;'  />";
// 		exit();
// 	}

?>

<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="index.php"><img src="img/csd_logo.png" width="100" style="margin-top:-20px; margin-bottom:-20px;"/><span style="color:#FFFF2B; font-size:18px;"> <b>Career Management</b></span></a></h1>
				<!-- navigation <span style="color:#DA0909;"><b>CSD</b></span> -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">
					<li><a title="Home" href="index.php">Home</a></li>
					<li><a title="Current Available Jobs" href="jobs.php">Current Jobs</a></li>
					<li><a title="Contact Us" href="contactus.php">Contact Us</a></li>
					<li><a title="Help" href="help.php">Help</a></li>
					
					<?php if(isset($_SESSION["E_NAME"]) && !empty($_SESSION["E_NAME"])){ ?>
						<li><a href="logout.php" style="color:#F00;"><b>Logout</b></a></li>
						<li>
							<a href="dashboard.php" style="margin-top:-15px; " title="View Profile"><i class="icon-circled icon-bgdark  icon-2x"><img src="images_profile/<?php echo $sess_e_image; ?>" class="img-circle"  width="50"/></i></a>
						</li>
						
					<?php }else{ ?>
						<li><a href="login.php">Login</a></li>
					<?php } ?>  <!-- icon-circled icon-bgdark icon-instagram icon-2x -->
					
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>