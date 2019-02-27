<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Website;
use App\Role;
use App\User;
use App\Text;
use App\Font;
use App\Color;
use App\Picture;
use JavaScript;

class Page extends Model
{
    /**
     * The website to which the page belongs
     *
     * @var integer
     */
    private $website;

    // List of properties that can be set with the create method :
    protected $fillable = ['name','url'];


    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    |
    | 
    |
    */

    /**
     * Inserting pages to 'flooflix' website if the database is empty
     * 
     * @return string
     */
    static function generatePages()
    {
        $page = Page::find(1);
        if(is_null($page))
        {
            $website = Website::where('name', 'flooflix')->first();
            $page1 = Page::create(['name'=>'accueil', 'url' => 'http://127.0.0.1:8000']);
            $page1->website_id = $website->id;
            $page1->save();
            $page2 = Page::create(['name'=>'connexion', 'url' => 'http://127.0.0.1:8000/Connexion']);
            $page2->website_id = $website->id;
            $page2->save();
            $page3 = Page::create(['name'=>'inscription', 'url' => 'http://127.0.0.1:8000/Inscription']);
            $page3->website_id = $website->id;
            $page3->save();
            $page4 = Page::create(['name'=>'categories', 'url' => 'http://127.0.0.1:8000/LesCatégories']);
            $page4->website_id = $website->id;
            $page4->save();
            return 'Les pages ont été ajoutés dans la base de données.';
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
    static function attachResourcesToPages()
    {
        $page1 = Page::find(1);
        $page2 = Page::find(2);
        $page3 = Page::find(3);
        $page4 = Page::find(4);
        if(!is_null($page1) && !is_null($page2) && !is_null($page3) && !is_null($page4) && $page1 !== '' && $page2 !== '' && $page3 !== "" && $page4 !== "")
        {
            if(is_null($page1->fonts)){
                $alfa = Font::where('name','Alfa Slab One')->first();
                $azure = Color::where('name','azure')->first();
                $white = Color::where('name','white')->first();
                $coral = Color::where('name','coral')->first();
                $black = Color::where('name','black')->first();
                $logo = Picture::where('name','logoflooflix')->first();
                $page1->fonts()->attach($alfa->id);
                $page1->colors()->attach($azure->id);
                $page1->colors()->attach($coral->id);
                $page1->colors()->attach($black->id);
                $page1->pictures()->attach($logo->id);
                $page2->fonts()->attach($alfa->id);
                $page2->colors()->attach($white->id);
                $page2->colors()->attach($coral->id);
                $page2->colors()->attach($black->id);
                $page3->fonts()->attach($alfa->id);
                $page3->colors()->attach($white->id);
                $page3->colors()->attach($coral->id);
                $page3->colors()->attach($black->id);
                $page4->fonts()->attach($alfa->id);
                $page4->colors()->attach($azure->id);
                $page4->colors()->attach($coral->id);
                $page4->colors()->attach($black->id);
                return 'Les ressources ont bien été associées aux pages.';
            }else{
                return "";
            }
        }
        else 
        {
            return "erreur lors de l'association des resources aux pages.";
        } 
    }

     /**
     * recover the resources of a page
     *
     * @return  array
     */ 
    public function getResourcesToDisplayPage()
    {
        $fonts = $this->fonts;
        //dump($fonts);
        /* $Nfonts = [];
        foreach ($fonts as $key => $font) {
            $key = camel_case(str_replace(' ','',$font->name));
            $Nfonts += [$key => $font];
        } */
        //$fonts = $Nfonts;
        $colors = $this->colors;
        /* //dump($colors);
        $Ncolors = [];
        foreach ($colors as $key => $color) {
            $key = camel_case(str_replace(' ','',$color->name));
            $Ncolors += [$key => $color];
        } */
        //$colors = $Ncolors;
        $texts = $this->texts;
        //dump($texts);
        /* $Ntexts = [];
        foreach ($texts as $key => $text) {
            $key = camel_case(str_replace(' ','',$text->title));
            $Ntexts += [$key => $text];
        } */
        //$texts = $Ntexts;
        $pictures = $this->pictures;
        //dump($pictures);
        /* $Npictures = [];
        foreach ($pictures as $key => $picture) {
            $key = camel_case(str_replace(' ','',$picture->name));
            $Npictures += [$key => $picture];
        } */
        //$pictures = $Npictures;
        JavaScript::put([
            'fonts' => $fonts,
            'colors' => $colors,
            'pictures' => $pictures,
            'texts' => $texts
        ]);

        $datas = collect(['fonts' => $fonts,'colors' => $colors,'texts' => $texts,'pictures' => $pictures]);
        //dd($datas);
        return $datas;
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
     * A page belongs to a website.
     * Une page appartient à un site web.
     * @return void
     */
    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    /**
     * A page has one or many fonts.
     * Une page peut avoir une ou plusieurs polices.
     * @return void
     */
    public function fonts()
    {
        return $this->belongsToMany(Font::class);
    }

    /**
     * A page has one or many colors.
     * Une page peut avoir une ou plusieurs couleurs.
     * @return void
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /**
     * A page has one or many texts.
     * Une page peut avoir un ou plusieurs textes. 
     * @return void
     */
    public function texts()  
    {   
        return $this->hasMany(Text::class);  
    }

    /**
     * A page has one or many pictures.
     * Une page peut avoir une ou plusieurs images.
     * @return void
     */
    public function pictures()  
    {  
        return $this->belongsToMany(Picture::class);  
    }

    /*
    |--------------------------------------------------------------------------
    | Setters and guetters
    |--------------------------------------------------------------------------
    |
    | These functions are used to set and get proporties
    |
    */

    /**
     * Get the website to which the page belongs
     *
     * @return  integer
     */ 
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set the website to which the page belongs
     *
     * @param  integer  $website  The website to which the page belongs
     *
     * @return  self
     */ 
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }
}
