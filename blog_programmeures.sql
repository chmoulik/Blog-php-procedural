-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 16 avr. 2024 à 21:45
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_programmeures`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `titre`, `article`, `image`, `id_user`, `date_publication`) VALUES
(4, 'Qu\'est-ce que l\'intelligence artificielle ?', '<p>L\'intelligence artificielle (IA) est un domaine de l\'informatique qui se concentre sur la cr&eacute;ation de machines capables d\'imiter le comportement humain et d\'ex&eacute;cuter des t&acirc;ches qui n&eacute;cessitent g&eacute;n&eacute;ralement l\'intelligence humaine. L\'objectif principal de l\'IA est de cr&eacute;er des syst&egrave;mes capables d\'apprendre, de raisonner, de comprendre, de percevoir et d\'agir de mani&egrave;re autonome pour r&eacute;soudre des probl&egrave;mes complexes.</p>\n<h3>Principales techniques et m&eacute;thodes de l\'IA :</h3>\n<ol>\n<li>\n<p>Apprentissage automatique (Machine Learning) : Une branche de l\'IA qui permet aux ordinateurs d\'apprendre &agrave; partir de donn&eacute;es sans &ecirc;tre explicitement programm&eacute;s. Les algorithmes d\'apprentissage automatique identifient des mod&egrave;les dans les donn&eacute;es et les utilisent pour prendre des d&eacute;cisions ou effectuer des pr&eacute;dictions.</p>\n</li>\n<li>\n<p>R&eacute;seaux de neurones artificiels (Deep Learning) : Une technique d\'apprentissage automatique inspir&eacute;e du fonctionnement du cerveau humain. Les r&eacute;seaux de neurones profonds sont capables d\'apprendre des repr&eacute;sentations hi&eacute;rarchiques de donn&eacute;es complexes et sont largement utilis&eacute;s dans des domaines tels que la reconnaissance d\'images et la compr&eacute;hension du langage naturel.</p>\n</li>\n<li>\n<p>Logique floue (Fuzzy Logic) : Une m&eacute;thode qui permet de g&eacute;rer l\'incertitude et l\'impr&eacute;cision en utilisant des degr&eacute;s de v&eacute;rit&eacute; plut&ocirc;t que des valeurs binaires (vrai ou faux). La logique floue est utilis&eacute;e dans les syst&egrave;mes de contr&ocirc;le automatique, les syst&egrave;mes d\'aide &agrave; la d&eacute;cision et les syst&egrave;mes de reconnaissance de motifs.</p>\n</li>\n<li>\n<p>Syst&egrave;mes experts : Des syst&egrave;mes informatiques capables de reproduire le raisonnement et la prise de d&eacute;cision d\'un expert humain dans un domaine sp&eacute;cifique. Ils utilisent des bases de connaissances pour r&eacute;soudre des probl&egrave;mes complexes et fournir des conseils ou des recommandations.</p>\n</li>\n</ol>\n<h3>Domaines d\'application de l\'IA :</h3>\n<ol>\n<li>\n<p>Traitement du langage naturel (NLP) : L\'IA est utilis&eacute;e pour comprendre et g&eacute;n&eacute;rer du langage humain, ce qui permet le d&eacute;veloppement de chatbots, de syst&egrave;mes de traduction automatique, d\'analyse de sentiment, etc.</p>\n</li>\n<li>\n<p>Vision par ordinateur : Les algorithmes d\'IA sont utilis&eacute;s pour analyser et interpr&eacute;ter des images et des vid&eacute;os, ce qui alimente des applications telles que la reconnaissance faciale, la surveillance vid&eacute;o, la voiture autonome, etc.</p>\n</li>\n<li>\n<p>M&eacute;decine et biologie : L\'IA est utilis&eacute;e pour analyser des donn&eacute;es m&eacute;dicales et biologiques, aider au diagnostic des maladies, concevoir de nouveaux m&eacute;dicaments, etc.</p>\n</li>\n<li>\n<p>Finance et commerce : L\'IA est utilis&eacute;e pour l\'analyse de donn&eacute;es financi&egrave;res, la d&eacute;tection de fraude, la recommandation de produits, etc.</p>\n</li>\n</ol>', 'ia.jpeg', 1, '2024-04-16 16:50:39'),
(8, 'Comprendre les algorithmes : concepts fondamentaux et principes clés', '<p>Un algorithme est une s&eacute;quence finie et non ambigu&euml; d\'&eacute;tapes ou d\'instructions logiques qui r&eacute;sout un probl&egrave;me donn&eacute; ou effectue une t&acirc;che sp&eacute;cifique. Voici un r&eacute;sum&eacute; des principales caract&eacute;ristiques et concepts associ&eacute;s aux algorithmes :</p>\r\n<ol>\r\n<li>\r\n<p>S&eacute;quence d\'&eacute;tapes : Un algorithme consiste en une s&eacute;rie ordonn&eacute;e d\'&eacute;tapes ou d\'instructions qui sont ex&eacute;cut&eacute;es dans un ordre sp&eacute;cifique pour atteindre un objectif pr&eacute;cis.</p>\r\n</li>\r\n<li>\r\n<p>Clart&eacute; et pr&eacute;cision : Les instructions dans un algorithme doivent &ecirc;tre claires, pr&eacute;cises et non ambigu&euml;s afin que leur ex&eacute;cution produise toujours le r&eacute;sultat attendu.</p>\r\n</li>\r\n<li>\r\n<p>D&eacute;terminisme : Un algorithme est d&eacute;terministe, ce qui signifie que pour une entr&eacute;e donn&eacute;e, il produira toujours la m&ecirc;me sortie. Cela garantit la fiabilit&eacute; et la pr&eacute;visibilit&eacute; de son fonctionnement.</p>\r\n</li>\r\n<li>\r\n<p>Finitude : Un algorithme doit &ecirc;tre fini, ce qui signifie qu\'il doit avoir un nombre fini d\'&eacute;tapes et se terminer apr&egrave;s un certain nombre d\'it&eacute;rations.</p>\r\n</li>\r\n<li>\r\n<p>Universalit&eacute; : Les algorithmes peuvent &ecirc;tre appliqu&eacute;s &agrave; une grande vari&eacute;t&eacute; de probl&egrave;mes et de domaines, de la r&eacute;solution de probl&egrave;mes math&eacute;matiques simples &agrave; la conception de syst&egrave;mes informatiques complexes.</p>\r\n</li>\r\n<li>\r\n<p>Efficacit&eacute; : Un bon algorithme est efficace, ce qui signifie qu\'il utilise efficacement les ressources disponibles telles que le temps et l\'espace m&eacute;moire pour produire le r&eacute;sultat souhait&eacute; dans un d&eacute;lai raisonnable.</p>\r\n</li>\r\n<li>\r\n<p>Abstraction : Les algorithmes utilisent souvent des concepts d\'abstraction pour repr&eacute;senter des op&eacute;rations complexes de mani&egrave;re simplifi&eacute;e, ce qui les rend plus faciles &agrave; comprendre et &agrave; impl&eacute;menter.</p>\r\n</li>\r\n</ol>', 'algorithme.jpeg', 1, '2024-04-16 20:53:41');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentaire` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `id_user_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `date_commentaire`, `commentaire`, `article_id`, `id_user_commentaire`) VALUES
(3, '2024-04-16 18:56:25', '<p>Un article informatif et bien structur&eacute; qui offre un aper&ccedil;u complet des principaux concepts et applications de l\'intelligence artificielle. J\'appr&eacute;cie particuli&egrave;rement la mani&egrave;re dont l\'article explique clairement les techniques telles que l\'apprentissage automatique et les r&eacute;seaux de neurones, tout en illustrant les domaines d\'application vari&eacute;s de l\'IA, de la m&eacute;decine &agrave; la finance. Un excellent point de d&eacute;part pour quiconque souhaite comprendre l\'impact et le potentiel de cette technologie fascinante.</p>', 4, 1),
(9, '2024-04-16 22:34:56', '<p>Je suis vraiment impressionn&eacute; par la profondeur de cet article sur l\'intelligence artificielle. La fa&ccedil;on dont il d&eacute;compose les concepts complexes en termes simples et explique les applications pratiques de l\'IA dans divers domaines est tout simplement remarquable. C\'est une lecture incontournable pour quiconque s\'int&eacute;resse &agrave; l\'avenir de la technologie et &agrave; son impact sur notre quotidien.</p>', 4, 3),
(10, '2024-04-16 22:56:09', '<p>Les algorithmes, ces invisibles compagnons du monde num&eacute;rique, fa&ccedil;onnent nos parcours en ligne de mani&egrave;re souvent imperceptible. Leur travail discret mais omnipr&eacute;sent cr&eacute;e l\'ordre dans le chaos des donn&eacute;es et nous guide vers des exp&eacute;riences plus fluides et personnalis&eacute;es. En apprivoisant ces forces cach&eacute;es, nous devenons les ma&icirc;tres de notre navigation digitale, capables de tirer parti de leurs subtilit&eacute;s pour mieux explorer et interagir avec le vaste univers en ligne.</p>', 8, 2),
(11, '2024-04-16 23:36:05', '<p>Les algorithmes sont les invisibles architectes du num&eacute;rique, guidant nos interactions en ligne avec pr&eacute;cision et discr&eacute;tion.</p>', 8, 4),
(13, '2024-04-16 23:39:18', '<p>L\'intelligence artificielle, &eacute;toffe num&eacute;rique de nos temps modernes, intrigue et fascine. Elle ouvre des portes vers un avenir o&ugrave; machines et humanit&eacute; convergent pour r&eacute;soudre les d&eacute;fis les plus complexes de notre &eacute;poque.</p>', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `mail`, `lastName`, `firstName`, `admin`) VALUES
(1, 'simon', '$2y$10$ktoCea/inFrGZJlDeptB4uTHSdXBYbatTwfZZEZ2OCf8i3Usz.MuK', 'chmoulik770770@hotmail.com', 'aziza', 'chmouel simon', 1),
(2, 'azriel', '$2y$10$.JL4PH5Ideifhe6lYjBHtebs4HdPfhgGuYNnl7MwNRle/Wwh2h0ri', 'azriel@hotmail.com', 'aziza', 'azriel', 1),
(3, 'menahem', '$2y$10$O3Az2XjE8Bb5M/sK.YG8peK4QQSfrqvzVCesAbGa2/Obr7BaAIXqu', 'menahem@gmail.com', 'aziza', 'menahem', 0),
(4, 'yossele', '$2y$10$PUXFTEE4aPxVBWDalWIG5Ots0PSfIYJEpPz4QM862OOK5xufWHoW6', 'yossi@yoss.com', 'albertal', 'yossi', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `id_user_commentaire` (`id_user_commentaire`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`,`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_user_commentaire`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
