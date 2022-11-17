<?php

namespace App\Services;

class MdProductService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_product_service.base_uri");
        $this->access_secret = config("services.cluster_services.md_product_service.access_secret");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdProducts(): array
    {
        return $this->performRequest('GET', '/api/product');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdProduct($id): array
    {
        return $this->performRequest('GET', '/api/product/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdProduct($data): array
    {
        return $this->performRequest('POST', '/api/product', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdProduct($id, $data): array
    {
        return $this->performRequest('PUT', '/api/product/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/product/'.$id);
    }
}
