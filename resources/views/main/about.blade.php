@extends('app.bootstrap.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Sobre CurriculumsApp</h1>
                    
                    <p class="lead text-center mb-4">
                        Una aplicación simple para gestionar currículums de alumnos
                    </p>

                    <div class="mb-4">
                        <h5>¿Qué permite hacer?</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success"></i> Gestionar datos de alumnos</li>
                            <li><i class="bi bi-check-circle text-success"></i> Almacenar fotografías</li>
                            <li><i class="bi bi-check-circle text-success"></i> Guardar currículums en PDF</li>
                            <li><i class="bi bi-check-circle text-success"></i> Visualizar información académica</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
