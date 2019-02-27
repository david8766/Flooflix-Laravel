<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Person;

class Movie extends Model
{

    

    // List of properties that can be set with the create method :
    protected $fillable = ['title','duration','synopsis','price','grade','release_date','link_trailer','link_movie'];


    /**
     * get people as film directors for a movie
     *
     * @return array
    */
    public function getFilmDirectors()  
    {    
        $film_directors = DB::table('movie_person')->select('person_id')->where(['job' => 'film_director','movie_id' => $this->id])->get(); 
        return $film_directors;  
    }

    /**
     * get people actors for a movie
     *
     * @return array
    */
    public function getActors()  
    {    
        $actors = DB::table('movie_person')->select('person_id')->where(['job' => 'actor','movie_id' => $this->id])->get(); 
        return $actors;  
    }

    /**
     * get people as film dierctor and actor for a movie
     *
     * @return array
    */
    public function getFilmDirectorsAndActors()  
    {    
        $actors = DB::table('movie_person')->select('person_id')->where(['job' => 'film_director,actor','movie_id' => $this->id])->get(); 
        return $actors;  
    }

    /**
     * get top 5 movies 
     * 
     * @param array $stats
     * @return array
    */
    static function getTopMovies($stats)  
    {    
        $top_movies = [];
        foreach ($stats as $key => $value) {
            $top_movies[$key] = $value['total_sales'];
        }
        arsort($top_movies);
        $top_movies = array_slice($top_movies,0,5);
        foreach ($top_movies as $key => $value) {
            $top_movies[$key] = Movie::where('title',$key)->first();
        }
        $top_movies = collect(array_values($top_movies));
        return $top_movies;  
    }

    /**
     * get the last five new movies
     * 
     * @return array
    */
    static function getNewMovies()  
    {    
        $new_movies = DB::table('movies')->orderBy('created_at','desc')->limit(5)->get();
        return $new_movies;  
    }

    /**
     * get stats for movies collection
     * @param collection $movies
     * @return array
    */
    static function getStats($movies)  
    {    
        $movies_sales = DB::table('movie_user')->get();
        $stats = [];
        $total_sales = 0;
        foreach ($movies as $movie) {
            $stats[$movie->title]['total_copies'] = 0;
            $stats[$movie->title]['total_sales'] = 0;
            foreach ($movies_sales as $sale) {
                if($sale->movie_id == $movie->id){
                    $stats[$movie->title]['total_copies'] = $stats[$movie->title]['total_copies'] + 1;
                    $stats[$movie->title]['total_sales'] = $stats[$movie->title]['total_sales'] + $sale->price;
                }
            }
        }
        return $stats;  
    }

    /**
     * get the movie with the maximum number of copies sold 
     * @param array $stats
     * @return array
    */
    static function getMovieWithMaxCopiesSold($stats)  
    {    
        $top_copies = [];
        foreach ($stats as $key => $value) {
            if (empty($top_copies)) {
                $top_copies = [$key => $value];
            }else{
                foreach ($top_copies as $key2 => $value2) {
                    if ($top_copies[$key2]['total_copies'] < $value['total_copies']) {
                        $top_copies = [$key => $value];
                    }
                }
            }
        }
        return $top_copies;  
    }

    /**
     * get the movie with the minimum number of copies sold
     * @param array $stats
     * @return array
    */
    static function getMovieWithMinCopiesSold($stats)  
    {    
        $min_copies = [];
        
        return $min_copies;  
    }

    /**
     * get the total number of copies sold for a movie
     * 
     * @return int
    */
    public function getTotalCopiesSold()  
    {    
        $copies = DB::table('movie_user')->select('movie_id')->where(['movie_id' => $this->id])->get(); 
        $total = count($copies);
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
     * A movie belongs to many users.
     * Un film appartient à plusieurs utilisateurs
     * @return void
    */
    public function users()  
    {      
        return $this->belongsToMany(User::class);  
    }

    /**
     * A movie belongs to one category.
     * Un film appartient une catégorie
     * @return void
     */
    public function category()  
    {   
        return $this->belongsTo(Category::class);  
    }

    /**
     * A movie has many pictures
     * Un film possède plusieurs images
     * @return void
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * A movie is made by several people
     * Un film est fabriqué par plusieurs personnes
     * @return void
     */
    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    
}
