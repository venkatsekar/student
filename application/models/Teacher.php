<?php

class Teacher extends Model {
	//List Class
	function list_class()
	{
		$query = "SELECT DISTINCT * FROM classes
				  WHERE status = 1";
		return $this->db->query($query);
	}

	function list_teacher_details()
	{
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'first_name', 
			1 =>'email_id', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT ui.*,ti.teacher_info_id FROM user_info ui, teacher_info ti, teacher_qualification tq, teacher_classes tc WHERE ui.user_info_id = ti.user_info_id AND ti.teacher_info_id = tq.teacher_info_id AND tq.teacher_info_id = tc.teacher_info_id AND ui.status = 1 AND ti.status = 1 AND tq.status =1 AND tc.status = 1 GROUP BY tq.teacher_info_id";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT ui.*,ti.teacher_info_id FROM user_info ui, teacher_info ti, teacher_qualification tq, teacher_classes tc WHERE ui.user_info_id = ti.user_info_id AND ti.teacher_info_id = tq.teacher_info_id AND ui.status = 1 AND ti.status = 1 AND tq.status =1 AND tc.status = 1 GROUP BY tq.teacher_info_id";		
		
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
			$nestedData[] ='<a class="btn btn-info " href='.BASEURL.'teacher/edit/'.base64_encode($_['user_info_id']).'><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:delete_user_student('.$_["user_info_id"].','.$_["teacher_info_id"].')"><i class="fa fa-times"></i> Remove</a>';
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

	function add_new_teacher($FirstName, $LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $ClassRoom, $CurrentSchool, $CurrentSchoolJoin, $CurrentSchoolToJoin, $PrevSchool, $PrevSchoolJoin, $PrevSchoolToJoin, $Remarks)
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
		$teacher_info = array(  'user_info_id' => $UserInfoId,
								'date_of_birth' => $DateOfBirth, 
								'address_line_1' => $Address,
								'city' => $City, 
								'state' => $State, 
								'first_contact_number' => $FirstContact, 
								'second_contact_number' => $SecondContact, 
								'third_contact_number' => $ThirdContact, 
								'bank_account_number' => $BankAccNo,
								'bank_name' => $BankName, 
								'ifsc_code' => $IfscCode, 
								'bracnh_name' => $BankBranch, 
								'class_room' => $ClassRoom,
								'current_school_name' => $CurrentSchool,
								'current_school_joining_date' => $CurrentSchoolJoin,
								'current_school_to_date' => $CurrentSchoolToJoin,
								'previous_school_name' => $PrevSchool, 
								'previous_school_joining_date' => $PrevSchoolJoin,
								'previous_school_to_date' => $PrevSchoolToJoin, 
								'remarks' => $Remarks,
								'date_added' => $CurrentTime,
								'last_modified' => $CurrentTime,
								'status' => 1
							);
		$this->db->insert('teacher_info', $teacher_info);
		$TeacherInfoId = $this->db->lastinsertid();
		
		return $TeacherInfoId;
	}

	function add_new_quali($TeacherInfoId, $Qualification)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$teacher_quali =  array('teacher_info_id' => $TeacherInfoId,
							'qualification_name' => $Qualification,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						);
		return $this->db->insert('teacher_qualification', $teacher_quali);
		
	}

	function add_new_class($TeacherInfoId, $ClassId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$teacher_class =  array('teacher_info_id' => $TeacherInfoId,
							'class_id' => $ClassId,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						);
		return $this->db->insert('teacher_classes', $teacher_class);
	}

	function edit_teacher($UserInfoId)
	{
		$query = "  SELECT ui.*,ti.*
					FROM user_info ui, teacher_info ti
					WHERE ui.user_info_id = ti.user_info_id AND ui.user_info_id = '$UserInfoId' AND ti.status = 1 AND ui.status =1";
		return $this->db->query($query);
	}

	function edit_class($UserInfoId)
	{
		$query = "  SELECT tc.*
					FROM teacher_info ti, teacher_classes tc
					WHERE ti.teacher_info_id = tc.teacher_info_id AND ti.user_info_id = '$UserInfoId' AND ti.status = 1 AND tc.status =1";
		return $this->db->query($query);
	}

	function edit_quali($UserInfoId)
	{
		$query = "  SELECT tq.*
					FROM teacher_info ti, teacher_qualification tq 
					WHERE ti.teacher_info_id = tq.teacher_info_id AND ti.user_info_id = '$UserInfoId' AND ti.status = 1 AND tq.status =1";
		return $this->db->query($query);
	
	}

	function update_teacher($UserInfoId, $TeacherInfoId, $FirstName, $LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $ClassRoom, $CurrentSchool, $CurrentSchoolJoin, $CurrentSchoolToJoin, $PrevSchool, $PrevSchoolJoin, $PrevSchoolToJoin, $Remarks)
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
		$user_where = array('user_info_id' => $UserInfoId );
		$this->db->update('user_info', $user_info, $user_where);
		$teacher_info = array(  'user_info_id' => $UserInfoId,
								'date_of_birth' => $DateOfBirth, 
								'address_line_1' => $Address,
								'city' => $City, 
								'state' => $State, 
								'first_contact_number' => $FirstContact, 
								'second_contact_number' => $SecondContact, 
								'third_contact_number' => $ThirdContact, 
								'bank_account_number' => $BankAccNo,
								'bank_name' => $BankName, 
								'ifsc_code' => $IfscCode, 
								'bracnh_name' => $BankBranch, 
								'class_room' => $ClassRoom,
								'current_school_name' => $CurrentSchool,
								'current_school_joining_date' => $CurrentSchoolJoin,
								'current_school_to_date' => $CurrentSchoolToJoin,
								'previous_school_name' => $PrevSchool, 
								'previous_school_joining_date' => $PrevSchoolJoin,
								'previous_school_to_date' => $PrevSchoolToJoin, 
								'remarks' => $Remarks,
								'date_added' => $CurrentTime,
								'last_modified' => $CurrentTime,
								'status' => 1
							);
		$teacher_where = array('teacher_info_id' => $TeacherInfoId );
		return $this->db->update('teacher_info', $teacher_info, $teacher_where);
	}

	function delete_teacher($UserInfoId, $TeacherInfoId)
	{
		date_default_timezone_set('Asia/Kolkata');

			$DateTime = new DateTime();
			$CurrentTime = $DateTime ->format('y-m-d H:i:s');
			$user_info = array( 'last_modified' => $CurrentTime,
								'status' => 0
							  );
			$user_where = array( 'user_info_id' => $UserInfoId);
			$this->db->update('user_info', $user_info, $user_where);
			$teacher_info = array(  'user_info_id' => $UserInfoId,
									'last_modified' => $CurrentTime,
									'status' => 0
								);
			$teacher_where = array( 'teacher_info_id' => $TeacherInfoId);
			$this->db->update('teacher_info', $teacher_info, $teacher_where);
			$teacher_quali =  array( 'last_modified' => $CurrentTime,
									   'status' => 0
							);
			$teacher_where1 = array( 'teacher_info_id' => $TeacherInfoId );
			$this->db->update('teacher_qualification', $teacher_quali, $teacher_where1);
			$teacher_class =  array( 'last_modified' => $CurrentTime,
									   'status' => 0
							);
			$teacher_where2 = array( 'teacher_info_id' => $TeacherInfoId );
			return $this->db->update('teacher_classes', $teacher_class, $teacher_where2);
	}
}