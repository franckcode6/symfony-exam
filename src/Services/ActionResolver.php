<?php
namespace App\Services;

use App\Services\DiceThrower;

class ActionResolver {


function attack($attacker, $defender)
{

    $testAttack = DiceThrower.rollHundred(1);

    if ($testAttack > $attacker.strength) {
        return Null;
    }

    $testDefense = DiceThrower.rollHundred(1);

    if ($testDefense > $defender.defense) {
        return Null;
    }

    $damages = DiceThrower.rollTwenty(6);

    return array_sum($damages);
}
}

