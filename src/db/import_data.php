<?php
require_once('pdo_ini.php');
$airports = require_once('airports.php');

echo 'Import is started';
echo PHP_EOL;

foreach($airports as $airport){
    //cities
    $stmt = $pdo->prepare('SELECT `id` FROM `cities` WHERE name= :name' );
    $stmt->setFetchMode(\PDO::FETCH_ASSOC);
    $stmt->bindParam(':name', $airport_name);
    $airport_name = htmlspecialchars(trim($airport['city']));
    try{
        $stmt->execute();
    } catch(PDOException $e){
        die("ERROR: " . $e->getMessage());
    }   

    $city = $stmt->fetch();// якщо одне значення
    
    if(!$city){
        $stmt = $pdo->prepare('INSERT INTO `cities` (`name`) VALUES (:name)');
        $stmt->execute(['name' => $airport['city']]);
        $city_id = $pdo->lastInsertId();
    } else{
        $city_id = $city['id'];
    }

    //states
    $stmt = $pdo->prepare('SELECT `id` FROM `states` WHERE name= :name' );
    $stmt->setFetchMode(\PDO::FETCH_ASSOC);
    $stmt->bindParam(':name', $airport_name);
    $airport_name = htmlspecialchars(trim($airport['state']));

   try{
        $stmt->execute();
    } catch(PDOException $e){
        die("ERROR: " . $e->getMessage());
    }   
    $state = $stmt->fetch();// якщо одне значення
    
    if(!$state){
        $stmt = $pdo->prepare('INSERT INTO `states` (`name`) VALUES (:name)');
        $stmt->execute(['name' => $airport['state']]);
        $state_id = $pdo->lastInsertId();
    } else{
        $state_id = $state['id'];
    }

    //airports
    $stmt = $pdo->prepare('INSERT INTO `airports` (name,code,city_id,state_id,address,timezone) VALUES (:name,:code,:city_id,:state_id,:address,:timezone)');
    
    try{
        $stmt->execute(
            [
            'name' => $airport['name'],
            'code' => $airport['code'],
            'city_id' => $city_id,
            'state_id' => $state_id,
            'address' => $airport['address'],
            'timezone' => $airport['timezone']
            ]
        );

        echo 'SUCCESS: '. $airport['name'];
        echo PHP_EOL;
    } catch(PDOException $e){
        die("ERROR: " . $e->getMessage());
    }   
   
   
}