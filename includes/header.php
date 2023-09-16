<!DOCTYPE html>
<html lang="en">
    <head>
        <?php

        $pagetitle = (isset($_GET['pagetitle'])) ? $_GET['pagetitle'] : "Home Page";

        ?> 
       <title><?=$pagetitle?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">	
    <link rel="stylesheet" href="https://unpkg.com/missing.css@1.0.9/dist/missing.min.css">

</head>
<body>
	<header>
        <h1>🎲GameWorks <sub-title><?=$pagetitle?></sub-title></h1>

<?php
/* 
File name: header.php
Author: Mariah Falzon
Date Created: August 9, 2023
Date Modified: August 12, 2023
Version: 1.2
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
    Header content that will be on every page


    ***Citation: CSS CODE FROM https://missing.style/
*/

        /* CODE RATIONALE
        * $pagetitle is grabbing the pagetitle and if there is none for the page, then it is set to default Home Page
        * The header is not closed as it is continued in the navigation pages 
        * subtitle used to add the title of the page in the header which is grabbed from the nav pages
        
        
        */

?> 