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
                ->get()
                ->each(function (Faq $faq) {
                    $faq->category = $this->normalizeCategory($faq->category);
                });
        } catch (\Throwable $exception) {
            $faqs = collect();
        }

        return view('frontend.faqs', compact('faqs'));
    }

    private function normalizeCategory(?string $category): string
    {
        return [
            'common-questions' => 'common',
            'appointment-questions' => 'appointment',
            'treatment-questions' => 'treatment',
            'location-questions' => 'location',
        ][$category] ?? ($category ?: 'common');
    }
}
