<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DentistProfileSection;

class DentistController extends Controller
{
    public function index()
    {
        try {
            $dentistProfileSection = DentistProfileSection::with('media')->first();
        } catch (\Throwable $exception) {
            $dentistProfileSection = null;
        }

        return view('frontend.dentist', compact('dentistProfileSection'));
    }
}
