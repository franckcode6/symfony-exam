<?php

namespace App\Services;

class DiceThrower
{
    function rollDices($diceNb, $sideNb)
    {
        if ($diceNb > 0 && $sideNb > 1) {
            for ($i = 1; $i <= $diceNb; $i++) {
                $y = rand(1, $sideNb);
                $result[] = $y;
            }
            return $result;
        }
    }

    function rollTwenty($diceNb)
    {
        if ($diceNb > 0) {
            for ($i = 1; $i <= $diceNb; $i++) {
                $y = rand(1, 20);
                $result[] = $y;
            }
            return $result;
        }
    }

    function rollHundred($diceNb)
    {
        if ($diceNb > 0) {
            for ($i = 1; $i <= $diceNb; $i++) {
                $y = rand(1, 100);
                $result[] = $y;
            }
            return $result;
        }
    }
}




