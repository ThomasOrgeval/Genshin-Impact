<?php

session_start();
require '../../model/db.php';

$item = preg_split('#_#', $_POST['item'])[0];
$level = preg_split('#_#', $_POST['item'])[1];

if (isset($_SESSION['Account'])) {
    if (existInventory($_SESSION['Account']['mail'], $item, $level))
        setInventory2($_SESSION['Account']['mail'], $item, $level, $_POST['amount']);
    else addInventory($_SESSION['Account']['mail'], $item, $level, $_POST['amount']);
}
/**
 * Todo : Ajouter la partie COOKIE
 * permet de ne pas avoir de compte et de pouvoir utiliser le site malgré tout
 */