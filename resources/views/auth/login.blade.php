@extends('default.layout')
@push('style')
<link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endpush
@section('main')
<div class="login-popup mx-auto">
    <div class="form-box">
        <div class="tab tab-nav-simple tab-nav-boxed form-tab">
            <ul
                class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5"
                role="tablist"
            >
                <li class="nav-item">
                    <a
                        class="nav-link active border-no lh-1 ls-normal"
                        href="#signin"
                        >Login</a
                    >
                </li>
                <li class="delimiter">or</li>
                <li class="nav-item">
                    <a
                        class="nav-link border-no lh-1 ls-normal"
                        href="#register"
                        >Register</a
                    >
                </li>
            </ul>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="tab-content">
                <!-- Login Tab -->
                <div class="tab-pane active" id="signin">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="singin-email"
                                name="email"
                                placeholder="Username or Email Address *"
                                required
                                autofocus
                            />
                            <x-input-error-new
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control"
                                id="singin-password"
                                name="password"
                                placeholder="Password *"
                                required=""
                            />
                            <x-input-error-new
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />
                        </div>
                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input
                                    type="checkbox"
                                    class="custom-checkbox"
                                    id="signin-remember"
                                    name="remember"
                                />
                                <label
                                    class="form-control-label"
                                    for="signin-remember"
                                    >Remember me</label
                                >
                            </div>
                            @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="lost-link"
                                >Lost your password?</a
                            >
                            @endif
                        </div>
                        <button
                            class="btn btn-dark btn-block btn-rounded"
                            type="submit"
                        >
                            Login
                        </button>
                    </form>
                    <!-- <div class="form-choice text-center">
                                <label class="ls-m">or Login With</label>
                                <div class="social-links">
                                    <a href="#" title="social-link"
                                        class="social-link social-google fab fa-google border-no"></a>
                                    <a href="#" title="social-link"
                                        class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                    <a href="#" title="social-link"
                                        class="social-link social-twitter fab fa-twitter border-no"></a>
                                </div>
                            </div> -->
                </div>

                <!-- Register Tab -->
                <div class="tab-pane" id="register">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="register-email"
                                name="name"
                                placeholder="Name*"
                                required
                                autofocus
                            />
                            <x-input-error-new
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />
                        </div>

                        <div class="form-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                id="register-email"
                                name="email"
                                placeholder="Your Email Address *"
                                required=""
                            />
                            <x-input-error-new
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control"
                                id="register-password"
                                name="password"
                                placeholder="Password *"
                                required
                            />
                            <x-input-error-new
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control"
                                id="register-confirm-password"
                                name="password_confirmation"
                                placeholder="Confirm Password *"
                                required
                            />
                            <x-input-error-new
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2"
                            />
                        </div>

                        <div class="form-footer">
                            <div class="form-checkbox">
                                <input
                                    type="checkbox"
                                    class="custom-checkbox"
                                    id="register-agree"
                                    name="register-agree"
                                    required=""
                                />
                                <label
                                    class="form-control-label"
                                    for="register-agree"
                                    >I agree to the privacy policy</label
                                >
                            </div>
                        </div>

                        <button
                            class="btn btn-dark btn-block btn-rounded"
                            type="submit"
                        >
                            Register
                        </button>
                    </form>
                    <!-- <div class="form-choice text-center">
                                <label class="ls-m">or Register With</label>
                                <div class="social-links">
                                    <a href="#" title="social-link"
                                        class="social-link social-google fab fa-google border-no"></a>
                                    <a href="#" title="social-link"
                                        class="social-link social-facebook fab fa-facebook-f border-no"></a>
                                    <a href="#" title="social-link"
                                        class="social-link social-twitter fab fa-twitter border-no"></a>
                                </div>
                            </div> -->
                </div>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">
        <span>×</span>
    </button>
</div>
@endsection
