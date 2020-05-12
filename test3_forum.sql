create table forum
(
    id         int auto_increment
        primary key,
    login      varchar(30)                           not null,
    text       varchar(8000)                         not null,
    moderation varchar(30) default '0'               not null,
    time       timestamp   default CURRENT_TIMESTAMP null
);

INSERT INTO test3.forum (id, login, text, moderation, time) VALUES (4, 'Vasiliy', 'хаю хай', 'ok', '2020-05-12 19:14:21');
INSERT INTO test3.forum (id, login, text, moderation, time) VALUES (5, 'ivan', 'пошел нахуй', 'no', '2020-05-12 19:17:38');
INSERT INTO test3.forum (id, login, text, moderation, time) VALUES (6, 'Admin', 'и тебе привет', 'ok', '2020-05-12 19:17:48');