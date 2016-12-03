<?php

class Syllabus extends Model {

	function list_syllabus()
	{
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'lesson_name', 
			1 =>'subject_name', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT DISTINCT ss.*,s.subject_name, c.class_name
				FROM syllabus ss, subject s, classes c
				WHERE ss.status = 1 AND ss.subject_id = s.subject_id AND ss.class_id = c.class_id";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT DISTINCT ss.*,s.subject_name, c.class_name
				FROM syllabus ss, subject s, classes c
				WHERE ss.status = 1 AND ss.subject_id = s.subject_id AND ss.class_id = c.class_id";		
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( lesson_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR other_desc LIKE '%".$requestData['search']['value']."%' )";
		}
		$totalFiltered = $this->db->row_count($sql); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
		//$other = array();
		$data = array();
		$query = $this->db->query($sql);
		
		$data = array();
		foreach( $query as $_) {  // preparing an array
			//$lname = (strlen($_['last_name'])>1) ? substr(($_['last_name']),0,1) .'' : $_['last_name'];	
			$nestedData=array();
			$nestedData[] = $_['lesson_name'];
			$nestedData[] = $_['subject_name'];
			$nestedData[] ='<a class="btn btn-info " href='.BASEURL.'topic/?sid='.base64_encode($_['syllabus_id']).'><i class="fa fa-paste" ></i> View Topic</a>
							<a class="btn btn-info " href='.BASEURL.'syllabus/edit/'.base64_encode($_['syllabus_id']).'><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:delete_syllabus('.$_["syllabus_id"].')"><i class="fa fa-times"></i> Remove</a>';
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
		$query = "SELECT DISTINCT * FROM subject
				  WHERE status = 1";
		return $this->db->query($query);
	}
	function list_lang()
	{
		$query = "SELECT DISTINCT * FROM lang
				  WHERE status = 1";
		return $this->db->query($query);
	}

	function add_syllabus($ClassId, $SubjectId, $LangId, $LessonName, $Remarks, $Description)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$sy_values = array('class_id' => $ClassId,
						'subject_id' => $SubjectId,
						'lang_id' => $LangId,
						'lesson_name' => $LessonName,
						'remarks' => $Remarks,
						'other_desc' => $Description,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$this->db->insert('syllabus', $sy_values);
		$SyllabusId = $this->db->lastinsertid();
		
		return $SyllabusId;
	}

	function edit_syllabus($SyllabusId)
	{
		$query ="SELECT DISTINCT * 
				FROM syllabus 
				WHERE syllabus_id ='$SyllabusId' AND status = 1";
		return $this->db->query($query);		
	}

	function update_syllabus($SyllabusId, $ClassId, $SubjectId, $LangId, $LessonName, $Remarks, $Description)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$sy_values = array('class_id' => $ClassId,
						'subject_id' => $SubjectId,
						'lang_id' => $LangId,
						'lesson_name' => $LessonName,
						'remarks' => $Remarks,
						'other_desc' => $Description,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$sy_where = array('syllabus_id' => $SyllabusId);
		return $this->db->update('syllabus', $sy_values, $sy_where);
		
	}

	

	function delete_syllabus($SyllabusId)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$values = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$where = array('syllabus_id' => $SyllabusId);
		return $this->db->update('Syllabus', $values, $where);
	}

}