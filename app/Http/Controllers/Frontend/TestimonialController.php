<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        try {
            $testimonials = Testimonial::where('status', 1)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order', 'asc')
                ->get();
        } catch (\Throwable $exception) {
            $testimonials = collect();
        }

        return view('frontend.testimonials', compact('testimonials'));
    }
}
