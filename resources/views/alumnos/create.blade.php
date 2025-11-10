@extends('app.bootstrap.template')
@section('content')

<style>

.create-container {
    background: linear-gradient(180deg, #ffffff, #f7f9fb);
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    padding: 40px;
    max-width: 1000px;
    margin: 40px auto;
    font-family: 'Inter', sans-serif;
    transition: all 0.3s ease-in-out;
}


.create-container h2 {
    text-align: center;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 30px;
    letter-spacing: 0.5px;
}


.alert {
    border-radius: 10px;
    font-size: 0.95rem;
    background-color: #fee2e2;
    border: 1px solid #fca5a5;
    color: #991b1b;
}


.form-label {
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}

.form-control {
    background-color: #f9fafb;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 0.95rem;
    color: #1f2937;
    transition: all 0.25s ease;
}

.form-control:focus {
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.25);
    background-color: #ffffff;
}

textarea.form-control {
    resize: none;
    min-height: 90px;
}


.btn-primary {
    background-color: #2563eb;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    letter-spacing: 0.3px;
    transition: background-color 0.25s ease, transform 0.15s ease;
}

.btn-primary:hover {
    background-color: #1d4ed8;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #e5e7eb;
    color: #374151;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: 600;
    transition: background-color 0.25s ease, transform 0.15s ease;
}

.btn-secondary:hover {
    background-color: #d1d5db;
    transform: translateY(-2px);
}


.row {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.col-md-6 {
    flex: 1;
    min-width: 300px;
}

.create-container form {
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


@media (max-width: 768px) {
    .create-container {
        padding: 25px;
    }
    .btn-primary, .btn-secondary {
        width: 100%;
        margin-top: 10px;
    }
}


input[type="file"].form-control {
    background-color: #f1f5f9;
    border: 1px dashed #94a3b8;
    cursor: pointer;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

input[type="file"].form-control:hover {
    border-color: #2563eb;
    background-color: #f8fafc;
}
</style>

<div class="create-container">
    <h2>Añadir nuevo alumno</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                </div>

                <div class="mb-3">
                    <label for="nota_media" class="form-label">Nota media</label>
                    <input type="number" step="0.01" min="0" max="10" class="form-control" id="nota_media" name="nota_media" value="{{ old('nota_media') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="experiencia" class="form-label">Experiencia</label>
                    <textarea class="form-control" id="experiencia" name="experiencia" rows="3">{{ old('experiencia') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="formacion" class="form-label">Formación</label>
                    <textarea class="form-control" id="formacion" name="formacion" rows="3">{{ old('formacion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="habilidades" class="form-label">Habilidades</label>
                    <textarea class="form-control" id="habilidades" name="habilidades" rows="3">{{ old('habilidades') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fotografia" class="form-label">Fotografía</label>
                    <input type="file" class="form-control" id="fotografia" name="fotografia" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="pdf" class="form-label">Currículum (PDF)</label>
                    <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary me-2">Guardar alumno</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@endsection
