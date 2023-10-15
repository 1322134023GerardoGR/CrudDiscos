<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\albums;
use App\Models\artists;
use App\Models\discs;
use App\Models\singers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AlbumsController extends Controller
{
    /* Listar todos los productos en la vista principal
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function albums(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums = albums::paginate(5);
        return view('Albums.albums', compact('albums'));
    }

    /* Redirige a la vista correspondiente a crear un Registro
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums = albums::all();

        return view('Albums.crear', compact('albums'));
    }

    /* Proceso de Creación de un Registro
     * @param $discos
     * @return \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
     * */
    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            // Recibo todos los datos desde el formulario Crear
            $albums = new albums();
            $albums->nombre = $request->nombre;
            $albums->anio_lanzamiento = $request->anio_lanzamiento;
            // Guardamos la fecha de creación del registro
            $albums->created_at = (new DateTime)->getTimestamp();
            $albums->save();
            Session::flash('message', 'Guardado Satisfactoriamente !');
        } catch (\Exception $e) {
            Session::flash('message', 'Error al Crear !');
        }

        return redirect('albums');
    }


    /* Mostrar un solo registro de la tabla segun su id
     * @params $discos: Registro que se va a mostrar
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums = albums::find($id);
        return view('Albums.detalles', compact('albums'));
    }

    /* Busca y manda los datos del registro que se va a modificar
    * @params $discos: Registro que se va a editar
    * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    * */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $albums = albums::find($id);
        return view('Albums.actualizar', ['albums' => $albums]);
    }

    /* Proceso de Actualización de un Registro (Update)
    * @params $discos: Registro que se va a editar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        //try {
            // Recibo todos los datos desde el formulario Actualizar
            $albums = albums::find($id);
            $albums->nombre = $request->nombre;
            $albums->anio_lanzamiento = $request->anio_lanzamiento;
            // Guardamos la fecha de actualización del registro
            $albums->updated_at = (new DateTime)->getTimestamp();
            // Actualizo los datos en la tabla 'discos'
            $albums->save();
            // Muestro un mensaje y redirecciono a la vista principal
            Session::flash('message', 'Editado Satisfactoriamente !');
       // } catch (\Exception $e) {
       //     Session::flash('message', 'Error al Editar !');
       // }
        return Redirect::to('albums');
    }

    /* Eliminar un Registro
    * @params $id: 'id' del registro que se va Eliminar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        // Indicamos el 'id' del registro que se va Eliminar
        // Elimino el registro de la tabla 'productos'
        albums::destroy($id);
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('albums');
    }
}
