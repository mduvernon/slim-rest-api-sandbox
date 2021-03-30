<?php

namespace StoreModule\Controller\StoreActions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ReadStoreAction
 *
 * Read a single store action
 */
class ReadStoreAction extends AbstractStoreAction
{

    /**
     * Read Store default action
     *
     * @return Response
     * @throws \Exception
     */
    protected function action(): Response
    {
        // Collect input from the HTTP request
        $storeId = (int)$this->args['id'];
        $response = $this->storeManager->finOneById($storeId);

        $this->logger->info("ListStoresAction was viewed.");

        return $this->respondWithData($response);
    }
}