<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSection;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $aboutPageSection = AboutPageSection::with('media')->first();
        } catch (\Throwable $exception) {
            $aboutPageSection = null;
        }

        return view('frontend.about', compact('aboutPageSection'));
    }
}
