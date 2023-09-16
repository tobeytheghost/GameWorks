<?php 
/* 
File name: register.php
Author: Mariah Falzon
Date Created: August 9, 2023
Date Modified: August 12, 2023
Version: 3.0
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
    Registration page for visitors who want to become members
	*/
?>

<main>
    <form method="POST">
        <table style="width:100%">
            <tr>
                <td><input type="text" name="first" placeholder="First Name (required)"></td>
                <td><input type="text" name="last" placeholder="Last Name (required)"></td>
            </tr>
        </table>

        <fieldset>
            <legend>Choose a username and password</legend>
            <p>
                <input type="text" name="username" value="" placeholder="Enter your username">
            </p>
            <p>
                <input type="password" name="password" id="pass" placeholder="Enter your password">
            </p>
            <p>
                <input type="password" name="password" id="pass1" placeholder="Confirm your password">
            </p>
        </fieldset>

        <br>

        <input type="submit" name="submit">
    </form>
</main>


<?php
//Citation: Code provided by Professor Ellen Bajcar
//Citation https://raw.githubusercontent.com/ebajcar/web10199_worksheets/master/worksheets/register.process


// Function to clean up a data string (from w3schools.com)
function clean($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function initProcess() {
	$_SESSION['formAttemp'] = true;  // can be implemented to restrict number of attempts
	$_SESSION['id'] = session_id();
	$_SESSION['isLoggedIn'] = false;
	$_SESSION['password'] = $_POST['password'];	
    $_SESSION['startDate'] = "";
}

function unsuccessReg(){
	global $errMsg;
echo <<<_TRYAGAIN_
<div style="position:fixed:top:30%;left:30%;width:50%;height:300px;background:white;"><h3 class='w3-center-w3-block w3-red w3-padding-16'>
Registration was unsuccessful. $errMsg;
</h3>
<a href='index.php?page=content/register.php'>TRY AGAIN</a></div>
_TRYAGAIN_;
}

/* Create a function to let the successful registration go straight into the member only page
<a> links to the member only page */
function successfulReg(){
echo <<<_PROCEED_
<div style="text-align:center"> <h3> Registration was successful. </h3> </div>
<div style="text-align:center"> <a href='index.php?page=content/home_members.php&members=true&pagetitle=Members-only%20Home%20Page'>ENTER SITE</a> </div>
_PROCEED_;
}

function testUsername() {	
	global $errMsg, $safeuser;
    //Parameter for username
	if (isset($_POST['username']))
		if (!empty($_POST['username'])) {
			$safeuser = clean($_POST["username"]);
			$_SESSION['firstName'] = $_POST['username'];
		} else {
			$errMsg = "username field is empty. You must choose a username.";
			return false;
		}
	return true;
}

function testPassword() {	
	global $password, $errMsg, $safeuser;

    //parameter for password
	if (isset($_POST["password"])) {
		$password = clean($_POST["password"]);
		// when database field length is set to 40; what would be the minimum?
		if (strlen($password) < 4 || strlen($password) > 40) {
			error_log("Password must be between 4 and 40 characters: $password\n", 3, "myErrors.log");
			$errMsg = "Password parameter must be between 4 and 40 characters" . 
				  " long. The length of $password is " . strlen($password);
			return false;
		}
	} else {
		$errMsg = "Second parameter missing."; 
		error_log("$errMsg -missing.", 3, "myErrors.log");
		return false;
	}
	return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	initProcess();
	$errMsg = '';
	global $safeuser, $password;
	

	require_once("includes/Member.class");
	$visitor = new Member;	
	if (testUsername() && testPassword()) {
		if ($visitor->registerMember($safeuser, $password)) {
			// TODO: proceed to member site
			successfulReg();
		} 		
		/* made a try again message that links back to member registration page */	
	}else {
		echo <<<_TRYAGAIN_
		<div style="text-align:center"><p> returned false line 102. Password is less than 4 characters </p><div>
		<div style="text-align:center"><h3> Registration was unsuccessful. $errMsg; </h3> </div>
		<div style="text-align:center"> <a href='index.php?page=content/register.php'>TRY AGAIN</a></div>
_TRYAGAIN_;
	}
}

?>
