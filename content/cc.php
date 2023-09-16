<?php

    /*File name: cc.php
Author: Mariah Falzon
Date Created: August 12, 2023
Date Modified: August 13, 2023
Version: 2.0
Purpose: Create a website that provides games for members only.
Implements a sign-in, becoming a members
Description: 
   Casino Craps Code which was adapted from Professor Ellen Bajcars Code
   
Citation: https://ebajcar.github.io/web10199/content_summer2023/slides/images/cc_simple_js_php.png */

function roll() { /* Function for rolling the dice. It randomizes between 1 and 6 */
    return rand(1, 6);
}

function determineOutcome($point, $total) { 
    /* Determine the outcome of the game 
    *if else statements that provide all possible outcomes that can happen
    */
    if ($point === 0) {
        if ($total === 7 || $total === 11) {
            return "natural";
        } elseif ($total === 2 || $total === 3 || $total === 12) {
            return "craps";
        } else {
            return "reroll";
        }
    } else {
        if ($total === $point) {
            return "point";
        } elseif ($total === 7) {
            return "seven";
        } else {
            return "reroll";
        }
    }
}

function display($msg, $point = 0) {
    $messages = [
        "natural" => " That's a natural. You win! CONGRATS!",
        "craps" => " That's craps. You lose! Try Again! ",
        "point" => " You made your point. You win! CONGRATS! ",
        "seven" => " That's a seven. You lose! Try Again! ",
        "reroll" => " ...Roll again!"
    ];
    
    if ($point === 0) {
        return $messages[$msg];
    } else { 
        /* Return the statement with . which is concatenation https://www.w3schools.com/php/php_operators.asp */
        return " Your point is " . $point . $messages[$msg];
    }
}

$point = isset($_SESSION['point']) ? $_SESSION['point'] : 0;
$output = "";

if (isset($_POST['roll'])) {
    $alpha = roll();
    $bravo = roll();
    $total = $alpha + $bravo;

    $output .= "\n" . $alpha . "+" . $bravo . "=" . $total . " ";
    $outcome = determineOutcome($point, $total);
    $output .= display($outcome, $point);

    if ($outcome === "reroll") {
        $_SESSION['point'] = $point === 0 ? $total : $point;
    } else {
        $_SESSION['point'] = 0;
    }
}
?>

<main>
    <h3><a href="https://www.venetianlasvegas.com/casino/table-games/craps-basic-rules.html#:~:text=Craps%20Terms&text=An%20even%20money%20bet%2C%20made,before%20a%207%20to%20win.">
        Casino Craps Rules </a> </h3>
        <form method="post" action="">
        <button type="submit" name="roll">ROLL</button>
    </form>
    <output><?php echo $output; ?></output>
</main>



