<?php

class PreparationController extends Controller {

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
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'preparation')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");
	}

	function list_preparation()
	{
		$this->render = 0;				
		$PreparationList = $this->_model->list_preparation();
		echo json_encode($PreparationList);
	}

	function add()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'preparation/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}

	function add_preparation()
	{
		$this->render = 0;
		$ClassId = $_POST['classId'];
		$SubjectId = $_POST['studentSubjectId'];
		$VirtualRaName = $_POST['virtualRackName'];
		$LessonName = $_POST['lessonName'];
		$TestNumber = $_POST['noTest'];
		$TestTiming = $_POST['testTiming'];
		$HomeWork = $_POST['homeWork'];
		$ExamTiming = $_POST['examTiming'];
		$Remarks = $_POST['remarks'];

		$ModuleLessonId = $this->_model->add_preparation($ClassId, $SubjectId, $VirtualRaName, $LessonName, $TestNumber, $TestTiming, $HomeWork, $ExamTiming);
		for($i=0; $i<count($_POST['topicName']); $i++)
		{
			$TopicName = $_POST['topicName'][$i];
			$ModuleLessonId = $this->_model->add_new_topic($ModuleLessonId, $TopicName, $Remarks);
		}
		echo $ModuleLessonId;
	}

	function edit($PreparationModuleId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'preparation/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;

		$PreparationModuleId = base64_decode($PreparationModuleId);
		$EditPrepar = $this->_model->edit_preparation($PreparationModuleId);
		$this->_view->set('EditPrepar', $EditPrepar);

		$EditTopic = $this->_model->edit_topic($PreparationModuleId);
		$this->_view->set('EditTopic', $EditTopic);

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);
	}

	function edit_preparation()
	{
		$this->render = 0;
		$PreparationModuleId = $_POST['PreparationModuleId'];
		$ModuleLessonId = $_POST['moduleLessonId'];
		$ClassId = $_POST['classId'];
		$SubjectId = $_POST['studentSubjectId'];
		$VirtualRaName = $_POST['virtualRackName'];
		$LessonName = $_POST['lessonName'];
		$TestNumber = $_POST['noTest'];
		$TestTiming = $_POST['testTiming'];
		$HomeWork = $_POST['homeWork'];
		$ExamTiming = $_POST['examTiming'];
		$Remarks = @$_POST['remarks'];

		$ModuleLessonId = $this->_model->update_preparation($PreparationModuleId, $ModuleLessonId, $ClassId, $SubjectId, $VirtualRaName, $LessonName, $TestNumber, $TestTiming, $HomeWork, $ExamTiming);
		
		echo $ModuleLessonId;
	}

	function edit_topic()
	{
		$this->render = 0;
		$ModuleLessonTopicId = $_POST['moduleLessonTopicId'];
		$TopicName = $_POST['topicName'];
		$Remarks = $_POST['remarks'];
		$ModuleLessonId = $this->_model->update_topic($ModuleLessonTopicId, $TopicName, $Remarks);
		
	}

	function delete_topic()
	{
		$this->render = 0;
		$ModuleLessonTopicId = $_POST['moduleLessonTopicId'];
		$Result = $this->_model->delete_topic($ModuleLessonTopicId);
		echo $Result;
	}

	function delete_preparation()
	{
		$this->render = 0;
		$PreparationModuleId = $_POST['preparationModuleId'];
		$ModuleLessonId = $_POST['moduleLessonId'];
		$Result = $this->_model->delete_preparation($PreparationModuleId, $ModuleLessonId);
		echo $Result;
	}

}