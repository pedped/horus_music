<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicRepository::class)]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    private $userId;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 256,
        minMessage: 'Music title must be at least {{ limit }} characters long',
        maxMessage: 'Music title cannot be longer than {{ limit }} characters',
    )]
    private $title;

    #[ORM\Column(type: 'string' , length: 255)]
    #[Assert\NotBlank]
    private $genre;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 4096,
        minMessage: 'Music lyrics must be at least {{ limit }} characters long',
        maxMessage: 'Music lyrics cannot be longer than {{ limit }} characters',
    )]
    private $lyrics;

    #[ORM\Column(type: 'string', length: 255)]
    private $filePath;

    #[ORM\Column(type: 'string', length: 255)]
    private $fileLink;


    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank]
    #[Assert\NotBlank]
    private $staus;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank]
    private $date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'musics')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLyrics(): ?string
    {
        return $this->lyrics;
    }

    public function setLyrics(string $lyrics): self
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFileLink(): ?string
    {
        return $this->fileLink;
    }

    public function setFileLink(string $fileLink): self
    {
        $this->fileLink = $fileLink;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStaus()
    {
        return $this->staus;
    }

    /**
     * @param mixed $staus
     */
    public function setStaus($staus): void
    {
        $this->staus = $staus;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
