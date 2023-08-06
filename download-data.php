<?php

$cacheDir = __DIR__ . DIRECTORY_SEPARATOR . 'cache';
if (!file_exists($cacheDir)) {
    mkdir($cacheDir);
}

$opts = ['http' => ['header' => 'x-api-key: MjABPWOLjx3Yf6zwXKYj52BjjbkxAY0U9CoJ30Ea']];
$context = stream_context_create($opts);

$wavesFilePath = $cacheDir . DIRECTORY_SEPARATOR . 'waves.json';
if (!file_exists($wavesFilePath)) {
    echo 'Retrieving generic wave data' . "\n";
    $unitsData = file_get_contents('https://apiv2.legiontd2.com/info/waves/0/21', false, $context);
    file_put_contents($wavesFilePath, $unitsData);
}

$unitsData = file_get_contents($cacheDir . DIRECTORY_SEPARATOR . 'waves.json');
$waves = json_decode($unitsData, true);

foreach($waves as $wave) {
    $waveUnitId = $wave['waveUnitId'] ?? null;
    $waveLevel = $wave['levelNum'] ?? null;
    if ($waveUnitId === null || $waveLevel === null) {
        throw new Exception(sprintf('Wave unit id unknown for wave "%s"', $waveLevel ?? 'Unknown'));
    }

    $waveFilePath = $cacheDir . DIRECTORY_SEPARATOR . "wave$waveLevel.json";

    if (!file_exists($waveFilePath)) {
        echo 'Retrieving wave data for #' . $waveLevel  . "\n";;
        $waveData = file_get_contents("https://apiv2.legiontd2.com/units/byId/$waveUnitId", false, $context);
        file_put_contents($waveFilePath, $waveData);
    }
}

$waveFilePath = $cacheDir . DIRECTORY_SEPARATOR . 'wave1.json';
$waveData = file_get_contents($waveFilePath);
$wave = json_decode($waveData, true);
$version = $wave['version'] ?? throw new Exception('Unable to determine game version');

$unitsFilePath = $cacheDir . DIRECTORY_SEPARATOR . 'units.json';
if (!file_exists($unitsFilePath)) {
    echo 'Retrieving unit data' . "\n";
    $unitsData = file_get_contents("https://apiv2.legiontd2.com/units/byVersion/$version?limit=250&enabled=true", false, $context);
    file_put_contents($unitsFilePath, $unitsData);
}
