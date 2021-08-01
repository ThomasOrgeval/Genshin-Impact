<?php

function getCharacters(): array
{
    return db()->query("select c.id,
       c.label as label,
       e.label as element,
       w.label as weapon,
       rarity,
       i1.label as lvl1,
       i1.rarity_max as lvl_rar1,
       i2.label as lvl2,
       i2.rarity_max as lvl_rar2,
       i3.label as lvl3,
       i3.rarity_max as lvl_rar3,
       i4.label as tal1,
       i4.rarity_max as tal_rar1,
       i5.label as tal2,
       i5.rarity_max as tal_rar2,
       i6.label as tal3,
       i6.rarity_max as tal_rar3
from characters c
         inner join elements e on c.element = e.id
         inner join type_weapons w on c.weapon = w.id
         inner join items i1 on c.lvl_up_material1 = i1.id
         inner join items i2 on c.lvl_up_material2 = i2.id
         inner join items i3 on c.lvl_up_material3 = i3.id
         inner join items i4 on c.talent_up_material1 = i4.id
         inner join items i5 on c.talent_up_material2 = i5.id
         inner join items i6 on c.talent_up_material3 = i6.id
         order by rarity desc, c.label")->fetchAll();
}

function getCharacter($label)
{
    $label = db()->quote($label);
    return db()->query("select c.id, c.label as label, e.label as element, w.label as weapon, rarity,
       i1.label as lvl1, i1.rarity_max as lvl_rar1, i2.label as lvl2, i2.rarity_max as lvl_rar2, i3.label as lvl3,
       i3.rarity_max as lvl_rar3, i4.label as tal1, i4.rarity_max as tal_rar1, i5.label as tal2, i5.rarity_max as tal_rar2,
       i6.label as tal3, i6.rarity_max as tal_rar3, i1.id as lvl_id1, i2.id as lvl_id2, i3.id as lvl_id3, i4.id as tal_id1, 
       i5.id as tal_id2, i6.id as tal_id3
        from characters c
           inner join elements e on c.element = e.id inner join type_weapons w on c.weapon = w.id inner join items i1 on c.lvl_up_material1 = i1.id
           inner join items i2 on c.lvl_up_material2 = i2.id inner join items i3 on c.lvl_up_material3 = i3.id inner join items i4 on c.talent_up_material1 = i4.id
           inner join items i5 on c.talent_up_material2 = i5.id inner join items i6 on c.talent_up_material3 = i6.id 
        where c.label like $label")->fetch();
}