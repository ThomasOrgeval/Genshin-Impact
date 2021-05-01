<?php

mb_internal_encoding("UTF-8");
session_start();

require __DIR__ . '/controller/main.php';
require __DIR__ . '/controller/libs/flash.php';

try {
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'home':
                home();
                break;
            case 'character':
                character();
                break;
            case 'resources':
                resources();
                break;
            case 'signIn':
                signIn();
                break;
            case 'signUp':
                signUp();
                break;
            case 'signOut':
                signOut();
                break;
        }
    } else home();
} catch (Exception $e) {

}