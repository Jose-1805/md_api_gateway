<?php

namespace App\Services;

class MdStoreService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_store_service.base_uri");
        $this->access_secret = config("services.cluster_services.md_store_service.access_secret");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdStores(): array
    {
        return $this->performRequest('GET', '/api/store');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdStore($id): array
    {
        return $this->performRequest('GET', '/api/store/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdStore($data): array
    {
        return $this->performRequest('POST', '/api/store', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdStore($id, $data): array
    {
        return $this->performRequest('PUT', '/api/store/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/store/'.$id);
    }

    /**
     * Descarga del logo de la tienda
     *
     * @param string $id
     * @return mixed
     */
    public function downloadLogo($id): mixed
    {
        return $this->performRequest('GET', '/api/store/download-logo/'.$id, [], true);
    }

    /**
     * Alterna un vendedor de una tienda
     *
     * @param string $id
     * @return mixed
     */
    public function toggleSeller($data): array
    {
        return $this->performRequest('PUT', '/api/store/toggle-seller', $data);
    }
}
