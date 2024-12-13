<?php

namespace App\DataFixtures;

use App\Entity\Composer;
use App\Entity\Singer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SingerFixtures extends Fixture implements DependentFixtureInterface
{
    public const SINGER_REFERENCES = [

        "Beyoncé",
        "Ne-Yo",
        "Usher",
        "Chris Brown",
        "Mario",
        "Ronisia",
        "Lewis Capaldi",
        "Ed Sheeran",
        "Rihanna",
        "Sam Smith",
        "JP Cooper",
        "Bob Marley",
        "Teddy Swims"

    ];

    public function load(ObjectManager $manager): void
    {

        $singers = [

            [
                "nickname" => "Beyoncé",
                "lastname" => "Knowles",
                "firstname" => "Beyoncé",
                "date_of_birth" => "1981-09-04",
                "composer_index" => 0 
            ],
            [
                "nickname" => "Ne-Yo",
                "lastname" => "Smith",
                "firstname" => "Shaffer Chimere",
                "date_of_birth" => "1979-10-18",
                "composer_index" => 1
            ],
            [
                "nickname" => "Usher",
                "lastname" => "Raymond",
                "firstname" => "Usher",
                "date_of_birth" => "1978-10-14",
                "composer_index" => 3
            ],
            [
                "nickname" => "Chris Brown",
                "lastname" => "Brown",
                "firstname" => "Christopher Maurice",
                "date_of_birth" => "1989-05-05",
                "composer_index" => 2
            ],
            [
                "nickname" => "Mario",
                "lastname" => "Barrett",
                "firstname" => "Mario Dewar",
                "date_of_birth" => "1986-08-27"
            ],
            [
                "nickname" => "Ronisia",
                "lastname" => "Morges",
                "firstname" => "Ronisia Mendes",
                "date_of_birth" => "1999-11-13"
            ],
            [
                "nickname" => "Lewis Capaldi",
                "lastname" => "Capaldi",
                "firstname" => "Lewis",
                "date_of_birth" => "1996-10-07",
                "composer_index" => 7
            ],
            [
                "nickname" => "Ed Sheeran",
                "lastname" => "Sheeran",
                "firstname" => "Edward Christopher",
                "date_of_birth" => "1991-02-17",
                "composer_index" => 8
            ],
            [
                "nickname" => "Rihanna",
                "lastname" => "Fenty",
                "firstname" => "Robyn Rihanna",
                "date_of_birth" => "1988-02-20",
                "composer_index" => 9
            ],
            [
                "nickname" => "Sam Smith",
                "lastname" => "Smith",
                "firstname" => "Samuel",
                "date_of_birth" => "1992-05-19",
                "composer_index" => 10
            ],
            [
                "nickname" => "JP Cooper",
                "lastname" => "Cooper",
                "firstname" => "John Paul",
                "date_of_birth" => "1983-11-01",
                "composer_index" => 11
            ],
            [
                "nickname" => "Bob Marley",
                "lastname" => "Marley",
                "firstname" => "Robert Nesta",
                "date_of_birth" => "1945-02-06",
                "composer_index" => 12
            ],
            [
                "nickname" => "Teddy Swims",
                "lastname" => "Dimsdale",
                "firstname" => "Jaten Collin",
                "date_of_birth" => "1992-09-25",
                "composer_index" => 13
            ],
           

        ];

        foreach ($singers as $index => $one_singer){

            $singer = new Singer();
            $singer->setNickname($one_singer["nickname"]);
            $singer->setLastname($one_singer["lastname"]);
            $singer->setFirstname($one_singer["firstname"]);
            $singer->setDateOfBirth(new \DateTime($one_singer["date_of_birth"]));

            if(isset($one_singer["composer_index"])){

                $composer_reference = $this->getReference(ComposerFixtures::COMPOSER_REFERENCES[$one_singer["composer_index"]], Composer::class);
                $singer->setComposer($composer_reference);

            }

            $manager->persist($singer);

            $this->addReference(self::SINGER_REFERENCES[$index], $singer);

        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ComposerFixtures::class,          
        ];
    }
}