-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2018 at 12:50 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_employer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ensignent`
--

CREATE TABLE `ensignent` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ensignent`
--

INSERT INTO `ensignent` (`id`, `nom`, `prenom`, `date_naissance`) VALUES
(1, 'mohamed', 'tayan', '1990-02-08'),
(2, 'houcine', 'sahal', '2018-05-24'),
(3, 'omar', 'khalfaoui', '2018-05-15'),
(4, 'rabah', 'ben kerch', '2018-05-15'),
(6, 'ahmed', 'serir', '2018-05-11'),
(7, 'Derar', 'hassen', '1979-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `ensignentmodule`
--

CREATE TABLE `ensignentmodule` (
  `id` int(11) NOT NULL,
  `id_ensig` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ensignentmodule`
--

INSERT INTO `ensignentmodule` (`id`, `id_ensig`, `id_module`, `description`) VALUES
(1, 3, 3, 'sdsd'),
(2, 2, 4, 'zxzxzx'),
(3, 1, 6, 'chapitre1 : logique binnaire\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `filiere` text NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `titre`, `description`, `filiere`, `nombre`) VALUES
(2, 'Groupe1', 'cette classe et specilaise', 'informatique', 25),
(3, 'Groupe2', 'ce groupe specialise au developpement web', 'informatique', 24),
(4, 'Groupe3', 'le contenu de programme base sur les conecpts de base de reseau mobile', 'informatique', 34),
(5, 'Goupe5', 'ce groupe specialise dans le domain aerontique', 'aeronotique', 34);

-- --------------------------------------------------------

--
-- Table structure for table `groupemodule`
--

CREATE TABLE `groupemodule` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `nbre` int(11) NOT NULL,
  `descrption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupemodule`
--

INSERT INTO `groupemodule` (`id`, `id_group`, `id_module`, `nbre`, `descrption`) VALUES
(1, 2, 1, 22, 'le progrmme est charge pour avoir les competence de base sur le language utilise dans \r\nle domain informatique'),
(2, 3, 1, 4, 'df'),
(3, 4, 2, 5, 'ff'),
(4, 2, 4, 1, 'sas');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `titre` varchar(254) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `titre`, `description`) VALUES
(1, 'English', 'Definition of description - a spoken or written account of a person, object, or event, a type or class of people or things.\r\n'),
(2, 'physique', 'the form, size, and development of a person\'s body.\r\n\"a sturdy, muscular physique\"\r\nsynonyms:	body, build, figure, frame, anatomy, constitution, shape, form, proportions, (physical) make-up, physical/body structure, physical development, muscles, musculature, skeleton, flesh;'),
(3, 'chemistry', 'Image result for chemistry is the study of\r\nChemistry is also the study of matter\'s composition, structure, and properties. Matter is essentially anything in the world that takes up space and has mass. Chemistry is sometimes called “the central science,” because it bridges physics with other natural sciences, such as geology and biology.'),
(4, 'mathematique', 'Les mathématiques (ou la mathématique) sont un ensemble de connaissances abstraites résultant de raisonnements logiques appliqués à des objets divers ...'),
(5, 'France', 'Planning a trip to France or its overseas territories? If you need a visa, France-Visas guides you at each step of your application.'),
(6, 'logique', 'theore sur mathematique');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `titre` varchar(254) NOT NULL,
  `type` enum('TD','Cours','TP') NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `titre`, `type`, `description`) VALUES
(2, 'amphi 1', 'TD', 'salle de td'),
(3, 'Salle 160', 'Cours', 'la salle contien 150');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `realName` varchar(32) DEFAULT NULL,
  `authKey` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `password`, `realName`, `authKey`) VALUES
(1, 'hossein', 'hossein', 'errahmani', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ensignent`
--
ALTER TABLE `ensignent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ensignentmodule`
--
ALTER TABLE `ensignentmodule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupemodule`
--
ALTER TABLE `groupemodule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ensignent`
--
ALTER TABLE `ensignent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ensignentmodule`
--
ALTER TABLE `ensignentmodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groupemodule`
--
ALTER TABLE `groupemodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
