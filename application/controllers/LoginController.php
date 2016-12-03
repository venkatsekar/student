<?php

class LoginController extends Controller {

    function __construct($controller, $action) {
	parent::__construct($controller, $action);
		$session = new Session();
		error_reporting(0);
		$this->_auth = new Authentication();
		if (!$this->_auth->logged_in()) {
			//header('Location: '.BASEURL.'login');
			//die();
		} 
	}
	
	function index() 
	{	
		
		$this->render = 1;
		$this->_view->set("pagename", "add");

		$Roles = $this->_model->get_roles();
		$this->_view->set('Roles', $Roles);

	}

	function teacher()
	{
		$this->render = 1;
		$this->_view->set("pagename", "teacher");
	}

	function student()
	{
		$this->render = 1;
		$this->_view->set("pagename", "student");
	}

	function registration()
	{
		$this->render = 1;
		$this->_view->set("pagename", "add");

		$Roles = $this->_model->get_roles();
		$this->_view->set('Roles', $Roles);

	}

	function login() 
	{
		$this->render =0;
		$username = $_POST['username'];
		$password = $_POST['password'];
		// set username and password cookie
		if (isset($_POST['remember'])) {
			setcookie("user", $username);
			setcookie("pass", $password);
		} else {
			if (isset($_COOKIE['user'])) {
			  unset($_COOKIE['user']);
			  setcookie('user', '', time() - 3600); // empty value and old timestamp
			  setcookie('pass', '', time() - 3600); // empty value and old timestamp
			}
		}
		$auth = new Authentication();
		if ($auth->login($username, $password)) {
			
				header('Location: '.BASEURL. 'dashboard');
		} 
		else
		{
			    header('Location: '.BASEURL. 'login?err=1');
		}
	}

	
    function logout()
	{

		$auth = new Authentication();
		$auth->logout();

		header('Location: '.BASEURL. 'login/');
	}

	function passwordrecover()
	{

	}

	function reset()
	{

	}
	//Sending mail for forgot password

	function userpasswordrecover()
	{
	    $this->render = 0;
		$this->_auth = new Authentication();
	    $Email = $_POST['emailAddress'];
	   	$res = $this->_auth->passwordrecover($Email);
	    if ($res > 0)
	      {
	        $siteEmail="Admin";
	        $UserId=$res[0]['user_info_id'];
	        $name=$res[0]['first_name'].'&nbsp'.$res[0]['last_name'];
	        $email=$res[0]['email_id'];
	        $time=time();

	        $message='<table width="100%" border="0" cellpadding="5" cellspacing="5">
	  <tr>
	   Hello '.$name.';
	  </tr>
	  <tr>
	   		<td>
	   		There has been a request to change your password, and you can do this through the link below.
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Change my password(URL to change the password)
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Or by copy and pasting the following url inside your broswer
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		<a href="'.BASEURL.'login/reset/?reset='.$time.'&raw='.$UserId.'">'.BASEURL.'login/reset/?reset='.$time.'&raw='.$UserId.'</a></td>
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		If you didnt request this, please ignore this email
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Your password wont change until you access the link above and create a new one
	  		</td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td colspan="3"><p>Cheers,<br />
	    Team Social Network</p>
	    </td>
	  </tr>
	</table>';
			$subject="Reset Password";
	        $from=$siteEmail; //7
	        $headers = "From: admin@ahenam.in". "\r\n";
			$headers .= "Reply-To: ". strip_tags($res[0]['email']) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			@mail($email, $subject, $message,$headers);
	       // header("Location: ". BASEURL . "login/passwordrecover/?mess=1");
		   echo $res;
	        }
	        
	}

	// Reset  user password 
	function resetpassword(){
	  	$this->render =0;
	  	$user_id=$_POST['user_id'];
	  	$password=$_POST['password1'];
	  
	  	$res = $this->_auth->update_password($user_id,$password);
	  	if($res) 
	  		header("Location: ". BASEURL . "login/reset/?mes=1");
	 	else 
	   		header("Location: ". BASEURL . "login/reset/?mes=0");
	}

	function error($error = null)
	{
		if($error != null) {
			$this->_view->set('error', true);
		} else 
		{
			$this->_view->set('error', false);
		}

	}
	function add_new_user()
	{
		
		$this->render = 0;
		$RoleId = $_POST['roleId'];	
		$FirstName = $_POST['firstName'];
		$LastName = $_POST['lastName'];
		$Email = $_POST['emailAddress'];
		$LoginId = $_POST['studentName'];
		$Password = $_POST['password'];
		$Question = $_POST['secretQuest'];
		$Answer = $_POST['ansQues'];
		$KnowAbout = $_POST['aboutStudy'];

		$UserInfoId = $this->_model->add_users($RoleId, $FirstName,$LastName, $Email, $LoginId, $Password, $Question, $Answer, $KnowAbout);
		
		if($UserInfoId >= 1)
		{
			$siteEmail="Admin";
	        $UserId=$UserInfoId;
	        $name=$FirstName.'&nbsp'.$LastName;
	        $email=$Email;
	        $time=time();

	        $message='<table width="100%" border="0" cellpadding="5" cellspacing="5">
	  <tr>
	   Hello '.$name.';
	  </tr>
	  <tr>
	   		<td>
	   		There has been a request to activate your account, and you can do this through the link below.
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Activation User(URL to Activate user)
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Or by copy and pasting the following url inside your broswer
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		<a href="'.BASEURL.'login/activate/?reset='.$time.'&raw='.$UserId.'">'.BASEURL.'login/activate/?reset='.$time.'&raw='.$UserId.'</a></td>
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		If you didnt request this, please ignore this email
	  		</td>
	  </tr>
	  <tr>
	  		<td>
	  		Your account wont activate until you access the link above 
	  		</td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <td colspan="3"><p>Cheers,<br />
	    Team Social Network</p>
	    </td>
	  </tr>
	</table>';
			$subject="Activate Your Link";
	        $from=$siteEmail; //7
	        $headers = "From: admin@ahenam.in". "\r\n";
			$headers .= "Reply-To: ". strip_tags($Email) . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			@mail($email, $subject, $message,$headers);
			echo $result;
		}
	}
	function activate()
	{
		$this->render = 0;	
		$UserInfoId = $_GET['raw'];
		//echo $UserInfoId;
		$result = $this->_model->user_activate($UserInfoId);
		if($result == 1)
		{
		header('Location: '.BASEURL. 'dashboard');	
		}	
	}
}