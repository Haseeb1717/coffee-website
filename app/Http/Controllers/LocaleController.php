<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch($locale)
    {
        // Only allow supported locales — never trust the URL blindly
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]);
        }

        return back();
    }
}