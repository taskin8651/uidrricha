@extends('frontend.master')
@section('content')

@php
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $contactNumber = $frontendContactNumber ?? '+91 96087 01058';
    $clinicAddress = $frontendClinicAddress ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $clinicHours = $frontendClinicHours ?? 'Mon - Sat, 10 AM - 8:30 PM';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $whatsappLink = $frontendWhatsappAppointmentLink ?? 'https://wa.me/919608701058';
    $mapEmbedUrl = $frontendMapEmbedUrl ?? 'https://www.google.com/maps?q=Keshri%20Nagar%20Patna%20800024&output=embed';
    $mapDirectionUrl = $frontendMapDirectionUrl ?? 'https://www.google.com/maps?q=Keshri%20Nagar%20Patna%20800024';
@endphp

<!-- CONTACT BREADCRUMB HERO START -->
<section class="contact-breadcrumb-hero">
    <div class="contact-page-glow contact-page-glow-one"></div>
    <div class="contact-page-glow contact-page-glow-two"></div>
    <div class="contact-page-pattern"></div>

    <div class="container">
        <div class="contact-breadcrumb-box reveal-up">
            <span class="section-badge">
                <i class="bi bi-geo-alt"></i>
                Contact {{ $siteName }}
            </span>

            <h1>Visit Our Dental Clinic in Keshri Nagar, Patna</h1>

            <p>
                Contact {{ $siteName }} for appointment booking, dental consultation,
                clinic directions, timings and patient-friendly support.
            </p>

            <nav class="contact-breadcrumb-nav" aria-label="breadcrumb">
                <a href="{{ route('frontend.home') }}">
                    <i class="bi bi-house-heart"></i>
                    Home
                </a>
                <i class="bi bi-chevron-right"></i>
                <span>Contact</span>
            </nav>
        </div>
    </div>
</section>
<!-- CONTACT BREADCRUMB HERO END -->

<!-- CONTACT INFO START -->
<section class="contact-info-section section-padding">
    <div class="contact-page-glow contact-info-glow-one"></div>
    <div class="contact-page-glow contact-info-glow-two"></div>

    <div class="container">
        <div class="section-heading text-center reveal-up">
            <span class="section-badge">
                <i class="bi bi-headset"></i>
                Clinic Contact Details
            </span>

            <h2>Easy call, WhatsApp and direction support for patients.</h2>

            <p>
                Get clinic address, phone number, working hours and quick action buttons
                for a smooth dental visit experience.
            </p>
        </div>

        <div class="contact-info-grid">
            <div class="contact-info-card premium-card premium-hover reveal-up reveal-delay-1">
                <div class="contact-info-icon premium-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>

                <span>Call Clinic</span>
                <h3>{{ $contactNumber }}</h3>

                <p>Call directly for appointment, timing details and dental care support.</p>

                <a href="{{ $callLink }}" class="contact-card-link">
                    Call Now
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="contact-info-card contact-info-featured premium-card premium-hover reveal-up reveal-delay-2">
                <div class="contact-feature-badge">
                    <i class="bi bi-stars"></i>
                    Clinic Location
                </div>

                <div class="contact-info-icon premium-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>

                <span>Address</span>
                <h3>Keshri Nagar, Patna</h3>

                <p>{{ $clinicAddress }}</p>

                <a href="{{ $mapDirectionUrl }}" target="_blank" class="contact-card-link">
                    Get Directions
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="contact-info-card premium-card premium-hover reveal-up reveal-delay-3">
                <div class="contact-info-icon premium-icon">
                    <i class="bi bi-clock-fill"></i>
                </div>

                <span>Clinic Hours</span>
                <h3>{{ $clinicHours }}</h3>

                <p>The clinic remains closed on Sunday. Please call before visiting.</p>

                <a href="{{ route('frontend.appointment') }}" class="contact-card-link">
                    Book Visit
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT INFO END -->

