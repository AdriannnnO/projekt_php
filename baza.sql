-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Gru 2022, 00:20
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
-- Struktura tabeli dla tabeli `dotacje`
--

CREATE TABLE `dotacje` (
  `dotacja_id` int(11) NOT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dotacje`
--

INSERT INTO `dotacje` (`dotacja_id`, `ilosc`, `user_id`) VALUES
(1, 500, 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userMoney` int(11) DEFAULT NULL,
  `grupa_krwi` char(2) DEFAULT NULL
) ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`user_id`, `username`, `userPassword`, `userEmail`, `userMoney`, `grupa_krwi`) VALUES
(10, '1', '1', '1@wp.pl', NULL, 'o'),
(11, 'nstm', 'nsdt', '11@wp.pl', NULL, 'o'),
(12, 'a', 'a', 'a@wp.pl', NULL, 'o'),
(13, 'zzz', 'zzz', 'zzz@wp.pl', 2394, 'o'),
(14, 'xx', 'xx', 'xx@wp.pl', NULL, 'o'),
(15, '123', '123', '123@wp.pl', NULL, 'o'),
(16, 'z4m0rdor', '123123123', 'okuliczadrian@gmail.com', 1004, 'ab');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dotacje`
--
ALTER TABLE `dotacje`
  ADD PRIMARY KEY (`dotacja_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dotacje`
--
ALTER TABLE `dotacje`
  MODIFY `dotacja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `dotacje`
--
ALTER TABLE `dotacje`
  ADD CONSTRAINT `dotacje_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uzytkownicy` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
