<?php

class BoardController extends Controller {

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

		$BoardList = $this->_model->list_board();
		$this->_view->set('BoardList', $BoardList);
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
			$Result = $this->_model->add_board($BoardName);
			echo 'Added Successfully';
		} 
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
			echo 'Updated Successfully';
		}
		else
		{
			$Result = $this->_model->add_sub_board($SubBoardName,$SchBoardId,$Description);
			echo 'Added Successfully';
		} 
	}
	function delete_sub_board()
	{
		$this->render = 0;
		$SchBoardId = $_POST['schboardId'];
		$SubBoardId = $_POST['subBoardId'];
		$Result = $this->_model->delete_sub_board($SubBoardId, $SchBoardId);
		echo 'Deleted Successfully';
	}
}