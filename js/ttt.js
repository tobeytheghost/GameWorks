/* Date: August 13, 2023
Author: mariah Falzon
Purpose: To get the tic tac toe game to work in assignment 8

Citation: Followed along with video by Bro Codes on YouTube to understand how to make the code run . Code was adapted by BroCode

https://www.youtube.com/watch?v=AnmwHjpEhtA&ab_channel=BroCode

*/


const cells = document.querySelectorAll(".cell"); //grabbing the cells from the html
const statusText = document.querySelector("#statusText"); //grabbing the element statusText from the html
const restartBtn = document.querySelector("#restartBtn"); //grabbing the restart btn from the html
const winConditions = [ //making a list of all possible winning conditions based on the index of the cell
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];
let options = ["", "", "", "", "", "", "", "", ""]; // a blank cell option
let currentPlayer = "X";
let running = false; 

initializeGame(); //run initalizeGame function

function initializeGame(){
    cells.forEach(cell => cell.addEventListener("click", cellClicked)); //adding event listener when a cell is clicked
    restartBtn.addEventListener("click", restartGame); 
    statusText.textContent = `${currentPlayer}'s turn`;
    running = true; //make the game start running
}
function cellClicked(){
    const cellIndex = this.getAttribute("cellIndex"); //when cell is clicked grabbing the attribute cellIndex from the html file

    if(options[cellIndex] != "" || !running){ //if the options are not clicked or the game isn't running then it returns to a blank grid
        return;
    }

    updateCell(this, cellIndex); //updating cell after the cell is clicked
    checkWinner(); //chcekcing if anyone has won the game
}
function updateCell(cell, index){  //Updating cell based on the index and what the currentplayer is
    options[index] = currentPlayer;
    cell.textContent = currentPlayer;
}
function changePlayer(){
    currentPlayer = (currentPlayer == "X") ? "O" : "X"; //changing the player every turn
    statusText.textContent = `${currentPlayer}'s turn`;
}
function checkWinner(){
    let roundWon = false; 

    for(let i = 0; i < winConditions.length; i++){ //for loop to check all the win conditions for the three cells
        const condition = winConditions[i];
        const cellA = options[condition[0]];
        const cellB = options[condition[1]];
        const cellC = options[condition[2]];

        if(cellA == "" || cellB == "" || cellC == ""){
            continue;
        }
        if(cellA == cellB && cellB == cellC){
            roundWon = true;
            break;
        }
    }

    if(roundWon){
        statusText.textContent = `${currentPlayer} wins!`; //chagning the status text to declare who the winner is
        running = false; //stopping the game when the winner is declared
    }
    else if(!options.includes("")){
        statusText.textContent = `Draw!`;
        running = false;
    }
    else{
        changePlayer();
    }
}
function restartGame(){
    currentPlayer = "X";
    options = ["", "", "", "", "", "", "", "", ""];
    statusText.textContent = `${currentPlayer}'s turn`;
    cells.forEach(cell => cell.textContent = "");
    running = true;
}
