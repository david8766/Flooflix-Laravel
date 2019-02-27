<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['last_name','first_name'];
    
    /*
    |--------------------------------------------------------------------------
    | Statement of relations
    |--------------------------------------------------------------------------
    |
    | These functions are used to declare relationships between tables
    |
    */

    /**
     * A person works on several movies
     * Une personne travvaille sur plusieurs films
     * @return void
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
