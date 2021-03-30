<?php

namespace StoreModule\Controller\StoreActions;

use App\Core\Actions\Action;
use StoreModule\Manager\StoreManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractStoreAction
 */
abstract class AbstractStoreAction extends Action
{

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param LoggerInterface $logger
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        LoggerInterface $logger,
        StoreManagerInterface $storeManager
    )
    {
        parent::__construct($logger);
        $this->storeManager = $storeManager;
    }

}