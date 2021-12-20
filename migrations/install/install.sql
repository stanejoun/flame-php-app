/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`
(
	`id`                 INT(11)      NOT NULL AUTO_INCREMENT,
	`uid`                VARCHAR(255) NOT NULL UNIQUE,
	`first_name`         VARCHAR(255) DEFAULT NULL,
	`last_name`          VARCHAR(255) DEFAULT NULL,
	`email`              VARCHAR(255) NOT NULL UNIQUE,
	`username`           VARCHAR(255) DEFAULT NULL UNIQUE,
	`password`           TINYTEXT     DEFAULT NULL,
	`login_attempts`     TINYINT      DEFAULT 0,
	`picture_id`         INT(11)      DEFAULT NULL,
	`salt`               VARCHAR(255) NOT NULL UNIQUE,
	`civility`           VARCHAR(255) DEFAULT NULL,
	`birth_date`         VARCHAR(255) DEFAULT NULL,
	`address`            TINYTEXT     DEFAULT NULL,
	`additional_address` TINYTEXT     DEFAULT NULL,
	`postal_code`        VARCHAR(255) DEFAULT NULL,
	`city`               VARCHAR(255) DEFAULT NULL,
	`country`            VARCHAR(255) DEFAULT NULL,
	`phone`              VARCHAR(255) DEFAULT NULL,
	`lang`               VARCHAR(255) DEFAULT NULL,
	`trusted`            TINYINT      DEFAULT 0,
	`roles`              JSON         NOT NULL,
	`created_at`         DATETIME     NOT NULL,
	`updated_at`         DATETIME     DEFAULT NULL,
	`deleted_at`         DATETIME     DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `user_uid` (`uid`),
	KEY `user_username` (`username`),
	KEY `user_email` (`email`),
	KEY `user_phone` (`phone`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS `refresh_token`;
CREATE TABLE `refresh_token`
(
	`id`          INT(11)      NOT NULL AUTO_INCREMENT,
	`user_id`     INT(11)      NOT NULL,
	`token`       VARCHAR(255) NOT NULL,
	`fingerprint` VARCHAR(255) NOT NULL,
	`expired_at`  INT(11)      NOT NULL,
	PRIMARY KEY (`id`),
	KEY `refresh_token_token` (`token`),
	CONSTRAINT `fk_refresh_token_user_id_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS `file`;
CREATE TABLE `file`
(
	`id`                         INT(11)      NOT NULL AUTO_INCREMENT,
	`uid`                        VARCHAR(255) NOT NULL,
	`name`                       VARCHAR(255) NOT NULL,
	`path`                       VARCHAR(255) NOT NULL,
	`filename`                   VARCHAR(255) NOT NULL,
	`extension`                  VARCHAR(255) NOT NULL,
	`mime_type`                  VARCHAR(255) NOT NULL,
	`flag`                       VARCHAR(255) DEFAULT NULL,
	`file_size`                  INT(11)      NOT NULL,
	`thumbnail`                  VARCHAR(255) DEFAULT NULL,
	`is_public`                  TINYINT(1)   DEFAULT 0,
	`is_downloadable`            TINYINT(1)   DEFAULT 0,
	`is_downloadable_once`       TINYINT(1)   DEFAULT 0,
	`restrict_to_connected_user` TINYINT(1)   DEFAULT 1,
	`restrict_to_user_id`        INT(11)      DEFAULT NULL,
	`access_permissions`         VARCHAR(255) NOT NULL,
	`metadata`                   JSON         DEFAULT NULL,
	`created_at`                 DATETIME     NOT NULL,
	`updated_at`                 DATETIME     DEFAULT NULL,
	`expired_at`                 DATETIME     DEFAULT NULL,
	PRIMARY KEY (`id`),
	KEY `file_uid` (`uid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;