-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 04. Nov 2015 um 16:18
-- Server Version: 5.5.40
-- PHP-Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `trendservice`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imagePath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buttonText` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `entry`
--

INSERT INTO `entry` (`id`, `title`, `content`, `imagePath`, `icon`, `route`, `buttonText`, `type`, `imageDescription`) VALUES
(1, 'Lasergravuren', 'Mit Gravuren können Gegenstände aus  verschiedensten Materialien veredelt werden.\r\nGerne setzen wir Ihre Wünsche anhand Ihrer\r\nVorlage um und beraten Sie bei der Wahl des geeigneten Materials.', '/bundles/app/images/home_lasergravuren.jpg', 'glass', 'engraving', 'Mehr Informationen', 'home_thumbnail', 'Wir gravieren Holz, Glas, Kork und vieles mehr'),
(2, 'Laserschneiden', 'Profitieren Sie von der Möglichkeit, dass wir diverse Materialien in verschiedenste Formen schneiden können. Kombiniert man ''Lasergravieren mit Laserschneiden'' entstehen einzigartige Produkte.', '/bundles/app/images/home_laserschneiden.jpg', 'paper-plane', 'cutting', 'Mehr Informationen', 'home_thumbnail', 'Hochpräziser Laserschnitt'),
(3, 'Lasern vor Ort', 'An der Herbstmesse haben Sie die Gelegenheit, dem Laser bei der Arbeit zuzusehen und vor Ort auf einen mitgebrachten Gegenstand eine Gravur fertigen zu lassen. Wir sind Presenting- sowie Werbepartner der Messe. Sie finden uns in der Halle 2, Stand 234', '/bundles/app/images/home_herbstmesse.jpg', 'calendar-check-o', 'http://www.herbstmesse-wettingen.ch/htm/trendservice.htm', 'Mehr Informationen', 'home_thumbnail_external', 'Herbstmesse'),
(4, 'Test Assoziation', 'Testen von OneToMany Assoziationen', '', '', '', '', 'test_assoc', ''),
(5, 'Holz', 'Holz können wir Lasergravieren sowie bis ca. 5mm Dicke auch Laserschneiden', NULL, NULL, '#wood', NULL, 'thumbnail_carousel_engraving', 'Holz'),
(7, 'Glas und Spiegel', 'Gläser können wir gravieren, auch rundum. Spiegel gravieren wir von vorne sowie von hinten, dies ermöglicht, dass sie beleuchtet werden können. Gläser und Spiegel können wir nicht zuschneiden.', NULL, NULL, '#glas und spiegel', NULL, 'thumbnail_carousel_engraving', NULL),
(8, 'Für Firmen, Vereine und Private', 'Bei Trendservice ist jeder herzlich willkommen – ob Privat oder als Firma. Für Vereine und Clubs fertigen wir Fanartikel und auf Wunsch, mit einer\r\npersönlichen ''Note'' versehen. Wir beraten und unterstützen Sie gerne als Ideenlieferanten oder bei der Wahl eines passenden Produktes bzw. geeignetem Materials:', '/bundles/app/images/home_evz1.jpg', NULL, 'Weil es uns wirklich Spass macht.', NULL, 'bullet_entry_home', NULL),
(9, 'Metall', 'Eloxiertes bzw. beschichtetes Metall können wir lasern. Gewisse Metallarten lassen sich auch mit ''Einfärben'' gravieren. Metall können wir weder zuschschneiden noch mit Löcher verversehen.', NULL, NULL, '#metal', NULL, 'thumbnail_carousel_engraving', NULL),
(10, 'Esswaren', 'Praktisch jede Essware können wir gravieren und teilweise auch schneiden. An Messen und sonstigen Events ist dies immer wieder ein Hingucker!', NULL, NULL, '#food', NULL, 'thumbnail_carousel_engraving', NULL),
(11, 'Sind Sie auf der Suche, um etwas lasern zu lassen...?', 'hidden', '/bundles/app/images/trendservice_logo.png', NULL, NULL, NULL, 'about_entry_logo', NULL),
(12, 'Daniel Nützi', 'Fertigung | Vertrieb und Beratung', '/bundles/app/images/about_dani1.jpeg', 'desktop', NULL, NULL, 'about_entry_person', NULL),
(13, 'Rachele Sanzone', 'Fertigung | Administration und Beratung', '/bundles/app/images/about_rachele1.jpg', 'desktop', NULL, NULL, 'about_entry_person', NULL),
(14, 'Staffelbar', 'Die Bar direkt auf der Piste', '/bundles/app/images/staffel_bar_resized.jpg', NULL, NULL, NULL, 'about_entry_customer', NULL),
(15, 'Sigis Bar', 'Die Adresse in Grächen für Partyfreunde und Geniesser.', '/bundles/app/images/sigis.bar_resized.jpg', NULL, 'http://www.walliserkanne-graechen.ch/d/sigisbar/index.php', NULL, 'about_entry_customer', NULL),
(17, 'Preisbeispiel Sackmesser', 'Mitgebrachtes Sackmesser mit einfachem Schriftzug graviert CHF 40.00 (inkl. Einrichtgebühren und Gravur)', '/bundles/app/images/pricing_sackmesser2.jpg', NULL, NULL, NULL, 'basic_entry_pricing', NULL),
(18, 'Preisbeispiel Zippo', 'Feuerzeug schwarz eingefärbt und graviert ab CHF 80.00', '/bundles/app/images/pricing_zippo.jpg', NULL, NULL, NULL, 'bullet_entry_pricing', NULL),
(21, 'Laserschneiden', 'Wir können diverse Materialien in verschiedenste Formen schneiden und fertigen sowohl Einzelstücke bis Grossauflagen.\r\nDurch die Kombination ''Lasergravur/Laserschneiden'' entstehen einzigartige Produkte und Unikate.', NULL, NULL, NULL, NULL, 'cutting_entry', NULL),
(22, 'AGB', 'AGB', NULL, NULL, NULL, NULL, 'about_agb', NULL),
(23, 'Leder', 'Leder können wir Lasergravieren sowie Laserschneiden', NULL, NULL, '#leather', NULL, 'thumbnail_carousel_engraving', NULL),
(24, 'Schiefer', 'Schiefer können wir gravieren, aber nicht zuschneiden. Es gibt eine Vielzahl an Grössen und Formen, welche im Handel erhältlich sind.', NULL, NULL, '#schist', NULL, 'thumbnail_carousel_engraving', NULL),
(25, 'Kork', 'Kork können wir Lasergravieren sowie bis ca. 5mm Dicke auch Laserschneiden', NULL, NULL, '#cork', NULL, 'thumbnail_carousel_engraving', NULL),
(26, 'Karton & Papier', 'Karton und Papier können wir Lasergravieren sowie Laserschneiden', NULL, NULL, '#cardboard', NULL, 'thumbnail_carousel_engraving', NULL),
(27, 'Kunststoff', 'Kunststoff ist sehr heikel, da es vielfach schmiltzt. Trotzdem gibt es bestimmte Kunststoffmaterialien, welche wir Lasergravieren sowie Laserschneiden können.', NULL, NULL, '#synthetical', NULL, 'thumbnail_carousel_engraving', NULL),
(28, 'Eigenprodukte', 'Wir tüffteln und pröbeln sehr gerne. So entstehen unsere Eigenprodukte. Vorzugsweise setzen wir auf Material, welches wir Laserschneiden und dann gravieren können.', NULL, NULL, '#ownproduct', NULL, 'thumbnail_carousel_engraving', NULL),
(29, 'Smartphones', 'Smartphones oder deren Hüllen lassen sich meist problemlos gravieren. Fragen Sie nach.', NULL, NULL, NULL, NULL, 'thumbnail_carousel_engraving', NULL),
(30, 'Tablets und Notebooks', 'Auch die Hüllen von Tablets und Notebooks oder die Geräte selbst lassen sich hervorragend gravieren und somit personalisieren.', NULL, NULL, NULL, NULL, 'thumbnail_carousel_engraving', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `entry_translations`
--

CREATE TABLE IF NOT EXISTS `entry_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ext_translations`
--

CREATE TABLE IF NOT EXISTS `ext_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `generalText`
--

