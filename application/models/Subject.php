<?php 
class Subject extends Model
{
	//List Subject
	function list_subject()
	{
		$query = "SELECT DISTINCT s.*,gs.grading_name FROM subject s,grading_system gs
				  WHERE s.grading_id = gs.grading_id AND s.status = 1";
		return $this->db->query($query);
	}
	//List Grade
	function list_grade()
	{
		$query = "SELECT DISTINCT * FROM grading_system 
				  WHERE status = 1";
		return $this->db->query($query);
	}
	function unique_subject($SubjectName)
	{
		$query = "SELECT subject_name FROM subject 
				  WHERE subject_name = '$SubjectName' AND status = 1";
		 
		  	if($this->db->row_count($query) == 0)
		    {
		        echo "true";  //good to register
		    }
		    else
		    {
		        echo "false"; //already registered
		    }
	}
	//Add Subject
	function add_subject($SubjectName, $Remarks, $GradeId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('subject_name' => $SubjectName,
						'grading_id' => $GradeId,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		return $this->db->insert('subject', $value);
	}
	//Update Subject
	function update_subject($SubjectId, $SubjectName, $Remarks, $GradeId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('subject_name' => $SubjectName,
						'grading_id' => $GradeId,
						'remarks' => $Remarks,
					   'last_modified' => $CurrentTime
					   );
		$where = array('subject_id' => $SubjectId);
		return $this->db->update('subject', $value, $where);

	}
	//Delete Subject
	function delete_subject($SubjectId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('subject_id' => $SubjectId);
		return $this->db->update('subject', $value, $where);

	}
}