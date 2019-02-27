<?php

namespace App;
use App\Picture;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['genre'];
    
    /**
     * Inserting website if the database is empty
     * 
     * @return string
     */
    static function generateCategories()
    {
        $category = Category::find(1);
        if(is_null($category))
        {
            $category1 = category::create(['genre'=>'Action']);
            $category2 = category::create(['genre'=>'Aventure']);
            $category3 = category::create(['genre'=>'Comédie']);
            $category4 = category::create(['genre'=>'Science-Fiction']);
            $category5 = category::create(['genre'=>'Fantastique']);
            $category6 = category::create(['genre'=>'Animation']);
           
            return 'Les catégories de films ont été ajoutés dans la base de données.';
        }
        else 
        {
            return '';
        }   
    }

    /**
     * associate ressources to pages
     * 
     * @return string
     */
    static function attachPicturesToCategories()
    {
        $category1 = Category::find(1);
        $category2 = Category::find(2);
        $category3 = Category::find(3);
        $category4 = Category::find(4);
        $category5 = Category::find(5);
        $category6 = Category::find(6);
        
        if(!is_null($category1) && !is_null($category2) && !is_null($category3) && !is_null($category4) && !is_null($category5) && !is_null($category6) && is_null($category1->picture_id) && is_null($category2->picture_id) && is_null($category3->picture_id) && is_null($category4->picture_id) && is_null($category5->picture_id) && is_null($category6->picture_id))
        {
            $picture1 = Picture::where('name','action')->first();
            $picture2 = Picture::where('name','aventure')->first();
            $picture3 = Picture::where('name','comedie')->first();
            $picture4 = Picture::where('name','science')->first();
            $picture5 = Picture::where('name','fantastique')->first();
            $picture6 = Picture::where('name','animation')->first();
            $category1->picture_id = $picture1->id;
            $category1->save();
            $category2->picture_id = $picture2->id;
            $category2->save();
            $category3->picture_id = $picture3->id;
            $category3->save();
            $category4->picture_id = $picture4->id;
            $category4->save();
            $category5->picture_id = $picture5->id;
            $category5->save();
            $category6->picture_id = $picture6->id;
            $category6->save();
            return 'Les images ont bien été associées aux catégories.';
        }
        else 
        {
            return "erreur lors de l'association des images aux catégories";
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
     *  A category has one or many movies.
     *  Une catégorie possède un ou plusieurs films.
     * 
     * @return void
     */
    public function movies()  
    {  
        return $this->hasMany(Movie::class);  
    }

    /**
     * A category has many pictures
     * Une categorie possède plusieurs images
     * @return void
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

}
