@extends('frontend.master')
@section('content')

@php
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $contactNumber = $frontendContactNumber ?? '+91 96087 01058';
    $clinicAddress = $frontendClinicAddress ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
    $clinicHours = $frontendClinicHours ?? 'Mon - Sat, 10 AM - 8:30 PM';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $whatsappLink = $frontendWhatsappAppointmentLink ?? 'https://wa.me/919608701058';
    $mapDirectionUrl = $frontendMapDirectionUrl ?? 'https://www.google.com/maps?q=Keshri%20Nagar%20Patna%20800024';
@endphp

<!-- APPOINTMENT BREADCRUMB HERO START -->
<section class="appointment-breadcrumb-hero">
    <div class="appointment-page-glow appointment-page-glow-one"></div>
    <div class="appointment-page-glow appointment-page-glow-two"></div>
    <div class="appointment-page-pattern"></div>

    <div class="container">
        <div class="appointment-breadcrumb-box reveal-up">
            <div class="appointment-hero-kicker">
                <span class="section-badge">
                    <i class="bi bi-calendar2-check"></i>
                    Book Dental Appointment
                </span>

                <span class="appointment-hero-status">
                    <i class="bi bi-clock"></i>
                    {{ $clinicHours }}
                </span>
            </div>

            <h1>Book Your Visit at {{ $siteName }}</h1>

            <p>
                Request a dental appointment for consultation, teeth cleaning, root canal,
                smile designing, emergency dental care and other treatments.
            </p>

            <div class="appointment-hero-actions">
                <a href="{{ $callLink }}" class="appointment-primary-btn">
                    <i class="bi bi-telephone-fill"></i>
                    Call Clinic
                </a>

                <a href="{{ $whatsappLink }}" target="_blank" class="appointment-outline-btn">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>
            </div>

            <nav class="appointment-breadcrumb-nav" aria-label="breadcrumb">
                <a href="{{ route('frontend.home') }}">
                    <i class="bi bi-house-heart"></i>
                    Home
                </a>
                <i class="bi bi-chevron-right"></i>
                <span>Appointment</span>
            </nav>
        </div>
    </div>
</section>
<!-- APPOINTMENT BREADCRUMB HERO END -->

<!-- APPOINTMENT QUICK INFO START -->
<section class="appointment-quick-section">
    <div class="container">
        <div class="appointment-quick-grid premium-card reveal-up">
            <div class="appointment-quick-item">
                <div class="appointment-quick-icon premium-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                    <span>Call Clinic</span>
                    <strong>{{ $contactNumber }}</strong>
                </div>
            </div>

            <div class="appointment-quick-item">
                <div class="appointment-quick-icon premium-icon">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <div>
                    <span>Clinic Hours</span>
                    <strong>{{ $clinicHours }}</strong>
                </div>
            </div>

            <div class="appointment-quick-item">
                <div class="appointment-quick-icon premium-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <span>Clinic Location</span>
                    <strong>{{ \Illuminate\Support\Str::limit($clinicAddress, 36) }}</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- APPOINTMENT QUICK INFO END -->

