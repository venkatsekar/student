<?php

class TeacherController extends Controller {

    function __construct($controller, $action) {
	parent::__construct($controller, $action);
		$this->_auth = new Authentication();

		/*if (!$this->_auth->logged_in()) {
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
		*/
	}
	
	function index() 
	{	
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
		$this->render = 1;
		$this->_view->set("pagename", "add");

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);
	}

	function add_teacher()
	{
		$this->render = 0;
		//print_r($_POST);
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
		echo $TeacherInfoId;
		for($i=0; $i<count($_POST['teacher_quali']); $i++)
		{
			$Qualification = $_POST['teacher_quali'][$i];
			$this->_model->add_new_quali($TeacherInfoId, $Qualification);
		}
		for($i=0; $i<count($_POST['classId']); $i++)
		{
			$ClassId = $_POST['classId'][$i];
			$this->_model->add_new_class($TeacherInfoId, $ClassId);
		}
		echo $TeacherInfoId;
	}

	function edit($UserInfoId)
	{
		$this->render = 1;
		$UserInfoId = base64_decode($UserInfoId);
		$EditTeacher = $this->_model->edit_teacher($UserInfoId);
		$this->_view->set('EditTeacher', $EditTeacher);

		$EditClass = $this->_model->edit_class($UserInfoId);
		$this->_view->set('EditClass', $EditClass);

		$EditQuali = $this->_model->edit_quali($UserInfoId);
		$this->_view->set('EditQuali', $EditQuali);
	}

	function update_teacher()
	{
		$this->render = 0;
		//print_r($_POST);
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

	function delete_teacher()
	{
		$this->render = 0;
		$UserInfoId = $_POST['userInfoId'];
		$TeacherInfoId = $_POST['teacherInfoId'];
		$Result =$this->_model->delete_teacher($UserInfoId, $TeacherInfoId);
	}

}