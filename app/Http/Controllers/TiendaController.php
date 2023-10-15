<?php

namespace App\Http\Controllers;

use App\Models\artists;
use App\Models\discs;
use App\Models\albums;
use App\Models\singers;
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
    /* Listar todos los productos en la vista principal
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums=[];
        $discos = discs::paginate(4);
        $albumsBD = albums::all();
        foreach ($albumsBD as $album)
         $albums[$album->id] = $album->nombre;
        return view('Tienda.index', compact('discos', 'albums'));
    }

    /* Redirige a la vista correspondiente a crear un Registro
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums=[];
        $discos = discs::all();
        $albumsBD = albums::all();
        foreach ($albumsBD as $album){
            $albums[$album->id] = $album;
        }
        return view('Tienda.crear', compact('discos', 'albums'));
    }

    /* Proceso de Creación de un Registro
     * @param $discos
     * @return \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
     * */
    public function store(ItemCreateRequest $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            // Recibo todos los datos desde el formulario Crear
            $discos = new discs();
            $discos->nombre = $request->nombre;
            $discos->precio = $request->precio;
            $discos->album_id = $request->album_id;
            $discos->stock = $request->stock;
            // Guardamos la fecha de creación del registro
            $discos->created_at = (new DateTime)->getTimestamp();
            $discos->save();
            Session::flash('message', 'Guardado Satisfactoriamente !');
        } catch (\Exception $e) {
            Session::flash('message', 'Error al Crear !');
        }

        return redirect('store');
    }


    /* Mostrar un solo registro de la tabla segun su id
     * @params $discos: Registro que se va a mostrar
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums=[];
        $discos = discs::find($id);
        $albumsBD = albums::all();
        foreach ($albumsBD as $album)
            $albums[$album->id] = $album->nombre;

        $cantantesBD=singers::all();
        foreach ($cantantesBD as $cantante)
            $cantantes[$cantante->id] = $cantante;

        $artistas=[];
        $artistasBD=artists::all();
        foreach ($artistasBD as $artista){
            if($artista->disco_id==$id)
            $artistas[] = $cantantes[$artista->cantante_id];
        }
        return view('Tienda.detalles', compact('discos', 'albums', 'artistas'));
    }

    /* Busca y manda los datos del registro que se va a modificar
    * @params $discos: Registro que se va a editar
    * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    * */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums=[];
        $discos = discs::find($id);
        $albumsBD = albums::all();
        foreach ($albumsBD as $album){
            $albums[$album->id] = $album;
        }
        return view('Tienda.actualizar', ['discos' => $discos, 'albums' => $albums]);
    }

    /* Proceso de Actualización de un Registro (Update)
    * @params $discos: Registro que se va a editar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function update(ItemUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            // Recibo todos los datos desde el formulario Actualizar
            $discos = discs::find($id);
            $discos->nombre = $request->nombre;
            if ($request->precio >= 0)
                $discos->precio = $request->precio;
            else
                $discos->precio = 0;
            $discos->album_id = $request->album_id;
            if ($request->stock >= 0)
                $discos->stock = $request->stock;
            else
                $discos->stock = 0;
            // Guardamos la fecha de actualización del registro
            $discos->updated_at = (new DateTime)->getTimestamp();
            // Actualizo los datos en la tabla 'discos'
            $discos->save();
            // Muestro un mensaje y redirecciono a la vista principal
            Session::flash('message', 'Editado Satisfactoriamente !');
        } catch (\Exception $e) {
            Session::flash('message', 'Error al Editar !');
        }
        return Redirect::to('store');
    }

    /* Eliminar un Registro
    * @params $id: 'id' del registro que se va Eliminar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        // Indicamos el 'id' del registro que se va Eliminar
        // Elimino el registro de la tabla 'productos'
        discs::destroy($id);
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('store');
    }
}
