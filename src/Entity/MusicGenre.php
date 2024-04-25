<?php

namespace App\Entity;

use App\Repository\MusicGenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicGenreRepository::class)]
class MusicGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $genderName = null;

    /**
     * @var Collection<int, BandRegister>
     */
    #[ORM\OneToMany(targetEntity: BandRegister::class, mappedBy: 'musicGenre')]
    private Collection $bandregister;

    public function __construct()
    {
        $this->bandregister = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenderName(): ?string
    {
        return $this->genderName;
    }

    public function setGenderName(string $genderName): static
    {
        $this->genderName = $genderName;

        return $this;
    }

    /**
     * @return Collection<int, BandRegister>
     */
    public function getBandregister(): Collection
    {
        return $this->bandregister;
    }

    public function addBandregister(BandRegister $bandregister): static
    {
        if (!$this->bandregister->contains($bandregister)) {
            $this->bandregister->add($bandregister);
            $bandregister->setMusicGenre($this);
        }

        return $this;
    }

    public function removeBandregister(BandRegister $bandregister): static
    {
        if ($this->bandregister->removeElement($bandregister)) {
            // set the owning side to null (unless already changed)
            if ($bandregister->getMusicGenre() === $this) {
                $bandregister->setMusicGenre(null);
            }
        }

        return $this;
    }
}
