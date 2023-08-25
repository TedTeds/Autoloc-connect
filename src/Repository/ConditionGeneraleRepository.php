<?php

namespace App\Repository;

use App\Entity\ConditionGenerale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConditionGenerale>
 *
 * @method ConditionGenerale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConditionGenerale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConditionGenerale[]    findAll()
 * @method ConditionGenerale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConditionGeneraleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConditionGenerale::class);
    }

//    /**
//     * @return ConditionGenerale[] Returns an array of ConditionGenerale objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ConditionGenerale
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
