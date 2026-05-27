<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;

class ServicesController extends Controller
{
    public function index()
    {
        try {
            $serviceSections = ServiceSection::with('media')
                ->latest()
                ->get();
        } catch (\Throwable $exception) {
            $serviceSections = collect();
        }

        return view('frontend.services', compact('serviceSections'));
    }

    public function show(string $slug)
    {
        try {
            $serviceSection = ServiceSection::with('media')
                ->where('slug', $slug)
                ->firstOrFail();

            $relatedServices = ServiceSection::where('id', '!=', $serviceSection->id)
                ->latest()
                ->take(4)
                ->get();
        } catch (\Throwable $exception) {
            abort(404);
        }

        return view('frontend.service-detail', compact('serviceSection', 'relatedServices'));
    }
}
