<?php

class Preparation extends Model {

	function list_preparation()
	{
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'lesson_name', 
			1 =>'virtual_rack_name', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT DISTINCT ppm.preparation_module_id, ppm.virtual_rack_name, ml.module_lesson_id, ml.lesson_name,mlt.module_lesson_topic_id, mlt.topic_name 
				FROM preparation_module ppm,module_lesson ml,module_lesson_topic mlt 
				WHERE ppm.preparation_module_id = ml.preparation_module_id AND ml.module_lesson_id = mlt.module_lesson_id AND ppm.status =1 AND ml.status =1 AND mlt.status = 1";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT DISTINCT ppm.preparation_module_id, ppm.virtual_rack_name, ml.module_lesson_id, ml.lesson_name,mlt.module_lesson_topic_id, mlt.topic_name 
				FROM preparation_module ppm,module_lesson ml,module_lesson_topic mlt 
				WHERE ppm.preparation_module_id = ml.preparation_module_id AND ml.module_lesson_id = mlt.module_lesson_id AND ppm.status =1 AND ml.status =1 AND mlt.status = 1";		
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( ml.lesson_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR ppm.virtual_rack_name LIKE '%".$requestData['search']['value']."%' )";
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
			$nestedData[] = $_['virtual_rack_name'];
			$nestedData[] ='<a class="btn btn-info " href='.BASEURL.'preparation/edit/'.base64_encode($_['preparation_module_id']).'><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:delete_preparation('.$_["preparation_module_id"].', '.$_["module_lesson_id"].')"><i class="fa fa-times"></i> Remove</a>';
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
		$query = "SELECT DISTINCT s.*,gs.grading_name FROM subject s,grading_system gs
				  WHERE s.grading_id = gs.grading_id AND s.status = 1";
		return $this->db->query($query);
	}

	function add_preparation($ClassId, $SubjectId, $VirtualRaName, $LessonName, $TestNumber, $TestTiming, $HomeWork, $ExamTiming)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$pm_values = array('class_id' => $ClassId,
						'subject_id' => $SubjectId,
						'virtual_rack_name' => $VirtualRaName,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$this->db->insert('preparation_module', $pm_values);
		$PreparationModuleId = $this->db->lastinsertid();
		$values = array('preparation_module_id' => $PreparationModuleId,
						'lesson_name' => $LessonName,
						'number_test' => $TestNumber,
						'test_timing' => $TestTiming,
						'number_home_work' => $HomeWork,
						'examination_timing' => $ExamTiming,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$this->db->insert('module_lesson', $values);
		return $this->db->lastinsertid();
	}

	function add_new_topic($ModuleLessonId, $TopicName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$pm_values = array('module_lesson_id' => $ModuleLessonId,
						'topic_name' => $TopicName,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$this->db->insert('module_lesson_topic', $pm_values);
		return $this->db->lastinsertid();
	}

	function edit_preparation($PreparationModuleId)
	{
		$query ="SELECT DISTINCT ppm.*, ml.*, mlt.* 
				FROM preparation_module ppm,module_lesson ml,module_lesson_topic mlt 
				WHERE ppm.preparation_module_id = ml.preparation_module_id AND ppm.preparation_module_id ='$PreparationModuleId' AND ml.module_lesson_id = mlt.module_lesson_id AND ppm.status =1 AND ml.status =1 AND mlt.status = 1 Group By ml.preparation_module_id";
		return $this->db->query($query);		
	}

	function edit_topic($PreparationModuleId)
	{
		$query ="SELECT DISTINCT mlt.* 
				FROM preparation_module ppm,module_lesson ml,module_lesson_topic mlt 
				WHERE ppm.preparation_module_id = ml.preparation_module_id AND ppm.preparation_module_id ='1' AND ml.module_lesson_id = mlt.module_lesson_id AND ppm.status =1 AND ml.status =1 AND mlt.status = 1 ";
		return $this->db->query($query);
	}
	function update_preparation($PreparationModuleId, $ModuleLessonId, $ClassId, $SubjectId, $VirtualRaName, $LessonName, $TestNumber, $TestTiming, $HomeWork, $ExamTiming)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$pm_values = array('class_id' => $ClassId,
						'subject_id' => $SubjectId,
						'virtual_rack_name' => $VirtualRaName,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$pm_where = array('preparation_module_id' => $PreparationModuleId);
		$this->db->update('preparation_module', $pm_values, $pm_where);
		$values = array('preparation_module_id' => $PreparationModuleId,
						'lesson_name' => $LessonName,
						'number_test' => $TestNumber,
						'test_timing' => $TestTiming,
						'number_home_work' => $HomeWork,
						'examination_timing' => $ExamTiming,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$where = array('module_lesson_id' => $PreparationModuleId);
		return $this->db->update('module_lesson', $values, $where);
		
	}

	function update_topic($ModuleLessonTopicId, $TopicName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$pm_values = array('topic_name' => $TopicName,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$pm_where = array('module_lesson_topic_id' => $ModuleLessonTopicId);
		return $this->db->update('module_lesson_topic', $pm_values, $pm_where);
	}

	function delete_topic($ModuleLessonTopicId)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$values = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$where = array('module_lesson_topic_id' => $ModuleLessonTopicId);
		return $this->db->update('module_lesson_topic', $values, $where);
	}

	function delete_preparation($PreparationModuleId, $ModuleLessonId)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$pm_values = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$pm_where = array('preparation_module_id' => $PreparationModuleId);
		$this->db->update('preparation_module', $pm_values, $pm_where);
		$values = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$where = array('module_lesson_id' => $ModuleLessonId);
		$this->db->update('module_lesson', $values, $where);
		$values1 = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$where1 = array('module_lesson_id' => $ModuleLessonId);
		return $this->db->update('module_lesson_topic', $values1, $where1);
	}

}