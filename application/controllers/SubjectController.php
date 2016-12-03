<?php

class SubjectController extends Controller {

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
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'subject')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");

		$GradeList = $this->_model->list_grade();
		$this->_view->set('GradeList', $GradeList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}
	function unique_subject()
	{
		$this->render = 0;
		$SubjectName = $_GET['subjectName'];
		$Subject = $this->_model->unique_subject($SubjectName);
		

	}
	function subject()
	{
		$this->render = 0;
		$SubjectName = $_POST['subjectName'];
		$GradeId = $_POST['grading_id'];
		$Remarks = $_POST['remarks'];

		if(@$_POST['subjectId'])
		{
			$SubjectId = $_POST['subjectId'];
			$Result = $this->_model->update_subject($SubjectId, $SubjectName, $Remarks,$GradeId );
			echo 'Updated Successfully';
		}
		else
		{
			$Result = $this->_model->add_subject($SubjectName, $Remarks, $GradeId);
			echo 'Added Successfully';
		} 
	}
	function delete_subject()
	{
		$this->render = 0;
		$SubjectId = $_POST['subjectId'];
		$Result = $this->_model->delete_subject($SubjectId);
		echo 'Deleted Successfully';
	}
}