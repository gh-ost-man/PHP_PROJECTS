<?php
require_once('pdo_ini.php');

//$airports = require_once('airports.php');

$sql = <<<'SQL'
    CREATE TABLE IF NOT EXISTS `cities` (
        `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(255) NOT NULL
    );
SQL;

try{
    $pdo->exec($sql);
    echo "success";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}
$sql = <<<'SQL'
CREATE TABLE IF NOT EXISTS `states` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
SQL;
try{
    $pdo->exec($sql);
    echo "success";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}

$sql = <<<'SQL'
CREATE TABLE IF NOT EXISTS `airports` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `city_id` INT(10) UNSIGNED NOT NULL,
    `state_id` INT (10) UNSIGNED NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `timezone` VARCHAR(255) NOT NULL,
    FOREIGN KEY(`city_id`) REFERENCES `cities` (`id`),
    FOREIGN KEY(`state_id`) REFERENCES `states` (`id`)
);
SQL;
try{
    $pdo->exec($sql);
    echo "success";
    echo PHP_EOL;
} catch(PDOException $e) {
    die("Error " . $e->getMessage());
}