
@extends('frontend.master')
@section('content')

@php
    $doctor = $dentistProfileSection ?? null;
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $clinicAddress = $frontendClinicAddress ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $clinicHours = $frontendClinicHours ?? 'Mon - Sat, 10 AM - 8:30 PM';
    $contactNumber = $frontendContactNumber ?? '+91 96087 01058';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $doctorName = $doctor?->doctor_name ?: 'Dr. Richa';
    $doctorDesignation = $doctor?->designation ?: 'Dental Care Specialist';
    $profileTag = $doctor?->profile_tag ?: 'Dentist Profile';
    $doctorDescription = $doctor?->description ?: 'Doctor qualification, experience and specialization details can be updated here after receiving the final profile from the clinic. This section is designed to present the doctor as a calm, trusted and patient-friendly dental professional.';
    $doctorImage = $doctor?->getFirstMediaUrl('dentist_profile_image') ?: asset('assets/img/img6.png');
    $buttonOneText = $doctor?->button_1_text ?: 'Book Appointment';
    $buttonOneUrl = $doctor?->button_1_url ?: route('frontend.appointment');
    $buttonTwoText = $doctor?->button_2_text ?: 'Call Clinic';
    $buttonTwoUrl = $doctor?->button_2_url ?: $callLink;
    $quickStats = [
        [
            'icon' => $doctor?->quick_stat_1_icon ?: 'bi bi-heart-pulse',
            'title' => $doctor?->quick_stat_1_title ?: 'Modern',
            'text' => $doctor?->quick_stat_1_text ?: 'Dental Care',
        ],
        [
            'icon' => $doctor?->quick_stat_2_icon ?: 'bi bi-person-heart',
            'title' => $doctor?->quick_stat_2_title ?: 'Patient',
            'text' => $doctor?->quick_stat_2_text ?: 'First Approach',
        ],
        [
            'icon' => $doctor?->quick_stat_3_icon ?: 'bi bi-stars',
            'title' => $doctor?->quick_stat_3_title ?: 'Clean',
            'text' => $doctor?->quick_stat_3_text ?: 'Clinic Experience',
        ],
    ];
