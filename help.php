<?php 
session_start();
include("header.php");
include("nav.php");

				
?>
<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div style="">
		<h4><?php echo "Help & Support"; ?></h4>
					<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#one" data-toggle="tab">General Info</a></li>
							</ul>
							
							
							<div class="tab-content">
								<div class="tab-pane active" id="one" style="width:50%;">
										<p style="border:1px solid #F00;"><strong style="padding-left:10px;">How to See Available Jobs</strong></p>
										<p>By Click on <b><a href="http://atd.csd.gov.pk/career/jobs.php">CURRENT JOBS</a></b> at top Nav bar, you can see all the avialable jobs at CSD.</p>
										<img src="img/helpImages/availablejobs.PNG" width="100%" />
										<p>At this stage you can see all the available jobs (Advertisement Number, Title, Total Vacancies, Closing Date, etc) and can apply by click on Apply Now Link...</p>
										
										<br />
										<br />
										
										<p style="border:1px solid #F00;"><strong style="padding-left:10px;">How to Login</strong></p>
										<p>By Click on <b><a href="http://atd.csd.gov.pk/career/login.php">LOGIN</a></b> OR <b><a href="http://atd.csd.gov.pk/career/login.php">Apply Now</a></b> you will redirect to login Page.</p>
										<img src="img/helpImages/loginjobs.PNG"  width="100%" />
										
										<p>If you don't have account, please signup first by providing following information.</p>
										<img src="img/helpImages/signupjobs.PNG" width="100%" />
										<p>After providing valid information for signup, you can login by providing the same info.</p>
								
										<br />
										<br />
										
										<p style="border:1px solid #F00;"><strong style="padding-left:10px;">On Successful Login</strong></p>
										<img src="img/helpImages/img4.PNG"  width="100%" />
										<p>After login you will first see above mention screen. Please edit information by clicking on Edit Profile button.</p>
								
										<br />
										<br />
										
										
										<p style="border:1px solid #F00;"><strong style="padding-left:10px;">Application Status</strong></p>
										<img src="img/helpImages/img5.PNG"  width="100%" />
										
								
								</div>
																
							</div>	
							
					</div>		
		</div>
		
	
	</div>
	</div>
<?php 

include("footer.php"); 

?>