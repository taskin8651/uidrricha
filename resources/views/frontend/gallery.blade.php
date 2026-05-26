@extends('frontend.master')
@section('content')

@php
    $siteName = $frontendSiteName ?? 'Dr. Richa Dental Care';
    $callLink = $frontendCallLink ?? 'tel:+919608701058';

    $categoryIconMap = [
        'clinic' => 'bi bi-hospital',
        'treatment' => 'bi bi-heart-pulse',
        'equipment' => 'bi bi-camera',
        'doctor' => 'bi bi-person-badge',
        'team' => 'bi bi-person-badge',
    ];

    $cardClassMap = [
        'large' => 'gallery-card-large',
        'wide' => 'gallery-card-wide',
        'tall' => 'treatment-card-tall',
    ];
@endphp

<!-- GALLERY BREADCRUMB HERO START -->
<section class="gallery-breadcrumb-hero">
  <div class="gallery-page-glow gallery-page-glow-one"></div>
  <div class="gallery-page-glow gallery-page-glow-two"></div>
  <div class="gallery-page-pattern"></div>

  <div class="container">
    <div class="gallery-breadcrumb-box reveal-up">
      <span class="section-badge">
        <i class="bi bi-images"></i>
        Clinic Gallery
      </span>

      <h1>Explore Our Dental Care Gallery</h1>

      <p>
        View clinic spaces, treatment rooms, dental equipment, doctor/team moments
        and smile result layouts from {{ $siteName }}.
      </p>

      <nav class="gallery-breadcrumb-nav" aria-label="breadcrumb">
        <a href="{{ route('frontend.home') }}">
          <i class="bi bi-house-heart"></i>
          Home
        </a>

        <i class="bi bi-chevron-right"></i>

        <span>Gallery</span>
      </nav>
    </div>
  </div>
</section>
<!-- GALLERY BREADCRUMB HERO END -->

<!-- GALLERY INTRO START -->
<section class="gallery-intro-section section-padding">
  <div class="gallery-page-glow gallery-intro-glow-one"></div>
  <div class="gallery-page-glow gallery-intro-glow-two"></div>

  <div class="container">
    <div class="gallery-intro-wrapper">
      <div class="gallery-intro-content reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Smile & Clinic Moments
        </span>

        <h2>Clean clinic visuals designed to build patient trust.</h2>

        <p>
          This gallery page showcases real clinic images, treatment room photos,
          dental equipment, doctor/team images and before-after result layouts.
        </p>
      </div>

      <div class="gallery-intro-card premium-card premium-hover reveal-up reveal-delay-1">
        <div class="gallery-intro-icon premium-icon">
          <i class="bi bi-camera"></i>
        </div>

        <h3>Organized visual gallery for every important clinic area.</h3>

        <p>
          Use this gallery to present {{ $siteName }} in a premium, clean and
          patient-friendly way with smooth image cards and hover effects.
        </p>

        <div class="gallery-mini-points">
          <span><i class="bi bi-check2-circle"></i> Clinic Images</span>
          <span><i class="bi bi-check2-circle"></i> Treatment Rooms</span>
          <span><i class="bi bi-check2-circle"></i> Before / After</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- GALLERY INTRO END -->

@if($galleryCategories->count())
  <!-- GALLERY CATEGORY STRIP START -->
  <section class="gallery-category-section">
    <div class="container">
      <div class="gallery-category-strip premium-card reveal-up">
        @foreach($galleryCategories as $category)
          @php
              $categoryIcon = collect($categoryIconMap)->first(fn ($icon, $key) => str_contains($category->slug ?? '', $key)) ?: 'bi bi-images';
          @endphp
          <a href="#gallery-{{ $category->slug }}" class="gallery-category-pill">
            <i class="{{ $categoryIcon }}"></i>
            {{ $category->name }}
          </a>
        @endforeach

        @if($beforeAfterGalleries->count())
          <a href="#results-gallery" class="gallery-category-pill">
            <i class="bi bi-stars"></i>
            Before / After
          </a>
        @endif
      </div>
    </div>
  </section>
  <!-- GALLERY CATEGORY STRIP END -->
@endif

