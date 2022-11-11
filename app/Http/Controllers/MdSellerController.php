<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\MdSellerService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MdSellerController extends Controller
{
    use ApiResponser;
    /**
     * Objeto para consumir servicio
     *
     * @var MdSellerService
     */
    public $md_seller_service;

    public function __construct(MdSellerService $md_seller_service)
    {
        $this->md_seller_service = $md_seller_service;
        // EL middleware auth_access permite el acceso con validación de autorización a las rutas
        //$this->middleware('auth_access');
        /*$this->middleware('auth:sanctum');
        $this->middleware('permission:view-sellers')->only(['index','show']);
        $this->middleware('permission:create-sellers')->only('store');
        $this->middleware('permission:update-sellers')->only('update');
        $this->middleware('permission:delete-sellers')->only('destroy');*/
    }

    /**
     * Lista de elementos del servicio
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->md_seller_service->getMdSellers();

        if ($response["code"] == Response::HTTP_OK) {
            for ($i = 0; $i < count($response['data']); $i++) {
                $response['data'][$i]["user"] = User::find($response['data'][$i]["user_id"]);
            }
        }

        return $this->generateResponseByService($response);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->assignRole('seller');

        $response = $this->md_seller_service->createMdSeller(
            array_merge($request->all(), ["user_id" => $user->id])
        );

        if ($response["code"] == Response::HTTP_CREATED) {
            $response["data"]["user"] = $user;
        } else {
            $user->delete();
        }

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
        $response = $this->md_seller_service->getMdSeller($id);

        if ($response["code"] == Response::HTTP_OK) {
            $response["data"]["user"] = User::find($response['data']["user_id"]);
        }

        return $this->generateResponseByService($response);
    }

    /**
     * Actualiza el recurso especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $response = $this->md_seller_service->updateMdSeller($id, $request->all());

        if ($response["code"] == Response::HTTP_OK) {
            $user = User::find($response['data']["user_id"]);
            $user->update($request->all());
            $response["data"]["user"] = $user;
        }

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
        $data = $this->md_seller_service->getMdSeller($id);
        $response = $this->md_seller_service->destroy($id);

        if ($response["code"] == Response::HTTP_OK) {
            $user = User::find($data["data"]["user_id"]);
            if ($user) {
                $user->delete();
            }
        }

        return $this->generateResponseByService($response);
    }
}
