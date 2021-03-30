<?php

namespace StoreModule\Controller\StoreActions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class CreateStoreAction
 *
 * This controller perform the store creation
 */
class CreateStoreAction extends AbstractStoreAction
{

    /**
     * Create Store default action
     *
     * @return Response
     * @throws \Exception
     */
    protected function action(): Response
    {
        // Collect input from the HTTP request
        $data = (array)$this->request->getParsedBody();

        // check the given data
        $this->checkData($data);

        $response = ['success' => FALSE]; // Unsuccessful action by default
        if ($this->storeManager->create($data)) {
            $response = ['success' => TRUE];
        }

        $this->logger->info("CreateStoreActions was viewed.");

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