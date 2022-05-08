<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function hindi()
    {
        session()->get('language');
        session()->forget('language', 'hindi');
        session()->put('language', 'hindi');
        return redirect()->back();
    }

    public function english()
    {
        session()->get('language');
        session()->forget('language', 'english');
        session()->put('language', 'english');
        return redirect()->back();
    }

    public function arabic()
    {
        session()->get('language');
        session()->forget('language', 'arabic');
        session()->put('language', 'arabic');
        return redirect()->back();

    }
}
