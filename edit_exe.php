<?php 
include("inc/validate_login.php");
session_start();
 
$sess_row_id  = $_SESSION["ROW_ID"];

$act = $_REQUEST['act'];



function api_insert_data($did,$json_post_data){
	if(!empty($did)){

		$payload = $json_post_data;
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



 
if(!empty($sess_row_id)){ 
if($act == 'update_profile'){
	$txt_name = $_REQUEST['txt_name'];
	$txt_fname = $_REQUEST['txt_fname'];
	$txt_gender = $_REQUEST['txt_gender'];
	$txt_DOB = $_REQUEST['txt_DOB'];
	$txt_religion = $_REQUEST['txt_religion'];
	$txt_sect = $_REQUEST['txt_sect'];
	$txt_caste = $_REQUEST['txt_caste'];
	$txt_martial = $_REQUEST['txt_martial'];
	$txt_civ_ex = $_REQUEST['txt_civ_ex'];
	

	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'txt_name' => $txt_name, 					
	'txt_fname' => $txt_fname, 					
	'txt_gender' => $txt_gender, 					
	'txt_DOB' => $txt_DOB, 					
	'txt_religion' => $txt_religion, 					
	'txt_sect' => $txt_sect, 					
	'txt_caste' => $txt_caste, 					
	'txt_martial' => $txt_martial, 					
	'txt_civ_ex' => $txt_civ_ex 					
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1053",$json_enc_data3);	
	echo $resp_insert;
	 
}
else if($act == 'update_address'){


	$E_EMAIL = $_REQUEST['E_EMAIL'];
	$E_MOBILE = $_REQUEST['E_MOBILE'];
	$E_PHONE_NO = $_REQUEST['E_PHONE_NO'];
	$E_DOM_DIST_ID = $_REQUEST['E_DOM_DIST_ID'];
	$E_PERM_ADDRESS = $_REQUEST['E_PERM_ADDRESS'];
	$E_PERM_DIST_ID = $_REQUEST['E_PERM_DIST_ID'];
	$E_PERM_TEHS_ID = $_REQUEST['E_PERM_TEHS_ID'];
	$E_PRES_ADDRESS = $_REQUEST['E_PRES_ADDRESS'];
	$E_PRES_DIST_ID = $_REQUEST['E_PRES_DIST_ID'];
	$E_PRES_TEHS_ID = $_REQUEST['E_PRES_TEHS_ID'];
	
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'E_EMAIL' => $E_EMAIL, 					
	'E_MOBILE' => $E_MOBILE, 					
	'E_PHONE_NO' => $E_PHONE_NO, 					
	'E_DOM_DIST_ID' => $E_DOM_DIST_ID, 					
	'E_PERM_ADDRESS' => $E_PERM_ADDRESS, 					
	'E_PERM_DIST_ID' => $E_PERM_DIST_ID, 					
	'E_PERM_TEHS_ID' => $E_PERM_TEHS_ID, 					
	'E_PRES_ADDRESS' => $E_PRES_ADDRESS, 					
	'E_PRES_DIST_ID' => $E_PRES_DIST_ID, 					
	'E_PRES_TEHS_ID' => $E_PRES_TEHS_ID					
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1054",$json_enc_data3);	
	echo $resp_insert;
	
	  
	

 
}
else if($act == 'update_education'){

	$EDU_LEVEL_ID = $_REQUEST['EDU_LEVEL_ID'];
	$EDU_FIELD_ID = $_REQUEST['EDU_FIELD_ID'];
	$PASS_YEAR = $_REQUEST['PASS_YEAR'];
	$INSTITUTE = $_REQUEST['INSTITUTE'];
	$GPA_GRADE = $_REQUEST['GPA_GRADE'];

	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'EDU_LEVEL_ID' => $EDU_LEVEL_ID, 					
	'EDU_FIELD_ID' => $EDU_FIELD_ID, 					
	'PASS_YEAR' => $PASS_YEAR, 					
	'INSTITUTE' => $INSTITUTE, 					
	'GPA_GRADE' => $GPA_GRADE				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1055",$json_enc_data3);	
	echo $resp_insert;
	

}
else if($act == 'deleteEducat'){

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1056",$json_enc_data3);	
	echo $resp_insert;
	
}
else if($act == 'add_profqual'){

	$PQ_COURCE_TITLE = $_REQUEST['PQ_COURCE_TITLE'];
	$PQ_COURCE_FIELD = $_REQUEST['PQ_COURCE_FIELD'];
	$PQ_INSTITUTE = $_REQUEST['PQ_INSTITUTE'];
	$PQ_DURATION_FROM = $_REQUEST['PQ_DURATION_FROM'];
	$PQ_DURATION_TO = $_REQUEST['PQ_DURATION_TO'];
	$PQ_RESULT = $_REQUEST['PQ_RESULT'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'PQ_COURCE_TITLE' => $PQ_COURCE_TITLE, 					
	'PQ_COURCE_FIELD' => $PQ_COURCE_FIELD, 					
	'PQ_INSTITUTE' => $PQ_INSTITUTE, 					
	'PQ_DURATION_FROM' => $PQ_DURATION_FROM, 					
	'PQ_DURATION_TO' => $PQ_DURATION_TO, 					
	'PQ_RESULT' => $PQ_RESULT  				
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1057",$json_enc_data3);	
	echo $resp_insert;	 
}
else if($act == 'delete_proqual'){

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1058",$json_enc_data3);	
	echo $resp_insert;
	
}
else if($act == 'add_award'){

	$AW_AWARD_DETAILS = $_REQUEST['AW_AWARD_DETAILS'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'AW_AWARD_DETAILS' => $AW_AWARD_DETAILS	
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1059",$json_enc_data3);	
	echo $resp_insert;	 
						
	
}
else if($act == 'delete_award'){

	$id = $_REQUEST['id'];

	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1060",$json_enc_data3);	
	echo $resp_insert;
 
}
else if($act == 'add_hobby'){

	$HB_HOBBY_DETAILS = $_REQUEST['HB_HOBBY_DETAILS'];
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'HB_HOBBY_DETAILS' => $HB_HOBBY_DETAILS	
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1061",$json_enc_data3);	
	echo $resp_insert;	 
	
		
}
else if($act == 'delete_hobby'){

	$id = $_REQUEST['id'];
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1062",$json_enc_data3);	
	echo $resp_insert;
		
}
else if($act == 'add_emphist'){ 

	$EH_ORGANIZATION_NAME = $_REQUEST['EH_ORGANIZATION_NAME'];
	$EH_POSITION_NAME = $_REQUEST['EH_POSITION_NAME'];
	$EH_LAST_PAY = $_REQUEST['EH_LAST_PAY'];
	$EH_FROM_DATE = $_REQUEST['EH_FROM_DATE'];
	$EH_DATE_TO = $_REQUEST['EH_DATE_TO'];
	$EH_LEAVE_REASON = $_REQUEST['EH_LEAVE_REASON'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'EH_ORGANIZATION_NAME' => $EH_ORGANIZATION_NAME,	
	'EH_POSITION_NAME' => $EH_POSITION_NAME,	
	'EH_LAST_PAY' => $EH_LAST_PAY,	
	'EH_FROM_DATE' => $EH_FROM_DATE,	
	'EH_DATE_TO' => $EH_DATE_TO,	
	'EH_LEAVE_REASON' => $EH_LEAVE_REASON	
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1063",$json_enc_data3);	
	echo $resp_insert;	 
			
}
else if($act == 'add_military_svc'){ 

//  MIL_ARMY_NO_RANK AMIL_RMY_PAF_NAVY  MIL_CORPS_REGT  MIL_ENROLL_DATE  MIL_DISCHARGE_DATE  MIL_DISCHARGE_REASON  MIL_MEDICAL_CAT 

	$MIL_ARMY_NO_RANK = $_REQUEST['MIL_ARMY_NO_RANK'];
	$AMIL_RMY_PAF_NAVY = $_REQUEST['AMIL_RMY_PAF_NAVY'];
	$MIL_CORPS_REGT = $_REQUEST['MIL_CORPS_REGT'];
	$MIL_ENROLL_DATE = $_REQUEST['MIL_ENROLL_DATE'];
	$MIL_DISCHARGE_DATE = $_REQUEST['MIL_DISCHARGE_DATE'];
	$MIL_DISCHARGE_REASON = $_REQUEST['MIL_DISCHARGE_REASON'];
	$MIL_MEDICAL_CAT = $_REQUEST['MIL_MEDICAL_CAT'];

	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'MIL_ARMY_NO_RANK' => $MIL_ARMY_NO_RANK,	
	'AMIL_RMY_PAF_NAVY' => $AMIL_RMY_PAF_NAVY,	
	'MIL_CORPS_REGT' => $MIL_CORPS_REGT,	
	'MIL_ENROLL_DATE' => $MIL_ENROLL_DATE,	
	'MIL_DISCHARGE_DATE' => $MIL_DISCHARGE_DATE,	
	'MIL_DISCHARGE_REASON' => $MIL_DISCHARGE_REASON,	
	'MIL_MEDICAL_CAT' => $MIL_MEDICAL_CAT	
	);	
	
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1065",$json_enc_data3);	
	echo $resp_insert;	 
	
	
}
else if($act == 'delete_emphist'){ 

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1064",$json_enc_data3);	
	echo $resp_insert;
	
}
else if($act == 'delete_miltary_svc'){ 

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1066",$json_enc_data3);	
	echo $resp_insert; 
}
else if($act == 'me_have_disease'){ 

	$id = $_REQUEST['val'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1067",$json_enc_data3);	
	echo $resp_insert; 
}
else if($act == 'me_have_diable'){ 

	$id = $_REQUEST['val'];
		
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1068",$json_enc_data3);	
	echo $resp_insert; 
	
}
else if($act == 'me_have_termin'){ 

	$id = $_REQUEST['val'];
		
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1069",$json_enc_data3);	
	echo $resp_insert; 
	
	 
}
else if($act == 'me_have_punish'){ 

	$id = $_REQUEST['val'];
		
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1070",$json_enc_data3);	
	echo $resp_insert; 
	
}
else if($act == 'me_have_pun_paf'){ 

	$id = $_REQUEST['val'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1071",$json_enc_data3);	
	echo $resp_insert; 
}
else if($act == 'me_have_desert'){ 

	$id = $_REQUEST['val'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1072",$json_enc_data3);	
	echo $resp_insert; 
}
else if($act == 'me_have_wlg_p'){ 

	$id = $_REQUEST['val'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1073",$json_enc_data3);	
	echo $resp_insert; 	 
}
else if($act == 'delete_RF'){ 

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1074",$json_enc_data3);	
	echo $resp_insert; 
	
	
}
else if($act == 'add_RF'){ 

	$RF_ENAME = $_REQUEST['RF_ENAME'];
	$RF_R_ADDRESS = $_REQUEST['RF_R_ADDRESS'];
	$RF_R_PHONE = $_REQUEST['RF_R_PHONE'];
	$RF_R_E_MAIL = $_REQUEST['RF_R_E_MAIL'];
	
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'RF_ENAME' => $RF_ENAME, 					
	'RF_R_ADDRESS' => $RF_R_ADDRESS, 					
	'RF_R_PHONE' => $RF_R_PHONE, 									
	'RF_R_E_MAIL' => $RF_R_E_MAIL 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1075",$json_enc_data3);	
	echo $resp_insert; 

}
else if($act == 'delete_BRel'){ 

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1076",$json_enc_data3);	
	echo $resp_insert; 	 
}
else if($act == 'add_BRel'){ 

	$BR_ENAME = $_REQUEST['BR_ENAME'];
	$BR_DESG_NAME = $_REQUEST['BR_DESG_NAME'];
	$BR_RELATION = $_REQUEST['BR_RELATION'];
	$BR_DEPARTMENT = $_REQUEST['BR_DEPARTMENT'];
	$BR_B_LOCATION = $_REQUEST['BR_B_LOCATION'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'BR_ENAME' => $BR_ENAME, 					
	'BR_DESG_NAME' => $BR_DESG_NAME, 					
	'BR_RELATION' => $BR_RELATION, 									
	'BR_DEPARTMENT' => $BR_DEPARTMENT, 									
	'BR_B_LOCATION' => $BR_B_LOCATION 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1077",$json_enc_data3);	
	echo $resp_insert; 
				 
}
else if($act == 'delete_DStat'){ 

	$id = $_REQUEST['id'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'id' => $id 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1078",$json_enc_data3);	
	echo $resp_insert; 	 

	
}
else if($act == 'add_DStat'){ 
 

	$DS_STATION_NAME = $_REQUEST['DS_STATION_NAME'];
	$DS_REASON = $_REQUEST['DS_REASON'];
	
	$data3 = array(
	'sess_row_id' => $sess_row_id, 					
	'DS_STATION_NAME' => $DS_STATION_NAME, 					
	'DS_REASON' => $DS_REASON 				
	);		 
	$json_enc_data3 = json_encode($data3);		
	$resp_insert = api_insert_data("insertData1079",$json_enc_data3);	
	echo $resp_insert; 
	
 
}





}



?>