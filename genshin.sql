drop database if exists genshin;
create database genshin character set UTF8;
use genshin;

drop table if exists user, ascensions, talents, inventories, queue, characters, weapons, elements, type_weapons, experiences, items, types;
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
       ('Dendro'),
       ('All');

create table type_weapons
(
    id         int auto_increment not null,
    label      varchar(20)        not null,
    updated_at datetime,
    created_at datetime,
    primary key (id)
) engine = InnoDB;

insert into type_weapons (label)
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
       ('Talents'),
       ('Boss'),
       ('Unique Boss'),
       ('Stone'),
       ('Moras');

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
       ('Starconch', 1, 1),
       ('Valberry', 1, 1),
       ('Small Lamp Grass', 1, 1),
       ('Calla Lily', 1, 1),
       ('Brilliant Diamond', 6, 4),
       ('Agnidus Agate', 6, 4),
       ('Shivada Jade', 6, 4),
       ('Vajrada Amethyst', 6, 4),
       ('Varunada Lazurite', 6, 4),
       ('Vayuda Turquoise', 6, 4),
       ('Prithiva Topaz', 6, 4),
       ('Moras', 7, 1),
       ('xp', 7, 3),
       ('Noctilucous Jade', 1, 1),
       ('Marionette Core', 4, 1),
       ('Sea-Ganoderma', 1, 1);

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
    foreign key (weapon) references type_weapons (id),
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
       ('Keqing', 3, 1, 5, 26, 2, 22, 35, 22, 40, now(), now()),
       ('Eula', 5, 2, 5, 31, 3, 15, 33, 15, 48, now(), now()),
       ('Bennett', 6, 1, 4, 29, 9, 16, 33, 16, 42, now(), now()),
       ('Zhongli', 1, 4, 5, 24, 2, 19, 37, 19, 45, now(), now()),
       ('Rosaria', 5, 4, 4, 27, 53, 20, 34, 20, 47, now(), now()),
       ('Razor', 3, 2, 4, 26, 10, 15, 33, 15, 43, now(), now()),
       ('Amber', 6, 5, 4, 29, 54, 17, 32, 17, 44, now(), now()),
       ('Diluc', 6, 2, 5, 29, 54, 20, 33, 20, 42, now(), now()),
       ('Klee', 6, 3, 5, 29, 6, 18, 32, 18, 40, now(), now()),
       ('Qiqi', 5, 1, 5, 27, 8, 18, 35, 18, 39, now(), now()),
       ('Mona', 4, 3, 5, 28, 6, 22, 33, 22, 40, now(), now()),
       ('Xiao', 2, 4, 5, 30, 7, 19, 35, 19, 47, now(), now()),
       ('Albedo', 1, 1, 5, 24, 1, 18, 34, 18, 45, now(), now()),
       ('Xiangling', 6, 4, 4, 29, 5, 18, 36, 18, 43, now(), now()),
       ('Xinyan', 6, 2, 4, 29, 8, 16, 37, 16, 45, now(), now()),
       ('Xingqiu', 4, 1, 4, 28, 51, 15, 37, 15, 39, now(), now()),
       ('Beidou', 3, 2, 4, 26, 30, 16, 37, 16, 44, now(), now()),
       ('Fischl', 3, 5, 4, 26, 54, 17, 34, 17, 41, now(), now()),
       ('Lisa', 3, 3, 4, 26, 53, 19, 34, 19, 43, now(), now()),
       ('Chongyun', 5, 2, 4, 27, 2, 15, 36, 15, 44, now(), now()),
       ('Kaeya', 5, 1, 4, 27, 55, 16, 34, 16, 41, now(), now()),
       ('Diona', 5, 5, 4, 27, 55, 17, 32, 17, 46, now(), now()),
       ('Jean', 2, 1, 5, 25, 3, 15, 33, 15, 42, now(), now()),
       ('Sucrose', 2, 3, 4, 25, 9, 22, 32, 22, 41, now(), now()),
       ('Venti', 2, 5, 5, 25, 1, 19, 34, 19, 39, now(), now()),
       ('Ningguang', 1, 3, 4, 24, 4, 20, 35, 20, 41, now(), now()),
       ('Noelle', 1, 2, 4, 24, 53, 15, 33, 15, 43, now(), now()),
       ('Lumine', 8, 1, 5, 56, 9, 15, 32, 18, 44, now(), now()),
       ('Aether', 8, 1, 5, 56, 9, 15, 32, 18, 44, now(), now()),
       ('Yanfei', 6, 3, 4, 30, 65, 16, 37, 16, 49, now(), now()),
       ('Kaedehara Kazuha', 2, 1, 5, 66, 67, 16, 36, 16, 50, now(), now());

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

create table user
(
    id     int auto_increment not null,
    pseudo varchar(60)        not null,
    mail   varchar(255)       not null,
    pass   varchar(100)       not null,
    primary key (id)
) engine = InnoDB;
create index mail on user (mail);

insert into user
    value (1, 'Raiwtsu', 'orgevalthomas@gmail.com',
           '$2y$10$3ncvKqst/S4s4WVLqEPwN.sjYgXZ0lC..Ozy8BuzgbGVmxlIY6aKq');

create table inventories
(
    id         int auto_increment not null,
    mail       varchar(255)       not null,
    item       int                not null,
    level_item int                not null,
    amount     int                not null,
    primary key (id),
    foreign key (mail) references user (mail),
    foreign key (item) references items (id)
) engine = InnoDB;