@forelse($galleryCategories as $category)
  @php
      $categoryItems = $galleryItems->where('gallery_category_id', $category->id);
      $categoryIcon = collect($categoryIconMap)->first(fn ($icon, $key) => str_contains($category->slug ?? '', $key)) ?: 'bi bi-images';
  @endphp

  @if($categoryItems->count())
    <section class="gallery-grid-section section-padding" id="gallery-{{ $category->slug }}">
      <div class="gallery-page-glow gallery-grid-glow-one"></div>
      <div class="gallery-page-glow gallery-grid-glow-two"></div>
      <div class="gallery-page-pattern gallery-grid-pattern"></div>

      <div class="container">
        <div class="section-heading text-center reveal-up">
          <span class="section-badge">
            <i class="{{ $categoryIcon }}"></i>
            {{ $category->name }}
          </span>

          <h2>{{ $category->name }}</h2>

          <p>
            Explore {{ strtolower($category->name) }} images from {{ $siteName }}.
          </p>
        </div>

        <div class="gallery-masonry-grid">
          @foreach($categoryItems as $index => $item)
            @php
                $imageUrl = $item->getFirstMediaUrl('gallery_image') ?: asset('assets/img/img7.png');
                $cardSizeClass = $cardClassMap[$item->card_size] ?? '';
            @endphp
            <div class="gallery-card {{ $cardSizeClass }} premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
              <img src="{{ $imageUrl }}" alt="{{ $item->alt_text ?: $item->title }}">
              <div class="gallery-overlay">
                <span>{{ $item->label ?: $category->name }}</span>
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif
@empty
  <section class="gallery-grid-section section-padding" id="clinic-gallery">
    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi bi-hospital"></i>
          Clinic Images
        </span>

        <h2>Clinic spaces with a calm and premium dental wellness feel.</h2>

        <p>Add reception, waiting area, consultation space and clinic ambience photos here.</p>
      </div>

      <div class="gallery-masonry-grid">
        <div class="gallery-card gallery-card-large premium-card premium-hover reveal-up reveal-delay-1">
          <img src="{{ asset('assets/img/img7.png') }}" alt="{{ $siteName }} clinic reception">
          <div class="gallery-overlay">
            <span>Clinic Space</span>
            <h3>Clean Reception Area</h3>
            <p>Premium and patient-friendly dental clinic environment.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endforelse

@if($galleryItems->whereNull('gallery_category_id')->count())
  <section class="gallery-grid-section section-padding" id="gallery-more">
    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi bi-images"></i>
          More Gallery
        </span>

        <h2>More clinic images.</h2>
      </div>

      <div class="gallery-masonry-grid">
        @foreach($galleryItems->whereNull('gallery_category_id') as $index => $item)
          @php
              $imageUrl = $item->getFirstMediaUrl('gallery_image') ?: asset('assets/img/img7.png');
              $cardSizeClass = $cardClassMap[$item->card_size] ?? '';
          @endphp
          <div class="gallery-card {{ $cardSizeClass }} premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
            <img src="{{ $imageUrl }}" alt="{{ $item->alt_text ?: $item->title }}">
            <div class="gallery-overlay">
              <span>{{ $item->label ?: 'Gallery' }}</span>
              <h3>{{ $item->title }}</h3>
              <p>{{ $item->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@if($beforeAfterGalleries->count())
  <!-- BEFORE AFTER RESULT START -->
  <section class="before-after-section section-padding" id="results-gallery">
    <div class="gallery-page-glow result-glow-one"></div>
    <div class="gallery-page-glow result-glow-two"></div>
    <div class="gallery-page-pattern result-pattern"></div>

    <div class="container">
      <div class="section-heading text-center reveal-up">
        <span class="section-badge">
          <i class="bi bi-stars"></i>
          Before / After Result
        </span>

        <h2>Smile result layout for treatment outcomes.</h2>

        <p>
          Smile designing, teeth cleaning, cosmetic dentistry or other treatment outcome visuals.
        </p>
      </div>

      <div class="before-after-grid">
        @foreach($beforeAfterGalleries as $index => $beforeAfter)
          @php
              $beforeImage = $beforeAfter->getFirstMediaUrl('before_image') ?: asset('assets/img/img20.png');
              $afterImage = $beforeAfter->getFirstMediaUrl('after_image') ?: asset('assets/img/img21.png');
          @endphp
          <div class="before-after-card premium-card premium-hover reveal-up reveal-delay-{{ ($index % 3) + 1 }}">
            <div class="before-after-images">
              <div class="result-image">
                <img src="{{ $beforeImage }}" alt="{{ $beforeAfter->before_alt ?: $beforeAfter->title }}">
                <span>{{ $beforeAfter->before_label ?: 'Before' }}</span>
              </div>

              <div class="result-image">
                <img src="{{ $afterImage }}" alt="{{ $beforeAfter->after_alt ?: $beforeAfter->title }}">
                <span>{{ $beforeAfter->after_label ?: 'After' }}</span>
              </div>
            </div>

            <div class="before-after-content">
              <h3>{{ $beforeAfter->title }}</h3>
              <p>{{ $beforeAfter->description }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- BEFORE AFTER RESULT END -->
@endif

<!-- GALLERY CTA START -->
<section class="gallery-cta-section">
  <div class="gallery-cta-glow gallery-cta-glow-one"></div>
  <div class="gallery-cta-glow gallery-cta-glow-two"></div>

  <div class="container">
    <div class="gallery-cta-card premium-card reveal-up">
      <div class="gallery-cta-content">
        <span class="section-badge">
          <i class="bi bi-calendar2-check"></i>
          Book Your Visit
        </span>

        <h2>Want to visit {{ $siteName }}?</h2>

        <p>
          Call or book an appointment for consultation, teeth cleaning, root canal,
          smile designing and other dental care services near Baba Chowk, Keshri Nagar, Patna.
        </p>
      </div>

      <div class="gallery-cta-actions">
        <a href="{{ route('frontend.appointment') }}" class="gallery-primary-btn">
          Book Appointment
          <i class="bi bi-arrow-right"></i>
        </a>

        <a href="{{ $callLink }}" class="gallery-outline-btn">
          <i class="bi bi-telephone-fill"></i>
          Call Clinic
        </a>
      </div>
    </div>
  </div>
</section>
<!-- GALLERY CTA END -->

@endsection
