<?php

namespace App\Tables;

use App\App;

class Categories extends TableModele
{
    public function getURL()
    {
        return 'index.php?page=categorie&id='.$this->id;
    }
}
