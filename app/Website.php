<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['name','url'];
    
    /**
     * Inserting website if the database is empty
     * 
     * @return string
     */
    static function generateWebsite()
    {
        $website = Website::find(1);
        if(is_null($website))
        {
            $website = Website::create(['name'=>'flooflix', 'url' => 'http://127.0.0.1:8000']);
           
            return 'Le site : ' . $website->name . 'et son url : ' . $website->url . ' ont été ajoutés dans la base de données.';
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
     * A website belongs to one or many users.
     * Un site web appartient à un ou plusieurs utilisateurs
     * @return void
     */
    public function users()  
    {   
        return $this->belongsToMany(User::class);  
    }

    /**
     * A website has many pages.
     * Un site web a plusieurs pages.
     * @return void
     */
    public function pages()  
    {   
        return $this->hasMany(Page::class);  
    }
}
