<?php

namespace Positive\WebsiteBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ConcertRepository extends EntityRepository
{
    public function getFutureConcerts()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.date > :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->orderBy('c.date', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function getPastConcerts()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.date < :date')
            ->setParameter('date', date('Y-m-d H:i:s', time()))
            ->orderBy('c.date', 'DESC');

        return $qb->getQuery()->getResult();
    }
}