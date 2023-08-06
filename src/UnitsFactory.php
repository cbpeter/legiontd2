<?php

declare(strict_types=1);

namespace App;

use Exception;

final class UnitsFactory
{
    /** @return Unit[] */
    public function create(): array
    {
        $unitsJson = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'units.json');
        $unitsData = json_decode($unitsJson, true);
        $units = [];
        foreach ($unitsData as $unitData) {
            $units[] = $this->createUnit($unitData);
        }

        return $units;
    }

    private function createUnit(array $unitData): Unit
    {
        if (!isset($unitData['legionId'], $unitData['armorType'], $unitData['attackType'], $unitData['unitId'], $unitData['name'])) {
            throw new Exception(sprintf('Missing unit data for "%s"', $unitData['unitId'] ?? 'Unknown'));
        }

        $unitType = match ($unitData['legionId']) {
            'creature_legion_id' => UnitType::Wave,
            'nether_legion_id' => UnitType::Offense,
            default => UnitType::Defense,
        };

        return new Unit(
            $unitData['unitId'],
            $unitData['name'],
            AttackType::fromValue($unitData['attackType']),
            ArmorType::fromValue($unitData['armorType']),
            $unitType,
        );
    }

}
