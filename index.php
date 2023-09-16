<?php
/* 
File name: index.php
Author: Mariah Falzon
Date Created: August 9, 2023
Date Modified: August 12, 2023
Version: 2.0
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
    Home page content fragement that will include all different components

Citation: Code for index.php provided by Professor Ellen Bajcar
https://raw.githubusercontent.com/ebajcar/web10199_worksheets/master/worksheets/index.page

    */




//Start a new or existing session in php 
//Citation: https://www.php.net/manual/en/function.session-start.php
session_start();

//Include the Header 
include ('includes/header.php');

/* Code to include the navigation 

Create a members variable
use the isset function to Check whether a variable is empty. Also check whether the variable is set/declared

Use the super global variable $_GET to collect the form data from the members variable 

Use the ternary logic for member identification

Citation: https://www.w3schools.com/php/func_var_isset.asp
https://www.w3schools.com/php/php_superglobals_get.asp


*/

$members = (isset($_GET['members'])) 
    ? (bool)$_GET['members'] : false;

if ($members === true) //if $members are cretaed then load the nav_members.php
    require 'includes/nav_members.php';
else  //else use the public page
    require 'includes/nav_public.php';


/* Include the main content pages

The value $content will come from the nav pages*/

if (isset($_GET['page'])) {
    $includepage=$_GET['page'];
    include_once ($includepage); //embed PHP code from another file. Citation: https://www.w3schools.com/php/keyword_include_once.asp
}
else {
    require_once ('content/home_public.php');  // embed code from another file Citation: https://www.w3schools.com/php/keyword_require_once.asp
}

/* Add the footer includes */
include_once ('includes/footer.php');
?> 