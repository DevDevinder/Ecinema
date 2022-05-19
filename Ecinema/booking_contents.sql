
--
-- Table structure for table `booking_contents`
--

CREATE TABLE IF NOT EXISTS `booking_contents` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `mov_price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`content_id`)
) 