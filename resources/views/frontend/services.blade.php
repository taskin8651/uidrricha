@extends('frontend.master')
@section('content')

@php
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
@endphp

<!-- SERVICES BREADCRUMB HERO START -->
<section class="services-breadcrumb-hero">
  <div class="service-page-glow service-page-glow-one"></div>
  <div class="service-page-glow service-page-glow-two"></div>
  <div class="service-page-pattern"></div>

  <div class="container">
    <div class="services-breadcrumb-box reveal-up">
      <span class="section-badge">
        <i class="bi bi-grid"></i>
        Dental Services
      </span>

      <h1>Complete Dental Care Services</h1>

      <p>
        Explore clean, modern and patient-friendly dental services at {{ $siteName }}.
      </p>

      <nav class="services-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-heart"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Services</span>
      </nav>
    </div>
  </div>
</section>
<!-- SERVICES BREADCRUMB HERO END -->

<!-- SERVICES INTRO START -->
<section class="services-intro-section section-padding">
  <div class="service-page-glow service-intro-glow-one"></div>
  <div class="service-page-glow service-intro-glow-two"></div>

  <div class="container">
    <div class="services-intro-wrapper">
      <div class="services-intro-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Premium Dental Wellness
        </span>

        <h2>Designed for comfort, hygiene and confident smiles.</h2>

        <p>
          {{ $siteName }} provides dental consultation, teeth cleaning, root canal,
          cosmetic dentistry, preventive care and emergency dental support with a calm,
          hygienic and patient-first approach.
        </p>
      </div>

      <div class="services-intro-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="services-intro-icon premium-icon">
          <i class="bi bi-heart-pulse"></i>
        </div>

        <div class="services-intro-card-content">
          <h3>Clear guidance before every treatment.</h3>

          <p>
            Every dental service is explained in simple language so patients understand
            the concern, treatment process and after-care before starting the procedure.
          </p>

          <div class="services-mini-points">
            <span><i class="bi bi-check2-circle"></i> Clean Clinic</span>
            <span><i class="bi bi-check2-circle"></i> Comfort Care</span>
            <span><i class="bi bi-check2-circle"></i> Easy Appointment</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SERVICES INTRO END -->

<!-- SERVICES GRID START -->
<section class="services-grid-section section-padding">
  <div class="service-page-glow service-grid-glow-one"></div>
  <div class="service-page-glow service-grid-glow-two"></div>
  <div class="service-page-pattern service-grid-pattern"></div>

  <div class="container">
    <div class="section-heading text-center reveal-up">
      <span class="section-badge">
        <i class="bi bi-clipboard2-pulse"></i>
        Our Treatments
      </span>

      <h2>Dental services for every smile need.</h2>

      <p>
        Browse the clinic services and open each treatment detail for complete information.
      </p>
    </div>

    <div class="service-grid">
      @forelse($serviceSections as $index => $service)
        <div class="service-card premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
          <span class="service-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

          <div class="service-icon premium-icon">
            <i class="{{ $service->card_icon ?: 'bi bi-clipboard2-pulse' }}"></i>
          </div>

          <h3>{{ $service->title }}</h3>

          <p>
            {{ $service->short_description ?: \Illuminate\Support\Str::limit(strip_tags($service->description), 110) }}
          </p>

          <a href="{{ route('frontend.services.show', $service->slug) }}" class="service-link">
            Read More
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      @empty
        <div class="service-card premium-card premium-hover reveal-up reveal-delay-1">
          <span class="service-number">01</span>

          <div class="service-icon premium-icon">
            <i class="bi bi-clipboard2-pulse"></i>
          </div>

          <h3>Dental Check-up</h3>

          <p>
            Routine oral examination, dental concern review and preventive care guidance.
          </p>

          <a href="{{ route('frontend.appointment') }}" class="service-link">
            Book Now
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      @endforelse
    </div>
  </div>
</section>
<!-- SERVICES GRID END -->

<!-- SERVICE PROCESS START -->
<section class="service-process-section section-padding">
  <div class="service-page-glow process-glow-one"></div>
  <div class="service-page-glow process-glow-two"></div>
  <div class="service-page-pattern process-pattern"></div>

  <div class="container">
    <div class="service-process-wrapper">
      <div class="process-content premium-card reveal-up">
        <span class="section-badge">
          <i class="bi bi-shield-check"></i>
          Treatment Process
        </span>

        <h2>Simple and clear dental care journey.</h2>

        <p>
          From consultation to treatment guidance, the process is designed to keep
          patients informed, relaxed and confident.
        </p>

        <div class="process-mini-points">
          <span><i class="bi bi-check2-circle"></i> Clear Explanation</span>
          <span><i class="bi bi-check2-circle"></i> Hygiene Focus</span>
        </div>
      </div>

      <div class="process-step-list">
        <div class="process-step premium-card premium-hover reveal-up reveal-delay-1">
          <span class="process-step-number premium-icon">01</span>
          <div>
            <h3>Consultation</h3>
            <p>Dental concern is reviewed carefully with simple and patient-friendly communication.</p>
          </div>
        </div>

        <div class="process-step premium-card premium-hover reveal-up reveal-delay-2">
          <span class="process-step-number premium-icon">02</span>
          <div>
            <h3>Treatment Planning</h3>
            <p>Available treatment options, benefits and care steps are explained clearly.</p>
          </div>
        </div>

        <div class="process-step premium-card premium-hover reveal-up reveal-delay-3">
          <span class="process-step-number premium-icon">03</span>
          <div>
            <h3>Comfort Care</h3>
            <p>Treatment is planned around hygiene, comfort and confident dental recovery.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SERVICE PROCESS END -->

<!-- SERVICES CTA START -->
<section class="services-cta-section">
  <div class="service-cta-glow service-cta-glow-one"></div>
  <div class="service-cta-glow service-cta-glow-two"></div>

  <div class="container">
    <div class="services-cta-card premium-card reveal-up">
      <div class="services-cta-content">
        <span class="section-badge">
          <i class="bi bi-calendar2-check"></i>
          Book Your Visit
        </span>

        <h2>Need dental care near Keshri Nagar, Patna?</h2>

        <p>
          Call or book your appointment with {{ $siteName }} for consultation,
          teeth cleaning, root canal treatment, cosmetic dentistry and emergency dental care.
        </p>
      </div>

      <div class="services-cta-actions">
        <a href="{{ route('frontend.appointment') }}" class="service-primary-btn">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>

        <a href="{{ $callLink }}" class="service-outline-btn">
          <i class="bi bi-telephone-fill"></i>
          Call Clinic
        </a>
      </div>
    </div>
  </div>
</section>
<!-- SERVICES CTA END -->

@endsection
