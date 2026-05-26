<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceSection;

class ServicesController extends Controller
{
    public function index()
    {
        try {
            $serviceSections = ServiceSection::with([
                    'activeItems',
                    'media',
                ])
                ->where('status', 1)
                ->orderBy('sort_order', 'asc')
                ->get();
        } catch (\Throwable $exception) {
            $serviceSections = collect();
        }

        return view('frontend.services', compact('serviceSections'));
    }

    public function show(string $slug)
    {
        try {
            $serviceSection = ServiceSection::with(['activeItems', 'media'])
                ->where('status', 1)
                ->where('slug', $slug)
                ->firstOrFail();

            $relatedServices = ServiceSection::where('status', 1)
                ->where('id', '!=', $serviceSection->id)
                ->orderBy('sort_order', 'asc')
                ->take(4)
                ->get();
        } catch (\Throwable $exception) {
            abort(404);
        }

        return view('frontend.service-detail', compact('serviceSection', 'relatedServices'));
    }
}
