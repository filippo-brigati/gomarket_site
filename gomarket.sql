-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 15, 2021 alle 14:47
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gomarket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `ID` int(3) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `CAP` int(5) NOT NULL,
  `via` varchar(255) NOT NULL,
  `num_civico` varchar(255) NOT NULL,
  `fk_id_utente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`ID`, `citta`, `CAP`, `via`, `num_civico`, `fk_id_utente`) VALUES
(1, 'Reggio-Emilia', 42123, 'Via Glauco Garlassi', '17', 1),
(2, 'Firenze', 52010, 'Via Pisa', '27', 2),
(3, 'Reggio-Emilia', 42123, 'Via Pascal', '56', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `ID` int(3) NOT NULL,
  `codice_ordine` varchar(255) NOT NULL,
  `stato_ordine` int(1) NOT NULL,
  `totale_ordine` float NOT NULL,
  `data_ordine` date NOT NULL,
  `fk_id_utente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`ID`, `codice_ordine`, `stato_ordine`, `totale_ordine`, `data_ordine`, `fk_id_utente`) VALUES
(22, '3ILmCI', 0, 44.28, '2021-03-13', 1),
(26, '0YVCTJ', 0, 44.28, '2021-03-15', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `ID` int(11) NOT NULL,
  `nome_prodotto` varchar(255) NOT NULL,
  `descrizione_prodotto` text NOT NULL,
  `marca_prodotto` varchar(255) NOT NULL,
  `costo_unitario_prodotto` float NOT NULL,
  `dimensione_prodotto` int(10) NOT NULL,
  `fk_id_supermercato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`ID`, `nome_prodotto`, `descrizione_prodotto`, `marca_prodotto`, `costo_unitario_prodotto`, `dimensione_prodotto`, `fk_id_supermercato`) VALUES
(1, 'cataneselle', 'Le Cataneselle ben rappresentano il gusto siciliano cui devono il nome.', 'barilla', 1.99, 500, 1),
(2, 'farfalle', 'Delle farfalle vere hanno la leggiadria e la vivacità, ma il loro colore è quello luminoso del grano e del sole.\r\n\r\nAllegre e leggere, le Farfalle Barilla colorano la tavola con un tocco di fantasia. Più spesse al centro e sottili ai lati, volano di sapore in sapore, adattandosi ai più diversi abbinamenti di gusto.', 'barilla', 2, 500, 1),
(3, 'Tortine', 'Scopri il piacere delle merendine Conad ideali per una colazione dolce e nutriente o per uno snack veloce e gustoso - Inizia la tua giornata così: 1 Tortina di grano saraceno e gocce di cioccolato Conad + 1 Tazza di the (200cc) + 1 Yogurt cremoso (125cc) + Semi di girasole (30g) = 394kcal* * 20% del fabbisogno energetico in un regime alimentare di circa 2000 kcal/giornaliero', 'youlty', 4.99, 230, 1),
(4, 'Yogurt Greco Fragola', 'Yogurt Greco Autentico Fragola con pezzi di frutta 0% Grassi 170 g Senza conservanti e coloranti artificiali', 'conad', 1.29, 170, 1),
(5, 'Cremosi Stracciatella Yogurt', 'Lo Yogurt Intero Conad dalla consistenza unica e cremosa è preparato con ingredienti genuini e latte fresco 100% italiano. Con un\'ampia scelta di gusti è l\'ideale per qualsiasi momento della giornata. - Senza conservanti - Senza coloranti artificiali - Latte fresco 100% Italiano', 'conad', 2.39, 125, 1),
(6, 'Integrale Mezzi Rigatoni', ' La pasta integrale Conad, ottenuta grazie alla macinazione dell\'intero chicco del grano conservando le sue parti più pregiate, è ideale per chi cerca un benessere naturale e gustoso. Naturalmente ricca di fibre è una pasta di ottima consistenza e dal sapore rustico. La superficie ruvida trafilata al bronzo la rende particolarmente adatta ad assorbire i condimenti. È ottima abbinata a sughi con verdure, legumi e salse bianche. Conad ha scelto di utilizzare almeno il 51% di grano italiano, privilegiando le coltivazioni del nostro Paese', 'conad', 2.19, 500, 1),
(7, 'Integrale Spaghetti', 'La pasta integrale Conad, ottenuta grazie alla macinazione dell\'intero chicco del grano conservando le sue parti più pregiate, è ideale per chi cerca un benessere naturale e gustoso. Naturalmente ricca di fibre è una pasta di ottima consistenza e dal sapore rustico. La superficie ruvida trafilata al bronzo la rende particolarmente adatta ad assorbire i condimenti. È ottima abbinata a sughi con verdure, legumi e salse bianche. Conad ha scelto di utilizzare almeno il 51% di grano italiano, privilegiando le coltivazioni del nostro Paese.', 'conad', 1.99, 500, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto_ordine`
--

CREATE TABLE `prodotto_ordine` (
  `ID` int(3) NOT NULL,
  `fk_id_prodotto` int(3) NOT NULL,
  `quantita_prodotto` int(3) NOT NULL,
  `fk_id_ordine` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto_ordine`
--

INSERT INTO `prodotto_ordine` (`ID`, `fk_id_prodotto`, `quantita_prodotto`, `fk_id_ordine`) VALUES
(10, 1, 3, 22),
(11, 2, 1, 22),
(12, 3, 6, 22),
(13, 6, 2, 22),
(14, 7, 1, 22),
(30, 1, 3, 26),
(31, 2, 1, 26),
(32, 3, 6, 26),
(33, 6, 2, 26),
(34, 7, 1, 26);

-- --------------------------------------------------------

--
-- Struttura della tabella `supermercato`
--

CREATE TABLE `supermercato` (
  `ID` int(11) NOT NULL,
  `nome_super` varchar(255) NOT NULL,
  `desc_super` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `supermercato`
--

INSERT INTO `supermercato` (`ID`, `nome_super`, `desc_super`) VALUES
(1, 'conad', 'persone oltre le cose');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID` int(3) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `indirizzo_email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nome_utente` varchar(255) NOT NULL,
  `codice_fiscale` varchar(255) NOT NULL,
  `data_di_nascita` date NOT NULL,
  `ruolo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID`, `nome`, `cognome`, `indirizzo_email`, `pwd`, `nome_utente`, `codice_fiscale`, `data_di_nascita`, `ruolo`) VALUES
(1, 'Filippo', 'Brigati', 'filippobrigati2@gmail.com', 'fillobrix2002', 'FilloBrix', 'BRGFPP02L14H223P', '2002-07-14', 0),
(2, 'Mario', 'Rossi', 'mario.rossi@gmail.com', 'mariorossipwd', 'Mario_Rossi', 'MRJDNNVK2023JNDJ', '1990-07-19', 0),
(3, 'Alessio', 'Blasi', 'alessio.blasi@gmail.com', 'aleblasipwd', 'Ale_Blasi', 'BLSLSS84H28A944J', '1984-06-28', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `prodotto_ordine`
--
ALTER TABLE `prodotto_ordine`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `supermercato`
--
ALTER TABLE `supermercato`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `prodotto_ordine`
--
ALTER TABLE `prodotto_ordine`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `supermercato`
--
ALTER TABLE `supermercato`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
