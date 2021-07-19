<?php

function setUser($mail, $pass, $pseudo)
{
    $mail = db()->quote($mail);
    $pass = db()->quote($pass);
    $pseudo = db()->quote($pseudo);
    db()->query("insert into user (pseudo, mail, pass) value ($pseudo, $mail, $pass)");
}

function uniqueMail($mail): bool
{
    $mail = db()->quote($mail);
    return db()->query("select id from user where mail = $mail")->rowCount() == 0;
}

function getUser($mail, $pass)
{
    $mail = db()->quote($mail);
    $user = db()->query("select id, pseudo, mail, pass from user where mail = $mail")->fetch();
    if (password_verify($pass, $user['pass'])) {
        unset($user['pass']);
        return $user;
    } else return false;
}

function isAdmin($id): int
{
    $id = db()->quote($id);
    return db()->query("select admin from user where id = $id and admin = 1")->rowCount();
}