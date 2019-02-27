<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

    // List of properties that can be set with the create method :
    protected $fillable = ['name','link','style'];
    
    /**
     * Inserting fonts to if the database is empty
     * 
     * @return string
     */
    static function generatePictures()
    {
        $picture = Picture::find(1);
        if(is_null($picture))
        {
            $picture1 = Picture::create(['name'=>'action', 'link' => 'public/images/action.png', 'style' => 'storage/images/action.png']); 
            $picture2 = Picture::create(['name'=>'aventure', 'link' => 'public/images/aventure.png', 'style' => 'storage/images/aventure.png']); 
            $picture3 = Picture::create(['name'=>'comedie', 'link' => 'public/images/comedie.png', 'style' => 'storage/images/comedie.png']);
            $picture4 = Picture::create(['name'=>'science', 'link' => 'public/images/science.png', 'style' => 'storage/images/science.png']); 
            $picture5 = Picture::create(['name'=>'fantastique', 'link' => 'public/images/fantastique.png', 'style' => 'storage/images/fantastique.png']);
            $picture6 = Picture::create(['name'=>'animation', 'link' => 'public/images/animation.png', 'style' => 'storage/images/animation.png']); 
            $picture7 = Picture::create(['name'=>'logoflooflix', 'link' => 'public/images/logoflooflix.png', 'style' => 'storage/images/logoflooflix.png']); 
            
            return 'Les images ont été ajoutés dans la base de données.';
        }
        else 
        {
            return '';
        }   
    }

    /*
    |--------------------------------------------------------------------------
    | Statement of relations
    |--------------------------------------------------------------------------
    |
    | These functions are used to declare relationships between tables
    |
    */


    /**
     * An picture belongs to one or many pages.
     * Une image appartient à une ou plusieurs pages.
     * @return void
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    /**
     * An picture belongs to one movie.
     * Une image appartient à un film.
     * @return void
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    
    /**
     * An picture belongs to one category.
     * Une image appartient à une catégorie.
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
