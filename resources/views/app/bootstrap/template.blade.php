<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CurriculumsApp</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">


        <style>

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e9f2ff 0%, #f8f9fb 100%);
            color: #212529;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        
        header.navbar {
            background: rgba(13, 110, 253, 0.85);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            padding: 1rem 2rem;
            transition: all 0.3s ease;
        }
        header.navbar a.navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }
        header.navbar a.navbar-brand,
        header.navbar a.nav-link {
            color: #fff !important;
        }
        header.navbar a.nav-link {
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }
        header.navbar a.nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background: #fff;
            transition: width 0.3s ease;
        }
        header.navbar a.nav-link:hover::after {
            width: 100%;
        }


        .container-main {
            min-height: 80vh;
            padding-top: 60px;
            padding-bottom: 60px;
            animation: fadeIn 0.6s ease-in-out;
        }


        .card,
        form {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover,
        form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(90deg, #0d6efd, #3b82f6);
            border: none;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #0d6efd;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: rgba(13, 110, 253, 0.1);
            color: #0a58ca;
            transform: scale(1.05);
        }


        footer {
            background: linear-gradient(90deg, #0d6efd, #2563eb);
            color: white;
            text-align: center;
            padding: 25px 0;
            letter-spacing: 0.3px;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
        }

     
        label {
            font-weight: 600;
            color: #1e293b;
        }
        input.form-control,
        textarea.form-control {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        input.form-control:focus,
        textarea.form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .espacio {
            margin-bottom: 1.5rem;
        }


        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        table.table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.05);
            transition: background-color 0.3s ease;
        }


        @media (max-width: 768px) {
            header.navbar a.navbar-brand {
                font-size: 1.3rem;
            }
            .container-main {
                padding-top: 40px;
            }
            form, .card {
                padding: 1.5rem;
            }
        }
    </style>

    @yield('head')
</head>

<body>


    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('main') }}">CurriculumsApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main') }}">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alumnos.create') }}">Añadir alumno</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    
    <main class="container container-main">
        @yield('content')
    </main>


    <footer>
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} CurriculumsApp — Gestión de CVs</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>
</html>
