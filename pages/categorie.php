<?php

use App\Tables\Categories;
use App\Tables\Articles;
use App\App;

$categorie = Categories::find($_GET['id']);
    if ($categorie === false) {
        App::notFound();
    }

$articless = Articles::findByCategorie($_GET['id']);
$categoriess = Categories::all();
?>

<div class="row">
        <div class="col-sm-8">
            <ul>
            <h1><?= $categorie->titre; ?></h1>
                <?php  foreach ($articless as $articles): ?>
                    <h3><a href="<?= $articles->url; ?>"><?= $articles->titre; ?></a></h3>
                    <p><?= $articles->content; ?></p>
            <?php endforeach; ?>
            </ul>
        </div>
        <hr>
        <div class="col-sm-4">
            <ul>
                <?php foreach (Categories::all() as $categories): ?>
                          <li><a href="<?= $categories->url; ?>"> <?= $categories->titre; ?> </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

