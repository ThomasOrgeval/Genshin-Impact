<?php

function getAscensions($min, $max): array
{
    $min = db()->quote($min);
    $max = db()->quote($max);
    return db()->query("select id, level, stone, lvl_stone, core, flower, item, lvl_item, moras, xp1, xp2, xp3 from ascensions
        where id between $min and $max")->fetchAll();
}