<?php

namespace App\Repository;

use App\Entity\VehiculeObtenue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehiculeObtenue>
 *
 * @method VehiculeObtenue|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiculeObtenue|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiculeObtenue[]    findAll()
 * @method VehiculeObtenue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeObtenueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiculeObtenue::class);
    }

//    /**
//     * @return VehiculeObtenue[] Returns an array of VehiculeObtenue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehiculeObtenue
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
