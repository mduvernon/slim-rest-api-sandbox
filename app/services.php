<?php
declare(strict_types=1);

use StoreModule\Manager\StoreManagerInterface;
use StoreModule\Manager\StoreManager;
use Doctrine\ORM\EntityManagerInterface;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;


return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepositoryInterface interface to its in memory implementation
    $containerBuilder->addDefinitions([
        // DI of StoreManager
        StoreManagerInterface::class => function (ContainerInterface $c) {
            $em = $c->get(EntityManagerInterface::class);
            $slugger = $c->get(\Easybook\SluggerInterface::class);
            return new StoreManager($em, $slugger, \StoreModule\Entity\Store::class);
        }
    ]);
};
