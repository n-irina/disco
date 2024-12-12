<?php

namespace App\DataFixtures;

use App\Entity\Singer;
use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SongFixtures extends Fixture implements DependentFixtureInterface
{
    public const SONG_REFERENCES = [

        "If I were a boy",
        "Confessions",
        "With you",
        "Let me love you"
    ];

    public const NEYO_SONG_REFERENCES = [

        "Stay",
        "Let me get this right",
        "So sick",
        "When you're mad",
        "It just ain't right",
        "Mirror",
        "Sign me up",
        "I ain't gotta tell you",
        "Get down like that",
        "Sexy Love",
        "Let go",
        "Time",
        "Get down like that (remix)"
    ];

    public function load(ObjectManager $manager): void
    {

        $songs = [

            [
               "title" => "If I were a boy",
               "date" => "2009",
               "duration" => "05:06",
               "singer_index" => 0
            ],
            [
                "title" => "Confessions (part II)",
                "date" => "2004",
                "duration" => "04:51",
                "singer_index" => 2
            ],
            [
                "title" => "With you",
                "date" => "2007",
                "duration" => "04:16",
                "singer_index" => 3
            ],
            [
                "title" => "Let me love you",
                "date" => "2004",
                "duration" => "04:27",
                "singer_index" => 4
            ],

        ];

        $neyo_songs = [

            [
               "title" => "Stay",
               "date" => "2006",
               "duration" => "03:52",
            ],
            [
                "title" => "Let me get this right",
                "date" => "2006",
                "duration" => "03:48",           
            ],
            [
                "title" => "So sick",
                "date" => "2006",
                "duration" => "03:29",            
            ],
            [
                "title" => "When you're mad",
                "date" => "2006",
                "duration" => "03:42",            
            ],
            [
                "title" => "It just ain't right",
                "date" => "2006",
                "duration" => "03:48",             
            ],
            [
                "title" => "Mirror",
                "date" => "2006",
                "duration" => "03:48",
            ],
            [
                 "title" => "Sign me up",
                 "date" => "2006",
                 "duration" => "03:27",           
            ],
            [
                 "title" => "I ain't gotta tell you",
                 "date" => "2006",
                 "duration" => "03:17",            
            ],
            [
                 "title" => "Get down like that",
                 "date" => "2006",
                 "duration" => "04:06",            
            ],
            [
                 "title" => "Sexy love",
                 "date" => "2006",
                 "duration" => "03:41",             
            ],
            [
                "title" => "Let go",
                "date" => "2006",
                "duration" => "03:49",
            ],
            [
                 "title" => "Time",
                 "date" => "2006",
                 "duration" => "03:49",           
            ],
            [
                 "title" => "Get down like that (remix)",
                 "date" => "2006",
                 "duration" => "04:59",            
            ],

        ];

        foreach($songs as $index => $one_song){

            $song = new Song();
            $song->setTitle($one_song["title"]);
            $song->setDate($one_song["date"]);
            $time = \DateTime::createFromFormat("H:i:s", "00:".$one_song["duration"]);
            $song->setDuration($time);
            $singer_reference = $this->getReference(SingerFixtures::SINGER_REFERENCES[$one_song["singer_index"]], Singer::class);
            $song->addSinger($singer_reference);

            $manager->persist($song);

            $this->addReference(self::SONG_REFERENCES[$index], $song);

        }

        foreach($neyo_songs as $index => $one_song){

            $song = new Song();
            $song->setTitle($one_song["title"]);
            $song->setDate($one_song["date"]);
            $time = \DateTime::createFromFormat("H:i:s", "00:".$one_song["duration"]);
            $song->setDuration($time);
            $singer_reference = $this->getReference(SingerFixtures::SINGER_REFERENCES[1], Singer::class);
            $song->addSinger($singer_reference);

            $manager->persist($song);

            $this->addReference(self::NEYO_SONG_REFERENCES[$index], $song);

        }

        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
            SingerFixtures::class,
        ];
    }
}