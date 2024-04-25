<?php

namespace App\Entity;

use App\Repository\BandRegisterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRegisterRepository::class)]
class BandRegister
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bandName = null;

    #[ORM\Column(nullable: true)]
    private ?int $creationYear = null;

    #[ORM\ManyToOne(inversedBy: 'bandregister')]
    private ?MusicGenre $musicGenre = null;

    #[ORM\ManyToOne]
    private ?Country $countryOrigin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgFileName = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBandName(): ?string
    {
        return $this->bandName;
    }

    public function setBandName(string $bandName): static
    {
        $this->bandName = $bandName;

        return $this;
    }

    public function getCreationYear(): ?int
    {
        return $this->creationYear;
    }

    public function setCreationYear(?int $creationYear): static
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    public function getMusicGenre(): ?MusicGenre
    {
        return $this->musicGenre;
    }

    public function setMusicGenre(?MusicGenre $musicGenre): static
    {
        $this->musicGenre = $musicGenre;

        return $this;
    }

    public function getCountryOrigin(): ?Country
    {
        return $this->countryOrigin;
    }

    public function setCountryOrigin(?Country $countryOrigin): static
    {
        $this->countryOrigin = $countryOrigin;

        return $this;
    }

    public function getImgFileName(): ?string
    {
        return $this->imgFileName;
    }

    public function setImgFileName(?string $imgFileName): static
    {
        $this->imgFileName = $imgFileName;

        return $this;
    }

}
