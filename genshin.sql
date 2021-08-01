drop database if exists genshin;
create database genshin character set UTF8;
use genshin;

create table regions
(
    id    int auto_increment not null primary key,
    label varchar(100)       not null
) engine = innodb;

create table items
(
    id          int auto_increment not null primary key,
    type        enum ('Character EXP', 'Common Ascension', 'Character Ascension', 'Character Talent',
        'Weapon Enhancement', 'Weapon Ascension', 'Weapon Refinement', 'Local Specialities',
        'Cooking Ingredients', 'Forging Materials', 'Other', 'Serenitea Pot Furnishing',
        'Serenitea Pot Gardening') not null,
    label       varchar(256)       not null,
    rarity      int                not null,
    item_lower  int,
    effect      longtext,
    description longtext,
    region      int,
    created_at  datetime default now(),
    updated_at  datetime default now() on update now(),
    foreign key (item_lower) references items (id),
    foreign key (region) references regions (id)
) engine = innodb;

create table recipes
(
    id         int auto_increment not null primary key,
    result     int                not null,
    moras      int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (result) references items (id)
) engine = innodb;

create table item_recipe
(
    id         int auto_increment not null primary key,
    recipe     int                not null,
    part       int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (recipe) references recipes (id),
    foreign key (part) references items (id)
) engine = innodb;

create table bestiary
(
    id          int auto_increment                 not null primary key,
    type        enum ('Hilichurl', 'Blob', 'Abyss order', 'Fatui', 'Automaton', 'Human', 'Magical Beast',
        'Samurai', 'Mimic', 'Boss', 'Weekly Boss') not null,
    type_       enum ('Hilichurl', 'Blob', 'Abyss order', 'Fatui', 'Automaton', 'Human', 'Magical Beast',
        'Samurai', 'Mimic', 'Boss', 'Weekly Boss'),
    label       varchar(100)                       not null,
    description longtext,
    created_at  datetime default now(),
    updated_at  datetime default now() on update now()
) engine = innodb;

create table item_bestiary
(
    id         int auto_increment not null primary key,
    lvl_min    varchar(10)        not null,
    mob        int                not null,
    item       int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (mob) references bestiary (id),
    foreign key (item) references items (id)
) engine = innodb;

create table characters
(
    id          int auto_increment                                                  not null primary key,
    label       varchar(100)                                                        not null,
    title       varchar(100),
    allegiance  varchar(100),
    element     enum ('Geo', 'Anemo', 'Electro', 'Hydro', 'Cryo', 'Pyro', 'Dendro') not null,
    weapon      enum ('Sword', 'Claymore', 'Catalyst', 'Polearm', 'Bow')            not null,
    rarity      int                                                                 not null,
    birthday    varchar(50),
    astrolab    varchar(50),
    cn_seiyuu   varchar(100),
    en_seiyuu   varchar(100),
    jp_seiyuu   varchar(100),
    kr_seiyuu   varchar(100),
    description longtext,
    created_at  datetime default now(),
    updated_at  datetime default now() on update now()
) engine = innodb;

create table character_material
(
    id         int not null,
    lvl_up1    int,
    lvl_up2    int,
    lvl_up3_1  int,
    lvl_up3_2  int,
    lvl_up3_3  int,
    tal_up1_1  int,
    tal_up1_2  int,
    tal_up1_3  int,
    tal_up2_1  int,
    tal_up2_2  int,
    tal_up2_3  int,
    tal_up3    int,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (id) references characters (id),
    foreign key (lvl_up1) references items (id),
    foreign key (lvl_up2) references items (id),
    foreign key (lvl_up3_1) references items (id),
    foreign key (lvl_up3_2) references items (id),
    foreign key (lvl_up3_3) references items (id),
    foreign key (tal_up1_1) references items (id),
    foreign key (tal_up1_2) references items (id),
    foreign key (tal_up1_3) references items (id),
    foreign key (tal_up2_1) references items (id),
    foreign key (tal_up2_2) references items (id),
    foreign key (tal_up2_3) references items (id),
    foreign key (tal_up3) references items (id)
) engine = innodb;

create table experiences
(
    id         int auto_increment not null primary key,
    item       int                not null,
    amount     int                not null,
    moras      int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (item) references items (id)
) engine = InnoDB;

create table ascensions
(
    id           int auto_increment not null primary key,
    level        varchar(50)        not null,
    stone        int                not null,
    rarity_stone int                not null,
    core         int                not null,
    flower       int                not null,
    item         int                not null,
    rarity_item  int                not null,
    moras        int                not null,
    xp1          int                not null,
    xp2          int                not null,
    xp3          int                not null,
    created_at   datetime default now(),
    updated_at   datetime default now() on update now()
) engine = InnoDB;

create table leveling
(
    id         int auto_increment not null primary key,
    level      int                not null,
    xp         int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now()
) engine = innodb;

create table talents
(
    id          int auto_increment not null primary key,
    label       varchar(50)        not null,
    core        int                not null,
    book        int                not null,
    rarity_book int                not null,
    item        int                not null,
    rarity_item int                not null,
    moras       int                not null,
    crown       int                not null,
    created_at  datetime default now(),
    updated_at  datetime default now() on update now()
) engine = InnoDB;

create table weapons
(
    id           int auto_increment                                       not null primary key,
    label        varchar(100)                                             not null,
    rarity       int                                                      not null,
    type         enum ('Sword', 'Claymore', 'Catalyst', 'Polearm', 'Bow') not null,
    base_atk     int,
    second_stat  varchar(10),
    second_value float,
    description  longtext,
    passive      varchar(100),
    created_at   datetime default now(),
    updated_at   datetime default now() on update now()
) engine = InnoDB;

create table weapon_lvl
(
    id           int auto_increment not null primary key,
    weapon       int                not null,
    lvl          varchar(5)         not null,
    base_atk     int,
    second_value float,
    created_at   datetime default now(),
    updated_at   datetime default now() on update now(),
    foreign key (weapon) references weapons (id)
) engine = innodb;

create table weapon_refine
(
    id          int auto_increment not null primary key,
    weapon      int                not null,
    level       int                not null,
    description longtext,
    created_at  datetime default now(),
    updated_at  datetime default now() on update now(),
    foreign key (weapon) references weapons (id)
) engine = innodb;

create table user
(
    id         int auto_increment not null primary key,
    uid        varchar(15),
    pseudo     varchar(60)        not null,
    mail       varchar(255)       not null,
    pass       varchar(100)       not null,
    admin      bool     default 0,
    created_at datetime default now(),
    updated_at datetime default now() on update now()
) engine = InnoDB;
create index mail on user (mail);

create table inventories
(
    id         int auto_increment not null primary key,
    mail       varchar(255)       not null,
    item       int                not null,
    amount     int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (mail) references user (mail),
    foreign key (item) references items (id)
) engine = InnoDB;

create table queue
(
    id         int auto_increment not null primary key,
    mail       varchar(255)       not null,
    item       int                not null,
    amount     int                not null,
    created_at datetime default now(),
    updated_at datetime default now() on update now(),
    foreign key (mail) references user (mail),
    foreign key (item) references items (id)
) engine = InnoDB;

create table wish_history
(
    id         int          not null primary key,
    uid        varchar(15)  not null,
    gacha_type int          not null,
    item_id    int,
    count      int,
    time       datetime     not null,
    name       varchar(255) not null,
    lang       char(5) default 'en-us',
    item_type  enum ('Weapon', 'Character'),
    rank_type  int          not null
) engine = innodb;