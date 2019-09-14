CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Romance'),
(4, 'Drama'),
(5, 'Crime');

CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `producer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `movies` (`id`, `genre_id`, `title`, `summary`, `producer`) VALUES
(1, 1, 'Hobbs and Shaw', 'Lawman Luke Hobbs and outcast Deckard shaw form an unlikely alliance when a cyber-genetically enhanced villain threatens the future of humanity.', 'Dwayne Johnson'),
(2, 2, 'Captain Marvel', 'Carol Danvers becomes of the universe"s most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.', 'Marvel Studios'),
(3, 3, 'What Men Want', 'A woman is boxed out by the male sports agents in her profession, but gains an unexpected edge over them when she develops the ability to hear men"s thoughts.', 'Will Packer, James Lopez'),
(4, 4, 'Joker', 'An original standalone origin of the story of the iconic villain not seen before on the big screen, it"s a gritty character study of Arthur Fleck, a man disregarded by society, and a broader cautionary tale.', 'Todd Philips'),
(5, 5, 'John Wick: Chapter 3 - Parabellum', 'Super-assassin John Wick is on the run after killing a member of the international assassin"s guild, and with a $14 million price tag on his head - he is the target of hit men and women everywhere.', 'Basil Iwanyk'),
(6, 2, 'Spider-Man: Far from Home', 'Following the events of Avengers: Endgame (2019), Spider-Man must step up to take on new threats in a world that has changed forever.', 'Marvel Studios'),
(7, 2, 'Hobbs and Shaw', 'Lawman Luke Hobbs and outcast Deckard shaw form an unlikely alliance when a cyber-genetically enhanced villain threatens the future of humanity.', 'Dwayne Johnson'),
(8, 1, 'John Wick: Chapter 3 - Parabellum', 'Super-assassin John Wick is on the run after killing a member of the international assassin"s guild, and with a $14 million price tag on his head - he is the target of hit men and women everywhere.', 'Basil Iwanyk');
