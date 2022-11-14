<?php

namespace App\Http\Controllers;

use App\Services\MdStoreService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MdStoreController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdStoreService
     */
    public $md_store_service;

    public function __construct(MdStoreService $md_store_service)
    {
        $this->md_store_service = $md_store_service;
        // EL middleware auth_access permite el acceso con validación de autorización a las rutas
        //$this->middleware('auth_access');
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
        $response = $this->md_store_service->getMdStores();

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
        $response = $this->md_store_service->createMdStore($request->all());
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
        $response = $this->md_store_service->getMdStore($id);
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
        $response = $this->md_store_service->updateMdStore($id, $request->all());
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
        $response = $this->md_store_service->destroy($id);
        return $this->generateResponseByService($response);
    }

    /**
     * Descarga del logo de la tienda
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadLogo($id)
    {
        $response = $this->md_store_service->downloadLogo($id);
        return $response;
        //return $this->generateResponseByService($response);
    }
}
