<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::with('media')->first();

        if (! $websiteSetting) {
            $websiteSetting = WebsiteSetting::create($this->defaultData());
        }

        return view('admin.websiteSettings.index', compact('websiteSetting'));
    }

    public function update(UpdateWebsiteSettingRequest $request)
    {
        $websiteSetting = WebsiteSetting::first();

        if (! $websiteSetting) {
            $websiteSetting = WebsiteSetting::create($this->defaultData());
        }

        $websiteSetting->update($request->except('site_logo', 'site_favicon', 'og_image'));

        foreach (['site_logo', 'site_favicon', 'og_image'] as $collection) {
            if ($request->hasFile($collection)) {
                $websiteSetting
                    ->addMediaFromRequest($collection)
                    ->toMediaCollection($collection);
            }
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('message', 'Website settings updated successfully.');
    }

    private function defaultData()
    {
        return [
            'site_name'         => 'Dr. Richa Dental Care',
            'site_tagline'      => 'Premium dental care clinic near Baba Chowk, Keshri Nagar, Patna.',
            'meta_title'        => 'Dr. Richa Dental Care | Dentist in Keshri Nagar Patna',
            'meta_description'  => 'Dr. Richa Dental Care is a premium dental clinic near Baba Chowk, Keshri Nagar, Patna offering dental check-up, root canal, scaling, implants, braces and smile designing.',
            'meta_keywords'     => 'dental clinic Patna, dentist in Keshri Nagar, root canal Patna, teeth cleaning, dental implants, braces, smile designing',
            'og_title'          => 'Dr. Richa Dental Care',
            'og_description'    => 'Premium dental care clinic near Baba Chowk, Keshri Nagar, Patna.',
            'contact_email'     => 'info@drrichadentalcare.com',
            'contact_number'    => '+91 96087 01058',
            'whatsapp_number'   => '919608701058',
            'clinic_address'    => '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024',
            'map_embed_url'     => 'https://www.google.com/maps?q=Keshri%20Nagar%20Patna%20800024&output=embed',
            'map_direction_url' => 'https://www.google.com/maps?q=12%2C%20Road%20Number%2017%2C%20near%20Baba%20Chowk%2C%20Bank%20Colony%2C%20Keshri%20Nagar%2C%20Patna%2C%20Bihar%20800024',
        ];
    }
}
