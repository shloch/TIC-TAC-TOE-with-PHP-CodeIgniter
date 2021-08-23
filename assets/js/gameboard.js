"use strict";

var GameModule = (function () {
    let gameboard = [];


    let verifyGameWinner = function (isWinner, player) {
        if (isWinner) {
            mod.alert(`GAME OVER !!! --- ${player.getName()} WON`);
            mod.filleScoresForm(player.getName())
            document.querySelector('#shade').classList.add('shade')
            document.querySelector('[name="winner"]').value = `${player.getName()}`
        } else if (gameboard.length == 9) {
            mod.alert('GAME OVER !!! --- DRAW GAME');
            mod.filleScoresForm()
        };
    }


    let mod = {};
    mod.alert = function (message) {
        let alertBox = document.querySelector("span")
        alertBox.innerHTML = message;
    }

    mod.filleScoresForm = function (winnerName = 'draw') {
        const p1 = document.querySelector('[name="player1"]').value;
        const p2 = document.querySelector('[name="player2"]').value;
        if (p1.toUpperCase() === winnerName) {
            document.querySelector('[name="winner"]').value = p1
            document.querySelector('[name="looser"]').value = p2
        } else if (p2.toUpperCase() === winnerName) {
            document.querySelector('[name="winner"]').value = p2
            document.querySelector('[name="looser"]').value = p1
        } else {
            document.querySelector('[name="isDraw"]').value = 'draw'
            document.querySelector('[name="winner"]').value = p1
            document.querySelector('[name="looser"]').value = p2
        }
        this.addSaveToDBbutton()
    }

    mod.addSaveToDBbutton = function () {
        let saveButton = `<button id="save-to-database" type="submit"> SAVE GAME TO DATABASE </button>`
        document.querySelector('form[id="scoresForm"] .splash').innerHTML = saveButton

    }
    mod.displayController = function () {
        let tbl_text = `<tbody>
                        <tr>
                            <td id="0" data-value="1"></td>
                            <td id="1" data-value="2"></td>
                            <td id="2" data-value="3"></td>
                        </tr>
                        <tr>
                            <td id="3" data-value="4"></td>
                            <td id="4" data-value="5"></td>
                            <td id="5" data-value="6"></td>
                        </tr>
                        <tr>
                            <td id="6" data-value="7"></td>
                            <td id="7" data-value="8"></td>
                            <td id="8" data-value="9"></td>
                        </tr>
                    </tbody>`;
        let tbl = document.querySelector('table[id="gameTable"]')
        tbl.innerHTML = tbl_text;
    };
    let removeEvent = function (event) {
        const cells = document.querySelectorAll("td")
        cells.forEach((cell, index, cells) => {
            cell.removeEventListener("mouseover", event => { })
        })
    }

    mod.startGame = function (player1, player2) {
        const cells = document.querySelectorAll("td")
        let x = 1;
        cells.forEach((cell, index) => {
            cell.addEventListener('click', () => {
                cell.style = 'color: #8887A2; font-family: Monoton; font-size:40px;';
                if (!gameboard.includes(index)) {
                    if (x % 2 === 0) {
                        this.alert(`It is ${player1.getName()} turn!`);
                        let win = player2.chooseCell(cell, index);
                        x += 1;
                        gameboard.push(index)
                        verifyGameWinner(win, player2);
                    } else {
                        this.alert(`It is ${player2.getName()} turn!`);
                        let win = player1.chooseCell(cell, index);
                        x += 1;
                        gameboard.push(index)
                        verifyGameWinner(win, player1);
                    }
                }
            }, false)
        })
    };

    mod.displayGameOver = function () { };
    return mod;
})();
