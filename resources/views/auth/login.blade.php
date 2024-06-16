@extends('layouts.app')

@section('status-page', 'Login Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="invalid-feedback d-none" id="emailError">Please enter a valid email address.</span>
                                <span class="valid-feedback d-none" id="emailValid">Looks good!</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="invalid-feedback d-none" id="passwordError">Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        const emailError = document.getElementById('emailError');
        const emailValid = document.getElementById('emailValid');
        const passwordError = document.getElementById('passwordError');

        emailInput.addEventListener('input', function() {
            if (validateEmail(emailInput.value)) {
                emailInput.classList.remove('is-invalid');
                emailError.classList.add('d-none');
                emailValid.classList.remove('d-none');
            } else {
                emailInput.classList.add('is-invalid');
                emailError.classList.remove('d-none');
                emailValid.classList.add('d-none');
            }
        });

        passwordInput.addEventListener('input', function() {
            if (validatePassword(passwordInput.value)) {
                passwordInput.classList.remove('is-invalid');
                passwordError.classList.add('d-none');
            } else {
                passwordInput.classList.add('is-invalid');
                passwordError.classList.remove('d-none');
            }
        });

        loginForm.addEventListener('submit', function(event) {
            let isValid = true;

            if (!validateEmail(emailInput.value)) {
                emailInput.classList.add('is-invalid');
                emailError.classList.remove('d-none');
                emailValid.classList.add('d-none');
                isValid = false;
            } else {
                emailInput.classList.remove('is-invalid');
                emailError.classList.add('d-none');
                emailValid.classList.remove('d-none');
            }

            if (!validatePassword(passwordInput.value)) {
                passwordInput.classList.add('is-invalid');
                passwordError.classList.remove('d-none');
                isValid = false;
            } else {
                passwordInput.classList.remove('is-invalid');
                passwordError.classList.add('d-none');
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        function validatePassword(password) {
            const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
            return re.test(String(password));
        }
    });
</script>
@endsection
