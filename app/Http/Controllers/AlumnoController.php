<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AlumnoController extends Controller
{

    public function index(): View {
        $alumnos = Alumno::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }


    public function create(): View {
        return view('alumnos.create');
    }

    public function store(Request $request): RedirectResponse {
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'apellidos' => 'required|string|max:150',
        'telefono' => 'nullable|string|max:50',
        'correo' => 'required|email|max:150|unique:alumnos,correo',
        'fecha_nacimiento' => 'nullable|date',
        'nota_media' => 'nullable|numeric|min:0|max:10',
        'experiencia' => 'nullable|string',
        'formacion' => 'nullable|string',
        'habilidades' => 'nullable|string',
        'fotografia' => 'nullable|image|max:4096',
        'pdf' => 'nullable|mimes:pdf|max:10240'
    ]);

    $alumno = new Alumno($validated);

    try {
        
        $result = $alumno->save();

       
        if ($request->hasFile('fotografia')) {
            $ruta = $this->upload($request, $alumno);
            $alumno->fotografia = basename($ruta);
        }

        if ($request->hasFile('pdf')) {
            $rutaPdf = $this->uploadPdf($request, $alumno);
            $alumno->pdf = basename($rutaPdf);
        }

        
        if ($request->hasFile('fotografia') || $request->hasFile('pdf')) {
            $alumno->save();
        }

        $txtmessage = 'Alumno creado correctamente.';

        } catch (QueryException $e) {
            $result = false;
            $txtmessage = 'Error en la base de datos: ' . $e->getMessage();
        } catch (\Exception $e) {
            $result = false;
            $txtmessage = 'Error inesperado al guardar el alumno: ' . $e->getMessage();
        }

        if ($result) {
            return redirect()->route('alumnos.index')->with('message', ['type'=>'success','text'=>$txtmessage]);
        } else {
            return back()->withInput()->withErrors(['mensajeTexto' => $txtmessage]);
        }
    }

    private function upload(Request $request, Alumno $alumno) {
        $image = $request->file('fotografia');
        $name = 'alumno_' . $alumno->id . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
        $ruta = $image->storeAs('alumnos', $name, 'public');
        return $ruta;
    }

    private function uploadPdf(Request $request, Alumno $alumno) {
        $pdf = $request->file('pdf');
        $name = 'alumno_' . $alumno->id . '_' . Str::random(8) . '.pdf';
        $ruta = $pdf->storeAs('alumnos_pdf', $name, 'public');
        return $ruta;
    }

    public function show(Alumno $alumno): View {
        return view('alumnos.show', ['alumno' => $alumno]);
    }

    public function edit(Alumno $alumno): View {
        return view('alumnos.edit', ['alumno' => $alumno]);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse {
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'apellidos' => 'required|string|max:150',
        'telefono' => 'nullable|string|max:50',
        'correo' => 'required|email|max:150|unique:alumnos,correo,' . $alumno->id,
        'fecha_nacimiento' => 'nullable|date',
        'nota_media' => 'nullable|numeric|min:0|max:10',
        'experiencia' => 'nullable|string',
        'formacion' => 'nullable|string',
        'habilidades' => 'nullable|string',
        'fotografia' => 'nullable|image|max:4096',
        'pdf' => 'nullable|mimes:pdf|max:10240'
    ]);

    try {
        
        $alumno->fill($validated);

        
        if ($request->hasFile('fotografia')) {
            
            if ($alumno->fotografia && Storage::disk('public')->exists('alumnos/' . $alumno->fotografia)) {
                Storage::disk('public')->delete('alumnos/' . $alumno->fotografia);
            }
            
            $ruta = $this->upload($request, $alumno);
            $alumno->fotografia = basename($ruta);
        }

       
        if ($request->hasFile('pdf')) {
            
            if ($alumno->pdf && Storage::disk('public')->exists('alumnos_pdf/' . $alumno->pdf)) {
                Storage::disk('public')->delete('alumnos_pdf/' . $alumno->pdf);
            }
            
            $rutaPdf = $this->uploadPdf($request, $alumno);
            $alumno->pdf = basename($rutaPdf);
        }

    
        $result = $alumno->save();
        $txtmessage = 'Alumno actualizado correctamente.';

        } catch (QueryException $e) {
            $result = false;
            $txtmessage = 'Error en la base de datos: ' . $e->getMessage();
        } catch (\Exception $e) {
            $result = false;
            $txtmessage = 'Error al actualizar el alumno: ' . $e->getMessage();
        }

        if ($result) {
            return redirect()->route('alumnos.index')->with('message', ['type'=>'success','text'=>$txtmessage]);
        } else {
            return back()->withInput()->withErrors(['mensajeTexto' => $txtmessage]);
        }
    }

    public function destroy(Alumno $alumno): RedirectResponse {
        try {
            if ($alumno->fotografia && Storage::disk('public')->exists('alumnos/' . $alumno->fotografia)) {
                Storage::disk('public')->delete('alumnos/' . $alumno->fotografia);
            }
            if ($alumno->pdf && Storage::disk('public')->exists('alumnos_pdf/' . $alumno->pdf)) {
                Storage::disk('public')->delete('alumnos_pdf/' . $alumno->pdf);
            }

            $result = $alumno->delete();
            $textMessage = 'Alumno eliminado correctamente.';
        } catch (\Exception $e) {
            $result = false;
            $textMessage = 'No se pudo eliminar el alumno.';
        }

        $message = ['mensajeTexto' => $textMessage];
        if ($result) {
            return redirect()->route('alumnos.index')->with('message', ['type'=>'success','text'=>$textMessage]);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }

    public function downloadPDF(Alumno $alumno) {
        if (!$alumno->pdf) {
            abort(404);
        }

        $path = storage_path('app/public/alumnos_pdf/' . $alumno->pdf);
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Disposition' => 'inline; filename="' . $alumno->id . '_curriculum.pdf"'
        ]);
    }
}
