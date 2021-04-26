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
       ('Silk Flower', 1, 1),
       ('Starconch', 1, 1);

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
values ('Ganyu', 5, 5, 5, 27, 7, 22, 36, 22, 47, now(), now()),
       ('Hu Tao', 6, 4, 5, 30, 51, 22, 36, 22, 46, now(), now()),
       ('Tartaglia', 4, 5, 5, 28, 52, 20, 32, 20, 46, now(), now()),
       ('Keqing', 3, 1, 5, 26, 2, 22, 35, 22, 40, now(), now());

create table experiences
(
    id     int     not null,
    label  char(3) not null,
    amount int     not null,
    moras  int     not null,
    primary key (id)
) engine = InnoDB;

insert into experiences (id, label, amount, moras)
values (1, 'xp1', 1000, 200),
       (2, 'xp2', 5000, 1000),
       (3, 'xp3', 20000, 4000);

create table ascensions
(
    id        int         not null,
    level     varchar(50) not null,
    stone     int         not null,
    lvl_stone int         not null,
    core      int         not null,
    flower    int         not null,
    item      int         not null,
    lvl_item  int         not null,
    moras     int         not null,
    xp1       int         not null,
    xp2       int         not null,
    xp3       int         not null,
    primary key (id)
) engine = InnoDB;

insert into ascensions (id, level, stone, lvl_stone, core, flower, item, lvl_item, moras, xp1, xp2, xp3)
values (1, '20+', 1, 1, 0, 3, 3, 1, 20000, 1, 0, 6),
       (2, '40+', 3, 2, 2, 10, 15, 1, 40000, 4, 3, 28),
       (3, '50+', 6, 2, 4, 20, 12, 2, 60000, 0, 4, 28),
       (4, '60+', 3, 3, 8, 30, 18, 2, 80000, 0, 3, 42),
       (5, '70+', 6, 3, 12, 45, 12, 3, 100000, 1, 3, 59),
       (6, '80+', 6, 4, 20, 60, 24, 3, 120000, 2, 2, 80),
       (7, '90', 0, 0, 0, 0, 0, 0, 0, 4, 0, 171);

create table talents
(
    id       int         not null,
    label    varchar(50) not null,
    core     int         not null,
    book     int         not null,
    lvl_book int         not null,
    item     int         not null,
    lvl_item int         not null,
    moras    int         not null,
    crown    int         not null,
    primary key (id)
) engine = InnoDB;

insert into talents (id, label, core, book, lvl_book, item, lvl_item, moras, crown)
values (1, '2', 0, 3, 1, 6, 1, 12500, 0),
       (2, '3', 0, 2, 2, 3, 2, 17500, 0),
       (3, '4', 0, 4, 2, 4, 2, 25000, 0),
       (4, '5', 0, 6, 2, 6, 2, 30000, 0),
       (5, '6', 0, 9, 2, 9, 2, 37500, 0),
       (6, '7', 1, 4, 3, 4, 3, 120000, 0),
       (7, '8', 1, 6, 3, 6, 3, 260000, 0),
       (8, '9', 2, 12, 3, 9, 3, 450000, 0),
       (9, '10', 2, 16, 3, 12, 3, 700000, 1);

select id, level, stone, lvl_stone, core, flower, item, lvl_item, moras, xp1, xp2, xp3 from ascensions
        where id between 0 and 7