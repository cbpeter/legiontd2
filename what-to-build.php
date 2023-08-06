<?php

use App\EffectivenessCollection;
use App\UnitsFactory;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Build map of weakness / strengths
$effectivenessCollection = new EffectivenessCollection();

// Load Units data
$unitsFactory = new UnitsFactory();
$units = $unitsFactory->create();

// Load Wave 1 data
// Match units data to wave 1 data
// Check wave unit armorType and attackType
// Compare wave units with map
// Find buildable units matching map
