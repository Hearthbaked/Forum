create database forum;

CREATE TABLE themen (
  id int NOT NULL AUTO_INCREMENT primary key,
  titel varchar(255) NOT NULL
);

create table beitraege(
	id int not null auto_increment primary key,
	thema_id int not null,
	inhalt text not null,
	zeitpunkt datetime not null default now(),
	autor varchar(50) not null,
	foreign key(thema_id) references `themen`(id)
);