-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 05 août 2019 à 05:24
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elementary`
--

-- --------------------------------------------------------

--
-- Structure de la table `academicyear`
--

CREATE TABLE `academicyear` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `begin` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `end` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `academicyear`
--

INSERT INTO `academicyear` (`id`, `col_id`, `begin`, `end`) VALUES
(2, 13, '2018', '2019'),
(4, 13, '2019', '2020');

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `abscences` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `abscences`, `date`) VALUES
(3, 2, 220, NULL),
(5, 3, 123, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `averages`
--

CREATE TABLE `averages` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `average` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `averages`
--

INSERT INTO `averages` (`id`, `stu_id`, `level_id`, `average`) VALUES
(6, 9, 1, '15.300'),
(14, 2, 1, '10.914');

-- --------------------------------------------------------

--
-- Structure de la table `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_bin NOT NULL,
  `po_box` varchar(254) COLLATE utf8_bin NOT NULL,
  `website` varchar(254) COLLATE utf8_bin NOT NULL,
  `phoneno` varchar(254) COLLATE utf8_bin NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `college`
--

INSERT INTO `college` (`id`, `name`, `email`, `po_box`, `website`, `phoneno`, `created_at`) VALUES
(13, 'Institut Superieur Polytechnique Les Armandins', 'info@ispa-armandins.com', '321561-Yaoundé', 'www.ispa-armandins.com', '694521358/677452003', '2019-05-21 19:46:51'),
(14, 'NESCAS', 'contact@nescas.com', '321545', 'www.nescas.cm', '635489653', '2019-05-21 19:47:39'),
(16, 'Siantou', 'contact@siantou.com', '321561', 'www.siantou.com', '+237696468333', '2019-05-29 19:18:37');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `coefficient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `col_id`, `name`, `coefficient`) VALUES
(7, 13, 'Analyse I', 3),
(8, 13, 'Turbo Pascal', 3),
(9, 13, 'Francais debutant', 3),
(10, 13, 'Architecture des ordinateurs', 3),
(11, 13, 'Language c++/c', 4),
(12, 13, 'Arithmetique', 3),
(13, 13, 'Système d\'exploitation', 3),
(14, 13, 'Chinois', 3),
(15, 13, 'Environement economique', 2),
(16, 13, 'Management', 2),
(17, 13, 'Initiation a l\'algorithm', 4),
(18, 13, 'Comptabilité générale', 2),
(19, 13, 'Logiciel utilitaire', 3),
(20, 13, 'Seminaire', 3),
(21, 13, 'Sports', 2),
(22, 13, 'CISCO (CCNA1)', 4),
(23, 13, 'SQL', 3),
(24, 13, 'Initiation au base de données', 3),
(25, 13, 'CISCO (CCNA2)', 4),
(26, 13, 'Algebre', 3),
(27, 13, 'Circuit logique', 3),
(28, 13, 'Architecture et maintenance', 3),
(29, 13, 'Algorithm et structure des données', 4),
(30, 13, 'Conception des structure de donnèes', 4),
(31, 13, 'Expression ecrite et orale', 2),
(32, 13, 'Conduite', 2);

-- --------------------------------------------------------

--
-- Structure de la table `course_professor`
--

CREATE TABLE `course_professor` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `course_professor`
--

INSERT INTO `course_professor` (`id`, `professor_id`, `course_id`) VALUES
(5, 1, 7),
(6, 4, 7),
(7, 1, 8),
(8, 4, 9),
(10, 1, 11),
(12, 2, 10),
(13, 2, 13),
(14, 2, 14),
(16, 4, 15),
(17, 1, 16),
(18, 1, 17),
(19, 2, 18),
(20, 2, 19),
(21, 4, 20),
(22, 2, 21),
(23, 1, 22),
(24, 1, 23),
(25, 2, 24),
(26, 2, 25),
(27, 1, 26),
(28, 2, 27),
(29, 2, 28),
(30, 2, 29),
(31, 1, 30),
(32, 4, 31),
(33, 1, 32),
(34, 4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `installments`
--

CREATE TABLE `installments` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `aca_id` int(11) NOT NULL,
  `label` varchar(254) COLLATE utf8_bin NOT NULL,
  `level` int(11) DEFAULT NULL,
  `dateline` date DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `installments`
--

INSERT INTO `installments` (`id`, `col_id`, `aca_id`, `label`, `level`, `dateline`, `amount`) VALUES
(1, 13, 4, 'Premiere tranche genie logiciel', 1, '2019-09-19', 100000),
(4, 13, 4, 'deuxieme annee', 4, '1995-02-02', 150000);

-- --------------------------------------------------------

--
-- Structure de la table `internship`
--

CREATE TABLE `internship` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `theme` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `internship`
--

INSERT INTO `internship` (`id`, `col_id`, `theme`) VALUES
(3, 13, 'Gestion informatisé d\'une ecole cas d\'étude : ISPA'),
(5, 13, 'Gestion informatisé d\'un commissariat  cas d\'étude : Efoulan');

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `level`
--

INSERT INTO `level` (`id`, `col_id`, `name`) VALUES
(1, 13, 'Génie Logiciel-I'),
(2, 13, 'Génie Logiciel-II'),
(4, 13, 'Système et réseau-I'),
(5, 13, 'Génie Logiciel-III'),
(6, 13, 'Système et réseau-II'),
(7, 13, 'Système et réseau-III');

-- --------------------------------------------------------

--
-- Structure de la table `level_course`
--

CREATE TABLE `level_course` (
  `level_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `level_course`
