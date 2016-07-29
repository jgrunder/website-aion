--
-- Table structure for table `logs_allopass`
--

CREATE TABLE `logs_allopass` (
  `id_allopass` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs_paypal`
--

CREATE TABLE `logs_paypal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logs_shop_points`
--

CREATE TABLE `logs_shop_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `fr` text NOT NULL,
  `en` text NOT NULL,
  PRIMARY KEY (`id`,`page_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `fr`, `en`) VALUES
(1, 'rules', '<h2>R&egrave;gles en jeu&nbsp;:</h2>\r\n\r\n<p>-Certaines maps sur le serveur sont limit&eacute;es en nombre de joueurs group&eacute;s. Donc tout ce qui est en rapport avec de la collaboration entre joueurs est strictement interdit.<br />\r\nLa collaboration est notamment interdite dans les maps de type FFA, Battle royale, ou encore Battleground.<br />\r\nSi un membre du staff vous surprend en train de collaborer avec des personnes ext&eacute;rieures &agrave; votre groupe, vous serez sanctionn&eacute; en fonction de vos ant&eacute;c&eacute;dents. Vous perdrez notamment 1000 Tolls, et un reset de vos AP/GP. Les sanctions &eacute;tant progressives et pouvant &ecirc;tre un simple jail, comme une r&eacute;duction de vos tolls, puis un bannissement temporaire. &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Le respect est primordial pour qu&rsquo;un serveur puisse fonctionner. Alors nous demandons &agrave; tous les joueurs de RealAion de s&rsquo;amuser en respectant les autres joueurs ainsi que les membres du staff.<br />\r\nSi des insultes, propos d&eacute;sobligeant sont remont&eacute;s aux GM, le joueur ayant &eacute;mis ces insultes sera sanctionn&eacute; en fonction de la gravit&eacute; des dires.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Les pseudos provoquant, insultant, raciste, sexiste ne sont pas tol&eacute;r&eacute;s sur le serveur.<br />\r\nLes pseudos comprenant un nombre incalculable de la m&ecirc;me lettre sont interdits comme&nbsp;: &laquo;&nbsp;Nammmmmmmmmmme&nbsp;&raquo; ou encore les noms en majuscules &laquo;&nbsp;NAME&nbsp;&raquo;</p>\r\n\r\n<p>Le joueur ne respectant pas cela se verra rename par un GM sans avertissement. Ce joueur ne pourra pas se plaindre du pseudo choisi par la GM car il n&rsquo;a pas respect&eacute; le r&egrave;glement. Ce sera alors &agrave; lui d&rsquo;acheter un ticket de changement de nom s&rsquo;il souhaite en changer.<br />\r\nSi un joueur r&eacute;cidive en remettant un pseudo ne respectant pas le r&egrave;glement, cela sera consid&eacute;r&eacute; comme de la provocation envers le staff et sera lourdement sanctionn&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Les r&egrave;gles sur les noms de l&eacute;gions sont les m&ecirc;mes que celles en rapport avec le pseudo des joueurs.<br />\r\nIls ne doivent pas &ecirc;tre provoquant, insultant, raciste, sexiste, et ne doivent pas &ecirc;tre compos&eacute;s d&rsquo;une succession de lettres.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Les items disponibles en loot mais &eacute;galement disponible en boutique ne peuvent &ecirc;tre rembours&eacute;s ou &eacute;chang&eacute;s. Ne venez donc pas voir une personne du staff pour ce genre de demande.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Les items perdu lors d&rsquo;un rollback/reboot du serveur ne seront pas restitu&eacute;s.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Tuer un joueur en boucle en l&rsquo;emp&ecirc;chant de jouer peut &ecirc;tre sanctionn&eacute;. Notamment si vous campez son lieu de spawn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-L&rsquo;utilisation de logiciel tierce modifiant les statistiques du joueur en jeu est formellement interdite.<br />\r\nSeuls sont autoris&eacute;s les logiciels comme WTF ou des logiciels am&eacute;liorant le ping en jeu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Vous faire passer pour un membre du staff est un acte sanctionnable de bannissement</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>R&egrave;gles durant les Events&nbsp;:</h2>\r\n\r\n<p>-Il est interdit de s&rsquo;enregistrer dans les battleground ou de partir en FFA ou PvP durant un Event.<br />\r\nSi un joueur le fait, il ne sera pas re t&eacute;l&eacute;port&eacute; dans l&rsquo;event et pourra subir une sanction.</p>\r\n\r\n<p><br />\r\n-Envoyez un message une seule fois &agrave; un Animateur s&rsquo;il vous demande de le MP pour participer &agrave; son event. Un flood de messages fera que vous ne serez pas pris tout simplement, et pourra amener &agrave; un mute de votre personnage.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Vous n&rsquo;avez pas le droit de taper les autres joueurs ou les personnes du staff tant que le Staffien ne vous y autorise pas. Toute tentative sera sanctionn&eacute;e par un /kill, pour vous calmer, puis si vous recommencez d&rsquo;une exclusion de l&rsquo;event avec retrait de tolls sur votre compte.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Ne spammez pas les tchat de conversation comme le /alentour&nbsp;; le /crier ou encore les canaux de discussion durant l&rsquo;event. Sinon celui-ci en sera ralentit et vous en serez expuls&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>(Chaque Event a des r&egrave;gles additionnelles qui sont &eacute;tablies par l&rsquo;animateur ou le Gamemaster. Suivez-les avec attention sous peine d&rsquo;expulsion de l&rsquo;event et de sanctions plus lourdes.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>R&egrave;gles Forum&nbsp;:</h2>\r\n\r\n<p>-La shoutbox sert principalement &agrave; demander des informations sur le serveur. Celle-ci n&rsquo;est pas l&agrave; pour spam ou raconter votre vie comme ce que vous avez mang&eacute; au gouter en regardant un &eacute;pisode de Dora l&rsquo;exploratrice.</p>\r\n\r\n<p>Les insultes ou provocations envers le staff sont &eacute;galement interdites. Le non-respect de ces r&egrave;gles am&egrave;nera &agrave; des sanctions pouvant aller du bannissement de la shoutbox au bannissement du forum dans son int&eacute;gralit&eacute;.</p>\r\n\r\n<p><br />\r\n-Les reports de bugs concernant le serveur doivent imp&eacute;rativement &ecirc;tre faits par &eacute;crit sur les postes d&eacute;di&eacute;s &agrave; cela sur le forum. Les reports de bugs qui ne respecteraient pas cela ne seront pas pris en compte.</p>\r\n\r\n<p>-Vous faire passer pour un membre du staff est un acte sanctionnable de bannissement</p>\r\n', '<h2>In Game Rules</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Teaming in FFA/BGs is not allowed&nbsp;(any assistance / special treatment is teaming)&nbsp;-&nbsp;Offenders get Tolls set to -1000, GP/AP set to 0, and bans for repeat offence.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Excessive&nbsp;abuse of help&nbsp;of the&nbsp;opposing race&nbsp;in any way in order to gain AP/GP leads to a temporary or permanent ban.&nbsp;Trading artifacts is forbidden as well.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Racist/offensive&nbsp;in game names are not allowed! -&nbsp;Your account will be suspended if you got caught&nbsp;a second time&nbsp;or refused to change the name.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Insulting&nbsp;is not allowed. -&nbsp;There is a block function for Players. Report it to a GM if the person kept spamming you in other ways.</p>\r\n\r\n<p>-Insulting staff members&nbsp;for whatever reason is not allowed. -&nbsp;PM&nbsp;Pml&nbsp;or&nbsp;Yukki ;&nbsp;if you have a problem with a GM/AM.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Impersonating a staff member&nbsp;is strictly forbidden. -&nbsp;Ends with a permanent ban.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Client modifications&nbsp;or&nbsp;Hacks&nbsp;are obviously forbidden. -&nbsp;Ends with a permanent ban without a warning.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Using&nbsp;invisible&nbsp;gear skins are strictly not allowed! -&nbsp;Your Tiamat Bloody Tears will not be refunded, leads to a temporary ban if caught&nbsp;a 2nd time&nbsp;and permanently if you refused to remove the remodel.&nbsp;Having an invisible remodel on your shoulders is allowed.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Event Rules</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Registering to&nbsp;FFA/BGs or 1v1&nbsp;is obviously forbidden while you&#39;re in an event.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Just whisper a staff member&nbsp;once, if you want to join an event - It will be&nbsp;announced, if you need to whisper again.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Do&nbsp;not attack&nbsp;people until the&nbsp;AM/GM gives you the permission.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Do&nbsp;not spam&nbsp;the chat with&nbsp;useless chats or shouts, otherwise the event progress will be&nbsp;slowed down.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>(Every event has additional rules, please follow them.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Forum Rules</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Please don&#39;t spam&nbsp;the forums/shoutbox with useless posts. -&nbsp;Starts with a few warnings and ends with a temporary/permanent ban.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Double posting is not allowed&nbsp;unless you haven&#39;t got a reply for the&nbsp;last 6 hours. -&nbsp;Starts with a few warnings and ends with a temporary/permanent ban.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-Using&nbsp;the right forum sections&nbsp;for your topics. -&nbsp;Breaking the rule starts with a few warnings and ends with a temporary/permanent ban.</p>\r\n'),
(2, 'team', '<p>En cours de r&eacute;daction</p>\r\n', '<p>En cours de redaction</p>\r\n'),
(3, 'teamspeak', '<p>En cours de r&eacute;daction</p>\r\n', '<p>En cours de r&eacute;daction</p>\r\n'),
(4, 'subscribe', '<p>En cours de r&eacute;daction</p>\r\n', '<p>En cours de r&eacute;daction</p>\r\n'),
(5, 'joinus', '<p>En cours de r&eacute;daction</p>\r\n', '<p>En cours de r&eacute;daction</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_history`
--

CREATE TABLE `shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_items`
--

CREATE TABLE `shop_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub_category` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `purchased` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_sub_category`
--

CREATE TABLE `shop_sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config_slider`
--

CREATE TABLE `config_slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
