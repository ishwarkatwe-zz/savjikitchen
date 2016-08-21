ALTER TABLE `users` ADD `access_level` VARCHAR(255) NOT NULL DEFAULT 'member' AFTER `remember_token`;


CREATE TABLE `review` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `contact` varchar(100) DEFAULT NULL,
 `rating` int(10) DEFAULT NULL,
 `feedback` text,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1