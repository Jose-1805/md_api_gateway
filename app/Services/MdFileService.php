<?php

namespace App\Services;

class MdFileService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_file_service.base_uri");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdFiles(): array
    {
        return $this->performRequest('GET', '/api/file');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdFile($id): array
    {
        return $this->performRequest('GET', '/api/file/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdFile($data): array
    {
        return $this->performRequest('POST', '/api/file', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdFile($id, $data): array
    {
        return $this->performRequest('PUT', '/api/file/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/file/'.$id);
    }
}
