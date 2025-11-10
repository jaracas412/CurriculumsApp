<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Alumno;

class MainController extends Controller
{
   
    function main(): View {
        $alumnos = Alumno::all();
        return view('main.main', ['alumnos' => $alumnos]);
    }

   
    function about(): View {
        return view('main.about');
    }
}

