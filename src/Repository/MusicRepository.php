<?php

namespace App\Repository;

use App\Entity\Music;
use App\Entity\User;
use App\Enums\MusicStatus;
use App\Service\StorageManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @extends ServiceEntityRepository<Music>
 *
 * @method Music|null find($id, $lockMode = null, $lockVersion = null)
 * @method Music|null findOneBy(array $criteria, array $orderBy = null)
 * @method Music[]    findAll()
 * @method Music[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicRepository extends ServiceEntityRepository
{
    private StorageManager $storageManager;
    private ValidatorInterface $validator;

    public function __construct(ManagerRegistry $registry, StorageManager $storageManager, ValidatorInterface $validator)
    {
        parent::__construct($registry, Music::class);
        $this->storageManager = $storageManager;
        $this->validator = $validator;
    }

    public function add(Music &$entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Music $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Music[] Returns an array of Music objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Music
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function getLatestMusic(int $int)
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.id', 'DESC')
            ->setMaxResults($int)
            ->getQuery()
            ->getResult();
    }

    public function getMusic(int $musicId): ?Music
    {
        return $this->find($musicId);
    }

    public function approveMusic(int $musicId): ?Music
    {
        $musicItem = $this->find($musicId);
        $musicItem->setStaus(MusicStatus::$APPROVED);
        $this->getEntityManager()->persist($musicItem);
        $this->getEntityManager()->flush();
        return $musicItem;
    }


    public function rejectMusic(int $musicId): ?Music
    {
        $musicItem = $this->find($musicId);
        $musicItem->setStaus(MusicStatus::$REJECTED);
        $this->getEntityManager()->persist($musicItem);
        $this->getEntityManager()->flush();
        return $musicItem;
    }

    /**
     * @param string $musicTitle
     * @param string $musicGenre
     * @param string $musicLyrics
     * @param UploadedFile $musicFile
     * @return Music
     * @throws \Exception
     */
    public function uploadMusic(User $user, string $musicTitle, string $musicGenre, string $musicLyrics, UploadedFile $musicFile): Music
    {
        // first, try to upload the file
        $uploadedFileInfo = $this->storageManager->uploadFile($musicFile);

        // now , make a music item
        $music = new Music();
        $music->setUserId($user->getId());
        $music->setUser($user);
        $music->setTitle($musicTitle);
        $music->setLyrics($musicLyrics);
        $music->setGenre($musicGenre);
        $music->setDate(new \DateTime());

        // set status
        $music->setStaus(MusicStatus::$UPLOADED);

        // set path
        $music->setFilePath($uploadedFileInfo->getFilePath());
        $music->setFileLink($uploadedFileInfo->getFileLink());


        $errors = $this->validator->validate($music);
        if (count($errors) > 0) {
            throw new \Exception(implode(", ", $errors));
        }

        // add to repository
        $this->add($music, true);

        return $music;
    }
}
