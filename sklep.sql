-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2021, 22:28
-- Wersja serwera: 10.4.16-MariaDB
-- Wersja PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `ID` int(11) NOT NULL,
  `Uprawnienia` text NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `rejestracja` date NOT NULL,
  `logowanie` date NOT NULL,
  `Email` text NOT NULL,
  `nr_tel` int(11) NOT NULL,
  `accept` text NOT NULL,
  `plec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`ID`, `Uprawnienia`, `login`, `haslo`, `rejestracja`, `logowanie`, `Email`, `nr_tel`, `accept`, `plec`) VALUES
(1, 'admin', 'admin', 'admin', '2021-11-29', '2021-11-29', 'admin', 99999, 'true', 'Male'),
(2, 'klient', 'Jakub', 'Daniel', '2021-11-29', '2021-11-29', 'Daniel@gmail.com', 555555555, 'true', 'Male');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `ID` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `cena` float NOT NULL,
  `obrazek` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polecane`
--

CREATE TABLE `polecane` (
  `ID` int(11) NOT NULL,
  `obrazek` text NOT NULL,
  `nazwa` text NOT NULL,
  `cena` float NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `polecane`
--

INSERT INTO `polecane` (`ID`, `obrazek`, `nazwa`, `cena`, `link`) VALUES
(1, '1', 'Słuchawki STEELSERIES Arctis 5', 399.99, '/polecane/sluchawki'),
(2, '2', 'Klawiatura LOGITECH G915 ', 929.99, '/polecane/klawiatura'),
(3, '3', 'Pralka WHIRLPOOL', 949.99, '/polecane/pralka'),
(4, '4', 'Smartfon SAMSUNG Galaxy S20 FE', 2299.99, '/polecane/smartfon'),
(5, '5', 'Telewizor SAMSUNG QE65Q80A', 3999.99, '/polecane/telewizor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `promocje`
--

CREATE TABLE `promocje` (
  `ID` int(11) NOT NULL,
  `obrazek` text NOT NULL,
  `nazwa` text NOT NULL,
  `stara_cena` float NOT NULL,
  `nowa_cena` float NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `promocje`
--

INSERT INTO `promocje` (`ID`, `obrazek`, `nazwa`, `stara_cena`, `nowa_cena`, `link`) VALUES
(1, '1', 'Słuchawki', 49.99, 29.99, '../obrazki/promocja/1'),
(2, '2', 'Mixer ręczny', 49.99, 29.99, '../obrazki/promocja/2'),
(3, '3', 'Powerbank', 49.99, 29.99, '../obrazki/promocja/3'),
(4, '4', 'Myszka', 49.99, 29.99, '../obrazki/promocja/4'),
(5, '5', 'Słuchawki Gamingowe', 49.99, 29.99, '../obrazki/promocja/5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `ID` int(11) NOT NULL DEFAULT 1,
  `obrazek` text NOT NULL,
  `nazwa` text NOT NULL,
  `cena` double NOT NULL,
  `klasa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`ID`, `obrazek`, `nazwa`, `cena`, `klasa`) VALUES
(1, '1', 'Słuchawki', 29.99, 'Sluchawki'),
(2, '2', 'Mixer ręczny', 29.99, 'Miksery'),
(3, '3', 'Powerbank', 29.99, 'Telefony'),
(4, '4', 'Myszka', 29.99, 'Myszki'),
(5, '5', 'Słuchawki Gamingowe', 29.99, 'Sluchawki'),
(6, '6', 'Słuchawki STEELSERIES Arctis 5', 399.99, 'Sluchawki'),
(7, '7', 'Klawiatura LOGITECH G915 ', 929.99, 'Klawiatury'),
(8, '8', 'Pralka WHIRLPOOL', 949.99, 'Pralki'),
(9, '9', 'Smartfon SAMSUNG Galaxy S20 FE', 2299.99, 'Telefony'),
(10, '10', 'Telewizor SAMSUNG QE65Q80A', 3999.99, 'Telewizory');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `ID` int(11) NOT NULL,
  `uzytkownik` text NOT NULL,
  `nazwa` text NOT NULL,
  `cena` float NOT NULL,
  `ilosc` text NOT NULL,
  `dostawa` text NOT NULL,
  `platnosc` text NOT NULL,
  `Ulica` text NOT NULL,
  `nr_domu` text NOT NULL,
  `Kod_pocztowy` text NOT NULL,
  `Miejscowosc` text NOT NULL,
  `uwagi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`ID`, `uzytkownik`, `nazwa`, `cena`, `ilosc`, `dostawa`, `platnosc`, `Ulica`, `nr_domu`, `Kod_pocztowy`, `Miejscowosc`, `uwagi`) VALUES
(21, 'admin', 'Mixer ręczny', 89.97, '3', 'Kurier Inpost', 'BLIK', 'Jakub', '54', '26-300', 'Opoczno', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `polecane`
--
ALTER TABLE `polecane`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `promocje`
--
ALTER TABLE `promocje`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `polecane`
--
ALTER TABLE `polecane`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `promocje`
--
ALTER TABLE `promocje`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
