@extends('app.bootstrap.template')

@section('content')
<style>


body {
    font-family: 'Inter', 'Poppins', sans-serif;
    background: linear-gradient(135deg, #f5f8ff, #eef2ff);
    color: #1f2937;
    margin: 0;
    padding: 0;
}


.profile-wrapper {
    max-width: 850px;
    margin: 3rem auto;
    background: #ffffffd9;
    backdrop-filter: blur(8px);
    border-radius: 1.5rem;
    padding: 3rem 2rem;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
    text-align: center;
    transition: all 0.3s ease;
}

.profile-wrapper:hover {
    transform: translateY(-3px);
}


.profile-photo {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    margin-bottom: 1.5rem;
    transition: transform 0.3s ease;
}
.profile-photo:hover {
    transform: scale(1.05);
}

.profile-name {
    font-weight: 700;
    color: #0f172a;
    font-size: 1.9rem;
    margin-bottom: 0.5rem;
}


.profile-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 2rem;
    text-align: left;
}

.profile-table th {
    width: 30%;
    color: #334155;
    font-weight: 600;
    background-color: transparent;
    padding: 0.9rem 1rem;
}

.profile-table td {
    color: #475569;
    padding: 0.9rem 1rem;
    border-top: 1px solid #e5e7eb;
}


.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    font-weight: 600;
    border-radius: 999px;
    padding: 0.8rem 1.8rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.25s ease-in-out;
    margin-top: 1.5rem;
}

.btn-danger {
    background-color: #ef4444;
    color: #fff;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}
.btn-danger:hover {
    background-color: #dc2626;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #2563eb;
    color: #fff;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
}
.btn-secondary:hover {
    background-color: #1d4ed8;
    transform: translateY(-2px);
}

.alert {
    background-color: #fff8dc;
    color: #7c5a00;
    border-radius: 1rem;
    padding: 0.9rem 1.2rem;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
}

@media (max-width: 768px) {
    .profile-wrapper {
        padding: 2rem 1.5rem;
    }
    .profile-photo {
        width: 140px;
        height: 140px;
    }
    .profile-name {
        font-size: 1.6rem;
    }
    .profile-table th,
    .profile-table td {
        display: block;
        width: 100%;
        text-align: left;
    }
}
</style>

<div class="profile-wrapper">
    @php
        $hasFoto = !empty($alumno->fotografia);
        $imageUrl = $hasFoto ? asset('storage/alumnos/' . $alumno->fotografia) : '';
        $imagePath = $hasFoto ? storage_path('app/public/alumnos/' . $alumno->fotografia) : '';
        $exists = $hasFoto && file_exists($imagePath);
    @endphp

    @if($hasFoto && $exists)
        <img src="{{ $imageUrl }}" alt="Fotografía" class="profile-photo">
    @else
        <div class="alert">
            @if(!$hasFoto)
                No hay fotografía asignada
            @elseif(!$exists)
                La fotografía existe en la base de datos ({{ $alumno->fotografia }}) pero no se encuentra en el sistema de archivos
            @endif
        </div>
        <img src="https://via.placeholder.com/200x200?text=Sin+Foto" alt="Sin foto" class="profile-photo">
    @endif

    <h2 class="profile-name">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h2>

    <table class="profile-table">
        <tr><th>Correo</th><td>{{ $alumno->correo }}</td></tr>
        <tr><th>Teléfono</th><td>{{ $alumno->telefono ?? 'No disponible' }}</td></tr>
        <tr><th>Fecha de nacimiento</th><td>{{ $alumno->fecha_nacimiento ?? 'No disponible' }}</td></tr>
        <tr><th>Nota media</th><td>{{ $alumno->nota_media ?? 'N/A' }}</td></tr>
        <tr><th>Experiencia</th><td>{{ $alumno->experiencia ?? 'No disponible' }}</td></tr>
        <tr><th>Formación</th><td>{{ $alumno->formacion ?? 'No disponible' }}</td></tr>
        <tr><th>Habilidades</th><td>{{ $alumno->habilidades ?? 'No disponible' }}</td></tr>
    </table>

    @if($alumno->pdf && file_exists(storage_path('app/public/alumnos_pdf/' . $alumno->pdf)))
        <a href="{{ route('alumnos.pdf', $alumno->id) }}" target="_blank" class="btn btn-danger">
            <i class="bi bi-file-pdf"></i> Ver Curriculum PDF
        </a>
    @endif

    <br>
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
