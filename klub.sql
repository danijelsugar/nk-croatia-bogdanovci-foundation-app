drop database if exists croatia;

create database croatia default character set utf8;

#sipanje baze
#c:\xampp\mysql\bin\mysql -uedunova -pedunova --default_character_set=utf8 < E:\htdocs\nk_croatia_bogdanovci_app\Site\klub.sql

use croatia;

create table operater(
sifra int not null primary key auto_increment,
email varchar(50) not null,
lozinka varchar(255) not null,
ime varchar(50) not null,
prezime varchar(50) not null,
uloga varchar(50) not null
);

create table klub(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
pozicija int not null,
brojbodova int not null,
zabijenihgolova int not null,
primljenihgolova int not null
);

create table kategorija(
sifra int not null primary key auto_increment,
naziv varchar(40) not null,
trener int not null,
klub int not null
);

create table trener(
sifra int not null primary key auto_increment,
ime varchar (30) not null,
prezime varchar (30) not null,
oib varchar(11),
brojtelefona varchar(15),
brojlicence varchar(30) not null
);

create table igrac(
sifra int not null primary key auto_increment,
ime varchar (30) not null,
prezime varchar (30) not null,
oib varchar(11),
brojtelefona varchar(15),
brojregistracije varchar(30) not null,
klub int not null,
zutikartoni int,
crvenikartoni int,
golovi int
);

create table kategorijaigrac(
sifra int not null primary key auto_increment,
kategorija int not null,
igrac int not null
);

create table utakmica(
sifra int not null primary key auto_increment,
naziv varchar(30) not null,
klub1 int not null,
klub2 int not null,
datumodigravanja datetime not null,
napomena varchar(200)
);


alter table kategorija add foreign key (klub) references klub(sifra);
alter table kategorija add foreign key (trener) references trener(sifra);

alter table kategorijaigrac add foreign key (kategorija) references kategorija(sifra);
alter table kategorijaigrac add foreign key (igrac) references igrac(sifra);

alter table utakmica add foreign key (klub1) references klub(sifra);
alter table utakmica add foreign key (klub2) references klub(sifra);

alter table igrac add foreign key (klub) references klub(sifra);


insert into klub (sifra,naziv,pozicija,brojbodova,zabijenihgolova,primljenihgolova) values
(null,'Croatia Bogdanovci',1,45,56,23),
(null,'Mitnica',6,30,43,35),
(null,'Trpinja',3,39,49,29),
(null,'Negoslavci',2,42,60,27);


insert into igrac (sifra,ime,prezime,oib,brojtelefona,brojregistracije,klub,zutikartoni,crvenikartoni,golovi) values
(null,'Marin','Ergović','05473817432','8642685473','007654',1,1,1,4),
(null,'Stjepan','Ergović','42790614675','0946326854','568900',1,2,0,1),
(null,'Mateo','Blažević','00075300438','1234567890','361587',1,2,2,2),
(null,'Danijel','Šugar','45000331567','8901237645','668231',1,3,3,3),
(null,'Andreas','Živković','22234779056','1463367656','447911',1,0,0,0);


insert into trener (sifra,ime,prezime,oib,brojtelefona,brojlicence) values
(null,'Božo','Gelo','00006754765','4446782345','664423'),
(null,'Željko','Matković','99765477900','8865389066','996754'),
(null,'Vladimir','Prce','33563678568','1143668976','114455');


insert into kategorija (sifra,naziv,trener,klub) values
(null,'Seniori',1,1),
(null,'Juniori',2,1),
(null,'Pioniri',3,1);


insert into utakmica (sifra,naziv,klub1,klub2,datumodigravanja,napomena) values 
(null,'1. kolo',1,2,'2018-04-30',''),
(null,'1. kolo',3,4,'2018-04-30','');


insert into kategorijaigrac (kategorija,igrac) values 
(1,1),
(2,2),
(3,4);


insert into operater (email,lozinka,uloga,ime,prezime) values 
('dsugar@gmail.com','$2y$12$sKX3yldMZhixSkEgeWQm4ObXqAejTIpcbAtYwU.eWjj1PywQzfenG',
'admin','Danijel','Šugar'),
('edunova@edunova.hr','$2y$12$rLkAxNcXn8dUY1C3MUYVV.qceDJcVbVYZu7El75qAqkCR.cMnuwRC',
'korisnik','Pero','Perić');


select 'Sve uspjesno odradeno' as poruka;
