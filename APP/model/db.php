<?php

require __DIR__ . '/characters.php';
require __DIR__ . '/elements.php';
require __DIR__ . '/items.php';
require __DIR__ . '/types.php';
require __DIR__ . '/weapons.php';
require __DIR__ . '/ascensions.php';
require __DIR__ . '/talents.php';
require __DIR__ . '/user.php';
require __DIR__ . '/inventories.php';

function db(): PDO
{
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        $db = new PDO('mysql:host=localhost;dbname=genshin;charset=utf8', 'root', '');
    } else {
        $var = (array) json_decode(file_get_contents(__DIR__ . '/env.json'));
        $db = new PDO('mysql:host=' . $var['HTTP_HOST'] . '; dbname=' . $var['HTTP_DBNAME'] . '; charset=utf8', $var['HTTP_USER'], $var['HTTP_MDP']);
    }
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Affiche toutes les alertes
    return $db;
}