@extends('frontend.master')

@section('content')
@php
  $setting = $websiteSetting ?? null;
  $clinicName = $setting->site_name ?? 'Dr. Richa Dental Care';
  $clinicPhone = $setting->phone ?? '+91 96087 01058';
  $clinicHours = $setting->clinic_hours ?? 'Monday to Saturday, 10:00 AM - 8:30 PM';
  $clinicAddress = $setting->address ?? '12, Road Number 17, near Baba Chowk, Bank Colony, Keshri Nagar, Patna, Bihar 800024';
  $callHref = 'tel:' . preg_replace('/[^0-9+]/', '', $clinicPhone);

  $faqCategories = [
    'common' => [
      'label' => 'Common Questions',
      'badge' => 'Common Dental Questions',
      'title' => 'Basic questions patients ask before visiting.',
      'text' => 'These FAQs guide new patients about dental care, consultation, hygiene and first-visit expectations.',
      'icon' => 'bi-question-circle',
      'section_class' => 'faq-accordion-section',
      'id' => 'common-questions',
    ],
    'appointment' => [
      'label' => 'Appointment',
      'badge' => 'Appointment-Related Questions',
      'title' => 'Questions about booking your dental appointment.',
      'text' => 'This section answers appointment booking, call support, WhatsApp support and visit planning questions.',
      'icon' => 'bi-calendar2-check',
      'section_class' => 'faq-appointment-section',
      'id' => 'appointment-questions',
    ],
    'treatment' => [
      'label' => 'Treatment & Timing',
      'badge' => 'Treatment & Timing Questions',
      'title' => 'Understand treatment support and clinic working hours.',
      'text' => 'These FAQs help patients understand treatments, emergency dental care and clinic timing before planning a visit.',
      'icon' => 'bi-heart-pulse',
      'section_class' => 'faq-treatment-section',
      'id' => 'treatment-questions',
    ],
    'location' => [
      'label' => 'Location & Contact',
      'badge' => 'Clinic Location & Contact Questions',
      'title' => 'Find clinic address, nearby areas and contact support.',
      'text' => $clinicName . ' is located at ' . $clinicAddress . '.',
      'icon' => 'bi-geo-alt',
      'section_class' => 'faq-location-section',
      'id' => 'location-questions',
    ],
  ];

  $groupedFaqs = $faqs->groupBy(fn ($faq) => $faq->category ?: 'common');
  $visibleCategories = collect($faqCategories)->filter(fn ($meta, $key) => $groupedFaqs->get($key, collect())->isNotEmpty());
  if ($visibleCategories->isEmpty()) {
      $visibleCategories = collect($faqCategories);
  }
@endphp

<section class="faqs-breadcrumb-hero">
  <div class="faq-page-glow faq-page-glow-one"></div>
  <div class="faq-page-glow faq-page-glow-two"></div>
  <div class="faq-page-pattern"></div>

  <div class="container">
    <div class="faqs-breadcrumb-box reveal-up">
      <span class="section-badge">
        <i class="bi bi-question-circle"></i>
        Frequently Asked Questions
      </span>

      <h1>Dental Care Questions Answered</h1>

      <p>
        Find answers related to appointments, dental treatments, clinic timings,
        location, contact support and patient-friendly care at {{ $clinicName }}.
      </p>

      <nav class="faqs-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-heart"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>FAQs</span>
      </nav>
    </div>
  </div>
</section>

<section class="faqs-intro-section section-padding">
  <div class="faq-page-glow faq-intro-glow-one"></div>
  <div class="faq-page-glow faq-intro-glow-two"></div>

  <div class="container">
    <div class="faqs-intro-wrapper">
      <div class="faqs-intro-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Patient Help Center
        </span>

        <h2>Clear answers for a calm and confident dental visit.</h2>

        <p>
          This FAQ page helps patients understand appointment booking, clinic timings,
          treatment guidance, emergency dental care and location details before visiting
          {{ $clinicName }}.
        </p>
      </div>

      <div class="faqs-help-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="faqs-help-icon premium-icon">
          <i class="bi bi-chat-heart"></i>
        </div>

        <h3>Need quick dental help?</h3>

        <p>
          Call the clinic for appointment support, dental concern discussion, timing details
          or location guidance.
        </p>

        <div class="faqs-mini-points">
          <span><i class="bi bi-check2-circle"></i> Appointment Support</span>
          <span><i class="bi bi-check2-circle"></i> Treatment Guidance</span>
          <span><i class="bi bi-check2-circle"></i> Location Help</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="faq-category-section">
  <div class="container">
    <div class="faq-category-strip premium-card reveal-up">
      @foreach($visibleCategories as $key => $category)
        <a href="#{{ $category['id'] }}" class="faq-category-pill">
          <i class="bi {{ $category['icon'] }}"></i>
          {{ $category['label'] }}
          @if($groupedFaqs->get($key, collect())->isNotEmpty())
            ({{ $groupedFaqs->get($key)->count() }})
          @endif
        </a>
      @endforeach
    </div>
  </div>
