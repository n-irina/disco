<?php

namespace App\DataFixtures;

use App\Entity\Singer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SingerFixtures extends Fixture
{
    public const SINGER_REFERENCES = [

        "Beyoncé",
        "Ne-Yo",
        "Usher",
        "Chris Brown",
        "Mario",

    ];

    public function load(ObjectManager $manager): void
    {

        $singers = [

            [
                "nickname" => "Beyoncé",
                "lastname" => "Knowles",
                "firstname" => "Beyoncé",
                "date_of_birth" => "1981-09-04"
            ],
            [
                "nickname" => "Ne-Yo",
                "lastname" => "Smith",
                "firstname" => "Shaffer Chimere",
                "date_of_birth" => "1979-10-18"
            ],
            [
                "nickname" => "Usher",
                "lastname" => "Raymond",
                "firstname" => "Usher",
                "date_of_birth" => "1978-10-14"
            ],
            [
                "nickname" => "Chris Brown",
                "lastname" => "Brown",
                "firstname" => "Christopher Maurice",
                "date_of_birth" => "1989-05-05"
            ],
            [
                "nickname" => "Mario",
                "lastname" => "Barrett",
                "firstname" => "Mario Dewar",
                "date_of_birth" => "1986-08-27"
            ],

        ];

        foreach ($singers as $index => $one_singer){

            $singer = new Singer();
            $singer->setNickname($one_singer["nickname"]);
            $singer->setLastname($one_singer["lastname"]);
            $singer->setFirstname($one_singer["firstname"]);
            $singer->setDateOfBirth(new \DateTime($one_singer["date_of_birth"]));

            $manager->persist($singer);

            $this->addReference(self::SINGER_REFERENCES[$index], $singer);

        }

        $manager->flush();
    }
}