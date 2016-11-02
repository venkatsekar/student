<?php

class Student extends Model {

	function list_board()
	{
		$query = "SELECT DISTINCT b.board_id, ssb.board_name FROM board b,school_boards ssb
				  WHERE ssb.school_board_id = b.school_board_id AND b.status = 1";
		return $this->db->query($query);
	}
	//List Class
	function list_class()
	{
		$query = "SELECT DISTINCT * FROM classes
				  WHERE status = 1";
		return $this->db->query($query);
	}
	//List Subject
	function list_subject()
	{
		$query = "SELECT DISTINCT s.*,gs.grading_name FROM subject s,grading_system gs
				  WHERE s.grading_id = gs.grading_id AND s.status = 1";
		return $this->db->query($query);
	}
	function list_student_details()
	{
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'first_name', 
			1 =>'email_id', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT ui.*,si.student_info_id,ss.student_subject_id FROM user_info ui, student_info si, student_subject ss WHERE ui.user_info_id = si.user_info_id AND si.student_info_id = ss.student_info_id AND ss.status = 1 AND si.status = 1 AND ui.status =1";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT ui.*,si.student_info_id,ss.student_subject_id FROM user_info ui, student_info si, student_subject ss WHERE ui.user_info_id = si.user_info_id AND si.student_info_id = ss.student_info_id AND ss.status = 1 AND si.status = 1 AND ui.status =1";		
		
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		//$other = array();
		$data = array();
		$query = $this->db->query($sql);
		
		$data = array();
		foreach( $query as $_) {  // preparing an array
			//$lname = (strlen($_['last_name'])>1) ? substr(($_['last_name']),0,1) .'' : $_['last_name'];	
			$nestedData=array();
			$nestedData[] = $_['first_name'] . $_['last_name'];
			$nestedData[] = $_['email_id'];
			$nestedData[] ='<a class="btn btn-info " href='.BASEURL.'student/edit/'.base64_encode($_['user_info_id']).'><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:delete_user_student('.$_["user_info_id"].','.$_["student_info_id"].','.$_["student_subject_id"].')"><i class="fa fa-times"></i> Remove</a>';
           	$data[] = $nestedData;
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);
		//var $jString = JSON.stringify(jsonArray);
		return $json_data;		
	}

	function add_new_student($FirstName, $LastName,$Email, $LoginId, $Password,$Question, $Answer, $KnowAbout,$FatherName, $FatherOccu, $MotherName, $MotherOccu, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $BrotherName, $BrotherDob, $SisterName, $SisterDob, $SchoolName, $BoardId, $ClassId, $FirstScoreCard, $SecScoreCard, $ThirdScoreCard, $StudentSubjectId, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$user_info = array( 'first_name' => $FirstName,
							'last_name' => $LastName, 
							'email_id' => $Email,
							'login_id' => $LoginId, 
							'password' => $Password, 
							'question_id' => $Question, 
							'answer' => $Answer,
							'know_about' => $KnowAbout,
							'last_pass_change' => $CurrentTime,
							'last_login_date' => $CurrentTime,
							'login_expire_date' => $CurrentTime,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						  );
		$this->db->insert('user_info', $user_info);
		$UserInfoId = $this->db->lastinsertid();
		$student_info = array(  'user_info_id' => $UserInfoId,
								'father_name' => $FatherName, 
								'father_occupation' => $FatherOccu,
								'mother_name' => $MotherName,
								'mother_occupation' => $MotherOccu, 
								'date_of_birth' => $DateOfBirth, 
								'address_line1' => $Address,
								'city' => $City, 
								'state_id' => $State, 
								'first_contact_number' => $FirstContact, 
								'second_contact_number' => $SecondContact, 
								'third_contact_number' => $ThirdContact, 
								'bank_account_number' => $BankAccNo,
								'bank_name' => $BankName, 
								'ifsc_code' => $IfscCode, 
								'bank_branch' => $BankBranch, 
								'brother_name' => $BrotherName, 
								'brother_dob' => $BrotherDob,
								'sister_name' => $SisterName,
								'sister_dob' => $SisterDob,
								'school_name' => $SchoolName,
								'board_id' => $BoardId,
								'class_id' => $ClassId,
								'first_score_card' => $FirstScoreCard, 
								'second_score_card' => $SecScoreCard,
								'third_score_card' => $ThirdScoreCard, 
								'student_subject_id' => $StudentSubjectId, 
								'remarks' => $Remarks,
								'date_added' => $CurrentTime,
								'last_modified' => $CurrentTime,
								'status' => 1
							);
		$this->db->insert('student_info', $student_info);
		$StudentInfoId = $this->db->lastinsertid();
		$student_subject =  array('student_info_id' => $StudentInfoId,
							'subject_id' => $StudentSubjectId,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						);
		return $this->db->insert('student_subject', $student_subject);
	}

