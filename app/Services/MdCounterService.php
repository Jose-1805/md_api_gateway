<?php

namespace App\Services;

class MdCounterService extends ServiceManager
{
    public function __construct()
    {
        $this->base_uri = config("services.cluster_services.md_counter_service.base_uri");
        $this->access_secret = config("services.cluster_services.md_counter_service.access_secret");
    }

    /**
     * Lista de elementos del servicio
     *
     * @return array
     */
    public function getMdCounters(): array
    {
        return $this->performRequest('GET', '/api/counter');
    }

    /**
     * Obtiene un elemento especifico del servicio
     *
     * @param string $id
     * @return array
     */
    public function getMdCounter($id): array
    {
        return $this->performRequest('GET', '/api/counter/'.$id);
    }

    /**
     * Registro de un nuevo elemento en el servicio
     *
     * @param array $data
     * @return array
     */
    public function createMdCounter($data): array
    {
        return $this->performRequest('POST', '/api/counter', $data);
    }

    /**
     * Actualiza el elemento especificado
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function updateMdCounter($id, $data): array
    {
        return $this->performRequest('PUT', '/api/counter/'.$id, $data);
    }

    /**
     * Elimina el elemento especificado
     *
     * @param string $id
     * @return array
     */
    public function destroy($id): array
    {
        return $this->performRequest('DELETE', '/api/counter/'.$id);
    }
}
