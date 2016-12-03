<?php
class Role extends Model {

	function list_pages()
	{
		$query = " SELECT page_id, page_name
				   FROM pages
				   WHERE status = 1 ORDER BY page_id";
		return $this->db->query($query);
	}

	//Get Role values from role table
	function list_roles() 
	{
		$query = "SELECT role_id, role_name  FROM role
					WHERE status = 1";
		return $this->db->query($query);
	}

	function add_new_role($RoleName, $UserId)
	{
		date_default_timezone_set('Asia/Kolkata');
		
		$DateTime = new DateTime();
		$CurrentTime = $DateTime->format('Y-m-d H:i:s');
		$Status = 1;

		$values = array(
			'role_name' => $RoleName,
			'updated_by' => $UserId,
			'date_added' => $CurrentTime,
			'last_modified' => $CurrentTime,
			'status' => $Status	
		);
		$this->db->insert('role', $values);
		return $this->db->lastInsertId();
	}

	function add_roles($RoleId, $PageId, $UserId)
	{
		date_default_timezone_set('Asia/Kolkata');
		
		$DateTime = new DateTime();
		$CurrentTime = $DateTime->format('Y-m-d H:i:s');
		$Status = 1;

		$values = array(
			'role_id' => $RoleId,
			'page_id' => $PageId,
			'updated_by' => $UserId,
			'date_added' => $CurrentTime,
			'last_modified' => $CurrentTime,
			'status' => $Status	
		);
		return $this->db->insert('roles_pages', $values);
	}

	function update_role($RoleId, $RoleName, $UserId)
	{
		date_default_timezone_set('Asia/Kolkata');
		
		$DateTime = new DateTime();
		$CurrentTime = $DateTime->format('Y-m-d H:i:s');
		$Status = 1;
		
		$values = array(
			'role_name' => $RoleName,
			'updated_by' => $UserId,
			'last_modified' => $CurrentTime,
			'status' => $Status		
		);
		$where = array(
			'role_id' => $RoleId
		);
		return $this->db->update('role', $values, $where);	
	}

	function edit_roles($RoleId)
	{
		$query = " SELECT DISTINCT r.role_id, r.role_name, rpg.role_page_id, pg.page_id, pg.page_name
				   FROM role r, pages pg, roles_pages rpg
				   WHERE r.role_id = rpg.role_id AND pg.page_id = rpg.page_id AND r.role_id ='$RoleId' ANd rpg.status = 1";
		return $this->db->query($query);
	}
	
	function edit_rolename($RoleId)
	{
		$query = "SELECT role_id, role_name  FROM role
					WHERE role_id = '$RoleId' AND status = 1";
		return $this->db->query($query);
	}
	function unedit_roles($UnEditRoleId)
	{
		$query = " SELECT pg.page_name,pg.page_id FROM pages pg 
				   WHERE pg.status = 1 AND pg.page_id NOT IN (SELECT rpg.page_id FROM  roles_pages rpg,role r WHERE r.role_id = rpg.role_id AND rpg.role_id='$UnEditRoleId')";
		return $this->db->query($query);
	}

	function remove_page_roleid($RolePagesId, $PageId, $RoleId)
	{
		

		$areaquery = " DELETE FROM roles_pages WHERE role_page_id ='$RolePagesId' AND page_id ='$PageId' AND role_id='$RoleId'";

		return $this->db->query($areaquery);
	}

	function check_role($RoleId)
	{
		$query = " SELECT DISTINCT r.role_id 
				   FROM role r, user u, user_role ur
				   WHERE r.role_id = ur.role_id AND u.user_id = ur.user_id AND r.role_id = '$RoleId' AND r.status=1 and ur.status = 1";
		return $this->db->query($query);
	}
	function delete($RoleId)
	{
		$Status = 0;

		$RolePages = " UPDATE roles_pages SET status = '$Status' WHERE role_id ='$RoleId'";

		$this->db->query($RolePages);

		$UserRole = " UPDATE user_role SET status = '$Status' WHERE role_id ='$RoleId'";

		$this->db->query($UserRole);
		$values = array(
			'status' => $Status
		);

		$where = array(
			'role_id' => $RoleId
		);
        /* resurn goes to the controller for condition check */
		return $this->db->update('role', $values, $where);
	}
}