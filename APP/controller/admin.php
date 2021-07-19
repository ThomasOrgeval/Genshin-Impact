<?php

function admin()
{
    if (isset($_SESSION['Account']) && isAdmin($_SESSION['Account']['id'])) {
        $_POST['characters'] = getCharacters();
        //$_POST['weapons']
        require __DIR__ . '/../view/admin.php';
    } else header('home');
}

function edit_character()
{
    if (isset($_SESSION['Account']) && isAdmin($_SESSION['Account']['id'])) {
        $_POST['character'] = getCharacterById($_GET['id']);
        $_POST['items'] = getItems();
        //$_POST['type_weapons']
        require __DIR__ . '/../view/edit_character.php';
    } else header('home');
}