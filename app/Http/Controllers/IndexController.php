<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $lang = request('lang');
        if (! in_array($lang, ['ru', 'en'])) {
            $lang = 'ru';
        }

        return view("index_$lang");
    }
}
