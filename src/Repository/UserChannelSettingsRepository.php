<?php

namespace App\Repository;

use App\Entity\UserChannelSettings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserChannelSettings|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserChannelSettings|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserChannelSettings[]    findAll()
 * @method UserChannelSettings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserChannelSettingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserChannelSettings::class);
    }
}
