<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Website;
use App\Page;

class Text extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['title','text'];

    /**
     * Inserting texts if the database is empty
     * 
     * @return string
     */
    static function generateTexts()
    {
        $text = Text::find(1);
        if(is_null($text))
        {
            $text1 = Text::create(['title'=>'titre', 'text' => 'FLOOFLIX']);
            $text2 = Text::create(['title'=>"descriptif", 'text' => 'Le cinéma à potée de clic']);
            $text3 = Text::create(['title'=>"accroche", 'text' => 'Un site 100% légal pour les collectionneurs du 7ème art']); 
            $text4 = Text::create(['title'=>"top", 'text' => 'Le top des films']); 
            $text5 = Text::create(['title'=>"nouveautes", 'text' => 'Les dernières nouveautés']); 
            $website = Website::where('name', 'flooflix')->first();
            $pages = Page::where('website_id', $website->id)->get();
            foreach ($pages as $page) {
                if($page->name == 'accueil'){
                    $text1->page_id = $page->id;
                    $text1->save();
                    $text2->page_id = $page->id;
                    $text2->save();
                    $text3->page_id = $page->id;
                    $text3->save();
                    $text4->page_id = $page->id;
                    $text4->save();
                    $text5->page_id = $page->id;
                    $text5->save();
                }
            }
            return 'Les textes ont été ajoutés dans la base de données.';
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
     * A text belongs to a page
     * Un texte appartient à une page
     * @return void
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}


