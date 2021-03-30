<?php

namespace StoreModule\Manager;

use App\Exception\StoreNotFoundException;
use StoreModule\Entity\Store;

/**
 * Interface StoreManagerInterface
 */
interface StoreManagerInterface
{

    const PAGINATE_MAX = 25;

    /**
     * Create Store with the given data
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Find all stores and paginate by the given criteria
     *
     * @param int $start
     * @param int $end
     * @param array $criteria
     * @return array
     * @throws \Exception
     */
    public function findAllPaginate(int $start = 0, $end = self::PAGINATE_MAX, array $criteria = []): array;


    /**
     * Find One store by the given id
     *
     * @param int $id
     * @return Store
     * @throws StoreNotFoundException
     */
    public function finOneById(int $id): Store;

    /**
     * Update one Store with the given criteria
     *
     * @param store $store
     * @param array $data
     * @return mixed
     */
    public function update(Store $store, array $data);

    /**
     * Delete one Store by the given criteria
     *
     * @param Store $store
     * @return mixed
     */
    public function delete(Store $store);
}