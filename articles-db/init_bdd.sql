create table article (
id int not null auto_increment,
libelle VARCHAR(30) not null,
prix double,
primary key (id)
);

insert into article(libelle,prix) values ('Nissan 200SX', 30000);

insert into article(libelle,prix) values ('Kawasaki ZX7R', 3000);

insert into article(libelle,prix) values ('Nissan GTR', 2000000);

insert into article(libelle,prix) values ('Yamaha Fzr600R', 2000);