	function edit_student($UserInfoId)
	{
		$query = "  SELECT ui.*,si.*,ss.*
					FROM user_info ui, student_info si, student_subject ss 
					WHERE ui.user_info_id = si.user_info_id AND ui.user_info_id = '$UserInfoId' AND si.student_info_id = ss.student_info_id AND ss.status = 1 AND si.status = 1 AND ui.status =1";
		return $this->db->query($query);
	}

	function update_student($UserInfoId, $StudentInfoId, $StudentSubjectId, $FirstName, $LastName,$Email, $LoginId, $Password,$Question, $Answer, $KnowAbout,$FatherName, $FatherOccu, $MotherName, $MotherOccu, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $BrotherName, $BrotherDob, $SisterName, $SisterDob, $SchoolName, $BoardId, $ClassId, $FirstScoreCard, $SecScoreCard, $ThirdScoreCard, $StudentSubjectId, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$user_info = array( 'first_name' => $FirstName,
							'last_name' => $LastName, 
							'email_id' => $Email,
							'login_id' => $LoginId, 
							'password' => $Password, 
							'question_id' => $Question, 
							'answer' => $Answer,
							'know_about' => $KnowAbout,
							'last_pass_change' => $CurrentTime,
							'last_login_date' => $CurrentTime,
							'login_expire_date' => $CurrentTime,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						  );
		$user_where = array( 'user_info_id' => $UserInfoId);
		$this->db->update('user_info', $user_info, $user_where);
		$student_info = array(  'user_info_id' => $UserInfoId,
								'father_name' => $FatherName, 
								'father_occupation' => $FatherOccu,
								'mother_name' => $MotherName,
								'mother_occupation' => $MotherOccu, 
								'date_of_birth' => $DateOfBirth, 
								'address_line1' => $Address,
								'city' => $City, 
								'state_id' => $State, 
								'first_contact_number' => $FirstContact, 
								'second_contact_number' => $SecondContact, 
								'third_contact_number' => $ThirdContact, 
								'bank_account_number' => $BankAccNo,
								'bank_name' => $BankName, 
								'ifsc_code' => $IfscCode, 
								'bank_branch' => $BankBranch, 
								'brother_name' => $BrotherName, 
								'brother_dob' => $BrotherDob,
								'sister_name' => $SisterName,
								'sister_dob' => $SisterDob,
								'school_name' => $SchoolName,
								'board_id' => $BoardId,
								'class_id' => $ClassId,
								'first_score_card' => $FirstScoreCard, 
								'second_score_card' => $SecScoreCard,
								'third_score_card' => $ThirdScoreCard, 
								'student_subject_id' => $StudentSubjectId, 
								'remarks' => $Remarks,
								'date_added' => $CurrentTime,
								'last_modified' => $CurrentTime,
								'status' => 1
							);
		$student_where = array( 'student_info_id' => $StudentInfoId);
		$this->db->update('student_info', $student_info, $student_where);
		$student_subject =  array('student_info_id' => $StudentInfoId,
							'subject_id' => $StudentSubjectId,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						);
		$student_where1 = array( 'student_subject_id' => $StudentSubjectId );
		return $this->db->update('student_subject', $student_subject, $student_where1);
	}
	
	function delete_student($UserInfoId, $StudentInfoId, $StudentSubjectId)
	{
		date_default_timezone_set('Asia/Kolkata');

			$DateTime = new DateTime();
			$CurrentTime = $DateTime ->format('y-m-d H:i:s');
			$user_info = array( 'last_modified' => $CurrentTime,
								'status' => 0
							  );
			$user_where = array( 'user_info_id' => $UserInfoId);
			$this->db->update('user_info', $user_info, $user_where);
			$student_info = array(  'user_info_id' => $UserInfoId,
									'last_modified' => $CurrentTime,
									'status' => 0
								);
			$student_where = array( 'student_info_id' => $StudentInfoId);
			$this->db->update('student_info', $student_info, $student_where);
			$student_subject =  array( 'last_modified' => $CurrentTime,
									   'status' => 0
							);
			$student_where1 = array( 'student_subject_id' => $StudentSubjectId );
			return $this->db->update('student_subject', $student_subject, $student_where1);
	}
}