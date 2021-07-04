<?php

namespace App\Repository;

use App\Entity\FileMedicalExam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FileMedicalExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method FileMedicalExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method FileMedicalExam[]    findAll()
 * @method FileMedicalExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FileMedicalExamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FileMedicalExam::class);
    }

    // /**
    //  * @return FileMedicalExam[] Returns an array of FileMedicalExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FileMedicalExam
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
