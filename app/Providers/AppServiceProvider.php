<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('frontend.*', function ($view) {
            try {
                $setting = WebsiteSetting::first();
            } catch (\Throwable $exception) {
                $setting = null;
            }

            $siteName = $setting->site_name ?? 'Dr. Richa Dental Care';
            $contactNumber = $setting->contact_number ?? '+91 96087 01058';
            $whatsappNumber = $setting->whatsapp_number ?? '919608701058';
            $clinicAddress = $setting->clinic_address ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
            $clinicHours = $setting->clinic_hours ?? 'Mon - Sat, 10 AM - 8:30 PM';
            $mapEmbedUrl = $setting->map_embed_url ?? 'https://www.google.com/maps?q=Keshri%20Nagar%20Patna%20800024&output=embed';
            $mapDirectionUrl = $setting->map_direction_url ?? 'https://www.google.com/maps?q=12%2C%20Road%20Number%2017%2C%20near%20Baba%20Chowk%2C%20Bank%20Colony%2C%20Keshri%20Nagar%2C%20Patna%2C%20Bihar%20800024';
            $callLink = 'tel:' . preg_replace('/\s+/', '', $contactNumber);
            $whatsappLink = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappNumber);

            $view->with([
                'frontendSiteName' => $siteName,
                'frontendContactNumber' => $contactNumber,
                'frontendClinicAddress' => $clinicAddress,
                'frontendClinicHours' => $clinicHours,
                'frontendMapEmbedUrl' => $mapEmbedUrl,
                'frontendMapDirectionUrl' => $mapDirectionUrl,
                'frontendCallLink' => $callLink,
                'frontendWhatsappLink' => $whatsappLink,
                'frontendWhatsappAppointmentLink' => $whatsappLink . '?text=' . rawurlencode("Hi {$siteName}, I want to book an appointment."),
            ]);
        });
    }
}
