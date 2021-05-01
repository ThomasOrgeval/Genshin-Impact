<?php

function addQueue($mail, $item, $level_item, $amount)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level_item = db()->quote($level_item);
    $amount = db()->quote($amount);
    db()->query("insert into queue (mail, item, level_item, amount) value ($mail, $item, $level_item, $amount)");
}

function getQueues($mail): array
{
    $mail = db()->quote($mail);
    return db()->query("select id, mail, item, level_item, amount from queue where mail = $mail")->fetchAll();
}

function getQueue($id)
{
    $id = db()->quote($id);
    return db()->query("select id, mail, item, level_item, amount from queue where id = $id")->fetch();
}

function getQueue2($mail, $item, $level)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    return db()->query("select id, mail, item, level_item, amount from queue where item = $item and level_item = $level and mail = $mail")->fetch();
}

function setQueue($id, $amount)
{
    $id = db()->quote($id);
    $amount = db()->quote($amount);
    db()->query("update queue set amount = $amount where id = $id");
}

function setQueue2($mail, $item, $level, $amount)
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    $amount = db()->quote($amount);
    db()->query("update queue set amount = $amount where item = $item and level_item = $level and mail = $mail");
}

function existQueueItem($mail, $item, $level): bool
{
    $mail = db()->quote($mail);
    $item = db()->quote($item);
    $level = db()->quote($level);
    return db()->query("select id from queue where mail = $mail and item = $item and level_item = $level")->rowCount() == 1;
}

function existQueue($mail): bool
{
    $mail = db()->quote($mail);
    return db()->query("select count(id) from queue where mail like $mail")->rowCount() == 1;
}