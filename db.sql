Create DATABASE hw1;
USE hw1;

CREATE TABLE users (
    id integer primary key AUTO_INCREMENT,
    username varchar(16) not null unique,
    pass_word varchar(255) not null,
    email varchar(255) not null unique,
    nome varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;

CREATE TABLE orders (
    order_id integer not null AUTO_INCREMENT,
    user_id integer not null,
	product json,	
    PRIMARY KEY (order_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE InnODB;


CREATE TABLE team (
    id integer primary key,
    nome varchar(255) not null,
    surname varchar(255) not null,
    position varchar(255),
    char_image varchar(255),
    email varchar(255) not null
) Engine = InnoDB;




INSERT INTO team(id, nome, surname, position, char_image, email) VALUES('1', 'Luffy', 'Monkey D.', 'Captin', 'Luffy.jpg', 'example@onepiece.com')

INSERT INTO team(id, nome, surname, position, char_image, email) VALUES('2', 'Roronoa', 'Zoro', 'Vice-Captin', 'Zoro.jpeg', 'example@onepiece.com')

INSERT INTO team(id, nome, surname, position, char_image, email) VALUES('3', 'Edward', 'Newgate', 'Emperor', 'Whitebeard.jpeg', 'example@onepiece.com')

INSERT INTO team(id, nome, surname, position, char_image, email) VALUES('4', 'Ace', 'Portuguese D.', '2nd Division Commander', 'Ace.jpeg', 'example@onepiece.com')

INSERT INTO team(id, nome, surname, position, char_image, email) VALUES('5', 'Chopper', 'I do not know!', 'Doctor', 'chopper.png.jpeg', 'example@onepiece.com')


