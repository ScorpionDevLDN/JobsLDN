<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    public function ShareWidget()
    {
        $shareComponent = \Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->whatsapp();

        return back();
    }

    public function test(){
        \Newsletter::subscribe('john.smith@gmail.com');
        \Newsletter::getLastError();
        dd('tst');
    }
}
