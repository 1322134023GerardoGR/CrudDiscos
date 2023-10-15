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

class ArtistsController extends Controller
{
    /* Listar todos los productos en la vista principal
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function artist(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $singers=null;
        $discos=null;
        $artists = artists::paginate(4);
        $singersBD = singers::all();
        foreach ($singersBD as $singer)
            $singers[$singer->id] = $singer->nombre.' '.$singer->apellidos;
        $discosBD = discs::all();
        foreach ($discosBD as $disco)
            $discos[$disco->id] = $disco->nombre;
        return view('Artistas.artistas', compact('artists','discos', 'singers'));
    }

    /* Redirige a la vista correspondiente a crear un Registro
     * @params $discos: lista de los discos que hay registrados
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $discos=null;
        $artists = artists::all();
        $discosBD = discs::all();
        foreach ($discosBD as $disco){
            $discos[$disco->id] = $disco;
        }
        $cantantesBD = singers::all();
        foreach ($cantantesBD as $cantante){
            $cantantes[$cantante->id] = $cantante;
        }
        return view('Artistas.crear', compact('artists','discos', 'cantantes'));
    }

    /* Proceso de Creación de un Registro
     * @param $discos
     * @return \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
     * */
    public function store(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        //try {
            // Recibo todos los datos desde el formulario Crear
            $artist = new artists();
            $artist->cantante_id = $request->cantante_id;
            $artist->disco_id = $request->disco_id;
            // Guardamos la fecha de creación del registro
            $artist->created_at = (new DateTime)->getTimestamp();
            $artist->save();
       /*     Session::flash('message', 'Guardado Satisfactoriamente !');
        } catch (\Exception $e) {
            Session::flash('message', 'Error al Crear !');
        }*/

        return redirect('artist');
    }


    /* Mostrar un solo registro de la tabla segun su id
     * @params $discos: Registro que se va a mostrar
     * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     * */
    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $artists = artists::find($id);
        $cantantes=null;
        $discos=null;
        $cantantesBD=singers::all();
        foreach ($cantantesBD as $cantante) {
            if ($cantante->id == $artists->cantante_id)
                $cantantes[] = $cantante->nombre.' '.$cantante->apellido;
        }
        $discosBD=discs::all();
        foreach ($discosBD as $disco){
            if($disco->id==$artists->disco_id)
                $discos[] = $disco->nombre;
        }
        return view('Artistas.detalles', compact('discos', 'cantantes', 'artists'));
    }

    /* Busca y manda los datos del registro que se va a modificar
    * @params $discos: Registro que se va a editar
    * @return \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    * */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $artists = artists::find($id);
        $discosBD = discs::all();
        $cantantesBD = singers::all();
        foreach ($discosBD as $disco){
            $discos[$disco->id] = $disco;
        }
        foreach ($cantantesBD as $cantante){
            $cantantes[$cantante->id] = $cantante;
        }
        return view('Artistas.actualizar', ['artists'=>$artists,'discos' => $discos, 'cantantes' => $cantantes]);
    }

    /* Proceso de Actualización de un Registro (Update)
    * @params $id: Registro que se va a editar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            // Recibo todos los datos desde el formulario Actualizar
            $artist = artists::find($id);
            $artist->cantante_id = $request->cantante_id;
            $artist->disco_id = $request->disco_id;
            // Guardamos la fecha de creación del registro
            $artist->created_at = (new DateTime)->getTimestamp();
            $artist->save();
            // Muestro un mensaje y redirecciono a la vista principal
            Session::flash('message', 'Editado Satisfactoriamente !');
        } catch (\Exception $e) {
            Session::flash('message', 'Error al Editar !');
        }
        return Redirect::to('artist');
    }

    /* Eliminar un Registro
    * @params $id: 'id' del registro que se va Eliminar
    * @return  \Illuminate\Http\RedirectResponse
    * */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        // Indicamos el 'id' del registro que se va Eliminar
        // Elimino el registro de la tabla 'productos'
        artists::destroy($id);
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('artist');
    }
}
