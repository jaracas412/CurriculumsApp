@extends('app.bootstrap.template')

@section('content')


<section class="text-center py-5">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh;">
            <h1 class="display-4 fw-bold mb-3 animate-fade">
                <i class="bi bi-file-earmark-person-fill text-primary me-2"></i>
                Bienvenido a <span class="text-gradient">CurriculumsApp</span>
            </h1>
            <p class="lead text-secondary mb-4 animate-fade-delay">
                La mejor forma de gestionar, visualizar y crear perfiles profesionales de tus alumnos.
            </p>
            <div class="d-flex gap-3 animate-fade-delay2">
                <a href="{{ route('alumnos.index') }}" class="btn btn-primary btn-lg shadow">
                    <i class="bi bi-people-fill me-2"></i>Ver alumnos
                </a>
                <a href="{{ route('alumnos.create') }}" class="btn btn-outline-primary btn-lg">
                    <i class="bi bi-person-plus-fill me-2"></i>Añadir alumno
                </a>
            </div>
        </div>
    </div>
</section>

<div class="gradient-separator"></div>

@endsection

@section('head')
<style>
    /* Animaciones suaves */
    .animate-fade {
        animation: fadeInUp 0.8s ease forwards;
    }
    .animate-fade-delay {
        opacity: 0;
        animation: fadeInUp 1s ease forwards;
        animation-delay: 0.3s;
    }
    .animate-fade-delay2 {
        opacity: 0;
        animation: fadeInUp 1s ease forwards;
        animation-delay: 0.6s;
    }
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Texto con gradiente */
    .text-gradient {
        background: linear-gradient(90deg, #0d6efd, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Separador visual */
    .gradient-separator {
        height: 5px;
        background: linear-gradient(90deg, #0d6efd, #2563eb, #60a5fa);
        margin: 2rem 0;
        border-radius: 10px;
        animation: gradientFlow 4s ease infinite alternate;
    }
    @keyframes gradientFlow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(45deg); }
    }

    /* Tarjetas de alumnos */
    .alumno-card {
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.4s ease;
        background: #ffffffc7;
        backdrop-filter: blur(10px);
    }
    .alumno-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    .alumno-card img {
        height: 220px;
        object-fit: cover;
    }

    /* Fondo de la landing */
    body {
        background: linear-gradient(135deg, #e9f2ff 0%, #f8f9fb 100%);
    }

    /* Botones de la cabecera */
    .btn-lg {
        padding: 0.8rem 1.6rem;
        border-radius: 50px;
    }
</style>
@endsection
