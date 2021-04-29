<?php

function addInventory($mail, $item, $level_item, $amount)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level_item = db()->quote($level_item);
    $amount = db()->quote($amount);
    db()->query("insert into inventories (mail, item, level_item, amount) value ($mail, $item, $level_item, $amount)");
}

function getInventories($mail): array
{
    $mail = db()->quote($mail);
    return db()->query("select id, mail, item, level_item, amount from inventories where mail = $mail")->fetchAll();
}

function getInventory($id)
{
    $id = db()->quote($id);
    return db()->query("select id, mail, item, level_item, amount from inventories where id = $id")->fetch();
}

function getInventory2($mail, $item, $level)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    return db()->query("select id, mail, item, level_item, amount from inventories where item = $item and level_item = $level and mail = $mail")->fetch();
}

function setInventory($id, $amount)
{
    $id = db()->quote($id);
    $amount = db()->quote($amount);
    db()->query("update inventories set amount = $amount where id = $id");
}

function setInventory2($mail, $item, $level, $amount)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    $amount = db()->quote($amount);
    db()->query("update inventories set amount = $amount where item = $item and level_item = $level and mail = $mail");
}

function existInventory($mail, $item, $level): bool
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    return db()->query("select id from inventories where mail = $mail and item = $item and level_item = $level")->rowCount() == 1;
}