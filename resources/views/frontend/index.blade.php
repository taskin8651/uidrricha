@extends('frontend.master')

@section('content')
@php
    $hero = $heroSection ?? null;
    $about = $aboutPageSection ?? null;
    $doctor = $dentistProfileSection ?? null;
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $contactNumber = $frontendContactNumber ?? '+91 96087 01058';
    $clinicAddress = $frontendClinicAddress ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $clinicHours = $frontendClinicHours ?? 'Mon - Sat, 10 AM - 8:30 PM';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $heroImage = $hero?->getFirstMediaUrl('hero_image') ?: asset('assets/img/img.png');
    $aboutImage = $about?->getFirstMediaUrl('about_intro_image') ?: asset('assets/img/img2.png');
    $doctorImage = $doctor?->getFirstMediaUrl('dentist_profile_image') ?: asset('assets/img/img3.png');
    $locationShort = \Illuminate\Support\Str::contains($clinicAddress, 'Keshri Nagar') ? 'Keshri Nagar, Patna' : \Illuminate\Support\Str::limit($clinicAddress, 28);
    $heroStats = [
        [
            'icon' => 'bi bi-clock',
            'title' => $hero?->stat_1_number ?: $clinicHours,
            'text' => $hero?->stat_1_text ?: 'Clinic Hours',
        ],
        [
            'icon' => 'bi bi-geo-alt',
            'title' => $hero?->stat_2_number ?: $locationShort,
            'text' => $hero?->stat_2_text ?: 'Clinic Location',
        ],
        [
            'icon' => 'bi bi-heart-pulse',
            'title' => $hero?->stat_3_number ?: 'Patient First',
            'text' => $hero?->stat_3_text ?: 'Comfort Care',
        ],
    ];
    $aboutFeatures = [
        [$about?->feature_1_icon ?: 'bi bi-check2', $about?->feature_1_title ?: 'Clean and patient-friendly clinic environment'],
        [$about?->feature_2_icon ?: 'bi bi-check2', $about?->feature_2_title ?: 'Modern dental services for all age groups'],
        [$about?->feature_3_icon ?: 'bi bi-check2', $about?->feature_3_title ?: 'Easy call, WhatsApp and appointment support'],
    ];
    $quickStats = [
        [$doctor?->quick_stat_1_title ?: 'Modern', $doctor?->quick_stat_1_text ?: 'Dental Care'],
        [$doctor?->quick_stat_2_title ?: 'Patient', $doctor?->quick_stat_2_text ?: 'First Approach'],
        [$doctor?->quick_stat_3_title ?: 'Clean', $doctor?->quick_stat_3_text ?: 'Clinic Experience'],
    ];
@endphp

