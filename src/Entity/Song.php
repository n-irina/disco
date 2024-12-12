<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SongRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongRepository::class)]
#[ApiResource()]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duration = null;

    /**
     * @var Collection<int, Album>
     */
    #[ORM\ManyToMany(targetEntity: Album::class, mappedBy: 'song')]
    private Collection $albums;

    /**
     * @var Collection<int, Singer>
     */
    #[ORM\ManyToMany(targetEntity: Singer::class, mappedBy: 'song')]
    private Collection $singers;

    /**
     * @var Collection<int, Composer>
     */
    #[ORM\ManyToMany(targetEntity: Composer::class, mappedBy: 'song')]
    private Collection $composers;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->singers = new ArrayCollection();
        $this->composers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, Album>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): static
    {
        if (!$this->albums->contains($album)) {
            $this->albums->add($album);
            $album->addSong($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): static
    {
        if ($this->albums->removeElement($album)) {
            $album->removeSong($this);
        }

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
            $singer->addSong($this);
        }

        return $this;
    }

    public function removeSinger(Singer $singer): static
    {
        if ($this->singers->removeElement($singer)) {
            $singer->removeSong($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Composer>
     */
    public function getComposers(): Collection
    {
        return $this->composers;
    }

    public function addComposer(Composer $composer): static
    {
        if (!$this->composers->contains($composer)) {
            $this->composers->add($composer);
            $composer->addSong($this);
        }

        return $this;
    }

    public function removeComposer(Composer $composer): static
    {
        if ($this->composers->removeElement($composer)) {
            $composer->removeSong($this);
        }

        return $this;
    }
}
