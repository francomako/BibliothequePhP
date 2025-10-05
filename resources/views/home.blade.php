@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 500px;">
        <div class="text-center mb-4">
            <div class="mb-2">
                <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
            </div>
            <h3 class="fw-bold text-dark">Bienvenue sur votre tableau de bord</h3>
            <p class="text-muted">Vous êtes connecté en tant que <strong>{{ Auth::user()->name }}</strong></p>
        </div>

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-grid">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection