-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Apr 23, 2021 alle 09:28
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
-- Struttura della tabella `carta_credito`
--

CREATE TABLE `carta_credito` (
  `ID` int(3) NOT NULL,
  `numero_carta` varchar(255) NOT NULL,
  `data_scadenza` date NOT NULL,
  `cv` varchar(255) NOT NULL,
  `last_nb` varchar(255) NOT NULL,
  `fk_id_utente` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carta_credito`
--

INSERT INTO `carta_credito` (`ID`, `numero_carta`, `data_scadenza`, `cv`, `last_nb`, `fk_id_utente`) VALUES
(3, '$2y$10$od/nQAq0wlkVvJVV20a1f.GjueE/gXZafjM7MeVDjgvCxyTg7MJyS', '2024-12-12', '$2y$10$aLfTVn9VXuKryTRbGqQMo.tJ3d9pvUZ9yXi5TS6Er6x6iyGsRsRli', '123', 1);

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
(3, 'Reggio-Emilia', 42123, 'Via Pascal', '56', 3),
(4, 'Milano', 20010, 'Via Mesero', '8', 4),
(5, 'RE', 42123, 'Via Ghiarda', '8', 5),
(6, 'RE', 42123, 'Via Ghiarda', '8', 5),
(7, 'RE', 42123, 'Via Pascal', '12', 6),
(8, 'RE', 42123, 'Via Pascal', '8', 6),
(9, 'RE', 42123, 'Via Pascal', '8', 6),
(10, 'RE', 42123, 'Via Pascal', '3', 6),
(11, 'Reggio Emilia', 42123, 'Via Roma', '2', 7),
(12, 'Parma', 12345, 'Via Roma', '21', 8);

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
(26, '0YVCTJ', 0, 44.28, '2021-03-15', 2),
(27, 'Yy2wpd', 0, 44.28, '2021-03-15', 2),
(28, 'DuUfap', 0, 44.28, '2021-03-15', 2),
(29, 'OmFaAa', 3, 44.28, '2021-03-17', 1),
(31, 'gOpFQ4', 3, 57.9, '2021-03-19', 1),
(32, 'jnNmnJ', 3, 57.9, '2021-03-19', 1),
(33, 'cmfado', 3, 57.9, '2021-03-19', 1),
(34, 'TI6BVJ', 3, 57.9, '2021-03-19', 1),
(35, 'sUXUqP', 3, 57.9, '2021-03-19', 1),
(36, 'PQ5dFA', 3, 70.75, '2021-03-19', 1),
(37, 'kDNOLt', 0, 70.75, '2021-03-20', 2),
(38, 'N2bmNN', 0, 70.75, '2021-03-20', 1),
(43, 'fmdcdf', 0, 70.75, '2021-04-09', 6),
(44, 'zYcqVX', 0, 70.75, '2021-04-09', 6),
(45, 'B0G05T', 0, 70.75, '2021-04-21', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine_fattorino`
--

CREATE TABLE `ordine_fattorino` (
  `ID` int(3) NOT NULL,
  `fk_id_ordine` int(3) NOT NULL,
  `fk_id_cliente` int(3) NOT NULL,
  `fk_id_fattorino` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordine_fattorino`
--

INSERT INTO `ordine_fattorino` (`ID`, `fk_id_ordine`, `fk_id_cliente`, `fk_id_fattorino`) VALUES
(4, 29, 1, 3),
(5, 30, 1, 3),
(6, 31, 1, 3),
(7, 32, 1, 3),
(8, 33, 1, 3),
(9, 34, 1, 3),
(10, 35, 1, 3),
(11, 36, 1, 3);

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
(7, 'Integrale Spaghetti', 'La pasta integrale Conad, ottenuta grazie alla macinazione dell\'intero chicco del grano conservando le sue parti più pregiate, è ideale per chi cerca un benessere naturale e gustoso. Naturalmente ricca di fibre è una pasta di ottima consistenza e dal sapore rustico. La superficie ruvida trafilata al bronzo la rende particolarmente adatta ad assorbire i condimenti. È ottima abbinata a sughi con verdure, legumi e salse bianche. Conad ha scelto di utilizzare almeno il 51% di grano italiano, privilegiando le coltivazioni del nostro Paese.', 'conad', 1.99, 500, 1),
(8, 'Spaghettoni n 412', 'Gli Spaghettoni, variante più grossa e corposa dei classici Spaghetti, sono particolarmente indicati per piatti dai sapori forti e decisi o per ricette che prevedano il \"salto\" in padella. Ottimi con fiori di zucca, con sugo d\'agnello, rigaglie di pollo o molluschi.', 'de cecco', 2.69, 500, 2),
(9, 'Sedanini', 'Variante piu piccola dei classici Sedani Rigati, i Sedanini sono ottimi nella preparazione di minestroni e minestre, ma possono essere gustati anche con condimenti leggeri di pomodoro. Sono consigliati inoltre sughi di verdure a base di pomodoro e legumi.', 'de cecco', 1.89, 500, 2),
(10, 'Trivelli', 'I Trivelli sono una gustosa variante più piccola dei classici Tortiglioni.\r\n\r\nSono un formato particolarmente versatile e allo stesso tempo originale, che predilige per tradizione i gusti corposi.\r\n\r\nI Trivelli sono ottimi se conditi con ragù a base di carne di manzo o di maiale, o con sughi leggeri a base di pomodoro. Si abbinano bene anche a sughi di verdure a base di funghi, carciofi, peperoni, melanzane. Vengono impiegati ottimamente anche per la preparazione di pasticci al forno.', 'de cecco', 4.89, 1000, 2),
(11, 'Mezzi Tufoli', 'Variante più corta dei classici Tufoli, i Mezzi Tufoli fanno parte delle paste corte a taglio dritto, lisce.\r\n\r\nL\'origine geografica di questo formato non è certa e ne esistono numerose denominazioni locali: Maniche, Gigantoni, Occhi di elefante, Elefante, Canneroni grandi, Occhi di bove.\r\n\r\nL’assenza di rigature è compensata da una sorprendente morbidezza, che regala al palato sensazioni sublimi. Delicate e raffinate, esaltano al massimo aromi, sapori e profumi.\r\n\r\nI condimenti consigliati per i Mezzi Tufoli sono i ragù di carne ma anche i sughi di verdure a base di funghi, carciofi e melanzane. Ottimi anche abbinati ai sughi con legumi come fagioli, piselli, ceci, fave e lenticchie.', '500', 2.59, 500, 2),
(12, 'Mezzi Pennoni Rigati', 'I Mezzi Pennoni Rigati sono una variante più grande delle classiche Mezze Penne Rigate e, grazie alla loro dimensione, riescono a trattenere al meglio i condimenti.\r\n\r\nIl termine Penne fa riferimento, nella lingua italiana, alla penna d\'oca anticamente utilizzata per scrivere e che veniva tagliata di sbieco per ottenere una punta dal tratto sottile. Il formato, ottenuto da un tubo di pasta, liscio o rigato, di lunghezza variabile, presenta il caratteristico taglio diagonale tipico della penna da scrittura.', 'de cecco', 3.29, 500, 2),
(13, 'Orecchiette Grandi', 'Le Orecchiette tradizionali, anche dette \"strascinati\", sono il formato più tipico della cucina pugliese e la loro forma ricorda i cappelli che i contadini indossavano per proteggersi dal sole cocente.\r\n\r\nQuesta versione più grande è ideale per accompagnare ragù sostanziosi, condimenti a base di verdure, funghi ed è insuperabile con ricotta e pecorino.', 'de cecco', 2.49, 500, 2);

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
(30, 1, 3, 26),
(31, 2, 1, 26),
(32, 3, 6, 26),
(33, 6, 2, 26),
(34, 7, 1, 26),
(35, 1, 3, 27),
(36, 2, 1, 27),
(37, 3, 6, 27),
(38, 6, 2, 27),
(39, 7, 1, 27),
(40, 1, 3, 28),
(41, 2, 1, 28),
(42, 3, 6, 28),
(43, 6, 2, 28),
(44, 7, 1, 28),
(45, 1, 3, 29),
(46, 2, 1, 29),
(47, 3, 6, 29),
(48, 6, 2, 29),
(49, 7, 1, 29),
(57, 1, 3, 31),
(58, 2, 1, 31),
(59, 3, 6, 31),
(60, 6, 2, 31),
(61, 7, 1, 31),
(62, 4, 5, 31),
(63, 5, 3, 31),
(64, 1, 3, 32),
(65, 2, 1, 32),
(66, 3, 6, 32),
(67, 6, 2, 32),
(68, 7, 1, 32),
(69, 4, 5, 32),
(70, 5, 3, 32),
(71, 1, 3, 33),
(72, 2, 1, 33),
(73, 3, 6, 33),
(74, 6, 2, 33),
(75, 7, 1, 33),
(76, 4, 5, 33),
(77, 5, 3, 33),
(78, 1, 3, 34),
(79, 2, 1, 34),
(80, 3, 6, 34),
(81, 6, 2, 34),
(82, 7, 1, 34),
(83, 4, 5, 34),
(84, 5, 3, 34),
(85, 1, 3, 35),
(86, 2, 1, 35),
(87, 3, 6, 35),
(88, 6, 2, 35),
(89, 7, 1, 35),
(90, 4, 5, 35),
(91, 5, 3, 35),
(92, 1, 3, 36),
(93, 2, 1, 36),
(94, 3, 6, 36),
(95, 6, 2, 36),
(96, 7, 1, 36),
(97, 4, 5, 36),
(98, 5, 3, 36),
(99, 12, 2, 36),
(100, 13, 1, 36),
(101, 9, 2, 36),
(102, 1, 3, 37),
(103, 2, 1, 37),
(104, 3, 6, 37),
(105, 6, 2, 37),
(106, 7, 1, 37),
(107, 4, 5, 37),
(108, 5, 3, 37),
(109, 12, 2, 37),
(110, 13, 1, 37),
(111, 9, 2, 37),
(112, 1, 3, 38),
(113, 2, 1, 38),
(114, 3, 6, 38),
(115, 6, 2, 38),
(116, 7, 1, 38),
(117, 4, 5, 38),
(118, 5, 3, 38),
(119, 12, 2, 38),
(120, 13, 1, 38),
(121, 9, 2, 38),
(162, 1, 3, 43),
(163, 2, 1, 43),
(164, 3, 6, 43),
(165, 6, 2, 43),
(166, 7, 1, 43),
(167, 4, 5, 43),
(168, 5, 3, 43),
(169, 12, 2, 43),
(170, 13, 1, 43),
(171, 9, 2, 43),
(172, 1, 3, 44),
(173, 2, 1, 44),
(174, 3, 6, 44),
(175, 6, 2, 44),
(176, 7, 1, 44),
(177, 4, 5, 44),
(178, 5, 3, 44),
(179, 12, 2, 44),
(180, 13, 1, 44),
(181, 9, 2, 44),
(182, 1, 3, 45),
(183, 2, 1, 45),
(184, 3, 6, 45),
(185, 6, 2, 45),
(186, 7, 1, 45),
(187, 4, 5, 45),
(188, 5, 3, 45),
(189, 12, 2, 45),
(190, 13, 1, 45),
(191, 9, 2, 45);

-- --------------------------------------------------------

--
-- Struttura della tabella `ricompensa_fattorino`
--

CREATE TABLE `ricompensa_fattorino` (
  `ID` int(11) NOT NULL,
  `importo_ricompensa` float NOT NULL,
  `data_ricompensa` date NOT NULL,
  `fk_id_fattorino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ricompensa_fattorino`
--

INSERT INTO `ricompensa_fattorino` (`ID`, `importo_ricompensa`, `data_ricompensa`, `fk_id_fattorino`) VALUES
(2, 11.58, '2021-03-19', 3),
(3, 14.15, '2021-03-19', 3);

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
(1, 'conad', 'persone oltre le cose'),
(2, 'esselunga', 'supermercato esselunga');

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
(1, 'Filippo', 'Brigati', 'filippobrigati2@gmail.com', '$2y$10$XCyJTuTnZA6zZ8rqmhTJBONpQSRn4/NYi51xDYK2NXHhxGpNxsD/2', 'FilloBrix', 'BRGFPP02L14H223P', '2002-07-14', 0),
(2, 'Mario', 'Rossi', 'mario.rossi@gmail.com', 'mariorossipwd1', 'Mario_Rossi', 'MRJDNNVK2023JNDJ', '1990-07-19', 0),
(3, 'Alessio', 'Blasi', 'alessio.blasi@gmail.com', 'aleblasipwd', 'Ale_Blasi', 'BLSLSS84H28A944J', '1984-06-28', 1),
(4, 'Luca', 'Bianchi', 'luca.bianchi@gmail.com', 'lucabianchipwd', 'Luca_Bianchi', 'LDUVKN3JDNV349KDVN', '2000-03-12', 0),
(5, 'Federico', 'Benassi', 'federico.benassi@studenti.iispascal.it', 'fedebennapwd', 'Federico_Benassi', 'KDNKVéVDK39KNVDD399', '2002-02-22', 0),
(6, 'Filippo', 'Brigati', 'filippo.brigati@studenti.iispascal.it', 'r6VHw2mU', 'Fillo_02', 'BRGF02PP0SKMFVN', '2002-07-14', 0),
(7, 'Giovanni', 'Rana', 'giovanni.rana@gmail.com', '$2y$10$d0cESdhKzutv5sC53r5GbeXfZ8jaR0zdKyHI7Y0iUd0rYFzfl2sDu', 'Giova_Rana', 'JVNDJNN)£8439JNDJN', '1992-08-19', 0),
(8, 'Rita', 'Bianchi', 'rita.bianchi@gmail.com', '$2y$10$IhrMkaRPAIGTNQzBodO1rOyUE87iCiceR3zKwlOyIyF9VfTKgSuPO', 'RITA_BIANCHI', 'DIRNN349DJVN30', '1990-08-19', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carta_credito`
--
ALTER TABLE `carta_credito`
  ADD PRIMARY KEY (`ID`);

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
-- Indici per le tabelle `ordine_fattorino`
--
ALTER TABLE `ordine_fattorino`
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
-- Indici per le tabelle `ricompensa_fattorino`
--
ALTER TABLE `ricompensa_fattorino`
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
-- AUTO_INCREMENT per la tabella `carta_credito`
--
ALTER TABLE `carta_credito`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT per la tabella `ordine_fattorino`
--
ALTER TABLE `ordine_fattorino`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `prodotto_ordine`
--
ALTER TABLE `prodotto_ordine`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT per la tabella `ricompensa_fattorino`
--
ALTER TABLE `ricompensa_fattorino`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `supermercato`
--
ALTER TABLE `supermercato`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
