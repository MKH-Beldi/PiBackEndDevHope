<?php

namespace App\Repository;

use App\Entity\Gouvernorate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gouvernorate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gouvernorate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gouvernorate[]    findAll()
 * @method Gouvernorate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GouvernorateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gouvernorate::class);
    }

    // /**
    //  * @return Gouvernorate[] Returns an array of Gouvernorate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gouvernorate
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
