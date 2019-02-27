<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{  
    

    // List of properties that can be set with the create method :
    protected $fillable = ['type','number','crytogram','mounth','year'];     

    /*
    |--------------------------------------------------------------------------
    | Statement of relations
    |--------------------------------------------------------------------------
    |
    | These functions are used to declare relationships between tables
    |
    */

    /**
     *  A bank card belongs to a user.
     *  Une carte bancaire appartient à un utilisateur.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
