
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
`id` int(20) NOT NULL,
  `movie_title` varchar(30) NOT NULL,
  `screening_1` varchar(6) NOT NULL,
  `screening_2` varchar(6) NOT NULL,
  `further_info` varchar(500) NOT NULL,
  `img` varchar(30) NOT NULL,
  `book_now` varchar(30) NOT NULL
) ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_title`, `screening_1`, `screening_2`, `further_info`, `img`, `book_now`) VALUES
(1, 'Big Hero 6', '11:00', '16:45', 'Robotics prodigy Hiro (Ryan Potter) lives in the city of San Fransokyo. Next to his older brother, Tadashi, Hiro''s closest companion is Baymax (Scott Adsit), a robot whose sole purpose is to take care of people. When a devastating turn of events throws Hiro into the middle of a dangerous plot, he transforms Baymax and his other friends.', 'img/r6.jpg', 'login.html'),
(2, 'Dawn Planet of the Apes', '17:30', '20:40', 'Ten years after simian flu wiped out much of the world''s homosapiens, genetically enhanced chimpanzee Caesar (Andy Serkis) and his ever-growing band of followers have established a thriving colony just outside San Francisco in Muir Woods. Meanwhile, a small band of human survivors emerges, which forces Caesar -- as leader -- to grapple with the dual challenge of protecting his people and re-establishing a relationship with the remaining human population -- the latter being Caesar''s secret wish.', 'img/r5.jpg', 'login.html'),
(3, 'Interstellar', '17:30', '19:10', 'In Earth''s future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable. Professor Brand (Michael Caine), a brilliant NASA physicist, is working on plans to save mankind by transporting Earth''s population to a new home via a wormhole. But first, Brand must send former NASA pilot Cooper (Matthew McConaughey) and a team of researchers through the wormhole and across the galaxy to find out which of three planets could be mankind''s new home.', 'img/r4.jpg', 'login.html'),
(4, 'Avengers', '13:05', '04:15', 'Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow, Captain America and Bruce Banner -- must figure out a way to bring back their vanquished allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the universe.', 'img/r3.jpg', 'login.html'),
(5, 'Lego Movie', '11:00', '04:15', 'Emmet (Chris Pratt), an ordinary LEGO figurine who always follows the rules, is mistakenly identified as the Special -- an extraordinary being and the key to saving the world. He finds himself drafted into a fellowship of strangers who are on a mission to stop an evil tyrant''s (Will Ferrell) plans to conquer the world. Unfortunately for Emmet, he is hopelessly -- and hilariously -- unprepared for such a task, but he''ll give it his all nonetheless.', 'img/r1.jpg', 'login.html'),
(6, 'Spiderman', '13.30', '18.45', 'Peter Parker''s relaxing European vacation takes an unexpected turn when Nick Fury shows up in his hotel room to recruit him for a mission. The world is in danger as four massive elemental creatures -- each representing Earth, air, water and fire -- emerge from a hole torn in the universe. Parker soon finds himself donning the Spider-Man suit to help Fury and fellow superhero Mysterio stop the evil entities from wreaking havoc across the continent.', 'img/r2.jpg', 'login.html');

