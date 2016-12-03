<?php

class Topic extends Model {
		
	//List Class
	function list_topic($SyllabusId)
	{
		
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'topic_name', 
			1 =>'remarks', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT DISTINCT * FROM syllabus_topic
				  WHERE status = 1 AND syllabus_id= $SyllabusId";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT DISTINCT * FROM syllabus_topic
				  WHERE status = 1 AND syllabus_id= $SyllabusId";		
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( topic_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR remarks LIKE '%".$requestData['search']['value']."%' )";
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
			$nestedData[] = $_['topic_name'];
			$nestedData[] = $_['remarks'];
			$nestedData[] ='<a class="btn btn-info " href="#" onclick=editin('.$_['syllabus_topic_id'].',"'.str_replace(' ', '&nbsp;',$_['topic_name']).'","'.$_['remarks'].'")><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:delete_topic('.$_["syllabus_topic_id"].')"><i class="fa fa-times"></i> Remove</a>';
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
	//Add Class
	function add_topic($TopicName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value =  array('topic_name' => $TopicName,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
					);
		return $this->db->insert('syllabus_topic', $value);
	}
	//Update Class
	function update_topic($TopicId, $TopicName, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array('topic_name' => $TopicName,
						'remarks' => $Remarks,
					   'last_modified' => $CurrentTime
					   );
		$where = array('syllabus_topic_id' => $TopicId);
		return $this->db->update('syllabus_topic', $value, $where);

	}
	//Delete Class
	function delete_topic($TopicId)
	{
		date_default_timezone_set('Asia/Kolkata');

		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$value = array( 'last_modified' => $CurrentTime,
						'status' => 0);
		$where = array('syllabus_topic_id' => $TopicId);
		return $this->db->update('syllabus_topic', $value, $where);

	}

}