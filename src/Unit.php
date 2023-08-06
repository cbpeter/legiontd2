<?php

declare(strict_types=1);

namespace App;

final class Unit
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly AttackType $attackType,
        public readonly ArmorType $armorType,
        public readonly UnitType $unitType,
    )
    {
    }
}
