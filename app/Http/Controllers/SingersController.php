<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\singers;
use Illuminate\Http\Request;

class SingersController extends Controller
{
    public function singers(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $singers = singers::paginate(5);
        return view('Cantantes.singers', compact('singers'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Cantantes.crear');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $singers = new singers();
        $singers->nombre = $request->nombre;
        $singers->apellidos = $request->apellidos;
        $singers->fecha_nacimiento = $request->fecha_nacimiento;
        $singers->save();
        return redirect('Singers');
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $singers = singers::find($id);
        return view('Cantantes.detalles', compact('singers'));
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $singers = singers::find($id);
        return view('Cantantes.actualizar', compact('singers'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $singer = singers::find($id);
        $singer->nombre = $request->nombre;
        $singer->apellidos = $request->apellidos;
        $singer->fecha_nacimiento = $request->fecha_nacimiento;
        $singer->save();
        return redirect('Singers');
    }

    public function eliminar($id): \Illuminate\Http\RedirectResponse
    {
        $singer = singers::find($id);
        $singer->delete();
        return redirect('Singers');
    }
}
