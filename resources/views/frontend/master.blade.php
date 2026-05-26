<!DOCTYPE html>
<html lang="en">

@php
    try {
        $websiteSetting = \App\Models\WebsiteSetting::with('media')->first();
        $footerServices = \App\Models\ServiceSection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->take(5)
            ->get();
    } catch (\Throwable $exception) {
        $websiteSetting = null;
        $footerServices = collect();
    }

    $siteName = $websiteSetting->site_name ?? 'Dr. Richa Dental Care';
    $siteTagline = $websiteSetting->site_tagline ?? 'Premium dental care clinic near Baba Chowk, Keshri Nagar, Patna.';
    $metaTitle = $websiteSetting->meta_title ?? "{$siteName} | {$siteTagline}";
    $metaDescription = $websiteSetting->meta_description ?? 'Dr. Richa Dental Care is a premium dental clinic near Baba Chowk, Keshri Nagar, Patna offering dental check-up, root canal, scaling, implants, braces and smile designing.';
    $metaKeywords = $websiteSetting->meta_keywords ?? '';
    $ogTitle = $websiteSetting->og_title ?? $metaTitle;
    $ogDescription = $websiteSetting->og_description ?? $metaDescription;
    $logoUrl = $websiteSetting?->getFirstMediaUrl('site_logo');
    $faviconUrl = $websiteSetting?->getFirstMediaUrl('site_favicon') ?: asset('favicon.ico');
    $ogImageUrl = $websiteSetting?->getFirstMediaUrl('og_image');
    $contactNumber = $websiteSetting->contact_number ?? '+91 96087 01058';
    $whatsappNumber = $websiteSetting->whatsapp_number ?? '919608701058';
    $clinicAddress = $websiteSetting->clinic_address ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $callLink = 'tel:' . preg_replace('/\s+/', '', $contactNumber);
    $whatsappLink = 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappNumber);
    $appointmentWhatsappLink = $whatsappLink . '?text=' . rawurlencode("Hi {$siteName}, I want to book an appointment.");
    $brandMain = trim(\Illuminate\Support\Str::before($siteName, 'Dental')) ?: $siteName;
    $brandSub = \Illuminate\Support\Str::contains($siteName, 'Dental') ? trim(\Illuminate\Support\Str::of($siteName)->after($brandMain)) : $siteTagline;
    $shortAddress = \Illuminate\Support\Str::limit($clinicAddress, 45);
    $navItems = [
        ['label' => 'Home', 'route' => 'frontend.home', 'patterns' => ['/', 'index', 'index.html']],
        ['label' => 'About', 'route' => 'frontend.about', 'patterns' => ['about', 'about.html']],
        ['label' => 'Doctor', 'route' => 'frontend.dentist-profile', 'patterns' => ['dentist-profile', 'dentist-profile.html']],
        ['label' => 'Services', 'route' => 'frontend.services.index', 'patterns' => ['services', 'services.html']],
        ['label' => 'Gallery', 'route' => 'frontend.gallery', 'patterns' => ['gallery', 'gallery.html']],
        ['label' => 'Testimonials', 'route' => 'frontend.testimonials', 'patterns' => ['testimonials', 'testimonials.html']],
        ['label' => 'FAQs', 'route' => 'frontend.faq', 'patterns' => ['faq', 'faq.html', 'faqs', 'faqs.html']],
        ['label' => 'Contact', 'route' => 'frontend.contact', 'patterns' => ['contact', 'contact.html']],
    ];
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}" />
    @if($metaKeywords)
        <meta name="keywords" content="{{ $metaKeywords }}" />
    @endif
    <meta property="og:title" content="{{ $ogTitle }}" />
    <meta property="og:description" content="{{ $ogDescription }}" />
    @if($ogImageUrl)
        <meta property="og:image" content="{{ $ogImageUrl }}" />
    @endif
    <meta property="og:type" content="website" />
    <link rel="icon" href="{{ $faviconUrl }}" />
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Premium Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>

    <!-- TOP BAR START -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-inner">

                <div class="top-info">
                    <span class="top-info-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>{{ $shortAddress }}</span>
                    </span>

                    <span class="top-info-item">
                        <i class="bi bi-clock"></i>
                        <span>Mon - Sat: 10 AM - 8:30 PM</span>
                    </span>
                </div>

                <div class="top-action">
                    <a href="{{ $callLink }}" class="top-call-btn">
                        <i class="bi bi-telephone-fill"></i>
                        <span>{{ $contactNumber }}</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- TOP BAR END -->


    <!-- HEADER START -->
    <header class="site-header" id="siteHeader">
        <div class="container-fluid header-container">

            <div class="header-shell">

                <!-- BRAND START -->
                <a href="{{ route('frontend.home') }}" class="brand" aria-label="{{ $siteName }} Home">
                    @if($logoUrl)
                        <img src="{{ $logoUrl }}" alt="{{ $siteName }} Logo">
                    @else
                        <span class="brand-main">{{ $brandMain }}</span>
                        <span class="brand-sub">{{ $brandSub }}</span>
                    @endif
                </a>
                <!-- BRAND END -->

                <!-- DESKTOP NAV START -->
                <nav class="desktop-nav" aria-label="Main Navigation">
                    @foreach($navItems as $item)
                        <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['route']) || request()->is(...$item['patterns']) ? 'active' : '' }}">{{ $item['label'] }}</a>
                    @endforeach
                </nav>
                <!-- DESKTOP NAV END -->

                <!-- ACTIONS START -->
                <div class="header-actions">

                    <a href="{{ $callLink }}" class="header-call">
                        <span class="header-call-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </span>
                        <span>Call Now</span>
                    </a>

                    <a href="{{ route('frontend.appointment') }}" class="header-book">
                        <span>Book Now</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <button class="menu-toggle" id="menuBtn" type="button" aria-label="Open Menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                    </button>

                </div>
                <!-- ACTIONS END -->

            </div>

        </div>

        <!-- MOBILE MENU START -->
        <div class="mobile-menu" id="mainNav">

            <div class="mobile-menu-head">
                <a href="{{ route('frontend.home') }}" class="mobile-brand">
                    <span>{{ $brandMain }}</span>
                    <small>{{ $brandSub }}</small>
                </a>

                <button class="mobile-close" id="mobileCloseBtn" type="button" aria-label="Close Menu">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <nav class="mobile-links" aria-label="Mobile Navigation">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['route']) || request()->is(...$item['patterns']) ? 'active' : '' }}">
                        <span>{{ $item['label'] }}</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                @endforeach
            </nav>

            <div class="mobile-actions">
                <a href="{{ $callLink }}" class="mobile-call">
                    <i class="bi bi-telephone-fill"></i>
                    <span>Call Now</span>
                </a>

                <a href="{{ route('frontend.appointment') }}" class="mobile-book">
                    <span>Book Now</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
        <!-- MOBILE MENU END -->

        <div class="menu-backdrop" id="navOverlay"></div>

    </header>
    <!-- HEADER END -->



  @yield('content')


  
    <!-- FOOTER START -->
    <footer class="footer">
        <div class="footer-bg-glow footer-glow-one"></div>
        <div class="footer-bg-glow footer-glow-two"></div>

        <div class="container">
            <div class="footer-wrapper">

                <!-- FOOTER BRAND START -->
                <div class="footer-brand-box">

                    <a href="{{ route('frontend.home') }}" class="footer-brand">
                        <span>{{ $brandMain }}</span>
                        <small>{{ $brandSub }}</small>
                    </a>

                    <p>
                        {{ $siteTagline }}
                    </p>

                    <div class="footer-contact-pills">
                        <a href="{{ $callLink }}">
                            <i class="bi bi-telephone-fill"></i>
                            {{ $contactNumber }}
                        </a>

                        <a href="{{ route('frontend.appointment') }}">
                            <i class="bi bi-calendar2-check"></i>
                            Book Appointment
                        </a>
                    </div>

                </div>
                <!-- FOOTER BRAND END -->


                <!-- FOOTER LINKS START -->
                <div class="footer-links-box">

                    <div class="footer-link-card">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="{{ route('frontend.about') }}">About Clinic</a></li>
                            <li><a href="{{ route('frontend.dentist-profile') }}">Doctor Profile</a></li>
                            <li><a href="{{ route('frontend.services.index') }}">Dental Services</a></li>
                            <li><a href="{{ route('frontend.appointment') }}">Appointment</a></li>
                            <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer-link-card">
                        <h4>Services</h4>

                        <ul>
                            @forelse($footerServices as $footerService)
                                <li><a href="{{ route('frontend.services.index') }}">{{ \Illuminate\Support\Str::limit($footerService->title, 28) }}</a></li>
                            @empty
                                <li><a href="{{ route('frontend.services.index') }}">Root Canal</a></li>
                                <li><a href="{{ route('frontend.services.index') }}">Teeth Cleaning</a></li>
                                <li><a href="{{ route('frontend.services.index') }}">Dental Implants</a></li>
                                <li><a href="{{ route('frontend.services.index') }}">Smile Designing</a></li>
                            @endforelse
                        </ul>
                    </div>

                    <div class="footer-link-card footer-contact-card">
                        <h4>Clinic Info</h4>

                        <div class="footer-info-list">

                            <div class="footer-info-item">
                                <span>
                                    <i class="bi bi-geo-alt-fill"></i>
                                </span>

                                <p>
                                    {{ $clinicAddress }}
                                </p>
                            </div>

                            <div class="footer-info-item">
                                <span>
                                    <i class="bi bi-clock-fill"></i>
                                </span>

                                <p>
                                    Mon - Sat, 10 AM - 8:30 PM<br>
                                    Sunday Closed
                                </p>
                            </div>

                            <div class="footer-info-item">
                                <span>
                                    <i class="bi bi-telephone-fill"></i>
                                </span>

                                <p>
                                    <a href="{{ $callLink }}">{{ $contactNumber }}</a>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- FOOTER LINKS END -->

            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} {{ $siteName }}. All Rights Reserved.</p>

                <div class="footer-bottom-links">
                    <a href="{{ route('frontend.faq') }}">FAQs</a>
                    <span></span>
                    <a href="{{ route('frontend.contact') }}">Contact</a>
                </div>
            </div>

        </div>
    </footer>
    <!-- FOOTER END -->



    <!-- FLOATING BUTTONS START -->
    <div class="floating-actions">

        <a href="{{ $appointmentWhatsappLink }}" target="_blank" class="floating-btn float-whatsapp"
            aria-label="Chat on WhatsApp">
            <span class="float-icon">
                <i class="bi bi-whatsapp"></i>
            </span>
            <span class="float-text">
                <small>Chat</small>
                <strong>WhatsApp</strong>
            </span>
        </a>

        <a href="{{ $callLink }}" class="floating-btn float-call" aria-label="Call {{ $siteName }}">
            <span class="float-icon">
                <i class="bi bi-telephone-fill"></i>
            </span>
            <span class="float-text">
                <small>Call</small>
                <strong>Clinic</strong>
            </span>
        </a>

    </div>
    <!-- FLOATING BUTTONS END -->



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
