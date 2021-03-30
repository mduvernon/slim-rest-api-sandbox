<?php

namespace StoreModule\Controller\StoreActions;

use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ListStoresAction
 */
class ListStoresAction extends AbstractStoreAction
{

    /**
     * List Stores default action
     *
     * @return Response
     * @throws \Exception
     */
    protected function action(): Response
    {
        $query = $this->request->getQueryParams();

        $filter = [];
        if (isset($query['filter'])) {
            $filter = json_decode($query['filter'], true);
            if (!is_array($filter)) $filter = [];
        }

        $response = $this->storeManager->findAllPaginate(0, 15, $filter);
        $this->logger->info("ListStoresAction was viewed.");

        return $this->respondWithData($response);
    }

}