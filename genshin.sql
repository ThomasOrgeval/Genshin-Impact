drop database if exists genshin;
create database genshin character set UTF8;
use genshin;

create table element
(
    id    int auto_increment not null,
    label varchar(20)        not null,
    primary key (id)
) engine = InnoDB;

insert into element (label)
values ('Geo'),
       ('Anemo'),
       ('Electro'),
       ('Hydro'),
       ('Cryo'),
       ('Pyro'),
       ('Dendro');

create table weapon
(
    id    int auto_increment not null,
    label varchar(20)        not null,
    primary key (id)
) engine = InnoDB;

insert into weapon (label)
values ('Sword'),
       ('Claymore'),
       ('Catalyst'),
       ('Polearm'),
       ('Bow');

create table type
(
    id    int auto_increment not null,
    label varchar(50)        not null,
    primary key (id)
) engine = InnoDB;

insert into type (label)
values ('Flower'),
       ('Mob'),
       ('Talent'),
       ('Boss'),
       ('Unique Boss');

create table item
(
    id         int auto_increment not null,
    label      varchar(30)        not null,
    type       int                not null,
    rarity_max int                not null,
    primary key (id),
    foreign key (type) references type (id)
) engine = InnoDB;

insert into item (label, type, rarity_max)
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
       ('Gilded Scale', 5, 1);

create table `character`
(
    id                  int auto_increment not null,
    label               varchar(50)        not null,
    element             int                not null,
    weapon              int                not null,
    rarity              int                not null,
    lvl_up_material1    int                not null,
    lvl_up_material2    int                not null,
    lvl_up_material3    int                not null,
    talent_up_material1 int                not null,
    talent_up_material2 int                not null,
    talent_up_material3 int                not null,
    primary key (id),
    foreign key (weapon) references weapon (id),
    foreign key (element) references element (id),
    foreign key (lvl_up_material1) references item (id),
    foreign key (lvl_up_material2) references item (id),
    foreign key (lvl_up_material3) references item (id),
    foreign key (talent_up_material1) references item (id),
    foreign key (talent_up_material2) references item (id),
    foreign key (talent_up_material3) references item (id)
) engine = InnoDB;

insert into `character` (label, element, weapon, rarity, lvl_up_material1, lvl_up_material2, lvl_up_material3,
                         talent_up_material1, talent_up_material2, talent_up_material3)
values ('Ganyu', 5, 5, 5, 27, 7, 22, 36, 22, 47);

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
from `character` c
         inner join element e on c.element = e.id
         inner join weapon w on c.weapon = w.id
         inner join item i1 on c.lvl_up_material1 = i1.id
         inner join item i2 on c.lvl_up_material2 = i2.id
         inner join item i3 on c.lvl_up_material3 = i3.id
         inner join item i4 on c.talent_up_material1 = i4.id
         inner join item i5 on c.talent_up_material2 = i5.id
         inner join item i6 on c.talent_up_material3 = i6.id