<!-- HERO START -->
<section class="hero-section">
    <div class="hero-bg-glow hero-glow-one"></div>
    <div class="hero-bg-glow hero-glow-two"></div>
    <div class="hero-bg-pattern"></div>

    <div class="container">
        <div class="hero-wrapper">
            <div class="hero-content">
                <span class="section-badge hero-badge">
                    <i class="{{ $hero?->badge_icon ?: 'bi bi-shield-check' }}"></i>
                    {{ $hero?->badge_text ?: 'Premium Dental Clinic in Patna' }}
                </span>

                <h1>
                    {{ $hero?->title ?: 'Gentle Dental Care for a' }}
                    <span>{{ $hero?->highlight_title ?: 'Healthy Confident Smile.' }}</span>
                </h1>

                <p>
                    {{ $hero?->description ?: 'Experience modern, comfortable and patient-friendly dental care at ' . $siteName . ', located near Baba Chowk, Keshri Nagar, Patna.' }}
                </p>

                <div class="hero-actions">
                    <a href="{{ route('frontend.appointment') }}" class="primary-btn">
                        Book Appointment
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="{{ $callLink }}" class="secondary-btn">
                        <i class="bi bi-telephone-fill"></i>
                        Call Clinic
                    </a>
                </div>

                <div class="hero-trust">
                    @foreach($heroStats as $stat)
                        <div class="hero-trust-card">
                            <span class="trust-icon">
                                <i class="{{ $stat['icon'] }}"></i>
                            </span>
                            <div>
                                <strong>{{ $stat['title'] }}</strong>
                                <small>{{ $stat['text'] }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-main-card">
                    <div class="hero-image-card">
                        <img src="{{ $heroImage }}" alt="{{ $siteName }} clinic" />
                    </div>

                    <div class="hero-image-overlay">
                        <div class="hero-card-top">
                            <span class="overlay-icon">
                                <i class="bi bi-star-fill"></i>
                            </span>
                            <div>
                                <strong>{{ $hero?->top_card_title ?: 'Trusted Dental Care' }}</strong>
                                <small>{{ $hero?->top_card_text ?: 'Modern clinic experience' }}</small>
                            </div>
                        </div>

                        <div class="hero-mini-card mini-card-left">
                            <i class="bi bi-calendar2-check"></i>
                            <div>
                                <strong>{{ $hero?->bottom_card_title ?: 'Easy Booking' }}</strong>
                                <small>{{ $hero?->bottom_card_text ?: 'Quick appointment' }}</small>
                            </div>
                        </div>

                        <div class="hero-mini-card mini-card-right">
                            <i class="bi bi-shield-plus"></i>
                            <div>
                                <strong>Hygienic Care</strong>
                                <small>Patient-safe clinic</small>
                            </div>
                        </div>

                        <div class="hero-card-bottom">
                            <div class="treatment-pill">
                                <i class="bi bi-stars"></i>
                                <span>Smile Designing</span>
                            </div>
                            <div class="treatment-pill">
                                <i class="bi bi-heart-pulse"></i>
                                <span>Root Canal Care</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- HERO END -->

<!-- QUICK CONTACT START -->
<section class="quick-contact-section mt-5">
    <div class="container">
        <div class="quick-contact-wrap">
            <a href="{{ $callLink }}" class="quick-item quick-call">
                <span class="quick-icon"><i class="bi bi-telephone-fill"></i></span>
                <span class="quick-content">
                    <small>Call Us</small>
                    <strong>{{ $contactNumber }}</strong>
                </span>
                <span class="quick-arrow"><i class="bi bi-arrow-right"></i></span>
            </a>

            <div class="quick-item">
                <span class="quick-icon"><i class="bi bi-clock-fill"></i></span>
                <span class="quick-content">
                    <small>Clinic Hours</small>
                    <strong>{{ $clinicHours }}</strong>
                </span>
                <span class="quick-arrow"><i class="bi bi-check2"></i></span>
            </div>

            <div class="quick-item">
                <span class="quick-icon"><i class="bi bi-geo-alt-fill"></i></span>
                <span class="quick-content">
                    <small>Location</small>
                    <strong>{{ $locationShort }}</strong>
                </span>
                <span class="quick-arrow"><i class="bi bi-arrow-right"></i></span>
            </div>
        </div>
    </div>
</section>
<!-- QUICK CONTACT END -->

<!-- ABOUT START -->
<section class="about-section section-padding">
    <div class="about-bg-glow about-glow-one"></div>
    <div class="about-bg-glow about-glow-two"></div>

    <div class="container">
        <div class="about-wrapper">
            <div class="about-visual">
                <div class="about-image-box">
                    <img src="{{ $aboutImage }}" alt="{{ $about?->intro_title ?: 'Modern dental clinic in Patna' }}">
                    <div class="about-image-overlay"></div>

                    <div class="about-experience">
                        <span class="about-exp-icon">
                            <i class="bi bi-shield-check"></i>
                        </span>
                        <div>
                            <strong>{{ $about?->experience_number ?: 'Modern' }}</strong>
                            <small>{{ $about?->experience_text ?: 'Dental Wellness Care' }}</small>
                        </div>
                    </div>

                    <div class="about-floating-note">
                        <i class="bi bi-heart-pulse"></i>
                        <span>Comfort-focused dental care</span>
                    </div>
                </div>

                <div class="about-mini-stats">
                    <div>
                        <strong>Patient</strong>
                        <span>First Approach</span>
                    </div>
                    <div>
                        <strong>Clean</strong>
                        <span>Clinic Experience</span>
                    </div>
                </div>
            </div>

            <div class="about-content">
                <div class="section-heading left about-heading">
                    <span class="section-badge">
                        <i class="bi bi-hospital"></i>
                        {{ $about?->intro_tag ?: 'About Clinic' }}
                    </span>

                    <h2>{{ $about?->intro_title ?: 'Soft, clean and comfortable dental care experience.' }}</h2>

                    <p>
                        {{ $about?->intro_description_1 ?: $siteName . ' provides professional dental treatments with a focus on hygiene, comfort and clear patient guidance for families near Keshri Nagar, North Patel Nagar and Rajeev Nagar, Patna.' }}
                    </p>
                </div>

                <div class="about-highlight-box">
                    <div class="about-highlight-icon">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div>
                        <h3>{{ $about?->approach_title ?: 'Designed for calm and confident dental visits.' }}</h3>
                        <p>
                            {{ $about?->approach_description ?: ($about?->intro_description_2 ?: 'From consultation to treatment guidance, every section is focused on trust, clarity and a patient-friendly experience.') }}
                        </p>
                    </div>
                </div>

                <div class="feature-list">
                    @foreach($aboutFeatures as $feature)
                        <div class="feature-row">
                            <span class="feature-icon">
                                <i class="bi bi-check"></i>
                            </span>
                            <span>{{ $feature[1] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="about-actions">
                    <a href="{{ $about?->intro_button_url ?: route('frontend.about') }}" class="about-primary-link">
                        {{ $about?->intro_button_text ?: 'Know More About Clinic' }}
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ $callLink }}" class="about-call-link">
                        <i class="bi bi-telephone-fill"></i>
                        Call Clinic
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT END -->

<!-- SERVICES START -->
<section class="services-section section-padding">
    <div class="services-bg-glow services-glow-one"></div>
    <div class="services-bg-glow services-glow-two"></div>

    <div class="container">
        <div class="services-wrapper">
            <div class="services-intro">
                <span class="section-badge">
                    <i class="bi bi-grid"></i>
                    Dental Services
                </span>

                <h2>Complete dental care services.</h2>

                <p>
                    Premium dental treatments for routine check-ups, teeth cleaning, root canal,
                    smile designing, cosmetic dentistry and emergency dental care.
                </p>

                <div class="services-intro-card">
                    <div class="services-intro-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <div>
                        <strong>Patient-first treatment planning</strong>
                        <span>Comfort, hygiene and clear guidance at every step.</span>
                    </div>
                </div>

                <a href="{{ route('frontend.services.index') }}" class="services-main-btn">
                    View All Services
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="services-grid">
                @forelse($serviceSections as $index => $service)
                    <a href="{{ route('frontend.services.show', $service->slug) }}" class="service-card {{ $index === 0 || $index === 3 ? 'featured-service' : '' }}">
                        <span class="service-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="service-icon">
                            <i class="{{ $service->card_icon ?: 'bi bi-clipboard2-pulse' }}"></i>
                        </div>
                        <div class="service-content">
                            <h3>{{ $service->title }}</h3>
                            <p>{{ $service->short_description ?: \Illuminate\Support\Str::limit(strip_tags($service->description), 80) }}</p>
                        </div>
                        <span class="service-link">
                            Read More
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </a>
                @empty
                    <a href="{{ route('frontend.services.index') }}" class="service-card featured-service">
                        <span class="service-number">01</span>
                        <div class="service-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                        <div class="service-content">
                            <h3>Dental Check-up</h3>
                            <p>Routine oral examination and preventive dental guidance.</p>
                        </div>
                        <span class="service-link">Read More <i class="bi bi-arrow-right"></i></span>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- SERVICES END -->

<!-- WHY CHOOSE START -->
<section class="why-section section-padding">
    <div class="why-bg-glow why-glow-one"></div>
    <div class="why-bg-glow why-glow-two"></div>

    <div class="container">
        <div class="why-wrapper">
            <div class="why-content">
                <span class="section-badge">
                    <i class="bi bi-award"></i>
                    Why Choose Us
                </span>

                <h2>Designed around comfort, hygiene and trust.</h2>

                <p>
                    A calm dental wellness experience with easy appointment access,
                    clear patient guidance and comfort-focused dental care.
                </p>

                <div class="why-highlight">
                    <div class="why-highlight-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <div>
                        <strong>Care that feels personal.</strong>
                        <span>Every visit is planned to make patients feel informed, relaxed and confident.</span>
                    </div>
                </div>

                <a href="{{ route('frontend.appointment') }}" class="why-main-btn">
                    Book Your Visit
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="why-cards-area">
                <div class="why-center-line"></div>

                <div class="why-card why-card-one">
                    <span class="why-card-count">01</span>
                    <div class="why-card-icon"><i class="bi bi-shield-check"></i></div>
                    <div>
                        <h3>Hygiene Focused</h3>
                        <p>Clean and safe dental care environment for every patient.</p>
                    </div>
                </div>

                <div class="why-card why-card-two">
                    <span class="why-card-count">02</span>
                    <div class="why-card-icon"><i class="bi bi-person-heart"></i></div>
                    <div>
                        <h3>Patient Friendly</h3>
                        <p>Clear treatment guidance and comfortable appointment experience.</p>
                    </div>
                </div>

                <div class="why-card why-card-three">
                    <span class="why-card-count">03</span>
                    <div class="why-card-icon"><i class="bi bi-geo-alt"></i></div>
                    <div>
                        <h3>Easy Location</h3>
                        <p>Located near Baba Chowk, Keshri Nagar, Patna.</p>
                    </div>
                </div>

                <div class="why-card why-card-four">
                    <span class="why-card-count">04</span>
                    <div class="why-card-icon"><i class="bi bi-phone"></i></div>
                    <div>
                        <h3>Quick Connect</h3>
                        <p>Call, WhatsApp and direction buttons for quick patient support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHY CHOOSE END -->

<!-- DOCTOR START -->
<section class="doctor-section section-padding">
    <div class="doctor-bg-glow doctor-glow-one"></div>
    <div class="doctor-bg-glow doctor-glow-two"></div>

    <div class="container">
        <div class="doctor-wrapper">
            <div class="doctor-visual">
                <div class="doctor-image-card">
                    <img src="{{ $doctorImage }}" alt="{{ $doctor?->doctor_name ?: 'Dr. Richa Dental Care dentist' }}">
                    <div class="doctor-image-shade"></div>

                    <div class="doctor-name-badge">
                        <span class="doctor-badge-icon">
                            <i class="bi bi-person-heart"></i>
                        </span>
                        <div>
                            <strong>{{ $doctor?->doctor_name ?: 'Dr. Richa' }}</strong>
                            <small>{{ $doctor?->designation ?: 'Dental Care Specialist' }}</small>
                        </div>
                    </div>

                    <div class="doctor-floating-badge">
                        <i class="bi bi-shield-check"></i>
                        <span>Comfort-focused care</span>
                    </div>
                </div>

                <div class="doctor-mini-stats mt-2">
                    @foreach($quickStats as $quickStat)
                        <div>
                            <strong>{{ $quickStat[0] }}</strong>
                            <span>{{ $quickStat[1] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="doctor-content">
                <span class="section-badge">
                    <i class="{{ $doctor?->profile_tag ? 'bi bi-person-badge' : 'bi bi-person-badge' }}"></i>
                    {{ $doctor?->profile_tag ?: 'Doctor Profile' }}
                </span>

                <h2>Meet {{ $doctor?->doctor_name ?: 'Dr. Richa' }}</h2>

                <p>
                    {{ $doctor?->description ?: 'Doctor details, qualification, experience and specialization can be updated here once the final content is provided by the clinic.' }}
                </p>

                <div class="doctor-profile-note">
                    <div class="doctor-note-icon">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div>
                        <h3>Gentle guidance for confident dental decisions.</h3>
                        <p>Focused on clean treatment planning, patient comfort and clear explanation before every dental procedure.</p>
                    </div>
                </div>

                <div class="doctor-points">
                    <span>
                        <i class="{{ $doctor?->qualification_icon ?: 'bi bi-check2-circle' }}"></i>
                        {{ $doctor?->qualification_value ?: 'Dental Consultation' }}
                    </span>
                    <span>
                        <i class="{{ $doctor?->specialization_icon ?: 'bi bi-check2-circle' }}"></i>
                        {{ $doctor?->specialization_value ?: 'Root Canal Treatment' }}
                    </span>
                    <span>
                        <i class="bi bi-check2-circle"></i>
                        Cosmetic Dentistry
                    </span>
                </div>

                <div class="doctor-actions">
                    <a href="{{ route('frontend.dentist-profile') }}" class="doctor-primary-btn">
                        View Doctor Profile
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ route('frontend.appointment') }}" class="doctor-secondary-btn">
                        <i class="bi bi-calendar2-check"></i>
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DOCTOR END -->

<!-- TESTIMONIALS START -->
<section class="testimonial-section section-padding">
    <div class="testimonial-bg-glow testimonial-glow-one"></div>
    <div class="testimonial-bg-glow testimonial-glow-two"></div>

    <div class="container">
        <div class="testimonial-wrapper">
            <div class="testimonial-intro">
                <span class="section-badge">
                    <i class="bi bi-chat-quote"></i>
                    Patient Reviews
                </span>

                <h2>What patients say about our dental care.</h2>

                <p>
                    Real patient experiences help build trust, comfort and confidence
                    before visiting {{ $siteName }}.
                </p>

                <div class="testimonial-score-card">
                    <div class="score-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <div>
                        <strong>Trusted by Patients</strong>
                        <span>Comfortable consultation and clean clinic experience.</span>
                    </div>
                </div>

                <a href="{{ route('frontend.testimonials') }}" class="testimonial-main-btn">
                    View All Reviews
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="testimonial-slider-wrap">
                <div class="testimonial-slider" id="testimonialSlider">
                    <div class="testimonial-track">
                        @forelse($testimonials as $testimonial)
                            @php
                                $rating = (int) round($testimonial->rating ?: 5);
                            @endphp
                            <div class="testimonial-slide">
                                <div class="review-card {{ $testimonial->is_featured ? 'review-featured' : '' }}">
                                    <div class="review-top">
                                        <div class="review-avatar">
                                            <i class="bi bi-person-heart"></i>
                                        </div>
                                        <div>
                                            <h4>{{ $testimonial->customer_name ?: 'Patient Name' }}</h4>
                                            <span>{{ $testimonial->customer_type ?: 'Dental Patient' }}</span>
                                        </div>
                                    </div>

                                    <div class="stars" aria-label="{{ $rating }} star rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bi {{ $i <= $rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                        @endfor
                                    </div>

                                    <p>{{ $testimonial->review_text }}</p>

                                    <div class="review-quote-icon">
                                        <i class="bi bi-quote"></i>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="testimonial-slide">
                                <div class="review-card review-featured">
                                    <div class="review-top">
                                        <div class="review-avatar">
                                            <i class="bi bi-person-heart"></i>
                                        </div>
                                        <div>
                                            <h4>Patient Name</h4>
                                            <span>{{ $locationShort }}</span>
                                        </div>
                                    </div>
                                    <div class="stars" aria-label="5 star rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                    </div>
                                    <p>Very clean clinic and comfortable consultation experience. The dental care guidance was clear and patient-friendly.</p>
                                    <div class="review-quote-icon"><i class="bi bi-quote"></i></div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="testimonial-slider-controls">
                    <button class="testimonial-slider-btn testimonial-prev" type="button" aria-label="Previous testimonial">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <div class="testimonial-dots" aria-label="Testimonial slider dots">
                        @for($i = 0; $i < max($testimonials->count(), 1); $i++)
                            <button class="{{ $i === 0 ? 'active' : '' }}" type="button" aria-label="Slide {{ $i + 1 }}"></button>
                        @endfor
                    </div>

                    <button class="testimonial-slider-btn testimonial-next" type="button" aria-label="Next testimonial">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TESTIMONIALS END -->

<!-- CTA START -->
<section class="cta-section">
    <div class="cta-bg-glow cta-glow-one"></div>
    <div class="cta-bg-glow cta-glow-two"></div>

    <div class="container">
        <div class="cta-card">
            <div class="cta-content">
                <span class="section-badge cta-badge">
                    <i class="bi bi-calendar2-check"></i>
                    Book Your Visit
                </span>

                <h2>Need dental care near Keshri Nagar, Patna?</h2>

                <p>
                    Call or book your appointment with {{ $siteName }} for a clean,
                    comfortable and patient-friendly dental visit.
                </p>
            </div>

            <div class="cta-actions">
                <a href="{{ route('frontend.appointment') }}" class="cta-primary-btn">
                    Book Appointment
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="{{ $callLink }}" class="cta-secondary-btn">
                    <i class="bi bi-telephone-fill"></i>
                    Call Now
                </a>
            </div>
        </div>
    </div>
</section>
<!-- CTA END -->
@endsection
