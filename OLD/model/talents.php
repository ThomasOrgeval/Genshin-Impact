<?php

function getTalents($min, $max): array
{
    $min = db()->quote($min);
    $max = db()->quote($max);
    return db()->query("select id, label, core, book, lvl_book, item, lvl_item, moras, crown from talents
        where id between $min and $max")->fetchAll();
}