<script>
//html elements of start.php
const status =document.querySelector('.message');  //status which player turn is  
const reset=document.querySelector('.reset');
const cells=document.querySelectorAll('.game-cell');
var playerX=$('#player_x').attr("value");
var playerO=$('#player_o').attr("value");
var numberOfGame=$('#game_number').attr("value");
var previousGame=numberOfGame;

//tic-tac-toe (game) variables
let gameLive= true;
let xIsNext= true;
const xSymbol = 'x';
const oSymbol = 'o';

const letterToSymbol = (letter) => letter === 'x' ? xSymbol : oSymbol;
const handleWin = (letter) => {
	if (letter === 'x') {
		status.innerHTML = `<h2>${playerX} has won!</h2>`;
	} 
	else {
		status.innerHTML = `<h2>${playerO} has won!</h2>`;
	}
	gameLive = false;
};

const checkGame = () => {
	const topLeft= cells[0].classList[2];
	const topMiddle= cells[1].classList[2];
	const topRight= cells[2].classList[2];
	const middleLeft= cells[3].classList[2];
	const middleMiddle= cells[4].classList[2];
	const middleRight= cells[5].classList[2];
	const bottomLeft= cells[6].classList[2];
	const bottomMiddle= cells[7].classList[2];
	const bottomRight= cells[8].classList[2];
 // check winner
	if (topLeft && topLeft === topMiddle && topLeft === topRight) {
		handleWin(topLeft);
		cells[0].classList.add('won');
		cells[1].classList.add('won');
		cells[2].classList.add('won');
	} 
	else if (middleLeft && middleLeft === middleMiddle && middleLeft === middleRight) {
		handleWin(middleLeft);
		cells[3].classList.add('won');
		cells[4].classList.add('won');
		cells[5].classList.add('won');
	} 
	else if (bottomLeft && bottomLeft === bottomMiddle && bottomLeft === bottomRight) {
		handleWin(bottomLeft);
		cells[6].classList.add('won');
		cells[7].classList.add('won');
		cells[8].classList.add('won');
	} 
	else if (topLeft && topLeft === middleLeft && topLeft === bottomLeft) {
		handleWin(topLeft);
		cells[0].classList.add('won');
		cells[3].classList.add('won');
		cells[6].classList.add('won');
	} 
	else if (topMiddle && topMiddle === middleMiddle && topMiddle === bottomMiddle) {
		handleWin(topMiddle);
		cells[1].classList.add('won');
		cells[4].classList.add('won');
		cells[7].classList.add('won');
	} 
	else if (topRight && topRight === middleRight && topRight === bottomRight) {
		handleWin(topRight);
		cells[2].classList.add('won');
		cells[5].classList.add('won');
		cells[8].classList.add('won');
	} 
	else if (topLeft && topLeft === middleMiddle && topLeft === bottomRight) {
		handleWin(topLeft);
		cells[0].classList.add('won');
		cells[4].classList.add('won');
		cells[8].classList.add('won');
	} 
	else if (topRight && topRight === middleMiddle && topRight === bottomLeft) {
		handleWin(topRight);
		cells[2].classList.add('won');
		cells[4].classList.add('won');
		cells[6].classList.add('won');
    } 
	else if (topLeft && topMiddle && topRight && middleLeft && middleMiddle && middleRight && bottomLeft && bottomMiddle && bottomRight) {
		gameIsLive = false;
		status.innerHTML = '<h2>Game is tied!</h2>';
	} 
	else {
		xIsNext = !xIsNext;
    if (xIsNext) {
      status.innerHTML = `<h2>${playerX}'s turn:</h2>`;
    } 
	else {
      status.innerHTML = `<h2>${playerO}'s turn:</h2>`;
    }
  }
};



// event handlers
const handleReset = () => {
  xIsNext = true;
  status.innerHTML = `<h2>${playerX}'s turn:</h2>`;
  for (const cellsDiv of cells) {
    cellsDiv.classList.remove('x');
    cellsDiv.classList.remove('o');
    cellsDiv.classList.remove('won');
  }
  	$.ajax({
				url:"includes/historyPreviousGame.php",
				method:"POST",
				dataType:'text',
				data:{gamePrevious:previousGame},
				success:function(data)
				{
				
				}
			});
  previousGame=numberOfGame;
  numberOfGame++;
  gameLive = true;
};
const handleCellClick = (e) => {
	const classList =e.target.classList;
	const locationCell= e.target.classList[1]; //when clicking on the tic tac toe gameboard cells, we know which cell we are clicked in and that varible is on locationCell   
	
	if (gameLive === true) {
	if (classList[2] === 'x' || classList[2] === 'o') {
		return ;        //return nothing if it contains already 'x' or 'o'
	}
	
	if (xIsNext) {   //same like xIsNext === true but its boolean so we can type it as it is 
		classList.add('x');
		checkGame();
	  }
	else {
		classList.add('o');
		checkGame();		
	  }
	}
}

// send moves to saveMoves.php to register data on database dynamic with ajax with method=Post and sending data: cellPosition and who
	  const saveMoves = (e) => {
		  if (gameLive === true) {	
			if (!xIsNext)
				playerName=playerX;
			else
				playerName=playerO;
			var locationCell= e.target.classList[1];
			$.ajax({
				url:"includes/saveMoves.php",
				method:"POST",
				dataType:'text',
				data:{cellPosition:locationCell,who:playerName,gameNumber:numberOfGame,gamePrevious:previousGame},
				success:function(data)
				{
				
				}
			});
		 }
};

reset.addEventListener('click',handleReset);

for (const cellsDiv of cells ) {
		cellsDiv.addEventListener('click',handleCellClick);
		cellsDiv.addEventListener('click',saveMoves);
}
</script>

