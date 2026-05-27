@extends('layouts.admin')

@section('page-title', 'Create Service')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.service-sections.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Create Service</h2>

        <p class="admin-page-subtitle">
            Add service title, icon, description, image and document.
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.service-sections.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-icon">
                <i class="fas fa-tooth"></i>
            </div>

            <div>
                <p class="form-card-title">Service Details</p>
                <p class="form-card-subtitle">Simple service information</p>
            </div>
        </div>

        <div class="form-card-body">
            <div class="admin-form-grid">
                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Complete dental checkup"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="card_icon">
                        Icon
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="card_icon"
                               id="card_icon"
                               value="{{ old('card_icon') }}"
                               placeholder="fa-solid fa-tooth"
                               class="field-input {{ $errors->has('card_icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('card_icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('card_icon') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="field-group">
                <label class="field-label" for="short_description">
                    Short Description
                </label>

                <textarea name="short_description"
                          id="short_description"
                          rows="3"
                          placeholder="Short text shown on service card..."
                          class="field-textarea {{ $errors->has('short_description') ? 'error' : '' }}">{{ old('short_description') }}</textarea>

                @if($errors->has('short_description'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('short_description') }}
                    </p>
                @endif
            </div>

            <div class="field-group">
                <label class="field-label" for="description">
                    Description
                </label>

                <textarea name="description"
                          id="description"
                          rows="6"
                          placeholder="Write service description..."
                          class="field-textarea {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>

                @if($errors->has('description'))
                    <p class="field-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->first('description') }}
                    </p>
                @endif
            </div>

            <div class="admin-form-grid">
                <div class="field-group">
                    <label class="field-label" for="image">
                        Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="document">
                        Document
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-alt icon"></i>

                        <input type="file"
                               name="document"
                               id="document"
                               accept=".pdf,.doc,.docx"
                               class="field-input {{ $errors->has('document') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('document'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('document') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.service-sections.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection

@section('scripts')
@parent
<script>
    if (document.querySelector('#description')) {
        ClassicEditor.create(document.querySelector('#description')).catch(error => console.error(error));
    }
</script>
@endsection
