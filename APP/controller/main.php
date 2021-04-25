<?php

require './model/db.php';

function accueil()
{
    $_POST['characters'] = getCharacters();
    require './view/accueil.php';
}

function character()
{
    $_POST = getCharacter($_GET['label']);
    require './view/character.php';
}

function resources()
{
    require './view/resources.php';
}

function slug($label)
{
    return str_replace(' ', '-', $label);
}

function getValue($var): int
{
    $value = 0;
    if (isset($_SESSION) && isset($_SESSION['items']) && isset($_SESSION['items'][$var])) {
        $value = $_SESSION['items'][$var];
    } elseif (isset($_COOKIE) && isset($_COOKIE['item' . $var])) {
        $value = $_COOKIE['item' . $var];
    }
    return $value;
}