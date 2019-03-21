<?php

require '../vendor/autoload.php';
use App\Database;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
    //Database initializing

 ob_start();

    if ($page === 'home') {
        require '../pages/home.php';
    } elseif ($page === 'article') {
        require '../pages/article.php';
    } elseif ($page === 'categorie') {
        require '../pages/categorie.php';
    }

    $content = ob_get_clean();
    require '../pages/templates/default.php';
