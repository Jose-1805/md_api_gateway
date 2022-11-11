<?php

namespace App\Services;

class MdSellerService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_seller_service.base_uri");
        $this->access_secret = config("services.cluster_services.md_seller_service.access_secret");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdSellers(): array
    {
        return $this->performRequest('GET', '/api/seller');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdSeller($id): array
    {
        return $this->performRequest('GET', '/api/seller/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdSeller($data): array
    {
        return $this->performRequest('POST', '/api/seller', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdSeller($id, $data): array
    {
        return $this->performRequest('PUT', '/api/seller/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/seller/'.$id);
    }
}
