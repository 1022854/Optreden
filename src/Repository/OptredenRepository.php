<?php

namespace App\Repository;

use App\Entity\Optreden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Optreden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optreden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optreden[]    findAll()
 * @method Optreden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptredenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optreden::class);
    }
    public function getAllOptreden(){$conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT * FROM optreden o
        JOIN artiest ON o.artiest_id = artiest.id
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }

public function getOptredenAlGeweest(){
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
        SELECT * FROM optreden o
        JOIN artiest a ON o.artiest_id = a.id
        WHERE o.datum  < NOW()
        ';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

public function getOptredenKomendeWeek(){
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
        SELECT * FROM optreden o
        JOIN artiest a ON o.artiest_id = a.id
        WHERE o.datum BETWEEN NOW() AND NOW() + INTERVAL 7 DAY
        ';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}


    // /**
    //  * @return Optreden[] Returns an array of Optreden objects
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
    public function findOneBySomeField($value): ?Optreden
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
