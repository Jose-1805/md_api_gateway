<?php

namespace App\Http\Controllers;

use App\Services\MdFileService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MdFileController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdFileService
     */
    public $md_file_service;

    public function __construct(MdFileService $md_file_service)
    {
        $this->md_file_service = $md_file_service;
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
        $response = $this->md_file_service->getMdFiles();

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
        $response = $this->md_file_service->createMdFile($request->all());
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
        $response = $this->md_file_service->getMdFile($id);
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
        $response = $this->md_file_service->updateMdFile($id, $request->all());
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
        $response = $this->md_file_service->destroy($id);
        return $this->generateResponseByService($response);
    }
}
