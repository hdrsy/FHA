<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($lang)
{
    if (array_key_exists($lang, config('app.languages'))) {

        session()->put('locale', $lang);
    }
    return back();
}

}
