<?php

namespace App\Repository;

use App\Entity\BlueSkyTask;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlueSkyTask|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlueSkyTask|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlueSkyTask[]    findAll()
 * @method BlueSkyTask[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlueSkyTaskRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlueSkyTask::class);
    }

    // /**
    //  * @return BlueSkyTask[] Returns an array of BlueSkyTask objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlueSkyTask
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
