<?php 
session_start();
include("header.php");
include("nav.php");



$login_alert = "<font style='color:#259a25;'>Please Enter Username & Password</font>";

if(isset($_POST["btn_login"])){
	
	$u_cnic		=	$_POST["u_cnic"];
	$u_pwd		=	$_POST["u_pwd"];
	$captcha_code		=	$_POST["captcha_code"];
	if(!empty($captcha_code) && $_SESSION["sess_captcha_code"] == $captcha_code ){
	if(!empty($u_cnic)&& !empty($u_pwd)){
				
				$data = array(
					'u_cnic' => $u_cnic,
					'u_pwd' => $u_pwd
				);		 
				$json_enc_data = json_encode($data);		
				$get_active_jobs = api_getdata_json_post("loginVarify1011",$json_enc_data);				
				$result = json_decode($get_active_jobs);
				$row_count = "";
				if(!empty($result) && $result != "403" && $result != "404"){
					$row_count = count($result->E_CNIC); 
				 }
				
				if($row_count == 1 ){
					 
					$_SESSION["ROW_ID"] 		= $result->ROW_ID[0];
					$_SESSION["E_CNIC"] 		= $result->E_CNIC[0];
					$_SESSION["E_NAME"] 		= $result->E_NAME[0];
					$_SESSION["E_MOBILE"] 		= $result->E_MOBILE[0];
					$_SESSION["E_EMAIL"] 		= $result->E_EMAIL[0];
					$_SESSION["E_IMAGE"] 		= $result->E_IMAGE[0];
					$_SESSION["E_LAST_LOGIN"] 	= "[First Time Login]";
					
					$sess_row_id  = $_SESSION["ROW_ID"];
					
					
					$data2 = array(
					'sss_row_id' => $sess_row_id 
					);		 
					$json_enc_data2 = json_encode($data2);		
					$get_active_jobs2 = api_getdata_json_post("loginVarify1012",$json_enc_data2);				
					$result2 = json_decode($get_active_jobs2);
					$row_count2 = count($result2->LAST_LOGIN);	
					if($row_count2 > 0 ){					 
						$_SESSION["E_LAST_LOGIN"] = ' [Last Login At: '.$result2->LAST_LOGIN[0].']';					
					}
					
					
					$USER_IP = $_SERVER["REMOTE_ADDR"];
					$mac_string = shell_exec("arp -a $USER_IP");
					$mac_array = explode(" ",$mac_string);
					$USER_MAC = $mac_array[3];
					
					$data3 = array(
					'sss_row_id' => $sess_row_id, 
					'sss_user_ip' => $USER_IP, 
					'sss_user_mac' => $USER_MAC, 
					);		 
					$json_enc_data3 = json_encode($data3);		
					$resp_insert = api_insert_data("loginVarify1013",$json_enc_data3);				
					
					header("Location: dashboard.php");
					echo '<script type="text/javascript"> window.location="dashboard.php"; </script>';
				
					
				}else $login_alert="<font style='color:#bd0414;'>Invalid CNIC OR Password</font>"; 
				
	}else $login_alert ="<font style='color:#bd0414;'>Enter Username & Password.</font>";
	}else $login_alert ="<font style='color:#bd0414;'>Please Enter valid captcha code!</font>";

}


$r_cnic		=	"";
$r_name		=	"";
$r_mobile	=	"";
$r_email	=	"";
$r_pwd1		=	"";
$r_pwd2		=	""; 
	
