<?php

class Role extends Model {
		
	//List Roles
	function list_role()
	{
		$query = "SELECT DISTINCT * FROM role
				  WHERE status = 1";
		return $this->db->query($query);
	}
	//Add Roles
	function add_role($RoleName)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('role_name' => $RoleName,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		return $this->db->insert('role', $value);
	}
	//Update Roles
	function update_role($RoleId, $RoleName)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('role_name' => $RoleName,
					   'last_modified' => $CurrentTime
					   );
		$where = array('role_id' => $RoleId);
		return $this->db->update('role', $value, $where);

	}
	//Delete Role
	function delete_role($RoleId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('role_id' => $RoleId);
		return $this->db->update('role', $value, $where);

	}

}