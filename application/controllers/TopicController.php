<?php

class TopicController extends Controller {

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
		/*if(!$this->_auth->hasPermission($this->_auth->role_id(), 'studentclass')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}*/

		$this->render = 1;
		$this->_view->set("pagename", "index");

	}
	function list_topic()
	{
		$this->render = 0;	
		$SyllabusId = base64_decode($_GET['sid']);			
		$LessonList = $this->_model->list_topic($SyllabusId);
		echo json_encode($LessonList);
	}
	function topic()
	{
		$this->render = 0;
		
		$Remarks = $_POST['remarks'];

		if(@$_POST['topicId'])
		{
			$TopicName = $_POST['topicName'][0];
			$TopicId = $_POST['topicId'];
			$Result = $this->_model->update_topic($TopicId, $TopicName, $Remarks);
			
		}
		else
		{
			for($i=0; $i<count($_POST['topicName']); $i++)
			{
			$TopicName = $_POST['topicName'][$i];
			$Result = $this->_model->add_topic($TopicName, $Remarks);
			}
			
		} 
		echo $Result;
	}
	function delete_topic()
	{
		$this->render = 0;
		$TopicId = $_POST['topicId'];
		$Result = $this->_model->delete_topic($TopicId);
		echo 'Deleted Successfully';
	}
}