if(isset($_POST["btn_signup"])){

	$r_cnic		=	$_POST["r_cnic"];
	$r_name		=	$_POST["r_name"];
	$r_mobile	=	$_POST["r_mobile"];
	$r_email	=	$_POST["r_email"];
	$r_pwd1		=	$_POST["r_pwd1"];
	$r_pwd2		=	$_POST["r_pwd2"];
		$captcha_code		=	$_POST["captcha_code"];
	if(!empty($captcha_code) && $_SESSION["sess_captcha_code_reg"] == $captcha_code ){
	
	if(!empty($r_cnic)&& !empty($r_name)&& !empty($r_mobile)&& !empty($r_email)&& !empty($r_pwd1)&& !empty($r_pwd2)){
		
		if(strlen($r_cnic) == "13" && strlen($r_pwd1) > "5"){
			
					$data3 = array(
					'r_cnic' => $r_cnic, 
					'r_name' => $r_name, 
					'r_mobile' => $r_mobile, 
					'r_email' => $r_email, 
					'r_pwd1' => $r_pwd1
					);		 
					$json_enc_data3 = json_encode($data3);		
					$resp_insert = api_insert_data("loginSignup1014",$json_enc_data3);
					
					echo '<script type="text/javascript"> alert("'.$resp_insert.'"); </script>';
				
		} else echo '<script type="text/javascript"> alert("ERROR!\nCNIC Must 13 digit number & Password Must be Grater than 8 digit..."); </script>';
		} else echo '<script type="text/javascript"> alert("ERROR!\nPlease Fill All The Required Fields."); </script>';
	}else $login_alert ="<font style='color:#bd0414;'>Please Enter valid captcha code!</font>";
}
				

	
if(isset($_POST["btn_reset"])){

	$r_cnic		=	$_POST["r_cnic"];
	$r_email	=	$_POST["r_email"];
	
		$captcha_code		=	$_POST["captcha_code"];
	if(!empty($captcha_code) && $_SESSION["sess_captcha_code_res"] == $captcha_code ){
	
	if(!empty($r_cnic)&&!empty($r_email)){
		
		
					$data3 = array(
					'r_cnic' => $r_cnic, 					
					'r_email' => $r_email 
					);		 
					$json_enc_data3 = json_encode($data3);		
					$resp_insert = api_insert_data("loginForgotEmail1015",$json_enc_data3);
					
					echo '<script type="text/javascript"> alert("'.$resp_insert.'"); </script>';
		
		
			
} else echo '<script type="text/javascript"> alert("ERROR!\nPlease Fill All The Required Fields."); </script>';
	}else $login_alert ="<font style='color:#bd0414;'>Please Enter valid captcha code!</font>";
}




?>


<script>

function validateForm(){
	
	
	var r_pwd1 = document.getElementById("r_pwd1").value;
	var r_pwd2 = document.getElementById("r_pwd2").value;
	
	
	if(r_pwd1 == r_pwd2){
		return true;
	}else{
		alert("ERROR\nPassword Mismatch!");
		return false;
	}

}


</script>



