<?php

class TeacherController extends Controller {

    function __construct($controller, $action) {
	parent::__construct($controller, $action);
		$this->_auth = new Authentication();

		if (!$this->_auth->logged_in()) {
			header('Location: '.BASEURL.'login');
			die();
		}

		if ((int)(time() - $this->_auth->get_last_activity()) > (int)SESSION_TIMEOUT) {
   			$this->_auth->logout();
   			header('Location: '.BASEURL.'login');
   			die();
  		}

		$this->_auth->set_last_activity();
		
		$this->_view->set('sid', $this->_auth->user_id());
		$this->_view->set('name', $this->_auth->name());
		//echo $this->_auth->user_id();
	}
	
	function index() 
	{	
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'teacher')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");
	}

	

	function list_teacher()
	{
		$this->render = 0;				
		$TeacherDetails = $this->_model->list_teacher_details();
		//$this->_view->set('PickupDetails', $PickupDetails);
		//$this->_view->set('DeliveryDetails', @$DeliveryDetails);
		echo json_encode($TeacherDetails);
	}

	function add()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'teacher/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "add");

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}

	function add_teacher()
	{
		$this->render = 0;
		//$Dob = explode('/', );
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$Email = $_POST['emailAddress'];
		$LoginId = $_POST['teacherName'];
		$Password = $_POST['password'];
		$Question = $_POST['secretQuest'];
		$Answer = $_POST['ansQues'];
		$KnowAbout = $_POST['aboutStudy'];
		
		$DateOfBirth = $_POST['dob'];
		$Address = $_POST['preAddress'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$FirstContact = $_POST['preference_contact'][0];
		$SecondContact = @$_POST['preference_contact'][1];
		$ThirdContact = @$_POST['preference_contact'][2];
		$Photo = @$_POST['photo'];
		$BankAccNo = $_POST['bankAccno'];
		$BankName = $_POST['bankName'];
		$IfscCode = $_POST['ifsc'];
		$BankBranch = $_POST['bankBranch'];
		$ClassRoom = $_POST['classRoom'];
		$CurrentSchool = $_POST['currentSchool'];
		$CurrentSchoolJoin = $_POST['currentSchoolJoin'];
		$CurrentSchoolToJoin = $_POST['currentSchoolToJoin'];
		$PrevSchool = $_POST['prevSchool'];
		$PrevSchoolJoin = $_POST['prevSchoolJoin'];
		$PrevSchoolToJoin = $_POST['prevSchoolToJoin'];
		$Remarks = $_POST['remarks'];

		/*$UserInfoId = @$_POST['userInfoId'];
		$TeacherInfoId = @$_POST['teacherInfoId'];
		$TeacherQualiId = @$_POST['teacherQualiId'];
		$TeacherClassId = @$_POST['teacherClassId'];*/
		
		$TeacherInfoId = $this->_model->add_new_teacher($FirstName, $LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $ClassRoom, $CurrentSchool, $CurrentSchoolJoin, $CurrentSchoolToJoin, $PrevSchool, $PrevSchoolJoin, $PrevSchoolToJoin, $Remarks);
		//echo $TeacherInfoId;
		$Ph=$_FILES['photo']['tmp_name'];
  		$Photo = $_FILES['photo']['name'];
		
		//$ImageName = $_POST['image_name'];
		//$ImageDesc = $_POST['image_desc'];
		
		if ($_FILES['photo']['name']!='') {
      		$Photo=$TeacherInfoId.'-'.$Photo;
      		$path=$_SERVER['DOCUMENT_ROOT'].'/student/images/teacher/';
    		//print_r($_FILES);
		    //echo $path;
		    $upload = $path.$Photo;
		    move_uploaded_file($Ph, $upload);
    	}
    	$result = $this->_model->update_teacher_image($TeacherInfoId, $Photo);    		
		for($i=0; $i<count($_POST['teacher_quali']); $i++)
		{
			$Qualification = $_POST['teacher_quali'][$i];
			$University = $_POST['teacher_university'][$i];
			$Grade = $_POST['teacher_grade'][$i];
			$this->_model->add_new_quali($TeacherInfoId, $Qualification, $University, $Grade);
		}
		for($i=0; $i<count($_POST['classId']); $i++)
		{
			$ClassId = $_POST['classId'][$i];
			$this->_model->add_new_class($TeacherInfoId, $ClassId);
		}
		for($i=0; $i<count($_POST['subjectId']); $i++)
		{
			$SubjectId = $_POST['subjectId'][$i];
			$this->_model->add_new_subject($TeacherInfoId, $ClassId);
		}
		echo $TeacherInfoId;
	}

	function edit($UserInfoId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'teacher/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$UserInfoId = base64_decode($UserInfoId);
		$EditTeacher = $this->_model->edit_teacher($UserInfoId);
		$this->_view->set('EditTeacher', $EditTeacher);

		$EditClass = $this->_model->edit_class($UserInfoId);
		$this->_view->set('EditClass', $EditClass);

		$EditSubject = $this->_model->edit_subject($UserInfoId);
		$this->_view->set('EditSubject', $EditSubject);

		$UnEditClass = $this->_model->unedit_class($UserInfoId);
		$this->_view->set('UnEditClass', $UnEditClass);

		$EditQuali = $this->_model->edit_quali($UserInfoId);
		$this->_view->set('EditQuali', $EditQuali);
	}

	function update_teacher()
	{
		$this->render = 0;
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$Email = $_POST['emailAddress'];
		$LoginId = $_POST['teacherName'];
		$Password = $_POST['password'];
		$Question = $_POST['secretQuest'];
		$Answer = $_POST['ansQues'];
		$KnowAbout = $_POST['aboutStudy'];
		
		$DateOfBirth = $_POST['dob'];
		$Address = $_POST['preAddress'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$FirstContact = $_POST['preference_contact'][0];
		$SecondContact = @$_POST['preference_contact'][1];
		$ThirdContact = @$_POST['preference_contact'][2];
		$Photo = @$_POST['photo'];
		$BankAccNo = $_POST['bankAccno'];
		$BankName = $_POST['bankName'];
		$IfscCode = $_POST['ifsc'];
		$BankBranch = $_POST['bankBranch'];
		$ClassRoom = $_POST['classRoom'];
		$CurrentSchool = $_POST['currentSchool'];
		$CurrentSchoolJoin = $_POST['currentSchoolJoin'];
		$CurrentSchoolToJoin = $_POST['currentSchoolToJoin'];
		$PrevSchool = $_POST['prevSchool'];
		$PrevSchoolJoin = $_POST['prevSchoolJoin'];
		$PrevSchoolToJoin = $_POST['prevSchoolToJoin'];
		$Remarks = $_POST['remarks'];

		$UserInfoId = @$_POST['userInfoId'];
		$TeacherInfoId = @$_POST['teacherInfoId'];
		/*$TeacherQualiId = @$_POST['teacherQualiId'];
		$TeacherClassId = @$_POST['teacherClassId'];*/
		
		$TeacherInfoId = $this->_model->update_teacher($UserInfoId, $TeacherInfoId, $FirstName, $LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $ClassRoom, $CurrentSchool, $CurrentSchoolJoin, $CurrentSchoolToJoin, $PrevSchool, $PrevSchoolJoin, $PrevSchoolToJoin, $Remarks);
		echo $TeacherInfoId;
		
	}

	function update_quali()
	{
		$this->render = 0;
		$Qualification = $_POST['teacher_quali'];
		$University = $_POST['teacher_university'];
		$Grade = $_POST['teacher_grade'];
		$TeacherInfoId = @$_POST['teacher_info_id'];
		if($TeacherInfoId)
		{
			$Result = $this->_model->add_new_quali($TeacherInfoId, $Qualification, $University, $Grade);
		}
		else
		{
			$TeacherQualiId = $_POST['teacher_quali_id'];
			$Result = $this->_model->update_quali($TeacherQualiId, $Qualification, $University, $Grade);
		}
		echo $Result;
	}

	function add_new_class()
	{
		$this->render = 0;
		$TeacherInfoId = @$_POST['teacher_info_id1'];
		for($i=0; $i<count($_POST['classId']); $i++)
		{
			$ClassId = $_POST['classId'][$i];
			$Result = $this->_model->add_new_class($TeacherInfoId, $ClassId);
		}
		echo $Result;
	}

	function delete_quali()
	{
		$this->render = 0;
		$TeacherQualiId = $_POST['teacher_quali_id'];
		$Result =$this->_model->delete_quali($TeacherQualiId);
	}

	function delete_class()
	{
		$this->render = 0;
		$TeacherClassId = $_POST['teacher_class_id'];
		$Result =$this->_model->delete_class($TeacherClassId);
	}


	function delete_teacher()
	{
		$this->render = 0;
		$UserInfoId = $_POST['userInfoId'];
		$TeacherInfoId = $_POST['teacherInfoId'];
		$Result =$this->_model->delete_teacher($UserInfoId, $TeacherInfoId);
	}

	function dashboard()
	{
		$this->render = 1;
		$this->_view->set("pagename", "dashboard");

		$ClassRoom = $this->_model->list_class_room();
		$this->_view->set('ClassRoom', $ClassRoom);

		$VirtualRackName = $this->_model->list_virtual_rack_name();
		$this->_view->set('VirtualRackName', $VirtualRackName);
	}

	function list_teacher_dashboard()
	{
		$this->render = 0;
		if($this->_auth->role_id() == 1)
		{				
			$TeacherDashboard = $this->_model->list_teacher_dashboard($this->_auth->user_id());
			//$this->_view->set('PickupDetails', $PickupDetails);
			//$this->_view->set('DeliveryDetails', @$DeliveryDetails);
			echo json_encode($TeacherDashboard);
		}
	}

	function teachersearch()
	{
		$this->render = 1;
		$this->_view->set("pagename", "teachersearch");
	}



}