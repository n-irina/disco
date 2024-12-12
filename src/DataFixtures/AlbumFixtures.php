<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Singer;
use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AlbumFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      
        $neyo_songs_references = SongFixtures::NEYO_SONG_REFERENCES; 
        
        $neyo_album = new Album();
        $neyo_album->setTitle("In my own words");
        $neyo_album->setYearOfRelease(2006);
        $neyo_singer = $this->getReference(SingerFixtures::SINGER_REFERENCES[1], Singer::class);
        $neyo_album->addSinger($neyo_singer);

        foreach($neyo_songs_references as $neyo_song_reference){

            $song = $this->getReference($neyo_song_reference, Song::class);
            $neyo_album->addSong($song);

        }

        $manager->persist($neyo_album);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SingerFixtures::class,
            SongFixtures::class,            
        ];
    }
}