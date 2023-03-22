-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Cze 2022, 11:26
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `markaId` int(11) NOT NULL,
  `marka` varchar(32) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `marka`
--

INSERT INTO `marka` (`markaId`, `marka`) VALUES
(1, 'Fiat'),
(2, 'Ford'),
(3, 'Opel'),
(4, 'Volkswagen'),
(5, 'Renault');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `model`
--

CREATE TABLE `model` (
  `modelId` int(11) NOT NULL,
  `model` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `markaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `model`
--

INSERT INTO `model` (`modelId`, `model`, `markaId`) VALUES
(1, 'Seicento', 1),
(2, 'Panda', 1),
(3, 'Grande Punto', 1),
(4, 'Focus', 2),
(5, 'Fiesta', 2),
(6, 'Fusion', 2),
(7, 'Astra', 3),
(8, 'Zafira', 3),
(9, 'Corsa', 3),
(10, 'Golf', 4),
(11, 'Passat', 4),
(12, 'Polo', 4),
(13, 'Clio', 5),
(14, 'Laguna', 5),
(15, 'Scenic', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `osobaId` int(11) NOT NULL COMMENT 'właściciel pojazdu',
  `imie` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(48) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(512) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `osoby`
--

INSERT INTO `osoby` (`osobaId`, `imie`, `nazwisko`, `email`, `telefon`, `haslo`) VALUES
(1, 'Jan', 'Nowak', 'jnowak@email.com', '000000000', 'test1'),
(2, 'Paweł', 'Kowalski', 'pkowalski@email.com', '777777777', 'test1'),
(3, 'Rafał', 'Kosowski', 'rkosa@email.pl', '112121221', '5a105e8b9d40e1329780d62ea2265d8a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paliwo`
--

CREATE TABLE `paliwo` (
  `paliwoId` int(11) NOT NULL,
  `paliwo` varchar(16) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `paliwo`
--

INSERT INTO `paliwo` (`paliwoId`, `paliwo`) VALUES
(1, 'Benzyna'),
(2, 'LPG'),
(3, 'Diesel'),
(4, 'Hybryda'),
(5, 'Elektryczny'),
(6, 'CNG'),
(7, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `autoId` int(11) NOT NULL,
  `nazwa` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `modelId` int(11) NOT NULL,
  `paliwoId` int(11) NOT NULL,
  `rokProdukcji` year(4) NOT NULL,
  `przebieg` int(11) NOT NULL,
  `pojemnosc` int(11) NOT NULL,
  `moc` int(11) NOT NULL,
  `skrzyniaId` int(11) NOT NULL,
  `cena` float NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `osobaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`autoId`, `nazwa`, `modelId`, `paliwoId`, `rokProdukcji`, `przebieg`, `pojemnosc`, `moc`, `skrzyniaId`, `cena`, `opis`, `osobaId`) VALUES
(1, 'Czerwona strzała dla ciebie', 1, 1, 2001, 150000, 900, 39, 1, 2500, 'Mam do sprzedania czerwone Seicento z 2001. Samochód jest technicznie sprawny. Ma PT i OC.', 3),
(2, 'Opel Zafira 2001', 8, 2, 2000, 250000, 1800, 125, 1, 5500, 'Jeździ, skręca, hamuje, Posiada OC I PT', 1),
(3, 'Grande Punto', 3, 2, 2006, 1600000, 1400, 75, 1, 10500, 'Super fajne auto. Nie ma z nim żadnych problemów. Nic tylko brać.', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `skrzynia`
--

CREATE TABLE `skrzynia` (
  `skrzyniaId` int(11) NOT NULL,
  `skrzynia` varchar(16) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `skrzynia`
--

INSERT INTO `skrzynia` (`skrzyniaId`, `skrzynia`) VALUES
(1, 'manualna'),
(2, 'automatyczna');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`markaId`);

--
-- Indeksy dla tabeli `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`modelId`);

--
-- Indeksy dla tabeli `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`osobaId`);

--
-- Indeksy dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  ADD PRIMARY KEY (`paliwoId`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`autoId`);

--
-- Indeksy dla tabeli `skrzynia`
--
ALTER TABLE `skrzynia`
  ADD PRIMARY KEY (`skrzyniaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `markaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `modelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `osoby`
--
ALTER TABLE `osoby`
  MODIFY `osobaId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'właściciel pojazdu', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `paliwo`
--
ALTER TABLE `paliwo`
  MODIFY `paliwoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `samochody`
--
ALTER TABLE `samochody`
  MODIFY `autoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `skrzynia`
--
ALTER TABLE `skrzynia`
  MODIFY `skrzyniaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
