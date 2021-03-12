<?php
require_once 'pdo_ini.php';

$sql = <<<'SQL'
    CREATE TABLE IF NOT EXISTS `users` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `email` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `created_at` DATETIME NOT NULL

    );
SQL;

try{
    $pdo->exec($sql);
    echo "success created table users";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}

$sql = <<<'SQL'
    CREATE TABLE IF NOT EXISTS `lists` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `user_id` INT(10) UNSIGNED NOT NULL,
        `created_at` DATETIME,
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    );
SQL;

try{
    $pdo->exec($sql);
    echo "success created table lists";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}

$sql = <<<'SQL'
    CREATE TABLE IF NOT EXISTS `tasks` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL,
        `user_id` INT(10) UNSIGNED NOT NULL,
        `list_id` INT(10) UNSIGNED NOT NULL,
        `completed` TINYINT(1),
        `position` INT(11),
        `created_at` DATETIME,
        `completed_at` DATETIME,
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
        FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`) ON DELETE CASCADE
    );
SQL;

try{
    $pdo->exec($sql);
    echo "success created table tasks";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}

