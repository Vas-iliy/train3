create table admin
(
    id       int auto_increment
        primary key,
    login    varchar(30) not null,
    password varchar(30) not null
);

INSERT INTO test3.admin (id, login, password) VALUES (1, 'Admin', '123');