--

INSERT INTO `level_course` (`level_id`, `course_id`, `id`) VALUES
(1, 7, 31),
(4, 7, 32),
(1, 8, 33),
(4, 8, 34),
(1, 9, 35),
(4, 9, 36),
(1, 11, 39),
(4, 11, 40),
(1, 10, 43),
(2, 10, 44),
(1, 13, 45),
(4, 13, 46),
(1, 14, 47),
(4, 14, 48),
(1, 15, 51),
(4, 15, 52),
(1, 16, 53),
(4, 16, 54),
(1, 17, 55),
(4, 17, 56),
(1, 18, 57),
(4, 18, 58),
(1, 19, 59),
(4, 19, 60),
(1, 20, 61),
(4, 20, 62),
(1, 21, 63),
(4, 21, 64),
(1, 22, 65),
(4, 22, 66),
(1, 23, 67),
(4, 23, 68),
(1, 24, 69),
(4, 24, 70),
(1, 25, 71),
(4, 25, 72),
(1, 26, 75),
(4, 26, 76),
(1, 27, 77),
(4, 27, 78),
(1, 28, 79),
(4, 28, 80),
(1, 29, 81),
(4, 29, 82),
(1, 30, 83),
(4, 30, 84),
(1, 31, 85),
(4, 31, 86),
(1, 32, 87),
(4, 32, 88),
(1, 12, 89),
(4, 12, 90);

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `receiptno` varchar(254) COLLATE utf8_bin NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`id`, `stu_id`, `ins_id`, `col_id`, `receiptno`, `date`) VALUES
(2, 2, 1, 13, 'ch0023456', '2019-05-28');

-- --------------------------------------------------------

--
-- Structure de la table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `firstname` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `phoneno` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `adress` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `professor`
--

