
--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`booking_id`)
) 
