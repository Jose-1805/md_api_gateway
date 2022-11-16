<?php

namespace App\Services;

class MdCategoryService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_category_service.base_uri");
        $this->access_secret = config("services.cluster_services.md_category_service.access_secret");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdCategories(): array
    {
        return $this->performRequest('GET', '/api/category');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdCategory($id): array
    {
        return $this->performRequest('GET', '/api/category/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdCategory($data): array
    {
        return $this->performRequest('POST', '/api/category', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdCategory($id, $data): array
    {
        return $this->performRequest('PUT', '/api/category/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/category/'.$id);
    }
}