<section id="maincontent" class="inner">
<div class="container">
	<div class="row">
		<div class="span6">
		<h4>Security:


		
		</h4>
					<div class="tabbable">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#one" data-toggle="tab">Login</a></li>
								<li><a href="#two" data-toggle="tab">Register</a></li>
								<li><a href="#three" data-toggle="tab">Reset</a></li>
								
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="one">
									<p>
										<strong>Already Have Account</strong> (If you don't have account please Register First)
									</p>
									<form autocomplete="off" method="post">
									 
									<table >
									
										<tr>
											<td colspan="2"><?php echo $login_alert; ?></td>
										</tr>
										
										<tr>
											<td colspan="2">
												<input type="text" name="u_cnic" value="<?php echo $r_cnic; ?>" maxlength="13" class="form-control" style="width:250px;" placeholder="Enter CNIC Without Dashes" style="font-size:13px;"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
											</td>
										</tr>
										
										
										<tr>
											<td colspan="2">
												<input type="password" name="u_pwd" value="" maxlength="30" class="form-control" style="width:235px;"  placeholder="Enter Password" required />
											</td>
										</tr>
										
										<tr>
											<td colspan="2">
												
												<input type="text" name="captcha_code" value="" maxlength="30" class="form-control" style="width:150px;"  placeholder="Captcha" required />
												<img src="inc/captcha.php" width="120" height="30" border="1" alt="CAPTCHA"> 
											</td>
										</tr>
										
										
										
										<tr>
											<td>		
												<input type="submit" class="btn btn-primary" name="btn_login"  style="padding:1px;" value="Login" />
											</td>
											<td >
												<input type="submit" class="btn btn-primary"  name="btn_forgot" style="padding:1px;"  value="Reset Password" />
											</td>
										</tr>
										
									</table>
									</form>
									
								</div>
								<div class="tab-pane" id="two">
									<p>
										<strong>Don't Have Account,</strong> Please Enter Details:
									</p>
									
									<form autocomplete="off" method="post">

									<table >
													
										<tr>
											<th>Enter CNIC</th>
											<td><input type="text" name="r_cnic" id="r_cnic" value="<?php echo $r_cnic; ?>" maxlength="13" class="form-control" placeholder="1111122222223"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required /></td>
										</tr>
										
										<tr>
											<th>Enter Name</th>
											<td><input type="text" name="r_name" id="r_name" value="<?php echo $r_name; ?>" maxlength="30" class="form-control" placeholder="Enter Your Name" required  /></td>
										</tr>
										<tr>
											<th>Mobile No</th>
											<td><input type="text" name="r_mobile" id="r_mobile" value="<?php echo $r_mobile; ?>" maxlength="11" class="form-control" placeholder="03000000000" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required /></td>
										</tr>
										
										<tr>
											<th>Enter Email</th>
											<td><input type="email" name="r_email" id="r_email" value="<?php echo $r_email; ?>" maxlength="30" class="form-control" placeholder="abc@xyz.com" required /></td>
										</tr>
										
										<tr>
											<th>Enter Password</th>
											<td><input type="password" name="r_pwd1" id="r_pwd1" value="<?php echo $r_pwd1; ?>" maxlength="30" class="form-control" placeholder="Enter Password" required /></td>
										</tr>
										
										<tr>
											<th>Confirm Password</th>
											<td><input type="password" name="r_pwd2" id="r_pwd2" value="<?php echo $r_pwd2; ?>" maxlength="30" class="form-control" placeholder="Conform Password" required /></td>
										</tr>
										<tr>
											<td colspan="1"> </td>
											<td colspan="1">
												
												<input type="text" name="captcha_code" value="" maxlength="30" class="form-control" style="width:150px;"  placeholder="Captcha" required />
												<img src="inc/captcha_register.php" width="120" height="30" border="1" alt="CAPTCHA"> 
											</td>
										</tr>									
										<tr>
											<th></th>
											<td>		
												<input type="submit" class="btn btn-primary" name="btn_signup" onclick="return validateForm();"  style="padding:1px;" value="Sign Up" />
											</td>
										</tr>
										
									</table>
									</form>
									
								</div>
								
								
								
								<div class="tab-pane" id="three">
									<p>
										<strong>Please Enter Details For Reset Password.</strong>
									</p>
									
									<form autocomplete="off" method="post">

									<table >
													
										<tr>
											<th>Enter CNIC</th>
											<td><input type="text" name="r_cnic" id="r_cnic" value="<?php echo $r_cnic; ?>" maxlength="13" class="form-control" placeholder="1111122222223"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required /></td>
										</tr>
									
										<tr>
											<th>Enter Email</th>
											<td><input type="email" name="r_email" id="r_email" value="<?php echo $r_email; ?>" maxlength="30" class="form-control" placeholder="abc@xyz.com" required /></td>
										</tr>
										
										<tr>
											<td colspan="1"> </td>
											<td colspan="1">
												
												<input type="text" name="captcha_code" value="" maxlength="30" class="form-control" style="width:150px;"  placeholder="Captcha" required />
												<img src="inc/captcha_reset.php" width="120" height="30" border="1" alt="CAPTCHA"> 
											</td>
										</tr>	
																	
										<tr>
											<th></th>
											<td>		
												<input type="submit" class="btn btn-primary" name="btn_reset" onclick=""  style="padding:1px;" value="Reset Password" />
											</td>
										</tr>
										
									</table>
									</form>
									
								</div>
								
								
								
							</div>					
					</div>		
		</div>
		
		<div class="span6">
			<h4>Security Instructions</h4>
					<!-- start: Accordion -->
					<div class="accordion" id="accordion2">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
								<i class="icon-minus"></i> General Instructions </a>
							</div>
							<div id="collapseOne" class="accordion-body collapse in">
								<div class="accordion-inner">
										<strong>1.</strong>  Fill in the Username and password fields from the login page, as follows:
										Username: Enter your CNIC if you already have an account.
										Password: Enter Valid Password.	<br> 
										<strong>2.</strong> After typing in the correct username and password you will be logged in to the system.
										<br>
										<strong>For Non-Members:</strong>
										<br>
										a. Create a new account to gain access to member-only content.
										<br>
										b. Login to an existing account
								</div>
							</div>
						</div>
						
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								<i class="icon-plus"></i>Security Policies </a>
							</div>
							<div id="collapseTwo" class="accordion-body collapse">
								<div class="accordion-inner">
									 
To prevent your passwords from being hacked by social engineering, brute force or dictionary attack method, and keep your online accounts safe, you should notice that: 
<ul>
<li>
Do not use the same password, security question and answer for multiple important accounts. 
</li><li>
Use a password that has at least 16 characters, use at least one number, one uppercase letter, one lowercase letter and one special symbol. 
</li><li>
Do not use the names of your families, friends or pets in your passwords. 
</li><li>
Do not use postcodes, house numbers, phone numbers, birthdates, ID card numbers, social security numbers, and so on in your passwords. 
</li><li>
Do not use any dictionary word in your passwords. Examples of strong passwords: ePYHc~dS*)8$+V-' , qzRtC{6rXN3N\RgL , zbfUMZPE6`FC%)sZ. Examples of weak passwords: qwert12345, Gbt3fC79ZmMEFUFJ, 1234567890, 987654321, nortonpassword. 
</li><li>
Do not use two or more similar passwords which most of their characters are same, for example, 
ilovefreshflowersMac, ilovefreshflowersDropBox, since if one of these passwords is stolen, then it means that all of these passwords 
are stolen. 
</li><li>
Do not use something that can be cloned( but you can't change ) as your passwords, such as your fingerprints. 
</li><li>
Do not let your Web browsers( FireFox, Chrome, Safari, Opera, IE ) to store your passwords, since all passwords saved in Web 
browsers can be revealed easily. 
</li><li>
Do not log in to important accounts on the computers of others, or when connected to a public Wi-Fi hotspot, Tor, free VPN or web proxy. 
</li><li>
Do not send sensitive information online via unencrypted( e.g. HTTP or FTP ) connections, because messages 
in these connections can be sniffed with very little effort. You should use encrypted connections such as HTTPS, 
SFTP, FTPS, SMTPS, IPSec whenever possible. 
</li><li>
When travelling, you can encrypt your Internet connections before they leave your laptop, tablet, mobile phone or 
router. For example, you can set up a private VPN( with MS-CHAP v2 or stronger protocols ) on your own 
server( home computer, dedicated server or VPS ) and connect to it. Alternatively, you can set up an encrypted 
SSH tunnel between your router and your home computer
( or a remote server of your own ) with PuTTY and connect your programs( e.g. FireFox ) to PuTTY. Then even if somebody 
captures your data as it is transmitted between your device( e.g. laptop, iPhone, iPad ) 
and your server with a packet sniffer, they'll won't be able to steal your data and passwords from the encrypted streaming data. 
</li><li>
How secure is my password? Perhaps you believe that your passwords are very strong, difficult to hack. But if a hacker 
has stolen your username and the MD5 hash value of your password from a company's server, and the rainbow table of the hacker contains 
this MD5 hash, then your password will be cracked quickly. To check the strength of your passwords and know whether they're inside 
the popular rainbow tables, you can convert your passwords to MD5 hashes on a MD5 hash generator, then decrypt your passwords by submitting 
these hashes to an online MD5 decryption service. For instance, your password is "0123456789A", using the brute-force method, it may take a 
computer almost one year to crack your password, but if you decrypt it by submitting its MD5 hash( C8E7279CD035B23BB9C0F1F954DFF5B3 ) to a 
MD5 decryption website, how long will it take to crack it? You can perform the test yourself. 
</li><li>
It's recommended to change your passwords every 10 weeks. 
</li><li>
It's recommended that you remember a few master passwords, store other passwords in a plain text file and encrypt this file with 7-Zip, 
GPG or a disk encryption software such as BitLocker, or manage your 
passwords with a password management software. 
</li><li>
Encrypt and backup your passwords to different locations, then if you lost 
access to your computer or account, you can retrieve your passwords back quickly. 
</li><li>
Turn on 2-step authentication whenever possible. 
</li><li>
Do not store your critical passwords in the cloud. 
</li><li>
Access important websites( e.g. Paypal ) from bookmarks directly, otherwise 
please check its domain name carefully, it's a good idea to check the popularity of a website with Alexa 
toolbar to ensure that it's not a phishing site before entering your password. 
</li><li>
Protect your computer with firewall and antivirus software, block all incoming connections and all unnecessary outgoing connections 
with the firewall. Download software from reputable sites only, and verify the MD5 / SHA1 / SHA256 checksum or GPG signature of the 
installation package whenever possible. 
</li><li>
Keep the operating systems( e.g. Windows 7, Windows 10, Mac OS X, iOS, Linux ) and 
Web browsers( e.g. FireFox, Chrome, IE, Microsoft Edge ) of your devices( e.g. Windows PC, Mac PC, iPhone, iPad, Android tablet ) 
up-to-date by installing the latest security update. 
</li><li>
If there are important files on your computer, 
and it can be accessed by others, check if there are hardware keyloggers( e.g. wireless keyboard sniffer ), software keyloggers and
 hidden cameras when you feel it's necessary. 
 </li><li>
If there are WIFI routers in your home, then it's possible to know the passwords you typed( in your neighbor's house ) by 
 detecting the gestures of your fingers and hands, since the WIFI signal they received will change 
 when you move your fingers and hands. You can use an on-screen keyboard to type your passwords in such cases, it would be 
 more secure if this virtual keyboard( or soft keyboard ) changes layouts every time. 
 </li><li>
