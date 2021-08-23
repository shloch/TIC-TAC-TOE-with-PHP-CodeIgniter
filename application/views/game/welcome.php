<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TicTacToe</title>
    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style2.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>

<body>

	<div class="container my-container">
        <div class="row">
            <!-- Gameboad DIV -->
            <div class="col-sm-12 col-md-8 my-col">
            <div id="animate">
                <h2> <code>T</code><code>I</code><code>C</code> <code>T</code><code>A</code><code>C</code> <code>T</code><code>O</code><code>E</code> <code>G</code><code>A</code><code>M</code><code>E</code></h2>
            </div>
            <div id="container2">
                <form id="loginForm">
                    <p>Name Player 1 ('X'): <input type="text" name="player1" required/></p>
                    <p>Name Player 2 ('O'): <input type="text" name="player2" required/></p>
                    <div id="button">
                        <button id="startgame" type="submit">START GAME</button>
                    </div>    
                </form><br>

                <form id="scoresForm" method="post" action="<?php echo base_url() ;?>index.php/game/saveScoresToDB">
                    <input type="hidden" name="winner"/>
                    <input type="hidden" name="looser"/>
                    <input type="hidden" name="isDraw" value="notDraw"/>
                    <div class="splash"></div>
                </form>

                <span></span>
                <div id="shade" class=""></div>
                <table id="gameTable">

                </table> <br/><br/>       
            </div>
        </div>

        <!-- Scoreboad DIV -->
        <div class="d-none d-md-block col-4">
            <h3>Past Game scores</h3>
            <?php 
            if($rows != FALSE) 
            {
            ?>
                <div id="past-scores">
                    <table>
                        <thead >
                            <tr>
                                <th>player1</th>
                                <th>player2</th>
                                <th>Winner</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            foreach ($rows as $row) {
                            ?>

                            <tr>
                                <td rowspan="1">
                                <p><?php echo $row->winner; ?></p>
                                </td>
                                <td class="agenda-activites">
                                    <p><?php echo $row->looser; ?></p>
                                    </td>
                                <td class="agenda-description">
                                    <p><?php echo ($row->isDraw) ? "<strong> DRAW </strong>" : $row->winner; ?></p>
                                </td>
                                
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php 
            } else {
                echo "Play your first game and save the scores";
            }
            ?>
        </div>
    </div>
       
   </div>
   
    
    <script src="<?php echo base_url(); ?>assets/js/gameboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/gamePlay.js"></script>
</body>

</html>