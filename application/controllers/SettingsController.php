<?php

class SettingsController extends Controller {

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
		
	}

	function index()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'settings')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");

	}

	function list_setting()
	{
		$this->render = 0;				
		$SettingList = $this->_model->list_settings();
		echo json_encode($SettingList);
	}

	function add()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'settings/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "add");
	}
	function add_settings()
	{
		$this->render = 0;

		$CompanyName = $_POST['companyName'];
		$StudentTerm = $_POST['studentTerm'];
		$TeacherTerm = $_POST['teacherTerm'];
		$Address = $_POST['address'];
		$City = $_POST['city'];
		$State = $_POST['state'];
		$PrimaryPh = $_POST['primaryPhone'];
		$SecondaryPh = $_POST['secondaryPhone'];
		$Email = $_POST['emailAddress'];
		$RegistrationNo = $_POST['regNo'];
		$Remarks = $_POST['remarks'];
		$EduSettingId = @$_POST['eduSettingId'];
		if($EduSettingId)
		{
			$Result = $this->_model->update_settings($EduSettingId, $CompanyName, $StudentTerm, $TeacherTerm, $Address, $City, $State, $PrimaryPh, $SecondaryPh, $Email, $RegistrationNo, $Remarks);
		}
		else
		{
			$Result = $this->_model->add_settings($CompanyName, $StudentTerm, $TeacherTerm, $Address, $City, $State, $PrimaryPh, $SecondaryPh, $Email, $RegistrationNo, $Remarks);
		}
		echo $Result;
	}

	function edit($EduSettingId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'settings/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "edit");

		$EduSettingId = base64_decode($EduSettingId);
		$EditSettings = $this->_model->edit_settings($EduSettingId);
		$this->_view->set('EditSettings', $EditSettings);
	}

	function delete_settings()
	{
		$this->render = 0;

		$EduSettingId =$_POST['eduSettingId'];
		$Result = $this->_model->delete_settings($EduSettingId);
		echo $Result;
	}

}