@extends('layouts.admin')

@section('page-title', 'Show Service')

@section('content')

@php
    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
    $color = $colors[$serviceSection->id % count($colors)];
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-sections.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Service Details</h2>

        <p class="admin-page-subtitle">
            Title, icon, description, image and document.
        </p>
    </div>

    <div class="show-actions">
        @can('service_section_edit')
            <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Service
            </a>
        @endcan

        @can('service_section_delete')
            <form action="{{ route('admin.service-sections.destroy', $serviceSection->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background: {{ $color }};">
                    <i class="{{ $serviceSection->card_icon ?: 'fas fa-tooth' }}"></i>
                </div>

                <p class="profile-title">{{ $serviceSection->title }}</p>
                <p class="profile-subtitle">
                    {{ $serviceSection->short_description ?: 'Dental Service' }}
                </p>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('service_section_edit')
                    <a href="{{ route('admin.service-sections.edit', $serviceSection->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Service
                    </a>
                @endcan

                <a href="{{ route('admin.service-sections.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Services
                </a>

                @can('service_section_create')
                    <a href="{{ route('admin.service-sections.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Service
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-id-card"></i>
                </div>

                <p class="detail-section-title">Service Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $serviceSection->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $serviceSection->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon</span>
                    <span class="detail-value">
                        @if($serviceSection->card_icon)
                            <i class="{{ $serviceSection->card_icon }}"></i>
                            {{ $serviceSection->card_icon }}
                        @else
                            N/A
                        @endif
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Short Description</span>
                    <span class="detail-value">{{ $serviceSection->short_description ?? 'N/A' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">
                        {!! $serviceSection->description ?: 'N/A' !!}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($serviceSection->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($serviceSection->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-image"></i>
                </div>

                <p class="detail-section-title">Service Image</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($serviceSection->getFirstMediaUrl('service_section_image'))
                    <div class="show-image-box">
                        <img src="{{ $serviceSection->getFirstMediaUrl('service_section_image') }}"
                             alt="{{ $serviceSection->title }}">
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-image"></i>
                        </div>

                        <p class="assign-empty-title">No image uploaded</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-file-alt"></i>
                </div>

                <p class="detail-section-title">Service Document</p>
            </div>

            <div class="detail-section-pad-sm">
                @if($serviceSection->getFirstMediaUrl('service_section_document'))
                    <a href="{{ $serviceSection->getFirstMediaUrl('service_section_document') }}" target="_blank" class="btn-primary">
                        <i class="fas fa-file-alt"></i>
                        View Document
                    </a>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>

                        <p class="assign-empty-title">No document uploaded</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
