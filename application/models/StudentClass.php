<?php

class StudentClass extends Model {
		
	//List Class
	function list_class()
	{
		$query = "SELECT DISTINCT * FROM classes
				  WHERE status = 1";
		return $this->db->query($query);
	}
	//Add Class
	function add_class($ClassName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('class_name' => $ClassName,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		return $this->db->insert('classes', $value);
	}
	//Update Class
	function update_class($ClassId, $ClassName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('class_name' => $ClassName,
						'remarks' => $Remarks,
					   'last_modified' => $CurrentTime
					   );
		$where = array('class_id' => $ClassId);
		return $this->db->update('classes', $value, $where);

	}
	//Delete Class
	function delete_class($ClassId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('class_id' => $ClassId);
		return $this->db->update('classes', $value, $where);

	}

}