@extends('frontend.master')
@section('content')

@php
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';
    $serviceImage = $serviceSection->getFirstMediaUrl('service_section_image') ?: asset('assets/img/img4.png');
@endphp

<section class="services-breadcrumb-hero">
  <div class="service-page-glow service-page-glow-one"></div>
  <div class="service-page-glow service-page-glow-two"></div>
  <div class="service-page-pattern"></div>

  <div class="container">
    <div class="services-breadcrumb-box reveal-up">
      <span class="section-badge">
        <i class="{{ $serviceSection->card_icon ?: 'bi bi-clipboard2-pulse' }}"></i>
        {{ $serviceSection->tag ?: 'Dental Service' }}
      </span>

      <h1>{{ $serviceSection->title }}</h1>

      <p>
        {{ $serviceSection->short_description ?: \Illuminate\Support\Str::limit(strip_tags($serviceSection->description), 150) }}
      </p>

      <nav class="services-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-heart"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <a href="{{ route('frontend.services.index') }}">Services</a>
        <i class="bi bi-chevron-right"></i>
        <span>{{ $serviceSection->title }}</span>
      </nav>
    </div>
  </div>
</section>

<section class="services-intro-section section-padding">
  <div class="service-page-glow service-intro-glow-one"></div>
  <div class="service-page-glow service-intro-glow-two"></div>

  <div class="container">
    <div class="services-intro-wrapper">
      <div class="services-intro-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Treatment Detail
        </span>

        <h2>{{ $serviceSection->title }}</h2>

        <div class="service-detail-content">
          {!! $serviceSection->description ?: '<p>Detailed service information will be updated soon.</p>' !!}
        </div>
      </div>

      <div class="services-intro-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="facility-image-box">
          <img src="{{ $serviceImage }}" alt="{{ $serviceSection->image_alt ?: $serviceSection->title }}">
        </div>

        <div class="services-intro-card-content mt-3">
          <h3>Need this treatment?</h3>

          <p>
            Contact {{ $siteName }} for appointment support and patient-friendly guidance.
          </p>

          <div class="services-mini-points">
            <span><i class="bi bi-check2-circle"></i> Clear Explanation</span>
            <span><i class="bi bi-check2-circle"></i> Hygiene Focus</span>
            <span><i class="bi bi-check2-circle"></i> Comfort Care</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if($serviceSection->activeItems->count())
  <section class="services-grid-section section-padding">
    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi bi-list-check"></i>
          Benefits
        </span>

        <h2>What this service includes.</h2>
      </div>

      <div class="service-grid">
        @foreach($serviceSection->activeItems as $index => $item)
          <div class="service-card premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
            <span class="service-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <div class="service-icon premium-icon">
              <i class="{{ $item->icon ?: 'bi bi-check2-circle' }}"></i>
            </div>
            <h3>{{ $item->title }}</h3>
            <p>{{ $item->description }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@if($relatedServices->count())
  <section class="services-grid-section section-padding">
    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi bi-grid"></i>
          More Services
        </span>

        <h2>Explore other dental services.</h2>
      </div>

      <div class="service-grid">
        @foreach($relatedServices as $index => $relatedService)
          <div class="service-card premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
            <span class="service-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <div class="service-icon premium-icon">
              <i class="{{ $relatedService->card_icon ?: 'bi bi-clipboard2-pulse' }}"></i>
            </div>
            <h3>{{ $relatedService->title }}</h3>
            <p>{{ $relatedService->short_description ?: \Illuminate\Support\Str::limit(strip_tags($relatedService->description), 110) }}</p>
            <a href="{{ route('frontend.services.show', $relatedService->slug) }}" class="service-link">
              Read More
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

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

        <h2>Need help with {{ $serviceSection->title }}?</h2>

        <p>
          Call or book your appointment with {{ $siteName }} for clean, comfortable and patient-friendly care.
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

@endsection
