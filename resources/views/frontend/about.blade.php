@extends('frontend.master')
@section('content')

@php
    $about = $aboutPageSection ?? null;
    $doctor = $dentistProfileSection ?? null;
    $aboutImage = $about?->getFirstMediaUrl('about_intro_image') ?: asset('assets/img/img2.png');
    $doctorImage = $doctor?->getFirstMediaUrl('dentist_profile_image') ?: asset('assets/img/img5.png');
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $clinicAddress = $frontendClinicAddress ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $clinicHours = $frontendClinicHours ?? 'Mon - Sat, 10 AM - 8:30 PM';
    $contactNumber = $frontendContactNumber ?? '+91 96087 01058';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $introTag = $about->intro_tag ?? 'Clinic Introduction';
    $introTitle = $about->intro_title ?? 'Soft, clean and comfortable dental care experience.';
    $introDescription = $about->intro_description_1 ?? 'Dr. Richa Dental Care provides professional dental treatments with a focus on hygiene, comfort and clear patient guidance.';
    $introDescriptionTwo = $about->intro_description_2 ?? 'The clinic is located near Baba Chowk, Bank Colony, Keshri Nagar, Patna and is easily accessible from North Patel Nagar and Rajeev Nagar.';
    $doctorName = $doctor->doctor_name ?? 'Dr. Richa';
    $doctorDesignation = $doctor->designation ?? 'Dental Care Specialist';
    $doctorDescription = $doctor->description ?? 'Focused on clean treatment planning, patient comfort and clear explanation before every dental procedure.';
