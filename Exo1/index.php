<?php
function chargerClasse($classe)
{
    if (file_exists("./src/Controllers/" . $classe . ".Class.php"))
        require "./src/Controllers/" . $classe . ".Class.php";
    else if (file_exists("./src/Models/" . $classe . ".Class.php"))
        require "./src/Models/" . $classe . ".Class.php";
}
spl_autoload_register('chargerClasse');

// Récupération des données pour pouvoir se connecter
Parametre::getConfig();

// Connexion
DbConnect::init();

// Test création d'un objet en bdd
$b = new Book([
    "_title" => "test",
    "_author" => "arnaud",
    "_published_year" => 2024,
    "_genre" => "moi"
]);
var_dump($b);

BookManager::create($b);
