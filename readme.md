#Explication de toutes les classe et leur fonctionnement
    __DIR__ : App => Classe : App 
        -const DB_NAME,-const DB_HOST,-const DB_USER,-const DB_PASSWORD, private static database, private static title
        function static getDatabase() avec singleton et retour
        function static notfound() fonction qui retour not found lors d'une foutu echec
        function static getDatabase()
        function static getTitle()

                => classe : Config
        private settings, private static _instance
        getInstance() -> singleton de la classe Config
        constructeur : qui appele la configuration de l'application

                => classe :  Database
        private $db_name;private $db_host;private $db_user;private $db_password;private $pdo;
        getPDO()-> singleton qui initialise la connexion a la base
        query()

        __DIR__ Table => classe : Article 
            getLast() requette pour afficher toutes les articles
            findByCategories() requette qui qffiche toutes les articles par categorie
            getById() requette qui affiche une seule article
            getURL()
            getContent()

                Classe => Categorie
            getURL()

                Classe => Table
            protected static $table;
            private static function getTable() recuperation du nom du table
            public static function all() requette d'affichage
            public static function query($statement, $attributes = null, $one = false) requette de preparation
            public static function find($id) requette qvec critaire
            public function __get($key) fonction magique

            

        
        