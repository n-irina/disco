<?php

namespace App\DataFixtures;

use App\Entity\Composer;
use App\Entity\Singer;
use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SongFixtures extends Fixture implements DependentFixtureInterface
{
    public const SONG_REFERENCES = [

        "Irreplaceable",
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

    public const BEYONCE_SONG_REFERENCES = [

        "I'm that girl",
        "Cozy",
        "Alien Superstar",
        "Cuff it",
        "Energy",
        "Break my soul",
        "Church girl",
        "Plastic off the sofa",
        "Virgo's groove",
        "Move",
        "Heated",
        "Thique",
        "All up in your mind",
        "America has a problem",
        "Pure/Honey",
        "Summer renaissance"
    ];

    public function load(ObjectManager $manager): void
    {

        $songs = [

            [
               "title" => "Irreplaceable",
               "date" => "2009",
               "duration" => "04:13",
               "singer_index" => 0,
               "composer_index" => [
                  0,
                  1
               ]
            ],
            [
                "title" => "Confessions (part II)",
                "date" => "2004",
                "duration" => "04:51",
                "singer_index" => 2,
                "composer_index" => [
                    3,
                    5,
                    6
                 ]
            ],
            [
                "title" => "With you",
                "date" => "2007",
                "duration" => "04:16",
                "singer_index" => 3,
                "composer_index" => [
                    2,
                    4
                 ]
            ],
            [
                "title" => "Let me love you",
                "date" => "2004",
                "duration" => "04:27",
                "singer_index" => 4,
                "composer_index" => [
                    1
                 ]
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

        $beyonce_songs = [

            [
               "title" => "I'm that girl",
               "date" => "2022",
               "duration" => "03:28",
            ],
            [
                "title" => "Cozy",
                "date" => "2022",
                "duration" => "03:30",           
            ],
            [
                "title" => "Alien Superstar",
                "date" => "2022",
                "duration" => "03:35",            
            ],
            [
                "title" => "Cuff it",
                "date" => "2022",
                "duration" => "03:45",            
            ],
            [
                "title" => "Energy",
                "date" => "2022",
                "duration" => "01:56",             
            ],
            [
                "title" => "Break my soul",
                "date" => "2022",
                "duration" => "04:38",
            ],
            [
                 "title" => "Church girl",
                 "date" => "2022",
                 "duration" => "03:44",           
            ],
            [
                 "title" => "Plastic off the sofa",
                 "date" => "2022",
                 "duration" => "04:14",            
            ],
            [
                 "title" => "Virgo's groove",
                 "date" => "2022",
                 "duration" => "06:08",            
            ],
            [
                 "title" => "Move",
                 "date" => "2022",
                 "duration" => "03:23",             
            ],
            [
                "title" => "Heated",
                "date" => "2022",
                "duration" => "04:20",
            ],
            [
                 "title" => "Thique",
                 "date" => "2022",
                 "duration" => "04:04",           
            ],
            [
                 "title" => "All up in your mind",
                 "date" => "2022",
                 "duration" => "02:49",            
            ],
            [
                "title" => "America has a problem",
                "date" => "2022",
                "duration" => "03:18",
            ],
            [
                 "title" => "Pure/Honey",
                 "date" => "2022",
                 "duration" => "04:48",           
            ],
            [
                 "title" => "Summer renaissance",
                 "date" => "2022",
                 "duration" => "04:34",            
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

            foreach($one_song["composer_index"] as $composer_index){

                $composer_reference = $this->getReference(ComposerFixtures::COMPOSER_REFERENCES[$composer_index], Composer::class);
                $song->addComposer($composer_reference);

            }

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

        foreach($beyonce_songs as $index => $one_song){

            $song = new Song();
            $song->setTitle($one_song["title"]);
            $song->setDate($one_song["date"]);
            $time = \DateTime::createFromFormat("H:i:s", "00:".$one_song["duration"]);
            $song->setDuration($time);
            $singer_reference = $this->getReference(SingerFixtures::SINGER_REFERENCES[0], Singer::class);
            $song->addSinger($singer_reference);

            $manager->persist($song);

            $this->addReference(self::BEYONCE_SONG_REFERENCES[$index], $song);

        }

        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
            SingerFixtures::class,
            ComposerFixtures::class,
        ];
    }
}