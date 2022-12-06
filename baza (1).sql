-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Gru 2022, 21:46
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`user_id`, `username`, `userPassword`, `userEmail`) VALUES
(10, '1', '1', '1@wp.pl'),
(11, 'nstm', 'nsdt', '11@wp.pl'),
(12, 'a', 'a', 'a@wp.pl'),
(13, 'zzz', 'zzz', 'zzz@wp.pl'),
(14, 'xx', 'xx', 'xx@wp.pl'),
(15, '123', '123', '123@wp.pl'),
(16, 'z4m0rdor', '123123123', 'okuliczadrian@gmail.com'),
(17, 'z4m0rdor2', '123123123', 'okuliczadrian@gmail.com'),
(18, 'z', 'zx', 'xx@wp.pl'),
(19, '1', '1', '11@wp.pl'),
(20, 'zzz', '321321321', 'okuliczadrian@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zbiorki`
--

CREATE TABLE `zbiorki` (
  `id_zbiorki` int(11) NOT NULL,
  `WymaganaKwota` int(11) NOT NULL,
  `ZebranaKwota` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `opis` text NOT NULL,
  `img_src` text DEFAULT 'brak_obrazu.png',
  `nazwa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zbiorki`
--

INSERT INTO `zbiorki` (`id_zbiorki`, `WymaganaKwota`, `ZebranaKwota`, `user_id`, `opis`, `img_src`, `nazwa`) VALUES
(3, 234, 0, 16, 'wras', '2cca2f62ec64ac6ecf913ad23d6698d5.jpeg', 'test2'),
(4, 2333, 0, 16, 'xczx xzczxc zxczcx', '6df1cab29f411d964f01b42e19cd8ed9.gif', 'test3'),
(5, 2345, 0, 16, 'zxc', 'eb539f8857ce3d5c4e02df1e9bd5ccef.gif', 'wadsa zc'),
(6, 2314, 0, 16, '21zxcs', 'brak_obrazu.png', 'test5'),
(8, 4, 0, 16, '', 'brak_obrazu.png', '2'),
(9, 7, 0, 16, '', 'brak_obrazu.png', 'z'),
(10, 21, 0, 15, 'dawwadawdz', 'brak_obrazu.png', 'wasdw'),
(11, 21, 0, 15, 'dawwadawdz', 'brak_obrazu.png', 'waszx');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `zbiorki`
--
ALTER TABLE `zbiorki`
  ADD PRIMARY KEY (`id_zbiorki`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `zbiorki`
--
ALTER TABLE `zbiorki`
  MODIFY `id_zbiorki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zbiorki`
--
ALTER TABLE `zbiorki`
  ADD CONSTRAINT `zbiorki_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uzytkownicy` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
