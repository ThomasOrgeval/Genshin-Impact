<?php

function getItems(): array
{
    return db()->query("select id, label, type, rarity_max from items order by type, id")->fetchAll();
}

function getItem($id)
{
    $id = db()->quote($id);
    return db()->query("select label from items where id = $id")->fetch();
}

function getStones($label): array
{
    $label = db()->quote($label);
    return db()->query("select id, label, rarity_max from items where type = 6 and label like $label")->fetchAll();
}