CREATE TABLE IF NOT EXISTS `generalText` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Daten für Tabelle `generalText`
--

INSERT INTO `generalText` (`id`, `title`, `content`) VALUES
(1, 'Titel in de', 'Inhalt in de'),
(2, 'home_laser', 'Die Laserwerkstatt in Baden Aargau (AG)'),
(3, 'all_laser', 'Trendservice'),
(7, 'home_informationen', 'Haben Sie irgendwelche Fragen? Zögern Sie nicht uns zu kontaktieren. Hier gelangen Sie zu unserem Kontaktformular.'),
(9, 'home_informationen2', 'test222222'),
(10, 'engraving_title', 'Gravuren'),
(11, 'home_contact_us', 'Wünschen Sie eine Offerte, möchten Sie für ihre Firma oder privat etwas gravieren lassen oder möchten uns sonst etwas mitteilen? Kontaktieren sie uns!'),
(12, 'engraving_description', 'Der typische Ablauf zur Fertigung von Gravuren beginnt mit der Anfrage:\r\n\r\n... Können Sie das, was kostet es und wie lange dauert es ...?\r\n\r\nWir können sehr viele verschiedenartige Materialien gravieren. Da das Ergebnis ''wie es aussieht'' entscheidet, raten wir bei einer grössen Bestellmenge und bei Unklarheit, ob sich die Materialbeschaffenheit zum Lasern eignen, ein Muster zu erstellen.\r\n\r\nIst ein Muster erstellt, können wir eine verbindliche Aussage zum Preis abgeben und Ihnen eine verbindliche Offerte erstellen.\r\n\r\nBei Einzelanfertigungen ist es vielfach unumgänglich, dass wir das Material sehen müssen, um zu entscheiden, ob es sich eignet und was es kostet.\r\n\r\nGrundsätzlich ist zu sagen, wir lasern ''fast'' alles, ausser Flüssigkeiten. Entscheidend ist das Ergebnis bzw. wie es aussieht. Die Maximalgrösse des Lasergut liegt bei 30 x 60cm.\r\n\r\nIn den meisten Fällen erhalten wir das Material von Ihnen als Kunden geliefert.\r\n\r\nWir beraten Sie gerne bei der Wahl des geeigneten Materials und liefern Ihnen Ideen und Musterbilder.'),
(13, 'about_team', 'Unser Team'),
(14, 'about_impressum', 'Impressum'),
(15, 'about_impressum_text', 'Hier zum Download'),
(16, 'contact_onRequest', 'Mo - Fr: 08:00 - 17:00'),
(17, 'about_agb', 'AGB'),
(18, 'about_agb_text', 'Hier zum Download');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `generalText_translations`
--

