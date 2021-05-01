<?php

session_start();
require '../../model/db.php';

$item = preg_split('#_#', $_POST['item'])[0];
$level = preg_split('#_#', $_POST['item'])[1];
$amount = $_POST['val'];

if (isset($_SESSION['Account'])) {
    if (existQueueItem($_SESSION['Account']['mail'], $item, $level)) {
        $predAmount = getQueue2($_SESSION['Account']['mail'], $item, $level)['amount'];
        setQueue2($_SESSION['Account']['mail'], $item, $level, $amount + $predAmount);
    } else addQueue($_SESSION['Account']['mail'], $item, $level, $amount);
}