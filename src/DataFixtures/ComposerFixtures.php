<?php

namespace App\DataFixtures;

use App\Entity\Composer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ComposerFixtures extends Fixture 
{

    public const COMPOSER_REFERENCES = [

        "Beyoncé",
        "Ne-yo",
        "Chris Brown",
        "Usher",
        "Johntá Austin",
        "Jermaine Dupri",
        "Bryan-Michael Cox",
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

        $composers = self::COMPOSER_REFERENCES;

        foreach($composers as $index => $one_composer){

            $composer = new Composer();
            $composer->setName($one_composer);
            
            $manager->persist($composer);

            $this->addReference(self::COMPOSER_REFERENCES[$index], $composer);

        }

        $manager->flush();
    }


}