CREATE TABLE IF NOT EXISTS `generalText_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `generalText_translations`
--

INSERT INTO `generalText_translations` (`id`, `locale`, `object_class`, `field`, `foreign_key`, `content`) VALUES
(2, 'en', 'AppBundle\\Entity\\GeneralText', 'content', '1', 'Brewery'),
(4, 'en', 'AppBundle\\Entity\\GeneralText', 'content', '2', 'Your brewery close to Zermatt'),
(5, 'en', 'AppBundle\\Entity\\GeneralText', 'content', '3', 'Brewery'),
(6, 'nl', 'AppBundle\\Entity\\GeneralText', 'content', '2', 'En brouwerij ims Wallis ;)'),
(7, 'en', 'AppBundle\\Entity\\GeneralText', 'content', '10', 'Beers are us!'),
(8, 'en', 'AppBundle\\Entity\\GeneralText', 'content', '16', 'On request.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subEntry`
--

CREATE TABLE IF NOT EXISTS `subEntry` (
`id` int(11) NOT NULL,
  `entry_id` int(11) DEFAULT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `contentNoTrans` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Daten für Tabelle `subEntry`
--

INSERT INTO `subEntry` (`id`, `entry_id`, `type`, `content`, `contentNoTrans`) VALUES
(1, 4, 'test_sub_assoc', 'Mehr Text hier', NULL),
(9, 4, 'test_sub_assoc2', 'Hallo Velo', NULL),
(13, 5, 'property_image_carousel', NULL, '/bundles/app/images/engrave_wood1.jpg'),
(14, 5, 'property_image_carousel', NULL, '/bundles/app/images/engrave_wood2.jpg'),
(15, 7, 'property_image_carousel', NULL, '/bundles/app/images/engrave_glass1.jpg'),
(19, 8, 'property_text', 'Kombination von Lasergravuren und Laserschneiden', NULL),
(20, 8, 'property_text', 'Freie Wahl der Bestellmenge, ab einem Stück möglich', NULL),
(21, 8, 'property_text', 'Personifizierte Artikel/Werbemittel aus verschiedenen Materialien', NULL),
(23, 5, 'property_text', '<unused at the moment>', NULL),
(26, 9, 'property_image_carousel', NULL, '/bundles/app/images/engrave_metal1.jpg'),
(37, 10, 'property_image_carousel', NULL, '/bundles/app/images/engrave_food1.jpg'),
(38, 11, 'property_paragraph', '... dann sind Sie bei uns genau richtig. Herzlich Willkommen bei Trendservice, wie dürfen wir Ihnen behilflich sein?', NULL),
(39, 11, 'property_paragraph', 'Sie können bei uns Einzelstücke fertigen lassen und selbstverständlich auch grössere Mengen. Wir erheben geringe Einrichtgebühren und keine Expresszuschläge (ausgenommen Logistikkosten).', NULL),
(40, 11, 'property_paragraph', 'Profitieren Sie von hoher Kompetenz und langjährigen Erfahrungen.\r\nWir freuen uns auf Ihre Kontaktaufnahme.', NULL),
(41, 12, 'property_paragraph', 'Inhaber | Geschäftsführung\r\nTelefon: +41 56 544 00 02', NULL),
(42, 13, 'property_paragraph', 'Mitarbeiterin | Designerin Telefon: +41 56 544 00 00', NULL),
(43, 12, 'property_facebook', NULL, 'https://www.facebook.com/Trendservice'),
(48, 21, 'property_text', 'Holz, Karton, Papier, Leder, Kork, Plexiglas', NULL),
(49, 21, 'property_text', 'Modellbau, Beschriftungen, Verpackungen, Werbeartikel, Figuren...', NULL),
(52, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_leather1.jpg'),
(53, 21, 'property_subtitle1', 'Diverse Formen und Grössen', NULL),
(54, 21, 'property_subtitle2', 'Schneidbares Material und Einsatzbereiche', NULL),
(55, 18, 'property_text', 'Zippo (wenn bei Trendservice bestellt) ab CHF 35.00', NULL),
(56, 18, 'property_text', 'Einrichtgebühren (verktorisierte Grafik) fix CHF 30.00', NULL),
(57, 18, 'property_text', 'Gravur inkl. Spezialspray CHF 15.00', NULL),
(58, 18, 'property_text', 'evtl Kosten für Porto, Paketversand', NULL),
(59, 8, 'property_text', 'Unikate', NULL),
(60, 5, 'property_image_carousel', NULL, '/bundles/app/images/engrave_wood3.jpg'),
(61, 7, 'property_image_carousel', NULL, '/bundles/app/images/engrave_glass2.jpg'),
(62, 7, 'property_image_carousel', NULL, '/bundles/app/images/engrave_glass3.jpg'),
(63, 9, 'property_image_carousel', NULL, '/bundles/app/images/engrave_metal2.jpg'),
(64, 9, 'property_image_carousel', NULL, '/bundles/app/images/engrave_metal3.jpg'),
(65, 10, 'property_image_carousel', NULL, '/bundles/app/images/engrave_food2.jpg'),
(66, 23, 'property_image_carousel', NULL, '/bundles/app/images/engrave_leather1.jpg'),
(67, 23, 'property_image_carousel', NULL, '/bundles/app/images/engrave_leather2.jpg'),
(68, 24, 'property_image_carousel', NULL, '/bundles/app/images/engrave_schist1.jpg'),
(69, 24, 'property_image_carousel', NULL, '/bundles/app/images/engrave_schist2.jpg'),
(70, 25, 'property_image_carousel', NULL, '/bundles/app/images/engrave_cork1.jpg'),
(71, 26, 'property_image_carousel', NULL, '/bundles/app/images/engrave_cardboard1.jpg'),
(72, 26, 'property_image_carousel', NULL, '/bundles/app/images/engrave_cardboard2.jpg'),
(73, 27, 'property_image_carousel', NULL, '/bundles/app/images/engrave_synthetical1.jpg'),
(74, 28, 'property_image_carousel', NULL, '/bundles/app/images/engrave_ownproduct1.jpg'),
(75, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_eifelturm.jpg'),
(77, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_buchstaben.jpg'),
(78, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_piwi.jpg'),
(79, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_reserviert.jpg'),
(80, 21, 'property_image', NULL, '/bundles/app/images/cutting/cutting_teelicht.jpg'),
(81, 29, 'property_image_carousel', NULL, '/bundles/app/images/engrave_smartphone1.jpg'),
(82, 29, 'property_image_carousel', NULL, '/bundles/app/images/engrave_smartphone2.jpg'),
(83, 29, 'property_image_carousel', NULL, '/bundles/app/images/engrave_smartphone3.jpg'),
(84, 30, 'property_image_carousel', NULL, '/bundles/app/images/engrave_laptop1.jpg'),
(85, 30, 'property_image_carousel', NULL, '/bundles/app/images/engrave_laptop2.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subEntry_translations`
--

CREATE TABLE IF NOT EXISTS `subEntry_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Daten für Tabelle `subEntry_translations`
--

INSERT INTO `subEntry_translations` (`id`, `locale`, `object_class`, `field`, `foreign_key`, `content`) VALUES
(2, 'en', 'AppBundle\\Entity\\SubEntry', 'content', '1', 'Something1'),
(5, 'en', 'AppBundle\\Entity\\SubEntry', 'content', '9', 'Something2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_translations`
--
ALTER TABLE `entry_translations`
 ADD PRIMARY KEY (`id`), ADD KEY `entry_translation_idx` (`locale`,`object_class`,`field`,`foreign_key`);

--
-- Indexes for table `ext_translations`
--
ALTER TABLE `ext_translations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`), ADD KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`);

--
-- Indexes for table `generalText`
--
ALTER TABLE `generalText`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalText_translations`
--
ALTER TABLE `generalText_translations`
 ADD PRIMARY KEY (`id`), ADD KEY `generalText_translation_idx` (`locale`,`object_class`,`field`,`foreign_key`);

--
-- Indexes for table `subEntry`
--
ALTER TABLE `subEntry`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_90535DAEBA364942` (`entry_id`);

--
-- Indexes for table `subEntry_translations`
--
ALTER TABLE `subEntry_translations`
 ADD PRIMARY KEY (`id`), ADD KEY `subEntry_translation_idx` (`locale`,`object_class`,`field`,`foreign_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `entry_translations`
--
ALTER TABLE `entry_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ext_translations`
--
ALTER TABLE `ext_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `generalText`
--
ALTER TABLE `generalText`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `generalText_translations`
--
ALTER TABLE `generalText_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subEntry`
--
ALTER TABLE `subEntry`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `subEntry_translations`
--
ALTER TABLE `subEntry_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `subEntry`
--
ALTER TABLE `subEntry`
ADD CONSTRAINT `FK_90535DAEBA364942` FOREIGN KEY (`entry_id`) REFERENCES `entry` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
