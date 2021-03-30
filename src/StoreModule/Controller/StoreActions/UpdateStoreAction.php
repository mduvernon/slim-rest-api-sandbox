<?php

namespace StoreModule\Controller\StoreActions;

use Psr\Http\Message\ResponseInterface as Response;
use StoreModule\Exception\StoreNotFoundException;

/**
 * Class UpdateStoreAction
 */
class UpdateStoreAction extends AbstractStoreAction
{

    /**
     * Update Store default action
     *
     * @return Response
     * @throws \Exception
     */
    protected function action(): Response
    {
        // Collect input from the HTTP request
        $storeId = (int)$this->args['id'];
        $data = (array)$this->request->getParsedBody();

        $this->checkData($data);

        $store = $this->storeManager->finOneById($storeId);
        if (!$store) throw new StoreNotFoundException();

        $response = ['success' => FALSE]; // Unsuccessful action by default
        if ($this->storeManager->update($store, $data)) {
            $response = ['success' => TRUE];
        }

        $this->logger->info("UpdateStoreAction was viewed.");

        return $this->respondWithData($response);
    }

    /**
     * Check the store formatted data
     *
     * @param array $data
     * @throws \Exception
     */
    private function checkData(array $data)
    {
        if (
            !array_key_exists('name', $data) ||
            !array_key_exists('description', $data)
        ) {
            throw new \InvalidArgumentException('Invalid data given');
        }
    }
}