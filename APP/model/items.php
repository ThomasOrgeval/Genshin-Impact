<?php

function getItems(): array
{
    return db()->query("select id, label, type, rarity_max from items order by type")->fetchAll();
}