@extends('frontend.master')

@section('content')
@php
  $setting = $websiteSetting ?? null;
  $clinicName = $setting->site_name ?? 'Dr. Richa Dental Care';
  $clinicPhone = $setting->phone ?? '+91 96087 01058';
  $callHref = 'tel:' . preg_replace('/[^0-9+]/', '', $clinicPhone);
  $featuredTestimonial = $testimonials->firstWhere('is_featured', true) ?? $testimonials->first();
  $reviewCount = $testimonials->count();
  $averageRating = $reviewCount ? round($testimonials->avg('rating'), 1) : 5.0;
@endphp

<section class="testimonials-breadcrumb-hero">
  <div class="testimonial-page-glow testimonial-page-glow-one"></div>
  <div class="testimonial-page-glow testimonial-page-glow-two"></div>
  <div class="testimonial-page-pattern"></div>

  <div class="container">
    <div class="testimonials-breadcrumb-box reveal-up">
      <span class="section-badge">
        <i class="bi bi-chat-quote"></i>
        Patient Testimonials
      </span>

      <h1>What Patients Say About {{ $clinicName }}</h1>

      <p>
        Read patient feedback that highlights clean care, clear treatment guidance
        and a comfortable dental experience.
      </p>

      <nav class="testimonials-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-heart"></i>
          Home
        </a>
        <i class="bi bi-chevron-right"></i>
        <span>Testimonials</span>
      </nav>
    </div>
  </div>
</section>

<section class="testimonials-intro-section section-padding">
  <div class="testimonial-page-glow testimonial-intro-glow-one"></div>
  <div class="testimonial-page-glow testimonial-intro-glow-two"></div>

  <div class="container">
    <div class="testimonials-intro-wrapper">
      <div class="testimonials-intro-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Trusted Dental Experience
        </span>

        <h2>Real patient feedback creates confidence before every visit.</h2>

        <p>
          Testimonials help new patients understand the clinic's approach toward
          comfort, hygiene, clear explanation and friendly dental care support.
        </p>
      </div>

      <div class="testimonials-trust-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="testimonials-trust-icon premium-icon">
          <i class="bi bi-heart-pulse"></i>
        </div>

        <h3>Clean, calm and patient-friendly care.</h3>

        <p>
          Patient reviews, star ratings and treatment feedback help visitors choose
          care with more confidence.
        </p>

        <div class="testimonials-mini-points">
          <span><i class="bi bi-check2-circle"></i> Patient Reviews</span>
          <span><i class="bi bi-check2-circle"></i> Rating Display</span>
          <span><i class="bi bi-check2-circle"></i> Trust Building</span>
        </div>
      </div>
    </div>
  </div>
</section>

