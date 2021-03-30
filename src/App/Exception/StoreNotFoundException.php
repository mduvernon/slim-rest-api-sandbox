<?php
declare(strict_types=1);

namespace App\Exception;

/**
 * Class StoreNotFoundException
 *
 * @package App\Exception
 */
class StoreNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The store you requested does not exist.';
}
