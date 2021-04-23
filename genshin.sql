drop database if exists genshin;
create database genshin character set UTF8;
use genshin;

create table elements
(
    id         int auto_increment not null,
    label      varchar(20)        not null,
    updated_at datetime,
    created_at datetime,
    primary key (id)
) engine = InnoDB;

insert into elements (label)
values ('Geo'),
       ('Anemo'),
       ('Electro'),
       ('Hydro'),
       ('Cryo'),
       ('Pyro'),
       ('Dendro');

create table weapons
(
    id         int auto_increment not null,
    label      varchar(20)        not null,
    updated_at datetime,
    created_at datetime,
    primary key (id)
) engine = InnoDB;

insert into weapons (label)
values ('Sword'),
       ('Claymore'),
       ('Catalyst'),
       ('Polearm'),
       ('Bow');

create table types
(
    id         int auto_increment not null,
    label      varchar(50)        not null,
    updated_at datetime,
    created_at datetime,
    primary key (id)
) engine = InnoDB;

insert into types (label)
values ('Flower'),
       ('Mob'),
       ('Talent'),
       ('Boss'),
       ('Unique Boss');

create table items
(
    id         int auto_increment not null,
    label      varchar(30)        not null,
    type       int                not null,
    rarity_max int                not null,
    updated_at datetime,
    created_at datetime,
    primary key (id),
    foreign key (type) references types (id)
) engine = InnoDB;

insert into items (label, type, rarity_max)
values ('Cecilia', 1, 1),
       ('Cor Lapis', 1, 1),
       ('Dandelion Seed', 1, 1),
       ('Glaze Lily', 1, 1),
       ('Jueyun Chili', 1, 1),
       ('Philanemo Mushroom', 1, 1),
       ('Qingxin', 1, 1),
       ('Violetgrass', 1, 1),
       ('Windwheel Aster', 1, 1),
       ('Wolfhook', 1, 1),
       ('Hunter\'s Sacrificial Knife', 2, 3),
       ('Chaos Device', 2, 3),
       ('Dead Ley Line Branch', 2, 3),
       ('Heavy Horn', 2, 3),
       ('Damaged Mask', 2, 3),
       ('Treasure Hoarder Insignia', 2, 3),
       ('Firm Arrowhead', 2, 3),
       ('Divining Scroll', 2, 3),
       ('Slime Condensate', 2, 3),
       ('Recruit\'s Insignia', 2, 3),
       ('Fragile Bone Shard', 2, 3),
       ('Whopperflower Nectar', 2, 3),
       ('Mist Grass Pollen', 2, 3),
       ('Basalt Pillar', 4, 1),
       ('Hurricane Seed', 4, 1),
       ('Lightning Prism', 4, 1),
       ('Hoarfrost Core', 4, 1),
       ('Cleansing Heart', 4, 1),
       ('Everflame Seed', 4, 1),
       ('Juvenile Jade', 4, 1),
       ('Crystalline Bloom', 4, 1),
       ('Freedom', 3, 3),
       ('Resistance', 3, 3),
       ('Ballad', 3, 3),
       ('Prosperity', 3, 3),
       ('Diligence', 3, 3),
       ('Gold', 3, 3),
       ('Crown of Insight', 3, 1),
       ('Tail of Boreas', 5, 1),
       ('Ring of Boreas', 5, 1),
       ('Spirit Locket of Boreas', 5, 1),
       ('Dvalin\'s Plume', 5, 1),
       ('Dvalin\'s Claw', 5, 1),
       ('Dvalin\'s Sigh', 5, 1),
       ('Tusk of Monoceros Caeli', 5, 1),
       ('Shard of Foul Legacy', 5, 1),
       ('Shadow of the Warrior', 5, 1),
       ('Dragon Lord\'s Crown', 5, 1),
       ('Bloodjade Branch', 5, 1),
       ('Gilded Scale', 5, 1),
       ('Silk Flower', 1, 1);

create table characters
(
    id                  int auto_increment not null,
    label               varchar(50)        not null,
    element             int                not null,
    weapon              int                not null,
    rarity              int                not null,
    lvl_up_material1    int,
    lvl_up_material2    int,
    lvl_up_material3    int,
    talent_up_material1 int,
    talent_up_material2 int,
    talent_up_material3 int,
    updated_at          datetime,
    created_at          datetime,
    primary key (id),
    foreign key (weapon) references weapons (id),
    foreign key (element) references elements (id),
    foreign key (lvl_up_material1) references items (id),
    foreign key (lvl_up_material2) references items (id),
    foreign key (lvl_up_material3) references items (id),
    foreign key (talent_up_material1) references items (id),
    foreign key (talent_up_material2) references items (id),
    foreign key (talent_up_material3) references items (id)
) engine = InnoDB;

insert into characters (label, element, weapon, rarity, lvl_up_material1, lvl_up_material2, lvl_up_material3,
                        talent_up_material1, talent_up_material2, talent_up_material3, created_at, updated_at)
values ('Ganyu', 5, 5, 5, 27, 7, 22, 36, 22, 47, now(), now());

select c.label,
       e.label,
       w.label,
       rarity,
       i1.label,
       i2.label,
       i3.label,
       i4.label,
       i5.label,
       i6.label
from characters c
         inner join elements e on c.element = e.id
         inner join weapons w on c.weapon = w.id
         inner join items i1 on c.lvl_up_material1 = i1.id
         inner join items i2 on c.lvl_up_material2 = i2.id
         inner join items i3 on c.lvl_up_material3 = i3.id
         inner join items i4 on c.talent_up_material1 = i4.id
         inner join items i5 on c.talent_up_material2 = i5.id
         inner join items i6 on c.talent_up_material3 = i6.id