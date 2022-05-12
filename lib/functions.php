<?php
// function to establish connection
function get_connection()
{
    $config = require 'config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass'] 
    ); // database and table(pets) on local machine must be running

    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
}

function get_pets($limit = null)
{    
    $pdo = get_connection();

    $query = 'SELECT * FROM pets';
    if ($limit) { 
        $query = $query .' LIMIT :resultLimit';
    }
    
    $statement = $pdo->prepare($query);

    if ($limit) { 
        $statement->bindParam('resultLimit', $limit, PDO::PARAM_INT); 
    }

    $statement->execute();
    $pets = $statement->fetchAll();

    return $pets;
}

function get_pet($id)
{    
    $pdo = get_connection();

    $query = 'SELECT * FROM pets WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function save_pets($petsToSave)
{
    $json = json_encode($petsToSave, JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $json);
}
