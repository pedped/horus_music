CREATE DATABASE IF NOT EXISTS homusic;
USE homusic;

create table token
(
    id          int auto_increment
        primary key,
    user_id     int          not null,
    token       varchar(255) not null,
    valid_until datetime     not null
)
    collate = utf8mb4_unicode_ci;

create table user
(
    id         int auto_increment
        primary key,
    email      varchar(255) not null,
    first_name varchar(255) not null,
    last_name  varchar(255) not null,
    role       varchar(255) not null,
    password   varchar(255) not null,
    status     int          not null
)
    collate = utf8mb4_unicode_ci;

create table music
(
    id        int auto_increment
        primary key,
    user_id   int          not null,
    title     varchar(255) not null,
    genre     varchar(255) not null,
    lyrics    longtext     not null,
    file_path varchar(255) not null,
    file_link varchar(255) not null,
    staus     int          not null,
    date      datetime     not null,
    constraint FK_CD52224AA76ED395
        foreign key (user_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_CD52224AA76ED395
    on music (user_id);