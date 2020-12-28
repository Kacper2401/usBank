-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Gru 2020, 23:35
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bank`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `saldo` double NOT NULL,
  `acvite` char(1) COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `accounts`
--

INSERT INTO `accounts` (`ID`, `users_id`, `saldo`, `acvite`) VALUES
(6, 3, 0, 'Y'),
(11, 10, 5775, 'Y'),
(12, 11, 4010, 'Y'),
(13, 12, 215, 'Y');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`ID`, `name`, `description`) VALUES
(1, 'pracownik', 'pracownik banku'),
(2, 'uzytkownik', 'klient banku');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `title` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `transactions`
--

INSERT INTO `transactions` (`ID`, `from_user_id`, `to_user_id`, `value`, `title`, `date`, `description`) VALUES
(22, 10, 12, 120, 'Paliwo', '2020-12-28', 'Wycieczka'),
(23, 10, 12, 125, 'Wycieczk', '2020-12-28', 'Kolejna wycieczka'),
(24, 12, 10, 20, 'Wycieczka', '2020-12-28', 'Za duzo'),
(25, 12, 11, 10, 'Trip', '2020-12-28', ''),
(26, 11, 10, 1000, 'Auto', '2020-12-28', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_accounts` int(11) DEFAULT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `id_roles`, `id_accounts`, `login`, `password`) VALUES
(6, 1, NULL, 'administrator', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441'),
(10, 2, 11, 'Kacper', '*5A1F713FF0E6E85CEA72AFD7EEE5AE3C6E54D70C'),
(11, 2, 12, 'Pawel', '*65099511189828D6B4965FDE85A9517990A4C18C'),
(12, 2, 13, 'Milosz', '*431627E6B88DCA280039F77DB7C8A13B7C9F617B');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name_unique` (`name`) USING BTREE,
  ADD UNIQUE KEY `description_unique` (`description`) USING HASH;

--
-- Indeksy dla tabeli `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login_unique` (`login`) USING HASH;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
