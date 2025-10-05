@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 500px;">
        <div class="text-center mb-4">
            <i class="bi bi-lock-fill text-primary" style="font-size: 3rem;"></i>
            <h3 class="fw-bold text-dark">Bienvenue</h3>
            <p class="text-muted">Connectez-vous à votre compte</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Se souvenir de moi
                </label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Connexion</button>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary">Créer un compte</a>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        Mot de passe oublié ?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection