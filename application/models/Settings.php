<?php

class Settings extends Model {

	function list_settings()
	{
		$requestData= $_REQUEST;
		
		$columns = array( 
		// datatable column index  => database column name
			0 =>'company_name', 
			1 =>'email_id', 
			2 =>''
			);

		// getting total number records without any search
		$sql = "SELECT DISTINCT * FROM edu_setting
				  WHERE status = 1";

		$totalData = $this->db->row_count($sql);

		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		$sql = "SELECT DISTINCT * FROM edu_setting
				  WHERE status = 1";		
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( company_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR email_id LIKE '%".$requestData['search']['value']."%' )";
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
			$nestedData[] = $_['company_name'];
			$nestedData[] = $_['email_id'];
			$nestedData[] ='<a class="btn btn-info " href='.BASEURL.'settings/edit/'.base64_encode($_['edu_setting_id']).'><i class="fa fa-paste" ></i> Edit</a>
                            <a class="btn btn-danger" onClick="javascript:deletesettings('.$_["edu_setting_id"].')"><i class="fa fa-times"></i> Remove</a>';
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

	function add_settings($CompanyName, $StudentTerm, $TeacherTerm, $Address, $City, $State, $PrimaryPh, $SecondaryPh, $Email, $RegistrationNo,$Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$values = array('company_name' => $CompanyName,
						'terms_students' => $StudentTerm,
						'terms_teachers' => $TeacherTerm,
						'address_1' => $Address,
						'city' => $City,
						'state' => $State,
						'primary_ph_no' => $PrimaryPh,
						'secondary_ph_no' => $SecondaryPh,
						'email_id' => $Email,
						'registration_no' => $RegistrationNo,
						'remarks' => $Remarks,
						'date_added' => $CurrentTime,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		return $this->db->insert('edu_setting', $values);
	}

	function edit_settings($EduSettingId)
	{
		$query = "SELECT DISTINCT * FROM edu_setting
				  WHERE status = 1 AND edu_setting_id ='$EduSettingId'";

		return $this->db->query($query);
	}
	function update_settings($EduSettingId, $CompanyName, $StudentTerm, $TeacherTerm, $Address, $City, $State, $PrimaryPh, $SecondaryPh, $Email, $RegistrationNo, $Remarks)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$values = array('company_name' => $CompanyName,
						'terms_students' => $StudentTerm,
						'terms_teachers' => $TeacherTerm,
						'address_1' => $Address,
						'city' => $City,
						'state' => $State,
						'primary_ph_no' => $PrimaryPh,
						'secondary_ph_no' => $SecondaryPh,
						'email_id' => $Email,
						'registration_no' => $RegistrationNo,
						'remarks' => $Remarks,
						'last_modified' => $CurrentTime,
						'status' => 1
						);
		$where = array('edu_setting_id' => $EduSettingId);
		return $this->db->update('edu_setting', $values, $where);
	}

	function delete_settings($EduSettingId)
	{
		date_default_timezone_set('Asia/Kolkata');
		//echo $StudentSubjectId;
		$DateTime = new DateTime();
		$CurrentTime = $DateTime ->format('y-m-d H:i:s');
		$values = array('last_modified' => $CurrentTime,
						'status' => 0
						);
		$where = array('edu_setting_id' => $EduSettingId);
		return $this->db->update('edu_setting', $values, $where);
	}
}