INSERT INTO `professor` (`id`, `col_id`, `firstname`, `lastname`, `gender`, `datebirth`, `phoneno`, `adress`, `email`) VALUES
(1, 13, 'Fotsa segning', 'lucien', 'homme', '1982-06-10', '696468333', 'Yaoundé - Awae', 'fotsa@gmail.com'),
(2, 13, 'Ebenye Moukori', 'Vanessa', 'femme', '1980-05-07', '695834655', 'Yaounde - Tsinga', 'ladyvanessa@yahoo.fr'),
(4, 13, 'Mavoungou', 'Pierre', 'homme', '1984-05-10', '654872321', 'Yaounde - Biteng', 'mavoungou@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `logo` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `name_en` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `motto` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `motto_en` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `sign_title` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `sign_name` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `intern_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `col_id`, `logo`, `name_en`, `motto`, `motto_en`, `sign_title`, `sign_name`, `intern_percent`) VALUES
(1, 13, 'PM4Vankvga.png', 'Polytechnic Higher Institute Les Armandins', 'Notre savoir faire a la construction du leadership de demain', 'Our expertise in building the leadership of tomorrow', 'Le Répresentant Résident', 'Edmond Yodou', 40),
(2, 16, NULL, NULL, NULL, NULL, NULL, NULL, 40);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `aca_id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `lev_id` int(11) NOT NULL,
  `firstname` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `nationality` varchar(254) COLLATE utf8_bin NOT NULL,
  `email` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `birthplace` varchar(254) COLLATE utf8_bin NOT NULL,
  `levels` varchar(11) COLLATE utf8_bin NOT NULL,
  `phoneno` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `adress` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `emergency` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `picture` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `matricule` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `aca_id`, `col_id`, `lev_id`, `firstname`, `lastname`, `nationality`, `email`, `gender`, `datebirth`, `birthplace`, `levels`, `phoneno`, `adress`, `emergency`, `picture`, `matricule`) VALUES
(2, 4, 13, 1, 'Ndjinga Besong', 'Daniela', 'Camerounaise', 'daniela2004@gmail.com', 'femme', '2004-08-07', 'Yaoundé', 'I', '2376520004563', 'Yaounde - Nsam', '237696468333', 'G2yHW9amFp.jpg', NULL),
(3, 4, 13, 2, 'Maboune Enow Pofoura', 'Bernice', 'Cameroun', 'maboune@gmail.com', 'femme', '1994-05-24', 'Bayangui', 'I', '237650083880', 'Yaounde - Biteng', '237696468333', 'JzduhhaDiI.jpg', NULL),
(7, 2, 13, 5, 'Mbeunkam Wanchie', 'Brice Lionel', 'Cameroun', 'briceleo@gmail.com', 'homme', '1994-02-20', 'Bafang', 'I', '237696468333', 'Yaounde - Tsinga', '237696468333', '1GdcDMi8W6.jpg', NULL),
(9, 4, 13, 1, 'Kum', 'Dansac', 'Camerounais', 'kumisco@gmail.com', 'homme', '1994-05-04', 'Yaoundé', 'I', '652236154', 'Yaounde - TKC', '237654212365', 'VfKd7SoZAH.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `student_course`
--

CREATE TABLE `student_course` (
  `id` bigint(19) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `mark` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `student_course`
--

INSERT INTO `student_course` (`id`, `student_id`, `course_id`, `mark`) VALUES
(185, 9, 7, '18.00'),
(319, 2, 7, '0.70'),
(320, 2, 8, '17.15'),
(321, 2, 9, '9.85'),
(322, 2, 11, '17.45'),
(323, 2, 10, '11.12'),
(324, 2, 13, '13.92'),
(325, 2, 14, '15.00'),
(326, 2, 15, '14.10'),
(327, 2, 16, '10.40'),
(328, 2, 17, '11.85'),
(329, 2, 18, '11.31'),
(330, 2, 19, '9.88'),
(331, 2, 20, '11.00'),
(332, 2, 21, '0.00'),
(333, 2, 22, '10.05'),
(334, 2, 23, '12.35'),
(335, 2, 24, '14.65'),
(336, 2, 25, '8.20'),
(337, 2, 26, '7.22'),
(338, 2, 27, '5.40'),
(339, 2, 28, '13.50'),
(340, 2, 29, '12.40'),
(341, 2, 30, '15.60'),
(342, 2, 31, '9.80'),
(343, 2, 32, '5.00'),
(344, 2, 12, '7.55');

-- --------------------------------------------------------

--
-- Structure de la table `stud_intern`
--

CREATE TABLE `stud_intern` (
  `internship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `stud_intern`
--

INSERT INTO `stud_intern` (`internship_id`, `student_id`, `id`, `mark`) VALUES
(5, 3, 12, NULL),
(3, 9, 13, 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `remember_token` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `col_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(10, 13, 'electroman87', 'fozeu.jm@gmail.com', NULL, '$2y$10$oYUGrn1g/6uE5v03EXlxJe.YvFi0vQ/TzC.PG44t3SMzOaAvihzIe', 'sppGSbXEvYFeTWCxgpfBHNgM1eyTfH43NhipdCoa4flABuvYraYiKHh4jpoM', '2019-05-21 19:46:51', '2019-05-22 21:27:08', 'root'),
(11, 14, 'kwd-admin', 'electroman063@gmail.com', NULL, '$2y$10$C6hs1d1T347EZs37tvWzuuF2QxsV2ed2ppz2yH/xuxnQbyAGNNxqK', NULL, '2019-05-21 19:47:39', '2019-05-21 19:47:39', 'admin'),
(13, 13, 'the_maarif', 'user@maarif.com', NULL, '$2y$10$xsA5ZKjWt8KhX9T6z13UxeD74LPg7lgPVFOze23z3Kx3WfXUPUGFe', NULL, '2019-05-22 01:11:07', '2019-05-22 01:11:07', NULL),
(14, 16, 'siantou', 'kaizer@siantou.com', NULL, '$2y$10$Qx7H1ftGVV9wh8sOlr65fun19acLMX4AQAJTOKN37rgGfOrHB5KiS', NULL, '2019-05-29 19:18:37', '2019-05-29 19:18:37', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association11` (`col_id`);

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association16` (`student_id`);

--
-- Index pour la table `averages`
--
ALTER TABLE `averages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association116` (`stu_id`),
  ADD KEY `level_fk` (`level_id`);

--
-- Index pour la table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association7` (`col_id`);

--
-- Index pour la table `course_professor`
--
ALTER TABLE `course_professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_has_p` (`professor_id`),
  ADD KEY `fk_belongs_C` (`course_id`);

--
-- Index pour la table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association13` (`aca_id`),
  ADD KEY `fk_association15` (`col_id`);

--
-- Index pour la table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intern_col` (`col_id`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association6` (`col_id`);

--
-- Index pour la table `level_course`
--
ALTER TABLE `level_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_has` (`level_id`),
  ADD KEY `fk_belongs` (`course_id`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pays` (`stu_id`),
  ADD KEY `fk_paidby` (`ins_id`),
  ADD KEY `fk_college` (`col_id`);

--
-- Index pour la table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association9` (`col_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association17` (`col_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association3` (`lev_id`),
  ADD KEY `fk_association10` (`aca_id`),
  ADD KEY `fk_association12` (`col_id`);

--
-- Index pour la table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_has_marks` (`student_id`),
  ADD KEY `fk_marks_belongto` (`course_id`);

--
-- Index pour la table `stud_intern`
--
ALTER TABLE `stud_intern`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_belongsstudent` (`internship_id`),
  ADD KEY `fk_hasinternship` (`student_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_association4` (`col_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `averages`
--
ALTER TABLE `averages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `course_professor`
--
ALTER TABLE `course_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `internship`
--
ALTER TABLE `internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `level_course`
--
ALTER TABLE `level_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT pour la table `stud_intern`
--
ALTER TABLE `stud_intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `academicyear`
--
ALTER TABLE `academicyear`
  ADD CONSTRAINT `fk_association11` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_association16` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `averages`
--
ALTER TABLE `averages`
  ADD CONSTRAINT `fk_association116` FOREIGN KEY (`stu_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `level_fk` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_association7` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `course_professor`
--
ALTER TABLE `course_professor`
  ADD CONSTRAINT `fk_belongs_C` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_has_p` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`);

--
-- Contraintes pour la table `installments`
--
ALTER TABLE `installments`
  ADD CONSTRAINT `fk_association13` FOREIGN KEY (`aca_id`) REFERENCES `academicyear` (`id`),
  ADD CONSTRAINT `fk_association15` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `intern_col` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `fk_association6` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `level_course`
--
ALTER TABLE `level_course`
  ADD CONSTRAINT `fk_belongs` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `fk_has` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_college` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`),
  ADD CONSTRAINT `fk_paidby` FOREIGN KEY (`ins_id`) REFERENCES `installments` (`id`),
  ADD CONSTRAINT `fk_pays` FOREIGN KEY (`stu_id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_association9` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_association17` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_association10` FOREIGN KEY (`aca_id`) REFERENCES `academicyear` (`id`),
  ADD CONSTRAINT `fk_association12` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`),
  ADD CONSTRAINT `fk_association3` FOREIGN KEY (`lev_id`) REFERENCES `level` (`id`);

--
-- Contraintes pour la table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `fk_has_marks` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `fk_marks_belongto` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Contraintes pour la table `stud_intern`
--
ALTER TABLE `stud_intern`
  ADD CONSTRAINT `fk_belongsstudent` FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id`),
  ADD CONSTRAINT `fk_hasinternship` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_association4` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
