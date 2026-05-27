@extends('layouts.auth')

@section('page-title', 'Login | ' . trans('panel.site_title'))

@section('content')

<div class="auth-premium-page">

    <div class="auth-bg-shape auth-shape-one"></div>
    <div class="auth-bg-shape auth-shape-two"></div>

    <div class="auth-wrapper">

        {{-- LEFT SIDE --}}
        <div class="auth-brand-panel">
            <div class="auth-brand-content">
                <span class="auth-badge">
                    <i class="fas fa-tooth"></i>
                    Secure Admin Access
                </span>

                <h1>
                    Manage Your Dental Clinic Website Easily
                </h1>

                <p>
                    Login to update services, gallery, testimonials, FAQ, dentist profile,
                    clinic timing and website content from one secure dashboard.
                </p>

                <div class="auth-stats">
                    <div>
                        <strong>CMS</strong>
                        <span>Easy Updates</span>
                    </div>

                    <div>
                        <strong>Safe</strong>
                        <span>Protected Login</span>
                    </div>

                    <div>
                        <strong>24/7</strong>
                        <span>Admin Access</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="auth-form-panel">

            <div class="auth-card">

                <div class="auth-card-head">
                    <div class="auth-logo-icon">
                        <i class="fas fa-tooth"></i>
                    </div>

                    <h2>Welcome Back</h2>

                    <p>
                        Sign in to {{ trans('panel.site_title') }}
                    </p>
                </div>

                @if(session('message'))
                    <div class="auth-alert">
                        <i class="fas fa-info-circle"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="auth-field">
                        <label for="email">
                            {{ trans('global.login_email') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-envelope"></i>

                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   placeholder="admin@example.com"
                                   class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                        </div>

                        @if($errors->has('email'))
                            <p class="auth-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    {{-- PASSWORD --}}
                    <div class="auth-field">
                        <label for="password">
                            {{ trans('global.login_password') }}
                        </label>

                        <div class="auth-input-wrap">
                            <i class="fas fa-lock"></i>

                            <input type="password"
                                   name="password"
                                   id="password"
                                   required
                                   placeholder="Enter your password"
                                   class="{{ $errors->has('password') ? 'is-invalid' : '' }}">

                            <button type="button" class="auth-eye-btn" onclick="toggleLoginPassword()">
                                <i id="passwordEye" class="fas fa-eye"></i>
                            </button>
                        </div>

                        @if($errors->has('password'))
                            <p class="auth-error">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    {{-- REMEMBER + FORGOT --}}
                    <div class="auth-row">
                        <label class="auth-check">
                            <input type="checkbox" name="remember">
                            <span>{{ trans('global.remember_me') }}</span>
                        </label>

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ trans('global.forgot_password') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="auth-submit-btn">
                        <i class="fas fa-right-to-bracket"></i>
                        {{ trans('global.login') }}
                    </button>

                    @if(Route::has('register'))
                        <div class="auth-register">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}">
                                {{ trans('global.register') }}
                            </a>
                        </div>
                    @endif
                </form>

            </div>

            <p class="auth-copy">
                &copy; {{ date('Y') }} {{ trans('panel.site_title') }}. All rights reserved.
            </p>

        </div>

    </div>
</div>

<style>
/* ==============================
   PREMIUM LOGIN PAGE THEME
================================= */

.auth-premium-page {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 18%, rgba(251, 113, 133, 0.14), transparent 30%),
        radial-gradient(circle at 92% 12%, rgba(139, 92, 246, 0.16), transparent 32%),
        radial-gradient(circle at 50% 100%, rgba(245, 243, 255, 0.95), transparent 45%),
        linear-gradient(135deg, #ffffff 0%, #fff8fb 46%, #f5f3ff 100%);
    font-family: "Manrope", sans-serif;
    color: #6f637a;
}

.auth-premium-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(139, 92, 246, 0.055) 1px, transparent 1px),
        linear-gradient(90deg, rgba(139, 92, 246, 0.055) 1px, transparent 1px);
    background-size: 56px 56px;
    mask-image: linear-gradient(to bottom, rgba(0,0,0,0.55), transparent 78%);
    pointer-events: none;
}

.auth-bg-shape {
    position: absolute;
    border-radius: 999px;
    pointer-events: none;
    filter: blur(5px);
}

.auth-shape-one {
    width: 330px;
    height: 330px;
    left: -135px;
    top: 80px;
    background:
        radial-gradient(circle at 34% 28%, rgba(255,255,255,0.86), transparent 26%),
        linear-gradient(135deg, rgba(251, 113, 133, 0.20), rgba(139, 92, 246, 0.10));
}