@endphp


 <!-- DENTIST BREADCRUMB HERO START -->
    <section class="dentist-breadcrumb-hero">
        <div class="breadcrumb-glow breadcrumb-glow-one"></div>
        <div class="breadcrumb-glow breadcrumb-glow-two"></div>
        <div class="breadcrumb-pattern"></div>

        <div class="container">
            <div class="breadcrumb-hero-box reveal-up">

                <span class="section-badge">
                    <i class="bi bi-person-badge"></i>
                    {{ $profileTag }}
                </span>

                <h1>Meet {{ $doctorName }}</h1>

                <p>
                    Learn more about {{ $siteName }}, treatment approach, dental focus areas
                    and patient-friendly care experience in Keshri Nagar, Patna.
                </p>

                <nav class="breadcrumb-nav" aria-label="breadcrumb">
                    <a href="{{ route('frontend.home') }}">
                        <i class="bi bi-house-heart"></i>
                        Home
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <span>{{ $profileTag }}</span>
                </nav>

            </div>
        </div>
    </section>
    <!-- DENTIST BREADCRUMB HERO END -->


    <!-- DOCTOR PROFILE INTRO START -->
    <section class="dentist-profile-intro section-padding">
        <div class="dentist-bg-glow dentist-intro-glow-one"></div>
        <div class="dentist-bg-glow dentist-intro-glow-two"></div>
        <div class="dentist-section-pattern"></div>

        <div class="container">
            <div class="dentist-profile-wrapper">

                <!-- DOCTOR IMAGE START -->
                <div class="dentist-profile-visual reveal-up reveal-delay-1">

                    <div class="dentist-image-card premium-card">
                        <img src="{{ $doctorImage }}" alt="{{ $doctorName }}">

                        <div class="dentist-image-overlay"></div>

                        <div class="dentist-name-card">
                            <span class="dentist-name-icon">
                                <i class="bi bi-person-heart"></i>
                            </span>

                            <div>
                                <strong>{{ $doctorName }}</strong>
                                <small>{{ $doctorDesignation }}</small>
                            </div>
                        </div>

                        <div class="dentist-top-chip">
                            <i class="bi bi-shield-check"></i>
                            <span>Comfort-focused care</span>
                        </div>
                    </div>

                    <div class="dentist-quick-stats premium-card">
                        @foreach($quickStats as $quickStat)
                            <div>
                                <i class="{{ $quickStat['icon'] }}"></i>
                                <strong>{{ $quickStat['title'] }}</strong>
                                <span>{{ $quickStat['text'] }}</span>
                            </div>
                        @endforeach
                    </div>

                </div>
                <!-- DOCTOR IMAGE END -->


                <!-- DOCTOR CONTENT START -->
                <div class="dentist-profile-content reveal-up reveal-delay-2">

                    <span class="section-badge">
                        <i class="bi bi-stars"></i>
                        Doctor Introduction
                    </span>

                    <h2>{{ $doctor?->availability_title ?: 'Gentle guidance for confident dental decisions.' }}</h2>

                    <p>
                        {{ $doctorDescription }}
                    </p>

                    <div class="dentist-note-card premium-card premium-hover">
                        <div class="dentist-note-icon premium-icon">
                            <i class="bi bi-chat-heart"></i>
                        </div>

                        <div>
                            <h3>Clear consultation before every treatment.</h3>
                            <p>
                                {{ $doctor?->availability_note ?: 'The focus is on clean treatment planning, patient comfort and simple explanation before dental procedures.' }}
                            </p>
                        </div>
                    </div>

                    <div class="doctor-chip-list">
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor?->qualification_value ?: 'Dental Consultation' }}</span>
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor?->specialization_value ?: 'Root Canal Treatment' }}</span>
                        <span><i class="bi bi-check2-circle"></i> {{ $doctor?->experience_text ?: 'Cosmetic Dentistry' }}</span>
                    </div>

                    <div class="dentist-profile-actions">
                        <a href="{{ $buttonOneUrl }}" class="dentist-primary-btn">
                            {{ $buttonOneText }}
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="{{ $buttonTwoUrl }}" class="dentist-outline-btn">
                            <i class="bi bi-telephone-fill"></i>
                            {{ $buttonTwoText }}
                        </a>
                    </div>

                </div>
                <!-- DOCTOR CONTENT END -->

            </div>
        </div>
    </section>
    <!-- DOCTOR PROFILE INTRO END -->


    <!-- DOCTOR DETAILS START -->
    <section class="dentist-details-section section-padding">
        <div class="container">

            <div class="section-heading text-center reveal-up">
                <span class="section-badge">
                    <i class="bi bi-person-vcard"></i>
                    Doctor Details
                </span>

                <h2>Professional profile information for patients.</h2>

                <p>
                    Keep doctor name, clinic location, timings and consultation focus visible in a
                    clean and trust-building layout.
                </p>
            </div>

            <div class="dentist-details-grid">

                <div class="dentist-profile-card premium-card premium-hover reveal-up reveal-delay-1">
                    <div class="profile-card-head">
                        <span class="premium-icon">
                            <i class="bi bi-person-badge"></i>
                        </span>

                        <div>
                            <strong>Doctor Details</strong>
                            <small>Update final details anytime</small>
                        </div>
                    </div>

                    <div class="profile-info-list">
                        <div class="profile-info-item">
                            <small>Doctor Name</small>
                            <strong>{{ $doctorName }}</strong>
                        </div>

                        <div class="profile-info-item">
                            <small>Clinic Name</small>
                            <strong>{{ $siteName }}</strong>
                        </div>

                        <div class="profile-info-item">
                            <small>Location</small>
                            <strong>{{ \Illuminate\Support\Str::limit($clinicAddress, 36) }}</strong>
                        </div>

                        <div class="profile-info-item">
                            <small>Clinic Hours</small>
                            <strong>{{ $clinicHours }}</strong>
                        </div>
                    </div>
                </div>

                <div class="dentist-detail-highlight premium-card premium-hover reveal-up reveal-delay-2">
                    <div class="detail-highlight-icon premium-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h3>Patient-first dental care approach.</h3>

                    <p>
                        {{ $siteName }} focuses on clear explanation, clean treatment planning,
                        patient comfort and a calm dental visit experience.
                    </p>

                    <div class="detail-highlight-list">
                        <span><i class="bi bi-check2-circle"></i> Clear treatment explanation</span>
                        <span><i class="bi bi-check2-circle"></i> Hygiene-focused clinic environment</span>
                        <span><i class="bi bi-check2-circle"></i> Easy appointment support</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- DOCTOR DETAILS END -->


    <!-- SPECIALIZATION START -->
    <section class="dentist-specialization-section section-padding">
        <div class="dentist-bg-glow specialization-glow-one"></div>
        <div class="dentist-bg-glow specialization-glow-two"></div>

        <div class="container">

            <div class="section-heading text-center reveal-up">
                <span class="section-badge">
                    <i class="bi bi-grid"></i>
                    Dental Focus Areas
                </span>

                <h2>Specialized dental care with a patient-first approach.</h2>

                <p>
                    These focus areas can be updated with final specialization and qualification details
                    provided by the clinic.
                </p>
            </div>

            <div class="specialization-grid">

                <div class="specialization-card premium-card premium-hover reveal-up reveal-delay-1">
                    <span class="specialization-number">01</span>

                    <div class="specialization-icon premium-icon">
                        <i class="bi bi-clipboard2-pulse"></i>
                    </div>

                    <h3>Dental Consultation</h3>

                    <p>
                        Clear check-up, dental concern review and treatment guidance for every patient.
                    </p>

                    <span class="card-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div
                    class="specialization-card specialization-featured premium-card premium-hover reveal-up reveal-delay-2">
                    <span class="specialization-number">02</span>

                    <div class="specialization-badge">
                        <i class="bi bi-stars"></i>
                        Core Focus
                    </div>

                    <div class="specialization-icon premium-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h3>Root Canal Treatment</h3>

                    <p>
                        Comfort-focused care to help save infected or painful natural teeth.
                    </p>

                    <span class="card-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

                <div class="specialization-card premium-card premium-hover reveal-up reveal-delay-3">
                    <span class="specialization-number">03</span>

                    <div class="specialization-icon premium-icon">
                        <i class="bi bi-gem"></i>
                    </div>

                    <h3>Cosmetic Dentistry</h3>

                    <p>
                        Smile-focused treatments for natural, confident and attractive dental appearance.
                    </p>

                    <span class="card-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>
                </div>

            </div>

        </div>
    </section>
    <!-- SPECIALIZATION END -->


    <!-- CARE METHOD START -->
    <section class="dentist-method-section section-padding">
        <div class="dentist-bg-glow method-glow-one"></div>
        <div class="dentist-bg-glow method-glow-two"></div>
        <div class="dentist-section-pattern method-pattern"></div>

        <div class="container">
            <div class="dentist-method-wrapper">

                <div class="method-left-card premium-card reveal-up">
                    <span class="section-badge">
                        <i class="bi bi-shield-check"></i>
                        Treatment Philosophy
                    </span>

                    <h2>Every visit is planned around comfort, hygiene and clarity.</h2>

                    <p>
                        {{ $siteName }} focuses on a calm dental journey where patients understand
                        the treatment process, feel comfortable and get proper care guidance.
                    </p>

                    <div class="method-mini-points">
                        <span><i class="bi bi-check2-circle"></i> Patient comfort</span>
                        <span><i class="bi bi-check2-circle"></i> Clear guidance</span>
                    </div>
                </div>

                <div class="method-step-list">

                    <div class="method-step premium-card premium-hover reveal-up reveal-delay-1">
                        <span class="method-step-number premium-icon">01</span>

                        <div>
                            <h3>Listen & Understand</h3>
                            <p>Patient concerns are understood carefully before planning any treatment.</p>
                        </div>
                    </div>

                    <div class="method-step premium-card premium-hover reveal-up reveal-delay-2">
                        <span class="method-step-number premium-icon">02</span>

                        <div>
                            <h3>Explain Treatment</h3>
                            <p>Treatment options and care steps are explained in simple language.</p>
                        </div>
                    </div>

                    <div class="method-step premium-card premium-hover reveal-up reveal-delay-3">
                        <span class="method-step-number premium-icon">03</span>

                        <div>
                            <h3>Comfort-focused Care</h3>
                            <p>Dental procedures are planned with hygiene, comfort and patient confidence.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- CARE METHOD END -->


    <!-- DOCTOR CTA START -->
    <section class="dentist-cta-section">
        <div class="dentist-cta-glow dentist-cta-glow-one"></div>
        <div class="dentist-cta-glow dentist-cta-glow-two"></div>

        <div class="container">
            <div class="dentist-cta-card premium-card reveal-up">

                <div class="dentist-cta-content">
                    <span class="section-badge">
                        <i class="bi bi-calendar2-check"></i>
                        Book Your Visit
                    </span>

                    <h2>Want to consult {{ $doctorName }} for your dental concern?</h2>

                    <p>
                        Call or book your appointment with {{ $siteName }} for a clean,
                        comfortable and patient-friendly dental visit.
                    </p>
                </div>

                <div class="dentist-cta-actions">
                    <a href="{{ $buttonOneUrl }}" class="dentist-primary-btn">
                        {{ $buttonOneText }}
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="{{ $buttonTwoUrl }}" class="dentist-outline-btn">
                        <i class="bi bi-telephone-fill"></i>
                        {{ $buttonTwoText }}
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- DOCTOR CTA END -->




  @endsection 
