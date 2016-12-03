<?php

class StudentclassController extends Controller {

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
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'studentclass')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);
	}
	function studentclass()
	{
		$this->render = 0;
		$ClassName = $_POST['className'];
		$Remarks = $_POST['remarks'];

		if(@$_POST['classId'])
		{
			$ClassId = $_POST['classId'];
			$Result = $this->_model->update_class($ClassId, $ClassName, $Remarks);
			echo 'Updated Successfully';
		}
		else
		{
			$Result = $this->_model->add_class($ClassName, $Remarks);
			echo 'Added Successfully';
		} 
	}
	function delete_student_class()
	{
		$this->render = 0;
		$ClassId = $_POST['classId'];
		$Result = $this->_model->delete_class($ClassId);
		echo 'Deleted Successfully';
	}
}