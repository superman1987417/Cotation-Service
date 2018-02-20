<?php


namespace App\Http\Controllers;


class LandingPageController extends Controller
{

    public function cotacao()
    {
        return view('landing_page.cotacao');
    }
}