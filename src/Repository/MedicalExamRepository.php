<?php

namespace App\Repository;

use App\Entity\MedicalExam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicalExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicalExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicalExam[]    findAll()
 * @method MedicalExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicalExamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicalExam::class);
    }

    // /**
    //  * @return MedicalExam[] Returns an array of MedicalExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicalExam
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
