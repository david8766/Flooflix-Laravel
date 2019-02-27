<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // List of properties that can be set with the create method :
    protected $fillable = ['role'];

    /**
     * Inserting roles if the database is empty
     * 
     * @return string
     */
    static function generateRoles()
    {
        $role = Role::find(1);
        //dd($role);
        if(is_null($role))
        {
            $role1 = Role::create(['role'=>'admin']);
            $role2 = Role::create(['role'=>'owner']);
            $role3 = Role::create(['role'=>'customer']);
            $role4 = Role::create(['role'=>'member']);
            return 'Les roles : ' . $role1->role . ', ' . $role2->role . ', ' . $role3->role . ', ' .  $role4->role . ' ont été ajoutés dans la base de données.';
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
     * A role has many users
     * Un role a plusieurs utilisateurs
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