.auth-shape-two {
    width: 470px;
    height: 470px;
    right: -205px;
    bottom: -190px;
    background:
        radial-gradient(circle at 35% 30%, rgba(255,255,255,0.78), transparent 24%),
        linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(251, 113, 133, 0.10));
}

.auth-wrapper {
    position: relative;
    z-index: 2;
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
}

/* LEFT BRAND */
.auth-brand-panel {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 70px;
    color: #ffffff;
    background:
        radial-gradient(circle at 10% 20%, rgba(255,255,255,0.22), transparent 30%),
        radial-gradient(circle at 90% 90%, rgba(251, 113, 133, 0.18), transparent 34%),
        linear-gradient(135deg, #1f1430 0%, #4c1d95 52%, #2e1065 100%);
}

.auth-brand-panel::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.055) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.055) 1px, transparent 1px);
    background-size: 44px 44px;
    mask-image: linear-gradient(to bottom, rgba(0,0,0,.75), transparent 92%);
}

.auth-brand-panel::after {
    content: "\f5c9";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    position: absolute;
    right: 52px;
    bottom: 34px;
    color: rgba(255, 255, 255, 0.08);
    font-size: 210px;
    line-height: 1;
}

.auth-brand-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.auth-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 24px;
    padding: 10px 17px;
    border-radius: 999px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 950;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.20);
    backdrop-filter: blur(14px);
}

.auth-badge i {
    width: 28px;
    height: 28px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    color: #8b5cf6;
    background: #ffffff;
}

.auth-brand-content h1 {
    margin: 0 0 24px;
    max-width: 680px;
    color: #ffffff;
    font-family: "Playfair Display", serif;
    font-size: clamp(42px, 5vw, 68px);
    line-height: 1.03;
    letter-spacing: -2.5px;
    font-weight: 950;
}

.auth-brand-content p {
    max-width: 620px;
    color: rgba(255,255,255,.76);
    font-size: 17px;
    line-height: 1.85;
    font-weight: 500;
}

.auth-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 42px;
}

.auth-stats div {
    padding: 22px 20px;
    border-radius: 26px;
    background:
        linear-gradient(145deg, rgba(255,255,255,.12), rgba(255,255,255,.05));
    border: 1px solid rgba(255,255,255,.12);
    box-shadow: inset 0 1px 0 rgba(255,255,255,.12);
    backdrop-filter: blur(14px);
}

.auth-stats strong {
    display: block;
    color: #ffffff;
    font-size: 26px;
    line-height: 1;
    font-weight: 950;
}

.auth-stats span {
    display: block;
    margin-top: 8px;
    color: rgba(255,255,255,.68);
    font-size: 12px;
    font-weight: 850;
}

/* RIGHT FORM */
.auth-form-panel {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 50px 28px;
}

.auth-card {
    width: min(100%, 500px);
    margin: 0 auto;
    overflow: hidden;
    border-radius: 38px;
    background:
        linear-gradient(145deg, rgba(255,255,255,.98), rgba(245,243,255,.92));
    border: 1px solid rgba(139, 92, 246, 0.14);
    box-shadow:
        0 34px 90px rgba(31, 20, 48, 0.14),
        0 12px 34px rgba(139, 92, 246, 0.10),
        inset 0 1px 0 rgba(255,255,255,.95);
}

.auth-card-head {
    position: relative;
    text-align: center;
    padding: 38px 34px 26px;
    border-bottom: 1px solid rgba(139, 92, 246, 0.12);
}

.auth-logo-icon {
    width: 72px;
    height: 72px;
    margin: 0 auto 20px;
    display: grid;
    place-items: center;
    border-radius: 26px;
    color: #ffffff;
    font-size: 28px;
    background:
        radial-gradient(circle at 30% 24%, rgba(255,255,255,.42), transparent 32%),
        linear-gradient(135deg, #4c1d95 0%, #8b5cf6 58%, #fb7185 100%);
    box-shadow:
        0 18px 38px rgba(139, 92, 246, .28),
        inset 0 1px 0 rgba(255,255,255,.35);
}

.auth-card-head h2 {
    margin: 0;
    color: #1f1430;
    font-family: "Playfair Display", serif;
    font-size: 32px;
    line-height: 1.1;
    letter-spacing: -1.1px;
    font-weight: 950;
}

.auth-card-head p {
    margin: 8px 0 0;
    color: #6f637a;
    font-size: 14px;
    font-weight: 600;
}

.auth-alert {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin: 24px 34px 0;
    padding: 14px 16px;
    border-radius: 18px;
    color: #4c1d95;
    font-size: 14px;
    font-weight: 700;
    background: rgba(139, 92, 246, 0.08);
    border: 1px solid rgba(139, 92, 246, 0.14);
}

.auth-form {
    padding: 34px;
}

.auth-field {
    margin-bottom: 20px;
}

.auth-field label {
    display: block;
    margin-bottom: 9px;
    color: #1f1430;
    font-size: 14px;
    font-weight: 900;
}

.auth-input-wrap {
    position: relative;
}

.auth-input-wrap > i {
    position: absolute;
    left: 17px;
    top: 50%;
    transform: translateY(-50%);
    color: #8b5cf6;
    font-size: 15px;
}

.auth-input-wrap input {
    width: 100%;
    height: 58px;
    padding: 0 52px 0 48px;
    border-radius: 20px;
    outline: none;
    color: #1f1430;
    font-size: 15px;
    font-weight: 700;
    background:
        linear-gradient(145deg, rgba(255,255,255,.96), rgba(255,248,251,.94));
    border: 1px solid rgba(139, 92, 246, 0.14);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.9),
        0 10px 24px rgba(31, 20, 48, 0.045);
    transition: .3s ease;
}

