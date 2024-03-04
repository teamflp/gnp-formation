<?php

namespace App\Repository;

use App\Entity\AboutCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AboutCategory>
 *
 * @method AboutCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method AboutCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method AboutCategory[]    findAll()
 * @method AboutCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AboutCategory::class);
    }

//    /**
//     * @return AboutCategory[] Returns an array of AboutCategory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AboutCategory
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
