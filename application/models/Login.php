<?php

class Login extends Model {

	function get_roles()
	{
		$query = " SELECT * FROM role 
				   WHERE status = 1";
		return $this->db->query($query);
	}

	function add_user_info($FacebookId, $Email)
	{
		date_default_timezone_set('Asia/Kolkata');
		
		$DateTime = new DateTime();
		$CurrentTime = $DateTime->format('Y-m-d H:i:s');
		$Status = 1;
		$UserId = 1;

		$values = array(
			'facebook_id' => $FacebookId,
			'email_address' => $Email,
			'created_by' => $UserId,
			'created_date' => $CurrentTime,			
			'status' => $Status	
		);
		$this->db->insert('user_info', $values);		
		return $this->db-> lastinsertid();
	}

	function add_users($RoleId, $FirstName,$LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout)
	{
		date_default_timezone_set('Asia/Kolkata');
		
		$DateTime = new DateTime();
		$CurrentTime = $DateTime->format('Y-m-d H:i:s');

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
							'status' => 2
						  );
		$this->db->insert('user_info', $user_info);
		$UserInfoId = $this->db->lastinsertid();
		$user_role = array( 'role_id' => $RoleId,
							'user_info_id' => $UserInfoId, 
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						  );
		$this->db->insert('user_role', $user_info);
		return $UserInfoId;
		
	}	
	
	
	function user_activate($UserInfoId)
	{
		$Status = 1;

		$values = array(
			'status' => $Status
		);

		
		$whereui = array(
			'user_info_id' => $UserInfoId
		);

		
		return $this->db->update('user_info', $values, $whereui);
		
	}	
}