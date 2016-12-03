<?php

class SyllabusController extends Controller {

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

	function list_syllabus()
	{
		$this->render = 0;
						
		$SyllabusList = $this->_model->list_syllabus();
		echo json_encode($SyllabusList);
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

		$LangList = $this->_model->list_lang();
		$this->_view->set('LangList', $LangList);
	}

	function add_syllabus()
	{
		$this->render = 0;
		$ClassId = $_POST['classId'];
		$SubjectId = $_POST['studentSubjectId'];
		$LangId = $_POST['langId'];
		$LessonName = $_POST['lessonName'];
		$Remarks = $_POST['remarks'];
		$Description = $_POST['description'];

		$SyllabusId = $this->_model->add_syllabus($ClassId, $SubjectId, $LangId, $LessonName, $Remarks, $Description);
		
		echo $SyllabusId;
	}

	function edit($SyllabusId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'preparation/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;

		$SyllabusId = base64_decode($SyllabusId);
		$EditSyllabus = $this->_model->edit_syllabus($SyllabusId);
		$this->_view->set('EditSyllabus', $EditSyllabus);

		$ClassList = $this->_model->list_class();
		$this->_view->set('ClassList', $ClassList);

		$SubjectList = $this->_model->list_subject();
		$this->_view->set('SubjectList', $SubjectList);

		$LangList = $this->_model->list_lang();
		$this->_view->set('LangList', $LangList);
	}

	function edit_syllabus()
	{
		$this->render = 0;
		$SyllabusId = $_POST['syllabusId'];
		$ClassId = $_POST['classId'];
		$SubjectId = $_POST['studentSubjectId'];
		$LangId = $_POST['langId'];
		$LessonName = $_POST['lessonName'];
		$Remarks = $_POST['remarks'];
		$Description = $_POST['description'];


		$SyllabusId = $this->_model->update_syllabus($SyllabusId, $ClassId, $SubjectId, $LangId, $LessonName, $Remarks, $Description);
		
		echo $SyllabusId;
	}

	

	function delete_syllabus()
	{
		$this->render = 0;
		$SyllabusId = $_POST['syllabusId'];
		$Result = $this->_model->delete_syllabus($SyllabusId);
		echo $Result;
	}

}