</section>

@forelse($visibleCategories as $key => $category)
  @php
    $categoryFaqs = $groupedFaqs->get($key, collect());
    $isCommon = $key === 'common';
    $isLocation = $key === 'location';
    $isTreatment = $key === 'treatment';
  @endphp

  <section class="{{ $category['section_class'] }} section-padding" id="{{ $category['id'] }}">
    <div class="faq-page-glow {{ $isCommon ? 'faq-accordion-glow-one' : 'faq-' . $key . '-glow-one' }}"></div>
    <div class="faq-page-glow {{ $isCommon ? 'faq-accordion-glow-two' : 'faq-' . $key . '-glow-two' }}"></div>
    @if($isCommon || $isTreatment)
      <div class="faq-page-pattern {{ $isCommon ? 'faq-accordion-pattern' : 'faq-treatment-pattern' }}"></div>
    @endif

    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi {{ $category['icon'] }}"></i>
          {{ $category['badge'] }}
        </span>

        <h2>{{ $category['title'] }}</h2>
        <p>{{ $category['text'] }}</p>
      </div>

      <div class="{{ $isLocation ? 'faq-location-wrapper' : ($isTreatment ? 'faq-split-wrapper' : 'faq-layout') }}">
        @if($isLocation)
          <div class="faq-location-card premium-card premium-hover reveal-up reveal-delay-1">
            <div class="faq-location-icon premium-icon">
              <i class="bi bi-geo-alt-fill"></i>
            </div>
            <h3>Clinic Address</h3>
            <p>{{ $clinicAddress }}</p>
            <div class="faq-location-tags">
              <span>Keshri Nagar</span>
              <span>Patna</span>
              <span>Dental Care</span>
            </div>
          </div>
        @elseif($isTreatment)
          <div class="faq-timing-card premium-card premium-hover reveal-up">
            <div class="faq-timing-icon premium-icon">
              <i class="bi bi-clock"></i>
            </div>
            <h3>Clinic Hours</h3>
            <p>{{ $clinicHours }}</p>
            <a href="{{ $callHref }}" class="faq-primary-btn">
              Call Clinic
              <i class="bi bi-telephone-fill"></i>
            </a>
          </div>
        @else
          <div class="faq-side-card premium-card reveal-up">
            <div class="faq-side-icon">
              <i class="bi {{ $key === 'appointment' ? 'bi-calendar-heart' : 'bi-person-heart' }}"></i>
            </div>
            <h3>{{ $key === 'appointment' ? 'Booking made simple.' : 'First visit made simple.' }}</h3>
            <p>
              Clear answers help patients feel relaxed, informed and ready before their
              dental appointment.
            </p>
            <div class="faq-side-points">
              <span><i class="bi bi-check2-circle"></i> Clear guidance</span>
              <span><i class="bi bi-check2-circle"></i> Comfort-first care</span>
              <span><i class="bi bi-check2-circle"></i> Patient-friendly support</span>
            </div>
          </div>
        @endif

        <div class="faq-accordion-list">
          @forelse($categoryFaqs as $faq)
            <div class="faq-item premium-card premium-hover reveal-up reveal-delay-{{ ($loop->iteration % 3) + 1 }}">
              <input type="checkbox" id="faq-{{ $key }}-{{ $faq->id }}" {{ $faq->is_open ? 'checked' : '' }}>
              <label for="faq-{{ $key }}-{{ $faq->id }}" class="faq-question">
                <span>{{ $faq->question }}</span>
                <i class="bi bi-plus-lg"></i>
              </label>

              <div class="faq-answer">
                <p>{{ $faq->answer }}</p>
              </div>
            </div>
          @empty
            <div class="faq-item premium-card reveal-up">
              <div class="faq-question">
                <span>No FAQs added in this category yet.</span>
                <i class="bi bi-info-circle"></i>
              </div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@empty
@endforelse

<section class="faq-cta-section">
  <div class="faq-cta-glow faq-cta-glow-one"></div>
  <div class="faq-cta-glow faq-cta-glow-two"></div>

  <div class="container">
    <div class="faq-cta-card premium-card reveal-up">
      <div class="faq-cta-content">
        <span class="section-badge">
          <i class="bi bi-calendar2-check"></i>
          Still Have Questions?
        </span>

        <h2>Need help before booking your dental appointment?</h2>

        <p>
          Call or book your appointment with {{ $clinicName }} for consultation,
          teeth cleaning, root canal, smile designing and other dental services.
        </p>
      </div>

      <div class="faq-cta-actions">
        <a href="{{ route('frontend.appointment') }}" class="faq-primary-btn">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>

        <a href="{{ $callHref }}" class="faq-outline-btn">
          <i class="bi bi-telephone-fill"></i>
          Call Clinic
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
