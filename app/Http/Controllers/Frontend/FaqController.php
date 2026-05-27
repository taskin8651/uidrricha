<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $faqs = Faq::where('status', 1)
                ->orderBy('category', 'asc')
                ->orderBy('sort_order', 'asc')
                ->get();
        } catch (\Throwable $exception) {
            $faqs = collect();
        }

        return view('frontend.faqs', compact('faqs'));
    }
}
