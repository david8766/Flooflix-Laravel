<?php

namespace App\Http\Controllers;

use App\BankCard;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Website;
use App\Page;
use App\Font;
use App\Color;
use App\Text;
use App\Picture;
use JavaScript;

class BankCardController extends Controller
{
    /**
     * Show the form for creating a new bank card.
     *
     * @return view
     */
    public function create()
    {
        // get resources for display 
        $website = Website::where('name','flooflix')->first();
        if (!is_null($website) && !empty($website)) {
            $page = Page::where('website_id', $website->id)->where('name','carte')->first();
            if(!is_null($page) && !empty($page)){
                $datas = $page->getResourcesToDisplayPage($page);
            }    
        }else{
            return view('errors.404');
        }     
        return view('flooflix.forms.createBankCard',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function store(Request $request)
    {
        $user = auth()->user('id');

        // Validate the fields
        request()->validate([
            'type' => ['required','string'],
            'number1' => ['required','string'],
            'number2' => ['required','string'],
            'number3' => ['required','string'],
            'number4' => ['required','string'],
            'cryptogram' => ['required','string'],
            'month' =>['required']
            ]);

        if($this->isDigits($request->number1)){
            $number1 = $request->number1;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number2)){
            $number2 = $request->number2;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number3)){
            $number3 = $request->number3;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number4)){
            $number4 = $request->number4;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->cryptogram)){
            $cryptogram = $request->cryptogram;
        }else{
            return back()->with('messageError','Le cryptogramme de votre carte ne doit contenir que des chiffres');
        }
        $number = $number1 .''. $number2 .''. $number3 .''. $number4;
        $year = substr($request->month,0,4);
        $month = substr($request->month,-2);
        
        // Data verification
        if(isset($request->type) && isset($number) && isset($cryptogram) && isset($month) && isset($year) && !is_null($request->type) && !is_null($number) && !is_null($cryptogram) && !is_null($month) && !is_null($year) && !empty($request->type) && !empty($number) && !empty($cryptogram) && !empty($month) && !empty($year) && is_string($request->type) && is_string($number) && is_string($cryptogram) && is_string($month) && is_string($year)){    
            // Save datas
            $bankCard = new Bankcard;
            $bankCard->type = e($request->type);
            $bankCard->number = e(encrypt($number));
            $bankCard->cryptogram = e(encrypt($cryptogram));
            $bankCard->month = e($month);
            $bankCard->year = e($year);
            $bankCard->save();
            // associate card to user
            $user->bank_card_id = $bankCard->id;
            $user->save();
            return redirect('/MonCompte')->with('message', 'Votre carte bancaire a été enregistrée.');
        }else{
            return redirect('/AjouterUneCarteBancaire')->with('messageError', "Une erreur est survenue lors de l'enregistrement de votre carte.Veuillez contacter l'administrateur du site");
        } 
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @return view
     */
    public function edit()
    {
        // get resources for display 
        $website = Website::where('name','flooflix')->first();
        if (!is_null($website) && !empty($website)) {
            $page = Page::where('website_id', $website->id)->where('name','modifier_carte')->first();
            if(!is_null($page) && !empty($page)){
                $datas = $page->getResourcesToDisplayPage($page);
            }    
        }else{
            return view('errors.404');
        }
        return view('Flooflix.forms.editBankCard', compact('datas'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function update(Request $request)
    {
        // Get user
        $user = auth()->user('id');
        // Validate the fields
        request()->validate([
            'type' => ['required','string'],
            'number1' => ['required','string'],
            'number2' => ['required','string'],
            'number3' => ['required','string'],
            'number4' => ['required','string'],
            'cryptogram' => ['required','string'],
            'month' =>['required']
            ]);

        if($this->isDigits($request->number1)){
            $number1 = $request->number1;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number2)){
            $number2 = $request->number2;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number3)){
            $number3 = $request->number3;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->number4)){
            $number4 = $request->number4;
        }else{
            return back()->with('messageError','Votre numéro de carte ne doit contenir que des chiffres');
        }
        if($this->isDigits($request->cryptogram)){
            $cryptogram = $request->cryptogram;
        }else{
            return back()->with('messageError','Le cryptogramme de votre carte ne doit contenir que des chiffres');
        }
        $number = $number1 .''. $number2 .''. $number3 .''. $number4;
        $year = substr($request->month,0,4);
        $month = substr($request->month,-2);
        
        // Data verification
        if(isset($request->type) && isset($number) && isset($cryptogram) && isset($month) && isset($year) && !is_null($request->type) && !is_null($number) && !is_null($cryptogram) && !is_null($month) && !is_null($year) && !empty($request->type) && !empty($number) && !empty($cryptogram) && !empty($month) && !empty($year) && is_string($request->type) && is_string($number) && is_string($cryptogram) && is_string($month) && is_string($year)){
            // get actual bank card data
            $bankCard = BankCard::find($user->bank_card_id);
            // Save datas
            $newBankCard = new BankCard;
            $newBankCard->type = e($request->type);
            $newBankCard->number = e(encrypt($number));
            $newBankCard->cryptogram = e(encrypt($cryptogram));
            $newBankCard->month = e($month);
            $newBankCard->year = e($year);
            $newBankCard->save();
            // associate new bank card to user
            $user->bank_card_id = $newBankCard->id;
            $user->save();
            $user = $user->id;
            // delete old bank card
            $bankCard->delete();
            return redirect()->route('user.account', [$user])->with('message', 'Votre carte bancaire a été modifiée.');
        }else{
            return redirect('/AjouterUneCarteBancaire')->with('messageError', "Une erreur est survenue lors de l'enregistrement de votre nouvelle carte.Veuillez contacter l'administrateur du site");
        }
    }

    /**
     * Check if a string contains only numbers.
     *
     * @param  string $element
     * @return boolean
     */
    public function isDigits($element) {
        return !preg_match ("/[^0-9]/", $element);
    }
}
