@extends('app.bootstrap.template')

@section('content')
<style>

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    font-family: 'Inter', sans-serif;
    color: #1e293b;
}


form {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(12px);
    border-radius: 1rem;
    padding: 2.5rem;
    max-width: 720px;
    margin: 2rem auto 4rem auto;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
form:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
}


h2 {
    text-align: center;
    color: #0f172a;
    font-weight: 700;
    margin-bottom: 2rem;
    letter-spacing: 0.5px;
    font-size: 1.8rem;
}


label {
    font-weight: 600;
    color: #334155;
    display: block;
    margin-bottom: 0.4rem;
}

input.form-control,
textarea.form-control {
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    color: #0f172a;
    border-radius: 0.6rem;
    padding: 0.65rem 0.9rem;
    width: 100%;
    transition: all 0.3s ease;
}
input.form-control::placeholder,
textarea.form-control::placeholder {
    color: #94a3b8;
}
input.form-control:focus,
textarea.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
    outline: none;
    background: #fff;
}


.espacio {
    margin-bottom: 1.4rem;
}


img {
    border-radius: 0.6rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}


.btn-primary {
    background: linear-gradient(90deg, #2563eb, #3b82f6);
    border: none;
    color: white;
    font-weight: 600;
    padding: 0.7rem 1.5rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.25);
}
.btn-primary:hover {
    background: linear-gradient(90deg, #1e40af, #1d4ed8);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
    transform: translateY(-2px);
}

.btn-secondary {
    background: white;
    border: 1px solid #cbd5e1;
    color: #475569;
    padding: 0.7rem 1.3rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    margin-left: 0.5rem;
}
.btn-secondary:hover {
    background: #f1f5f9;
    color: #1e293b;
    transform: translateY(-1px);
}


a.btn-outline-danger {
    border-color: #ef4444;
    color: #b91c1c;
    transition: all 0.3s ease;
}
a.btn-outline-danger:hover {
    background: #ef4444;
    color: #fff;
    transform: scale(1.05);
}


@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(25px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
form, h2 {
    animation: fadeInUp 0.6s ease;
}
</style>

<h2>Editar alumno</h2>

<form action="{{ route('alumnos.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input class="form-control" minlength="2" maxlength="100" required id="nombre" name="nombre"
               placeholder="Nombre del alumno"
               value="{{ old('nombre', $alumno->nombre) }}" type="text">
    </div>

    <div class="espacio">
        <label for="apellidos">Apellidos:</label>
        <input class="form-control" minlength="2" maxlength="150" required id="apellidos" name="apellidos"
               placeholder="Apellidos del alumno"
               value="{{ old('apellidos', $alumno->apellidos) }}" type="text">
    </div>

    <div class="espacio">
        <label for="correo">Correo electrónico:</label>
        <input class="form-control" maxlength="150" required id="correo" name="correo" type="email"
               placeholder="Correo del alumno"
               value="{{ old('correo', $alumno->correo) }}">
    </div>

    <div class="espacio">
        <label for="telefono">Teléfono:</label>
        <input class="form-control" maxlength="50" id="telefono" name="telefono" type="text"
               placeholder="Teléfono del alumno"
               value="{{ old('telefono', $alumno->telefono) }}">
    </div>

    <div class="espacio">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="date"
               value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
    </div>

    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input class="form-control" step="0.01" min="0" max="10" id="nota_media" name="nota_media" type="number"
               placeholder="Nota media"
               value="{{ old('nota_media', $alumno->nota_media) }}">
    </div>

    <div class="espacio">
        <label for="formacion">Formación:</label>
        <textarea class="form-control" id="formacion" name="formacion" placeholder="Formación del alumno"
                  cols="60" rows="3">{{ old('formacion', $alumno->formacion) }}</textarea>
    </div>

    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <textarea class="form-control" id="experiencia" name="experiencia" placeholder="Experiencia previa"
                  cols="60" rows="3">{{ old('experiencia', $alumno->experiencia) }}</textarea>
    </div>

    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <textarea class="form-control" id="habilidades" name="habilidades" placeholder="Habilidades del alumno"
                  cols="60" rows="3">{{ old('habilidades', $alumno->habilidades) }}</textarea>
    </div>

    <div class="espacio">
        <label for="fotografia">Fotografía:</label><br>
        @if($alumno->fotografia)
            <img src="{{ asset('storage/alumnos/' . $alumno->fotografia) }}" alt="Foto" width="120" class="mb-2">
        @endif
        <input class="form-control" id="fotografia" name="fotografia" type="file" accept="image/*">
    </div>

    <div class="espacio">
        <label for="pdf">Currículum (PDF):</label><br>
        @if($alumno->pdf)
            <a href="{{ route('alumnos.pdf', $alumno->id) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                Ver PDF actual
            </a>
        @endif
        <input class="form-control mt-2" id="pdf" name="pdf" type="file" accept="application/pdf">
    </div>

    <div class="espacio text-center">
        <input class="btn btn-primary" value="Actualizar alumno" type="submit">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@endsection
