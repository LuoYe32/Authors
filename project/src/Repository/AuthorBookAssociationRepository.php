<?php

namespace App\Repository;

use App\Entity\AuthorBookAssociation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AuthorBookAssociation>
 *
 * @method AuthorBookAssociation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuthorBookAssociation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuthorBookAssociation[]    findAll()
 * @method AuthorBookAssociation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorBookAssociationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuthorBookAssociation::class);
    }

//    /**
//     * @return AuthorBookAssociation[] Returns an array of AuthorBookAssociation objects
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

//    public function findOneBySomeField($value): ?AuthorBookAssociation
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
