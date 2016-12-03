<?php

class RoleController extends Controller {

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

		$this->_view->set("sid", $this->_auth->user_id());
		$this->_view->set("name",  $this->_auth->name());
		$this->_view->set("RoleId",  $this->_auth->role_id());
	}


	function index() 
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'role')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}
		$this->render = 1;
		$this->_view->set("pagename", "index");
		$RoleId = $this->_auth->role_id();

		$RoleList = $this->_model->list_roles();
		$this->_view->set('RoleList', $RoleList);
	}
    
    function add() 
    {
    	if(!$this->_auth->hasPermission($this->_auth->role_id(), 'role/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "ROLES");

		$pages = $this->_model->list_pages();
		$this->_view->set('pages', $pages);
	}

	function edit() 
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'role/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$this->render = 1;
		$this->_view->set("pagename", "ROLES");

		$RoleId = @$_GET['rid'];
		$this->_view->set('RoleId', $RoleId);
		$EditRole = $this->_model->edit_roles($RoleId);
		$this->_view->set('EditRole', @$EditRole);
		//Get Roles from model
		$role = $this->_model->edit_rolename($RoleId);
		//Roles set to the add view
		$this->_view->set('roles', $role);
		
		
		//No Add Roles
		$UnEditRoleId = @$EditRole[0]['role_id'];
		$UnEditRole  = $this->_model->unedit_roles($UnEditRoleId);
		$this->_view->set('UnEditRole', $UnEditRole);
	}


	function add_new_roles()
	{
		/*if(!$this->_auth->hasPermission($this->_auth->role_id(), 'roles/add')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}*/

		$this->render = 0;
		$RoleName = $_POST['roleName'];
		$UserId = 1;
		$RoleId = $this->_model->add_new_role($RoleName, $UserId);
		$PageIds = $_POST['roles'];
		foreach($_POST['roles'] as $key => $tmp_name ){
				$PageId = @$_POST['roles'][$key];
        		$Result = $this->_model->add_roles($RoleId, $PageId, $UserId);
        		//header("Location: ". BASEURL . "roles/add?mess=$result");     	
        	}
        echo $Result;
		
	}

	function update_new_roles()
	{
		/*if(!$this->_auth->hasPermission($this->_auth->role_id(), 'users/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}*/

		$this->render = 0;
		$RoleId = $_POST['roleid'];

		if(isset($_POST['rolename'])) {
			$RoleName = $_POST['rolename'];
		}
		
		$UserId = 1;

		if(@$RoleName)
		{
			$result = $this->_model->update_role($RoleId, $RoleName, $UserId);
		}

		$PageIds = $_POST['roles'];

		if($PageIds)
		{
			foreach($_POST['roles'] as $key => $tmp_name )
			{
				$PageId = @$_POST['roles'][$key];
        		$result = $this->_model->add_roles($RoleId, $PageId, $UserId);
        	}
				
		}
		echo $RoleId;
	}

	function remove_pageroleid($RolePagesId)
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'users/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}

		$PageId = $_GET['page_id'];
		$RoleId = $_GET['role_id'];
		$this->render = 0;
		$this->_model->remove_page_roleid($RolePagesId, $PageId, $RoleId);
		header("Location: ". BASEURL . "role/edit?rid=".$RoleId);     	
	}

	function delete()
	{
		if(!$this->_auth->hasPermission($this->_auth->role_id(), 'roles/edit')) {
			header("Location: ". BASEURL . "dashboard/?perm=0");
		}
		else
		{
			$this->render = 0;
			$RoleId = $_POST['role_id'];
			$CheckRole = $this->_model->check_role($RoleId);
			if(count($CheckRole)==0)
			{
				$result = $this->_model->delete($RoleId);
				header("Location:". BASEURL . "roles?mess=$result");
			}
			else
			{
				header("Location:". BASEURL . "roles?mess=0");
			}
		}
	}
}