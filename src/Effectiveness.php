<?php

declare(strict_types=1);

namespace App;

final class Effectiveness
{
    public function __construct(
        public readonly AttackType $attackType,
        public readonly ArmorType $armorType,
        public readonly int $effectiveness,
    )
    {

    }

}
