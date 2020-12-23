<?php

function getDbConnection()
{
    try {
        $connectionString = 'mysql:host=localhost;dbname=awesomugs;charset=utf8';
        $username = 'root';
        $password = '';
        $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
        return new PDO($connectionString, $username, $password, $options);
    } catch (Exception $e) {
        die('<strong>Erreur lors la connexion à la base de données :</strong> ' . $e->getMessage());
    }
}
