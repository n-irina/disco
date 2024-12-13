<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ComposerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposerRepository::class)]
#[ApiResource()]
class Composer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Song>
     */
    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'composers')]
    private Collection $song;

    /**
     * @var Collection<int, Singer>
     */
    #[ORM\OneToMany(targetEntity: Singer::class, mappedBy: 'composer')]
    private Collection $singers;

    public function __construct()
    {
        $this->song = new ArrayCollection();
        $this->singers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Song>
     */
    public function getSong(): Collection
    {
        return $this->song;
    }

    public function addSong(Song $song): static
    {
        if (!$this->song->contains($song)) {
            $this->song->add($song);
        }

        return $this;
    }

    public function removeSong(Song $song): static
    {
        $this->song->removeElement($song);

        return $this;
    }

    /**
     * @return Collection<int, Singer>
     */
    public function getSingers(): Collection
    {
        return $this->singers;
    }

    public function addSinger(Singer $singer): static
    {
        if (!$this->singers->contains($singer)) {
            $this->singers->add($singer);
            $singer->setComposer($this);
        }

        return $this;
    }

    public function removeSinger(Singer $singer): static
    {
        if ($this->singers->removeElement($singer)) {
            // set the owning side to null (unless already changed)
            if ($singer->getComposer() === $this) {
                $singer->setComposer(null);
            }
        }

        return $this;
    }

}
