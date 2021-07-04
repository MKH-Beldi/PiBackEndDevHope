<?php

namespace App\Repository;

use App\Entity\SpecialtyDr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialtyDr|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialtyDr|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialtyDr[]    findAll()
 * @method SpecialtyDr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialtyDrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialtyDr::class);
    }

    // /**
    //  * @return SpecialtyDr[] Returns an array of SpecialtyDr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialtyDr
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
