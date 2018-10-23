-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 09:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `croatia`
--

-- --------------------------------------------------------

--
-- Table structure for table `igrac`
--

CREATE TABLE `igrac` (
  `sifra` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `oib` varchar(11) DEFAULT NULL,
  `brojtelefona` varchar(15) DEFAULT NULL,
  `brojregistracije` varchar(30) NOT NULL,
  `klub` int(11) NOT NULL,
  `zutikartoni` int(11) DEFAULT NULL,
  `crvenikartoni` int(11) DEFAULT NULL,
  `golovi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `igrac`
--

INSERT INTO `igrac` (`sifra`, `ime`, `prezime`, `oib`, `brojtelefona`, `brojregistracije`, `klub`, `zutikartoni`, `crvenikartoni`, `golovi`) VALUES
(1, 'Marin', 'Ergović', '05473817432', '8642685473', '007654', 1, 1, 1, 4),
(2, 'Stjepan', 'Ergović', '42790614675', '0946326854', '568900', 1, 2, 0, 1),
(4, 'Danijel', 'Šugar', '45000331567', '8901237645', '668231', 1, 3, 3, 3),
(5, 'Andreas', 'Živković', '22234779056', '1463367656', '447911', 1, 0, 0, 0),
(7, 'Hugo', 'Šardi', '56874659163', '4567843245', '678543', 1, 1, 0, 1),
(8, 'Antonio', 'Majzec', '69594211943', '0980980980', '785478', 1, 2, 0, 3),
(9, 'Simeon ', 'Prskavac', '25959126457', '2130945324', '437890', 1, 0, 1, 2),
(10, 'Oleg ', 'Delale', '55423305327', '0945673467', '894678', 1, 3, 0, 2),
(11, 'Arijan ', 'Pušek', '40071848027', '0589648525', '547896', 1, 1, 1, 6),
(12, 'Mauro ', 'Genzić', '73430062882', '5790547858', '236743', 1, 2, 0, 5),
(13, 'Blagoje ', 'Žinić', '73699111144', '5872069852', '587412', 1, 0, 0, 0),
(14, 'Darislav ', 'Lešdedaj', '33602881372', '4785269854', '589325', 2, 1, 1, 2),
(15, 'Nuri ', 'Pačelat', '17022933475', '5842569852', '742501', 2, 3, 0, 4),
(16, 'Jadran ', 'Marčinko', '00360724580', '0478520698', '520400', 2, 3, 0, 7),
(17, 'Mustafa ', 'Pucan', '17745265175', '8524152058', '475625', 2, 0, 0, 0),
(18, 'Adrijano ', 'Lepesić', '25241148589', '5874256304', '258741', 2, 1, 1, 3),
(19, 'Pejo', 'Česko', '52212919141', '8742068520', '547962', 8, 2, 0, 1),
(20, 'Norman ', 'Grgac', '92332678139', '8524783685', '961485', 8, 2, 0, 5),
(21, 'Jašar ', 'Čabrajić', '62049730670', '5005005410', '120213', 8, 0, 0, 0),
(22, 'Valentin ', 'Božan', '35117660958', '8520483604', '089425', 8, 1, 1, 1),
(23, 'Štefek ', 'Mikel', '73402807760', '8742563585', '698254', 8, 2, 0, 3),
(24, 'Stjepan ', 'Husko', '03321325909', '0479654123', '369854', 6, 2, 1, 2),
(25, 'Alojzije ', 'Livović', '21839217435', '0584256357', '571235', 6, 1, 0, 5),
(26, 'Pavlimir ', 'Gegollaj', '37644146620', '0547852456', '741254', 6, 1, 1, 3),
(27, 'Jožek ', 'Tabulov', '22056709229', '0357813952', '525258', 6, 3, 0, 1),
(28, 'Attila ', 'Picer', '94257412652', '0576259425', '574476', 6, 0, 0, 0),
(29, 'Theo ', 'Užbinec', '15534800110', '5270350405', '010568', 4, 3, 1, 5),
(30, 'Šima ', 'Rebo', '96452338628', '0578986287', '875204', 4, 1, 1, 1),
(31, 'Ivan ', 'Bernobić', '44013742127', '5241205874', '695247', 4, 2, 0, 3),
(32, 'Bernhard ', 'Brana', '43567577515', '8745210692', '823719', 4, 3, 1, 5),
(33, 'Fran ', 'Vučinac', '79024983490', '8703742596', '452190', 4, 1, 0, 2),
(34, 'Mika ', 'Giljanović', '41988098349', '8425741896', '748516', 3, 1, 1, 1),
(35, 'Nicola ', 'Habjanec', '19550894604', '2570685247', '472568', 3, 2, 0, 5),
(36, 'Lazo ', 'Rušić', '26266505530', '5420368952', '785214', 3, 3, 0, 2),
(37, 'Jedinko ', 'Porodec', '45317070299', '5247852369', '782000', 3, 2, 1, 6),
(38, 'Massimiliano ', 'Pučić', '65727004034', '5862475200', '000587', 3, 1, 1, 6),
(39, 'Filippo ', 'Badžoka', '82119496603', '5214752585', '321457', 5, 3, 1, 4),
(40, 'Joco ', 'Antukić', '20185614640', '5478523695', '785246', 5, 1, 0, 7),
(41, 'Mikele ', 'Validžija', '73147474141', '8740236985', '574268', 5, 2, 0, 2),
(42, 'Blažan ', 'Sakan', '26430859006', '5248962570', '000876', 5, 1, 1, 1),
(43, 'Tadej ', 'Peklarić', '21331545335', '9452047896', '004586', 5, 2, 1, 4),
(44, 'Marc ', 'Ćurćić', '01927116609', '5248965428', '558766', 10, 3, 1, 3),
(45, 'Tibor ', 'Velič', '79679309632', '5790004588', '047666', 10, 2, 0, 0),
(46, 'Marko ', 'Bamburać', '81945113945', '2574638957', '556871', 10, 1, 1, 0),
(47, 'Dominic ', 'Šeget', '31389487160', '8524103600', '789471', 10, 3, 0, 0),
(48, 'Vincent ', 'Suhorski', '81146329210', '2540369752', '681147', 10, 2, 0, 0),
(49, 'Jadranko ', 'Job', '92589704609', '8542793571', '933111', 9, 2, 0, 0),
(50, 'Miron ', 'Medoš', '92590419319', '9652145200', '369999', 9, 3, 0, 1),
(51, 'Tiho ', 'Koncani', '48719601821', '5249630899', '994411', 9, 0, 0, 1),
(52, 'Nenad ', 'Sekanić', '48582134683', '8417897878', '781789', 9, 2, 1, 6),
(53, 'Sašo ', 'Marčević', '10334607407', '4771471771', '321223', 9, 2, 0, 4),
(54, 'Armano ', 'Peštalić', '17607040787', '6542813794', '695937', 7, 3, 1, 5),
(55, 'Matiša ', 'Šorn', '96877031385', '9871025004', '987452', 7, 1, 1, 4),
(56, 'Harold ', 'Hrg', '52231565719', '8752146925', '555476', 7, 2, 0, 0),
(57, 'Dare ', 'Plazina', '06883825827', '5796300450', '789987', 7, 1, 0, 2),
(58, 'Romario ', 'Žarinac', '27533881432', '9875213654', '147965', 7, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `sifra` int(11) NOT NULL,
  `naziv` varchar(40) NOT NULL,
  `trener` int(11) NOT NULL,
  `klub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`sifra`, `naziv`, `trener`, `klub`) VALUES
