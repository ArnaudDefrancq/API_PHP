<?php
function chargerClasse($classe)
{
    if (file_exists("./src/Controllers/" . $classe . ".Class.php"))
        require "./src/Controllers/" . $classe . ".Class.php";
    else if (file_exists("./src/Models/" . $classe . ".Class.php"))
        require "./src/Models/" . $classe . ".Class.php";
    else if (file_exists("./src/Services/" . $classe . ".Class.php"))
        require "./src/Services/" . $classe . ".Class.php";
}
spl_autoload_register('chargerClasse');


// Récupération des données pour pouvoir se connecter
Parametre::getConfig();

// Connexion
DbConnect::init();

$b = new Book([
    "idBook" => 0,
    "title" => "test",
    "author" => "moi",
    "published_year" => 2024,
    "genre" => "oui"
]);


var_dump($b);


BookManager::create("Book", $b);
