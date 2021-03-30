<?php

namespace StoreModule\Controller\StoreActions;

use Psr\Http\Message\ResponseInterface as Response;
use StoreModule\Exception\StoreNotFoundException;

/**
 * Class DeleteStoreAction
 */
class DeleteStoreAction extends AbstractStoreAction
{

    /**
     * Delete Store default action
     *
     * @return Response
     * @throws \Exception
     */
    protected function action(): Response
    {
        // Collect input from the HTTP request
        $storeId = (int)$this->args['id'];

        $store = $this->storeManager->finOneById($storeId);
        if (!$store) throw new StoreNotFoundException();

        $response = ['success' => FALSE]; // Unsuccessful action by default
        if ($this->storeManager->delete($store)) {
            $response = ['success' => TRUE];
        }

        $this->logger->info("DeleteStoreAction was viewed.");

        return $this->respondWithData($response);
    }
}