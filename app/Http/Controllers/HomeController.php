<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\Contact;
use App\Role;
use App\User;
use App\Website;
use App\Page;
use App\Text;
use App\Font;
use App\Color;
use App\Picture;
use App\Category;
use App\Movie;
use JavaScript;

class HomeController extends Controller
{
    /**
     * Displays view the website's homepage flooflix
     *
     * @return view
     */
    public function flooflix()
    {   
        $result = Role::generateRoles();
        $result .= User::generateUsers();
        $result .= Website::generateWebsite();
        $result .= Page::generatePages();
        $result .= Text::generateTexts();
        $result .= Font::generateFonts();
        $result .= Color::generateColors();
        $result .= Picture::generatePictures();
        $result .= Page::attachResourcesToPages();
        $result .= Category::generateCategories();
        $result .= Category::attachPicturesToCategories();

        // get resources for display home page
        $website = Website::where('name','flooflix')->first();
        if (!is_null($website) && !empty($website)) {
            $page = Page::where('website_id', $website->id)->where('name','accueil')->first();
            if(!is_null($page) && !empty($page)){
                $datas = $page->getResourcesToDisplayPage($page);
            }    
        }else{
            return view('errors.404');
        }
        $movies = Movie::all();
        if (!is_null($movies) && !empty($movies)) {
            $movies_stats = Movie::getStats($movies);
            $top_movies = Movie::getTopMovies($movies_stats);
            $new_movies = Movie::getNewMovies();
        }else{
            $top_movies = [];
            $new_movies = [];
        }
        $pictures = Picture::all();
        
        return view('Flooflix.home',compact('top_movies','new_movies','pictures'));
    }

    /**
     * Displays view of terms of use for the website's flooflix
     *
     * @return view
     */
    public function showTermsOfUse()
    {   
        return view('Flooflix.termsOfUse');
    }

    /**
     * Displays view of terms of sales for the website's flooflix
     *
     * @return view
     */
    public function showTermsOfSales()
    {   
        return view('Flooflix.termsOfSales');
    }

    /**
     * Displays view of privacy policy for the website's flooflix
     *
     * @return view
     */
    public function showPrivacyPolicy()
    {   
        return view('Flooflix.privacyPolicy');
    }

    /**
     * Displays view of legal notice for the website's flooflix
     *
     * @return view
     */
    public function showLegalNotice()
    {   
        return view('Flooflix.legalNotice');
    }

    /**
     * Displays view of cookies for the website's flooflix
     *
     * @return view
     */
    public function showCookies()
    {   
        return view('Flooflix.cookies');
    }

    /**
     * Displays view of contact for the website's flooflix
     *
     * @return view
     */
    public function showContact()
    {   
        return view('Flooflix.contact');
    }

    /**
     * Displays view of contact for the website's flooflix
     *
     * @param \Illuminate\Http\Request $request
     * @return view
     */
    public function sendMessage(Request $request)
    {   
        // Validate the fields
        request()->validate([
            'subject' => ['required','string'],
            'message' => ['required','string'],
            'last_name' => ['required','string'],
            'first_name' => ['required','string'],
            'email' => ['required','email'],
            ]);
        
        // Get datetime
        $date = now()->format('Y-m-d H:i:s');

        // Test requests
        if(!is_null($request->subject) && !empty($request->subject) && is_string($request->subject)){
            $subject = $request->subject;
        }else{
            return back()->with('messageError',"Le contenu textuel du sujet de votre message n'est pas valide.");
        }
        if(!is_null($request->message) && !empty($request->message) && is_string($request->message)){
            $message = $request->message;
        }else{
            return back()->with('messageError',"Le contenu textuel de votre message n'est pas valide.");
        }
        if(!is_null($request->last_name) && !empty($request->last_name) && is_string($request->last_name)){
            $last_name = $request->last_name;
        }else{
            return back()->with('messageError',"Le contenu textuel de votre nom n'est pas valide.");
        }
        if(!is_null($request->first_name) && !empty($request->first_name) && is_string($request->first_name)){
            $first_name = $request->first_name;
        }else{
            return back()->with('messageError',"Le contenu textuel de votre prénom n'est pas valide.");
        }
        if(!is_null($request->email) && !empty($request->email) && is_string($request->email)){
            $email = $request->email;
        }else{
            return back()->with('messageError',"Le contenu textuel de votre email n'est pas valide.");
        }

        // send email
        Mail::to('blancdavid34@gmail.com')->send(new Contact($date,$subject,$message,$last_name,$first_name,$email));
        
        return redirect()->route('home')->with('message','Votre message a bien été envoyé.Nous traiterons votre demande dans les plus brefs delais.');
    }

    /**
     * test something
     *
     * @return view
     */
    public function test()
    {  
        $user = User::find(1);  
        $role = $user->role()->first()->role;
        return view('test');
    }  

}
