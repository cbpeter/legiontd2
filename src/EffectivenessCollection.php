<?php

declare(strict_types=1);

namespace App;

final class EffectivenessCollection
{
    /** @var Effectiveness[] */
    private readonly array $list;

    public function __construct()
    {
        $this->list = $this->create();
    }

    public function getEffectiveness(AttackType $attackType, ArmorType $armorType): int
    {
        foreach ($this->list as $effectiveness) {
            if ($effectiveness->attackType === $attackType && $effectiveness->armorType === $armorType) {
                return $effectiveness->modifier;
            }
        }

        return 0;
    }

    /** @return Effectiveness[] */
    private function create(): array
    {
        $list = [];
        $list[] = new Effectiveness(AttackType::Impact, ArmorType::Swift, -20);
        $list[] = new Effectiveness(AttackType::Impact, ArmorType::Natural, -10);
        $list[] = new Effectiveness(AttackType::Impact, ArmorType::Fortified, 15);
        $list[] = new Effectiveness(AttackType::Impact, ArmorType::Arcane, 15);

        $list[] = new Effectiveness(AttackType::Pierce, ArmorType::Swift, 20);
        $list[] = new Effectiveness(AttackType::Pierce, ArmorType::Natural, -15);
        $list[] = new Effectiveness(AttackType::Pierce, ArmorType::Fortified, -20);
        $list[] = new Effectiveness(AttackType::Pierce, ArmorType::Arcane, 15);

        $list[] = new Effectiveness(AttackType::Magic, ArmorType::Swift, 0);
        $list[] = new Effectiveness(AttackType::Magic, ArmorType::Natural, 25);
        $list[] = new Effectiveness(AttackType::Magic, ArmorType::Fortified, 5);
        $list[] = new Effectiveness(AttackType::Magic, ArmorType::Arcane, -25);

        return $list;
    }
}
