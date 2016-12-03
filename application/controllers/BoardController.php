<?php

class BoardController extends Controller {

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
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'board')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "index");

		$BoardList = $this->_model->list_board();
		$this->_view->set('BoardList', $BoardList);
	}

	function add()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'board/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "add");
	}

	function edit($SchBoardId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'board/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "edit");

		$SchBoardId = base64_decode($SchBoardId);

		$EditBoardList = $this->_model->list_edit_board($SchBoardId);
		$this->_view->set('EditBoardList', $EditBoardList);

		$EditTermList = $this->_model->list_edit_terms($SchBoardId);
		$this->_view->set('EditTermList', $EditTermList);
	}

	function board()
	{
		$this->render = 0;
		$BoardName = $_POST['boardName'];


		if(@$_POST['schboardId'])
		{
			$SchBoardId = $_POST['schboardId'];
			$Result = $this->_model->update_board($SchBoardId, $BoardName);
			echo 'Updated Successfully';
		}
		else
		{
			$SchBoardId = $this->_model->add_board($BoardName);
			for($i=0; $i<count($_POST['noofterms']); $i++)
			{
			$Terms = $_POST['noofterms'][$i];
			$this->_model->add_new_terms($SchBoardId, $Terms);
			}
			echo 'Added Successfully';
		} 
	}

	function edit_terms()
	{
		
		$Terms = $_POST['terms'];
		if(@$_POST['schoolBoardId'])
		{
		 	$Result = $this->_model->add_new_terms($_POST['schoolBoardId'], $Terms);	
		}
		else
		{
			$BoardTermId = $_POST['boardTermId'];
			$Result = $this->_model->update_terms($BoardTermId, $Terms);
		}

	}
	function delete_terms()
	{
		$BoardTermId = $_POST['boardTermId'];
		$Result = $this->_model->delete_terms($BoardTermId);
	}
	function delete_board()
	{
		$this->render = 0;
		$SchBoardId = $_POST['schboardId'];
		$Result = $this->_model->delete_board($SchBoardId);
		echo 'Deleted Successfully';
	}
	function subboard($SchBoardId) 
	{
	    $SchBoardId = base64_decode($SchBoardId);
	    $this->_view->set("SchBoardId", $SchBoardId);
		$this->render = 1;
		$this->_view->set("pagename", "index");

		$SubBoardList = $this->_model->list_subboard($SchBoardId);
		$this->_view->set('SubBoardList', $SubBoardList);
	}

	
	function add_subboard()
	{
		$this->render = 0;
		$SchBoardId = $_POST['schboardId'];
		$SubBoardName = $_POST['subBoardName'];
		$Description =  $_POST['others'];

		if(@$_POST['subBoardId'])
		{
			$SubBoardId = $_POST['subBoardId'];
			$Result = $this->_model->update_sub_board($SubBoardId, $SchBoardId,$SubBoardName,$Description);
			echo 'edit';
		}
		else
		{
			$Result = $this->_model->add_sub_board($SubBoardName,$SchBoardId,$Description);
			echo 'add';
		} 
	}
	function delete_sub_board()
	{
		$this->render = 0;
		$SchBoardId = $_POST['schboardId'];
		$SubBoardId = $_POST['subBoardId'];
		$Result = $this->_model->delete_sub_board($SubBoardId, $SchBoardId);
		echo 'delete';
	}
}