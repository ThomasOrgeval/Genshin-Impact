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
    return db()->query("select id, item, level_item, amount from queue where mail = $mail")->fetchAll();
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
    return db()->query("select id, item, level_item, amount from queue where item = $item and level_item = $level and mail = $mail")->fetch();
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
    return db()->query("select id from queue where mail like $mail")->rowCount() >= 1;
}

function clearQueue($mail)
{
    $mail = db()->quote($mail);
    db()->query("delete from queue where mail like $mail");
}

function completeQueue($mail)
{
    $mail = db()->quote($mail);
    return db()->query("select sum(q.amount - ifnull(i.amount, 0) <= 0) = count(q.id) as reste from queue q
        left join inventories i on q.item = i.item and q.level_item = i.level_item 
        where q.mail like $mail")->fetch()['reste'];
}

function emptyQueue($mail)
{
    $mail = db()->quote($mail);
    db()->query("update inventories i
        inner join queue q on q.item = i.item and q.level_item = i.level_item
        set i.amount = i.amount - q.amount where i.mail like $mail");
}