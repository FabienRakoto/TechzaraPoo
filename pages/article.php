
<?php

use App\Tables\Articles;
use App\Tables\Categories;
use App\App;

$article = Articles::getById();
$categori = Categories::find($article->category_id);
if ($article === false) {
    header('HTTP/1.0 Not Found');
    header('location:index.php?page=404');
}
    App::setTitle($article->titre);

?>

<h1><?= $article->titre; ?></h1>
<p><em><?= $categori->titre; ?></em></p>
<p><?= $article->contenu; ?></p>