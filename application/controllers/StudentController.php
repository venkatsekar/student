<?php

class StudentController extends Controller {

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

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}

	function list_student()
	{
		$this->render = 0;				
		$StudentDetails = $this->_model->list_student_details();
		//$this->_view->set('PickupDetails', $PickupDetails);
		//$this->_view->set('DeliveryDetails', @$DeliveryDetails);
		echo json_encode($StudentDetails);
	}
	function add() 
	{	
		$this->render = 1;
		$this->_view->set("pagename", "add");

		$BoardList = $this->_model->list_board();
		$this->_view->set('BoardList', $BoardList);

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}

	function add_student()
	{
		$this->render = 0;
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$Email = $_POST['emailAddress'];
		$LoginId = $_POST['studentName'];
		$Password = $_POST['password'];
		$Question = $_POST['secretQuest'];
		$Answer = $_POST['ansQues'];
		$KnowAbout = $_POST['aboutStudy'];

		$FatherName = $_POST['fatherName'];
		$FatherOccu = $_POST['fatherOccu'];
		$MotherName = $_POST['motherName'];
		$MotherOccu = $_POST['motherOccu'];
		$DateOfBirth = $_POST['dob'];
		$Address = $_POST['preAddress'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$FirstContact = $_POST['preference_contact'][0];
		$SecondContact = $_POST['preference_contact'][1];
		$ThirdContact = $_POST['preference_contact'][2];
		$Photo = @$_POST['photo'];
		$BankAccNo = $_POST['bankAccno'];
		$BankName = $_POST['bankName'];
		$IfscCode = $_POST['ifsc'];
		$BankBranch = $_POST['bankBranch'];
		$BrotherName = $_POST['brotherName'];
		$BrotherDob = $_POST['brotherDob'];
		$SisterName = $_POST['sisterName'];
		$SisterDob = $_POST['sisterdob'];
		$SchoolName = $_POST['schoolName'];
		$BoardId = $_POST['boardId'];
		$ClassId = $_POST['classId'];
		$FirstScoreCard = $_POST['firstScoreCards'];
		$SecScoreCard = $_POST['secondScoreCards'];
		$ThirdScoreCard = $_POST['thirdScoreCards'];
		$StudentSubjectId = $_POST['subjectId'];
		$Remarks = $_POST['remarks'];

		$UserInfoId = @$_POST['userInfoId'];
		$StudentInfoId = @$_POST['studentInfoId'];
		$StudentSubjectId = @$_POST['studentSubId'];
		if(@$UserInfoId && @$StudentInfoId && @$StudentSubjectId)
		{
			$Result = $this->_model->update_student($UserInfoId, $StudentInfoId, $StudentSubjectId, $FirstName, $LastName,$Email, $LoginId, $Password,$Question, $Answer, $KnowAbout,$FatherName, $FatherOccu, $MotherName, $MotherOccu, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $BrotherName, $BrotherDob, $SisterName, $SisterDob, $SchoolName, $BoardId, $ClassId, $FirstScoreCard, $SecScoreCard, $ThirdScoreCard, $StudentSubjectId, $Remarks);
		}
		else
		{
			$Result = $this->_model->add_new_student($FirstName, $LastName,$Email, $LoginId, $Password,$Question, $Answer, $KnowAbout,$FatherName, $FatherOccu, $MotherName, $MotherOccu, $DateOfBirth, $Address, $City, $State, $FirstContact, $SecondContact, $ThirdContact, $Photo, $BankAccNo, $BankName, $IfscCode, $BankBranch, $BrotherName, $BrotherDob, $SisterName, $SisterDob, $SchoolName, $BoardId, $ClassId, $FirstScoreCard, $SecScoreCard, $ThirdScoreCard, $StudentSubjectId, $Remarks);
		}
		echo $Result;
	}

	function edit($UserInfoId)
	{
		$this->render = 1;
		$UserInfoId = base64_decode($UserInfoId);
		$EditStudent = $this->_model->edit_student($UserInfoId);
		$this->_view->set('EditStudent', $EditStudent);

		$BoardList = $this->_model->list_board();
		$this->_view->set('BoardList', $BoardList);

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);

	}

	function delete_student()
	{
		$this->render = 0;
		$UserInfoId = $_POST['userInfoId'];
		$StudentInfoId = $_POST['studentInfoId'];
		$StudentSubjectId = $_POST['studentSubjectId'];
		$Result =$this->_model->delete_student($UserInfoId, $StudentInfoId, $StudentSubjectId);
	}
}