@endphp


    <!-- ABOUT BREADCRUMB HERO START -->
    <section class="about-page-hero">
        <div class="about-hero-glow about-hero-glow-one"></div>
        <div class="about-hero-glow about-hero-glow-two"></div>

        <div class="container">
            <div class="about-hero-box">

                <div class="about-hero-content">
                    <span class="section-badge">
                        <i class="bi bi-hospital"></i>
                        About {{ $siteName }}
                    </span>

                    <h1>
                        Gentle, clean and premium dental care in
                        <span>Keshri Nagar, Patna.</span>
                    </h1>

                    <p>
                        {{ $siteName }} is designed to provide a calm, hygienic and patient-friendly
                        dental experience near Baba Chowk, Bank Colony, Keshri Nagar, Patna.
                    </p>

                    <nav class="about-breadcrumb" aria-label="breadcrumb">
                        <a href="{{ route('frontend.home') }}">Home</a>
                        <i class="bi bi-chevron-right"></i>
                        <span>About Clinic</span>
                    </nav>
                </div>

                <div class="about-hero-card">
                    <div class="hero-info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <small>Clinic Location</small>
                            <strong>{{ \Illuminate\Support\Str::limit($clinicAddress, 36) }}</strong>
                        </div>
                    </div>

                    <div class="hero-info-item">
                        <i class="bi bi-clock-fill"></i>
                        <div>
                            <small>Clinic Hours</small>
                            <strong>{{ $clinicHours }}</strong>
                        </div>
                    </div>

                    <div class="hero-info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <small>Call Clinic</small>
                            <strong>{{ $contactNumber }}</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ABOUT BREADCRUMB HERO END -->


    <!-- CLINIC INTRO START -->
    <section class="about-intro-section section-padding">
        <div class="about-bg-glow about-glow-one"></div>
        <div class="about-bg-glow about-glow-two"></div>
        <div class="about-intro-pattern"></div>

        <div class="container">
            <div class="about-intro-wrapper">

                <!-- LEFT VISUAL START -->
                <div class="about-intro-visual">

                    <div class="about-main-image">
                        <img src="{{ $aboutImage }}" alt="{{ $introTitle }}">

                        <div class="about-image-label">
                            <span class="about-image-label-icon">
                                <i class="bi bi-shield-check"></i>
                            </span>

                            <span>
                                <strong>Clean & Comfort-focused</strong>
                                <small>Dental wellness care</small>
                            </span>
                        </div>

                        <div class="about-image-top-chip">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Modern dental clinic in Patna</span>
                        </div>
                    </div>

                    <div class="about-stats-row mt-3">
                        <div>
                            <span class="about-stat-icon">
                                <i class="bi bi-person-heart"></i>
                            </span>
                            <strong>Patient</strong>
                            <small>First Approach</small>
                        </div>

                        <div>
                            <span class="about-stat-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </span>
                            <strong>Modern</strong>
                            <small>Dental Care</small>
                        </div>

                        <div>
                            <span class="about-stat-icon">
                                <i class="bi bi-stars"></i>
                            </span>
                            <strong>Calm</strong>
                            <small>Clinic Experience</small>
                        </div>
                    </div>

                </div>
                <!-- LEFT VISUAL END -->


                <!-- RIGHT CONTENT START -->
                <div class="about-intro-content">

                    <span class="section-badge">
                        <i class="bi bi-stars"></i>
                        {{ $introTag }}
                    </span>

                    <h2>{{ $introTitle }}</h2>

                    <p>
                        {{ $introDescription }}
                        @if($introDescriptionTwo)
                            {{ $introDescriptionTwo }}
                        @endif
                    </p>

                    <div class="about-note-card">
                        <div class="about-note-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>

                        <div>
                            <h3>Dental care with clarity and comfort.</h3>
                            <p>
                                {{ $about->approach_description ?? 'From consultation to treatment explanation, the experience is planned to help patients feel relaxed, informed and confident.' }}
                            </p>
                        </div>
                    </div>

                    <div class="about-feature-list">

                        <div class="about-feature-item">
                            <span class="feature-check">
                                <i class="bi bi-check2"></i>
                            </span>

                            <span>{{ $about->feature_1_title ?? 'Clean and patient-friendly clinic environment' }}</span>
                        </div>

                        <div class="about-feature-item">
                            <span class="feature-check">
                                <i class="bi bi-check2"></i>
                            </span>

                            <span>{{ $about->feature_2_title ?? 'Modern dental services for family dental care' }}</span>
                        </div>

                        <div class="about-feature-item">
                            <span class="feature-check">
                                <i class="bi bi-check2"></i>
                            </span>

                            <span>{{ $about->feature_3_title ?? 'Easy call, WhatsApp and appointment support' }}</span>
                        </div>

                    </div>

                    <div class="about-intro-actions">
                        <a href="{{ $about?->intro_button_url ?: route('frontend.appointment') }}" class="about-intro-primary">
                            {{ $about?->intro_button_text ?: 'Book Appointment' }}
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="{{ $callLink }}" class="about-intro-secondary">
                            <i class="bi bi-telephone-fill"></i>
                            Call Clinic
                        </a>
                    </div>

                </div>
                <!-- RIGHT CONTENT END -->

            </div>
        </div>
    </section>
    <!-- CLINIC INTRO END -->


    <!-- CARE APPROACH START -->
    <section class="care-approach-section section-padding">
        <div class="care-bg-glow care-glow-one"></div>
        <div class="care-bg-glow care-glow-two"></div>
        <div class="care-pattern"></div>

        <div class="container">

            <div class="section-heading text-center care-heading">
                <span class="section-badge">
                    <i class="bi bi-person-heart"></i>
                    Patient Care Approach
                </span>

                <h2>Every visit is planned around trust, hygiene and comfort.</h2>

                <p>
                    The clinic focuses on a calm environment, proper treatment guidance and easy
                    patient communication before and after dental procedures.
                </p>
            </div>

            <div class="care-grid">

                <div class="care-card">
                    <span class="care-number">01</span>

                    <div class="care-icon">
                        <i class="bi bi-chat-heart"></i>
                    </div>

                    <div class="care-content">
                        <h3>Clear Consultation</h3>
                        <p>
                            Patients receive simple explanation of dental concerns, treatment options and care steps.
                        </p>
                    </div>

                    <span class="care-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div class="care-card care-card-featured">
                    <span class="care-number">02</span>

                    <div class="care-feature-badge">
                        <i class="bi bi-stars"></i>
                        Most Focused
                    </div>

                    <div class="care-icon">
                        <i class="bi bi-shield-plus"></i>
                    </div>

                    <div class="care-content">
                        <h3>Hygiene Focused</h3>
                        <p>
                            Clean surroundings and patient-safe care practices help create confidence during visits.
                        </p>
                    </div>

                    <span class="care-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div class="care-card">
                    <span class="care-number">03</span>

                    <div class="care-icon">
                        <i class="bi bi-emoji-smile"></i>
                    </div>

                    <div class="care-content">
                        <h3>Comfort First</h3>
                        <p>
                            The treatment experience is kept gentle, calm and supportive for every age group.
                        </p>
                    </div>

                    <span class="care-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

            </div>

        </div>
    </section>
    <!-- CARE APPROACH END -->


    <!-- MISSION VISION START -->
    <section class="mission-section section-padding">
        <div class="mission-bg-glow mission-glow-one"></div>
        <div class="mission-bg-glow mission-glow-two"></div>
        <div class="mission-pattern"></div>

        <div class="container">
            <div class="mission-wrapper">

                <!-- MISSION CONTENT START -->
                <div class="mission-content">
                    <span class="section-badge mission-badge">
                        <i class="bi bi-bullseye"></i>
                        Mission & Vision
                    </span>

                    <h2>{{ $about->mission_title ?? 'Building healthier smiles with a premium patient-first experience.' }}</h2>

                    <p>
                        {{ $about->mission_description ?? "{$siteName} aims to provide reliable dental treatments with clean clinic standards, easy appointment access and a friendly consultation experience." }}
                    </p>

                    <div class="mission-highlight">
                        <div class="mission-highlight-icon">
                            <i class="bi bi-heart-pulse"></i>
                        </div>

                        <div>
                            <strong>{{ $about->approach_title ?? 'Focused on trust and clarity.' }}</strong>
                            <span>
                                {{ $about->approach_description ?? 'Every treatment journey is planned with patient comfort, hygiene and clear guidance.' }}
                            </span>
                        </div>
                    </div>
                </div>
                <!-- MISSION CONTENT END -->


                <!-- MISSION CARDS START -->
                <div class="mission-cards">

                    <div class="mission-card mission-card-primary">
                        <span class="mission-card-number">01</span>

                        <div class="mission-icon">
                            <i class="bi bi-flag"></i>
                        </div>

                        <h3>{{ $about->mission_title ?? 'Our Mission' }}</h3>

                        <p>
                            {{ $about->mission_description ?? 'To provide hygienic, comfortable and clear dental care for patients and families in Keshri Nagar, North Patel Nagar and nearby Patna areas.' }}
                        </p>

                        <div class="mission-card-line"></div>
                    </div>

                    <div class="mission-card">
                        <span class="mission-card-number">02</span>

                        <div class="mission-icon">
                            <i class="bi bi-eye"></i>
                        </div>

                        <h3>{{ $about->vision_title ?? 'Our Vision' }}</h3>

                        <p>
                            {{ $about->vision_description ?? 'To become a trusted local dental clinic known for premium care, patient comfort and confident smile transformations.' }}
                        </p>

                        <div class="mission-card-line"></div>
                    </div>

                </div>
                <!-- MISSION CARDS END -->

            </div>

            <!-- VALUES STRIP START -->
            <div class="mission-values-strip">

                <div class="mission-value-item">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <strong>Hygiene</strong>
                        <span>Clean care environment</span>
                    </div>
                </div>

                <div class="mission-value-item">
                    <i class="bi bi-chat-heart"></i>
                    <div>
                        <strong>Guidance</strong>
                        <span>Clear treatment explanation</span>
                    </div>
                </div>

                <div class="mission-value-item">
                    <i class="bi bi-emoji-smile"></i>
                    <div>
                        <strong>Comfort</strong>
                        <span>Calm patient experience</span>
                    </div>
                </div>

            </div>
            <!-- VALUES STRIP END -->

        </div>
    </section>
    <!-- MISSION VISION END -->


    <!-- FACILITIES START -->
    <section class="facility-section section-padding">
        <div class="facility-bg-glow facility-glow-one"></div>
        <div class="facility-bg-glow facility-glow-two"></div>
        <div class="facility-pattern"></div>

        <div class="container">

            <div class="section-heading text-center facility-heading">
                <span class="section-badge">
                    <i class="bi bi-grid-1x2"></i>
                    Clinic Facilities
                </span>

                <h2>Modern facilities for a clean dental wellness experience.</h2>

                <p>
                    Premium frontend cards can be updated with real clinic photos, equipment details and
                    treatment room images when final assets are available.
                </p>
            </div>

            <div class="facility-grid">

                <div class="facility-card facility-card-featured">
                    <span class="facility-number">01</span>

                    <div class="facility-icon">
                        <i class="bi bi-hospital"></i>
                    </div>

                    <div class="facility-content">
                        <h3>Modern Treatment Room</h3>
                        <p>
                            Clean and comfortable treatment environment for routine and advanced dental care,
                            planned with a calm clinic experience.
                        </p>
                    </div>

                    <div class="facility-meta">
                        <span><i class="bi bi-check2-circle"></i> Clean Setup</span>
                        <span><i class="bi bi-check2-circle"></i> Comfort Care</span>
                    </div>

                    <div class="facility-image-box">
                        <img src="{{ asset('assets/img/img4.png') }}" alt="Modern dental treatment room">
                        <div class="facility-image-badge">
                            <i class="bi bi-shield-check"></i>
                            <span>Clean Treatment Space</span>
                        </div>
                    </div>
                </div>

                <div class="facility-card">
                    <span class="facility-number">02</span>

                    <div class="facility-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div class="facility-content">
                        <h3>Hygiene Care</h3>
                        <p>
                            Patient-safe hygiene approach with clean surroundings and proper care guidance.
                        </p>
                    </div>

                    <span class="facility-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div class="facility-card">
                    <span class="facility-number">03</span>

                    <div class="facility-icon">
                        <i class="bi bi-camera"></i>
                    </div>

                    <div class="facility-content">
                        <h3>Dental Imaging Support</h3>
                        <p>
                            Dental X-ray and diagnosis support area can be showcased with final clinic content.
                        </p>
                    </div>

                    <span class="facility-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div class="facility-card">
                    <span class="facility-number">04</span>

                    <div class="facility-icon">
                        <i class="bi bi-calendar2-check"></i>
                    </div>

                    <div class="facility-content">
                        <h3>Appointment Support</h3>
                        <p>
                            Easy call, WhatsApp and frontend appointment form layout for quick patient enquiry.
                        </p>
                    </div>

                    <span class="facility-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

            </div>

        </div>
    </section>
    <!-- FACILITIES END -->


    <!-- DOCTOR INTRO START -->
    <section class="about-doctor-section section-padding">
        <div class="about-doctor-glow doctor-glow-one"></div>
        <div class="about-doctor-glow doctor-glow-two"></div>
        <div class="about-doctor-pattern"></div>

        <div class="container">
            <div class="about-doctor-wrapper">

                <!-- DOCTOR IMAGE START -->
                <div class="about-doctor-visual">

                    <div class="about-doctor-image">
                        <img src="{{ $doctorImage }}" alt="{{ $doctorName }}">

                        <div class="doctor-image-overlay"></div>

                        <div class="doctor-mini-badge">
                            <span class="doctor-mini-icon">
                                <i class="bi bi-person-badge"></i>
                            </span>

                            <span>
                                <strong>{{ $doctorName }}</strong>
                                <small>{{ $doctorDesignation }}</small>
                            </span>
                        </div>

                        <div class="doctor-top-badge">
                            <i class="bi bi-shield-check"></i>
                            <span>Comfort-focused care</span>
                        </div>
                    </div>

                    <div class="doctor-quick-stats">
                        <div>
                            <i class="bi bi-heart-pulse"></i>
                            <strong>Modern</strong>
                            <span>Dental Care</span>
                        </div>

                        <div>
                            <i class="bi bi-person-heart"></i>
                            <strong>Patient</strong>
                            <span>First Approach</span>
                        </div>

                        <div>
                            <i class="bi bi-stars"></i>
                            <strong>Clean</strong>
                            <span>Clinic Experience</span>
                        </div>
                    </div>

                </div>
                <!-- DOCTOR IMAGE END -->


                <!-- DOCTOR CONTENT START -->
                <div class="about-doctor-content">

                    <span class="section-badge">
                        <i class="bi bi-person-heart"></i>
                        Meet The Doctor
                    </span>

                    <h2>Meet {{ $doctorName }}</h2>

                    <p>
                        {{ $doctorDescription }}
                    </p>

                    <div class="doctor-note-card">
                        <div class="doctor-note-icon">
                            <i class="bi bi-chat-heart"></i>
                        </div>

                        <div>
                            <h3>Gentle guidance for confident dental decisions.</h3>
                            <p>
                                {{ $doctor->availability_note ?? 'Focused on clean treatment planning, patient comfort and clear explanation before every dental procedure.' }}
                            </p>
                        </div>
                    </div>

                    <div class="doctor-chip-list">
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor->qualification_value ?? 'Dental Consultation' }}</span>
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor->specialization_value ?? 'Root Canal Treatment' }}</span>
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor->experience_text ?? 'Cosmetic Dentistry' }}</span>
                    </div>

                    <div class="about-doctor-actions">
                        <a href="{{ route('frontend.dentist-profile') }}" class="about-page-btn">
                            View Doctor Profile
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="{{ route('frontend.appointment') }}" class="about-outline-btn">
                            <i class="bi bi-calendar2-check"></i>
                            Book Appointment
                        </a>
                    </div>

                </div>
                <!-- DOCTOR CONTENT END -->

            </div>
        </div>
    </section>
    <!-- DOCTOR INTRO END -->


    <!-- ABOUT CTA START -->
    <section class="about-cta-section">
        <div class="about-cta-glow about-cta-glow-one"></div>
        <div class="about-cta-glow about-cta-glow-two"></div>
        <div class="about-cta-pattern"></div>

        <div class="container">
            <div class="about-cta-card">

                <div class="about-cta-content">
                    <span class="section-badge about-cta-badge">
                        <i class="bi bi-calendar2-check"></i>
                        Book Your Visit
                    </span>

                    <h2>Need dental care near Baba Chowk, Keshri Nagar?</h2>

                    <p>
                        Call or book your appointment with {{ $siteName }} for a clean,
                        comfortable and patient-friendly dental visit.
                    </p>

                    <div class="about-cta-points">
                        <span>
                            <i class="bi bi-check2-circle"></i>
                            Easy Appointment
                        </span>

                        <span>
                            <i class="bi bi-check2-circle"></i>
                            Patient Friendly
                        </span>
                    </div>
                </div>

                <div class="about-cta-action-card">
                    <div class="about-cta-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h3>Ready for a comfortable dental visit?</h3>

                    <p>
                        Connect with the clinic and get quick appointment support.
                    </p>

                    <div class="about-cta-actions">
                        <a href="{{ route('frontend.appointment') }}" class="about-page-btn">
                            Book Appointment
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="{{ $callLink }}" class="about-outline-btn">
                            <i class="bi bi-telephone-fill"></i>
                            Call Clinic
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ABOUT CTA END -->

@endsection
