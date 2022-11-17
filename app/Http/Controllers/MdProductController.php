<?php

namespace App\Http\Controllers;

use App\Services\MdProductService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MdProductController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdProductService
     */
    public $md_product_service;

    public function __construct(MdProductService $md_product_service)
    {
        $this->md_product_service = $md_product_service;
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
        $response = $this->md_product_service->getMdProducts();

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
        $response = $this->md_product_service->createMdProduct($request->all());
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
        $response = $this->md_product_service->getMdProduct($id);
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
        $response = $this->md_product_service->updateMdProduct($id, $request->all());
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
        $response = $this->md_product_service->destroy($id);
        return $this->generateResponseByService($response);
    }
}
