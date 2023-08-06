<?php

declare(strict_types=1);

namespace App;

final class EffectivenessFactory
{
    /** @return Effectiveness[] */
    public function getEffectivenesses(): array
    {
        $data = [];
        $data[] = new Effectiveness(AttackType::Impact, ArmorType::Swift, -20);
        $data[] = new Effectiveness(AttackType::Impact, ArmorType::Natural, -10);
        $data[] = new Effectiveness(AttackType::Impact, ArmorType::Fortified, 15);
        $data[] = new Effectiveness(AttackType::Impact, ArmorType::Arcane, 15);

        $data[] = new Effectiveness(AttackType::Pierce, ArmorType::Swift, 20);
        $data[] = new Effectiveness(AttackType::Pierce, ArmorType::Natural, -15);
        $data[] = new Effectiveness(AttackType::Pierce, ArmorType::Fortified, -20);
        $data[] = new Effectiveness(AttackType::Pierce, ArmorType::Arcane, 15);

        $data[] = new Effectiveness(AttackType::Magic, ArmorType::Swift, 0);
        $data[] = new Effectiveness(AttackType::Magic, ArmorType::Natural, 25);
        $data[] = new Effectiveness(AttackType::Magic, ArmorType::Fortified, 5);
        $data[] = new Effectiveness(AttackType::Magic, ArmorType::Arcane, -25);

        return $data;
    }
}
