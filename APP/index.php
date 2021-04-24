<?php

mb_internal_encoding("UTF-8");

require './controller/main.php';

try {
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'accueil':
                accueil();
                break;
            case 'character':
                character();
                break;
            case 'resources':
                resources();
                break;
        }
    } else accueil();
} catch (Exception $e) {

}