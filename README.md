Ceci est une API que j'ai réalisé en PHP afin de m'exercer. L'objectif était de faire un API avec le modèle MVC et qu'elle soit le plus dynamique possible.
Version V1:
Avant de tester ces routes, il faut d'abord lancer un serveur:
  - cd api
  - php -S localhost:8000 -d display_errors=1

Le script SQL de la base est dans le fichier SQL et comporte 3 entitées. C'est une base de donnée MySQL.

Les différentes routes disponibles sont les suivantes : 

Pour la table Clients: 
  -  GET: http://localhost:8000/api/clients
  -  GET: http://localhost:8000/api/clients/:id
  -  POST: http://localhost:8000/api/clients/create
  -  PUT: http://localhost:8000/api/clients/update/:id
  -  DELETE: http://localhost:8000/api/clients/delete/:id
    
Pour la table Produits:
  - GET: http://localhost:8000/api/produits
  - GET: http://localhost:8000/api/produits/:id
  - POST: http://localhost:8000/api/produits/create
  - PUT: http://localhost:8000/api/produits/update/:id
  - DELETE: http://localhost:8000/api/produits/delete/:id


Pour la table Commandes:
  - GET: http://localhost:8000/api/commandes
  - GET: http://localhost:8000/api/commandes/:id
  - POST: http://localhost:8000/api/commandes/create
  - PUT: http://localhost:8000/api/commandes/update/:id
  - DELETE: http://localhost:8000/api/commandes/delete/:id
