<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['name','link','style'];

    /**
     * Inserting fonts to if the database is empty
     * 
     * @return string
     */
    static function generateFonts()
    {
        $font = Font::find(1);
        if(is_null($font))
        {
            $font1 = Font::create(['name'=>'Alfa Slab One', 'link' => 'https://fonts.googleapis.com/css?family=Alfa+Slab+One','style' => 'Alfa Slab One']);
            $font2 = Font::create(['name'=>'Anton', 'link' => 'https://fonts.googleapis.com/css?family=Anton','style' => 'Anton']); 
            return 'Les polices : ' . $font1->name . 'et ' . $font2->name . ' ont été ajoutés dans la base de données.';
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
     * A font belongs to one or many pages.
     * Une police appartient à une ou plusieurs pages.
     * @return void
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }
    
}
