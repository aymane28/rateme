<?php

namespace App\Repository;

use App\Entity\SocialProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocialProfile>
 *
 * @method SocialProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialProfile[]    findAll()
 * @method SocialProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialProfile::class);
    }

//    /**
//     * @return SocialProfile[] Returns an array of SocialProfile objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SocialProfile
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
