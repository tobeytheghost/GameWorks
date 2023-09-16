<?php

 /*File name: rpsls.php
Author: Mariah Falzon
Date Created: August 12, 2023
Date Modified: August 13, 2023
Version: 1.5
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
   Rock Paper Scissors Lizard Spock Game that allows user to choose options and displays winner
  
  Code Rationale 
  * for the html select was used to display all options for the game Citation: https://www.w3schools.com/tags/tag_select.asp
   */

$options = ["paper", "scissors", "rock", "lizard", "spock"]; // making options variable an array
$output = ""; //make a blank output variable that can be used later
$winner = [ //$winner is using an associative array  that use named keys that you assign to them. Citation: https://www.w3schools.com/php/php_arrays_associative.asp
    "rock" => ["paper", "spock"], //if paper or spock, beats rock
    "paper" => ["scissors", "lizard"], //if scissors or lizard beats paper
    "scissors" => ["spock", "rock"], //if rock or spock beats scissors
    "lizard" => ["rock", "scissors"], //if rock or scissors beats lizard
    "spock" => ["lizard", "paper"] //if lizard or paper beats spock
];


if($_SERVER['REQUEST_METHOD'] == 'POST'){ //if the server request equals post from the form then run through code
    $player = $_POST['options']; //$player is associated with choosing an option
    $machine = $options[array_rand($options)]; //the computer takes the options and randomizes it with through the array Citation: https://www.w3schools.com/php/func_array_rand.asp
    $output = "Your choice: $player <br> Computer's choice: $machine"; //Output that displays what you chose and what the computer chose
    if($machine == $player){
        $output .= "<p>IT IS A TIE!! </p>";
    }
    else{ //This statement runs through the possible winning situations and displays if you win or you lose
        ($winner[$machine][0] == $player || $winner[$machine][1] == $player )
        ? $output .= "<p> YOU WIN CONGRATS </p>"
        : $output .= "<p> YOU LOSE. Better luck next time </p>";
    }
}

?>

<main>

<form method="POST" >
    <h3> Please Choose An Option</h4>
    <fieldset>
    <select size="5" name="options" required id="choice">
        <option value="rock">rock</option>
    	<option value="paper">paper</option>
		<option value="scissors">scissors</option>
		<option value="lizard">lizard</option>
		<option value="spock">spock</option>
</select>

</fieldset>

<br>
    <input type="submit" value="Play">
</form>
<aside><?= $output ?></aside>
</main>
