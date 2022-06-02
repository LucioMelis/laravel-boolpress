<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    // Funzione per la relazione con la tabella Category (molti post hanno una categoria)
    public function category(){
        return $this->belongsTo('App\Category');
    }

    protected $fillable = ['title', 'content', 'slug'];

    public static function convertToSlug($title)
    {
        $slugPrefix = Str::slug($title);
        $slug = $slugPrefix;
        $postFound = Post::where('slug', $slug)->first();
        $counter = 1;

        while ($postFound) {
            $slug = $slugPrefix . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
