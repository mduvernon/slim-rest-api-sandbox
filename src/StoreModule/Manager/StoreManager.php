<?php

namespace StoreModule\Manager;

use _HumbugBoxa9bfddcdef37\Nette\Utils\DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\ResultSetMapping;
use StoreModule\Exception\StoreNotFoundException;
use StoreModule\Entity\Store;
use Easybook\SluggerInterface;

/**
 * Class StoreManager
 *
 * This class will perform Create Read Update Delete all stores Actions
 */
class StoreManager implements StoreManagerInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var SluggerInterface
     */
    private $slugger;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * StoreManager constructor.
     * @param EntityManagerInterface $em
     * @param SluggerInterface $slugger
     *
     * @param $class
     */
    public function __construct(
        EntityManagerInterface $em,
        SluggerInterface $slugger,
        $class
    )
    {
        $this->em = $em;
        $this->slugger = $slugger;

        $this->repository = $this->em->getRepository($class);

        $metadata = $this->em->getClassMetadata($class ?: Store::class);
        $this->class = $metadata->name;
    }

    /**
     * Create Store with the given data
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $conn = $this->em->getConnection();

        $updated_at = new \DateTime();

        $sql = <<<SQL
INSERT INTO stores SET 
    `name`=:name, 
    `slug`=:slug, 
    `description`=:description, 
    `updated_at`=:updated_at;
SQL;

        $params = [
            'name' => $data['name'],
            'slug' => $this->slugger->slugify($data['name']),
            'description' => $data['description'],
            'updated_at' => $updated_at->format('Y-m-d H:i:s')
        ];

        $q = $conn->prepare($sql);
        return $q->execute($params);
    }

    /**
     * Find all stores and paginate by the given criteria
     *
     * @param int $start
     * @param int $end
     * @param array $criteria
     * @return array
     * @throws \Exception
     */
    public function findAllPaginate(int $start = 0, $end = self::PAGINATE_MAX, array $criteria = []): array
    {
        $countQB = $this->em->createQueryBuilder();
        $totalCount = 0;
        $stores = [];

        $countQB->select("COUNT(s.id)")
            ->from('StoreModule\Entity\Store', "s");
        $sql = "SELECT s FROM StoreModule\Entity\Store s ";

        if (isset($criteria['name'])) {
            $sql .= " WHERE s.name LIKE '%" . $criteria['name'] . "%' ";
            $countQB->where("s.name LIKE '%:name%")
                ->setParameters(['name' => $criteria['name']]);
        }

        $q = $this->em->createQuery($sql);
        $q->setParameters($criteria);

        $totalCount = $countQB->getQuery()->getSingleScalarResult();

        return [
            'items' => $q->getArrayResult(),
            'totalCount' => $totalCount
        ];
    }

    /**
     * Find One store by the given id
     *
     * @param int $id
     * @return object|Store
     */
    public function finOneById(int $id): Store
    {
        $params = ['id' => $id];

        return $this->repository->findOneBy($params);
    }

    /**
     * Update one Store with the given criteria
     *
     * @param Store $store
     * @param array $data
     * @return mixed
     */
    public function update(Store $store, array $data)
    {
        $store
            ->setUpdatedAt(new \DateTime())
            ->setName($data['name'])
            ->setSlug($this->slugger->slugify($data['name']))
            ->setDescription($data['description']);

        #do persist the store
        $this->em->persist($store);
        #renew the unit of work
        $this->em->flush();

        return true;
    }


    /**
     * Delete one Store by the given criteria
     *
     * @param Store $store
     * @return bool
     */
    public function delete(Store $store)
    {
        # remove the given Store
        $this->em->remove($store);
        # renew the unit of work
        $this->em->flush();

        return true;
    }
}