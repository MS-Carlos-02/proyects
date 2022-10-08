-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2022 a las 23:35:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(5) NOT NULL,
  `anio` int(4) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `especialidad` varchar(150) NOT NULL,
  `editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `anio`, `autor`, `titulo`, `imagen`, `url`, `especialidad`, `editorial`) VALUES
(5, 1976, 'John Donoghue', 'La partida final', 'libros/la_partida_final.png', 'https://planetadelibroscom.cdnstatics2.com/libros_contenido_extra/52/51119_La_partida_final.pdf', 'Novela histórica', 'Editorial Planeta'),
(6, 2021, 'Alice Kellen', 'Deja que ocurra', 'libros/deja_que_ocurra.png', 'https://www.planetadelibros.com/libro-deja-que-ocurra/358095', 'Novela contemporánea', 'Booket'),
(7, 2018, 'Jota Linares', 'El último verano antes de todo', 'libros/el_ultimo_verano.png', 'https://www.planetadelibros.com/libro-el-ultimo-verano-antes-de-todo/357872', 'Novela contemporánea', 'Editorial Planeta'),
(10, 2019, 'Faridah Àbíké-Íyímídé', 'As de Picas', 'libros/as_picas.png', 'https://www.planetadelibros.com/libro-as-de-picas/353318', 'Ficción', 'Crossbooks'),
(12, 2018, 'Marvel', 'Black Panther.', 'libros/black_panther.png', 'https://www.planetadelibros.com/libro-black-panther-libroaventuras/260197', 'Películas y series', 'Libros Disney'),
(17, 2022, 'Robert Hardman', 'Isabel II', 'libros/isabel_ii.png', 'https://www.planetadelibros.com/libro-isabel-ii/359429', 'Ficción', 'Editorial Planeta'),
(18, 2020, 'La Vecina Rubia', 'Contando Atardeceres', 'libros/contando_atardeceres.png', 'https://www.planetadelibros.com/libro-contando-atardeceres/358509', 'Novela', 'Libros Cúpula'),
(19, 2021, 'Carmen Mola', 'La Bestia', 'libros/la_bestia.png', 'https://www.planetadelibros.com/libro-la-bestia/340479#soporte/357337', 'Novela', 'Booket');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