@if($featuredTestimonial)
  @php
    $featuredRating = (int) round($featuredTestimonial->rating ?: 5);
    $featuredLetter = $featuredTestimonial->avatar_letter ?: Str::upper(Str::substr($featuredTestimonial->customer_name ?? 'P', 0, 1));
  @endphp

  <section class="review-highlight-section section-padding">
    <div class="testimonial-page-glow review-highlight-glow-one"></div>
    <div class="testimonial-page-glow review-highlight-glow-two"></div>
    <div class="testimonial-page-pattern review-highlight-pattern"></div>

    <div class="container">
      <div class="review-highlight-wrapper">
        <div class="review-highlight-card premium-card reveal-up">
          <div class="review-quote-icon">
            <i class="bi bi-quote"></i>
          </div>

          <div class="review-stars">
            @for($i = 1; $i <= 5; $i++)
              <i class="bi {{ $i <= $featuredRating ? 'bi-star-fill' : 'bi-star' }}"></i>
            @endfor
          </div>

          <h2>{{ $featuredTestimonial->customer_type ?: 'Comfortable dental care experience.' }}</h2>

          <p>"{{ $featuredTestimonial->review_text }}"</p>

          <div class="review-author">
            <span class="review-avatar">{{ $featuredLetter }}</span>
            <div>
              <strong>{{ $featuredTestimonial->customer_name }}</strong>
              <small>{{ $featuredTestimonial->customer_type ?: 'Dental Patient' }}</small>
            </div>
          </div>
        </div>

        <div class="review-trust-grid">
          <div class="review-trust-item premium-card premium-hover reveal-up reveal-delay-1">
            <div class="review-trust-icon premium-icon">
              <i class="bi bi-shield-check"></i>
            </div>
            <strong>Hygiene Focused</strong>
            <span>Clean clinic experience</span>
          </div>

          <div class="review-trust-item premium-card premium-hover reveal-up reveal-delay-2">
            <div class="review-trust-icon premium-icon">
              <i class="bi bi-chat-heart"></i>
            </div>
            <strong>Clear Guidance</strong>
            <span>Simple treatment explanation</span>
          </div>

          <div class="review-trust-item premium-card premium-hover reveal-up reveal-delay-3">
            <div class="review-trust-icon premium-icon">
              <i class="bi bi-person-heart"></i>
            </div>
            <strong>Patient Friendly</strong>
            <span>Comfort-first dental care</span>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

