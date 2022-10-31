SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `mundial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mundial`;

DROP TABLE IF EXISTS `apuestas_partido`;
CREATE TABLE IF NOT EXISTS `apuestas_partido` (
  `n_codpartido` int NOT NULL,
  `n_coduser` int NOT NULL,
  `n_seqapuesta` int NOT NULL,
  `n_goles1` int NOT NULL,
  `n_goles2` int NOT NULL,
  `n_resultado` int DEFAULT '0',
  PRIMARY KEY (`n_codpartido`,`n_coduser`,`n_seqapuesta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `codigos`;
CREATE TABLE IF NOT EXISTS `codigos` (
  `c_code` varchar(20) NOT NULL,
  `c_valido` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`c_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `codigos` (`c_code`, `c_valido`) VALUES
('a5w7', 'S'),
('v2w3', 'S'),
('ty5c', 'S'),
('5i6j', 'S'),
('pm5d', 'S'),
('ytrx', 'S'),
('7ng3', 'S'),
('l99t', 'S'),
('8n6t', 'S'),
('45vf', 'S'),
('fo4v', 'S'),
('uh4f', 'S'),
('7hh5', 'S'),
('j7o3', 'S'),
('d5hu', 'S'),
('y6gf', 'S'),
('0ijn', 'S'),
('4fa9', 'S'),
('p7jn', 'S');

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `n_codequipo` int NOT NULL AUTO_INCREMENT,
  `c_equipo` varchar(50) NOT NULL,
  `c_bandera` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`n_codequipo`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO `equipos` (`n_codequipo`, `c_equipo`, `c_bandera`) VALUES
(1, 'QATAR', '1.svg'),
(2, 'ALEMANIA', '2.svg '),
(3, 'DINAMARCA', '3.svg'),
(4, 'BRASIL', '4.svg'),
(5, 'FRANCIA', '5.svg'),
(6, 'BELGICA', '6.svg'),
(7, 'CROACIA', '7.svg'),
(8, 'ESPAÑA', '8.svg'),
(9, 'SERBIA', '9.svg'),
(10, 'INGLATERRA', '10.svg'),
(11, 'SUIZA', '11.svg'),
(12, 'PAISES BAJOS', '12.svg'),
(13, 'ARGENTINA', '13.svg'),
(14, 'IRAN', '14.svg'),
(15, 'COREA DEL SUR', '15.svg'),
(16, 'JAPON', '16.svg'),
(17, 'ARABIA SAUDITA', '17.svg'),
(18, 'ECUADOR', '18.svg'),
(19, 'URUGUAY', '19.svg'),
(20, 'CANADA', '20.svg'),
(21, 'GHANA', '21.svg'),
(22, 'SENEGAL', '22.svg'),
(23, 'MARRUECOS', '23.svg'),
(24, 'TUNEZ', '24.svg'),
(25, 'PORTUGAL', '25.svg'),
(26, 'POLONIA', '26.svg'),
(27, 'CAMERUN', '27.svg'),
(28, 'MEXICO', '28.svg'),
(29, 'ESTADOS UNIDOS', '29.svg'),
(30, 'GALES', '30.svg'),
(31, 'AUSTRALIA', '31.svg'),
(32, 'COSTA RICA', '32.svg');

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `n_codpartido` int NOT NULL AUTO_INCREMENT,
  `n_codequipo1` int NOT NULL,
  `n_codequipo2` int NOT NULL,
  `n_goles1` int DEFAULT NULL,
  `n_goles2` int DEFAULT NULL,
  `d_fecha` date NOT NULL,
  `c_estado` varchar(3) NOT NULL DEFAULT 'NIN',
  `n_monto_apuesta` int DEFAULT '0',
  `c_hora` varchar(10) DEFAULT NULL,
  `n_resultado` int DEFAULT '0',
  PRIMARY KEY (`n_codpartido`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

INSERT INTO `partidos` (`n_codpartido`, `n_codequipo1`, `n_codequipo2`, `n_goles1`, `n_goles2`, `d_fecha`, `c_estado`, `n_monto_apuesta`, `c_hora`, `n_resultado`) VALUES
(49, 1, 18, 0, 0, '2022-11-20', 'NIN', 0, '12:00', 0),
(50, 10, 14, NULL, NULL, '2022-11-21', 'NIN', 0, '09:00', NULL),
(51, 22, 12, NULL, NULL, '2022-11-21', 'NIN', 0, '12:00', NULL),
(52, 29, 30, NULL, NULL, '2022-11-21', 'NIN', 0, '15:00', NULL),
(53, 13, 17, NULL, NULL, '2022-11-22', 'NIN', 0, '06:00', NULL),
(54, 3, 24, NULL, NULL, '2022-11-22', 'NIN', 0, '09:00', NULL),
(55, 28, 26, NULL, NULL, '2022-11-22', 'NIN', 0, '12:00', NULL),
(56, 5, 31, NULL, NULL, '2022-11-22', 'NIN', 0, '15:00', NULL),
(57, 23, 7, NULL, NULL, '2022-11-23', 'NIN', 0, '06:00', NULL),
(58, 2, 16, NULL, NULL, '2022-11-23', 'NIN', 0, '09:00', NULL),
(59, 8, 32, NULL, NULL, '2022-11-23', 'NIN', 0, '12:00', NULL),
(60, 6, 20, NULL, NULL, '2022-11-23', 'NIN', 0, '15:00', NULL),
(61, 11, 27, NULL, NULL, '2022-11-24', 'NIN', 0, '06:00', NULL),
(62, 19, 15, NULL, NULL, '2022-11-24', 'NIN', 0, '09:00', NULL),
(63, 25, 21, NULL, NULL, '2022-11-24', 'NIN', 0, '12:00', NULL),
(64, 4, 9, NULL, NULL, '2022-11-24', 'NIN', 0, '15:00', NULL),
(65, 30, 14, NULL, NULL, '2022-11-25', 'NIN', 0, '06:00', NULL),
(66, 1, 22, NULL, NULL, '2022-11-25', 'NIN', 0, '09:00', NULL),
(67, 12, 18, NULL, NULL, '2022-11-25', 'NIN', 0, '12:00', NULL),
(68, 10, 29, NULL, NULL, '2022-11-25', 'NIN', 0, '15:00', NULL),
(69, 24, 31, NULL, NULL, '2022-11-26', 'NIN', 0, '06:00', NULL),
(70, 26, 17, NULL, NULL, '2022-11-26', 'NIN', 0, '09:00', NULL),
(71, 5, 3, NULL, NULL, '2022-11-26', 'NIN', 0, '12:00', NULL),
(72, 13, 28, NULL, NULL, '2022-11-26', 'NIN', 0, '15:00', NULL),
(73, 16, 32, NULL, NULL, '2022-11-27', 'NIN', 0, '06:00', NULL),
(74, 6, 23, NULL, NULL, '2022-11-27', 'NIN', 0, '09:00', NULL),
(75, 7, 20, NULL, NULL, '2022-11-27', 'NIN', 0, '12:00', NULL),
(76, 8, 2, NULL, NULL, '2022-11-27', 'NIN', 0, '15:00', NULL),
(77, 27, 9, NULL, NULL, '2022-11-28', 'NIN', 0, '06:00', NULL),
(78, 15, 21, NULL, NULL, '2022-11-28', 'NIN', 0, '09:00', NULL),
(79, 4, 11, NULL, NULL, '2022-11-28', 'NIN', 0, '12:00', NULL),
(80, 25, 19, NULL, NULL, '2022-11-28', 'NIN', 0, '15:00', NULL),
(81, 18, 22, NULL, NULL, '2022-11-29', 'NIN', 0, '11:00', NULL),
(82, 12, 1, NULL, NULL, '2022-11-29', 'NIN', 0, '11:00', NULL),
(83, 14, 29, NULL, NULL, '2022-11-29', 'NIN', 0, '15:00', NULL),
(84, 30, 10, NULL, NULL, '2022-11-29', 'NIN', 0, '15:00', NULL),
(85, 24, 5, NULL, NULL, '2022-11-30', 'NIN', 0, '11:00', NULL),
(86, 31, 3, NULL, NULL, '2022-11-30', 'NIN', 0, '11:00', NULL),
(87, 26, 13, NULL, NULL, '2022-11-30', 'NIN', 0, '15:00', NULL),
(88, 17, 28, NULL, NULL, '2022-11-30', 'NIN', 0, '15:00', NULL),
(89, 7, 6, NULL, NULL, '2022-12-01', 'NIN', 0, '11:00', NULL),
(90, 20, 23, NULL, NULL, '2022-12-01', 'NIN', 0, '11:00', NULL),
(91, 16, 8, NULL, NULL, '2022-12-01', 'NIN', 0, '15:00', NULL),
(92, 32, 2, NULL, NULL, '2022-12-01', 'NIN', 0, '15:00', NULL),
(93, 15, 25, NULL, NULL, '2022-12-02', 'NIN', 0, '11:00', NULL),
(94, 21, 19, NULL, NULL, '2022-12-02', 'NIN', 0, '11:00', NULL),
(95, 9, 11, NULL, NULL, '2022-12-02', 'NIN', 0, '15:00', NULL),
(96, 27, 4, NULL, NULL, '2022-12-02', 'NIN', 0, '15:00', NULL);

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `n_coduser` int NOT NULL AUTO_INCREMENT,
  `c_user` varchar(30) NOT NULL,
  `c_password` varchar(30) NOT NULL,
  `n_nivel` int NOT NULL DEFAULT '2',
  `n_saldo` int NOT NULL DEFAULT '0',
  `c_nombres` varchar(50) DEFAULT NULL,
  `c_apellido_p` varchar(50) DEFAULT NULL,
  `c_apellido_m` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `n_puntos` int DEFAULT NULL,
  PRIMARY KEY (`n_coduser`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`n_coduser`, `c_user`, `c_password`, `n_nivel`, `n_saldo`, `c_nombres`, `c_apellido_p`, `c_apellido_m`, `c_email`, `n_puntos`) VALUES
(1, 'admin', 'awsd', 1, 0, NULL, NULL, NULL, NULL, 0),
(5, 'azazel', '12345', 2, 120, 'Gustavo Marcelo', 'Bascope', 'Castro', 'vivalallama@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