Lock your computer and mobile phone when 
 you leave them. 
 </li><li>
Encrypt the entire hard drive with LUKS or similar tools before putting important files on it, and destroy the hard drive of your 
 old devices physically if it's necessary. 
 </li><li>
Access important websites in private or incognito mode, or use one Web browser to access important websites, use another one to 
 access other sites. Or access unimportant websites and install new software inside a virtual machine created with VMware, VirtualBox 
 or Parallels. 
 </li><li>
Use at least 3 different email addresses, use the first one to receive emails from important sites and Apps, such as Paypal 
 and Amazon, use the second one to receive emails from unimportant sites and Apps, use the third one( from a different email provider, 
 such as Outlook and GMail ) to receive your password-reset email when the first one( e.g. Yahoo Mail ) is hacked. 
 </li><li>
Use at least 
 2 differnet phone numbers, do NOT tell others the phone number which you use to receive text messages of the verification codes. 
 </li><li>
Do not click the link in an email or SMS message, do not reset your passwords by clicking them, except that you know these 
 messages are not fake. 
 </li><li>
Do not tell your passwords to anybody in the email. 
 </li><li>
It's possible that one of the software or App you downloaded or updated has been modified by 
 hackers, you can avoid this problem by not installing this software or App at the first time, 
 except that it's published to fix security holes. You can use Web based apps instead, which are more secure and portable. 
 </li><li>
