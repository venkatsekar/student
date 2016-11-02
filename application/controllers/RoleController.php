<?php

class RoleController extends Controller {

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

		$RoleList = $this->_model->list_role();
		$this->_view->set('RoleList', $RoleList);
	}
	function role()
	{
		$this->render = 0;
		$RoleName = $_POST['roleName'];


		if(@$_POST['roleId'])
		{
			$RoleId = $_POST['roleId'];
			$Result = $this->_model->update_role($RoleId, $RoleName);
			echo 'Updated Successfully';
		}
		else
		{
			$Result = $this->_model->add_role($RoleName);
			echo 'Added Successfully';
		} 
	}
	function delete_role()
	{
		$this->render = 0;
		$RoleId = $_POST['roleId'];
		$Result = $this->_model->delete_role($RoleId);
		echo 'Deleted Successfully';
	}
}