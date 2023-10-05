<?php

namespace App\Http\Controllers;
use App\Models\Discos;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Storage;

class TiendaController extends Controller
{
    // Listar todos los productos en la vista principal
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $discos = Discos::all();
        return view('Tienda.index', compact('discos'));
    }
    // Crear un Registro
    public function crear(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $discos = Discos::all();
        return view('Tienda.crear', compact('discos'));
    }

    // Proceso de Creación de un Registro
    public function store(ItemCreateRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try{
            // Recibo todos los datos desde el formulario Crear
            $discos = new Discos;
            $discos->nombre = $request->nombre;
            $discos->precio = $request->precio;
            $discos->album = $request->album;
            $discos->stock = $request->stock;
            // Guardamos la fecha de creación del registro
            $discos->created_at = (new DateTime)->getTimestamp();
            $discos->save();
            Session::flash('message', 'Guardado Satisfactoriamente !');
        }catch (\Exception $e) {
            Session::flash('message', 'Error al Crear !');
        }

        return redirect('Tienda/');
    }

    // Leer Registro por 'id' (Read)
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $discos = Discos::find($id);
        return view('Tienda.detalles', compact('discos'));
    }

    //  Actualizar un registro (Update)
    public function actualizar($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $discos = Discos::find($id);
        return view('Tienda.actualizar',['discos'=>$discos]);
    }

    // Proceso de Actualización de un Registro (Update)
    public function update(ItemUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try{
            // Recibo todos los datos desde el formulario Actualizar
            $discos = Discos::find($id);
            $discos->nombre = $request->nombre;
            if($request->precio>=0)
                $discos->precio = $request->precio;
            else
                $discos->precio = 0;
            $discos->album = $request->album;
            if($request->stock>=0)
                $discos->stock = $request->stock;
            else
                $discos->stock = 0;
            // Guardamos la fecha de actualización del registro
            $discos->updated_at = (new DateTime)->getTimestamp();
            // Actualizo los datos en la tabla 'discos'
            $discos->save();
            // Muestro un mensaje y redirecciono a la vista principal
            Session::flash('message', 'Editado Satisfactoriamente !');
        }catch (\Exception $e) {
            Session::flash('message', 'Error al Editar !');
        }
        return Redirect::to('Tienda/');
    }

    // Eliminar un Registro
    public function eliminar($id): \Illuminate\Http\RedirectResponse
    {
        // Indicamos el 'id' del registro que se va Eliminar
        // Elimino el registro de la tabla 'productos'
        Discos::destroy($id);
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('Tienda/');
    }
}
