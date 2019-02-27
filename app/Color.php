<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['name','rgb','opacity'];

    /**
     * Inserting fonts to if the database is empty
     * 
     * @return string
     */
    static function generateColors()
    {
        $color = Color::find(1);
        if(is_null($color))
        {
            $color1 = Color::create(['name'=>'azure', 'rgb' => 'rgb(240, 255, 255)', 'opacity' => '1']);
            $color2 = Color::create(['name'=>'black', 'rgb' => 'rgb(0,0,0)', 'opacity' => '1']);
            $color3 = Color::create(['name'=>'crimson', 'rgb' => 'rgb(220,20,60)', 'opacity' => '1']); 
            $color4 = Color::create(['name'=>'coral', 'rgb' => 'rgb(255,127,80)', 'opacity' => '1']); 
            $color5 = Color::create(['name'=>'red', 'rgb' => 'rgb(255,0,0)','opacity' => '1']); 
            $color6 = Color::create(['name'=>'orange', 'rgb' => 'rgb(255,165,0)', 'opacity' => '1']); 
            $color7 = Color::create(['name'=>'blue', 'rgb' => 'rgb(0,0,255)', 'opacity' => '1']); 
            $color8 = Color::create(['name'=>'green','rgb' =>  'rgb(0,128,0)', 'opacity' => '1']);
            $color9 = Color::create(['name'=>'white', 'rgb' => 'rgb(255,255,255)', 'opacity' => '1']); 
            return 'Les couleurs ont été ajoutés dans la base de données.';
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
    * A color belongs to one or many pages.
    * Une couleur appartient à une ou plusieurs pages.
    * @return void
    */
    public function pages()
    {    
        return $this->belongsToMany(Page::class);
    }


}
