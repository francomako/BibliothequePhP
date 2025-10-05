@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #74ABE2, #5563DE);
        font-family: 'Poppins', sans-serif;
        color: #333;
        min-height: 100vh;
    }

    .dashboard-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 30px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeInUp 0.6s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #4e54c8;
    }

    .dashboard-body {
        font-size: 1.2rem;
        color: #666;
    }

    .btn-logout {
        background: #4e54c8;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 25px;
        margin-top: 20px;
        transition: background 0.3s ease;
    }

    .btn-logout:hover {
        background: #5563de;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="col-md-8">
        <div class="dashboard-card">
            <div class="dashboard-title">🏠 Tableau de bord</div>

            <div class="dashboard-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <p>{{ __('Bienvenue sur votre espace, vous êtes connecté(e) ! 🎉') }}</p>

                <button class="btn-logout" id="logoutBtn">Se déconnecter</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('logoutBtn').addEventListener('click', function() {
        this.innerText = 'Déconnexion...';
        this.disabled = true;
        this.style.opacity = '0.6';
        setTimeout(() => {
            window.location.href = "{{ route('logout') }}";
        }, 1000);
    });
</script>
@endsection
