<?php

namespace App\Tables;

use App\App;

class Articles extends TableModele
{
    public static function getLast()
    {
        return self::query('SELECT articles.id, articles.titre, articles.date, articles.contenu, categories.titre as categorie
        FROM articles  LEFT JOIN categories 
        ON category_id = categories.id');
    }

    public static function findByCategorie($categorie_id)
    {
        return self::query('SELECT articles.id, articles.titre, articles.date, articles.contenu, categories.titre as categorie
        FROM articles  LEFT JOIN categories 
        ON category_id = categories.id WHERE category_id = ? ', [$categorie_id]);
    }

    public static function getById()
    {
        return App::getDatabase()->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], __CLASS__, true);
    }

    public function getURL()
    {
        return 'index.php?page=article&id='.$this->id;
    }

    public function getContent()
    {
        $html = '<p>'.substr($this->contenu, 0, 700).' ...</p>';
        $html .= '<p><a href="'.$this->getURL().'">Voir la suite</a></p>';

        return $html;
    }
}
