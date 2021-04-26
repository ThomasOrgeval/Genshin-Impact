<?php

require '../../model/db.php';
$min = $_POST['lvl_min'];
$max = $_POST['lvl_max'];

$book1 = 0;
$book2 = 0;
$book3 = 0;

$core = 0;

$item1 = 0;
$item2 = 0;
$item3 = 0;

$moras = 0;

$crown = 0;

foreach (getTalents($min, $max) as $talent) {
    switch ($talent['lvl_book']) {
        case '1':
            $book1 += (int) $talent['book'];
            break;
        case '2':
            $book2 += (int) $talent['book'];
            break;
        case '3':
            $book3 += (int) $talent['book'];
            break;
    }

    $core += (int) $talent['core'];

    switch ($talent['lvl_item']) {
        case '1':
            $item1 += (int) $talent['item'];
            break;
        case '2':
            $item2 += (int) $talent['item'];
            break;
        case '3':
            $item3 += (int) $talent['item'];
            break;
    }

    $moras += (int) $talent['moras'];

    $crown += (int) $talent['crown'];
}

$array = array('book' => [$book1, $book2, $book3], 'core' => $core, 'crown' => $crown,
    'item' => [$item1, $item2, $item3], 'moras' => $moras);
echo json_encode($array);