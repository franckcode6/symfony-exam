<?php

namespace App\Services;

use App\Services\DiceThrower;

class ActionResolver
{

    private $testAttack;

    private $diceThrower;


    public function __construct(DiceThrower $diceThrower)
    {
        $this->diceThrower = $diceThrower;
    }

    function attack($attacker, $defender)
    {
        $testAttack = $this->diceThrower->rollHundred(1);

        if ($testAttack > $attacker->strength) {
            return Null;
        }

        $testDefense = $this->diceThrower->rollHundred(1);

        if ($testDefense > $defender->defense) {
            return Null;
        }

        $damages = $this->diceThrower->rollTwenty(6);

        return array_sum($damages);
    }
}

