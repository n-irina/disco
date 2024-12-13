<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ComposerFixtures::class,
            SingerFixtures::class,
            SongFixtures::class,  
            AlbumFixtures::class,          
        ];
    }
}