<!-- APPOINTMENT FORM START -->
<section class="appointment-form-section section-padding">
    <div class="appointment-page-glow appointment-form-glow-one"></div>
    <div class="appointment-page-glow appointment-form-glow-two"></div>
    <div class="appointment-page-pattern appointment-form-pattern"></div>

    <div class="container">
        <div class="appointment-form-wrapper">
            <div class="appointment-form-card premium-card reveal-up">
                <span class="section-badge">
                    <i class="bi bi-envelope-heart"></i>
                    Appointment Request Form
                </span>

                <h2>Share your preferred visit details.</h2>

                <p>
                    Submit your appointment request and the clinic team will follow up for confirmation.
                </p>

                <form class="appointment-form" action="{{ route('appointment.request.store') }}" method="post">
                    @csrf

                    <div class="appointment-form-grid">
                        <div class="form-group">
                            <label for="patientName">Patient Name</label>
                            <div class="input-wrap">
                                <i class="bi bi-person"></i>
                                <input type="text" id="patientName" name="name" value="{{ old('name') }}" placeholder="Enter patient name" required>
                            </div>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="patientPhone">Mobile Number</label>
                            <div class="input-wrap">
                                <i class="bi bi-telephone"></i>
                                <input type="tel" id="patientPhone" name="phone" value="{{ old('phone') }}" placeholder="{{ $contactNumber }}" required>
                            </div>
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="patientEmail">Email ID</label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope"></i>
                                <input type="email" id="patientEmail" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                            </div>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="patientAge">Age</label>
                            <div class="input-wrap">
                                <i class="bi bi-person-vcard"></i>
                                <input type="number" id="patientAge" name="age" value="{{ old('age') }}" placeholder="Enter age" min="1" max="120">
                            </div>
                            @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="appointmentService">Required Dental Service</label>
                            <div class="input-wrap">
                                <i class="bi bi-heart-pulse"></i>
                                <select id="appointmentService" name="service" required>
                                    <option value="">Select service</option>
                                    @foreach(($serviceSections ?? collect()) as $service)
                                        <option value="{{ $service->title }}" {{ old('service') === $service->title ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                    <option value="General Dental Consultation" {{ old('service') === 'General Dental Consultation' ? 'selected' : '' }}>
                                        General Dental Consultation
                                    </option>
                                </select>
                            </div>
                            @error('service') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="visitType">Visit Type</label>
                            <div class="input-wrap">
                                <i class="bi bi-clipboard2-heart"></i>
                                <select id="visitType" name="visit_type">
                                    <option value="">Select visit type</option>
                                    <option value="Clinic Visit" {{ old('visit_type') === 'Clinic Visit' ? 'selected' : '' }}>Clinic Visit</option>
                                    <option value="Emergency" {{ old('visit_type') === 'Emergency' ? 'selected' : '' }}>Emergency</option>
                                    <option value="Follow-up" {{ old('visit_type') === 'Follow-up' ? 'selected' : '' }}>Follow-up</option>
                                </select>
                            </div>
                            @error('visit_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="appointmentDate">Preferred Appointment Date</label>
                            <div class="input-wrap">
                                <i class="bi bi-calendar-event"></i>
                                <input type="date" id="appointmentDate" name="date" value="{{ old('date') }}" required>
                            </div>
                            @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <label for="appointmentTime">Preferred Appointment Time</label>
                            <div class="input-wrap">
                                <i class="bi bi-clock"></i>
                                <select id="appointmentTime" name="time" required>
                                    <option value="">Select time</option>
                                    @foreach(['10:00 AM - 11:00 AM','11:00 AM - 12:00 PM','12:00 PM - 01:00 PM','01:00 PM - 02:00 PM','03:00 PM - 04:00 PM','04:00 PM - 05:00 PM','05:00 PM - 06:00 PM','06:00 PM - 07:00 PM','07:00 PM - 08:30 PM'] as $slot)
                                        <option value="{{ $slot }}" {{ old('time') === $slot ? 'selected' : '' }}>{{ $slot }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('time') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group form-group-full">
                            <label for="patientConcern">Message / Dental Concern</label>
                            <div class="input-wrap textarea-wrap">
                                <i class="bi bi-chat-left-text"></i>
                                <textarea id="patientConcern" name="message" placeholder="Write your dental concern, pain, swelling, sensitivity or treatment requirement...">{{ old('message') }}</textarea>
                            </div>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="appointment-form-actions">
                        <button type="submit" class="appointment-primary-btn">
                            Submit Appointment Request
                            <i class="bi bi-arrow-right"></i>
                        </button>

                        <a href="{{ $callLink }}" class="appointment-outline-btn">
                            <i class="bi bi-telephone-fill"></i>
                            Call Instead
                        </a>
                    </div>
                </form>
            </div>

            <div class="appointment-side-column">
                <div class="appointment-side-card premium-card premium-hover reveal-up reveal-delay-1">
                    <div class="appointment-side-icon premium-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h3>Request received by clinic</h3>

                    <p>
                        Appointment requests are saved for the clinic team to review and follow up.
                    </p>
                </div>

                <div class="appointment-side-card appointment-side-featured premium-card premium-hover reveal-up reveal-delay-2">
                    <div class="appointment-feature-badge">
                        <i class="bi bi-stars"></i>
                        Quick Support
                    </div>

                    <div class="appointment-side-icon premium-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>

                    <h3>Need quick appointment help?</h3>

                    <p>
                        Send a WhatsApp message for appointment support, timing confirmation or dental concern guidance.
                    </p>

                    <a href="{{ $whatsappLink }}" target="_blank" class="side-link">
                        WhatsApp Now
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="appointment-side-card premium-card premium-hover reveal-up reveal-delay-3">
                    <div class="appointment-side-icon premium-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h3>Emergency dental concern?</h3>

                    <p>
                        For sudden tooth pain, swelling, broken tooth or injury, call the clinic directly for quick guidance.
                    </p>

                    <a href="{{ $callLink }}" class="side-link">
                        Call Clinic
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- APPOINTMENT FORM END -->

<!-- APPOINTMENT PROCESS START -->
<section class="appointment-process-section section-padding">
    <div class="appointment-page-glow process-glow-one"></div>
    <div class="appointment-page-glow process-glow-two"></div>

    <div class="container">
        <div class="section-heading text-center reveal-up">
            <span class="section-badge">
                <i class="bi bi-list-check"></i>
                Visit Process
            </span>

            <h2>A simple appointment journey for a comfortable visit.</h2>

            <p>
                From appointment request to consultation, the page is planned to make patient communication easy.
            </p>
        </div>

        <div class="appointment-process-grid">
            <div class="process-card premium-card premium-hover reveal-up reveal-delay-1">
                <span class="process-number">01</span>
                <div class="process-icon premium-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <h3>Fill Details</h3>
                <p>Enter patient information, preferred date, preferred time and dental concern.</p>
            </div>

            <div class="process-card premium-card premium-hover reveal-up reveal-delay-2">
                <span class="process-number">02</span>
                <div class="process-icon premium-icon">
                    <i class="bi bi-telephone"></i>
                </div>
                <h3>Clinic Follow-up</h3>
                <p>The clinic team reviews your request and follows up for confirmation.</p>
            </div>

            <div class="process-card premium-card premium-hover reveal-up reveal-delay-3">
                <span class="process-number">03</span>
                <div class="process-icon premium-icon">
                    <i class="bi bi-heart-pulse"></i>
                </div>
                <h3>Visit Clinic</h3>
                <p>Visit {{ $siteName }} for consultation and patient-friendly treatment guidance.</p>
            </div>
        </div>
    </div>
</section>
<!-- APPOINTMENT PROCESS END -->

<!-- CLINIC TIMING LOCATION START -->
<section class="appointment-location-section section-padding">
    <div class="appointment-page-glow location-glow-one"></div>
    <div class="appointment-page-glow location-glow-two"></div>
    <div class="appointment-page-pattern location-pattern"></div>

    <div class="container">
        <div class="appointment-location-wrapper">
            <div class="appointment-location-content reveal-up">
                <span class="section-badge">
                    <i class="bi bi-geo-alt"></i>
                    Clinic Visit Details
                </span>

                <h2>Plan your dental visit near Baba Chowk, Patna.</h2>

                <p>{{ $clinicAddress }}</p>

                <div class="location-tags">
                    <span><i class="bi bi-geo-alt-fill"></i> Keshri Nagar</span>
                    <span><i class="bi bi-signpost"></i> North Patel Nagar</span>
                    <span><i class="bi bi-compass"></i> Rajeev Nagar Area</span>
                </div>

                <div class="location-actions">
                    <a href="{{ $mapDirectionUrl }}" target="_blank" class="appointment-primary-btn">
                        Get Directions
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <a href="{{ $callLink }}" class="appointment-outline-btn">
                        <i class="bi bi-telephone-fill"></i>
                        Call Clinic
                    </a>
                </div>
            </div>

            <div class="appointment-timing-card premium-card premium-hover reveal-up reveal-delay-1">
                <div class="timing-icon premium-icon">
                    <i class="bi bi-clock-fill"></i>
                </div>

                <span>Clinic Timing</span>
                <h3>{{ $clinicHours }}</h3>

                <p>Please call before visiting for confirmation.</p>

                <div class="timing-closed">
                    <i class="bi bi-calendar-x"></i>
                    Closed Sunday
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CLINIC TIMING LOCATION END -->

<!-- APPOINTMENT CTA START -->
<section class="appointment-cta-section">
    <div class="appointment-cta-glow appointment-cta-glow-one"></div>
    <div class="appointment-cta-glow appointment-cta-glow-two"></div>

    <div class="container">
        <div class="appointment-cta-card premium-card reveal-up">
            <div class="appointment-cta-content">
                <span class="section-badge">
                    <i class="bi bi-calendar2-check"></i>
                    Need Help Booking?
                </span>

                <h2>Call or WhatsApp for appointment support.</h2>

                <p>
                    Reach {{ $siteName }} for appointment, clinic timing, dental concern and direction support.
                </p>
            </div>

            <div class="appointment-cta-actions">
                <a href="{{ $callLink }}" class="appointment-primary-btn">
                    <i class="bi bi-telephone-fill"></i>
                    Call Clinic
                </a>

                <a href="{{ $whatsappLink }}" target="_blank" class="appointment-outline-btn">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
<!-- APPOINTMENT CTA END -->

@endsection
