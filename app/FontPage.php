<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FontPage extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Definition of attributes
    |--------------------------------------------------------------------------
    |
    */

    /**
     * page
     *
     * @var integer
     */
    private $page;

    /**
     * page
     *
     * @var integer
     */
    private $font;

    /**
     * page
     *
     * @var datetime
     */
    private $timestamp;



    /*
    |--------------------------------------------------------------------------
    | Construst method
    |--------------------------------------------------------------------------
    | Classes that have a constructor method call this method whenever a new instance of the object is created,
    | which is good for all the boots that the object needs before being used.
    |
    */

    public function __construct($page , $font){
        $this->page = $page;
        $this->font = $font;
        $this->timestamp = time();
    }

    
    /*
    |--------------------------------------------------------------------------
    | Destrust method
    |--------------------------------------------------------------------------
    |
    */

    public function __destruct(){
        echo "L'association de cette police à cette page a été supprimée";
    } 

    /*
    |--------------------------------------------------------------------------
    | Setters and guetters
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get page
     *
     * @return  integer
     */ 
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set page
     *
     * @param  integer  $page  page
     *
     * @return  self
     */ 
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return  integer
     */ 
    public function getFont()
    {
        return $this->font;
    }

    /**
     * Set page
     *
     * @param  integer  $font  page
     *
     * @return  self
     */ 
    public function setFont($font)
    {
        $this->font = $font;

        return $this;
    }
}