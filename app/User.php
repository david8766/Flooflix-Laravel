<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{   
    use Notifiable;
    // List of properties that can be set with the create method :
    protected $fillable = ['last_name','first_name','email','login','password','credits'];

    /**
     * Inserting roles if the database is empty
     * 
     * @return string
     */
    static function generateUsers()
    {
        $user = User::find(1);
        if(is_null($user))
        {
            $user1 = user::create(['last_name'=>'dev','first_name'=>'dev','email'=>'admin@mail.com','login'=>'admin','password'=>bcrypt('admin')]);
            $role1 = Role::where('role', 'admin')->first();
            // Assign the role of administrator
            $role1->users()->save($user1);

            $user2 = user::create(['last_name'=>'owner','first_name'=>'owner','email'=>'owner@mail.com','login'=>'owner','password'=>bcrypt('owner')]);
            $role2 = Role::where('role', 'owner')->first();
            // Assign the role of owner
            $role2->users()->save($user2);

            $user3 = user::create(['last_name'=>'Member','first_name'=>'Member','email'=>'member@mail.com','login'=>'member','password'=>bcrypt('member')]);
            $role3 = Role::where('role', 'member')->first();
            // Assign the role of member
            $role3->users()->save($user3);

            return 'Les utilisateurs : ' . $user1->login . ', ' . $user2->login . ', ' . $user3->login . ' ont été ajoutés dans la base de données.';
        }
        else 
        {
            return '';
        }   
    }

    /**
     * Get total sales
     * 
     * @return mixed
     */
    public function getTotalSales()
    {
        $total =  DB::table('movie_user')->selectRaw('SUM(price) as total')->where('user_id',$this->id)->first();
        if (is_null($total->total)) {
            $total = 0;
        } else {
            $total = $total->total;
        }
        return $total;
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
     * A user has one role.
     * Un utilisateur a un role
     * @return void
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    /**
     *  A user has one or many websites
     *  Un utilisateur possède un ou plusieurs sites
     * @return void
     */
    public function websites()  
    {  
        return $this->belongsToMany(Website::class); 
    }
    
    /**
     * A user has many bank cards
     * Un utilisateur possède plusieurs cartes bancaires
     * @return void
     */
    public function bank_card()
    {
        return $this->hasMany(BankCard::class);
    }

    /**
     * A user has one or many movies
     * Un utilisateur possède un ou plusieurs films
     * @return void
     */
    public function movies()  
    {  
        return $this->belongsToMany(Movie::class); 
    }
    
}
