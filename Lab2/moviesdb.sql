-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2014 at 11:55 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moviesdb`
--
CREATE DATABASE IF NOT EXISTS `moviesdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `moviesdb`;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`) VALUES
(1, 'Animation'),
(2, 'Action'),
(3, 'Adventure'),
(4, 'Comedy'),
(5, 'Drama'),
(6, 'Romance'),
(7, 'Biography'),
(8, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `rating` double NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `rating`, `description`) VALUES
(1, 'Futurama: Bender''s Big Score', 2007, 7.6, '<p>Planet Express sees a hostile takeover and Bender falls into the hands of criminals where he is used to fulfill their schemes.</p>'),
(2, 'Futurama: The Beast with a Billion Backs', 2008, 7.2, '<p>The Planet Express crew discovers a tentacle covered, planet sized alien that wishes to copulate with it all the inhabitants of Earth.</p>'),
(3, 'Futurama: Bender''s Game', 2008, 7.1, '<p>The Planet Express crew get trapped in a fantasy world.</p>'),
(4, 'Futurama: Into the Wild Green Yonder', 2009, 7.2, '<p>Dark forces older than time itself are on the attack, hell-bent on stopping the dawn of a wondrous new green age. Don''t you hate when that happens? Even more shocking: Bender''s in love with a married fembot, and Leela''s on the run from the law - Zapp Brannigan''s law! Fry is the last hope of the universe, recruited for an ultra-top-secret mission. Could this be the end of the Planet Express crew forever? Say it ain''t so, meatbag!</p>'),
(5, 'Toy Story', 1995, 8.2, '<p>A cowboy toy is profoundly threatened and jealous when a fancy spaceman toy supplants him as top toy in a boy''s room.</p>'),
(6, 'Toy Story 2', 1999, 8, '<p>When Woody is stolen by a toy collector, Buzz and his friends vow to rescue him, but Woody finds the idea of immortality in a museum tempting.</p>'),
(7, 'Toy Story 3', 2010, 8.5, '<p>The toys are mistakenly delivered to a day-care center instead of the attic right before Andy leaves for college, and it''s up to Woody to convince the other toys that they weren''t abandoned and to return home.</p>'),
(8, 'Forrest Gump', 1994, 8.7, '<p>Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny, eludes him.</p>'),
(9, 'Moneyball', 2011, 7.7, '<p>Oakland A''s general manager Billy Beane''s successful attempt to put together a baseball club on a budget by employing computer-generated analysis to acquire new players.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `movies_genres`
--

DROP TABLE IF EXISTS `movies_genres`;
CREATE TABLE `movies_genres` (
  `m_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_genres`
--

INSERT INTO `movies_genres` (`m_id`, `g_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 3),
(5, 4),
(6, 1),
(6, 3),
(6, 4),
(7, 1),
(7, 3),
(7, 4),
(8, 4),
(8, 5),
(8, 6),
(9, 5),
(9, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `movies_people`
--

DROP TABLE IF EXISTS `movies_people`;
CREATE TABLE `movies_people` (
  `m_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `role` enum('actor','producer','director','writer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_people`
--

INSERT INTO `movies_people` (`m_id`, `p_id`, `role`) VALUES
(1, 1, 'director'),
(1, 2, 'actor'),
(1, 3, 'actor'),
(1, 4, 'actor'),
(2, 5, 'director'),
(2, 2, 'actor'),
(2, 3, 'actor'),
(2, 4, 'actor'),
(3, 1, 'director'),
(3, 2, 'actor'),
(3, 3, 'actor'),
(3, 4, 'actor'),
(4, 1, 'director'),
(4, 2, 'actor'),
(4, 3, 'actor'),
(4, 4, 'actor'),
(5, 6, 'director'),
(5, 7, 'actor'),
(5, 8, 'actor'),
(5, 9, 'actor'),
(6, 6, 'director'),
(6, 10, 'director'),
(6, 11, 'director'),
(6, 7, 'actor'),
(6, 8, 'actor'),
(6, 12, 'actor'),
(7, 11, 'director'),
(7, 7, 'actor'),
(7, 8, 'actor'),
(7, 12, 'actor'),
(8, 13, 'director'),
(8, 7, 'actor'),
(8, 14, 'actor'),
(8, 15, 'actor'),
(9, 16, 'director'),
(9, 17, 'actor'),
(9, 14, 'actor'),
(9, 18, 'actor');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `description`) VALUES
(1, 'Dwayne Carey-Hill', '<p>Dwayne Carey-Hill is an American animation director, currently working on the Comedy Central series Drawn Together. Prior to Drawn Together, he worked on Futurama, as Susie Dietter''s assistant director and then promoted to a director and directed the episode "Obsoletely Fabulous". He also worked for Sit Down, Shut Up, an animated remake of the 2003 Australian show of the same name. He is currently a director on the animated TV series of Napoleon Dynamite.</p>'),
(2, 'Billy West', '<p>William Richard &ldquo;Billy&rdquo; West (born April 16, 1950) is an American voice actor. Born in Detroit but raised in the Roslindale neighborhood of Boston, Massachusetts, Billy launched his career in the early 1980s performing daily comedic routines on Boston''s WBCN. He left the radio station to work on the short-lived revival of Beany and Cecil. He was also a writer and castmember on The Howard Stern Show during the early to mid 1990s, where he gained nationwide fame with his impersonations of Larry Fine and late Cincinnati Reds owner Marge Schott.</p>'),
(3, 'Katey Sagal', '<p>Catherine Louise &ldquo;Katey&rdquo; Sagal (born January 19, 1954) is an American actress and singer-songwriter. She first achieved widespread fame as Peggy Bundy on the long-running Fox comedy series Married... with Children, for which she was nominated for four Golden Globe Awards for Best Actress in a Comedy Television Series and two American Comedy Awards during the show''s run.</p>\r\n<p>Sagal also voices the character of Leela on the animated series Futurama and its related direct-to-DVD movies since 1999. She is also known for starring on the show 8 Simple Rules in the role of Cate Hennessy, where she worked with John Ritter until his death, leading to Sagal taking over as the series'' lead for the rest of the show''s run.</p>\r\n<p>Since 2008, she has played the role of matriarch Gemma Teller Morrow in the FX drama series Sons of Anarchy, for which she won a Golden Globe in 2011. She has been married to the show''s creator, Kurt Sutter, since 2004.</p>'),
(4, 'John Di Maggio', '<p>John William DiMaggio (born September 4, 1968) is an American voice actor. A native of North Plainfield, New Jersey, he is known for his longtime role as the robot, Bender on Futurama. He has also played such roles as Jake the Dog on Adventure Time, Dr. Drakken on Kim Possible, and Marcus Fenix in the Gears of War franchise. DiMaggio is a former comedian, appearing on stage as part of a comic duo named "Red Johnny and the Round Guy" and has several on-screen credits, such as Steve Ballmer in Pirates of Silicon Valley (the docudrama about the history of Apple Computer and Microsoft) and as the recurring character Dr. Sean Underhill on Chicago Hope.</p>'),
(5, 'Peter Avanzino', '<p>Peter Avanzino is an American animation director. He has directed several episodes of Futurama, and currently serves as supervising director on the 6th season of the series. He has also directed episodes of Drawn Together, Duckman, The Wild Thornberrys, Sit Down, Shut Up, and The Ren and Stimpy Show. He was also a storyboard artist on The Ren and Stimpy Show and the The Simpsons.</p>'),
(6, 'John Lasseter', '<p>John Alan Lasseter (born January 12, 1957) is an American animator, film director and the chief creative officer at Pixar and Walt Disney Animation Studios. He is also currently the Principal Creative Advisor for Walt Disney Imagineering.</p>'),
(7, 'Tom Hanks', '<p>Thomas Jeffrey &ldquo;Tom&rdquo; Hanks (born July 9, 1956) is an American actor, producer, writer, and director. Hanks is known for his roles as Andrew Beckett in Philadelphia and as the title character in Forrest Gump, roles which won him two consecutive Academy Awards for Best Actor. Hanks is also known for his Oscar nominated roles in Big, Saving Private Ryan and Cast Away.</p>'),
(8, 'Tim Allen', '<p>Tim Allen (born Timothy Alan Dick; June 13, 1953) is an American comedian, actor, voice-over artist, and entertainer, known for his role in the sitcom Home Improvement. He is also known for his starring roles in several popular films, including the Toy Story film series, The Santa Clause film series, and Galaxy Quest. Allen currently stars in the ABC sitcom Last Man Standing.</p>'),
(9, 'Don Rickles', '<p>Donald Jay &ldquo;Don&rdquo; Rickles (born May 8, 1926) is an American stand-up comedian and actor. A frequent guest on The Tonight Show Starring Johnny Carson, Rickles has acted in comedic and dramatic roles, but is best known as an insult comic.</p>'),
(10, 'Ash Brannon', '<p>Ash Brannon (born 1969 in Columbus, Georgia) is an American animator, writer and director. He was a story artist and directing animator on Toy Story and co-director on Toy Story 2. Besides working at Pixar he has also worked with Dreamworks Animation on Over the Hedge and Sony Pictures Animation on Surf''s Up.</p>'),
(11, 'Lee Unkrich', '<p>Lee Unkrich (born August 8, 1967) is an American director, film editor and screenwriter. He is a longtime member of the creative team at Pixar, where he started in 1994 as a film editor. He later began directing, first as co-director of Toy Story 2. After co-directing Monsters, Inc., and Finding Nemo, Unkrich made his solo directorial debut with Toy Story 3, for which he won the Academy Award for Best Animated Film in 2011.</p>'),
(12, 'Joan Cusack', '<p>Joan Mary Cusack (born October 11, 1962) is an American film, stage and television actress. She has appeared in films, television and stage productions, receiving Academy Award nominations for Best Supporting Actress for her roles in the movies Working Girl and In & Out, as well as one Golden Globe and one Emmy Award nomination. One of her most notable television roles is as a cast member of the sketch comedy TV show Saturday Night Live in 1985–86.</p>'),
(13, 'Robert Zemeckis', '<p>Robert Lee Zemeckis (born May 14, 1951) is an American film director, producer and screenwriter. Zemeckis first came to public attention in the 1980s as the director of the comedic time-travel Back to the Future film series, as well as the Academy Award-winning live-action/animation epic Who Framed Roger Rabbit (1988), though in the 1990s he diversified into more dramatic fare, including 1994''s Forrest Gump, for which he won an Academy Award for Best Director.</p>'),
(14, 'Robin Wright', '<p>Robin Gayle Wright (born April 8, 1966) is an American actress. She first rose to fame on the television series Santa Barbara as Kelly Capwell which earned her three Daytime Emmy nominations. She went on to star in films such as The Princess Bride and Toys, both of which earned her nominations for the Saturn Award for Best Supporting Actress. She then starred as Jenny Curran in Forrest Gump, which earned her a Golden Globe Award for Best Supporting Actress – Motion Picture nomination. She has starred in films such as Message in a Bottle, Unbreakable, White Oleander, The Conspirator, Moneyball and The Girl with the Dragon Tattoo.</p>'),
(15, 'Gary Sinise', '<p>Gary Alan Sinise (born March 17, 1955) is an American actor, film director and musician. During his career, Sinise has won various awards including an Emmy and a Golden Globe Award and was nominated for an Academy Award. In 1992, Sinise directed, and played the role of George Milton in the successful film adaptation of Of Mice and Men. Sinise was nominated for the Academy Award for Best Supporting Actor in 1994 for his role as Lt. Dan Taylor in Forrest Gump. He won a Golden Globe Award for his role in Truman, as Harry S. Truman. In 1996, he played a corrupt police officer in the dramatic hit Ransom, Detective Jimmy Shaker. In 1998, Sinise was awarded an Emmy Award for the television film George Wallace, a portrayal of the late George C. Wallace. Since 2004, Sinise has starred in CBS''s CSI: NY as Detective Mac Taylor.</p>'),
(16, 'Bennett Miller', '<p>Bennett Miller (born December 30, 1966) is an American film director. Miller is the director of the feature Moneyball (2011). He also directed the documentary film The Cruise (1998) and Capote (2005), a film for which he received an Oscar nomination for Best Director as well.</p>'),
(17, 'Brad Pitt', '<p>William Bradley &ldquo;Brad&rdquo; Pitt (born December 18, 1963) is an American actor and film producer. Pitt has received three Academy Award nominations and five Golden Globe Award nominations, winning one Golden Globe. He has been described as one of the world''s most attractive men, a label for which he has received substantial media attention.</p>'),
(18, 'Jonah Hill', '<p>Jonah Hill (born Jonah Hill Feldstein; December 20, 1983) is an American actor, producer, screenwriter, and comedian, best known for his roles in Superbad, Knocked Up, Funny People, Get Him to the Greek, and Moneyball. He made his theatrical debut in I Heart Huckabees, alongside Jason Schwartzman and Dustin Hoffman. Hill was first nominated for a Teen Choice Award for his role in Accepted as Sherman Schrader. He co-created and starred in the animated comedy Allen Gregory on FOX. For his role in Moneyball, Hill was nominated for an Academy Award for Best Supporting Actor.</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