Be careful when using online paste tools and screen capture tools, do not let them to upload your passwords to the cloud. 
 </li><li>
If you're a webmaster, do not store the users passwords, security questions and answers as plain text in the database, 
 you should store the salted ( SHA1, SHA256 or SHA512 )hash values of of these strings instead. It's recommended 
 to generate a unique random salt string for each user. In addition, it's a good idea to log the user's device 
 information( e.g. OS version, screen resolution, etc. ) and save the salted hash values of them, then when he/she try to login with 
 the correct password but his/her device information does NOT match the previous saved one, let this user to verify his/her identity 
 by entering another verification code sent via SMS or email. 
 </li><li>
If you are a software developer, you should publish the update package signed with a private key using GnuPG, and verify the 
 signature of it with the public key published previously. 
 </li><li>
To keep your online business safe, you should register a domain name 
 of your own, and set up an email account with this domain name, then you'll not lose your email account and all your contacts, 
 since your can host your mail server anywhere, your email account can't be disabled by the email provider. 
 </li><li>
If an online shopping site only allows to make payment with credit cards, then you should use a virtual credit card instead. 
 </li><li>
Close your web browser when you leave your computer, otherwise the cookies can be intercepted with a small USB device easily, 
 making it possible to bypass two-step verification and log into your account with stolen cookies on other computers. 
 </li><li>
Distrust and remove bad SSL certificates from your Web browser, otherwise you will NOT be able to ensure the confidentiality 
 and integrity of the HTTPS connections which use these certificates. 38. Encrypt the entire system partition, otherwise please 
 disable the pagefile and hibernation functions, since it's possible to find your important documents in the pagefile.sys and hiberfil.sys 
 files. 
 </li><li>
To prevent brute force login attacks to your dedicated servers, VPS servers or cloud servers, you can install an intrusion  
 detection and prevention software such as LFD( Login Failure Daemon ) or Fail2Ban.
 </li>
 </ul>									 
									 
									 
								</div>
							</div>
						</div>
						
					</div>
					<!--end: Accordion -->	
		</div>
	</div>
	</div>



<?php 

include("footer.php"); 

?>

