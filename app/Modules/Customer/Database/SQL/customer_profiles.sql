CREATE TABLE `customer_profiles` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NOT NULL UNIQUE,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `address` VARCHAR(255) DEFAULT NULL,
    `city` VARCHAR(100) DEFAULT NULL,
    `postal_code` VARCHAR(20) DEFAULT NULL,
    `country` VARCHAR(100) DEFAULT NULL,
    `preferences` JSON DEFAULT NULL,
    `is_complete` BOOLEAN NOT NULL DEFAULT FALSE,
    `created_at` DATETIME DEFAULT NULL,
    `updated_at` DATETIME DEFAULT NULL,
    `deleted_at` DATETIME DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `customer_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;