.auth-input-wrap input::placeholder {
    color: #9b8ca8;
    font-weight: 700;
}

.auth-input-wrap input:focus {
    border-color: rgba(139, 92, 246, 0.45);
    background: #ffffff;
    box-shadow:
        0 0 0 4px rgba(139, 92, 246, 0.11),
        0 16px 34px rgba(139, 92, 246, 0.09),
        inset 0 1px 0 rgba(255,255,255,.95);
}

.auth-input-wrap input.is-invalid {
    border-color: rgba(239, 68, 68, .65);
}

.auth-eye-btn {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    border: 0;
    background: transparent;
    color: #9b8ca8;
    cursor: pointer;
    font-size: 15px;
}

.auth-eye-btn:hover {
    color: #8b5cf6;
}

.auth-error {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 8px;
    color: #dc2626;
    font-size: 12px;
    font-weight: 700;
}

.auth-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    margin: 8px 0 24px;
}

.auth-check {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #6f637a;
    font-size: 14px;
    font-weight: 750;
    cursor: pointer;
}

.auth-check input {
    width: 16px;
    height: 16px;
    accent-color: #8b5cf6;
}

.auth-row a,
.auth-register a {
    color: #8b5cf6;
    font-size: 14px;
    font-weight: 900;
    text-decoration: none;
}

.auth-row a:hover,
.auth-register a:hover {
    color: #4c1d95;
}

.auth-submit-btn {
    position: relative;
    overflow: hidden;
    width: 100%;
    min-height: 58px;
    border: 0;
    border-radius: 999px;
    cursor: pointer;
    color: #ffffff;
    font-size: 15px;
    font-weight: 950;
    background:
        radial-gradient(circle at 25% 20%, rgba(255,255,255,.36), transparent 30%),
        linear-gradient(135deg, #4c1d95 0%, #8b5cf6 58%, #fb7185 100%);
    box-shadow:
        0 18px 38px rgba(139, 92, 246, 0.30),
        inset 0 1px 0 rgba(255,255,255,.45);
    transition: .35s ease;
}

.auth-submit-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -90%;
    width: 70%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.34), transparent);
    transform: skewX(-18deg);
    transition: .65s ease;
}

.auth-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow:
        0 24px 50px rgba(139, 92, 246, 0.38),
        inset 0 1px 0 rgba(255,255,255,.5);
}

.auth-submit-btn:hover::before {
    left: 120%;
}

.auth-register {
    margin-top: 22px;
    text-align: center;
    color: #6f637a;
    font-size: 14px;
    font-weight: 650;
}

.auth-copy {
    width: min(100%, 500px);
    margin: 22px auto 0;
    text-align: center;
    color: #9b8ca8;
    font-size: 13px;
    font-weight: 600;
}

/* RESPONSIVE */
@media (max-width: 991px) {
    .auth-wrapper {
        grid-template-columns: 1fr;
    }

    .auth-brand-panel {
        display: none;
    }

    .auth-form-panel {
        min-height: 100vh;
        padding: 34px 18px;
    }
}

@media (max-width: 520px) {
    .auth-card {
        border-radius: 28px;
    }

    .auth-card-head {
        padding: 30px 22px 22px;
    }

    .auth-card-head h2 {
        font-size: 28px;
    }

    .auth-form {
        padding: 26px 20px 28px;
    }

    .auth-input-wrap input {
        height: 54px;
        border-radius: 17px;
        font-size: 14px;
    }

    .auth-row {
        align-items: flex-start;
        flex-direction: column;
    }

    .auth-submit-btn {
        min-height: 54px;
    }
}
</style>

<script>
function toggleLoginPassword() {
    const password = document.getElementById('password');
    const eye = document.getElementById('passwordEye');

    if (!password || !eye) return;

    if (password.type === 'password') {
        password.type = 'text';
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
    }
}
</script>

@endsection
