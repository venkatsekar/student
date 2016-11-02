<?php

/**
 * Authentication class
 * 
 * @author Stephen J.
 *
 */
class Authentication {
	
	/**
	 * Config
	 *
	 * @access private
	 */
	private $config;
	
	/**
	 * Database
	 *
	 * @access private
	 */
	private $db;
	
	/**
	 * Session
	 *
	 * @access private
	 */
	private $session;
	
	
	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct() {
	
		$this->config 	= load_config('authentication');
		$db_config 		= load_config('database');
		
		$this->db = new Database($db_config['hostname'], $db_config['database'], $db_config['username'], $db_config['password']);
		
		$this->session = new Session();
	}
	
	
	/**
	 * Token
	 *
	 * @access private
	 */
	private function token() {
	
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
    		$clientIpAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
    		$clientIpAddress = $_SERVER['REMOTE_ADDR'];
		}
		return md5($this->config['secret_word'] . $clientIpAddress . $_SERVER['HTTP_USER_AGENT']);
	
	}


	/**
	 * Login
	 *
	 * @access public
	 */
	public function login($username, $password) {
	
		$username = filter_var($username, FILTER_SANITIZE_STRING); //FILTER_SANITIZE_EMAIL
		$password = filter_var($password, FILTER_SANITIZE_STRING);
	
		$sql = "SELECT * FROM users u INNER JOIN user_role ur ON u.user_info_id = ur.user_info_id INNER JOIN user_info usi ON u.user_info_id = usi.user_info_id  WHERE usi.email_address = '" . $username . "' AND usi.password = '" . md5($password) . "' AND u.status = 1";
		if ($this->db->row_count($sql)) {
	
			session_regenerate_id(true);

			$this->session->set('token', $this->token());
			$this->session->set('logged_in', true);
	
			$result = $this->db->query($sql);
			$result = $result[0];
			
			$this->session->set('user_id', $result['user_id']);
			$this->session->set('user_info_id', $result['user_info_id']);
			$this->session->set('role_id', $result['role_id']);
			$this->session->set('firstname', $result['first_name']);
			$this->session->set('lastname', $result['last_name']);
			$this->session->set('email_address', $result['email']);
			$this->session->set('last_activity', time());
			$query1 = " SELECT  p.page_name,p.page_id
					   FROM role_pages rp INNER JOIN pages p ON rp.page_id = p.page_id 
					   WHERE rp.role_id = " . $result['role_id'] . "  AND rp.status = 1 AND p.status = 1" ;
			
			$RolePermission= $this->db->query($query1);
			$this->session->set('RolePermission', $RolePermission);
			
			return true;
			
		} else {

			return false;
			
		}
	
	}
	
	/**
	 * Login
	 *
	 * @access public
	 */
	public function fb_login($username) {
	
		$username = filter_var($username, FILTER_SANITIZE_STRING); //FILTER_SANITIZE_EMAIL
		//$password = filter_var($password, FILTER_SANITIZE_STRING);
	
		$sql = "SELECT * FROM users u INNER JOIN user_role ur ON u.user_info_id = ur.user_info_id INNER JOIN user_info usi ON u.user_info_id = usi.user_info_id  WHERE usi.email_address = '" . $username . "'  AND u.status = 1";
		if ($this->db->row_count($sql)) {
	
			session_regenerate_id(true);

			$this->session->set('token', $this->token());
			$this->session->set('logged_in', true);
	
			$result = $this->db->query($sql);
			$result = $result[0];
			
			$this->session->set('user_id', $result['user_id']);
			$this->session->set('user_info_id', $result['user_info_id']);
			$this->session->set('role_id', $result['role_id']);
			$this->session->set('firstname', $result['first_name']);
			$this->session->set('lastname', $result['last_name']);
			$this->session->set('email_address', $result['email']);
			$this->session->set('last_activity', time());
				$query1 = " SELECT  p.page_name,p.page_id
					   FROM role_pages rp INNER JOIN pages p ON rp.page_id = p.page_id 
					   WHERE rp.role_id = " . $result['role_id'] . "  AND rp.status = 1 AND p.status = 1" ;
			
			$RolePermission= $this->db->query($query1);
			$this->session->set('RolePermission', $RolePermission);
			
			return true;
			
		} else {

			return false;
			
		}
	
	}


	/**
	 * Add User
	 *
	 * @access public
	 */
	public function add_user($username, $password, $user_group=0){


		$username = filter_var($username, FILTER_SANITIZE_STRING);
		$password = filter_var($password, FILTER_SANITIZE_STRING);


		$sql = "SELECT * FROM " . $this->config['user_table'] . " WHERE username = '" . $username . "'";
		
		if ($this->db->row_count($sql) == 0) {


			$values = array(
				'username'		=> $username, 
				'password'		=> md5($password),
				'active'		=> 1,
				'user_group'	=> $user_group
			);
	
			
			$this->db->insert($this->config['user_table'], $values);
			
			return true;
			
		} else {
	
			return false;
			
		}

	}
	


	
	
	/**
	 * User Id
	 *
	 * @access public
	 */
	public function user_id() {
	
		if ($this->session->get('user_id')) {
	
			return $this->session->get('user_id');
	
		}
	
		return false;
	
	}

	/**
	 * Business Id
	 *
	 * @access public
	 */
	public function user_info_id() {
	
		if ($this->session->get('user_info_id')) {
	
			return $this->session->get('user_info_id');
	
		}
	
		return false;
	
	}

	

	/**
	 * Role Id
	 *
	 * @access public
	 */
	public function role_id() {
	
		if ($this->session->get('role_id')) {
	
			return $this->session->get('role_id');
	
		}
	
		return false;
	
	}
	
	/**
	 * User Email
	 *
	 * @access public
	 */
	public function user_email() {
	
		if ($this->session->get('email_address')) {
	
			return $this->session->get('email_address');
	
		}
	
		return false;
	
	}
	/**
	 * Username
	 *
	 * @access public
	 */
	public function username() {
	
		if ($this->session->get('username')) {
	
			return $this->session->get('username');
	
		}
	
		return false;
	
	}

	/**
	 * Name
	 *
	 * @access public
	 */
	public function name() {

		//echo "<pre>"; print_r($_SESSION);echo "</pre>"; die();
	
		if ($this->session->get('firstname') && $this->session->get('lastname')) {
	
			return $this->session->get('firstname')." ".$this->session->get('lastname');
	
		}
	
		return false;
	
	}

	/**
	 * Set Last Activity
	 *
	 * @access public
	 */
	public function set_last_activity() {
	
		$this->session->set('last_activity', time());
	
	}

	/**
	 * Get Last Activity
	 *
	 * @access public
	 */
	public function get_last_activity() {
	
		if ($this->session->get('last_activity')) {
	
			return $this->session->get('last_activity');
	
		}
	
		return false;
	
	}
	
	
	/**
	 * User Group
	 *
	 * @access public
	 */
	public function user_group() {
	
		if ($this->session->get('user_group')) {
	
			return $this->session->get('user_group');
	
		}
	
		return false;
	
	}


	/**
	 * Get active users
	 * 
	 * @access public 
	 */	
	public function get_active_users(){

		foreach ($this->db->query("SELECT * FROM " . $this->config['User'] . " WHERE user_group = 0 AND active = 1") as $row) {
						
			$users[] = array(
				'user_id'	=> $row['UserID'], 
				'username'	=> $row['UserName']
			);
							
        }
		
		if (isset($users))
			return $users;
		
	}
	/**
	 * Password recover
	 *
	 * @access public
	 */
	public function passwordrecover($Email){
		$query="SELECT * FROM user_info usi,users u WHERE u.user_info_id = usi.user_info_id AND usi.email_address = '$Email' AND usi.status= 1";
		
		return $this->db->query($query);

	}
	
	/**
	 * Password recover
	 *
	 * @access public
	 */
	public function check_user_exist($Email){
		$query="SELECT * FROM user_info usi,users u WHERE u.user_info_id = usi.user_info_id AND usi.email_address = '$Email' AND usi.status= 1";
		
		return $this->db->row_count($query);

	}
	/**
	 * Update password
	 *
	 * @access public
	 */
	public function update_password($user_id, $password) {
	
		$password = filter_var($password, FILTER_SANITIZE_STRING);
	
		if ($this->db->row_count("SELECT user_info_id FROM " . $this->config['user_table'] ." WHERE user_info_id = '" . $user_id . "'")) {
	
			$password = md5($password);
				
			$where = array(
					'user_info_id' => $user_id
			);

			$this->db->update($this->config['user_table'], array('password' => $password), $where);
	
			return true;
	
		} else {
	
			return false;
	
		}
	
	}
	

	/**
	 * Logout
	 *
	 * @access public
	 */
	public function logout() {
	
		$this->session->destroy();
	
	}
	
	/**
	 * Logged in
	 *
	 * @access public
	 */
	public function logged_in() {
	
		if ($this->session->get('logged_in') && $this->session->get('token') == $this->token()) {
	
			return true;
	
		}
	
		return false;
	}


	/**
	 * Bundles
	 *
	 * @access public
	 */
	public function bundles()
	 {			
		$sql = "SELECT * FROM bundles where status = 1";				
		return $this->db->query($sql);
	} 
	/**
	*
	*
	*/
	
	public function hasPermission($roleId, $pageName) {

		 $query = "SELECT  *
					   FROM role_pages rp INNER JOIN pages p ON rp.page_id = p.page_id 
					   WHERE rp.role_id = " . $roleId . " AND p.page_name = '" . $pageName . "' AND rp.status = 1 AND p.status = 1";

	     if ($this->db->row_count($query)) {
	     	return true;
	     }

	     return false;
	}
	
}




















