<?php

require './model/db.php';

function accueil()
{
    $_POST['characters'] = getCharacters();
    require './view/accueil.php';
}

function character()
{
    $_POST = getCharacter(str_replace('-', ' ', $_GET['label']));
     $_POST['stones'] = get_stones($_POST['element']);
    if (in_array($_GET['label'], ['Lumine', 'Aether'])) {
        unset($_POST['lvl1']);
        unset($_POST['lvl_rar1']);
    }
    require './view/character.php';
}

function resources()
{
    $items = getItems();
    $_POST['items'] = array();
    foreach ($items as $item) {
        if (!isset($_POST['items'][$item['type']])) $_POST['items'][$item['type']] = array();
        array_push($_POST['items'][$item['type']], $item);
    }
    require './view/resources.php';
}

function slug($label)
{
    return str_replace(' ', '-', $label);
}

function getValue($var): int
{
    $value = 0;
    if (isset($_SESSION) && ((isset($_SESSION['items']) && isset($_SESSION['items'][$var]) || $_SESSION[$var]))) {
        if ($var === 'moras') $value = $_SESSION[$var];
        else $value = $_SESSION['items'][$var];
    } elseif (isset($_COOKIE) && (isset($_COOKIE['item' . $var]) || isset($_COOKIE[$var]))) {
        if ($var === 'moras') $value = $_COOKIE[$var];
        else $value = $_COOKIE['item' . $var];
    }
    return $value;
}

function get_stones($element): array
{
    $var = null;
    switch ($element) {
        case 'Pyro':
            $var = 'Agnidus Agate';
            break;
        case 'Cryo':
            $var = 'Vayuda Turquoise';
            break;
        case 'Hydro':
            $var = 'Varunada Lazurite';
            break;
        case 'Electro':
            $var = 'Vajrada Amethyst';
            break;
        case 'Geo':
            $var = 'Prithiva Topaz';
            break;
        case 'Anemo':
            $var = 'Shivada Jade';
            break;
        case 'All':
            $var = 'Brilliant Diamond';
            break;
    }
    return getStones($var);
}