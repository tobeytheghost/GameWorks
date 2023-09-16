<?php 
/*
File name: nav_public.php
Author: Mariah Falzon
Date created: Summer 2018
Date modified: August 12, 2023
Version: 23.1
Copyright: 
	This work is the intellectual property of Sheridan College. 
	Any further copying and distribution outside of class must be within 
	the copyright law. Posting to commercial sites for profit is prohibited.
Purpose: learn programming server-side functionality using PHP to provide
         access to a database to register and login users
Description:
	navigation component accessible to members only upon successul login
	$members variable is set to true since user successfully logged in
   
Code Rationale: a href = "link" used to link the correct page that is in the contents folder
   title used to name the page


    CITATION: Code provided by Professor Bajcar https://ebajcar.github.io/web10199/content_summer2023/worksheets/material/worksheet10.html
*/
?>

<nav>
      <p class="tool-bar">
        <a class="active" 
           href="index.php?page=content/home_members.php&members=false"
           title="Home">
           
           Home
        </a>
        <a href="index.php?page=content/cc.php&pagetitle=Casino-Craps&members=false"
           title="Casino Craps">
           Casino Craps
        </a>
        <a href="index.php?page=content/rpsls.php&pagetitle=Rock-Paper-Scissors-Lizard-Spock&members=false" 
           title="Rock-Paper-Scissors-Lizard-Spock">
           RPSLS
        </a>
        <a href="index.php?page=content/ttt.php&pagetitle=Tic-Tac-Toe&members=false" 
           title="Tic-Tac-Toe">
           Tic Tac Toe
        </a>
        <a href="index.php">
           Sign Out
        </a>
      </p>
    </nav>
</header>