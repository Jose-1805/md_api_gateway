<?php

namespace App\Http\Controllers;

use App\Services\MdCounterService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MdCounterController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdCounterService
     */
    public $md_counter_service;

    public function __construct(MdCounterService $md_counter_service)
    {
        $this->md_counter_service = $md_counter_service;
        // EL middleware auth_access permite el acceso con validación de autorización a las rutas
        $this->middleware('auth_access');
        //$this->middleware('auth:sanctum');
        //$this->middleware('permission:name')->only(['func']);
    }

    /**
     * Lista de elementos del servicio
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->md_counter_service->getMdCounters();

        return $this->generateResponseByService($response);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->md_counter_service->createMdCounter($request->all());
        return $this->generateResponseByService($response);
    }

    /**
     * Obtiene el recurso especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->md_counter_service->getMdCounter($id);
        return $this->generateResponseByService($response);
    }

    /**
     * Actualiza el recurso especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = $this->md_counter_service->updateMdCounter($id, $request->all());
        return $this->generateResponseByService($response);
    }

    /**
     * Incrementa el contador asociado a los parámetros de búsqueda
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function increment(Request $request)
    {
        $response = $this->md_counter_service->incrementMdCounter($request->all());
        return $this->generateResponseByService($response);
    }

    /**
     * Decrementa el contador asociado a los parámetros de búsqueda
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function decrement(Request $request)
    {
        $response = $this->md_counter_service->decrementMdCounter($request->all());
        return $this->generateResponseByService($response);
    }

    /**
     * Elimina el recurso especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->md_counter_service->destroy($id);
        return $this->generateResponseByService($response);
    }
}
