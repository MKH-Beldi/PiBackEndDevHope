<?php

namespace App\Repository;

use App\Entity\Ordinance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordinance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordinance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordinance[]    findAll()
 * @method Ordinance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdinanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordinance::class);
    }

    // /**
    //  * @return Ordinance[] Returns an array of Ordinance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordinance
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
