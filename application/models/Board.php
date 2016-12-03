<?php

class Board extends Model {
		
	//List Roles
	function list_board()
	{
		$query = "SELECT DISTINCT * FROM school_boards
				  WHERE status = 1";
		return $this->db->query($query);
	}
	//Add Roles
	function add_board($BoardName)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('board_name' => $BoardName,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		$this->db->insert('school_boards', $value);
		return $this->db->lastinsertid();
	}

	function add_new_terms($SchBoardId, $Terms)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('terms' => $Terms,
						'school_board_id' => $SchBoardId,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		$this->db->insert('board_terms', $value);
		return $this->db->lastinsertid();
	}

	function list_edit_board($SchBoardId)
	{
		$query = "SELECT DISTINCT * FROM school_boards
				  WHERE status = 1 AND school_board_id = '$SchBoardId'";
		return $this->db->query($query);
	}

	function list_edit_terms($SchBoardId)
	{
		$query = "SELECT DISTINCT * FROM board_terms
				  WHERE status = 1 AND school_board_id = '$SchBoardId'";
		return $this->db->query($query);
	}

	function update_terms($BoardTermId, $Terms)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('terms' => $Terms,
					   'last_modified' => $CurrentTime
					   );
		$where = array('board_term_id' => $BoardTermId);
		return $this->db->update('board_terms', $value, $where);
	}

	function delete_terms($BoardTermId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('last_modified' => $CurrentTime,
					   'status' => 0
					   );
		$where = array('board_term_id' => $BoardTermId);
		return $this->db->update('board_terms', $value, $where);
	}
	//Update Roles
	function update_board($SchBoardId, $BoardName)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('board_name' => $BoardName,
					   'last_modified' => $CurrentTime
					   );
		$where = array('school_board_id' => $SchBoardId);
		return $this->db->update('school_boards', $value, $where);

	}
	//Delete Role
	function delete_board($SchBoardId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('school_board_id' => $SchBoardId);
		$boardvalue = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$boardwhere = array('school_board_id' => $SchBoardId);
		$this->db->update('board_terms', $boardvalue, $boardwhere);
		return $this->db->update('school_boards', $value, $where);

	}

	//List Roles
	function list_subboard($SchBoardId)
	{
		$query = "SELECT DISTINCT ssb.school_sub_board_id, ssb.school_board_id,ssb.sub_board_name, b.board_id, b.other_text FROM school_sub_board ssb, board b
				  WHERE ssb.school_board_id = '$SchBoardId' AND ssb.school_sub_board_id = b.school_sub_board_id AND ssb.status = 1";
		return $this->db->query($query);
	}
	//Add Roles
	function add_sub_board($SubBoardName,$SchBoardId,$Description)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$sub_board_value =  array('school_board_id' => $SchBoardId,
								'sub_board_name' => $SubBoardName,
								'date_added' => $CurrentTime,
								'last_modified' => $CurrentTime,
								'status' => 1
							);
		$this->db->insert('school_sub_board', $sub_board_value);
		$SubBoardId = $this->db->lastinsertid();
		$board_value =  array('school_board_id' => $SchBoardId,
							'school_sub_board_id' => $SubBoardId,
							'other_text' => $Description,
							'date_added' => $CurrentTime,
							'last_modified' => $CurrentTime,
							'status' => 1
						);
		return $this->db->insert('board', $board_value);

	}
	//Update Roles
	function update_sub_board($SubBoardId, $SchBoardId, $SubBoardName, $Description)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$sub_board_value = array('sub_board_name' => $SubBoardName,
					   'last_modified' => $CurrentTime
					   );
		$sub_board_where = array('school_sub_board_id' => $SubBoardId);
		$this->db->update('school_sub_board', $sub_board_value, $sub_board_where);
		$board_value =  array('other_text' => $Description,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		$board_where = array('school_board_id' => $SchBoardId,
						'school_sub_board_id' => $SubBoardId);
		return $this->db->update('board', $board_value, $board_where);
	}
	//Delete Role
	function delete_sub_board($SubBoardId, $SchBoardId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('school_sub_board_id' => $SubBoardId,
					   'school_board_id' => $SchBoardId);
		$this->db->update('school_sub_board', $value, $where);
		return $this->db->update('board', $value, $where);

	}

}