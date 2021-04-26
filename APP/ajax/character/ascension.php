<?php

require '../../model/db.php';
$min = $_POST['lvl_min'];
$max = $_POST['lvl_max'];

$stone1 = 0;
$stone2 = 0;
$stone3 = 0;
$stone4 = 0;

$core = 0;

$flower = 0;

$item1 = 0;
$item2 = 0;
$item3 = 0;

$moras = 0;

$xp1 = 0;
$xp2 = 0;
$xp3 = 0;

foreach (getAscensions($min, $max) as $ascension) {
    switch ($ascension['lvl_stone']) {
        case '1':
            $stone1 += (int) $ascension['stone'];
            break;
        case '2':
            $stone2 += (int) $ascension['stone'];
            break;
        case '3':
            $stone3 += (int) $ascension['stone'];
            break;
        case '4':
            $stone4 += (int) $ascension['stone'];
            break;
    }

    $core += (int) $ascension['core'];
    $flower += (int) $ascension['flower'];

    switch ($ascension['lvl_item']) {
        case '1':
            $item1 += (int) $ascension['item'];
            break;
        case '2':
            $item2 += (int) $ascension['item'];
            break;
        case '3':
            $item3 += (int) $ascension['item'];
            break;
    }

    $moras += (int) $ascension['moras'];
    $xp1 += (int) $ascension['xp1'];
    $xp2 += (int) $ascension['xp2'];
    $xp3 += (int) $ascension['xp3'];
}

$moras += $xp1 * 200 + $xp2 * 1000 + $xp3 * 4000;

$array = array('stone' => [$stone1, $stone2, $stone3, $stone4], 'core' => $core, 'flower' => $flower,
    'item' => [$item1, $item2, $item3], 'moras' => $moras, 'xp' => [$xp1, $xp2, $xp3]);
echo json_encode($array);