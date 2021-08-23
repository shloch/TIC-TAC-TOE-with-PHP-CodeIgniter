# TIC-TAC-TOE-with-PHP-CodeIgniter3

Documentation https://codeigniter.com/userguide3/index.html

## DEMO DISPLAY


## DESCRIPTION

There're 2 main javascript files handling UI interactions
- **application/assets/js/gamePlay.js**/ : contains the game logic and starts the game too
- **application/assets/js/gameBoard.js**/ : contains the DOM manipulation functions


- initially, when the games loads,**Game** controller loads the game and the past scores (from the database)
- when the game is loaded, the user can then play and all of the interactions is handled by Javascript
- after the game is finished (all 9 squares clicked, or there's a clear winner), the user has to click **SAVE TO DATABSE** so that the result can be stored into an SQL databse
- this saving into the database is once more handled by the **Game** controller
   

## Contributors

### 👤 **SHEY Louis CHIA**

- Github: [shloch](https://github.com/shloch)
- Twitter: [@shloch](https://twitter.com/shloch)
- Linkedin: [/in/shey-louis-chia](https://www.linkedin.com/in/shey-louis-chia)
- Email: shloch2007@yahoo.fr