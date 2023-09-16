<?php 
/* 
File name: login.php
Author: Mariah Falzon
Date Created: August 9, 2023
Date Modified: August 12, 2023
Version: 3.0
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
    login page for users that can be accessed by members and public
	*/
?>

<main> 
    <form method="POST" autocomplete="off">
        <div> 
            <label><b>Enter Username</b></label>
            <input type="text" placeholder="Enter your username (required)" name="username" autocomplete="off" size="40">
            <br>
            <label><b>Enter Password</b></label>
            <input type="password" placeholder="Enter your password (required)" name="password" autocomplete="off" size="40">
            <br>
            <input type="hidden" name="currentdate" value="<?php $date = date("Y-m-d"); echo $date;?>">
            <input type="submit" value="Login">
            <input type="reset" value="Reset">
        </div>
    </form>
<?php

/*Code Rationale 
** size in input used to make the box larger and fit the entire placeholder 

*Citation: Login Page code provided by Professor Ellen Bajcar
https://raw.githubusercontent.com/ebajcar/web10199_worksheets/master/worksheets/login.process
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$_SESSION['formAttemp'] = true;
	$_SESSION['id'] = session_id();
	$_SESSION['isLoggedIn'] = false;

	if (isset($_POST['password']))
		if (!empty($_POST['password'])) 
			$_SESSION['password'] = $_POST['password'];

	if (isset($_POST['username']))
		if (!empty($_POST['username'])) {
			$safeuser = $_POST['username'];
			$_SESSION['player'] = $_POST['username'];
		} else
			echo "handle the bad name";
	
	require_once("includes/Member.class");
	$visitor = new Member;
	if ($visitor->authenticate($_POST['username'], $_POST['password'])) {	
        // proceed to member site
		echo <<<_LOG_
<section>
<h3 class='w3-green w3-padding-16'>Authentication successful.</h3>
<a class='w3-button w3-gray'  
	href=index.php?page=content/home_members.php&members=true&pagetitle=Members-only%20Home%20Page>Proceed</a>
</section>
_LOG_;

	} else {
		// return to login
		session_destroy();
echo <<<_NOLOG_
<section>
<h3 class='w3-center w3-block w3-red w3-padding-16'>Authentication was unsuccessful.</h3>
<a class='w3-button w3-gray' href='index.php?page=content/login.php'>Try Again</a>
</section>
_NOLOG_;
			
		
	}
}
?>
