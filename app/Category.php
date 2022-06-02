<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    // Funzione per la relazione con la tabella Post(una categoria ha molti post) One to Many
    public function posts(){
        return $this->hasMany('App\Post');

    }
}
