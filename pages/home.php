    <div class="row">
        <div class="col-sm-8">
        <?php
            use App\Tables\Articles;
use App\Tables\Categories;

?>
            <ul>
                <?php  foreach (Articles::getLast() as $articles): ?>
                    <h3><a href="<?= $articles->url; ?>"><?= $articles->titre; ?></a></h3>
                    <p><?= $articles->content; ?></p>
                    <p><em><?= $articles->categorie; ?></em></p>
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