<!-- CONTACT FORM + QUICK SUPPORT START -->
<section class="contact-form-section section-padding">
    <div class="contact-page-glow contact-form-glow-one"></div>
    <div class="contact-page-glow contact-form-glow-two"></div>
    <div class="contact-page-pattern contact-form-pattern"></div>

    <div class="container">
        <div class="contact-form-wrapper">
            <div class="contact-form-card premium-card reveal-up">
                <span class="section-badge">
                    <i class="bi bi-envelope-heart"></i>
                    Contact Form
                </span>

                <h2>Send your dental concern or enquiry.</h2>

                <p>
                    Share your contact details and dental concern. The clinic team will follow up.
                </p>

                <form class="contact-form" action="{{ route('contact.enquiry.store') }}" method="post">
                    @csrf

                    <div class="contact-form-grid">
                        <div class="form-group">
                            <label for="contactName">Full Name</label>
                            <div class="input-wrap">
                                <i class="bi bi-person"></i>
                                <input type="text" id="contactName" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
                            </div>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="contactPhone">Mobile Number</label>
                            <div class="input-wrap">
                                <i class="bi bi-telephone"></i>
                                <input type="tel" id="contactPhone" name="phone" value="{{ old('phone') }}" placeholder="{{ $contactNumber }}" required>
                            </div>
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="contactEmail">Email ID</label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope"></i>
                                <input type="email" id="contactEmail" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                            </div>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="contactService">Dental Service</label>
                            <div class="input-wrap">
                                <i class="bi bi-heart-pulse"></i>
                                <select id="contactService" name="service" required>
                                    <option value="">Select service</option>
                                    @foreach(($serviceSections ?? collect()) as $service)
                                        <option value="{{ $service->title }}" {{ old('service') === $service->title ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                    <option value="General Dental Enquiry" {{ old('service') === 'General Dental Enquiry' ? 'selected' : '' }}>
                                        General Dental Enquiry
                                    </option>
                                </select>
                            </div>
                            @error('service') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="contactMessage">Message / Dental Concern</label>
                            <div class="input-wrap textarea-wrap">
                                <i class="bi bi-chat-left-text"></i>
                                <textarea id="contactMessage" name="message" placeholder="Write your dental concern...">{{ old('message') }}</textarea>
                            </div>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <button type="submit" class="contact-primary-btn">
                        Submit Enquiry
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>

            <div class="contact-support-column">
                <div class="support-card premium-card premium-hover reveal-up reveal-delay-1">
                    <div class="support-icon premium-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>

                    <h3>WhatsApp Support</h3>

                    <p>Message the clinic directly for appointment support and dental visit guidance.</p>

                    <a href="{{ $whatsappLink }}" target="_blank" class="support-link">
                        WhatsApp Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="support-card premium-card premium-hover reveal-up reveal-delay-2">
                    <div class="support-icon premium-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>

                    <h3>Book Appointment</h3>

                    <p>Use the appointment page for a detailed appointment request form.</p>

                    <a href="{{ route('frontend.appointment') }}" class="support-link">
                        Open Appointment Page
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="support-card premium-card premium-hover reveal-up reveal-delay-3">
                    <div class="support-icon premium-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h3>Emergency Dental Concern?</h3>

                    <p>For sudden tooth pain, swelling or dental injury, call the clinic directly.</p>

                    <a href="{{ $callLink }}" class="support-link">
                        Call Clinic
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT FORM + QUICK SUPPORT END -->

<!-- MAP LOCATION START -->
<section class="contact-map-section section-padding">
    <div class="contact-page-glow map-glow-one"></div>
    <div class="contact-page-glow map-glow-two"></div>

    <div class="container">
        <div class="section-heading text-center reveal-up">
            <span class="section-badge">
                <i class="bi bi-map"></i>
                Google Map Location
            </span>

            <h2>Find us near Baba Chowk, Bank Colony, Keshri Nagar.</h2>

            <p>Use the map section or direction button to reach {{ $siteName }}.</p>
        </div>

        <div class="contact-map-wrapper">
            <div class="map-card premium-card reveal-up">
                <iframe title="{{ $siteName }} Location Map"
                    src="{{ $mapEmbedUrl }}"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="map-info-card premium-card premium-hover reveal-up reveal-delay-1">
                <div class="map-info-icon premium-icon">
                    <i class="bi bi-pin-map-fill"></i>
                </div>

                <span>Clinic Address</span>
                <h3>{{ $siteName }}</h3>

                <p>{{ $clinicAddress }}</p>

                <div class="map-info-list">
                    <div>
                        <i class="bi bi-geo-alt"></i>
                        <strong>Keshri Nagar / North Patel Nagar</strong>
                    </div>
                    <div>
                        <i class="bi bi-compass"></i>
                        <strong>Close to Rajeev Nagar area</strong>
                    </div>
                    <div>
                        <i class="bi bi-clock"></i>
                        <strong>{{ $clinicHours }}</strong>
                    </div>
                </div>

                <a href="{{ $mapDirectionUrl }}" target="_blank" class="contact-primary-btn">
                    Open Direction
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- MAP LOCATION END -->

<!-- NEARBY AREAS START -->
<section class="nearby-area-section section-padding">
    <div class="contact-page-glow nearby-glow-one"></div>
    <div class="contact-page-glow nearby-glow-two"></div>
    <div class="contact-page-pattern nearby-pattern"></div>

    <div class="container">
        <div class="section-heading text-center reveal-up">
            <span class="section-badge">
                <i class="bi bi-signpost-split"></i>
                Nearby Areas
            </span>

            <h2>Dental clinic location visibility for nearby patients.</h2>

            <p>
                Helpful local area mentions for patients searching for a dental clinic near
                Keshri Nagar, North Patel Nagar and Rajeev Nagar, Patna.
            </p>
        </div>

        <div class="nearby-area-grid">
            <div class="nearby-area-card premium-card premium-hover reveal-up reveal-delay-1">
                <span class="nearby-number">01</span>
                <div class="nearby-icon premium-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h3>Keshri Nagar</h3>
                <p>Located near Baba Chowk and Bank Colony for easy patient access.</p>
            </div>

            <div class="nearby-area-card premium-card premium-hover reveal-up reveal-delay-2">
                <span class="nearby-number">02</span>
                <div class="nearby-icon premium-icon">
                    <i class="bi bi-signpost"></i>
                </div>
                <h3>North Patel Nagar</h3>
                <p>Convenient dental clinic access for nearby North Patel Nagar patients.</p>
            </div>

            <div class="nearby-area-card premium-card premium-hover reveal-up reveal-delay-3">
                <span class="nearby-number">03</span>
                <div class="nearby-icon premium-icon">
                    <i class="bi bi-compass"></i>
                </div>
                <h3>Rajeev Nagar Area</h3>
                <p>Close to Rajeev Nagar area for dental consultation and clinic visits.</p>
            </div>
        </div>
    </div>
</section>
<!-- NEARBY AREAS END -->

<!-- CONTACT CTA START -->
<section class="contact-cta-section">
    <div class="contact-cta-glow contact-cta-glow-one"></div>
    <div class="contact-cta-glow contact-cta-glow-two"></div>

    <div class="container">
        <div class="contact-cta-card premium-card reveal-up">
            <div class="contact-cta-content">
                <span class="section-badge">
                    <i class="bi bi-calendar2-check"></i>
                    Book Your Visit
                </span>

                <h2>Need dental care near Baba Chowk, Patna?</h2>

                <p>
                    Call, WhatsApp or get directions to {{ $siteName }} for a clean,
                    comfortable and patient-friendly dental visit.
                </p>
            </div>

            <div class="contact-cta-actions">
                <a href="{{ route('frontend.appointment') }}" class="contact-primary-btn">
                    Book Appointment
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a href="{{ $callLink }}" class="contact-outline-btn">
                    <i class="bi bi-telephone-fill"></i>
                    Call Clinic
                </a>

                <a href="{{ $whatsappLink }}" target="_blank" class="contact-outline-btn">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT CTA END -->

@endsection
