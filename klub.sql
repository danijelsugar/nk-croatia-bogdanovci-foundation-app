drop database if exists croatia;

create database croatia default character set utf8;


use croatia;


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
brojregistracije varchar(30) not null
);

create table kategorijaigrac(
kategorija int not null,
igrac int not null
);

create table utakmica(
sifra int not null primary key auto_increment,
naziv varchar(30) not null,
datumodigravanja datetime not null,
klub1 int not null,
klub2 int not null
);


alter table kategorija add foreign key (klub) references klub(sifra);
alter table kategorija add foreign key (trener) references trener(sifra);

alter table kategorijaigrac add foreign key (kategorija) references kategorija(sifra);
alter table kategorijaigrac add foreign key (igrac) references igrac(sifra);

alter table utakmica add foreign key (klub1) references klub(sifra);
alter table utakmica add foreign key (klub2) references klub(sifra);




insert into igrac (sifra,ime,prezime,oib,brojtelefona,brojregistracije) values
(null,'Marin','Ergović','05473817432','8642685473','007654'),
(null,'Stjepan','Ergović','42790614675','0946326854','568900'),
(null,'Mateo','Blažević','00075300438','1234567890','361587'),
(null,'Danijel','Šugar','45000331567','8901237645','668231'),
(null,'Andreas','Živković','22234779056','1463367656','447911');


insert into trener (sifra,ime,prezime,oib,brojtelefona,brojlicence) values
(null,'Božo','Gelo','00006754765','4446782345','664423'),
(null,'Željko','Matković','99765477900','8865389066','996754'),
(null,'Vladimir','Prce','33563678568','1143668976','114455');


insert into klub (sifra,naziv,pozicija,brojbodova,zabijenihgolova,primljenihgolova) values
(null,'Croatia Bogdanovci',1,45,56,23),
(null,'Mitnica',6,30,43,35),
(null,'Trpinja',3,39,49,29),
(null,'Negoslavci',2,42,60,27);


insert into kategorija (sifra,naziv,trener,klub) values
(null,'Seniori',1,1),
(null,'Juniori',2,1),
(null,'Pioniri',3,1);