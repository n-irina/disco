<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
#[ApiResource()]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $year_of_release = null;

    /**
     * @var Collection<int, Song>
     */
    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'albums')]
    private Collection $song;

    /**
     * @var Collection<int, Singer>
     */
    #[ORM\ManyToMany(targetEntity: Singer::class, mappedBy: 'album')]
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getYearOfRelease(): ?int
    {
        return $this->year_of_release;
    }

    public function setYearOfRelease(int $year_of_release): static
    {
        $this->year_of_release = $year_of_release;

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
            $singer->addAlbum($this);
        }

        return $this;
    }

    public function removeSinger(Singer $singer): static
    {
        if ($this->singers->removeElement($singer)) {
            $singer->removeAlbum($this);
        }

        return $this;
    }
}
