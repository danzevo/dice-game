# dice-game

a dice game script that accepts N number of players and M number of players as input
dice, with the following rules:
1. At the start of the game, each player gets a dice of M units.
2. All players will roll their respective dice at the same time
3. Each player will check the results of their roll of the dice and evaluate as follows:
a. Dice number 6 will be removed from the game and added as points
b. for the player.
c. Dice number 1 will be awarded to the player sitting next to him.
d. For example, the first player will give the dice the number 1 to the second player.
e. Dice numbers 2,3,4 and 5 will still be played by the player.
4. After the evaluation, the player who still has the dice will repeat the 2nd step
until only 1 player remains.
a. Players who have no more dice are considered to have finished playing.
5. The player who has the most points wins.

Build with php 7.4.

Example:
Player = 3, Dice = 4<br/>
===================<br/>
Turn 1 roll the dice:<br/>
Player #1 (0): 3,6,1,3<br/>
Player #2 (0): 2,4,5.5<br/>
Player #3 (0): 1,2,5,6<br/>
After evaluation:<br/>
Player #1 (1): 3,3,1<br/>
Player #2 (0): 2,4,5,5,1<br/>
Player #3 (1): 2.5<br/>
===================<br/>
Turn 2 roll the dice:<br/>
Player #1 (1): 1,2,6<br/>
Player #2 (0): 4,3,1,3,3<br/>
Player #3 (1): 1.6<br/>
After evaluation:<br/>
Player #1 (2): 2.1<br/>
Player #2 (0): 4,3,3,3,1<br/>
Player #3 (2): 1<br/>
===================<br/>
Turn 3 roll the dice:Player #1 (2): 6.1<br/>
Player #2 (0): 2,5,6,4,6<br/>
Player #3 (2): 1<br/>
After evaluation:<br/>
Player #1 (3): 1<br/>
Player #2 (2): 2,5,4,1<br/>
Player #3 (2): _ (Stop playing because it has no dice)<br/>
===================<br/>
Turn 4 roll the dice:<br/>
Player #1 (3): 1<br/>
Player #2 (2): 3,4,5.5<br/>
Player #3 (2): _ (Stop playing because it has no dice)<br/>
After evaluation:<br/>
Player #1(3): _ (Stop playing for not having dice)<br/>
Player #2 (2): 3,4,5.5<br/>
Player #3 (2): _ (Stop playing because it has no dice)<br/>
===================<br/>
Game ends because only player #2 has dice.<br/>
Game won by player #1 because it has more points than other players