create table queue
(
    id         int auto_increment not null,
    mail       varchar(255)       not null,
    item       int                not null,
    level_item int                not null,
    amount     int                not null,
    primary key (id),
    foreign key (mail) references user (mail),
    foreign key (item) references items (id)
) engine = InnoDB;

create table weapons
(
    id     int auto_increment not null,
    label  varchar(100)       not null,
    rarity int                not null,
    atk    int,
    type   int                not null,
    primary key (id),
    foreign key (type) references type_weapons (id)
) engine = InnoDB;

insert into weapons (label, rarity, atk, type)
values ('Primordial Jade Winged-Spear', 5, 48, 4),
       ('Skyward Spine', 5, 48, 4),
       ('Aquila Favonia', 5, 48, 1),
       ('Amos Bow', 5, 46, 5),
       ('Wolfs Gravestone', 5, 46, 2),
       ('Kunwus Iris Rift', 5, 46, 4),
       ('Skyward Harp', 5, 45, 5),
       ('Skyward Atlas', 5, 45, 3),
       ('Skyward Pride', 5, 45, 2),
       ('Blackcliff Warbow', 4, 44, 5),
       ('Lost Prayer to the Sacred Winds', 5, 44, 3),
       ('Mappa Mare', 4, 44, 3),
       ('Royal Grimoire', 4, 44, 3),
       ('Prototype Aminus', 4, 44, 2),
       ('Sacrificial Greatsword', 4, 44, 2),
       ('Crescent Pike', 4, 44, 4),
       ('Favonius Lance', 4, 44, 4),
       ('Blackcliff Longsword', 4, 44, 1),
       ('Prototype Rancour', 4, 44, 1),
       ('Skyward Blade', 5, 44, 1),
       ('The Alley Flash', 4, 44, 1),
       ('Sacrificial Bow', 4, 43, 5),
       ('Royal Greatsword', 4, 43, 2),
       ('Prototype Crescent', 4, 42, 5),
       ('Royal Bow', 4, 42, 5),
       ('Rust', 4, 42, 5),
       ('The Stringless', 4, 42, 5),
       ('The Viridescent Hunt', 4, 42, 5),
       ('Blackcliff Amulet', 4, 42, 3),
       ('Favonius Codex', 4, 42, 3),
       ('Prototype Malice', 4, 42, 3),
       ('Solar Pearl', 4, 42, 3),
       ('The Widsith', 4, 42, 3),
       ('Wine and Song', 4, 42, 3),
       ('Blackcliff Slasher', 4, 42, 2),
       ('Rainslasher', 4, 42, 2),
       ('Serpent Spine', 4, 42, 2),
       ('The Bell', 4, 42, 2),
       ('Whiteblind', 4, 42, 2),
       ('Blackcliff Pole', 4, 42, 4),
       ('Lithic Spear', 4, 42, 4),
       ('Prototype Grudge', 4, 42, 4),
       ('Iron Sting', 4, 42, 1),
       ('Lions Roar', 4, 42, 1),
       ('Royal Longsword', 4, 42, 1),
       ('The Black Sword', 4, 42, 1),
       ('The Flute', 4, 42, 1),
       ('Alley Hunter', 4, 41, 5),
       ('Compound Bow', 4, 41, 5),
       ('Favonius Warbow', 4, 41, 5),
       ('Eye of Perception', 4, 41, 3),
       ('Sacrificial Fragments', 4, 41, 3),
       ('Favonius Greatsword', 4, 41, 2),
       ('Lithic Blade', 4, 41, 2),
       ('Deathmatch', 4, 41, 4),
       ('Dragons Bane', 4, 41, 4),
       ('Favonius Sword', 4, 41, 1),
       ('Sacrificial Sword', 4, 41, 1),
       ('Ebony Bow', 3, 40, 5),
       ('Messenger', 3, 40, 5),
       ('Raven Bow', 3, 40, 5),
       ('Amber Catalyst', 3, 40, 3),
       ('Emerald Orb', 3, 40, 3),
       ('Twin Nephrite', 3, 40, 3),
       ('Quartz', 3, 40, 2),
       ('Halberd', 3, 40, 4),
       ('Dark Iron Sword', 3, 40, 1),
       ('Travelers Handy Sword', 3, 40, 1),
       ('Sharpshooters Oath', 3, 39, 5),
       ('Otherworldly Story', 3, 39, 3),
       ('Thrilling Tales of Dragon Slayers', 3, 39, 3),
       ('Debate Club', 3, 39, 2),
       ('Ferrous Shadow', 3, 39, 2),
       ('Skyrider Greatsword', 3, 39, 2),
       ('White Iron Greatsword', 3, 39, 2),
       ('White Tassel', 3, 39, 4),
       ('Cool Steel', 3, 39, 1),
       ('Fillet Blade', 3, 39, 1),
       ('Harbinger of Dawn', 3, 39, 1),
       ('Recurve Bow', 3, 38, 5),
       ('Slingshot', 3, 38, 5),
       ('Magic Guide', 3, 38, 3),
       ('Bloodtainted Greatsword', 3, 38, 2),
       ('Black Tassel', 3, 38, 4),
       ('Skyrider Sword', 3, 38, 1),
       ('Seasoned Hunters Bow', 2, 33, 5),
       ('Pocket Grimoire', 2, 33, 3),
       ('Old Mercs Pal', 2, 33, 2),
       ('Iron Point', 2, 33, 4),
       ('Silver Sword', 2, 33, 1),
       ('Hunters Bow', 1, 23, 5),
       ('Apprentices Notes', 1, 23, 3),
       ('Waster Greatsword', 1, 23, 2),
       ('Beginners Protector', 1, 23, 4),
       ('Dull Blade', 1, 23, 1);