(1, 'Seniori', 1, 1),
(2, 'Juniori', 2, 1),
(3, 'Pioniri', 3, 1),
(4, 'Seniori', 4, 2),
(5, 'Seniori', 11, 8),
(6, 'Seniori', 7, 6),
(7, 'Seniori', 8, 4),
(8, 'Seniori', 12, 3),
(9, 'Seniori', 9, 5),
(10, 'Seniori', 5, 10),
(11, 'Seniori', 10, 9),
(12, 'Seniori', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `kategorijaigrac`
--

CREATE TABLE `kategorijaigrac` (
  `sifra` int(11) NOT NULL,
  `kategorija` int(11) NOT NULL,
  `igrac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorijaigrac`
--

INSERT INTO `kategorijaigrac` (`sifra`, `kategorija`, `igrac`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `sifra` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `brojbodova` int(11) NOT NULL,
  `zabijenihgolova` int(11) NOT NULL,
  `primljenihgolova` int(11) NOT NULL,
  `pobjeda` int(11) NOT NULL,
  `nerijesenih` int(11) NOT NULL,
  `izgubljenih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`sifra`, `naziv`, `brojbodova`, `zabijenihgolova`, `primljenihgolova`, `pobjeda`, `nerijesenih`, `izgubljenih`) VALUES
(1, 'NK Croatia Bogdanovci', 14, 28, 8, 4, 2, 2),
(2, 'HNK Mitnica', 17, 19, 11, 5, 2, 1),
(3, 'NK Sinđelić', 19, 24, 3, 6, 1, 1),
(4, 'NK Hajduk (T)', 14, 17, 11, 4, 2, 2),
(5, 'NK Sloga (B)', 12, 19, 12, 3, 3, 2),
(6, 'NK Hajduk (B)', 12, 15, 20, 4, 0, 4),
(7, 'ŠNK Dunav', 11, 17, 20, 3, 2, 3),
(8, 'HNK Radnički', 6, 13, 26, 1, 3, 4),
(9, 'NK Sremac', 3, 12, 22, 1, 3, 4),
(10, 'NK Sokol', 0, 3, 33, 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `operater`
--

CREATE TABLE `operater` (
  `sifra` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `uloga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operater`
--

INSERT INTO `operater` (`sifra`, `email`, `lozinka`, `ime`, `prezime`, `uloga`) VALUES
(1, 'dsugar@gmail.com', '$2y$12$sKX3yldMZhixSkEgeWQm4ObXqAejTIpcbAtYwU.eWjj1PywQzfenG', 'Danijel', 'Šugar', 'admin'),
(2, 'edunova@edunova.hr', '$2y$12$rLkAxNcXn8dUY1C3MUYVV.qceDJcVbVYZu7El75qAqkCR.cMnuwRC', 'Pero', 'Perić', 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `trener`
--

CREATE TABLE `trener` (
  `sifra` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `oib` varchar(11) DEFAULT NULL,
  `brojtelefona` varchar(15) DEFAULT NULL,
  `brojlicence` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trener`
--

INSERT INTO `trener` (`sifra`, `ime`, `prezime`, `oib`, `brojtelefona`, `brojlicence`) VALUES
(1, 'Božo', 'Gelo', '00006754765', '4446782345', '664423'),
(2, 'Željko', 'Matković', '99765477900', '8865389066', '996754'),
(3, 'Vladimir', 'Prce', '33563678568', '1143668976', '114455'),
(4, 'Andrija ', 'Špoljaric', '56029799069', '2579635485', '475236'),
(5, 'Imra ', 'Pribisalić', '30955154739', '5249635874', '685214'),
(6, 'Tonino ', 'Bačeković', '16351385407', '9654289657', '473698'),
(7, 'Branko ', 'Grabrovečki', '83881544691', '8756329854', '698324'),
(8, 'Enrik ', 'Domin', '43532885242', '7852146925', '985677'),
(9, 'Hrvoslav ', 'Branibor', '79091313587', '5248963254', '982040'),
(10, 'Kenan ', 'Radovčić', '36513433696', '5243698524', '524896'),
(11, 'Anes ', 'Divjakinja', '91253828646', '2450149687', '635874'),
(12, 'Haso ', 'Kanjković', '80399036510', '6587425698', '658201');

-- --------------------------------------------------------

--
-- Table structure for table `utakmica`
--

CREATE TABLE `utakmica` (
  `sifra` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `klub1` int(11) NOT NULL,
  `klub2` int(11) NOT NULL,
  `rezultat` varchar(200) DEFAULT NULL,
  `datumodigravanja` datetime NOT NULL,
  `napomena` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utakmica`
--

INSERT INTO `utakmica` (`sifra`, `naziv`, `klub1`, `klub2`, `rezultat`, `datumodigravanja`, `napomena`) VALUES
(1, '1. kolo', 1, 2, '2-3', '2018-10-23 16:30:00', NULL),
(2, '1. kolo', 10, 4, '1-2', '2018-10-23 16:30:00', NULL),
(4, '1.kolo', 7, 5, '1-3', '2018-10-23 16:30:00', '                          '),
(5, '1.kolo', 5, 9, '3-1', '2018-10-23 16:30:00', '                          '),
(6, '1.kolo', 3, 8, '7-0', '2018-10-23 16:30:00', '                          '),
(7, '2.kolo', 2, 8, '2-0', '2018-10-23 16:00:00', '                          '),
(8, '2.kolo', 9, 3, '0-3', '2018-10-23 16:00:00', '                          '),
(9, '2.kolo', 5, 6, '7-0', '2018-10-23 16:30:00', '                          '),
(10, '2.kolo', 4, 7, '7-3', '2018-10-23 16:00:00', '                          '),
(11, '2.kolo', 1, 10, '9-0', '2018-10-23 16:00:00', '                          '),
(12, '3.kolo', 8, 9, '4-4', '2018-10-23 16:00:00', '                          HNK radnički svoje domaće utakmice igra subotom'),
(13, '3.kolo', 10, 2, '0-2', '2018-10-23 16:00:00', '                          '),
(14, '3.kolo', 7, 1, '3-2', '2018-10-23 16:00:00', '                          '),
(15, '3.kolo', 5, 4, '2-1', '2018-10-23 16:00:00', '                          '),
(16, '3.kolo', 3, 5, '4-1', '2018-10-23 16:00:00', '                          '),
(17, '4.kolo', 2, 9, '5-2', '2018-10-23 15:30:00', '                          '),
(18, '4.kolo', 5, 8, '2-0', '2018-10-23 15:30:00', '                          '),
(19, '4.kolo', 4, 3, '2-0', '0000-00-00 00:00:00', '                          '),
(20, '4.kolo', 1, 6, '1-0', '2018-10-23 15:30:00', '                          '),
(21, '4.kolo', 10, 7, '0-5', '2018-10-23 15:30:00', '                          '),
(22, '5.kolo', 8, 4, '2-2', '2018-10-23 15:30:00', 'HNK Radnički svoje domaće utakmice igra subotom'),
(23, '5.kolo', 7, 2, '1-1', '2018-10-23 15:30:00', '                          '),
(24, '5.kolo', 6, 10, '3-1', '2018-10-23 15:30:00', '                          '),
(25, '5.kolo', 3, 1, '0-0', '2018-10-23 15:30:00', '                          ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igrac`
--
ALTER TABLE `igrac`
  ADD PRIMARY KEY (`sifra`),
  ADD KEY `klub` (`klub`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`sifra`),
  ADD KEY `klub` (`klub`),
  ADD KEY `trener` (`trener`);

--
-- Indexes for table `kategorijaigrac`
--
ALTER TABLE `kategorijaigrac`
  ADD PRIMARY KEY (`sifra`),
  ADD KEY `kategorija` (`kategorija`),
  ADD KEY `igrac` (`igrac`);

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `operater`
--
ALTER TABLE `operater`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `trener`
--
ALTER TABLE `trener`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD PRIMARY KEY (`sifra`),
  ADD KEY `klub1` (`klub1`),
  ADD KEY `klub2` (`klub2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igrac`
--
ALTER TABLE `igrac`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategorijaigrac`
--
ALTER TABLE `kategorijaigrac`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `operater`
--
ALTER TABLE `operater`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trener`
--
ALTER TABLE `trener`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `utakmica`
--
ALTER TABLE `utakmica`
  MODIFY `sifra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `igrac`
--
ALTER TABLE `igrac`
  ADD CONSTRAINT `igrac_ibfk_1` FOREIGN KEY (`klub`) REFERENCES `klub` (`sifra`);

--
-- Constraints for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD CONSTRAINT `kategorija_ibfk_1` FOREIGN KEY (`klub`) REFERENCES `klub` (`sifra`),
  ADD CONSTRAINT `kategorija_ibfk_2` FOREIGN KEY (`trener`) REFERENCES `trener` (`sifra`);

--
-- Constraints for table `kategorijaigrac`
--
ALTER TABLE `kategorijaigrac`
  ADD CONSTRAINT `kategorijaigrac_ibfk_1` FOREIGN KEY (`kategorija`) REFERENCES `kategorija` (`sifra`),
  ADD CONSTRAINT `kategorijaigrac_ibfk_2` FOREIGN KEY (`igrac`) REFERENCES `igrac` (`sifra`);

--
-- Constraints for table `utakmica`
--
ALTER TABLE `utakmica`
  ADD CONSTRAINT `utakmica_ibfk_1` FOREIGN KEY (`klub1`) REFERENCES `klub` (`sifra`),
  ADD CONSTRAINT `utakmica_ibfk_2` FOREIGN KEY (`klub2`) REFERENCES `klub` (`sifra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
