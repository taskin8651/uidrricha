<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSection;
use App\Models\DentistProfileSection;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $aboutPageSection = AboutPageSection::with('media')->first();
            $dentistProfileSection = DentistProfileSection::with('media')->first();
        } catch (\Throwable $exception) {
            $aboutPageSection = null;
            $dentistProfileSection = null;
        }

        return view('frontend.about', compact('aboutPageSection', 'dentistProfileSection'));
    }
}