<section class="patient-reviews-section section-padding">
  <div class="testimonial-page-glow patient-review-glow-one"></div>
  <div class="testimonial-page-glow patient-review-glow-two"></div>

  <div class="container">
    <div class="section-heading text-center reveal-up">
      <span class="section-badge">
        <i class="bi bi-chat-square-heart"></i>
        Patient Review Cards
      </span>

      <h2>Patients appreciate clean care, comfort and clear communication.</h2>

      <p>
        Active testimonials from the admin panel appear here with patient type,
        rating and review text.
      </p>
    </div>

    <div class="reviews-grid">
      @forelse($testimonials as $testimonial)
        @php
          $rating = (int) round($testimonial->rating ?: 5);
          $letter = $testimonial->avatar_letter ?: Str::upper(Str::substr($testimonial->customer_name ?? 'P', 0, 1));
        @endphp

        <div class="review-card {{ $testimonial->is_featured ? 'review-card-featured' : '' }} premium-card premium-hover reveal-up reveal-delay-{{ ($loop->iteration % 3) + 1 }}">
          @if($testimonial->is_featured)
            <div class="review-feature-badge">
              <i class="bi bi-heart-fill"></i>
              Featured Review
            </div>
          @endif

          <div class="review-card-top">
            <div class="review-user">
              <span>{{ $letter }}</span>
              <div>
                <strong>{{ $testimonial->customer_name }}</strong>
                <small>{{ $testimonial->customer_type ?: 'Dental Patient' }}</small>
              </div>
            </div>

            <div class="review-rating">{{ number_format((float) ($testimonial->rating ?: 5), 1) }}</div>
          </div>

          <div class="review-card-stars">
            @for($i = 1; $i <= 5; $i++)
              <i class="bi {{ $i <= $rating ? 'bi-star-fill' : 'bi-star' }}"></i>
            @endfor
          </div>

          <p>{{ $testimonial->review_text }}</p>

          <span class="review-tag">
            <i class="bi bi-check2-circle"></i>
            {{ $testimonial->customer_type ?: 'Patient Review' }}
          </span>
        </div>
      @empty
        <div class="review-card premium-card reveal-up">
          <div class="review-card-top">
            <div class="review-user">
              <span>P</span>
              <div>
                <strong>No testimonials added yet</strong>
                <small>Dental Patient</small>
              </div>
            </div>
          </div>
          <p>Active testimonials added from the admin panel will appear here.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<section class="rating-display-section section-padding">
  <div class="testimonial-page-glow rating-glow-one"></div>
  <div class="testimonial-page-glow rating-glow-two"></div>
  <div class="testimonial-page-pattern rating-pattern"></div>

  <div class="container">
    <div class="rating-display-wrapper">
      <div class="rating-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-award"></i>
          Rating Display
        </span>

        <h2>A premium rating section to show clinic trust.</h2>

        <p>
          Overall score is calculated from active testimonials managed in the admin panel.
        </p>
      </div>

      <div class="rating-score-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="rating-score">{{ number_format($averageRating, 1) }}</div>

        <div class="rating-score-stars">
          @for($i = 1; $i <= 5; $i++)
            <i class="bi {{ $i <= round($averageRating) ? 'bi-star-fill' : 'bi-star' }}"></i>
          @endfor
        </div>

        <p>Based on {{ $reviewCount }} active patient {{ Str::plural('review', $reviewCount) }}.</p>

        <div class="rating-bars">
          <div class="rating-bar-item">
            <span>Clean Clinic</span>
            <div><b style="width: 96%;"></b></div>
          </div>
          <div class="rating-bar-item">
            <span>Doctor Guidance</span>
            <div><b style="width: 94%;"></b></div>
          </div>
          <div class="rating-bar-item">
            <span>Comfort Care</span>
            <div><b style="width: 92%;"></b></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="testimonial-trust-section section-padding">
  <div class="testimonial-page-glow testimonial-trust-glow-one"></div>
  <div class="testimonial-page-glow testimonial-trust-glow-two"></div>

  <div class="container">
    <div class="section-heading text-center reveal-up">
      <span class="section-badge">
        <i class="bi bi-shield-check"></i>
        Trust-Building Review Section
      </span>

      <h2>Why patient reviews help build confidence.</h2>

      <p>
        This section supports the review cards by highlighting the clinic values patients
        usually look for before booking a dental appointment.
      </p>
    </div>

    <div class="testimonial-trust-grid">
      <div class="testimonial-trust-card premium-card premium-hover reveal-up reveal-delay-1">
        <span class="trust-number">01</span>
        <div class="trust-icon premium-icon">
          <i class="bi bi-hospital"></i>
        </div>
        <h3>Clean Clinic Experience</h3>
        <p>Patient reviews help communicate a hygienic and comfortable dental environment.</p>
      </div>

      <div class="testimonial-trust-card premium-card premium-hover reveal-up reveal-delay-2">
        <span class="trust-number">02</span>
        <div class="trust-icon premium-icon">
          <i class="bi bi-chat-heart"></i>
        </div>
        <h3>Clear Treatment Explanation</h3>
        <p>Reviews show how clearly the doctor explains treatment options and care steps.</p>
      </div>

      <div class="testimonial-trust-card premium-card premium-hover reveal-up reveal-delay-3">
        <span class="trust-number">03</span>
        <div class="trust-icon premium-icon">
          <i class="bi bi-emoji-smile"></i>
        </div>
        <h3>Comfort-Focused Visit</h3>
        <p>Positive feedback reduces patient hesitation and builds trust before the visit.</p>
      </div>
    </div>
  </div>
</section>

<section class="testimonial-cta-section">
  <div class="testimonial-cta-glow testimonial-cta-glow-one"></div>
  <div class="testimonial-cta-glow testimonial-cta-glow-two"></div>

  <div class="container">
    <div class="testimonial-cta-card premium-card reveal-up">
      <div class="testimonial-cta-content">
        <span class="section-badge">
          <i class="bi bi-calendar2-check"></i>
          Book Your Visit
        </span>

        <h2>Ready for a comfortable dental visit?</h2>

        <p>
          Call or book an appointment with {{ $clinicName }} for consultation,
          teeth cleaning, root canal, smile designing and other dental services.
        </p>
      </div>

      <div class="testimonial-cta-actions">
        <a href="{{ route('frontend.appointment') }}" class="testimonial-primary-btn">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>

        <a href="{{ $callHref }}" class="testimonial-outline-btn">
          <i class="bi bi-telephone-fill"></i>
          Call Clinic
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
