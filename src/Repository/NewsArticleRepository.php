<?php

namespace App\Repository;

use App\Entity\NewsArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NewsArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsArticle::class);
    }

	/**
	 * @return NewsArticle[] Returns an array of NewsArticle objects
	 */
	public function findPublishedArticles(): array
	{
		return $this->createQueryBuilder('n')
			->andWhere('n.Published = :val')
			->setParameter('val', 1)
			->orderBy('n.CreationDate', 'DESC')
			->setMaxResults(10)
			->getQuery()
			->getResult()
			;
	}

	/**
	 * @param int $number
	 *
	 * @return NewsArticle[] Returns an array of NewsArticle objects
	 */
	public function findRecentArticles(int $number): array
	{
		return $this->createQueryBuilder('n')
			->orderBy('n.CreationDate', 'DESC')
			->setMaxResults($number)
			->getQuery()
			->getResult()
			;
	}

    // /**
    //  * @return NewsArticle[] Returns an array of NewsArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewsArticle
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
