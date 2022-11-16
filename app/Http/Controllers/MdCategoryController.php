<?php

namespace App\Http\Controllers;

use App\Services\MdCategoryService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MdCategoryController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdCategoryService
     */
    public $md_category_service;

    public function __construct(MdCategoryService $md_category_service)
    {
        $this->md_category_service = $md_category_service;
        // EL middleware auth_access permite el acceso con validación de autorización a las rutas
        //$this->middleware('auth_access');
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        //$this->middleware('permission:name')->only(['func']);
    }

    /**
     * Lista de elementos del servicio
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->md_category_service->getMdCategories();

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
        $response = $this->md_category_service->createMdCategory($request->all());
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
        $response = $this->md_category_service->getMdCategory($id);
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
        $response = $this->md_category_service->updateMdCategory($id, $request->all());
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
        $response = $this->md_category_service->destroy($id);
        return $this->generateResponseByService($response);
    }
}
