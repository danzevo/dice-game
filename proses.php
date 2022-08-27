<?php 

$player = $_POST['player'];
$dice = $_POST['dice'];
$arrPlayer = [];
$points = 0;


for($i=0;$i<$player;$i++) {
    $arrPlayer[$i] = $dice;
}

$resultDice = [];
$pointOriPlayer = [];

getTheWin($arrPlayer, $resultDice, $pointOriPlayer);

function getTheWin($arrPlayer, $resultDice=array(), $pointOriPlayer = array(), $pointPlayer = array(), $next = false, $turnDice=1) {
    foreach($arrPlayer as $key => $value) {

        if($next) {
            if(isset($resultDice[$key]) && count($resultDice[$key]) > 0) {
                foreach($resultDice[$key] as $key_res => $res) {
                    $rand = rand(1, 6);
                    
                    $resultDice[$key][$key_res] = $rand;
                    $pointOriPlayer[$key] = $pointPlayer[$key];
                }
            } else {
                $resultDice[$key] = [];
                $pointOriPlayer[$key] = $pointPlayer[$key];
            }
        }
        if(!$next) { 
            for($i=0;$i<$value;$i++) {
                $rand = rand(1, 6);
        
                $resultDice[$key][$i] = $rand;
                $pointOriPlayer[$key] = 0;
            }
        }
    }

    $i = 1;
    $count = count($resultDice);
    $resultOriDice = $resultDice;
    
    foreach($resultDice as $key => $value) {
        foreach($value as $key_row => $row) {
            if($row == 6) {
                if(!isset($pointPlayer[$key]))
                $pointPlayer[$key] = 1;
                else
                $pointPlayer[$key] += 1;
                unset($resultDice[$key][$key_row]);
            } else {
                if(!isset($pointPlayer[$key]))
                $pointPlayer[$key] = 0;
            }

            if($row==1) {
                if($i < $count) {
                    array_push($resultDice[$key+1],1);
                    unset($resultDice[$key][$key_row]);
                } else {
                    array_push($resultDice[0],1);
                    unset($resultDice[$key][$key_row]);
                }
            }
        }
        $i++;
    }

    if($turnDice > 1) echo "<br>";

    echo "Turn $turnDice roll dice : <br>";
    $i = 1;
    foreach($resultOriDice as $key => $value) {
        echo "Player #".$i." (".$pointOriPlayer[$key]."): ".implode(",", $value)."<br>";
        $i++;
    }

    echo "After evaluation : <br>";
    $i = 1;
    $checkDice = 0;
    foreach($resultDice as $key => $value) {
        if(count($value) > 0)
            $checkDice++;

        echo "Player #".$i." (".$pointPlayer[$key]."): ".implode(",", $value)."<br>";
        $i++;
    }
    echo "====================";
   
    if($checkDice > 1) {
        $turnDice += 1;
        getTheWin($arrPlayer, $resultDice, $pointOriPlayer, $pointPlayer, true, $turnDice++);        
    } else {
        $playerLeft = array_keys(array_filter($resultDice, function($arr) {
            return count($arr) > 0;
        }))[0]+1;

        echo "<br> Game ends because only player #$playerLeft has dice.<br>";

        $key = array_search(max($pointPlayer), $pointPlayer)+1;
        $max  = max(array_values($pointPlayer));
        $keys = array_keys($pointPlayer, $max);

        if(count($keys) > 1) 
            echo "Game draw because same player with highest points";
        else
            echo "Game won by player #$key because it has more points than other players";
    }
}
